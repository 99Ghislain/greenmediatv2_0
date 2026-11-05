@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.updatepost')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body">
        
        <!-- ID caché -->
        <input type="text" class="form-control border-radius-0 d-none" name="post_id" value="{{$hupart[0]->id_article}}">

        <!-- 1er BLOC : ÉLÉMENTS EN FRANÇAIS -->
        <div class="card card-outline card-primary mb-4">
          <div class="card-header">
            <h3 class="card-title"><b>1. Contenu en Français</b></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Titre (Français) <span style="color: red">*</span></label>
                  <input type="text" class="form-control border-radius-0" name="post_title" placeholder="Titre de l'article *" required="required" value="{{$hupart[0]->title_article}}">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Description / Chapô (Français) <span style="color: red">*</span></label>
                  <textarea class="form-control border-radius-0" name="post_chapo" placeholder="Chapô *" required="required" rows="3">{{$hupart[0]->desc_article}}</textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Contenu (Français) <span style="color: red">*</span></label>
                  <textarea rows="15" class="form-control textarea border-radius-0 phxtextarea" name="post_content" style="font-family: 'Agency FB' !important;" placeholder="Ecrivez en long et en large votre contenu ... *" required="required"><?=$hupart[0]->content_article;?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 2e BLOC : ÉLÉMENTS EN ANGLAIS -->
        <div class="card card-outline card-secondary mb-4">
          <div class="card-header">
            <h3 class="card-title"><b>2. Contenu en Anglais</b></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Titre (Anglais)</label>
                  <input type="text" class="form-control border-radius-0" name="title_english" placeholder="English Title" value="{{$hupart[0]->title_english}}">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Description / Chapô (Anglais)</label>
                  <textarea class="form-control border-radius-0" name="desc_english" placeholder="English Description / Excerpt" rows="3">{{$hupart[0]->desc_english}}</textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Contenu (Anglais)</label>
                  <textarea rows="15" class="form-control textarea border-radius-0 phxtextarea" name="content_english" style="font-family: 'Agency FB' !important;" placeholder="Write your content in English ...">{{$hupart[0]->content_english}}</textarea>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 3e BLOC : PARAMÈTRES & MÉDIAS COMMUNS -->
        <div class="card card-outline card-success mb-4">
          <div class="card-header">
            <h3 class="card-title"><b>3. Paramètres & Médias Communs</b></h3>
          </div>
          <div class="card-body">
            <!-- Aperçu de l'image actuelle -->
            <div class="row mb-3 text-center">
              <div class="col-sm-12">
                <div>
                  <img src="{{url('hphx/img/'.$hupart[0]->image_article)}}" style="max-height: 250px;" class="img-fluid border">
                </div>
                <small class="text-muted d-block mt-1">Image actuelle : {{$hupart[0]->imgsubtitle_article}}</small>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Changer l'Image à l'Une <span style="color: #f00;">[1600 x 1200 pixels max]</span></label>
                  <input type="file" class="form-control border-radius-0" name="post_firstimg">
                  <input type="text" class="form-control border-radius-0 d-none" name="post_imgfirst" required="required" value="{{$hupart[0]->image_article}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Sous-titre image <span style="color: red">*</span></label>
                  <input type="text" class="form-control border-radius-0" name="post_subtitle" placeholder="Sous-titre image *" required="required" value="{{$hupart[0]->imgsubtitle_article}}">
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
                        <option value="{{ $redac->id_redacteur }}" 
                            {{ (isset($hupart[0]->id_redacteur) && $hupart[0]->id_redacteur == $redac->id_redacteur) ? 'selected' : '' }}>
                            {{ $redac->nom_redacteur }}
                        </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div id="divrubprincipal" class="form-group">
                  <label for="rubprinarticle">Rubrique Principale &nbsp;<span style="color: red">*</span>&nbsp;: </label>
                  <select id="rubprinarticle" class="form-control border-radius-0" name="post_prinrub" required="required">
                    <option value="0"><-- Choix rubrique --></option>
                    @foreach($hallrbprins as $prin)
                      @if($prin->id_prinrub!=7)
                      <option value="{{$prin->id_prinrub}}" <?=($hupart[0]->prinrubid_article==$prin->id_prinrub)?"selected='selected'":false;?>>{{$prin->desig_prinrub}}</option>
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
                    <option value="{{$st->id_alustatut}}" <?=(!empty($hupart[0]->alune_article)&&$hupart[0]->alune_article==$st->id_alustatut)||($st->id_alustatut==1)?"selected='selected'":false;?>>{{$st->lib_alustatut}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- Rubrique secondaire (masquée si besoin selon l'agencement d'origine) -->
            <div class="row" style="display: none;">
              <div class="col-md-12">
                <div id="divrubsecondaire" class="form-group">
                  <label for="rubsecondarticle">Rubrique Secondaire &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                  <select id="rubsecondarticle" class="form-control border-radius-0" name="post_secondrub">
                    <option value="0"><-- Choix Secondaire --></option>
                    @foreach($hallrbsecs as $sec)
                    <option value="{{$sec->id_secondrub}}" class="style-option-secondrub <?=isset($sec->princrub)?'princrub'.$sec->princrub:false;?>" <?=($hupart[0]->secondrubid_article==$sec->id_secondrub)?"selected='selected'":false;?>>{{$sec->desig_secondrub}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Pied de page du formulaire -->
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group button float-left" style="width: 100%;">
              <a href="{{url('/adallposts')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste des actualités</span></a>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group button float-right" style="width: 100%;">
              <button type="submit" class="btn btn-primary border-radius-0" style="width: 100%; color: #fff;"><span class=" d-none d-sm-inline-block">Modifier&nbsp;</span> <i class="fa fa-edit"></i></button>
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>
</div>
@stop