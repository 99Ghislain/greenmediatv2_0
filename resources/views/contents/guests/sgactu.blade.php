@extends('layouts/guestLayout')
@section('layoutContent')

<section class="single" style="margin-top: -120px; padding: 0px;">
    <div class="container">
        
        <div class="row mb-3">
            <div class="col-md-12" style="font-weight: bolder;">        
                <ol class="breadcrumb bg-white" style="border-radius: 5px; padding: 10px 15px; margin-bottom: 0;">
                    <li><a href="{{url('/')}}" style="color: #127319;">Accueil</a></li>
                    <li><a href="{{route('visitors.allactus',['rub' => $hcart[0]->slug_prinrub])}}" style="color: #127319;">{{$hcart[0]->slug_prinrub}}</a></li>
                    <li class="active" style="color: #777;">&nbsp; {{Str::limit($hcart[0]->slug_article, 80)}}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                
<article class="gm-article">

                @if(!empty($hcart[0]->title_english) || !empty($hcart[0]->content_english))
                <button type="button" id="langToggleBtn" onclick="toggleLanguage()" class="btn btn-sm" style="background-color: #ffa000; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 15px; border: none; white-space: nowrap; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    <i class="fa fa-language"></i> English Version
                </button>
            @endif
            <hr>
    
    <header class="gm-article-header">
        <!-- Titre et Bouton de bascule de langue -->
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 15px; flex-wrap: wrap; margin-bottom: 15px;">
            <h1 class="gm-article-title" style="flex: 1; margin: 0;">
                <span class="lang-fr">{{ $hcart[0]->title_article }}</span>
                @if(!empty($hcart[0]->title_english))
                    <span class="lang-en" style="display: none;">{{ $hcart[0]->title_english }}</span>
                @endif
            </h1>

        </div>

        <div class="gm-article-meta">
            <span class="gm-meta-item">
                <i class="far fa-calendar-alt"></i> 
                Publié le <?php $dt = date_create($hcart[0]->datepub_article); ?>@if(!empty($hcart[0]->datepub_article)){{ phxdtformat($dt) }}@else{{ today()->format('d M Y') }}@endif
            </span>

            <span class="gm-meta-divider"></span>

            <span class="gm-meta-badge">
                {{ $hcart[0]->slug_prinrub }} 
                @if(isset($hnbartsprinrub) && isset($hnbartsprinrub[$hcart[0]->id_prinrub])) 
                    [ {{ sprintf("%02d", $hnbartsprinrub[$hcart[0]->id_prinrub]) }} ARTICLES ] 
                @endif
            </span>

            <span class="gm-meta-divider"></span>

            <span class="gm-meta-item">
                <i class="far fa-eye"></i> 
                <?= isset($a_views) && ($a_views > 0) ? $a_views : 0; ?> vues
            </span>
            <span class="gm-meta-divider"></span>
            <span class="gm-meta-item">
                <i class="far fa-clock"></i> 
                 Temps de lecture : {{ $hcart[0]->temps_lecture }} min
            </span>
        </div>
    </header>

    @if(!empty($hcart[0]->image_article))
        <div class="gm-photo">
            <img src="{{ url('hphx/img/'.$hcart[0]->image_article) }}" alt="{{ $hcart[0]->title_article }}">
            @if(!empty($hcart[0]->imgsubtitle_article))
                <figcaption class="gm-caption">
                    {{ $hcart[0]->imgsubtitle_article }}
                </figcaption>
            @endif
        </div>
    @endif

    @if(!empty($hcart[0]->desc_article) || !empty($hcart[0]->desc_english))
        <div class="gm-intro-box">
            <div class="lang-fr">{{ $hcart[0]->desc_article }}</div>
            @if(!empty($hcart[0]->desc_english))
                <div class="lang-en" style="display: none;">{{ $hcart[0]->desc_english }}</div>
            @endif
        </div>
    @endif

    <div class="gm-article-content">
        <div class="gm-body">
            <div class="lang-fr">{!! !empty($hcart[0]->content_article) ? $hcart[0]->content_article : '' !!}</div>
            @if(!empty($hcart[0]->content_english))
                <div class="lang-en" style="display: none;">{!! $hcart[0]->content_english !!}</div>
            @endif
        </div>
    </div>

@if(!empty($hcart[0]->nom_redacteur))
    <div class="gm-author-box" style="display: flex !important; flex-wrap: wrap !important; align-items: center !important; background: #f9fbf9 !important; border-left: 4px solid #64b802 !important; padding: 20px !important; margin-top: 40px !important; margin-bottom: 30px !important; border-radius: 4px !important; box-shadow: 0 2px 8px rgba(0,0,0,0.05) !important; width: 100% !important; box-sizing: border-box !important;">
        
        <div class="gm-author-avatar" style="flex: 0 0 80px !important; width: 80px !important; height: 80px !important; min-width: 80px !important; min-height: 80px !important; border-radius: 50% !important; overflow: hidden !important; border: 2px solid #64b802 !important; margin-right: 20px !important; margin-bottom: 10px !important; background: #eee !important;">
            @if(!empty($hcart[0]->photo_redacteur))
                <img src="/public/uploads/redacteurs/{{ $hcart[0]->photo_redacteur }}" alt="Auteur" style="width: 100%; height: 100%; object-fit: cover;">
            @else
                <img src="{{ asset('assets/img/default-user.png') }}" alt="Auteur" style="width: 100% !important; height: 100% !important; object-fit: cover !important; display: block !important;">
            @endif
        </div>

        <div class="gm-author-info" style="flex: 1 1 250px !important; min-width: 0 !important;">
            <span style="font-size: 12px !important; text-transform: uppercase !important; color: #888 !important; font-weight: 600 !important; letter-spacing: 1px !important; display: block !important;">Rédigé par</span>
            
            <h4 style="margin: 3px 0 8px 0 !important; font-size: 18px !important; font-weight: bold !important; color: #222 !important; display: block !important;">
                {{ $hcart[0]->nom_redacteur }}
            </h4>
            
            @if(!empty($hcart[0]->bio_redacteur))
                <p style="margin: 0 !important; font-size: 14px !important; color: #555 !important; line-height: 1.6 !important; word-break: break-word !important;">
                    {{ $hcart[0]->bio_redacteur }}
                </p>
            @endif
        </div>
    </div>
    @endif
    </article>

<div class="sharing" style="margin-top: 30px; padding: 20px; background: #fff; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <div class="title" style="font-weight: bold; font-size: 1.2rem; margin-bottom: 15px;">
        <i class="ion-android-share-alt"></i> Partager cet article
    </div>
    <ul class="social">
        <li>
            <a href="javascript:void(0);" onclick="partageNatif()" class="facebook" style="background-color: #3b5998; color: #fff;">
                <i class="ion-android-share-alt"></i> Partager (Mobile)
            </a>
        </li>
        <li>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" class="twitter sharetwitter" target="_blank" rel="noopener noreferrer">
                <i class="ion-social-twitter"></i> Twitter
            </a>
        </li>
        <li>
            <a href="https://api.whatsapp.com/send?text=Découvrez cet article : {{ urlencode(url()->current()) }}" class="whatsapp sharewhatsapp" target="_blank" rel="noopener noreferrer">
                <i class="ion-social-whatsapp"></i> WhatsApp
            </a>
        </li>
    </ul>
</div>

{{-- Script de bascule de langue et de partage --}}
<script>
let currentLang = 'fr';
function toggleLanguage() {
    const frElements = document.querySelectorAll('.lang-fr');
    const enElements = document.querySelectorAll('.lang-en');
    const btnEl = document.getElementById('langToggleBtn');

    if (currentLang === 'fr') {
        frElements.forEach(el => el.style.display = 'none');
        enElements.forEach(el => el.style.display = 'block');
        btnEl.innerHTML = '<i class="fa fa-language"></i> Version Française';
        btnEl.style.backgroundColor = '#127319';
        currentLang = 'en';
    } else {
        enElements.forEach(el => el.style.display = 'none');
        frElements.forEach(el => el.style.display = 'block');
        btnEl.innerHTML = '<i class="fa fa-language"></i> English Version';
        btnEl.style.backgroundColor = '#ffa000';
        currentLang = 'fr';
    }
}

function partageNatif() {
    if (navigator.share) {
        navigator.share({
            title: document.title,
            url: '{{ url()->current() }}'
        }).then(() => {
            console.log('Menu ouvert avec succès');
        }).catch((error) => {
            console.log('Partage annulé', error);
        });
    } else {
        window.open('https://www.facebook.com/sharer.php?u={{ urlencode(url()->current()) }}', '_blank', 'width=600,height=400');
    }
}
</script>

                <!-- SECTION COMMENTAIRES -->
                <div class="comments" style="margin-top: 30px;">
                    <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="margin-bottom: 25px; text-align: center; font-size: 20px !important;">
                        &nbsp; <span class="gm-animated-dot"></span> Commentaires &nbsp;
                    </div>

                    <div class="spost_nav bg-white" style="padding: 25px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                        
                        @if(session('success'))
                            <div class="alert alert-success" style="border-radius: 5px; margin-bottom: 20px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('comments.store', $hcart[0]->id_article) }}" method="POST" style="margin-bottom: 30px;">
                            @csrf
                            
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="author_name" style="font-weight: 600; font-size: 0.95rem; color: #333;">Votre Nom ou Pseudo <small class="text-muted">(Optionnel - laissez vide pour rester anonyme)</small></label>
                                <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Ex: LecteurAnonyme" style="border-radius: 5px; padding: 10px;">
                            </div>

                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="content_comment" style="font-weight: 600; font-size: 0.95rem; color: #333;">Votre commentaire <span style="color: red;">*</span></label>
                                <textarea name="content_comment" id="content_comment" rows="4" class="form-control @error('content_comment') is-invalid @enderror" placeholder="Écrivez votre commentaire ici..." required style="border-radius: 5px; padding: 10px;"></textarea>
                                @error('content_comment')
                                    <span class="text-danger" style="font-size: 0.85rem; display: block; margin-top: 5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn" style="background-color: #127319; color: #fff; font-weight: bold; border-radius: 5px; padding: 10px 25px; border: none;">
                                Publier le commentaire
                            </button>
                        </form>

                        <hr style="margin: 30px 0; border-top: 1px solid #eee;">

                        <h4 style="font-weight: bold; font-size: 1.1rem; margin-bottom: 20px; color: #127319;">
                            Derniers commentaires (@if(isset($recentComments)){{ count($recentComments) }}@else 0 @endif)
                        </h4>

                        <div class="comments-list">
                            @if(isset($recentComments) && count($recentComments) > 0)
                                @foreach($recentComments as $comment)
                                    <div class="comment-item" style="padding: 15px; background: #f9f9f9; border-left: 4px solid #127319; border-radius: 4px; margin-bottom: 15px;">
                                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                            <strong style="color: #333; font-size: 0.95rem;">
                                                <i class="ion-person" style="color: #127319; margin-right: 5px;"></i>
                                                {{ $comment->author_name ?? 'Anonyme' }}
                                            </strong>
                                            <small class="text-muted" style="font-size: 0.8rem;">
                                                <i class="ion-clock" style="margin-right: 3px;"></i>
                                                {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                            </small>
                                        </div>
                                        <p style="margin: 0; color: #555; font-size: 0.95rem; line-height: 1.5;">
                                            {{ $comment->content_comment }}
                                        </p>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted" style="font-style: italic; margin: 0;">Soyez le premier à laisser un commentaire sur cet article !</p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>

                @include('contents.guests.templates.sidebarone')
            
        </div>

<hr style="margin: 30px 0; border-top: 1px solid #eee;">

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="acategory-two text-color-1 top-title-2 text-uppercase b-white-shadow" style="margin-bottom: 25px; text-align: center; font-size: 20px !important;">
                    &nbsp; <span class="gm-animated-dot"></span> À lire aussi &nbsp;
                </div>
            </div>
        </div>

        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: center;">
            @if(isset($halsoreads) && count($halsoreads)!=0)
                @foreach($halsoreads as $hrnd)
                    <div class="col-md-3 gm-grid-col" style="margin-bottom: 30px;">
                        <?php $dt = date_create($hrnd->datepub_article); $dty = today();?>
                        
                        <div class="gm-grid-card" style="width: 100%;">
                            <a href="{{route('visitors.sgactu',['rub'=>$hrnd->slug_prinrub,'slug'=>$hrnd->slug_article,'ip'=>$hrnd->id_article])}}">
                                <img src="{{url('hphx/img/'.$hrnd->image_article)}}" alt="{{$hrnd->title_article}}" class="gm-grid-img">
                            </a>
                            
                            <div class="gm-grid-body">
                                <a href="{{route('visitors.sgactu',['rub'=>$hrnd->slug_prinrub,'slug'=>$hrnd->slug_article,'ip'=>$hrnd->id_article])}}" class="gm-grid-title">
                                    {{Str::limit($hrnd->title_article, 90)}}
                                </a>
                                <p class="gm-side-desc">
                                    {{Str::limit($hrnd->desc_article, 100)}}
                                </p>
                            </div>

                            <div class="gm-card-footer">
                                <a href="{{route('visitors.allactus',['rub' => $hrnd->slug_prinrub])}}">
                                    {{$hrnd->desig_prinrub}}
                                </a>
                                <span class="gm-separator" style="margin: 0 5px;">|</span>
                                <span>@if(!empty($hrnd->datepub_article)){{ phxdtformat($dt) }}@else{{ phxdtformat($dty) }}@endif</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 alert alert-danger text-center border-radius-0" style="margin-top: 20px;">Aucun article n'y existe !</div>
            @endif
        </div>

    </div>
</section>

@stop