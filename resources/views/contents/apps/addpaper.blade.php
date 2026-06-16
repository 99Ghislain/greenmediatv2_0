@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.inspp')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <div class="row">
            <div class="col-md-8 col-12">
              <!-- text input -->
              <div class="form-group">
                <label for="pp_firstimg">Charger l' Image <span style="color: #f00;">*</span></label>
                <input id="pp_firstimg" type="file" class="form-control border-radius-0" name="pp_firstimg" placeholder="" >
              </div> 
            </div>
            <div class="col-md-2 col-12">
              <div id="divblock" class="form-group">
                <label for="block">Type &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="block" type="text" class="form-control border-radius-0" name="pp_block" placeholder="" required="required">
                  @foreach($hallpbks as $hbs)
                  <option value="{{$hbs->id_blockpaper}}" class="" >{{$hbs->desig_blockpaper}}</span></option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-2 col-12">
              <!-- text input -->
              <div id="divflashstatut" class="form-group">
                <label for="flashstatut">Statut &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="flashstatut" type="text" class="form-control border-radius-0" name="pp_statut" placeholder="" required="required" readonly="readonly">
                  <option value="0"><-- Choix Statut --></option>
                  @foreach($hallsts as $st)
                  <option value="{{$st->id_fhstatut}}" class="" <?=($st->id_fhstatut==2)?"selected='selected'":false;?>>{{$st->lib_fhstatut}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="d-none col-md-6 col-12">
              <div class="form-group">
                <label for="pp_link">Lien </label>
                <input id="pp_link" type="url" class="form-control border-radius-0" name="pp_link" placeholder="https://daoao.net/" value="https://daoao.net/" readonly="readonly">
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
                <a href="{{url('/adallpapers')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste de Journaux</span></a>
              </div>
            </div>
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-right" style="width: 100%;">
                <button type="submit" class="btn btn-success border-radius-0" style="width: 100%; color: #fff;"><span class=" d-none d-sm-inline-block">Mettre en ligne&nbsp;</span> <i class="fa fa-check"></i></button>
              </div>
            </div>
          </div>
        </div>      
      </div><!-- /.card-header-->
      <!-- /.card-body -->
    <!-- /.card -->
  </form>
</div>
<!-- /.row -->
@stop