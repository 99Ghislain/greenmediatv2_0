@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12 mb-3">
      <a href="{{route('admins.addpost')}}" class="btn btn-info">
        <span class="d-none d-sm-inline-block">Ajouter&nbsp;&nbsp;</span>
        <i class="fa fa-plus"></i>
      </a>
    </div>
  <div class="col-12">
    <h2 style="text-align: center;">Ajout de nouvel album </h2>
    <div class="col-12 mb-4">
        <form method="POST" action="{{route('admins.insalbum')}}" class="card" enctype="multipart/form-data">
        @csrf   
        <div class="card-body ">
            <!-- Informations sur  -->
            <div role="form">
                <div class="row">
                    <div class=" col-md-6">
                        <div class="form-group">
                            <label for="name"> Nom <span style="color: red;">*</span></label>
                            <input id="name" type="text" class="form-control border-radius-0" name="name" placeholder="Ex.: Nom de l'Album " required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="img">Charger une Image <span style="color: #f00;">*</span></label>
                            <input id="img" type="file" class="form-control border-radius-0" name="img" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group button float-left" style="width: 100%;">
                        <a href="{{url('/adaddpicture')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Ajouter une nouvelle image</span></a>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group button float-right" style="width: 100%;">
                        <button type="submit" class="btn btn-success border-radius-0" style="width: 100%; color: #fff;"><span class=" d-none d-sm-inline-block">Ajouter un nouvel album&nbsp;</span> <i class="fa fa-check"></i></button>
                    </div>
                    </div>
                </div>
            </div>      
        </div>
            <!-- /.card -->
        </form>
    </div>
    
    <h2 style="text-align: center;">Toutes les albums photos </h2>
    <form method="get" action="{{route('admins.allpubs')}}" class="">
        <!-- /.card-header  -->
        <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <div class="card-title">
                        Liste des albums
                    </div>
                </div> 
                <div class="card-body">
                    <div class="row">
                    @if(isset($halbums)&&!empty($halbums))
                        @foreach($halbums as $img)
                        <div class="position-relative col-md-4 col-12 my-3">
                            <a href="{{url('hphx/img/'.$img->img)}}" data-toggle="lightbox" data-title="{{$img->name}}" data-gallery="gallery">
                                <img src="{{url('hphx/img/'.$img->img)}}" class="img-fuild img-thumbnail mb-2" alt="{{$img->name}}"/>
                            </a>
                            <div class="position-absolute bg-warning p-2 m-2" style="bottom: 0; opacity: 5.5; left: 0; right: 0; font-size: 14px;"> 
                                <span class="">&nbsp;<i class="fa fa-images float-left"></i>{{$img->nb_pic}}</span><br>
                                <span class="">&nbsp;<i class="fa fa-edit float-left"></i> {{$img->name}} </span>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div style="width: 100%;">
                            <span colspan="7" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun album enregistré pour le moment ... </span></span>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
      <br>
      <!-- Paginate Block -->
      {{$halbums->links('contents.apps.templates.blockpagination')}}
      <!-- Paginate Block -->
    </form>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->
@stop