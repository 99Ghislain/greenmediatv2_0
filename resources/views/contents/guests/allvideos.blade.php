@extends('layouts/guestLayout')
@section('layoutContent')
<section class="home" style="margin-top: -30px ; padding: 0;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-left">
					<div class="row">
						<div class="col-md-12" style="font-weight: bolder;">        
							<ol class="breadcrumb bg-white">
								<li><a href="{{url('/')}}">Accueil</a></li>
								<li class="active">Green Media Africa - TV</li>
							</ol>
                        </div>
					</div>
                    <br>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12">
                            <div class="acategory-two text-color-2 text-uppercase top-title-3" style=" font-weight: bold;">&nbsp;Voici {{count($hcvds)}}/{{$hnbvds}} Vidéo(s) &nbsp;</div>
                        </div>
                    </div>
					@if(count($hcvds)!=0)
					<div class="row">
                        @if(isset($hcvds)&&!empty($hcvds[0]))
                            @foreach($hcvds as $alvd)
                            <div class="col-md-4" style="margin: 20px auto;">
                                <article class="article article-vds bg-white b-radius-6 box-green">
                                    <?php $dt = date_create($alvd->datepub_video); $dty = today();?>
                                    <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                                        <article class="featured mx-2" style="max-height: 150px; padding: 0 2px !important; margin: 0 auto;">
                                            <a class="vdsplayer" href="{{url('https://www.youtube.com/embed/'.$alvd->linkyoutube_video.'?showinfo=0')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
                                                <img src="{{url('hphx/img/'.$alvd->image_video)}}" alt="{{$alvd->title_video}}" class="w-100" style="width: 100%;">
                                            </a>
                                        </article>
                                        <p class="m-0 p-auto" style="font-size: 16px; height: 80px; font-weight: bold; padding: auto 5px; margin: 10px;">
                                            <a class="vdsplayer" href="{{url('https://www.youtube.com/embed/'.$alvd->linkyoutube_video.'?showinfo=0')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery" style="">{{Str::limit($alvd->title_video,100)}}</a>
                                        </p>
                                        <div class="time p-auto" style="font-size: 85%; padding: auto 5px; margin: 0 10px 10px 10px;">
                                            <span style=""> <?php $dt = date_create($alvd->datepub_video);?> @if(!empty($alvd->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif </span>
                                            &nbsp;&nbsp; | &nbsp;&nbsp; <a href="#" class="acategory" style=" background-color: #d00 !important;">&nbsp;Vidéo&nbsp;</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        @endif
                        <!-- Paginate Block -->
                        {{$hcvds->links('contents.guests.templates.blockpagination')}}
                        <!-- Paginate Block -->
					</div>
					@else
					<div class="">
						<div class="col-12 alert alert-danger text-center border-radius-0">Aucune Vidéo n'y existe !</div>
					</div>
					@endif
				</div>
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
	// 
	if($ijr=="Mon"){$ljr = $tabjr[0];}elseif($ijr=="Tue"){$ljr = $tabjr[1];}elseif($ijr=="Wed"){$ljr = $tabjr[2];}elseif($ijr=="Thu"){$ljr = $tabjr[3];}
	elseif($ijr=="Fri"){$ljr = $tabjr[4];}elseif($ijr=="Sat"){$ljr = $tabjr[5];}elseif($ijr=="Sun"){$ljr = $tabjr[6];}

	return $ljr.' '.$jr.' '.$mfr.' '.$an ;
} 
;?>
@stop
