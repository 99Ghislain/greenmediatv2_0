@extends('layouts/guestLayout')
@section('layoutContent')

<style>
/* =========================================================
   GREEN MEDIA AFRICA — HOMEPAGE PREMIUM 2026
   Design-only: aucun contrôleur, Blade, PHP ou lien modifié.
   Ce CSS est limité à la page d'accueil (fichier index).
   ========================================================= */
.gm-news-section {
    --gm-premium-green: #126d36;
    --gm-premium-dark: #10281e;
    --gm-premium-ink: #16291e;
    --gm-premium-muted: #66766e;
    --gm-premium-orange: #ffa000;
    --gm-premium-line: #e6eee8;
    --gm-premium-shadow: 0 12px 34px rgba(17, 61, 37, .075);
    margin-top: 28px;
}

/* Rythme editorial : titres de rubriques et respirations */
.gm-news-section .acategory-two,
section.home .acategory-two,
section:not(.gm-news-section) > .container .acategory-two {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    max-width: 100%;
    padding: 12px 20px !important;
    background: #f4f8f5 !important;
    background-image: none !important;
    color: #153e27 !important;
    border: 1px solid #dbe9dd !important;
    border-left: 5px solid #ffa000 !important;
    border-radius: 8px !important;
    box-shadow: none !important;
    font-family: 'Montserrat', sans-serif !important;
    font-size: clamp(1rem, 1.6vw, 1.35rem) !important;
    font-weight: 900 !important;
    line-height: 1.3 !important;
    letter-spacing: .045em;
    text-shadow: none !important;
}
.gm-news-section .acategory-two .gm-animated-dot,
section.home .acategory-two .gm-animated-dot,
section:not(.gm-news-section) > .container .acategory-two .gm-animated-dot {
    width: 9px !important;
    height: 9px !important;
    background: #ffa000 !important;
    margin: 0 2px 0 0 !important;
    box-shadow: 0 0 0 4px rgba(255, 160, 0, .13);
    vertical-align: middle;
}
.gm-news-section .acategory-two .gm-animated-dot::after,
section.home .acategory-two .gm-animated-dot::after {
    border-color: rgba(255,160,0,.38) !important;
}
section.home .acategory-two .btn,
section:not(.gm-news-section) > .container .acategory-two .btn {
    border-radius: 50% !important;
    background: #126d36 !important;
    color: #fff !important;
    border: 0 !important;
    width: 31px;
    height: 31px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 !important;
    margin-left: 6px;
    transition: transform .24s ease, background .24s ease;
}
section.home .acategory-two .btn:hover { transform: translateX(3px); background: #0b4723 !important; }

.gm-news-section > .container > hr {
    border: 0;
    border-top: 1px solid #e8efe9;
    margin: 38px 0 32px;
}
section.home { padding-bottom: 20px !important; }
section.home > .container,
.gm-news-section > .container { position: relative; }

/* Langage de cartes unique pour les rubriques existantes */
.gm-main-card,
.gm-side-card,
.gm-grid-card {
    background: #fff !important;
    border: 1px solid #e4ebe6 !important;
    border-radius: 16px !important;
    overflow: hidden;
    box-shadow: 0 9px 27px rgba(12,52,28,.075) !important;
    transition: transform .28s ease, box-shadow .28s ease !important;
}
.gm-main-card:hover,
.gm-side-card:hover,
.gm-grid-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 45px rgba(11,47,27,.14) !important;
}
.gm-main-card { height: 100%; }
.gm-main-img-wrap {
    height: 355px;
    display: block;
    overflow: hidden;
}
.gm-main-img-wrap img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    transition: transform .48s ease !important;
}
.gm-main-card:hover .gm-main-img-wrap img { transform: scale(1.045); }
.gm-main-content { padding: clamp(20px, 2.5vw, 30px) !important; background: #fff; }
.gm-main-title {
    color: #14291e !important;
    font-family: 'Montserrat', sans-serif !important;
    font-size: clamp(1.5rem, 2.3vw, 2.05rem) !important;
    font-weight: 900 !important;
    text-transform: none !important;
    letter-spacing: -.025em;
    line-height: 1.28 !important;
    margin: 15px 0 10px !important;
}
.gm-main-title:hover { color: #126d36 !important; }
.gm-main-desc {
    font-size: .97rem !important;
    line-height: 1.65 !important;
    color: #65756d !important;
    opacity: 1 !important;
    margin: 0 !important;
}
.gm-badge {
    background: #edf6ee !important;
    color: #126d36 !important;
    border: 1px solid #dbe9dc;
    border-radius: 6px !important;
    padding: 6px 10px !important;
    font-size: .68rem !important;
    font-weight: 900 !important;
    letter-spacing: .065em;
}

/* Petits articles verticaux ou horizontaux */
.gm-side-card { margin-bottom: 17px !important; height: auto; }
.gm-side-body { padding: 14px !important; gap: 14px !important; align-items: flex-start; }
.gm-side-img {
    width: 132px !important;
    height: 106px !important;
    max-width: 44%;
    border-radius: 9px !important;
    flex-shrink: 0;
    object-fit: cover;
}
.gm-side-text { min-width: 0; justify-content: flex-start !important; }
.gm-side-title {
    font-family: 'Montserrat', sans-serif !important;
    font-size: clamp(.89rem, 1.2vw, 1.05rem) !important;
    line-height: 1.43 !important;
    font-weight: 800 !important;
    color: #1b3024 !important;
    margin: 0 !important;
    letter-spacing: -.012em;
}
.gm-side-card:hover .gm-side-title { color: #126d36 !important; }
.gm-side-desc-container { padding: 0 15px 5px !important; }
.gm-side-desc,
.gm-side-desc-container .gm-side-desc {
    font-size: .86rem !important;
    color: #647268 !important;
    line-height: 1.55 !important;
    font-weight: 400 !important;
    font-style: normal !important;
    margin: 0 0 10px !important;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
}

/* Pied de carte plus lisible, sans masquer aucune donnée */
.gm-card-footer,
.gm-grid-card .gm-card-footer {
    display: flex !important;
    align-items: center;
    flex-wrap: wrap !important;
    column-gap: 7px;
    row-gap: 7px;
    padding: 12px 15px !important;
    font-size: .74rem !important;
    line-height: 1.35;
    text-transform: none !important;
    background: #f8faf8 !important;
    color: #65746b !important;
    border-top: 1px solid #eaf0ea;
    margin-top: auto;
}
.gm-card-footer a:not(.reading-time) {
    display: inline-block;
    border-radius: 5px !important;
    padding: 5px 8px !important;
    background: #e9f4eb !important;
    color: #147638 !important;
    border: 0;
    font-size: .68rem !important;
    line-height: 1.3;
    font-weight: 900 !important;
    text-transform: uppercase;
}
.gm-card-footer a:not(.reading-time):hover {
    background: #d7ebda !important;
    color: #105a2e !important;
}
.gm-card-footer a.reading-time {
    border: 0 !important;
    background: transparent !important;
    color: #617168 !important;
    padding: 0 !important;
    font-weight: 600 !important;
}
.gm-card-footer a.reading-time:hover { color: #126d36 !important; background: transparent !important; }
.gm-card-footer strong,
.gm-card-footer strong[style] {
    font-size: .72rem !important;
    font-weight: 650 !important;
}
.gm-separator {
    color: #bbc8be !important;
    margin: 0 2px !important;
    font-weight: 400 !important;
}

/* Grille des articles récents, plus aérée */
.gm-grid-col { margin-bottom: 28px !important; }
.gm-grid-card { height: 100%; }
.gm-grid-card > a { display: block; overflow: hidden; }
.gm-grid-img {
    width: 100%;
    height: 185px !important;
    object-fit: cover;
    transition: transform .48s ease;
}
.gm-grid-card:hover .gm-grid-img { transform: scale(1.055); }
.gm-grid-body {
    padding: 18px 17px 16px !important;
    flex: 1;
}
.gm-grid-title,
.gm-grid-title h3,
h3.gm-grid-title {
    color: #183024 !important;
    font-family: 'Montserrat', sans-serif !important;
    font-size: 1.04rem !important;
    line-height: 1.4 !important;
    font-weight: 850 !important;
    letter-spacing: -.015em;
    margin: 0 0 10px !important;
    text-decoration: none !important;
}
.gm-grid-title:hover { color: #126d36 !important; }
.gm-grid-body .gm-side-desc {
    font-size: .86rem !important;
    margin-top: 4px !important;
}

/* La UNE : un véritable visuel editorial grand format */
.gm-news-section > .container > .row:first-of-type { align-items: stretch; margin-bottom: 8px; }
.gm-news-section > .container > .row:first-of-type > hr { display: none; }
.gm-news-section > .container > .row:first-of-type > .col-md-7 {
    display: flex;
    flex-direction: column;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-card {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    min-height: 570px;
    position: relative;
    border: none !important;
    border-radius: 22px !important;
    background: #0b2418 !important;
    box-shadow: 0 20px 45px rgba(5,37,19,.19) !important;
    isolation: isolate;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-img-wrap {
    position: absolute;
    inset: 0;
    height: 100%;
    width: 100%;
    z-index: 0;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-img-wrap::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(4,22,14,.04) 6%, rgba(4,22,14,.34) 43%, rgba(4,22,14,.97) 100%);
    pointer-events: none;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-content {
    z-index: 1;
    position: relative;
    background: transparent !important;
    padding: clamp(25px, 4vw, 42px) !important;
    color: #fff !important;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-title {
    font-size: clamp(1.75rem, 3vw, 2.75rem) !important;
    line-height: 1.18 !important;
    color: #fff !important;
    max-width: 94%;
    letter-spacing: -.035em;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-title:hover { color: #ffcb75 !important; }
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-desc {
    color: rgba(255,255,255,.86) !important;
    font-size: .98rem !important;
    line-height: 1.65 !important;
    max-width: 94%;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-content > div:first-child {
    color: rgba(255,255,255,.87);
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    align-items: center;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-badge {
    background: #ffa000 !important;
    color: #102519 !important;
    border: 0;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-content > div:first-child strong,
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-content > div:first-child strong[style] {
    font-size: .73rem !important;
    color: rgba(255,255,255,.91) !important;
    font-weight: 650 !important;
}
.gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-separator {
    color: rgba(255,255,255,.35) !important;
}
.gm-news-section > .container > .row:first-of-type > .col-md-5 {
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.gm-news-section > .container > .row:first-of-type > .col-md-5 .gm-side-card {
    margin: 0 !important;
    flex: 1;
    justify-content: center;
    border-radius: 15px !important;
    min-height: 0;
}
.gm-news-section > .container > .row:first-of-type > .col-md-5 .gm-side-body {
    padding: 13px 13px 7px !important;
}
.gm-news-section > .container > .row:first-of-type > .col-md-5 .gm-side-img {
    height: 105px !important;
    width: 128px !important;
}
.gm-news-section > .container > .row:first-of-type > .col-md-5 .gm-side-title {
    font-size: .99rem !important;
}
.gm-news-section > .container > .row:first-of-type > .col-md-5 .gm-side-desc-container .gm-side-desc {
    -webkit-line-clamp: 2;
}

/* Boutons "voir plus" actuels, sans toucher aux liens Blade */
.gm-news-section a.btn-outline-success,
section.home a.btn-outline-success {
    border: 1px solid #126d36 !important;
    border-radius: 999px !important;
    color: #126d36 !important;
    background: #fff !important;
    padding: 11px 24px !important;
    font-size: .84rem !important;
    font-weight: 850 !important;
    box-shadow: none !important;
    transition: color .25s ease, transform .25s ease, background .25s ease;
}
.gm-news-section a.btn-outline-success:hover,
section.home a.btn-outline-success:hover {
    color: #fff !important;
    background: #126d36 !important;
    transform: translateY(-2px);
}
.banner .ads img {
    max-width: 100%;
    height: auto;
    border-radius: 13px;
}

/* Responsive: conserve tous les blocs et leur ordre d'origine */
@media (max-width: 1199px) {
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-card { min-height: 520px; }
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-title { font-size: 1.75rem !important; }
    .gm-side-img { width: 108px !important; height: 94px !important; }
    .gm-card-footer { font-size: .7rem !important; }
}
@media (max-width: 991px) {
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-card { min-height: 480px; }
    .gm-news-section > .container > .row:first-of-type > .col-md-5 { gap: 12px; }
    .gm-main-img-wrap { height: 300px; }
    .gm-side-title { font-size: .9rem !important; }
    .gm-grid-img { height: 175px !important; }
}
@media (max-width: 767px) {
    .gm-news-section { margin-top: 12px; }
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-card { min-height: 440px; }
    .gm-news-section > .container > .row:first-of-type > .col-md-5 { display: block; margin-bottom: 18px; }
    .gm-news-section > .container > .row:first-of-type > .col-md-5 .gm-side-card { margin-bottom: 12px !important; }
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-title { font-size: 1.65rem !important; }
    .gm-main-title { font-size: 1.6rem !important; }
    .gm-main-img-wrap { height: 260px; }
    .gm-grid-img { height: 210px !important; }
    .gm-grid-col { margin-bottom: 20px !important; }
}
@media (max-width: 480px) {
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-card { min-height: 390px; border-radius: 15px !important; }
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-content { padding: 22px !important; }
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-title { font-size: 1.4rem !important; max-width: 100%; }
    .gm-news-section > .container > .row:first-of-type > .col-md-7 .gm-main-desc { font-size: .81rem !important; }
    .gm-news-section .acategory-two,
    section.home .acategory-two { padding: 11px 13px !important; font-size: .95rem !important; }
    .gm-side-img { width: 112px !important; height: 94px !important; max-width: 44%; }
    .gm-side-body { gap: 11px !important; }
    .gm-side-title { font-size: .86rem !important; }
    .gm-card-footer { padding: 10px 12px !important; }
}
@media (prefers-reduced-motion: reduce) {
    .gm-main-card, .gm-side-card, .gm-grid-card,
    .gm-main-img-wrap img, .gm-grid-img,
    .gm-news-section a.btn-outline-success, section.home a.btn-outline-success {
        transition-duration: .01ms !important;
        animation-duration: .01ms !important;
    }
}
</style>


<section class="gm-news-section">
    <div class="container">

       <div class="" style="margin-bottom: 30px;"> 
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
        &nbsp; <span class="gm-animated-dot"></span> A LA UNE &nbsp;
            </div>
        </div>
      
        @php
            if(isset($hcarous) && count($hcarous) > 0) {
                $hcarous = $hcarous->where('slug_prinrub', '!=', 'english article')->values();
            }
        @endphp

        @if(isset($hcarous) && count($hcarous) > 0)
            <div class="row">
                
                <div class="col-md-7 mb-4">
                    
    <div class="gm-main-card">
        <a href="{{route('visitors.sgactu',['rub'=>$hcarous[0]->slug_prinrub,'slug'=>$hcarous[0]->slug_article,'ip'=>$hcarous[0]->id_article])}}" class="gm-main-img-wrap">
            <img src="{{url('hphx/img/'.$hcarous[0]->image_article)}}" alt="{{$hcarous[0]->title_article}}">
        </a>
    
        <div class="gm-main-content">
            <div class="d-flex align-items-center flex-wrap">
            <a href="{{route('visitors.allactus',['rub' => $hcarous[0]->slug_prinrub])}}" class="gm-badge">
                {{$hcarous[0]->desig_prinrub}}
            </a>
            <span class="gm-separator">|</span>
            <span style="font-weight: 500; text-transform: none;"><strong style="font-size: 1rem">
                @if(!empty($hcarous[0]->datepub_article))
                    {{ \Carbon\Carbon::parse($hcarous[0]->datepub_article)->locale('fr')->diffForHumans() }}
                @else
                    {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                @endif
            </strong></span>
            <span class="gm-separator">|</span>
            <span>
                <i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hcarous[0]->view_article}}</strong>
            </span>
            <span class="gm-separator">|</span>
            <span>
                <strong style="font-size: 1.3rem">TEMPS DE LECTURE: {{ $hcarous[0]->temps_lecture ?? 1 }} min</strong>
            </span>

        </div>

        <a href="{{route('visitors.sgactu',['rub'=>$hcarous[0]->slug_prinrub,'slug'=>$hcarous[0]->slug_article,'ip'=>$hcarous[0]->id_article])}}" class="gm-main-title">
            <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">{{Str::limit(formatTitle($hcarous[0]->title_article), 120)}}</span>
        </a>
            <p class="gm-main-desc">
            {{Str::limit($hcarous[0]->desc_article, 170)}}
            </p>
            </div>
    </div>
                </div>
                <hr>

                <div class="col-md-5">
                    @php
                        if(isset($hrandarts) && count($hrandarts) > 0) {
                            $hrandarts = $hrandarts->where('slug_prinrub', '!=', 'english article')->values();
                        }
                    @endphp

                    @if(isset($hrandarts)&&count($hrandarts)!=0)
                        @foreach($hrandarts as $hrh)
                            
                            <div class="gm-side-card">
                                <<!-- 1. Le lien englobe tout l'article (image, titre et description) -->
                                <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}" style="display: block; text-decoration: none; color: inherit;">
                                    
                                    <!-- 2. BLOC HAUT : L'image à gauche et le titre à droite -->
                                    <div class="gm-side-body">
                                        <img src="{{url('hphx/img/'.$hrh->image_article)}}" alt="{{$hrh->title_article}}" class="gm-side-img">
                                        <div class="gm-side-text">
                                            <h3 class="gm-side-title">
                                                <span style="font-family: 'Montserrat', sans-serif;">
                                                    {{Str::limit(formatTitle($hrh->title_article), 80)}}
                                                </span>
                                            </h3>
                                        </div>
                                    </div>

                                    <!-- 3. BLOC BAS : La description sous l'image et le titre, sur toute la largeur -->
                                    <div class="gm-side-desc-container" style="padding: 0 10px;">
                                        <p class="gm-side-desc" ; margin-top: 10px; margin-bottom: 12px; font-size: 0.95rem; line-height: 1.4; color: #000;">
                                            {{Str::limit($hrh->desc_article, 120)}}
                                        </p>
                                    </div>
                                </a>
                                
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hrh->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hrh->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span style="text-transform: none;"><strong style="font-size: 1rem">
                                        @if(!empty($hrh->datepub_article))
                                            {{ \Carbon\Carbon::parse($hrh->datepub_article)->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                        @endif
                                   </strong> </span>
                                    <span class="gm-separator">|</span>
                                    <span>
                                        <i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hrh->view_article}}</strong>
                                    </span>
                                    <span class="gm-separator">|</span>
                                    <span>
                                        <a href="#" class="reading-time" style="font-weight: 700;">
                                            <strong style="font-size: 1rem"> Temps de lecture: {{ $hrh->temps_lecture ?? 1 }} min</strong>
                                        </a>
                                    </span>
                                </div>
                            </div>

                        @endforeach
                    @endif
                </div>
            </div>
        @endif

        <hr>

        <div class="mt-4 mb-4"></div>

      <div class="" style="margin-bottom: 30px;"> 
                <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
        &nbsp; <span class="gm-animated-dot"></span> ARTICLES RECENTS &nbsp;
                    </div>
       </div>

        <div class="row" style="display: flex; flex-wrap: wrap;">
    @php
        if(isset($hcf) && count($hcf) > 0) {
            $hcf = $hcf->where('slug_prinrub', '!=', 'english article')->values();
        }
    @endphp

    @if(isset($hcf)&&count($hcf)!=0)
        @foreach ($hcf as $is)
            <div class="col-md-3 gm-grid-col" style="margin-bottom: 30px;">
                
                <div class="gm-grid-card" style="width: 100%;">
                    <a href="{{route('visitors.sgactu',['rub'=>$is->slug_prinrub,'slug'=>$is->slug_article,'ip'=>$is->id_article])}}">
                        <img src="{{url('hphx/img/'.$is->image_article)}}" alt="{{$is->title_article}}" class="gm-grid-img">
                    </a>
                    
                    <div class="gm-grid-body">
                        <a href="{{route('visitors.sgactu',['rub'=>$is->slug_prinrub,'slug'=>$is->slug_article,'ip'=>$is->id_article])}}" class="gm-grid-title">
                            <h3 class="gm-grid-title"><span style="font-family: 'Montserrat', sans-serif;">{{Str::limit(formatTitle($is->title_article), 90)}}</span></h3>
                        </a>
                        <p class="gm-side-desc">
                            {{Str::limit($is->desc_article, 100)}}
                        </p>
                    </div>

                    <div class="gm-card-footer">
                        <a href="{{route('visitors.allactus',['rub' => $is->slug_prinrub])}}" style="font-weight: 700;">
                            {{$is->desig_prinrub}}
                        </a>
                        <span class="gm-separator" style="margin: 0 5px;">|</span>
                        <span style="text-transform: none;"><strong style="font-size: 1rem">
                            @if(!empty($is->datepub_article))
                                {{ \Carbon\Carbon::parse($is->datepub_article)->locale('fr')->diffForHumans() }}
                            @else
                                {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                            @endif
                        </strong></span>
                        <span class="gm-separator" style="margin: 0 5px;">|</span>
                        <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$is->view_article}}</strong></span>
                        <span class="gm-separator" style="margin: 0 5px;">|</span>
                        <span><a href="#" class="reading-time" style="font-weight: 700;"><strong style="font-size: 1rem">TEMPS DE LECTURE: {{ $is->temps_lecture ?? 1 }} min </strong></a></span>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    
             <div class="col-12 mt-3 mb-5" style="display: flex; justify-content: center; width: 100%;">
                <a href="{{route('visitors.allactus',['rub' => $hcarous[0]->slug_prinrub])}}" class="btn btn-outline-success" style="border-radius: 30px; font-weight: 700; padding: 12px 35px; border-color: #127319; color: #127319;"> 
        Voir plus d'actualités <i class="ion-ios-arrow-thin-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="container" style="margin-top: -15px;">
    <div class="banner">
        <figure class="ads text-center">
            @if(isset($pubs_i2)&&count($pubs_i2)!=0)
            <a href="<?=(isset($pubs_i2[0])&&!empty($pubs_i2[0]))?$pubs_i1[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                <img src="{{url('hphx/img/'.$pubs_i2[0]->image_pub)}}" class="dpub-under-" style="width: 100%;">
            </a>
            @endif
        </figure>
    </div>
</section>


<section class="home" style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="" style="margin-bottom: 30px;"> 
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
                &nbsp; <span class="gm-animated-dot"></span> AGRICULTURES &nbsp;<a href="{{route('visitors.allactus',['rub' => 'agriculture'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;"><i class="ion-ios-arrow-thin-right"></i></a>&nbsp; 
            </div>
        </div>

        @if(isset($hagriart) && !empty($hagriart))
            
            <div class="row">
                
                <div class="col-md-7" style="margin-bottom: 30px;">
                    
                    <div class="gm-main-card">
                        <a href="{{route('visitors.sgactu',['rub'=>$hagriart[0]->slug_prinrub,'slug'=>$hagriart[0]->slug_article,'ip'=>$hagriart[0]->id_article])}}" class="gm-main-img-wrap">
                            <img src="{{url('hphx/img/'.$hagriart[0]->image_article)}}" alt="{{$hagriart[0]->title_article}}">
                        </a>
                        
                        <div class="gm-main-content">
                            <div style="display: flex; align-items: center; flex-wrap: wrap;">
                                <a href="{{route('visitors.allactus',['rub' => $hagriart[0]->slug_prinrub])}}" class="gm-badge">
                                    {{$hagriart[0]->desig_prinrub}}
                                </a>
                                <span class="gm-separator">|</span>
                                <span style="font-weight: 500; text-transform: none;"><strong style="font-size: 1rem">
                                    @if(!empty($hagriart[0]->datepub_article))
                                        {{ \Carbon\Carbon::parse($hagriart[0]->datepub_article)->locale('fr')->diffForHumans() }}
                                    @else
                                        {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                    @endif
                                </strong></span>
                                <span class="gm-separator">|</span>
                                <span><a href="#" class="reading-time" style="font-weight: 700;"><strong style="font-size: 1.1rem">TEMPS DE LECTURE: {{ $hagriart[0]->temps_lecture ?? 1 }} min</strong></a></span>
                            </div>

                            <a href="{{route('visitors.sgactu',['rub'=>$hagriart[0]->slug_prinrub,'slug'=>$hagriart[0]->slug_article,'ip'=>$hagriart[0]->id_article])}}" class="gm-main-title">
                                <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">{{Str::limit(formatTitle($hagriart[0]->title_article), 120)}}</span>
                            </a>
                            <p class="gm-main-desc">
                                {{Str::limit($hagriart[0]->desc_article, 170)}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    @for($i=1; $i<=3; $i++)
                        @if(isset($hagriart[$i]))
                            <div class="gm-side-card" style="margin-bottom: 25px;">
                                <!-- 1. Le lien englobe tout l'article (image, titre et description) -->
                                    <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" style="display: block; text-decoration: none; color: inherit;">
                                        
                                        <!-- 2. BLOC HAUT : L'image à gauche et le titre à droite -->
                                        <div class="gm-side-body">
                                            <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="gm-side-img">
                                            <div class="gm-side-text">
                                                <h3 class="gm-side-title">
                                                    <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">
                                                        {{Str::limit(formatTitle($hagriart[$i]->title_article), 80)}}
                                                    </span>
                                                </h3>
                                            </div>
                                        </div>

                                        <!-- 3. BLOC BAS : La description sous l'image et le titre, sur toute la largeur -->
                                        <div class="gm-side-desc-container" style="padding: 0 10px;">
                                            <p class="gm-side-desc" ; margin-top: 10px; margin-bottom: 12px; font-size: 0.95rem; line-height: 1.4; color: #000;">
                                                {{Str::limit($hagriart[$i]->desc_article, 120)}}
                                            </p>
                                        </div>
                                    </a>
                                
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hagriart[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span style="text-transform: none;"><strong style="font-size: 1rem">
                                        @if(!empty($hagriart[$i]->datepub_article))
                                            {{ \Carbon\Carbon::parse($hagriart[$i]->datepub_article)->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                        @endif
                                    </strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hagriart[$i]->view_article}}</strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><a href="#" class="reading-time" style="font-weight: 700;"><strong style="font-size: 1rem">TEMPS DE LECTURE: {{ $hagriart[$i]->temps_lecture ?? 1 }} min</strong></a></span>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                @for($i=4; $i<=7; $i++)
                    @if(isset($hagriart[$i]))
                        <div class="col-md-6" style="margin-bottom: 30px;">
                            <div class="gm-side-card" style="height: 100%; margin-bottom: 0;">
                                <!-- 1. Le lien englobe tout l'article (image, titre et description) -->
                                <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" style="display: block; flex-grow: 1; text-decoration: none; color: inherit;">
                                    
                                    <!-- 2. BLOC HAUT : L'image à gauche et le titre à droite -->
                                    <div class="gm-side-body">
                                        <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="gm-side-img" style="width: 160px; height: 150px;">
                                        <div class="gm-side-text">
                                            <h3 class="gm-side-title">
                                                <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">
                                                    {{Str::limit(formatTitle($hagriart[$i]->title_article), 90)}}
                                                </span>
                                            </h3>
                                        </div>
                                    </div>

                                    <!-- 3. BLOC BAS : La description sous l'image et le titre, sur toute la largeur -->
                                    <div class="gm-side-desc-container" style="padding: 0 10px;">
                                        <p class="gm-side-desc"; margin-top: 10px; margin-bottom: 12px; font-size: 0.95rem; line-height: 1.4; color: #000;">
                                            {{Str::limit($hagriart[$i]->desc_article, 120)}}
                                        </p>
                                    </div>
                                </a>
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hagriart[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span style="text-transform: none;"><strong style="font-size: 1rem">
                                        @if(!empty($hagriart[$i]->datepub_article))
                                            {{ \Carbon\Carbon::parse($hagriart[$i]->datepub_article)->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                        @endif
                                    </strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hagriart[$i]->view_article}}</strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><a href="#" class="reading-time" style="font-weight: 700;"><strong style="font-size: 1rem">TEMPS DE LECTURE: {{ $hagriart[$i]->temps_lecture ?? 1 }} min</strong></a></span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

            <div class="row" style="margin-top: 15px;">
                @for($i=8; $i<=11; $i++) 
                    @if(isset($hagriart[$i]))
                        <div class="col-md-3 gm-grid-col" style="margin-bottom: 40px;">
                            <div class="gm-grid-card">
                                <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">
                                    <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="gm-grid-img">
                                </a>
                                <div class="gm-grid-body">
                                    <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" class="gm-grid-title">
                                       <h3 class="gm-side-title"> <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">{{Str::limit(formatTitle($hagriart[$i]->title_article), 90)}}</span></h3>
                                    </a>
                                    <p class="gm-side-desc">
                                        {{Str::limit($hagriart[$i]->desc_article, 100)}}
                                    </p>
                                </div>
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hagriart[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator" style="margin: 0 5px;">|</span>
                                    <span style="text-transform: none;"><strong style="font-size: 1rem">
                                        @if(!empty($hagriart[$i]->datepub_article))
                                            {{ \Carbon\Carbon::parse($hagriart[$i]->datepub_article)->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                        @endif
                                    </strong></span>
                                    <span class="gm-separator" style="margin: 0 5px;">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hagriart[$i]->view_article}}</strong></span>
                                    <span class="gm-separator" style="margin: 0 5px;">|</span>
                                    <span><a href="#" class="reading-time" style="font-weight: 700;"> <strong style="font-size: 1rem">Temps de lecture : {{$hagriart[$i]->temps_lecture ?? 1}} min</strong></a></span>
                                    
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

        @endif
        
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 10px; margin-bottom: 50px;">
                <a href="{{route('visitors.allactus',['rub' => 'agriculture'])}}" class="btn btn-outline-success" style="border-radius: 30px; font-weight: 700; padding: 12px 35px; border-color: #127319; color: #127319;"> 
                    Voir + d'actualités <i class="ion-ios-arrow-thin-right"></i>
                </a>
            </div>
        </div>
        
    </div>
</section>


<section class="container">
    <div class="banner" style="">
        <figure class="ads text-center">
            @if(isset($pubs_i3)&&count($pubs_i3)!=0)
                <a href="<?=(isset($pubs_i3[0])&&!empty($pubs_i3[0]))?$pubs_i3[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                    <img src="{{url('hphx/img/'.$pubs_i3[0]->image_pub)}}" class="dpub-under-" style="width: 100%;">
                </a>
            @endif
        </figure>
    </div>
</section>



<section style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="" style="margin-bottom: 30px;"> 
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
                &nbsp; <span class="gm-animated-dot"></span> + D'ARTICLES POPULAIRES &nbsp;
            </div>
        </div>

        <div class="row mt-4" style="display: flex; flex-wrap: wrap;">
            @if(isset($pplars) && count($pplars) != 0)
                @foreach($pplars as $hrh)
                    
                    <div class="col-md-4 gm-grid-col" style="margin-bottom: 40px;">
                        
                        <div class="gm-grid-card" style="width: 100%;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">
                                <img src="{{url('hphx/img/'.$hrh->image_article)}}" alt="{{$hrh->title_article}}" class="gm-grid-img">
                            </a>
                            
                            <div class="gm-grid-body">
                                <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}" class="gm-grid-title">
                                  <h3 class="gm-side-title">  <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">{{Str::limit(formatTitle($hrh->title_article), 90)}}</span></h3>
                                </a>
                                <p class="gm-side-desc">
                                    {{Str::limit($hrh->desc_article, 100)}}
                                </p>
                            </div>

                            <div class="gm-card-footer">
                                <a href="{{route('visitors.allactus',['rub' => $hrh->slug_prinrub])}}" style="font-weight: 700;">
                                    {{$hrh->desig_prinrub}}
                                </a>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span style="text-transform: none;"><strong style="font-size: 1rem">
                                    @if(!empty($hrh->datepub_article))
                                        {{ \Carbon\Carbon::parse($hrh->datepub_article)->locale('fr')->diffForHumans() }}
                                    @else
                                        {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                    @endif
                               </strong> </span>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hrh->view_article}}</strong></span>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span><a href="#" class="reading-time" style="font-weight: 700;"> <strong style="font-size: 1rem">Temps de lecture : {{$hrh->temps_lecture ?? 1}} min</strong></a></span>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
        </div>

    </div>
</section>



<div class="container" style="">
    <div class="banner">
        <figure class="ads text-center">
            @if(isset($pubs_i4)&&count($pubs_i4)!=0)
            <a href="<?=(isset($pubs_i4[0])&&!empty($pubs_i4[0]))?$pubs_i4[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                <img src="{{url('hphx/img/'.$pubs_i4[0]->image_pub)}}" class="dpub-under-" style="">
            </a>
            @endif
        </figure>
    </div>  
</div>



<section class="home" style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="" style="margin-bottom: 30px;">
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow">
                &nbsp; <span class="gm-animated-dot"></span> ENVIRONNEMENT &nbsp;
                <a href="{{route('visitors.allactus',['rub' => 'environnement'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;">
                    <i class="ion-ios-arrow-thin-right"></i>
                </a>&nbsp;
            </div>
        </div>

        @if(isset($hallsoarts) && !empty($hallsoarts))
            
            <div class="row">
                
                <div class="col-md-7" style="margin-bottom: 30px;">
                    
                    <div class="gm-main-card">
                        <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[0]->slug_prinrub,'slug'=>$hallsoarts[0]->slug_article,'ip'=>$hallsoarts[0]->id_article])}}" class="gm-main-img-wrap">
                            <img src="{{url('hphx/img/'.$hallsoarts[0]->image_article)}}" alt="{{$hallsoarts[0]->title_article}}">
                        </a>
                        
                        <div class="gm-main-content">
                            <div style="display: flex; align-items: center; flex-wrap: wrap;">
                                <a href="{{route('visitors.allactus',['rub' => $hallsoarts[0]->slug_prinrub])}}" class="gm-badge">
                                    {{$hallsoarts[0]->desig_prinrub}}
                                </a>
                                <span class="gm-separator">|</span>
                                <span style="font-weight: 500; text-transform: none;"><strong style="font-size: 1rem">
                                    @if(!empty($hallsoarts[0]->datepub_article))
                                        {{ \Carbon\Carbon::parse($hallsoarts[0]->datepub_article)->locale('fr')->diffForHumans() }}
                                    @else
                                        {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                    @endif
                                </strong></span>
                                <span class="gm-separator">|</span>
                                <span><a href="#" class="reading-time" style="font-weight: 700;"> <strong style="font-size: 1rem">Temps de lecture: {{ $hallsoarts[0]->temps_lecture ?? 1 }} min </strong> </a></span>
                            </div>

                            <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[0]->slug_prinrub,'slug'=>$hallsoarts[0]->slug_article,'ip'=>$hallsoarts[0]->id_article])}}" class="gm-main-title">
                                <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">{{Str::limit(formatTitle($hallsoarts[0]->title_article), 120)}}</span>
                            </a>
                            <p class="gm-main-desc">
                                {{Str::limit($hallsoarts[0]->desc_article, 170)}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    @for($i=1; $i<=3; $i++)
                        @if(isset($hallsoarts[$i]))
                            <div class="gm-side-card" style="margin-bottom: 25px;">
                               <!-- 1. Le lien englobe tout l'article (image, titre et description) -->
                                        <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}" style="display: block; text-decoration: none; color: inherit;">
                                            
                                            <!-- 2. BLOC HAUT : L'image à gauche et le titre à droite -->
                                            <div class="gm-side-body">
                                                <img src="{{url('hphx/img/'.$hallsoarts[$i]->image_article)}}" alt="{{$hallsoarts[$i]->title_article}}" class="gm-side-img">
                                                <div class="gm-side-text">
                                                    <h3 class="gm-side-title">
                                                        <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">
                                                            {{Str::limit(formatTitle($hallsoarts[$i]->title_article), 80)}}
                                                        </span>
                                                    </h3>
                                                </div>
                                            </div>

                                            <!-- 3. BLOC BAS : La description sous l'image et le titre, sur toute la largeur -->
                                            <div class="gm-side-desc-container" style="padding: 0 10px;">
                                                <p class="gm-side-desc"; margin-top: 10px; margin-bottom: 12px; font-size: 0.95rem; line-height: 1.4; color: #000;">
                                                    {{Str::limit($hallsoarts[$i]->desc_article, 120)}}
                                                </p>
                                            </div>
                                        </a>
                                
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hallsoarts[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hallsoarts[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span style="text-transform: none;"><strong style="font-size: 1rem">
                                        @if(!empty($hallsoarts[$i]->datepub_article))
                                            {{ \Carbon\Carbon::parse($hallsoarts[$i]->datepub_article)->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                        @endif
                                    </strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hallsoarts[$i]->view_article}}</strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><a href="#" class="reading-time" style="font-weight: 700;"> <strong style="font-size: 1rem">Temps de lecture: {{ $hallsoarts[$i]->temps_lecture ?? 1 }} min </strong></a></span>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                @for($i=4; $i<=7; $i++)
                    @if(isset($hallsoarts[$i]))
                        <div class="col-md-6" style="margin-bottom: 30px;">
                            <div class="gm-side-card" style="height: 100%; margin-bottom: 0;">
                                <!-- 1. Le lien englobe tout l'article (image, titre et description) -->
                                <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}" style="display: block; flex-grow: 1; text-decoration: none; color: inherit;">
                                    
                                    <!-- 2. BLOC HAUT : L'image à gauche et le titre à droite -->
                                    <div class="gm-side-body">
                                        <img src="{{url('hphx/img/'.$hallsoarts[$i]->image_article)}}" alt="{{$hallsoarts[$i]->title_article}}" class="gm-side-img" style="width: 160px; height: 150px;">
                                        <div class="gm-side-text">
                                            <h3 class="gm-side-title">
                                                <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">
                                                    {{Str::limit(formatTitle($hallsoarts[$i]->title_article), 90)}}
                                                </span>
                                            </h3>
                                        </div>
                                    </div>

                                    <!-- 3. BLOC BAS : La description sous l'image et le titre, sur toute la largeur -->
                                    <div class="gm-side-desc-container" style="padding: 0 10px;">
                                        <p class="gm-side-desc"; margin-top: 10px; margin-bottom: 12px; font-size: 0.95rem; line-height: 1.4; color: #000;">
                                            {{Str::limit($hallsoarts[$i]->desc_article, 120)}}
                                        </p>
                                    </div>
                                </a>
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hallsoarts[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hallsoarts[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span style="text-transform: none;"><strong style="font-size: 1rem">
                                        @if(!empty($hallsoarts[$i]->datepub_article))
                                            {{ \Carbon\Carbon::parse($hallsoarts[$i]->datepub_article)->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                        @endif
                                      </strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hallsoarts[$i]->view_article}}</strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><a href="#" class="reading-time" style="font-weight: 700;"> <strong style="font-size: 1rem">Temps de lecture: {{ $hallsoarts[$i]->temps_lecture ?? 1 }} min</strong></a></span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

        @endif
        
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 10px; margin-bottom: 50px;">
                <a href="{{route('visitors.allactus',['rub' => 'environnement'])}}" class="btn btn-outline-success" style="border-radius: 30px; font-weight: 700; padding: 12px 35px; border-color: #127319; color: #127319;"> 
                    Voir plus d'actualités <i class="ion-ios-arrow-thin-right"></i>
                </a>
            </div>
        </div>
        
    </div>
</section>



<div class="container" style="">
    <div class="banner">
        <figure class="ads text-center">
            @if(isset($pubs_i5)&&count($pubs_i5)!=0)
            <a href="<?=(isset($pubs_i5[0])&&!empty($pubs_i5[0]))?$pubs_i5[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                <img src="{{url('hphx/img/'.$pubs_i5[0]->image_pub)}}" class="dpub-under-" style="">
            </a>
            @endif
        </figure>
    </div>
</div>



<section class="home" style="margin-top: 20px; margin-bottom: 50px; padding: 0;">
    <div class="container">
        
        <div class="" style="margin-bottom: 30px;">
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow">
                &nbsp; <span class="gm-animated-dot"></span> RESS ANIMALES &nbsp;
                <a href="{{route('visitors.allactus',['rub' => 'ressourcesanimales'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;">
                    <i class="ion-ios-arrow-thin-right"></i>
                </a>&nbsp;
            </div>
        </div>

        @if(isset($hallspoarts) && !empty($hallspoarts))
            
            <div class="row">
                
                <div class="col-md-7" style="margin-bottom: 30px;">
                    
                    <div class="gm-main-card">
                        <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[0]->slug_prinrub,'slug'=>$hallspoarts[0]->slug_article,'ip'=>$hallspoarts[0]->id_article])}}" class="gm-main-img-wrap">
                            <img src="{{url('hphx/img/'.$hallspoarts[0]->image_article)}}" alt="{{$hallspoarts[0]->title_article}}">
                        </a>
                        
                        <div class="gm-main-content">
                            <div style="display: flex; align-items: center; flex-wrap: wrap;">
                                <a href="{{route('visitors.allactus',['rub' => $hallspoarts[0]->slug_prinrub])}}" class="gm-badge">
                                    {{$hallspoarts[0]->desig_prinrub}}
                                </a>
                                <span class="gm-separator">|</span>
                                <span style="font-weight: 500; text-transform: none;"><strong style="font-size: 1rem">
                                    @if(!empty($hallspoarts[0]->datepub_article))
                                        {{ \Carbon\Carbon::parse($hallspoarts[0]->datepub_article)->locale('fr')->diffForHumans() }}
                                    @else
                                        {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                    @endif
                                </strong></span>
                                <span class="gm-separator">|</span>
                                <span><a href="#" class="reading-time" style="font-weight: 700;"> <strong style="font-size: 1rem">Temps de lecture: {{ $hallspoarts[0]->temps_lecture ?? 1 }} min</strong></a></span>
                            </div>

                            <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[0]->slug_prinrub,'slug'=>$hallspoarts[0]->slug_article,'ip'=>$hallspoarts[0]->id_article])}}" class="gm-main-title">
                                <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">{{Str::limit(formatTitle($hallspoarts[0]->title_article), 120)}}</span>
                            </a>
                            <p class="gm-main-desc">
                                {{Str::limit($hallspoarts[0]->desc_article, 170)}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    @for($i=1; $i<=3; $i++)
                        @if(isset($hallspoarts[$i]) && ($hallspoarts[$i] != null))
                            <div class="gm-side-card" style="margin-bottom: 25px;">
                                <!-- 1. Le lien englobe tout l'article (image, titre et description) -->
                                <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}" style="display: block; text-decoration: none; color: inherit;">
                                    
                                    <!-- 2. BLOC HAUT : L'image à gauche et le titre à droite -->
                                    <div class="gm-side-body">
                                        <img src="{{url('hphx/img/'.$hallspoarts[$i]->image_article)}}" alt="{{$hallspoarts[$i]->title_article}}" class="gm-side-img">
                                        <div class="gm-side-text">
                                            <h3 class="gm-side-title">
                                                <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">
                                                    {{Str::limit(formatTitle($hallspoarts[$i]->title_article), 80)}}
                                                </span>
                                            </h3>
                                        </div>
                                    </div>

                                    <!-- 3. BLOC BAS : La description sous l'image et le titre, sur toute la largeur -->
                                    <div class="gm-side-desc-container" style="padding: 0 10px;">
                                        <p class="gm-side-desc"; margin-top: 10px; margin-bottom: 12px; font-size: 0.95rem; line-height: 1.4; color: #000;">
                                            {{Str::limit($hallspoarts[$i]->desc_article, 120)}}
                                        </p>
                                    </div>
                                </a>
                                
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hallspoarts[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hallspoarts[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span style="text-transform: none;"><strong style="font-size: 1rem">
                                        @if(!empty($hallspoarts[$i]->datepub_article))
                                            {{ \Carbon\Carbon::parse($hallspoarts[$i]->datepub_article)->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                        @endif
                                    </strong> </span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hallspoarts[$i]->view_article}}</strong></span>
                                    <span class="gm-separator">|</span>
                                    <span> <a href="#" class="reading-time" style="font-weight: 700;"><strong style="font-size: 1rem">Temps de lecture: {{ $hallspoarts[$i]->temps_lecture ?? 1 }} min</strong></a></span>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                @for($i=4; $i<=7; $i++)
                    @if(isset($hallspoarts[$i]) && ($hallspoarts[$i] != null))
                        <div class="col-md-6" style="margin-bottom: 30px;">
                            <div class="gm-side-card" style="height: 100%; margin-bottom: 0;">
                                <!-- 1. Le lien englobe tout l'article (image, titre et description) -->
                                <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}" style="display: block; flex-grow: 1; text-decoration: none; color: inherit;">
                                    
                                    <!-- 2. BLOC HAUT : L'image à gauche et le titre à droite -->
                                    <div class="gm-side-body">
                                        <img src="{{url('hphx/img/'.$hallspoarts[$i]->image_article)}}" alt="{{$hallspoarts[$i]->title_article}}" class="gm-side-img" style="width: 160px; height: 120px;">
                                        <div class="gm-side-text">
                                            <h3 class="gm-side-title">
                                                <span style="font-weight: 900 !important; font-family: 'Montserrat', sans-serif;">
                                                    {{Str::limit(formatTitle($hallspoarts[$i]->title_article), 90)}}
                                                </span>
                                            </h3>
                                        </div>
                                    </div>

                                    <!-- 3. BLOC BAS : La description sous l'image et le titre, sur toute la largeur -->
                                    <div class="gm-side-desc-container" style="padding: 0 10px;">
                                        <p class="gm-side-desc" style="font-weight: bold; font-style: italic; margin-top: 10px; margin-bottom: 12px; font-size: 0.95rem; line-height: 1.4; color: #000;">
                                            {{Str::limit($hallspoarts[$i]->desc_article, 120)}}
                                        </p>
                                    </div>
                                </a>
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hallspoarts[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hallspoarts[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span style="text-transform: none;"><strong style="font-size: 1rem">
                                        @if(!empty($hallspoarts[$i]->datepub_article))
                                            {{ \Carbon\Carbon::parse($hallspoarts[$i]->datepub_article)->locale('fr')->diffForHumans() }}
                                        @else
                                            {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                        @endif
                                     </strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hallspoarts[$i]->view_article}}</strong></span>
                                    <span class="gm-separator">|</span>
                                    <span><a href="#" class="reading-time" style="font-weight: 700;"> <strong style="font-size: 1rem">Temps de lecture: {{ $hallspoarts[$i]->temps_lecture ?? 1 }} min</strong></a></span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

        @endif
        
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 10px; margin-bottom: 20px;">
                <a href="{{route('visitors.allactus',['rub' => 'ressourcesanimales'])}}" class="btn btn-outline-success" style="border-radius: 30px; font-weight: 700; padding: 12px 35px; border-color: #127319; color: #127319;"> 
                    Voir plus d'actualités <i class="ion-ios-arrow-thin-right"></i>
                </a>
            </div>
        </div>
        
    </div>
</section>

<!-- Modal Newsletter Pop-up -->
<!-- =========================
     NEWSLETTER MODAL
========================= -->
<div class="modal fade newsletter-modal"
     id="newsletterModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="newsletterModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered newsletter-dialog" role="document">

        <div class="modal-content newsletter-content">

            <!-- Bouton fermer -->
            <button type="button"
                    class="newsletter-close"
                    data-dismiss="modal"
                    aria-label="Fermer">
                <span>&times;</span>
            </button>

            <div class="newsletter-wrapper">

                <!-- =========================
                     PARTIE GAUCHE
                ========================= -->
                <div class="newsletter-left">

                    <!-- Logo -->
                    <div class="newsletter-logo">
                        <img src="{{ asset('hphx/img/logo 3_0.png') }}"
                             alt="Green Media"
                             onerror="this.style.display='none';">
                    </div>

                    <!-- Titre -->
                    <h2 class="newsletter-title" id="newsletterModalLabel">
                        Ne manquez rien des actualités sur
                        <span>L'Environnement, le Climat, et lAgriculture</span>
                       
                    </h2>

                    <!-- Description -->
                    <p class="newsletter-description">
                        Inscrivez-vous à notre newsletter gratuite et recevez chaque semaine
                        nos enquêtes, reportages et décryptages exclusifs de l'actualité sur l'Environnement 
                        et l'Agriculture en Afrique et partout dans le monde
                        directement dans votre boîte mail.
                    </p>

                    <!-- Informations -->
                    <div class="newsletter-info">

                        <!-- Fréquence -->
                        <div class="newsletter-info-item">

                            <div class="newsletter-icon">
                                <i class="fa fa-envelope"></i>
                            </div>

                            <div>
                                <strong>Fréquence :</strong>
                                <p>
                                    1 à 2 envois par semaine<br>
                                    <small>(sans spam)</small>
                                </p>
                            </div>

                        </div>

                        <!-- Séparateur -->
                        <div class="newsletter-separator"></div>

                        <!-- Contenu -->
                        <div class="newsletter-info-item">

                            <div class="newsletter-icon">
                                <i class="fa fa-check-circle"></i>
                            </div>

                            <div>
                                <strong>Contenu :</strong>
                                <p>
                                    Analyses approfondies,<br>
                                    actualités exclusives et<br>
                                    tribunes d'experts.
                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- Consentement -->
                    <div class="newsletter-consent">

                        <div class="consent-icon">
                            <i class="fa fa-shield"></i>
                        </div>

                        <p>
                            En vous inscrivant, vous acceptez de recevoir nos communications
                            par e-mail. Vous pouvez modifier vos préférences ou vous désinscrire
                            à tout moment en un clic grâce au lien de désabonnement inclus dans
                            chaque message.
                        </p>

                    </div>

                    <!-- Message succès -->
                    @if(session('ok'))
                        <div class="newsletter-success">
                            <i class="fa fa-check-circle"></i>
                            {{ session('ok') }}
                        </div>
                    @endif

                    <!-- Formulaire -->
                    <form action="{{ route('newsletter.store') }}"
                          method="POST"
                          class="newsletter-form">

                        @csrf

                        <div class="newsletter-input-wrapper">

                            <i class="fa fa-envelope-o"></i>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="Votre adresse email *"
                                   required
                                   class="@error('email') newsletter-input-error @enderror">

                        </div>

                        <!-- Erreur -->
                        @error('email')
                            <div class="newsletter-error">
                                <i class="fa fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror

                        <!-- Bouton -->
                        <button type="submit" class="newsletter-submit">

                            <i class="fa fa-paper-plane-o"></i>

                            <span>Je m'abonne</span>

                        </button>

                    </form>

                </div>


                <!-- =========================
                     PARTIE DROITE
                ========================= -->
                <div class="newsletter-right">

                    <!-- Cercle décoratif -->
                    <div class="newsletter-circle"></div>

                    <!-- Petits points -->
                    <div class="newsletter-dots dots-top">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <!-- Image principale -->
                    <div class="newsletter-visual">

                        <img src="{{ asset('hphx/img/modal_site.jpg') }}"
                             alt="Agriculture durable et environnement en Afrique">

                    </div>

                    <!-- Feuilles décoratives -->
                    <div class="newsletter-leaf leaf-one"></div>
                    <div class="newsletter-leaf leaf-two"></div>

                    <!-- Petits points bas -->
                    <div class="newsletter-dots dots-bottom">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


<!-- =========================
     STYLE DU MODAL
========================= -->
<style>

    /* ---------------------------------
       MODAL GLOBAL
    --------------------------------- */

    .newsletter-modal {
        padding-right: 0 !important;
    }

    .newsletter-dialog {
        max-width: 1470px;
        width: calc(100% - 60px);
        margin: 30px auto;
    }

    .newsletter-content {
        position: relative;
        overflow: hidden;
        border: none;
        border-radius: 18px;
        background: #ffffff;
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.30);
    }

    /* ---------------------------------
       BOUTON FERMER
    --------------------------------- */

    .newsletter-close {
        position: absolute;
        z-index: 20;
        top: 22px;
        right: 25px;

        width: 45px;
        height: 45px;

        border: none;
        outline: none;
        background: transparent;

        color: #4d5568;
        font-size: 42px;
        font-weight: 300;
        line-height: 40px;

        cursor: pointer;
        transition: all .2s ease;
    }

    .newsletter-close:hover {
        color: #276036;
        transform: rotate(90deg);
    }

    /* ---------------------------------
       WRAPPER
    --------------------------------- */

    .newsletter-wrapper {
        display: flex;
        min-height: 720px;
        position: relative;
    }

    /* ---------------------------------
       PARTIE GAUCHE
    --------------------------------- */

    .newsletter-left {
        width: 70%;
        padding: 38px 55px 42px 55px;
        position: relative;
        z-index: 5;

        background:
            radial-gradient(
                circle at -10% -10%,
                rgba(105, 174, 44, .20) 0,
                rgba(105, 174, 44, .20) 90px,
                transparent 91px
            ),
            #ffffff;
    }

    /* Petit arrondi vert haut gauche */
    .newsletter-left::before {
        content: "";
        position: absolute;
        top: -90px;
        left: -100px;

        width: 220px;
        height: 220px;

        background: #8bc34a;
        border-radius: 50%;
        opacity: .7;
    }

    /* ---------------------------------
       LOGO
    --------------------------------- */

    .newsletter-logo {
        text-align: center;
        margin-bottom: 35px;
        position: relative;
        z-index: 2;
    }

    .newsletter-logo img {
        max-width: 290px;
        max-height: 90px;
        object-fit: contain;
    }

    /* ---------------------------------
       TITRE
    --------------------------------- */

    .newsletter-title {
        max-width: 940px;

        margin: 0 0 18px;

        color: #0d1715;

        font-size: 51px;
        font-weight: 800;
        line-height: 1.08;
        letter-spacing: -1.5px;
    }

    .newsletter-title span {
        color: #55a91b;
        font-style: italic;
    }

    /* ---------------------------------
       DESCRIPTION
    --------------------------------- */

    .newsletter-description {
        max-width: 940px;

        margin-bottom: 28px;

        color: #19253e;

        font-size: 22px;
        line-height: 1.45;
        font-weight: 400;
    }

    /* ---------------------------------
       INFORMATIONS
    --------------------------------- */

    .newsletter-info {
        display: flex;
        align-items: center;

        max-width: 930px;

        margin-bottom: 22px;
    }

    .newsletter-info-item {
        display: flex;
        align-items: center;
        gap: 20px;
        flex: 1;
    }

    .newsletter-icon {
        flex: 0 0 86px;

        width: 86px;
        height: 86px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eef9d9;
        border-radius: 50%;

        color: #318129;
        font-size: 34px;
    }

    .newsletter-info-item strong {
        display: block;

        margin-bottom: 3px;

        color: #32852b;

        font-size: 21px;
        font-weight: 700;
    }

    .newsletter-info-item p {
        margin: 0;

        color: #18243c;

        font-size: 19px;
        line-height: 1.35;
    }

    .newsletter-info-item small {
        font-size: 16px;
    }

    .newsletter-separator {
        width: 1px;
        height: 75px;

        margin: 0 35px;

        background: #a9b2c2;
    }

    /* ---------------------------------
       CONSENTEMENT
    --------------------------------- */

    .newsletter-consent {
        display: flex;
        align-items: flex-start;
        gap: 17px;

        max-width: 930px;

        margin: 15px 0 25px;
    }

    .consent-icon {
        flex: 0 0 42px;

        color: #388f29;
        font-size: 31px;
    }

    .newsletter-consent p {
        margin: 0;

        color: #68748b;

        font-size: 16px;
        line-height: 1.45;
    }

    /* ---------------------------------
       FORMULAIRE
    --------------------------------- */

    .newsletter-form {
        max-width: 930px;
    }

    .newsletter-input-wrapper {
        position: relative;
        width: 100%;
    }

    .newsletter-input-wrapper > i {
        position: absolute;
        z-index: 2;

        left: 28px;
        top: 50%;

        transform: translateY(-50%);

        color: #98a5bb;
        font-size: 26px;
    }

    .newsletter-input-wrapper input {
        width: 100%;
        height: 78px;

        padding: 0 25px 0 85px;

        border: 1px solid #c9d2df;
        border-radius: 16px;

        background: #ffffff;

        color: #18243c;

        font-size: 19px;

        outline: none;

        transition: border-color .2s ease,
                    box-shadow .2s ease;
    }

    .newsletter-input-wrapper input:focus {
        border-color: #55a91b;

        box-shadow: 0 0 0 4px rgba(85, 169, 27, .10);
    }

    .newsletter-input-wrapper input::placeholder {
        color: #9ba8bd;
    }

    .newsletter-input-error {
        border-color: #dc3545 !important;
    }

    /* ---------------------------------
       ERREUR
    --------------------------------- */

    .newsletter-error {
        margin-top: 8px;

        color: #dc3545;

        font-size: 14px;
        font-weight: 600;
    }

    /* ---------------------------------
       MESSAGE SUCCÈS
    --------------------------------- */

    .newsletter-success {
        max-width: 930px;

        margin-bottom: 18px;
        padding: 14px 18px;

        border-radius: 10px;

        background: #e7f7df;
        color: #276036;

        font-size: 16px;
        font-weight: 600;
    }

    .newsletter-success i {
        margin-right: 8px;
    }

    /* ---------------------------------
       BOUTON ABONNEMENT
    --------------------------------- */

    .newsletter-submit {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 18px;

        width: 100%;
        height: 82px;

        margin-top: 15px;

        border: none;
        border-radius: 16px;

        background: linear-gradient(
            135deg,
            #55aa55 0%,
            #328c35 100%
        );

        color: #ffffff;

        font-size: 23px;
        font-weight: 700;

        cursor: pointer;

        box-shadow: 0 8px 20px rgba(50, 140, 53, .20);

        transition: all .25s ease;
    }

    .newsletter-submit i {
        font-size: 29px;
    }

    .newsletter-submit:hover {
        transform: translateY(-2px);

        box-shadow: 0 12px 28px rgba(50, 140, 53, .30);
    }

    /* ---------------------------------
       PARTIE DROITE
    --------------------------------- */

    .newsletter-right {
        position: relative;

        width: 30%;

        min-height: 720px;

        overflow: hidden;

        background:
            linear-gradient(
                135deg,
                #f8fff2 0%,
                #eaf8df 100%
            );
    }

    /* Cercle */
    .newsletter-circle {
        position: absolute;

        top: 90px;
        right: -100px;

        width: 500px;
        height: 500px;

        border-radius: 50%;

        background: rgba(117, 190, 58, .10);
    }

    /* ---------------------------------
       IMAGE
    --------------------------------- */

    .newsletter-visual {
        position: absolute;

        z-index: 5;

        top: 130px;
        left: -90px;

        width: 570px;
        height: 570px;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .newsletter-visual img {
        width: 100%;
        height: 100%;

        object-fit: contain;

        filter: drop-shadow(
            0 20px 25px rgba(35, 91, 31, .15)
        );
    }

    /* ---------------------------------
       POINTS
    --------------------------------- */

    .newsletter-dots {
        position: absolute;
        z-index: 3;

        display: grid;

        grid-template-columns: repeat(5, 7px);

        gap: 12px;
    }

    .newsletter-dots span {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        background: #65a923;
    }

    .dots-top {
        top: 120px;
        right: 35px;
    }

    .dots-bottom {
        bottom: 150px;
        right: 40px;
    }

    /* ---------------------------------
       FEUILLES
    --------------------------------- */

    .newsletter-leaf {
        position: absolute;

        z-index: 2;

        background: #49a719;

        transform: rotate(-35deg);

        border-radius: 100% 0 100% 0;
    }

    .leaf-one {
        width: 170px;
        height: 80px;

        bottom: 80px;
        left: 20px;
    }

    .leaf-two {
        width: 120px;
        height: 60px;

        bottom: 35px;
        left: 100px;

        transform: rotate(25deg);
    }


    /* =================================
       TABLETTES
    ================================= */

    @media (max-width: 1200px) {

        .newsletter-dialog {
            max-width: 1100px;
        }

        .newsletter-left {
            width: 68%;
            padding: 35px 40px;
        }

        .newsletter-right {
            width: 32%;
        }

        .newsletter-title {
            font-size: 40px;
        }

        .newsletter-description {
            font-size: 18px;
        }

        .newsletter-visual {
            left: -100px;
            width: 480px;
            height: 480px;
        }

        .newsletter-info-item p {
            font-size: 16px;
        }

    }


    /* =================================
       MOBILE
    ================================= */

    @media (max-width: 767px) {

        .newsletter-dialog {
            width: calc(100% - 20px);
            margin: 10px auto;
        }

        .newsletter-content {
            border-radius: 14px;
        }

        .newsletter-wrapper {
            display: block;
            min-height: auto;
        }

        .newsletter-left {
            width: 100%;
            padding: 30px 22px 25px;
        }

        .newsletter-logo {
            margin-bottom: 25px;
        }

        .newsletter-logo img {
            max-width: 220px;
        }

        .newsletter-title {
            font-size: 31px;
            line-height: 1.12;
            letter-spacing: -.7px;
        }

        .newsletter-description {
            font-size: 16px;
            line-height: 1.45;
        }

        .newsletter-info {
            display: block;
        }

        .newsletter-info-item {
            margin-bottom: 20px;
        }

        .newsletter-separator {
            display: none;
        }

        .newsletter-icon {
            flex: 0 0 62px;

            width: 62px;
            height: 62px;

            font-size: 25px;
        }

        .newsletter-info-item strong {
            font-size: 18px;
        }

        .newsletter-info-item p {
            font-size: 15px;
        }

        .newsletter-consent p {
            font-size: 13px;
        }

        .newsletter-input-wrapper input {
            height: 65px;

            padding-left: 65px;

            font-size: 15px;
        }

        .newsletter-input-wrapper > i {
            left: 20px;
            font-size: 21px;
        }

        .newsletter-submit {
            height: 68px;

            font-size: 18px;
        }

        .newsletter-right {
            display: none;
        }

        .newsletter-close {
            top: 12px;
            right: 12px;

            font-size: 34px;
        }
    }

</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    
    @if(session('ok') || $errors->has('email'))
        // 1. CAS SOUMISSION : S'il y a un message de succès ou une erreur
        // On affiche le modal immédiatement sans attendre les 2 secondes
        $('#newsletterModal').modal('show');
        
        // On s'assure qu'il est marqué comme "vu" pour ne pas le rouvrir plus tard
        sessionStorage.setItem('newsletter_shown', 'true');
        
    @else
        // 2. CAS NORMAL : Vérifie si le pop-up a déjà été affiché durant cette session
        if (!sessionStorage.getItem('newsletter_shown')) {
            setTimeout(function() {
                $('#newsletterModal').modal('show');
            }, 2000); // Délai de 2 secondes
            
            sessionStorage.setItem('newsletter_shown', 'true');
        }
    @endif
    
});
</script>

@endsection