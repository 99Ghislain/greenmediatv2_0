@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12 mb-3">
    <a href="{{route('admins.addpost')}}" class="btn btn-info">
      <span class="d-none d-sm-inline-block">Ajouter&nbsp;&nbsp;</span>
      <i class="fa fa-plus"></i>
    </a>
  </div>
  <div class="col-12">
  <h2 style="text-align: center;">Liste des Blocks Carrousel</h2>
    <form method="get" action="{{route('admins.allflashs')}}" class="card">
      <div class="card-header">
        <h3 class="card-title">Tous les Blocks Carrousels</h3>

        <div class="card-tools"> 
          <div  class="input-group input-group-m border-radius-0" style="<?=!empty($dsrch)?'width: 100%;':'width: 100%;';?>">
            <input type="text" name="t_search" class="form-control float-right border-radius-0" value="<?=!empty($dsrch)?$dsrch:false;?>" placeholder="Rechercher par désignation ">
            <div class="input-group-append border-radius-0">
              <button type="submit" class="btn btn-default border-radius-0"><i class="fas fa-search"></i></button>
              <?php if (!empty($dsrch)): ;?>
              <!-- <div class="input-group"> -->
              <a href="{{route('admins.allflashs')}}" class="btn btn-dark border-radius-0">Voir liste  <i class="fas fa-list"></i></a>
              <!-- </div> -->
              <?php endif ;?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header  -->
      <div class="card-body table-responsive p-0" style="/*max-height: 500px; overflow: auto;*/ ">
        <table class="table table-head-fixed table-condensed table-striped hovered text-nowrap" style="overflow: auto;">
          <thead>
            <tr>
              <th style="width: 30%;">Désignation</th>
              <th style="width: 10%;">Dimensions</th>
              <th style="width: 5%;">Nb/Max</th>
              <th colspan="2" style="width: 10%;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($hallbks)&&!empty($hallbks))
                @foreach($hallbks as $bk)
                <?php 
                  $l=route('admins.nwpubs',['t_search'=>$bk->desig_blockpub]); 
                  $alclick = "alerte('Aucune Publicités dans ce block');";
                ;?>
                <tr>
                  <td style="width: 30%;" title="{{$bk->desig_blockpub}}">{{Str::limit($bk->desig_blockpub,50)}}</td>
                  <td style="width: 10%;">{{$bk->dimensions_blockpub}}</td>
                  <td style="width: 5%;"><span type="button" class="btn btn-<?=($hnbbk[$bk->id_blockpub]>=$bk->nbmaxpub_blockpub)?'danger':'default';?> badge">{{$hnbbk[$bk->id_blockpub]}}/{{$bk->nbmaxpub_blockpub}} en Ligne</span></td>
                  <td style="width: 5%;"><a href="<?=($hnbbk[$bk->id_blockpub]==0)?'#':$l;?>" class="btn btn-info" style="<?=($hnbbk[$bk->id_blockpub]==0)?'background: #f2f2f2;':false;?>"><span class="d-none d-sm-inline-block">Voir Pubs&nbsp;&nbsp;</span><i class="fa fa-eye"></i></a></td>
                  <td style="width: 5%;"><button type="button" data-toggle="modal" data-target="#emptypb{{$bk->id_blockpub}}" class="btn btn-danger" style="" <?=($hnbbk[$bk->id_blockpub]==0)?"disabled='disabled'":false;?>><span class="d-none d-sm-inline-block">Vider&nbsp;&nbsp;</span><i class="fas fa-box-open"></i></button></td>
                </tr>
                @endforeach
              @else
              <tr style="width: 100%;">
                <td colspan="7" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun flash enregistré pour le moment ... </span></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <br>
      <p class="" style="text-align: left;"><span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70;"><i class=""></i>NB.:  Les Blocks Carrousels suivants sont pleins ! : [@foreach($hallbks as $hs)<b class="<?=($hnbbk[$hs->id_blockpub]>=$hs->nbmaxpub_blockpub)?false:'d-none';?>">{{$hs->desig_blockpub}}-{{$hnbbk[$hs->id_blockpub]}}/{{$hs->nbmaxpub_blockpub}} en Ligne;</b> @endforeach]</span></p>
      <!-- Paginate Block -->
      {{$hallbks->links('contents.apps.templates.blockpagination')}}
      <!-- Paginate Block -->
    </form>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->
@stop