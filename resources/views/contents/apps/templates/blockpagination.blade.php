<div class="card-footer clearfix " style="/*background-color: #fff;*/ ">
	@if($paginator->hasPages())
	<ul class=" pagination pagination float-right" style=" border-color: transparent; margin: 0 auto; border-radius: 0;/*background-color: #fff;;*/">
		<!-- Previous Page Link -->
		@if($paginator->onFirstPage()) 
			<li class="page-item disabled"><a class="page-link bg-dark" style="border-radius: 0;/*border: 1px solid #dc3545;  background-color: #1f7044; border: 1px solid transparent;x background-color: #d10;*/"><span>&laquo; Préc</span></a></li>
		@else
			<li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link bg-dark" style="border-radius: 0;/*border: 1px solid #dc3545;  background-color: #1f7044; border: 1px solid transparent;*/" rel="prev">&laquo; Préc</a></li>
		@endif

		<!-- Pagination Elements Here -->
		@foreach($elements as $element)
			<!-- Make three dots -->
			@if(is_string($element))
				<li class="page-item disabled"><a class="page-link"><span>{{$element}}</span></a></li>
			@endif

			<!-- Links Array Here active-->
			@if(is_Array($element))
				@foreach($element as $page=>$url)
					@if($page == $paginator->currentPage())
						<li class="page-item active" style="background-color: transparent !important; /*border: 1px solid #dc3545;*/ "><a href="#" class="page-link bg-danger" style=" border: 1px solid transparent !important;"><span>{{ $page }}</span></a></li>
					@else
						<li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
					@endif
				@endforeach
			@endif
		@endforeach

		<!-- Next Page Link -->
		@if($paginator->hasMorePages())
			<li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link bg-dark" style=" border-radius: 0;/*border: 1px solid #dc3545;  background-color: #1f7044; border: 1px solid transparent;*/"><span>Suiv &raquo;</span></a></li>
		@else
			<li class="page-item disabled"><a class="page-link bg-dark" style=" border-radius: 0;/*border: 1px solid #dc3545;  background-color: #1f7044; border: 1px solid transparent;*/"><span>Suiv &raquo;</span></a></li>
		@endif
	</ul>
	@endif 
</div>	
<!-- <div class="card-footer clearfix">
        <ul class="pagination pagination m-0 float-right">
          <li class="page-item" ><a class="page-link bg-dark" href="#" style="border-radius: 0; ">&laquo; Préc</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item" ><a class="page-link bg-dark" href="#" style="border-radius: 0; ">Suiv &raquo;</a></li>
        </ul>
      </div> -->