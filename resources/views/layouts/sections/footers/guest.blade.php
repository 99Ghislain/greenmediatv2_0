<!-- Start footer -->
<footer class="footer bg-dark">
    <div class="container">
        <div class="row b-content-1">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <div class="acategory-two text-uppercase" style="font-weight: bold;">&nbsp;A Propos &nbsp; </div>
                    <div class="block-body">
                        <figure class="foot-logo">
                            <img src="{{url('hphx/img/greenmedia mise jour.png')}}" class="img-responsive" alt="Logo">
                        </figure>
                        <p class="brand-description">
                            Green Media Africa, Presse spécialiste des questions agricoles et environnementales opère à travers des reportages, enquêtes, dossiers et interviews.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <div class="acategory-two text-uppercase" style="font-weight: bold;">&nbsp;Newsletter &nbsp; </div>
                    <div class="block-body">
                        <p>Abonne-toi afin de recevoir nos articles par E-mail</p>
                        <form class="newsletter">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ion-ios-email-outline"></i>
                                </div>
                                <input type="email" class="form-control email" placeholder="Adresse mail">
                            </div>
                            <button class="btn btn-success btn-block white">S'abonner <i class="ion-ios-arrow-thin-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-6">
                <div class="block">
                    <div class="acategory-two text-uppercase" style="font-weight: bold;">&nbsp;Réseaux Sociaux &nbsp;</div>
                    <div class="block-body">
                        <p class="brand-description">
                            Le site d'actualités <br>
                            <strong>Email:</strong> infomondeagricole@gmail.com <br>
                            <strong>Contact :</strong>  (+225) +225 05 75 85 95 43 / 07 07 49 84 25
                        </p>
                        <p>Recevez les news en restant connecter sur nos différents canaux :</p>
                        <ul class="social trp">
                            <li>
                                <a href="https://www.facebook.com/share/17RghD6sVR/" class="facebook">
                                    <svg><rect width="0" height="0"/></svg>
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://x.com/I_MondeAgricole?t=uTogMZYqIpUPSbQS8WBUjA&s=09" class="twitter">
                                    <svg><rect width="0" height="0"/></svg>
                                    <i class="ion-social-twitter-outline"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://youtube.com/@pressevertetv?si=U_8GrKE7BORj4LRP" class="youtube">
                                    <svg><rect width="0" height="0"/></svg>
                                    <i class="ion-social-youtube-outline"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-6">
                <div class="block">
                    <div class="acategory-two text-uppercase" style="font-weight: bold;">&nbsp;Chaîne YouTube &nbsp; </div>
                    <div class="block-body">
                        <iframe width="" height="" style="width: 100%; min-height: 200px;" src="{{url('https://www.youtube.com/embed/'.$hlastvd[0]->linkyoutube_video.'?autoplay=1&mute=1')}}"
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                             referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                        <a href="{{url('https://www.youtube.com/@pressverttv')}}" class="btn btn-danger btn-block white">Voir Green Media Africa  <i class="ion-ios-arrow-thin-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright b-content-1">
                    Copyright 2025 Green Media Africa | Tous droits réservés | Conception et Réalisation <a href="https://phoenixmultimediapro.com" style="color:#cb0719 !important" target="_blank"><img src="{{url('hphx/img/logophx-2.jpg')}}" alt="" style="width: 70px;"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- JS -->
<script src="{{url('assets/js/jquery.js')}}"></script>
<script src="{{url('assets/js/jquery.migrate.js')}}"></script>
<script src="{{url('assets/scripts/bootstrap/bootstrap.min.js')}}"></script>
<script>var $target_end=$(".best-of-the-week");</script>
<script src="{{url('assets/scripts/jquery-number/jquery.number.min.js')}}"></script>
<script src="{{url('assets/scripts/owlcarousel/dist/owl.carousel.min.js')}}"></script>
<script src="{{url('assets/scripts/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('assets/scripts/easescroll/jquery.easeScroll.js')}}"></script>
<script src="{{url('assets/scripts/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{url('assets/scripts/toast/jquery.toast.min.js')}}"></script>
<script src="{{url('assets/phx-folders/venobox/venobox.min.js')}}"></script>
<script src="{{url('assets/js/e-magz.js')}}"></script>
<script scr="{{url('assets/js/phoenix-js.js')}}"></script>
<!--<script scr="{{url('assets/js/phx-shareable.js')}}"></script>-->
<script type="text/javascript">
    (function ($) {
        "use strict";
        // Tranding carousel
        $(".slide").owlCarousel({
            autoplay: true,
            smartSpeed: 300,
            items: 3,
            dots: false,
            loop: true,
            nav : true,
            navText : [
                '<span class="icon-nav-left"><i class="ion-ios-arrow-left"></i></span>',
                '<span class="icon-nav-right"><i class="ion-ios-arrow-right"></i></span>'
            ],
            responsive: {
                0:{
                    items:1
                },
                576:{
                    items:1
                },
                768:{
                    items:3
                },
                992:{
                    items:3
                },
                1200:{
                    items:3
                }
            }
        });

        $(".carousel-1").owlCarousel({
            autoplay: true,
            smartSpeed: 300,
            items: 3,
            loop: true,
            responsive: {
                0:{
                    items:1
                },
                576:{
                    items:3
                },
                768:{
                    items:4
                },
                992:{
                    items:4
                },
                1200:{
                    items:4
                }
            }
        });
        $(".carousel-2").owlCarousel({
            autoplay: true,
            smartSpeed: 300,
            items: 1,
            dots: false,
            loop: true
        });
        $(".owl-theme").owlCarousel({
            autoplay: true,
            smartSpeed: 300,
            items: 1,
            dots: false,
            loop: true
        });

    })(jQuery);
</script>
<!-- / Share on Social Reseau  -->
<script type="text/javascript">
    const facebookBtn = document.querySelector(".sharefacebook");
    const twitterBtn = document.querySelector(".sharetwitter");
    const googleplusBtn = document.querySelector(".sharegoogleplus");
    const whatsappBtn = document.querySelector(".sharewhatsapp");
    function init(){
    let dataTitle = encodeURIComponent(document.title);
    let postUrl = encodeURI(document.location.href);
    // let postTitle = encodeURI(dataTitle);
    facebookBtn.setAttribute("href","https://www.facebook.com/sharer.php?u="+postUrl);
    twitterBtn.setAttribute("href","https://twitter.com/share?url="+postUrl+"&text="+dataTitle);
    whatsappBtn.setAttribute("href","whatsapp://send?text="+dataTitle+" "+postUrl);
    googleplusBtn.setAttribute("href","https://plus.google.com/share?url="+postUrl);
    //
    }
    init();

</script>
<!-- // Share on Social Reseau -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.vdsplayer').venobox();
    });
</script>