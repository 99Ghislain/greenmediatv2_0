@extends('layouts/guestLayout')
@section('layoutContent')
{{-- First main --}}
<!-- Start Page Banner -->
<div class="page-title-area pt-3 pb-1 bg-light" style="border: transparent;">
    <div class="container">
        <div class="col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="{{url('/')}}"><i class="bx bx-home"></i>&nbsp;&nbsp;Accueil </a> </li>
                <li class="breadcrumb-item active">Recherche de "{{$elm ?? ''}}"</li>
            </ol> 
        </div>
        {{-- </div> --}}
    </div>
</div>
<!-- End Page Banner -->
<!-- Start Contact Area -->
<section class="contact-area ptb-50">
    <div class="container">
        <div class="row">
            @if(count($hcarts)!=0)
            <div class="col-lg-8">
                @foreach($hcarts as $arts)
                <div class="single-news-item">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="news-image">
                                <a href="{{route('guest.sgactu',['rub'=>$arts->slug_prinrub,'slug'=>$arts->slug_article,'ip'=>$arts->id_article])}}" class="">
                                    <img src="{{url('images/'.$arts->image_article)}}" alt="image" class="img-btow phx-img-responsive img-size-factuel" style="max-height: 210px; width: 100%; object-fit: cover;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="news-content">
                                <span>&nbsp;&nbsp;{{$arts->desig_prinrub}}&nbsp;&nbsp;</span>
                                <h3>
                                    <a href="{{route('guest.sgactu',['rub'=>$arts->slug_prinrub,'slug'=>$arts->slug_article,'ip'=>$arts->id_article])}}">{{Str::limit($arts->title_article,200)}}</a>
                                </h3>
                                <p>{{Str::limit($arts->desc_article,100)}}</p>
                                <p><a href="{{route('guest.sgactu',['rub'=>$arts->slug_prinrub,'slug'=>$arts->slug_article,'ip'=>$arts->id_article])}}">{{$arts->lastename_user}} {{Str::limit($arts->firstname_user,20)}}</a> / <?php $dt = date_create($arts->datepub_article);?> @if(!empty($arts->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Paginate Block -->
                {{$hcarts->links('contents.guests.includefiles.blockpagination')}}
                <!-- Paginate Block -->
            </div>
            @else
	    	<div class="col-lg-8 ">
	    		<div class="text-center border-radius-0" style="font-size: 20px;">Aucun article retrouvé !</div>
	    	</div> 
	    	<!--alert alert-danger-->
	        @endif

            <div class="col-lg-4">
                <aside class="widget-area">
                    @include('contents.guests.includefiles.sglsidebar')
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->
{{-- End main --}}
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
@endsection