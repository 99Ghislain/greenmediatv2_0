@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.inspbpost')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Titre </label> 
                <input type="text" class="form-control border-radius-0" name="post_title" placeholder="Titre de l'article *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{session()->get('post_title')}}">
              </div>
            </div>
          </div>
          <div class="row d-none">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Description / Chapô </label>
                <textarea type="text" class="form-control border-radius-0" name="post_chapo" placeholder="Chapô *" rows="2" value="">{{session()->get('post_chapo')}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input --> 
              <div class="form-group">
                <label>Image à l'Une <span style="color: #f00;">[800 x 600 pixels maximale]</span></label>
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
                <textarea id="contenuarticle-" rows="15" type="textarea" class="form-control border-radius-0 phxtextarea" name="post_content" placeholder="Ecrivez en long et en large votre contenu ... *" >{{session()->get('post_content')}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div id="divrubgrd" class="form-group">
                <label for="rubgrd">Type d'Annonce&nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="rubgrd" type="text" class="form-control border-radius-0" name="post_rubgrd" placeholder="" required="required" >
                  <option value="0"><-- Choix du Type d Annonce --></option>
                  @foreach($hallrbgrd as $rgrd)
                  <option value="{{$rgrd->id_rubgrdgenre}}">{{$rgrd->lib_rubgrdgenre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Date de lecture </label>
                <input type="date" class="form-control border-radius-0" name="post_datereading" placeholder="Date de lecture *" style="<?=(session()->has('idxdatereading'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{session()->get('post_datereading')}}">
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
                <a href="{{url('/adallpbposts')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste des Articles en Publicité</span></a>
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