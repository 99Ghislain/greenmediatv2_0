<aside class="widget-area">
    <div class="widget widget_search">
        <form action="{{route('guest.srch')}}" method="GET" class="search-form">
            <label>
                <span class="screen-reader-text">Rechercher :</span>
                <input type="search" class="search-field" name="q" placeholder="RECHERCHE ..." value="{{$elm ?? ''}}">
            </label>
            <button type="submit">
                <i class='bx bx-search'></i>
            </button>
        </form>
    </div>

    <section class="widget widget_latest_news_thumb">
        <h3 class="widget-title">Arclicles Récents</h3>

        @if($hrecarts)
            @foreach ($hrecarts as $hrec)
                <article class="item">
                    <a href="{{route('guest.sgactu',['rub'=>$hrec->slug_prinrub,'slug'=>$hrec->slug_article,'ip'=>$hrec->id_article])}}" class="thumb">
                        <span class="fullimage cover" style="background-image: url('{{url('hphx/img/'.$hrec->image_article)}}');" role="img"></span>
                    </a>
                    <div class="info">
                        <h4 class="title usmall"><a href="{{route('guest.sgactu',['rub'=>$hrec->slug_prinrub,'slug'=>$hrec->slug_article,'ip'=>$hrec->id_article])}}">{{Str::limit($hrec->title_article,255)}}</a></h4>
                        <span><i class="bx bx-file"></i>&nbsp;{{$hrec->desig_prinrub}}&nbsp;<i class="bx bx-time"></i><?php $dt = date_create($hrec->datepub_article);?> @if(!empty($hrec->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</span>
                    </div>
                </article>
            @endforeach
        @endif
    </section>
    

    <section class="widget widget_most_shared bg-danger p-2">
        <h3 class="widget-title text-white">Edition Spéciale</h3>

        <div class="single-most-shared">
            <div class="most-shared-image">
                <a href="{{route('guest.sgactu',['rub'=>$hspecials[0]->slug_prinrub,'slug'=>$hspecials[0]->slug_article,'ip'=>$hspecials[0]->id_article])}}">
                    <img src="{{url('hphx/img/'.$hspecials[0]->image_article)}}" alt="image" class="img-btow phx-img-responsive-2">
                </a>

                <div class="most-shared-content">
                    <p class="">
                        <a class="bg-danger text-white px-2 py-1" href="{{route('guest.sgactu',['rub'=>$hspecials[0]->slug_prinrub,'slug'=>$hspecials[0]->slug_article,'ip'=>$hspecials[0]->id_article])}}">
                            <span><i class="bx bx-file"></i>&nbsp;{{$hspecials[0]->desig_prinrub}}&nbsp;</span>
                            <i class="bx bx-time"></i><?php $dt = date_create($hspecials[0]->datepub_article);?> @if(!empty($hspecials[0]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif
                        </a>
                    </p>
                    <h3>
                        <a href="{{route('guest.sgactu',['rub'=>$hspecials[0]->slug_prinrub,'slug'=>$hspecials[0]->slug_article,'ip'=>$hspecials[0]->id_article])}}">{{Str::limit($hspecials[0]->title_article,255)}}</a>
                    </h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Section DAOAO TV -->
    <section class="main-news-slider-area py-0 pb-3">
        <div class="section-title">
            <h2>DAOAO TV</h2>
        </div>
        <div class="container-fluid">
            <div class="phx-main-news-slides owl-carousel owl-theme">
            @if(isset($hrecvds)&&!empty($hrecvds))
                @foreach($hrecvds as $hrvd)
                <div class="phx-main-news-slides owl-carousel owl-theme">
                    <div class="position-relative phx-news-slider-item">
                        {{-- <div class=""> --}}
                            <a href="{{route('guest.sgvd',['vslug'=>$hrvd->slug_video,'vip'=>$hrvd->id_video])}}">
                                <img src="{{url('hphx/img/'.$hrvd->image_video)}}" alt="image" class="img-btow phx-img-responsive-2">
                            </a>
                            <div class="phx-news-content">
                                <div class="tag"><i class="bx bx-film"></i>&nbsp;Vidéo&nbsp;<span><i class="bx bx-time"></i><?php $dt = date_create($hrvd->datepub_video);?> @if(!empty($hrvd->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</span></div>
                                <h3>
                                    <a href="{{route('guest.sgvd',['vslug'=>$hrvd->slug_video,'vip'=>$hrvd->id_video])}}">{{Str::limit($hrvd->title_video,200)}}</a>
                                </h3>
                            </div>
                        {{-- </div> --}}
                        <div class="position-absolute span-une ">
                            <img src="{{ url('assets/img/logo-daoao-tv.png') }}" class="img-btow bg-white p-1 w-100" alt="image" style="max-width: 80px;">
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </section>
    <!-- End Section DAOAO TV -->
    <section class="widget widget_stay_connected">
        <h3 class="widget-title">Restez Connecté !</h3>
        
        <ul class="stay-connected-list">
            <li>
                <a href="#">
                    <i class='bx bxl-facebook'></i>
                    120,345 Fans
                </a>
            </li>
            <li>
                <a href="#" class="twitter">
                    <i class='bx bxl-twitter'></i>
                    25,321 Abonnées
                </a>
            </li>
            <li>
                <a href="#" class="youtube">
                    <i class='bx bxl-youtube'></i>
                    101,545 Abonnées
                </a>
            </li>
            <li>
                <a href="#" class="wifi">
                    <i class='bx bx-wifi'></i>
                    952 Abonnées
                </a>
            </li>
        </ul>
    </section>
    <section class="widget widget_newsletter">
        <div class="newsletter-content">
            <h3>S'abonner à notre newsletter</h3>
            <p>S'abonner à notre newsletter afin de recevoire nos actualités!</p>
        </div>   

        <form class="newsletter-form" data-toggle="validator">
            <input type="email" class="input-newsletter" placeholder="Renseigner votre email" name="EMAIL" required autocomplete="off">

            <button type="submit">S'abonner</button>
            <div id="validator-newsletter" class="form-result"></div>
        </form>
    </section>
    
    <!-- Start Section DAOAO RADIO -->
    <section class="main-news-slider-area py-0 pb-3">
        <div class="section-title">
            <h2>DAOAO RADIO</h2>
        </div>
        <div class="container-fluid">
            <div class="phx-main-news-slides owl-carousel owl-theme">
            @if(isset($hrecpcs)&&!empty($hrecpcs))
                @foreach($hrecpcs as $hrpc)
                <div class="phx-main-news-slides owl-carousel owl-theme">
                    <div class="position-relative phx-news-slider-item">
                        {{-- <div class=""> --}}
                            <a href="{{route('guest.sgpc',['vslug'=>$hrpc->slug_sradio,'vip'=>$hrpc->id_sradio])}}">
                                <img src="{{url('hphx/img/'.$hrpc->image_sradio)}}" alt="image" class="img-btow phx-img-responsive-2">
                            </a>
                            <div class="phx-news-content">
                                <div class="tag"><i class="bx bx-film"></i>&nbsp;Podcast&nbsp;<span><i class="bx bx-time"></i><?php $dt = date_create($hrpc->datepub_sradio);?> @if(!empty($hrpc->datepub_sradio)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</span></div>
                                <h3>
                                    <a href="{{route('guest.sgpc',['vslug'=>$hrpc->slug_sradio,'vip'=>$hrpc->id_sradio])}}">{{Str::limit($hrpc->title_sradio,145)}}</a>
                                </h3>
                            </div>
                        {{-- </div> --}}
                        <div class="position-absolute span-une ">
                            <img src="{{ url('assets/img/logo-daoao-radio.png') }}" class="img-btow bg-white p-1 w-100" alt="image" style="max-width: 80px;">
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </section>
    <!-- End Section DAOAO RADIO -->
    <section class="d-none widget widget_most_shared">
        <h3 class="widget-title">{{$newspg[0]->desig_prinrub}}</h3>

        <div class="single-most-shared">
            <div class="most-shared-image">
                <a href="{{route('guest.sgactu',['rub'=>$newspg[0]->slug_prinrub,'slug'=>$newspg[0]->slug_article,'ip'=>$newspg[0]->id_article])}}">
                    <img src="{{url('hphx/img/'.$newspg[0]->image_article)}}" alt="image" class="img-btow phx-img-responsive-2">
                </a>

                <div class="most-shared-content">
                    <p class="">
                        <a class="text-danger px-2 py-1" href="{{route('guest.sgactu',['rub'=>$newspg[0]->slug_prinrub,'slug'=>$newspg[0]->slug_article,'ip'=>$newspg[0]->id_article])}}">
                            <span><i class="bx bx-file"></i>&nbsp;{{$newspg[0]->desig_prinrub}}&nbsp;</span>
                            <i class="bx bx-time"></i><?php $dt = date_create($newspg[0]->datepub_article);?> @if(!empty($newspg[0]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif
                        </a>
                    </p>
                    <h3>
                        <a href="{{route('guest.sgactu',['rub'=>$newspg[0]->slug_prinrub,'slug'=>$newspg[0]->slug_article,'ip'=>$newspg[0]->id_article])}}">{{Str::limit($newspg[0]->title_article,255)}}</a>
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="widget widget_instagram">
        <h3 class="widget-title">Galérie Photos</h3>
        <ul>
            @if($ilst)
                @foreach($ilst as $ils)
                <li>
                    <div class="box">
                        <img src="{{url('hphx/img/'.$ils->img_galimg)}}" alt="image">
                        <i class="bx bx-images"></i>
                        <a href="#" target="_blank" class="link-btn"></a>
                    </div>
                </li>
                @endforeach
            @endif
        </ul>
    </section>
    
    <section class="widget widget_tag_cloud">
        <h3 class="widget-title">Catégories</h3>

        <div class="tagcloud">
            @foreach ($hrbprins as $hprin)
                <a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hprin->slug_prinrub))?'#':route('guest.allactus',['rub' => $hprin->slug_prinrub]);?>" class="<?=(isset($hpage)&&($hpage==$hprin->slug_prinrub))?'active':false;?>">{{$hprin->desig_prinrub}}</a>
            @endforeach
        </div>
    </section>
</aside>