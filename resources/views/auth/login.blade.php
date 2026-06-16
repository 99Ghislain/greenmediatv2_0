@extends('layouts/authLayout')
@section('layoutContent')
<main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
              <h3 class="text-center font-weight-light my-4">
                @include('auth.auth-logo-lines')
                <span class="d-none d-lg-block text-uppercase">
                  Green Media Africa
                  <p class="text-xs text-center pb-0 fs-4">Connexion à votre Compte</p>
                </span>
              </h3>
            </div>
            <div class="card-body mb-3">
              <x-validation-errors class="mb-4" />
                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ $value }}
                    </div>
                @endsession
              <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12 mb-2">
                  <label for="email" class="form-label">Email </label>
                  <div class="input-group has-validation">
                    <input type="text" name="email" class="form-control rounded" id="email" placeholder="user@greenmediaafrica.com" required autofocus autocomplete="username" />
                    <div class="invalid-feedback">Veuillez entrer un addresse mail.</div>
                  </div>
                </div>

                <div class="col-12 mb-2">
                  <label for="password" class="form-label">Mot de Passe</label>
                  <input type="password" name="password" class="form-control rounded" id="password" required autocomplete="current-password" />
                  <div class="invalid-feedback">Veuillez entrer votre mot de passe !</div>
                </div>

                <div class="col-12 mb-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" value="true" id="rememberMe">
                    <label class="form-check-label" for="remember_me">Se Rappeler de moi</label>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-danger rounded w-100" type="submit">Connexion <i class="fa fa-lock"></i></button>
                </div>
              </form>

            </div>
            <div class="card-footer text-center py-3">
              <div class="small"> Powered by <a href="">Phoenix Multimedia et Programmation</a></div>
          </div>
          </div>
        </div>
      </div>
    </div>
</main><!-- End #main -->
@endsection
