<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    
    public function adservices(){
    	
        $pgactive = "allservs";
        // 
        if(isset($_GET['sup'])&&!empty($_GET['sup'])){
            $sup = strip_tags($_GET['sup']);
            $hdelservs = Service::where('services.id','=',$sup)->delete();
            return back()->with('ok','Suppression éffectuée avec succès !');
        }
        if(isset($_GET['up'])&&!empty($_GET['up'])){
            $up = strip_tags($_GET['up']);
            // 
            $hupserv = Service::where('services.id','=',$up)->get(); 
            // 
            $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
            $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
            $hallusts = DB::table('alustatuts')->orderBy('id_alustatut','asc')->get();
            $pgactive = "upserv";
            $page = 'upserv';
            $onglet = 'Modification Service';
            return view('contents.apps.upserv',compact('hallusts','pgactive','page','hallrbprins','hallrbsecs','onglet','hupserv'));
        }
        $dsrch = "";
        if(isset($_GET['t_search'])&&!empty($_GET['t_search'])){
            $dsrch = strip_tags($_GET['t_search']);
            $hallservs = Service::where('title_service','LIKE','%'.$dsrch.'%')
            ->orderBy('id','desc')
            ->paginate(30);
        }elseif (isset($_GET['t_search'])&&empty($_GET['t_search'])) {
            $hallservs = Service::orderBy('id','desc')->paginate(7);
        }else{
            $hallservs = Service::orderBy('id','desc')->paginate(7);
             // insertion Table
             if ($hallservs->count()!=0) {
                $scpt = 0;
                $hallservshow[$scpt]= $hallservs[0];
             }
            // Insertion Table
        }
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $page = 'allservs';
        $onglet = 'Tous les services';
        // 
        return view('contents.apps.allservs',compact('pgactive','page','onglet','hallservs','dsrch','online','donline'));
    
    }
    // SERVICES
    public function adaddservice(){
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbsecs = DB::table('secondaryrubriques')->orderBy('id_secondrub','asc')->get();
        $online = $this->visitors_online();
        $donline = $this->d_visitors_online();
        $pgactive = "addserv";
        $page = 'addserv';
        $onglet = 'Mise à Jour Service';
        return view('contents.apps.addserv',compact('pgactive','page','hallrbprins','hallrbsecs','onglet','online','donline'));   
    }

    public function adinsservice(Request $datinsar){
        // return $datinsar;
        if($datinsar->validate([
        'img_service'=>'required|mimes:jpeg,jpg,png,gif,ico',
        'title_service'=>'required',
        'descrip_service'=>'required',
        'content_service'=>'required'
        ]))
        {
            $dif = date('myd');
            $dtinpr = $datinsar->input();
            if(strlen($dtinpr['title_service'])>=253){
                return back()->with('error','Echec d\'Ajout : Titre trop long !! Max : 253 Caractères.')->with('title_service', $dtinpr['title_service'])->with('descrip_service', $dtinpr['descrip_service'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('descrip_service', $dtinpr['descrip_service'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxtitle', 'ok');;
            }
            // Image
            $beginpath = $datinsar->file('img_service');
            //-- Control dimension d'Image  
            $filesize = @getimagesize($beginpath);

            if($filesize["0"]>1600&&$filesize["1"]>1600){
                return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_service', $dtinpr['title_service'])->with('descrip_service', $dtinpr['descrip_service'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('descrip_service', $dtinpr['descrip_service'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok'); 
            }

            if($filesize["0"]>1600){
                return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_service', $dtinpr['title_service'])->with('descrip_service', $dtinpr['descrip_service'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('descrip_service', $dtinpr['descrip_service'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok');
            }
            if($filesize["1"]>1600){
                return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_service', $dtinpr['title_service'])->with('descrip_service', $dtinpr['descrip_service'])->with('post_subtitle', $dtinpr['post_subtitle'])->with('post_prinrub', $dtinpr['post_prinrub'])->with('post_secondrub', $dtinpr['post_secondrub'])->with('descrip_service', $dtinpr['descrip_service'])->with('post_content', $dtinpr['post_content'])->with('post_fhstatut', $dtinpr['post_fhstatut'])->with('idxfile','ok');
            }
            //-- Control dimension d'Image 
            
            $newimgname ='_service_'.uniqid().'.'.$datinsar->file('img_service')->extension();
            $endpath = 'hphx/img/'.$newimgname;
            
            $slugpost = Str::of('service-'.$dtinpr['title_service'].'-'.$dif)->slug('-');
            // Image
            //-- / INSERTION DEV PROJECT
            if(!move_uploaded_file($beginpath,$endpath)){
                return back()->with('error','Echec d\'Ajout  !! Erreur de transfert de fichier.');
            }
            $insluart = Service::insert([
                'title_service' => $dtinpr['title_service'],
                'img_service' => $newimgname,
                'descrip_service' => $dtinpr['descrip_service'],
                'slug_service' => $slugpost,
                'content_service' => $dtinpr['content_service'],
            ]);
            
            return back()->with('ok','Service Ajouté avec succès !!');
        }else{
            return back()->with('error','Echec d\'Ajout  !! Erreur de Saisie.');
        }
    }

    public function adupdateservice(Request $datupar){
        if($datupar->validate([  
            'service_id'=>'required',
            'firstimg_service'=>'required',
            'title_service'=>'required',
            'descrip_service'=>'required',
            'content_service'=>'required'
        ]))
        {

            $dif = date('myd');
            $dtupar = $datupar->input();
            //-/ Control Number 1
            if(!empty($datupar->file('img_service'))){
                $beginpath = $datupar->file('img_service');
                //-- Control dimension d'Image  
                $filesize = @getimagesize($beginpath);

                if($filesize["0"]>1600&&$filesize["1"]>1600){
                    return back()->with('error','Votre image est trop grande : Largeur = ['.$filesize["0"].'] px, hauteur/Longueur = ['.$filesize["1"].'] px. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_service', $dtupar['title_service'])->with('descrip_service', $dtupar['descrip_service'])->with('idxfile','ok'); 
                }

                if($filesize["0"]>1600){
                    return back()->with('error','La Largeur ['.$filesize["0"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_service', $dtupar['title_service'])->with('descrip_service', $dtupar['descrip_service'])->with('idxfile','ok');
                }
                if($filesize["1"]>1600){
                    return back()->with('error','La hauteur/longueur ['.$filesize["1"].'] de l\'image est trop élevée. Les dimensions (maximales) requirent sont : - Largeur (maximale) = 1600px ; - hauteur/longueur (maximale) = 1600px')->with('title_service', $dtupar['title_service'])->with('descrip_service', $dtupar['descrip_service'])->with('idxfile','ok');
                }
                //-- Control dimension d'Image 
            
                $newimgname ='_service_'.uniqid().'.'.$datupar->file('img_service')->extension();
                $endpath = 'hphx/img/'.$newimgname; 
                $imgok = move_uploaded_file($beginpath,$endpath);
            }else{
                $newimgname = $dtupar['firstimg_service'];
            }
            $slugpost = Str::of('service-'.$dtupar['title_service'].'-'.$dif)->slug('-');
                //-- // INSERTION DEV postECT
            $uppost = Service::where('id', $dtupar['service_id'])
                ->update([
                'title_service' => $dtupar['title_service'],
                'img_service' => $newimgname,
                'descrip_service' => $dtupar['descrip_service'],
                'slug_service' => $slugpost,
                'content_service' => $dtupar['content_service'],
                'updated_at' => date('Y-m-d H:m:s')
            ]);
            //-- / UPDATED VALUE ORDER

            //-- / GETTING DEV PROJECT
            return back()->with('ok','Les Informations ont été Modifié avec succès !!');

        }
    }
    // SERVICES

}
