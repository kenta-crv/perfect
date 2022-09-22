@extends('admin.layout.layout--admin')
@section('title', $title ?? 'ユーザー詳細')
@section('content')
<form  method="post" action="{{ route('admin.user.store') }}" enctype = 'multipart/form-data' class="h-adr">
  <input  style="display:none" name="tel" type="text" />

  @csrf
  @component('admin.component._p-detail')
    @slot('back')
      {{route('admin.user.index')}}
    @endslot
    @slot('title')
      <h2 class="p-index__head__title">
        <div class="c-image c-image--user"></div>
        ユーザー新規登録
      </h2>
    @endslot


    @slot('body')
    <div class="l-12 l-12--gap24">
      <div class="l-12__6">
        <div class="p-detailBox">
          <div class="p-detailBox__head">
            <h3 class="p-detailBox__head__title">基本情報</h3>
          </div>
          <div class="p-detailBox__body">
            <ul class="p-list ">
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                  <span class="required"></span>氏名
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="p-list__item__data">
                    <div class="l-12 l-12--gap8">
                      <div class="c-input c-input--full">
                        <div class="l-12__6">
                          <div class="c-input ">
                            <input name="last_name" type="text" placeholder="姓">
                          </div>
                        </div>
                        <span class="unit_min"></span>
                        <div class="l-12__6">
                          <div class="c-input ">
                            <input type="text" name="first_name" placeholder="名">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                  <span class="required"></span>ふりがな
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="p-list__item__data">
                    <div class="l-12 l-12--gap8">
                      <div class="c-input c-input--full">
                        <div class="l-12__6">
                          <div class="c-input ">
                            <input type="text" name="last_name_kana" placeholder="せい">
                          </div>
                        </div>
                        <span class="unit_min"></span>
                        <div class="l-12__6">
                          <div class="c-input ">
                            <input type="text" name="first_name_kana" placeholder="かな">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                  <span class="required"></span>ニックネーム
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input c-input--full">
                    <input type="text" name="nickname" value="" placeholder="ニックネーム">
                  </div>
                </div>
              </li>
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                  <span class="required"></span>生年月日
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="p-list__item__data">
                    <div class="l-12 l-12--gap8">
                      <div class="c-input c-input--full">
                        <div class="l-12__6">
                          <div class="c-input--select__iconCalendar c-input--full">
                            <input type="text" name="birth_date" value="2021-12-10" class="text-span flatpickr flatpickr-input" readonly="readonly">
                          </div>
                        </div>
                        <span class="unit_min"></span>
                        <div class="l-12__6">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                  <span class="required"></span>登録企業名
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input c-input--full">
                    <input type="text" name="company_name" placeholder="登録企業名" value="">
                  </div>
                </div>
              </li>
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                  <span></span>プロフィール画像
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="p-list__item__data">
                    <div class="p-list__item__data">
                      <div class="c-input c-input--file">
                        <label for="photo_path" id="main-image" class="c-image c-image--round imageUpload c-image--152">
                          <input id="photo_path" accept="image/*" enctype="multipart/form-data" class="file_img_preview" name="photo_path" type="file">
                          <img id="logo_preview">
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="l-12__6">
        <div class="p-detailBox__head">
          <h3 class="p-detailBox__head__title">連絡先情報</h3>
        </div>
        <span class="p-country-name" style="display:none;">Japan</span>
        <ul class="p-list ">
            <li class="p-list__item p-list__item--center">
              <div class="p-list__item__label">
                住所
              </div>
              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="c-input c-input--full">
                  {{ Form::text('zip', old('zipcode', session('user.zipcode')), ['placeholder' => '郵便番号(ハイフンなし)', 'class' => 'p-postal-code']) }}
                </div>
              </div>
            </li>
            <li class="p-list__item p-list__item--center" class="p-region-id">
              <div class="p-list__item__label">
              </div>
              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input c-input--select">
                    {{ Form::select('pref', config('prefecture.PREFECTURE'), old('prefecture', session('user.prefecture')), ['placeholder' => '都道府県','class' => 'p-region-id']) }}
                  </div>
              </div>
            </li>
            <li class="p-list__item p-list__item--center">
              <div class="p-list__item__label">

              </div>
              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="c-input c-input--full">
                  {{ Form::text('address1', old('address1', session('user.address')), ['placeholder' => '市区町村','class' => 'p-locality p-street-address p-extended-address']) }}
                </div>
              </div>
            </li>
            <li class="p-list__item p-list__item--center">
              <div class="p-list__item__label">

              </div>
              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="c-input c-input--full">
                  {{ Form::text('address2', old('small_address', session('user.small_address')), ['placeholder' => '建物名・号室', 'class' => '']) }}
                </div>
              </div>
            </li>
            <li class="p-list__item p-list__item--center">
              <div class="p-list__item__label">
                <span class="required"></span>電話番号
              </div>
              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full ">
                      <div class="l-12__6">
                        <div class="c-input ">
                          <input id="tel1" name="tel" type="text" maxlength="4">
                        </div>
                      </div><span class="unit_min">__</span>
                      <span class="unit_min"></span>
                      <div class="l-12__6">
                        <div class="c-input ">
                          <input id="tel2" name="tel2" type="text" maxlength="4">
                        </div>
                      </div><span class="unit_min">__</span>
                      <span class="unit_min"></span>
                      <div class="l-12__6">
                        <div class="c-input ">
                          <input id="tel3" name="tel3" type="text" maxlength="4">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="p-list__item p-list__item--center">
              <div class="p-list__item__label">
                <span class="required"></span>メールアドレス
              </div>
              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="p-list__item__data">
                  <div class="c-input c-input--full">
                      <input type="text" name="email" placeholder="メールアドレスを入力してください">
                  </div>
                </div>
              </div>
            </li>
            <li class="p-list__item p-list__item--center">
              <div class="p-list__item__label">
                <span class="required"></span>パスワード
              </div>
              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="p-list__item__data">
                  <div class="c-input c-input--full">
                      <input type="password" placeholder="6文字以上" name="password">
                  </div>
                </div>
              </div>
            </li>
            <li class="p-list__item p-list__item--center">
              <div class="p-list__item__label">
                <span class="required"></span>確認用 <br>パスワード
              </div>
              <div class="p-list__item__data" style="overflow-wrap: break-word;">
                <div class="p-list__item__data">
                  <div class="c-input c-input--full">
                      <input type="password" placeholder="6文字以上" name="confirm_password">
                  </div>
                </div>
              </div>
            </li>
        </ul>
        {{--  <div class="spacer-1-bottom">
        </div>
        <div class="c-input c-input--full ">
            <a href="{{route('admin.company.index')}}"  class="c-button c-button-full-width c-button--medium margin-space--1 c-button--secondary">キャンセル</a>
            <button type="submit" class="c-button c-button-full-width c-button--medium ">保存する</button>
        </div>  --}}

      </div>
    </div>
    @endslot
    @slot('foot')
    @include('web.layouts.error', ['name' => 'last_name'])
      @include('web.layouts.error', ['name' => 'first_name'])
      @include('web.layouts.error', ['name' => 'last_name_kana'])
      @include('web.layouts.error', ['name' => 'first_name_kana'])
      @include('web.layouts.error', ['name' => 'nickname'])
      @include('web.layouts.error', ['name' => 'birth_date'])
      @include('web.layouts.error', ['name' => 'company_name'])
      @include('web.layouts.error', ['name' => 'zip_code'])
      @include('web.layouts.error', ['name' => 'prefecture'])
      @include('web.layouts.error', ['name' => 'address'])
      @include('web.layouts.error', ['name' => 'small_address'])
      @include('web.layouts.error', ['name' => 'tel'])
      @include('web.layouts.error', ['name' => 'email'])
      @include('web.layouts.error', ['name' => 'password'])
    <div class="p-buttonWrap p-buttonWrap--right">
      <a href="{{route('admin.user.index')}}" class="c-button c-button--secondary">キャンセル</a>
      <button type="submit" id="saveUser" class="c-button  c-button--medium ">保存する</button>
    </div>
    @endslot
  @endcomponent
</form>
<script type="text/javascript">
photo_path.onchange = evt => {
  const [file] = photo_path.files
  if (file) {
    logo_preview.src = URL.createObjectURL(file)
    $('#main-image').addClass('c-input--file__clear');
  }
}
</script>
@endsection

