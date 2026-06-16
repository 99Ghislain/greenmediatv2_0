@extends('layouts/guestLayout')
@section('layoutContent')
<section id="contentSection">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="left_content">
        <div class="single_page  wow fadeInDown">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">Contact</li>
          </ol>
          <div class="single_page_content">
            <div class="single_post_content wow fadeInDown" style=" max-width: 100%; max-height: 200px; overflow: hidden;">
              <iframe class="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126522.8136239322!2d-5.095664020692657!3d7.700535836191675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc7ff1047a1337b%3A0x6df480111e410feb!2zQm91YWvDqQ!5e0!3m2!1sfr!2sci!4v1650456326048!5m2!1sfr!2sci" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <!--  -->
            </div>
            <div class="single_post_content wow fadeInDown" style=" ">
              <div class="row col-12 col-md-12 container-content">
                <div class="col-md-12">
                  <h1 class="" style="color: #ee002d;">Contact - Publicité</h1>
                  <hr style="background-color:  #ee002d;">
                </div>
                <div class="row col-md-12 container" style="/*margin: 0 15px;*/ margin: 0 auto;">
                  <div class="row col-12 col-sm-6 col-md-6" style="margin: 10px auto;">
                    <div class="col-12">
                      <h3 class="" style="color: #000;">REGIE PUBLICITAIRE</h3>
                      <p style="margin: 5px 10px;"><i id="fontawesomeicon" class="fa fa-phone" style=""></i>&nbsp; (+225) 05 46 10 24 74</p>
                      <p style="margin: 5px 10px;"><i id="fontawesomeicon" class="fa fa-phone" style=""></i>&nbsp; (+225) 27 31 62 31 11</p>
                      <p style="margin: 5px 10px;"><i id="fontawesomeicon" class="fa fa-envelope" style=""></i>&nbsp; igbeke.com@gmail.com</p>
                    </div>
                  </div>  
                  <div class="row col-12 col-sm-6 col-md-6" style="margin: 10px auto;">
                    <div class="col-12">
                      <h3 class="" style="color: #000;">RESEAUX SOCIAUX</h3>
                      <p style="margin: 5px 10px;"><a href="https://www.facebook.com/Igbekecom-100958995119141" title="Igbeke.com" target="_blank" style="color: #000;"><i id="fontawesomeicon" class="fa fa-facebook" style=""></i>&nbsp; @igbeke.com</a></p>
                      <p style="margin: 5px 10px;"><a href="#" title="(+225) 05 46 10 27 74" style="color: #000;"><i id="fontawesomeicon" class="fa fa-whatsapp" style=""></i>&nbsp;(+225) 05 46 10 24 74</a></p>
                      <p style="margin: 5px 10px;"><a href="https://www.youtube.com/channel/UC9HQslt8sDovbSNTRCXxYHQ" title="Igbeke TV" target="_blank" style="color: #000;"><i id="fontawesomeicon" class="fa fa-youtube" style=""></i>&nbsp;@Igbeke TV</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="single_post_content wow fadeInDown" style="display: none;">
              <p class="text-center"> <img src="{{url('images/signal-pub-2.png')}}" class="space_pub_header" style=""></p>
              <div class="slideshow_2" style=" max-height: 150px;">
                    <a href=" #" target="_blank">
                      <div style=" height: 100%; padding: 20px auto;">
                          <img src="{{ url('images/61aa6e4a87083.jpg') }}" alt="" style=" max-height: 148px; width: 100%; ">
                      </div>
                    </a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- include('visitors.templates.sidebarpost') -->
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
        // 
        if($ijr=="Mon"){$ljr = $tabjr[0];}elseif($ijr=="Tue"){$ljr = $tabjr[1];}elseif($ijr=="Wed"){$ljr = $tabjr[2];}elseif($ijr=="Thu"){$ljr = $tabjr[3];}
        elseif($ijr=="Fri"){$ljr = $tabjr[4];}elseif($ijr=="Sat"){$ljr = $tabjr[5];}elseif($ijr=="Sun"){$ljr = $tabjr[6];}
    
        return $ljr.' '.$jr.' '.$mfr.' '.$an ;
    } 
;?>
@endsection