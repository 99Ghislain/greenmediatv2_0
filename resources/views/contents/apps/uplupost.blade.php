@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.updatelupost')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <!--  -->
        <div role="form">
          <div class="row" style="margin: 10px auto 20px auto; /*text-align: center;*/ ">
            <div class="col-sm-12">
              <!-- text input--> 
              <div class="">
                <img src="{{url('hphx/img/'.$hupart[0]->image_luarticle)}}" style="/*min-width: 300px;*/ max-height: 350px;">
              </div>
              <span>{{$hupart[0]->imgsubtitle_luarticle}}</span>
            </div>
            <hr/>
          </div> 
          <div class="row">
            <div class="col-sm-2 d-none">
              <!-- text input -->
              <div class="form-group">
                <label>ID </label>
                <input type="text" class="form-control border-radius-0 " name="post_id" placeholder="ID de l'article *" required="required" value="{{$hupart[0]->id_luarticle}}">
              </div>
            </div>
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="post_title" placeholder="Titre de l'article *" required="required" value="{{$hupart[0]->title_luarticle}}">
              </div>
            </div>
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Description / Chapô </label>
                <textarea type="text" class="form-control border-radius-0" name="post_chapo" placeholder="Chapô *" rows=required="required" >{{$hupart[0]->desc_luarticle}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input --> 
              <div class="form-group">
                <label>Image à l'Une <span style="color: #f00;">[800 x 600 pixels maximale]</span></label>
                <input type="file" class="form-control border-radius-0" name="post_firstimg" placeholder="" >
                <input type="text" class="form-control border-radius-0 d-none" name="post_imgfirst" placeholder="image *" required="required" value="{{$hupart[0]->image_luarticle}}">
              </div>
            </div>
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Sous-titre image </label>
                <input type="text" class="form-control border-radius-0" name="post_subtitle" placeholder="Sous-titre image *" required="required" value="{{$hupart[0]->imgsubtitle_luarticle}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Contenu </label>
                <textarea id="contenuarticle-" rows="15" type="textarea" class="form-control textarea border-radius-0 phxtextarea" name="post_content" placeholder="Ecrivez en long et en large votre contenu ... *"><?=$hupart[0]->content_luarticle;?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div id="divrubprincipal" class="form-group">
                <label for="rubprinarticle">Rubrique Principal &nbsp;<span style="color: red">*</span>&nbsp;: </label>
                <select id="rubprinarticle" type="text" class="form-control border-radius-0" name="post_prinrub" placeholder="" required="required" >
                  <option value="0"><-- Choix rubrique --></option>
                  @foreach($hallrbprins as $prin)
                    @if($prin->id_prinrub!=7)
                    <option class="style-option-principalrub " value="{{$prin->id_prinrub}}" <?=($hupart[0]->prinrubid_luarticle==$prin->id_prinrub)?"selected='selected'":false;?>>{{$prin->desig_prinrub}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <!-- text input -->
              <div id="divrubsecondaire" class="form-group">
                <label for="rubsecondarticle">Rubrique Sécondaire &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="rubsecondarticle" type="text" class="form-control border-radius-0" name="post_secondrub" placeholder="" required="required" >
                  <option value="0"><-- Choix Secondaire --></option>
                  @foreach($hallrbsecs as $sec)
                  <option value="{{$sec->id_secondrub}}" class="style-option-secondrub <?=isset($sec->princrub)?'princrub'.$sec->princrub:false;?>"  <?=($hupart[0]->secondrubid_luarticle==$sec->id_secondrub)?"selected='selected'":false;?>>{{$sec->desig_secondrub}}</option>
                  @endforeach
                </select>
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
                <a href="{{url('/adallluposts')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste des Articles</span></a>
              </div>
            </div>
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-right" style="width: 100%;">
                <button type="submit" class="btn btn-primary border-radius-0" style="width: 100%; color: #fff;"><span class=" d-none d-sm-inline-block">Modifier&nbsp;</span> <i class="fa fa-edit"></i></button>
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