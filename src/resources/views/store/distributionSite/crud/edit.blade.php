
<form class="c-tooltip-active pst-relative tooltip-form">

  <div class="c-tooltip ">
    <div class="c-tooltiptext pdg-2">
      <div class="c-tooltip-head">
        <span class="mgn-l-2 mgn-t-2">コピーした情報を</span>
        <a  class="c-button mgn-r-8 c_button_adjust mgn-l-ato tool-paste mgn-t-2">ペースト</a>
      </div>

      <div class="c-tooltiptext-id mgn-2">
        <p class="c-txt-message-2">ID</p>
        <input type="text" class="login_id" name="login_id" value="{{ $finder }}">
      </div>

      <div class="c-tooltiptext-id mgn-l-2 mgn-r-2">
        <p class="c-txt-message-2">PW</p>
        <input type="text" name="password" value="{{ json_decode($password) }}">
      </div>

      <div class="display-inline--flex mgn-b-4">
        <input type="text" hidden value="{{ $scraping_id }}">
        <a onclick="alert('保存しました。')" class="c-button mgn-l-12 mgn-t-4 c_button_adjust tool-submit" >保存</a>
        <a  class="c-button c_button_adjust pw-btn tool-copy mgn-l-2" >ID PW ｺﾋﾟｰ</a>

      </div>
    </div>

  </div>
</form>
