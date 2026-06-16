@extends('layouts/blankLayout')

@section('title', 'Login')

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
                    <h5 class="card-title text-center pb-0 fs-4">Vérification d'Adresse Mail</h5>
                    <p class="text-center small">Entrer votre email</p>
                  </div>
                  
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('verification.send') }}" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-12">
                            <button class="btn btn-warning w-100" type="submit">Renvoyer la Vérification du Mail <i class="fa fa-plane"></i></button>
                        </div>
                    </form>
                    <a href="{{ route('profile.show') }}" class="d-inline-block">{{ __('Editer votre Profile') }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline-block">
                        @csrf
                        <div class="col-12">
                            <button class="btn btn-warning w-100" type="submit">{{ __('Déconnexion') }}</button>
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
