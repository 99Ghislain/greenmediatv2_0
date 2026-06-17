<!DOCTYPE html>
<html lang="fr">
<head>
  {{-- <meta name="google-site-verification" content="QlfbcTgsbHGeTfMgVBWioDDie6pwGeJUfWNkDxdODpE" /> --}}
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin Green Media Africa | <?=(isset($onglet)&&!empty($onglet))?$onglet:false;?> </title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ url('assets/img/short-logo-green-media-white.png') }}">
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Roboto:wght@300;400;500;700&family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
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

    .bg-btn-green, .nav-link .active{
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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-inline-block" style="margin: auto 5px;">
        <a href="{{url('/')}}" class="nav-link btn btn-primary border-radius-0" style="color: #fff;" target="_blank"><span class=" d-none d-sm-inline-block">Visite le Site Web&nbsp;</span><i class="fa fa-globe"></i></a>
      </li>
      <li class="nav-item d-inline-block" style="margin: auto 5px;">
        <button type="button" class="nav-link btn btn-danger border-radius-0" data-toggle="modal" data-target="#deconnexion" style="color: #fff;">
          <span class=" d-none d-sm-inline-block">Déconnexion&nbsp;</span><i class="fa fa-lock"></i>
        </button>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{route('admins.myprofilus')}}">
          <img src="{{url('hphx/img/'.Auth::user()->profile_photo_path)}}" alt="User Image" class="bg-light rounded" style="width : 25px;"  >
          <span class="" style="weigth: 300%;">{{ Auth::user()->name }}</span> est connectés ...
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  @include('layouts/sections/sidebars/appSidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      @if(session()->has('login_'))
      <div id="" class="row wow fadeInDown alertclose" style="max-width: 70%; margin: 10px auto; /*position: flex;*/ ">
          <div class="col-lg-12 text-center alert alert-success">
            {{session()->get('login_')}} <i class="fa fa-times float-right pointer close"></i>
          </div>
      </div>
      @endif
      @if(session()->has('ok'))
      <div id="" class="row wow fadeInDown alertclose" style="max-width: 70%; margin: 10px auto; /*position: flex;*/ ">
          <div class="col-lg-12 text-center alert alert-success">
            {{session()->get('ok')}} <i class="fa fa-times float-right pointer close"></i>
          </div>
      </div>
      @endif
      @if(session()->has('error'))
      <div id="" class="row wow fadeInDown alertclose" style="max-width: 70%; margin: 10px auto; /*position: flex;*/ ">
          <div class="col-lg-12 text-center alert alert-danger">
            {{session()->get('error')}} <i class="fa fa-times float-right pointer close"></i>
          </div>
      </div>
      @endif
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$onglet}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active">{{$onglet}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid" style="padding: auto 20px !important;">
      @yield('layoutContent')
      </div><!--/. container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <div class="modal fade" id="deconnexion">
      <div class="modal-dialog">
        <div class="modal-content bg-default">
          <div class="modal-header">
            <h4 class="modal-title" style="color: #d10;">Alerte !! Déconnexion</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body" style="color: #000;">
            <p>Désirez vous quitter le Tableau de Board ?? ( Oui / Non ) &hellip;</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
            <form id="logout-form"  method="POST" action="{{ route('logout') }}" x-data class="d-inline">
              @csrf
              <a class="nav-link bg-danger text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Déconnexion') }}&nbsp;<i class="fa fa-power-off"></i>
              </a>
            </form>
          </div>
        </div>
        <!-- /.modal-content { route('connexions.logout')}-->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @if(isset($hallarts)&&($hallarts->count()!=0))
      @foreach($hallarts as $art)
      <div class="modal fade" id="suppart{{$art->id_article}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allposts',['sup'=>$art->id_article])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallservs)&&($hallservs->count()!=0))
    @foreach($hallservs as $serv)
    <div class="modal fade" id="suppserv{{$serv->id}}">
      <div class="modal-dialog">
        <div class="modal-content bg-default">
          <div class="modal-header">
            <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
            <a href="{{ route('admins.allservices',['sup'=>$serv->id])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
  @endif
  <!-- /.modal -->
    @if(isset($hallluarts)&&($hallluarts->count()!=0))
      @foreach($hallluarts as $art)
      <div class="modal fade" id="suppart{{$art->id_article}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allluposts',['sup'=>$art->id_article])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    <!-- /.modal -->
    @if(isset($hallparts)&&($hallparts->count()!=0))
      @foreach($hallparts as $part)
      <div class="modal fade" id="suppart{{$part->id_partenaire}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allpartens',['sup'=>$part->id_partenaire])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallpbarts)&&($hallpbarts->count()!=0))
      @foreach($hallpbarts as $pbart)
      <div class="modal fade" id="supppbart{{$pbart->id_pbarticle}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allpbposts',['sup'=>$pbart->id_pbarticle])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallvds)&&($hallvds->count()!=0))
      @foreach($hallvds as $vd)
      <div class="modal fade" id="supvd{{$vd->id_video}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allvideos',['sup'=>$vd->id_video])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallpcs)&&($hallpcs->count()!=0))
      @foreach($hallpcs as $pc)
      <div class="modal fade" id="suppc{{$pc->id_about}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allradios',['sup'=>$pc->id_about])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallfhs)&&($hallfhs->count()!=0))
      @foreach($hallfhs as $fh)
      <div class="modal fade" id="supfh{{$fh->id_flash}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allflashs',['sup'=>$fh->id_flash])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallfhs)&&($hallfhs->count()!=0))
      @foreach($hallfhs as $fh)
      <div class="modal fade" id="statfh{{$fh->id_flash}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Désactivation de Brèves</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous le mettre ce Brève en "hors-ligne" ?? ( Oui / Non )</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fermer <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.nwflashs',['st'=>$fh->id_flash])}}" class="btn btn-outline-dark btn-warning" >Désactiver <i class="fa fa-check"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->  
    @if(isset($hallpbs)&&($hallpbs->count()!=0))
      @foreach($hallpbs as $pb)
      <div class="modal fade" id="suppb{{$pb->id_pub}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allpubs',['sup'=>$pb->id_pub])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->  
    @if(isset($hallpps)&&($hallpps->count()!=0))
      @foreach($hallpps as $pp)
      <div class="modal fade" id="suppp{{$pp->id_paper}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allpapers',['sup'=>$pp->id_paper])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    
    <!-- /.modal -->
    @if(isset($hallanvarts)&&($hallanvarts->count()!=0))
      @foreach($hallanvarts as $anv)
      <div class="modal fade" id="suppanv{{$anv->id_ctranv}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allanvposts',['sup'=>$anv->id_ctranv])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallpbs)&&($hallpbs->count()!=0))
      @foreach($hallpbs as $pb)
      <div class="modal fade" id="statpb{{$pb->id_pub}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Désactivation Publicité</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous mettre cette Publicité en "hors-ligne" ?? ( Oui / Non )</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fermer <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.nwpubs',['st'=>$pb->id_pub])}}" class="btn btn-outline-dark btn-warning" style="">Désactiver <i class="fa fa-check"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallpps)&&($hallpps->count()!=0))
      @foreach($hallpps as $pp)
      <div class="modal fade" id="statpp{{$pp->id_paper}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Désactivation Journal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous mettre cet Journal en "hors-ligne" ?? ( Oui / Non )</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fermer <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.nwpapers',['st'=>$pp->id_paper])}}" class="btn btn-outline-dark btn-warning" style="">Désactiver <i class="fa fa-check"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    
    <!-- /.modal -->  
    @if(isset($hallus)&&($hallus->count()!=0))
      @foreach($hallus as $us)
      <div class="modal fade" id="supus{{$us->id_user}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous supprimer cette ligne ?? ( Oui / Non ) &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allusers',['sup'=>$us->id_user])}}" class="btn btn-outline-dark" style="color: #d10;">Supprimer <i class="fa fa-trash"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallbks)&&($hallbks->count()!=0))
      @foreach($hallbks as $bk)
      <div class="modal fade" id="emptypb{{$bk->id_blockpub}}">
        <div class="modal-dialog">
          <div class="modal-content bg-default">
            <div class="modal-header">
              <h4 class="modal-title" style="color: #d10;">Alerte !! Désactivation Publicité</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Désirez vous Vider ce block ?? ( Oui / Non )</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fermer <i class="fa fa-times"></i></button>
              <a href="{{ route('admins.allblocks',['bkpbs'=>$bk->id_blockpub])}}" class="btn btn-outline-dark btn-warning" style="">Vider <i class="fa fa-check"></i></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
    @endif
    <!-- /.modal -->
    @if(isset($hallpbks)&&($hallpbks->count()!=0))
    @foreach($hallpbks as $pbk)
    <div class="modal fade" id="emptypb{{$pbk->id_blockpaper}}">
      <div class="modal-dialog">
        <div class="modal-content bg-default">
          <div class="modal-header">
            <h4 class="modal-title" style="color: #d10;">Alerte !! Désactivation </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Désirez vous Vider ce block ?? ( Oui / Non )</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fermer <i class="fa fa-times"></i></button>
            <a href="#" class="btn btn-outline-dark btn-warning" style="">Vider <i class="fa fa-check"></i></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
  @endif
  <!-- /.modal -->
  <!-- Main Footer -->
  <footer class="main-footer">
    &copy; Copyright Green Media Africa | Tous droits réservés. <strong>{{date('Y') <= 2025 ? date('Y'): '2025 - '.date('Y');}}.

    <div class="float-right ">
      <b>Conception & Réalisation par</b> <a href="{{url('https://phoenixmultimediapro.com')}}" target="_blank" title="Contact(s) : (225) 07 58 90 42 43 / 05 56 80 71 19"><img src="{{url('hphx/img/x-logo-phx.png')}}" style="width: 50px;"></a>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
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
    $('.phxtextarea').summernote()
  })
</script>
</body>
</html>
