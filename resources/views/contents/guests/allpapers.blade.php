@extends('layouts/guestLayout')
@section('layoutContent')
<!-- Start Page Banner -->
<div class="page-title-area pt-3 pb-1 bg-light" style="border: transparent;">
    <div class="container">
        <div class="col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="{{url('/')}}"><i class="bx bx-home"></i>&nbsp;&nbsp;Accueil </a> </li>
                <li class="breadcrumb-item active">Les Journaux</li>
            </ol> 
        </div>
    </div>
</div>
<!-- End Page Banner -->
<!-- Start News Details Area -->
<section class="news-details-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">Liste des Journaux</h4>
                </div>
            </div>
            <div class="row col-lg-12 col-md-12">
                @if(isset($hallpps)&&!empty($hallpps))
                    @foreach($hallpps as $hpp)
                    <div class="col-12 col-md-3 py-1 px-1" style="overflow-y: auto;">
                        <div class="single-politics-news p-2 bg-dark">
                            <div class="politics-news-image">
                                <a href="{{url('hphx/img/'.$hpp->image_paper)}}">
                                    <img src="{{url('hphx/img/'.$hpp->image_paper)}}" alt="image" class="img-btow w-100" style="">
                                </a>
                                <a href="{{url('hphx/img/'.$hpp->image_paper)}}" class="popup-youtube">
                                    <i class='text-danger bx bx-file'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$hallpps->links('contents.guests.includefiles.blockpagination')}}
                @else
                    <div class="row">
                        <div class="col-12 alert alert-danger text-center border-radius-0">Aucun Journal n'y existe !</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Start News Details Area -->
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
