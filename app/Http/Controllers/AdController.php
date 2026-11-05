<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Offre;
use App\Models\Typeoffre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdController extends Controller
{
    public function vdashboard(){
            
            $pgactive = "Dashboard";
            // 
            $hnbarts = DB::table('articles')->count();
            $hnbvds = DB::table('videos')->count();
            $hnbusers = User::count();
            // 
            $hallusers = User::orderBy('id','desc')->get();
            $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
			// 
			$artrecs = DB::table('articles')
			->join('users','users.id','=','articles.userid_article')
			->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
			->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
			->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
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
            // Event's
            $hallanvarts = DB::table('ctranvs')
            ->select('ctranvs.*')
            ->orderBy('id_ctranv','desc')
            ->limit(5)
            ->get();
            // // insertion Table
            if ($hallanvarts->count()!=0) {
                $scpt = 0;
                $hallartshow[$scpt]= $hallanvarts[0];
            }
            // 
            $online = $this->visitors_online();
            $donline = $this->d_visitors_online();
            // visitors_online()
            $page = 'Dashboard';
            $onglet = 'Tableau de Board';
            return view('contents.apps.dashboard',compact('pgactive','page','onglet','hnbarts','hnbvds','hnbusers','hallusers','artrecs','hallanvarts','hallarts','hallrbprins','hnbartsprinrub','online','donline'));
    }

    public function adposts(){
    	
            $pgactive = "allposts";
            // 
   			if(isset($_GET['sup'])&&!empty($_GET['sup'])){
				$sup = strip_tags($_GET['sup']);
				$hdelarts = DB::table('articles')->where('articles.id_article','=',$sup)
        		->delete();
        		return back()->with('ok','Suppression éffectuée avec succès !');
			}
			if(isset($_GET['up'])&&!empty($_GET['up'])){
                $up = strip_tags($_GET['up']);
                // 
                $hupart = DB::table('articles')->where('articles.id_article','=',$up)
                ->get(); 
                // 
                $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
                $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
                $hallusts = DB::table('alustatuts')->orderBy('id_alustatut','asc')->get();
                
                // AJOUT : Récupération de la liste des rédacteurs pour la modification
                $hallredacteurs = DB::table('redacteurs')->orderBy('id_redacteur', 'asc')->get();

                $pgactive = "uppost";
                $page = 'uppost';
                $onglet = 'Modification article';
                
                // AJOUT : 'hallredacteurs' ajouté dans le compact
                return view('contents.apps.uppost', compact('hallusts','pgactive','page','hallrbprins','hallrbsecs','onglet','hupart','hallredacteurs'));
            }
			$dsrch = "";
			if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
				$dsrch = strip_tags($_GET['t_search']);
				
        		$hallarts = DB::table('articles')
        		->join('users','users.id','=','articles.userid_article')
        		->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        		->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        		->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
        		->where('articles.title_article','LIKE','%'.$dsrch.'%')
        		->orderBy('id_article','desc')
        		->paginate(30);
			}elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
				$hallarts = DB::table('articles')
        		->join('users','users.id','=','articles.userid_article')
        		->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        		->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        		->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
        		->orderBy('id_article','desc')
        		->paginate(7);
			}else{
			
            	$hallarts = DB::table('articles')
        		->join('users','users.id','=','articles.userid_article')
        		->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        		->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        		->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
        		->orderBy('id_article','desc')
        		->paginate(7);
	     		// // insertion Table
	         	if ($hallarts->count()!=0) {
	         		$scpt = 0;
	         		$hallartshow[$scpt]= $hallarts[0];
	         	}
	        		// Insertion Table
			}
        	$online = $this->visitors_online();
            $donline = $this->d_visitors_online();
        	$page = 'allposts';
            $onglet = 'Tous les articles';
            // 
	        return view('contents.apps.allposts',compact('pgactive','page','onglet','hallarts','dsrch','online','donline'));
	    
    }

    public function adtodayposts(){
    	
            $pgactive = "todayposts";
            $today=date("Y-m-d");
            // 
   			if(isset($_GET['sup'])&&!empty($_GET['sup'])){
				$sup = strip_tags($_GET['sup']);
				$hdelarts = DB::table('articles')->where('articles.id_article','=',$sup)
        		->delete();
        		return back()->with('ok','Suppression éffectuée avec succès !');
			}
			$dsrch = "";
			if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
				$dsrch = strip_tags($_GET['t_search']);
				
        		$hallarts = DB::table('articles')
        		->join('users','users.id','=','articles.userid_article')
        		->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        		->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        		->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
        		->where('articles.datepub_article',$today)
        		->where('articles.title_article','LIKE','%'.$dsrch.'%')
        		->orderBy('id_article','desc')
        		->paginate(30);
			}elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
				$hallarts = DB::table('articles')
        		->join('users','users.id','=','articles.userid_article')
        		->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        		->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        		->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
        		->where('articles.datepub_article',$today)
        		->orderBy('id_article','desc')
        		->paginate(7);
	     		
			}else{		
            	$hallarts = DB::table('articles')
        		->join('users','users.id','=','articles.userid_article')
        		->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        		->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        		->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
        		->where('articles.datepub_article',$today)
        		->orderBy('id_article','desc')
        		->paginate(7);
			}
        	$online = $this->visitors_online();
            $donline = $this->d_visitors_online();
        	$page = 'todayposts';
            $onglet = 'Les articles du Jour';
            // 
	            return view('contents.apps.todayposts',compact('pgactive','page','onglet','hallarts','dsrch','online','donline'));
	    
    }

public function adaddpost(){
        
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
        $hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
        $hallusts = DB::table('alustatuts')->orderBy('id_alustatut','asc')->get();
        
        // AJOUT : Récupération de la liste des rédacteurs
        $hallredacteurs = DB::table('redacteurs')->orderBy('id_redacteur', 'asc')->get();

        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addpost";
        $page = 'addpost';
        $onglet = 'Mise à Jour article';
        
        // AJOUT : 'hallredacteurs' ajouté dans compact()
        return view('contents.apps.addpost', compact('pgactive','page','hallrbprins','hallrbsecs','onglet','hallsts','hallusts','hallredacteurs','online','donline'));
        
    }

    public function adinspost(Request $datinsar){
    	
            if($datinsar->validate([
            'post_firstimg'=>'required|mimes:jpeg,jpg,png,gif,ico',
            'post_title'=>'required',
            'post_prinrub'=>'required',
            'post_content'=>'required'
            ]))
            {
            	$dif = date('myd');
                $dtinpr = $datinsar->input();
                if(strlen($dtinpr['post_title'])>=255){
                    return back()->with('error','Echec d\'Ajout : Titre trop long !! Max : 255 Caractères.')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_content', $dtinpr['post_content'])->with('title_english', $dtinpr['title_english'] ?? '')->with('desc_english', $dtinpr['desc_english'] ?? '')->with('content_english', $dtinpr['content_english'] ?? '')->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxtitle', 'ok');
                }
                // Image
                $beginpath = $datinsar->file('post_firstimg');
                //-- Control dimension d'Image  
                $filesize = @getimagesize($beginpath);

                if($filesize["0"]>1600&&$filesize["1"]>1600){
                   return back()->with('error','Votre image est trop grande...')->with('idxfile','ok'); 
                }

                $newimgname ='_article_'.uniqid().'.'.$datinsar->file('post_firstimg')->extension();
                $endpath = 'hphx/img/'.$newimgname;
                
                $slugpost = Str::of('article-'.$dtinpr['post_title'].'-'.$dif)->slug('-');
                
                if(!move_uploaded_file($beginpath,$endpath)){
                    return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
                }

                $insart = DB::table('articles')->insert([
                    'title_article' => $dtinpr['post_title'],
                    'image_article' => $newimgname,
                    'desc_article' => $dtinpr['post_chapo'],
                    'title_link_article' => $slugpost,
                    'slug_article' => $slugpost,
                    'imgsubtitle_article' => $dtinpr['post_subtitle'],
                    'prinrubid_article' => $dtinpr['post_prinrub'],
                    'content_article' => $dtinpr['post_content'],
                    // AJOUT DES CHAMPS ANGLAIS ICI :
                    'title_english' => $dtinpr['title_english'] ?? null,
                    'desc_english' => $dtinpr['desc_english'] ?? null,
                    'content_english' => $dtinpr['content_english'] ?? null,
                    'secondrubid_article' => 25,
                    'actustatutid_article' => 1,
                    'acturubid_article' => 6,
                    'alune_article' => $dtinpr['post_fhstatut'],
                    'userid_article' => Auth::user()->id,
                    // LIGNE À AJOUTER AVEC LE BON NOM D'INPUT (id_redacteur)
                    'redacteur_id' => $dtinpr['id_redacteur'] ?? null,
                    'datepub_article' => date('Y-m-d H:m:s')
                ]);
                
               if( $dtinpr['post_fhstatut'] == 2){
                    $insluart = DB::table('luarticles')->insert([
                        'title_luarticle' => $dtinpr['post_title'],
                        'image_luarticle' => $newimgname,
                        'desc_luarticle' => $dtinpr['post_chapo'],
                        'title_link_luarticle' => $slugpost,
                        'slug_luarticle' => $slugpost,
                        'imgsubtitle_luarticle' => $dtinpr['post_subtitle'],
                        'prinrubid_luarticle' => $dtinpr['post_prinrub'],
                        'content_luarticle' => $dtinpr['post_content'],
                        'secondrubid_luarticle' => 25,
                        'actustatutid_luarticle' => 1,
                        'acturubid_luarticle' => 6,
                        'userid_luarticle' => Auth::user()->id,
                        'datepub_luarticle' => date('Y-m-d H:m:s')
                    ]); 
               }

                return back()->with('ok','Projet Ajouté avec succès !!');
            }else{
               return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
            }
    }

    public function adupdatepost(Request $datupar){
        if($datupar->validate([  
            'post_id'=>'required',
            'post_imgfirst'=>'required',
            'post_title'=>'required',
            'post_prinrub'=>'required',
            'post_chapo'=>'required',
            'post_fhstatut'=>'required',
            'post_content'=>'required',
            'id_redacteur'=>'required' 
            ]))
            {

            $dif = date('myd');
            $dtupar = $datupar->input();
            
            if(!empty($datupar->file('post_firstimg'))){
                $beginpath = $datupar->file('post_firstimg');
                $newimgname ='_article_'.uniqid().'.'.$datupar->file('post_firstimg')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $dtupar['post_imgfirst'];
            }
            
            $slugpost = Str::of('article-'.$dtupar['post_title'].'-'.$dif)->slug('-');
                
            $uppost = DB::table('articles')
                ->where('id_article', $dtupar['post_id'])
                ->update([
                'title_article' => $dtupar['post_title'],
                'image_article' => $newimgname,
                'desc_article' => $dtupar['post_chapo'],
                'title_link_article' => $slugpost,
                'slug_article' => $slugpost,
                'imgsubtitle_article' => $dtupar['post_subtitle'],
                'prinrubid_article' => $dtupar['post_prinrub'],
                'content_article' => $dtupar['post_content'],
                // AJOUT DES CHAMPS ANGLAIS ICI AUSSI :
                'title_english' => $dtupar['title_english'] ?? null,
                'desc_english' => $dtupar['desc_english'] ?? null,
                'content_english' => $dtupar['content_english'] ?? null,
                'secondrubid_article' => 25,
                'alune_article' =>$dtupar['post_fhstatut'],
                'actustatutid_article' => 1,
                'acturubid_article' => 6,
                'redacteur_id' => $dtupar['id_redacteur'], 
                'datemodif_article' => date('Y-m-d H:m:s')
            ]);

            return back()->with('ok','Les Informations ont été Modifié avec succès !!');
        }
    }


    // - / PUB ARTICLE
    public function adpbposts(){
    	
        $pgactive = "allpbposts";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelarts = DB::table('pbarticles')->where('pbarticles.id_pbarticle','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupart = DB::table('pbarticles')->where('pbarticles.id_pbarticle','=',$up)
            ->get(); 
            // 
            $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
            $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
            $pgactive = "uppost";
            $page = 'uppost';
            $onglet = 'Modification article en Carrousel';
            return view('contents.apps.uppbpost',compact('pgactive','page','hallrbprins','hallrbsecs','onglet','hupart'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            
            $hallpbarts = DB::table('pbarticles')
            ->select('pbarticles.*')
            ->where('pbarticles.title_pbarticle','LIKE','%'.$dsrch.'%')
            ->orderBy('id_pbarticle','desc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallpbarts = DB::table('pbarticles')
            ->select('pbarticles.*')
            ->orderBy('id_pbarticle','desc')
            ->paginate(7);
        }else{
        
            $hallpbarts = DB::table('pbarticles')
            ->select('pbarticles.*')
            ->orderBy('id_pbarticle','desc')
            ->paginate(7);
            // // insertion Table
            if ($hallpbarts->count()!=0) {
                $scpt = 0;
                $hallartshow[$scpt]= $hallpbarts[0];
            }
                // Insertion Table
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allpbposts';
        $onglet = 'Tous les articles en Carrousel';
        // 
        return view('contents.apps.allpbposts',compact('pgactive','page','onglet','hallpbarts','dsrch','online','donline'));    
    }

    public function adtodaypbposts(){
    	
        $pgactive = "todayposts";
        $today=date("Y-m-d");
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelarts = DB::table('articles')->where('articles.id_article','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            
            $hallarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.datepub_article',$today)
            ->where('articles.title_article','LIKE','%'.$dsrch.'%')
            ->orderBy('id_article','desc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.datepub_article',$today)
            ->orderBy('id_article','desc')
            ->paginate(7);
            
        }else{		
            $hallarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.datepub_article',$today)
            ->orderBy('id_article','desc')
            ->paginate(7);
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'todayposts';
        $onglet = 'Les articles du Jour';
        // 
        return view('contents.apps.todayposts',compact('pgactive','page','onglet','hallarts','dsrch','online','donline'));
	
    }

    public function adaddpbpost(){
    	
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
        $hallrbgrd = DB::table('rubgrdgenres')->orderBy('id_rubgrdgenre','asc')->get();
        $hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addpbpost";
        $page = 'addpbpost';
        $onglet = 'Mise à Jour d\'articles en publicité';
        return view('contents.apps.addpbpost',compact('hallrbgrd','pgactive','page','hallrbprins','hallrbsecs','onglet','hallsts','online','donline'));
        
    }

    public function adinspbpost(Request $datinsar){
    	
        // return $datinsar;
        if($datinsar->validate([
        'post_firstimg'=>'required|mimes:jpeg,jpg,png,gif,ico',
        'post_title'=>'required',
        'post_content'=>'required',
        'post_datereading'=>'required'
        ]))
        {
            $dif = date('myd');
            // $iduser = Auth::user()->id}}
            $dtinpr = $datinsar->input();
            if(strlen($dtinpr['post_title'])>=253){
                return back()->with('error','Echec d\'Ajout : Titre trop long !! Max : 253 Caractères.')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxtitle', 'ok');;
            }
            // Image
            $beginpath = $datinsar->file('post_firstimg');
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 
            $newimgname ='_pbarticle_'.uniqid().'.'.$datinsar->file('post_firstimg')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            
            $slugpost = Str::of('pbarticle-'.$dtinpr['post_title'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }
            $insart = DB::table('pbarticles')->insert([
                'title_pbarticle' => $dtinpr['post_title'],
                'image_pbarticle' => $newimgname,
                'desc_pbarticle' => $dtinpr['post_title'],
                'title_link_pbarticle' => $slugpost,
                'slug_pbarticle' => $slugpost,
                'imgsubtitle_pbarticle' => $dtinpr['post_subtitle'],
                'content_pbarticle' => $dtinpr['post_content'],
                'userid_pbarticle' => Auth::user()->id,
                'type_pbarticle' => $dtinpr['post_rubgrd'],
                'datereading_pbarticle' => $dtinpr['post_datereading'],
                'datepub_pbarticle' => date('Y-m-d H:m:s')
            ]);
            // 
            return back()->with('ok','L\'article Carrousel a été Ajouté avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }

    }

    public function adupdatepbpost(Request $datupar){	
        if($datupar->validate([  
            'post_id'=>'required',
            'post_imgfirst'=>'required',
            'post_title'=>'required',
            // 'post_chapo'=>'required',
            'post_content'=>'required'
            // 'post_datereading'=>'required'
        ]))
        {

            $dif = date('myd');
            $dtupar = $datupar->input();
            //-/ Control Number 1
            if(!empty($datupar->file('post_firstimg'))){
                $beginpath = $datupar->file('post_firstimg');
                
                //-- Control dimension d'Image  
                $filesize = @getimagesize($beginpath);

                if($filesize["0"]>1600&&$filesize["1"]>1600){
                    return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok'); 
                }

                if($filesize["0"]>1600){
                    return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok');
                }
                if($filesize["1"]>1600){
                    return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok');
                }
                //-- Control dimension d'Image 
            
                $newimgname ='_pbarticle_'.uniqid().'.'.$datupar->file('post_firstimg')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $dtupar['post_imgfirst'];
            }
            $slugpost = Str::of('pbarticle-'.$dtupar['post_title'].'-'.$dif)->slug('-');
                //-- // INSERTION DEV postECT
            $uppost = DB::table('pbarticles')
                ->where('id_pbarticle', $dtupar['post_id'])
                ->update([
                'title_pbarticle' => $dtupar['post_title'],
                'image_pbarticle' => $newimgname,
                // 'desc_pbarticle' => $dtupar['post_chapo'],
                'title_link_pbarticle' => $slugpost,
                'slug_pbarticle' => $slugpost,
                'imgsubtitle_pbarticle' => $dtupar['post_subtitle'],
                'content_pbarticle' => $dtupar['post_content'],
                // 'datereading_pbarticle' => $dtupar['post_datereading'],
                'datemodif_pbarticle' => date('Y-m-d H:m:s')
            ]);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');

        }
    }
    // - // PUB ARTICLE
    
    // - / ANV CONTRIBUTION
    public function adanvposts(){
        $pgactive = "allanvposts";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelarts = DB::table('ctranvs')->where('ctranvs.id_ctranv','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupart = DB::table('ctranvs')->where('ctranvs.id_ctranv','=',$up)
            ->get(); 
            // 
            $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
            $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
            $pgactive = "upanvpost";
            $page = 'upanvpost';
            $onglet = 'Modification Evènement';
            return view('contents.apps.upanvpost',compact('pgactive','page','hallrbprins','hallrbsecs','onglet','hupart'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            
            $hallanvarts = DB::table('ctranvs')
            ->select('ctranvs.*')
            ->where('ctranvs.title_ctranv','LIKE','%'.$dsrch.'%')
            ->orderBy('id_ctranv','desc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallanvarts = DB::table('ctranvs')
            ->select('ctranvs.*')
            ->orderBy('id_ctranv','desc')
            ->paginate(7);
        }else{
        
            $hallanvarts = DB::table('ctranvs')
            ->select('ctranvs.*')
            ->orderBy('id_ctranv','desc')
            ->paginate(7);
            // // insertion Table
            if ($hallanvarts->count()!=0) {
                $scpt = 0;
                $hallartshow[$scpt]= $hallanvarts[0];
            }
                // Insertion Table
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allanvposts';
        $onglet = 'Historique Evènement';
        // 
        return view('contents.apps.allanvposts',compact('pgactive','page','onglet','hallanvarts','dsrch','online','donline'));
    }

    public function adtodayanvposts(){
    	
        $pgactive = "todayposts";
        $today=date("Y-m-d");
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelarts = DB::table('articles')->where('articles.id_article','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            
            $hallarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.datepub_article',$today)
            ->where('articles.title_article','LIKE','%'.$dsrch.'%')
            ->orderBy('id_article','desc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.datepub_article',$today)
            ->orderBy('id_article','desc')
            ->paginate(7);
            
        }else{		
            $hallarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.datepub_article',$today)
            ->orderBy('id_article','desc')
            ->paginate(7);
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'todayposts';
        $onglet = 'Les articles du Jour';
        // 
        return view('contents.apps.todayposts',compact('pgactive','page','onglet','hallarts','dsrch','online','donline'));

    }

    public function adaddanvpost(){
    	
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
        $hallrbgrd = DB::table('rubanvs')->orderBy('id_rubanv','asc')->get();
        $hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addanvpost";
        $page = 'addanvpost';
        $onglet = 'Mise à Jour Evènement';
        return view('contents.apps.addanvpost',compact('hallrbgrd','pgactive','page','hallrbprins','hallrbsecs','onglet','hallsts','online','donline'));
       
    }

    public function adinsanvpost(Request $datinsar){
    	
        // return $datinsar;
        if($datinsar->validate([
        'post_firstimg'=>'required|mimes:jpeg,jpg,png,gif,ico',
        'post_title'=>'required',
        'post_chapo'=>'required',
        'post_content'=>'required'
        ]))
        {
            $dif = date('myd');
            // $iduser = Auth::user()->id}}
            $dtinpr = $datinsar->input();
            if(strlen($dtinpr['post_title'])>=253){
                return back()->with('error','Echec d\'Ajout : Titre trop long !! Max : 253 Caractères.')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('idxtitle', 'ok');;
            }
            // Image
            $beginpath = $datinsar->file('post_firstimg');
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 
            $newimgname ='_ctranv_'.uniqid().'.'.$datinsar->file('post_firstimg')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            
            $slugpost = Str::of('ctranv-'.$dtinpr['post_title'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }
            $insart = DB::table('ctranvs')->insert([
                'title_ctranv' => $dtinpr['post_title'],
                'image_ctranv' => $newimgname,
                'desc_ctranv' => $dtinpr['post_chapo'],
                'title_link_ctranv' => $slugpost,
                'slug_ctranv' => $slugpost,
                'imgsubtitle_ctranv' => $dtinpr['post_subtitle'],
                'content_ctranv' => $dtinpr['post_content'],
                'userid_ctranv' => Auth::user()->id,
                'type_ctranv' => $dtinpr['post_rubgrd'],
                'datepub_ctranv' => date('Y-m-d H:m:s')
            ]);
            // 
            return back()->with('ok','L\'article Carrousel a été Ajouté avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
        
    }

    public function adupdateanvpost(Request $datupar){

        if($datupar->validate([  
            'post_id'=>'required',
            'post_imgfirst'=>'required',
            'post_title'=>'required',
            'post_chapo'=>'required',
            'post_content'=>'required'
            ]))
            {

            $dif = date('myd');
            $dtupar = $datupar->input();
            //-/ Control Number 1
            if(!empty($datupar->file('post_firstimg'))){
                $beginpath = $datupar->file('post_firstimg');
                
                //-- Control dimension d'Image  
                $filesize = @getimagesize($beginpath);

                if($filesize["0"]>1600&&$filesize["1"]>1600){
                    return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok'); 
                }

                if($filesize["0"]>1600){
                    return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok');
                }
                if($filesize["1"]>1600){
                    return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok');
                }
                //-- Control dimension d'Image 
            
                $newimgname ='_ctranv_'.uniqid().'.'.$datupar->file('post_firstimg')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $dtupar['post_imgfirst'];
            }
            $slugpost = Str::of('ctranv-'.$dtupar['post_title'].'-'.$dif)->slug('-');
                //-- // INSERTION DEV postECT
            $uppost = DB::table('ctranvs')
                ->where('id_ctranv', $dtupar['post_id'])
                ->update([
                'title_ctranv' => $dtupar['post_title'],
                'image_ctranv' => $newimgname,
                'desc_ctranv' => $dtupar['post_chapo'],
                'title_link_ctranv' => $slugpost,
                'slug_ctranv' => $slugpost,
                'imgsubtitle_ctranv' => $dtupar['post_subtitle'],
                'content_ctranv' => $dtupar['post_content'],
                'datemodif_ctranv' => date('Y-m-d H:m:s')
            ]);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');

        }

    }
    // - // ANV CONTRIBUTION
    // - A LA UNE
    public function adluposts(){
        $pgactive = "allluposts";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelluarts = DB::table('articles')->where('articles.id_article','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupart = DB::table('articles')->where('articles.id_article','=',$up)
            ->get(); 
            // 
            $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
            $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
            $pgactive = "uplupost";
            $page = 'uplupost';
            $onglet = 'Modification article';
            return view('contents.apps.uplupost',compact('pgactive','page','hallrbprins','hallrbsecs','onglet','hupart'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            
            $hallluarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.alune_article','=',2)
            ->where('articles.title_article','LIKE','%'.$dsrch.'%')
            ->orderBy('id_article','desc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallluarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.alune_article','=',2)
            ->orderBy('id_article','desc')
            ->paginate(7);
        }else{
        
            $hallluarts = DB::table('articles')
            ->join('users','users.id','=','articles.userid_article')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('articles.alune_article','=',2)
            ->orderBy('id_article','desc')
            ->paginate(7);
            if ($hallluarts->count()!=0) {
                $scpt = 0;
                $hallartshow[$scpt]= $hallluarts[0];
            }
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allluposts';
        $onglet = 'Historique de " A LA UNE " ';
        return view('contents.apps.allluposts',compact('pgactive','page','onglet','hallluarts','dsrch','online','donline'));
    }

    public function adtodayluposts(){	
        $pgactive = "todayluposts";
        $today=date("Y-m-d");
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelarts = DB::table('luarticles')->where('luarticles.id_luarticle','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            
            $hallarts = DB::table('luarticles')
            ->join('users','users.id','=','luarticles.userid_luarticle')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','luarticles.prinrubid_luarticle')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','luarticles.secondrubid_luarticle')
            ->select('articles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('luarticles.datepub_luarticle',$today)
            ->where('luarticles.title_luarticle','LIKE','%'.$dsrch.'%')
            ->orderBy('id_luarticle','desc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallarts = DB::table('luarticles')
            ->join('users','users.id','=','luarticles.userid_luarticle')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','luarticles.prinrubid_luarticle')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','luarticles.secondrubid_luarticle')
            ->select('luarticles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('luarticles.datepub_luarticle',$today)
            ->orderBy('id_luarticle','desc')
            ->paginate(7);
            
        }else{		
            $hallarts = DB::table('luarticles')
            ->join('users','users.id','=','luarticles.userid_luarticle')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','luarticles.prinrubid_luarticle')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','luarticles.secondrubid_luarticle')
            ->select('luarticles.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub','secondaryrubriques.desig_secondrub')
            ->where('luarticles.datepub_luarticle',$today)
            ->orderBy('id_luarticle','desc')
            ->paginate(7);
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'todayluposts';
        $onglet = 'Les articles du Jour';
        // 
        return view('contents.apps.todayluposts',compact('pgactive','page','onglet','hallarts','dsrch','online','donline'));
    }

    public function adaddlupost(){
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
        $hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addlupost";
        $page = 'addlupost';
        $onglet = 'Mise à Jour article';
        return view('contents.apps.addlupost',compact('pgactive','page','hallrbprins','hallrbsecs','onglet','hallsts','online','donline'));   
    }

    public function adinslupost(Request $datinsar){
        // return $datinsar;
        if($datinsar->validate([
        'post_firstimg'=>'required|mimes:jpeg,jpg,png,gif,ico',
        'post_title'=>'required',
        'post_prinrub'=>'required',
        'post_secondrub'=>'required',
        'post_chapo'=>'required',
        'post_content'=>'required'
        ]))
        {
            $dif = date('myd');
            // $iduser = Auth::user()->id}}
            $dtinpr = $datinsar->input();
            if(strlen($dtinpr['post_title'])>=253){
                return back()->with('error','Echec d\'Ajout : Titre trop long !! Max : 253 Caractères.')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxtitle', 'ok');;
            }
            // Image
            $beginpath = $datinsar->file('post_firstimg');
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtinpr['post_title'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('post_chapo', $dtinpr['post_chapo'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 
            
            $newimgname ='_luarticle_'.uniqid().'.'.$datinsar->file('post_firstimg')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            
            $slugpost = Str::of('luarticle-'.$dtinpr['post_title'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }
            $insluart = DB::table('luarticles')->insert([
                'title_luarticle' => $dtinpr['post_title'],
                'image_luarticle' => $newimgname,
                'desc_luarticle' => $dtinpr['post_chapo'],
                'title_link_luarticle' => $slugpost,
                'slug_luarticle' => $slugpost,
                'imgsubtitle_luarticle' => $dtinpr['post_subtitle'],
                'prinrubid_luarticle' => $dtinpr['post_prinrub'],
                'content_luarticle' => $dtinpr['post_content'],
                'secondrubid_luarticle' => $dtinpr['post_secondrub'],
                'actustatutid_luarticle' => 1,
                'acturubid_luarticle' => 6,
                'userid_luarticle' => Auth::user()->id,
                'datepub_luarticle' => date('Y-m-d H:m:s')
            ]);
            //
            $lastid = $this->aluId();
            $insart = DB::table('articles')->insert([
                'title_article' => $dtinpr['post_title'],
                'image_article' => $newimgname,
                'desc_article' => $dtinpr['post_chapo'],
                'title_link_article' => $slugpost,
                'slug_article' => $slugpost,
                'imgsubtitle_article' => $dtinpr['post_subtitle'],
                'prinrubid_article' => $dtinpr['post_prinrub'],
                'content_article' => $dtinpr['post_content'],
                'secondrubid_article' => $dtinpr['post_secondrub'],
                'actustatutid_article' => 1,
                'acturubid_article' => 6,
                'alune_article' =>$lastid[0]->id_luarticle,
                'userid_article' => Auth::user()->id,
                'datepub_article' => date('Y-m-d H:m:s')
            ]);
            
            return back()->with('ok','Projet Ajouté avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
    }

    public function adupdatelupost(Request $datupar){
        if($datupar->validate([  
            'post_id'=>'required',
            'post_imgfirst'=>'required',
            'post_title'=>'required',
            'post_prinrub'=>'required',
            'post_secondrub'=>'required',
            'post_chapo'=>'required',
            'post_content'=>'required'
        ]))
        {

            $dif = date('myd');
            $dtupar = $datupar->input();
            //-/ Control Number 1
            if(!empty($datupar->file('post_firstimg'))){
                $beginpath = $datupar->file('post_firstimg');
                
                //-- Control dimension d'Image  
                $filesize = @getimagesize($beginpath);

                if($filesize["0"]>1600&&$filesize["1"]>1600){
                    return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok'); 
                }

                if($filesize["0"]>1600){
                    return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok');
                }
                if($filesize["1"]>1600){
                    return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('post_title', $dtupar['post_title'])->with('post_chapo', $dtupar['post_chapo'])->with('post_subtitle', $dtupar['post_subtitle'])->with('idxfile','ok');
                }
                //-- Control dimension d'Image 
            
                $newimgname ='_luarticle_'.uniqid().'.'.$datupar->file('post_firstimg')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $dtupar['post_imgfirst'];
            }
            $slugpost = Str::of('article-'.$dtupar['post_title'].'-'.$dif)->slug('-');
                //-- // INSERTION DEV postECT
            $uppost = DB::table('luarticles')
                ->where('id_luarticle', $dtupar['post_id'])
                ->update([
                'title_luarticle' => $dtupar['post_title'],
                'image_luarticle' => $newimgname,
                'desc_luarticle' => $dtupar['post_chapo'],
                'title_link_luarticle' => $slugpost,
                'slug_luarticle' => $slugpost,
                'imgsubtitle_luarticle' => $dtupar['post_subtitle'],
                'prinrubid_luarticle' => $dtupar['post_prinrub'],
                'content_luarticle' => $dtupar['post_content'],
                'secondrubid_luarticle' => $dtupar['post_secondrub'],
                'actustatutid_luarticle' => 1,
                'acturubid_luarticle' => 6,
                // 'userid_article' => Auth::user()->id,
                'datemodif_luarticle' => date('Y-m-d H:m:s')
            ]);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');

        }
    }

    // - A LA UNE
    public function livesstreaming(){
    	
            $pgactive = "livesstreaming";
            // 
   			if(isset($_GET['sup'])&&!empty($_GET['sup'])){
				$sup = strip_tags($_GET['sup']);
				$hdelvds = DB::table('videos')->where('videos.id_video','=',$sup)->delete();
        		return back()->with('ok','Suppression éffectuée avec succès !');
			}
			if(isset($_GET['up'])&&!empty($_GET['up'])){
				$up = strip_tags($_GET['up']);
				// 
				$hupvd = DB::table('videos')->where('videos.id_video','=',$up)->get(); 
        		// 
	    		$pgactive = "upvideo";
				$page = 'upvideo';
	            $onglet = 'Modification vidéo';
	            return view('contents.apps.upvideo',compact('pgactive','page','onglet','hupvd'));
			}
			$dsrch = "";
			if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
				$dsrch = strip_tags($_GET['t_search']);
				
        		$hallvds = DB::table('videos')
        		->join('users','users.id','=','videos.userid_video')
        		->join('principalrubrique','principalrubrique.id_prinrub','=','videos.prinrubid_video')
        		->select('videos.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub')
        		->where('videos.title_video','LIKE','%'.$dsrch.'%')
                ->orWhere('videos.typevideo_id','LIKE',2)
        		->orderBy('id_video','desc')
        		->paginate(30);
		       	//	// Insertion Table
			}elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
				$hallvds = DB::table('videos')
        		->join('users','users.id','=','videos.userid_video')
        		->join('principalrubrique','principalrubrique.id_prinrub','=','videos.prinrubid_video')
        		->select('videos.*','users.id','users.name','users.lastename_user','users.firstname_user','principalrubrique.desig_prinrub')
                ->where('videos.typevideo_id','LIKE',2)
                ->orderBy('id_video','desc')
        		->paginate(7);
	     		
			}else{
			
            	$hallvds = DB::table('videos')
        		->join('users','users.id','=','videos.userid_video')
        		->select('videos.*','users.id','users.name','users.lastename_user','users.firstname_user')
        		->orderBy('id_video','desc')
                ->where('videos.typevideo_id','LIKE',2)
        		->paginate(7);
	        	
			}
            // return $hallvds;
        	$online = $this->visitors_online();
            $donline = $this->d_visitors_online();
        	$page = 'livesstreaming';
            $onglet = 'Toutes les directs';
            // 
	        return view('contents.apps.livesstreaming',compact('pgactive','page','onglet','hallvds','dsrch','online','donline'));
	   
    }

public function advideos(){
        
        $pgactive = "allvideos";
        
        // --- 1. SUPPRESSION ---
        if(isset($_GET['sup']) && !empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelvds = DB::table('videos')->where('videos.id_video','=',$sup)->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }

        // --- 2. MODIFICATION (REDIRECTION VERS LE FORMULAIRE UPVIDEO) ---
        if(isset($_GET['up']) && !empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupvd = DB::table('videos')->where('videos.id_video','=',$up)->get(); 
            // 
            
            // NOUVEAU : Récupérer la liste des reporters pour le formulaire de modification
            $reporters = DB::table('reporters')->orderBy('nom_reporter', 'asc')->get();

            $pgactive = "upvideo";
            $page = 'upvideo';
            $onglet = 'Modification vidéo';
            
            // Ajout de $reporters au compact
            return view('contents.apps.upvideo',compact('pgactive','page','onglet','hupvd', 'reporters'));
        }

        // --- 3. AFFICHAGE DE LA LISTE (AVEC OU SANS RECHERCHE) ---
        $dsrch = "";
        
        if(isset($_GET['t_search']) && !empty($_GET['t_search'])){
            // Avec Recherche
            $dsrch = strip_tags($_GET['t_search']);
            
            $hallvds = DB::table('videos')
            ->join('users','users.id','=','videos.userid_video')
            // NOUVEAU : On ajoute le leftJoin avec les reporters
            ->leftJoin('reporters', 'videos.reporter_id', '=', 'reporters.id_reporter') 
            ->select(
                'videos.*',
                'users.id',
                'users.name',
                'users.lastename_user',
                'users.firstname_user',
                'reporters.nom_reporter' // NOUVEAU
            )
            ->where('videos.title_video','LIKE','%'.$dsrch.'%')
            ->orderBy('id_video','desc')
            ->paginate(30);
            
        } elseif (isset($_GET['t_search']) && empty($_GET['t_search'])) {
            // Recherche soumise mais vide
            $hallvds = DB::table('videos')
            ->join('users','users.id','=','videos.userid_video')
            // NOUVEAU : On ajoute le leftJoin avec les reporters
            ->leftJoin('reporters', 'videos.reporter_id', '=', 'reporters.id_reporter')
            ->select(
                'videos.*',
                'users.id',
                'users.name',
                'users.lastename_user',
                'users.firstname_user',
                'reporters.nom_reporter' // NOUVEAU
            )
            ->orderBy('id_video','desc')
            ->paginate(7);
            
        } else {
            // Affichage par défaut (Sans recherche)
            $hallvds = DB::table('videos')
            ->join('users','users.id','=','videos.userid_video')
            // NOUVEAU : On ajoute le leftJoin avec les reporters
            ->leftJoin('reporters', 'videos.reporter_id', '=', 'reporters.id_reporter')
            ->select(
                'videos.*',
                'users.id',
                'users.name',
                'users.lastename_user',
                'users.firstname_user',
                'reporters.nom_reporter' // NOUVEAU
            )
            ->orderBy('id_video','desc')
            ->paginate(7);
        }

        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allvideos';
        $onglet = 'Toutes les vidéos';
        
        return view('contents.apps.allvideos',compact('pgactive','page','onglet','hallvds','dsrch','online','donline'));
    }


public function adaddvideo(){
        
            $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
            $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
            
            // NOUVEAU : Récupérer la liste des reporters pour la vue
            $reporters = DB::table('reporters')->orderBy('nom_reporter', 'asc')->get();

            $online = $this->visitors_online();
            $donline = $this->d_visitors_online();
            $pgactive = "addvideo";
            $page = 'addvideo';
            $onglet = 'Mise à Jour Vidéo';
            
            // NOUVEAU : Ajouter '$reporters' dans le compact()
            return view('contents.apps.addvideo', compact('pgactive', 'page', 'hallrbprins', 'hallrbsecs', 'reporters', 'onglet', 'online', 'donline'));
    }

    public function adinsvd(Request $datinsvd){
    	
        // return $datinsvd;
        if($datinsvd->validate([
        'vd_firstimg'=>'required|mimes:jpeg,jpg,png,gif,ico',
        'vd_title'=>'required',
        'vd_link'=>'required',
        'typevideo_id'=>'required'
        ]))
        {
            $dif = date('myd');
            // $iduser = Auth::user()->id}}
            $dtinvd = $datinsvd->input();
            // Image
            $beginpath = $datinsvd->file('vd_firstimg');
            $newimgname ='_video_'.uniqid().'.'.$datinsvd->file('vd_firstimg')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('vd_title', $dtinvd['vd_title'])->with('vd_link', $dtinvd['vd_link'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('vd_title', $dtinvd['vd_title'])->with('vd_link', $dtinvd['vd_link'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('vd_title', $dtinvd['vd_title'])->with('vd_link', $dtinvd['vd_link'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 

            $slugvd = Str::of('video-'.$dtinvd['vd_title'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }

            $insvd = DB::table('videos')->insert([
                'title_video' => $dtinvd['vd_title'],
                'image_video' => $newimgname,
                'linkyoutube_video' => $dtinvd['vd_link'],
                'slug_video' => $slugvd,
                'prinrubid_video' => 7,
                'typevideo_id' =>$dtinvd['typevideo_id'],
                'userid_video' => Auth::user()->id,
                'datepub_video' => date('Y-m-d')
            ]);
            return back()->with('ok','Vidéo Ajoutée avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
    }

public function adupdatevd(Request $datupvd){
        if($datupvd->validate([  
            'vd_id'=>'required',
            'vd_imgfirst'=>'required',
            'vd_title'=>'required',
            'vd_link'=>'required',
            'typevideo_id'=>'required'
            ]))
            {
            $dif = date('myd');
                // $iduser = Auth::user()->id}}
            $dtupvd = $datupvd->input();
            
            //-/ Control Number 1
            if(!empty($datupvd->file('vd_firstimg'))){
                $beginpath = $datupvd->file('vd_firstimg');
                $newimgname ='_video_'.uniqid().'.'.$datupvd->file('vd_firstimg')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $dtupvd['vd_imgfirst'];
            }
            
            //-- // INSERTION DEV vdECT
            $upvd = DB::table('videos')
                ->where('id_video', $dtupvd['vd_id'])
                ->update([
                'title_video' => $dtupvd['vd_title'],
                'image_video' => $newimgname,
                'linkyoutube_video' => $dtupvd['vd_link'],
                'prinrubid_video' => 7,
                'typevideo_id' =>$dtupvd['typevideo_id'],
                
                // === NOUVELLE LIGNE POUR LE REPORTER ===
                'reporter_id' => $dtupvd['reporter_id'] ?: null, 
                // =======================================
                
                'datemodif_video' => date('Y-m-d')
            ]);

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifiées avec succès !!');

        }
    }
    // A PROPOS - MOT DU DIRECTEUR, 
    
    public function adabouts(){
    	
        $pgactive = "allabouts";
        // 
           if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelvds = DB::table('abouts')->where('abouts.id_about','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupab = DB::table('abouts')->where('abouts.id_about','=',$up)->get(); 
            // 
            $pgactive = "upabout";
            $page = 'upabout';
            $onglet = 'Modification a propos';
            return view('contents.apps.upabout',compact('pgactive','page','onglet','hupab'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $hallpcs = DB::table('abouts')
            ->join('users','users.id','=','abouts.user_id')
            ->where('abouts.title_about','LIKE','%'.$dsrch.'%')
            ->orderBy('id_about','desc')
            ->paginate(30);

        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallpcs = DB::table('abouts')
            ->join('users','users.id','=','abouts.user_id')
            ->orderBy('id_about','desc')
            ->paginate(7);
        }else{
            $hallpcs = DB::table('abouts')
            ->join('users','users.id','=','abouts.user_id')
            ->orderBy('id_about','desc')
            ->paginate(7);  
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allabouts';
        $onglet = 'Tous les A Propos';
        // 
        return view('contents.apps.allabouts',compact('pgactive','page','onglet','hallpcs','dsrch','online','donline'));
   
    }

    public function adaddabout(){
        
            $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
            $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
            $online = $this->visitors_online();
            $donline = $this->d_visitors_online();
            $pgactive = "addabout";
            $page = 'addabout';
            $onglet = 'Mise à Jour A Propos';
            return view('contents.apps.addabout',compact('pgactive','page','hallrbprins','hallrbsecs','onglet','online','donline'));
    }

    public function adinsab(Request $datinsab){
    	
        // return $datinsab;
        if($datinsab->validate([
        'image_about'=>'required|mimes:jpeg,jpg,png,gif,ico,svg',
        'title_about'=>'required',
        'descrip_about'=>'required',
        ]))
        {
            $dif = date('myd');
            // $iduser = Auth::user()->id}}
            $dtinab = $datinsab->input();
            // Image
            $beginpath = $datinsab->file('image_about');
            $newimgname ='_about_'.uniqid().'.'.$datinsab->file('image_about')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_about', $dtinab['title_about'])->with('pc_link', $dtinab['pc_link'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_about', $dtinab['title_about'])->with('pc_link', $dtinab['pc_link'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_about', $dtinab['title_about'])->with('pc_link', $dtinab['pc_link'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 

            $slugab = Str::of('about-'.$dtinab['title_about'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }

            $insab = DB::table('abouts')->insert([
                'title_about' => $dtinab['title_about'],
                'descrip_about' => $dtinab['descrip_about'],
                'image_about' => $newimgname,
                'slug_about' => $slugab,
                'user_id' => Auth::user()->id,
                'created_at' => date('Y-m-d')
            ]);
            return back()->with('ok','la donnée ajoutée avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        } 
    }

    public function adupdateab(Request $datupab){
        if($datupab->validate([  
            'id_about'=>'required',
            'about_imgfirst'=>'required',
            'image_about'=>'nullable|mimes:jpeg,jpg,png,gif,ico,svg',
            'title_about'=>'required',
            'descrip_about'=>'required',
            ]))
            {

            $dif = date('myd');
            $dtupab = $datupab->input();
            //-/ Control Number 1
            if(!empty($datupab->file('image_about'))){
                $beginpath = $datupab->file('image_about');
                $newimgname ='_about_'.uniqid().'.'.$datupab->file('image_about')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
                
            }else{
                $newimgname = $dtupab['about_imgfirst'];
            }
                //-- // INSERTION DEV vdECT
            $upvd = DB::table('abouts')
                ->where('id_about', $dtupab['id_about'])
                ->update([
                'title_about' => $dtupab['title_about'],
                'descrip_about' => $dtupab['descrip_about'],
                'image_about' => $newimgname,
                'user_id' => Auth::user()->id,
                'updated_at' => date('Y-m-d')
            ]);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');
        }
    }

    // PARTENAIRES, 
    
    public function adpartens(){
    	
        $pgactive = "allpartens";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelvds = DB::table('partenaires')->where('partenaires.id_partenaire','=',$sup)->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']); 
            $huppart = DB::table('partenaires')->where('partenaires.id_partenaire','=',$up)->get();  
            $pgactive = "uppartenaire";
            $page = 'uppartenaire';
            $onglet = 'Modification du partenaire';
            return view('contents.apps.uppartenaire',compact('pgactive','page','onglet','huppart'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $hallparts = DB::table('partenaires')
            ->where('partenaires.name_partenaire','LIKE','%'.$dsrch.'%')
            ->orderBy('id_partenaire','desc')
            ->paginate(30);

        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallparts = DB::table('partenaires')
            ->orderBy('id_partenaire','desc')
            ->paginate(7);
        }else{
            $hallparts = DB::table('partenaires')
            ->orderBy('id_partenaire','desc')
            ->paginate(7);  
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allpartenaires';
        $onglet = 'Tous les partenaires';
        // 
        return view('contents.apps.allpartenaires',compact('pgactive','page','onglet','hallparts','dsrch','online','donline'));
   
    }

    public function adaddparten(){
        
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addpartenaire";
        $page = 'addpartenaire';
        $onglet = 'Mise à Jour Partenaire';
        return view('contents.apps.addpartenaire',compact('pgactive','page','hallrbprins','hallrbsecs','onglet','online','donline'));
        
    }

    public function adinspart(Request $datinspart){
    	
        // return $datinspart;
        if($datinspart->validate([
        'logo_partenaire'=>'required|mimes:jpeg,jpg,png,gif,ico,svg',
        'name_partenaire'=>'required',
        ]))
        {
            $dif = date('myd');
            // $iduser = Auth::user()->id}}
            $dtinpart = $datinspart->input();
            // Image
            $beginpath = $datinspart->file('logo_partenaire');
            $newimgname ='_partenaire_'.uniqid().'.'.$datinspart->file('logo_partenaire')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('name_partenaire', $dtinpart['name_partenaire'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('name_partenaire', $dtinpart['name_partenaire'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('name_partenaire', $dtinpart['name_partenaire'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 

            $slugpart = Str::of('partenaire-'.$dtinpart['name_partenaire'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }

            $inspart = DB::table('partenaires')->insert([
                'name_partenaire' => $dtinpart['name_partenaire'],
                'logo_partenaire' => $newimgname,
                'created_at' => date('Y-m-d')
            ]);
            return back()->with('ok','la donnée ajoutée avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        } 
    }

    public function adupdatepart(Request $datupab){
        if($datupab->validate([  
            'id_partenaire'=>'required',
            'partenaire_imgfirst'=>'required',
            'logo_partenaire'=>'nullable|mimes:jpeg,jpg,png,gif,ico,svg',
            'name_partenaire'=>'required',
            'link_partenaire'=>'nullable|url',
            ]))
            {

            $dif = date('myd');
            $dtupab = $datupab->input();
            //-/ Control Number 1
            if(!empty($datupab->file('logo_partenaire'))){
                $beginpath = $datupab->file('logo_partenaire');
                $newimgname ='_partenaire_'.uniqid().'.'.$datupab->file('logo_partenaire')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
                
            }else{
                $newimgname = $dtupab['partenaire_imgfirst'];
            }
                //-- // INSERTION DEV vdECT
            $upvd = DB::table('partenaires')
                ->where('id_partenaire', $dtupab['id_partenaire'])
                ->update([
                'name_partenaire' => $dtupab['name_partenaire'],
                'link_partenaire' => $dtupab['link_partenaire'],
                'logo_partenaire' => $newimgname,
                'updated_at' => date('Y-m-d')
            ]);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');
        }
    }

    // OFFRES
    
    public function adoffres(){
    	
        $pgactive = "alloffres";
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelofs = Offre::where('offres.id','=',$sup)->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupof = Offre::findOrfail($up); 
            // 
            $hallrbprins = Typeoffre::orderBy('id','asc')->get();
            $pgactive = "upoffre";
            $page = 'upoffre';
            $onglet = 'Modification de l\'Offre';
            return view('contents.apps.upoffre',compact('pgactive','page','hallrbprins','onglet','hupof'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $hallofs = Offre::join('typeoffres','typeoffres.id','=','offres.typeoffre_id')
            ->where('offres.title_offre','LIKE','%'.$dsrch.'%')
            ->orderBy('id','desc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallofs = Offre::join('typeoffres','typeoffres.id','=','offres.typeoffre_id')->orderBy('offres.id','desc')->paginate(7);
        }else{
            $hallofs = Offre::join('typeoffres','typeoffres.id','=','offres.typeoffre_id')->orderBy('offres.id','desc')->paginate(7);
            // insertion Table
            if ($hallofs->count()!=0) {
                $scpt = 0;
                $hallofshow[$scpt]= $hallofs[0];
            }
            // Insertion Table
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'alloffres';
        $onglet = 'Tous les offres';
        // 
        return view('contents.apps.alloffres',compact('pgactive','page','onglet','hallofs','dsrch','online','donline'));
    
    }

    public function adaddoffre(){
        
        $hallrbprins = Typeoffre::orderBy('id','asc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addoffre";
        $page = 'addoffre';
        $onglet = 'Mise à Jour offre';
        return view('contents.apps.addoffre',compact('pgactive','page','hallrbprins','onglet','online','donline'));
        
    }

    public function adinsoffre(Request $datinsar){
    
        if($datinsar->validate([
        'image_offre'=>'required|mimes:jpeg,jpg,png,gif,ico','svg',
        'title_offre'=>'required',
        'typeoffre_id'=>'required',
        'content_offre'=>'required'
        ]))
        {
            $dif = date('myd');
            $dtinpr = $datinsar->input();
            if(strlen($dtinpr['title_offre'])>=255){
                return back()->with('error','Echec d\'Ajout : Titre trop long !! Max : 255 Caractères.')->with('title_offre', $dtinpr['title_offre'])->with('desc_offre', $dtinpr['desc_offre'])->with('offre_subtitle', $dtinpr['offre_subtitle'])->with('offre_prinrub', $dtinpr['offre_prinrub'])->with('offre_secondrub', $dtinpr['offre_secondrub'])->with('desc_offre', $dtinpr['desc_offre'])->with('offre_content', $dtinpr['offre_content'])->with('offre_fhstatut', $dtinpr['offre_fhstatut'])->with('idxtitle', 'ok');;
            }
            // Image
            $beginpath = $datinsar->file('image_offre');
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
               return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_offre', $dtinpr['title_offre'])->with('desc_offre', $dtinpr['desc_offre'])->with('offre_subtitle', $dtinpr['offre_subtitle'])->with('offre_prinrub', $dtinpr['offre_prinrub'])->with('offre_secondrub', $dtinpr['offre_secondrub'])->with('desc_offre', $dtinpr['desc_offre'])->with('offre_content', $dtinpr['offre_content'])->with('offre_fhstatut', $dtinpr['offre_fhstatut'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_offre', $dtinpr['title_offre'])->with('desc_offre', $dtinpr['desc_offre'])->with('offre_subtitle', $dtinpr['offre_subtitle'])->with('offre_prinrub', $dtinpr['offre_prinrub'])->with('offre_secondrub', $dtinpr['offre_secondrub'])->with('desc_offre', $dtinpr['desc_offre'])->with('offre_content', $dtinpr['offre_content'])->with('offre_fhstatut', $dtinpr['offre_fhstatut'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_offre', $dtinpr['title_offre'])->with('desc_offre', $dtinpr['desc_offre'])->with('offre_subtitle', $dtinpr['offre_subtitle'])->with('offre_prinrub', $dtinpr['offre_prinrub'])->with('offre_secondrub', $dtinpr['offre_secondrub'])->with('desc_offre', $dtinpr['desc_offre'])->with('offre_content', $dtinpr['offre_content'])->with('offre_fhstatut', $dtinpr['offre_fhstatut'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 
            
            $dtinpr['image_offre'] = $newimgname ='_offre_'.uniqid().'.'.$datinsar->file('image_offre')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            
            $dtinpr['slug_offre'] = $slugoffre = Str::of('offre-'.$dtinpr['title_offre'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }
            $insof = Offre::create($dtinpr);
            return back()->with('ok','Projet Ajouté avec succès !!');
        }else{
           return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
    
    }

    public function adupdateoffre(Request $datupar){
        if($datupar->validate([  
            'id'=>'required',
            'offre_image'=>'required',
            'title_offre'=>'required',
            'typeoffre_id'=>'required',
            'desc_offre'=>'required',
            'content_offre'=>'required'
         ]))
         {

            $dif = date('myd');
            $dtupar = $datupar->input();
            //-/ Control Number 1
            if(!empty($datupar->file('image_offre'))){
                $beginpath = $datupar->file('image_offre');
                
                //-- Control dimension d'Image  
                $filesize = @getimagesize($beginpath);

                if($filesize["0"]>1600&&$filesize["1"]>1600){
                   return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_offre', $dtupar['title_offre'])->with('desc_offre', $dtupar['desc_offre'])->with('idxfile','ok'); 
                }
                if($filesize["0"]>1600){
                    return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_offre', $dtupar['title_offre'])->with('desc_offre', $dtupar['desc_offre'])->with('idxfile','ok');
                }
                if($filesize["1"]>1600){
                    return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_offre', $dtupar['title_offre'])->with('desc_offre', $dtupar['desc_offre'])->with('idxfile','ok');
                }
                //-- Control dimension d'Image 
                $newimgname ='_offre_'.uniqid().'.'.$datupar->file('image_offre')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $dtupar['offre_image'];
            }
            $dtupar['slug_offre'] = $slugoffre = Str::of('offre-'.$dtupar['title_offre'].'-'.$dif)->slug('-');
            $dtupar['image_offre'] = $newimgname;
             //-- // INSERTION DEV offreECT
            $upoffre = Offre::find($dtupar['id'])->update($dtupar);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');
        }
    
    }

    // Radios
    public function adradios(){
        $pgactive = "allradios";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelvds = DB::table('sradios')->where('sradios.id_sradio','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupvd = DB::table('sradios')->where('sradios.id_sradio','=',$up)
            ->get(); 
            // 
            $pgactive = "upradio";
            $page = 'upradio';
            $onglet = 'Modification vidéo';
            return view('contents.apps.upradio',compact('pgactive','page','onglet','hupvd'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            
            $hallpcs = DB::table('sradios')
            ->join('users','users.id','=','sradios.userid_sradio')
            ->select('sradios.*','users.id','users.login_user','users.lastename_user','users.firstname_user')
            ->where('sradios.title_sradio','LIKE','%'.$dsrch.'%')
            ->orderBy('id_sradio','desc')
            ->paginate(30);
            // // insertion Table
            //	// Insertion Table
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallpcs = DB::table('sradios')
            ->join('users','users.id','=','sradios.userid_sradio')
            ->select('sradios.*','users.id','users.login_user','users.lastename_user','users.firstname_user')
            ->orderBy('id_sradio','desc')
            ->paginate(7);
            
        }else{
        
            $hallpcs = DB::table('sradios')
            ->join('users','users.id','=','sradios.userid_sradio')
            ->select('sradios.*','users.id','users.login_user','users.lastename_user','users.firstname_user')
            ->orderBy('id_sradio','desc')
            ->paginate(7);
            
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allradios';
        $onglet = 'Tous les Podcasts';
        // 
        return view('contents.apps.allradios',compact('pgactive','page','onglet','hallpcs','dsrch','online','donline'));
    }

    public function adaddradio(){
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addradio";
        $page = 'addradio';
        $onglet = 'Mise à Jour radio';
        return view('contents.apps.addradio',compact('pgactive','page','hallrbprins','hallrbsecs','onglet','online','donline'));
    }

    public function adinspc(Request $datinspc){
        // return $datinsar;
        if($datinspc->validate(['pc_firstimg'=>'required|mimes:jpeg,jpg,png,gif,ico','pc_title'=>'required','pc_link'=>'required']))
        {
            $dif = date('myd');
            // $iduser = session()->get('iduser')}}
            $dtinpc = $datinspc->input();
            // Image
            $beginpath = $datinspc->file('pc_firstimg');
            $newimgname ='_podcast_'.uniqid().'.'.$datinspc->file('pc_firstimg')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('pc_title', $dtinpc['pc_title'])->with('pc_link', $dtinpc['pc_link'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('pc_title', $dtinpc['pc_title'])->with('pc_link', $dtinpc['pc_link'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('pc_title', $dtinpc['pc_title'])->with('pc_link', $dtinpc['pc_link'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 

            $slugpc = Str::of('podcast-'.$dtinpc['pc_title'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }

            $inspc = DB::table('sradios')->insert([
                'title_sradio' => $dtinpc['pc_title'],
                'image_sradio' => $newimgname,
                'linkpc_sradio' => $dtinpc['pc_link'],
                'slug_sradio' => $slugpc,
                'userid_sradio' => session()->get('iduser'),
                'datepub_sradio' => date('Y-m-d')
            ]);
            return back()->with('ok','Podcast Ajouté avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
    }

    public function adupdatepc(Request $datuppc){
        if($datuppc->validate([  
            'pc_id'=>'required',
            'pc_imgfirst'=>'required',
            'pc_title'=>'required',
            'pc_link'=>'required'
        ]))
        {

            $dif = date('myd');
            $dtuppc = $datuppc->input();
            //-/ Control Number 1
            if(!empty($datuppc->file('vd_firstimg'))){
                $beginpath = $datuppc->file('vd_firstimg');
                $newimgname ='_video_'.uniqid().'.'.$datuppc->file('vd_firstimg')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $dtuppc['vd_imgfirst'];
            }
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('pc_title', $dtuppc['pc_title'])->with('pc_link', $dtuppc['pc_link'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('pc_title', $dtuppc['pc_title'])->with('pc_link', $dtuppc['pc_link'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('pc_title', $dtuppc['pc_title'])->with('pc_link', $dtuppc['pc_link'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 
                //-- // INSERTION DEV vdECT
            $upvd = DB::table('sradios')
                ->where('id_sradio', $dtuppc['pc_id'])
                ->update([
                'title_sradio' => $dtuppc['pc_title'],
                'image_sradio' => $newimgname,
                'linkyoutube_sradio' => $dtuppc['pc_link'],
                'datemodif_sradio' => date('Y-m-d')
            ]);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');
        }
    }

    public function adflashs(){
    	
        $pgactive = "allflashs";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelfh = DB::table('flashs')->where('flashs.id_flash','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupfh = DB::table('flashs')->where('flashs.id_flash','=',$up)
            ->get(); 
            $hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
            // 
            $pgactive = "upflash";
            $page = 'upflash';
            $onglet = 'Modification de Brèves';
            return view('contents.apps.upflash',compact('pgactive','page','onglet','hupfh','hallsts'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $hallfhs = DB::table('flashs')
            ->join('users','users.id','=','flashs.userid_flash')
            ->join('fhstatuts','fhstatuts.id_fhstatut','=','flashs.fhstatutid_flash')
            ->select('flashs.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut')
            ->where('flashs.desig_flash','LIKE','%'.$dsrch.'%')
            ->orderBy('id_flash','desc')
            ->paginate(30);
            
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallfhs = DB::table('flashs')
            ->join('users','users.id','=','flashs.userid_flash')
            ->join('fhstatuts','fhstatuts.id_fhstatut','=','flashs.fhstatutid_flash')
            ->select('flashs.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut')
            ->orderBy('id_flash','desc')
            ->paginate(7);
        }else{
            $hallfhs = DB::table('flashs')
            ->join('users','users.id','=','flashs.userid_flash')
            ->join('fhstatuts','fhstatuts.id_fhstatut','=','flashs.fhstatutid_flash')
            ->select('flashs.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut')
            ->orderBy('id_flash','desc')
            ->paginate(7);
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allflashs';
        $onglet = 'Tous les Brèves';
        // 
        return view('contents.apps.allflashs',compact('pgactive','page','onglet','hallfhs','dsrch','online','donline'));
	   
    }

    public function adnwflashs(){
    	
        $pgactive = "nwflashs";
        // 
        if(isset($_GET['st'])&&!empty($_GET['st'])){
            $st = strip_tags($_GET['st']);
            
            $upfh = DB::table('flashs')
                ->where('id_flash', $st)
                ->update([
                'fhstatutid_flash' => 1
            ]);
            //-- / UPDATED STATUT

            return back()->with('ok','Statut Modifié avec succès ! (Voir tous les flashs)');
        }
        
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $hallfhs = DB::table('flashs')
            ->join('users','users.id','=','flashs.userid_flash')
            ->join('fhstatuts','fhstatuts.id_fhstatut','=','flashs.fhstatutid_flash')
            ->select('flashs.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut')
            ->where('flashs.fhstatutid_flash',2)
            ->where('flashs.desig_flash','LIKE','%'.$dsrch.'%')
            ->orderBy('id_flash','desc')
            ->paginate(30);
            
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallfhs = DB::table('flashs')
            ->join('users','users.id','=','flashs.userid_flash')
            ->join('fhstatuts','fhstatuts.id_fhstatut','=','flashs.fhstatutid_flash')
            ->select('flashs.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut')
            ->where('flashs.fhstatutid_flash',2)
            ->orderBy('id_flash','desc')
            ->paginate(7);
            
        }else{
        
            $hallfhs = DB::table('flashs')
            ->join('users','users.id','=','flashs.userid_flash')
            ->join('fhstatuts','fhstatuts.id_fhstatut','=','flashs.fhstatutid_flash')
            ->select('flashs.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut')
            ->where('flashs.fhstatutid_flash',2)
            ->orderBy('id_flash','desc')
            ->paginate(7);
            
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'nwflashs';
        $onglet = 'Les Brèves en ligne';
        // 
        return view('contents.apps.nwflashs',compact('pgactive','page','onglet','hallfhs','dsrch','online','donline'));
	   
    }

    public function adaddflash(){
    	
        $hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addflash";
        $page = 'addflash';
        $onglet = 'Mise à Jour des Brèves';
        return view('contents.apps.addflash',compact('pgactive','page','onglet','hallsts','online','donline'));
        
    }
    
    public function adinsfh(Request $datinsfh){
    	
        if($datinsfh->validate(['fh_title'=>'required','fh_statut'=>'required']))
        {
            $dif = date('myd');
            $dtinfh = $datinsfh->input();
            //-- / INSERTION FLASH
            $insfh = DB::table('flashs')->insert([
                'desig_flash' => $dtinfh['fh_title'],
                'fhstatutid_flash' => $dtinfh['fh_statut'],
                'userid_flash' => Auth::user()->id,
                'datedebut_flash' => date('Y-m-d')
            ]);
            return back()->with('ok','Brève Ajouté avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
        
    }

    public function adupdatefh(Request $datupfh){
        if($datupfh->validate([  
            'fh_id'=>'required',
            'fh_title'=>'required',
            'fh_statut'=>'required'
        ]))
        {
            $dif = date('myd');
            $dtupfh = $datupfh->input();
                //-- // INSERTION Flash
            $upfh = DB::table('flashs')
                ->where('id_flash', $dtupfh['fh_id'])
                ->update([
                'desig_flash' => $dtupfh['fh_title'],
                'fhstatutid_flash' => $dtupfh['fh_statut'],
                'userid_flash' => Auth::user()->id
            ]);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');
        }
    }

    public function adblocks(){
    	
        $pgactive = "allblocks";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelfh = DB::table('flashs')->where('flashs.id_flash','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupfh = DB::table('flashs')->where('flashs.id_flash','=',$up)
            ->get(); 
            $hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
            // 
            $pgactive = "upflash";
            $page = 'upflash';
            $onglet = 'Modification Brèves';
            return view('contents.apps.upflash',compact('pgactive','page','onglet','hupfh','hallsts'));
        }
        
        if(isset($_GET['bkpbs'])&&!empty($_GET['bkpbs'])){
            $bkpbs = strip_tags($_GET['bkpbs']);

            $hpbs = DB::table('publicites')->where('publicites.blockpubid_pub','=',$bkpbs)->where('publicites.statutid_pub','=',2)->get();
            if(count($hpbs)!=0){
                foreach($hpbs as $ps):
                    // if($ps->statutid_pub==2):
                        $pbs = DB::table('publicites')
                            ->where('id_pub', $ps->id_pub)
                            ->update([
                            'statutid_pub' => 1
                        ]);
                    // endif;
                endforeach;
            }else{
                return back()->with('error','Aucune Pub dans ce block pour le moment !');
            }
            //-- / UPDATED STATUT

            return back()->with('ok','Block vidé avec succès !');
        }

        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $hallbks = DB::table('blockspublicites')
            ->select('blockspublicites.*')
            ->where('blockspublicites.desig_blockpub','LIKE','%'.$dsrch.'%')
            ->orderBy('id_blockpub','asc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallbks = DB::table('blockspublicites')
            ->select('blockspublicites.*')
            ->orderBy('id_blockpub','asc')
            ->paginate(7);
            //	// Insertion Table
        }else{
        
            $hallbks = DB::table('blockspublicites')
            ->select('blockspublicites.*')
            ->orderBy('id_blockpub','asc')
            ->paginate(7);
            //	// Insertion Table
            
        }

        foreach($hallbks as $bks):
            $hnbbk[$bks->id_blockpub] = DB::table('publicites')->Where('statutid_pub',2)->Where('blockpubid_pub',$bks->id_blockpub)->count();
        endforeach;
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allblocks';
        $onglet = 'Toutes les Espaces Carrousels';
        // 
        return view('contents.apps.allblocks',compact('pgactive','page','onglet','hallbks','dsrch','hnbbk','online','donline'));
	   
    }

    public function adpubs(){
    	
            $pgactive = "allpubs";
            // 
   			if(isset($_GET['sup'])&&!empty($_GET['sup'])){
				$sup = strip_tags($_GET['sup']);
				$hdelpb = DB::table('publicites')
				->where('publicites.id_pub','=',$sup)
        		->delete();
        		return back()->with('ok','Suppression éffectuée avec succès !');
			}
			if(isset($_GET['up'])&&!empty($_GET['up'])){
				$up = strip_tags($_GET['up']);
				// 
				$huppb = DB::table('publicites')->where('publicites.id_pub','=',$up)
        		->get(); 
        		$hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
        		$hallbks = DB::table('blockspublicites')->select('blockspublicites.*')->orderBy('id_blockpub','asc')->get();
	            // 
	            foreach($hallbks as $bks):
	                $hnbbk[$bks->id_blockpub] = DB::table('publicites')->Where('statutid_pub',2)->Where('blockpubid_pub',$bks->id_blockpub)->count();
	            endforeach;
	            // 
        		// 
	    		$pgactive = "uppub";
				$page = 'uppub';
	            $onglet = 'Modification Carrousel';
	            return view('contents.apps.uppub',compact('pgactive','page','onglet','huppb','hallsts','hallbks','hnbbk'));
			}
			$dsrch = "";
			if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
				$dsrch = strip_tags($_GET['t_search']);
        		$hallpbs = DB::table('publicites')
        		->join('users','users.id','=','publicites.userid_pub')
        		->join('fhstatuts','fhstatuts.id_fhstatut','=','publicites.statutid_pub')
        		->join('blockspublicites','blockspublicites.id_blockpub','=','publicites.blockpubid_pub')
        		->select('publicites.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut','blockspublicites.desig_blockpub')
        		->where('blockspublicites.desig_blockpub','LIKE','%'.$dsrch.'%')
        		->orderBy('id_pub','desc')
        		->paginate(30);
		       	//	// Insertion Table
			}elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
				$hallpbs = DB::table('publicites')
        		->join('users','users.id','=','publicites.userid_pub')
        		->join('fhstatuts','fhstatuts.id_fhstatut','=','publicites.statutid_pub')
        		->join('blockspublicites','blockspublicites.id_blockpub','=','publicites.blockpubid_pub')
        		->select('publicites.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut','blockspublicites.desig_blockpub')
        		->orderBy('id_pub','desc')
        		->paginate(7);
			}else{
			
            	$hallpbs = DB::table('publicites')
        		->join('users','users.id','=','publicites.userid_pub')
        		->join('fhstatuts','fhstatuts.id_fhstatut','=','publicites.statutid_pub')
        		->join('blockspublicites','blockspublicites.id_blockpub','=','publicites.blockpubid_pub')
        		->select('publicites.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut','blockspublicites.desig_blockpub')
        		->orderBy('id_pub','desc')
        		->paginate(7);
			}

			$hallbks = DB::table('blockspublicites')->get();
			foreach($hallbks as $bks):
                $hnbbk[$bks->id_blockpub] = DB::table('publicites')->Where('statutid_pub',2)->Where('blockpubid_pub',$bks->id_blockpub)->count();
            endforeach;
        	$online = $this->visitors_online();
            $donline = $this->d_visitors_online();
        	$page = 'allpubs';
            $onglet = 'Toutes les publicités';
            // 
	            return view('contents.apps.allpubs',compact('pgactive','page','onglet','hallpbs','hallbks','hnbbk','dsrch','online','donline'));
	   
    }

    public function adnwpubs(){
    	
            $pgactive = "nwpubs";
            // 
   			if(isset($_GET['st'])&&!empty($_GET['st'])){
				$st = strip_tags($_GET['st']);
				
                $upfh = DB::table('publicites')
                 ->where('id_pub', $st)
                 ->update([
                    'statutid_pub' => 1
                ]);
                //-- / UPDATED STATUT

   			  	return back()->with('ok','Statut Modifié avec succès ! (Voir toutes les Carrousels)');
			}
			
			$dsrch = "";
			if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
				$dsrch = strip_tags($_GET['t_search']);
        		$hallpbs = DB::table('publicites')
        		->join('users','users.id','=','publicites.userid_pub')
        		->join('fhstatuts','fhstatuts.id_fhstatut','=','publicites.statutid_pub')
        		->join('blockspublicites','blockspublicites.id_blockpub','=','publicites.blockpubid_pub')
        		->select('publicites.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut','blockspublicites.desig_blockpub')
        		->where('blockspublicites.desig_blockpub','LIKE','%'.$dsrch.'%')
        		->orderBy('id_pub','desc')
        		->paginate(30);
	        	
			}elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
				$hallpbs = DB::table('publicites')
        		->join('users','users.id','=','publicites.userid_pub')
        		->join('fhstatuts','fhstatuts.id_fhstatut','=','publicites.statutid_pub')
        		->join('blockspublicites','blockspublicites.id_blockpub','=','publicites.blockpubid_pub')
        		->select('publicites.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut','blockspublicites.desig_blockpub')
        		->orderBy('id_pub','desc')
        		->paginate(7);
	     		
			}else{
			
            	$hallpbs = DB::table('publicites')
        		->join('users','users.id','=','publicites.userid_pub')
        		->join('fhstatuts','fhstatuts.id_fhstatut','=','publicites.statutid_pub')
        		->join('blockspublicites','blockspublicites.id_blockpub','=','publicites.blockpubid_pub')
        		->select('publicites.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.lib_fhstatut','blockspublicites.desig_blockpub')
        		->where('publicites.statutid_pub',2)
        		->orderBy('id_pub','desc')
        		->paginate(7);
	     		
			}
        	// 
        	$hallbks = DB::table('blockspublicites')->get();
			foreach($hallbks as $bks):
                $hnbbk[$bks->id_blockpub] = DB::table('publicites')->Where('statutid_pub',2)->Where('blockpubid_pub',$bks->id_blockpub)->count();
            endforeach;
        	// 
        	$online = $this->visitors_online();
            $donline = $this->d_visitors_online();
        	$page = 'nwpubs';
            $onglet = 'Toutes les Carrousels en Ligne';
            // 
	            return view('contents.apps.nwpubs',compact('pgactive','page','onglet','hallpbs','hallbks','hnbbk','dsrch','online','donline'));
	   
    }

    public function adaddpub(){
    	
            $hallsts = DB::table('fhstatuts')->orderBy('id_fhstatut','asc')->get();
            $hallbks = DB::table('blockspublicites')->select('blockspublicites.*')->orderBy('id_blockpub','asc')->get();
            // 
            foreach($hallbks as $bks):
                $hnbbk[$bks->id_blockpub] = DB::table('publicites')->Where('statutid_pub',2)->Where('blockpubid_pub',$bks->id_blockpub)->count();
            endforeach;
            // 
            $online = $this->visitors_online();
            $donline = $this->d_visitors_online();
            $pgactive = "addpub";
            $page = 'addpub';
            $onglet = 'Mise à Jour Carrousel';
            return view('contents.apps.addpub',compact('pgactive','page','onglet','hallsts','hallbks','hnbbk','online','donline'));
        
    }

    public function adinspb(Request $datinspb){
    	
            // return $datinsar;
            if($datinspb->validate([
            'pb_firstimg'=>'required|mimes:jpeg,jpg,png,gif,ico',
            'pb_statut'=>'required',
            'pb_block'=>'required'
            ]))
            {
            	$dif = date('myd');
                // $iduser = Auth::user()->id}}
                $dtinpb = $datinspb->input();
                // Image
                $beginpath = $datinspb->file('pb_firstimg');
                $newimgname ='_pub_'.uniqid().'.'.$datinspb->file('pb_firstimg')->extension();
                $endpath = 'hphx/img/'.$newimgname;
                // Image
                //-- / INSERTION DEV pbOJECT
                if(!move_uploaded_file($beginpath,$endpath)){
                    return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
                }

                $inspb = DB::table('publicites')->insert([
                    'image_pub' => $newimgname,
                    'linkdest_pub' => $dtinpb['pb_link'],
                    'pubcustid_pub' => 3,
                    'blockpubid_pub' => $dtinpb['pb_block'],
                    'userid_pub' => Auth::user()->id,
                    'statutid_pub' => $dtinpb['pb_statut'],
                    'datedebut_pub' => date('Y-m-d')
                ]);
                return back()->with('ok','Carrousel Ajoutée avec succès !!');
            }else{
               return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
            }
        
    }

    public function adupdatepb(Request $datuppb){

            if($datuppb->validate([  
            	'pb_id'=>'required',
            	'pb_imgfirst'=>'required',
            	'pb_statut'=>'required'
             ]))
             {

                 // $dif = Str::limit(uniqid(),4);
                $dif = date('myd');
                 // $iduser = Auth::user()->id}}
                $dtuppb = $datuppb->input();
                //-/ Control Number 1
                 // return $dataupded->file('project_img');isset($dataupded->file('project_img'))&&
                if(!empty($datuppb->file('pb_firstimg'))){
                    $beginpath = $datuppb->file('pb_firstimg');
                    $newimgname ='_pub_'.uniqid().'.'.$datuppb->file('pb_firstimg')->extension();
                    $endpath = 'hphx/img/'.$newimgname; 
                    $imgok = move_uploaded_file($beginpath,$endpath);
                }else{
                    $newimgname = $dtuppb['pb_imgfirst'];
                }
                 //-- // INSERTION DEV pbECT
                $uppb = DB::table('publicites')
                 ->where('id_pub', $dtuppb['pb_id'])
                 ->update([
                    'image_pub' => $newimgname,
                    'linkdest_pub' => $dtuppb['pb_link'],
                    'pubcustid_pub' => 3,
                    'blockpubid_pub' => $dtuppb['pb_block'],
                    'userid_pub' => Auth::user()->id,
                    'statutid_pub' => $dtuppb['pb_statut']
                ]);
                //-- / UPDATED VALUE ORDER

                //-- / GETTING DEV PROJECT
                return back()->with('ok','Les Informations ont été Modifié avec succès !!');
                
            }
    }
    
    public function adpictures(){
    	
        $pgactive = "allpictures";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelimgs = DB::table('galimgs')->where('galimgs.id_galimg','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $hallimgs = DB::table('galimgs')->orderBy('id_galimg','desc')->paginate(12);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallimgs = DB::table('galimgs')->orderBy('id_galimg','desc')->paginate(12);
        }else{
            $hallimgs = DB::table('galimgs')->orderBy('id_galimg','desc')->paginate(12);
            // // insertion Table
            if ($hallimgs->count()!=0) {
                $scpt = 0;
                $hallimgshow[$scpt]= $hallimgs[0];
            }
                // Insertion Table
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allpictures';
        $onglet = 'Tous les Images de la galérie';
        // 
        return view('contents.apps.allpictures',compact('pgactive','page','onglet','hallimgs','dsrch','online','donline'));  
    }
    public function adaddpicture(){
        
        $hallfcs = DB::table('types_users')->orderBy('id_type_user','asc')->get();
        $hallalb = Album::orderBy('id','desc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addpicture";
        $page = 'addpicture';
        $onglet = "Upload d'Images de la Galerie";
        return view('contents.apps.addpicture',compact('pgactive','page','onglet','hallfcs','hallalb','online','donline'));
        
    }
    
    public function adinspic(Request $datinspic){
        // return $datinspic;
        $ok = "Aucune image n'a été enregistrée !!";
        $lastimg = [];
        if($datinspic->validate(['pic_imgs'=>'required','pic_name'=>'required']))
        {
            
            $dif = date('myd');
            $dtinpic = $datinspic->input();
            // Begin Image d'Insertion
            $uploadDirectory = "hphx/img/";
            $validExtensions = ['jpg','jpeg','png','bmp','ico'];
            
            $message = $errorType = $errorSize = $errorImage = "";
            $sqlValues = "";
            $cptimg = 0;
            $elms = count($datinspic->pic_imgs); 
            if($elms>4){
                return back()->with('ok','Les Images sont beaucoup trop. Trois (3) images à chaque envoie !!');
            }  
            $host = request()->getHost();
            
            foreach($_FILES['pic_imgs']['tmp_name'] as $imageKey => $imageValue):
                $pic_img = $_FILES['pic_imgs']['name'][$imageKey];
                $pic_imgSize = $_FILES['pic_imgs']['size'][$imageKey];
                $beginpath = $_FILES['pic_imgs']['tmp_name'][$imageKey];
                $pic_imgType = pathinfo($uploadDirectory.$pic_img, PATHINFO_EXTENSION);

                if($pic_img != ''){
                    $newimgname ='_gal_'.uniqid().'.'.$pic_imgType; 
                    $endpath = 'hphx/img/'.$newimgname;
                    $linkimg = $host.'/'.$endpath;
                    $nameimg = Str::of($dtinpic['pic_name'].'-'.$newimgname.'-'.$dif)->slug('-');
                }else{
                    $newimgname ="";  
                    $errorImage .= "<span style='color: red;'>Image required ... </span>";
                }

                if($pic_imgSize > 102400000000){
                    $errorSize .= "<span style='color: red;'>Larg Image Size must be under 1 Mb... !</span>";
                }
                else if(!empty($pic_img) && !in_array($pic_imgType,$validExtensions)){
                    $errorType .= "<span style='color: red;'>File must be an Image...!</span>";
                }
                else if(empty($message)){
                    $sqlValues = " ('".$newimgname."'),";
                    $insertimg = move_uploaded_file($beginpath,$endpath);

                    $inspic = DB::table('galimgs')->insert([
                        'img_galimg' => $newimgname,
                        'link_galimg' => $linkimg,
                        'name_galimg' => $nameimg,
                        'userid_galimg' => Auth::user()->id,
                        'album_id' => $dtinpic['pic_album_id'],
                        'dateins_galimg' => date('Y-m-d')
                    ]);
                }
                $cptimg++;
            endforeach;
            $lastimg = DB::table('galimgs')->limit($cptimg)->orderBy('id_galimg','desc')->get();
            if(!empty($errorImage)&&!empty($errorSize)&&!empty($errorType)){
                $ok = $cptimg.'Image(s) enregistrée(s) <br>'.$errorImage.'<br>'.$errorSize.'<br>'.$errorType;
            }else{
                $ok = "Toutes les Images sont enregistrées avec succèss !!";
            }
            return back()->with('lastimg',$lastimg)->with('ok',$ok);
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
    }

    public function adupdatepic(Request $datuppic){
            if($datuppic->validate([  
            	'us_id'=>'required',
            	'us_imgfirst'=>'required',
	            'us_log'=>'required',
	            'us_lastename'=>'required',
	            'us_firstname'=>'required',
	            'us_contact'=>'required',
	            'us_mail'=>'required',
	            'us_pass'=>'required',
	            'us_conf'=>'required'
             ]))
             {

                
                $dif = date('myd');
                $dtuppic = $datuppic->input();
                //-/ Control Number 1
                if(!empty($datuppic->file('pic_firstimg'))){
                    $beginpath = $datuppic->file('pic_firstimg');
                    $newimgname ='_pub_'.uniqid().'.'.$datuppic->file('pic_firstimg')->extension();
                    $endpath = 'hphx/img/'.$newimgname; 
                    $imgok = move_uploaded_file($beginpath,$endpath);
                }else{
                    $newimgname = $dtuppic['pic_imgfirst'];
                }
                 //-- // INSERTION DEV picECT
                $uppic = DB::table('picers')
                 ->where('id_picer', $dtuppic['pic_id'])
                 ->update([
                    'photo_picer' => $newimgname,
                    'login_picer' => $dtuppic['pic_log'],
                    'password_picer' => $dtuppic['pic_pass'],
                    'lastename_picer' => $dtuppic['pic_lastename'],
                    'firstname_picer' => $dtuppic['pic_firstname'],
                    'email_picer' => $dtuppic['pic_mail'],
                    'contact_picer' => $dtuppic['pic_contact'],
                    'type_picer_id' => $dtuppic['pic_posit']
                ]);
                //-- / UPDATED VALUE ORDER

                //-- / GETTING DEV PROJECT
                return back()->with('ok','Les Informations ont été Modifié avec succès !!');
             
            }
        
        
    }
    // Album
    public function adallalbums(){
        $pgactive = "allalbums";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelimgs = DB::table('albums')->where('albums.id','=',$sup)
            ->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $halbums = DB::table('albums')->orderBy('id','desc')->paginate(12);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $halbums = DB::table('albums')->orderBy('id','desc')->paginate(12);
        }else{
            $halbums = Album::orderBy('id','desc')->paginate(12);
            // // insertion Table
            if ($halbums->count()!=0) {
                $scpt = 0;
                $halbumshow[$scpt]= $halbums[0];
            }
            // Insertion Table
        }
        if($halbums){
            foreach($halbums as $halb){
                $nbhal = DB::table('galimgs')->where('galimgs.album_id','=',$halb->id)->count();
                $halb->nb_pic = $nbhal;
            }
        }
        // return $halbums;
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allalbums';
        $onglet = 'Tous les albums photos';
        // 
        return view('contents.apps.allalbums',compact('pgactive','page','onglet','halbums','dsrch','online','donline')); 
    }
    
    public function adinsalbum(Request $datinsalb){
    	
        // return $datinsalb;
        $ok = "Aucun album n'a été enregistrée !!";
        $lastimg = [];
        if($datinsalb->validate(['img'=>'required','name'=>'required']))
        {
            
            $dif = date('myd');
            $dtinpic = $datinsalb->input();
            // Begin Image d'Insertion
            $uploadDirectory = "hphx/img/";
            $validExtensions = ['jpg','jpeg','png','bmp','ico'];
            
            $message = $errorType = $errorSize = $errorImage = "";
            $sqlValues = "";
            $cptimg = 0;
            // $elms = count($datinsalb->img);
            $elms = 1;  
            if($elms>4){
                return back()->with('ok','Le Image sont beaucoup trop.!!');
            }  
            $host = request()->getHost();
            
                $img = $_FILES['img']['name'];
                $imgSize = $_FILES['img']['size'];
                $beginpath = $_FILES['img']['tmp_name'];
                $imgType = pathinfo($uploadDirectory.$img, PATHINFO_EXTENSION);

                if($img != ''){
                    $newimgname ='_gal_'.uniqid().'.'.$imgType; 
                    $endpath = 'hphx/img/'.$newimgname;
                    $linkimg = $host.'/'.$endpath;
                    $nameimg = Str::of($dtinpic['name'].'-'.$newimgname.'-'.$dif)->slug('-');
                }else{
                  $newimgname ="";  
                  $errorImage .= "<span style='color: red;'>Image required ... </span>";
                }

                if($imgSize > 102400000000){
                    $errorSize .= "<span style='color: red;'>Larg Image Size must be under 1 Mb... !</span>";
                }
                else if(!empty($img) && !in_array($imgType,$validExtensions)){
                    $errorType .= "<span style='color: red;'>File must be an Image...!</span>";
                }
                else if(empty($message)){
                    $sqlValues = " ('".$newimgname."'),";
                    $insertimg = move_uploaded_file($beginpath,$endpath);

                    $inspic = DB::table('albums')->insert([
                        'img' => $newimgname,
                        'name' => $nameimg,
                        'user_id' => Auth::user()->id,
                        'created_at' => date('Y-m-d')
                    ]);
                }
                $cptimg++;
            $lastimg = DB::table('albums')->limit($cptimg)->orderBy('id','desc')->get();
            if(!empty($errorImage)&&!empty($errorSize)&&!empty($errorType)){
                $ok = $cptimg.'Image(s) enregistrée(s) <br>'.$errorImage.'<br>'.$errorSize.'<br>'.$errorType;
            }else{
                $ok = "L'album a été enregistré avec succèss !!";
            }
            return back()->with('lastimg',$lastimg)->with('ok',$ok);
        }else{
           return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
    
    }

    // Ima    
    public function adusers(){
    	
            $pgactive = "allusers";
            // 
   			if(isset($_GET['sup'])&&!empty($_GET['sup'])){
				$sup = strip_tags($_GET['sup']);
				if (Auth::user()->id==$sup) {
					$hdelus = User::where('users.id','=',$sup)->delete();
	        		return back()->with('ok','Suppression éffectuée avec succès !');
				}
	        		return back()->with('error','Suppression Impossible, vous n\'êtes pas l\'auteur !');
			}
			if(isset($_GET['up'])&&!empty($_GET['up'])){
				$up = strip_tags($_GET['up']);
				// 
				if (Auth::user()->id==$up) {
					$hupus = User::where('users.id','=',$up)->get(); 
	        		$hallfcs = DB::table('types_users')->orderBy('id_type_user','asc')->get();
		            // 
		    		$pgactive = "upuser";
					$page = 'upuser';
		            $onglet = 'Modification Utilisateur';
		            return view('contents.apps.upuser',compact('pgactive','page','onglet','hupus','hallfcs'));
		        }
	        	return back()->with('error','Modification Impossible, vous n\'êtes pas l\'auteur !');
			}
			$dsrch = "";
			if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
				$dsrch = strip_tags($_GET['t_search']);

        		$hallus = User::join('types_users','types_users.id_type_user','=','users.type_user_id')
        		->select('users.*','types_users.*')
        		->where('users.lastename_user','LIKE','%'.$dsrch.'%')
        		->orderBy('id','desc')
        		->paginate(30);
			}elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
				$hallus = User::join('types_users','types_users.id_type_user','=','users.type_user_id')
        		->select('users.*','types_users.*')
        		->orderBy('id','desc')
        		->paginate(7);
			}else{
            	$hallus = User::join('types_users','types_users.id_type_user','=','users.type_user_id')
        		->select('users.*','types_users.*')
        		->orderBy('id','desc')
        		->paginate(7);
			}
        	foreach($hallus as $u):
                $hnbart[$u->id] = DB::table('articles')->Where('userid_article',$u->id)->count();
                $hnbvd[$u->id] = DB::table('videos')->Where('userid_video',$u->id)->count();
            endforeach;	
            $online = $this->visitors_online();
            $donline = $this->d_visitors_online();
        	$hnbarts = DB::table('articles')->count();
        	$hnbvds = DB::table('videos')->count();

        	$page = 'allusers';
            $onglet = 'Toutes les Utilisateurs';
            // 
	        return view('contents.apps.allusers',compact('pgactive','page','onglet','hallus','dsrch','hnbart','hnbvd','hnbarts','hnbvds','online','donline'));
	   
    }

    public function adadduser(){
    	
        $hallfcs = DB::table('types_users')->orderBy('id_type_user','asc')->get();
        
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "adduser";
        $page = 'adduser';
        $onglet = 'Mise à Jour Utilisateur';
        return view('contents.apps.adduser',compact('pgactive','page','onglet','hallfcs','online','donline'));
        
    }

    public function ustore(Request $datinsus){
    	// return $datinsus;
        if($datinsus->validate([
            'profile_photo_path'=>'nullable|mimes:jpeg,jpg,png,gif,ico',
            'lastename_user'=>'required',
            'firstname_user'=>'required',
            'contact'=>'required',
            'email'=>'required',
            // 'password' => ['required','string','confirmed'],
            // 'passwordconf' => ['required', 'string','same:password'],
        ]))
        {
            $dif = date('myd');
            $dtinus = $datinsus->input();
            if($dtinus['password']!=$dtinus['passwordconf']){
                return back()->with('error','Echec d\'Ajout  !! le Mot de Pass et sa Confirmation ne sont pas Identique.');
            }
            // Image
            $beginpath = $datinsus->file('profile_photo_path');
            $newimgname ='_user_'.uniqid().'.'.$datinsus->file('profile_photo_path')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            // Image
            //-- / INSERTION DEV usOJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }

            $dtinus['profile_photo_path']=$newimgname;
            
            $insus = User::insert([
                'profile_photo_path' => $newimgname,
                'name' => $dtinus['email'],
                'password' => Hash::make($dtinus['password']),
                'lastename_user' => $dtinus['lastename_user'],
                'firstname_user' => $dtinus['firstname_user'],
                'email' => $dtinus['email'],
                'contact' => $dtinus['contact'],
                'type_user_id' => $dtinus['type_user_id'],
                'created_at' => date('Y-m-d')
            ]);
            return back()->with('ok','Utilisateur Ajouté avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
    }

    public function adupdateus(Request $datupus){
        
        if($datupus->validate([  
            'user_id'=>'required',
            'path_profile_photo'=>'nullable',
            'profile_photo_path'=>'nullable|mimes:jpeg,jpg,png,gif,ico,svg',
            'lastename_user'=>'required',
            'firstname_user'=>'required',
            'contact'=>'nullable',
            'email'=>'required',
            ]))
        {
            $dif = date('myd');
            $dtupus = $datupus->input();
            //-/ Control Number 1
            if(!empty($datupus->file('profile_photo_path'))){
                $beginpath = $datupus->file('profile_photo_path');
                $newimgname ='_user_'.uniqid().'.'.$datupus->file('profile_photo_path')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $datupus->input('path_profile_photo');
            }
            
            // return $datupus;
                //-- // INSERTION DEV usECT
            if(isset($dtupus['passwordconf'])&&!empty($dtupus['passwordconf'])){
                if(!empty($dtupus['password'])&&($dtupus['password']==$dtupus['passwordconf'])){
                    $pass = Hash::make($dtupus['password']);
                }else{
                    return back()->with('error','Mot de Passe et sa Confirmation ne sont pas identique !!');
                }
            }else{
                $us = User::findOrfail($dtupus['user_id']);
                $pass = $us->password; 
            }
            $dtupus['profile_photo_path'] = $newimgname;
            $dtupus['password'] = $pass;
            $upus = User::findOrfail($dtupus['user_id'])->update($dtupus);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');
        }
    }

    public function admyprofilus(){
        $hallfcs = DB::table('types_users')->orderBy('id_type_user','asc')->get();
        $huser = User::join('types_users','types_users.id_type_user','=','users.type_user_id')->first();
        
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "myprofil";
        $page = 'myprofil';
        $onglet = 'Mon Profile';
        return view('contents.apps.myprofil',compact('pgactive','page','onglet','hallfcs','huser','online','donline'));
    }

    // ==========================================
    // GESTION DES RÉDACTEURS
    // ==========================================

// Fonction pour lister les rédacteurs
    public function adallredacteurs() {

        $pgactive = "allredacteur"; 
        $page = 'allredacteur';
        // 1. On crée la variable attendue par le layout
        $onglet = "liste Rédacteurs";
        
        // On récupère tous les rédacteurs du plus récent au plus ancien
        $redacteurs = DB::table('redacteurs')->orderBy('id_redacteur', 'desc')->get();
        
        // 2. On ajoute 'onglet', 'pgactive' et 'page' dans le compact()
        return view('contents.apps.allredacteurs', compact('redacteurs', 'onglet', 'pgactive', 'page'));
    }

// 1. Afficher la page du formulaire
public function adaddredacteur(){
        
        // Variables potentiellement exigées par votre menu (Sidebar) et Layout
        $pgactive = "addredacteur"; 
        $page = 'addredacteur';
        $onglet = 'Ajouter Rédacteur'; // J'ai mis un vrai titre, comme "Mise à Jour article"
        
        // Si votre layout principal exige ABSOLUMENT de savoir qui est en ligne sur toutes les pages, 
        // décommentez les deux lignes ci-dessous :
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();

        // On retourne la vue avec toutes les variables nécessaires
        return view('contents.apps.addredacteur', compact('pgactive','page','onglet'));
    }

    // 2. Traiter l'enregistrement dans la base de données
    public function adinsredacteur(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'nom_redacteur' => 'required|string|max:255',
        'photo_redacteur' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'bio_redacteur' => 'nullable|string',
    ]);

    // Gestion de l'upload de la photo de profil
    $photoName = null;
    if ($request->hasFile('photo_redacteur')) {
        $image = $request->file('photo_redacteur');
        $photoName = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
        
        // Assurez-vous que le dossier public/uploads/redacteurs existe
        $image->move(public_path('uploads/redacteurs'), $photoName);
    }

    // Insertion dans la table redacteurs avec Query Builder
    DB::table('redacteurs')->insert([
        'nom_redacteur' => $request->input('nom_redacteur'),
        'photo_redacteur' => $photoName,
        'bio_redacteur' => $request->input('bio_redacteur'),
    ]);

    // Redirection avec un message de succès
    return redirect()->back()->with('success', 'Rédacteur enregistré avec succès !');
}

// METHODE POUR METTRE A JOUR LE REDACTEUR
    public function adupdredacteur(Request $request, $id)
    {
        // 1. Récupération du rédacteur
        $redacteur = DB::table('redacteurs')->where('id_redacteur', $id)->first();
        
        if (!$redacteur) {
            return redirect()->back()->with('error', 'Rédacteur introuvable.');
        }

        // 2. Préparation des données à mettre à jour
        $data = [
            'nom_redacteur' => $request->input('nom_redacteur'),
            'bio_redacteur' => $request->input('bio_redacteur')
        ];

        // 3. Gestion de l'image s'il y a une nouvelle photo
        if ($request->hasFile('photo_redacteur')) {
            $file = $request->file('photo_redacteur');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // On déplace la nouvelle image
            $file->move(public_path('uploads/redacteurs'), $filename);
            
            // On ajoute le nom de l'image au tableau de mise à jour
            $data['photo_redacteur'] = $filename;

            // Optionnel : tu peux ajouter ici un code pour supprimer l'ancienne image du dossier
            /*
            if (!empty($redacteur->photo_redacteur) && file_exists(public_path('uploads/redacteurs/'.$redacteur->photo_redacteur))) {
                unlink(public_path('uploads/redacteurs/'.$redacteur->photo_redacteur));
            }
            */
        }

        // 4. Exécution de la mise à jour (adapte le nom de ta table ou de ton Model si tu utilises Eloquent)
        DB::table('redacteurs')->where('id_redacteur', $id)->update($data);

        return redirect()->back()->with('success', 'Les informations du rédacteur ont été mises à jour.');
    }

    // METHODE POUR SUPPRIMER LE REDACTEUR
    public function addelredacteur($id)
    {
        // Optionnel : Supprimer la photo du dossier avant de supprimer en base
        /*
        $redacteur = DB::table('redacteurs')->where('id_redacteur', $id)->first();
        if ($redacteur && !empty($redacteur->photo_redacteur) && file_exists(public_path('uploads/redacteurs/'.$redacteur->photo_redacteur))) {
            unlink(public_path('uploads/redacteurs/'.$redacteur->photo_redacteur));
        }
        */

        // Suppression en base
        DB::table('redacteurs')->where('id_redacteur', $id)->delete();

        return redirect()->back()->with('success', 'Le rédacteur a été supprimé avec succès.');
    }



// 1. Afficher la liste de tous les reporters
public function adallreporters() {

    $pgactive = "allreporter"; 
    $page = 'allreporter';
    // 1. Variable attendue par le layout
    $onglet = "liste Reporters";

    // On récupère tous les reporters du plus récent au plus ancien
    $reporters = DB::table('reporters')
        ->orderBy('id_reporter', 'desc')
        ->get();

    // 2. On transmet toutes les variables au compact()
    return view('contents.apps.allreporters', compact('reporters', 'onglet', 'pgactive', 'page'));
}

// 2. Afficher le formulaire d'ajout d'un reporter
public function adaddreporter(){
    
    // Variables exigées par votre menu (Sidebar) et Layout
    $pgactive = "addreporter"; 
    $page = 'addreporter';
    $onglet = 'Ajouter Reporter';
    
    // Si votre layout principal exige de savoir qui est en ligne :
    $online = $this->visitors_online();
    $donline = $this->d_visitors_online();

    // Retourne la vue des reporters avec toutes les variables nécessaires
    return view('contents.apps.addreporter', compact('pgactive', 'page', 'onglet', 'online', 'donline'));
}

// 3. Enregistrer le nouveau reporter en BDD
public function adinsreporter(Request $request) {
    // Validation des données saisies
    $request->validate([
        'nom_reporter'   => 'required|string|max:255',
        'photo_reporter' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'bio_reporter'   => 'nullable|string',
    ], [
        'nom_reporter.required' => 'Le nom du reporter est obligatoire.',
        'photo_reporter.image'  => 'Veuillez sélectionner un fichier image valide.',
        'photo_reporter.mimes'  => 'Formats d\'image autorisés : jpeg, png, jpg, webp.',
        'photo_reporter.max'    => 'La taille de la photo ne doit pas dépasser 2 Mo.'
    ]);

    $fileName = null;

    // Traitement et sauvegarde de la photo dans public/images/reporters
    if ($request->hasFile('photo_reporter')) {
        $file = $request->file('photo_reporter');
        $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9\-.]/', '', $file->getClientOriginalName());
        $file->move(public_path('uploads/reporters'), $fileName);
    }

    // Insertion dans la table `reporters`
    DB::table('reporters')->insert([
        'nom_reporter'   => $request->nom_reporter,
        'photo_reporter' => $fileName,
        'bio_reporter'   => $request->bio_reporter,
        'created_at'     => now(),
        'updated_at'     => now(),
    ]);

    return redirect()->back()->with('success', 'Le reporter a été enregistré avec succès !');
}

public function adallnewsletters() {
    $pgactive = "newsletter"; 
    $page = 'newsletter';
    // Variable attendue par le layout
    $onglet = "Liste Abonnés Newsletter";

    // On récupère tous les abonnés de la newsletter du plus récent au plus ancien
    // L'utilisation de \DB permet d'éviter les erreurs si le composant n'est pas importé en haut du fichier
    $abonnees = \DB::table('newsletters')
        ->orderBy('id', 'desc')
        ->get();

    // On transmet toutes les variables à la vue
    return view('contents.apps.allnewsletters', compact('abonnees', 'onglet', 'pgactive', 'page'));
}


}
