@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <h2 style="text-align: center;">Liste des Abonnés Newsletter</h2>
    <form method="get" action="{{ route('admins.allnewsletters') }}" class="card">
      <div class="card-header">
        <h3 class="card-title">Tous les abonnés</h3>
        <div class="card-tools"> 
          <div class="input-group input-group-m border-radius-0" style="<?=!empty($dsrch)?'width: 100%;':'width: 100%;';?>">
            <input type="text" name="t_search" class="form-control float-right border-radius-0" value="<?=!empty($dsrch)?$dsrch:false;?>" placeholder="Rechercher par email">
            <div class="input-group-append border-radius-0">
              <button type="submit" class="btn btn-default border-radius-0"><i class="fas fa-search"></i></button>
              <?php if (!empty($dsrch)): ;?>
              <a href="{{ route('admins.allnewsletters') }}" class="btn btn-dark border-radius-0">Voir liste  <i class="fas fa-list"></i></a>
              <?php endif ;?>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed table-condensed table-striped hovered text-nowrap" style="overflow: auto;">
          <thead>
            <tr>
              <th style="width: 15%;">ID</th>
              <th style="width: 45%;">Adresse E-mail</th>
              <th style="width: 20%;">Statut</th>
              <th style="width: 20%;">Date d'inscription</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($abonnees) && count($abonnees) > 0)
                @foreach($abonnees as $abonne)
                <tr>
                  <td style="width: 15%; vertical-align: middle;">{{ $abonne->id }}</td>
                  <td style="width: 45%; font-weight: bold; vertical-align: middle;" title="{{ $abonne->email }}">{{ $abonne->email }}</td>
                  <td style="width: 20%; vertical-align: middle;">
                      <span class="badge" style="background-color: #276036; color: white; padding: 5px 10px;">
                          {{ ucfirst($abonne->statut) }}
                      </span>
                  </td>
                  <td style="width: 20%; vertical-align: middle;">
                      {{ date('d/m/Y à H:i', strtotime($abonne->created_at)) }}
                  </td>
                </tr>
                @endforeach
              @else
              <tr style="width: 100%;">
                <td colspan="4" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun abonné enregistré pour le moment ... </span></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      @if(method_exists($abonnees, 'links'))
        {{ $abonnees->links('contents.apps.templates.blockpagination') }}
      @endif
      
    </form>
  </div>
</div>
@stop