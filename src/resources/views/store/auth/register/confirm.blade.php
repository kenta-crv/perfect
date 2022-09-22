@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録')
@section('content')
  @component('store.component._p-index')
    @slot('body')
      <div class="c-contianer-box_4 cg_container">
        <div class="box-data">
          <div class="container-table ">
            <p class="register-label">
              新規登録確認
              <hr class="register-label-horizontal">
            </p>
              </div><br/>
              <form method="post" action="{{ route('register.confirmationRegister') }}">
                @csrf
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label"> 宅建業免許番号</p>
                    </div>
                  </div>
                  <div class="l-12__7">
                    <div class="c-input">
                      <input placeholder="" type="hidden" class="hp-input" name="license_number"  value="{{ $register['license_slct'] }}" >
                    </div>
                    <div class="c-input confirm_data">
                      <div>{{ $register['license_slct'] }} ({{ $register['license_number_1'] }}) {{ $register['license_number_2'] }}</div>
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label">  会社名・屋号</p>
                    </div>
                  </div>
                  <div class="l-12__7">
                    <div class="c-input">
                      <input placeholder="株式会社 ロボレ" name="company_name" type="hidden" value="{{ $register['company_name'] }}" class="hp-input">
                    </div>
                    <div class="c-input confirm_data">
                      <div>{{ $register['company_name'] }}</div>
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label">  電話番号</p>
                    </div>
                  </div>
                  <div class="l-12__7">
                    <div class="c-input ">
                      <input  placeholder="東京都◯◯区◯◯ビル名" type="hidden" name="address" value="{{ $register['address'] }}" class="hp-input">
                    </div>
                    <div class="c-input confirm_data">
                      <div>{{ $register['address'] }}</div>
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label"> 住所</p>
                    </div>
                  </div>
                  <div class="l-12__7">
                    <div class="c-input ">
                      <input placeholder="0123-456-78900" type="hidden" name="contract_number" value="{{ $register['contract_number'] }}"  class="hp-input">
                    </div>
                    <div class="c-input confirm_data">
                      <div>{{ $register['contract_number'] }}</div>
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label">  ご担当者様名</p>
                    </div>
                  </div>
                  <div class="l-12__7">
                    <div class="display-inline--flex">
                      <div class="">
                        <input placeholder="姓 名" class="no-radius hp-input" name="last_name"  type="hidden" class="hp-input" value="{{ $register['last_name'] }}">
                      </div>
                      <div class="c-input confirm_data">
                        <div>{{ $register['last_name'] }}</div>
                      </div>
                      <div class=" ">
                        <input placeholder="姓 名" class="no-radius hp-input" name="first_name"  type="hidden" class="hp-input" value="{{ $register['first_name'] }}">
                      </div>
                      <div class="c-input confirm_data">
                        <div>{{ $register['first_name'] }}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label"> メールアドレス</p>
                    </div>
                  </div>
                  <div class="l-12__7">
                    <div class="c-input ">
                      <input placeholder="sample000@mail.com" name="email" type="hidden"  class="hp-input" value="{{ $register['email'] }}">
                    </div>
                    <div class="c-input confirm_data">
                      <div>{{ $register['email'] }}</div>
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label">  ログインパスワード</p>
                    </div>
                  </div>
                  <div class="l-12__7">
                    <div class="c-input ">
                      <input  placeholder="半角英数記号が使えます。6文字以上、32文字以内。" name="password"  type="hidden"  class="hp-input" value="{{ $register['password'] }}">
                    </div>
                    <div class="c-input confirm_data">
                      <input  placeholder="半角英数記号が使えます。6文字以上、32文字以内。" name="password"  type="password" style="-webkit-text-security: disc;"  class="hp-input input_no_border" value="{{ $register['password'] }}" >
                      {{--  <div>{{ $register['password'] }}</div>  --}}
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label">お支払い方法</p>
                    </div>
                  </div>
                  <div class="l-12__7">
                    <div class="p-list__item__data_4" style="overflow-wrap: break-word;">
                      <input name="usage_plan"  type="hidden" value="{{ $register['usage_plan'] }}" @if($register['usage_plan'] == 1) checked @endif />
                      <input name="usage_plan"  type="hidden" value="{{ $register['usage_plan'] }}" @if($register['usage_plan'] == 2) checked @endif/>
                    </div>
                    <div class="c-input confirm_data">
                      @if($register['usage_plan'] == 1)
                      <div>ベーシック 月額　3,000円</div>
                      @elseif($register['usage_plan'] == 2)
                      <div> プラス 月額　5,000円</div>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__5 mgn-t-3">
                    <div class="lbl-title display-inline--flex cf_label">
                      <p class="hp-label">ご利用プラン</p>
                    </div>
                  </div>
                  <div class="l-12__7 mgn">
                    <div class="p-list__item__data_4" style="overflow-wrap: break-word;">
                      <input name="payment_method"  type="hidden" value="{{ $register['payment_method'] }}" @if($register['payment_method'] == 1) checked @endif />
                      <input name="payment_method"  type="hidden" value="{{ $register['payment_method'] }}" @if($register['payment_method'] == 2) checked @endif/>
                      <input name="payment_method"  type="hidden" value="{{ $register['payment_method'] }}" @if($register['payment_method'] == 3) checked @endif/>
                      <span class="text-danger"> @error('payment_method') {{ $message }} @enderror </span>
                    </div>
                    <div class="c-input confirm_data">
                      @if($register['payment_method'] == 1)
                      <div>銀行の口座引落</div>
                      @elseif($register['payment_method'] == 2)
                      <div>クレジットカード</div>
                      @elseif($register['payment_method'] == 3)
                      <div>銀行振込</div>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="foot_3 mgn-t-5">
                  <div class="p-login__buttonArea">
                    <a href="/register/success"><button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">{{$register['payment_method'] == 2 ? '次へ' : '登録する'}}</button></a>
                  </div>
                </div>
              </form>
          </div>
    </div>
    @endslot
  @endcomponent
@endsection
