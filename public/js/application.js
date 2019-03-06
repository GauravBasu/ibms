
$(function(){
     $('#ben_municipality_id').css('display','none');
     $('#ben_block_id').css('display','none');
     $('#in_village_premises').css('display','none');
     $('#parma_municipality_id').css('display','none');
     $('#param_village_premises').css('display','none');
     $('#parma_block_id').css('display','none');


     $('#present_ben_municipality_id').css('display','none');
     $('#present_ben_block_id').css('display','none');
     $('#present_gram_panchayet').css('display','none');
     $('#present_village_premises').css('display','none');

     $('#parmanent_ben_municipality_id').css('display','none');
     $('#parmanent_ben_block_id').css('display','none');
     $('#parmanent_gram_panchayat_id').css('display','none');
     $('#parmanent_village_premises').css('display','none');

     
     $("#present_area_ben_rural_urban").change(function(){
      var status = this.value;
          if(status=="1"){
            $('#present_ben_municipality_id').css('display','none');
             $('#present_ben_block_id').css('display','block');
             $('#present_gram_panchayet').css('display','block');
             $('#present_village_premises').css('display','block');
          }
          else if(status=="2"){
             $('#present_ben_municipality_id').css('display','block');
             $('#present_ben_block_id').css('display','none');
             $('#present_gram_panchayet').css('display','none');
             $('#present_village_premises').css('display','none');
          }
     });

     $("#parmanent_area_ben_rural_urban").change(function(){
      var status = this.value;
          if(status=="1"){
            $('#parmanent_ben_municipality_id').css('display','none');
             $('#parmanent_ben_block_id').css('display','block');
             $('#parmanent_gram_panchayat_id').css('display','block');
             $('#parmanent_village_premises').css('display','block');
          }
          else if(status=="2"){
             $('#parmanent_ben_municipality_id').css('display','block');
             $('#parmanent_ben_block_id').css('display','none');
             $('#parmanent_gram_panchayat_id').css('display','none');
             $('#parmanent_village_premises').css('display','none');
          }
     });

     
     
     


   $("#ben_rural_urban").change(function(){
       var status = this.value;
     if(status=="2")
       {
        $('#ben_block_id').css('display','none');
        $('#ben_municipality_id').css('display','block');
        $('#in_village_premises').css('display','none');
       }
       else if(status=="1"){
         $('#ben_block_id').css('display','block');
        $('#ben_municipality_id').css('display','none');
        $('#in_village_premises').css('display','block');
       }
    });

   $("#parma_ben_rural_urban").change(function(){
       var status = this.value;

     if(status=="2")
       {
        $('#parma_block_id').css('display','none');
        $('#parma_municipality_id').css('display','block');
        $('#param_village_premises').css('display','none');
       }
       else if(status=="1"){
         $('#parma_block_id').css('display','block');
        $('#parma_municipality_id').css('display','none');
        $('#param_village_premises').css('display','block');
       }
    });

    if( $(this).is(':checked')) {
        $("#parma_state_id").css('display','block');
        $('#parma_country_id').css('display','block');


    } else {
        $("#parma_state_id").css('display','none');
        $('#parma_country_id').css('display','none');

    }
}); 

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

  
  $('#sub_district_id').on('change',function(){
    var districtID = $('#sub_district_id').val();
    if(districtID){
      $.ajax({
        url:"show",
        type:"get",
        data:'district_id='+ districtID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success:function(data){
          //console.log(data);
          $('#subdivision_id').empty();
          $('#subdivision_id').append("<option value=''> --Select -- </option>");
          $.each(data,function(index,subdivobj){
            console.log(subdivobj);
            $('#subdivision_id').append('<option value="'+subdivobj.id+'">'+subdivobj.sub_division_name+'</option>')

          })

        }
      });
    }
  });

  $('#gram_district_id').on('change',function(){
    var gramdistrictID = $('#gram_district_id').val();
    if(gramdistrictID){
      $.ajax({
        url:"show",
        type:"get",
        data:'district_id='+ gramdistrictID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success:function(data){
          $('#gram_sub_division_id').empty();
           $('#gram_sub_division_id').append("<option value=''> --Select -- </option>");
           $.each(data,function(index,subdivisionObj){
            $('#gram_sub_division_id').append('<option value="'+subdivisionObj.id+'">'+subdivisionObj.sub_division_name+'</option>')
           })
        }
      });
    }
  });
  $('#gram_sub_division_id').on('change',function(){
    var gramsubdivisionID = $('#gram_sub_division_id').val();
    $.ajax({
        url:"show",
        type:"get",
        data:'sub_division_id='+ gramsubdivisionID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success:function(data){
          $('#gram_block_id').empty();
           $('#gram_block_id').append("<option value=''> --Select -- </option>");
           $.each(data,function(index,blockObj){
            $('#gram_block_id').append('<option value="'+blockObj.id+'">'+blockObj.block_name+'</option>')

           })
        }
    });
  })

  $('#muni_district_id').on('change',function(){
     var munidistrictID = $('#muni_district_id').val();
      $.ajax({
         url:"show",
        type:"get",
        data:'muni_sub_division_id='+ munidistrictID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success:function(data){
          $('#muni_sub_division_id').empty();
           $('#muni_sub_division_id').append("<option value=''> --Select -- </option>");
           $.each(data,function(index, subdivisionObj){
            $('#muni_sub_division_id').append('<option value="'+subdivisionObj.id+'">'+subdivisionObj.sub_division_name+'</option>')
           })
        }
      });
  })

  $('#muni_edit_district_id').on('change',function(){
     var munidistrictID = $('#muni_edit_district_id').val();
      $.ajax({
         url:"show",
        type:"get",
        data:'muni_sub_division_id='+ munidistrictID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success:function(data){
          $('#muni_sub_division_id').empty();
           $('#muni_sub_division_id').append("<option value=''> --Select -- </option>");
           $.each(data,function(index, subdivisionObj){
            $('#muni_sub_division_id').append('<option value="'+subdivisionObj.id+'">'+subdivisionObj.sub_division_name+'</option>')
           })
        }
      });
  })

  
  $('#masque_district_id').on('change',function(){
     var mosquedistrictID = $('#masque_district_id').val();
     $.ajax({
      url:"show",
      type:"get",
      data:'masque_district_id='+ mosquedistrictID,
      dataType:'json',
      contentType: "application/json; charset=utf-8",
      success:function(data){
        $('#masque_sub_division').empty();
        $('#masque_sub_division').append("<option value=''> --Select -- </option>");
        $.each(data,function(index,mosqueSubObj){
          $('#masque_sub_division').append('<option value="'+mosqueSubObj.id+'">'+mosqueSubObj.sub_division_name+'</option>')
        });
      }
     });
  });

  
  $('#masque_rural_urban').on('change',function(){
  var m_sub_divisionID = $('#masque_sub_division').val();
  var masque_rural_urban = $('#masque_rural_urban').val();

  if(masque_rural_urban==1){
    if(m_sub_divisionID){
     $.ajax({
        url:"show",
        type:'get',
        data:'masque_sub_division='+ m_sub_divisionID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
       success:function(data){
        //console.log(data);
              $('#block_id').empty();
              $('#block_id').append("<option value=''> --Select -- </option>");
              $.each(data,function(index,blockObj){
                console.log(blockObj);
                $('#block_id').append('<option value="'+blockObj.id+'">'+blockObj.block_name+'</option>');
              });
       }
     });
    }  
    }else if(masque_rural_urban==2){
      if(m_sub_divisionID){
       $.ajax({
          url:"show",
          type:'get',
          data:'muni_sub_division_id='+ m_sub_divisionID,
          dataType: 'json',
          contentType: "application/json; charset=utf-8",
         success:function(data){
          console.log(data);
              $('#masque_municipality_id').empty();
              $('#masque_municipality_id').append("<option value=''> --Select -- </option>");
              $.each(data,function(index,muniObj){
                console.log(muniObj);
                $('#masque_municipality_id').append('<option value="'+muniObj.id+'">'+muniObj.municipality_name+'</option>');
              });
         }
       });
      }  
    }
  });


  $('#ben_district_id').on('change',function(){
     var mosquedistrictID = $('#ben_district_id').val();
     $.ajax({
      url:'application/ajaxSubDivision/{id}',
      type:"get",
      //data:'ben_district_id='+ mosquedistrictID,
      data: { ben_district_id : mosquedistrictID },
      dataType:'json',
      contentType: "application/json; charset=utf-8",
      success:function(data){
        $('#in_pre_subdivision').empty();
        $('#in_pre_subdivision').append("<option value=''> --Select -- </option>");
        $.each(data,function(index,mosqueSubObj){
          $('#in_pre_subdivision').append('<option value="'+mosqueSubObj.id+'">'+mosqueSubObj.sub_division_name+'</option>')
        });
      }
     });
  });

$('#in_pre_subdivision').on('change',function(){
   var subdivisionID = $('#in_pre_subdivision').val();
   
   $.ajax({
    url:'application/block/{id}',
    type:"get",
    data: { ben_sub_division_id : subdivisionID },
    dataType:'json',
      contentType: "application/json; charset=utf-8",
      success:function(data){
        $('#brn_block_id').empty();
        $('#brn_block_id').append("<option value=''> --Select -- </option>");
        $.each(data,function(index,BlockObj){
          $('#brn_block_id').append('<option value="'+BlockObj.id+'">'+BlockObj.block_name+'</option>')
        });

      }
   });
});

$('#in_pre_subdivision').on('change',function(){
   var subdivisionID = $('#in_pre_subdivision').val();
   $.ajax({
    url:'application/municipality/{id}',
    type:"get",
    data: { ben_sub_division_id : subdivisionID },
    dataType:'json',
      contentType: "application/json; charset=utf-8",
      success:function(data){
        $('#present_municipality_id').empty();
        $('#present_municipality_id').append("<option value=''> --Select -- </option>");
        $.each(data,function(index,MunicipalityObj){
          $('#present_municipality_id').append('<option value="'+MunicipalityObj.id+'">'+MunicipalityObj.municipality_name+'</option>')
        });

      }
   });
})

$('#brn_block_id').on('change',function(){
   var blockID = $('#brn_block_id').val();
   $.ajax({
    url:'application/grampanchayat/{id}',
    type:"get",
    data: { ben_gram_panchayat_id : blockID },
    dataType:'json',
      contentType: "application/json; charset=utf-8",
      success:function(data){
        $('#in_gram_panchayet').empty();
        $('#in_gram_panchayet').append("<option value=''> --Select -- </option>");
        $.each(data,function(index,GramPanchayatObj){
          $('#in_gram_panchayet').append('<option value="'+GramPanchayatObj.id+'">'+GramPanchayatObj.gram_panchayet_name+'</option>')
        });
      }
   });
})

$('#parmanent_state_id').css('display','none');
//$('#withinstate').css('display','none');

$('#withinwestbengal').on('click',function(){
  $('#parmanent_state_id').css('display','none');
  //alert("see here");
  //$('#withinstate').css('display','none');
  //$('#withoutstate').css('display','block');
       $.ajax({
        url:'application/withindistrict',
        type:"get",
        //data: { state_id : stateID },
        dataType:'json',
          contentType: "application/json; charset=utf-8",
          success:function(data){
            $('.district_class').empty();
            $('.district_class').append("<option value=''> --Select -- </option>");
            $.each(data,function(index,DistrictObj){
              $('.district_class').append('<option value="'+DistrictObj.id+'">'+DistrictObj.district_name+'</option>')
            });
          }
        });
});

$('#withoutwestbengal').on('click',function(){
  $('#parmanent_state_id').css('display','block');
  //$('#withinstate').css('display','block');
  //$('#withoutstate').css('display','none');
});

      $('#param_in_state').on('change',function(){
       var stateID = $('#param_in_state').val();
       $.ajax({
        url:'application/outsidestate/{id}',
        type:"get",
        data: { state_id : stateID },
        dataType:'json',
          contentType: "application/json; charset=utf-8",
          success:function(data){
            $('.district_class').empty();
            $('.district_class').append("<option value=''> --Select -- </option>");
            $.each(data,function(index,DistrictObj){
              $('.district_class').append('<option value="'+DistrictObj.id+'">'+DistrictObj.district_name+'</option>')
            });
          }
        });
      })

      $('.district_class').on('change',function(){
         var districtID = $('.district_class').val();
         $.ajax({
          url:'application/withindictrict/{id}',
          type:"get",
          data: { param_sub_division_id : districtID },
          dataType:'json',
            contentType: "application/json; charset=utf-8",
            success:function(data){
              $('#parmanent_in_pre_subdivision').empty();
              $('#parmanent_in_pre_subdivision').append("<option value=''> --Select -- </option>");
              $.each(data,function(index,PsubdivisionObj){
                $('#parmanent_in_pre_subdivision').append('<option value="'+PsubdivisionObj.id+'">'+PsubdivisionObj.sub_division_name+'</option>')
              });
            }
         });
      });

    $('#parmanent_area_ben_rural_urban').on('change',function(){
      var status = $('#parmanent_area_ben_rural_urban').val();
      var parmanent_in_pre_subdivision = $('#parmanent_in_pre_subdivision').val();

      if(status == 1){
            if(parmanent_in_pre_subdivision){
               $.ajax({
                  url:'application/parmanentBlock/{id}',
                  type:'get',
                  data:'parmanent_in_pre_subdivision='+ parmanent_in_pre_subdivision,
                  dataType: 'json',
                  contentType: "application/json; charset=utf-8",
                 success:function(data){
                  //console.log(data);
                        $('#parmanent_ben_block').empty();
                        $('#parmanent_ben_block').append("<option value=''> --Select -- </option>");
                        $.each(data,function(index,blockObj){
                          console.log(blockObj);
                          $('#parmanent_ben_block').append('<option value="'+blockObj.id+'">'+blockObj.block_name+'</option>');
                        });
                 }
               });
              }  
          }else if(status == 2){
              if(parmanent_in_pre_subdivision){
               $.ajax({
                  url:'application/parmmunicality/{id}',
                  type:'get',
                  data:'parmanent_in_pre_subdivision='+ parmanent_in_pre_subdivision,
                  dataType: 'json',
                  contentType: "application/json; charset=utf-8",
                 success:function(data){
                  console.log(data);
                        $('#parmanent_ben_municipality_muni_id').empty();
                        $('#parmanent_ben_municipality_muni_id').append("<option value=''> --Select -- </option>");
                        $.each(data,function(index,MunicipalityObj){
                          //console.log(blockObj);
                          $('#parmanent_ben_municipality_muni_id').append('<option value="'+MunicipalityObj.id+'">'+MunicipalityObj.municipality_name+'</option>');
                        });
                 }
               });
              }  
          }
    }) 

     $('#parmanent_ben_block').on('change',function(){
      var parmanent_ben_block = $('#parmanent_ben_block').val();
          if(parmanent_ben_block){
               $.ajax({
                  url:'application/parmanentgrampanchayat/{id}',
                  type:'get',
                  data:'parmanent_ben_block='+ parmanent_ben_block,
                  dataType: 'json',
                  contentType: "application/json; charset=utf-8",
                 success:function(data){
                  console.log(data);
                        $('#parmanent_in_gram_panchayet_name').empty();
                        $('#parmanent_in_gram_panchayet_name').append("<option value=''> --Select -- </option>");
                        $.each(data,function(index,grampanchayatObj){
                          console.log(grampanchayatObj);
                          $('#parmanent_in_gram_panchayet_name').append('<option value="'+grampanchayatObj.id+'">'+grampanchayatObj.gram_panchayet_name+'</option>');
                        });
                 }
               });
              }  
         
    });

    $('#addressCheckbox').on('click',function(){
      if($(this).is(':checked')) {
          var in_premises_name_number = $('#in_premises_name_number').val();
          var in_street_localoty_name = $('#in_street_localoty_name').val();
          var ben_district_id = $('#ben_district_id').val();
          var in_pre_subdivision = $('#in_pre_subdivision').val();
          var present_ben_municipality_id = $('#present_ben_municipality_id').val();
          var brn_block_id = $('#brn_block_id').val();
          var in_gram_panchayet = $('#in_gram_panchayet').val();
          var present_pre_village_premises = $('#present_pre_village_premises').val();
          var in_police_station_name = $('#in_police_station_name').val();
          var in_pre_post_office = $('#in_pre_post_office').val();
          var in_pre_present_pincode = $('#in_pre_present_pincode').val();

          $('#parmanent_in_premises_name_number').val(in_premises_name_number);
          $('#parmanent_in_street_locality_name').val(in_street_localoty_name);
          $('#withinstate_parmanent_ben_district').val(ben_district_id);
          $('#parmanent_in_pre_subdivision').val(in_pre_subdivision);
          $('#parmanent_ben_municipality_muni_id').val(present_ben_municipality_id);
          $('#parmanent_ben_block').val(brn_block_id);
          $('#parmanent_in_gram_panchayet_name').val(in_gram_panchayet);
          $('#parmanent_in_pre_village_premises').val(present_pre_village_premises);
          $('#parmanent_in_police_station_name').val(in_police_station_name);
          $('#parmanent_in_pre_post_office').val(in_pre_post_office);
          $('#in_pre_parmanent_pincode').val(in_pre_present_pincode);
          } else{
          $('#parmanent_in_premises_name_number').val("");
          $('#parmanent_in_street_locality_name').val("");
          $('#withinstate_parmanent_ben_district').val("");
          $('#parmanent_in_pre_subdivision').val("");
          $('#parmanent_ben_municipality_muni_id').val("");
          $('#parmanent_ben_block').val("");
          $('#parmanent_in_gram_panchayet_name').val("");
          $('#parmanent_in_pre_village_premises').val("");
          $('#parmanent_in_police_station_name').val("");
          $('#parmanent_in_pre_post_office').val("");
          $('#in_pre_parmanent_pincode').val("");
          }

    }) 

      function realURL(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();

         
          reader.onload = function(e){
            var FileSize = input.files[0].size / 1024 ; 
            if (FileSize > 40) {
              alert('File size exceeds 40 KB');
            } else {
              $('#imgbanner').attr('src', e.target.result);
              $('#imgsize').text("Image Size : " + Math.ceil(FileSize) + ' KB');
             }
          }
           reader.readAsDataURL(input.files[0]);
          }   
      }

      $('#in_passport_user_img').change(function(){
        realURL(this);
      })


 

 $('#if_enrolled_borard_of_wakf').change(function () {
    if ($(this).prop("checked")) {
        $('#con_name_of_auqaf').css('display','block');
        return;
    }
     $('#con_name_of_auqaf').css('display','none');
});
     
   

    







  






