@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
  <div class="col-12">
    <form method="POST" action="{{route('admins.insvd')}}" class="card" enctype="multipart/form-data">
      @csrf   
      <div class="card-body ">
        <div role="form">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Titre </label>
                <input type="text" class="form-control border-radius-0" name="vd_title" placeholder="Titre de la Vidéo *" required="required" value="">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Type de vidéo (Simple ou Live) </label>
                <br>
                <fieldset class="row mb-3">
                  <div class="col-sm-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="typevideo_id" id="gridRadios1" value="1" checked="">
                      <label class="form-check-label" for="gridRadios1"><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Vidéo Simple</font></font></label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="typevideo_id" id="gridRadios2" value="2">
                      <label class="form-check-label" for="gridRadios2"><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Live Streaming</font></font></label>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Image de la Vidéo <span style="color: #f00;">[900 x 700]</span></label>
                <input type="file" class="form-control border-radius-0" name="vd_firstimg" placeholder="" >
              </div>
            </div>
            
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="vd_link">Lien complet ou ID de la Vidéo <span style="color: #f00;">*</span></label>
                <div class="input-group">
                  <span class="input-group-addon bg-danger border-radius-0" style="padding: 5px 15px; font-weight: bolder; color: white;"><i class="fa fa-youtube-play"></i></span>
                  <input id="vd_link" type="text" class="form-control border-radius-0" name="vd_link" placeholder="Collez le lien YouTube ici..." value="" required="required">
                </div>
                <small style="color: #127319; font-weight: bold; margin-top: 5px; display: block;">
                    Astuce : Collez le lien entier de votre téléphone, le système ne gardera que le code utile !
                </small>
              </div>
            </div>
            </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group button float-left" style="width: 100%;">
                <a href="{{url('/adallvds')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir la Liste de Vidéos</span></a>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group button float-right" style="width: 100%;">
                <button type="submit" class="btn btn-success border-radius-0" style="width: 100%; color: #fff;"><span class=" d-none d-sm-inline-block">Enregistrer&nbsp;</span> <i class="fa fa-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var inputLink = document.getElementById('vd_link');
        
        inputLink.addEventListener('input', function(e) {
            var url = e.target.value;
            
            // On vérifie si c'est un lien YouTube (Formats supportés: youtube.com/watch, youtu.be, youtube.com/shorts)
            var match = url.match(/(?:youtube(?:-nocookie)?\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([^"&?\/\s]{11})/i);
            
            // Si on trouve le code à 11 caractères, on remplace tout le contenu de la case par ce code.
            if (match && match[1]) {
                e.target.value = match[1];
            }
        });
    });
</script>
@stop