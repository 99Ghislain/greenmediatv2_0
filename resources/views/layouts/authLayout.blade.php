<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Login GREEN MEDIA AFRICA | <?=(isset($onglet)&&!empty($onglet))?$onglet:false;?> </title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ url('assets/img/short-logo-green-media-white.png') }}">
        {{-- <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}
        <!-- Favicon -->
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
        <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="{{url('plugins/ekko-lightbox/ekko-lightbox.css')}}">
        <!-- summernote --> 
        <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- TinyMCE -->
        <script src="https://cdn.tiny.cloud/1/rcw0511443o7nnx56k3kae9uryfs1pcjqq53m4szbxla6uca/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <!--  <script> -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-V4L4Y45JP3"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'G-V4L4Y45JP3');
        </script>
        <!-- /Google tag (gtag.js)-->
      <style type="text/css">

        .nav-link .active{
          background: #64b802 !important;
        }

        .border-bottom-phx {
          border-bottom: 1px solid #fff;
        }

        .pointer {
          cursor: pointer;
        }

        .pointer-2 {
          cursor: default;
        }

        .imguser-size {
          width: 50px !important; 
          height: 50px !important;
        }

        .imguser-size-2 {
          width: 30px !important; 
          height: 30px !important;
        }

        .btn,.border-radius-0 {
          border-radius: 0;
        }

      </style>
    </head>
    <body class="bg-light">
      <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
        <!-- Layout Content -->
        @yield('layoutContent')
        <!--/ Layout Content -->
        </div>
      </div>
      <!-- jQuery -->
      <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap -->
      <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- jQuery UI -->
      <script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <!-- overlayScrollbars -->
      <script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{url('dist/js/adminlte.js')}}"></script>
      <!-- OPTIONAL SCRIPTS -->
      <script src="{{url('dist/js/demo.js')}}"></script>
      <!-- PAGE PLUGINS -->
      <!-- jQuery Mapael -->
      <script src="{{url('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
      <script src="{{url('plugins/raphael/raphael.min.js')}}"></script>
      <script src="{{url('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
      <script src="{{url('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
      <!-- ChartJS -->
      <script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>
      <!-- Ekko Lightbox -->
      <script src="{{url('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
      <!-- Summernote -->
      <script src="{{url('plugins/summernote/summernote-bs4.min.js')}}"></script>
      <!-- PAGE SCRIPTS -->
      <script src="{{url('dist/js/pages/dashboard2.js')}}"></script>
      <!-- / SCRIPT FACEBOOK -->
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v13.0" nonce="TCKUBA5V"></script>
      <!-- // SCRIPT FACEBOOK -->
      <!-- Filterizr-->
      <script src="{{url('plugins/filterizr/jquery.filterizr.min.js')}}"></script>
      <!-- Page specific script -->
      <script>
        $(function () {
          $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
              alwaysShowClose: true
            });
          });

          $('.filter-container').filterizr({gutterPixels: 3});
          $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
          });
        })
      </script>
      <script type="text/javascript">
        $('.close').on('click',function(){
            $('.alertclose').fadeOut('slow');
        });
      </script>
      <!-- Tiny MCE -->
      <script>
        tinymce.init({
          selector: '#contenuarticle',
          // plugins: ' casechange formatpainter linkchecker autolink lists checklist mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          // plugins: ' linkchecker autolink lists checklist mediaembed pageembed permanentpen tinycomments tinymcespellchecker',
          toolbar: 'casechange checklist  formatpainter pageembed permanentpen',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          toolbar_lang: 'fr',
          tinycomments_author: 'Djedjro Affi Démostaine',
        });
      </script>
      <!-- Tiny MCE -->
      <script type="text/javascript">    
        // CONTROL RUBRIQUE
          $('#divrubprincipal').show();
          $('#divrubsecondaire').show();
          $('#acturubarticle').each(function(){
            $(this).on('click',function(){
              valrub = $(this).val();
              if(valrub==0)
              {
                $('#divrubprincipal').slideDown('slow');
                $('#divrubsecondaire').slideDown('slow');
              }
              if(valrub!=0)
              {
                $('#divrubprincipal').slideUp('slow');
                $('#divrubsecondaire').slideUp('slow');
              }
              // alert(valrub);
            });
          });
          // statactualite
          
          // rubsecondaire
          // CONTROL RUBRIQUE 
          // OPTION PRINCIPAL RUBRIQUE CHE
          $('.style-option-secondrub').hide();
          $('#rubprinarticle').each( function(){
            $(this).on('click',function(){
              parentval = $(this).val();
              $('#rubsecondarticle').val('0');
              $('.style-option-secondrub').hide();
              $('.style-option-secondrub.princrub'+parentval).show();
              $('#divrubprincipal').show();
              if(parentval==0)
              {
                $('#divrubactualite').slideDown('slow');
                $('#divstatactualite').slideDown('slow');
              }
              if(parentval!=0)
              {
                $('#divrubactualite').slideUp('slow');
                $('#divstatactualite').slideUp('slow');
              }
              // alert(parentval);
            });
          });
          // OPTION PRINCIPAL RUBRIQUE
      </script> 
      <script type="text/javascript">
        $('.collapse').collapse();
      </script>
      <script>
        $(function () {
          // Summernote
          $('.phxtextarea').summernote();
        });
      </script>
    </body>
</html>
