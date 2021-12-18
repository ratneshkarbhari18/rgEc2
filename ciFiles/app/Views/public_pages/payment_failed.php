<section class="c-container">
  
  
  <div class="o-circle c-container__circle o-circle__sign--failure">
    <div class="o-circle__sign"></div>  
  </div>   

  <div class="container text-center">
      <h4>Payment Failed</h4>
      <p class="text-danger"><?php echo $error; ?></p>
      <a href="<?php echo site_url("cart"); ?>" class="btn btn-primary">Back to Cart</a>
  </div>
  
</section>


<style>
	header,footer{display: none;}
	HTML{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;font-size:115%;font-size:calc(12px + (25 - 12) * (100vw - 300px)/ (1300 - 300));line-height:1.5;box-sizing:border-box}BODY{margin:0;color:#3a3d40;background:#fcfcfc}*,::after,::before{box-sizing:inherit;color:inherit}.c-container{max-width:27rem;margin:1rem auto 0;padding:1rem}.o-circle{display:flex;width:10.555rem;height:10.555rem;justify-content:center;align-items:flex-start;border-radius:50%;animation:circle-appearance .8s ease-in-out 1 forwards,set-overflow .1s 1.1s forwards}.c-container__circle{margin:0 auto 5.5rem}.o-circle__sign{position:relative;opacity:0;background:#fff;animation-duration:.8s;animation-delay:.2s;animation-timing-function:ease-in-out;animation-iteration-count:1;animation-fill-mode:forwards}.o-circle__sign::after,.o-circle__sign::before{content:"";position:absolute;background:inherit}.o-circle__sign::after{left:100%;top:0;width:500%;height:95%;transform:translateY(4%) rotate(0);border-radius:0;opacity:0;animation:set-shaddow 0s 1.13s ease-in-out forwards;z-index:-1}.o-circle__sign--success{background:#38b083}.o-circle__sign--success .o-circle__sign{width:1rem;height:6rem;border-radius:50% 50% 50% 0/10%;transform:translateX(130%) translateY(35%) rotate(45deg) scale(.11);animation-name:success-sign-appearance}.o-circle__sign--success .o-circle__sign::before{bottom:-17%;width:100%;height:50%;transform:translateX(-130%) rotate(90deg);border-radius:50% 50% 50% 50%/20%}.o-circle__sign--success .o-circle__sign::after{background:#288060}.o-circle__sign--failure{background:#ec4e4b}.o-circle__sign--failure .o-circle__sign{width:1rem;height:7rem;transform:translateY(25%) rotate(45deg) scale(.1);border-radius:50% 50% 50% 50%/10%;animation-name:failure-sign-appearance}.o-circle__sign--failure .o-circle__sign::before{top:50%;width:100%;height:100%;transform:translateY(-50%) rotate(90deg);border-radius:inherit}.o-circle__sign--failure .o-circle__sign::after{background:rgba(175,57,55,.8)}@keyframes circle-appearance{0%{transform:scale(0)}50%{transform:scale(1.5)}60%{transform:scale(1)}100%{transform:scale(1)}}@keyframes failure-sign-appearance{50%{opacity:1;transform:translateY(25%) rotate(45deg) scale(1.7)}100%{opacity:1;transform:translateY(25%) rotate(45deg) scale(1)}}@keyframes success-sign-appearance{50%{opacity:1;transform:translateX(130%) translateY(35%) rotate(45deg) scale(1.7)}100%{opacity:1;transform:translateX(130%) translateY(35%) rotate(45deg) scale(1)}}@keyframes set-shaddow{to{opacity:1}}@keyframes set-overflow{to{overflow:hidden}}@media screen and (min-width:1300px){HTML{font-size:1.5625em}}
</style>