<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css2.css')}}">

    <script src="{{asset('assets/jquery-3.6.0.slim.min.js')}}"></script>
    <script src="{{asset('assets/jquery.min.js')}}"></script>
    <script src="{{asset('assets/popper.min.js')}}"></script>

     <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}"> 
    <script src="{{asset('assets/bootstrap.min.js')}}"></script> 


    <link rel="stylesheet" href="{{asset('assets/jquery.dataTables.css')}}">
    <script src="{{asset('assets/jquery.dataTables.js')}}"></script>

    <link rel="stylesheet" href="{{asset('assets/select2.min.css')}}">
    <script src="{{asset('assets/select2.min.js')}}"></script>
    <title>Document</title>
</head>
<body>
    
@yield('content')
    {{-- Data Table JS --}}
    <script>
        $(document).ready( function () {
            $('#table-id').DataTable();
        } );
        </script>
{{-- Data Table JS --}}

{{------------------------------------ ---------------------------------- ---------------}}

{{-- Select 2 JS --}}
 <script>
    $(document).ready(function() {
    $('#nisn').select2();
});
</script>
{{-- End of Select 2 JS --}}

<script>
    $(document).ready(function() {
    $('#multi-month').select2();
});
</script>


<script>
    jQuery(document).ready(function() {
        jQuery('select').change(function() {
            let nominal = jQuery(this).find(':selected').data('nominal');

            if (!isNaN(nominal)) {
                jQuery('#nominal').val(nominal)
            }
        })
    });
</script>

<script>
    function dataSiswa(){
         var nisn = $('#nisn').val();
         console.log(nisn);

         $.ajax({
             url:"{{ url('pembayaran/get-data/') }}"+ '/' + nisn,
             type:'GET',
             success: function(data){
                 console.log(data);
                 $('#ket').val("Rp." + data['harga'] +  " " + data['bulan']+'/'+data['tahun']);
             },
             error: function (data){
                $('#ket').val("belum pernah bayar spp");
             }
         });
     }
</script>

<script>
    $(document).ready(function() {
        $("body").on("contextmenu", function(e) {
            return false;
          });
      });
  </script>

<style>
    #tambah{
        position: relative;
        left: 400px;
        top: -20px
    }
</style>

</body>
</html>