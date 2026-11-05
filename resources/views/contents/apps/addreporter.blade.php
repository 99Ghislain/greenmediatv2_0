@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-info badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-info-circle"></i> Gestion des reporters : Remplissez les informations ci-dessous pour ajouter un nouveau reporter au système.</span>
        </p> 
    </div>

    @if(session('success'))
    <div class="col-12">
        <div class="alert alert-success border-radius-0">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="col-12">
        <form method="POST" action="{{ route('admins.insreporter') }}" class="card" enctype="multipart/form-data">
            @csrf   
            <div class="card-body">
                <div role="form">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nom et Prénoms &nbsp;<span style="color: red">*</span>&nbsp;:</label>
                                <input type="text" class="form-control border-radius-0" name="nom_reporter" placeholder="Ex: Jean Dupont *" required="required" value="{{ session()->get('nom_reporter') }}">
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Photo de profil <span style="color: #f00;">[Formats: JPG, PNG, WEBP - Max: 2Mo]</span></label>
                                <input type="file" class="form-control border-radius-0" name="photo_reporter" accept="image/*">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Biographie </label>
                                <textarea rows="5" class="form-control border-radius-0" name="bio_reporter" placeholder="Petite description du reporter ...">{{ session()->get('bio_reporter') }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group button float-left" style="width: 100%;">
                            <a href="{{ route('admins.allreporters') }}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class="d-none d-sm-inline-block">&nbsp;Voir la Liste des Reporters</span></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group button float-right" style="width: 100%;">
                            <button type="submit" class="btn btn-success border-radius-0" style="width: 100%; color: #fff;"><span class="d-none d-sm-inline-block">Enregistrer le Reporter&nbsp;</span> <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
    </div>
</div>
@stop