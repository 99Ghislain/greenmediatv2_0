@extends('layouts/guestLayout')
@section('layoutContent')

<?php $dty = today(); ?>

<section class="home" style="margin-top: 20px; padding: 0; background-color: #f8f9fa; padding-bottom: 50px;">
    <div class="container">
        
        <div class="row mb-4">
            <div class="col-md-12">        
                <ol class="breadcrumb" style="background-color: transparent; padding: 0; margin-bottom: 0; font-size: 0.95rem; font-weight: 600;">
                    <li><a href="{{url('/')}}" style="color: #127319; text-decoration: none;"><i class="fa fa-home"></i> Accueil</a></li>
                    <li><a href="{{route('visitors.allvideos')}}" style="color: #127319; text-decoration: none;">&nbsp; Green Media Africa - TV</a></li>
                    <li class="active" style="color: #6c757d;">&nbsp; Lecture vidéo</li>
                </ol>
            </div>
        </div>

        <div class="row">
            
            {{-- ================= COLONNE PRINCIPALE ================= --}}
            <div class="col-md-8" style="margin-bottom: 30px;">
                
                {{-- Lecteur Vidéo --}}
                <div style="background: #000; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.15);">
                    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <iframe src="https://www.youtube.com/embed/{{ getYoutubeId($video->linkyoutube_video) }}?autoplay=1&rel=0&modestbranding=1" 
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" 
                                allow="autoplay; encrypted-media; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>

                {{-- Informations de la vidéo --}}
                <div style="background: #fff; padding: 30px; margin-top: 20px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border-top: 5px solid #127319;">
                    
                    <div style="margin-bottom: 15px;">
                        @if(isset($video->typevideo_id) && $video->typevideo_id == 2)
                            <span style="background-color: #ffebee; color: #d32f2f; padding: 6px 14px; border-radius: 30px; font-weight: 800; font-size: 0.8rem; display: inline-flex; align-items: center; letter-spacing: 0.5px;">
                                <span class="gm-animated-dot" style="width: 8px; height: 8px; margin-right: 6px; background-color: #d32f2f; border-radius: 50%;"></span> REPLAY LIVE
                            </span>
                        @else
                            <span style="background-color: #e8f5e9; color: #127319; padding: 6px 14px; border-radius: 30px; font-weight: 800; font-size: 0.8rem; display: inline-flex; align-items: center; letter-spacing: 0.5px;">
                                <i class="ion-ios-videocam" style="margin-right: 6px; font-size: 1.1rem;"></i> REPORTAGE / TV
                            </span>
                        @endif
                    </div>

                    <h1 style="font-size: 2.2rem; font-weight: 900; color: #111; line-height: 1.3; margin-bottom: 15px; text-transform: uppercase; letter-spacing: -0.5px;">
                        {{ formatTitle($video->title_video) }}
                    </h1>
                    
                    <div style="color: #555; font-size: 1rem; margin-bottom: 25px;">
                        <span style="display: inline-block; background: #f1f3f5; padding: 5px 12px; border-radius: 6px; font-weight: 600; font-size: 0.9rem; color: #495057;">
                            <i class="ion-android-calendar" style="color: #127319; margin-right: 5px;"></i> 
                            Diffusé le : @if(!empty($video->datepub_video)) {{ phxdtformat(date_create($video->datepub_video)) }} @else {{ phxdtformat($dty) }} @endif
                        </span>
                    </div>

                    {{-- Description de la vidéo --}}
                    @if(!empty($video->desc_video))
                        <div style="font-size: 1.05rem; line-height: 1.6; color: #444; margin-bottom: 25px;">
                            {!! $video->desc_video !!}
                        </div>
                    @endif
                    
                    {{-- Partage Multi-Réseaux --}}
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; border-top: 1px solid #eaeaea; padding-top: 20px;">
                        <span style="font-weight: 700; color: #333; font-size: 1.1rem;">Partager ce reportage</span>
                        <div style="display: flex; gap: 10px;">
                            {{-- Bouton Facebook / Mobile Natif --}}
                            <a href="javascript:void(0);" onclick="partageNatifVideo()" class="gm-share-btn gm-facebook" title="Partager sur Facebook / Mobile">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            
                            {{-- Bouton X (Twitter) --}}
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode(formatTitle($video->title_video)) }}" target="_blank" rel="noopener noreferrer" class="gm-share-btn gm-twitter" title="Partager sur X">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>

                            {{-- Bouton WhatsApp --}}
                            <a href="https://api.whatsapp.com/send?text={{ urlencode(formatTitle($video->title_video) . ' - ' . url()->current()) }}" target="_blank" rel="noopener noreferrer" class="gm-share-btn gm-whatsapp" title="Partager sur WhatsApp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                </div>

                {{-- ================= BLOC AUTEUR / REPORTER ================= --}}
                @if(!empty($video->nom_reporter))
                <div style="background: #fff; padding: 25px; margin-top: 25px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border-left: 5px solid #127319; display: flex; align-items: center; gap: 20px;">
                    <img src="{{ !empty($video->photo_reporter) ? asset('public/uploads/reporters/' . $video->photo_reporter) : asset('images/default-avatar.png') }}" 
                         alt="{{ $video->nom_reporter }}" 
                         style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #f1f3f5; box-shadow: 0 4px 10px rgba(0,0,0,0.1); flex-shrink: 0;">
                    <div>
                        <h4 style="margin: 0 0 5px 0; font-size: 1.2rem; font-weight: 800; color: #111;">{{ $video->nom_reporter }}</h4>
                        <span style="font-size: 0.85rem; font-weight: 700; text-transform: uppercase; color: #127319; display: block; margin-bottom: 8px;">Journaliste / Reporter</span>
                        <p style="margin: 0; font-size: 0.95rem; color: #555; line-height: 1.5;">{{ $video->bio_reporter ?? 'Journaliste reporter pour Green Media TV.' }}</p>
                    </div>
                </div>
                @endif

                {{-- ================= BLOC COMMENTAIRES ================= --}}
                <div style="margin-top: 40px;">
                    <h3 style="font-size: 1.5rem; font-weight: 900; color: #111; margin-bottom: 20px; text-transform: uppercase; letter-spacing: -0.5px;">
                        <i class="far fa-comments" style="color: #127319; margin-right: 10px;"></i> Commentaires ({{ isset($comments) ? count($comments) : 0 }})
                    </h3>

                    {{-- Formulaire --}}
                    <div style="background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px;">
                        <h5 style="margin-bottom: 20px; font-weight: 700; color: #333;">Laisser un commentaire</h5>
                        
                        <form action="{{ route('comments.store', ['id' => $video->id_video]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="video_id" value="{{ $video->id_video }}">
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input type="text" name="author_name" class="form-control" placeholder="Votre nom"  style="border-radius: 8px; padding: 12px 15px; background: #f8f9fa; border: 1px solid #e9ecef;">
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <textarea name="content_comment" rows="4" class="form-control" placeholder="Votre commentaire..." required style="border-radius: 8px; padding: 12px 15px; background: #f8f9fa; border: 1px solid #e9ecef;"></textarea>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" style="background-color: #127319; border: none; border-radius: 8px; font-weight: 700; padding: 10px 25px; text-transform: uppercase; font-size: 0.9rem;">
                                Publier
                            </button>
                        </form>
                    </div>

                    {{-- Liste des commentaires --}}
                    <div>
                        @if(isset($comments) && count($comments) > 0)
                            @foreach($comments as $com)
                                <div style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 3px 10px rgba(0,0,0,0.03); margin-bottom: 15px; border-left: 4px solid #127319;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                        <h6 style="margin: 0; font-weight: 800; color: #222; font-size: 1.05rem;">{{ $com->author_name }}</h6>
                                        <small style="color: #888; font-size: 0.8rem; font-weight: 600;">
                                            <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($com->created_at)->translatedFormat('d M Y à H:i') }}
                                        </small>
                                    </div>
                                    <p style="margin: 0; color: #444; font-size: 0.95rem; line-height: 1.6;">
                                        {{ $com->content_comment }}
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <div style="background: #fff; padding: 30px; border-radius: 12px; text-align: center; border: 2px dashed #eaeaea;">
                                <p style="margin: 0; color: #777; font-weight: 600; font-size: 1rem;">Soyez le premier à réagir à ce reportage !</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            {{-- ================= COLONNE LATERALE (Sidebar) ================= --}}
            <div class="col-md-4">
                <div style="background: #fff; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); overflow: hidden;">
                    <div style="background-color: #1A3B22; color: #ffffff; padding: 15px 20px; font-size: 1.1rem; font-weight: 900; text-transform: uppercase; border-top: 5px solid #F57F17; letter-spacing: 0.5px;">
                        À SUIVRE...
                    </div>
                    <div style="padding: 0;">
                        @if(isset($relatedVideos) && count($relatedVideos) > 0)
                            @foreach($relatedVideos as $relVid)
                            <a href="{{ route('visitors.showvideo', ['id' => $relVid->id_video]) }}" class="gm-side-card" style="display: flex; align-items: flex-start; padding: 15px 20px; border-bottom: 1px solid #eee; margin-bottom: 0; text-decoration: none;">
                                <div class="gm-grid-card" style="flex: 0 0 135px; height: 90px; position: relative; border-radius: 6px; overflow: hidden; background: #000;">
                                    <img src="{{ url('hphx/img/'.$relVid->image_video) }}" alt="{{$relVid->title_video}}" style="width: 100%; height: 100%; object-fit: cover;">
                                    <div class="gm-play-overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; background: rgba(18, 115, 25, 0.9); border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">
                                        <i class="ion-play" style="font-size: 12px; margin-left: 2px;"></i>
                                    </div>
                                </div>
                                <div class="gm-grid-body" style="padding-left: 15px; flex: 1; min-width: 0; display: flex; flex-direction: column; min-height: 85px; justify-content: space-between;">
                                    <h2 class="gm-side-title" style="font-size: 1.3rem; line-height: 1.3; margin: 0; font-weight: 800; color: #111; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ formatTitle($relVid->title_video) }}
                                    </h2>
                                </div>
                                <div class="gm-card-footer" style="width: 100%; margin-top: 12px; padding-top: 10px; border-top: 1px dashed #eaeaea; font-size: 0.75rem; font-weight: 700; display: flex; align-items: center;">
                                    @if(isset($relVid->typevideo_id) && $relVid->typevideo_id == 2)
                                        <span style="color: #d32f2f;">🔴 REPORTAGE</span>
                                        <span class="gm-separator" style="margin: 0 5px; color: #ccc;">|</span>
                                        <span style="color: #080707; font-weight: 600;">{{ phxdtformat(date_create($relVid->datepub_video)) }}</span>
                                    @else
                                        <span style="color: #fcf8f8; background: #e9ecef; padding: 3px 10px; border-radius: 4px; display: inline-block; font-weight: bold;">Reportage</span>
                                    @endif
                                </div>
                            </a>
                            @endforeach
                        @else
                            <div style="padding: 20px;">
                                <div class="alert" style="background-color: #f8f9fa; color: #6c757d; border: 1px dashed #dee2e6; border-radius: 8px; text-align: center; font-weight: 600; margin: 0;">
                                    Aucune autre vidéo disponible.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Script JavaScript pour le partage natif de la vidéo --}}
<script>
function partageNatifVideo() {
    if (navigator.share) {
        navigator.share({
            title: "{{ isset($video) ? addslashes(formatTitle($video->title_video)) : 'Green Media TV' }}",
            url: "{{ url()->current() }}"
        }).then(() => {
            console.log('Partage réussi');
        }).catch((error) => {
            console.log('Partage annulé', error);
        });
    } else {
        window.open('https://www.facebook.com/sharer.php?u={{ urlencode(url()->current()) }}', '_blank', 'width=600,height=400');
    }
}
</script>

<style>
    @keyframes pulse-red {
        0% { box-shadow: 0 0 0 0 rgba(211, 47, 47, 0.7); }
        70% { box-shadow: 0 0 0 8px rgba(211, 47, 47, 0); }
        100% { box-shadow: 0 0 0 0 rgba(211, 47, 47, 0); }
    }
    .gm-animated-dot { animation: pulse-red 1.5s infinite; }

    .gm-share-btn {
        display: flex; align-items: center; justify-content: center;
        width: 42px; height: 42px; border-radius: 50%; font-size: 1.2rem;
        text-decoration: none !important; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* Force les icônes FontAwesome en blanc à l'intérieur des boutons */
    .gm-share-btn i {
        color: #ffffff !important;
    }
    .gm-share-btn:hover { transform: translateY(-3px); box-shadow: 0 6px 15px rgba(0,0,0,0.2); }
    
   .gm-facebook { background: linear-gradient(135deg, #1877F2, #0d5bc6); color: #fff !important; }
    .gm-twitter { background: linear-gradient(135deg, #000000, #333333); color: #fff !important; }
    .gm-whatsapp { background: linear-gradient(135deg, #25D366, #128C7E); color: #fff !important; }

    .gm-side-card {
        display: flex; margin-bottom: 20px; text-decoration: none !important;
        border-radius: 8px; transition: all 0.2s ease; padding: 5px;
    }
    .gm-side-card:hover { background-color: #f8f9fa; transform: translateX(5px); }
    .gm-side-card:last-child { margin-bottom: 0; }

    .gm-play-overlay {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        color: white; background: rgba(18, 115, 25, 0.9); border-radius: 50%;
        width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;
        opacity: 0.8; transition: all 0.3s ease;
    }
    .gm-play-overlay i { font-size: 12px; margin-left: 2px; }
    .gm-side-card:hover .gm-play-overlay { opacity: 1; transform: translate(-50%, -50%) scale(1.1); background: #F57F17; }

    .gm-side-title {
        color: #eff3f8; font-size: 0.95rem; font-weight: 800; line-height: 1.3; margin: 0; transition: color 0.2s ease;
    }
    .gm-side-card:hover .gm-side-title { color: #127319; }
</style>

@stop