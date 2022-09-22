<div>
  <div class="c-contianer-box_4 w-per-18">
      <div class="box-data">
        <div class="container-table ">
            <div class="container_center mgn-t-"></div>
                <p class="register-label">
                  新規登録
                  <hr class="register-label-horizontal">
                </p>
            </div><br/>
            <div class="container_center"></div>
              <div class="register-description ">
                <p class="font_description">どのプランを申し込んでも、1か月は無料でお使いいただけます。</p>
                <p class="font_description">また無料ご利用の間に解約や休眠いただいた場合は、当然その後も料金はかかりません。</p>
              </div>
            </div><br/><br/>
            <form wire:submit.prevent="save">
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> 宅建業免許番号</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__6">
                  <div class="c-input ">
                    <input placeholder="東京都知事（１）第○○○○○号" class="no-radius hp-input" wire:model="license_number" type="text">
                  </div>
                </div>
                <div class="l-12__3 alg-i-c-rs">
                  <a class="c-lbl-plain hp-button fa-solid btn-right-2" for="">
                    免許がないので問い合わせる
                  </a>
                  <span class="text-danger"> @error('license_number') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label">  会社名・屋号</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__9">
                  <div class="c-input">
                    <input placeholder="株式会社 ロボレ" type="text" wire:model="company_name" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('address') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label">  電話番号</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__9">
                  <div class="c-input c-input--full_40">
                    <input placeholder="0123-456-78900"  type="text" wire:model="address" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('address') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> 住所</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__3">
                  <div class="c-input c-input--full_40">
                    <input placeholder="東京都◯◯区◯◯ビル名" type="text" wire:model="tel_no" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('tel_no') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label">  ご担当者様名</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__3">
                  <div class="c-input c-input--full_32 ">
                    <input placeholder="姓" class="no-radius hp-input" wire:model="last_name" type="text" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('last_name') {{ $message }} @enderror </span>
                </div>
                <div class="l-12__3">
                  <div class="c-input c-input--full_32 ">
                    <input placeholder="名" class="hp-input" wire:model="first_name" type="text">
                  </div>
                  <span class="text-danger"> @error('first_name') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> メールアドレス</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__9">
                  <div class="c-input c-input--full_40">
                    <input placeholder="sample000@mail.com" type="email" wire:model="email" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label">  ログインパスワード</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__9">
                  <div class="c-input c-input--full_40">
                    <input  placeholder="半角英数記号が使えます。6文字以上、32文字以内。"  type="password" wire:model="password" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('password') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label">ご利用プラン</p>
                  </div>
                </div>
                <div class="l-12__9 mgn-t-3">
                  <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <input wire:model="usage_plan" type="radio" value="1"/>
                    <p class="label-radio">ベーシック 月額　3,000円</p>
                    <input wire:model="usage_plan" type="radio" value="2"/>
                    <p class="label-radio"> プラス 月額　5,000円</p><br/>
                  </div>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label">お支払い方法</p>
                  </div>
                </div>
                <div class="l-12__9 mgn-t-3">
                  <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <input wire:model="payment_method"  type="radio" value="1" /><p class="label-radio"> 銀行の口座引落</p>
                    <input wire:model="payment_method"  type="radio" value="2" /><p class="label-radio"> クレジットカード</p>
                    <input wire:model="payment_method"  type="radio" value="3" /><p class="label-radio">銀行振込</p><br/>
                    <span class="text-danger"> @error('payment_method') {{ $message }} @enderror </span>
                  </div>
                </div>
              </div>
              <div class="foot_3 mgn-t-5">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2"><span>確認画面へ</span></button>
                </div>
              </div>
            </form>
        </div>
  </div>
</div>
