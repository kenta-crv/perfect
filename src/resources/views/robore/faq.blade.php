<section class="box-pages bg-pages-default" id="robore_faq">
  <div class="faq">
    <div class="">
      <p class="hp-title">よくある質問</p>
    <hr class="hp-title-horizontal">
    </div>
    <div class='page-list-faq'>
      <ul>
        <li class="qtn"  data-faq="1">
          <div class="data display-inline--flex width-full">
            <span class='faq-icon faq_toggle' >Q</span>
            <span class="mgn-l-3 qtn-label qtn_label_adjust mgn-t-2" style="color: black;">物件流通サイトは、どこのを検索できますか？</span>
            <span class="toggle-plus" href="">
              <i></i>
              <i></i>
            </span>
          </div>
        </li>
        <li class="ans" data-faq="1" style="display: none;">
          <div class="data display-inline--flext width-full disappearA" >
            <span class='faq-icon'>A</span>
            <span class="mgn-l-3 qtn-label" style="color: black;">日々状況が変わるため、大変お手数ですがこのページにある「お問合せ」からご連絡ください。
なお2022年9月1日の時点で、関東で物件を探す場合に便利な5サイトをご用意しています。</span>
          </div>
        </li>
        <li class="qtn"  data-faq="2">
          <div class="data display-inline--flex width-full">
            <span class='faq-icon faq_toggle' >Q</span>
            <span class="mgn-l-3 qtn-label qtn_label_adjust mgn-t-2" style="color: black;">物件流通サイトに、ロボットでアクセスして良いのですか？</span>
            <span class="toggle-plus" href="">
              <i></i>
              <i></i>
            </span>
          </div>
        </li>
        <li class="ans" data-faq="2" style="display: none;">
          <div class="data display-inline--flext width-full disappearA" >
            <span class='faq-icon'>A</span>
            <span class="mgn-l-3 qtn-label" style="color: black;">物件流通サイトごとに、ガイドラインや規約等で異なりますが、ロボレはその中で大丈夫なサイトを検索します。</span>
          </div>
        </li>
        <li class="qtn"  data-faq="3">
          <div class="data display-inline--flex width-full">
            <span class='faq-icon faq_toggle' >Q</span>
            <span class="mgn-l-3 qtn-label qtn_label_adjust mgn-t-2" style="color: black;">各業者間流通サイトと契約していなくても、ロボレを使えばそれらの情報を見る事はできますか？</span>
            <span class="toggle-plus" href="">
              <i></i>
              <i></i>
            </span>
          </div>
        </li>
        <li class="ans" data-faq="3" style="display: none;">
          <div class="data display-inline--flext width-full disappearA" >
            <span class='faq-icon'>A</span>
            <span class="mgn-l-3 qtn-label" style="color: black;">いいえ、できません。
ロボレはあくまでも物件流通サイトにアクセスするためのツールであり、アクセスする権利は各社様にて取得ください。</span>
          </div>
        </li>
        <li class="qtn"  data-faq="4">
          <div class="data display-inline--flex width-full">
            <span class='faq-icon faq_toggle' >Q</span>
            <span class="mgn-l-3 qtn-label qtn_label_adjust mgn-t-2" style="color: black;">宅建免許がありませんが、利用できますか？</span>
            <span class="toggle-plus" href="">
              <i></i>
              <i></i>
            </span>
          </div>
        </li>
        <li class="ans" data-faq="4" style="display: none;">
          <div class="data display-inline--flext width-full disappearA" >
            <span class='faq-icon'>A</span>
            <span class="mgn-l-3 qtn-label" style="color: black;">はい可能です。
ただ審査がございますので、お手数ですが一度お問合せください。</span>
          </div>
        </li>
        <li class="qtn"  data-faq="5">
          <div class="data display-inline--flex width-full">
            <span class='faq-icon faq_toggle' >Q</span>
            <span class="mgn-l-3 qtn-label qtn_label_adjust mgn-t-2" style="color: black;">お支払い方法は何がありますか？</span>
            <span class="toggle-plus" href="">
              <i></i>
              <i></i>
            </span>
          </div>
        </li>
        <li class="ans" data-faq="5" style="display: none;">
          <div class="data display-inline--flext width-full disappearA" >
            <span class='faq-icon'>A</span>
            <span class="mgn-l-3 qtn-label" style="color: black;">クレジットカードと銀行の引落をご用意しています。また複数店舗をまとめてお支払いする場合は、直接弊社への銀行振込となります。</span>
          </div>
        </li>
      </ul>
    </div>
    <br/><br/><br/><br/>
    <div class="tool-footer">
      <div class="margin-auto">
        <x-store.button
          custom-class=""
          href="{{ route('requestinformation.create') }}"
          :active="true">
          資料請求
        </x-store.button>
        <x-store.button
          custom-class="mgn-l-5 mgn-t-3"
          href="{{ route('register.register') }}"
          :active="false">
          無料で試してみる
        </x-store.button>
      </div>
    </div>
  </div>
</section>

<script>


$(".qtn").click(function(){
    q_id = $(this) .data('faq');
    $(`.ans[data-faq=${q_id}]`).slideToggle("1000");
    $('.toggle-plus').toggleClass('men-active')
});

</script>
