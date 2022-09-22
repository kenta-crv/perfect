
@php
$array = [
  'Condisiderations' => [
    '1' => [
      'label' => '導入を検討している',
      'value' => '1'
    ],
    '2' => [
      'label' => '内容を見て、よければ導入する可能性がある',
      'value' => '2'
    ],
    '3' => [
      'label' => '情報収集として',
      'value' => '3'
    ],
    '4' => [
      'label' => 'その他',
      'value' => '4'
    ],
  ]
]
@endphp
@extends('robore.layout.layout--forms')
@section('title', $title ?? '資料請求')
@section('content')
  @component('store.component._p-index')
  @slot('body')
  <div class="c-contianer-box_4 w-per-18">
    <div class="box-data mgn-b-6">
        <div class="container-table ">
            <div class="container_center "></div>
                <p class="register-label">
                  資料請求
                  <hr class="register-label-horizontal">
                </p>
        </div><br/>
        <div class="container_center"></div>
        <div class="register-description">
            <p class="font_description">スタッフの入れ替わりを考えると、セキュリティの観点より人数分ライセンスを ご用意いただく事をお勧めします。</p>
        </div>
    </div>

    <form action="{{ route('requestinformation.confirm') }}" method="post">
      @csrf
      <div class="l-12 l-12--gap24">
        <div class="l-12__3 mgn-t-3">
          <div class="lbl-title display-inline--flex">
            <p class="hp-label"> 宅建業免許番号</p>
            {{-- <p class="mandatory margin-left--auto">必須</p> --}}
          </div>
        </div>
        <div class="l-12__9">
          <div class="c-input c-input--full_40">
            <input type="text" name="license" placeholder="東京都知事（１）第○○○○○号" class="hp-input" value="{{ old('license') }}">
          </div>
          <span class="text-danger"> @error('license') {{ $message }} @enderror </span>
        </div>
        {{-- <div class="l-12__3 alg-i-c-rs">
          <a class="c-lbl-plain hp-button fa-solid btn-right-2" for=""> 免許がないので問い合わせる
          </a>
          <a class="c-lbl-plain hp-button " for="">
            免許がないので問い合わせる
            <span class="fa-solid btn-right-2"></span>
          </a>
        </div> --}}
      </div>
      <div class="l-12 l-12--gap24">
        <div class="l-12__3 mgn-t-3">
          <div class="lbl-title display-inline--flex">
            <p class="hp-label">  会社名・屋号</p>
            <p class="mandatory margin-left--auto">必須</p>
          </div>
        </div>
        <div class="l-12__9">
          <div class="c-input c-input--full_40">
            <input type="text" name="company_name" placeholder="株式会社 ロボレ" class="hp-input" value="{{ old('company_name') }}">
          </div>
        <span class="text-danger"> @error('company_name') {{ $message }} @enderror </span>
        </div>
      </div>
      <div class="l-12 l-12--gap24">
        <div class="l-12__3 mgn-t-3">
          <div class="lbl-title display-inline--flex">
            <p class="hp-label"> 電話番号</p>
          </div>
        </div>
        <div class="l-12__3">
          <div class="c-input c-input--full_40">
            <input type="text" name="tel" placeholder="0123-456-7890" class="hp-input" value="{{ old('tel') }}">
          </div>
          <span class="text-danger"> @error('tel') {{ $message }} @enderror </span>
        </div>
      </div>
      <div class="l-12 l-12--gap24">
        <div class="l-12__3 mgn-t-3">
          <div class="lbl-title display-inline--flex">
            <p class="hp-label"> 都道府県</p>
          </div>
        </div>
        <div class="l-12__3">
          @php($pref = config('prefecture.PREFECTURE'))
          <div class="c-input c-input--full_40">
            <select name="prefecture" class="lbl-gray dft-input-hp  keep-slct-01">
              <option value="">選択してください</option>
              @foreach ($pref as $key => $item)
                <option value="{{ $key }}" {{ old('prefecture') == $key ? 'selected' : '' }}> {{ $item }}</option>
              @endforeach
            </select>
          </div>

          <span class="text-danger"> @error('prefecture') {{ $message }} @enderror </span>
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
          <div class="c-input ">
            <input placeholder="姓" class="no-radius hp-input" name="last_name" type="text" value="{{old('last_name')}}" >
          </div>
          <span class="text-danger"> @error('last_name') {{ $message }} @enderror </span>

        </div>
         <div class="l-12__3">
          <div class="c-input ">
            <input placeholder="名" class="hp-input" name="first_name" type="text" value="{{old('first_name')}}">
          </div>
            <span class="text-danger"> @error('first_name') {{ $message }} @enderror </span>
         </div>

        </div>
      <div class="l-12 l-12--gap24">
        <div class="l-12__3 mgn-t-3">
          <div class="lbl-title display-inline--flex">
            <p class="hp-label">メールアドレス</p>
            <p class="mandatory margin-left--auto">必須</p>
          </div>
        </div>
        <div class="l-12__9">
          <div class="c-input ">
            <input type="email" name="email" placeholder="sample000@mail.com" class="hp-input" value="{{old('email')}}">
          </div>
          <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
        </div>
      </div>
      <div class="l-12 l-12--gap24">
        <div class="l-12__3 mgn-t-3">
          <div class="lbl-title display-inline--flex">
            <p class="hp-label"> お問合せ内容</p>
            <p class="mandatory margin-left--auto">必須</p>

          </div>
        </div>
        <div class="l-12__9">
            <textarea id="content"  name="inquiry"  placeholder="お問い合わせ内容" style="height: 251px;" >{{old('inquiry')}}</textarea>
          <span class="text-danger"> @error('inquiry') {{ $message }} @enderror </span>
        </div>
      </div>
      <div class="l-12 l-12--gap24">
        <div class="l-12__3 mgn-t-3">
          <div class="lbl-title display-inline--flex">
            <p class="hp-label"> ご検討の状態は？</p>
          </div>
        </div>
        <div class="l-12__9 mgn-t-2">

          {{-- @foreach ($array['Condisiderations'] as $key => $item) --}}
            <div class="l-12 l-12--gap16">
              <div class="l-12__2 width-full_5 ">
                <label class="cnt">
                  <input class="yellow" type="checkbox"  name="status[1]" {{ ( is_array(old('status')) && in_array("導入を検討している", old('status')) ) ? 'checked ' : '' }} id="status1" value="導入を検討している" >
                  <span class="checkmark"></span>
                  <label for="status1">導入を検討している</label>
                </label>
                  <br>
              </div>
              <div class="l-12__2 width-full_5 ">
                <label class="cnt">
                  <input class="yellow" type="checkbox" name="status[2]" {{ ( is_array(old('status')) && in_array("内容を見て、よければ導入する可能性がある", old('status')) ) ? 'checked ' : '' }} id="status2" value="内容を見て、よければ導入する可能性がある" >
                  <span class="checkmark"></span>
                  <label for="status2">内容を見て、よければ導入する可能性がある</label>
                </label>
                  <br>
              </div>
              <div class="l-12__2 width-full_5 ">
                <label class="cnt">
                  <input class="yellow" type="checkbox" name="status[3]" {{ ( is_array(old('status')) && in_array("情報収集として", old('status')) ) ? 'checked ' : '' }} id="status3" value="情報収集として" >
                  <span class="checkmark"></span>
                  <label for="status3">情報収集として</label>
                </label>
                  <br>
              </div>
              <div class="l-12__2 width-full_5 ">
                <label class="cnt">
                  <input class="yellow" type="checkbox" name="status[4]" {{ ( is_array(old('status')) && in_array("その他", old('status')) ) ? 'checked ' : '' }} id="status4" value="その他" >
                  <span class="checkmark"></span>
                  <label for="status4">その他</label>
                </label>
                  <br>
              </div>
            </div>
        </div>

      </div>
      <div class="foot_3">
        <div class="p-login__buttonArea">
          <button type="submit" class="c-button_10 margin-top--10 c-button-sm c-button--thinBlue btn-right-white-2"><span>確認画面へ</span></button>
        </div>
      </div>
    </form>
  </div>
  @endslot
  @endcomponent
@endsection
