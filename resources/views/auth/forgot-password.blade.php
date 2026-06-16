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
                BuraqTrans
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
            <form method="POST" action="{{ route('password.email') }}" class="row g-3 needs-validation" novalidate>
              @csrf
              <div class="col-12 mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control rounded" id="email" placeholder="user@ctfca.com" required autofocus autocomplete="username" />
                <div class="invalid-feedback">Veuillez entrer un addresse mail.</div>
              </div>
              <div class="col-12 mb-2">
                <button class="btn btn-danger rounded w-100" type="submit">Recevoir le Lien de Récupération </button>
              </div>
              <div class="col-12 mb-2">
                <a class="btn btn-link w-100" href="{{route('login')}}">Aller à la page de Connexion </a>
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