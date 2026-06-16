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

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1><i class="bi bi-person-x"></i></h1>
        <h2>Vous avez été suspendu.</h2>
        <p class="mt-2 mb-4">
            Pour tout besoin, Veuillez contacter votre Administrateur / Informaticien !!
        </p>
        <!-- <div class="img-fluid py-5" style="font-size: x-large;">
            <i class="bi bi-person-x" style="font-size: x-large;"></i>
        </div> -->
        <!-- <img src="{{ url('assets/img/not-found.svg') }}"  alt="Page Not Found"> -->
        <a class="btn" href="{{route('login')}}">Retour Connexion</a>
        <div class="credits mt-2 ">
            Powered by <a href="https://phoenixmultimedia.pro/">Phoenix Multimedia & Programmation</a>
        </div>
      </section>

    </div>
  </main><!-- End #main -->
@endsection
@section('page-scripts')
    @vite('resources/assets/vendor/php-email-form/validate.js')
@endsection
