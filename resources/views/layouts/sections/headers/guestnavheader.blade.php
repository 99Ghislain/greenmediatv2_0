<style>
    /* Conteneur principal */
    .gm-weather-horizontal {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        font-family: 'Roboto', sans-serif;
        color: #333;
        width: 100%;
        margin: 20px 0;
        overflow: hidden;
        transition: background 1s ease-in-out;
    }

    /* --- FONDS DYNAMIQUES --- */
    .gm-bg-sunny {
        background-color: #fff9f0;
        background-image: radial-gradient(circle at 85% 15%, rgba(255, 180, 0, 0.25) 0%, transparent 45%), 
                          linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
    }
    .gm-bg-cloudy {
        background-color: #f5f7fa;
        background-image: radial-gradient(circle at 20% 80%, rgba(180, 195, 210, 0.3) 0%, transparent 50%), 
                          linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
    }
    .gm-bg-rainy {
        background-color: #8fa3b3;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' opacity='0.3'%3E%3Cpath d='M10 0 L5 15' stroke='%23ffffff' stroke-width='1.2' stroke-linecap='round'/%3E%3Cpath d='M25 15 L20 30' stroke='%23ffffff' stroke-width='1.2' stroke-linecap='round'/%3E%3C/svg%3E"), 
                          linear-gradient(to bottom, #6b8c9e 0%, #90a4ae 100%);
    }

    /* Filtre de lisibilité du texte */
    .gm-weather-horizontal::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(255, 255, 255, 0.72);
        z-index: 0;
    }

    /* Sections internes */
    .gm-wh-section {
        position: relative;
        z-index: 1; 
        padding: 15px 20px;
        border-right: 1px solid rgba(0,0,0,0.06);
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex: 1;
        min-width: 220px; 
    }
    .gm-wh-section:last-child {
        border-right: none;
    }

    /* Styles textuels & Météo Actuelle */
    .gm-wh-current { display: flex; flex-direction: row; align-items: center; gap: 15px; flex: 1.2; }
    
    /* AFFICHAGE DE LA VILLE ET DU BOUTON GPS */
    .gm-wh-city-wrap { 
        display: flex; 
        align-items: center; 
        gap: 6px; 
        margin-bottom: 5px; 
        color: #127319; 
    }
    .gm-city-name {
        font-family: 'Montserrat', sans-serif;
        font-size: 15px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* LE NOUVEAU BOUTON GPS AVEC TEXTE */
    .gm-btn-gps {
        background: #127319; 
        color: #ffffff;
        border: none;
        border-radius: 20px; 
        padding: 6px 14px;
        font-family: 'Montserrat', sans-serif;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 6px; 
        cursor: pointer;
        transition: all 0.3s ease;
        margin-left: auto; 
        box-shadow: 0 2px 8px rgba(18, 115, 25, 0.3);
    }
    .gm-btn-gps:hover {
        background: #0e5a13; 
        transform: translateY(-2px); 
        box-shadow: 0 4px 12px rgba(18, 115, 25, 0.4);
    }
    .gm-btn-gps:active {
        transform: translateY(0);
    }

    .gm-wh-temp { font-size: 42px; font-weight: 900; font-family: 'Montserrat', sans-serif; line-height: 1; color: #111; }
    .gm-wh-desc { font-size: 13px; font-weight: 600; color: #444; margin-top: 4px; }
    .gm-wh-feels { font-size: 11px; color: #666; margin-top: 2px; }
    .gm-wh-icon-main { font-size: 45px; }

    .gm-wh-title { font-size: 10px; font-weight: 700; color: #777; text-transform: uppercase; margin-bottom: 12px; letter-spacing: 0.5px;}
    .gm-wh-list { display: flex; gap: 12px; justify-content: space-between; align-items: center; width: 100%; }
    .gm-wh-item { text-align: center; display: flex; flex-direction: column; gap: 6px; }
    .gm-wh-label { font-size: 11px; color: #555; font-weight: 500; text-transform: capitalize; }
    .gm-wh-icon { font-size: 18px; }
    .gm-wh-val { font-size: 12px; font-weight: 700; color: #111; }
    .gm-wh-val span { color: #888; font-weight: 400; font-size: 11px; }

    .gm-wh-details { display: flex; flex-direction: column; gap: 10px; flex: 0.8; background-color: rgba(255,255,255,0.4); }
    .gm-wh-detail-row { display: flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 500; color: #333; }
    .gm-wh-detail-row i { color: #64b802; font-size: 14px; width: 16px; text-align: center; }
    .gm-wh-detail-val { font-weight: 700; color: #111; margin-left: auto; }

    /* ADAPTATION MOBILE */
    @media (max-width: 768px) {
        .gm-weather-horizontal {
            flex-wrap: nowrap !important;
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .gm-weather-horizontal::-webkit-scrollbar {
            display: none;
        }
        .gm-wh-section {
            flex: 0 0 auto !important;
            min-width: 230px !important;
            border-bottom: none !important;
            border-right: 1px solid rgba(0,0,0,0.08) !important;
        }
    }
</style>

<div class="gm-weather-horizontal container" id="gm-weather-box">
    
    <div class="gm-wh-section gm-wh-current">
        <div class="gm-wh-icon-main" id="gwh-icon">⏳</div>
        <div>
            <div class="gm-wh-city-wrap">
                <i class="fa-solid fa-location-dot"></i>
                <span id="gwh-city-name" class="gm-city-name">Recherche...</span>
                <button id="btn-gps" class="gm-btn-gps" title="Obtenir la météo de ma position exacte">
                    <i class="fa-solid fa-crosshairs"></i> <span>Me Localiser</span>
                </button>
            </div>
            <div class="gm-wh-temp" id="gwh-temp">--°</div>
            <div class="gm-wh-desc" id="gwh-desc">Détection en cours...</div>
            <div class="gm-wh-feels" id="gwh-feels">Ressenti : --°</div>
        </div>
    </div>

    <div class="gm-wh-section">
        <div class="gm-wh-title">Prochaines heures</div>
        <div class="gm-wh-list" id="gwh-hourly"></div>
    </div>

    <div class="gm-wh-section">
        <div class="gm-wh-title">Jours à venir</div>
        <div class="gm-wh-list" id="gwh-daily"></div>
    </div>

    <div class="gm-wh-section gm-wh-details">
        <div class="gm-wh-title" style="margin-bottom: 2px;">Détails météo</div>
        <div class="gm-wh-detail-row">
            <i class="fa-solid fa-droplet"></i> Humidité <span class="gm-wh-detail-val" id="gwh-hum">--%</span>
        </div>
        <div class="gm-wh-detail-row">
            <i class="fa-solid fa-wind"></i> Vent <span class="gm-wh-detail-val" id="gwh-wind">-- km/h</span>
        </div>
        <div class="gm-wh-detail-row">
            <i class="fa-solid fa-cloud-showers-heavy"></i> Précipitations <span class="gm-wh-detail-val" id="gwh-precip">-- mm</span>
        </div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        function getWeatherInfo(code) {
            const map = {
                0: { t: 'Ciel dégagé', i: '☀️' }, 1: { t: 'Plutôt dégagé', i: '🌤️' },
                2: { t: 'Partiel. nuageux', i: '⛅' }, 3: { t: 'Nuageux', i: '☁️' },
                45: { t: 'Brouillard', i: '🌫️' }, 48: { t: 'Brouill. givrant', i: '🌫️' },
                51: { t: 'Bruine légère', i: '🌧️' }, 53: { t: 'Bruine modérée', i: '🌧️' }, 55: { t: 'Bruine dense', i: '🌧️' },
                61: { t: 'Pluie faible', i: '🌦️' }, 63: { t: 'Pluie modérée', i: '🌧️' }, 65: { t: 'Pluie forte', i: '🌧️' },
                71: { t: 'Neige légère', i: '🌨️' },
                80: { t: 'Averses', i: '🌦️' }, 81: { t: 'Averses fortes', i: '🌧️' },
                95: { t: 'Orage', i: '⛈️' }
            };
            return map[code] || { t: 'Inconnu', i: '🌡️' };
        }

        // Fonction pour charger la météo depuis Open-Meteo
        function loadWeather(lat, lng, cityName) {
            document.getElementById('gwh-city-name').innerText = cityName;
            
            fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lng}&current=temperature_2m,relative_humidity_2m,apparent_temperature,precipitation,weather_code,wind_speed_10m&hourly=temperature_2m,weather_code&daily=weather_code,temperature_2m_max,temperature_2m_min&timezone=auto`)
                .then(res => res.json())
                .then(data => {
                    const current = data.current;
                    const code = current.weather_code;
                    const info = getWeatherInfo(code);
                    
                    const widgetBox = document.getElementById('gm-weather-box');
                    widgetBox.classList.remove('gm-bg-sunny', 'gm-bg-cloudy', 'gm-bg-rainy');

                    if (code === 0 || code === 1) {
                        widgetBox.classList.add('gm-bg-sunny');
                    } else if ((code >= 51 && code <= 65) || (code >= 80 && code <= 95)) {
                        widgetBox.classList.add('gm-bg-rainy');
                    } else {
                        widgetBox.classList.add('gm-bg-cloudy');
                    }

                    document.getElementById('gwh-temp').innerText = Math.round(current.temperature_2m) + '°';
                    document.getElementById('gwh-desc').innerText = info.t;
                    document.getElementById('gwh-feels').innerText = 'Ressenti : ' + Math.round(current.apparent_temperature) + '°';
                    document.getElementById('gwh-icon').innerText = info.i;
                    document.getElementById('gwh-hum').innerText = current.relative_humidity_2m + '%';
                    document.getElementById('gwh-wind').innerText = Math.round(current.wind_speed_10m) + ' km/h';
                    document.getElementById('gwh-precip').innerText = current.precipitation + ' mm';

                    let hourlyHTML = '';
                    for(let i=0; i<5; i++) {
                        const dateObj = new Date(data.hourly.time[i]);
                        let hourLabel = i === 0 ? 'Maint.' : dateObj.getHours() + 'h';
                        let hInfo = getWeatherInfo(data.hourly.weather_code[i]);
                        hourlyHTML += `
                            <div class="gm-wh-item">
                                <div class="gm-wh-label">${hourLabel}</div>
                                <div class="gm-wh-icon">${hInfo.i}</div>
                                <div class="gm-wh-val">${Math.round(data.hourly.temperature_2m[i])}°</div>
                            </div>`;
                    }
                    document.getElementById('gwh-hourly').innerHTML = hourlyHTML;

                    let dailyHTML = '';
                    const days = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
                    for(let i=1; i<=5; i++) {
                        let dateObj = new Date(data.daily.time[i]);
                        let dInfo = getWeatherInfo(data.daily.weather_code[i]);
                        dailyHTML += `
                            <div class="gm-wh-item">
                                <div class="gm-wh-label">${days[dateObj.getDay()]}</div>
                                <div class="gm-wh-icon">${dInfo.i}</div>
                                <div class="gm-wh-val">${Math.round(data.daily.temperature_2m_max[i])}°<br><span>${Math.round(data.daily.temperature_2m_min[i])}°</span></div>
                            </div>`;
                    }
                    document.getElementById('gwh-daily').innerHTML = dailyHTML;

                })
                .catch(err => {
                    console.log("Erreur Open-Meteo:", err);
                });
        }

        // =========================================================
        // ÉTAPE 1 : Géolocalisation Silencieuse (par IP) au démarrage
        // =========================================================
        let isLoaded = false;
        fetch('http://ip-api.com/json/')
            .then(res => res.json())
            .then(geoData => {
                if (geoData.status === "success") {
                    loadWeather(geoData.lat, geoData.lon, geoData.city);
                    isLoaded = true;
                }
            })
            .catch(() => {
                if(!isLoaded) { loadWeather(5.3364, -4.0267, 'Abidjan'); isLoaded = true; }
            });

        setTimeout(() => {
            if (!isLoaded) { loadWeather(5.3364, -4.0267, 'Abidjan'); isLoaded = true; }
        }, 4000);

        // =========================================================
        // ÉTAPE 2 : Géolocalisation Ultra-Précise (GPS) au Clic 🎯
        // =========================================================
        const btnGps = document.getElementById('btn-gps');
        
        btnGps.addEventListener('click', function() {
            // Effet visuel pendant la recherche
            const originalIcon = btnGps.innerHTML;
            btnGps.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Recherche...</span>';
            document.getElementById('gwh-desc').innerText = "Localisation GPS...";

            // Vérifier si le navigateur supporte le GPS
            if (navigator.geolocation) {
                // Demander la position
                navigator.geolocation.getCurrentPosition(
                    // SUCCÈS
                    function(position) {
                        const exactLat = position.coords.latitude;
                        const exactLng = position.coords.longitude;
                        
                        // L'API Météo ne nous donne pas le nom de la ville, 
                        // donc on utilise une API gratuite pour transformer les coordonnées en nom de ville (Reverse Geocoding)
                        fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${exactLat}&longitude=${exactLng}&localityLanguage=fr`)
                            .then(res => res.json())
                            .then(data => {
                                // On récupère la ville, la commune, ou à défaut "Position Exacte"
                                const exactCity = data.city || data.locality || "Votre Position";
                                loadWeather(exactLat, exactLng, exactCity);
                                btnGps.innerHTML = originalIcon; // Remettre l'icône originale
                            })
                            .catch(() => {
                                loadWeather(exactLat, exactLng, "Position exacte");
                                btnGps.innerHTML = originalIcon;
                            });
                    },
                    // ERREUR (L'utilisateur a refusé ou le GPS est éteint)
                    function(error) {
                        console.warn("Erreur GPS : ", error.message);
                        alert("Impossible d'obtenir votre position exacte. Veuillez autoriser l'accès à la localisation de votre navigateur.");
                        btnGps.innerHTML = originalIcon;
                        document.getElementById('gwh-desc').innerText = "Géolocalisation refusée";
                    },
                    { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
                );
            } else {
                alert("Votre navigateur ne supporte pas la géolocalisation.");
                btnGps.innerHTML = originalIcon;
            }
        });

    });
</script>
<header class="primary" style="position: relative !important; z-index: 999; margin-bottom: 0 !important;">
    <div class="d-sm-none firstbar" style="margin: 0;  padding: 0; padding-top: 10px; padding-bottom: 10px; background-image: url({{url('hphx/img/cacao-banniere-3.jpg')}}) !important; background-size: cover; background-repeat: no-repeat;">
        <div class="container" style="">
            <div class="row m-0 p-0" style="overflow: hidden; max-height: 100px; margin: 0; padding: 0;">
                
                <div class="col-md-3 col-sm-12" style=" margin: 0; padding: 0;">
                    <div class="brand" style=" margin: 0; padding: 0;">
                        <a href="{{url('/')}}">
                            <img src="{{url('hphx/img/logo 3_0.png')}}" alt="Green Media Africa" style="width: 70%; margin: 0; padding: 0;">
                        </a>
                    </div>                      
                </div>

            </div>
        </div>
    </div>

    <nav class="menu" style="position: relative !important; width: 100%;">
        <div class="container">
            
            <div class="brand">
                <a href="{{url('/')}}" style="display: inline-block; vertical-align: middle;">
                    <img src="{{url('hphx/img/greenmedia mise jour.png')}}" alt="Green Media Africa" style="max-height: 40px; width: auto;">
                </a>
                
            </div>

            <div class="mobile-toggle">
                <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
            </div>
            <div class="mobile-toggle">
                <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
            </div>
            <div id="menu-list">
                <ul class="nav-list">
                    <li class="dropdown magz-dropdown" style="">
                        <a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage=='home'))?'#':url('/home');?>">Accueil <i class="ion-ios-arrow-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="<?=(isset($hpage)&&($hpage=='home'))?'active':false;?> bg-success"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage=='home'))?'#':url('/');?>"> La Une</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[17]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[17]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[17]->slug_prinrub]);?>">Evènements</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[16]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[16]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[16]->slug_prinrub]);?>">Entretien / Interview</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[7]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[7]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[7]->slug_prinrub]);?>">Enquetes</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[18]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[18]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[18]->slug_prinrub]);?>">Foire / Salon</a></li>
                        </ul>
                    </li>
                    <li class="<?=(isset($hpage)&&($hpage==$hrbprins[21]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[21]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[21]->slug_prinrub]);?>">English Articles</a></li>
                    <li class="<?=(isset($hpage)&&($hpage==$hrbprins[8]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[8]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[8]->slug_prinrub]);?>">Agriculture</a></li>
                    <li class="<?=(isset($hpage)&&($hpage==$hrbprins[3]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[3]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[3]->slug_prinrub]);?>">Environnement</a></li>
                    <li class="<?=(isset($hpage)&&($hpage==$hrbprins[1]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[1]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[1]->slug_prinrub]);?>">Ressources Ani et Halieu</a></li>
                    <li class="dropdown magz-dropdown" style="">
                        <a href="#">Plus <i class="ion-ios-arrow-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[12]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[12]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[12]->slug_prinrub]);?>">Hydraulique</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[9]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[9]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[9]->slug_prinrub]);?>">Eco-Tourisme</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[13]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[13]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[13]->slug_prinrub]);?>">Pétrole et Gaz</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[14]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[14]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[14]->slug_prinrub]);?>">Energie et Mines</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[15]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[15]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[15]->slug_prinrub]);?>">Sécurité Alimentaire</a></li>
                            
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[19]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[19]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[19]->slug_prinrub]);?>">Eaux et Forêts</a></li>
                            <li class="<?=(isset($hpage)&&($hpage==$hrbprins[20]->slug_prinrub))?'active':false;?>"><a href="<?=(isset($hpage)&&(!isset($slgsgpost))&&($hpage==$hrbprins[20]->slug_prinrub))?'#':route('visitors.allactus',['rub' => $hrbprins[20]->slug_prinrub]);?>">Commerces</a></li>
                        </ul>
                    </li>
                                        
                    <li class="<?=(isset($hpage)&&($hpage=='Green Media Africa - TV'))?'active':false;?> bg-warning-green" ><a href="<?=(isset($hpage)&&($hpage=='Green Media Africa - TV'))?'#':route('visitors.allvideos');?>" class="text-white" style="width: 100%;"><img src="{{url('hphx/img/tv.png')}}" alt="Green Media Africa" style="width: 30px; height: 30px; object-fit: contain;"> TV</a></li>
                    <li class="<?=(isset($hpage)&&($hpage=='Green Media Africa - TV'))? false:false;?>" style="" ><a href="{{url('/2phx-login-greenmedia-2025')}}" target="_blank" class="text-white btn btn-danger btn-xs" style="width: 100%; padding: 0 auto !important;"><i class="ion-locked" style=""></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

{{-- Exemple pour exclure plusieurs pages --}}
@if (!in_array(request()->route()->getName(), ['visitors.showvideo', 'visitors.sgactu']))
    @include('contents.guests.templates.livestreaming')
@endif