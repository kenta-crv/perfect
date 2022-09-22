
<form action="{{ route('storeAdmin.setting.createsite') }}" id="tooltip-{{ $my_id }}" data-inactive="false" method="post" class="c-tooltip-active tooltip-form pst-relative">
  @csrf
  <div class="c-tooltip" >
    <div class="c-tooltiptext pdg-2">
      <input type="text" hidden value="{{ $item2['id'] }}" name="account_id" >
      <input type="text" hidden value="{{ $item['site_id'] }}" name="site_id" >

      <div class="c-tooltip-head">
        <span class="mgn-l-2 mgn-t-2">コピーした情報を</span>
        <a href="#"  class="c-button mgn-r-8 c_button_adjust mgn-l-ato tool-paste mgn-t-2">ペースト</a>
      </div>

      <div class="c-tooltiptext-id mgn-2">
        <p class="c-txt-message-2">ID</p>
        <input type="text" name="login_id" >
      </div>

      <div class="c-tooltiptext-id mgn-l-2 mgn-r-2">
        <p class="c-txt-message-2">PW</p>
        <input type="text" name="password" >
      </div>

      <div class="display-inline--flex mgn-b-4">
        <button type="submit" class="c-button mgn-l-12 mgn-t-4 mgn-r-2 c_button_adjust">保存</button>
        <a class="c-button c_button_adjust pw-btn tool-copy" >ID PW ｺﾋﾟｰ</a>

      </div>
    </div>
  </div>

</form>
