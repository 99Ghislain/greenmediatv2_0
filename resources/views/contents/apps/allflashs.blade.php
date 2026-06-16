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
  <h2 style="text-align: center;">Liste des Brèves</h2>
    <form method="get" action="{{route('admins.allflashs')}}" class="card">
      <div class="card-header">
        <h3 class="card-title">Tous les Brèves</h3>

        <div class="card-tools">
          <div  class="input-group input-group-m border-radius-0" style="<?=!empty($dsrch)?'width: 100%;':'width: 100%;';?>">
            <input type="text" name="t_search" class="form-control float-right border-radius-0" value="<?=!empty($dsrch)?$dsrch:false;?>" placeholder="Rechercher par contenu de Brève">
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
              <th style="width: 20%;">Brève</th>
              <th class="d-none" style="width: 10%;">Posteur</th>
              <th style="width: 10%;">Date</th>
              <th style="width: 5%;">Statut</th>
              <th colspan="2" style="width: 10%;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($hallfhs)&&!empty($hallfhs))
                @foreach($hallfhs as $fh)
                <?php $dt = date_create($fh->datedebut_flash);?>
                <tr >
                  <td style="width: 20%;" title="{{$fh->desig_flash}}">{{Str::limit($fh->desig_flash,50)}}</td>
                  <td class="d-none" style="width: 10%;">{{$fh->lastename_user}} {{$fh->firstname_user}}</td>
                  <td style="width: 10%;">@if(!empty($fh->datedebut_flash)){{ $tday = date_format($dt,'d/m/Y') }}@else{{today()->format('d/m/Y')}}@endif</td>
                  <td style="width: 5%;"><span type="button" class="btn <?=($fh->lib_fhstatut=='En Ligne')?'btn-success':'btn-warning';?> badge" onClick="alert('Voir le Bouton Modifer')">{{$fh->lib_fhstatut}}</span></td>
                  <td style="width: 5%;"><a href="{{route('admins.allflashs',['up'=>$fh->id_flash])}}" class="btn btn-info"><span class="d-none d-sm-inline-block">Modifier&nbsp;&nbsp;</span><i class="fa fa-edit"></i></a></td>
                  <td style="width: 5%;"><button type="button" data-toggle="modal" data-target="#supfh{{$fh->id_flash}}" class="btn btn-danger" style=""><span class="d-none d-sm-inline-block">Supprimer&nbsp;&nbsp;</span><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach
              @else
              <tr style="width: 100%;">
                <td colspan="7" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucune Brève enregistré pour le moment ... </span></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- Paginate Block -->
      {{$hallfhs->links('contents.apps.templates.blockpagination')}}
      <!-- Paginate Block -->
    </form>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->
@stop