<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Offre;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Test\CodeCleaner\EmptyArrayDimFetchPassTest;

class GuestController extends Controller
{
    public function index() {

        //-/ Entête - Footer   
        $hnbarts = $this->artcount(); 
        $hnbvds = $this->vdscount();
        $hnbpcs = $this->nbpcs();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = $this->phxprinrub();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $fhs = $this->phxfsh();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        //-// Entête - Footer 

        //-/ Home - Content
        $hotarts = $this->recar(15);
        $hrandarts = $hotarts->random(15);
        // 
        // -// 12
        $hrecarts = $this->recar(22);
        $hcarous = $this->fstar(3);
        $hpbarticle = $this->pbrecar(1);
        $hluarticle = $this->lurecar(1);
        $hanvarticle = $this->anvrecar(1);
        $hartvws = $this->hvws(4);
        $hrdfoots = $this->recar(50);
        $hrandfts = $hrdfoots->random(4);
        // -// 12
        $heditoart = $this->nwscatL1(14,1); 
        $hpolart = $this->nwscatL1(1,1); 
        $hallpolarts = $this->nwscatL1(1,4);
        $hggart = $this->nwscatL1(2);
        $hecoart = $this->nwscatL1(2);
        $hallecoarts = $this->nwscatL1(2,5);
        $hsoart = $this->nwscatL1(3);
        $hallsoarts = $this->nwscatL1(3,3);
        $hcuart = $this->nwscatL1(4);
        $hallcuarts = $this->nwscatL1(4,4);
        $hspoart = $this->nwscatL1(5);
        $hallspoarts = $this->nwscatL1(5,3);
        $hhtart = $this->nwscatL1(4);
        $hactart = $this->nwscatL1(11);
        $hallactarts = $this->nwscatL1(11,5);
        $hfdart = $this->nwscatL1(2);
        $allhfdarts = $this->nwscatL1(2,5);
        $hedart = $this->nwscatL1(8);
        //
        $hafricanws = $this->nwscatL1(11);
        $hafnws2 = $this->nwscatL1(11,3);
        $hafnws3 = $this->nwscatL1(11,12);
        $heunws = $this->nwscatL1(12,5);
        $hamnws = $this->nwscatL1(14,5);
        $hasnws = $this->nwsAswld();
        $hwdlnws = $this->nwswldL1();
        $hwdlmns = $this->nwswldL0();
        $hinversnws = $this->nwscatL1(6);
        $hinvnms = $this->nwscatL1(6,4);
        //
        $heducart = $this->nwscatL1(20);
        $halleducarts = $this->nwscatL1(20,2);
        $hsteart = $this->nwscatL1(21);
        $hallstearts = $this->nwscatL1(21,4);
        // Vidéos
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(6);
        $hmainvds = $this->phxvds(8);
        // Radios   
        $hlastpc = $this->phxpcs(1);
        $hrecpcs = $this->phxpcs(6);
        // Recent Articles
        $hrrt = $this->recar(10);
        // Pub
        $pubs_a = $this->phxpub(1,2);
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(3,2);
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $pubs_i3 =  $this->phxpub(6,2);
        //-// Home - Content
        $newspg = $this->nwsPJ();
        //-//
        $ilst = $this->ilst(6);
        $hallpps = $this->phxjtpg();
        $hspecials = $this->nwswldL0(14,19,22,23,24,2,1);
        $elmshared = $this->elmsShareable();
        $imgshared = "logo-daoao-2.jpg";
        $onglet='Accueil';
        $hpage = 'home';
		return view('contents.guests.index',compact('hallpps','elmshared','imgshared','newspg','pubs_i3','ilst','hspecials','heditoart','hanvarticle','hluarticle','hpbarticle','hlastpc','hrecpcs','hnbpcs','hpage','hnbarts','hnbvds','hallarts','hallrbprins','hnbartsprinrub','onglet','hmainvds','pubs_a','fhs','hrbprins','hrecarts','hartvws','pubs_l1','pubs_l2','pubs_i1','pubs_i2','hpolart','hggart','hecoart','hsoart','hactart','hcuart','hspoart','hhtart','hfdart','hedart','hafricanws','hinversnws','hafnws2','hafnws3','heunws','hamnws','hasnws','hwdlmns','hinvnms','hwdlnws','heducart','hsteart','hallstearts','halleducarts','allhfdarts','hrandfts','hallspoarts','hallactarts','hallcuarts','hallecoarts','hallpolarts','hallsoarts','hlastvd','hrecvds','hrandarts','online','donline','hcarous'));
	}
    
    public function vallbreves(){
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('videos')->count();
        $hnbpcs = $this->nbpcs();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        $fhs = $this->phxfsh();
        $hbrvs = $this->phxfshpg();
        //-// Entête - Footer 
        // Vidéos
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(5);
        $hlastpc = $this->phxpcs(1);
        $hrecpcs = $this->phxpcs(5);
        // SideBar
        $hrecarts = $this->recar($lim=4);
        $heditoart = $this->nwscatL1(14,1); 
        $hpolart = $this->nwscatL1(1,1); 
        $hallpolarts = $this->nwscatL1(1,6);
        $hggart = $this->nwscatL1(2);
        $hecoart = $this->nwscatL1(3);
        $hsoart = $this->nwscatL1(4,1);
        $hcuart = $this->nwscatL1(5,1);
        $hspoart = $this->nwscatL1(6,1);
        $hhtart = $this->nwscatL1(4,1);
        $hactart = $this->nwscatL1(11,1);
        $hfdart = $this->nwscatL1(9,1);
        $hedart = $this->nwscatL1(8,1);
        $heducart = $this->nwssbcatL1(4,13);
        $hsteart = $this->nwssbcatL1(4,12);
        // Recent Articles

        //Sidebar Single Page - 
        $hpbarticle = $this->pbrecar(1);
        $hluarticle = $this->lurecar(1);
        $hanvarticle = $this->anvrecar(1);
        $heditoart = $this->nwscatL1(14,1); 
        // Sidebar Single Page - 

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
        // Pub 
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(3,2);
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $onglet = 'Liste des Journaux';
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        // 
        $newspg = $this->nwsPJ();
        $hspecials = $this->nwswldL0(14,19,22,23,24,2,1);
        // 
        $ilst = $this->ilst(6);
        $elmshared = $this->elmsShareable();
        $imgshared = "logo-daoao-2.jpg";
        $onglet='Brèves';
        $hpage = 'breves';
		return view('contents.guests.allbreves',compact('hnbarts','hnbvds','hnbpcs','elmshared','imgshared','newspg','ilst','hbrvs','hspecials','hpbarticle','hluarticle','hanvarticle','heditoart','hpage','hnbarts','hnbvds','hmainvds','hwdlmns','hinvnms','hartvws','hrandfts','hinversnws','hallarts','hallrbprins','hnbartsprinrub','onglet','hafricanws','pubs_a','fhs','hrbprins','pubs_l1','pubs_l2','pubs_i1','pubs_i2','hlastvd','hrecvds','hlastpc','hrecpcs','hpolart','hggart','hecoart','hsoart','hactart','hcuart','hspoart','hhtart','hfdart','hedart','heducart','hsteart','hrandarts','online','donline','hrecarts'));
    }
    
    public function valljts(){
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('videos')->count();
        $hnbpcs = $this->nbpcs();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        $fhs = $this->phxfsh();
        $hallpps = $this->phxjtpg();
        
        //-// Entête - Footer 
        // Vidéos
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(5);
        $hlastpc = $this->phxpcs(1);
        $hrecpcs = $this->phxpcs(5);
        // SideBar
        $hrecarts = $this->recar($lim=4);
        $heditoart = $this->nwscatL1(14,1); 
        $hpolart = $this->nwscatL1(1,1); 
        $hallpolarts = $this->nwscatL1(1,6);
        $hggart = $this->nwscatL1(2);
        $hecoart = $this->nwscatL1(3);
        $hsoart = $this->nwscatL1(4,1);
        $hcuart = $this->nwscatL1(5,1);
        $hspoart = $this->nwscatL1(6,1);
        $hhtart = $this->nwscatL1(4,1);
        $hactart = $this->nwscatL1(11,1);
        $hfdart = $this->nwscatL1(9,1);
        $hedart = $this->nwscatL1(8,1);
        $heducart = $this->nwssbcatL1(4,13);
        $hsteart = $this->nwssbcatL1(4,12);
        // Recent Articles

        //Sidebar Single Page - 
        $hpbarticle = $this->pbrecar(1);
        $hluarticle = $this->lurecar(1);
        $hanvarticle = $this->anvrecar(1);
        $heditoart = $this->nwscatL1(14,1); 
        // Sidebar Single Page - 

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
        // Pub 
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(3,2);
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $onglet = 'Liste des Journaux';
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        // 
        $newspg = $this->nwsPJ();
        $hspecials = $this->nwswldL0(14,19,22,23,24,2,1);
        // 
        $ilst = $this->ilst(6);
        $elmshared = $this->elmsShareable();
        $imgshared = "logo-daoao-2.jpg";
        $onglet='Journaux';
        $hpage = 'journaux';
		return view('contents.guests.allpapers',compact('hnbarts','hnbvds','hnbpcs','elmshared','imgshared','newspg','ilst','hallpps','hspecials','hpbarticle','hluarticle','hanvarticle','heditoart','hpage','hnbarts','hnbvds','hmainvds','hwdlmns','hinvnms','hartvws','hrandfts','hinversnws','hallarts','hallrbprins','hnbartsprinrub','onglet','hafricanws','pubs_a','fhs','hrbprins','pubs_l1','pubs_l2','pubs_i1','pubs_i2','hlastvd','hrecvds','hlastpc','hrecpcs','hpolart','hggart','hecoart','hsoart','hactart','hcuart','hspoart','hhtart','hfdart','hedart','heducart','hsteart','hrandarts','online','donline','hrecarts'));
    }

    function actualities()
    {
        $titlePage = 'Nos Actualités';
        $urlCurrent = 'actualities';
        $array_breadcumber = [$titlePage,$urlCurrent];
        $hnbarts = $this->artcount(); 
        $hnbvds = $this->vdscount();
        $hallarts = $this->hcarts();
        $hallvds = $this->hcvds();

        return view('contents.guests.actualities',compact('array_breadcumber','hallarts','hallvds','hnbarts','hnbvds'));
    }
    
	public function vallactus($rub){
	    $rub = strip_tags($rub);
        //-/ Entête - Footer  
        $hnbarts = $this->artcount(); 
        $hnbvds = $this->vdscount();
        $hnbpcs = $this->nbpcs();
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
        // Vidéos
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        //-Content
        $hprinarts = $this->hprinarts($rub);
        $hcarts = $this->hcarts($hprinarts[0]->id_prinrub,15);
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
        //
        $elmshared = $this->elmsShareable();
        $imgshared = "logo-daoao-2.jpg";
        //
        $onglet='Liste d\'articles de '.$hprinarts[0]->desig_prinrub;
        $hpage = $rub;
		return view('contents.guests.allactus',compact('elmshared','imgshared','hpage','hnbpcs','hnbarts','hartvws','hwdlmns','hinvnms','hrandfts','hnbvds','hwdlnws','hafnws2','hallarts','hallrbprins','hnbartsprinrub','hrecarts','onglet','pubs_a','fhs','hrbprins','rub','hcarts','online','donline','hinversnws','hafricanws','hmainvds'));
	}

    function svideos()
    {//-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('videos')->count();
        $hnbpcs = $this->nbpcs();
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
        //-// Entête - Footer // 
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
        // 
        $hcvds = DB::table('videos')
        ->join('users','users.id','=','videos.userid_video')
        ->select('videos.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_video','desc')
        ->paginate(9);
        //
        $elmshared = $this->elmsShareablevd();

        $imgshared = "logo-daoao-2.jpg";
        //
        $onglet = 'Liste de vidéos';
        $hpage = 'Daoao TV - Vidéos';

        return view('contents.guests.allvideos',compact('elmshared','imgshared','hpage','hnbpcs','hwdlmns','hinvnms','hnbarts','hartvws','hmainvds','hrandfts','hrecvds','hnbvds','hallarts','hallrbprins','hnbartsprinrub','onglet','pubs_a','fhs','hrbprins','hcvds','online','donline'));
    }

    public function vsgvd($vslug,$vip){
        $slug = strip_tags($vslug);
        $ip = strip_tags($vip);
        if(!is_numeric($ip)){ 
            return back();
        }
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('videos')->count();
        $hnbpcs = $this->nbpcs();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        $fhs = $this->phxfsh();
        //-// Entête - Footer 
        //-Content
        $hcvd = DB::table('videos')
        ->Where('slug_video',$slug)
        ->Where('id_video',$ip)
        ->orderBy('id_video','desc')
        ->limit(1)
        ->get();
        if(count($hcvd)==0){
            return back()->with('error','Aucune Vidéo ne correspond à votre requete');
        }
        // Number View Video
        $a_views = $hcvd[0]->view_video+1;
        $upview = DB::table('videos')->where('id_video', $hcvd[0]->id_video)->update(['view_video' => $a_views]);
        // Number View Video
        //
        $hrecarts = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->limit(4)->get();
        $hpolart = $this->nwscatL1(1,1);
        $hggart = $this->nwscatL1(2,1);
        $hecoart = $this->nwscatL1(3,1);
        
        $hsoart = $this->nwscatL1(4,1);
        $hcuart = $this->nwscatL1(5,1);
        $hspoart = $this->nwscatL1(6,1);
        $hhtart = $this->nwscatL1(4,1);
        $hactart = $this->nwscatL1(11,1);
        $hfdart = $this->nwscatL1(9,1);
        $hedart = $this->nwscatL1(8,1);
        $heducart = $this->nwssbcatL1(4,13);
        $hsteart = $this->nwssbcatL1(4,12);
        // Recent Articles
        $newspg = $this->nwsPJ();
        //Sidebar Single Page - 
        $hpbarticle = $this->pbrecar(1);
        $hluarticle = $this->lurecar(1);
        $hanvarticle = $this->anvrecar(1);
        $heditoart = $this->nwscatL1(14,1); 
        // Sidebar Single Page 
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
        $hrecvds = $this->phxvds(5);
        $hmainvds = $this->phxvds(8);
        $hlastpc = $this->phxpcs(1);
        $hrecpcs = $this->phxpcs(5);
        $halsoreads = $hrecvds->random(4);
        // Pub 
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(3,2);
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        $onglet = 'Daoao TV';
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $hpage = " Daoaotv ";
        //
        $elmshared = $this->elmsShareablevd($hcvd[0]);
        $imgshared = $hcvd[0]->image_video;
        //
        $slgsgpost = $slug;
		return view('contents.guests.sgvideo',compact('hnbpcs','elmshared','imgshared','newspg','hrecpcs','hlastpc','hpbarticle','hluarticle','hanvarticle','heditoart','hpage','hnbarts','hnbvds','hmainvds','hwdlmns','hinvnms','hartvws','hrandfts','hinversnws','hallarts','hallrbprins','hnbartsprinrub','onglet','hafricanws','pubs_a','fhs','hrbprins','hcvd','slgsgpost','pubs_l1','pubs_l2','pubs_i1','pubs_i2','halsoreads','hlastvd','hrecvds','hpolart','hggart','hecoart','hsoart','hactart','hcuart','hspoart','hhtart','hfdart','hedart','heducart','hsteart','hrandarts','online','a_views','donline','hrecarts'));
	}

    public function sradios(){
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('sradios')->count();
        $hnbpcs = $this->nbpcs();
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
        //-// Entête - Footer // 
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
        // 
        $hcpcs = DB::table('sradios')
        ->join('users','users.id','=','sradios.userid_sradio')
        ->select('sradios.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_sradio','desc')
        ->paginate(16);
        //
        $elmshared = $this->elmsShareablepc();
        $imgshared = "logo-daoao-2.jpg";
        //
        $onglet = 'Liste de vidéos';
        $hpage = 'Daoao TV - Vidéos';
        return view('contents.guests.allsradios',compact('elmshared','imgshared','hpage','hnbpcs','hwdlmns','hinvnms','hnbarts','hartvws','hmainvds','hrandfts','hrecvds','hnbvds','hallarts','hallrbprins','hnbartsprinrub','onglet','pubs_a','fhs','hrbprins','hcpcs','online','donline'));
    }

	public function vsgpc($vslug,$vip){
        $slug = strip_tags($vslug);
        $ip = strip_tags($vip);
        if(!is_numeric($ip)){ 
            return back();
        }
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('sradios')->count();
        $hnbpcs = $this->nbpcs();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = $this->phxprinrub();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = $this->phxpub(1,2);
        $fhs = $this->phxfsh();
        //-// Entête - Footer 
        //-Content
        $hcpc = DB::table('sradios')
        ->Where('slug_sradio',$slug)
        ->Where('id_sradio',$ip)
        ->orderBy('id_sradio','desc')
        ->limit(1)
        ->get();
        if(count($hcpc)==0){
            return back()->with('error','Aucun PodCast ne correspond à votre requete');
        }
        // Number View Video
        $a_views = $hcpc[0]->view_sradio+1;
        $upview = DB::table('sradios')->where('id_sradio', $hcpc[0]->id_sradio)->update(['view_sradio' => $a_views]);
        // Number View Video
        //
        $hrecarts = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->limit(4)->get();
        $hpolart = $this->nwscatL1(1,1);
        $hggart = $this->nwscatL1(2,1);
        $hecoart = $this->nwscatL1(3,1);
        
        $hsoart = $this->nwscatL1(4,1);
        $hcuart = $this->nwscatL1(5,1);
        $hspoart = $this->nwscatL1(6,1);
        $hhtart = $this->nwscatL1(4,1);
        $hactart = $this->nwscatL1(11,1);
        $hfdart = $this->nwscatL1(9,1);
        $hedart = $this->nwscatL1(8,1);
        $heducart = $this->nwssbcatL1(4,13);
        $hsteart = $this->nwssbcatL1(4,12);
        // Recent Articles

        //Sidebar Single Page - 
        $hpbarticle = $this->pbrecar(1);
        $hluarticle = $this->lurecar(1);
        $hanvarticle = $this->anvrecar(1);
        $heditoart = $this->nwscatL1(14,1); 
        // Sidebar Single Page 
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
        $hrecvds = $this->phxvds(5);
        $hmainvds = $this->phxvds(8);
        $hlastpc = $this->phxpcs(1);
        $hrecpcs = $this->phxpcs(5);
        $halsoreads = $hrecpcs->random(4);
        // Pub
        $newspg = $this->nwsPJ();
        // 
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(3,2);
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        //
        //
        $elmshared = $this->elmsShareablepc($hcpc[0]);
        $imgshared = $hcpc[0]->image_sradio;
        //
        $onglet = 'DAOAO';
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $hpage = " DAOAO - Radios ";
        $slgsgpost = $slug;
		return view('contents.guests.sgradio',compact('elmshared','imgshared','newspg','hrecpcs','hnbpcs','hlastpc','hpbarticle','hluarticle','hanvarticle','heditoart','hpage','hnbarts','hnbvds','hmainvds','hwdlmns','hinvnms','hartvws','hrandfts','hinversnws','hallarts','hallrbprins','hnbartsprinrub','onglet','hafricanws','pubs_a','fhs','hrbprins','hcpc','slgsgpost','pubs_l1','pubs_l2','pubs_i1','pubs_i2','halsoreads','hlastvd','hrecvds','hpolart','hggart','hecoart','hsoart','hactart','hcuart','hspoart','hhtart','hfdart','hedart','heducart','hsteart','hrandarts','online','a_views','donline','hrecarts'));
	}

    public function vallrcposts(){
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
        // Vidéos
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        //-Content
        $hcarts = $this->hallrecarts();
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
        //
        $newspg = $this->nwsPJ();
        //
        $elmshared = $this->elmsShareable();
        $imgshared = "logo-daoao-2.jpg";
        // 
        $onglet='Tous les Articles';
        $hpage = 'Tous les Articles';
        $rub = $onglet;
		return view('visitors.allpostsnc',compact('elmshared','imgshared','newspg','hpage','hnbarts','hartvws','hwdlmns','hinvnms','hrandfts','hnbvds','hwdlnws','hafnws2','hallarts','hallrbprins','hnbartsprinrub','hrecarts','onglet','pubs_a','fhs','hrbprins','rub','hcarts','online','donline','hinversnws','hafricanws','hmainvds'));
	}
    
    public function vallpostslst(){
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
        // Vidéos
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(20);
        $hmainvds = $this->phxvds(8);
        //-Content
        $hcarts = $this->halllastarts();
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
        //
        $newspg = $this->nwsPJ();
        //
        $elmshared = $this->elmsShareable();
        $imgshared = "logo-daoao-2.jpg";
        //
        $onglet='Les Plus Anciens Articles';
        $hpage = 'Les Plus Anciens Articles';
        $rub = $onglet;
		return view('visitors.allpostsnc',compact('elmshared','imgshared','newspg','hpage','hnbarts','hartvws','hwdlmns','hinvnms','hrandfts','hnbvds','hwdlnws','hafnws2','hallarts','hallrbprins','hnbartsprinrub','hrecarts','onglet','pubs_a','fhs','hrbprins','rub','hcarts','online','donline','hinversnws','hafricanws','hmainvds'));
	}

    function picalbums()
    {
        $titlePage = 'Notre Galérie Photos';
        $urlCurrent = 'photothèque';
        $array_breadcumber = [$titlePage,$urlCurrent];
        $hnbarts = $this->artcount(); 
        $hnbalbs = $this->albcount();
        $hallarts = $this->hcarts();
        $hallalbs = $this->hcalbs();

        return view('contents.guests.salbums',compact('array_breadcumber','hallarts','hallalbs','hnbarts','hnbalbs'));
    }

    function vdetlalb($slug,$ip)
    {
        $slug = strip_tags($slug);
        $ip = strip_tags($ip);
        if(!is_numeric($ip)){ 
            return back();
        }
        $hcalb = Album::Where('slug',$slug)->Where('id',$ip)->first();
        if(empty($hcalb)){
            return back()->with('error','Aucun Album ne correspond à votre requete');
        }
        $hallimgs = DB::table('galimgs')->where('galimgs.album_id','=',$hcalb->id)->get();
        
        $titlePage = 'Album-'.$hcalb->name;
        $parentTitlePage = 'Album-'.$hcalb->name;
        $urlCurrent = $hcalb->slug;
        $array_breadcumber = [$titlePage,$urlCurrent,$parentTitlePage];
        $sidelms = $this->sidelms();
        return view('contents.guests.detailalbum',compact('sidelms','array_breadcumber','hcalb','hallimgs'));
    }

    function vsgactu($rub,$slug,$ip)
    {
        $rub = strip_tags($rub);
        $slug = strip_tags($slug);
        $ip = strip_tags($ip);
        if(!is_numeric($ip)){ 
            return back();
        }
        //-/ Entête - Footer  
        $hnbarts = $this->artcount();
        $hnbvds = DB::table('videos')->count();
        $hnbpcs = $this->nbpcs();
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
        $hlastvd = $this->phxvds(1);
        $hrecvds = $this->phxvds(5);
        $hlastpc = $this->phxpcs(1);
        $hrecpcs = $this->phxpcs(5);
        // AlsoRead
        $halso = $this->nwscatL1($hprinart[0]->id_prinrub,8);
        // $halsoreads = $halso->random(4);
        $halsoreads = $this->nwscatL1($hprinart[0]->id_prinrub,8);
        // $halsoreads
        // SideBar
        $hrecarts = $this->recar($lim=4);
        $heditoart = $this->nwscatL1(14,1); 
        $hpolart = $this->nwscatL1(1,1); 
        $hallpolarts = $this->nwscatL1(1,6);
        $hggart = $this->nwscatL1(2);
        $hecoart = $this->nwscatL1(3);
        $hsoart = $this->nwscatL1(4,1);
        $hcuart = $this->nwscatL1(5,1);
        $hspoart = $this->nwscatL1(6,1);
        $hhtart = $this->nwscatL1(4,1);
        $hactart = $this->nwscatL1(11,1);
        $hfdart = $this->nwscatL1(9,1);
        $hedart = $this->nwscatL1(8,1);
        $heducart = $this->nwssbcatL1(4,13);
        $hsteart = $this->nwssbcatL1(4,12);
        // Recent Articles

        // Sidebar Single Page - 
        $hpbarticle = $this->pbrecar(1);
        $hluarticle = $this->lurecar(1);
        $hanvarticle = $this->anvrecar(1);
        $heditoart = $this->nwscatL1(14,1); 
        // Sidebar Single Page - 

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
        // Pub 
        $pubs_l1 =  $this->phxpub();
        $pubs_l2 =  $this->phxpub(3,2);
        $pubs_i1 =  $this->phxpub(4,2);
        $pubs_i2 =  $this->phxpub(5,2);
        //
        $newspg = $this->nwsPJ();
        $ilst = $this->ilst(6);
        $hspecials = $this->nwswldL0(14,19,22,23,24,2,1);
        //
        $elmshared = $this->elmsShareable($hcart[0]);
        $imgshared = $hcart[0]->image_article;
        //
        $onglet = $hcart[0]->title_article;
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $hpage = $rub;
        $slgsgpost = $slug;
        $sidelms = $this->sidelms();

		return view('contents.guests.sgactu',compact('elmshared','imgshared','newspg','ilst','hspecials','hpbarticle','hnbpcs','hluarticle','hanvarticle','heditoart','hpage','hnbarts','hnbvds','hmainvds','hwdlmns','hinvnms','hartvws','hrandfts','hinversnws','hallarts','hallrbprins','hnbartsprinrub','onglet','hafricanws','pubs_a','fhs','hrbprins','hcart','slgsgpost','pubs_l1','pubs_l2','pubs_i1','pubs_i2','hlastvd','hrecvds','hlastpc','hrecpcs','halsoreads','hpolart','hggart','hecoart','hsoart','hactart','hcuart','hspoart','hhtart','hfdart','hedart','heducart','hsteart','hrandarts','online','a_views','donline','hrecarts'));
	}

    function abouts()
    {
        $titlePage = 'A Propos de nous';
        $urlCurrent = 'abouts';
        $array_breadcumber = [$titlePage,$urlCurrent];

        return view('contents.guests.abouts',compact('array_breadcumber'));
    }

    function services()
    {
        $titlePage = 'Nos Services';
        $urlCurrent = 'services';
        $array_breadcumber = [$titlePage,$urlCurrent];
        $services = Service::first();

        return view('contents.guests.services',compact('services','array_breadcumber'));
    }
    
    function rejoins()
    {
        $titlePage = 'Nous-Rejoindre';
        $urlCurrent = 'rejoins';
        $array_breadcumber = [$titlePage,$urlCurrent];
        $jobs = Offre::join('typeoffres','typeoffres.id','=','offres.typeoffre_id')->orderBy('offres.id','desc')->limit(12)->get();

        return view('contents.guests.rejoins',compact('array_breadcumber','jobs'));
    }
    
    function vsgjob($slug,$ip)
    {
        $slug = strip_tags($slug);
        $ip = strip_tags($ip);
        if(!is_numeric($ip)){ 
            return back();
        }
        $hcof = Offre::join('typeoffres','typeoffres.id','=','offres.typeoffre_id')->Where('slug_offre',$slug)->Where('offres.id',$ip)->orderBy('offres.id','desc')->first();
        if(empty($hcof)){
            return back()->with('error','Aucun Offre ne correspond à votre requete');
        }
        // Number View offre
        $a_views = $hcof->view_offre+1;
        $upview = Offre::findOrfail($hcof->id)->update(['view_offre' => $a_views]);
        // Number View offre
        
        $titlePage = 'nos offres';
        $parentTitlePage = $hcof->title_offre;
        $urlCurrent = $hcof->slug_offre;
        $array_breadcumber = [$titlePage,$urlCurrent,$parentTitlePage];
        $sidelms = $this->sidelms();

        return view('contents.guests.sgjob',compact('sidelms','array_breadcumber','hcof'));
    }

    function contactus()
    {
         //-/ Entête - Footer  
         $hnbarts = $this->artcount();
         $hnbvds = DB::table('videos')->count();
         $hnbpcs = $this->nbpcs();
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
         //
         $elmshared = $this->elmsShareable();
         $imgshared = "logo-daoao-2.jpg";
         //
         $onglet='Contact';
         $hpage = 'contactp';
         return view('contents.guests.contactus',compact('hnbpcs','elmshared','imgshared','hpage','hnbarts','hnbvds','hallarts','hallrbprins','hnbartsprinrub','onglet','pubs_a','fhs','hrbprins','online','donline'));

    }
    
    function contentabout($slug,$id)
    {
        $slug = strip_tags($slug);
        $id = strip_tags($id);
        if(!is_numeric($id)){ 
            return back();
        }
        // 
        $hab = DB::table('abouts')->Where('slug_about',$slug)->Where('id_about',$id)->orderBy('id_about','desc')->first();
        if(empty($hab)){
            return back()->with('error','Aucune Information ne correspond à votre requete');
        }
        $titlePage = 'A Propos - '.$hab->title_about;
        $parentTitlePage = $hab->title_about;
        $urlCurrent = $hab->title_about;
        $array_breadcumber = [$titlePage,$urlCurrent,$parentTitlePage];
        // 
        return view('contents.guests.contentabout',compact('array_breadcumber','hab'));
    }

    function worddirector()
    {
        $titlePage = 'A Propos - Mot du Directeur';
        $parentTitlePage = 'Mot du Directeur';
        $urlCurrent = 'worddirector';
        $array_breadcumber = [$titlePage,$urlCurrent,$parentTitlePage];

        return view('contents.guests.worddirector',compact('array_breadcumber'));
    }
    
    function presentation()
    {
        $titlePage = 'A Propos - Présentation';
        $parentTitlePage = 'Présentation';
        $urlCurrent = 'presentation';
        $array_breadcumber = [$titlePage,$urlCurrent,$parentTitlePage];

        return view('contents.guests.presentation',compact('array_breadcumber'));
    }

    function valours()
    {
        $titlePage = 'A Propos - Valeurs et Politique';
        $parentTitlePage = 'Valeurs et Politique';
        $urlCurrent = 'valeurs-politique';
        $array_breadcumber = [$titlePage,$urlCurrent,$parentTitlePage];

        return view('contents.guests.valours',compact('array_breadcumber'));
    }

    function stories()
    {
        $titlePage = 'A Propos - Historique';
        $parentTitlePage = 'Historique';
        $urlCurrent = 'stories';
        $array_breadcumber = [$titlePage,$urlCurrent,$parentTitlePage];

        return view('contents.guests.stories',compact('array_breadcumber'));
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
