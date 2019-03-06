<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');
Route::resource('system-management/district', 'DistrictController');
Route::post('system-management/district/search', 'DistrictController@search')->name('district.search');

Route::resource('system-management/block', 'BlockController');
Route::post('system-management/block/search', 'BlockController@search')->name('block.search');

//Route::get('/storedata','MasqueController@storedata');
Route::get('/ajaxRequest', 'MasqueController@ajaxRequest');

Route::resource('system-management/municipality', 'MunicipalityController');
Route::post('system-management/municipality/search', 'MunicipalityController@search')->name('municipality.search');

Route::resource('masque-management', 'MasqueController');
Route::post('masque-management/search', 'MasqueController@search')->name('masque-management.search');

Route::resource('beneficiary-management', 'BeneficiaryController');
Route::post('beneficiary-management/search', 'BeneficiaryController@search')->name('beneficiary-management.search');

Route::resource('system-management/sub-division', 'SubdivisionController');
Route::post('system-management/sub-division/search', 'SubdivisionController@search')->name('sub-division.search');

Route::resource('system-management/gram-panchayat', 'GrampanchayatController');
Route::post('system-management/gram-panchayat/search', 'GrampanchayatController@search')->name('gram-panchayat.search');

Route::resource('system-management/policestation', 'PolicestationController');
Route::post('system-management/policestation/search', 'PolicestationController@search')->name('policestation.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::get('avatars/{name}', 'EmployeeManagementController@load');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/checkstatus', 'FrontBeneficiaryController@checkstatus');
Route::get('/checkstatus', 'FrontBeneficiaryController@checkstatus');
Route::post('/sendOtp', 'FrontBeneficiaryController@sendOtp');
Route::post('/verifyOtp', 'FrontBeneficiaryController@verifyOtp');
Route::post('/resendOtp', 'FrontBeneficiaryController@resendOtp');
Route::get('/pagelogout','FrontBeneficiaryController@pagelogout');
Route::get('/viewApplication','FrontBeneficiaryController@viewApplication');
Route::get('/viewApplicationDetails/{id}','FrontBeneficiaryController@viewApplicationDetails');
Route::get('/editApplication/{id}','FrontBeneficiaryController@editApplication');
Route::get('/printApplication/{id}','CertificateController@printApplication');

Route::get('/application', 'FrontBeneficiaryController@index');
Route::get('/application/store', 'FrontBeneficiaryController@store');
Route::post('/application/save', 'FrontBeneficiaryController@applicationSave');
Route::post('/application/update', 'FrontBeneficiaryController@applicationUpdate');
Route::get('/change_application', 'FrontBeneficiaryController@change_application');
Route::get('/life_certificate_application', 'FrontBeneficiaryController@life_certificate_application');
Route::get('application/ajaxSubDivision/{id}', 'FrontBeneficiaryController@ajaxSubDivision');
Route::get('application/block/{id}', 'FrontBeneficiaryController@ajaxBlock');
Route::get('application/grampanchayat/{id}', 'FrontBeneficiaryController@grampanchayat');
Route::get('application/municipality/{id}', 'FrontBeneficiaryController@ajaxMunicipality');
Route::get('application/withindistrict', 'FrontBeneficiaryController@withindistrictLoad');
Route::get('application/parmanentBlock/{id}', 'FrontBeneficiaryController@ajaxparmanentBlock');
Route::get('application/parmanentgrampanchayat/{id}', 'FrontBeneficiaryController@ajaxparmanentgrampanchayat');
Route::get('application/parmmunicality/{id}', 'FrontBeneficiaryController@ajaxparmmunicality');

Route::get('application/withindictrict/{id}', 'FrontBeneficiaryController@ajaxdistrict_within');
Route::get('application/outsidestate/{id}', 'FrontBeneficiaryController@ajaxstate_within');

Route::get('my-captcha', 'FrontBeneficiaryController@myCaptcha')->name('myCaptcha');
Route::post('my-captcha', 'FrontBeneficiaryController@myCaptchaPost')->name('myCaptcha.post');
Route::get('refresh_captcha', 'FrontBeneficiaryController@refreshCaptcha')->name('refresh_captcha');

