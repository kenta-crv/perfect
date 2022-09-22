@extends('store.layouts.login_layout')
@section('page_name', '資料')
@section('title', '資料')

@section('url', request()->url())
@section('image', asset('image/img/ogp.png'))

@section('content')
<div class="header__primary">
    資料請求
  <hr>
</div>
<div class="p-login">
  {{ Form::open(['route' => ['store.register.confirm'], 'method' => 'post', 'class' => 'h-adr', 'name' => 'confirm']) }}
	<div class="p-login__body">
    <span class="p-country-name" style="display:none;">Japan</span>
		<div class="l-container__sp">
			<div class="p-login__body__member">
				<div class="head">
					<p class="title_header">御社の情報を入力し送信いただくと、Eメールに資料を添付してお送りします。　（*の項目は入力必須です）</p>
				</div>
			</div><br/><br/>
			<div class="body">


       <form class='form_mat'>
        <div class='row_mat'>
          <div class='label_mat'>
            <label>宅建業免許番号 *: </label>
          </div>
          <div class='text-mat' >
            <input type="text" class='input_mat' name="firstname" placeholder="">
          </div>
        </div>

        <div class='row_mat'>
          <div class='label_mat'>
            <label>会社名・屋号 *:  </label>
          </div>
          <div class='text-mat' >
            <input type="text" class='input_mat' name="firstname" placeholder="">
          </div>
        </div>

        <div class='row_mat'>
          <div class='label_mat'>
            <label>電話番号 *: </label>
          </div>
          <div class='text-mat'>
            <input type="text" class='input_mat' name="firstname" placeholder="">
          </div>
        </div>

        <div class='row_mat'>
          <div class='label_mat'>
            <label>都道府県 *:  </label>
          </div>
          <div class='text-mat' >
            <input type="text" class='input_mat' name="firstname" placeholder="">
          </div>
        </div>

        <div class='row_mat'>
          <div class='label_mat'>
            <label>ご担当者様名 *: </label>
          </div>
          <div class='text-mat' >
            <input type="text" class='input_mat' name="firstname" placeholder="">
          </div>
        </div>

        <div class='row_mat'>
          <div class='label_mat'>
            <label>メールアドレス *: </label>
          </div>
          <div class='text-mat' >
            <input type="text" class='input_mat' name="firstname" placeholder="">
          </div>
        </div>

        <div class='row_mat'>
          <div class='label_mat'>
            <label>ご検討の状態は？: </label>
          </div>
          <div class='text-mat' >
            <input type="text" class='input_mat' name="firstname" placeholder="">
          </div>
        </div>

        <div class='row_mat'>
          <div class='label_mat'>
            <label>お支払い方法 *: </label>
          </div>
          <div class='text-mat'>
            <label class="radio-inline">
              <input type="radio" name="optradio" checked> クレジットカード
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" > クレジットカード
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" > クレジットカード
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" > クレジットカード
            </label>
          </div>

          </div>
        </div>

        <div >
          <div class="p-login__buttonArea">
            <button type="submit" class="c-button c-button--full c-button--thinBlue button_mat">確認画面へ</button>
          </div>
        </div>
       </form>

        {{--  <ul class="p-formList">
          <li class="p-formList__item">
            <div class="p-formList__item__body">
              <div class="c-input c-input--full">
                <div class="login_label">宅建業免許番号 *:</div>
                <div class="col-75">
                  <input class="no-radius" placeholder="メールアドレス" name="email" type="email" value="{{ old('email') }}">
                </div>
              </div>
            </div>
            @include('store.layouts.error', ['name' => 'email'])
          </li>
          <li class="p-formList__item">
            <div class="p-formList__item__body">
              <div class=" c-input c-input--full ">
                <div class="login_label">会社名・屋号 *:</div>
                <div class="col-75">
                  <input placeholder="パスワード" class="no-radius" name="password" type="text" value="">
                </div>
              </div>
            </div>
            @include('store.layouts.error', ['name' => 'password'])
          </li>
          <li class="p-formList__item">
            <div class="p-formList__item__body">
              <div class=" c-input c-input--full ">
                <div class="login_label">電話番号 *:</div>
                <div class="col-75">
                  <input placeholder="パスワード" class="no-radius" name="password" type="text" value="">
                </div>
              </div>
            </div>
            @include('store.layouts.error', ['name' => 'password'])
          </li>
          <li class="p-formList__item">
            <div class="p-formList__item__body">
              <div class=" c-input c-input--full ">
                <div class="login_label">都道府県 *:</div>
                <div class="l-12 l-12--gap8">
                  <input placeholder="パスワード" class="no-radius" name="password" type="text" value="">
                </div>
              </div>
            </div>
            @include('store.layouts.error', ['name' => 'password'])
          </li>
          <li class="p-formList__item">
            <div class="p-formList__item__body">
              <div class=" c-input c-input--full ">
                <div class="login_label">ご担当者様名 *:</div>
                <div class="l-12 l-12--gap8">
                  <input placeholder="パスワード" class="no-radius" name="password" type="text" value="">
                  <input placeholder="パスワード" class="no-radius" name="password" type="text" value="">
                </div>
              </div>
            </div>
            @include('store.layouts.error', ['name' => 'password'])
          </li>
          <li class="p-formList__item">
            <div class="p-formList__item__body">
              <div class=" c-input c-input--full ">
                <div class="login_label">メールアドレス *:</div> <input placeholder="パスワード" class="no-radius" name="password" type="text" value="">
              </div>
            </div>
            @include('store.layouts.error', ['name' => 'password'])
          </li>
          <li class="p-formList__item">
            <div class="p-formList__item__body">
              <div class=" c-input c-input--full ">
                <div class="login_label">ご検討の状態は？:</div> <input placeholder="パスワード" class="no-radius" name="password" type="text" value="">
              </div>
            </div>
            @include('store.layouts.error', ['name' => 'password'])
          </li>
          <li class="p-formList__item">
            <div class="p-formList__item__body">
              <div class=" c-input c-input--full ">
                <div class="login_label">お支払い方法 *:</div>
                <div class="l-12 l-12--gap8">
                 <div class="c-input c-input--radio with-border">
                    <input id="gender_men" name="gender" type="radio" value="1">
                    <label for="gender_men">クレジットカード</label>

                    <input id="gender_men" name="gender" type="radio" value="1">
                    <label for="gender_men">クレジットカード</label>

                    <input id="gender_men" name="gender" type="radio" value="1">
                    <label for="gender_men">クレジットカード</label>

                    <input id="gender_men" name="gender" type="radio" value="1">
                    <label for="gender_men">クレジットカード</label>
                 </div>
                </div>
              </div>
            </div>
            @include('store.layouts.error', ['name' => 'password'])
          </li>
        </ul>  --}}
      </div>
		</div>
	</div>
  {{ Form::close() }}
</div>


{{--  @php($pathname = 'User')
<script>
  $(document).on('change', '.imageUpload input[type="file"]', function() {
    const [file] = this.files
    if (this.files.length == 0) {
      $(this).parent().css('background', 'url("'+$(this).parent().data('current')+'")');
      $(this).parent().find('[type=file]').val("");
      $(this).parent().find('[type=hidden]').val("");
    } else {
      logo_preview.src = URL.createObjectURL(file)
      /* Ajax経由で画像登録 */
      var fd = new FormData();
      fd.append('up_file', this.files[0]); // 画像
      fd.append('access', 'private'); // 非公開
      fd.append('_token', $('meta[name="csrf-token"]').attr('content')); // 画像
      $.ajax({
        url: "{{ route('common.uploadImage' ,$pathname) }}", // 画像登録処理を行うPHPファイル(api)
        type: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        context: $(this).parent(),
      }).done(function (data) {
        const url = data.path;
        var path = (new URL(url)).pathname.slice(1);
        $(this).css('background', 'url("' + url + '")');
        $(this).find('#photo_src').val(url);
        $(this).find('#photo_path').val(path);
      }).fail(function (jqXHR, textStatus, errorThrown) {
        consoel.log(textStatus)
        $(this).css('background', 'url("{{ asset('image/icon/icon_image.svg') }}")');
        $(this).find('[type=file]').val("");
        $(this).find('[type=hidden]').val("");
        alert("エラーが発生しました。");
      });
    }
  });  --}}
{{--  </script>  --}}

@endsection
