@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12 mb-3">
    <a href="{{ route('admins.addreporter') ?? '#' }}" class="btn btn-info">
      <span class="d-none d-sm-inline-block">Ajouter un Reporter&nbsp;&nbsp;</span>
      <i class="fa fa-plus"></i>
    </a>
  </div>
  <div class="col-12">
  <h2 style="text-align: center;">Liste des Reporters</h2>
    <form method="get" action="{{ route('admins.allreporters') }}" class="card">
      <div class="card-header">
        <h3 class="card-title">Tous les reporters</h3>
        <div class="card-tools"> 
          <div class="input-group input-group-m border-radius-0" style="<?=!empty($dsrch)?'width: 100%;':'width: 100%;';?>">
            <input type="text" name="t_search" class="form-control float-right border-radius-0" value="<?=!empty($dsrch)?$dsrch:false;?>" placeholder="Rechercher par nom">
            <div class="input-group-append border-radius-0">
              <button type="submit" class="btn btn-default border-radius-0"><i class="fas fa-search"></i></button>
              <?php if (!empty($dsrch)): ;?>
              <a href="{{ route('admins.allreporters') }}" class="btn btn-dark border-radius-0">Voir liste  <i class="fas fa-list"></i></a>
              <?php endif ;?>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed table-condensed table-striped hovered text-nowrap" style="overflow: auto;">
          <thead>
            <tr>
              <th style="width: 10%;">Photo</th>
              <th style="width: 25%;">Nom</th>
              <th style="width: 45%;">Biographie</th>
              <th colspan="2" style="width: 20%; text-align: center;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($reporters) && count($reporters) > 0)
                @foreach($reporters as $reporter)
                <tr>
                  <td style="width: 10%;">
                    <img src="{{ !empty($reporter->photo_reporter) ? asset('public/uploads/reporters/' . $reporter->photo_reporter) : asset('images/default-avatar.png') }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; margin: 0 auto; display: block;">
                </td>
                  <td style="width: 25%; font-weight: bold; vertical-align: middle;" title="{{ $reporter->nom_reporter }}">{{ $reporter->nom_reporter }}</td>
                  <td style="width: 45%; vertical-align: middle; white-space: normal;">{{ Str::limit($reporter->bio_reporter, 90) }}</td>
                  
                  <td style="width: 10%; text-align: center; vertical-align: middle;">
                      <a href="{{ route('admins.allreporters', ['up' => $reporter->id_reporter]) }}" class="btn btn-info">
                          <span class="d-none d-sm-inline-block">Modifier&nbsp;&nbsp;</span><i class="fa fa-edit"></i>
                      </a>
                  </td>
                  <td style="width: 10%; text-align: center; vertical-align: middle;">
                      <button type="button" data-toggle="modal" data-target="#supreporter{{ $reporter->id_reporter }}" class="btn btn-danger">
                          <span class="d-none d-sm-inline-block">Supprimer&nbsp;&nbsp;</span><i class="fa fa-trash"></i>
                      </button>
                  </td>
                </tr>
                @endforeach
              @else
              <tr style="width: 100%;">
                <td colspan="5" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun reporter enregistré pour le moment ... </span></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      @if(method_exists($reporters, 'links'))
        {{ $reporters->links('contents.apps.templates.blockpagination') }}
      @endif
      </form>
  </div>
</div>
@stop