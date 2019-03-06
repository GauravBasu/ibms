@extends('beneficary-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of Beneficary</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('beneficiary-management.create') }}">Add new Beneficary</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('beneficiary-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Code</th>
                <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Name</th>
                
                <th width="15%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Address </th>
                <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Block</th>
                <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Municipality</th>
                <th width="13%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">District </th>
               
                <th width="25%" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($beneficiarys as $beneficiary)
             
           
                <tr role="row" class="odd">
                  
                                 
                  <td class="hidden-xs">{{ $beneficiary->ben_code }}</td>
                  <td class="hidden-xs">{{ $beneficiary->ben_name }}</td>
                  <td class="hidden-xs">{{ $beneficiary->address }}</td>
                  <td class="hidden-xs">{{ $beneficiary->block_name }}</td>
                  <td class="hidden-xs">{{ $beneficiary->Municilapity_name }}</td>
                  <td class="hidden-xs">{{ $beneficiary->district_name }}</td>
                  
                  <td>
                    <form class="row" method="POST" action="{{ route('beneficiary-management.destroy', ['id' => $beneficiary->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('beneficiary-management.edit', ['id' => $beneficiary->id]) }}" class="btn btn-warning col-sm-4 col-xs-5 btn-margin">
                        Update
                        </a>
                        
                         <button type="submit" class="btn btn-danger col-sm-4 col-xs-5 btn-margin">
                          Delete
                        </button>
                       
                    </form>
                  </td>
              </tr>
              @endforeach
           
            </tbody>
            <tfoot>
              <tr>
                <th width="10%" rowspan="1" colspan="1">Code</th>
                <th width="15%" rowspan="1" colspan="1">name</th>
                <th width="15%" rowspan="1" colspan="1">Address</th>
                <th class="hidden-xs" width="12%" rowspan="1" colspan="1">Block </th>
                <th class="hidden-xs" width="13%" rowspan="1" colspan="1">Municipality </th>
                <th class="hidden-xs" width="10%" rowspan="1" colspan="1">District </th>
                
                <th width="25%" rowspan="1" colspan="2">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to  of  entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection