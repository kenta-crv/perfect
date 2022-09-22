@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録')
@section('content')
  @component('store.component._p-index')
    @slot('body')
      <div class="c-contianer-box_4 w-per-18">
        <div class="box-data">
          <div class="container-table ">
            <p class="register-label">
              Confirm Page
              <hr class="register-label-horizontal">
            </p>
              </div><br/>
              <form method="post" action="{{ route('register.registerConfirmation') }}">
                @csrf
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label"> 宅建業免許番号</p>
                    </div>
                  </div>
                  <div class="l-12__9">
                    <div class="c-input">
                      <input placeholder="" type="text" class="hp-input" name="license_number"  value="{{ session('data') ['license_number'] }}" >
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label">  会社名・屋号</p>
                    </div>
                  </div>
                  <div class="l-12__9">
                    <div class="c-input">
                      <input placeholder="株式会社 ロボレ" name="company_name" type="text" value="{{ session('data') ['company_name'] }}" class="hp-input">
                    </div>
                    <span class="text-danger"> @error('address') {{ $message }} @enderror </span>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label">  電話番号</p>
                    </div>
                  </div>
                  <div class="l-12__9">
                    <div class="c-input c-input--full_40">
                      <input  placeholder="東京都◯◯区◯◯ビル名" type="text" name="address" value="{{ session('data') ['address'] }}" class="hp-input">
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label"> 住所</p>
                    </div>
                  </div>
                  <div class="l-12__3">
                    <div class="c-input c-input--full_40">
                      <input placeholder="0123-456-78900" type="text" name="contact_no" value="{{ session('data') ['contract_number'] }}"  class="hp-input">
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label">  ご担当者様名</p>
                    </div>
                  </div>
                  <div class="l-12__9">
                    <div class="c-input c-input--full_32 ">
                      <input placeholder="姓 名" class="no-radius hp-input" name="last_name"  type="text" class="hp-input" value="{{ session('data') ['last_name'] }}">
                    </div>
                    <div class="c-input c-input--full_32 ">
                      <input placeholder="姓 名" class="no-radius hp-input" name="first_name"  type="text" class="hp-input" value="{{ session('data') ['first_name'] }}">
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label"> メールアドレス</p>
                    </div>
                  </div>
                  <div class="l-12__9">
                    <div class="c-input c-input--full_40">
                      <input placeholder="sample000@mail.com" name="email" type="text"  class="hp-input" value="{{ session('data') ['email'] }}">
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label">  ログインパスワード</p>
                    </div>
                  </div>
                  <div class="l-12__9">
                    <div class="c-input c-input--full_40">
                      <input  placeholder="半角英数記号が使えます。6文字以上、32文字以内。" name="password"  type="password"  class="hp-input" value="{{ session('data') ['password'] }}">
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
                    <div class="p-list__item__data_4" style="overflow-wrap: break-word;">
                      <input name="usage_plan"  type="radio" value="{{ session('data')['usage_plan'] }}" {{ old( 'usage_plan', "1") == 1 ? 'checked' : '' }} /> <p class="label-radio">ベーシック 月額　3,000円</p>
                      <input name="usage_plan"  type="radio" value="{{ session('data')['usage_plan'] }}" {{ old( 'usage_plan', "2") == 2 ? 'checked' : '' }}/> <p class="label-radio"> プラス 月額　5,000円</p><br>
                      <span class="text-danger"> @error('payment_method') {{ $message }} @enderror </span>
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label">ご利用プラン</p>
                    </div>
                  </div>
                  <div class="l-12__9 mgn-t-3">
                    <div class="p-list__item__data_4" style="overflow-wrap: break-word;">
                      <input name="payment_method"  type="radio" value="{{ session('data')['payment_method'] }}" {{ old( 'payment_method', "1") == 1 ? 'checked' : '' }} /> <p class="label-radio">銀行の口座引落</p>
                      <input name="payment_method"  type="radio" value="{{ session('data')['payment_method'] }}" {{ old( 'payment_method', "2") == 2 ? 'checked' : '' }}/> <p class="label-radio">クレジットカード</p>
                      <input name="payment_method"  type="radio" value="{{ session('data')['payment_method'] }}" {{ old( 'payment_method', "3") == 3 ? 'checked' : '' }}/> <p class="label-radio">銀行振込</p><br/>
                      <span class="text-danger"> @error('payment_method') {{ $message }} @enderror </span>
                    </div>
                  </div>
                </div>
                <div class="foot_3 mgn-t-5">
                  <div class="p-login__buttonArea">
                    <a href="/register/thanks"><button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">Confirm</button></a>
                  </div>
                </div>
              </form>
          </div>
    </div>
    @endslot
  @endcomponent
@endsection
