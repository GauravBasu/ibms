<!DOCTYPE html>
<!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
  -->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EM | IBMS Management</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/select2.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
      page. However, you can choose any other skin. Make sure you
      apply the skin class to the body tag so the changes take effect.
      -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pretty-checkbox.min.css') }}" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
  <body class="hold-transition skin-blue sidebar-mini">
    
    @yield('content')
    
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript" ></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}" type="text/javascript"></script>
    <script src="{{ asset("js/select2.full.min.js") }}"></script>
    <script src="{{ asset("js/validation.js") }}"></script>
    <script src="{{ asset("js/application.js") }}"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
      <script>
      $(document).ready(function() {
        //Date picker
        $('#birthDate').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#hiredDate').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#from').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#to').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
    });
</script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
});
</script>

<script>
  
 

</script>
<script src="{{ asset('js/site.js') }}"></script>



<script>

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
  $('#masque_rural_urban').on('change',function(){
  var districtID = $('#district_id').val();
  var masque_rural_urban = $('#masque_rural_urban').val();

  if(masque_rural_urban==1){
    if(districtID){
     $.ajax({
        url:"show",
        type:'get',
        data:'district_id='+ districtID,
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
    if(districtID){
     $.ajax({
        url:"show",
        type:'get',
        data:'muni_district_id='+ districtID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
       success:function(data){
        console.log(data);
            $('#municipality_id').empty();
            $('#municipality_id').append("<option value=''> --Select -- </option>");
            $.each(data,function(index,muniObj){
              console.log(muniObj);
              $('#municipality_id').append('<option value="'+muniObj.id+'">'+muniObj.municipality_name+'</option>');
            });
       }
     });
    }  
  }

 
  });

</script>




<script>

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
  
   $('#ben_rural_urban').on('change',function(){
    var districtID = $('#ben_district_id').val();
    var ben_rural_urban = $('#ben_rural_urban').val();

  if(ben_rural_urban==1){  
    if(districtID){

      $.ajax({
        url:"show",
        type:'get',
        data:'district_id='+ districtID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
      success:function(data){
        //console.log(data);
            $('#brn_block_id').empty();
            $('#brn_block_id').append("<option value=''> --Select -- </option>");
            $.each(data,function(index,blockObj){
              $('#brn_block_id').append('<option value="'+blockObj.id+'">'+blockObj.block_name+'</option>');
            });
       }
     });
    } 
  }


  else if(ben_rural_urban==2){  
    if(districtID){
      $.ajax({
        url:"show",
        type:'get',
        data:'muni_district_id='+ districtID,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
      success:function(data){
        //console.log(data);
            $('#ben_municipality_muni_id').empty();
            $('#ben_municipality_muni_id').append("<option value=''> --Select -- </option>");
            $.each(data,function(index,muniObj){
              console.log(muniObj);
              $('#ben_municipality_muni_id').append('<option value="'+muniObj.id+'">'+muniObj.municipality_name+'</option>');
            });
       }
     });
    } 
  }






   });
</script>
<script type="text/javascript" src="{{ asset("js/bootstrap-filestyle.min.js") }}"></script>
<script type="text/javascript">
$(".btn-refresh").click(function(){
  $.ajax({
     type:'GET',
     url:'refresh_captcha',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});

</script>

<script>
    $(document).ready(function(){
      function realURL(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();

         
          reader.onload = function(e){

            var img = new Image();
            img.src = e.target.result;

            img.onload = function () {
              
              
              img.width = 413;
              img.height = 531;
              
            }
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

      $('#profile_image').change(function(){
        realURL(this);
      })
    });
</script>

<script>
  $(document).ready(function(){
     $('.doc_name').change(function() {
       var value = $(this).val();
        if(value =='aadharCard'){
        $(this).find(function(){
         
           $(this).find('.doc_no').attr("placeholder", "XXXX XXXX XXXX");
            $(this).find('.doc_no').attr('maxlength','14');
          //$(this).find('.doc_no').mask("99/99/9999:99:99:99",{placeholder:"xx/xx/xxxx:xx:xx:xx"});
           //$('.doc_no').mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
          //$(this).find('.doc_no').mask("9999 9999 9999",{placeholder:"XXXX XXXX XXXX"});
        });
      }
      if(value =='drivingLience'){
        $(this).find(function(){
         $(this).find('.doc_no').attr("placeholder", "Driving Lience Number Required");
        });
      }
      if(value =='passport'){
        $(this).find(function(){
         $(this).find('.doc_no').attr("placeholder", "PassPort Number Required ");
        });
      }
      if(value =='voterId'){
        $(this).find(function(){
         $(this).find('.doc_no').attr("placeholder", "Voter Id Number Required");
        });
      }
      });
       
  });
 
</script> 

  </body>
</html>