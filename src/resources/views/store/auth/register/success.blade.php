{{-- @extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録（本部登録）完了')
@section('content')
  @component('store.component._p-index')
  @slot('body')
  <div class="container_center "></div>
  <p class="register-label">
    新規登録完了1
    <hr class="register-label-horizontal">
  </p>
</div><br/>
  <div class='registerHeadquarter_btn'>
    <a type ='button' href="/store/login"><button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">ログイン</button></a>
  </div>
  @endslot
  @endcomponent
@endsection --}}


@extends('admin.layout.layout--auth')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('store.component._p-index-login')
@slot('body')
<div class="a-page-title">
    <span><strong style="color: #003a16;"></strong> 新規登録完了</span>
  </div>
  <div class="c-main-box active-cont">
      <div class="c-main-body">
          <li class="c-change_list c-change_title">
              <div>
                登録ありがとうございます。
              </div>
          </li>
          <li class="c-change_list c-change_title">
            <div class="space-between w-per-18 c-input--select__iconTriangle">
              <p>次のページからログインし、ロボレのサービスをお使いいただけます。</p>
              <img src="http://localhost:8000/image/logo/robore_logo_2.png" class="absolute-right">
            </div>
         </li>
         <li class="c-change_list" style="margin-left: 40px !important;">
          <div class="mgn-b-1">
            【最初に設定いただく事】
          </div>
         </li>
        <li class="c-change_list">
          <div class="mgn-l-10">
            1.ロボレをお使いになるスタッフのため、「ユーザー」の登録
              <p class="c-change_list mgn-t-2 mgn-b-2">
                  <span>スタータープランをご利用で、ユーザーを追加する必要がなければ、この設定はスキップしてください。</span>
              </p> 
          </div>
        </li>
        <li class="c-change_list">
          <div class="mgn-l-10">
            2.検索する「物件流通サイト」の選択
              <p class="c-change_list mgn-t-2 mgn-b-2">
                  <span>ご用意した選択肢の中から、よく使う物件流通サイトを選択ください。</span>
              </p> 
              <p class="c-change_list mgn-t-2 mgn-b-2">
                <span>ご利用になるプランにより、選択できる物件流通サイトの数が変わってきます。</span>
              </p> 
              <p class="c-change_list mgn-t-2 mgn-b-2">
                <span>こちらは、後から好きなように変更が可能です。</span>
              </p> 
          </div>
        </li>
        <li class="c-change_list">
          <div class="mgn-l-10">
            3.ユーザーごと、物件流通サイトごとに、ログインするIDやパスワードの設定
              <p class="c-change_list mgn-t-2 mgn-b-2">
                <span>物件流通サイトにログインするIDとパスワードを、それぞれ設定ください。</span>
              </p> 
              <p class="c-change_list mgn-t-2 mgn-b-2">
                <span>その物件流通サイトにログインするID等をお持ちでない場合は、ロボレでもログインできずご利用いただけません</span>
              </p> 
          </div>
        </li>
        <div class="foot_3 mgn-t-5">
          <div class="p-login__buttonArea">
            <a type="submit" class="c-lbl-white-3" href="/store/login" >ログインページへ</a>
          </div>
        </div>
      </div>
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
</script>
@endsection
