@extends("layouts/appLayout")
@section("layoutContent")
    <!-- Section Profil -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="row card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <div class="col-12 d-flex flex-column align-items-center mb-3">
                            <img src="{{url('hphx/img/'.Auth::user()->profile_photo_path)}}" alt="{{ Auth::user()->email }}" class="rounded" style="width: 100px;"> 
                            <span class="badge bg-success text-white mt-2">{{ $huser->desig_type_user }}</span>
                            <h5>{{ Auth::user()->lastename_user}}&nbsp;{{Auth::user()->firstname_user_user}}</h5>
                        </div>
                        <div class="col-12 d-flex flex-column align-items-center bg-danger mt-2 rounded">
                            <p class="w-100 mb-2">
                                <label class="d-inlnie-block bolder w-label-detail" >Nom et Prénom(s) </label>&nbsp;:
                                <span>&nbsp;{{Auth::user()->lastename_user}}&nbsp;{{Auth::user()->firstname_user_user}}</span>
                            </p>
                            <p class="w-100 mb-2">
                                <label class="d-inlnie-block bolder w-label-detail" >Email </label>&nbsp;:
                                <span>&nbsp;{{Auth::user()->email}}</span>
                            </p>
                            <p class="w-100 mb-2">
                                <label class="d-inlnie-block bolder w-label-detail" >Contact </label>&nbsp;:
                                <span>&nbsp;{{Auth::user()->contact}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Informations Personnelles</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane active profile-edit pt-3" id="profile-edit">
                            <!-- Profile Edit Form -->
                            <x-validation-errors class="mb-4" />
                            @session('status')
                                @include('_partials.alertSuccess',[$value])
                            @endsession
                        
                            <form id="form-edit-profil" method="POST" action="#" class="row g-3 needs-validation" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 col-md-6 mb-1">
                                    <label for="profile_photo_path" class="form-label">Photo ('Mise à Jour')</label>
                                    <div class="has-validation">
                                        <input type="file" name="profile_photo_path" class="form-control @error('profile_photo_path') is-invalid @enderror" id="profile_photo_path" autofocus autocomplete="photo" />
                                        @error('name')
                                            <div class="invalid-feedback">{{$message}}</div> 
                                        @else
                                            <div class="invalid-feedback">{{__('Veuillez entrer une photo.')}}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
                                    <label for="email" class="form-label">Email [ Utilisateur ]</label>
                                    <div class="has-validation">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') ? Auth::user()->email : Auth::user()->email;}}" placeholder="" required />
                                        @error('email')
                                            <div class="invalid-feedback">{{$message}}</div> 
                                        @else
                                            <div class="invalid-feedback">{{'Veuillez entrer un addresse mail'}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
                                    <label for="lastename_user" class="form-label">Nom</label>
                                    <div class="has-validation">
                                        <input type="text" name="lastename_user" class="form-control @error('lastename_user') is-invalid @enderror" id="lastename_user" placeholder="Kouadio" value="{{old('lastename_user') ? old('lastename_user') : Auth::user()->lastename_user; }}" required autofocus autocomplete="lastename_user" />
                                        @error('lastename_user')
                                            <div class="invalid-feedback">{{$message}}</div> 
                                        @else
                                            <div class="invalid-feedback">{{__('Veuillez entrer son nom de famille.')}}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
                                    <label for="firstname_user" class="form-label">Prénom(s)</label>
                                    <div class="has-validation">
                                        <input type="text" name="firstname_user" class="form-control @error('firstname_user') is-invalid @enderror" id="firstname_user" value="{{old('firstname_user') ? old('firstname_user') : Auth::user()->firstname_user; }}" placeholder="Kouakou" required autofocus autocomplete="firstname_user" />
                                        @error('firstname_user')
                                            <div class="invalid-feedback">{{$message}}</div> 
                                        @else
                                            <div class="invalid-feedback">{{'Veuillez entrer son Prénom'}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
                                    <label for="homeaddress" class="form-label">Lieu d'habitation</label>
                                    <div class="has-validation">
                                        <input type="text" name="homeaddress" class="form-control @error('homeaddress') is-invalid @enderror" id="homeaddress" placeholder="Abidjan" value="{{old('homeaddress') ? old('homeaddress') : Auth::user()->homeaddress; }}" required autofocus autocomplete="homeaddress" />
                                        @error('homeaddress')
                                            <div class="invalid-feedback">{{$message}}</div> 
                                        @else
                                            <div class="invalid-feedback">{{__('Veuillez entrer Lieu d\'habitation')}}</div>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
                                    <label for="contact" class="form-label">Contact(s)</label>
                                    <div class="has-validation">
                                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" id="contact" value="{{old('contact') ? old('contact') : Auth::user()->contact; }}" placeholder="(+225) 07 58 98 45 34" required autofocus autocomplete="contact" />
                                        @error('contact')
                                            <div class="invalid-feedback">{{$message}}</div> 
                                        @else
                                            <div class="invalid-feedback">{{'Veuillez entrer un contact correct'}}</div>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-warning w-100 btn-submit mt-3" type="submit" disabled="disabled">Modifier </button>
                                </div>
                            </form><!-- End Profile Edit Form -->
                        </div>
                    </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Profil -->
@endsection