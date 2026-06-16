@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-alert"></i>Alerte !! L'image a la Une est directement mise a jour ici. Pour les images dans le contenu, veuillez recourir la galerie d'images. <a href="{{route('admins.allpictures')}}" class="btn btn-link">Voir la Galerie d'Images</a></a></span>
        </p> 
    </div>
  <div class="col-12">
    <form method="POST" action="{{route('admins.updateab')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
            <div class="row" style="margin: 10px auto 20px auto; /*text-align: center;*/ ">
                <div class="col-sm-12">
                    <div class="">
                        <img src="{{url('hphx/img/'.$hupab[0]->image_about)}}" style="/*min-width: 300px;*/ max-height: 350px;">
                    </div>
                </div>
                <hr/> 
            </div>
            
            <div class="col-sm-2 d-none">
                <!-- text input -->
                <div class="form-group">
                  <label>ID </label>
                  <input type="text" class="form-control border-radius-0 " name="id_about" placeholder="ID *" required="required" value="{{$hupab[0]->id_about}}">
                </div>
              </div>
            {{--  --}}
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="title_about" placeholder="Titre *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{$hupab[0]->title_about}}">
              </div>
            </div> 
            <div class="col-sm-6">
                <!-- text input --> 
                <div class="form-group">
                    <label>Image à l'Une <span style="color: #f00;">[1600 x 1600 pixels maximale]</span></label>
                    <input type="file" class="form-control border-radius-0" name="image_about" placeholder=""  style="<?=(session()->has('idxfile'))?'border: 1px solid rgba(255,9,0,6)':false;?>">
                    <input type="text" class="form-control border-radius-0 d-none" name="about_imgfirst" placeholder="image *" required="required" value="{{$hupab[0]->image_about}}">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Contenu</label>
                <textarea type="text" class="form-control border-radius-0 phxtextarea" name="descrip_about" placeholder="Ecrivez en long et en large votre contenu ... *"  rows="300" required="required" value="">{{$hupab[0]->descrip_about}}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{route('admins.allabouts')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir les données des à propos</span></a>
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