@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.insvd')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="vd_title" placeholder="Titre de la Vidéo *" required="required" value="">
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
                      <input class="form-check-input" type="radio" name="typevideo_id" id="gridRadios1" value="1" checked="">
                      <label class="form-check-label" for="gridRadios1"><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Vidéo Simple</font></font></label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="typevideo_id" id="gridRadios2" value="2">
                      <label class="form-check-label" for="gridRadios2"><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Live Streaming</font></font></label>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Image de la Vidéo <span style="color: #f00;">[900 x 700]</span></label>
                <input type="file" class="form-control border-radius-0" name="vd_firstimg" placeholder="" >
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="vd_link">Lien de la Vidéo <span style="color: #f00;"></span></label>
                <div class="input-group">
                  <span class="input-group-addon bg-danger border-radius-0" style="/*border-radius: 6px 0 0 6px;*/ padding: 5px 10px; font-weight: bolder;">https://www.youtube.com/watch?v=</span>
                  <input id="vd_link" type="text" class="form-control border-radius-0" name="vd_link" placeholder="ox9rILtills" value="" required="required">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{url('/adallvds')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste de Vidéos</span></a>
              </div>
            </div>
            <div class="col-sm-6">
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