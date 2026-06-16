@extends('layouts/guestLayout')
@section('layoutContent')
<!-- Start Page Banner -->
<div class="page-title-area pt-3 pb-1 bg-light" style="border: transparent;">
    <div class="container">
        <div class="col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="{{url('/')}}"><i class="bx bx-home"></i>&nbsp;&nbsp;Accueil </a> </li>
                <li class="breadcrumb-item"><a href="{{route('guest.svideos')}}">DAOAO TV</a></li>
                <li class="breadcrumb-item active">{{Str::limit($hcvd[0]->slug_video,200)}}</li>
            </ol> 
        </div>
    </div>
</div>
<!-- End Page Banner -->
<!-- Start First Part Medias Area -->
<section class="news-details-area text-white ptb-50 bg-dark">
    <div class="container mt-3">
        <div class="politics-news py-3">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="m-0 text-uppercase font-weight-bold text-white">{{Str::limit($hcvd[0]->title_video,255)}}</h2>
                    </div>
                    @include('contents.guests.includefiles.shareable-link')
                    <div class="d-inline-block border-top-0 text-center py-1 px-0 text-white" style="color: #000; font-size: 14px important;">
                        <span class="py-2 px-2"><i class="bx bx-edit mr-2"></i>Publié le <?php $dt = date_create($hcvd[0]->datepub_video);?> @if(!empty($hcvd[0]->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif <?php $dtm = date_create($hcvd[0]->datemodif_video);?> @if(!empty($hcvd[0]->datemodif_video)){{"| Modifié le ".$tday = phxdtformat($dtm)  }}@endif</span>
                        <span class="py-2 px-2"><i class="bx bxl-eyes mr-2"></i> | <?=isset($a_views)&&($a_views > 0)?$a_views:false;?> vue(s) </span>
                        <span class="py-2 px-2"><i class="bx bxl-list-alt mr-2"></i> | {{$hnbvds}} vidéo(s)</span> 
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                <div class="blog-details-desc">
                    <div class="article-image mt-4">
                        <div class="bk-iframe">
                            <iframe id="ivideo" class="rs-iframe" src="https://www.youtube.com/embed/{{$hcvd[0]->linkyoutube_video}}" title="{{$hcvd[0]->title_video}}" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <div class="article-content mt-4 text-white">
                        <div class="border-top-0 text-center py-1 px-0 text-white" style="color: #000; font-size: 14px important;">
                            <span class="py-2 px-2"><i class="bx bx-edit mr-2"></i>Publié le <?php $dt = date_create($hcvd[0]->datepub_video);?> @if(!empty($hcvd[0]->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif <?php $dtm = date_create($hcvd[0]->datemodif_video);?> @if(!empty($hcvd[0]->datemodif_video)){{"| Modifié le ".$tday = phxdtformat($dtm)  }}@endif</span>
                            <span class="py-2 px-2"><i class="bx bx-eyes mr-2"></i> | <?=isset($a_views)&&($a_views > 0)?$a_views:false;?> vue(s) </span>
                            <span class="py-2 px-2"><i class="bx bxl-list-alt mr-2"></i> | {{$hnbvds}} vidéo(s)</span> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3 mt-4">
                    <div class="section-title mb-0">
                        <h4 class="m-0 font-weight-bold text-white">De la même catégorie</h4>
                    </div>
                    <!--bg-white-->
                    <div class=" border border-top-0 p-4">
                        <div class="row">
                        <!--  -->
                        @if(count($halsoreads)!=0)
                            @if(isset($halsoreads)&&!empty($halsoreads))
                                @foreach($halsoreads as $hvd)
                                    <?php $dt = date_create($hvd->datepub_video);?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="position-relative politics-news-post-box">
                                            <a href="{{route('guest.sgvd',['vslug'=>$hvd->slug_video,'vip'=>$hvd->id_video])}}">
                                                <img src="{{url('hphx/img/'.$hvd->image_video)}}" alt="image" class="img-btow img-btow phx-img-responsive-2">
                                            </a>
                                            <div class="politics-news-content">
                                                <div class="tag">
                                                    <span class=" bg-danger text-white px-2 py-1"><i class="bx bx-film"></i>&nbsp;Vidéo&nbsp;<i class="bx bx-time"></i><?php $dt = date_create($hvd->datepub_video);?> @if(!empty($hvd->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</span>
                                                </div>
                                                <h3>
                                                    <a href="{{route('guest.sgvd',['vslug'=>$hvd->slug_video,'vip'=>$hvd->id_video])}}">{{Str::limit($hvd->title_video,200)}}</a>
                                                </h3>
                                            </div>
                                            <div class="position-absolute span-une ">
                                                <img src="{{ url('assets/img/logo-daoao-tv.png') }}" class="img-btow bg-white p-1 w-100" alt="image" style="max-width: 80px;">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @else
                            <div class="col-12 alert alert-danger text-center border-radius-0">Aucune vidéo existante !</div>
                        @endif
                        <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End First Part Medias Area -->
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