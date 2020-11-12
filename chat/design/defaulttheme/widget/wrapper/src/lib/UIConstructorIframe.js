import {UIConsturctor} from './UIConsturctor';
import {helperFunctions} from './helperFunctions';

export class UIConstructorIframe extends UIConsturctor {

    constructor(elementId, style, attributes, tagname, documentRef) {
        super(elementId, style, attributes, tagname, documentRef);
    }

    constructUIIframe(style) {
        this.elmDomDoc = helperFunctions.getDocument(this.elmDom);
        this.elmDomDoc.open();
        this.elmDomDoc.writeln('<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" /></head><body><link rel="stylesheet" href="/cookie-policy/css/cp-banner.css">
<script type="text/javascript">
  CP_COOKIE_NAME = "ges_cookie_notif";
</script>
<script src="/cookie-policy/js/cp-banner.js"></script>

<div class="cp-banner">
  <div class="cp-banner-content">
    We use cookies to improve your user experience. If you continue using our website, you accept our <a href="../cookie-policy/" rel="nofollow">Cookie Policy</a>. <button type="button" class="cp-banner-close">Accept</button>
  </div>
  <style>
    .coupon {
    	bottom: 225px;
    }
    .hw__block{
    bottom: 90px;
    }
    .callback-icon{
        bottom: 100px !important;
    }
    @media all and (min-width: 767px) and (max-width: 1024px){
        .callback-icon{
            bottom: 80px !important;
        }
    }
</style>
</div>
 
      </body></html>');
        this.elmDomDoc.close();
        this.insertCssFile(style);
        this.insertContent();
    };

    insertContent () {
        this.elmDomDoc.body.innerHTML = this.tmpl
    };
};

