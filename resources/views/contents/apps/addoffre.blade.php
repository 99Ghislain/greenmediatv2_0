@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-alert"></i>Alerte !! L'image a la Une est directement mise a jour ici. Pour les images dans le contenu, veuillez recourir la galerie d'images. <a href="{{route('admins.allpictures')}}" class="btn btn-link">Voir la Galerie d'Images</a></a></span>
        </p> 
    </div>
  <div class="col-12">
    <form method="POST" action="{{route('admins.insoffre')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <div class="row">
            <div class="col-sm-12 col-md-4">
                <!-- text input --> 
                <div class="form-group">
                  <label>Image<span style="color: #f00;">[1600 x 1600 pixels maximale]</span></label>
                  <input type="file" class="form-control border-radius-0" name="image_offre" placeholder=""  style="<?=(session()->has('idxfile'))?'border: 1px solid rgba(255,9,0,6)':false;?>">
                </div>
            </div>
            <div class="col-sm-7 col-md-5">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="title_offre" placeholder="Titre *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{session()->get('title_offre')}}">
              </div>
            </div>
            <div class="col-sm-5 col-md-3">
                <!-- text input -->
                <div id="divrubprincipal" class="form-group">
                  <label for="typeoffre_id_id">Type d'Offre &nbsp;<span style="color: red">*</span>&nbsp;: </label>
                  <select id="typeoffre_id_id" type="text" class="form-control border-radius-0" name="typeoffre_id" placeholder="" required="required" >
                    @foreach($hallrbprins as $prin)
                      <option class="style-option-principalrub " value="{{$prin->id}}" <?=(session()->has('typeoffre_id')&&session()->get('typeoffre_id')==$prin->id_prinrub)?"selected='selected'":false;?> selected="selected">{{$prin->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" class="form-control border-radius-0" name="desc_offre" placeholder="Pétit description" rows="1" required="required" value="">{{session()->get('desc_offre')}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input  textarea-->
              <div class="form-group">
                <label>Contenu </label>
                <textarea id="contenuarticle-" rows="100" type="textarea" class="form-control border-radius-0 phxtextarea" name="content_offre" placeholder="Ecrivez en long et en large votre contenu ... *" >{{session()->get('content_offre')}}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{url('/adalloffres')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste des Offres d'emploi</span></a>
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
    <!-- /.card -->
  </form>
</div>
<!-- /.row -->
@stop