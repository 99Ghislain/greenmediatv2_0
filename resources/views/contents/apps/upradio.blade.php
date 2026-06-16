@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.updatepc')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div class="row" style="margin: 10px auto 20px auto;">
          <div class="col-sm-12">
            <!-- text input--> 
            <div class="">
              <img src="{{url('hphx/img/'.huppcs[0]->image_about)}}" style="/*min-width: 300px;*/ max-height: 350px;">
            </div>
          </div>
          <hr/>
        </div>
        <div class="col-sm-2 d-none">
          <!-- text input -->
          <div class="form-group">
            <label>ID </label>
            <input type="text" class="form-control border-radius-0 " name="pc_id" placeholder="ID du Podcast *" required="required" value="{{huppcs[0]->id_about}}">
          </div>
        </div> 
        <input type="text" class="form-control border-radius-0 d-none" name="pc_imgfirst" placeholder="image *" required="required" value="{{huppcs[0]->image_about}}">
        <!--  -->
        <div role="form">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="pc_title" placeholder="Titre du Podcast *" required="required" value="{{huppcs[0]->title_about}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input --> 
              <div class="form-group">
                <label>Image du Podcast <span style="color: #f00;">[900 x 700]</span></label>
                <input type="file" class="form-control border-radius-0" name="pc_firstimg" placeholder="" >
              </div>
            </div>
            <div class="col-md-6 col-12">
              <!-- text input  d-none--> 
              <div class="form-group">
                <label for="pc_link">Lien du Podcast [Format YouTube]<span style="color: #f00;">*</span></label>
                <div class="input-group">
                  <span class="input-group-addon bg-danger border-radius-0" style="/*border-radius: 6px 0 0 6px;*/ padding: 5px 10px; font-weight: bolder;">https://www.youtube.com/watch?v=</span>
                  <input id="pc_link" type="text" class="form-control border-radius-0" name="pc_link" placeholder="ox9rILtills" value="{{huppcs[0]->linkyoutube_about}}" required="required">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{url('/adallradios')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste de Podcasts</span></a>
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
  </form>
</div>
<!-- /.row -->
@stop