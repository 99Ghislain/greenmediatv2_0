@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('user.store')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <div class="row">
            <div class="col-md-3 col-12">
              <div id="divposition" class="form-group">
                <label for="type_user_id">Position &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="type_user_id" type="text" class="form-control border-radius-0" name="type_user_id" placeholder="" required="required">
                  <option value="0"><-- Choix Position --></option>
                  @foreach($hallfcs as $fc)
                  <option value="{{$fc->id_type_user}}" class="" <?=($fc->id_type_user==1)?"selected='selected'":false;?> >{{$fc->desig_type_user}}</option>
                  @endforeach
                </select>
              </div> 
            </div>
            <div class="col-sm-9 col-12">
              <!-- text input -->
              <div class="form-group">
                <label for="profile_photo_path">Charger votre Photo <span style="color: #f00;">*</span></label>
                <input id="profile_photo_path" type="file" class="form-control border-radius-0" name="profile_photo_path" placeholder="" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="lastename_user">Nom <span style="color: red;">*</span></label>
                <input id="lastename_user" type="text" class="form-control border-radius-0" name="lastename_user" placeholder="Ex.: KOUADIO" required="required">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="firstname_user">Prénom(s) <span style="color: red;">*</span></label>
                <input id="firstname_user" type="text" class="form-control border-radius-0" name="firstname_user" placeholder="Ex.: Marie-Jeanne" required="required">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                  <label for="email">E-mail (Login) <span style="color: red;">*</span></label>
                  <input id="email" type="mail" class="form-control border-radius-0" name="email" placeholder="Ex.: mariejeanne@gmail.com" required="required">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="contact">Contact <span style="color: red;">*</span></label>
                <input id="contact" type="text" class="form-control border-radius-0" name="contact" placeholder="Ex.: 07 58 90 56 87 " required="required">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="password">Mot de Passe <span style="color: red;">*</span></label>
                <input id="password" type="password" class="form-control border-radius-0" name="password" placeholder="Ex.: rya5-(_RD514" required="required">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="passwordconf">Confirmation<span style="color: red;">*</span></label>
                <input id="passwordconf" type="password" class="form-control border-radius-0" name="passwordconf" placeholder="Ex.:  rya5-(_RD514" required="required">
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
                <a href="{{url('/adallpubs')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste d'Utilisateurs</span></a>
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