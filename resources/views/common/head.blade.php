<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{Config::get('admin_constant.title')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.css')}}">
  <!-- Ekko Lightbox -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/ekko-lightbox/ekko-lightbox.css')}}"> -->
  <link rel="stylesheet" href="{{asset('plugins/lightbox/css/lightbox.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('plugins/lightbox/css/lightbox.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote.min.css')}}">
  @if(in_array($data['page'],Config::get('admin_constant.view_resource.dropzone')))
  <link rel="stylesheet" href="{{asset('plugins/dropzone/dropzone.css')}}">
  @endif
  <style>.custom-file-label:after{content:"@lang('setup.browse')"}</style>