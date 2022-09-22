@extends('admin.layout.layout--admin')
@section('title', $title ?? 'ユーザー詳細')
@section('content')
<form  method="post" action="{{ route('admin.user.update', $user->id) }}" enctype = 'multipart/form-data' >
  <input  style="display:none" name="tel" type="text" value="{{ $user->tel}}"/>
  @csrf
  @component('admin.component._p-detail')
    @slot('back')
      {{route('admin.company.index')}}
    @endslot
    @slot('title')
      <h2 class="p-index__head__title">
        <div class="c-image c-image--user"></div>
        ユーザー編集
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
                              <input name="last_name" value="{{ $user['last_name'] }}" type="text" placeholder="姓">
                            </div>
                          </div>
                          <span class="unit_min"></span>
                          <div class="l-12__6">
                            <div class="c-input ">
                              <input type="text" value="{{ $user['first_name'] }}" name="first_name" placeholder="名">
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
                              <input type="text" value="{{ $user['last_name_kana'] }}" name="last_name_kana" placeholder="せい">
                            </div>
                          </div>
                          <span class="unit_min"></span>
                          <div class="l-12__6">
                            <div class="c-input ">
                              <input type="text" value="{{ $user['first_name_kana'] }}" name="first_name_kana" placeholder="かな">
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
                      <input type="text" name="nickname" value="{{ $user['nickname'] }}" value="" placeholder="ニックネーム">
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
                              <input type="text" name="birth_date" value="{{ $user['birth_date'] }}" class="text-span flatpickr flatpickr-input" readonly="readonly">
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
                    <span></span>登録企業名
                  </div>
                  <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="c-input c-input--full">
                      <input type="text" name="company_name" value="{{ $user['company_name'] }}" placeholder="登録企業名" value="">
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
                            <img id="logo_preview" src="{{ $user->thumbnail }}">
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
          <div class="p-detailBox">
            <div class="p-detailBox__head">
              <h3 class="p-detailBox__head__title">連絡先情報</h3>
            </div>
            <div class="p-detailBox__body">
              <ul class="p-list ">
                <li class="p-list__item p-list__item--center">
                  <div class="p-list__item__label">
                    <span class="required"></span>住所
                  </div>
                  <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="p-list__item__data">
                        <div class="c-input c-input--full">
                            <input type="text" placeholder="郵便番号" value="{{ $user['zip_code'] }}" name="zip_code">
                        </div>
                    </div>
                    <br>
                    <div class="p-list__item__data">
                      <div class="c-input c-input--select c-input--select__iconSelect c-input--icon c-input--full">
                        <select name="prefecture">
                          <option>都道府県を選択してください</option>
                          @foreach ($prefecture as $key => $item)
                            <option value="{{ $key }}" {{ $user['prefecture'] == $key  ? 'selected' : '' }}>{{ $item }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="p-list__item__data">
                      <div class="c-input c-input--full">
                          <input type="text" value="{{ $user['address'] }}" name="address" placeholder="市区町村">
                      </div>
                    </div>
                    <br>
                    <div class="p-list__item__data">
                      <div class="c-input c-input--full">
                          <input type="text" name="small_address" value="{{ $user['small_address'] }}" placeholder="番地・建物名・部屋番号">
                      </div>
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
                              <input id="tel1" name="tel" type="text" maxlength="4" value="{{$user['tel']}}">
                            </div>
                          </div><span class="unit_min">__</span>
                          <span class="unit_min"></span>
                          <div class="l-12__6">
                            <div class="c-input ">
                              <input id="tel2" name="tel2" type="text" maxlength="4" value="{{$user['tel2']}}">
                            </div>
                          </div><span class="unit_min">__</span>
                          <span class="unit_min"></span>
                          <div class="l-12__6">
                            <div class="c-input ">
                              <input id="tel3" name="tel3" type="text" maxlength="4" value="{{$user['tel3']}}">
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
                          <input type="text" name="email" value="{{ $user['email'] }}" placeholder="メールアドレスを入力してください" readonly="readonly">
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
                          <input type="password" placeholder="パスワードを入力してください" value="" name="password">
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
                          <input type="password" placeholder="パスワードを入力してください" value="" name="password_confirmation">
                      </div>
                    </div>
                    <br>
                    @foreach ($errors->all() as $error)
                      <div class="error" style="text-align: right; color: red;">{{ $error }}</div>
                    @endforeach

                    {{--@if($errors->has('password'))
                      <div class="error" style="text-align: right; color: red;">{{ $errors->first('password') }}</div>
                    @endif
                    @if($errors->has('password_confirmation'))
                      <div class="error" style="text-align: right; color: red;">{{ $errors->first('password_confirmation') }}</div>
                    @endif--}}
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    @endslot
    @slot('foot')
    <div class="p-buttonWrap p-buttonWrap--right">
      <a href="{{route('admin.user.index')}}" class="c-button c-button--secondary">キャンセル</a>
      <button type="submit" id="saveUser" class="c-button  c-button--medium ">保存する</button>
    </div>
    @endslot
  @endcomponent
</form>
<script type="text/javascript">
  $(document).ready(function(){
    const myDecipher = decipher('mySecretSalt')
    console.log(myDecipher("$2y$10$MuOUsquEb/TC9mIAw2LMzu6FcBu18Unn4u..llytvQn3JIeLUNShm"))
  })

  photo_path.onchange = evt => {
    const [file] = photo_path.files
    if (file) {
      logo_preview.src = URL.createObjectURL(file)
      $('#main-image').addClass('c-input--file__clear');
    }
  }

  const decipher = salt => {
    const textToChars = text => text.split('').map(c => c.charCodeAt(0));
    const applySaltToChar = code => textToChars(salt).reduce((a,b) => a ^ b, code);
    return encoded => encoded.match(/.{1,2}/g)
      .map(hex => parseInt(hex, 16))
      .map(applySaltToChar)
      .map(charCode => String.fromCharCode(charCode))
      .join('');
  }

</script>
@endsection

