<?php

if (!function_exists('formatTitle')) {
    function formatTitle($text) {
        return $text; // Retourne le texte original sans aucune modification de casse
    }
}

// Fonction pour les dates en français
if (!function_exists('phxdtformat')) {
    function phxdtformat($dt){
        $tabm = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
        $tabjr = ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim'];
        $meng = date_format($dt,'m');
        $jr = date_format($dt,'d');
        $an = date_format($dt,'Y');
        $ijr = date_format($dt,'D');
        $idce = $meng-1;
        $mfr=$tabm[$idce];
        
        if($ijr=="Mon"){$ljr = $tabjr[0];}elseif($ijr=="Tue"){$ljr = $tabjr[1];}elseif($ijr=="Wed"){$ljr = $tabjr[2];}elseif($ijr=="Thu"){$ljr = $tabjr[3];}
        elseif($ijr=="Fri"){$ljr = $tabjr[4];}elseif($ijr=="Sat"){$ljr = $tabjr[5];}elseif($ijr=="Sun"){$ljr = $tabjr[6];}

        return $ljr.' '.$jr.' '.$mfr.' '.$an ;
    } 
}


// 3. Extraction de l'ID YouTube (Prend désormais en compte les LIVES spécifiques)
if (!function_exists('getYoutubeId')) {
    function getYoutubeId($url) {
        // Formule mise à jour pour détecter aussi /live/
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=|live/)|youtu\.be/|youtube\.com/shorts/)([^"&?/\s]{11})%i', $url, $match);
        if (isset($match[1])) {
            return $match[1];
        }
        return $url;
    }
}