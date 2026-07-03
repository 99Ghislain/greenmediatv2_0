{{-- Live Streaming / Vidéo à la une --}}
@php
    $mainVideo = null;
    $sortedVideos = [];

    if(isset($hlastvd) && count($hlastvd) > 0) {
        // 1. On cherche d'abord s'il y a une vidéo en "Live Streaming" (type 2)
        foreach($hlastvd as $video) {
            if(isset($video->typevideo_id) && $video->typevideo_id == '2') {
                $mainVideo = $video;
                break;
            }
        }
        
        // 2. S'il n'y a pas de Live en ce moment, on prend la vidéo la plus récente
        if($mainVideo == null) {
            $mainVideo = $hlastvd[0];
        }

        // 3. On réorganise la playlist pour le JavaScript (La vidéo principale d'abord)
        $tempMain = clone $mainVideo;
        $tempMain->formatted_title = formatTitle($mainVideo->title_video);
        $tempMain->formatted_date = phxdtformat(date_create($mainVideo->datepub_video));
        $sortedVideos[] = $tempMain;
        
        foreach($hlastvd as $vd) {
            if($vd->id_video != $mainVideo->id_video) {
                $temp = clone $vd;
                $temp->formatted_title = formatTitle($vd->title_video);
                $temp->formatted_date = phxdtformat(date_create($vd->datepub_video));
                $sortedVideos[] = $temp;
            }
        }
    }
@endphp

@if($mainVideo != null)
<section class="home" style="margin-top: 20px ; padding: 0;">
    <div class="container-fluid px-0">
        <div class="" style="margin-bottom: 30px;"> 
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
                &nbsp; <span class="gm-animated-dot" style="background-color: #d32f2f;"></span> 
                @if(isset($mainVideo->typevideo_id) && $mainVideo->typevideo_id == '2')
                    LIVE STREAMING
                @else
                    VIDÉO À LA UNE
                @endif
                &nbsp;
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 10px; margin-bottom: 5px;">
                
                <style>
                    .video-card-modern {
                        border-radius: 12px;
                        overflow: hidden;
                        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
                        background: linear-gradient(135deg, #0f3e1a 0%, #2e7d32 100%); 
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
                        color: rgba(255, 255, 255, 0.85); font-size: 0.95rem; font-weight: 500;
                    }
                    .video-title-modern {
                        color: #ffffff !important; font-size: 1.35rem; font-weight: 700; line-height: 1.4;
                        text-decoration: none; display: block; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
                        transition: color 0.2s ease;
                    }
                    .video-title-modern:hover {
                        color: #c8e6c9 !important; text-decoration: none;
                    }
                </style>

                <div class="video-card-modern">
                    <article style="overflow: hidden; padding: 0 !important; margin: 0 auto; aspect-ratio: 16/9; background-color: #000;">
                        <div id="youtube-player" style="width:100%; height:100%;"></div>  
                    </article>

                    <div class="video-info-classy">
                        <div class="video-meta">
                            <a href="{{route('visitors.allvideos')}}" class="live-badge-modern" style="{{ $mainVideo->typevideo_id != '2' ? 'background-color: #ffa000; box-shadow: 0 4px 10px rgba(255, 160, 0, 0.4);' : '' }}">
                                @if(isset($mainVideo->typevideo_id) && $mainVideo->typevideo_id == '2')
                                    <span class="live-dot"></span> EN DIRECT
                                @else
                                    <i class="ion-ios-videocam"></i> TV
                                @endif
                            </a>
                            <span id="video-date" class="video-date-modern">
                                {{ phxdtformat(date_create($mainVideo->datepub_video)) }}
                            </span>
                        </div>

                        <a href="{{route('visitors.allvideos')}}" id="video-title" class="video-title-modern">
                            {{ formatTitle($mainVideo->title_video) }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        // On récupère notre liste de vidéos réorganisée (Live en premier)
        let videos = @json($sortedVideos);
        
        // On génère la playlist en utilisant notre fonction PHP 'getYoutubeId' pour être 100% sûr d'avoir l'ID
        let playlist = [
            @foreach($sortedVideos as $video)
                "{{ getYoutubeId($video->linkyoutube_video) }}",
            @endforeach
        ];
        
        let currentIndex = 0;
        let player;

        function onYouTubeIframeAPIReady(){
            player = new YT.Player('youtube-player', {
                height: '100%', 
                width: '100%',
                videoId: playlist[0], // Charge le premier ID
                playerVars : {
                    autoplay: 1,
                    mute: 1,
                    rel: 0,
                    modestbranding: 1
                },
                events : {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerStateChange(event){
            // Quand une vidéo se termine, on passe à la suivante
            if(event.data == YT.PlayerState.ENDED){
                currentIndex++;
                if(currentIndex >= playlist.length){
                    currentIndex = 0; // On boucle
                }
                player.loadVideoById(playlist[currentIndex]);
                
                // Mise à jour du titre et de la date avec nos beaux formats
                document.getElementById('video-title').innerText = videos[currentIndex].formatted_title;
                document.getElementById('video-date').innerText = videos[currentIndex].formatted_date;
            }
        }
    </script>
</section>
@endif