@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12 mb-3">
    <a href="{{ route('admins.addredacteur') ?? '#' }}" class="btn btn-info">
      <span class="d-none d-sm-inline-block">Ajouter un Rédacteur&nbsp;&nbsp;</span>
      <i class="fa fa-plus"></i>
    </a>
  </div>
  <div class="col-12">
    <h2 style="text-align: center;">Liste des Rédacteurs</h2>
    
    {{-- Affichage des messages de succès après modification/suppression --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tous les rédacteurs</h3>
        <div class="card-tools"> 
          <form method="get" action="{{ route('admins.allredacteurs') }}">
              <div class="input-group input-group-m border-radius-0" style="width: 100%;">
                <input type="text" name="t_search" class="form-control float-right border-radius-0" value="<?=!empty($dsrch)?$dsrch:'';?>" placeholder="Rechercher par nom">
                <div class="input-group-append border-radius-0">
                  <button type="submit" class="btn btn-default border-radius-0"><i class="fas fa-search"></i></button>
                  <?php if (!empty($dsrch)): ?>
                  <a href="{{ route('admins.allredacteurs') }}" class="btn btn-dark border-radius-0">Voir liste &nbsp;<i class="fas fa-list"></i></a>
                  <?php endif; ?>
                </div>
              </div>
          </form>
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
            @if(isset($redacteurs) && count($redacteurs) > 0)
                @foreach($redacteurs as $redacteur)
                <tr>
                  <td style="width: 10%;">
                      <img src="{{ !empty($redacteur->photo_redacteur) ? asset('public/uploads/redacteurs/'.$redacteur->photo_redacteur) : asset('images/default-avatar.png') }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; margin: 0 auto; display: block;">
                  </td>
                  <td style="width: 25%; font-weight: bold; vertical-align: middle;" title="{{ $redacteur->nom_redacteur }}">{{ $redacteur->nom_redacteur }}</td>
                  <td style="width: 45%; vertical-align: middle; white-space: normal;">{{ Str::limit($redacteur->bio_redacteur, 90) }}</td>
                  
                  <td style="width: 10%; text-align: center; vertical-align: middle;">
                      <!-- Déclencheur du Modal de modification -->
                      <button type="button" data-toggle="modal" data-target="#editredacteur{{ $redacteur->id_redacteur }}" class="btn btn-info">
                          <span class="d-none d-sm-inline-block">Modifier&nbsp;&nbsp;</span><i class="fa fa-edit"></i>
                      </button>
                  </td>
                  <td style="width: 10%; text-align: center; vertical-align: middle;">
                      <!-- Déclencheur du Modal de suppression -->
                      <button type="button" data-toggle="modal" data-target="#supredacteur{{ $redacteur->id_redacteur }}" class="btn btn-danger">
                          <span class="d-none d-sm-inline-block">Supprimer&nbsp;&nbsp;</span><i class="fa fa-trash"></i>
                      </button>
                  </td>
                </tr>

                <!-- =====================================
                     MODAL DE MODIFICATION
                ====================================== -->
                <div class="modal fade" id="editredacteur{{ $redacteur->id_redacteur }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title"><i class="fa fa-edit"></i> Modifier le rédacteur</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admins.updateredacteur', $redacteur->id_redacteur) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body text-left" style="white-space: normal;">
                                    <div class="form-group">
                                        <label for="nom_redacteur">Nom complet <span class="text-danger">*</span></label>
                                        <input type="text" name="nom_redacteur" class="form-control" value="{{ $redacteur->nom_redacteur }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio_redacteur">Biographie</label>
                                        <textarea name="bio_redacteur" class="form-control" rows="4">{{ $redacteur->bio_redacteur }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo_redacteur">Nouvelle Photo (Optionnel)</label>
                                        <input type="file" name="photo_redacteur" class="form-control-file" accept="image/*">
                                        <small class="form-text text-muted">Laissez vide si vous souhaitez conserver la photo actuelle.</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-info">Enregistrer les modifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- =====================================
                     MODAL DE SUPPRESSION
                ====================================== -->
                <div class="modal fade" id="supredacteur{{ $redacteur->id_redacteur }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fa fa-trash"></i> Confirmer la suppression</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admins.deleteredacteur', $redacteur->id_redacteur) }}" method="POST">
                                @csrf
                                <div class="modal-body text-center" style="white-space: normal;">
                                    Êtes-vous sûr de vouloir supprimer le rédacteur <br><strong>{{ $redacteur->nom_redacteur }}</strong> ? <br><br>
                                    <span class="text-danger">Cette action est irréversible.</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
              @else
              <tr style="width: 100%;">
                <td colspan="5" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucun rédacteur enregistré pour le moment ... </span></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      
      @if(isset($redacteurs) && method_exists($redacteurs, 'links'))
        <div class="card-footer">
          {{ $redacteurs->links('contents.apps.templates.blockpagination') }}
        </div>
      @endif
      
    </div>
  </div>
</div>
@stop