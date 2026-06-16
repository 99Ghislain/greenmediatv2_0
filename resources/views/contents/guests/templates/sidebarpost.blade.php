<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
  <aside>
    <h1 class="aside-title">Vidéo Green Media <i class="ion-plus"></i>
      <div class="carousel-nav" id="video-list-nav">
        <div class="prev"><i class="ion-ios-arrow-left"></i></div>
        <div class="next"><i class="ion-ios-arrow-right"></i></div>
      </div>
    </h1>
    <div class="aside-body">
      <!--  -->
      <div class="owl-carousel carousel-2 abg-dark " data-youtube='"carousel":true, "nav":"#video-list-nav"' style="padding: 3px 0; border: 1px solid #ccc;">
        @if(isset($rdsdvds)&&!empty($rdsdvds[0]))
          @foreach($rdsdvds as $rdcs)
          <article class="article article-vds bg-white">
            <div class="inner content-vds" style="background-image: url('hphx/img/<?=$rdcs->image_video;?>');">
                <figure class="img-vds">
                  <a class="aimg-vds vdsplayer" href="{{url('https://www.youtube.com/embed/'.$rdcs->linkyoutube_video.'?showinfo=0')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
                      <img src="{{url('hphx/img/phxplay.png')}}" alt="{{$rdcs->title_video}}" class="icon-sizee">
                  </a>    
                </figure>
                <div class="padding bg-white title-vds">
                    <div class="detail">
                        <div class="time"><?php $dt = date_create($rdcs->datepub_video);?> @if(!empty($rdcs->datepub_video)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</div>
                    </div>
                    <h2><a class="bg-white vdsplayer" href="{{url('https://www.youtube.com/embed/'.$rdcs->linkyoutube_video.'?showinfo=0')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">{{Str::limit($rdcs->title_video,45)}}</a></h2>
                </div>
            </div>
          </article>
          @endforeach
        @endif
      </div>
      <!--  -->
    </div>
  </aside>
  <aside>
    <div class="aside-body">
      <figure class="ads text-center">
        <figcaption>- Publicité -</figcaption>
        @if(isset($pubs_a)&&count($pubs_a)!=0)
          <a href="<?=(isset($pubs_a[0])&&!empty($pubs_a[0]))?$pubs_a[0]->linkdest_pub:false;?>" target="_blank">
            <img src="{{url('hphx/img/'.$pubs_a[0]->image_pub)}}" class="ads-mooved dpub-sidebar">
          </a>
        @else
          <img src="{{url('hphx/img/espace-pub-1.png')}}" class="ads-mooved">
        @endif
      </figure>
    </div>
  </aside>
  <aside class="bg-default">
  <h1 class="aside-title">ARTICLES RECENTS <a href="#" class="all">Voir plus <i class="ion-ios-arrow-right"></i></a></h1>
    <div class="aside-body sidebar-content">
      <article class="article-fw">
        <div class="inner">
          <figure>
            <a href="{{route('visitors.sgpost',['rub'=>$hrecarts[0]->slug_prinrub,'slug'=>$hrecarts[0]->slug_article,'ip'=>$hrecarts[0]->id_article])}}">
              <img src="{{url('hphx/img/'.$hrecarts[0]->image_article)}}" alt="{{Str::limit($hrecarts[0]->title_article,70)}}">
            </a>
          </figure>
          <div class="details">
            <div class="detail">
              <?php $dt = date_create($hrecarts[0]->datepub_article);?>
              <div class="time">@if(!empty($hrecarts[0]->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</div>
              <div class="category"><a href="{{route('visitors.allposts',['rub' => $hrecarts[0]->slug_prinrub])}}">{{$hrecarts[0]->desig_prinrub}}</a></div>
            </div>
            <h1><a href="{{route('visitors.sgpost',['rub'=>$hrecarts[0]->slug_prinrub,'slug'=>$hrecarts[0]->slug_article,'ip'=>$hrecarts[0]->id_article])}}">{{Str::limit($hrecarts[0]->title_article,70)}}</a></h1>
            <p>{{Str::limit($hrecarts[0]->desc_article,120)}} </p>
          </div>
        </div>
      </article>
      <div class="line"></div>
      <h1 class="title-col">
        AUTRES ARTICLES RECENTS
        <div class="carousel-nav" id="hot-news-nav">
          <div class="prev">
            <i class="ion-ios-arrow-left"></i>
          </div>
          <div class="next">
            <i class="ion-ios-arrow-right"></i>
          </div>
        </div>
      </h1>
      <div class="body-col vertical-slider" data-max="3" data-nav="#hot-news-nav" data-item="article">
        @if(isset($hrecarts)&&count($hrecarts)!=0)
          @foreach($hrecarts as $hrcc)
          <?php $dt = date_create($hrcc->datepub_article);?>
          <article class="article-mini">
            <div class="inner">
              <figure>
                <a href="{{route('visitors.sgpost',['rub'=>$hrcc->slug_prinrub,'slug'=>$hrcc->slug_article,'ip'=>$hrcc->id_article])}}">
                  <img src="{{url('/hphx/img/'.$hrcc->image_article)}}" alt="{{$hrcc->title_article}}">
                </a>
              </figure>
              <div class="padding">
                <h1><a href="{{route('visitors.sgpost',['rub'=>$hrcc->slug_prinrub,'slug'=>$hrcc->slug_article,'ip'=>$hrcc->id_article])}}">{{Str::limit($hrcc->title_article,70)}}</a></h1>
                <div class="detail">
                  <div class="category"><a href="{{route('visitors.allposts',['rub' => $hrcc->slug_prinrub])}}">{{$hrcc->slug_prinrub}}</a></div>
                  <div class="time"> @if(!empty($hrcc->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</div>
                </div>
              </div>
            </div>
          </article>
          @endforeach
        @endif
      </div>
    </div>
  </aside>
  <aside>
    <div class="aside-body">
      <form class="newsletter">
      <div class="icon">
        <i class="ion-ios-email-outline"></i>
        <h1>Newsletter</h1>
      </div>
      <div class="input-group">
        <input type="email" class="form-control email" placeholder="Adresse mail">
        <div class="input-group-btn">
        <button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
        </div>
      </div>
      <p>Abonne-toi afin de recevoir nos articles par E-mail</p>
      </form>
    </div>
  </aside>
  <aside>
    <div class="aside-body">
      <figure class="ads text-center">
        <figcaption>- Publicité -</figcaption>
        @if(isset($pubs_l1)&&count($pubs_l1)!=0)
          <a href="<?=(isset($pubs_l1[0])&&!empty($pubs_l1[0]))?$pubs_l1[0]->linkdest_pub:false;?>" target="_blank">
            <img src="{{url('hphx/img/'.$pubs_l1[0]->image_pub)}}" class="ads-mooved dpub-sidebar">
          </a>
        @else
          <img src="{{url('hphx/img/espace-pub-1.png')}}" class="ads-mooved">
        @endif
      </figure>
    </div>
  </aside>
  <aside class="bg-danger" style="padding: 10px; border: 1px solid #f2f2f2;">
    <h1 class="aside-title">INVERSTIGATION<a href="{{route('visitors.allposts',['rub' => $hinversnws[0]->slug_prinrub])}}" class="all">Voir plus <i class="ion-ios-arrow-right"></i></a></h1>
    <div class="aside-body">
      <article class="article-fw">
        <div class="inner">
          <figure>
            <a href="{{route('visitors.sgpost',['rub'=>$hinversnws[0]->slug_prinrub,'slug'=>$hinversnws[0]->slug_article,'ip'=>$hinversnws[0]->id_article])}}">
              <img src="{{url('hphx/img/'.$hinversnws[0]->image_article)}}" alt="{{Str::limit($hinversnws[0]->title_article,70)}}">
            </a>
          </figure>
          <div class="details">
            <div class="detail">
              <div class="time">@if(!empty($hinversnws[0]->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</div>
              <div class="category"><a href="{{route('visitors.allposts',['rub' => $hinversnws[0]->slug_prinrub])}}">{{$hinversnws[0]->desig_prinrub}}</a></div>
            </div>
            <h1 class="line-h1"><a href="{{route('visitors.sgpost',['rub'=>$hinversnws[0]->slug_prinrub,'slug'=>$hinversnws[0]->slug_article,'ip'=>$hinversnws[0]->id_article])}}">{{Str::limit($hinversnws[0]->title_article,70)}}</a></h1>
            <p>{{Str::limit($hinversnws[0]->desc_article,120)}}</p>
          </div>
        </div>
      </article>
    </div>
  </aside>
  <aside>
    <ul class="nav nav-tabs nav-justified" role="tablist">
      <li class="active">
        <a href="#africa-info" aria-controls="africa-info" role="tab" data-toggle="tab">
          <i class="ion-android-star-outline"></i> AFRIQUE
        </a>
      </li>
      <li>
        <a href="#other-info" aria-controls="other-info" role="tab" data-toggle="tab">
          <i class="ion-android-star-outline"></i> RESTE DU MONDE
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="africa-info">
        <article class="article-fw">
          <div class="inner">
            <figure>
              <a href="{{route('visitors.sgpost',['rub'=>$hafricanws[0]->slug_prinrub,'slug'=>$hafricanws[0]->slug_article,'ip'=>$hafricanws[0]->id_article])}}">
                <img src="{{url('hphx/img/'.$hafricanws[0]->image_article)}}" alt="{{Str::limit($hafricanws[0]->title_article,70)}}">
              </a>
            </figure>
            <div class="details">
              <div class="detail">
                <div class="time">@if(!empty($hafricanws[0]->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</div>
                <div class="category"><a href="{{route('visitors.allposts',['rub' => $hafricanws[0]->slug_prinrub])}}">{{$hafricanws[0]->desig_prinrub}}</a></div>
              </div>
              <h1><a href="{{route('visitors.sgpost',['rub'=>$hafricanws[0]->slug_prinrub,'slug'=>$hafricanws[0]->slug_article,'ip'=>$hafricanws[0]->id_article])}}">{{Str::limit($hafricanws[0]->title_article,70)}}</a></h1>
              <p>{{Str::limit($hafricanws[0]->desc_article,120)}} </p>
            </div>
          </div>
        </article>
        <div class="line"></div>
        @if(isset($hafnws2)&&count($hafnws2)!=0)
          @foreach($hafnws2 as $hafn)
          <?php $dt = date_create($hafn->datepub_article);?>
          <article class="article-mini">
            <div class="inner">
              <figure>
                <a href="{{route('visitors.sgpost',['rub'=>$hafn->slug_prinrub,'slug'=>$hafn->slug_article,'ip'=>$hafn->id_article])}}">
                  <img src="{{url('hphx/img/'.$hafn->image_article)}}" alt="{{Str::limit($hafn->title_article,70)}}">
                </a>
              </figure>
              <div class="padding">
                <h1><a href="{{route('visitors.sgpost',['rub'=>$hafn->slug_prinrub,'slug'=>$hafn->slug_article,'ip'=>$hafn->id_article])}}">{{Str::limit($hafn->title_article,70)}}</a></h1>
                <div class="detail">
                  <div class="category"><a href="{{route('visitors.allposts',['rub' => $hafn->slug_prinrub])}}">{{$hafn->desig_prinrub}}</a></div>
                  <div class="time">@if(!empty($hafn->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</div>
                </div>
              </div>
            </div>
          </article>
          @endforeach
        @endif
      </div>
      <div class="tab-pane comments" id="other-info">
        @if(isset($hwdlnws)&&count($hwdlnws)!=0)
          @foreach($hwdlnws as $hwl)
          <?php $dt = date_create($hwl->datepub_article);?>
          <article class="article-mini">
            <div class="inner">
              <figure>
                <a href="{{route('visitors.sgpost',['rub'=>$hwl->slug_prinrub,'slug'=>$hwl->slug_article,'ip'=>$hwl->id_article])}}">
                  <img src="{{url('hphx/img/'.$hwl->image_article)}}" alt="{{Str::limit($hwl->title_article,70)}}">
                </a>
              </figure>
              <div class="padding">
                <h1><a href="{{route('visitors.sgpost',['rub'=>$hwl->slug_prinrub,'slug'=>$hwl->slug_article,'ip'=>$hwl->id_article])}}">{{Str::limit($hwl->title_article,70)}}</a></h1>
                <div class="detail">
                  <div class="category"><a href="{{route('visitors.allposts',['rub' => $hwl->slug_prinrub])}}">{{$hwl->desig_prinrub}}</a></div>
                  <div class="time">@if(!empty($hwl->datepub_article)){{ $tday = date_format($dt,'d M Y') }}@else{{today()->format('d M Y')}}@endif</div>
                </div>
              </div>
            </div>
          </article>
          @endforeach
        @endif
      </div>
    </div>
  </aside>
  <aside>
    <div class="aside-body">
      <figure class="ads text-center">
        <figcaption>- Publicité -</figcaption>
        @if(isset($pubs_l2)&&count($pubs_l2)!=0)
          <a href="<?=(isset($pubs_l2[0])&&!empty($pubs_l2[0]))?$pubs_l2[0]->linkdest_pub:false;?>" target="_blank">
            <img src="{{url('hphx/img/'.$pubs_l2[0]->image_pub)}}" class="ads-mooved dpub-sidebar">
          </a>
        @else
          <img src="{{url('hphx/img/espace-pub-1.png')}}" class="ads-mooved">
        @endif
      </figure>
    </div>
  </aside>
</div>