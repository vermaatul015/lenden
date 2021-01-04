<!-- jQuery -->
<script>
    var base_url = "{{ url('/').'/' }}";
    var base_url_admin = "{{ url('/').'/admin/' }}";
</script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<!-- jQuery UI -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('plugins/sweetalert2/sweetalert2.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- Filterizr-->
<script src="{{asset('plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('plugins/lightbox/js/lightbox.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
<script>
    window.translations = {!! Cache::get('translations') !!};
</script>
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('dist/js/jquery-validator-text.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
@if(in_array($data['page'],Config::get('admin_constant.view_resource.crud_generator_custom')))
<script src="{{asset('dist/js/crud_generator.js')}}"></script>
@endif
@if(in_array($data['page'],Config::get('admin_constant.view_resource.lightbox')))
<script src="{{asset('plugins/lightbox/js/lightbox.js')}}"></script>
@endif
@if(in_array($data['page'],Config::get('admin_constant.view_resource.dropzone')))
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
@endif
<script>
  $( "#lang" ).change(function() {
    $("#langForm").submit();
  });
</script>