@extends("layouts/appLayout")
@section("layoutContent")
<div class="row">
    <div class="col-12">
        <p class="" style="text-align: left;">
            <span class="alert alert-danger badge border-radius-0" style="border-left: 5px solid #095a70; font-weight: bolder; font-size: 14px;"><i class="far fa-alert"></i>Alerte !! Ajouter librement vos Images. Sauf, celle de la Une des articles. Elle ne neccesite pas d'etre enregistree ici pour composer la galerie.</span>
        </p> 
    </div>
    @if(session()->has('lastimg'))
        @foreach(session()->get('lastimg') as $lst)
        <div class="position-relative col-md-4 col-12 my-3">
            <a href="{{url('hphx/img/'.$lst->img_galimg)}}" data-toggle="lightbox" data-title="{{$lst->name_galimg}}" data-gallery="gallery">
                <img src="{{url('hphx/img/'.$lst->img_galimg)}}" class="img-fuild img-thumbnail mb-2" alt="{{$lst->name_galimg}}"/>
            </a> 
            <div class="position-absolute bg-dark text-center p-2 m-2" style="bottom: 0; opacity: 8; left: 0; right: 0; font-size: 12px;">
                <i class="fa fa-link float-left"></i> {{$lst->link_galimg}}
            </div>
        </div>
        @endforeach
    @else
        <div class="position-relative col-md-4 col-12 my-3">
            <img src="{{url('hphx/img/img-default.png')}}" alt="img-default" class="img-fuild img-thumbnail">
            <div class="position-absolute bg-dark text-center p-2 m-2" style="bottom: 0; opacity: 8; left: 0; right: 0; font-size: 12px;">
            <i class="fa fa-link float-left"></i>  https://buraqtrans.ci/hphx/img/img-default.png
            </div>
        </div>
        <div class="position-relative col-md-4 col-12 my-3">
            <img src="{{url('hphx/img/img-default.png')}}" alt="img-default" class="img-fuild img-thumbnail">
            <div class="position-absolute bg-dark text-center p-2 m-2" style="bottom: 0; opacity: 8; left: 0; right: 0; font-size: 12px;">
                <i class="fa fa-link float-left"></i> https://buraqtrans.ci/hphx/img/img-default.png
            </div>
        </div>
        <div class="position-relative col-md-4 col-12 my-3">
            <img src="{{url('hphx/img/img-default.png')}}" alt="img-default" class="img-fuild img-thumbnail">
            <div class="position-absolute bg-dark text-center p-2 m-2" style="bottom: 0; opacity: 8; left: 0; right: 0; font-size: 12px;">
                <i class="fa fa-link float-left"></i>  https://buraqtrans.ci/hphx/img/img-default.png
            </div>
        </div>
    @endif
    
    <div class="col-12">
        <form method="POST" action="{{route('admins.inspic')}}" class="card" enctype="multipart/form-data">
        @csrf   
        <div class="card-body ">
            <!-- Informations sur  -->
            <div role="form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pic_name"> Nom <span style="color: red;">*</span></label>
                            <input id="pic_name" type="text" class="form-control border-radius-0" name="pic_name" placeholder="Ex.: Societe - la consultation" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pic_album_id">Album &nbsp;<span style="color: red">*</span>&nbsp;: </label>
                            <select id="pic_album_id" type="text" class="form-control border-radius-0" name="pic_album_id" placeholder="" required="required" >
                                <option class="style-option-principalrub " value="0" selected>Choix d'album</option>
                                @foreach($hallalb as $alb)
                                    <option class="style-option-principalrub " value="{{$alb->id}}">{{$alb->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="pic_imgs">Charger vos Images <span style="color: #f00;">*</span></label>
                        <input id="pic_imgs" type="file" class="form-control border-radius-0" name="pic_imgs[]" placeholder="" multiple>
                    </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group button float-left" style="width: 100%;">
                        <a href="{{url('/adallpictures')}}" class="btn btn-default border-radius-0" style="width: 100%;"><i class="fa fa-arrow-left"></i><span class=" d-none d-sm-inline-block">&nbsp;Voir toute la galérie d'images</span></a>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group button float-right" style="width: 100%;">
                        <button type="submit" class="btn btn-success border-radius-0" style="width: 100%; color: #fff;"><span class=" d-none d-sm-inline-block">Uploader&nbsp;</span> <i class="fa fa-upload"></i></button>
                    </div>
                    </div>
                </div>
            </div>      
        </div>
        <!-- /.card-header-->
        <!-- /.card-body -->
            <!-- /.card -->
        </form>
    </div>
</div>
<!-- /.row -->
@stop