<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller
{
    // Guest
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected function headerfooter(){
        //-/ Entête - Footer  
        $hnbarts = DB::table('articles')->count();
        $hnbvds = DB::table('videos')->count();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = DB::table('publicites')->Where('blockpubid_pub',1)->Where('statutid_pub',2)->orderBy('id_pub','desc')->limit(3)->get();
        $fhs = DB::table('flashs')->Where('fhstatutid_flash',2)->orderBy('id_flash','desc')->limit(10)->get();
        //-// Entête - Footer 

        return [$hnbarts,$hnbvds,$hallarts,$hrbprins,$hallrbprins,$hnbartsprinrub,$pubs_a,$fhs];
    }
    
    protected function visitors_online(){
        $time_session = 30;
        $time_actuel = date('U');
        $ip_user = $_SERVER['REMOTE_ADDR'];

        $ip_hasbeen = DB::table('tonlines')->Where('ip_tonline',$ip_user)->count();
        if($ip_hasbeen == 0){
            $add_ip = DB::table('tonlines')->insert([
                'time_tonline' => $time_actuel,
                'ip_tonline' => $ip_user
            ]);
        }else{
            $update_ip = DB::table('tonlines')
            ->where('ip_tonline', $ip_user)
            ->update([
                'time_tonline' => $time_actuel
            ]);
        }
        $session_del_time = $time_actuel - $time_session;
        $del_ip = DB::table('tonlines')->where('time_tonline','<',$session_del_time)->delete();

        return $ons = DB::table('tonlines')->count();
         // <!-- End Code -->
    }
    
    protected function d_visitors_online(){
        
        $ddate_session = date('Y-m-d');
        $dtime_session = 50000;
        $dtime_day = 50000; 
        $dtime_actuel = date('U');
        $dip_user = $_SERVER['REMOTE_ADDR'];

        $dip_hasbeen = DB::table('onlines')->Where('ip_online',$dip_user)->count();
        if($dip_hasbeen == 0){
            $dadd_ip = DB::table('onlines')->insert([
                'time_online' => $dtime_actuel,
                'ip_online' => $dip_user
            ]);
            // 
            // $day_del_time = $time_actuel - $time_day;
           
            // 
        }else{
            $dupdate_ip = DB::table('onlines')
            ->where('ip_online', $dip_user)
            ->update([
                'time_online' => $dtime_actuel
            ]);
        }
        
        $day_hasbeen = DB::table('donlines')->Where('day_donline','=',$ddate_session)->count();
        if($day_hasbeen == 0){
            $lastnb = DB::table('onlines')->count();
            $dadd_day = DB::table('donlines')->insert([
                'day_donline' => $ddate_session,
                'time_donline' =>$dtime_actuel,
                'nb_donline' => $lastnb
            ]);
            
            $ddvis = DB::table('onlines')->get();
            $ds_del_time = $dtime_actuel - $dtime_day;
            foreach($ddvis as $dv){
                $del_vi = DB::table('onlines')->where('id_online',$dv->id_online)->delete();
                // $del_vi = DB::table('onlines')->where('id_online',$dv->id_online)->where('time_online','<',$ds_del_time)->delete();
            }
        }
        
        $dsession_del_time = $dtime_actuel - $dtime_session;
        $ddel_ip = DB::table('onlines')->where('time_online','<',$dsession_del_time)->delete();

        return $dons = DB::table('onlines')->count();
         // <!-- End Code -->
    }
    protected function nwscatL1($prub,$lim=1){
        $nwscat1 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',$prub)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwscat1;
    }
    protected function parterns($lim=1){
        return $hallparts = DB::table('partenaires')
        ->orderBy('id_partenaire','desc')
        ->limit($lim)
        ->get();  
    }
    
    protected function nwswldL1($prub1=12,$prub2=13,$prub3=14,$prub4=15,$prub5=16,$lim=7){
        $nwswld1 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orWhere('prinrubid_article','=',$prub4)
        ->orWhere('prinrubid_article','=',$prub5)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwswld1;
    }
    protected function nwsenvdL1($prub1=4,$prub2=5,$lim=7){
        $nwsenvd1 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwsenvd1;
    }
    protected function nwsinovdL1($prub1=6,$prub2=7,$prub3=18,$lim=7){
        $nwsinovd1 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwsinovd1;
    }
    protected function nwswldL0($prub0=11,$prub1=12,$prub2=13,$prub3=14,$prub4=15,$prub5=16,$lim=3){
        $nwswld0 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub0)
        ->orWhere('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orWhere('prinrubid_article','=',$prub4)
        ->orWhere('prinrubid_article','=',$prub5)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwswld0;
    }
    protected function nwswldL2($prub0=11,$prub1=12,$prub2=13,$prub3=14,$prub4=15,$prub5=16,$pag=18){
        $nwswld2 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub0)
        ->orWhere('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orWhere('prinrubid_article','=',$prub4)
        ->orWhere('prinrubid_article','=',$prub5)
        ->orderBy('id_article','desc')
        ->paginate($pag);
        return $nwswld2;
    }
    protected function countnwswldL2($prub0=11,$prub1=12,$prub2=13,$prub3=14,$prub4=15,$prub5=16){
        $cnwswld2 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub0)
        ->orWhere('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orWhere('prinrubid_article','=',$prub4)
        ->orWhere('prinrubid_article','=',$prub5)
        ->orderBy('id_article','desc')
        ->count();
        return $cnwswld2;
    }

    protected function nwssbcatL1($prub,$sbrub,$lim=1){
        $nwssbcat1 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',$prub)
        ->Where('secondrubid_article',$sbrub)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwssbcat1;
    }
    protected function nwsAswld($prub1=13,$prub2=15,$prub3=16,$lim=3){
        $nwsAswld = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwsAswld;
    }
    protected function recar($lim=4){
        $hrecas = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $hrecas;
    }
    protected function popular($lim=4){
        $hrecas = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $hrecas;
    }
    protected function trecar($lim=2){
        $htrecas = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $htrecas;
    }
    protected function hvws($lim=4){
        $hvws = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('view_article','asc')
        ->limit($lim)
        ->get();
        return $hvws;
    }
    protected function phxpub($space=2,$statut=2,$lim=1){
        $phxpub = DB::table('publicites')
        ->Where('blockpubid_pub',$space)
        ->Where('statutid_pub',$statut)
        ->orderBy('id_pub','desc')
        ->limit($lim)
        ->get();
        return $phxpub;
    }
    protected function phxfsh($statut=2,$lim=10){
        $phxfsh = DB::table('flashs')
        ->Where('fhstatutid_flash',$statut)
        ->orderBy('id_flash','desc')
        ->limit($lim)
        ->get();
        return $phxfsh;
    }
    protected function phxvds_version1($lim=5){
        $phxvds = DB::table('videos')
        ->join('users','users.id','=','videos.userid_video')
        ->select('videos.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_video','desc')
        ->limit($lim)
        ->get();
        return $phxvds;
    }

protected function phxvds($lim=5){

    $phxvds = DB::table('videos')

    ->join('users','users.id','=','videos.userid_video')

    ->select(
        'videos.*',
        'users.id',
        'users.lastename_user',
        'users.firstname_user'
    )

    ->orderBy('id_video','desc')

    ->limit($lim)

    ->get();

    foreach($phxvds as $v){

    preg_match(
        '/(?:youtube\.com\/watch\?v=|youtu\.be\/)?([^&\n?#]+)/',
        $v->linkyoutube_video,
        $matches
    );

    $v->ytid = $matches[1] ?? $v->linkyoutube_video;

}

    return $phxvds;

}

    protected function artcount(){
        $artnb = DB::table('articles')->count();
        return $artnb;
    }
    protected function vdscount(){
        $vdsnb = DB::table('videos')->count();
        return $vdsnb;
    }
    protected function phxprinrub(){
        $prinphx =  DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        return $prinphx;
    }
    protected function hprinarts($rub,$lim=1){
        $hprinarts = DB::table('principalrubrique')
        ->Where('slug_prinrub',$rub)
        ->orderBy('id_prinrub','asc')
        ->limit($lim)
        ->get();
        if(count($hprinarts)==0){
            return back()->with('error','Categorie n\'existe pas');
        }
        return $hprinarts;
    }
    protected function hcarts($idrub,$pag=16){
        $hcarts = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',$idrub)
        ->orderBy('id_article','desc')
        ->paginate($pag);
        return $hcarts;
    }
    protected function hcartactus($pag=16){
        $hcartactus = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->paginate($pag);
        return $hcartactus;
    }
    
    protected function elmsShareable($cart=null){
        if($cart!=null){
            $titleshared=$cart->title_article;
            $descshared=$cart->desc_article;
            $imgshared = $cart->image_article;
        }else{
            $titleshared= "Green Media Africa ";
            $descshared="E-mail : greenmediaafrica@gmail.com | Contact : (+225) 27 34 77 56 66";
            $imgshared = 'logo_agri.jpg';
        }
        
        return [$titleshared,$descshared,$imgshared]; 
    }
    // Guest
// 
    protected function headerfooter_(){
        //-/ Entête - Footer   
        $hnbarts = DB::table('articles')->count();
        $hnbvds = DB::table('videos')->count();
        $hallarts = DB::table('articles')->orderBy('id_article','desc')->get();
        $hrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        $hallrbprins = DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        foreach($hallrbprins as $prin):
            $hnbartsprinrub[$prin->id_prinrub] = DB::table('articles')->Where('prinrubid_article',$prin->id_prinrub)->count();
        endforeach;
        $pubs_a = DB::table('publicites')->Where('blockpubid_pub',1)->Where('statutid_pub',2)->orderBy('id_pub','desc')->limit(3)->get();
        $fhs = DB::table('flashs')->Where('fhstatutid_flash',2)->orderBy('id_flash','desc')->limit(10)->get();
        //-// Entête - Footer 

        return [$hnbarts,$hnbvds,$hallarts,$hrbprins,$hallrbprins,$hnbartsprinrub,$pubs_a,$fhs];
    }
    
    protected function nwscatL1_($prub,$lim=1){
        $nwscat1 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',$prub)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        if(empty($nwscat1)){
            $nwscat1 = DB::table('articles')
            ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
            ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
            ->join('users','users.id','=','articles.userid_article')
            ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
            ->Where('prinrubid_article',$prub)
            ->orderBy('id_article','desc')
            ->get(); 
        }
        return $nwscat1;
    }
    protected function nwswldL1_($prub1=12,$prub2=13,$prub3=14,$prub4=15,$prub5=16,$lim=7){
        $nwswld1 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orWhere('prinrubid_article','=',$prub4)
        ->orWhere('prinrubid_article','=',$prub5)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwswld1;
    }
    protected function nwswldL0_($prub0=11,$prub1=12,$prub2=13,$prub3=14,$prub4=15,$prub5=16,$lim=6){
        $nwswld0 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub0)
        ->orWhere('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orWhere('prinrubid_article','=',$prub4)
        ->orWhere('prinrubid_article','=',$prub5)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwswld0;
    }
    protected function nwssbcatL1_($prub,$sbrub,$lim=1){
        $nwssbcat1 = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',$prub)
        ->Where('secondrubid_article',$sbrub)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwssbcat1;
    }
    protected function nwsAswld_($prub1=13,$prub2=15,$prub3=16,$lim=5){
        $nwsAswld = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article','=',$prub1)
        ->orWhere('prinrubid_article','=',$prub2)
        ->orWhere('prinrubid_article','=',$prub3)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwsAswld;
    }
    protected function nwsPJ($prub1=19,$lim=1){
        $nwsPJ = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('secondaryrubriques','secondaryrubriques.id_secondrub','=','articles.secondrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','secondaryrubriques.*','users.id','users.lastename_user','users.firstname_user')
        // ->Where('prinrubid_article','=',$prub1)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $nwsPJ;
    }
    protected function recar_($lim=4){
        $hrecas = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->where('alune_article',null)
        ->orwhere('alune_article',1)
        ->orwhere('articles.prinrubid_article','<>',14)
        ->limit($lim)
        ->get();
        return $hrecas;
    }
    protected function fstar($lim=1){
        $hrecas = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->where('alune_article',null)
        ->orwhere('alune_article',1)
        ->limit($lim)
        ->get();
        return $hrecas;
    }
    protected function hallrecarts(){
        $hallrecas = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_article','desc')
        ->paginate(12);
        return $hallrecas;
    }
    protected function hsrcharts($vsq){
        $hsrcharts = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->where('articles.title_article','like',$vsq)
        ->orWhere('articles.desc_article','like',$vsq)
        ->orWhere('articles.content_article','like',$vsq)
        ->orderBy('id_article','desc')
        ->paginate(40);
        return $hsrcharts;
    }
    
    protected function halllastarts(){
        $hsqsa = DB::table('articles')->select('articles.id_article')->orderBy('id_article','desc')->limit(22)->get();
        $av = $hsqsa[21]->id_article; $bv = $hsqsa[0]->id_article;
        $halllastas = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->whereNotBetween('id_article', [$av,$bv])
        ->orderBy('id_article','desc')
        ->paginate(12);
        return $halllastas;
    }
    protected function pbrecar($lim=4){
        $hpbrecas = DB::table('pbarticles')
        ->join('rubgrdgenres','rubgrdgenres.id_rubgrdgenre','=','pbarticles.type_pbarticle')
        ->select('pbarticles.*','rubgrdgenres.*')
        ->orderBy('id_pbarticle','desc')
        ->limit($lim)
        ->get();
        return $hpbrecas;
    }

    protected function lurecar($lim=1){
        $hlurecas = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->where('alune_article',2)
        ->orderBy('id_article','desc')
        ->limit($lim)
        ->get();
        return $hlurecas;
    }
    protected function aluId(){
        $aluid = DB::table('luarticles')
        ->select('luarticles.id_luarticles')
        ->orderBy('id_luarticle','desc')
        ->limit(1)
        ->get();
        return $aluid;
    }
    protected function anvrecar($lim=1){
        $hanvrecas = DB::table('ctranvs')
        ->join('rubanvs','rubanvs.id_rubanv','=','ctranvs.type_ctranv')
        ->select('ctranvs.*','rubanvs.*')
        ->orderBy('id_ctranv','desc')
        ->limit($lim)
        ->get();
        return $hanvrecas;
    }
    protected function hvws_($lim=4){
        $hvws = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('view_article','desc')
        ->limit($lim)
        ->get();
        return $hvws;
    }
    public function phxpub_($space=2,$statut=2,$lim=1){
        $phxpub = DB::table('publicites')
        ->Where('blockpubid_pub',$space)
        ->Where('statutid_pub',$statut)
        ->orderBy('id_pub','desc')
        ->limit($lim)
        ->get();
        return $phxpub;
    }
    static public function svphxpub($space=2,$statut=2,$lim=1){
        $phxpub = DB::table('publicites')
        ->Where('blockpubid_pub',$space)
        ->Where('statutid_pub',$statut)
        ->orderBy('id_pub','desc')
        ->limit($lim)
        ->get();
        return $phxpub;
    }
    protected function phxfsh_($statut=2,$lim=10){
        $phxfsh = DB::table('flashs')
        ->Where('fhstatutid_flash',$statut)
        ->orderBy('id_flash','desc')
        ->limit($lim)
        ->get();
        return $phxfsh;
    }
    protected function phxfshpg($statut=2,$paginate=30){
        $phxfs = DB::table('flashs')
        ->Where('fhstatutid_flash',$statut)
        ->orderBy('id_flash','desc')
        ->paginate($paginate);
        return $phxfs;
    } 
    protected function phxjtpg($statut=2,$paginate=20){
        return DB::table('papers')
        ->join('users','users.id','=','papers.userid_paper')
        ->join('fhstatuts','fhstatuts.id_fhstatut','=','papers.statutid_paper')
        ->join('blockspapers','blockspapers.id_blockpaper','=','papers.blockpaperid_paper')
        ->select('papers.*','users.id','users.name','users.lastename_user','users.firstname_user','fhstatuts.*','blockspapers.*')
        ->Where('statutid_paper',$statut)
        ->orderBy('id_paper','desc')
        ->paginate($paginate);  
    }
    

    protected function phxvds_($lim=5){
        $phxvds = DB::table('videos')
        ->join('users','users.id','=','videos.userid_video')
        ->select('videos.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_video','desc')
        ->limit($lim)
        ->get();
        return $phxvds;
    }
    protected function phxpcs($lim=5){
        $phxpcs = DB::table('sradios')
        ->join('users','users.id','=','sradios.userid_sradio')
        ->select('sradios.*','users.id','users.lastename_user','users.firstname_user')
        ->orderBy('id_sradio','desc')
        ->limit($lim)
        ->get();
        return $phxpcs;
    }
    protected function nbpcs(){
        $nbpcs = DB::table('sradios')
        ->join('users','users.id','=','sradios.userid_sradio')
        ->count();
        return $nbpcs;
    }
    protected function ilst($lim=4){
        return DB::table('galimgs')->orderBy('id_galimg','desc')->limit($lim)->get();
    }
    protected function phxprinrub_(){
        $prinphx =  DB::table('principalrubrique')->orderBy('id_prinrub','asc')->get();
        return $prinphx;
    }
    protected function hprinarts_($rub,$lim=1){
        $hprinarts = DB::table('principalrubrique')
        ->Where('slug_prinrub',$rub)
        ->orderBy('id_prinrub','asc')
        ->limit($lim)
        ->get();
        if(count($hprinarts)==0){
            return back()->with('error','Categorie n\'existe pas');
        }
        return $hprinarts;
    }
    protected function hcarts_($idrub,$pag=16){
        $hcarts = DB::table('articles')
        ->join('principalrubrique','principalrubrique.id_prinrub','=','articles.prinrubid_article')
        ->join('users','users.id','=','articles.userid_article')
        ->select('articles.*','principalrubrique.*','users.id','users.lastename_user','users.firstname_user')
        ->Where('prinrubid_article',$idrub)
        ->orderBy('id_article','desc')
        ->paginate($pag);
        return $hcarts;
    }
    protected function elmsShareable_($cart=null){
        if($cart!=null){
            $titleshared=$cart->title_article;
            $descshared=$cart->desc_article;
            $imgshared = $cart->image_article;
        }else{
            $titleshared= "GREEN MEDIA AFRICA";
            $descshared="E-mail : infomondeagricole@gmail.com | Contact : (+225) 05 75 85 95 43 / 07 07 49 84 25";
            $imgshared = "short-logo-green-media-white.png";
        }
        
        return [$titleshared,$descshared,$imgshared]; 
    }
    protected function elmsShareablevd($vdcart=null){
        if($vdcart!=null){
            $titleshared=$vdcart->title_video;
            $descshared=$vdcart->description_video;
            $imgshared = $vdcart->image_video;
        }else{
            $titleshared= "GREEN MEDIA AFRICA";
            $descshared="E-mail : infomondeagricole@gmail.com | Contact : (+225) 05 75 85 95 43 / 07 07 49 84 25";
            $imgshared = "short-logo-green-media-white.png";
        }

        return [$titleshared,$descshared,$imgshared]; 
    }
    
    protected function elmsShareablepb($pbcart=null){
        if($pbcart!=null){
            $titleshared=$pbcart->title_pgarticle;
            $descshared=$pbcart->desc_pgarticle;
            $imgshared = $pbcart->image_pgarticle;
        }else{
            $titleshared= "GREEN MEDIA AFRICA";
            $descshared="E-mail : infomondeagricole@gmail.com | Contact : (+225) 05 75 85 95 43 / 07 07 49 84 25";
            $imgshared = "short-logo-green-media-white.png";
        }
        
        return [$titleshared,$descshared,$imgshared]; 
    }
    
    protected function elmsShareablectranv($ctranvcart=null){
        if($ctranvcart!=null){
            $titleshared=$ctranvcart->title_ctranv;
            $descshared=$ctranvcart->desc_ctranv;
            $imgshared = $ctranvcart->image_ctranv;
        }else{
            $titleshared= "GREEN MEDIA AFRICA";
            $descshared="E-mail : infomondeagricole@gmail.com | Contact : (+225) 05 75 85 95 43 / 07 07 49 84 25";
            $imgshared = "short-logo-green-media-white.png";
        }
        
        return [$titleshared,$descshared,$imgshared]; 
    }
    
    protected function elmsShareablepc($pccart=null){
        if($pccart!=null){
            $titleshared=$pccart->title_sradio;
            $descshared=$pccart->description_sradio;
            $imgshared = $pccart->image_sradio;
        }else{
            $titleshared= "GREEN MEDIA AFRICA";
            $descshared="E-mail : infomondeagricole@gmail.com | Contact : (+225) 05 75 85 95 43 / 07 07 49 84 25";
            $imgshared = "short-logo-green-media-white.png";
        }
        
        return [$titleshared,$descshared,$imgshared]; 
    }
    
    public function phxdtformat($dt){
        $tabm = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
        $meng = date_format($dt,'m');
        $jr = date_format($dt,'d');
        $an = date_format($dt,'Y');
        $mfr='';
        if($meng===1){
            $mfr = $tabm[0];
        }
        if($meng===2){
            $mfr = $tabm[1];
        }
        if($meng===3){
            $mfr = $tabm[2];
        }
        if($meng===4){
            $mfr = $tabm[3];
        }
        if($meng===5){
            $mfr = $tabm[4];
        }
        if($meng===6){
            $mfr = $tabm[5];
        }
        if($meng===7){
            $mfr = $tabm[6];
        }
        if($meng===8){
            $mfr = $tabm[7];
        }
        if($meng===9){
            $mfr = $tabm[8];
        }
        if($meng===10){
            $mfr = $tabm[9];
        }
        if($meng===11){
            $mfr = $tabm[10];
        }
        if($meng===12){
            $mfr = $tabm[11];
        }

        return $jr.' '.$mfr.' '.$an ;
    
    } 

    protected function sidelms(){
        $harts = DB::table('articles')->orderBy('id_article','desc')->limit(7)->get();
        $art = $harts->random(1);
        $hvds = DB::table('videos')->orderBy('id_video','desc')->limit(7)->get();
        $vd = $hvds->random(1);
        $halbs = Album::orderBy('id','desc')->limit(7)->get();
        $alb = $halbs->random(1);

        return [$art,$vd,$alb];
    }

    protected function artcount_(){
        $artnb = DB::table('articles')->count();
        return $artnb;
    }

    protected function vdscount_(){
        $vdsnb = DB::table('videos')->count();
        return $vdsnb;
    }

    protected function albcount(){
        $albsnb = Album::count();
        return $albsnb;
    }

    protected function hcvds($pag=30){
        $hcvds = DB::table('videos')
        ->join('users','users.id','=','videos.userid_video')
        ->orderBy('id_video','desc')
        ->paginate($pag);
        return $hcvds;
    }

    protected function hcalbs($pag=30){
        $halbums = Album::orderBy('id','desc')->paginate($pag);
        // // insertion Table
        if ($halbums->count()!=0) {
            $scpt = 0;
            $halbumshow[$scpt]= $halbums[0];
        }
        // Insertion Table
        if($halbums){
            foreach($halbums as $halb){
                $nbhal = DB::table('galimgs')->where('galimgs.album_id','=',$halb->id)->count();
                $halb->nb_pic = $nbhal;
            }
        }
        return $halbums; 
    }

    protected function hlstalb(){
        $halbum = Album::orderBy('id','desc')->first();
        // Insertion Table
        if ($halbum->count()!=0) {
            $scpt = 0;
            $halbumshow[$scpt]= $halbum;
        }
        // Insertion Table
        if($halbum){
            $nbhal = DB::table('galimgs')->where('galimgs.album_id','=',$halbum->id)->count();
            $halbum->nb_pic = $nbhal;
        }
        return $halbum; 
    }

    protected function visitors_online_(){
        $time_session = 30;
        $time_actuel = date('U');
        $ip_user = $_SERVER['REMOTE_ADDR'];

        $ip_hasbeen = DB::table('tonlines')->Where('ip_tonline',$ip_user)->count();
        if($ip_hasbeen == 0){
            $add_ip = DB::table('tonlines')->insert([
                'time_tonline' => $time_actuel,
                'ip_tonline' => $ip_user
            ]);
        }else{
            $update_ip = DB::table('tonlines')
            ->where('ip_tonline', $ip_user)
            ->update([
                'time_tonline' => $time_actuel
            ]);
        }
        $session_del_time = $time_actuel - $time_session;
        $del_ip = DB::table('tonlines')->where('time_tonline','<',$session_del_time)->delete();

        return $ons = DB::table('tonlines')->count();
         // <!-- End Code -->
    }

    public function d_visitors_online_(){
        
        $ddate_session = date('Y-m-d');
        $dtime_session = 85500;
        $dtime_day = 85500;
        $dtime_actuel = date('U');
        $dip_user = $_SERVER['REMOTE_ADDR'];

        $dip_hasbeen = DB::table('onlines')->Where('ip_online',$dip_user)->count();
        if($dip_hasbeen == 0){
            // $dadd_ip = DB::table('onlines')->insert([
            //     'time_online' => $dtime_actuel,
            //     'ip_online' => $dip_user
            // ]);
             
        }else{
            $dupdate_ip = DB::table('onlines')
            ->where('ip_online', $dip_user)
            ->update([
                'time_online' => $dtime_actuel
            ]);
        }
        
        $day_hasbeen = DB::table('donlines')->Where('day_donline','=',$ddate_session)->count();
        if($day_hasbeen == 0){
            $lastnb = DB::table('onlines')->count();
            $dadd_day = DB::table('donlines')->insert([
                'day_donline' => $ddate_session,
                'time_donline' =>$dtime_actuel,
                'nb_donline' => $lastnb
            ]);
            
            $ddvis = DB::table('onlines')->get();
            $ds_del_time = $dtime_actuel - $dtime_day;
            foreach($ddvis as $dv){
                $del_vi = DB::table('onlines')->where('id_online',$dv->id_online)->delete();
            }
        }
        
        $dsession_del_time = $dtime_actuel - $dtime_session;
        $ddel_ip = DB::table('onlines')->where('time_online','<',$dsession_del_time)->delete();

        return $dons = DB::table('onlines')->count();
         // <!-- End Code -->
    }


}
