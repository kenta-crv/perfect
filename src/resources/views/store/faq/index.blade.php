@extends('store.layouts.layout-store-admin')
@section('title', $title ?? 'よくある質問')
@section('content')

@component('admin.component._p-index')
    @slot('body')
        <div class="a-page-title">
        <span>よくある質問</span>
        </div>
        <div class="faq-category">
            お支払い・請求について
        </div>
        <div class="faq-box mgn-t-2 active-cont toggle-btn-1" id="q1">
            <span>Q　スタッフは3人いるのですが、ライセンスは１つでも良いですか？</span>
            <span class="toggle-btn" href="#">
                <span class="mgn-r-4" id="f-ans1">Answer</span>
                <span class="arrow-faq" ></span>
            </span>
        </div>
        <div class="faq-answer inactive" id="a1">
            A　スタッフの入れ替わりを考えると、セキュリティの観点より人数分ライセンスをご用意いただく事をお勧めします。
        </div>
        <div class="faq-box mgn-t-2 active-cont toggle-btn-1" id="q2">
            <span>Q　月の途中で契約や解約した場合、料金はどうなりますか？</span>
            <span class="toggle-btn" href="#">
                <span class="f-ans-btn mgn-r-4" id="f-ans2">Answer</span>
                <span class="arrow-faq" ></span>
            </span>
        </div>
        <div class="faq-answer inactive" id="a2">
            A　月の途中で契約した場合は、初月無料・・・
        </div>
        <div class="faq-box mgn-t-2 active-cont toggle-btn-1" id="q3">
            <span>Q　領収書を発行してほしいです。</span>
            <span class="toggle-btn " href="#">
                <span class="f-ans-btn mgn-r-4" id="f-ans3">Answer</span>
                <span class="arrow-faq" ></span>
            </span>
        </div>
        <div class="faq-answer inactive" id="a3">
            A　領収書はマイページの領収書発行ページよりダウンロードが可能です。
        </div>

    @endslot
@endcomponent
<script>
    // for tabbing top
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tabbing");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      $('#q1').on('click', function(){
        if($('#a1').hasClass('inactive')){
            $('#a1').removeClass('inactive')
            $('#f-ans1').addClass('inactive') 
        }else{
            $('#a1').addClass('inactive')
            $('#f-ans1').removeClass('inactive') 
        }

      });

      $('#q2').on('click', function(){
        if($('#a2').hasClass('inactive')){
            $('#a2').removeClass('inactive')
            $('#f-ans2').addClass('inactive') 
        }else{
            $('#a2').addClass('inactive')
            $('#f-ans2').removeClass('inactive') 
        }
      });

      $('#q3').on('click', function(){
        if($('#a3').hasClass('inactive')){
            $('#a3').removeClass('inactive')
            $('#f-ans3').addClass('inactive') 
        }else{
            $('#a3').addClass('inactive')
            $('#f-ans3').removeClass('inactive') 
        }
      });
      $('.toggle-btn-1').on('click', function() {
        $(this).toggleClass('active')
      });

</script>
@endsection