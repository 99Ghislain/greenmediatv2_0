@extends('layouts/guestLayout')
@section('layoutContent')

<section class="home" style="margin-top: 20px; padding: 0;">
    <div class="container">
        
        <div class="row mb-3">
            <div class="col-md-12" style="font-weight: bolder;">        
                <ol class="breadcrumb bg-white" style="border-radius: 5px; padding: 10px 15px; margin-bottom: 0;">
                    <li><a href="{{url('/')}}" style="color: #127319;">Accueil</a></li>
                    <li class="active" style="color: #777;">&nbsp;/ {{$rub}}</li>
                </ol>
            </div>
        </div>

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12">
                <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow">
                    &nbsp; <span class="gm-animated-dot"></span> Voici @if(!empty($hcarts[0]->id_prinrub)&&!isset($wcount)){{count($hcarts)}}/{{$hnbartsprinrub[$hcarts[0]->id_prinrub]}}@elseif(isset($wcount)){{count($hcarts)}}/{{$wcount}} @else 0/0 @endif Article(s) de : <span style="color: #ffa000;">{{$rub}}</span> &nbsp;
                </div>
            </div>
        </div>

        @if(count($hcarts) != 0)
            <div class="row mt-4" style="display: flex; flex-wrap: wrap;">
                
                @foreach($hcarts as $hrh)
                    <div class="col-md-3 gm-grid-col" style="margin-bottom: 40px;">
                        <?php $dt = date_create($hrh->datepub_article); $dty = today();?>
                        
                        <div class="gm-grid-card" style="width: 100%;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}">
                                <img src="{{url('hphx/img/'.$hrh->image_article)}}" alt="{{$hrh->title_article}}" class="gm-grid-img">
                            </a>
                            
                            <div class="gm-grid-body">
                                <a href="{{route('visitors.sgactu',['rub'=>$hrh->slug_prinrub,'slug'=>$hrh->slug_article,'ip'=>$hrh->id_article])}}" class="gm-grid-title">
                                    {{Str::limit($hrh->title_article, 90)}}
                                </a>
                                <p class="gm-side-desc">
                                    {{Str::limit($hrh->desc_article, 100)}}
                                </p>
                            </div>

                            <div class="gm-card-footer">
                                <a href="{{route('visitors.allactus',['rub' => $hrh->slug_prinrub])}}">
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
                
            </div>

            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center; margin-top: 20px;">
                    {{$hcarts->links('contents.guests.templates.blockpagination')}}
                </div>
            </div>

        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert text-center" style="background-color: #f8d7da; color: #721c24; border-radius: 5px; font-weight: bold; padding: 20px;">
                        <i class="ion-ios-warning"></i> Aucun article n'existe dans cette catégorie pour le moment !
                    </div>
                </div>
            </div>
        @endif
        
    </div>
</section>

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
    
    if($ijr=="Mon"){$ljr = $tabjr[0];}elseif($ijr=="Tue"){$ljr = $tabjr[1];}elseif($ijr=="Wed"){$ljr = $tabjr[2];}elseif($ijr=="Thu"){$ljr = $tabjr[3];}
    elseif($ijr=="Fri"){$ljr = $tabjr[4];}elseif($ijr=="Sat"){$ljr = $tabjr[5];}elseif($ijr=="Sun"){$ljr = $tabjr[6];}

    return $ljr.' '.$jr.' '.$mfr.' '.$an ;
} 
;?>
@stop