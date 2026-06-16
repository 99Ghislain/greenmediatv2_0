@extends('layouts/blankLayout')

@section('title', 'Confirmation de Mot de Passe')

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
                            <h5 class="card-title text-center pb-0 fs-4">Confirmation de Mot de Passe</h5>
                            <p class="text-center small">Entrer votre mot de passe</p>
                        </div>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                        </div>
                        <x-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('password.confirm') }}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-12">
                                <label for="password" class="form-label">Confirmation</label>
                                <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password" autofocus />
                                <div class="invalid-feedback">Veuillez entrer votre mot de passe !</div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-warning w-100" type="submit">Confirmer</button>
                            </div>
                        </form>

                    </div>
                </div>
              <div class="credits">
                Designed by <a href="https://phoenixmultimedia.pro/">Phoenix Multimedia & Programmation</a>
              </div>
            </div>
          </div>
        </div>

      </section>
    </div>
</main><!-- End #main -->
@endsection

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
                  <p class="text-xs text-center pb-0 fs-4">Confirmation de Mot de Passe</p>
                </span>
              </h3>
            </div>
            <div class="card-body mb-3">
              <x-validation-errors class="mb-4" />
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>
                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ $value }}
                    </div>
                @endsession
                <form method="POST" action="{{ route('password.confirm') }}" class="row g-3 needs-validation" novalidate>
                  @csrf
                  <div class="col-12 mb-2">
                      <label for="password" class="form-label">Confirmation</label>
                      <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password" autofocus />
                      <div class="invalid-feedback">Veuillez entrer votre mot de passe !</div>
                  </div>
                  <div class="col-12 mb-2">
                      <button class="btn btn-warning rounded w-100" type="submit">Confirmer</button>
                  </div>
              </form>
            </div>
            <div class="card-footer text-center py-3">
              <div class="small"> Powered by <a href="">Africa Digital Corporation</a></div>
          </div>
          </div>
        </div>
      </div>
    </div>
</main><!-- End #main -->
@endsection


