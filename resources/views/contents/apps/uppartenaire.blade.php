@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-alert"></i>Alerte !! Le logo a la Une est directement mise a jour ici. Pour les logos dans le contenu, veuillez recourir la galerie d'logos. <a href="{{route('admins.allpictures')}}" class="btn btn-link">Voir la Galerie d'logos</a></a></span>
        </p> 
    </div>
  <div class="col-12">
    <form method="POST" action="{{route('admins.updatepart')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
            <div class="row" style="margin: 10px auto 20px auto; /*text-align: center;*/ ">
                <div class="col-sm-12">
                    <div class="">
                        <img src="{{url('hphx/img/'.$huppart[0]->logo_partenaire)}}" style="/*min-width: 300px;*/ max-height: 350px;">
                    </div>
                </div>
                <hr/> 
            </div>
            <div class="col-sm-2 d-none">
                <!-- text input -->
                <div class="form-group">
                <label>ID </label>
                <input type="text" class="form-control border-radius-0 " name="id_partenaire" placeholder="ID *" required="required" value="{{$huppart[0]->id_partenaire}}">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Raison sociale </label>
                        <input type="text" class="form-control border-radius-0" name="name_partenaire" placeholder="Raison sociale  *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" required="required" value="{{$huppart[0]->name_partenaire}}">
                    </div>
                </div> 
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Logo <span style="color: #f00;">[1600 x 1600 pixels maximale]</span></label>
                        <input type="file" class="form-control border-radius-0" name="logo_partenaire" placeholder=""  style="<?=(session()->has('idxfile'))?'border: 1px solid rgba(255,9,0,6)':false;?>">
                        <input type="text" class="form-control border-radius-0 d-none" name="partenaire_imgfirst" placeholder="image *" required="required" value="{{$huppart[0]->logo_partenaire}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Lien Site Internet </label>
                        <input type="url" class="form-control border-radius-0" name="link_partenaire" placeholder="Site internet *" style="<?=(session()->has('idxtitle'))?'border: 1px solid rgba(255,9,0,6)':false;?>" value="{{$huppart[0]->link_partenaire}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{route('admins.allpartens')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir les partenaires</span></a>
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