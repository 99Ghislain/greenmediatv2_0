<!doctype html>
<html lang="fr" class="theme-light">
    <head>
        {{-- Begin News Template --}}
        <!-- / Tags Google Analytics -->
	    <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-KQY6RQ8D7P"></script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5336231094781905" crossorigin="anonymous"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-KQY6RQ8D7P');
        </script>
	    <!-- // Tags Google Analytics -->
    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="author" content="Phoenix Multimédia & Pro">
		<meta name="keyword" content="Actualité, Buzz, People, Agriculture et News">

        {{-- ========================================================== --}}
        {{-- BLOC OPEN GRAPH UNIQUE ET PROPRE (SANS DOUBLONS)          --}}
        {{-- ========================================================== --}}
        <meta property="og:url" content="{{ url()->current() }}">

        {{-- CAS 1 : SI C'EST UN ARTICLE ($hcart) --}}
        @if(isset($hcart) && count($hcart) > 0)
            <meta property="og:type" content="article">
            <meta property="og:title" content="{{ $hcart[0]->title_article }}">
            <meta property="og:description" content="{{ isset($hcart[0]->desc_article) ? strip_tags(Str::limit($hcart[0]->desc_article, 150)) : 'Lire cet article sur Green Media TV' }}">
            @if(!empty($hcart[0]->image_article))
                <meta property="og:image" content="{{ asset('hphx/img/'.$hcart[0]->image_article) }}">
            @else
                <meta property="og:image" content="{{ asset('assets/img/short-logo-green-media-white.png') }}">
            @endif

        {{-- CAS 2 : SI C'EST UNE VIDÉO ($video) --}}
        @elseif(isset($video))
            <meta property="og:type" content="video.other">
            <meta property="og:title" content="{{ formatTitle($video->title_video) }}">
            <meta property="og:description" content="{{ isset($video->desc_video) ? strip_tags(Str::limit($video->desc_video, 150)) : 'Regardez ce reportage sur Green Media TV.' }}">
            @if(!empty($video->image_video))
                <meta property="og:image" content="{{ asset('hphx/img/' . $video->image_video) }}">
            @else
                <meta property="og:image" content="{{ asset('assets/img/short-logo-green-media-white.png') }}">
            @endif

        {{-- CAS 3 : SI $elmshared EST UTILISÉ --}}
        @elseif(isset($elmshared) && !empty($elmshared))
            <meta property="og:type" content="website">
            <meta property="og:title" content="{{ $elmshared[0] }}">
            <meta property="og:description" content="{{ $elmshared[1] }}">
            <meta property="og:image" content="{{ isset($elmshared[2]) ? url('hphx/img/'.$elmshared[2]) : url('hphx/img/short-logo-green-media-white.png') }}">

        {{-- CAS 4 : PAGE PAR DÉFAUT (Accueil, etc.) --}}
        @else
            <meta property="og:type" content="website">
            <meta property="og:title" content="Green Media Africa">
            <meta property="og:description" content="Green Media Africa - L'actualité et les reportages en Afrique">
            <meta property="og:image" content="{{ asset('assets/img/short-logo-green-media-white.png') }}">
        @endif
        {{-- ========================================================== --}}

        <title><?=(isset($elmshared[0])&&!empty($elmshared[0]))?'Green Media Africa - '.$elmshared[0].' | E-mail(s) : infomondeagricole@gmail.com | Contacts : (+225) 05 75 85 95 43 / 07 07 49 84 25 - ' :' Green Media Africa -  E-mail(s) : infomondeagricole@gmail.com - Contacts : (+225) 05 75 85 95 43 / 07 07 49 84 25';?> </title>
        <link rel="icon" type="image/png" href="{{ url('assets/img/short-logo-green-media-white.png') }}">
        <link rel="canonical" href="https://www.greenmediaafrica.ci">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5336231094781905" crossorigin="anonymous"></script>
        <!-- // Shared Facebook -->
		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{url('assets/scripts/bootstrap/bootstrap.min.css')}}">
		<!-- IonIcons -->
		<link rel="stylesheet" href="{{url('assets/scripts/ionicons/css/ionicons.min.css')}}">
		<!-- Toast -->
		<link rel="stylesheet" href="{{url('assets/scripts/toast/jquery.toast.min.css')}}">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="{{url('assets/scripts/owlcarousel/dist/assets/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{url('assets/scripts/owlcarousel/dist/assets/owl.theme.default.min.css')}}">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{url('assets/scripts/magnific-popup/dist/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{url('assets/scripts/sweetalert/dist/sweetalert.css')}}">
		<link rel="stylesheet" href="{{url('assets/phx-folders/venobox/venobox.min.css')}}">
		<!-- Breaking News -->
		<link rel="stylesheet" href="{{url('assets/css/agri-style.css')}}">
		<!-- Custom style -->
		<link rel="stylesheet" href="{{url('assets/css/style.css')}}">
		<link rel="stylesheet" href="{{url('assets/css/skins/all.css')}}">
		<link rel="stylesheet" href="{{url('assets/css/demo.css')}}">
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<link href="https://fonts.googleapis.com/css2?
			family=Montserrat:wght@400;500;600;700;800&
			family=Poppins:wght@300;400;500;600;700&
			family=Roboto:wght@300;400;500;700&
			family=Merriweather:wght@300;400;700&
			display=swap"
			rel="stylesheet">


		<!-- Wheather -->
		<script id="phx-weatherwidget-io-js" src="{{url('js/weatherwidget.js')}}"></script>
		<!--Newsletter-->
        {{-- <script id="mcjs">!function(c,h,i,m,p){
        m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)
        }(document,"script","https://chimpstatic.com/mcjs-connected/js/users/47fe02d66d030f33a607f6383/75a2297bb4459a49b7d74b180.js");
        </script> --}}
        <!-- End Newsletter poppup-->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        <style>
            /**/
            @font-face {
              font-family: 'ComicSansMSc';
              src: url('fonts/ComicSansMS.woff2') format('woff2'),
                   url('fonts/ComicSansMS.woff') format('woff');
              font-weight: normal;
              font-style: normal;
            }

            @font-face {
    font-family: 'Metropolis';
    src: url('../fonts/Metropolis-Regular.woff') format('woff'),
         url('../fonts/Metropolis-Regular.woff2') format('woff2');
    font-weight: bold;
    font-style: normal;
}
            
            body{
    font-family: 'Roboto', sans-serif !important;
    font-size:16px;
    line-height:1.7;
    color:#222;
}
            
            /**/
            
			body {
				background-image: url({{url('hphx/img/ivoir.png')}}) !important;
				/* background-attachment: fixed; */
			}
			.box-green {
				background-color:rgb(255, 255, 255);
				box-shadow: 1px 1px 5px 1px #92929292;
				overflow: hidden;
			}
			.news {
                width: auto !important;       /* S'adapte à la taille du texte plutôt que de s'étirer */
                min-width: 110px;             /* Garde une largeur minimum propre */
                flex: none !important;        /* Annule le flex-grow et flex-fill du HTML */
                left: 0;                      /* Fixe le bloc complètement à gauche */
                z-index: 10;                  /* Le place au-dessus du texte qui défile */
                line-height: 20px;
            }
			/* .news-scroll{width: 90%} */
			.news-scroll a{text-decoration: none}
			.dot{height: 6px;width: 6px;margin-left: 3px; margin-right: 3px;
				/* margin-top: 2px !important;background-color: rgb(207,23,23); */
				border-radius: 50%;display: inline-block}
			h1{
				text-transform: uppercase;
				font-size: 12.5px !important;
			}
			h1 > a {
				font-size: 11.5px !important;
			}

			.h-title-slide {
				font-size: 2.5em !important;
				line-height: 1.1em !important;
				text-shadow: 2px 2px 2px rgba(0,0,0,.5);
			}

			.mt-0 {
				margin-top: 0;
			}
			.phx-float-right {
				float: right;
			}
			.all-articles {
				float: right;
				font-size: 14px;
			}
			.title-world {
				margin-left: 20px;
			}
			.child-tw {
				margin-top: 10px;
			}
			.sidebar-content {
				padding: 10px;
				border: 1px solid #f2f2f2;
			}
			.article-mini {
				border-bottom: 1px solid #f2f2f2;
			}
			.phx-top {
				position: relative;
				padding-top: 10px;
				padding-bottom: 10px;
				width: 100%;
				background-color: #FFFFFF;
				/* font-weight: bolder; */
			}
			.phx-top a {
				text-decoration: none;
			}
			.bg-white {
				background-color: #fff !important;
			}
            
			.phx-s-nav {
				background: #64b802;
				background-image: url({{url('hphx/img/short-logo-green-media-transparent.png')}}) !important;
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-position: center, bottom;
			}
			.phx-s-nav-center {
				background: rgb(37,46,56);
			}
			.phx-s-nav-top {
				background: rgb(255,255,255);
				color: #000 !important;
			}
			section.first {
				padding-top: 10px;
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
			}

			.icon-nav-left, .icon-nav-right {
				display: block;
				/* opacity : .3; */
				line-height: 38px;
				width: 35px;
				height: 35px;
				/* border: 2px solid #ddd; */
				color: #fff;
				background: #64b802;
				text-align: center;
				float: left;
				cursor: pointer;
				transition: all 0.5s;
				-webkit-transition: all 0.5s;

			}
			.icon-nav-left:hover, .icon-nav-right:hover {
				background-color: #252e38;
			}
			.slide-phx {
				position: relative;
			}
			.icon-nav-left, .icon-nav-right {
				position: absolute;
				bottom: 15rem;
			}
			.icon-nav-left {
				left: 1rem;
			}
			.icon-nav-right {
				right: 1rem;
			}
			.slide-phx .icon-nav-left, .slide-phx.icon-nav-right {
				opacity : 1;
				/* transition: all 0.5s;
				-webkit-transition: all 0.5s; */
			}
			.slide-phx:hover .icon-nav-left, .slide-phx:hover .icon-nav-right {
				opacity : 1;
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
			}

			@media (max-width: 900px){
				.h-title-slide {
					font-size: 1em !important;
				}
				.icon-nav-left, .icon-nav-right {
					bottom: 15rem;
				}
			}

			.owl-theme .owl-nav [class*=owl-] {
				color: #64b802;
				font-size: 14px;
				margin: 5px;
				padding: 4px 7px;
				background: transparent;
				display: inline-block;
				cursor: pointer;
				border-radius: 3px;
			}
			.text-color-1 {
				/* color: #264603; */
				color: #d00;
			}
			.owl-theme .owl-nav [class*=owl-]:hover {
				background: transparent;
			}
			.h-social {
				width: 25px !important;
				height: 25px !important;
				line-height: 25px !important;
				font-size: xx-small;
			}
			.banner:after {
				content: ' ';
				font-size: 12px;
				color: #999;
				letter-spacing: .5px;
				margin: 0 auto;
			}
			.banner:before {
				content: '- Publicité -';
				font-size: 12px;
				color: #999;
				letter-spacing: .5px;
				margin: 0 auto;
			}
			.dpub-sidebar{
				width: 100% !important;
				min-height: 300px !important;
			}
			.dpub-under{
				width: 100% !important;
				min-height: 160px !important;
			}
			.line-h1 > a {
				line-height: .2rem !important;
			}
			.bg-danger-ainfo {
				background-color: #fff;
			}
			.bg-video {
				background: #64b802;
				color: #fff !important;
			}
			.h1-video {
				background: #64b802 !important;
				color: #fff !important;
				/* font-size: 16px; */
			}
			.article-vds {
				margin: 0 6px;
				border: 1px solid transparent;
				overflow: hidden !important;
			}
			.content-vds {
				position: relative;
				background-image: url('hphx/img/short-logo-green-media-transparent.png');
				background-position: center center;
				background-size: cover;
			}
			.content-vds .aimg-vds {
				position: absolute;
				left: 40%;
				bottom: 100px;
			}
			.article-vds .content-vds .title-vds {
				position: absolute;
				width: 100%;
				padding: 10px;
				bottom: 0;
				opacity: .7;
			}
			.article h2 {
				text-transform: none;
				font-size: 20px;
				margin: 0;
				line-height: 28px;
				margin-bottom: 10px;
			}
			figure img {
				height: 100% !important;
			}
			.article-vds .img-vds {
				background-color: rgba(0,0,0,.2);
				min-width: 350px !important;
				min-height: 300px !important;
				margin: 0 auto;
				overflow: hidden !important;
			}
			.article-vds:hover .content-vds .title-vds {
				z-index: 10;
				opacity: 1;
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
			}
			.article-vds:hover .img-vds {
				background-color: rgba(0,0,0,0);
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
			}
			/* Main VDS */
			.m-article-vds {
				/* margin: 0 6px;  */
				border: 1px solid transparent;
				overflow: hidden !important;
			}
			.m-content-vds {
				position: relative;
				background-image: url('hphx/img/short-logo-green-media-transparent.png');
				background-position: center center;
				background-size: cover;
			}
			.m-content-vds .aimg-vds {
				position: absolute;
				left: 35%;
				bottom: 50px;
			}
			.m-article-vds .m-content-vds .m-title-vds {
				display: none;
				position: absolute;
				width: 100%;
				padding: 10px 20px;
				bottom: 0;
				opacity: .7;
			}
			.m-article-vds .img-vds {
				background-color: rgba(0,0,0,.2);
				margin: 0 auto;
				overflow: hidden !important;
			}
            
			
			.acategory {
				background: rgb(255, 165, 0) !important;
				color: #fff !important;
				padding: 1px 2px;
				display: inline-block;
				text-decoration: none !important;
				border-radius: 0 6px 6px 0 !important;
			}
			.bg-category {
				background: rgba(37,46,56,1);
				color: #fff !important;
			}
			.acategory-two {
				background: rgba(255,255,255,7) !important;
				/* background: rgba(55,157,105,1) !important; */
				color: rgba(37,46,56,1) !important;
				padding: 1px 2px;
				display: inline-block;
				text-decoration: none !important;
				border-radius: 0 6px 6px 0 !important;
				border-bottom: 2px solid #ffa500;
			}

			/* .featured .details .category a {
				padding: 3px 0px;
			} */
			h2 a {
				font-size: 14px;
				/* text-transform: lowercase; */
			}
			.m-article-vds:hover .m-content-vds .m-title-vds {
				z-index: 10;
				font-size: 12px !important;
				opacity: 1;
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
			}
			.m-article-vds:hover .img-vds {
				background-color: rgba(0,0,0,0);
				transition: all 0.5s;
				-webkit-transition: all 0.5s;
			}
			.m-icon-sizee{
				width: 70px;
			}
			/* Main VDS */
			.icon-sizee{
				width: 120px;
			}
			.text-white {
				color: #fff !important;
			}
			.border-radius-0 {
				border-radius: 0;
			}
			.alink {
				color: #64b802 !important;
				font-weight: bolder;
			}
			.title-hd-vds {
				background: #64b802;
				color: #fff;
				font-weight: bolder;
			}
			.btn-link {
				background-color: #fff;
				font-weight: bold;
				text-decoration: none !important;
				color: rgba(100, 184, 2,.6) !important;
				border: 1px solid rgba(100, 184, 2,.4);
			}
			.btn-link:hover, .btn-link:focus{
				background-color: #fff;
				font-weight: bold;
				text-decoration: none !important;
				color: rgba(100, 184, 2,.9);
				border: 1px solid rgba(100, 184, 2,.6);
				transition: 0.1s;
			}
			.abg-dark {
				/* background-color: #252e38; */
				background: rgba(23, 43, 1,.95);
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-position: center, bottom;
			}
			.bg-green {
				background: #64b802;
			}
			.text-normal-case {
				text-transform: normal !important;
			}
			.mt-40- {
				margin-top: -40px !important;
			}
			.line {
				display: inline-block;
				width: 100%;
				height: 4px;
				background-color: #64b802;
				margin: 30px 0;
				position: relative;
			}
			
			p > a, p > a:hover, p > a:focus{
				text-decoration: none !important;
				color: #000;
			}
			
			/* Iframe Responsive */
			.bk-iframe {
				position: relative;
				overflow: hidden;
				width: 100%;
				padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
			}
			/* Then style the iframe to fit in the container div with full height and width */
			.rs-iframe {
				position: absolute;
				top: 0;
				left: 0;
				bottom: 0;
				right: 0;
				width: 100%;
				height: 100%;
			}
			.link-top {
				color: #FFF !important;
			}
			.bg-pub-other {
			    background: #64b802;
			    border: 1px solid #ccc;
			    padding: 2px 0;
			}
			.b-red {
				border: 1px solid #d32526 !important;
			}
			.breadcrumb li {
				font-size: 15px !important;
			}
			.text-red {
				color: #d32526 !important;
			}

			.day-post {
				float: right;
				padding-top: 10px;
				text-decoration: none !important;
			}

			.h-active {
				background-color: #000 !important;
				color: #fff!important;
			}

			.bolder {
				font-weight: bolder;
			}

			.border-left-red {
				border-left: 2px solid #b03925;
			}

			.border-b-red {
				border-bottom: 2px solid transparent;
			}

			/* Iframe Responsive End */
			.ads-mooved {
				animation-name: animads;
				animation-duration: 1s;
				animation-iteration-count: infinite;
				animation-direction: alternate;
				animation-timing-function: linear;
				}

				/* The animation code */
				@keyframes animads {
				0%   {opacity: 1;}
				25%  {opacity: 1;}
				50%  {opacity: 1;}
				75%  {opacity: 0.4;}
			}

           /* Texte général */
body,
.skin-orange p,
.skin-orange span,
.skin-orange li,
.skin-orange div {
    font-family: 'Roboto', sans-serif !important;
}

/* Menus principaux */
.skin-orange .menu ul > li > a {
    font-family: 'Montserrat', sans-serif !important;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Liens généraux */
.skin-orange a {
    color: #0b1303;
    font-family: 'Roboto', sans-serif !important;
    font-weight: 500;
}

/* Sous-titres */
.sub-title-2,
.top-title,
.top-title-3,
.acategory,
.acategory-two {
    font-family: 'Poppins', sans-serif !important;
    font-weight: 600;
}

/* Titres importants */
.top-title-2,
.title-police,
h1,
h2,
h3,
h4 {
    font-family: 'Montserrat', sans-serif !important;
    font-weight: 700;
}

/* Articles */
.article p,
.article-content,
.b-content-1,
.content-1 p {
    font-family: 'Merriweather', serif !important;
    font-size: 18px;
    line-height: 1.8;
}
            .skin-orange .content-1 p,
            .skin-orange .content-1 div {
                font-size: 22px !important;
            }
			
            .skin-orange .menu ul > li > a:after {
                background-color: #64b802;
            }

            .skin-orange a:hover, .skin-orange a:focus {
                color: #64b802;
            }
            
            
            .b-radius-6 {
				/* font-family: 'Comic Sans MS' !important;
				font-weight: bold;
				font-style: normal; */
                border-radius: 6px !important;
            }

			.category {
				margin-right: 0 !important;
				right: 0;
				float: left !important;
			}

			.top-title-2 {
				font-size: 150%; 
				font-weight:bold; 
				border-radius: 6px 0;
			}
			.top-title-3 {
				font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
				font-weight: bold;
				font-style: normal;
				font-size: 150%; 
				font-weight:bold; 
				border-radius: 6px 0;
			}
			.skin-orange footer.footer {
				border-top: 5px solid transparent;
			}
			.title-police, .top-title-2, .top-title-3, .acategory-two  {
				font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif;
				font-style: normal;
			}
			.dpub-under {
				width: 100% !important;
				height: auto !important;
			}
			.menu .brand {
				display: none;
				float: left;
				width: 100px;
				height: auto;
				line-height: 52px;
				/* background:rgba(100, 184, 2,.4); */
				/* padding: 0;
				margin: 0; */
			}
			.menu .brand img {
				width: 100%;
				/* margin: 0; */
			}
			/* Extra small devices (phones, less than 768px) */
			/* No media query since this is the default in Bootstrap */

			/* Small devices (tablets, 768px and up) */
			@media (max-width: 768px) { 
				.menu .brand {
					display: block !important;
					float: left;
					width: 100px;
					height: auto;
					line-height: 52px;
					/* background:rgba(100, 184, 2,.4); */
					/* padding: 0;
					margin: 0; */
				}
				.firstbar .brand {
					display: none;
					/* float: left;
					margin: 20px 0; */
				}
			}
			 /* .top-title {
				font-size: 175% !important;
				font-weight: bold !important;
				text-underline-position: none;
				color: #1b3102 !important;
			} */
			.inner a {
				font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
				font-weight: bold;
				font-size: 10px !important;
				line-height: auto;
			}
	
			.sub-title-2 {
				font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
				font-weight: bold;
				font-size: 12px !important;
				line-height: auto;
			}
			.top-title {
                font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
                font-weight: bold;
                font-size: 120% !important;
                color: #1b3102 !important;
                text-underline-position:  none;
            }

			.b-content-1 {
				font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
				font-weight: normal;
				font-size: 17px !important;
				/* line-height: auto; */
			 }

			article a, .featured p {
				font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
				font-weight: 100;
				font-size: 12px;
				/* line-height: auto */
			}
			 
			.font-content-1 {
				font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
				font-weight: normal !important;
				font-size: 10px !important;
				text-transform: none !important;
			}
			.bg-warning-green {
				background: rgb(255, 165, 0) !important;
				color: #fff !important;
			}
			.acategory {
				border-radius: 0 6px 6px 0;
			}
			.b-white-shadow {
				background-color:rgb(255, 255, 255);
				box-shadow: 1px 1px 5px 1px #92929292 !important;
			}

			.btn {
				box-shadow: 1px 1px 5px 1px #92929292 !important;
			}
			.size-img-sb {
				height: 130px ;
				overflow:hidden;
			}
			.w-100 {
				border-radius: 6px !important;
			}
			.menu ul > li .dropdown-menu > li:hover > a {
				background-color: #000;
				width: 230px;
				position: relative;
				overflow: hidden;
				transition: all .3s;
				-moz-transition: all .3s;
				-webkit-transition: all .3s;
				-o-transition: all .3s;
				padding: 7px 20px;
			}
			/* .skin-orange a {
				color: rgb(255, 165, 0);
			} */
			/* .skin-orange .menu ul > li > a {
				background-color: rgb(255, 165, 0);
				color: #fff;
			} */
			.skin-orange .menu ul > li .dropdown-menu > li.active a {
				background-color: rgb(255, 165, 0)
			}
			.skin-orange .menu ul > li .dropdown-menu > li.active a:after {
				background-color: rgb(255, 165, 0)
			}

/* ===========================
    A LA UNE
=========================== */

.home-title{

    font-family:'Montserrat',sans-serif;

    font-size:34px;

    font-weight:800;

    color:#1B3102;

    border-left:6px solid #FFA500;

    padding-left:15px;

    margin-bottom:25px;

}

.hero-card{

    background:#fff;

    border:1px solid #ECECEC;

    overflow:hidden;

    transition:.3s;

}

.hero-card:hover{

    box-shadow:0 10px 30px rgba(0,0,0,.08);

}

.hero-image{

    position:relative;

    overflow:hidden;

}

.hero-image img{

    width:100%;

    height:420px;

    object-fit:cover;

    transition:.4s;

}

.hero-card:hover .hero-image img{

    transform:scale(1.04);

}

.hero-category{

    position:absolute;

    top:20px;

    left:20px;

    background:#FFA500;

    color:white;

    padding:8px 18px;

    border-radius:30px;

    font-family:'Poppins';

    font-size:13px;

    font-weight:700;

}

.hero-meta{

    font-family:'Roboto';

    color:#777;

    font-size:14px;

    margin-top:20px;

}

.hero-title a{

    font-family:'Montserrat';

    font-size:38px;

    line-height:1.2;

    font-weight:800;

    color:#222;

    text-decoration:none;

}

.hero-title a:hover{

    color:#64B802;

}

.hero-desc{

    font-family:'Merriweather';

    font-size:18px;

    color:#555;

    line-height:1.8;

}

/* ===== petits articles ===== */

.side-card{

    display:flex;

    gap:18px;

    padding:15px;

    margin-bottom:20px;

    border:1px solid #ECECEC;

    background:#fff;

    transition:.3s;

}

.side-card:hover{

    box-shadow:0 5px 20px rgba(0,0,0,.08);

}

.side-card img{

    width:160px;

    height:110px;

    object-fit:cover;

}

.side-content{

    flex:1;

}

.side-meta{

    font-family:'Roboto';

    font-size:13px;

    color:#777;

}

.side-title a{

    font-family:'Poppins';

    font-size:20px;

    font-weight:700;

    color:#222;

    text-decoration:none;

}

.side-title a:hover{

    color:#64B802;

}

.side-desc{

    font-family:'Merriweather';

    font-size:15px;

    color:#666;

}

/* VARIABLES DE COULEURS GREEN MEDIA */
    :root {
        --gm-dark-green: #127319; /* Vert profond des blocs */
        --gm-light-green: #58b918; /* Vert clair des badges */
        --gm-orange: #f59f00; /* Orange des séparateurs */
    }

    .gm-news-section {
        margin-top: 20px;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    /* --- CARTE PRINCIPALE (GAUCHE) --- */
    .gm-main-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        display: flex;
        flex-direction: column;
        height: 100%;
        background-color: #127319;
    }
    .gm-main-img-wrap {
        width: 100%;
        height: 400px; /* Hauteur importante pour la Une */
        overflow: hidden;
    }
    .gm-main-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .gm-main-card:hover .gm-main-img-wrap img {
        transform: scale(1.03);
    }
    .gm-main-content {
        padding: 25px;
        color: rgb(14, 13, 13);
    }
    .gm-badge {
        background-color: #ffa000 !important;
        color: #ffffff !important;
        padding: 4px 12px;
        font-weight: 800;
        font-size: 0.85rem;
        text-transform: uppercase;
        border-radius: 3px;
        display: inline-block;
    }
    .gm-separator {
        color: var(--gm-orange);
        font-weight: bold;
        margin: 0 10px;
    }
    .gm-main-title {
        color: #ffffff !important;
        font-weight: 900;
        font-size: 2.7rem;
        text-transform: uppercase;
        line-height: 1.1;
        margin: 15px 0;
        text-decoration: none;
        display: block;
    }
    .gm-main-title:hover {
        color: #e0e0e0 !important;
    }
    .gm-main-desc {
        color: #ffffff !important;
        font-size: 1.6rem;
        opacity: 0.95;
        margin-bottom: 0;
        line-height: 1.5;
    }

    /* --- CARTES SECONDAIRES (DROITE) --- */
    .gm-side-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(78, 78, 78, 0.1);
        background: white;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }
    .gm-side-card:last-child {
        margin-bottom: 0;
    }
    .gm-side-body {
        display: flex;
        padding: 15px;
        gap: 15px;
        text-decoration: none;
    }
    .gm-side-body:hover {
        background-color: #fcfcfc;
    }
    .gm-side-img {
        width: 140px;
        height: 125px;
        object-fit: cover;
        border-radius: 4px;
        flex-shrink: 0;
    }
    .gm-side-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .gm-side-title {
        color: #000 !important;
        font-weight: 800;
        font-size: 1.8rem;
        line-height: 1.3;
        margin-bottom: 8px;
        text-decoration: none;
    }
    .gm-side-desc {
        color: #444;
        font-size: 1.6rem;
        line-height: 1.4;
        margin-bottom: 0;
    }
    .gm-card-footer {
        background-color: #f5f5f5;
        color: white;
        padding: 10px 15px;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        text-transform: uppercase;
    }
    .gm-card-footer a {
        color: white;
        text-decoration: none;
    }
    .gm-card-footer a:hover {
        color: #f5f5f5;
    }
    .gm-icon-eye {
        font-size: 1.1rem;
        vertical-align: text-bottom;
        margin-right: 4px;
    }

  /* --- GRILLE ARTICLES RECENTS (CORRIGÉE) --- */
    .gm-grid-col {
        display: flex;
        align-items: stretch; /* Force toutes les cartes de la ligne à avoir la même hauteur exacte */
        margin-bottom: 40px; /* Crée un grand espace (aération) entre les lignes d'articles du haut et du bas */
    }
    .gm-grid-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        background: white;
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .gm-grid-img {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }
    .gm-grid-body {
        padding: 15px;
        flex-grow: 1; /* Permet à cette zone de s'étirer au maximum... */
        display: flex;
        flex-direction: column;
    }
    .gm-grid-title {
        color: #000 !important;
        font-weight: 800;
        font-size: 2rem;
        line-height: 1.3;
        margin-bottom: 8px;
        text-decoration: none;
        display: block;
    }
    .gm-grid-title:hover { text-decoration: underline; }
    
    /* On cible spécifiquement le footer des grilles pour le coller en bas */
    .gm-grid-card .gm-card-footer {
        margin-top: auto; /* ...pour forcer le footer vert à rester collé tout en bas ! */
        padding: 8px 12px; 
        font-size: 0.75rem;
    }

/* --- TITRES DE SECTION : GRAND BADGE CARRÉ ANIMÉ --- */
    .gm-badge-wrapper {
        display: flex;
        align-items: center;
        margin-bottom: 35px; 
        margin-top: 20px;
    }

    /* La ligne de fuite élégante */
    .gm-badge-wrapper::after {
        content: '';
        flex-grow: 1;
        height: 3px; 
        background-color: #e4e4e4;
        margin-left: 20px;
        border-radius: 2px;
    }

    /* Le Grand Badge Premium (Forme Carrée/Rectangulaire) */
    .gm-square-badge {
        display: inline-flex;
        align-items: center;
        background-color: #ffffff; 
        color: #111111 !important; 
        font-size: 1.4rem; 
        font-weight: 900;
        text-transform: uppercase;
        padding: 12px 25px;
        border-radius: 2px; /* Angles presque totalement droits (carrés) pour le style News */
        border: 3px solid #f59f00; /* Contour orange conservé */
        border-left: 10px solid #f59f00; /* Bordure gauche très épaisse : l'astuce TV ! */
        box-shadow: 0 4px 15px rgba(245, 159, 0, 0.12); 
        letter-spacing: 1px;
        margin: 0;
    }

    /* L'icône animée (Le point TV qui clignote) */
    .gm-animated-dot {
        width: 14px; 
        height: 14px; 
        background-color: #e53935; 
        border-radius: 50%;
        margin-right: 15px;
        position: relative;
    }

    /* L'onde de l'animation */
    .gm-animated-dot::after {
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border-radius: 50%;
        border: 2px solid #e53935;
        animation: gm-pulse-alert 1.5s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
    }

    /* L'animation CSS */
    @keyframes gm-pulse-alert {
        0% { transform: scale(0.6); opacity: 1; }
        100% { transform: scale(1.6); opacity: 0; }
    }

	/* --- L'icône animée incrustée dans le texte --- */
    .gm-animated-dot {
        display: inline-block; /* Très important : permet au point de s'aligner avec le texte */
        vertical-align: middle; /* Aligne le point avec le milieu de la police d'écriture */
        width: 12px; 
        height: 12px; 
        background-color: #e53935; /* Rouge alerte */
        border-radius: 50%;
        margin-right: 5px; /* Espace entre le point et la lettre 'A' */
        margin-bottom: 3px; /* Petit ajustement optique de la hauteur */
        position: relative;
    }

    /* L'onde rouge de l'animation */
    .gm-animated-dot::after {
        content: '';
        position: absolute;
        top: -4px;
        left: -4px;
        right: -4px;
        bottom: -4px;
        border-radius: 50%;
        border: 2px solid #e53935;
        animation: gm-pulse-alert 1.5s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
    }

    /* L'animation de clignotement */
    @keyframes gm-pulse-alert {
        0% { transform: scale(0.6); opacity: 1; }
        100% { transform: scale(1.6); opacity: 0; }
    }

	/* --- BADGE DE CATÉGORIE ORANGE DANS LE PIED DE CARTE --- */
    .gm-card-footer a {
        background-color: #ffa000 !important; 
        color: #ffff !important; 
        padding: 4px 10px; 
        border-radius: 3px; 
        text-decoration: none !important; /* Ceci supprime le trait noir sous HYDRAULIQUE */
        display: inline-block;
        font-weight: 800;
    }

    /* Couleur verte temps de lecture */
    .gm-card-footer a.reading-time {
    background-color: #198754  !important; 
    color: #ffff !important;
    padding: 4px 10px; 
    border-radius: 3px; 
    text-decoration: none !important; 
    display: inline-block;
    font-weight: 800;
        }

    /* Maintient la couleur verte même au survol */
    .gm-card-footer a.reading-time:hover {
    color: #198754 !important;
    background-color: transparent !important; /* Supprime le fond orange uniquement pour ce bloc */
    }    

    /* Changement de couleur au survol de la souris */
    .gm-card-footer a:hover {
        background-color: #e69000 !important; 
        color: #ffffff !important;
    }

/* --- AFFICHAGE DES TITRES TEL QUE DANS LA BASE DE DONNÉES --- */
.gm-main-title,
.gm-side-title,
.gm-grid-title,
.gm-article-title,
.hero-title a,
.side-title a,
.article-vds .title-vds,
.gm-tv-hero-title,
.gm-tv-card-title,
h2 a {
    text-transform: none !important; /* Désactive toutes les modifications automatiques de casse */
}
		
/* --- RETIRER LE GRAS SUR TOUS LES TITRES --- */
/* .gm-main-title,
.gm-side-title,
.gm-grid-title,
.gm-article-title,
.hero-title a,
.side-title a,
.article-vds .title-vds,
.gm-tv-hero-title,
.gm-tv-card-title,
h1, h2, h3, h4,
h2 a {
    font-weight: normal !important;
} */

/* --- POLICE METROPOLIS, SANS GRAS ET SANS MAJUSCULES POUR LES TITRES D'ARTICLES --- */
.gm-main-title,
.gm-side-title,
.gm-grid-title,
.gm-article-title {
    font-family: 'Metropolis', sans-serif !important;
    text-transform: none !important;
    font-weight: 800 !important; /* Cette ligne force le texte en gras */
}

    /* =========================================
       STYLES PREMIUM GREEN MEDIA (GLOBAL)
       ========================================= */

    /* --- CARTES ET GRILLES FLEXBOX --- */
    .gm-grid-card {
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }
    .gm-grid-img {
        width: 100%;
        height: 200px; /* Force l'image à avoir de belles proportions */
        object-fit: cover; /* Empêche l'image de s'écraser */
    }
    .gm-grid-body {
        padding: 15px;
        flex-grow: 1; /* Pousse toujours la barre verte vers le bas */
    }
    .gm-side-desc {
        color: #555;
        font-size: 1.4rem;
        line-height: 1.5;
        margin-bottom: 0;
    }
    
    /* --- PIED DE CARTE (FOOTER VERT) --- */
    .gm-card-footer {
        background-color: #f5f5f5; /* blanc Green Media */
        padding: 10px 15px;
        color: #030202;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        margin-top: auto; 
    }
    .gm-card-footer a {
        background-color: #ffa000 !important; /* Badge Orange */
        color: #ffffff !important;
        padding: 4px 10px;
        border-radius: 3px;
        text-decoration: none !important;
        font-weight: 800;
        display: inline-block;
    }
    .gm-card-footer a:hover {
        background-color: #e69000 !important;
    }

    /* --- BADGES ET POINT CLIGNOTANT --- */
    .gm-badge {
        background-color: #ffa000 !important;
        color: #ffffff !important;
        padding: 4px 12px;
        border-radius: 3px;
        text-decoration: none !important;
        font-weight: 800;
        display: inline-block;
    }
    .gm-animated-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #ff0000;
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 5px;
        animation: pulse-live 1.5s infinite;
    }
    @keyframes pulse-live {
        0% { box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(255, 0, 0, 0); }
        100% { box-shadow: 0 0 0 0 rgba(255, 0, 0, 0); }
    }

  


   body {
        background-color: #0b0f19 !important; /* Fond ultra-sombre style cinéma */
        color: #ffffff;
    }
    
    .breadcrumb li a {
        color: #58b918 !important;
    }
    .breadcrumb .active {
        color: #ffffff !important;
    }

    /* --- SECTION DU LECTEUR PRINCIPAL (HERO) --- */
    .gm-tv-main-section {
        background: linear-gradient(180deg, #111827 0%, #0b0f19 100%);
        padding: 40px 0;
        border-bottom: 1px solid #1f2937;
    }

    .gm-tv-hero-card {
        background: #111827;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.7);
        border: 1px solid #1f2937;
    }

    .gm-tv-player-container {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* Ratio 16:9 Cinéma parfait */
        background-color: #000;
    }

    .gm-tv-player-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Grand bouton Play central */
    .gm-tv-central-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90px;
        height: 90px;
        background-color: #ff0000; /* Rouge vif TV */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 30px rgba(255, 0, 0, 0.6);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 5;
    }

    .gm-tv-player-container:hover .gm-tv-central-play {
        transform: translate(-50%, -50%) scale(1.12);
        background-color: #cc0000;
        box-shadow: 0 0 40px rgba(255, 0, 0, 0.8);
    }

    .gm-tv-central-play i {
        color: #ffffff;
        font-size: 40px;
        margin-left: 6px; /* Ajustement géométrique pour le triangle */
    }

    .gm-tv-hero-details {
        padding: 30px;
    }

    /* Le badge exclusif LIVE clignotant */
    .gm-tv-live-tag {
        display: inline-flex;
        align-items: center;
        background-color: rgba(239, 68, 68, 0.2);
        border: 1px solid #ef4444;
        color: #fca5a5;
        padding: 6px 16px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .gm-tv-live-pulse {
        width: 10px;
        height: 10px;
        background-color: #ef4444;
        border-radius: 50%;
        margin-right: 10px;
        box-shadow: 0 0 10px #ef4444;
        animation: tv-pulse 1.6s infinite;
    }

    @keyframes tv-pulse {
        0% { transform: scale(0.8); opacity: 1; }
        50% { transform: scale(1.3); opacity: 0.5; }
        100% { transform: scale(0.8); opacity: 1; }
    }

    .gm-tv-hero-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #ffffff !important;
        margin: 20px 0 10px 0;
        line-height: 1.3;
        text-decoration: none;
        display: block;
    }
    
    .gm-tv-hero-title:hover {
        color: #58b918 !important;
    }

    /* --- SECTION DE LA GRILLE DES REPLAYS --- */
    .gm-tv-grid-section {
        padding: 60px 0;
    }

    .gm-tv-section-heading {
        font-size: 1.6rem;
        font-weight: 800;
        color: #ffffff;
        border-left: 6px solid #58b918;
        padding-left: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .gm-tv-card {
        background: #111827;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #1f2937;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: all 0.3s ease;
    }

    .gm-tv-card:hover {
        transform: translateY(-6px);
        border-color: #374151;
        box-shadow: 0 15px 30px rgba(0,0,0,0.4);
    }

    .gm-tv-thumb-wrap {
        position: relative;
        width: 100%;
        height: 190px;
        overflow: hidden;
        background-color: #000;
    }

    .gm-tv-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .gm-tv-card:hover .gm-tv-thumb-wrap img {
        transform: scale(1.05);
    }

    .gm-tv-small-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 54px;
        height: 54px;
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #ffffff;
        transition: all 0.3s ease;
    }

    .gm-tv-card:hover .gm-tv-small-play {
        background-color: #ff0000;
        border-color: #ff0000;
    }

    .gm-tv-small-play i {
        color: #ffffff;
        font-size: 22px;
        margin-left: 3px;
    }

    .gm-tv-card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .gm-tv-card-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #ffffff !important;
        line-height: 1.4;
        text-decoration: none;
        display: block;
        margin-bottom: 15px;
    }

    .gm-tv-card-title:hover {
        color: #58b918 !important;
    }

    .gm-tv-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.85rem;
        color: #9ca3af;
        border-top: 1px solid #1f2937;
        padding-top: 15px;
    }

    .gm-tv-mini-tag {
        background-color: #ff0000;
        color: #ffffff !important;
        padding: 2px 10px;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        border-radius: 4px;
    }

	/* CSS spécifiques pour incruster les boutons "Play" sur vos images de grilles standards */
    .gm-tv-player-wrapper {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* Ratio 16:9 parfait pour la vidéo à la une */
        background-color: #000;
        border-radius: 8px 8px 0 0;
        overflow: hidden;
    }
    .gm-tv-player-wrapper img {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;
    }
    .gm-tv-play-btn {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        width: 80px; height: 80px; background-color: rgba(229, 57, 53, 0.9);
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        box-shadow: 0 0 20px rgba(229, 57, 53, 0.6); transition: transform 0.3s ease; z-index: 10;
    }
    .gm-tv-player-wrapper:hover .gm-tv-play-btn { transform: translate(-50%, -50%) scale(1.1); }
    .gm-tv-play-btn i { color: white; font-size: 35px; margin-left: 5px; }

    /* Pour les petites cartes de la grille */
    .gm-video-thumb { position: relative; width: 100%; height: 160px; overflow: hidden; }
    .gm-video-thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease; }
    .gm-grid-card:hover .gm-video-thumb img { transform: scale(1.05); }
    
    .gm-video-play-small {
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        width: 50px; height: 50px; background-color: rgba(0,0,0,0.6); border-radius: 50%;
        display: flex; align-items: center; justify-content: center; border: 2px solid white; transition: all 0.3s ease;
    }
    .gm-grid-card:hover .gm-video-play-small { background-color: rgba(229, 57, 53, 0.9); border-color: rgba(229, 57, 53, 0.9); }
    .gm-video-play-small i { color: white; font-size: 24px; margin-left: 3px; }

/* ==========================================================================
   REFONTE ARTICLE - GREEN MEDIA AFRICA
   ========================================================================== */

/* Carte de l'article */
.gm-article {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    padding: 25px;
    margin-bottom: 30px;
}

/* En-tête & Titre */
.gm-article-header {
    margin-bottom: 20px;
}

.gm-article-title {
    font-size: clamp(22px, 4vw, 34px);
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1.3;
    color: #111111;
    margin: 0 0 15px 0;
}

/* Barre de métadonnées */
.gm-article-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    background-color: #f8f9fa;
    border-top: 4px solid #127319;
    border-bottom: 1px solid #eeeeee;
    padding: 10px 15px;
    color: #333333;
    font-size: clamp(0.8rem, 2vw, 0.95rem);
    font-weight: 600;
}

.gm-meta-item {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.gm-meta-item i {
    color: #127319;
}

/* Séparateur vertical */
.gm-meta-divider {
    height: 18px;
    width: 2px;
    background-color: #ffa000;
    border-radius: 1px;
}

/* Badge Rubrique */
.gm-meta-badge {
    background-color: #127319;
    color: #ffffff;
    padding: 3px 8px;
    border-radius: 4px;
    text-transform: uppercase;
    font-weight: 700;
    font-size: clamp(0.75rem, 1.8vw, 0.85rem);
}

/* Image principale (Pleine largeur sous le titre) */
.gm-photo {
    width: 100%;
    margin-top: 20px;
    margin-bottom: 25px;
    border-radius: 8px;
    overflow: hidden;
}

.gm-photo img {
    width: 100%;
    height: auto;
    max-height: 520px;
    display: block;
    object-fit: cover;
    border-radius: 8px 8px 0 0;
}

/* Légende sous la photo */
.gm-caption {
    background-color: #f8f9fa;
    color: #3f3c3c;
    padding: 8px 12px;
    text-align: center;
    font-size: clamp(0.7rem, 1.5vw, 0.85rem);
    font-weight: 400;
    line-height: 1.35;
    border-bottom: 1px solid #eee;
    border-radius: 0 0 8px 8px;
}

/* Boîte du Chapeau (Description) */
.gm-intro-box {
    font-size: clamp(13px, 2.5vw, 15px);
    font-weight: 700;
    color: #1b3d1d;
    line-height: 1.6;
    background-color: #f4f8f4;
    border-left: 5px solid #ffa000;
    padding: 15px 20px;
    margin-bottom: 25px;
    border-radius: 0 8px 8px 0;
}

/* Zone Contenu (Corps de l'article) */
.gm-article-content {
    position: relative;
}

.gm-body {
    font-size: clamp(14px, 2.5vw, 18px);
    line-height: 2;
    text-align: justify;
    text-justify: inter-word;
    color: #2c2c2c;
}

.gm-body p {
    margin-bottom: 1.5em;
}

/* Protection pour les images dans le corps de l'article */
.gm-body img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    margin: 15px 0;
}

/* --------------------------------------------------- */
/* STYLE UNIQUEMENT POUR LES LIENS DANS LES ARTICLES   */
/* --------------------------------------------------- */
.gm-body a, 
.gm-body p a {
    color: #0066cc !important; /* Met le lien en Bleu */
    font-weight: 600 !important; /* Légèrement en gras */
    text-decoration: underline !important; /* Souligne le lien */
    
    /* LES DEUX LIGNES MAGIQUES POUR LA TAILLE ET LA POLICE : */
    font-size: inherit !important; 
    font-family: inherit !important; 
    
    transition: color 0.3s ease, text-decoration 0.3s ease;
}

.gm-body a:hover, 
.gm-body p a:hover {
    color: #64b802 !important; /* Passe en Vert au survol */
    text-decoration: none !important; /* Enlève le soulignement */
}

/* ==========================================================================
   AJUSTEMENTS MOBILE
   ========================================================================== */

@media (max-width: 768px) {

    .gm-body {
        font-size: 17px !important;
        line-height: 1.6;
        text-align: left !important;
        word-break: normal;
        overflow-wrap: break-word;
    }

    .gm-photo {
        width: 100%;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    .gm-caption {
        font-size: 12px !important;
        padding: 6px 10px;
    }

    .gm-intro-box {
        font-size: 16px !important;
        padding: 12px 15px;
        margin-bottom: 20px;
    }

    .gm-article {
        padding: 15px;
    }
}

/* ==========================================================================
   EFFET LETTRINE (Drop Cap) - GREEN MEDIA AFRICA
   ========================================================================== */

/* Lettrine sur la première lettre de la description (Chapeau) */
.gm-intro-box::first-letter {
    float: left;                /* Permet au reste du texte de l'entourer */
    font-size: 12rem;           /* Taille de la lettre */
    line-height: 0.8;           /* Évite le grand vide au-dessus */
    padding: 10px;              /* Espace interne */
    margin: 5px 15px 5px 0;     /* Espace à droite pour pousser le texte */
    font-weight: 400;           /* Épaisseur de la lettre */
    color: #111111;             /* Couleur du texte */
    background-color: #ffffff;  /* Fond blanc (fait ressortir la lettre sur le fond #f4f8f4) */
    border: 1px solid #d3d3d3;  /* Fine bordure grise */
    border-radius: 4px;         /* Coins légèrement arrondis */
    text-transform: uppercase;  /* Force la majuscule */
}




        </style>
    </head>

    <body class="skin-orange" >
		<!--Add the following script at the bottom of the web page (before </body></html>)-->
		<!-- <script type="text/javascript">function add_chatinline(){var hccid=11411723;var nt=document.createElement("script");nt.async=true;nt.src="https://www.mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}add_chatinline();</script> -->
	    <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v15.0" nonce="oODIy1Nd"></script>
        
        @include('layouts.sections.headers.guestnavheader')
        <!-- End Navbar Area -->
        </br>
        <!-- Start Main News Area -->
        @yield('layoutContent')
        <!-- End Main News Area -->
        @include('layouts.sections.footers.guest')
		
    </body>
</html>