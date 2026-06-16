@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-alert"></i>Alerte !! L'image a la Une est directement mise a jour ici. Pour les images dans le contenu, veuillez recourir la galerie d'images. <a href="{{route('admins.allpictures')}}" class="btn btn-link">Voir la Galerie d'Images</a></a></span>
        </p> 
    </div>
  <div class="col-12">
    <form method="POST" action="{{route('admins.inspost')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="post_title" placeholder="Titre de l'article *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{session()->get('post_title')}}">
              </div>
            </div> 
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" class="form-control border-radius-0" name="post_chapo" placeholder="Chapô *" rows="2" required="required" value="">{{session()->get('post_chapo')}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input --> 
              <div class="form-group">
                <label>Image à l'Une <span style="color: #f00;">[900 x 700 pixels maximale]</span></label>
                <input type="file" class="form-control border-radius-0" name="post_firstimg" placeholder=""  style="<?=(session()->has('idxfile'))?'border: 1px solid rgba(255,9,0,6)':false;?>">
              </div>
            </div>
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Sous-titre image </label>
                <input type="text" class="form-control border-radius-0" name="post_subtitle" placeholder="Sous-titre image *" required="required" value="{{session()->get('post_subtitle')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input  textarea-->
              <div class="form-group">
                <label>Contenu </label>
                <textarea id="contenuarticle-" rows="100" type="textarea" class="form-control border-radius-0 phxtextarea" name="post_content" style="font-family: 'Agency FB' !important;" placeholder="Ecrivez en long et en large votre contenu ... *" >{{session()->get('post_content')}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div id="divrubprincipal" class="form-group">
                <label for="rubprinarticle">Rubrique Principal &nbsp;<span style="color: red">*</span>&nbsp;: </label>
                <select id="rubprinarticle" type="text" class="form-control border-radius-0" name="post_prinrub" placeholder="" required="required" >
                  @foreach($hallrbprins as $prin)
                    @if($prin->id_prinrub!=7)
                    <option class="style-option-principalrub " value="{{$prin->id_prinrub}}" <?=(session()->has('post_prinrub')&&session()->get('post_prinrub')==$prin->id_prinrub)?"selected='selected'":false;?> selected="selected">{{$prin->desig_prinrub}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-5" style="display: none;">
              <!-- text input -->
              <div id="divrubsecondaire" class="form-group">
                <label for="rubsecondarticle">Rubrique Sécondaire &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="rubsecondarticle" type="text" class="form-control border-radius-0" name="post_secondrub" placeholder="" required="required" >
                  <option value="0"><-- Choix Secondaire --></option>
                  @foreach($hallrbsecs as $sec)
                  <option value="{{$sec->id_secondrub}}" class="style-option-secondrub <?=isset($sec->princrub)?'princrub'.$sec->princrub:false;?>" <?=(session()->has('post_secondrub')&&session()->get('post_secondrub')==$sec->id_secondrub)?"selected='selected'":false;?>>{{$sec->desig_secondrub}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <!-- text input -->
              <div id="divflashstatut" class="form-group">
                <label for="flashstatut">A la Une &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="flashstatut" type="text" class="form-control border-radius-0" name="post_fhstatut" placeholder="" required="required">
                  <option value="0"><-- Choix Statut --></option>
                  @foreach($hallusts as $st)
                  <option value="{{$st->id_alustatut}}" class="" <?=(session()->has('post_fhstatut')&&session()->get('post_fhstatut')==$st->id_alustatut)||($st->id_alustatut==1)?"selected='selected'":false;?> >{{$st->lib_alustatut}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{url('/adallposts')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste des Actualités</span></a>
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