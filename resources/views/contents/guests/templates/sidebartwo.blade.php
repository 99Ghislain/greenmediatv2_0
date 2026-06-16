<div class="col-lg-4 col-md-4 col-sm-4">
  <aside class="right_content">
    <div class="single_sidebar wow fadeInDown">
      <div class="single_post_content">
        <h2 style=""><span>Education</span></h2>
        <ul class="business_catgnav wow fadeInDown">
          <li>
            <figure class="bsbig_fig"> <a href="{{route('visitors.sgpost',['rub'=>$heducart[0]->slug_prinrub,'slug'=>$heducart[0]->slug_article,'ip'=>$heducart[0]->id_article])}}" class="featured_img"> <img alt="" src="{{url('hphx/img/'.$heducart[0]->image_article)}}"> <span class="overlay"></span> </a>
              <figcaption> <a href="{{route('visitors.sgpost',['rub'=>$heducart[0]->slug_prinrub,'slug'=>$heducart[0]->slug_article,'ip'=>$heducart[0]->id_article])}}">{{Str::limit($heducart[0]->title_article,70)}}</a> </figcaption>
              <p>{{Str::limit($heducart[0]->desc_article,120)}}</p>
            <div class="post_commentbox_phx"> <a href="{{route('visitors.sgpost',['rub'=>$heducart[0]->slug_prinrub,'slug'=>$heducart[0]->slug_article,'ip'=>$heducart[0]->id_article])}}"><i class="fa fa-user"></i>{{$heducart[0]->lastename_user}} {{Str::limit($heducart[0]->firstname_user,20)}}</a> <span><i class="fa fa-calendar"></i><?php $dt = date_create($heducart[0]->datepub_article);?> @if(!empty($heducart[0]->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</span></div>
            </figure>
          </li>
        </ul>
        <ul class="spost_nav">
          @foreach($halleducarts as $educs)
            @if($educs->id_article!=$heducart[0]->id_article)
            <li>
              <div class="media wow fadeInDown"> <a href="{{route('visitors.sgpost',['rub'=>$educs->slug_prinrub,'slug'=>$educs->slug_article,'ip'=>$educs->id_article])}}" class="media-left"> <img alt="" src="{{url('hphx/img/'.$educs->image_article)}}"> </a>
                <div class="media-body"> <a href="{{route('visitors.sgpost',['rub'=>$educs->slug_prinrub,'slug'=>$educs->slug_article,'ip'=>$educs->id_article])}}" class="catg_title">{{Str::limit($educs->title_article,70)}}</a>
                  <div class="post_commentbox_phx"> <a href="{{route('visitors.sgpost',['rub'=>$educs->slug_prinrub,'slug'=>$educs->slug_article,'ip'=>$educs->id_article])}}"><i class="fa fa-user"></i>{{$educs->lastename_user}} {{Str::limit($educs->firstname_user,20)}}</a> <span><i class="fa fa-calendar"></i><?php $dt = date_create($educs->datepub_article);?> @if(!empty($educs->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</span>
                  </div> 
                </div>
              </div>
            </li>
            @endif
          @endforeach
        </ul>
      </div>
    </div>
    <div class="single_sidebar wow fadeInDown">
      <div class="single_post_content" >
        <p class="text-center"> <img src="{{url('hphx/img/signal-pub-2.png')}}" class="space_pub_header" style=""></p>
          @if(isset($pubs_l2)&&count($pubs_l2)!=0)
          <div class="slideshow_5" style=" max-height: 350px;">
              @foreach($pubs_l2 as $pl)
              <a href="<?=(isset($pl)&&!empty($pl))?$pl->linkdest_pub:false;?>" target="_blank">
                <div style=" height: 100%; padding: 20px auto;">
                    <img src="{{url('hphx/img/'.$pl->image_pub)}}" alt="" style=" max-height: 348px; width: 100%; ">
                </div>
              </a>
              @endforeach
          </div>
          @endif
      </div>
    </div>
    <div class="single_sidebar wow fadeInDown">
      <div class="single_post_content">
          <h2 style=""><span>Santé</span></h2>
          <ul class="business_catgnav wow fadeInDown">
            <li>
              <figure class="bsbig_fig"> <a href="{{route('visitors.sgpost',['rub'=>$hsteart[0]->slug_prinrub,'slug'=>$hsteart[0]->slug_article,'ip'=>$hsteart[0]->id_article])}}" class="featured_img"> <img alt="" src="{{url('hphx/img/'.$hsteart[0]->image_article)}}"> <span class="overlay"></span> </a>
                <figcaption> <a href="{{route('visitors.sgpost',['rub'=>$hsteart[0]->slug_prinrub,'slug'=>$hsteart[0]->slug_article,'ip'=>$hsteart[0]->id_article])}}">{{Str::limit($hsteart[0]->title_article,70)}}</a> </figcaption>
                <p>{{Str::limit($hsteart[0]->desc_article,120)}}</p>
              <div class="post_commentbox_phx"> <a href="{{route('visitors.sgpost',['rub'=>$hsteart[0]->slug_prinrub,'slug'=>$hsteart[0]->slug_article,'ip'=>$hsteart[0]->id_article])}}"><i class="fa fa-user"></i>{{$hsteart[0]->lastename_user}} {{Str::limit($hsteart[0]->firstname_user,20)}}</a> <span><i class="fa fa-calendar"></i><?php $dt = date_create($hsteart[0]->datepub_article);?> @if(!empty($hsteart[0]->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</span></div>
              </figure>
            </li>
          </ul>
          <ul class="spost_nav">
            @foreach($hallstearts as $sts)
            @if($sts->id_article!=$hsteart[0]->id_article)
            <li>
              <div class="media wow fadeInDown"> <a href="{{route('visitors.sgpost',['rub'=>$sts->slug_prinrub,'slug'=>$sts->slug_article,'ip'=>$sts->id_article])}}" class="media-left"> <img alt="" src="{{url('hphx/img/'.$sts->image_article)}}"> </a>
                <div class="media-body"> <a href="{{route('visitors.sgpost',['rub'=>$sts->slug_prinrub,'slug'=>$sts->slug_article,'ip'=>$sts->id_article])}}" class="catg_title">{{Str::limit($sts->title_article,70)}}</a>
                  <div class="post_commentbox_phx"> <a href="{{route('visitors.sgpost',['rub'=>$sts->slug_prinrub,'slug'=>$sts->slug_article,'ip'=>$sts->id_article])}}"><i class="fa fa-user"></i>{{$sts->lastename_user}} {{Str::limit($sts->firstname_user,20)}}</a> <span><i class="fa fa-calendar"></i><?php $dt = date_create($sts->datepub_article);?> @if(!empty($sts->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</span>
                  </div> 
                </div>
              </div>
            </li>
            @endif
          @endforeach
          </ul>
        </div>
    </div>
  </aside>
</div>