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

        <div class="row" style="margin-bottom: 40px;">
            <div class="col-md-12">
                <div style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap; background-color: #ffffff; padding: 15px 20px; border-bottom: 8px solid #ffa000; box-shadow: 0 4px 15px rgba(0,0,0,0.05); gap: 15px;">

                    <div style="font-size: 2.2rem; font-weight: 900; color: #111; text-transform: uppercase; display: flex; align-items: center; letter-spacing: 1px;">
                        <span class="gm-animated-dot" style="margin-right: 15px;"></span>
                        VOICI @if(!empty($hcarts[0]->id_prinrub)&&!isset($wcount)){{count($hcarts)}}/{{$hnbartsprinrub[$hcarts[0]->id_prinrub]}}@elseif(isset($wcount)){{count($hcarts)}}/{{$wcount}} @else 0/0 @endif ARTICLES
                    </div>

                    <div style="font-size: 2.8rem; font-weight: 900; color: #127319; margin: 0 10px; line-height: 1;">
                        |
                    </div>

                    <div style="background-color: #127319; color: #ffffff; padding: 6px 25px 6px 6px; border-radius: 8px; font-size: 2.2rem; font-weight: 900; text-transform: uppercase; display: flex; align-items: center; letter-spacing: 1px;">
                        
                        @php
                            // On met le nom de la rubrique en minuscules pour faciliter la recherche
                            $nomRubrique = strtolower(trim($rub));
                            
                            // 1. Icône par défaut (si la catégorie n'est pas reconnue ci-dessous)
                            $iconeCat = 'ion-navicon-round'; 

                            // 2. Vérification des mots-clés pour attribuer la bonne icône
                            if (strpos($nomRubrique, 'agri') !== false) {
                                $iconeCat = 'ion-leaf'; // Feuille pour l'Agriculture
                            } elseif (strpos($nomRubrique, 'hydrau') !== false || strpos($nomRubrique, 'eau') !== false) {
                                $iconeCat = 'ion-waterdrop'; // Goutte d'eau pour l'Hydraulique
                            } elseif (strpos($nomRubrique, 'environ') !== false) {
                                $iconeCat = 'ion-earth'; // Planète pour l'Environnement
                            } elseif (strpos($nomRubrique, 'animal') !== false) {
                                $iconeCat = 'ion-android-walk'; // Icône pour Ressources Animales
                            } elseif (strpos($nomRubrique, 'forêt') !== false || strpos($nomRubrique, 'foret') !== false) {
                                $iconeCat = 'ion-tree'; // Arbre pour Forêt (si disponible)
                            }
                        @endphp

                        <span style="background-color: #ffa000; color: #ffffff; border-radius: 5px; padding: 4px 15px; margin-right: 15px; display: flex; align-items: center; justify-content: center;">
                            <i class="{{ $iconeCat }}" style="font-size: 1.8rem;"></i>
                        </span>
                        
                        {{$rub}}
                    </div>

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
                                    {{Str::limit(formatTitle($hrh->title_article), 90)}}
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
                                <span style="text-transform: none;"><strong style="font-size: 1rem">
                                    @if(!empty($hrh->datepub_article))
                                        {{ \Carbon\Carbon::parse($hrh->datepub_article)->locale('fr')->diffForHumans() }}
                                    @else
                                        {{ \Carbon\Carbon::now()->locale('fr')->diffForHumans() }}
                                    @endif
                                </strong></span>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span><i class="ion-ios-eye gm-icon-eye"></i> <strong>{{$hrh->view_article}}</strong></span>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span><a href="#" class="reading-time" style="font-weight: 700;"> <strong style="font-size: 1rem">Temps de lecture : {{$hrh->temps_lecture}} min</strong></a></span>
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

@stop