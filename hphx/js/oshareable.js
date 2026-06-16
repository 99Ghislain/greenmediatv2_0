const facebookBtn = document.querySelector(".sharefacebook");
const twitterBtn = document.querySelector(".sharetwitter");
const googleplusBtn = document.querySelector(".sharegoogleplus");
const whatsappBtn = document.querySelector(".sharewhatsapp");
const fbmessengerBtn = document.querySelector(".sharefbmessenger");

function init(){
let dataTitle = encodeURIComponent(document.title);
let postUrl = encodeURI(document.location.href);
//

facebookBtn.setAttribute("href","https://www.facebook.com/sharer.php?u="+postUrl+"");
twitterBtn.setAttribute("href","https://twitter.com/share?url="+postUrl+"&text="+dataTitle+"");
whatsappBtn.setAttribute("href","whatsapp://send?text="+dataTitle+" "+postUrl+"");
googleplusBtn.setAttribute("href","https://plus.google.com/share?url="+postUrl+"");
fbmessengerBtn.setAttribute("href","https://www.facebook.com/dialog/send?link="+postUrl+"&redirect_uri=https://www.sharethis.com");
// 
}
init();