
<div class="col-lg-4">
    <!-- Actualité -->
    <div class="mb-3">
        <div class="container"> 
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">A LA UNE</h4>
            </div>
            <div class="position-relative">
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="{{url('hphx/img/'.$hluarticle[0]->image_article)}}" style="object-fit: cover;"> 
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="{{route('visitors.sgpost',['rub'=>$hluarticle[0]->slug_prinrub,'slug'=>$hluarticle[0]->slug_article,'ip'=>$hluarticle[0]->id_article])}}">{{$hluarticle[0]->desig_prinrub}}</a>
                            <a class="text-white" href="{{route('visitors.sgpost',['rub'=>$hluarticle[0]->slug_prinrub,'slug'=>$hluarticle[0]->slug_article,'ip'=>$hluarticle[0]->id_article])}}"><small><?php $dt = date_create($hluarticle[0]->datepub_article);?> @if(!empty($hluarticle[0]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</small></a>
                        </div>
                        <a class="h6 m-0 text-white font-weight-semi-bold" href="{{route('visitors.sgpost',['rub'=>$hluarticle[0]->slug_prinrub,'slug'=>$hluarticle[0]->slug_article,'ip'=>$hluarticle[0]->id_article])}}">{{Str::limit($hluarticle[0]->title_article,255)}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- Actualité -->
    <!-- Video -->
    <div class="mb-3">
        <div class="section-title mb-0 bg-danger text-white htv">
            <h4 class="m-0 text-uppercase font-weight-bold" style="color: #fff;">AKWABA VISION - TV</h4>
        </div>
        <div class="bg-white border border-top-0 p-2">
            <div class="col-12">
                <div class=" position-relative mb-3">
                    <div class="position-relative overflow-hidden" style="height: 193px;">
                        <img class="img-fluid h-100" src="{{url('hphx/img/'.$hlastvd[0]->image_video)}}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2" style="background: rgba(211,37,38,1); padding: 2px 6px;">
                                <a class="text-white text-uppercase" href="{{route('visitors.sgvd',['vslug'=>$hlastvd[0]->slug_video,'vip'=>$hlastvd[0]->id_video])}}" style=" text-decoration: none;"><small>  <i class="fa fa-play"></i> Visualiser</small></a>
                            </div>
                            <a class="h6 m-0 text-white font-weight-semi-bold" href="{{route('visitors.sgvd',['vslug'=>$hlastvd[0]->slug_video,'vip'=>$hlastvd[0]->id_video])}}">{{Str::limit($hlastvd[0]->title_video,255)}}</a>
                            <p style="position: absolute; bottom: -15px; right: 15px; padding-top: 10px;">
                                <a class="d-block text-white float-right day-post" href="{{route('visitors.sgvd',['vslug'=>$hlastvd[0]->slug_video,'vip'=>$hlastvd[0]->id_video])}}"><?php $dt = date_create($hlastvd[0]->datepub_video);?> @if(!empty($hlastvd[0]->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</a>
                            </p>
                        </div>
                    </div>
                    <a href="{{route('visitors.sgvd',['vslug'=>$hlastvd[0]->slug_video,'vip'=>$hlastvd[0]->id_video])}}">
                        <div class="position-absolute b-icon-video-sm icon-mv-sm"> 
                            <i class="fa fa-play"></i>
                        </div>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->
    <!-- Popular News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Articles Récents</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            @if(isset($hrecarts)&&!empty($hrecarts))
                @foreach($hrecarts as $hrec)
                <div class="col-12">
                    <div class="d-flex align-items-center bg-white mb-3 py-0 border" style="height: 110px;">
                            <img class="img-fluid h-100" src="{{url('hphx/img/'.$hrec->image_article)}}" style="width: 110px;" alt="">
                        <!-- </a> -->
                        <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{route('visitors.sgpost',['rub'=>$hrec->slug_prinrub,'slug'=>$hrec->slug_article,'ip'=>$hrec->id_article])}}">{{$hrec->desig_prinrub}}</a>
                                <br><a class="text-body" href="{{route('visitors.sgpost',['rub'=>$hrec->slug_prinrub,'slug'=>$hrec->slug_article,'ip'=>$hrec->id_article])}}"><small><?php $dt = date_create($hrec->datepub_article);?> @if(!empty($hrec->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</small></a>
                            </div>
                            <a class="h8 m-0 text-secondary font-weight-bold" href="{{route('visitors.sgpost',['rub'=>$hrec->slug_prinrub,'slug'=>$hrec->slug_article,'ip'=>$hrec->id_article])}}" style="font-size: 11px;">{{Str::limit($hrec->title_article,55)}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="row py-2 mb-4">
            <div class="col-12"><a href="{{route('visitors.aallrcposts')}}" class="btn btn-danger" style="width: 100%; font-weight: bolder;"><i class="fa fa-angle-double-right"></i> Voir plus ...</a></div>
        </div>
    </div>
    <!-- Popular News End -->
    <!-- Podcast -->
    <div class="mb-3">
        <div class="section-title mb-0 bg-info hpc">
            <h4 class="m-0 text-uppercase font-weight-bold"style="">AKWABA VISION - RADIO</h4>
        </div>
        <div class="bg-white border border-top-0 p-2">
            <div class="col-12">
                <div class="position-relative mb-3">
                    <div class="position-relative overflow-hidden" style="height: 193px;">
                        <img class="img-fluid h-100" src="{{url('hphx/img/'.$hlastpc[0]->image_sradio)}}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2" style="background: rgba(23,162,184,1); padding: 2px 6px;">
                                <a class="text-white" href="{{route('visitors.sgpc',['vslug'=>$hlastpc[0]->slug_sradio,'vip'=>$hlastpc[0]->id_sradio])}}" style=" text-decoration: none;"><small>  <i class="fa fa-podcast"></i> écouter</small></a>
                            </div>
                            <a class="h6 m-0 text-white font-weight-semi-bold" href="{{route('visitors.sgpc',['vslug'=>$hlastpc[0]->slug_sradio,'vip'=>$hlastpc[0]->id_sradio])}}">{{Str::limit($hlastpc[0]->title_sradio,145)}}</a>
                            <p style="position: absolute; bottom: -15px; right: 15px; padding-top: 10px;">
                                <a class="d-block text-white float-right day-post" href="{{route('visitors.sgpc',['vslug'=>$hlastpc[0]->slug_sradio,'vip'=>$hlastpc[0]->id_sradio])}}"><?php $dt = date_create($hlastpc[0]->datepub_sradio);?> @if(!empty($hlastpc[0]->datepub_sradio)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</a>
                            </p>
                        </div>
                    </div>
                    <a href="{{route('visitors.sgpc',['vslug'=>$hlastpc[0]->slug_sradio,'vip'=>$hlastpc[0]->id_sradio])}}">
                        <div class="position-absolute b-icon-pc icon-pc-mv"> 
                            <i class="fa fa-podcast"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Podcast End -->
    @include('visitors.templates.hsidebar')
</div>
