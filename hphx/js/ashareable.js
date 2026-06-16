const fterfacebookBtn = document.querySelector(".ftersharefacebook");
const ftertwitterBtn = document.querySelector(".ftersharetwitter");
const ftergoogleplusBtn = document.querySelector(".ftersharegoogleplus");
const fterwhatsappBtn = document.querySelector(".ftersharewhatsapp");
const fterfbmessengerBtn = document.querySelector(".ftersharefbmessenger");

function init(){
let fterdataTitle = encodeURIComponent(document.title);
let fterpostUrl = encodeURI(document.location.href);
//

fterfacebookBtn.setAttribute("href","https://www.facebook.com/sharer.php?u="+fterpostUrl+"");
ftertwitterBtn.setAttribute("href","https://twitter.com/share?url="+fterpostUrl+"&text="+fterdataTitle+"");
fterwhatsappBtn.setAttribute("href","whatsapp://send?text="+fterdataTitle+" "+fterpostUrl+"");
ftergoogleplusBtn.setAttribute("href","https://plus.google.com/share?url="+fterpostUrl+"");
fterfbmessengerBtn.setAttribute("href","https://www.facebook.com/dialog/send?link="+fterpostUrl+"&redirect_uri=https://www.sharethis.com");
// 
}
init();