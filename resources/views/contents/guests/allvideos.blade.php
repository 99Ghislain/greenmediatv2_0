@extends('layouts/guestLayout')
@section('layoutContent')

<style>
    /* --- STYLE DE LA BANNIÈRE HERO TV --- */
    .gm-tv-hero {
        background: linear-gradient(135deg, #127319 0%, #0e5a13 100%);
        padding: 40px 20px;
        border-radius: 12px;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(18, 115, 25, 0.2);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .gm-tv-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: repeating-linear-gradient(45deg, rgba(255,255,255,0.03) 0px, rgba(255,255,255,0.03) 2px, transparent 2px, transparent 8px);
        pointer-events: none;
    }

    .gm-tv-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 3rem;
        font-weight: 900;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 15px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .gm-tv-icon-wrapper {
        background-color: #ffa000;
        color: #ffffff;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 4px 15px rgba(255, 160, 0, 0.4);
    }

    .gm-tv-subtitle {
        margin-top: 15px;
        font-size: 1.1rem;
        font-weight: 600;
        color: rgba(255,255,255,0.85);
        text-transform: uppercase;
        letter-spacing: 1px;
        background: rgba(0,0,0,0.2);
        padding: 8px 20px;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    /* --- STYLE DES CARTES VIDÉOS --- */
    .gm-video-card-premium {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .gm-video-card-premium:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    .gm-video-thumb-premium {
        position: relative;
        width: 100%;
        aspect-ratio: 16/9;
        overflow: hidden;
        background-color: #000;
    }

    .gm-video-thumb-premium img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
        opacity: 0.9;
    }

    .gm-video-card-premium:hover .gm-video-thumb-premium img {
        transform: scale(1.05);
        opacity: 1;
    }

    .gm-video-play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background: rgba(211, 47, 47, 0.9);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        padding-left: 5px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        opacity: 0.8;
    }

    .gm-video-card-premium:hover .gm-video-play-btn {
        background: #d32f2f;
        transform: translate(-50%, -50%) scale(1.1);
        opacity: 1;
    }

    .gm-video-content-premium {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .gm-video-title-premium {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.15rem;
        font-weight: 800;
        line-height: 1.4;
        color: #222;
        text-decoration: none;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.2s ease;
    }

    .gm-video-title-premium:hover {
        color: #127319;
    }

    .gm-video-meta-premium {
        margin-top: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }

    .gm-badge-tv {
        background-color: #f5f5f5;
        color: #555;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 4px;
        letter-spacing: 0.5px;
    }

    .gm-badge-live {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .gm-video-date-premium {
        font-size: 0.85rem;
        color: #888;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* --- STYLE DE LA SIDEBAR CITATIONS --- */
    .gm-sidebar-sticky {
        position: sticky;
        top: 20px;
    }

    .gm-quote-card {
        background: #ffffff;
        border-left: 5px solid #127319;
        border-radius: 8px;
        padding: 25px 25px 25px 40px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        position: relative;
        transition: transform 0.3s ease;
    }

    .gm-quote-card:hover {
        transform: translateX(5px);
        border-left-color: #ffa000;
    }

    .gm-quote-icon {
        position: absolute;
        top: 15px;
        left: 10px;
        font-size: 2rem;
        color: rgba(18, 115, 25, 0.15);
    }

    .gm-quote-text {
        font-family: 'Georgia', serif;
        font-style: italic;
        font-size: 1.15rem;
        line-height: 1.6;
        color: #444;
        margin-bottom: 15px;
    }

    .gm-quote-author {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.85rem;
        font-weight: 700;
        color: #127319;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .gm-quote-author::before {
        content: '';
        display: inline-block;
        width: 20px;
        height: 2px;
        background-color: #ffa000;
    }

    /* Ajustements Mobile */
    @media (max-width: 768px) {
        .gm-tv-title { font-size: 2rem; }
        .gm-tv-icon-wrapper { width: 50px; height: 50px; font-size: 1.5rem; }
        .gm-tv-subtitle { font-size: 0.9rem; }
        .gm-tv-hero { padding: 30px 15px; border-radius: 8px; margin-bottom: 25px;}
        .gm-quote-card { padding: 20px 20px 20px 35px; }
    }
</style>

<section class="home" style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <!-- FIL D'ARIANE -->
        <div class="row mb-3">
            <div class="col-md-12">        
                <ol class="breadcrumb" style="background: transparent; padding: 0; margin-bottom: 10px; font-size: 0.9rem; font-weight: 600;">
                    <li><a href="{{url('/')}}" style="color: #127319; text-decoration: none;"><i class="ion-ios-home" style="margin-right: 5px;"></i>Accueil</a></li>
                    <li class="active" style="color: #888;">&nbsp;/&nbsp; Web TV</li>
                </ol>
            </div>
        </div>

        <!-- BANNIÈRE HERO -->
        <div class="row">
            <div class="col-md-12">
                <div class="gm-tv-hero">
                    <h1 class="gm-tv-title">
                        <div class="gm-tv-icon-wrapper">
                            <i class="ion-ios-videocam"></i>
                        </div>
                        Green Media TV
                    </h1>
                    <div class="gm-tv-subtitle">
                        <span class="gm-animated-dot" style="background-color: #ffa000;"></span>
                        Chaîne officielle &nbsp;|&nbsp; Explorons {{count($hcvds)}}/{{$hnbvds}} vidéos disponibles
                    </div>
                </div>
            </div>
        </div>

        <!-- LAYOUT À DEUX COLONNES (VIDÉOS + CITATIONS) -->
        <div class="row">
            
            <!-- COLONNE GAUCHE : LES VIDÉOS (Prend 8 colonnes sur 12) -->
            <div class="col-lg-8 col-md-12">
                
                @if(isset($hcvds) && count($hcvds) != 0)
                    <?php $dty = today(); ?>

                    <div class="row" style="display: flex; flex-wrap: wrap;">
                        @foreach($hcvds as $alvd)
                            <!-- Note : col-md-6 pour en avoir 2 par ligne dans cette colonne réduite -->
                            <div class="col-md-6 col-sm-12" style="margin-bottom: 30px;">
                                <?php $dt = date_create($alvd->datepub_video); ?>
                                
                                <div class="gm-video-card-premium">
                                    <a href="{{ route('visitors.showvideo', ['id' => $alvd->id_video]) }}" class="gm-video-thumb-premium">
                                        <img src="{{url('hphx/img/'.$alvd->image_video)}}" alt="{{$alvd->title_video}}">
                                        <div class="gm-video-play-btn"><i class="ion-play"></i></div>
                                    </a>
                                    
                                    <div class="gm-video-content-premium">
                                        <a class="vdsplayer gm-video-title-premium" href="{{url('https://www.youtube.com/embed/'.getYoutubeId($alvd->linkyoutube_video).'?showinfo=0&autoplay=1')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
                                            {{ formatTitle($alvd->title_video) }}
                                        </a>

                                        <div class="gm-video-meta-premium">
                                            @if(isset($alvd->typevideo_id) && $alvd->typevideo_id == 2)
                                                <span class="gm-badge-tv gm-badge-live">
                                                    <i class="ion-record" style="font-size: 10px; margin-right: 3px;"></i> REPLAY LIVE
                                                </span>
                                            @else
                                                <span class="gm-badge-tv">VIDÉO TV</span>
                                            @endif

                                            <span class="gm-video-date-premium">
                                                <i class="ion-android-calendar"></i>
                                                @if(!empty($alvd->datepub_video)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- PAGINATION -->
                    <div class="row">
                        <div class="col-12" style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 40px;">
                            {{$hcvds->links('contents.guests.templates.blockpagination')}}
                        </div>
                    </div>

                @else
                    <!-- MESSAGE SI AUCUNE VIDÉO -->
                    <div class="alert text-center" style="background-color: #fff; border: 2px dashed #e0e0e0; color: #555; border-radius: 12px; padding: 50px 20px; margin-bottom: 40px;">
                        <i class="ion-ios-videocam" style="font-size: 4rem; color: #ccc; margin-bottom: 15px; display: block;"></i>
                        <h4 style="font-weight: 700; color: #333;">Aucune vidéo disponible</h4>
                        <p style="margin: 0; color: #777;">Notre catalogue vidéo est en cours de mise à jour. Revenez bientôt !</p>
                    </div>
                @endif
            </div>

            <!-- COLONNE DROITE : BARRE LATÉRALE INSPIRANTE (Prend 4 colonnes sur 12) -->
            <div class="col-lg-4 col-md-12">
                <div class="gm-sidebar-sticky">
                    
                    <div style="margin-bottom: 20px; font-family: 'Montserrat', sans-serif; font-size: 1.2rem; font-weight: 800; text-transform: uppercase; color: #222; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">
                        <span style="color: #127319;"><i class="ion-leaf"></i> L'esprit</span> Green Media
                    </div>

                    <!-- Citation 1 : Écologie Générale -->
                    <div class="gm-quote-card">
                        <i class="ion-quote gm-quote-icon"></i>
                        <div class="gm-quote-text">
                            "La Terre ne nous appartient pas, nous l'empruntons à nos enfants. Chaque arbre planté est une promesse d'avenir."
                        </div>
                        <div class="gm-quote-author">Proverbe Amérindien</div>
                    </div>

                    <!-- Citation 2 : Protection Animale -->
                    <div class="gm-quote-card">
                        <i class="ion-quote gm-quote-icon"></i>
                        <div class="gm-quote-text">
                            "On peut juger de la grandeur d'une nation par la façon dont les animaux y sont traités."
                        </div>
                        <div class="gm-quote-author">Mahatma Gandhi</div>
                    </div>

                    <!-- Citation 3 : Action / Environnement -->
                    <div class="gm-quote-card">
                        <i class="ion-quote gm-quote-icon"></i>
                        <div class="gm-quote-text">
                            "La nature n'est pas un endroit à visiter. C'est chez nous. Ce que nous lui faisons, nous nous le faisons à nous-mêmes."
                        </div>
                        <div class="gm-quote-author">Gary Snyder</div>
                    </div>

                    <!-- Petit encart promotionnel discret pour s'abonner (Optionnel) -->
                    <div style="background: #f9f9f9; padding: 25px; border-radius: 8px; text-align: center; border: 1px solid #eaeaea; margin-top: 30px;">
                        <i class="ion-android-globe" style="font-size: 3rem; color: #ffa000; margin-bottom: 10px;"></i>
                        <h4 style="font-size: 1.1rem; font-weight: 800; color: #333; font-family: 'Montserrat', sans-serif;">Rejoignez le mouvement</h4>
                        <p style="font-size: 0.9rem; color: #666; margin-bottom: 15px;">Informez-vous pour mieux agir en faveur de notre planète et de sa biodiversité.</p>
                        <a href="{{url('/')}}" style="display: inline-block; background: #127319; color: #fff; padding: 8px 20px; border-radius: 30px; font-weight: 600; text-decoration: none; font-size: 0.9rem;">
                            Lire nos articles
                        </a>
                    </div>

                </div>
            </div>

        </div> <!-- Fin de la Row principale -->
        
    </div>
</section>

@stop