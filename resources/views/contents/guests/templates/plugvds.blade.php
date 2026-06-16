<section class="best-of-the-week abg-dark ">
	<div class="container">
		<h1>
			<div class="acategory-two text-color top-title-2 text-danger bg-danger" style="font-size: 150%;">&nbsp; GREEN MEDIA AFRICA - TV &nbsp; <a href="{{route('visitors.allactusz')}}" class="btn btn-danger m-auto" style=" font-weight: 200%;"><i class="ion-ios-arrow-thin-right"></i></a></div>
			<!--<div class="d-xs-none carousel-nav" id="best-of-the-week-nav">-->
			<!--	<div class="prev">-->
			<!--		<i class="ion-ios-arrow-left"></i>-->
			<!--	</div>-->
			<!--	<div class="next">-->
			<!--		<i class="ion-ios-arrow-right"></i>-->
			<!--	</div>-->
			<!--</div>-->
		</h1>
		<div class="owl-carousel carousel-1" style="padding-bottom: 0;">
			@if(isset($hrecvds)&&!empty($hrecvds[0]))
				@foreach($hrecvds as $recvd)
					<article class="article article-vds bg-white b-radius-6 box-green">
						<?php $dt = date_create($recvd->datepub_video); $dty = today();?>
						<div class="b-radius-6 box-green" style=" background-color:rgb(255, 255, 255); box-shadow: 1px 1px 5px 1px #92929292; overflow: hidden;">
							<article class="featured mx-2" style="max-height: 150px; padding: 0 2px !important; margin: 0 auto;">
								<a class="vdsplayer" href="{{url('https://www.youtube.com/embed/'.$recvd->linkyoutube_video.'?showinfo=0')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
									<img src="{{url('hphx/img/'.$recvd->image_video)}}" alt="{{$recvd->title_video}}" class="w-100" style="width: 100%;">
								</a>
							</article>
							<p class="m-0 p-auto" style="font-size: 16px; height: 80px; font-weight: bold; padding: auto 5px; margin: 10px;">
								<a class="vdsplayer" href="{{url('https://www.youtube.com/embed/'.$recvd->linkyoutube_video.'?showinfo=0')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery" style="">{{Str::limit($recvd->title_video,100)}}</a>
							</p>
							<div class="time p-auto" style="font-size: 85%; padding: auto 5px; margin: 0 10px 10px 10px;">
								<span style=""> <?php $dt = date_create($recvd->datepub_video);?> @if(!empty($recvd->datepub_video)){{ $tday = phxdtformat($dt) }}@else{{today()->format('d M Y')}}@endif </span>
								&nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.allvideos')}}" class="acategory" style=" background-color: #d00 !important;">&nbsp;Vidéo&nbsp;</a>
							</div>
						</div>
					</article>
				@endforeach
			@endif
		</div>
	</div>
</section>