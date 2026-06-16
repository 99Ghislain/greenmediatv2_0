@extends('layouts/guestLayout')
@section('layoutContent')
<section class="home " style="margin-top: -30px ; padding: 0;">
	<div class="container">
		<div class="row">
			<div class="container col-12">
				<div class="row">
					<div class="col-md-12" style="font-weight: bolder;">        
						<ol class="breadcrumb bg-white">
							<li ><a href="{{url('/')}}">Accueil</a></li>
							<li class="active">{{$rub}}</li>
						</ol>
					</div>
				</div>
			</div>
			<br>
			<div class="col-md-12 text-left">
				<div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <div class="acategory-two text-color-2 text-uppercase top-title-3" style=" font-weight: bold;">&nbsp;Voici @if(!empty($hcarts[0]->id_prinrub)&&!isset($wcount)){{count($hcarts)}}/{{$hnbartsprinrub[$hcarts[0]->id_prinrub]}}@elseif(isset($wcount)){{count($hcarts)}}/{{$wcount}} @else 0/0 @endif Article(s) de : <span class="text-success">{{$rub}}</span> &nbsp;</div>
                    </div>
				</div>
				{{-- <div class="line"></div> --}}
				@if(count($hcarts)!=0)
					<div class="row">
                        @if(isset($hcarts)&&count($hcarts)!=0)
                            @foreach($hcarts as $hrh)
                            <?php $dt = date_create($hrh->datepub_article);?>
                                <div class="col-md-3" style="padding-bottom: 10px; margin-bottom: 5px;">
                                    <?php $dt = date_create($hrh->datepub_article); $dty = today();?>
                                    <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                                        <article class="featured mx-2" style="height: 150px; padding: 0 2px !important; margin: 0 auto;">
                                            <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">
                                                <img src="{{url('hphx/img/'.$hrh->image_article)}}" alt="{{$hrh->title_article}}" class="w-100" style="width: 100%;">
                                            </a>
                                        </article>
                                        <p>
                                            <a href="{{route('visitors.allactus',['rub' => $hrh->slug_prinrub])}}" class="acategory" style="">{{$hrh->desig_prinrub}}</a>
                                        </p>
                                        <p class="m-0 p-auto sub-title-2" style="height: 53px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                                            <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}" class="" style="">{{Str::limit($hrh->title_article,100)}}</a>
                                        </p>
                                        <p class="m-0 p-auto font-content-1" style="height: 80px; padding: auto 5px; margin: 10px;">
                                            <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">{{Str::limit($hrh->desc_article,160)}}</a>
                                        </p>
                                        <div class="time p-auto bg-success" style="font-size: 85%; padding: auto 5px; margin: 0 10px;">
                                            <span style=""> @if(!empty($hrh->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                            &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">{{$hrh->view_article}} Vues</a>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{--  --}}
						<!-- Paginate Block -->
						{{$hcarts->links('contents.guests.templates.blockpagination')}}
		    			<!-- Paginate Block -->
					</div>
				@else
				<div class="">
					<div class="col-12 alert alert-danger text-center border-radius-0">Aucun article n'y existe !</div>
				</div>
				@endif
			</div>
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