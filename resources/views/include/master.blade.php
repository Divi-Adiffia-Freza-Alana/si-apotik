<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Apotek</title>
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}dist/css/adminlte.min.css?v=<?php echo time();?>">
  <!-- Main style -->
  <link rel="stylesheet" href="{{asset('/')}}css/main.css?v=<?php echo time();?>">
  



  <!-- DataTables -->
  <link  href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

  <!-- datepicker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

  <!-- Navbar -->
  @include('include.navbar')
  <!-- /.navbar -->

  <!--Header-->

  <!-- Main Sidebar Container -->

  @include('include.sidebar')
  <!--Sidebar-->


  @yield('content')

  <!--Footer-->
  
  @include('include.footer')

    <!--Footer-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/')}}plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/')}}plugins/chart.js/Chart.min.js"></script>


<!-- AdminLTE App -->
<script src="{{asset('/')}}dist/js/adminlte.js"></script>



<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bs-custom-file-input/1.1.1/bs-custom-file-input.js" integrity="sha512-HaEy0QUW4eX9WTwu1vDg2AroxE2oAZl0FSGcsLo3OZcwDzhdccdZRUJsed3BHaZgb8ZDj7Ve8iL2nQ6dfkazsA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/')}}dist/js/pages/dashboard.js"></script>


<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!--Jquery Datepicker -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
  $(document).ready(() => {
      $("#foto").change(function () {
          const file = this.files[0];
          if (file) {
              let reader = new FileReader();
              reader.onload = function (event) {
                $('#avatar').attr('src', event.target.result);
                  
              };
              reader.readAsDataURL(file);
          }
      });
  });
</script>

<script>
  $(function () {

    
 
  var tableuser = $('#data-tables-user').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('user.index') }}",
      columns: [
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
          
      ]


  });

  var tablecategory = $('#data-tables-category').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('category.index') }}",
      columns: [
          {data: 'nama', name: 'nama'},
          {data: 'keterangan', name: 'keterangan'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
          
      ]


  })

  var tablebarang = $('#data-tables-barang').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('barang.index') }}",
      columns: [
          {data: 'nama', name: 'nama'},
          {data: 'harga', name: 'harga'},
          {data: 'category.nama', name: 'category.nama'},
          {data: 'keterangan', name: 'keterangan'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
          
      ]


  });


  var tabletransaksi = $('#data-tables-transaksi').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('transaksi.index') }}",
      columns: [
          {data: 'total', name: 'total'},
         // {data: 'category.nama', name: 'category.nama'},
          {data: 'keterangan', name: 'keterangan'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
          
      ]


  });






    
    $(function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'dd-mm-yy',
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true,
     });
    });

    //Initialize Select2 Elements
    $('.select2').select2()

  
    $(document).ready(function () {
      bsCustomFileInput.init()
    })    
 

  });



  
</script>

<!-- Select logic -->
<script src="{{asset('/')}}js/select.js"></script>

<script type="text/javascript">
  var i = 0;
  $("#dynamic-ar").click(function () {
      ++i;
      $("#dynamicAddRemove").append('<tr><td><select id="cat'+i+'" name="category[] " class="form-control selectcategory" style="width: 100%;"></td><td><input type="text" name="addMoreInputFields[' + i +
          '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
          );
          initSelect2();
  });
  $(document).on('click', '.remove-input-field', function () {
      $(this).parents('tr').remove();
  });

  function initSelect2() {
 $('.selectcategory').select2({
        placeholder: 'Select Category',
          ajax: {
              url: '/selectcategory',
              multiple: true,
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                  return {
                      results: $.map(data, function (item) {
                          return {
                              text: item.nama,
                              id: item.id
                          }
                      })
                  };
              },
              cache: true
          }
      });}
</script>

<!-- datatble 
<script type="text/javascript" src="{{asset('/')}}js/datatable.js"></script>
logic -->

</body>
</html>
