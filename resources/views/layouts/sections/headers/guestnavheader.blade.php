<header class="primary" style="position: relative !important; z-index: 999; margin-bottom: 0 !important;">
    <div class="d-sm-none firstbar" style="margin: 0;  padding: 0; padding-top: 10px; padding-bottom: 10px; background-image: url({{url('hphx/img/cacao-banniere-3.jpg')}}) !important; background-size: cover; background-repeat: no-repeat;">
        <div class="container" style="">
            <div class="row m-0 p-0" style="overflow: hidden; max-height: 100px; margin: 0; padding: 0;">
                <div class="col-md-3 col-sm-12" style=" margin: 0; padding: 0;">
                    <div class="brand" style=" margin: 0; padding: 0;">
                        <a href="{{url('/')}}">
                            <img src="{{url('hphx/img/greenmedia mise jour.png')}}" alt="Green Media Africa" style="width: 70%; margin: 0; padding: 0;">
                        </a>
                    </div>                      
                </div>
                <div class="col-md-push-6 col-md-3 col-sm-12 text-right" style=" margin: 0; padding: 0;">
                    <ul class="nav-icons" style=" margin: 0; padding: 0;">
                        <li class="btn btn-danger text-center" style="background-color: #d00; margin: 5px auto;">
                            @php
                                $linkId = null;
                                if($hlastvd[0]->typevideo_id=='2'){
                                    $linkId = $hlastvd[0]->linkyoutube_video;
                                }else{
                                    $linkId = $hlastvd[0]->linkyoutube_video;
                                }
                            @endphp
                            @if($linkId)
                            <a class="vdsplayer" href="{{url('https://www.youtube.com/embed/'.$linkId.'?showinfo=0')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery" style="color: #fff;">
                                <div style="font-weight : bold;">Live Streaming</div>
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start nav  -->
    <nav class="menu" style="position: relative !important; width: 100%;">
        <div class="container">
            <div class="brand">
                <a href="{{url('/')}}">
                    <img src="{{url('hphx/img/greenmedia mise jour.png')}}" alt="Green Media Africa">
                </a>
                @php
                    $linkId = null;
                    if($hlastvd[0]->typevideo_id=='2'){
                        $linkId = $hlastvd[0]->linkyoutube_video;
                    }else{
                        $linkId = $hlastvd[0]->linkyoutube_video;
                    }
                @endphp
                @if($linkId)
                <a class="d-md-none vdsplayer btn btn-danger" href="{{url('https://www.youtube.com/embed/'.$linkId.'?showinfo=0')}}" data-autoplay="true" data-vbtype="video" data-gall="myGallery" style=" color: #fff;">
                    <div style="font-weight : bold;">Live Streaming</div>
                </a>
                @endif
            </div>
            <div class="mobile-toggle">
                <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
            </div>
            <div class="mobile-toggle">
                <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
            </div>
            <div id="menu-list">
                <ul class="nav-list">
                    <li class="dropdown magz-dropdown" style="">
                        <a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage=='home'))?'#':url('/home');?>">Accueil <i class="ion-ios-arrow-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="<?=(isset($hpage)&&($hpage=='home'))?'active':false;?> bg-success"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage=='home'))?'#':url('/');?>"> La Une</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[17]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[17]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[17]->slug_prinrub]);?>">Evènements</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[16]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[16]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[16]->slug_prinrub]);?>">Entretien / Interview</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[18]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[18]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[18]->slug_prinrub]);?>">Foire / Salon</a></li>
                        </ul>
                    </li>
                    <li class="<?=(isset($hpage)&&($hpage==$hrbprins[8]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[8]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[8]->slug_prinrub]);?>">Agriculture</a></li>
                    <li class="<?=(isset($hpage)&&($hpage==$hrbprins[3]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[3]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[3]->slug_prinrub]);?>">Environnement</a></li>
                    <li class="dropdown magz-dropdown" style="">
                        <a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[1]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[1]->slug_prinrub]);?>">Ressources Ani. et Hal. <i class="ion-ios-arrow-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[1]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[1]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[1]->slug_prinrub]);?>">Elévages</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[12]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[12]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[12]->slug_prinrub]);?>">Pêches</a></li>
                        </ul>
                    </li>
                    <li class="dropdown magz-dropdown" style="">
                        <a href="#">Plus <i class="ion-ios-arrow-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[12]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[12]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[12]->slug_prinrub]);?>">Hydraulique</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[9]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[9]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[9]->slug_prinrub]);?>">Eco-Tourisme</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[14]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[14]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[14]->slug_prinrub]);?>">Pétrole et Gaz</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[15]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[15]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[15]->slug_prinrub]);?>">Energie et Mines</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[16]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[16]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[16]->slug_prinrub]);?>">Sécurité Alimentaire</a></li>
                        </ul>
                    </li>
                    
                    <li class="<?=(isset($hpage)&&($hpage=='Green Media Africa - TV'))?'active':false;?> bg-warning-green" ><a href="<?=(isset($hpage)&&($hpage=='Green Media Africa - TV'))?'#':route('visitors.allvideos');?>" class="text-white" style="width: 100%;"><img src="{{url('hphx/img/tv.png')}}" alt="Green Media Africa" style="width: 30px; height: 30px; object-fit: contain;"> TV</a></li>
                    <li class="<?=(isset($hpage)&&($hpage=='Green Media Africa - TV'))? false:false;?>" style="" ><a href="{{url('/2phx-login-greenmedia-2025')}}" target="_blank" class="text-white btn btn-danger btn-xs" style="width: 100%; padding: 0 auto !important;"><i class="ion-locked" style=""></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!---->  

<!-- BANNIÈRE PUBLICITAIRE (Remplace les partenaires) -->
<style>
    /* Comportement par défaut (Pour les téléphones) : On remonte juste un peu */
    .gm-ad-section {
        margin-top: -10px !important;
        margin-bottom: 15px !important;
        position: relative;
        z-index: 10;
        width: 100%;
    }
    
    /* Comportement pour les Tablettes et Ordinateurs : On aspire le grand vide (-60px) */
    @media (min-width: 768px) {
        .gm-ad-section {
            margin-top: -80px !important;
        }
    }
</style>

<section class="m-0 p-0 gm-ad-section">
    <div class="container">
        
        <div style="background-color: #ffffff; border: 1px solid #eeeeee; border-radius: 5px; padding: 20px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.04); display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; box-sizing: border-box; min-height: 150px;">
            
            <div style="font-size: 0.75rem; color: #aaaaaa; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px; font-weight: 600; user-select: none;">
                - Espace Publicitaire -
            </div>
            
            <div style="width: 100%; overflow: hidden;">
                
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-XXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
                <ins class="adsbygoogle"
                     style="display:block; min-width:250px; max-height:280px;"
                     data-ad-client="ca-pub-XXXXXXXXXXXXXXXX"
                     data-ad-slot="XXXXXXXXXX"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                
            </div>

        </div>
    </div>
</section>
<!-- FIN BANNIÈRE PUBLICITAIRE -->

<section class="m-0 p-0" style="padding-bottom: 0;">
    <div class="container-fluid px-0" style="padding: 0 auto !important;">
        <div class="row">
            <div class="col-md-12 ">
                <div class="d-flex position-relative justify-content-between align-items-center breaking-news bg-white mt-2 b-radius-6" style="position: relative;">
                    <marquee class="news-scroll bg-dark b-radius-6 b-white-shadow" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="background-color: #000; line-height: 25px;" >
                        @if(isset($fhs)&&count($fhs)!=0)
                            @foreach($fhs as $f)
                            <a href="{{$f->article_flash}}" style="color: #fff;"> <span class="dot"></span> {{Str::limit($f->desig_flash,200)}}</a>
                            @endforeach
                        @endif
                    </marquee>
                    <div class="position-absolute d-flex flex-row flex-grow-1 flex-fill justify-content-center py-2 text-white px-1 news b-radius-6" style="position: absolute; background: #c00; height: 25px; line-height: 25px; top: 0;"><span class="d-flex align-items-center" style="font-weight: bolder; ">&nbsp;FLASH INFO</span></div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('contents.guests.templates.livestreaming')