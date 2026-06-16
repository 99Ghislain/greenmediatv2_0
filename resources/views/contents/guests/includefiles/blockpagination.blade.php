@if($paginator->hasPages())
<div class="pagination-area mt-0 py-2 px-2 bg-light ">
	<!-- Previous Page Link disabled-->
	@if($paginator->onFirstPage()) 
		<a href="#" class="prev page-numbers  "> <i class="bx bx-chevron-left"></i></a>
	@else
		<a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers "> <i class="bx bx-chevron-left"></i></a>
	@endif

	<!-- Pagination Elements Here -->
	@foreach($elements as $element)
		<!-- Make three dots  disabled-->
		@if(is_string($element))
			<a href="#" class="page-numbers ">{{$element}}</a>
		@endif

		<!-- Links Array Here active-->
		@if(is_Array($element))
			@foreach($element as $page=>$url)
				@if($page == $paginator->currentPage())
					<span class="page-numbers current" aria-current="page">{{ $page }}</span>
				@else
					<a href="{{ $url }}" class="">{{ $page }}</a>
				@endif
			@endforeach
		@endif
	@endforeach

	<!-- Next Page Link disabled-->
	@if($paginator->hasMorePages())
		<a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers"><i class="bx bx-chevron-right"></i></a>
	@else
		<a href="#" class="next page-numbers "><i class="bx bx-chevron-right"></i></a>
	@endif
</div>
@endif 