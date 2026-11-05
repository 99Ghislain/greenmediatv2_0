<div class="col-xs-12 col-md-4 sidebar" id="sidebar">
  
  <aside style="margin-bottom: 40px;">
    <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="margin-bottom: 25px; text-align: center; font-size: 16px !important;">
      <span class="gm-animated-dot"></span> ça peut vous intéresser 
    </div>

    <div style="margin-bottom: 25px;">
      @if(isset($hrandarts[0]) && !empty($hrandarts[0]))
          <?php $dt = date_create($hrandarts[0]->datepub_article); $dty = today();?>
          
          <div class="gm-grid-card" style="width: 100%;">
              <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[0]->slug_prinrub,'slug'=>$hrandarts[0]->slug_article,'ip'=>$hrandarts[0]->id_article])}}">
                  <img src="{{url('hphx/img/'.$hrandarts[0]->image_article)}}" alt="{{$hrandarts[0]->title_article}}" class="gm-grid-img">
              </a>
              
              <div class="gm-grid-body">
                  <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[0]->slug_prinrub,'slug'=>$hrandarts[0]->slug_article,'ip'=>$hrandarts[0]->id_article])}}" class="gm-grid-title" style="font-size: 1.5rem;">
                      {{Str::limit($hrandarts[0]->title_article, 90)}}
                  </a>
                  <p class="gm-side-desc">
                      {{Str::limit($hrandarts[0]->desc_article, 120)}}
                  </p>
              </div>

              <div class="gm-card-footer">
                  <a href="{{route('visitors.allactus',['rub' => $hrandarts[0]->slug_prinrub])}}">
                      {{$hrandarts[0]->desig_prinrub}}
                  </a>
                  <span class="gm-separator" style="margin: 0 5px;">|</span>
                  <span>@if(!empty($hrandarts[0]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                  <span class="gm-separator" style="margin: 0 5px;">|</span>
                  <span style="color: #ff9800; font-weight: 600;">
                      <i class="ion-android-time"></i> {{ $hrandarts[0]->temps_lecture ?? 1 }} min
                  </span>
              </div>
          </div>
      @endif
    </div>

    <div>
        @if(isset($hrandarts) && count($hrandarts)!=0)
            @for ($i = 1; $i <= 4; $i++)
                @if(isset($hrandarts[$i]) && !empty($hrandarts[$i]))
                    <?php $dt = date_create($hrandarts[$i]->datepub_article);?>
                    
                    <div style="display: flex; gap: 15px; align-items: flex-start; margin-bottom: 15px; border-bottom: 3px solid #ffa000; padding-bottom: 15px;">
                        
                        <div style="flex-shrink: 0; width: 130px; display: flex; flex-direction: column;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[$i]->slug_prinrub,'slug'=>$hrandarts[$i]->slug_article,'ip'=>$hrandarts[$i]->id_article])}}">
                                <img src="{{url('hphx/img/'.$hrandarts[$i]->image_article)}}" alt="{{$hrandarts[$i]->title_article}}" style="width: 100%; height: 85px; object-fit: cover; border: 2px solid #127319; border-radius: 5px 5px 0 0; display: block;">
                            </a>
                            <div style="background-color: #127319; color: #ffff; text-align: center; padding: 5px 2px; font-size: 0.8rem; font-weight: 700; border-radius: 0 0 5px 5px;">
                                <i class="ion-ios-calendar-outline"></i> @if(!empty($hrandarts[$i]->datepub_article)){{ phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif
                            </div>
                        </div>
                        
                        <div style="flex-grow: 1;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrandarts[$i]->slug_prinrub,'slug'=>$hrandarts[$i]->slug_article,'ip'=>$hrandarts[$i]->id_article])}}" class="gm-side-title" style="font-size: 1.1rem; font-weight: 800; color: #111; line-height: 1.3; display: block; margin-bottom: 8px;">
                                {{Str::limit($hrandarts[$i]->title_article, 60)}}
                            </a>
                            <p style="font-size: 0.85rem; color: #444; line-height: 1.4; margin: 0 0 5px 0;">
                                {{Str::limit($hrandarts[$i]->desc_article, 75)}}
                            </p>
                            <div style="font-size: 0.75rem; color: #ff9800; font-weight: 700;">
                                <i class="ion-android-time"></i> Lecture : {{ $hrandarts[$i]->temps_lecture ?? 1 }} min
                            </div>
                        </div>

                    </div>

                @endif
            @endfor
        @endif 

        <div class="col-12" style="margin-top: 15px; padding: 0;">
            <a href="{{route('visitors.allactusz')}}" class="btn btn-outline-dark" style="width: 100%; border-radius: 30px; font-weight: 700;"> 
                Voir plus d'actualités <i class="ion-ios-arrow-thin-right"></i>
            </a>
        </div> 
    </div>
  </aside>

  <aside style="margin-bottom: 40px;">
    <div style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <iframe src="https://fr.widgets.investing.com/live-commodities?theme=darkTheme&amp;pairs=8917,959198,8894,8911,8851,8919,8915,8918,13916,8916" style="background-color: #f2f2f2; border: none;" width="100%" height="350" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe>
    </div>
  </aside>

  <aside style="margin-bottom: 40px;">
    
   <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="margin-bottom: 25px; text-align: center; font-size: 16px !important;">
    <span class="gm-animated-dot"></span> GREEN MEDIA AFRICA - TV 
</div>

    <div class="aside-body">
      <div class="owl-carousel carousel-2" style="padding-bottom: 0;">
        @if(isset($rdsdvds) && !empty($rdsdvds[0]))
          @foreach($rdsdvds as $dvd)
          
            <div class="gm-grid-card" style="width: 100%; margin-bottom: 10px;">
              <a href="{{url('https://www.youtube.com/embed/'.$dvd->linkyoutube_video.'?showinfo=0')}}">
                <img src="{{url('hphx/img/'.$dvd->image_video)}}" alt="{{$dvd->title_video}}" style="width: 100%; aspect-ratio: 16/9; object-fit: cover; border-top-left-radius: 5px; border-top-right-radius: 5px;">
              </a>
              
              <div class="gm-grid-body">
                <a href="{{url('https://www.youtube.com/embed/'.$dvd->linkyoutube_video.'?showinfo=0')}}" class="gm-grid-title" style="font-size: 1rem;">
                    {{Str::limit($dvd->title_video, 80)}}
                </a>
              </div>
              
              <div class="gm-card-footer">
                <a href="#" style="background-color: #d00 !important; color: white !important;">&nbsp;<i class="ion-play"></i> Vidéo&nbsp;</a>
                <span class="gm-separator" style="margin: 0 5px;">|</span>
                <span><?php $dt = date_create($dvd->datepub_video);?> @if(!empty($dvd->datepub_video)){{ phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif</span>
              </div>
            </div>

          @endforeach
        @endif
      </div>
    </div>
  </aside>

  <aside style="display: none;">
    <div class="aside-body">
      <figure class="ads text-center">
        <figcaption style="font-size: 0.8rem; color: #aaa; margin-bottom: 5px;">- Publicité -</figcaption>
        @if(isset($pubs_l1)&&count($pubs_l1)!=0)
          <a href="<?=(isset($pubs_l1[0])&&!empty($pubs_l1[0]))?$pubs_l1[0]->linkdest_pub:false;?>" target="_blank">
            <img src="{{url('images/'.$pubs_l1[0]->image_pub)}}" style="width: 100%; border-radius: 5px;">
          </a>
        @else
          <img src="{{url('images/1-default-img-pub.png')}}" style="width: 100%; border-radius: 5px;">
        @endif
      </figure>
    </div>
  </aside>

</div>