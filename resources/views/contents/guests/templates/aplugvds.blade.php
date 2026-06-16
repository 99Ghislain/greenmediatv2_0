<section class="best-of-the-week ">
	<div class="container">
        <div class="" style="">
			<div class="acategory-two text-color-1 top-title-2" style="">&nbsp;ECO-TOURISME &nbsp;<a href="{{route('visitors.allactus',['rub' => $hallecoarts[0]->slug_prinrub])}}" class="btn btn-success m-auto" style=" font-weight: 200%;"><i class="ion-ios-arrow-thin-right"></i></a>&nbsp; </div>
		</div>
        <div class="col-12" style="padding: 10px 0;">
            <div class="owl-carousel owl-theme slide slide-phx mb-3 box-green" id="featured" style=" border-radius: 6px; margin-bottom: 30px; padding: auto 5px; height: 350px; overflow: hidden;">
                @if(isset($hallecoarts)&&!empty($hallecoarts))
                    @foreach($hallecoarts as $hca)
                    <?php $dt = date_create($hca->datepub_article); $dty = today();?>
                    <div class="item" style="border: 4px solid transparent; border-radius: 6px; ">
                        <article class="featured b-radius-6 mx-2" style="height: 350px; padding: 0 2px !important; border-radius: 6px; ">
                            <div class="overlay"></div>
                            <a href="{{route('visitors.sgactu',['rub'=>$hca->slug_prinrub,'slug'=>$hca->slug_article,'ip'=>$hca->id_article])}}">
                                <figure>
                                    <img src="{{url('hphx/img/'.$hca->image_article)}}" alt="{{$hca->title_article}}" class="">
                                </figure>
                            </a>
                            <div class="details" style="background : rgba(10,10,10,.5);">
                                <p class="m-0 p-auto" style="height: 80px; font-size: 16px; font-weight: bold; padding: auto 5px; margin: 10px;">
                                    <a href="{{route('visitors.sgactu',['rub'=>$hca->slug_prinrub,'slug'=>$hca->slug_article,'ip'=>$hca->id_article])}}" class="" style="color: #fff;">{{Str::limit($hca->title_article,100)}}</a>
                                </p>
                                <div class="time p-auto" style="font-size: 85%; padding: auto 5px; margin: 0 10px;">
                                    <span style=""> @if(!empty($hca->datepub_article)){{ $tday = phxdtformat($dt) }}@else{{$tday = phxdtformat($dty)}} @endif </span>
                                    &nbsp;&nbsp; | &nbsp;&nbsp; <a href="{{route('visitors.allactus',['rub' => $hca->slug_prinrub])}}" class="acategory" style="">{{$hca->desig_prinrub}}</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>