<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Contracts\Routing\UrlGenerator;

class GuestController extends Controller
{
    public function vhome() {

        //-/ Entête - Footer  
        $hnbarts = $this->artcount(); 
        $hnbvds = $this->vdscount();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = $this->phxprinrub();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        $fhs = $this->phxfsh();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        //-// Entête - Footer 
        //-/ Home - Content
        $hotarts = $this->recar(3);
        $hrandarts = $hotarts;
        // $hrandarts = $hotarts->random(3);
        $populars = $this->hvws(40);
        $pplars = $populars->random(12);
        //
        // -// 12
        $hrecarts = $this->trecar(2);
        $hcarous = $this->recar(6);
        $hartvws = $this->hvws(4);
        $hrdfoots = $this->recar(50);
        $hrandfts = $hrdfoots->random(4);
        // -// 12
        $hpolart = $this->nwscatL1(1,1); 
        $hallpolarts = $this->nwscatL1(1,2);
        $hagriart = $this->nwscatL1(17,17);
        $hecharts = $this->nwscatL1(2,2);
        $hbsarts = $this->nwscatL1(3,6);
        $henvarts = $this->nwsenvdL1();
        $hinovarts = $this->nwsinovdL1();
        // 
        $hggart = $this->nwscatL1(2);
        $hecoart = $this->nwscatL1(3);
        $hallecoarts = $this->nwscatL1(18,6);
        $hsoart = $this->nwscatL1(4);
        $hallsoarts = $this->nwscatL1(4,12);
        $hspoart = $this->nwscatL1(6);
        $hallspoarts = $this->nwswldL1_(2,null,28,29,null,17);
        $hhtart = $this->nwscatL1(4);
        $hactart = $this->nwscatL1(11);
        $hallactarts = $this->nwscatL1(11,5);
        $hfdart = $this->nwscatL1(2);
        $allhfdarts = $this->nwscatL1(2,5);
        $hedart = $this->nwscatL1(8);
        //$hafnws3
        $hafricanws = $this->nwscatL1(11);
        $hafnws2 = $this->nwscatL1(11,3);
        $hafnws3 = $this->nwscatL1(11,3);
        $heunws = $this->nwscatL1(12,3);
        $hamnws = $this->nwscatL1(14,3);
        $hasnws = $this->nwsAswld();
        $hwdlnws = $this->nwswldL1();
        $hwdlmns = $this->nwswldL0();
        $hinversnws = $this->nwscatL1(8,3);
        $hinvnms = $this->nwscatL1(8,4);
        //
        $heducart = $this->nwssbcatL1(4,13);
        $halleducarts = $this->nwssbcatL1(4,13,2);
        $hsteart = $this->nwssbcatL1(4,12);
        $hallstearts = $this->nwssbcatL1(4,12,2);
        // Vidéos
        $hlastvd = $this->phxvds(20);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        $rdsdvds = $hrecvds->random(4);
        // Recent Articles
        $hcf = $this->recar(8);
        $hrrt = $this->recar(10);
        // Pub
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(1,2);
        $pubs_l3 =  $this->phxpub(2,2);
        $pubs_l4 =  $this->phxpub(9,2);
        // ---------------------------------
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $pubs_i3 =  $this->phxpub(6,2);
        $pubs_i4 =  $this->phxpub(7,2);
        $pubs_i5 =  $this->phxpub(8,2);
        //-// Home - Content
        $parts = $this->parterns(20);

        $onglet="Homepage - Green Media Africa";
        $hpage = 'home';
        $imgshared = 'short-logo-green-media-white.png';
        $elmshared = $this->elmsShareable();
		return view('contents.guests.index',compact('parts','pplars','hcf','henvarts','hinovarts','hbsarts','hecharts','hpage','elmshared','imgshared','hnbarts','hnbvds','hallarts','hallrbprins','hnbartsprinrub','onglet','hmainvds','pubs_a','fhs','hrbprins','hrecarts','hartvws','pubs_l1','pubs_l2','pubs_l3','pubs_l4','pubs_i1','pubs_i2','pubs_i3','pubs_i4','pubs_i5','hpolart','hggart','hecoart','hsoart','hactart','hagriart','hspoart','hhtart','hfdart','hedart','hafricanws','hinversnws','hafnws2','hafnws3','heunws','hamnws','hasnws','hwdlmns','hinvnms','hwdlnws','heducart','hsteart','hallstearts','halleducarts','allhfdarts','hrandfts','hallspoarts','hallactarts','hallecoarts','hallpolarts','hallsoarts','hlastvd','rdsdvds','hrecvds','hrandarts','online','donline','hcarous'));
	}

    public function vallwactus(){
        //-/ Entête - Footer  
        $hnbarts = $this->artcount(); 
        $hnbvds = $this->vdscount();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = $this->phxprinrub();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        // Pub
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(1,2);
        $pubs_l3 =  $this->phxpub(2,2);
        $pubs_l4 =  $this->phxpub(9,2);
        // ---------------------------------
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $pubs_i3 =  $this->phxpub(6,2);
        $pubs_i4 =  $this->phxpub(7,2);
        $pubs_i5 =  $this->phxpub(8,2);

        $fhs = $this->phxfsh();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        //-// Entête - Footer
        $wcount = $this->countnwswldL2();
        // Vidéos
        $hlastvd = $this->phxvds(100);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        $rdsdvds = $hrecvds->random(4);
        //-Content
        $hcarts = $this->nwswldL2();
        $hinversnws = $this->nwscatL1(8);
        $hafricanws = $this->nwscatL1(11);
        $hrecarts = $this->recar(6);
        $hafnws2 = $this->nwscatL1(11,3);
        $hwdlnws = $this->nwswldL1();
        //// Vidéos
        $hlastvd = $this->phxvds(100);
        $hwdlmns = $this->nwswldL0();
        $hinvnms = $this->nwscatL1(8,4);
        $hartvws = $this->hvws(4);
        $hrdfoots = $this->recar(50);
        $hrandfts = $hrdfoots->random(4);
        // article chaude
        $hotarts = $this->recar(15);
        $hrandarts = $hotarts->random(15);
        //
        $onglet='Liste d\'articles de l\' Actualité du monde - Green Media Africa';
        $hpage = $rub = 'actuworld';
        $imgshared = 'short-logo-green-media-white.png';
        $elmshared = $this->elmsShareable();
		return view('contents.guests.allactus',compact('hlastvd','wcount','hotarts','hrandarts','hpage','imgshared','elmshared','hnbarts','hartvws','hwdlmns','hinvnms','hrandfts','hnbvds','hwdlnws','hafnws2','hallarts','hallrbprins','hnbartsprinrub','hrecarts','onglet','pubs_a','pubs_l1','pubs_l2','pubs_l3','pubs_l4','pubs_i1','pubs_i2','pubs_i3','pubs_i4','pubs_i5','fhs','hrbprins','rub','hcarts','online','donline','hinversnws','hafricanws','hmainvds','rdsdvds'));
	}

    public function vallactus(){
        //-/ Entête - Footer  
        $hnbarts = $this->artcount(); 
        $hnbvds = $this->vdscount();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = $this->phxprinrub();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        // Pub
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(1,2);
        $pubs_l3 =  $this->phxpub(2,2);
        $pubs_l4 =  $this->phxpub(9,2);
        // ---------------------------------
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $pubs_i3 =  $this->phxpub(6,2);
        $pubs_i4 =  $this->phxpub(7,2);
        $pubs_i5 =  $this->phxpub(8,2);
        // 
        $fhs = $this->phxfsh();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        //-// Entête - Footer
        // Vidéos
        $hlastvd = $this->phxvds(100);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        $rdsdvds = $hrecvds->random(4);
        //-Content
        $hcarts = $this->hcartactus(18);
        $hinversnws = $this->nwscatL1(8);
        $hafricanws = $this->nwscatL1(11);
        $hrecarts = $this->recar(6);
        $hafnws2 = $this->nwscatL1(11,3);
        $hwdlnws = $this->nwswldL1();
        //
        $hwdlmns = $this->nwswldL0();
        $hinvnms = $this->nwscatL1(8,4);
        $hartvws = $this->hvws(4);
        $hrdfoots = $this->recar(50);
        $hrandfts = $hrdfoots->random(4);
        // article chaude
        $hotarts = $this->recar(15);
        $hrandarts = $hotarts->random(15);
        //
        $onglet='Liste d\'articles de l\' Actualité -  Green Media Africa';
        $hpage = $rub = 'actualites';
        $imgshared = 'short-logo-green-media-white.png';
        $elmshared = $this->elmsShareable();
        $parts = $this->parterns(20);
		return view('contents.guests.allactus',compact('hlastvd','parts','hotarts','hrandarts','hpage','imgshared','elmshared','hnbarts','hartvws','hwdlmns','hinvnms','hrandfts','hnbvds','hwdlnws','hafnws2','hallarts','hallrbprins','hnbartsprinrub','hrecarts','onglet','pubs_a','pubs_l1','pubs_l2','pubs_l3','pubs_l4','pubs_i1','pubs_i2','pubs_i3','pubs_i4','pubs_i5','fhs','hrbprins','rub','hcarts','online','donline','hinversnws','hafricanws','hmainvds','rdsdvds'));
	}

	public function vallposts($rub){
	    $rub = strip_tags($rub);
        //-/ Entête - Footer  
        $hnbarts = $this->artcount(); 
        $hnbvds = $this->vdscount();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = $this->phxprinrub();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        // Pub
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(1,2);
        $pubs_l3 =  $this->phxpub(2,2);
        $pubs_l4 =  $this->phxpub(9,2);
        // ---------------------------------
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $pubs_i3 =  $this->phxpub(6,2);
        $pubs_i4 =  $this->phxpub(7,2);
        $pubs_i5 =  $this->phxpub(8,2);
        // 
        $fhs = $this->phxfsh();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        //-// Entête - Footer
        // Vidéos
        $hlastvd = $this->phxvds(100);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        $rdsdvds = $hrecvds->random(4);
        //-Content
        $hprinarts = $this->hprinarts($rub);
        $hcarts = $this->hcarts($hprinarts[0]->id_prinrub,18);
        $hinversnws = $this->nwscatL1(8);
        $hafricanws = $this->nwscatL1(11);
        $hrecarts = $this->recar(6);
        $hafnws2 = $this->nwscatL1(11,3);
        $hwdlnws = $this->nwswldL1();
        //
        $hwdlmns = $this->nwswldL0();
        $hinvnms = $this->nwscatL1(8,4);
        $hartvws = $this->hvws(4);
        $hrdfoots = $this->recar(50);
        $hrandfts = $hrdfoots->random(4);
        // Article Chaude
        $hotarts = $this->recar(15);
        $hrandarts = $hotarts->random(15);
        //
        $onglet='Liste d\'articles -  Green Media Africa';
        $hpage = $rub;
        $imgshared = 'short-logo-green-media-white.png';
        $elmshared = $this->elmsShareable();
        $parts = $this->parterns(20);
		return view('contents.guests.allactus',compact('hlastvd','parts','hotarts','hrandarts','hpage','imgshared','elmshared','hnbarts','hartvws','hwdlmns','hinvnms','hrandfts','hnbvds','hwdlnws','hafnws2','hallarts','hallrbprins','hnbartsprinrub','hrecarts','onglet','pubs_a','pubs_l1','pubs_l2','pubs_l3','pubs_l4','pubs_i1','pubs_i2','pubs_i3','pubs_i4','pubs_i5','fhs','hrbprins','rub','hcarts','online','donline','hinversnws','hafricanws','hmainvds','rdsdvds'));
	}

	public function vsgpost($rub,$slug,$ip){
        $rub = strip_tags($rub);
        $slug = strip_tags($slug);
        $ip = strip_tags($ip);
        if(!is_numeric($ip)){ 
            return back();
        }
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('videos')->count();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        $fhs = $this->phxfsh();
        // $online = $this->visitors_online();
        //-// Entête - Footer 
        //-Content
        $hprinart = DB::table('principalrubrique')
        ->Where('slug_prinrub',$rub)
        ->orderBy('id_prinrub','asc')
        ->limit(1)
        ->get();
        if(count($hprinart)==0){
            return back()->with('error','Categorie n\'existe pas');
        }
        $hcart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',$hprinart[0]->id_prinrub)
        ->Where('slug_article',$slug)
        ->Where('id_article',$ip)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        if(count($hcart)==0){
            return back()->with('error','Aucun article ne correspond à votre requete');
        }
        // Number View article
        $a_views = $hcart[0]->view_article+1;
        $upview = DB::table('articles')->where('id_article', $hcart[0]->id_article)->update(['view_article' => $a_views]);
        // Number View article
        // Vidéos
        $hlastvd = DB::table('videos')
        ->join('users','users.id','=','videos.userid_video')
        ->select('videos.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_video','desc')
        ->limit(1)
        ->get();
        $hrecvds = DB::table('videos')
        ->join('users','users.id','=','videos.userid_video')
        ->select('videos.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_video','desc')
        ->limit(5)
        ->get();
        // AlsoRead
        $halso = $this->nwscatL1($hprinart[0]->id_prinrub,8);
        $halsoreads = $halso;
        // $halsoreads
        // SideBar
        $hrecarts = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->limit(7)->get();
        $hpolart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',1)
        ->orderBy('id_article','desc') 
        ->limit(1)
        ->get();
        $hggart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',2)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hecoart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',3)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hsoart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',4)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hcuart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',5)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hspoart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',6)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hhtart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',4)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hactart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',11)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hfdart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',9)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hedart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',8)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $heducart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',4)
        ->Where('secondrubid_article',13)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        $hsteart = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',4)
        ->Where('secondrubid_article',12)
        ->orderBy('id_article','desc')
        ->limit(1)
        ->get();
        // Recent Articles

        $hrrt = $this->recar(10);

        $hrandarts = $hrrt->random(5);
        $hinversnws = $this->nwscatL1(8);
        $hafricanws = $this->nwscatL1(11);
        // 
        $hwdlmns = $this->nwswldL0();
        $hinvnms = $this->nwscatL1(8,4);
        $hartvws = $this->hvws(4);
        $hrdfoots = $this->recar(50);
        $hrandfts = $hrdfoots->random(4);
        // Vidéos
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        $rdsdvds = $hrecvds->random(4);
        // Pub 
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(1,2);
        $pubs_l3 =  $this->phxpub(2,2);
        $pubs_l4 =  $this->phxpub(9,2);
        // ---------------------------------
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $pubs_i3 =  $this->phxpub(6,2);
        $pubs_i4 =  $this->phxpub(7,2);
        $pubs_i5 =  $this->phxpub(8,2);
        // 
        // Pub
        $hwdlnws = $this->nwswldL1();
        $onglet = 'Green Media Africa';
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $hpage = $rub;
        $slgsgpost = $slug;
        $elmshared = $this->elmsShareable($hcart[0]);
        $imgshared = $hcart[0]->image_article;
        $parts = $this->parterns(20);
		return view('contents.guests.sgactu',compact('hlastvd','parts','hwdlnws','hpage','elmshared','imgshared','hnbarts','hnbvds','hmainvds','rdsdvds','hwdlmns','hinvnms','hartvws','hrandfts','hinversnws','hallarts','hallrbprins','hnbartsprinrub','onglet','hafricanws','pubs_a','pubs_l1','pubs_l2','pubs_l3','pubs_l4','pubs_i1','pubs_i2','pubs_i3','pubs_i4','pubs_i5','fhs','hrbprins','hcart','slgsgpost','pubs_l1','pubs_l2','pubs_i1','pubs_i2','hlastvd','hrecvds','halsoreads','hpolart','hggart','hecoart','hsoart','hactart','hcuart','hspoart','hhtart','hfdart','hedart','heducart','hsteart','hrandarts','online','a_views','donline','hrecarts'));
	}

	public function vallvideos(){
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('videos')->count();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        // Pub
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(1,2);
        $pubs_l3 =  $this->phxpub(2,2);
        $pubs_l4 =  $this->phxpub(9,2);
        // ---------------------------------
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $pubs_i3 =  $this->phxpub(6,2);
        $pubs_i4 =  $this->phxpub(7,2);
        $pubs_i5 =  $this->phxpub(8,2);
        // ---------------------------------
        $fhs = $this->phxfsh();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        //-// Entête - Footer // 
        $hwdlmns = $this->nwswldL0();
        $hinvnms = $this->nwscatL1(8,4);
        $hartvws = $this->hvws(4);
        $hrdfoots = $this->recar(50);
        $hrandfts = $hrdfoots->random(4);
        // Vidéos
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        $rdsdvds = $hrecvds->random(4);
        // 
        $hcvds = DB::table('videos')
        ->join('users','users.id','=','videos.userid_video')
        ->select('videos.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_video','desc')
        ->paginate(16);
        // 
        $hwdlnws = $this->nwswldL1();
        $onglet='Vidéos';
        $hpage = 'Green Media Africa - TV';
        $imgshared = 'short-logo-green-media-white.png';
        $elmshared = $this->elmsShareable();
        $parts = $this->parterns(20);
        
		return view('contents.guests.allvideos',compact('hlastvd','parts','hwdlnws','hpage','imgshared','elmshared','hwdlmns','hinvnms','hnbarts','hartvws','hmainvds','rdsdvds','hrandfts','hrecvds','hnbvds','hallarts','hallrbprins','hnbartsprinrub','onglet','pubs_a','fhs','hrbprins','hcvds','online','donline'));
	}

	public function vcontact(){
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('videos')->count();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        $fhs = $this->phxfsh();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        //-// Entête - Footer 
        $onglet='Contact';
        $hpage = 'contactp';
		return view('visitors.contactp',compact('hpage','hnbarts','hnbvds','hallarts','hallrbprins','hnbartsprinrub','onglet','pubs_a','fhs','hrbprins','online','donline'));
	}

	public function vlogin(){
		$hpage = 'login-connexion';
		$online = $this->visitors_online();
        $donline = $this->d_visitors_online();
		return view('connexions.login',compact('hpage','online','donline'));
	}

    public function vdashboard(){
        if(session()->has('login')){
            $pgactive = "Dashboard";
            // 
            $hnbarts = $this->artcount();
            $hnbvds = DB::table('videos')->count();
            $hnbusers = DB::table('users')->count();
            // 
            $hallusers = DB::table('users')->orderBy('id_user','desc')->get();
            $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
            // 
			$artrecs = DB::table('articles')
			->join('users','users.id','=','articles.userid_article')
			->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
			->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
			->select('articles.*','users.id','users.login_user','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
			->orderBy('id_article','desc')
			->limit(5)
			->get();

			if ($artrecs->count()!=0) {
				$scpt = 0;
				$challartshow[$scpt]= $artrecs[0];
			}
			// 
            $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
            foreach($hallrbprins as $prin):
                $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
            endforeach;
            // 
            $online = $this->visitors_online();
            $donline = $this->d_visitors_online();
            $page = 'Dashboard';
            $onglet = 'Tableau de Board';
            return view('admins.dashboard',compact('pgactive','page','onglet','hnbarts','hnbvds','hnbusers','hallusers','artrecs','hallarts','hallrbprins','hnbartsprinrub','online','donline'));
        }
        return redirect('/');
    }

    public function vunlocked(Request $dtdlg){

        if($dtdlg->validate(['login'=>'required','password'=>'required'])){
            $dlg = $dtdlg->input();

            $login = strip_tags($dlg['login']);
            $password = strip_tags($dlg['password']);
            $verify = DB::table('users')->where('login_user','=',$login)->where('password_user','=',$password)->get();

            if(count($verify)!==0){
                $dtdlg->session()->put('login',$login);
                $dtdlg->session()->put('iduser',$verify[0]->id_user);
                $dtdlg->session()->put('photo',$verify[0]->photo_user);
                return redirect('/dashboard')->with('login_','Bienvenue Monsieur/Madame '.$login);
            }
        }
        return back()->with('error','Informations incorrectes !');
    }

    public function vsrch(){
        
        $sq = strip_tags(request()->input('q'));
        if(is_null($sq)){
            return back();
        }
        //-/ Entête - Footer
        $hnbarts = DB::table('articles')->count();
        $hnbvds = DB::table('videos')->count();
        $hnbpcs = $this->nbpcs();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = DB::table('publicites')->Where('blockpubid_pub',1)->Where('statutid_pub',2)->orderBy('id_pub','desc')->limit(3)->get();
        $fhs = DB::table('flashs')->Where('fhstatutid_flash',2)->orderBy('id_flash','desc')->limit(10)->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        //-// Entête - Footer

        $hcarts = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('title_article','LIKE','%'.$sq.'%')
        ->orWhere('desc_article','LIKE','%'.$sq.'%')
        ->orderBy('id_article','desc')
        ->paginate(35);

        $hrecarts = $this->recar(6);
        $hrecpcs = $this->phxpcs(5);
        // return $initHdFter;
        
        $newspg = $this->nwsPJ();
        $ilst = $this->ilst(6);
        $hspecials = $this->nwswldL0(14,19,22,23,24,2,1);
        // Streaming
        $hlives = $hances = " ";
        // Streaming
        $onglet='Resultat(s) de la Recherche de : '.$sq;
        $hpage = 'Recherche';
        $elm = $sq;
        // $hances = $this->hannonces();
        return view('contents.guests.searchpg',compact('newspg','hspecials','ilst','elm','hrecpcs','hrecarts','hnbpcs','hlives','hpage','hnbarts','hnbvds','hallarts','hallrbprins','hnbartsprinrub','onglet','pubs_a','fhs','hrbprins','hcarts','online','donline'));
    }
    
}