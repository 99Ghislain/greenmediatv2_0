@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.updatevd')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <!--  -->
        <div class="row" style="margin: 10px auto 20px auto; /*text-align: center;*/ ">
          <div class="col-sm-12">
            <!-- text input--> 
            <div class="">
              <img src="{{url('hphx/img/'.$hupvd[0]->image_video)}}" style="/*min-width: 300px;*/ max-height: 350px;">
            </div>
          </div>
          <hr/>
        </div>
        <div class="col-sm-2 d-none">
          <!-- text input -->
          <div class="form-group">
            <label>ID </label>
            <input type="text" class="form-control border-radius-0 " name="vd_id" placeholder="ID de l'video *" required="required" value="{{$hupvd[0]->id_video}}">
          </div>
        </div>
        <input type="text" class="form-control border-radius-0 d-none" name="vd_imgfirst" placeholder="image *" required="required" value="{{$hupvd[0]->image_video}}">
        <!--  -->
        <div role="form">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label> 
                <input type="text" class="form-control border-radius-0" name="vd_title" placeholder="Titre de l'video *" required="required" value="{{$hupvd[0]->title_video}}">
              </div>
            </div>
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Type de vidéo (Simple ou Live) </label>
                <br>
                <fieldset class="row mb-3">
                  <div class="col-sm-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="typevideo_id" id="gridRadios1" value="1" {{$hupvd[0]->typevideo_id=="1"? "checked= '' ":false }} ">
                      <label class="form-check-label" for="gridRadios1"><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Vidéo Simple</font></font></label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="typevideo_id" id="gridRadios2" value="2" {{$hupvd[0]->typevideo_id=="2"? "checked= '' ":false }} >
                      <label class="form-check-label" for="gridRadios2"><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Live Streaming</font></font></label>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input --> 
              <div class="form-group">
                <label>Image de la Vidéo <span style="color: #f00;">[640 x 468]</span></label>
                <input type="file" class="form-control border-radius-0" name="vd_firstimg" placeholder="" >
              </div>
            </div>
            <div class="col-md-6 col-12">
              <!-- text input  d-none--> 
              <div class="form-group">
                <label for="vd_link">Lien de la Vidéo <span style="color: #f00;">*</span></label>
                <div class="input-group">
                  <span class="input-group-addon bg-danger border-radius-0" style="/*border-radius: 6px 0 0 6px;*/ padding: 5px 10px; font-weight: bolder;">https://www.youtube.com/watch?v=</span>
                  <input id="vd_link" type="text" class="form-control border-radius-0" name="vd_link" placeholder="ox9rILtills" value="{{$hupvd[0]->linkyoutube_video}}" required="required">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <!--  -->
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{url('/adallvideos')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste de Vidéos</span></a>
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