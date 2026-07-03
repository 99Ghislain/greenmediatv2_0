@extends('layouts/guestLayout')
@section('layoutContent')

<section class="home" style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="row mb-3">
            <div class="col-md-12" style="font-weight: bolder;">        
                <ol class="breadcrumb bg-white" style="border-radius: 5px; padding: 10px 15px; margin-bottom: 0;">
                    <li><a href="{{url('/')}}" style="color: #127319;">Accueil</a></li>
                    <li class="active" style="color: #777;">&nbsp;/ Green Media Africa - TV</li>
                </ol>
            </div>
        </div>

        <div class="row" style="margin-bottom: 40px;">
            <div class="col-md-12">
                <div style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap; background-color: #ffffff; padding: 15px 20px; border-bottom: 8px solid #ffa000; box-shadow: 0 4px 15px rgba(0,0,0,0.05); gap: 15px;">

                    <div style="font-size: 2.2rem; font-weight: 900; color: #111; text-transform: uppercase; display: flex; align-items: center; letter-spacing: 1px;">
                        <span class="gm-animated-dot" style="margin-right: 15px; background-color: #d32f2f;"></span>
                        VOICI {{count($hcvds)}}/{{$hnbvds}} VIDÉOS
                    </div>

                    <div style="font-size: 2.8rem; font-weight: 900; color: #127319; margin: 0 10px; line-height: 1;">
                        |
                    </div>

                    <div style="background-color: #127319; color: #ffffff; padding: 6px 25px 6px 6px; border-radius: 8px; font-size: 2.2rem; font-weight: 900; text-transform: uppercase; display: flex; align-items: center; letter-spacing: 1px;">
                        <span style="background-color: #ffa000; color: #ffffff; border-radius: 5px; padding: 4px 15px; margin-right: 15px; display: flex; align-items: center; justify-content: center;">
                            <i class="ion-ios-videocam" style="font-size: 1.8rem;"></i>
                        </span>
                        GREEN MEDIA TV
                    </div>

                </div>
            </div>
        </div>

        @if(isset($hcvds) && count($hcvds) != 0)
            
            <?php 
                $mainVideo = null;
                $dty = today();

                // LOGIQUE INTELLIGENTE : Cherche le Live en premier (type 2)
                foreach($hcvds as $video) {
                    if(isset($video->typevideo_id) && $video->typevideo_id == 2) {
                        $mainVideo = $video;
                        break;
                    }
                }

                // S'il n'y a pas de Live, on prend la vidéo la plus récente
                if($mainVideo == null) {
                    $mainVideo = $hcvds[0];
                }

                $dtMain = date_create($mainVideo->datepub_video);
            ?>
            
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="gm-grid-card" style="width: 100%; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        
                        <a class="vdsplayer" href="{{url('https://www.youtube.com/embed/'.getYoutubeId($mainVideo->linkyoutube_video).'?showinfo=0&autoplay=1')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
                            <div class="gm-tv-player-wrapper">
                                <img src="{{url('hphx/img/'.$mainVideo->image_video)}}" alt="{{$mainVideo->title_video}}">
                                <div class="gm-tv-play-btn"><i class="ion-play"></i></div>
                            </div>
                        </a>
                        
                        <div style="padding: 25px;">
                            <div style="display: inline-block; background-color: #ffebee; color: #d32f2f; padding: 4px 12px; border-radius: 4px; font-weight: 800; font-size: 0.85rem; margin-bottom: 10px;">
                                <span class="gm-animated-dot" style="width: 8px; height: 8px; margin-right: 5px; background-color: #d32f2f;"></span> 
                                @if(isset($mainVideo->typevideo_id) && $mainVideo->typevideo_id == 2)
                                    EN DIRECT (LIVE)
                                @else
                                    ÉMISSION À LA UNE
                                @endif
                            </div>
                            
                            <a class="vdsplayer gm-grid-title" style="font-size: 2rem; margin-bottom: 10px; color: #111;" href="{{url('https://www.youtube.com/embed/'.getYoutubeId($mainVideo->linkyoutube_video).'?showinfo=0&autoplay=1')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
                                {{ formatTitle($mainVideo->title_video) }}
                            </a>
                            
                            <p style="color: #666; font-size: 1rem; margin-bottom: 0;">
                                <i class="ion-android-calendar"></i> Diffusé le : @if(!empty($mainVideo->datepub_video)){{ phxdtformat($dtMain) }}@else{{ phxdtformat($dty) }}@endif
                            </p>
                        </div>

                    </div>
                </div>
            </div>
             <hr style="border: 1px solid #127319; margin: 40px 0;">

            <div class="row mt-4" style="display: flex; flex-wrap: wrap;">
                
                @foreach($hcvds as $alvd)
                    @if($alvd->id_video != $mainVideo->id_video)
                        <div class="col-md-4 gm-grid-col" style="margin-bottom: 40px;">
                            <?php $dt = date_create($alvd->datepub_video); ?>
                            
                            <div class="gm-grid-card" style="width: 100%;">
                                <a class="vdsplayer" href="{{url('https://www.youtube.com/embed/'.getYoutubeId($alvd->linkyoutube_video).'?showinfo=0&autoplay=1')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
                                    <div class="gm-video-thumb">
                                        <img src="{{url('hphx/img/'.$alvd->image_video)}}" alt="{{$alvd->title_video}}">
                                        <div class="gm-video-play-small"><i class="ion-play"></i></div>
                                    </div>
                                </a>
                                
                                <div class="gm-grid-body">
                                    <a class="vdsplayer gm-grid-title" href="{{url('https://www.youtube.com/embed/'.getYoutubeId($alvd->linkyoutube_video).'?showinfo=0&autoplay=1')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
                                        {{ Str::limit(formatTitle($alvd->title_video), 80) }}
                                    </a>
                                </div>

                                <div class="gm-card-footer">
                                    <a href="#" style="background-color: #d32f2f !important; pointer-events: none;">
                                        @if(isset($alvd->typevideo_id) && $alvd->typevideo_id == 2)
                                            REPLAY LIVE
                                        @else
                                            VIDÉO / TV
                                        @endif
                                    </a>
                                    <span class="gm-separator" style="margin: 0 5px;">|</span>
                                    <span>@if(!empty($alvd->datepub_video)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                
            </div>

            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center; margin-top: 20px;">
                    {{$hcvds->links('contents.guests.templates.blockpagination')}}
                </div>
            </div>

        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert text-center" style="background-color: #f8d7da; color: #721c24; border-radius: 5px; font-weight: bold; padding: 20px;">
                        <i class="ion-ios-warning"></i> Aucune vidéo n'existe sur la chaîne pour le moment !
                    </div>
                </div>
            </div>
        @endif
        
    </div>
</section>

@stop