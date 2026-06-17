{{-- Live Streaming --}}
@php
    $linkId = null;
    if($hlastvd[0]->typevideo_id=='2'){
        $linkId = $hlastvd[0]->linkyoutube_video;
    }else{
        $linkId = $hlastvd[0]->linkyoutube_video;
    }
@endphp

@if($hlastvd[0]->typevideo_id=='2')
<section class="home" style="margin-top: 20px ; padding: 0;">
    <div class="container-fluid px-0">
        <div class="" style="margin-bottom: 5px;">
            <div class=" acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="">&nbsp; Live Streaming &nbsp;🔴</div>
        </div>
        
        @if(isset($hlastvd)&&!empty($hlastvd))
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 10px; margin-bottom: 5px;">
                    <?php $dt = date_create($hlastvd[0]->datepub_video); $dty = today();?>
                    
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
                            display: flex;
                            align-items: center;
                            gap: 15px;
                            margin-bottom: 12px;
                            flex-wrap: wrap;
                        }

                        .live-badge-modern {
                            background-color: #e53935;
                            color: #ffffff !important;
                            padding: 6px 16px;
                            border-radius: 30px;
                            font-size: 0.85rem;
                            font-weight: 700;
                            text-transform: uppercase;
                            text-decoration: none;
                            display: flex;
                            align-items: center;
                            gap: 8px;
                            box-shadow: 0 4px 10px rgba(229, 57, 53, 0.4);
                            transition: transform 0.2s ease;
                        }

                        .live-badge-modern:hover {
                            transform: translateY(-2px);
                            color: #ffffff;
                            text-decoration: none;
                        }

                        .live-dot {
                            width: 8px;
                            height: 8px;
                            background-color: #ffffff;
                            border-radius: 50%;
                            display: inline-block;
                            animation: pulse-live 1.5s infinite;
                        }

                        @keyframes pulse-live {
                            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7); }
                            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(255, 255, 255, 0); }
                            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
                        }

                        .video-date-modern {
                            color: rgba(255, 255, 255, 0.85);
                            font-size: 0.95rem;
                            font-weight: 500;
                        }

                        .video-title-modern {
                            color: #ffffff !important;
                            font-size: 1.35rem;
                            font-weight: 700;
                            line-height: 1.4;
                            text-decoration: none;
                            display: block;
                            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
                            transition: color 0.2s ease;
                        }

                        .video-title-modern:hover {
                            color: #c8e6c9 !important;
                            text-decoration: none;
                        }
                    </style>
                    <div class="video-card-modern">
                        <article style="overflow: hidden; padding: 0 !important; margin: 0 auto; aspect-ratio: 16/9; background-color: #000;">
                            <div id="youtube-player" style="width:100%; height:100%;"></div>  
                        </article>

                        <div class="video-info-classy">
                            <div class="video-meta">
                                <a href="{{route('visitors.allvideos')}}" class="live-badge-modern">
                                    <span class="live-dot"></span> Live Streaming
                                </a>
                                <span id="video-date" class="video-date-modern">
                                    {{ $hlastvd[0]->datepub_video }}
                                </span>
                            </div>

                            <a href="#" id="video-title" class="video-title-modern">
                                {{ Str::limit($hlastvd[0]->title_video, 250) }}
                            </a>
                        </div>
                    </div>
                    </div>
            </div>
        @endif
    </div> 

<script src="https://www.youtube.com/iframe_api"></script>

<script>
// Préparation des données depuis PHP vers JS
let videos = @json($hlastvd);
let playlist = [
    @foreach($hlastvd as $video)
        "{{ $video->ytid }}",
    @endforeach
];
let currentIndex = 0;
let player;

function onYouTubeIframeAPIReady(){
    player = new YT.Player('youtube-player', {
        height: '100%', 
        width: '100%',
        videoId: playlist[0],
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
    if(event.data == YT.PlayerState.ENDED){
        currentIndex++;
        if(currentIndex >= playlist.length){
            currentIndex = 0;
        }
        player.loadVideoById(playlist[currentIndex]);
        
        // Mise à jour du titre et de la date
        document.getElementById('video-title').innerText = videos[currentIndex].title_video;
        document.getElementById('video-date').innerText = videos[currentIndex].datepub_video;
    }
}
</script>

</section>
@endif
{{-- Live Streaming --}}