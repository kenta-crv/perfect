@extends('admin.layout.layout--auth')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('store.component._p-index-login')
@slot('body')
<div class="a-page-title">
    <span><strong style="color: #003a16;"></strong>契約・請求情報</span>
  </div>
  <div class="c-main-box active-cont">
    <form method="post" action="{{ route('register.debitSuccessRegister') }}">
    
      @csrf
      <div class="c-main-body">
          <li class="c-change_list c-change_title">
              <div>
                ■ 決済方法を口座振替に変更
              </div>
          </li>
          <li class="c-change_list">
            <div class="">
              ①預金口座振替依頼書をダウンロードし、印刷してください。（既に用紙をお持ちの場合はスキップ）
              <p class="c-change_list mgn-t-5 mgn-b-5">
                  <a href="{{url ('/store/contractBilling/pdf')}}" class="pdf-link"><span>こちらをクリックしてダウンロード</span></a>
                  <span class='mgn-l-20'>※既に用紙を持っている方は、そちらをお使いいただいても構いません</span>
              </p>
            </div>
         </li>
         <li class="c-change_list">
          <div>
              ②引落しされる金融機関口座の情報を記入し、お届け印を押印ください。
          </div>
         </li>
        <li class="c-change_list">
          <div>
              ③次の契約者番号が入っている事を確認してください。入っていない場合はご記入ください。
              <p class="c-change_list mgn-t-2 mgn-b-2">
                  <span>契約者番号</span>
                  <span class="mgn-l-5 mgn-r-5">:</span>
                  <input type="text" class="debit-num txt-alg-r" value="{{ $contract_number->contract_number }}" disabled>
              </p> 
          </div>
        </li>
        <li class="c-change_list">
          <div>
              ④お支払いの準備が整い次第、自動で決済方法が変更となります。こちらからご連絡は致しませんのでご了承ください。
          </div>
        </li>
        <li class="c-change_list mgn-t-5">
          <div>
              <p>
                  <span class="mgn-l-3">（ご注意）</span>
                  <span class="mgn-l-10">預金口座振替依頼書を既にお持ちの方は、「契約者番号 {{ $contract_number->contract_number }}」を忘れずにご記入ください。</span>
                  <br/>
                  <span class="mgn-l-26">準備が整うまで数か月かかる場合がありますので、それまでは今までと同じ方法でお支払いいただきます。</span>
                  <br/>
                  <span class="mgn-l-26">預金口座振替依頼書を記入し、早めに弊社までお送りください</span>
              </p>
          </div>
        </li>
        <hr class="hr-gray mgn-t-5 mgn-b-5">
        <span>・送信ボタンをクリックすると、すぐにロボレが使える様になります。</span>
          <br>
          <div class="foot_3 mgn-t-5">
              <div class="p-login__buttonArea">
                  <button type="submit" class="c-lbl-white-3">送信</button>
              </div>
        </div>
      </div>
    </form>
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

