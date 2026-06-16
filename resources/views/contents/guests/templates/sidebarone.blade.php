<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
  <aside>
    <div class="acategory-two text-color-2 text-uppercase top-title-3" style=" font-weight: bold; margin-bottom: 20px;">&nbsp;ça peut vous intéresser&nbsp;</div>
    <div class="bg-success b-radius-6" style="padding: 10px; margin: auto 0px 20px 0px;">
      @if(isset($hrandarts[0])&&!empty($hrandarts[0]))
          <?php $dt = date_create($hrandarts[0]->datepub_article); $dty = today();?>
          <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
              <article class="featured mx-2" style="max-height: 150px; padding: 0 2px !important; margin: 0 auto;">
                  <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[0]->slug_prinrub,'slug'=>$hrandarts[0]->slug_article,'ip'=>$hrandarts[0]->id_article])}}">
                          <img src="{{url('hphx/img/'.$hrandarts[0]->image_article)}}" alt="{{$hrandarts[0]->title_article}}" class="w-100" style="width: 100%;">
                  </a>
              </article>
              <p class="m-0 p-auto sub-title-2" style="height: 60px; font-size: 16px; font-weight: bold; padding: auto 5px; margin: 10px;">
                  <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[0]->slug_prinrub,'slug'=>$hrandarts[0]->slug_article,'ip'=>$hrandarts[0]->id_article])}}" class="" style="">{{Str::limit($hrandarts[0]->title_article,100)}}</a>
              </p>
              <p class="m-0 p-auto font-content-1" style="height: 100px; padding: auto 5px; margin: 10px;">
                  <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[0]->slug_prinrub,'slug'=>$hrandarts[0]->slug_article,'ip'=>$hrandarts[0]->id_article])}}">{{Str::limit($hrandarts[0]->desc_article,200)}}</a>
              </p>
              <div class="time p-auto" style="font-size: 85%; padding: auto 5px; margin: 0 10px;">
                  <span style=""> @if(!empty($hrandarts[0]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                  &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.allactus',['rub' => $hrandarts[0]->slug_prinrub])}}" class="acategory" style="">{{$hrandarts[0]->desig_prinrub}}</a>
              </div>
              <hr class="bg-success" style="background-color:#3b2413 !important; line-height: 2px;">
          </div>
      @endif
      <div style="margin-top: 20px; max-height: 400px; overflow-y: auto;">
          @if(isset($hrandarts)&&count($hrandarts)!=0)
              @if(isset($hrandarts[1])&&!empty($hrandarts[1]))
                  <?php $dt = date_create($hrandarts[1]->datepub_article);?>
                  <article class="article-mini box-green b-radius-6">
                      <div class="inner">
                          <figure>
                              <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[1]->slug_prinrub,'slug'=>$hrandarts[1]->slug_article,'ip'=>$hrandarts[1]->id_article])}}">
                                  <img src="{{url('hphx/img/'.$hrandarts[1]->image_article)}}" alt="{{$hrandarts[1]->title_article}}">
                              </a>
                          </figure>
                          <div class="padding">
                              <p class="m-0 p-auto" style="font-size: 80%; font-weight: bold;">
                                  <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[1]->slug_prinrub,'slug'=>$hrandarts[1]->slug_article,'ip'=>$hrandarts[1]->id_article])}}" class="" style="">{{Str::limit($hrandarts[1]->title_article,255)}}</a>
                              </p>
                              <div class="time"> @if(!empty($hrandarts[1]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</div>
                          </div>
                      </div>
                  </article>
              @endif
              @if(isset($hrandarts[2])&&!empty($hrandarts[2]))
                  <?php $dt = date_create($hrandarts[2]->datepub_article);?>
                  <article class="article-mini box-green b-radius-6">
                      <div class="inner">
                          <figure>
                              <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[2]->slug_prinrub,'slug'=>$hrandarts[2]->slug_article,'ip'=>$hrandarts[2]->id_article])}}">
                                  <img src="{{url('hphx/img/'.$hrandarts[2]->image_article)}}" alt="{{$hrandarts[2]->title_article}}">
                              </a>
                          </figure>
                          <div class="padding">
                              {{-- detail<p><a href="{{route('visitors.sgactu',['rub'=>$hrandarts[2]->slug_prinrub,'slug'=>$hrandarts[2]->slug_article,'ip'=>$hrandarts[2]->id_article])}}">{{Str::limit($hrandarts[2]->title_article,255)}}</a></h2> --}}
                              <p class="m-0 p-auto" style="font-size: 80%; font-weight: bold;">
                                  <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[2]->slug_prinrub,'slug'=>$hrandarts[2]->slug_article,'ip'=>$hrandarts[2]->id_article])}}" class="" style="">{{Str::limit($hrandarts[2]->title_article,255)}}</a>
                              </p>
                              <div class="time"> @if(!empty($hrandarts[2]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</div>
                          </div>
                      </div>
                  </article>
              @endif
              @if(isset($hrandarts[3])&&!empty($hrandarts[3]))
                  <?php $dt = date_create($hrandarts[3]->datepub_article);?>
                  <article class="article-mini box-green b-radius-6">
                      <div class="inner">
                          <figure>
                              <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[3]->slug_prinrub,'slug'=>$hrandarts[3]->slug_article,'ip'=>$hrandarts[3]->id_article])}}">
                                  <img src="{{url('hphx/img/'.$hrandarts[3]->image_article)}}" alt="{{$hrandarts[3]->title_article}}">
                              </a>
                          </figure>
                          <div class="padding">
                              {{-- detail<p><a href="{{route('visitors.sgactu',['rub'=>$hrandarts[3]->slug_prinrub,'slug'=>$hrandarts[3]->slug_article,'ip'=>$hrandarts[3]->id_article])}}">{{Str::limit($hrandarts[3]->title_article,255)}}</a></h2> --}}
                              <p class="m-0 p-auto" style="font-size: 80%; font-weight: bold;">
                                  <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[3]->slug_prinrub,'slug'=>$hrandarts[3]->slug_article,'ip'=>$hrandarts[3]->id_article])}}" class="" style="">{{Str::limit($hrandarts[3]->title_article,255)}}</a>
                              </p>
                              <div class="time"> @if(!empty($hrandarts[3]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</div>
                          </div>
                      </div>
                  </article>
              @endif
              @if(isset($hrandarts[4])&&!empty($hrandarts[4]))
                  <?php $dt = date_create($hrandarts[4]->datepub_article);?>
                  <article class="article-mini box-green b-radius-6">
                      <div class="inner">
                          <figure>
                              <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[4]->slug_prinrub,'slug'=>$hrandarts[4]->slug_article,'ip'=>$hrandarts[4]->id_article])}}">
                                  <img src="{{url('hphx/img/'.$hrandarts[4]->image_article)}}" alt="{{$hrandarts[4]->title_article}}">
                              </a>
                          </figure>
                          <div class="padding">
                              {{-- detail<p><a href="{{route('visitors.sgactu',['rub'=>$hrandarts[4]->slug_prinrub,'slug'=>$hrandarts[4]->slug_article,'ip'=>$hrandarts[4]->id_article])}}">{{Str::limit($hrandarts[4]->title_article,255)}}</a></h2> --}}
                              <p class="m-0 p-auto" style="font-size: 80%; font-weight: bold;">
                                  <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[4]->slug_prinrub,'slug'=>$hrandarts[4]->slug_article,'ip'=>$hrandarts[4]->id_article])}}" class="" style="">{{Str::limit($hrandarts[4]->title_article,255)}}</a>
                              </p>
                              <div class="time"> @if(!empty($hrandarts[4]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</div>
                          </div>
                      </div>
                  </article>
              @endif
          @endif 
          <div class="col-12" style="margin-top: 10px;">
              <a href="{{route('visitors.allactusz')}}" class="btn btn-link " style="width: 100%;"> Voir plus ... <i class="ion-ios-arrow-thin-right"></i></a>
          </div> 
      </div>
    </div>
  </aside>
  <aside>
    <div class="aside-body box-green mx-2 b-radius-6">
        <iframe src="https://fr.widgets.investing.com/live-commodities?theme=darkTheme&amp;pairs=8917,959198,8894,8911,8851,8919,8915,8918,13916,8916" style="background-color: #f2f2f2f2; border-radius: 6px;" width="100%" height="350" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe>
    </div>
  </aside>
  <aside>
    {{-- <h1 class="aside-title">Green Media Africa - TV <i class="ion-plus"></i> --}}
      <div class="d-inline-block acategory-two text-color-2 text-uppercase top-title-3" style=" font-weight: bold; margin-bottom: 20px;">&nbsp;Green Media Africa - TV&nbsp;

    </div>
    <div class="aside-body">
      <div class="owl-carousel carousel-2" style="padding-bottom: 0;">
        @if(isset($rdsdvds)&&!empty($rdsdvds[0]))
          @foreach($rdsdvds as $dvd)
          <article class="article article-vds bg-white b-radius-6 box-green">
            <?php $dt = date_create($dvd->datepub_video); $dty = today();?>
            <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
              <article class="featured mx-2" style="max-height: 150px; padding: 0 2px !important; margin: 0 auto;">
                <a href="{{url('https://www.youtube.com/embed/'.$dvd->linkyoutube_video.'?showinfo=0')}}">
                  <img src="{{url('hphx/img/'.$dvd->image_video)}}" alt="{{$dvd->title_video}}" class="w-100" style="width: 100%;">
                </a>
              </article>
              <p class="m-0 p-auto" style="font-size: 16px; height: 80px; font-weight: bold; padding: auto 5px; margin: 10px;">
                <a href="{{url('https://www.youtube.com/embed/'.$dvd->linkyoutube_video.'?showinfo=0')}}" class="" style="">{{Str::limit($dvd->title_video,100)}}</a>
              </p>
              <div class="time p-auto" style="font-size: 85%; padding: auto 5px; margin: 0 10px 10px 10px;">
                <span style=""> <?php $dt = date_create($dvd->datepub_video);?> @if(!empty($dvd->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif </span>
                &nbsp;&nbsp; | &nbsp;&nbsp; <a href="#" class="acategory" style=" background-color: #d00 !important;">&nbsp;Vidéo&nbsp;</a>
              </div>
            </div>
          </article>
          @endforeach
        @endif
      </div>
    </div>
  </aside>
  <aside style="display: none;">
    <div class="aside-body">
      <figure class="ads text-center">
        <figcaption>- Publicité -</figcaption>
        @if(isset($pubs_l1)&&count($pubs_l1)!=0)
          <a href="<?=(isset($pubs_l1[0])&&!empty($pubs_l1[0]))?$pubs_l1[0]->linkdest_pub:false;?>" target="_blank">
            <img src="{{url('images/'.$pubs_l1[0]->image_pub)}}" class="dpub-sidebar">
          </a>
        @else
          <img src="{{url('images/1-default-img-pub.png')}}" class="dpub-sidebar">
        @endif
      </figure>
    </div>
  </aside>
</div>