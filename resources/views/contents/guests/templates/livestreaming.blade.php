{{-- Live Streaming --}}
@php
    $linkId = null;
    if($hlastvd[0]->typevideo_id=='2'){
        $linkId = $hlastvd[0]->linkyoutube_video;
    }else{
        $linkId = $hlastvd[0]->linkyoutube_video;
    }
@endphp
{{--  --}}
@if($hlastvd[0]->typevideo_id=='2')
<section class="home " style="margin-top: 20px ; padding: 0;">
	<div class="container">
		<div class="" style="margin-bottom: 5px;">
			<div class=" acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="">&nbsp; Live Streaming &nbsp;🔴</div>
		</div>
        @if(isset($hlastvd)&&!empty($hlastvd))
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 10px; margin-bottom: 5px;">
                    <?php $dt = date_create($hlastvd[0]->datepub_video); $dty = today();?>
                    <div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
                        <article class="mx-2" style="overflow: hidden; min-height: 500px; padding: 0 2px !important; margin: 0 auto;">
                            <iframe width="" height="" style="width: 100%; min-height: 500px;" src="{{url('https://www.youtube.com/embed/'.$linkId.'?autoplay=1&mute=1')}}"
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                             referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                            </iframe>
                        </article>
                        <p>
                            <a href="{{route('visitors.allvideos')}}" class="acategory" style="background-color: #d00 !important; ">Live Streaming</a>
                            &nbsp;&nbsp; <span style=""> @if(!empty($hlastvd[0]->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                        </p>
                        <p class="m-0 p-auto sub-title-2" style="height: 80px; font-weight: bold; padding: auto 5px; margin: 10px; overflow: hidden;">
                            <a href="#" class="" style="font-size: 150%; font-weight: bold;">{{Str::limit($hlastvd[0]->title_video,250)}}</a>
                        </p>
                    </div>
                </div>
            </div>
        @endif
	</div> 
</section>
@endif
{{-- Live Streaming --}}