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
    <h2 style="text-align: center;">Liste de Partenaires</h2>
    <form method="get" action="{{route('admins.allpartens')}}" class="card"> 
      <div class="card-header">
        <h3 class="card-title">Tous les Partenaires</h3>

        <div class="card-tools">
          <div  class="input-group input-group-m border-radius-0" style="<?=!empty($dsrch)?'width: 100%;':'width: 100%;';?>">
            <input type="text" name="t_search" class="form-control float-right border-radius-0" value="<?=!empty($dsrch)?$dsrch:false;?>" placeholder="Rechercher par titre d Infos. A Propos">
            <div class="input-group-append border-radius-0">
              <button type="submit" class="btn btn-default border-radius-0"><i class="fas fa-search"></i></button>
              <?php if (!empty($dsrch)): ;?>
              <a href="{{route('admins.allpartens')}}" class="btn btn-dark border-radius-0">Voir liste  <i class="fas fa-list"></i></a>
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
              <th style="width: 5%;">Logo</th>
              <th style="width: 10%;">Raison Sociale</th>
              <th style="width: 10%;">Date</th>
              <th colspan="3" style="width: 12%;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($hallparts)&&!empty($hallparts))
                @foreach($hallparts as $part)
                <?php 
                  $dt = date_create($part->created_at); 
                ;?>
                <tr >
                  <td style="width: 5%;"><img src="{{url('hphx/img/'.$part->logo_partenaire)}}" style="width: 70%; margin: 0 auto; padding: 0;"></td>
                  <td style="width: 10%;" title="{{$part->name_partenaire}}">{{Str::limit($part->name_partenaire,30)}}</td>
                  <td style="width: 10%;">@if(!empty($part->created_at)){{ $tday = date_format($dt,'d/m/Y') }}@else{{today()->format('d/m/Y')}}@endif</td>
                  <td style="width: 5%;"><a href="{{route('admins.allpartens',['up'=>$part->id_partenaire])}}" class="btn btn-info"><span class="d-none d-sm-inline-block">Modifier&nbsp;&nbsp;</span><i class="fa fa-edit"></i></a></td>
                  <td style="width: 5%;"><button type="button" data-toggle="modal" data-target="#suppart{{$part->id_partenaire}}" class="btn btn-danger"><span class="d-none d-sm-inline-block">Supprimer&nbsp;&nbsp;</span><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach
              @else
              <tr style="width: 100%;">
                <td colspan="7" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun nouvel enregistré pour le moment ... </span></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- Paginate Block -->
      {{$hallparts->links('contents.apps.templates.blockpagination')}}
      <!-- Paginate Block -->
    </form>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->
@stop