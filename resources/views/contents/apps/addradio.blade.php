@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.inspc')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="pc_title" placeholder="Titre de la Podcast *" required="required" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input --> 
              <div class="form-group">
                <label>Image de la Podcast <span style="color: #f00;">[900 x 700]</span></label>
                <input type="file" class="form-control border-radius-0" name="pc_firstimg" placeholder="" >
              </div>
            </div>
            <div class="col-md-6 col-12">
              <!-- text input --> 
              <div class="form-group">
                <label for="pc_link">Lien du podcast [Format YouTube] <span style="color: #f00;"></span></label>
                <div class="input-group">
                  <span class="input-group-addon bg-danger border-radius-0" style="/*border-radius: 6px 0 0 6px;*/ padding: 5px 10px; font-weight: bolder;">https://www.youtube.com/watch?v=</span>
                  <input id="pc_link" type="text" class="form-control border-radius-0" name="pc_link" placeholder="ox9rILtills" value="" required="required">
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
                <a href="{{url('/adallpcs')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste de Podcasts</span></a>
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