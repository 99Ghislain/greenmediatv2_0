<!doctype html>
<html lang="fr" class="theme-light">
    <head>
        {{-- Begin News Template --}}
        <!-- / Tags Google Analytics -->
	    <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-KQY6RQ8D7P"></script>
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
        <title><?=(isset($elmshared[0])&&!empty($elmshared[0]))?'Green Media Africa - '.$elmshared[0].' | E-mail(s) : infomondeagricole@gmail.com | Contacts : (+225) 05 75 85 95 43 / 07 07 49 84 25 - ' :' Green Media Africa -  E-mail(s) : infomondeagricole@gmail.com - Contacts : (+225) 05 75 85 95 43 / 07 07 49 84 25';?> </title>
        <link rel="icon" type="image/png" href="{{ url('assets/img/short-logo-green-media-white.png') }}">
        <!--Canonical-->
        <link rel="canonical" href="https://www.greenmediaafrica.ci">
        <!-- Pub Google Adsense -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5336231094781905"crossorigin="anonymous"></script>
        <!-- Shareable -->
        <meta property="og:url"           content="{{url()->current()}}" />
        <meta property="og:type"          content="Actualité, News" />
        <?php $imgshared="short-logo-green-media-white.png"; if(isset($elmshared)&&!empty($elmshared)){;?>
        <meta property="og:title"         content="<?=$elmshared[0];?>" />
        <meta property="og:description"   content="<?=$elmshared[1];?>" />
        <meta property="og:image"         content="@if(isset($elmshared[2])){{url('hphx/img/'.$elmshared[2])}}@else{{url('hphx/img/'.$imgshared)}}@endif"/>
        <?php };?>
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
		<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">


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
            
            body {
              font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
            }
            
            /**/
            
			body {
				background-image: url({{url('hphx/img/background-cocoa-civ-225-1.png')}}) !important;
				/* background-attachment: fixed; */
			}
			.box-green {
				background-color:rgb(255, 255, 255);
				box-shadow: 1px 1px 5px 1px #92929292;
				overflow: hidden;
			}
			.news{
				width: 160px; line-height: 20px;
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

            .skin-orange a {
                color: #0b1303;
				font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
				font-weight: bold;
				font-style: normal;
				text-transform: uppercase;
            }
            .skin-orange p {
                font-family: "ComicSansMSc", "Comic Sans MS", "Comic Neue", sans-serif !important;
				/*font-weight: normal !important;*/
				text-transform: initial;
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
				font-size: 250%; 
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