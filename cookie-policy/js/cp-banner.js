function writeCookie(name, value, days) {
  var date, expires;
  if (days) {
      date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toGMTString();
  } else {
      expires = "";
  }
  document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

window.onload = function() {


  CP_DEFAULT_COOKIE_NAME = "sn_cookie_notif";
  CP_COOKIE_VALUE = "notified";

  if(CP_COOKIE_NAME == "" || CP_COOKIE_NAME == undefined)
    CP_COOKIE_NAME = CP_DEFAULT_COOKIE_NAME;

  CP_COOKIE_LIFE = 180; //Days

  //IF ELEMENT EXISTS
  if(document.getElementsByClassName("cp-banner").length == 1){
    if(getCookie(CP_COOKIE_NAME) == undefined){
      var closeEl = document.getElementsByClassName("cp-banner-close")[0];
      var cpBanner = document.getElementsByClassName("cp-banner")[0];

      closeEl.onclick = function(){
        cpBanner.parentNode.removeChild(cpBanner);
        writeCookie(CP_COOKIE_NAME, CP_COOKIE_VALUE, CP_COOKIE_LIFE);
      };
    }
  }
};
