@php
  $array = config('const');
@endphp


{{-- @extends('store.layouts.layout-store-hp') --}}
@extends('robore.layout.layout--forms')
@section('title', $title ?? '新規登録')
@section('content')
  @component('store.component._p-index')
  @slot('body')
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
              <form action="{{ route('register.confirmRegister') }}" method='POST'>
                @csrf
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label"> 宅建業免許番号</p>
                      <p class="mandatory margin-left--auto">必須</p>
                    </div>
                  </div>
                  <div class="l-12__6">
                    <div class="c-input ">
                      <div class="c-input c-input--full_40">
                        <select name="license_slct" class="lbl-gray dft-input-hp keep-slct-01" placeholder="選択してください" id="select">
                          <option value="" selected>選択してください</option>
                          @foreach ($array['license'] as $item)
                            <option value="{{ $item }}" {{ old('license_slct') == $item  ? 'selected' : '' }}>{{ $item }}</option>
                          @endforeach
                        </select>
                      </div>
                      <span class="mgn-t-2 mgn-l-5 mgn-r-2 fnt-sz-20">(</span>
                      <input placeholder="" class="no-radius hp-input" name="license_number_1" type="text" value="{{ old('license_number_1') }}" style="width:80px;">
                      <span class="mgn-t-2 mgn-l-2 mgn-r-5 fnt-sz-20">)</span>
                      <span class="mgn-t-4 mgn-r-2 fnt-sz-6">第</span>
                      <input placeholder="6桁の半角数字" class="no-radius hp-input" name="license_number_2" type="text" value="{{ old('license_number_2') }}">
                      <span class="mgn-t-4 mgn-l-2  fnt-sz-6">号</span>
                    </div>
                    <div>
                      <span class="text-danger"> @error('license_slct') {{ $message }} @enderror </span>
                      <span class="text-danger"> @error('license_number_2') {{ $message }} @enderror </span>
                    </div>
                  </div>
                  <div class="l-12__3 alg-i-c-rs">
                  
                    <button type="submit"  class="c-lbl-plain hp-button fa-solid btn-right-2" formaction="{{route('no_license')}}">
                      <span>
                        免許がないので問い合わせる
                      </span>
                    </button>
                    {{-- <a class="c-lbl-plain hp-button fa-solid btn-right-2" for="">
                      免許がないので問い合わせる1
                    </a> --}}
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
                      <input placeholder="株式会社 ロボレ" type="text" name="company_name" class="hp-input" value="{{ old('company_name') }}">
                    </div>
                    <span class="text-danger"> @error('company_name') {{ $message }} @enderror </span>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label">住所  </p>
                      <p class="mandatory margin-left--auto">必須</p>
                    </div>
                  </div>
                  <div class="l-12__9">
                    <div class="c-input c-input--full_40">
                      <input placeholder="東京都◯◯区◯◯ビル名"  type="text" name="address" class="hp-input" value="{{ old('address') }}">
                    </div>
                    <span class="text-danger"> @error('address') {{ $message }} @enderror </span>
                  </div>
                </div>
                <div class="l-12 l-12--gap24">
                  <div class="l-12__3 mgn-t-3">
                    <div class="lbl-title display-inline--flex">
                      <p class="hp-label">電話番号 </p>
                      <p class="mandatory margin-left--auto">必須</p>
                    </div>
                  </div>
                  <div class="l-12__3">
                    <div class="c-input c-input--full_40">
                      <input placeholder="0123-456-78900" type="text" name="contract_number" class="hp-input" value="{{ old('contract_number') }}">
                    </div>
                    <span class="text-danger"> @error('contract_number') {{ $message }} @enderror </span>
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
                      <input placeholder="姓" class="no-radius hp-input" name="last_name" type="text" class="hp-input" value="{{ old('last_name') }}">
                    </div>
                    <span class="text-danger"> @error('last_name') {{ $message }} @enderror </span>
                  </div>
                  <div class="l-12__3">
                    <div class="c-input c-input--full_32 ">
                      <input placeholder="名" class="hp-input" name="first_name" type="text" value="{{ old('first_name') }}">
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
                      <input placeholder="sample000@mail.com" type="email" name="email" class="hp-input" value="{{ old('email') }}">
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
                      <input placeholder="半角英数記号が使えます。6文字以上、32文字以内。"  type="password" name="password" class="hp-input" value="{{ old('password') }}">
                    </div>
                    <span class="text-danger"> @error('password') {{ $message }} @enderror </span>
                    {{-- <span class="text-danger"> @error('password') {{ $failpass }} @enderror </span> --}}
                    {{-- <span class="text-danger"> {{ Session::get('failpass') }}  </span> --}}
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
                      <input name="usage_plan" type="radio" value="1" {{(old('usage_plan') == '1') ? 'checked' : ''}}/>
                      <p class="label-radio">スターター 月額　3,000円</p>
                      <input name="usage_plan" type="radio" value="2" value="{{ old('usage_plan') }}" {{(old('usage_plan') == '2') ? 'checked' : ''}}/>
                      <p class="label-radio">ベーシック 月額　5,000円</p><br/>
                    </div>
                    <span class="text-danger"> @error('usage_plan') {{ $message }} @enderror </span>
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
                      {{-- <input name="payment_method"  type="radio" value="1" /><p class="label-radio"> 銀行の口座引落</p> --}}
                      <input name="payment_method" checked type="radio" value="2" /><p class="label-radio"> クレジットカード</p>
                      {{-- <input name="payment_method"  type="radio" value="3" /><p class="label-radio">銀行振込</p><br/> --}}
                      <span class="text-danger"> @error('payment_method') {{ $message }} @enderror </span>
                    </div>
                    <span class="fnt-sz-5">※クレジットカード以外のお支払い方法をご希望の方は、大変お手数ですが<button type="submit" formaction="{{route ('no_license')}}" class="btn-none" ><a class="fnt-sz-5 grn-txtgn">こちら</a></button>からお問合せください。</span>
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
  @endslot
  @endcomponent
  
  <script>
    $(document).ready(function() {
      $('#select').change(function() {
        var current = $('#select').val();
        if (current != '') {
            $('#select').css('color','#333');
        } else {
            $('#select').css('color','#ABABAB');
        }
      }); 
    });
  </script>
@endsection
