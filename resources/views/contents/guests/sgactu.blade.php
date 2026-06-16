@extends('layouts/guestLayout')
@section('layoutContent')
<section class="single" style="margin-top: -30px ; padding: 0;">
  <div class="container">
    <div class="row">
        <div class="container col-12">
            <div class="row">
                <div class="col-md-12" style="font-weight: bolder;">        
                    <ol class="breadcrumb bg-white">
                        <li><a href="{{url('/')}}">Accueil</a></li>
                        <li><a href="{{route('visitors.allactus',['rub' => $hcart[0]->slug_prinrub])}}">{{$hcart[0]->slug_prinrub}}</a></li>
                        <li class="active">{{Str::limit($hcart[0]->slug_article,110)}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-8">
            <article class="article main-article">
                <header>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12">
                            <div class="acategory-two text-color-2 text-uppercase top-title-3" style=" font-weight: bold;">&nbsp;{{$hcart[0]->title_article}}&nbsp;</div>
                        </div>
                    </div>  
                    <ul class="details bg-white">
                        <li class="bg-white">Publié le <?php $dt = date_create($hcart[0]->datepub_article);?> @if(!empty($hcart[0]->datepub_article)){{phxdtformat($dt)}}@else{{today()->format('d M Y')}}@endif</li>
                        <li class="bg-white">><a href="{{route('visitors.allactus',['rub' => $hcart[0]->slug_prinrub])}}">{{$hcart[0]->slug_prinrub}} [{{$hnbartsprinrub[$hcart[0]->id_prinrub]}} articles]</a> &nbsp;|&nbsp; <span style="font-weight: bolder;"><?=isset($a_views)&&($a_views > 0)?$a_views:false;?> &nbsp;Vue(s)</span> </li>
                    </ul>
                </header>
                <div class="main" style="">
                    <div class="featured">
                        <figure>
                            <img src="{{url('hphx/img/'.$hcart[0]->image_article)}}">
                            <figcaption class="font-content-1-" style="">{{$hcart[0]->imgsubtitle_article}}</figcaption>
                        </figure>
                    </div>
                    <div class="row" style="background-color: rgba(255,255,255,.5); padding: 1px 2px; font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;">
                        <div class="col-md-12" style="font-size: 17px !important;">
                            <p class="font-content-1" style="font-size: 17px !important;">{{$hcart[0]->desc_article}}</p>
                            <p class="content-1" style=" font-family: 'Comic Sans MS' !important; font-size: 22px !important; "><?=(!empty($hcart[0]->content_article))?$hcart[0]->content_article:false;?> </p>
                        </div>
                    </div>
                    
                </div>
            </article>
            <div class="sharing">
            <div class="title"><i class="ion-android-share-alt"></i> Partager</div>
            <ul class="social">
                <li>
                <a href="#" class="facebook sharefacebook" target="_blank">
                    <i class="ion-social-facebook"></i> Facebook
                </a>
                </li>
                <li>
                <a href="#" class="twitter sharetwitter" target="_blank">
                    <i class="ion-social-twitter"></i> Twitter
                </a>
                </li>
                <li>
                <a href="#" class="whatsapp sharewhatsapp" target="_blank">
                    <i class="ion-social-whatsapp"></i> WhatsApp
                </a>
                </li>
                <li>
                <a href="#" class="googleplus sharegoogleplus" target="_blank">
                    <i class="ion-social-googleplus"></i> Google+
                </a>
                </li>
            </ul>
            </div>
            {{-- <div class="col-md-12"> --}}
            <div class="acategory-two text-color-2 text-uppercase top-title-3" style=" font-weight: bold;">&nbsp;Veuillez laisser un commentaire&nbsp;</div>
            {{-- </div> --}}
            <div class="comments">
                <div class="spost_nav "> 
                    <div class="fb-comments" data-href="{{url('https://greenmediaafrica.com/'.$hcart[0]->desig_prinrub.'/'.$hcart[0]->slug_article.'/'.$hcart[0]->id_article) }}" data-width="100%" data-numactus="3"></div>
                </div>
            </div>
        </div>
        @include('contents.guests.templates.sidebarone')
    </div>
    <div class="acategory-two text-color-2 text-uppercase top-title-3" style=" font-weight: bold; margin-bottom: 20px;">&nbsp;A lire aussi&nbsp;</div>
    <div class="row">
        @if(isset($halsoreads)&&count($halsoreads)!=0)
            @foreach($halsoreads as $hrnd)
            <?php $dt = date_create($hrnd->datepub_article);?>
                <div class="col-md-3" style="padding-bottom: 10px; margin-bottom: 5px;">
                    <?php $dt = date_create($hrnd->datepub_article); $dty = today();?>
                    <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                        <article class="featured mx-2" style="height: 150px; padding: 0 2px !important; margin: 0 auto;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrnd->slug_prinrub,'slug'=>$hrnd->slug_article,'ip'=>$hrnd->id_article])}}">
                                <img src="{{url('hphx/img/'.$hrnd->image_article)}}" alt="{{$hrnd->title_article}}" class="w-100" style="width: 100%;">
                            </a>
                        </article>
                        <p>
                            <a href="{{route('visitors.allactus',['rub' => $hrnd->slug_prinrub])}}" class="acategory" style="">{{$hrnd->desig_prinrub}}</a>
                        </p>
                        <p class="m-0 p-auto" style="height: 60px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrnd->slug_prinrub,'slug'=>$hrnd->slug_article,'ip'=>$hrnd->id_article])}}" class="" style="">{{Str::limit($hrnd->title_article,100)}}</a>
                        </p>
                        <p class="m-0 p-auto font-content-1" style="height: 80px; padding: auto 5px; margin: 10px;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrnd->slug_prinrub,'slug'=>$hrnd->slug_article,'ip'=>$hrnd->id_article])}}">{{Str::limit($hrnd->desc_article,160)}}</a>
                        </p>
                        <div class="time p-auto bg-success" style="font-size: 85%; padding: auto 5px; margin: 0 10px;">
                            <span style=""> @if(!empty($hrnd->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                            &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hrnd->slug_prinrub,'slug'=>$hrnd->slug_article,'ip'=>$hrnd->id_article])}}">{{$hrnd->view_article}} Vues</a>
                        </div>
                        <hr>
                    </div>
                </div>
            @endforeach
        @else
        <li>
            <div class="media">
                <div class="col-12 alert alert-danger text-center border-radius-0">Aucun article n'y existe !</div>
            </div>
        </li>
        @endif
    </div>
  </div>
</section>
<!--  -->
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
	// 
	if($ijr=="Mon"){$ljr = $tabjr[0];}elseif($ijr=="Tue"){$ljr = $tabjr[1];}elseif($ijr=="Wed"){$ljr = $tabjr[2];}elseif($ijr=="Thu"){$ljr = $tabjr[3];}
	elseif($ijr=="Fri"){$ljr = $tabjr[4];}elseif($ijr=="Sat"){$ljr = $tabjr[5];}elseif($ijr=="Sun"){$ljr = $tabjr[6];}

	return $ljr.' '.$jr.' '.$mfr.' '.$an ;
} 
;?>
@stop