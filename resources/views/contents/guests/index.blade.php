@extends('layouts/guestLayout')
@section('layoutContent')
{{--  --}}
<div class="container" style="margin-top: -30px; margin-bottom: 30px !important;">
    <div class="banner">
        <figure class="ads text-center">
            @if(isset($pubs_i1)&&count($pubs_i1)!=0)
            <a href="<?=(isset($pubs_i1[0])&&!empty($pubs_i1[0]))?$pubs_i1[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                <img src="{{url('hphx/img/'.$pubs_i1[0]->image_pub)}}" class="dpub-under-" style="">
            </a>
            @endif
        </figure>
    </div>
</div>
{{--  --}}
<section class="gm-news-section">
    <div class="container">

        <div class="" style="margin-bottom: 30px;"> 
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
        &nbsp; <span class="gm-animated-dot"></span> A LA UNE &nbsp;
            </div>
        </div>
      

        @if(isset($hcarous)&&!empty($hcarous))
            <div class="row">
                
                <div class="col-md-7 mb-4">
                    <?php $dt = date_create($hcarous[0]->datepub_article); $dty = today();?>
                    
<div class="gm-main-card">
        <a href="{{route('visitors.sgactu',['rub'=>$hcarous[0]->slug_prinrub,'slug'=>$hcarous[0]->slug_article,'ip'=>$hcarous[0]->id_article])}}" class="gm-main-img-wrap">
            <img src="{{url('hphx/img/'.$hcarous[0]->image_article)}}" alt="{{$hcarous[0]->title_article}}">
        </a>
    
        <div class="gm-main-content">
            <div class="d-flex align-items-center flex-wrap">
            <a href="{{route('visitors.allactus',['rub' => $hcarous[0]->slug_prinrub])}}" class="gm-badge">
                {{$hcarous[0]->desig_prinrub}}
            </a>
            <span class="gm-separator">|</span>
            <span style="font-weight: 500;">
                @if(!empty($hcarous[0]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif
            </span>
        </div>

        <a href="{{route('visitors.sgactu',['rub'=>$hcarous[0]->slug_prinrub,'slug'=>$hcarous[0]->slug_article,'ip'=>$hcarous[0]->id_article])}}" class="gm-main-title">
            {{Str::limit(formatTitle($hcarous[0]->title_article), 120)}}
        </a>
                    <p class="gm-main-desc">
            {{Str::limit($hcarous[0]->desc_article, 170)}}
                    </p>
            </div>
    </div>
                </div>

                <div class="col-md-5">
                    @if(isset($hrandarts)&&count($hrandarts)!=0)
                        @foreach($hrandarts as $hrh)
                            <?php $dt = date_create($hrh->datepub_article); $dty = today();?>
                            
                            <div class="gm-side-card">
                                <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}" class="gm-side-body">
                                    <img src="{{url('hphx/img/'.$hrh->image_article)}}" alt="{{$hrh->title_article}}" class="gm-side-img">
                                    <div class="gm-side-text">
                                        <h3 class="gm-side-title">{{Str::limit(formatTitle($hrh->title_article), 80)}}</h3>
                                        <p class="gm-side-desc">{{Str::limit($hrh->desc_article, 80)}}</p>
                                    </div>
                                </a>
                                
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hrh->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hrh->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span>
                                        @if(!empty($hrh->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif
                                    </span>
                                    <span class="gm-separator">|</span>
                                    <span>
                                        <i class="ion-ios-eye gm-icon-eye"></i> {{$hrh->view_article}}
                                    </span>
                                </div>
                            </div>

                        @endforeach
                    @endif
                </div>
            </div>
        @endif

        <hr>

        <div class="mt-4 mb-4"></div>

      <div class="" style="margin-bottom: 30px;"> 
                 <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
        &nbsp; <span class="gm-animated-dot"></span> ARTICLES RECENTS &nbsp;
                    </div>
         </div>

        <div class="row" style="display: flex; flex-wrap: wrap;">
    @if(isset($hcf)&&count($hcf)!=0)
        @foreach ($hcf as $is)
            <div class="col-md-3 gm-grid-col" style="margin-bottom: 30px;">
                <?php $dt = date_create($is->datepub_article); $dty = today();?>
                
                <div class="gm-grid-card" style="width: 100%;">
                    <a href="{{route('visitors.sgactu',['rub'=>$is->slug_prinrub,'slug'=>$is->slug_article,'ip'=>$is->id_article])}}">
                        <img src="{{url('hphx/img/'.$is->image_article)}}" alt="{{$is->title_article}}" class="gm-grid-img">
                    </a>
                    
                    <div class="gm-grid-body">
                        <a href="{{route('visitors.sgactu',['rub'=>$is->slug_prinrub,'slug'=>$is->slug_article,'ip'=>$is->id_article])}}" class="gm-grid-title">
                            <h3 class="gm-grid-title">{{Str::limit(formatTitle($is->title_article), 90)}}</h3>
                        </a>
                        <p class="gm-side-desc">
                            {{Str::limit($is->desc_article, 100)}}
                        </p>
                    </div>

                    <div class="gm-card-footer">
                        <a href="{{route('visitors.allactus',['rub' => $is->slug_prinrub])}}" style="font-weight: 700;">
                            {{$is->desig_prinrub}}
                        </a>
                        <span class="gm-separator" style="margin: 0 5px;">|</span>
                        <span>@if(!empty($is->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                        <span class="gm-separator" style="margin: 0 5px;">|</span>
                        <span><i class="ion-ios-eye gm-icon-eye"></i> {{$is->view_article}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    
             <div class="col-12 mt-3 mb-5" style="display: flex; justify-content: center; width: 100%;">
                <a href="{{route('visitors.allactus',['rub' => $hcarous[0]->slug_prinrub])}}" class="btn btn-outline-success" style="border-radius: 30px; font-weight: 700; padding: 12px 35px; border-color: #127319; color: #127319;"> 
        Voir plus d'actualités <i class="ion-ios-arrow-thin-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
{{--  --}}

<section class="container" style="margin-top: -15px;">
    <div class="banner">
        <figure class="ads text-center">
            @if(isset($pubs_i2)&&count($pubs_i2)!=0)
            <a href="<?=(isset($pubs_i2[0])&&!empty($pubs_i2[0]))?$pubs_i1[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                <img src="{{url('hphx/img/'.$pubs_i2[0]->image_pub)}}" class="dpub-under-" style="width: 100%;">
            </a>
            @endif
        </figure>
    </div>
</section>


<section class="home" style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="" style="margin-bottom: 30px;"> 
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
                &nbsp; <span class="gm-animated-dot"></span> AGRICULTURES &nbsp;<a href="{{route('visitors.allactus',['rub' => 'agriculture'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;"><i class="ion-ios-arrow-thin-right"></i></a>&nbsp; 
            </div>
        </div>

        @if(isset($hagriart) && !empty($hagriart))
            
            <div class="row">
                
                <div class="col-md-7" style="margin-bottom: 30px;">
                    <?php $dt = date_create($hagriart[0]->datepub_article); $dty = today();?>
                    
                    <div class="gm-main-card">
                        <a href="{{route('visitors.sgactu',['rub'=>$hagriart[0]->slug_prinrub,'slug'=>$hagriart[0]->slug_article,'ip'=>$hagriart[0]->id_article])}}" class="gm-main-img-wrap">
                            <img src="{{url('hphx/img/'.$hagriart[0]->image_article)}}" alt="{{$hagriart[0]->title_article}}">
                        </a>
                        
                        <div class="gm-main-content">
                            <div style="display: flex; align-items: center; flex-wrap: wrap;">
                                <a href="{{route('visitors.allactus',['rub' => $hagriart[0]->slug_prinrub])}}" class="gm-badge">
                                    {{$hagriart[0]->desig_prinrub}}
                                </a>
                                <span class="gm-separator">|</span>
                                <span style="font-weight: 500;">
                                    @if(!empty($hagriart[0]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif
                                </span>
                            </div>

                            <a href="{{route('visitors.sgactu',['rub'=>$hagriart[0]->slug_prinrub,'slug'=>$hagriart[0]->slug_article,'ip'=>$hagriart[0]->id_article])}}" class="gm-main-title">
                                {{Str::limit(formatTitle($hagriart[0]->title_article), 120)}}
                            </a>
                            <p class="gm-main-desc">
                                {{Str::limit($hagriart[0]->desc_article, 170)}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    @for($i=1; $i<=3; $i++)
                        @if(isset($hagriart[$i]))
                            <?php $dt = date_create($hagriart[$i]->datepub_article); $dty = today();?>
                            <div class="gm-side-card" style="margin-bottom: 25px;">
                                <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" class="gm-side-body">
                                    <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="gm-side-img">
                                    <div class="gm-side-text">
                                        <h3 class="gm-side-title">{{Str::limit(formatTitle($hagriart[$i]->title_article), 80)}}</h3>
                                        <p class="gm-side-desc">{{Str::limit($hagriart[$i]->desc_article, 80)}}</p>
                                    </div>
                                </a>
                                
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hagriart[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span>@if(!empty($hagriart[$i]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> {{$hagriart[$i]->view_article}}</span>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                @for($i=4; $i<=7; $i++)
                    @if(isset($hagriart[$i]))
                        <div class="col-md-6" style="margin-bottom: 30px;">
                            <?php $dt = date_create($hagriart[$i]->datepub_article); $dty = today();?>
                            <div class="gm-side-card" style="height: 100%; margin-bottom: 0;">
                                <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" class="gm-side-body" style="flex-grow: 1;">
                                    <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="gm-side-img" style="width: 160px; height: 120px;">
                                    <div class="gm-side-text">
                                        <h3 class="gm-side-title">{{Str::limit(formatTitle($hagriart[$i]->title_article), 90)}}</h3>
                                        <p class="gm-side-desc">{{Str::limit($hagriart[$i]->desc_article, 90)}}</p>
                                    </div>
                                </a>
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hagriart[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span>@if(!empty($hagriart[$i]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> {{$hagriart[$i]->view_article}}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

            <div class="row" style="margin-top: 15px;">
                @for($i=8; $i<=11; $i++) 
                    @if(isset($hagriart[$i]))
                        <div class="col-md-3 gm-grid-col" style="margin-bottom: 40px;">
                            <?php $dt = date_create($hagriart[$i]->datepub_article); $dty = today();?>
                            <div class="gm-grid-card">
                                <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">
                                    <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="gm-grid-img">
                                </a>
                                <div class="gm-grid-body">
                                    <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" class="gm-grid-title">
                                       <h3 class="gm-side-title"> {{Str::limit(formatTitle($hagriart[$i]->title_article), 90)}}</h3>
                                    </a>
                                    <p class="gm-side-desc">
                                        {{Str::limit($hagriart[$i]->desc_article, 100)}}
                                    </p>
                                </div>
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hagriart[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator" style="margin: 0 5px;">|</span>
                                    <span>@if(!empty($hagriart[$i]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                    <span class="gm-separator" style="margin: 0 5px;">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> {{$hagriart[$i]->view_article}}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

        @endif
        
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 10px; margin-bottom: 50px;">
                <a href="{{route('visitors.allactus',['rub' => 'agriculture'])}}" class="btn btn-outline-success" style="border-radius: 30px; font-weight: 700; padding: 12px 35px; border-color: #127319; color: #127319;"> 
                    Voir plus d'actualités <i class="ion-ios-arrow-thin-right"></i>
                </a>
            </div>
        </div>
        
    </div>
</section>


<section class="container">
    <div class="banner" style="">
        <figure class="ads text-center">
            @if(isset($pubs_i3)&&count($pubs_i3)!=0)
                <a href="<?=(isset($pubs_i3[0])&&!empty($pubs_i3[0]))?$pubs_i3[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                    <img src="{{url('hphx/img/'.$pubs_i3[0]->image_pub)}}" class="dpub-under-" style="width: 100%;">
                </a>
            @endif
        </figure>
    </div>
</section>



<section style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="" style="margin-bottom: 30px;"> 
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow"> 
                &nbsp; <span class="gm-animated-dot"></span> PLUS D'ARTICLES POPULAIRES &nbsp;
            </div>
        </div>

        <div class="row mt-4" style="display: flex; flex-wrap: wrap;">
            @if(isset($pplars) && count($pplars) != 0)
                @foreach($pplars as $hrh)
                    
                    <div class="col-md-4 gm-grid-col" style="margin-bottom: 40px;">
                        <?php $dt = date_create($hrh->datepub_article); $dty = today();?>
                        
                        <div class="gm-grid-card" style="width: 100%;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">
                                <img src="{{url('hphx/img/'.$hrh->image_article)}}" alt="{{$hrh->title_article}}" class="gm-grid-img">
                            </a>
                            
                            <div class="gm-grid-body">
                                <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}" class="gm-grid-title">
                                  <h3 class="gm-side-title">  {{Str::limit(formatTitle($hrh->title_article), 90)}}</h3>
                                </a>
                                <p class="gm-side-desc">
                                    {{Str::limit($hrh->desc_article, 100)}}
                                </p>
                            </div>

                            <div class="gm-card-footer">
                                <a href="{{route('visitors.allactus',['rub' => $hrh->slug_prinrub])}}" style="font-weight: 700;">
                                    {{$hrh->desig_prinrub}}
                                </a>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span>@if(!empty($hrh->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span><i class="ion-ios-eye gm-icon-eye"></i> {{$hrh->view_article}}</span>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
        </div>

    </div>
</section>



<div class="container" style="">
    <div class="banner">
        <figure class="ads text-center">
            @if(isset($pubs_i4)&&count($pubs_i4)!=0)
            <a href="<?=(isset($pubs_i4[0])&&!empty($pubs_i4[0]))?$pubs_i4[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                <img src="{{url('hphx/img/'.$pubs_i4[0]->image_pub)}}" class="dpub-under-" style="">
            </a>
            @endif
        </figure>
    </div>  
</div>



<section class="home" style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="" style="margin-bottom: 30px;">
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow">
                &nbsp; <span class="gm-animated-dot"></span> ENVIRONNEMENT &nbsp;
                <a href="{{route('visitors.allactus',['rub' => 'environnement'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;">
                    <i class="ion-ios-arrow-thin-right"></i>
                </a>&nbsp;
            </div>
        </div>

        @if(isset($hallsoarts) && !empty($hallsoarts))
            
            <div class="row">
                
                <div class="col-md-7" style="margin-bottom: 30px;">
                    <?php $dt = date_create($hallsoarts[0]->datepub_article); $dty = today();?>
                    
                    <div class="gm-main-card">
                        <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[0]->slug_prinrub,'slug'=>$hallsoarts[0]->slug_article,'ip'=>$hallsoarts[0]->id_article])}}" class="gm-main-img-wrap">
                            <img src="{{url('hphx/img/'.$hallsoarts[0]->image_article)}}" alt="{{$hallsoarts[0]->title_article}}">
                        </a>
                        
                        <div class="gm-main-content">
                            <div style="display: flex; align-items: center; flex-wrap: wrap;">
                                <a href="{{route('visitors.allactus',['rub' => $hallsoarts[0]->slug_prinrub])}}" class="gm-badge">
                                    {{$hallsoarts[0]->desig_prinrub}}
                                </a>
                                <span class="gm-separator">|</span>
                                <span style="font-weight: 500;">
                                    @if(!empty($hallsoarts[0]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif
                                </span>
                            </div>

                            <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[0]->slug_prinrub,'slug'=>$hallsoarts[0]->slug_article,'ip'=>$hallsoarts[0]->id_article])}}" class="gm-main-title">
                                {{Str::limit(formatTitle($hallsoarts[0]->title_article), 120)}}
                            </a>
                            <p class="gm-main-desc">
                                {{Str::limit($hallsoarts[0]->desc_article, 170)}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    @for($i=1; $i<=3; $i++)
                        @if(isset($hallsoarts[$i]))
                            <?php $dt = date_create($hallsoarts[$i]->datepub_article); $dty = today();?>
                            <div class="gm-side-card" style="margin-bottom: 25px;">
                                <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}" class="gm-side-body">
                                    <img src="{{url('hphx/img/'.$hallsoarts[$i]->image_article)}}" alt="{{$hallsoarts[$i]->title_article}}" class="gm-side-img">
                                    <div class="gm-side-text">
                                        <h3 class="gm-side-title">{{Str::limit(formatTitle($hallsoarts[$i]->title_article), 80)}}</h3>
                                        <p class="gm-side-desc">{{Str::limit($hallsoarts[$i]->desc_article, 80)}}</p>
                                    </div>
                                </a>
                                
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hallsoarts[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hallsoarts[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span>@if(!empty($hallsoarts[$i]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> {{$hallsoarts[$i]->view_article}}</span>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                @for($i=4; $i<=7; $i++)
                    @if(isset($hallsoarts[$i]))
                        <div class="col-md-6" style="margin-bottom: 30px;">
                            <?php $dt = date_create($hallsoarts[$i]->datepub_article); $dty = today();?>
                            <div class="gm-side-card" style="height: 100%; margin-bottom: 0;">
                                <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}" class="gm-side-body" style="flex-grow: 1;">
                                    <img src="{{url('hphx/img/'.$hallsoarts[$i]->image_article)}}" alt="{{$hallsoarts[$i]->title_article}}" class="gm-side-img" style="width: 160px; height: 120px;">
                                    <div class="gm-side-text">
                                        <h3 class="gm-side-title">{{Str::limit(formatTitle($hallsoarts[$i]->title_article), 90)}}</h3>
                                        <p class="gm-side-desc">{{Str::limit($hallsoarts[$i]->desc_article, 90)}}</p>
                                    </div>
                                </a>
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hallsoarts[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hallsoarts[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span>@if(!empty($hallsoarts[$i]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> {{$hallsoarts[$i]->view_article}}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

        @endif
        
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 10px; margin-bottom: 50px;">
                <a href="{{route('visitors.allactus',['rub' => 'environnement'])}}" class="btn btn-outline-success" style="border-radius: 30px; font-weight: 700; padding: 12px 35px; border-color: #127319; color: #127319;"> 
                    Voir plus d'actualités <i class="ion-ios-arrow-thin-right"></i>
                </a>
            </div>
        </div>
        
    </div>
</section>



<div class="container" style="">
    <div class="banner">
        <figure class="ads text-center">
            @if(isset($pubs_i5)&&count($pubs_i5)!=0)
            <a href="<?=(isset($pubs_i5[0])&&!empty($pubs_i5[0]))?$pubs_i5[0]->linkdest_pub:false;?>" style="display: block;" target="_blank">
                <img src="{{url('hphx/img/'.$pubs_i5[0]->image_pub)}}" class="dpub-under-" style="">
            </a>
            @endif
        </figure>
    </div>
</div>



<section class="home" style="margin-top: 20px; margin-bottom: 50px; padding: 0;">
    <div class="container">
        
        <div class="" style="margin-bottom: 30px;">
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow">
                &nbsp; <span class="gm-animated-dot"></span> RESSOURCES ANIMALES &nbsp;
                <a href="{{route('visitors.allactus',['rub' => 'ressourcesanimales'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;">
                    <i class="ion-ios-arrow-thin-right"></i>
                </a>&nbsp;
            </div>
        </div>

        @if(isset($hallspoarts) && !empty($hallspoarts))
            
            <div class="row">
                
                <div class="col-md-7" style="margin-bottom: 30px;">
                    <?php $dt = date_create($hallspoarts[0]->datepub_article); $dty = today();?>
                    
                    <div class="gm-main-card">
                        <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[0]->slug_prinrub,'slug'=>$hallspoarts[0]->slug_article,'ip'=>$hallspoarts[0]->id_article])}}" class="gm-main-img-wrap">
                            <img src="{{url('hphx/img/'.$hallspoarts[0]->image_article)}}" alt="{{$hallspoarts[0]->title_article}}">
                        </a>
                        
                        <div class="gm-main-content">
                            <div style="display: flex; align-items: center; flex-wrap: wrap;">
                                <a href="{{route('visitors.allactus',['rub' => $hallspoarts[0]->slug_prinrub])}}" class="gm-badge">
                                    {{$hallspoarts[0]->desig_prinrub}}
                                </a>
                                <span class="gm-separator">|</span>
                                <span style="font-weight: 500;">
                                    @if(!empty($hallspoarts[0]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif
                                </span>
                            </div>

                            <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[0]->slug_prinrub,'slug'=>$hallspoarts[0]->slug_article,'ip'=>$hallspoarts[0]->id_article])}}" class="gm-main-title">
                                {{Str::limit(formatTitle($hallspoarts[0]->title_article), 120)}}
                            </a>
                            <p class="gm-main-desc">
                                {{Str::limit($hallspoarts[0]->desc_article, 170)}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    @for($i=1; $i<=3; $i++)
                        @if(isset($hallspoarts[$i]) && ($hallspoarts[$i] != null))
                            <?php $dt = date_create($hallspoarts[$i]->datepub_article); $dty = today();?>
                            <div class="gm-side-card" style="margin-bottom: 25px;">
                                <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}" class="gm-side-body">
                                    <img src="{{url('hphx/img/'.$hallspoarts[$i]->image_article)}}" alt="{{$hallspoarts[$i]->title_article}}" class="gm-side-img">
                                    <div class="gm-side-text">
                                        <h3 class="gm-side-title">{{Str::limit(formatTitle($hallspoarts[$i]->title_article), 80)}}</h3>
                                        <p class="gm-side-desc">{{Str::limit($hallspoarts[$i]->desc_article, 80)}}</p>
                                    </div>
                                </a>
                                
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hallspoarts[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hallspoarts[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span>@if(!empty($hallspoarts[$i]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> {{$hallspoarts[$i]->view_article}}</span>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                @for($i=4; $i<=7; $i++)
                    @if(isset($hallspoarts[$i]) && ($hallspoarts[$i] != null))
                        <div class="col-md-6" style="margin-bottom: 30px;">
                            <?php $dt = date_create($hallspoarts[$i]->datepub_article); $dty = today();?>
                            <div class="gm-side-card" style="height: 100%; margin-bottom: 0;">
                                <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}" class="gm-side-body" style="flex-grow: 1;">
                                    <img src="{{url('hphx/img/'.$hallspoarts[$i]->image_article)}}" alt="{{$hallspoarts[$i]->title_article}}" class="gm-side-img" style="width: 160px; height: 120px;">
                                    <div class="gm-side-text">
                                        <h3 class="gm-side-title">{{Str::limit(formatTitle($hallspoarts[$i]->title_article), 90)}}</h3>
                                        <p class="gm-side-desc">{{Str::limit($hallspoarts[$i]->desc_article, 90)}}</p>
                                    </div>
                                </a>
                                <div class="gm-card-footer">
                                    <a href="{{route('visitors.allactus',['rub' => $hallspoarts[$i]->slug_prinrub])}}" style="font-weight: 700;">
                                        {{$hallspoarts[$i]->desig_prinrub}}
                                    </a>
                                    <span class="gm-separator">|</span>
                                    <span>@if(!empty($hallspoarts[$i]->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                                    <span class="gm-separator">|</span>
                                    <span><i class="ion-ios-eye gm-icon-eye"></i> {{$hallspoarts[$i]->view_article}}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

        @endif
        
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 10px; margin-bottom: 20px;">
                <a href="{{route('visitors.allactus',['rub' => 'ressourcesanimales'])}}" class="btn btn-outline-success" style="border-radius: 30px; font-weight: 700; padding: 12px 35px; border-color: #127319; color: #127319;"> 
                    Voir plus d'actualités <i class="ion-ios-arrow-thin-right"></i>
                </a>
            </div>
        </div>
        
    </div>
</section>
{{--  --}}
{{--  --}}

@endsection