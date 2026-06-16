@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12"> 
    <form method="POST" action="{{route('admins.insfh')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Contenu <span style="color: #f00;">[Max : 255 caractères] *</span></label>
                <textarea type="text" class="form-control border-radius-0" name="fh_title" placeholder="Soyez brève !! ..." rows="1" required="required"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-12">
              <!-- text input -->
              <div id="divflashstatut" class="form-group">
                <label for="flashstatut">Statut &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="flashstatut" type="text" class="form-control border-radius-0" name="fh_statut" placeholder="" required="required">
                  <option value="0"><-- Choix Statut --></option>
                  @foreach($hallsts as $st)
                  <option value="{{$st->id_fhstatut}}" class="" <?=($st->id_fhstatut==2)?"selected='selected'":false;?>>{{$st->lib_fhstatut}}</option>
                  @endforeach
                </select>
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
                <a href="{{url('/adallflashs')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste des Brèves</span></a>
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
      </div>
      <!-- /.card-header-->
      <!-- /.card-body -->
    <!-- /.card -->
  </form>
</div>
<!-- /.row -->
@stop