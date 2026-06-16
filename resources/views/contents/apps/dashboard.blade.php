@extends("layouts/appLayout")
@section("layoutContent")
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><a href="{{url('/adallposts')}}"><i class="fas fa-copy"></i></a></span>
          <div class="info-box-content">
            <span class="info-box-text">Articles</span>
            <span class="info-box-number">
              {{$hnbarts}}
            </span> 
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><a href="#"><i class="fa fa-video"></i></a></span>

          <div class="info-box-content">
            <span class="info-box-text">Vidéos</span>
            <span class="info-box-number">{{$hnbvds}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><a href="#"><i class="fa fa-eye"></i></a></span>

          <div class="info-box-content">
            <span class="info-box-text">Visiteur(s) Actif(s)</span>
            <span class="info-box-number">{{$online}} / {{$donline}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><a href="{{url('/adallusers')}}"><i class="fas fa-users"></i></a></span>

          <div class="info-box-content">
            <span class="info-box-text">Utilisateurs </span>
            <span class="info-box-number">{{$hnbusers}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!--  -->
    <div class="row" style="margin: 20px auto;">
      <div class="col-md-12">
        <h3 style="text-align: center;">LES ACTUALITES RECENTES</h3>
        <form method="get" action="{{route('admins.allposts')}}" class="card">
          <!-- /.card-header  -->
          <div class="card-body table-responsive p-0" style="/*max-height: 500px; overflow: auto;*/ ">
            <table class="table table-head-fixed table-condensed table-striped hovered text-nowrap" style="overflow: auto;">
              <thead>
                <tr>
                  <th style="width: 5%;">Image</th>
                  <th style="width: 80%;">Titre</th>
                  <th style="width: 10%;">Date</th>
                  <th style="width: 10%;">Vue(s)</th>
                  <th colspan="2" style="width: 10%;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($artrecs)&&!empty($artrecs))
                    @foreach($artrecs as $art)
                    <?php $dt = date_create($art->datepub_article);?>
                    <tr >
                      <td style="width: 5%;"><img src="{{url('hphx/img/'.$art->image_article)}}" style="width: 70%; margin: 0 auto; padding: 0;"></td>
                      <td style="width: 80%;" title="{{$art->title_article}}">{{Str::limit($art->title_article,255)}}</td>
                      <td style="width: 10%;">@if(!empty($art->datepub_article)){{ $tday = date_format($dt,'d/m/Y') }}@else{{today()->format('d/m/Y')}}@endif</td>
                      <td style="width: 10%;"><span type="button" class="btn btn-default badge">{{$art->view_article}} vue(s)</span></td>
                      <td style="width: 5%;"><a href="{{route('admins.allposts',['up'=>$art->id_article])}}" class="btn btn-info"><span class="d-none d-md-inline-block">Modifier&nbsp;&nbsp;</span><i class="fa fa-edit"></i></a></td>
                      <td style="width: 5%;"><button type="button" data-toggle="modal" data-target="#suppart{{$art->id_article}}" class="btn btn-danger" style=""><span class="d-none d-md-inline-block">Supprimer&nbsp;&nbsp;</span><i class="fa fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                  @else
                  <tr style="width: 100%;">
                    <td colspan="7" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun article enregistré pour le moment ... </span></td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </form>
        <!-- /.card -->
      </div>
      <div class="d-none col-md-6">
        <h3 style="text-align: center;">LES EVENEMENTS</h3>
        <form method="get" action="{{route('admins.allposts')}}" class="card">
          <!-- /.card-header  -->
          <div class="card-body table-responsive p-0" style="/*max-height: 500px; overflow: auto;*/ ">
            <table class="table table-head-fixed table-condensed table-striped hovered text-nowrap" style="overflow: auto;">
              <thead>
                <tr>
                  <th style="width: 5%;">Image</th>
                  <th style="width: 10%;">Titre</th>
                  <th style="width: 10%;">Date</th>
                  <th style="width: 10%;">Vue(s)</th>
                  <th colspan="2" style="width: 10%;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($hallanvarts)&&!empty($hallanvarts))
                  @foreach($hallanvarts as $pbart)
                    <?php $dt = date_create($pbart->datepub_ctranv);?>
                    <tr >
                      <td style="width: 5%;"><img src="{{url('hphx/img/'.$pbart->image_ctranv)}}" style="width: 70%; margin: 0 auto; padding: 0;"></td>
                      <td style="width: 10%;" title="{{$pbart->title_ctranv}}">{{Str::limit($pbart->title_ctranv,15)}}</td>
                      <td style="width: 10%;">@if(!empty($pbart->datepub_ctranv)){{ $tday = date_format($dt,'d/m/Y') }}@else{{today()->format('d/m/Y')}}@endif</td>
                      <td style="width: 10%;"><span type="button" class="btn btn-default badge">{{$pbart->view_ctranv}} vue(s)</span></td>
                      <td style="width: 5%;"><a href="{{route('admins.allanvposts',['up'=>$pbart->id_ctranv])}}" class="btn btn-info"><span class="d-none">Modifier&nbsp;&nbsp;</span><i class="fa fa-edit"></i></a></td>
                      <td style="width: 5%;"><button type="button" data-toggle="modal" data-target="#suppanv{{$pbart->id_ctranv}}" class="btn btn-danger"><span class="d-none">Supprimer&nbsp;&nbsp;</span><i class="fa fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                  @else
                  <tr style="width: 100%;">
                    <td colspan="7" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun Evènement enregistré pour le moment ... </span></td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </form>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!--  -->
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Chaine YouTube</h5>

            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div style="max-height: 300px; overflow-y: auto; overflow-x: hidden;"> 
                <!--/ Plugins FaceBook -->
                  <div id="fb-root" class="col-md-12" style="  width: 100%; margin: 0 auto; padding: 10px 0;/*height: 300px; margin-bottom: 50px;*/ ">
                    <div class="fb-page" data-href="https://www.youtube.com/" data-tabs="timeline" data-width="" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.youtube.com/" class="fb-xfbml-parse-ignore"><a href="https://www.youtube.com/">BURAQ TRANSPORT </a></blockquote></div>
                  </div>
                  <!--// Plugins FaceBook -->
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
          <div class="card-footer text-center">
            Aller sur <a href="{{url('https://www.youtube.com/channel/UC9HQslt8sDovbSNTRCXxYHQ')}}" class="btn btn-danger" target="_blank">YouTube</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Page / Compte Facebook</h5>

            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div style="max-height: 300px; overflow-y: auto; overflow-x: hidden;"> 
                <!--/ Plugins FaceBook -->
                  <div id="fb-root" class="col-md-12" style="  width: 100%; margin: 0 auto; padding: 10px 0;/*height: 300px; margin-bottom: 50px;*/ ">
                    <div class="fb-page" data-href="https://www.facebook.com/" data-tabs="timeline" data-width="" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/">BURAQ TRANSPORT </a></blockquote></div>
                  </div>
                  <!--// Plugins FaceBook -->
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
          <div class="card-footer text-center">
            Aller sur <a href="{{url('https://www.facebook.com/')}}" class="btn btn-primary" target="_blank">Facebook</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <!-- USERS LIST -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Liste de Utilisateurs</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0" style="max-height: 300px; overflow-y: auto; overflow-x: hidden;">
            <ul class="users-list clearfix">
              @if(isset($hallusers))
                @foreach($hallusers as $us)
                <li title="{{$us->lastename_user}} {{$us->firstname_user}}">
                  <img src="{{url('hphx/img/'.$us->profile_photo_path)}}" alt="User Image" class="imguser-size" >
                  <a class="users-list-name" href="#">{{$us->lastename_user}} {{$us->firstname_user}}</a>
                </li>
                @endforeach
              @endif
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="{{url('/adallusers')}}">Voir tous les Utilisateurs</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!--/.card -->
      </div>
    </div>
    <!-- /.row -->
@stop