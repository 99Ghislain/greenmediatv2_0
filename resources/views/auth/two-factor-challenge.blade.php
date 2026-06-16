@extends('layouts/blankLayout')

@section('title', 'Authentication à Double facteurs')

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
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center" x-data="{ recovery: false }">

            @include('auth.auth-logo-lines')<!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body" x-data="{ recovery: false }">

                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Authentication à double facteurs</h5>
                        <p class="text-center small">Entrer le Code d\'Authentication ou de Récupération</p>
                    </div>
                    <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                        {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                    </div>

                    <div class="mb-4 text-sm text-gray-600" x-cloak x-show="recovery">
                        {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                    </div>

                    <x-validation-errors class="mb-4" />
                  <form method="POST" action="{{ route('two-factor.login') }}" class="row g-3 needs-validation"  novalidate>
                    @csrf
                    <div class="col-12" x-show="! recovery">
                      <label for="code" class="form-label">code </label>
                      <div class="input-group has-validation">
                        <input type="text" name="code" class="form-control" id="code" placeholder="453 908" inputmode="numeric" autofocus x-ref="code" autocomplete="one-time-code"/>
                        <div class="invalid-feedback">Veuillez entrer le bon code !</div>
                      </div>
                    </div>

                    <div class="col-12" x-cloak x-show="recovery">
                      <label for="recovery_code" class="form-label">Code de Récupération </label>
                      <div class="input-group has-validation">
                        <input type="text" name="recovery_code" class="form-control" id="recovery_code" placeholder="453efefef908" x-ref="recovery_code" autocomplete="one-time-code"/>
                        <div class="invalid-feedback">Veuillez entrer le bon Code de Récupération !</div>
                      </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-secondary w-100 cursor-pointer" x-show="! recovery" x-on:click=" recovery = true;$nextTick(() => { $refs.recovery_code.focus() })">
                            {{ __('Utiliser un Code de Récupération') }}
                        </button>
                    </div>
                    
                    <div class="col-12">
                        <button class="btn btn-secondary w-100 cursor-pointer" x-show="recovery" x-cloak x-show="recovery" x-on:click=" recovery = false;$nextTick(() => { $refs.code.focus() })">
                            {{ __('Utiliser un Code d\'Authentication') }}
                        </button>
                    </div>
                    
                    <div class="col-12">
                        <button class="btn btn-warning w-100">
                            {{ __('Connexion') }}
                        </button>
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

