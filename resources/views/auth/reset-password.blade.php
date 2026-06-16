@extends('layouts/blankLayout')

@section('title', 'Réinitialiser Mot de Passe')

@section('page-style')
    @vite(['resources/css/app.css'])
@endsection
@section('page-script')
    @vite(['resources/css/app.js'])
@endsection

@section('content')
<main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            @include('auth.auth-logo-lines')<!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Réinitialiser Mot de Passe</h5>
                    <p class="text-center small">Entrer de nouveau votre email & votre mot de passe</p>
                  </div>
                  <x-validation-errors class="mb-4" />
                  <form method="POST" action="{{ route('password.update') }}" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" name="email" class="form-control rounded" id="email" placeholder="user@ctfca.com" value="{{@old('email', $request->email)}}" required autofocus autocomplete="username" />
                      <div class="invalid-feedback">Veuillez entrer un addresse mail !</div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Mot de Passe</label>
                      <input type="password" name="password" class="form-control rounded" id="password" required autocomplete="current-password" />
                      <div class="invalid-feedback">Veuillez entrer votre mot de passe !</div>
                    </div>

                    <div class="col-12">
                      <label for="password_confirmation" class="form-label">Confirmation</label>
                      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="current-password" />
                      <div class="invalid-feedback">Veuillez entrer la confirmation mot de passe !</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember_me" value="true" id="rememberMe">
                        <label class="form-check-label" for="remember_me">Se Rappeler de moi</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-warning w-100" type="submit">Ré-initialisation <i class="fa fa-lock"></i></button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Powered by <a href="https://phoenixmultimedia.pro/">Phoenix Multimedia & Programmation</a>
              </div>

            </div>
          </div>
        </div>

      </section>
    </div>
</main><!-- End #main -->
@endsection
@section('page-scripts')
    @vite('resources/assets/vendor/php-email-form/validate.js')
@endsection

