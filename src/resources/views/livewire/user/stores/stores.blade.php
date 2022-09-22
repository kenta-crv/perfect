<div class ="">
  <div class="c-contianer-box_4 w-per-18">
      <div class="box-data">
        <div class="container-table ">
            <div class="container_center "></div>
                <p class="register-label">
                  新規登録
                  <hr class="register-label-horizontal">
                </p>
            </div><br/>
            <div class="container_center"></div>
              <div class="register-description">
                  <p class="font_description">複数店舗のお支払いをまとめる場合は、最初に「本部」としてのアカウントを作成し、次に店舗ごとのアカウントを作成します。</p>
                  <p class="font_description">本部のアカウント作成に費用はかかりません。</p>
              </div>
            </div><br/><br/>
            <form wire:submit.prevent="save">
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> 会社名・屋号</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__6">
                  <div class="c-input c-input--full_40">
                    <input type="text" wire:model="company_name" placeholder=" 株式会社 ロボレ" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('company_name') {{ $message }} @enderror </span>
                </div>
                  <div class="l-12__3 alg-i-c-rs">
                    <a class="c-lbl-plain hp-button fa-solid btn-right-2" for="">
                      免許がないので問い合わせる
                    </a>
                  </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> 住所</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__9">
                  <div class="c-input c-input--full_40">
                    <input type="text" wire:model="address" placeholder="東京都◯◯区◯◯ビル名" class="hp-input">
                </div>
                <span class="text-danger"> @error('address') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> 電話番号</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__3">
                  <div class="c-input c-input--full_40">
                    <input type="text" wire:model="tel_no" placeholder="0123-456-7890" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('tel_no') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> ご担当者様名</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__3">
                  <div class="c-input c-input--full_32">
                    <input placeholder="姓" class="no-radius hp-input" wire:model="last_name" type="text" value="">
                  </div>
                  <span class="text-danger"> @error('last_name') {{ $message }} @enderror </span>
                </div>
                <div class="l-12__3">
                  <div class="c-input c-input--full_32">
                    <input placeholder="名" wire:model="first_name" type="text" value="" class="hp-input">
                  </div>
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
                    <input type="email" wire:model="email" placeholder="sample000@mail.com" class="hp-input">
                </div>
                <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> ログインパスワード</p>
                    <p class="mandatory margin-left--auto">必須</p>
                  </div>
                </div>
                <div class="l-12__9">
                  <div class="c-input c-input--full_40">
                    <input type="password" wire:model="password" placeholder="半角英数記号が使えます。6文字以上、32文字以内。" class="hp-input">
                  </div>
                  <span class="text-danger"> @error('password') {{ $message }} @enderror </span>
                </div>
              </div>
              <div class="l-12 l-12--gap24">
                <div class="l-12__3 mgn-t-3">
                  <div class="lbl-title display-inline--flex">
                    <p class="hp-label"> お支払い方法</p>
                  </div>
                </div>
                <div class="l-12__9 mgn-t-3">
                  <div class="p-list__item__data_4" style="overflow-wrap: break-word;">
                    <input wire:model="payment_method"  type="radio" value="1" /> <p class="label-radio">銀行の口座引落</p>
                    <input wire:model="payment_method"  type="radio" value="2" /> <p class="label-radio">クレジットカード</p>
                    <input wire:model="payment_method"  type="radio" value="3" /> <p class="label-radio">銀行振込</p><br/>
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