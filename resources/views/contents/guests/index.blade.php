@extends('layouts/guestLayout')
@section('layoutContent')
<!-- Start Main Default News Area -->

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
<!-- / Home -->
<section class="home " style="margin-top: -30px ; padding: 0;">
	<div class="container">
		<div class="" style="margin-bottom: 5px;">
			<div class=" acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="">&nbsp; A LA UNE &nbsp;</div>
		</div>
        @if(isset($hcarous)&&!empty($hcarous))
            <div class="row">
                <div class="col-md-7" style="padding-bottom: 10px; margin-bottom: 5px;">
                    <?php $dt = date_create($hcarous[0]->datepub_article); $dty = today();?>
                    <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                        <article class="mx-2" style="overflow: hidden; max-height: 350px; padding: 0 2px !important; margin: 0 auto;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hcarous[0]->slug_prinrub,'slug'=>$hcarous[0]->slug_article,'ip'=>$hcarous[0]->id_article])}}">
                                <img src="{{url('hphx/img/'.$hcarous[0]->image_article)}}" alt="{{$hcarous[0]->title_article}}" class="w-100" style="width: 100%;">
                            </a>
                        </article>
                        <p>
                            <a href="{{route('visitors.allactus',['rub' => $hcarous[0]->slug_prinrub])}}" class="acategory" style="">{{$hcarous[0]->desig_prinrub}}</a>
                            &nbsp;&nbsp; <span style=""> @if(!empty($hcarous[0]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                        </p>
                        <p class="m-0 p-auto sub-title-2" style="height: 80px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hcarous[0]->slug_prinrub,'slug'=>$hcarous[0]->slug_article,'ip'=>$hcarous[0]->id_article])}}" class="" style="font-size: 150%; font-weight: bold;">{{Str::limit($hcarous[0]->title_article,250)}}</a>
                        </p>
                        <p class="m-0 p-auto font-content-1" style="height: 60px; padding: auto 5px; margin: 10px;">
                            <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hcarous[0]->slug_prinrub,'slug'=>$hcarous[0]->slug_article,'ip'=>$hcarous[0]->id_article])}}">{{Str::limit($hcarous[0]->desc_article,170)}}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-5 m-auto b-radius-6" style="margin-bottom: 20px; padding-top: 0px;">
                    <div class="">
                        @if(isset($hrandarts)&&count($hrandarts)!=0)
                            @foreach($hrandarts as $hrh)
                                {{--  --}}
                                <div class="row b-radius-6 box-green" style="min-height: 150px; padding: 5px; margin: 0 auto 20px auto; background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                                    <div class="col-12" style="padding-bottom: 1px; overflow-y: hidden; margin-bottom: 5px;">
                                        <?php $dt = date_create($hrh->datepub_article); $dty = today();?>
                                        {{-- <div class="" style=""> --}}
                                        <div class="col-xs-5 col-md-5 p-0 mx-2 size-img-sb" style=" line-height: 120px; overflow: hidden;">
                                            <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">
                                                <img src="{{url('hphx/img/'.$hrh->image_article)}}" alt="{{$hrh->title_article}}" class="w-100" style="width: 100%;">
                                            </a>
                                        </div>
                                        {{-- </div> --}}
                                        <div class="col-xs-7 col-md-7 p-0">
                                            <p class="m-0 p-auto sub-title-2" style="max-height: 70px; font-weight: bold; padding: auto 5px; overflow: hidden;">
                                                <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}" class="" style="font-size: 100%; font-weight: bold;">{{Str::limit($hrh->title_article,250)}}</a>
                                            </p>
                                            <p class="m-0 p-auto font-content-1" style="max-height: 30px; margin: 1px;">
                                                <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">{{Str::limit($hrh->desc_article,100)}}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-inline-block time p-auto bg-success b-radius-6" style="font-size: 85%; padding: auto 5px;">
                                            <a href="{{route('visitors.allactus',['rub' => $hrh->slug_prinrub])}}" class="acategory" style="">{{$hrh->desig_prinrub}}</a>
                                            <span style=""> @if(!empty($hrh->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                            &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">{{$hrh->view_article}} Vues</a>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="" style="margin-bottom: 5px;">
            <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="">&nbsp; ARTICLES RECENTS  &nbsp;</div>
        </div>
        <div class="row ">
            @if(isset($hcf)&&count($hcf)!=0)
                @foreach ($hcf as $is)
                    <div class="col-md-3" style="padding-bottom: 10px; margin-bottom: 5px;">
                        <?php $dt = date_create($is->datepub_article); $dty = today();?>
                        <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                            <article class="featured mx-2" style="height: 150px; padding: 0 2px !important; margin: 0 auto;">
                                <a href="{{route('visitors.sgactu',['rub'=>$is->slug_prinrub,'slug'=>$is->slug_article,'ip'=>$is->id_article])}}">
                                    <img src="{{url('hphx/img/'.$is->image_article)}}" alt="{{$is->title_article}}" class="w-100" style="width: 100%;">
                                </a>
                            </article>
                            <p>
                                <a href="{{route('visitors.allactus',['rub' => $is->slug_prinrub])}}" class="acategory" style="">{{$is->desig_prinrub}}</a>
                            </p>
                            <p class="m-0 p-auto sub-title-2" style="height: 53px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                                <a href="{{route('visitors.sgactu',['rub'=>$is->slug_prinrub,'slug'=>$is->slug_article,'ip'=>$is->id_article])}}" class="" style="">{{Str::limit($is->title_article,100)}}</a>
                            </p>
                            <p class="m-0 p-auto font-content-1" style="height: 80px; padding: auto 5px; margin: 10px;">
                                <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$is->slug_prinrub,'slug'=>$is->slug_article,'ip'=>$is->id_article])}}">{{Str::limit($is->desc_article,160)}}</a>
                            </p>
                            <div class="time p-auto bg-success" style="font-size: 85%; padding: auto 5px; margin: 0 10px;">
                                <span style=""> @if(!empty($is->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$is->slug_prinrub,'slug'=>$is->slug_article,'ip'=>$is->id_article])}}">{{$is->view_article}} Vues</a>
                            </div>
                            <hr>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="col-12 col-md-12" style="margin-top: 10px;">
                <a href="{{route('visitors.allactus',['rub' => $hcarous[0]->slug_prinrub])}}" class="btn btn-link m-auto b-radius-6" style="width: 100%;"> Voir plus ... <i class="ion-ios-arrow-thin-right"></i></a>
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
<section class="home " style="margin-top: 20px; padding: 0;">
	<div class="container">
        <div class="" style="margin-bottom: 5px;">
			<div class="acategory-two text-color-1 top-title-2 b-white-shadow" style=";">&nbsp;AGRICULTURES &nbsp;<a href="{{route('visitors.allactus',['rub' => 'agriculture'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;"><i class="ion-ios-arrow-thin-right"></i></a>&nbsp; </div>
		</div>
        @if(isset($hagriart)&&!empty($hagriart))
            <div class="row" style="">
                <div class="col-md-7" style="padding-bottom: 10px; margin-bottom: 5px;">
                    <?php $dt = date_create($hagriart[0]->datepub_article); $dty = today();?>
                    <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                        <article class="mx-2" style="overflow: hidden; max-height: 350px; padding: 0 2px !important; margin: 0 auto;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hagriart[0]->slug_prinrub,'slug'=>$hagriart[0]->slug_article,'ip'=>$hagriart[0]->id_article])}}">
                                <img src="{{url('hphx/img/'.$hagriart[0]->image_article)}}" alt="{{$hagriart[0]->title_article}}" class="w-100" style="width: 100%;">
                            </a>
                        </article>
                        <p>
                            <a href="{{route('visitors.allactus',['rub' => $hagriart[0]->slug_prinrub])}}" class="acategory" style="">{{$hagriart[0]->desig_prinrub}}</a>
                            &nbsp;&nbsp; <span style=""> @if(!empty($hagriart[0]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                        </p>
                        <p class="m-0 p-auto sub-title-2" style="height: 80px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hagriart[0]->slug_prinrub,'slug'=>$hagriart[0]->slug_article,'ip'=>$hagriart[0]->id_article])}}" class="" style="font-size: 150%; font-weight: bold;">{{Str::limit($hagriart[0]->title_article,250)}}</a>
                        </p>
                        <p class="m-0 p-auto font-content-1" style="height: 60px; padding: auto 5px; margin: 10px;">
                            <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hagriart[0]->slug_prinrub,'slug'=>$hagriart[0]->slug_article,'ip'=>$hagriart[0]->id_article])}}">{{Str::limit($hagriart[0]->desc_article,170)}}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-5 m-auto b-radius-6" style="margin-bottom: 20px; padding-top: 0px;">
                    <div class="">
                        @if(isset($hagriart)&&count($hagriart)!=0)
                            @for($i=1; $i<=3;$i++)
                                <div class="row b-radius-6 box-green" style="min-height: 150px; padding: 5px; margin: 0 auto 20px auto; background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                                    <div class="col-12" style="padding-bottom: 1px; overflow-y: hidden; margin-bottom: 5px;">
                                        <?php $dt = date_create($hagriart[$i]->datepub_article); $dty = today();?>
                                        <div class="col-xs-5 col-md-5 p-0 mx-2 size-img-sb" style=" line-height: 120px; overflow: hidden;">
                                            <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">
                                                <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="w-100" style="width: 100%;">
                                            </a>
                                        </div>
                                        <div class="col-xs-7 col-md-7 p-0">
                                            <p class="m-0 p-auto sub-title-2" style="max-height: 70px; font-weight: bold; padding: auto 5px; overflow: hidden;">
                                                <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" class="" style="font-size: 100%; font-weight: bold;">{{Str::limit($hagriart[$i]->title_article,250)}}</a>
                                            </p>
                                            <p class="m-0 p-auto font-content-1" style="max-height: 30px; margin: 1px;">
                                                <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">{{Str::limit($hagriart[$i]->desc_article,100)}}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-inline-block time p-auto bg-success b-radius-6" style="font-size: 85%; padding: auto 5px;">
                                            <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" class="acategory" style="">{{$hagriart[$i]->desig_prinrub}}</a>
                                            <span style=""> @if(!empty($hagriart[$i]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                            &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">{{$hagriart[$i]->view_article}} Vues</a>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                            @endfor
                        @endif
                    </div>
                </div>
                @if(isset($hagriart)&&count($hagriart)!=0)
                    @for($i=4; $i<=7;$i++)
                    <div class="col-md-6">
                        <div class="row b-radius-6 box-green" style="min-height: 150px; padding: 5px; margin: 0 auto 20px auto; background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                            <div class="col-12" style="padding-bottom: 1px; overflow-y: hidden; margin-bottom: 5px;">
                                <?php $dt = date_create($hagriart[$i]->datepub_article); $dty = today();?>
                                <div class="col-xs-5 col-md-5 p-0 mx-2 size-img-sb" style=" line-height: 120px; overflow: hidden;">
                                    <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">
                                        <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="w-100" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="col-xs-7 col-md-7 p-0">
                                    <p class="m-0 p-auto sub-title-2" style="max-height: 70px; font-weight: bold; padding: auto 5px; overflow: hidden;">
                                        <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" class="" style="font-size: 100%; font-weight: bold;">{{Str::limit($hagriart[$i]->title_article,250)}}</a>
                                    </p>
                                    <p class="m-0 p-auto font-content-1" style="max-height: 30px; margin: 1px;">
                                        <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">{{Str::limit($hagriart[$i]->desc_article,100)}}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-inline-block time p-auto bg-success b-radius-6" style="font-size: 85%; padding: auto 5px;">
                                    <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" class="acategory" style="">{{$hagriart[$i]->desig_prinrub}}</a>
                                    <span style=""> @if(!empty($hagriart[$i]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                    &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">{{$hagriart[$i]->view_article}} Vues</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif
                @if(isset($hagriart)&&count($hagriart)!=0)
                    @for($i=7; $i<=10;$i++)
                    <div class="col-md-3" style="padding-bottom: 10px; margin-bottom: 5px;">
                        <?php $dt = date_create($hagriart[$i]->datepub_article); $dty = today();?>
                        <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                            <article class="featured mx-2" style="height: 150px; padding: 0 2px !important; margin: 0 auto;">
                                <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">
                                    <img src="{{url('hphx/img/'.$hagriart[$i]->image_article)}}" alt="{{$hagriart[$i]->title_article}}" class="w-100" style="width: 100%;">
                                </a>
                            </article>
                            <p>
                                <a href="{{route('visitors.allactus',['rub' => $hagriart[$i]->slug_prinrub])}}" class="acategory" style="">{{$hagriart[$i]->desig_prinrub}}</a>
                            </p>
                            <p class="m-0 p-auto sub-title-2" style="height: 53px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                                <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}" class="" style="">{{Str::limit($hagriart[$i]->title_article,100)}}</a>
                            </p>
                            <p class="m-0 p-auto font-content-1" style="height: 80px; padding: auto 5px; margin: 10px;">
                                <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">{{Str::limit($hagriart[$i]->desc_article,160)}}</a>
                            </p>
                            <div class="time p-auto bg-success" style="font-size: 85%; padding: auto 5px; margin: 0 10px;">
                                <span style=""> @if(!empty($hagriart[$i]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hagriart[$i]->slug_prinrub,'slug'=>$hagriart[$i]->slug_article,'ip'=>$hagriart[$i]->id_article])}}">{{$hagriart[$i]->view_article}} Vues</a>
                            </div>
                            <hr>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>
        @endif
        <div class="col-12" style="margin-top: 10px;">
            <a href="{{route('visitors.allactus',['rub' => 'agriculture'])}}" class="btn btn-link b-radius-6" style="width: 100%;"> Voir plus ... <i class="ion-ios-arrow-thin-right"></i></a>
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
<section>
	<div class="container">
		<div class="" style="margin-bottom: 5px;">
			<div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="">&nbsp; Plus d'articles populairs &nbsp;</div>
		</div>
		<div class="row" style="padding: 10px auto;">
            @if(isset($pplars)&&count($pplars)!=0)
                @foreach($pplars as $hrh)
                    <div class="col-md-6" style="padding-bottom: 10px; margin-bottom: 5px;">
                        <div class="row b-radius-6 box-green" style="height: 180px; padding: 5px; margin: 0 auto 20px auto; background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                            <div class="col-12" style="padding-bottom: 1px; overflow-y: hidden; margin-bottom: 5px;">
                                <?php $dt = date_create($hrh->datepub_article); $dty = today();?>
                                <div class="col-xs-5 col-md-5 p-0 mx-2 size-img-sb" style=" line-height: 120px; overflow: hidden;">
                                    <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">
                                        <img src="{{url('hphx/img/'.$hrh->image_article)}}" alt="{{$hrh->title_article}}" class="w-100" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="col-xs-7 col-md-7 p-0">
                                    <p class="m-0 p-auto sub-title-2" style="max-height: 70px; font-weight: bold; padding: auto 5px; overflow: hidden;">
                                        <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}" class="" style="font-size: 100%; font-weight: bold;">{{Str::limit($hrh->title_article,250)}}</a>
                                    </p>
                                    <p class="m-0 p-auto font-content-1" style="max-height: 46px; margin: 1px;">
                                        <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">{{Str::limit($hrh->desc_article,170)}}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-inline-block time p-auto bg-success b-radius-6" style="font-size: 85%; padding: auto 5px;">
                                    <a href="{{route('visitors.allactus',['rub' => $hrh->slug_prinrub])}}" class="acategory" style="">{{$hrh->desig_prinrub}}</a>
                                    <span style=""> @if(!empty($hrh->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                    &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">{{$hrh->view_article}} Vues</a>
                                </div>
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
<section class="home " style="margin-top: 20px; padding: 0;">
	<div class="container">
        <div class="" style="margin-bottom: 5px;">
			<div class="acategory-two text-color-1 top-title-2 b-white-shadow" style=";">&nbsp;ENVIRONNEMENT &nbsp;<a href="{{route('visitors.allactus',['rub' => 'environnement'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;"><i class="ion-ios-arrow-thin-right"></i></a>&nbsp; </div>
		</div>
        @if(isset($hallsoarts)&&!empty($hallsoarts))
            <div class="row" style="">
                <div class="col-md-7" style="padding-bottom: 10px; margin-bottom: 5px;">
                    <?php $dt = date_create($hallsoarts[0]->datepub_article); $dty = today();?>
                    <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                        <article class="mx-2" style="overflow: hidden; max-height: 350px; padding: 0 2px !important; margin: 0 auto;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[0]->slug_prinrub,'slug'=>$hallsoarts[0]->slug_article,'ip'=>$hallsoarts[0]->id_article])}}">
                                <img src="{{url('hphx/img/'.$hallsoarts[0]->image_article)}}" alt="{{$hallsoarts[0]->title_article}}" class="w-100" style="width: 100%;">
                            </a>
                        </article>
                        <p>
                            <a href="{{route('visitors.allactus',['rub' => $hallsoarts[0]->slug_prinrub])}}" class="acategory" style="">{{$hallsoarts[0]->desig_prinrub}}</a>
                            &nbsp;&nbsp; <span style=""> @if(!empty($hallsoarts[0]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                        </p>
                        <p class="m-0 p-auto sub-title-2" style="height: 80px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[0]->slug_prinrub,'slug'=>$hallsoarts[0]->slug_article,'ip'=>$hallsoarts[0]->id_article])}}" class="" style="font-size: 150%; font-weight: bold;">{{Str::limit($hallsoarts[0]->title_article,250)}}</a>
                        </p>
                        <p class="m-0 p-auto font-content-1" style="height: 60px; padding: auto 5px; margin: 10px;">
                            <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hallsoarts[0]->slug_prinrub,'slug'=>$hallsoarts[0]->slug_article,'ip'=>$hallsoarts[0]->id_article])}}">{{Str::limit($hallsoarts[0]->desc_article,170)}}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-5 m-auto b-radius-6" style="margin-bottom: 20px; padding-top: 0px;">
                    <div class="">
                        @if(isset($hallsoarts)&&count($hallsoarts)!=0)
                            @for($i=1; $i<=3;$i++)
                                <div class="row b-radius-6 box-green" style="min-height: 150px; padding: 5px; margin: 0 auto 20px auto; background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                                    <div class="col-12" style="padding-bottom: 1px; overflow-y: hidden; margin-bottom: 5px;">
                                        <?php $dt = date_create($hallsoarts[$i]->datepub_article); $dty = today();?>
                                        <div class="col-xs-5 col-md-5 p-0 mx-2 size-img-sb" style=" line-height: 120px; overflow: hidden;">
                                            <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}">
                                                <img src="{{url('hphx/img/'.$hallsoarts[$i]->image_article)}}" alt="{{$hallsoarts[$i]->title_article}}" class="w-100" style="width: 100%;">
                                            </a>
                                        </div>
                                        <div class="col-xs-7 col-md-7 p-0">
                                            <p class="m-0 p-auto sub-title-2" style="max-height: 70px; font-weight: bold; padding: auto 5px; overflow: hidden;">
                                                <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}" class="" style="font-size: 100%; font-weight: bold;">{{Str::limit($hallsoarts[$i]->title_article,250)}}</a>
                                            </p>
                                            <p class="m-0 p-auto font-content-1" style="max-height: 30px; margin: 1px;">
                                                <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}">{{Str::limit($hallsoarts[$i]->desc_article,100)}}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-inline-block time p-auto bg-success b-radius-6" style="font-size: 85%; padding: auto 5px;">
                                            <a href="{{route('visitors.allactus',['rub' => $hallsoarts[$i]->slug_prinrub])}}" class="acategory" style="">{{$hallsoarts[$i]->desig_prinrub}}</a>
                                            <span style=""> @if(!empty($hallsoarts[$i]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                            &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}">{{$hallsoarts[$i]->view_article}} Vues</a>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
                @if(isset($hallsoarts)&&count($hallsoarts)!=0)
                    @for($i=4; $i<=7;$i++)
                    <div class="col-md-6">
                        <div class="row b-radius-6 box-green" style="min-height: 150px; padding: 5px; margin: 0 auto 20px auto; background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                            <div class="col-12" style="padding-bottom: 1px; overflow-y: hidden; margin-bottom: 5px;">
                                <?php $dt = date_create($hallsoarts[$i]->datepub_article); $dty = today();?>
                                <div class="col-xs-5 col-md-5 p-0 mx-2 size-img-sb" style=" line-height: 120px; overflow: hidden;">
                                    <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}">
                                        <img src="{{url('hphx/img/'.$hallsoarts[$i]->image_article)}}" alt="{{$hallsoarts[$i]->title_article}}" class="w-100" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="col-xs-7 col-md-7 p-0">
                                    <p class="m-0 p-auto sub-title-2" style="max-height: 70px; font-weight: bold; padding: auto 5px; overflow: hidden;">
                                        <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}" class="" style="font-size: 100%; font-weight: bold;">{{Str::limit($hallsoarts[$i]->title_article,250)}}</a>
                                    </p>
                                    <p class="m-0 p-auto font-content-1" style="max-height: 30px; margin: 1px;">
                                        <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}">{{Str::limit($hallsoarts[$i]->desc_article,100)}}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-inline-block time p-auto bg-success b-radius-6" style="font-size: 85%; padding: auto 5px;">
                                    <a href="{{route('visitors.allactus',['rub' => $hallsoarts[$i]->slug_prinrub])}}" class="acategory" style="">{{$hallsoarts[$i]->desig_prinrub}}</a>
                                    <span style=""> @if(!empty($hallsoarts[$i]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                    &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hallsoarts[$i]->slug_prinrub,'slug'=>$hallsoarts[$i]->slug_article,'ip'=>$hallsoarts[$i]->id_article])}}">{{$hallsoarts[$i]->view_article}} Vues</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>
        @endif
        <div class="col-12" style="margin-top: 10px;">
            <a href="{{route('visitors.allactus',['rub' => 'environnement'])}}" class="btn btn-link b-radius-6" style="width: 100%;"> Voir plus ... <i class="ion-ios-arrow-thin-right"></i></a>
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
<section class="home " style="margin-top: 20px; margin-bottom: 50px; padding: 0;">
	<div class="container">
        <div class="" style="margin-bottom: 5px;">
			<div class="acategory-two text-color-1 top-title-2 b-white-shadow" style=";">&nbsp;RESSOURCES ANIMALES &nbsp;<a href="{{route('visitors.allactus',['rub' => 'environnement'])}}" class="btn btn-success b-radius-6" style="padding: 1px auto; font-weight: 200%;"><i class="ion-ios-arrow-thin-right"></i></a>&nbsp; </div>
		</div>
        @if(isset($hallspoarts)&&!empty($hallspoarts))
            <div class="row" style="">
                <div class="col-md-7" style="padding-bottom: 10px; margin-bottom: 5px;">
                    <?php $dt = date_create($hallspoarts[0]->datepub_article); $dty = today();?>
                    <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                        <article class="mx-2" style="overflow: hidden; max-height: 350px; padding: 0 2px !important; margin: 0 auto;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[0]->slug_prinrub,'slug'=>$hallspoarts[0]->slug_article,'ip'=>$hallspoarts[0]->id_article])}}">
                                <img src="{{url('hphx/img/'.$hallspoarts[0]->image_article)}}" alt="{{$hallspoarts[0]->title_article}}" class="w-100" style="width: 100%;">
                            </a>
                        </article>
                        <p>
                            <a href="{{route('visitors.allactus',['rub' => $hallspoarts[0]->slug_prinrub])}}" class="acategory" style="">{{$hallspoarts[0]->desig_prinrub}}</a>
                            &nbsp;&nbsp; <span style=""> @if(!empty($hallspoarts[0]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                        </p>
                        <p class="m-0 p-auto sub-title-2" style="height: 80px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[0]->slug_prinrub,'slug'=>$hallspoarts[0]->slug_article,'ip'=>$hallspoarts[0]->id_article])}}" class="" style="font-size: 150%; font-weight: bold;">{{Str::limit($hallspoarts[0]->title_article,250)}}</a>
                        </p>
                        <p class="m-0 p-auto font-content-1" style="height: 60px; padding: auto 5px; margin: 10px;">
                            <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hallspoarts[0]->slug_prinrub,'slug'=>$hallspoarts[0]->slug_article,'ip'=>$hallspoarts[0]->id_article])}}">{{Str::limit($hallspoarts[0]->desc_article,170)}}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-5 m-auto b-radius-6" style="margin-bottom: 20px; padding-top: 0px;">
                    <div class="">
                        @if(isset($hallspoarts)&&count($hallspoarts)!=0)
                            @for($i=1; $i<=3;$i++)
                                @if (isset($hallspoarts[$i])&& ($hallspoarts[$i]==!null))
                                    <div class="row b-radius-6 box-green" style="min-height: 150px; padding: 5px; margin: 0 auto 20px auto; background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                                        <div class="col-12" style="padding-bottom: 1px; overflow-y: hidden; margin-bottom: 5px;">
                                            <?php $dt = date_create($hallspoarts[$i]->datepub_article); $dty = today();?>
                                            <div class="col-xs-5 col-md-5 p-0 mx-2 size-img-sb" style=" line-height: 120px; overflow: hidden;">
                                                <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}">
                                                    <img src="{{url('hphx/img/'.$hallspoarts[$i]->image_article)}}" alt="{{$hallspoarts[$i]->title_article}}" class="w-100" style="width: 100%;">
                                                </a>
                                            </div>
                                            <div class="col-xs-7 col-md-7 p-0">
                                                <p class="m-0 p-auto sub-title-2" style="max-height: 70px; font-weight: bold; padding: auto 5px; overflow: hidden;">
                                                    <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}" class="" style="font-size: 100%; font-weight: bold;">{{Str::limit($hallspoarts[$i]->title_article,250)}}</a>
                                                </p>
                                                <p class="m-0 p-auto font-content-1" style="max-height: 30px; margin: 1px;">
                                                    <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}">{{Str::limit($hallspoarts[$i]->desc_article,100)}}</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-inline-block time p-auto bg-success b-radius-6" style="font-size: 85%; padding: auto 5px;">
                                                <a href="{{route('visitors.allactus',['rub' => $hallspoarts[$i]->slug_prinrub])}}" class="acategory" style="">{{$hallspoarts[$i]->desig_prinrub}}</a>
                                                <span style=""> @if(!empty($hallspoarts[$i]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                                &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}">{{$hallspoarts[$i]->view_article}} Vues</a>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endfor
                        @endif
                    </div>
                </div>
                @if(isset($hallspoarts)&&count($hallspoarts)!=0)
                    @for($i=4; $i<=7;$i++)
                        @if (isset($hallspoarts[$i])&& ($hallspoarts[$i]==!null))
                            <div class="col-md-6">
                                <div class="row b-radius-6 box-green" style="min-height: 150px; padding: 5px; margin: 0 auto 20px auto; background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                                    <div class="col-12" style="padding-bottom: 1px; overflow-y: hidden; margin-bottom: 5px;">
                                        <?php $dt = date_create($hallspoarts[$i]->datepub_article); $dty = today();?>
                                        <div class="col-xs-5 col-md-5 p-0 mx-2 size-img-sb" style=" line-height: 120px; overflow: hidden;">
                                            <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}">
                                                <img src="{{url('hphx/img/'.$hallspoarts[$i]->image_article)}}" alt="{{$hallspoarts[$i]->title_article}}" class="w-100" style="width: 100%;">
                                            </a>
                                        </div>
                                        <div class="col-xs-7 col-md-7 p-0">
                                            <p class="m-0 p-auto sub-title-2" style="max-height: 70px; font-weight: bold; padding: auto 5px; overflow: hidden;">
                                                <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}" class="" style="font-size: 100%; font-weight: bold;">{{Str::limit($hallspoarts[$i]->title_article,250)}}</a>
                                            </p>
                                            <p class="m-0 p-auto font-content-1" style="max-height: 30px; margin: 1px;">
                                                <a class="font-content-1" href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}">{{Str::limit($hallspoarts[$i]->desc_article,100)}}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-inline-block time p-auto bg-success b-radius-6" style="font-size: 85%; padding: auto 5px;">
                                            <a href="{{route('visitors.allactus',['rub' => $hallspoarts[$i]->slug_prinrub])}}" class="acategory" style="">{{$hallspoarts[$i]->desig_prinrub}}</a>
                                            <span style=""> @if(!empty($hallspoarts[$i]->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                            &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.sgactu',['rub'=>$hallspoarts[$i]->slug_prinrub,'slug'=>$hallspoarts[$i]->slug_article,'ip'=>$hallspoarts[$i]->id_article])}}">{{$hallspoarts[$i]->view_article}} Vues</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                @endif
            </div>
        @endif
        <div class="col-12" style="margin-top: 10px;">
            <a href="{{route('visitors.allactus',['rub' => 'ressourcesanimales'])}}" class="btn btn-link b-radius-6" style="width: 100%;"> Voir plus ... <i class="ion-ios-arrow-thin-right"></i></a>
        </div>
	</div>
</section>
{{--  --}}
{{--  --}}
<!-- // Home Page -->
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
            