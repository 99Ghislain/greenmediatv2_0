@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-alert"></i>Alerte !! L'image a la Une est directement mise a jour ici. Pour les images dans le contenu, veuillez recourir la galerie d'images. <a href="{{route('admins.allpictures')}}" class="btn btn-link">Voir la Galerie d'Images</a></a></span>
        </p> 
    </div>
  <div class="col-12">
    <form method="POST" action="{{route('admins.updateservice')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          {{--  --}}
          <div class="row" style="margin: 10px auto 20px auto; /*text-align: center;*/ ">
            <div class="col-sm-12">
              <!-- text input--> 
              <div class="">
                <img src="{{url('hphx/img/'.$hupserv[0]->img_service)}}" style="/*min-width: 300px;*/ max-height: 350px;">
              </div>
            </div>
            <hr/> 
          </div>
          <div class="row">
            <div class="col-sm-2 d-none">
              <!-- text input -->
              <div class="form-group">
                <label>ID </label>
                <input type="text" class="form-control border-radius-0 " name="service_id" placeholder="ID de l'article *" required="required" value="{{$hupserv[0]->id}}">
              </div>
            </div>
          </div>
          {{--  --}}
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="title_service" placeholder="Titre du service *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{$hupserv[0]->title_service}}">
              </div>
            </div> 
            <div class="col-sm-6">
              <!-- text input --> 
              <div class="form-group">
                <label>Image à l'Une <span style="color: #f00;">[1600 x 1200 pixels maximale]</span></label>
                <input type="text" class="form-control border-radius-0 d-none" name="firstimg_service" placeholder="image *" required="required" value="{{$hupserv[0]->img_service}}">
                <input type="file" class="form-control border-radius-0" name="img_service" placeholder=""  style="<?=(session()->has('idxfile'))?'border: 1px solid rgba(255,9,0,6)':false;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" class="form-control border-radius-0 phxtextarea" name="descrip_service" placeholder="Chapô *" rows="2" required="required" value="">{{$hupserv[0]->descrip_service}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input  textarea-->
              <div class="form-group">
                <label id="content_service">Contenu </label>
                <textarea id="content_service" rows="300" type="textarea" class="form-control border-radius-0 phxtextarea" name="content_service" placeholder="Ecrivez en long et en large votre contenu ... *" >{{$hupserv[0]->content_service}}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{route('admins.allservices')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste des services</span></a>
              </div>
            </div>
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-right" style="width: 100%;">
                <button type="submit" class="btn btn-success border-radius-0" style="width: 100%; color: #fff;"><span class=" d-none d-sm-inline-block">Enregistrer&nbsp;</span> <i class="fa fa-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header-->
      <!-- /.card-body -->
    <!-- /.card -->
  </form>
</div>
<!-- /.row -->
@stop