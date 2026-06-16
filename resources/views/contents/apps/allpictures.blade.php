@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12 mb-3">
      <a href="{{route('admins.addpost')}}" class="btn btn-info">
        <span class="d-none d-sm-inline-block">Ajouter&nbsp;&nbsp;</span>
        <i class="fa fa-plus"></i>
      </a>
    </div>
  <div class="col-12">
  <h2 style="text-align: center;">Toutes les Images de la Galérie </h2>
    <form method="get" action="{{route('admins.allpubs')}}" class="">
      <!-- /.card-header  -->
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">
                        La Galérie
                    </div>
                </div> 
                <div class="card-body">
                    <div class="row">
                    @if(isset($hallimgs)&&!empty($hallimgs))
                        @foreach($hallimgs as $img)
                        <div class="position-relative col-md-4 col-12 my-3">
                            <a href="{{url('hphx/img/'.$img->img_galimg)}}" data-toggle="lightbox" data-title="{{$img->name_galimg}}" data-gallery="gallery">
                                <img src="{{url('hphx/img/'.$img->img_galimg)}}" class="img-fuild img-thumbnail mb-2" alt="{{$img->name_galimg}}"/>
                            </a>
                            <div class="position-absolute bg-dark text-center p-2 m-2" style="bottom: 0; opacity: 8; left: 0; right: 0; font-size: 12px;">
                                <i class="fa fa-link float-left"></i> {{$img->link_galimg}}
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div style="width: 100%;">
                            <span colspan="7" style="width: 100%; text-align: center;"><span class="alert alert-danger" >Aucune Image enregistrée pour le moment ... </span></span>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
      <br>
      <!-- Paginate Block -->
      {{$hallimgs->links('contents.apps.templates.blockpagination')}}
      <!-- Paginate Block -->
    </form>
    <!-- /.card -->
    <div class="row">
        <div class="col-12">
            <!-- text input -->
            <div class="form-group button float-left" style="width: 100%;">
                <a href="{{url('/adaddpicture')}}" class="btn btn-success border-radius-0" style="width: 100%; color: #fff;"><i class="fa fa-upload"></i><span class=" d-none d-sm-inline-block">&nbsp;Ajouter des Images</span></a>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- /.row -->
@stop