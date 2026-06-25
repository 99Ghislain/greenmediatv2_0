@extends('layouts/guestLayout')
@section('layoutContent')

<section class="single" style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="row mb-3">
            <div class="col-md-12" style="font-weight: bolder;">        
                <ol class="breadcrumb bg-white" style="border-radius: 5px; padding: 10px 15px; margin-bottom: 0;">
                    <li><a href="{{url('/')}}" style="color: #127319;">Accueil</a></li>
                    <li><a href="{{route('visitors.allactus',['rub' => $hcart[0]->slug_prinrub])}}" style="color: #127319;">{{$hcart[0]->slug_prinrub}}</a></li>
                    <li class="active" style="color: #777;">&nbsp;/ {{Str::limit($hcart[0]->slug_article, 80)}}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                
                <article class="article main-article">
                    
                    <header style="background-color: #ffffff; border-radius: 5px 5px 0 0; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 20px 20px 15px 20px; margin-bottom: 0;">
                        <h1 style="font-size: 2rem; font-weight: 900; color: #111; margin: 0; line-height: 1.3; text-transform: uppercase;">
                            <span style="font-weight: 500;">Titre :</span> {{$hcart[0]->title_article}}
                        </h1>
                    </header>

                    <div style="background-color: #fafafa; border-top: 5px solid #ffa000; border-bottom: 1px solid #eee; padding: 12px 20px; display: flex; align-items: center; flex-wrap: wrap; color: #222; font-size: 1.05rem; font-weight: 600; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                        <span>Publié le <?php $dt = date_create($hcart[0]->datepub_article);?> @if(!empty($hcart[0]->datepub_article)){{phxdtformat($dt)}}@else{{today()->format('d M Y')}}@endif</span>
                        <span style="margin: 0 15px; color: #ffa000; font-weight: 900;">|</span>
                        <span style="background-color: #127319; color: #ffffff; padding: 4px 12px; text-transform: uppercase; font-weight: 800; font-size: 0.95rem;">
                            {{$hcart[0]->slug_prinrub}} 
                            @if(isset($hnbartsprinrub) && isset($hnbartsprinrub[$hcart[0]->id_prinrub])) 
                                [ {{sprintf("%02d", $hnbartsprinrub[$hcart[0]->id_prinrub])}} ARTICLES ] 
                            @endif
                        </span>
                        <span style="margin: 0 15px; color: #ffa000; font-weight: 900;">|</span>
                        <span><?=isset($a_views)&&($a_views > 0)?$a_views:0;?> vues</span>
                    </div>

                    <div class="main" style="margin-bottom: 30px;">
                        
                        <div class="featured">
                            <figure style="margin: 0;">
                                <img src="{{url('hphx/img/'.$hcart[0]->image_article)}}">
                                
                                @if(!empty($hcart[0]->imgsubtitle_article))
                                    <figcaption style="background-color: #127319; color: #ffffff; text-align: center; padding: 12px 20px; font-size: 1.15rem; font-weight: 700;">
                                        {{$hcart[0]->imgsubtitle_article}}
                                    </figcaption>
                                @endif
                            </figure>
                        </div>

                        <div style="background-color: #ffffff; border-radius: 0 0 5px 5px; box-shadow: 0 5px 10px rgba(0,0,0,0.05); padding: 20px 20px 30px 20px; font-size: 1.1rem; line-height: 1.8; color: #333;">
                            @if(!empty($hcart[0]->desc_article))
                                <p style="font-weight: bold; font-size: 1.2rem; margin-bottom: 20px;">{{$hcart[0]->desc_article}}</p>
                            @endif
                            
                            <div class="article-body">
                                <?=(!empty($hcart[0]->content_article))?$hcart[0]->content_article:false;?>
                            </div>
                        </div>

                    </div>
                </article>

                <div class="sharing" style="margin-top: 30px; padding: 20px; background: #fff; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <div class="title" style="font-weight: bold; font-size: 1.2rem; margin-bottom: 15px;"><i class="ion-android-share-alt"></i> Partager cet article</div>
                    <ul class="social">
                        <li><a href="#" class="facebook sharefacebook" target="_blank"><i class="ion-social-facebook"></i> Facebook</a></li>
                        <li><a href="#" class="twitter sharetwitter" target="_blank"><i class="ion-social-twitter"></i> Twitter</a></li>
                        <li><a href="#" class="whatsapp sharewhatsapp" target="_blank"><i class="ion-social-whatsapp"></i> WhatsApp</a></li>
                    </ul>
                </div>

                <div class="comments" style="margin-top: 30px;">
                    <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="margin-bottom: 25px; text-align: center; font-size: 20px !important;">
                        &nbsp; <span class="gm-animated-dot"></span> Commentaires &nbsp;
                    </div>
                    <div class="spost_nav bg-white" style="padding: 20px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);"> 
                        <div class="fb-comments" data-href="{{url('https://greenmediaafrica.com/'.$hcart[0]->desig_prinrub.'/'.$hcart[0]->slug_article.'/'.$hcart[0]->id_article) }}" data-width="100%" data-numactus="3"></div>
                    </div>
                </div>

            </div>

            
                @include('contents.guests.templates.sidebarone')
            
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="margin-bottom: 25px; text-align: center; font-size: 20px !important;">
                    &nbsp; <span class="gm-animated-dot"></span> À lire aussi &nbsp;
                </div>
            </div>
        </div>

        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: center;">
            @if(isset($halsoreads) && count($halsoreads)!=0)
                @foreach($halsoreads as $hrnd)
                    <div class="col-md-3 gm-grid-col" style="margin-bottom: 30px;">
                        <?php $dt = date_create($hrnd->datepub_article); $dty = today();?>
                        
                        <div class="gm-grid-card" style="width: 100%;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrnd->slug_prinrub,'slug'=>$hrnd->slug_article,'ip'=>$hrnd->id_article])}}">
                                <img src="{{url('hphx/img/'.$hrnd->image_article)}}" alt="{{$hrnd->title_article}}" class="gm-grid-img">
                            </a>
                            
                            <div class="gm-grid-body">
                                <a href="{{route('visitors.sgactu',['rub'=>$hrnd->slug_prinrub,'slug'=>$hrnd->slug_article,'ip'=>$hrnd->id_article])}}" class="gm-grid-title">
                                    {{Str::limit($hrnd->title_article, 90)}}
                                </a>
                                <p class="gm-side-desc">
                                    {{Str::limit($hrnd->desc_article, 100)}}
                                </p>
                            </div>

                            <div class="gm-card-footer">
                                <a href="{{route('visitors.allactus',['rub' => $hrnd->slug_prinrub])}}">
                                    {{$hrnd->desig_prinrub}}
                                </a>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span>@if(!empty($hrnd->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 alert alert-danger text-center border-radius-0" style="margin-top: 20px;">Aucun article n'y existe !</div>
            @endif
        </div>

    </div>
</section>

<?php 
function phxdtformat($dt){
    $tabm = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
    $tabjr = ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim'];
    $meng = date_format($dt,'m');
    $jr = date_format($dt,'d');
    $an = date_format($dt,'Y');
    $ijr = date_format($dt,'D');
    $idce = $meng-1;
    $mfr=$tabm[$idce];
    
    if($ijr=="Mon"){$ljr = $tabjr[0];}elseif($ijr=="Tue"){$ljr = $tabjr[1];}elseif($ijr=="Wed"){$ljr = $tabjr[2];}elseif($ijr=="Thu"){$ljr = $tabjr[3];}
    elseif($ijr=="Fri"){$ljr = $tabjr[4];}elseif($ijr=="Sat"){$ljr = $tabjr[5];}elseif($ijr=="Sun"){$ljr = $tabjr[6];}

    return $ljr.' '.$jr.' '.$mfr.' '.$an ;
} 
;?>
@stop