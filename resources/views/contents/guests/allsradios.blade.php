@extends('layouts/guestLayout')
@section('layoutContent')
{{-- First main --}}
    <!-- Start Page Banner -->
    <div class="page-title-area pt-3 pb-1 bg-light" style="border: transparent;">
        <div class="container">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" ><a href="{{url('/')}}"><i class="bx bx-home"></i>&nbsp;&nbsp;Accueil</a></li>
                    <li class="breadcrumb-item active" >daoao radio</li>
                </ol>
            </div>
            {{-- </div> --}}
        </div>
    </div>
    <!-- End Page Banner -->
    <!-- Start First Part Medias Area -->
    <section class="default-news-area ptb-50 bg-dark">
        <div class="container mt-3">
            <div class="politics-news py-3">
                <div class="section-title"> 
                    <h2 class=" text-white">DAOAO RADIO - <a class="text-secondary font-weight-medium text-decoration-none" href=""> {{count($hcpcs)}}/{{$hnbpcs}} podcast(s)</a></h2> 
                </div>
                @if(isset($hcpcs)&&!empty($hcpcs))
                    <div class="row">
                        @foreach ($hcpcs as $hpc)
                            <?php $dt = date_create($hpc->datepub_sradio);?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="position-relative politics-news-post-box">
                                    <a href="{{route('guest.sgvd',['vslug'=>$hpc->slug_sradio,'vip'=>$hpc->id_sradio])}}">
                                        <img src="{{url('hphx/img/'.$hpc->image_sradio)}}" alt="image" class="img-btow img-btow phx-img-responsive-2">
                                    </a>
                                    <div class="politics-news-content">
                                        <div class="tag">
                                            <span class=" bg-danger text-white px-2 py-1"><i class="bx bx-podcast"></i>&nbsp;Podcast&nbsp;<i class="bx bx-time"></i><?php $dt = date_create($hpc->datepub_sradio);?> @if(!empty($hpc->datepub_sradio)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</span>
                                        </div>
                                        <h3>
                                            <a href="{{route('guest.sgpc',['vslug'=>$hpc->slug_sradio,'vip'=>$hpc->id_sradio])}}">{{Str::limit($hpc->title_sradio,200)}}</a>
                                        </h3>
                                    </div>
                                    <div class="position-absolute span-une ">
                                        <img src="{{ url('assets/img/logo-daoao-radio.png') }}" class="img-btow bg-white p-1 w-100" alt="image" style="max-width: 80px;">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12 col-md-12">
                            {{$hcpcs->links('contents.guests.includefiles.blockpagination')}}
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-12 alert alert-danger text-center border-radius-0">Aucun podcast existant !</div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End First Part Medias Area -->
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
