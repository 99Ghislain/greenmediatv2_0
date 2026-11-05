@php
    $mainVideo = null;
    $sortedVideos = [];

    if(isset($hlastvd) && count($hlastvd) > 0) {
        
        // On filtre pour ne garder STRICTEMENT que les vidéos "Live Streaming" (type 2)
        $liveVideos = $hlastvd->where('typevideo_id', '2')->values();

        // Si on a trouvé au moins une vidéo Live, on construit la liste
        if(count($liveVideos) > 0) {
            
            $mainVideo = $liveVideos[0];

            $tempMain = clone $mainVideo;
            $tempMain->formatted_title = formatTitle($mainVideo->title_video);
            $tempMain->formatted_date = phxdtformat(date_create($mainVideo->datepub_video));
            $sortedVideos[] = $tempMain;
            
            foreach($liveVideos as $vd) {
                if($vd->id_video != $mainVideo->id_video) {
                    $temp = clone $vd;
                    $temp->formatted_title = formatTitle($vd->title_video);
                    $temp->formatted_date = phxdtformat(date_create($vd->datepub_video));
                    $sortedVideos[] = $temp;
                }
            }
        }
    }
@endphp

{{-- La section s'affiche TOUT LE TEMPS, même si $mainVideo est null --}}
<section class="home gm-streaming-section">
    <div class="container-fluid px-0">
        
        <!-- En-tête exclusif au LIVE STREAMING -->
        <div class="" style="margin-bottom: 30px;"> 
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
                &nbsp; <span class="gm-animated-dot" style="background-color: #d32f2f;"></span> 
                LIVE STREAMING &nbsp;
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 10px; margin-bottom: 5px;">
                
                <style>
                    .video-card-modern {
                        border-radius: 12px;
                        overflow: hidden;
                        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
                        background: linear-gradient(135deg, #e0ebe0 0%, #c1c4c2 100%); 
                        margin-bottom: 20px;
                    }
                    .video-info-classy {
                        padding: 22px 25px;
                    }
                    .video-meta {
                        display: flex; align-items: center; gap: 15px; margin-bottom: 12px; flex-wrap: wrap;
                    }
                    .live-badge-modern {
                        background-color: #e53935; color: #ffffff !important; padding: 6px 16px;
                        border-radius: 30px; font-size: 0.85rem; font-weight: 700; text-transform: uppercase;
                        text-decoration: none; display: flex; align-items: center; gap: 8px;
                        box-shadow: 0 4px 10px rgba(229, 57, 53, 0.4); transition: transform 0.2s ease;
                    }
                    .live-badge-modern:hover {
                        transform: translateY(-2px); color: #ffffff; text-decoration: none;
                    }
                    .live-badge-offline {
                        background-color: #555555 !important;
                        box-shadow: none !important;
                    }
                    .live-dot {
                        width: 8px; height: 8px; background-color: #ffffff; border-radius: 50%;
                        display: inline-block; animation: pulse-live 1.5s infinite;
                    }
                    @keyframes pulse-live {
                        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7); }
                        70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(255, 255, 255, 0); }
                        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
                    }
                    .video-date-modern {
                        color: rgba(12, 5, 5, 0.85); font-size: 0.95rem; font-weight: 500;
                    }
                    .empty-live-container {
                        display: flex; 
                        flex-direction: column; 
                        align-items: center; 
                        justify-content: center;
                        width: 100%; 
                        height: 100%; 
                        position: absolute; 
                        top: 0; 
                        left: 0;
                        text-align: center; /* Centre le texte s'il passe sur 2 lignes sur mobile */
                    }
                    /* Espacement par défaut (Ordinateur et grands écrans) */
                    .gm-streaming-section {
                        margin-top:-170px !important; 
                        padding: 0;
                    }

                    /* Adaptation spécifique pour les téléphones (écrans de 768px ou moins) */
                    @media (max-width: 768px) {
                        .gm-streaming-section {
                            margin-top: -60px !important; /* Ajustez cette valeur si besoin (ex: 5px à 15px) pour qu'il soit bien collé sans passer sous le menu */
                        }
                    }
                </style>

                <div class="video-card-modern">
                   <article style="position: relative; overflow: hidden; padding: 0 !important; margin: 0 auto; aspect-ratio: 16/9; background-color: #000;">
    
                        @if($mainVideo != null)
                            <!-- Affichage du lecteur YouTube s'il y a un live -->
                            <div id="youtube-player" style="width:100%; height:100%;"></div>
                        @else
                            <!-- Écran de remplacement (Bloc vide) s'il n'y a pas de live -->
                            <div class="empty-live-container">
                                <i class="ion-ios-videocam" style="font-size: 4.5rem; color: #555;"></i>
                                <h4 style="color: #888; margin: 15px 0 0 0; font-weight: 600; text-align: center; width: 100%;">
                                    Aucun direct pour le moment
                                </h4>
                            </div>
                        @endif
                        
                    </article>

                    <div class="video-info-classy">
                        <div class="video-meta">
                            
                            @if($mainVideo != null)
                                <!-- Badge Live Rouge -->
                                <a href="{{route('visitors.allvideos')}}" class="live-badge-modern">
                                    <span class="live-dot"></span> EN DIRECT
                                </a>
                                <span id="video-date" class="video-date-modern">
                                    {{ phxdtformat(date_create($mainVideo->datepub_video)) }}
                                </span>
                            @else
                                <!-- Badge Hors Ligne Gris -->
                                <a href="{{route('visitors.allvideos')}}" class="live-badge-modern live-badge-offline">
                                    <i class="ion-ios-videocam"></i> HORS LIGNE
                                </a>
                                <span class="video-date-modern" style="color: #888;">
                                    Revenez plus tard
                                </span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    {{-- On ne charge le script YouTube QUE s'il y a une vidéo à jouer --}}
    @if($mainVideo != null)
        <script src="https://www.youtube.com/iframe_api"></script>
        <script>
            let videos = @json($sortedVideos);
            
            let playlist = [
                @foreach($sortedVideos as $video)
                    "{{ getYoutubeId($video->linkyoutube_video) }}",
                @endforeach
            ];
            
            let currentIndex = 0;
            let player;

            function onYouTubeIframeAPIReady(){
                if(playlist.length > 0) {
                    player = new YT.Player('youtube-player', {
                        height: '100%', 
                        width: '100%',
                        videoId: playlist[0], 
                        playerVars : {
                            autoplay: 1,
                            mute: 1, // Lancement automatique sans son
                            rel: 0,
                            modestbranding: 1
                        },
                        events : {
                            'onStateChange': onPlayerStateChange
                        }
                    });
                }
            }

            function onPlayerStateChange(event){
                if(event.data == YT.PlayerState.ENDED){
                    currentIndex++;
                    if(currentIndex >= playlist.length){
                        currentIndex = 0;
                    }
                    player.loadVideoById(playlist[currentIndex]);
                    document.getElementById('video-date').innerText = videos[currentIndex].formatted_date;
                }
            }
        </script>
    @endif
</section>