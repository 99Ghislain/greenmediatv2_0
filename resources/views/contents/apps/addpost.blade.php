@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-alert"></i>Alerte !! L'image a la Une est directement mise a jour ici. Pour les images dans le contenu, veuillez recourir la galerie d'images. <a href="{{route('admins.allpictures')}}" class="btn btn-link">Voir la Galerie d'Images</a></span>
        </p> 
    </div>
  <div class="col-12">
    <form method="POST" action="{{route('admins.inspost')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur -->
        <div role="form">
          
          <!-- SECTION FRANÇAISE -->
          <h4 class="text-success mb-3" style="font-weight: bold; border-bottom: 2px solid #127319; padding-bottom: 5px;">Version Française (Principal)</h4>
          
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Titre (Français)</label>
                <input type="text" class="form-control border-radius-0" name="post_title" placeholder="Titre de l'article en français *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{session()->get('post_title')}}">
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Description (Français)</label>
                <textarea class="form-control border-radius-0" name="post_chapo" placeholder="Chapô en français *" rows="2" required="required">{{session()->get('post_chapo')}}</textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Contenu (Français)</label>
                <textarea rows="15" class="form-control border-radius-0 phxtextarea" name="post_content" style="font-family: 'Agency FB' !important;" placeholder="Ecrivez en long et en large votre contenu en français ... *">{{session()->get('post_content')}}</textarea>
              </div>
            </div>
          </div>

          <!-- SECTION ANGLAISE -->
          <h4 class="text-warning mt-4 mb-3" style="font-weight: bold; border-bottom: 2px solid #ffa000; padding-bottom: 5px;">Version Anglaise (Optionnelle)</h4>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Titre (English)</label>
                <input type="text" class="form-control border-radius-0" name="title_english" placeholder="Article title in English" value="{{session()->get('title_english')}}">
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Description (English)</label>
                <textarea class="form-control border-radius-0" name="desc_english" placeholder="Summary / Description in English" rows="2">{{session()->get('desc_english')}}</textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Contenu (English)</label>
                <textarea rows="15" class="form-control border-radius-0 phxtextarea" name="content_english" style="font-family: 'Agency FB' !important;" placeholder="Write your full content in English here...">{{session()->get('content_english')}}</textarea>
              </div>
            </div>
          </div>

          <!-- ELEMENTS COMMUNS (Images, Rédacteur, Rubriques) -->
          <h4 class="text-secondary mt-4 mb-3" style="font-weight: bold; border-bottom: 2px solid #6c757d; padding-bottom: 5px;">Paramètres de l'Article</h4>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Image à l'Une <span style="color: #f00;">[900 x 700 pixels maximale]</span></label>
                <input type="file" class="form-control border-radius-0" name="post_firstimg" style="<?=(session()->has('idxfile'))?'border: 1px solid rgba(255,9,0,6)':false;?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Sous-titre image </label>
                <input type="text" class="form-control border-radius-0" name="post_subtitle" placeholder="Sous-titre image *" required="required" value="{{session()->get('post_subtitle')}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="post_redacteur">Rédacteur de l'article &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                    <select id="post_redacteur" class="form-control border-radius-0" name="id_redacteur" required="required">
                        <option value=""><-- Choix du Rédacteur --></option>
                        @foreach($hallredacteurs as $redac)
                            <option value="{{ $redac->id_redacteur }}" {{ (session()->has('id_redacteur') && session()->get('id_redacteur') == $redac->id_redacteur) ? 'selected' : '' }}>
                                {{ $redac->nom_redacteur }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div id="divrubprincipal" class="form-group">
                <label for="rubprinarticle">Rubrique Principale &nbsp;<span style="color: red">*</span>&nbsp;: </label>
                <select id="rubprinarticle" class="form-control border-radius-0" name="post_prinrub" required="required">
                  @foreach($hallrbprins as $prin)
                    @if($prin->id_prinrub!=7)
                    <option class="style-option-principalrub" value="{{$prin->id_prinrub}}" <?=(session()->has('post_prinrub')&&session()->get('post_prinrub')==$prin->id_prinrub)?"selected='selected'":false;?> selected="selected">{{$prin->desig_prinrub}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="col-md-6">
              <div id="divflashstatut" class="form-group">
                <label for="flashstatut">A la Une &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="flashstatut" class="form-control border-radius-0" name="post_fhstatut" required="required">
                  <option value="0"><-- Choix Statut --></option>
                  @foreach($hallusts as $st)
                  <option value="{{$st->id_alustatut}}" <?=(session()->has('post_fhstatut')&&session()->get('post_fhstatut')==$st->id_alustatut)||($st->id_alustatut==1)?"selected='selected'":false;?> >{{$st->lib_alustatut}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

        </div>
        
        <div class="card-footer mt-4">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{url('/adallposts')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class="d-none d-sm-inline-block">&nbsp;Voir la Liste des Actualités</span></a>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group button float-right" style="width: 100%;">
                <button type="submit" class="btn btn-success border-radius-0" style="width: 100%; color: #fff;"><span class="d-none d-sm-inline-block">Enregistrer&nbsp;</span> <i class="fa fa-check"></i></button>
              </div>
            </div>
          </div>
        </div>

      </div>
  </form>
</div>
</div>
@stop