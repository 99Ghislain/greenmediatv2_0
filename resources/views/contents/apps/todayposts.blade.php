@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
  <h2 style="text-align: center;">Liste des Articles d'Aujourd'hui</h2>
    <form method="get" action="{{route('admins.todayposts')}}" class="card">
      <div class="card-header">
        <h3 class="card-title">Tous les articles [{{today()->format('d/m/Y')}}]</h3>

        <div class="card-tools">
          <div  class="input-group input-group-m border-radius-0" style="<?=!empty($dsrch)?'width: 100%;':'width: 100%;';?>">
            <input type="text" name="t_search" class="form-control float-right border-radius-0" value="<?=!empty($dsrch)?$dsrch:false;?>" placeholder="Rechercher par titre de l'Article">
            <div class="input-group-append border-radius-0">
              <button type="submit" class="btn btn-default border-radius-0"><i class="fas fa-search"></i></button>
              <?php if (!empty($dsrch)): ;?>
              <!-- <div class="input-group"> -->
              <a href="{{route('admins.todayposts')}}" class="btn btn-dark border-radius-0">Voir liste  <i class="fas fa-list"></i></a>
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
              <th style="width: 5%;">Image</th>
              <th style="width: 10%;">Titre</th>
              <th style="width: 5%;">Domaine</th>
              <th style="width: 10%;">Posteur</th>
              <th style="width: 10%;">Date</th>
              <th colspan="2" style="width: 10%;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($hallarts)&&!empty($hallarts))
                @foreach($hallarts as $art)
                <?php $dt = date_create($art->datepub_article);?>
                <tr >
                  <td style="width: 5%;"><img src="{{url('images/'.$art->image_article)}}" style="width: 70%; margin: 0 auto; padding: 0;"></td>
                  <td style="width: 10%;" title="{{$art->title_article}}">{{Str::limit($art->title_article,30)}}</td>
                  <td style="width: 5%;">{{$art->desig_prinrub}}|{{Str::limit($art->desig_secondrub,10)}}</td>
                  <td style="width: 10%;">{{$art->lastename_user}} {{$art->firstname_user}}</td>
                  <td style="width: 10%;">@if(!empty($art->datepub_article)){{ $tday = date_format($dt,'d/m/Y') }}@else{{today()->format('d/m/Y')}}@endif</td>
                  <td style="width: 5%;"><a href="#" class="btn btn-info" disabled="disabled"><span class="d-none d-sm-inline-block">Modifier&nbsp;&nbsp;</span><i class="fa fa-edit"></i></a></td>
                  <td style="width: 5%;"><button type="button" data-toggle="modal" data-target="#suppart{{$art->id_article}}" class="btn btn-danger" style="" disabled="disabled"><span class="d-none d-sm-inline-block">Supprimer&nbsp;&nbsp;</span><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach
              @else
              <tr style="width: 100%;">
                <td colspan="7" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun article enregistré pour le moment ... </span></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- Paginate Block -->
      {{$hallarts->links('admins.templates.blockpagination')}}
      <!-- Paginate Block -->
    </form>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->
@stop