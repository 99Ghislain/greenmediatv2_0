const facebookBtn = document.querySelector(".sharefacebook");
const twitterBtn = document.querySelector(".sharetwitter");
const googleplusBtn = document.querySelector(".sharegoogleplus");
const whatsappBtn = document.querySelector(".sharewhatsapp");

function init(){
let dataTitle = encodeURIComponent(document.title);
let postUrl = encodeURI(document.location.href);
// let postTitle = encodeURI(dataTitle);

facebookBtn.setAttribute("href","https://www.facebook.com/sharer.php?u="+postUrl+"/");
twitterBtn.setAttribute("href","https://twitter.com/share?url="+postUrl+"&text="+dataTitle+"/");
whatsappBtn.setAttribute("href","https://wa.me/send?text="+dataTitle+" "+postUrl+"/");
googleplusBtn.setAttribute("href","https://plus.google.com/share?url="+postUrl+"/");
// 
// facebookBtn.setAttribute("href","https://www.facebook.com/sharer.php?u=${postUrl}");
// twitterBtn.setAttribute("href","https://twitter.com/share?url=$(postUrl)&text=$(dataTitle)");
// whatsappBtn.setAttribute("href","https://api.whatsapp.com/send?text=${dataTitle}${postUrl}");
// 
}
init();
