<script>
!function(t,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n():"function"==typeof define&&define.amd?define(n):(t=t||self).LazyLoad=n()}(this,(function(){"use strict";function t(){return(t=Object.assign||function(t){for(var n=1;n<arguments.length;n++){var e=arguments[n];for(var i in e)Object.prototype.hasOwnProperty.call(e,i)&&(t[i]=e[i])}return t}).apply(this,arguments)}var n="undefined"!=typeof window,e=n&&!("onscroll"in window)||"undefined"!=typeof navigator&&/(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent),i=n&&"IntersectionObserver"in window,o=n&&"classList"in document.createElement("p"),r=n&&window.devicePixelRatio>1,a={elements_selector:".lazy",container:e||n?document:null,threshold:300,thresholds:null,data_src:"src",data_srcset:"srcset",data_sizes:"sizes",data_bg:"bg",data_bg_hidpi:"bg-hidpi",data_bg_multi:"bg-multi",data_bg_multi_hidpi:"bg-multi-hidpi",data_poster:"poster",class_applied:"applied",class_loading:"loading",class_loaded:"loaded",class_error:"error",class_entered:"entered",class_exited:"exited",unobserve_completed:!0,unobserve_entered:!1,cancel_on_exit:!0,callback_enter:null,callback_exit:null,callback_applied:null,callback_loading:null,callback_loaded:null,callback_error:null,callback_finish:null,callback_cancel:null,use_native:!1},c=function(n){return t({},a,n)},s=function(t,n){var e,i="LazyLoad::Initialized",o=new t(n);try{e=new CustomEvent(i,{detail:{instance:o}})}catch(t){(e=document.createEvent("CustomEvent")).initCustomEvent(i,!1,!1,{instance:o})}window.dispatchEvent(e)},l="loading",u="loaded",d="applied",f="error",_="native",g="data-",v="ll-status",p=function(t,n){return t.getAttribute(g+n)},b=function(t){return p(t,v)},h=function(t,n){return function(t,n,e){var i="data-ll-status";null!==e?t.setAttribute(i,e):t.removeAttribute(i)}(t,0,n)},m=function(t){return h(t,null)},E=function(t){return null===b(t)},y=function(t){return b(t)===_},A=[l,u,d,f],I=function(t,n,e,i){t&&(void 0===i?void 0===e?t(n):t(n,e):t(n,e,i))},L=function(t,n){o?t.classList.add(n):t.className+=(t.className?" ":"")+n},w=function(t,n){o?t.classList.remove(n):t.className=t.className.replace(new RegExp("(^|\\s+)"+n+"(\\s+|$)")," ").replace(/^\s+/,"").replace(/\s+$/,"")},k=function(t){return t.llTempImage},O=function(t,n){if(n){var e=n._observer;e&&e.unobserve(t)}},x=function(t,n){t&&(t.loadingCount+=n)},z=function(t,n){t&&(t.toLoadCount=n)},C=function(t){for(var n,e=[],i=0;n=t.children[i];i+=1)"SOURCE"===n.tagName&&e.push(n);return e},N=function(t,n,e){e&&t.setAttribute(n,e)},M=function(t,n){t.removeAttribute(n)},R=function(t){return!!t.llOriginalAttrs},G=function(t){if(!R(t)){var n={};n.src=t.getAttribute("src"),n.srcset=t.getAttribute("srcset"),n.sizes=t.getAttribute("sizes"),t.llOriginalAttrs=n}},T=function(t){if(R(t)){var n=t.llOriginalAttrs;N(t,"src",n.src),N(t,"srcset",n.srcset),N(t,"sizes",n.sizes)}},j=function(t,n){N(t,"sizes",p(t,n.data_sizes)),N(t,"srcset",p(t,n.data_srcset)),N(t,"src",p(t,n.data_src))},D=function(t){M(t,"src"),M(t,"srcset"),M(t,"sizes")},F=function(t,n){var e=t.parentNode;e&&"PICTURE"===e.tagName&&C(e).forEach(n)},P={IMG:function(t,n){F(t,(function(t){G(t),j(t,n)})),G(t),j(t,n)},IFRAME:function(t,n){N(t,"src",p(t,n.data_src))},VIDEO:function(t,n){!function(t,e){C(t).forEach((function(t){N(t,"src",p(t,n.data_src))}))}(t),N(t,"poster",p(t,n.data_poster)),N(t,"src",p(t,n.data_src)),t.load()}},S=function(t,n){var e=P[t.tagName];e&&e(t,n)},V=function(t,n,e){x(e,1),L(t,n.class_loading),h(t,l),I(n.callback_loading,t,e)},U=["IMG","IFRAME","VIDEO"],$=function(t,n){!n||function(t){return t.loadingCount>0}(n)||function(t){return t.toLoadCount>0}(n)||I(t.callback_finish,n)},q=function(t,n,e){t.addEventListener(n,e),t.llEvLisnrs[n]=e},H=function(t,n,e){t.removeEventListener(n,e)},B=function(t){return!!t.llEvLisnrs},J=function(t){if(B(t)){var n=t.llEvLisnrs;for(var e in n){var i=n[e];H(t,e,i)}delete t.llEvLisnrs}},K=function(t,n,e){!function(t){delete t.llTempImage}(t),x(e,-1),function(t){t&&(t.toLoadCount-=1)}(e),w(t,n.class_loading),n.unobserve_completed&&O(t,e)},Q=function(t,n,e){var i=k(t)||t;B(i)||function(t,n,e){B(t)||(t.llEvLisnrs={});var i="VIDEO"===t.tagName?"loadeddata":"load";q(t,i,n),q(t,"error",e)}(i,(function(o){!function(t,n,e,i){var o=y(n);K(n,e,i),L(n,e.class_loaded),h(n,u),I(e.callback_loaded,n,i),o||$(e,i)}(0,t,n,e),J(i)}),(function(o){!function(t,n,e,i){var o=y(n);K(n,e,i),L(n,e.class_error),h(n,f),I(e.callback_error,n,i),o||$(e,i)}(0,t,n,e),J(i)}))},W=function(t,n,e){!function(t){t.llTempImage=document.createElement("IMG")}(t),Q(t,n,e),function(t,n,e){var i=p(t,n.data_bg),o=p(t,n.data_bg_hidpi),a=r&&o?o:i;a&&(t.style.backgroundImage='url("'.concat(a,'")'),k(t).setAttribute("src",a),V(t,n,e))}(t,n,e),function(t,n,e){var i=p(t,n.data_bg_multi),o=p(t,n.data_bg_multi_hidpi),a=r&&o?o:i;a&&(t.style.backgroundImage=a,function(t,n,e){L(t,n.class_applied),h(t,d),n.unobserve_completed&&O(t,n),I(n.callback_applied,t,e)}(t,n,e))}(t,n,e)},X=function(t,n,e){!function(t){return U.indexOf(t.tagName)>-1}(t)?W(t,n,e):function(t,n,e){Q(t,n,e),S(t,n),V(t,n,e)}(t,n,e)},Y=["IMG","IFRAME"],Z=function(t){return t.use_native&&"loading"in HTMLImageElement.prototype},tt=function(t,n,e){t.forEach((function(t){return function(t){return t.isIntersecting||t.intersectionRatio>0}(t)?function(t,n,e,i){h(t,"entered"),L(t,e.class_entered),w(t,e.class_exited),function(t,n,e){n.unobserve_entered&&O(t,e)}(t,e,i),I(e.callback_enter,t,n,i),function(t){return A.indexOf(b(t))>=0}(t)||X(t,e,i)}(t.target,t,n,e):function(t,n,e,i){E(t)||(L(t,e.class_exited),function(t,n,e,i){e.cancel_on_exit&&function(t){return b(t)===l}(t)&&"IMG"===t.tagName&&(J(t),function(t){F(t,(function(t){D(t)})),D(t)}(t),function(t){F(t,(function(t){T(t)})),T(t)}(t),w(t,e.class_loading),x(i,-1),m(t),I(e.callback_cancel,t,n,i))}(t,n,e,i),I(e.callback_exit,t,n,i))}(t.target,t,n,e)}))},nt=function(t){return Array.prototype.slice.call(t)},et=function(t){return t.container.querySelectorAll(t.elements_selector)},it=function(t){return function(t){return b(t)===f}(t)},ot=function(t,n){return function(t){return nt(t).filter(E)}(t||et(n))},rt=function(t,e){var o=c(t);this._settings=o,this.loadingCount=0,function(t,n){i&&!Z(t)&&(n._observer=new IntersectionObserver((function(e){tt(e,t,n)}),function(t){return{root:t.container===document?null:t.container,rootMargin:t.thresholds||t.threshold+"px"}}(t)))}(o,this),function(t,e){n&&window.addEventListener("online",(function(){!function(t,n){var e;(e=et(t),nt(e).filter(it)).forEach((function(n){w(n,t.class_error),m(n)})),n.update()}(t,e)}))}(o,this),this.update(e)};return rt.prototype={update:function(t){var n,o,r=this._settings,a=ot(t,r);z(this,a.length),!e&&i?Z(r)?function(t,n,e){t.forEach((function(t){-1!==Y.indexOf(t.tagName)&&(t.setAttribute("loading","lazy"),function(t,n,e){Q(t,n,e),S(t,n),h(t,_)}(t,n,e))})),z(e,0)}(a,r,this):(o=a,function(t){t.disconnect()}(n=this._observer),function(t,n){n.forEach((function(n){t.observe(n)}))}(n,o)):this.loadAll(a)},destroy:function(){this._observer&&this._observer.disconnect(),et(this._settings).forEach((function(t){delete t.llOriginalAttrs})),delete this._observer,delete this._settings,delete this.loadingCount,delete this.toLoadCount},loadAll:function(t){var n=this,e=this._settings;ot(t,e).forEach((function(t){O(t,n),X(t,e,n)}))}},rt.load=function(t,n){var e=c(n);X(t,e)},rt.resetStatus=function(t){m(t)},n&&function(t,n){if(n)if(n.length)for(var e,i=0;e=n[i];i+=1)s(t,e);else s(t,n)}(rt,window.lazyLoadOptions),rt}));</script>

    <script>
    var lazyLoadInstance = new LazyLoad({});
    </script>
    <nav id="mobileBottomNav" class="container" style="padding: 0.5rem 0.7rem; width: 100%; margin: auto;" >
        
        <a href="<?php echo site_url(''); ?>" class="nav-linkx w-20 d-inline-block text-center "><img src="<?php echo site_url('assets/icons/home.svg'); ?>" width="15px" height="15px"><br><small>Home</small></a>
        <a class="nav-linkx w-20 d-inline-block text-center" href="<?php echo site_url('wishlist'); ?>"><img src="<?php echo site_url('assets/icons/heart.svg'); ?>" width="15px" height="15px"><br><small>Wishlist</small></a>

        <a class="nav-linkx w-20 d-inline-block text-center" href="<?php echo site_url('profile'); ?>"><img src="<?php echo site_url('assets/icons/user.svg'); ?>"  width="15px" height="15px"><br><small>Account</small></a>

        <a class="nav-linkx w-20 d-inline-block text-center" href="<?php echo site_url('cart'); ?>"><img src="<?php echo site_url('assets/icons/shopping-bag.svg'); ?>"  width="15px" height="15px"><br><small>Cart</small></a>
    </nav>




    <footer id="site-footer" class="text-dark">
    
        <div class="container">

        <div class="row" style="padding: 3% 0;">
                
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
                    <div class="ysera-custommenu default">
                        <h2 class="widgettitle">Quick Menu</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="<?php echo site_url(''); ?>">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('login'); ?>">Login</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('about'); ?>">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('contact'); ?>">Contact Us</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
                    <div class="ysera-custommenu default">
                        <h2 class="widgettitle">Follow us on</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="https://www.facebook.com/rickagauba.label" target="_blank">Facebook</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://www.instagram.com/rickagauba/" target="_blank">Instagram</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://www.pinterest.com/rickagauba" target="_blank">Pinterest</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center hidden-xs d-none">
                    <div class="ysera-newsletter style1">
                        <div class="newsletter-head">
                            <h3 class="title">Newsletter</h3>
                        </div>
                        <div class="newsletter-form-wrap">
                            <div class="list">
                                Sign up for fresh info about our offers and products
                            </div>
                            <p id="nl-sub-error" class="text-light"></p>
                            <input type="email" id="nlSubEmail" class="input-text email email-newsletter form-control" placeholder="Your email letter">
                            <br>
                            <button class="btn btn-submit submit-newsletter btn-primary" type="button" id="nlSubButton">SUBSCRIBE</button>
                            <br><br>

                            <script>
                                $("button#nlSubButton").click(function (e) { 
                                    e.preventDefault();
                                    let nlSubEmail =  $("input#nlSubEmail").val();
                                    if(nlSubEmail==''){
                                        $("p#nl-sub-error").html('Please enter your Email to get latest products and offers in your inbox');
                                    }else{
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url('add-email-subscriber'); ?>",
                                            data: {
                                                'nlSubEmail' :  nlSubEmail
                                            },
                                            success: function (response) {
                                                if(response=='invalid-email'){

                                                    $("p#nl-sub-error").html('Please Provide a Valid Email');

                                                }else if(response=='nl-add-success'){
                                                    window.location.href = "<?php echo site_url('nl-sub-thank-you') ?>";
                                                }
                                            }
                                        });
                                    }
                                    
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
                    <div class="ysera-custommenu default">
                        <h2 class="widgettitle">Information</h2>
                        <ul class="menu">
                            
                            <li class="menu-item">
                                <a href="<?php echo site_url('terms-and-conditions'); ?>">Terms and Conditions</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('privacy-policy'); ?>">Privacy Policy</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('refund-exchange-policy'); ?>">Refund Exchange Policy</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url('shipping-policy'); ?>">Shipping Policy</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>

            <style>
                .menu-item a,h2.widgettitle,h3.title{
                    color: #ffffff !important;
                }
                ul.menu{
                    list-style: none;
                    padding-left: 0;
                }
            </style>
        
            <p class="text-center text-light" style="margin: 3% 0;">&copy; Ricka Gauba 2021 | All Rights Reserved</p>
            <div class="text-center"><img style="width: 15%;" src="<?php echo site_url("assets/images/cards.png"); ?>" alt="Card Logos" id="card-logos"></div>
        
        </div>
    
        <a class="d-none d-lg-block whatsappLink " target="_blank" href="https://api.whatsapp.com/send?phone=919920166157" id="wa-desktop" class="whatsappLink">
            <img src="<?php echo site_url("assets/images/wa.png"); ?>" style="width: 60px;
    height: 60px;
    position: fixed;
    right: 1em;
    bottom: 8em;">
        </a>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=919920166157" id="wa-touch" class="whatsappLink d-block d-lg-none">
            <img src="<?php echo site_url("assets/images/wa.png"); ?>" style="width: 60px;
    height: 60px;
    position: fixed;
    right: 1.5em;
    bottom: 20em;">
        </a>
        <!--Start of Tawk.to Script-->
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6195e7196bb0760a4943253a/1fkootfl4';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
        <!--End of Tawk.to Script-->

    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js" integrity="sha512-ubuT8Z88WxezgSqf3RLuNi5lmjstiJcyezx34yIU2gAHonIi27Na7atqzUZCOoY4CExaoFumzOsFQ2Ch+I/HCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo site_url("assets/js/bootstrap.min.js") ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>

        $("div#mqCarousel").owlCarousel({
            loop: true,
            dots: false,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    </script>


    <script src="<?php echo site_url("assets/js/app.min.js") ?>"></script>

    <?php foreach($popups as $popup):  
        if(!isset($_COOKIE["popup_closed"])):    
        if($popup["visible"]=="yes"):
    ?>
        
        <div class="modal fade" popupId="<?php echo $popup["id"]; ?>" id="popupx-<?php echo $popup["id"]; ?>" tabindex="-1" aria-labelledby="popup<?php echo $popup["id"]; ?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $popup["title"]; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo site_url("assets/images/popupImages/".$popup["image"]); ?>" class="w-100">

                        <h4>Sign Up for our Email List</h4>
                        <?php echo form_open("subsribe-to-email-list",array("class"=>"d-inline","id"=>"emailSubForm")); ?>
                        <p class="text-success" id="emailSubSuccess"></p>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <button id="emailSubAdd" class="btn btn-block" style="background-color: deeppink; color: white;">Sign Up</button>
                        <?php echo form_close(); ?>
                    </div>

                    <script>
                        $("button#emailSubAdd").click(function (e) { 
                            e.preventDefault();
                            $("form#emailSubForm").submit();
                            $("p#emailSubSucces").html("Subscribted to email List");
                            setCookie("popup_closed","y",3);
                            location.reload();
                        });
                    </script>

                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                $('#popupx-<?php echo $popup["id"]; ?>').modal('show')
            }, <?php echo $popup["trigger_timeout"]*1000; ?>);
            $('#popupx-<?php echo $popup["id"]; ?>').on('hidden.bs.modal', function () {
                let popupId = $(this).attr("popupId");
                setCookie("popup_closed","y",3);
                location.reload();
            });
            
        </script>
    <?php 
        endif;
        endif;
        endforeach;
    ?>
    
</body>
</html>