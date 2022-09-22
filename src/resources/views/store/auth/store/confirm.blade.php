{{-- @extends('store.layouts.layout-store-hp') --}}
@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録（本部登録）')
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
   <form method="POST" action="{{ route('register.confirm') }}">
    @csrf
    <div class="l-12 l-12--gap24">
      <div class="l-12__5 mgn-t-3">
        <div class="lbl-title display-inline--flex cf_label">
          <p class="hp-label"> 会社名・屋号</p>
          {{--  <p class="mandatory margin-left--auto">必須</p>  --}}
        </div>
      </div>
      <div class="l-12__7">
        <div class="c-input">
          <input type="hidden" name="company_name" placeholder=" 株式会社 ロボレ" class="hp-input" value="{{ $headquarter['company_name'] }}">
        </div>
        <div class="c-input confirm_data">
          <div>{{ $headquarter['company_name'] }}</div>
        </div>
      </div>
    </div>
    <div class="l-12 l-12--gap24">
      <div class="l-12__5 mgn-t-3">
        <div class="lbl-title display-inline--flex cf_label">
          <p class="hp-label"> 住所</p>
          {{--  <p class="mandatory margin-left--auto">必須</p>  --}}
        </div>
      </div>
      <div class="l-12__7">
        <div class="c-input">
          <input type="hidden" name="address" placeholder="東京都◯◯区◯◯ビル名" class="hp-input" value="{{ $headquarter['address'] }}">
      </div>
      <div class="c-input confirm_data">
        <div>{{ $headquarter['address'] }}</div>
      </div>
      </div>
    </div>
    <div class="l-12 l-12--gap24">
      <div class="l-12__5 mgn-t-3">
        <div class="lbl-title display-inline--flex cf_label">
          <p class="hp-label"> 電話番号</p>
          {{--  <p class="mandatory margin-left--auto">必須</p>  --}}
        </div>
      </div>
      <div class="l-12__7">
        <div class="c-input">
          <input type="hidden" name="tel_no" placeholder="0123-456-7890" class="hp-input" value="{{ $headquarter['tel'] }}">
        </div>
        <div class="c-input confirm_data">
          <div>{{ $headquarter['tel'] }}</div>
        </div>
      </div>
    </div>
    <div class="l-12 l-12--gap24">
      <div class="l-12__5 mgn-t-3">
        <div class="lbl-title display-inline--flex cf_label">
          <p class="hp-label"> ご担当者様名</p>
          {{--  <p class="mandatory margin-left--auto">必須</p>  --}}
        </div>
      </div>
      <div class="l-12__7">
        <div class="display-inline--flex">
          <div class="">
            <input placeholder="姓 名" class="no-radius hp-input" name="last_name"  type="hidden" class="hp-input" value="{{ $headquarter['last_name'] }}">
          </div>
          <div class="c-input confirm_data">
            <div>{{ $headquarter['last_name'] }}</div>
          </div>
          <div class=" ">
            <input placeholder="姓 名" class="no-radius hp-input" name="first_name"  type="hidden" class="hp-input" value="{{ $headquarter['first_name'] }}">
          </div>
          <div class="c-input confirm_data">
            <div>{{ $headquarter['first_name'] }}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-12 l-12--gap24">
      <div class="l-12__5 mgn-t-3">
        <div class="lbl-title display-inline--flex cf_label">
          <p class="hp-label"> メールアドレス</p>
          {{--  <p class="mandatory margin-left--auto">必須</p>  --}}
        </div>
      </div>
      <div class="l-12__7">
        <div class="c-input">
          <input type="hidden" name="email" placeholder="sample000@mail.com" class="hp-input" value="{{ $headquarter['email'] }}">
      </div>
      <div class="c-input confirm_data">
        <div>{{ $headquarter['email'] }}</div>
      </div>
      </div>
    </div>
    <div class="l-12 l-12--gap24">
      <div class="l-12__5 mgn-t-3">
        <div class="lbl-title display-inline--flex cf_label">
          <p class="hp-label"> ログインパスワード</p>
          {{--  <p class="mandatory margin-left--auto">必須</p>  --}}
        </div>
      </div>
      <div class="l-12__7">
        <div class="c-input">
          <input type="hidden" name="password" placeholder="半角英数記号が使えます。6文字以上、32文字以内。" class="hp-input" value="{{ $headquarter['password'] }}">
        </div>
        <div class="c-input confirm_data">
          <input  placeholder="半角英数記号が使えます。6文字以上、32文字以内。" name="password"  type="password" style="-webkit-text-security: disc;"  class="hp-input input_no_border" value="{{ $headquarter['password'] }}" >
          {{--  <div>{{ $headquarter['password'] }}</div>  --}}
        </div>
      </div>
    </div>
    <div class="l-12 l-12--gap24">
      <div class="l-12__5 mgn-t-3">
        <div class="lbl-title display-inline--flex cf_label">
          <p class="hp-label"> お支払い方法</p>
        </div>
      </div>
      <div class="l-12__7 mgn">
        <div class="p-list__item__data_4" style="overflow-wrap: break-word;">
          <input name="payment_method"  type="hidden" value="{{ $headquarter['payment_method'] }}" @if($headquarter['payment_method'] == 1) checked @endif />
          <input name="payment_method"  type="hidden" value="{{ $headquarter['payment_method'] }}" @if($headquarter['payment_method'] == 2) checked @endif/>
          <input name="payment_method"  type="hidden" value="{{ $headquarter['payment_method'] }}" @if($headquarter['payment_method'] == 3) checked @endif/>
        </div>
        <div class="c-input confirm_data">
          @if($headquarter['payment_method'] == 1)
          <div>銀行の口座引落</div>
          @elseif($headquarter['payment_method'] == 2)
          <div>クレジットカード</div>
          @elseif($headquarter['payment_method'] == 3)
          <div>銀行振込</div>
          @endif
        </div>
      </div>
    </div>
    <div class="foot_3 mgn-t-5">
      <div class="p-login__buttonArea">
        <a href="/register/thanks"><button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">登録する</button></a>
      </div>
    </div>
  </form>
</div>
</div>
  {{--  <div class='registerHeadquarter_btn'>
    <a type ='button' href="/register/registerHeadquarter/confirmation"><button class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2">Confirm</button></a>
  </div>  --}}
  @endslot
  @endcomponent
@endsection
