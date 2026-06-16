@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.updatepp')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <!--  -->
          <div class="row" style="margin: 10px auto 20px auto; /*text-align: center;*/ ">
            <div class="col-sm-12">
              <!-- text input--> 
              <div class="">
                <img src="{{url('hphx/img/'.$huppp[0]->image_paper)}}" style="max-height: 250px;">
              </div>
            </div>
            <hr/>
          </div> 
          <div class="col-sm-2 d-none">
            <!-- text input -->
            <div class="form-group">
              <label>ID </label>
              <input type="text" class="form-control border-radius-0 " name="pp_id" placeholder="ID *" required="required" value="{{$huppp[0]->id_paper}}">
            </div>
          </div>
          <input type="text" class="form-control border-radius-0 d-none" name="pp_imgfirst" placeholder="image *" required="required" value="{{$huppp[0]->image_paper}}">
          <!--  -->
          <div class="row">
            <div class="col-md-8 col-12">
              <!-- text input -->
              <div class="form-group">
                <label for="pp_firstimg">Charger l' Image <span style="color: #f00;">*</span></label>
                <input id="pp_firstimg" type="file" class="form-control border-radius-0" name="pp_firstimg" placeholder="https://daoao.net/" >
              </div>
            </div>
            <div class="col-md-2 col-12">
              <div id="divblock" class="form-group">
                <label for="block">Type &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="block" type="text" class="form-control border-radius-0" name="pp_block" placeholder="" required="required">
                  @foreach($hallpbks as $hs)
                  <option value="{{$hs->id_blockpaper}}" class="" <?=($hs->id_blockpaper==$huppp[0]->blockpaperid_paper)?"selected='selected'":false;?> >{{$hs->desig_blockpaper}} </span></option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-2 col-12">
              <!-- text input -->
              <div id="divflashstatut" class="form-group">
                <label for="flashstatut">Statut &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="flashstatut" type="text" class="form-control border-radius-0" name="pp_statut" placeholder="" required="required" >
                  <option value="0"><-- Choix Statut --></option>
                  @foreach($hallsts as $st)
                  <option value="{{$st->id_fhstatut}}" class="" <?=($st->id_fhstatut==$huppp[0]->statutid_paper)?"selected='selected'":false;?>>{{$st->lib_fhstatut}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="d-none row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="pp_link">Lien </label>
                <input id="pp_link" type="url" class="form-control border-radius-0" name="pp_link" placeholder="https://daoao.net/" value="{{$huppp[0]->linkdest_paper}}" readonly="readonly">
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
                <button type="submit" class="btn btn-primary border-radius-0" style="width: 100%; color: #fff;"><span class=" d-none d-sm-inline-block">Modifier&nbsp;</span> <i class="fa fa-edit"></i></button>
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