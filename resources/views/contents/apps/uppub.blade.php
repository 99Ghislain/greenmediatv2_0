@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.updatepb')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <!-- Informations sur  -->
        <div role="form">
          <!--  -->
          <div class="row" style="margin: 10px auto 20px auto; /*text-align: center;*/ ">
            <div class="col-sm-12">
              <!-- text input--> 
              <div class="">
                <img src="{{url('hphx/img/'.$huppb[0]->image_pub)}}" style="width: 100%; min-height: 160px;">
              </div>
            </div>
            <hr/>
          </div> 
          <div class="col-sm-2 d-none">
            <!-- text input -->
            <div class="form-group">
              <label>ID </label>
              <input type="text" class="form-control border-radius-0 " name="pb_id" placeholder="ID *" required="required" value="{{$huppb[0]->id_pub}}">
            </div>
          </div>
          <input type="text" class="form-control border-radius-0 d-none" name="pb_imgfirst" placeholder="image *" required="required" value="{{$huppb[0]->image_pub}}">
          <!--  -->
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label for="pb_firstimg">Charger l' Image <span style="color: #f00;">*</span></label>
                <input id="pb_firstimg" type="file" class="form-control border-radius-0" name="pb_firstimg" placeholder="https://greenmediaafrica.com/" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="pb_link">Lien </label>
                <input id="pb_link" type="url" class="form-control border-radius-0" name="pb_link" placeholder="https://daoao.net/" value="{{$huppb[0]->linkdest_pub}}" readonly="readonly">
              </div>
            </div>
            <div class="col-md-3 col-12">
              <!-- text input <($hs->id_fhstatut==2)"selected='selected'":false>-->
              <div id="divblock" class="form-group">
                <label for="block">Block &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="block" type="text" class="form-control border-radius-0" name="pb_block" placeholder="" required="required">
                  <option value="0"><-- Choix Block --></option>
                  @foreach($hallbks as $hs)
                  <option value="{{$hs->id_blockpub}}" class="<?=($hnbbk[$hs->id_blockpub]>=$hs->nbmaxpub_blockpub)?'d-none':false;?>" <?=($hs->id_blockpub==$huppb[0]->blockpubid_pub)?"selected='selected'":false;?> >{{$hs->desig_blockpub}} <span type="button" class="btn btn-<?=($hnbbk[$hs->id_blockpub]>=$hs->nbmaxpub_blockpub)?'danger':'success';?> badge">[{{$hnbbk[$hs->id_blockpub]}}/{{$hs->nbmaxpub_blockpub}}]</span></option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-3 col-12">
              <!-- text input -->
              <div id="divflashstatut" class="form-group">
                <label for="flashstatut">Statut &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                <select id="flashstatut" type="text" class="form-control border-radius-0" name="pb_statut" placeholder="" required="required" >
                  <option value="0"><-- Choix Statut --></option>
                  @foreach($hallsts as $st)
                  <option value="{{$st->id_fhstatut}}" class="" <?=($st->id_fhstatut==$huppb[0]->statutid_pub)?"selected='selected'":false;?>>{{$st->lib_fhstatut}}</option>
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
                <a href="{{url('/adallpubs')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste de Publicités</span></a>
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
      <p class="" style="text-align: left;"><span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70;"><i class=""></i>NB.:  Le Block Publicitaire disparait de la liste lorsqu'il est plein ! Liste pleine : [@foreach($hallbks as $hs)<b class="<?=($hnbbk[$hs->id_blockpub]>=$hs->nbmaxpub_blockpub)?false:'d-none';?>">{{$hs->desig_blockpub}}-{{$hnbbk[$hs->id_blockpub]}}/{{$hs->nbmaxpub_blockpub}} ;</b> @endforeach]</span></p>
      <!-- /.card-header-->
      <!-- /.card-body -->
    <!-- /.card -->
  </form>
</div>
<!-- /.row -->
@stop