@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-alert"></i>Alerte !! Le logo a la Une est directement mise a jour ici. Pour les images dans le contenu, veuillez recourir la galerie d'images. <a href="{{route('admins.allpictures')}}" class="btn btn-link">Voir la Galerie d'Images</a></a></span>
        </p> 
    </div>
  <div class="col-12">
    <form method="POST" action="{{route('admins.inspart')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Raison sociale </label>
                        <input type="text" class="form-control border-radius-0" name="name_partenaire" placeholder="Raison sociale  *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{session()->get('name_partenaire')}}">
                    </div>
                </div> 
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Logo <span style="color: #f00;">[1600 x 1600 pixels maximale]</span></label>
                        <input type="file" class="form-control border-radius-0" name="logo_partenaire" placeholder=""  style="<?=(session()->has('idxfile'))?'border: 1px solid rgba(255,9,0,6)':false;?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Lien Site Internet </label>
                        <input type="url" class="form-control border-radius-0" name="link_partenaire" placeholder="Site internet *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" value="{{session()->get('link_partenaire')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{route('admins.allpartens')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir les partenaires</span></a>
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