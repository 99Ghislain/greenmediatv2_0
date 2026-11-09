<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuserController;
use Laravel\Jetstream\Http\Controllers\Inertia\CurrentUserController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::controller(AdController::class)->group(function(){
        Route::get('/dashboard','vdashboard')->name('dashboard');
        Route::get('/adallposts','adposts')->name('admins.allposts');
        Route::get('/adtodayposts','adtodayposts')->name('admins.todayposts');
        Route::get('/adaddpost','adaddpost')->name('admins.addpost');
        Route::post("/adinspost",'adinspost')->name('admins.inspost');
        Route::post('/adupdatepost','adupdatepost')->name('admins.updatepost');
        // A LA UNE
        Route::get('/adallluposts','adluposts')->name('admins.allluposts');
        //
        Route::get('/adtodayluposts','adtodayluposts')->name('admins.todayluposts');
        //
        Route::get('/adaddlupost','adaddlupost')->name('admins.addlupost');
        //
        Route::post("/adinslupost",'adinslupost')->name('admins.inslupost');
        //
        Route::post('/adupdatelupost','adupdatelupost')->name('admins.updatelupost');
        //A LA UNE
        //PUB ARTICLE
        Route::get('/adallpbposts','adpbposts')->name('admins.allpbposts');
        //
        Route::get('/adtodaypbposts','adtodaypbposts')->name('admins.todaypbposts');
        //
        Route::get('/adaddpbpost','adaddpbpost')->name('admins.addpbpost');
        //
        Route::post("/adinspbpost",'adinspbpost')->name('admins.inspbpost');
        //
        Route::post('/adupdatepbpost','adupdatepbpost')->name('admins.updatepbpost');
        //PUB ARTICLE
        //ANNIV CONTRIBUTION
        Route::get('/adallanvposts','adanvposts')->name('admins.allanvposts');
        //
        Route::get('/adtodayanvposts','adtodayanvposts')->name('admins.todayanvposts');
        //
        Route::get('/adaddanvpost','adaddanvpost')->name('admins.addanvpost');
        //
        Route::post("/adinsanvpost",'adinsanvpost')->name('admins.insanvpost');
        //
        Route::post('/adupdateanvpost','adupdateanvpost')->name('admins.updateanvpost');
        //ANNIV CONTRIBUTION
        //VIDEO
        
        Route::get('/adlivesstreaming','livesstreaming')->name('admins.livesstreaming');
        // 
        Route::get('/adallvideos','advideos')->name('admins.allvideos');
        //
        Route::get('/adaddvideo','adaddvideo')->name('admins.addvideo');
        //
        Route::post("/adinsvd",'adinsvd')->name('admins.insvd');
        //
        Route::post('/adupdatevd','adupdatevd')->name('admins.updatevd');
        //
        //PODCAST - RADIO
        Route::get('/adallradios','adradios')->name('admins.allradios');
        //
        Route::get('/adaddradio','adaddradio')->name('admins.addradio');
        //
        Route::post("/adinspc",'adinspc')->name('admins.inspc');
        //
        Route::post('/adupdatepc','adupdatepc')->name('admins.updatepc');
        //ABOUTS
        Route::get('/adallabouts','adabouts')->name('admins.allabouts');
        //
        Route::get('/adaddabout','adaddabout')->name('admins.addabout');
        //
        Route::post("/adinsab",'adinsab')->name('admins.insab');
        //
        Route::post('/adupdateab','adupdateab')->name('admins.updateab');
        //
        //PartenS
        Route::get('/adallpartens','adpartens')->name('admins.allpartens');
        //
        Route::get('/adaddparten','adaddparten')->name('admins.addparten');
        //
        Route::post("/adinspart",'adinspart')->name('admins.inspart');
        //
        Route::post('/adupdatepart','adupdatepart')->name('admins.updatepart');
        //
        //FLASH INFO
        Route::get('/adallflashs','adflashs')->name('admins.allflashs');
        //
        Route::get('/adnwflashs','adnwflashs')->name('admins.nwflashs');
        //
        Route::get('/adaddflash','adaddflash')->name('admins.addflash');
        //
        Route::post("/adinsfh",'adinsfh')->name('admins.insfh');
        //
        Route::post('/adupdatefh','adupdatefh')->name('admins.updatefh');
        //PUBLICITE
        Route::get('/adallblocks','adblocks')->name('admins.allblocks');
        //
        Route::get('/adallpubs','adpubs')->name('admins.allpubs');
        //
        Route::get('/adnwpubs','adnwpubs')->name('admins.nwpubs');
        //
        Route::get('/adaddpub','adaddpub')->name('admins.addpub');
        //
        Route::post("/adinspb",'adinspb')->name('admins.inspb');
        //
        Route::post('/adupdatepb','adupdatepb')->name('admins.updatepb');
        //PUBLICITE
        //PAPERS
        Route::get('/adallpapers','adpapers')->name('admins.allpapers');
        //
        Route::get('/adnwpapers','adnwpapers')->name('admins.nwpapers');
        //
        Route::get('/adaddpaper','adaddpaper')->name('admins.addpaper');
        //
        Route::post("/adinspp",'adinspp')->name('admins.inspp');
        //
        Route::post('/adupdatepp','adupdatepp')->name('admins.updatepp');
        //PAPERS
        // Galerie d'Images
        Route::get('/adallpictures','adpictures')->name('admins.allpictures');
        //
        Route::get('/adaddpicture','adaddpicture')->name('admins.addpicture');
        //
        Route::post("/adinspic",'adinspic')->name('admins.inspic');
        //
        Route::post('/adupdatepic','adupdatepic')->name('admins.updatepic');
        // Album
        Route::get('/adallalbums','adallalbums')->name('admins.allalbums');
        //
        Route::post("/adinsalbum",'adinsalbum')->name('admins.insalbum');
        
        // End Galerie d'Images
        //
        Route::get('/adallusers','adusers')->name('admins.allusers');
        //
        Route::get('/adadduser','adadduser')->name('admins.adduser');
        //
        // Route::post("/adinsus",'adinsus')->name('admins.insus');
        // 
        Route::post('/adinsus','ustore')->name('user.store');
        //
        Route::post('/adupdateus','adupdateus')->name('admins.updateus');
        //
        Route::get('/admyprofilus','admyprofilus')->name('admins.myprofilus');
        //
        // ==========================================
        // GESTION DES RÉDACTEURS
        // ==========================================
        Route::get('/adallredacteurs', 'adallredacteurs')->name('admins.allredacteurs');
        Route::get('/adaddredacteur', 'adaddredacteur')->name('admins.addredacteur');
        Route::post('/adinsredacteur', 'adinsredacteur')->name('admins.insredacteur');
        Route::post('/adupdredacteur/{id}', 'adupdredacteur')->name('admins.updateredacteur');
        Route::post('/addelredacteur/{id}', 'addelredacteur')->name('admins.deleteredacteur');
        
        // Routes pour la gestion des Reporters
        Route::get('/adallreporters', 'adallreporters')->name('admins.allreporters');
        Route::get('/adaddreporter', 'adaddreporter')->name('admins.addreporter');
        Route::post('/adinsreporter', 'adinsreporter')->name('admins.insreporter');

        // Gestion de la Newsletter
        Route::get('/adallnewsletters', 'adallnewsletters')->name('admins.allnewsletters');
        
        // OFFRES D'EMPLOI
        Route::get('/adalloffres','adoffres')->name('admins.alloffres');
        //
        Route::get('/adaddoffre','adaddoffre')->name('admins.addoffre');
        //
        Route::post("/adinsoffre",'adinsoffre')->name('admins.insoffre');
        //
        Route::post('/adupdateoffre','adupdateoffre')->name('admins.updateoffre');
    });
    Route::controller(ServiceController::class)->group(function(){
        // SERVICES
        Route::get('/adallservices','adservices')->name('admins.allservices');
        //
        Route::get('/adaddservice','adaddservice')->name('admins.addservice');
        //
        Route::post("/adinsservice",'adinsservice')->name('admins.insservice');
        //
        Route::post('/adupdateservice','adupdateservice')->name('admins.updateservice');
        // SERVICES
    });
    Route::controller(SuserController::class)->group(function(){
        
    });

});
Route::controller(GuestController::class)->group(function(){
    Route::get('/', 'vallvideos')->name('visitors.home');
    Route::get('/home', 'vallvideos');
    Route::get('/allactus', 'vallactus')->name('visitors.aallactus');
    Route::get('/category','vhome');
    //Pages
    Route::get('/green-media-africa-tv', 'vhome')->name('visitors.allvideos');
    Route::get('/green-media-africa-tv/video/{id}', 'vshowvideo')->name('visitors.showvideo');
    
    Route::get('/contact', 'vcontact')->name('visitors.contact');
    //  
    Route::get('/allarticles/','vallactus')->name('visitors.allactusz');
    // 
    Route::get('/actuworld/','vallwactus')->name('visitors.allwactus');
    // 
    Route::get('/{rub}/','vallposts')->name('visitors.allactus');
    // 
    Route::get('/{rub}/{slug}/{ip}/','vsgpost')->name('visitors.sgactu');
   // Route pour soumettre un commentaire
    Route::post('/articles/{id}/comments', 'storeComment')->name('comments.store');
    
    Route::post('/newsletter/subscribe', [App\Http\Controllers\GuestController::class, 'storeNewsletter'])->name('newsletter.store');
    // Route pour le formulaire de déblocage des articles premium (Newsletter)
    Route::post('/article/debloquer', [GuestController::class, 'unlock'])->name('article.unlock');
});


