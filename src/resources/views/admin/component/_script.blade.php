<?php $is_production = env('APP_ENV') === 'production' ? true : false; ?>
{{-- @livewireScripts --}}
<script src="{{$is_production ? secure_asset('js/admin/js-dataHref.js') : asset('js/admin/js-dataHref.js')}}"></script>
<script src="{{$is_production ? secure_asset('js/admin/jquery/jquery-3.5.1.min.js') : asset('js/admin/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{$is_production ? secure_asset('js/message/validation.js') : asset('js/message/validation.js')}}"></script>
<script src="{{$is_production ? secure_asset('vendor/sweetalert/sweetalert.all.js') : asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
  $(function() {
  $('[name="randomFunct"]:radio').change( function() {
    if($('[id=randomFunct_on]').prop('checked')){
      $('.c-vanish__1').addClass('off');
    } else if($('[id=randomFunct_off]').prop('checked')){
      $('.c-vanish__1,.c-vanish__2').removeClass('off');
    }
  });
});
  $(function() {
  $('[name="quizSetting"]:radio').change( function() {
    if($('[id=quizSetting_on]').prop('checked')) {
      $('.c-vanish__2').addClass('off');
    } else if($('[id=quizSetting_off]').prop('checked')){
      $('.c-vanish__2').removeClass('off');
    }
  });
});
  $(function() {
  $('[name="quizKey"]:radio').change( function() {
    if($('[id=quizKey_on]').prop('checked')) {
      $('.c-vanish__3').addClass('off');
    } else if($('[id=quizSetting_off]').prop('checked')){
      $('.c-vanish__3').removeClass('off');
    }
  });
});

function menu(x) {
  x.classList.toggle("men-active");
  $('.l-frame__sidebar').toggleClass('opened-sidebar')
  $('.c-main-box').toggleClass('active-cont');
  $('div.c-admin-page_stepper').toggleClass('active-cont');
  $('.a-page-title').toggleClass('open-margin-left');
  $('.grn-txt-cont').toggleClass('open-margin-left');
  $('.box-description_credit').toggleClass('open-margin-left');
  $('.c-main-box_credit.active-cont').toggleClass('open-margin-left');
  $('.c-main-box_creditRent.active-cont').toggleClass('open-margin-left');
  $('.index-title').toggleClass('open-margin-left');

}

/* to toggle password */
function togglePassword() {
  var x = document.getElementById("password-field");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$(document).ready(function(){
    $('.wdt-1').change(function(){
      var value = $('.wdt-1').val();
      if(value == 2){
        $('.display_method').hide();
      }
      if(value == 1){
        $('.display_method').show();
      }
    });
});
</script>
