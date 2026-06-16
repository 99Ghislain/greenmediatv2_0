@extends('layouts/guestLayout')
@section('layoutContent')
<!-- Start Page Banner -->
<div class="page-title-area pt-3 pb-1 bg-light" style="border: transparent;">
    <div class="container">
        <div class="col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="{{url('/')}}"><i class="bx bx-home"></i>&nbsp;&nbsp;Accueil </a> </li>
                <li class="breadcrumb-item active">Brèves</li>
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
                    <h4 class="m-0 text-uppercase font-weight-bold">Les Brèves</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="blog-details-desc">
                    @include('contents.guests.includefiles.shareable-link')
                    <hr/>
                    <div class="article-content">
                        <div class="bg-white border-top-0 p-4" style="color: #000;">
                        @if(isset($hbrvs)&&!empty($hbrvs))
                            <div>
                                <ul id="" class="px-2">
                                    @foreach($hbrvs as $hbrv)
                                    <li class="news-item bg-light mb-3 mx-1" style="list-style-type: number;" title="{{Str::limit($hbrv->desig_flash,255)}}">
                                        <div class="w-100 h-90 px-2 d-flex flex-column justify-content-center bg-light">
                                            <div class="mb-2">
                                                <a class="badge bg-danger font-weight-semi-bold p-1 mr-2" href="" style="color: #fff;"><?php $dt = date_create($hbrv->datedebut_flash);?> @if(!empty($hbrv->datedebut_flash)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</a>
                                            </div>
                                            <a href="" class="float-right" style="font-size: 14.5px;"><span style="color: #000;">{{Str::limit($hbrv->desig_flash,255)}}</span> <!-- <br> --> <span class="float-right" style="color: rgb(23,162,184); display: none;"><i class="fa fa-angle-double-right"></i> Voir plus ...</span></a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{$hbrvs->links('contents.guests.includefiles.blockpagination')}}
                        @else
                            <div class="row">
                                <div class="col-12 alert alert-danger text-center border-radius-0">Aucun brève n'y existe !</div>
                            </div>
                        @endif
                    </div>
                    </div>
                    <div class="article-footer">
                        <div class="article-share">
                            @include('contents.guests.includefiles.shareable-link')
                        </div>
                    </div>
                <!-- Other articles End -->
                </div>
            </div>
            <div class="col-lg-4">
                @include('contents.guests.includefiles.sglsidebar')
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
