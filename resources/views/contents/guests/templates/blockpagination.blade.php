<div class="col-md-12 text-center">
	<!-- Pagination -->
	<div class="pagination">			
		@if($paginator->hasPages())
		<ul class="pagination ">
			<!-- Previous Page Link disabled-->
			@if($paginator->onFirstPage())
				<li class="prev "><a href="#"> <i class="ion-ios-arrow-left"></i></a></li>
			@else
				<li class="prev"><a href="{{ $paginator->previousPageUrl() }}"> <i class="ion-ios-arrow-left"></i></a></li>
			@endif

			<!-- Pagination Elements Here -->
			@foreach($elements as $element)
				<!-- Make three dots  disabled-->
				@if(is_string($element))
					<li><a href="#">{{$element}}</a></li>
				@endif

				<!-- Links Array Here active-->
				@if(is_Array($element))
					@foreach($element as $page=>$url)
						@if($page == $paginator->currentPage())
							<li class="active"><a href="#">{{ $page }}</a></li>
						@else
							<li class=""><a href="{{ $url }}" class="">{{ $page }}</a></li>
						@endif
					@endforeach
				@endif
			@endforeach

			<!-- Next Page Link disabled-->
			@if($paginator->hasMorePages())
				<li class="next"><a href="{{ $paginator->nextPageUrl() }}"><i class="ion-ios-arrow-right"></i></a></li>
			@else
				<li class="next "><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
			@endif
		</ul>
		@endif 
	</div>
	<!--/ End Pagination -->
</div>
