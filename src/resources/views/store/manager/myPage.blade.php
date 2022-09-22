@extends('store.layouts.layout-store-home')
@section('title', $title ?? 'マイページ')
@section('content')
  @component('admin.component._p-index')

    @slot('action')

    @endslot
    @slot('body')
    <div class="c-main-box active-cont">
      <div class="c-main-body">
       <span>マイページ</span>

<div class="edit">
  <form action="{{ route('storeAdmin.manager.account.update') }}" method="post">
    <input type="hidden" name="account_id" value="{{ $accounts->id }}">
    @csrf
    {{-- {{ method_field('put') }} --}}
    <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-4 mgn-r-4">
        <div class="lbl-title display-inline--flex width-full">
          <p class="mgn-t-1"> 会社名・屋号  *</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-1">
        <div class="mgn-t-4 active" >
          <label class="fnt-sz-4 mgn-t-1">{{ $accounts->company_name }}</label>
        </div>
        <div class="mgn-l-1 ">
          <input type="text" value="{{  $accounts->company_name }}" class="mpage-input-3 inactive"  name="company_name" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-1">
        <a class="mpage-btn mgn-t-5--list" >編集</a>
      </div>
      <div class="l-12__1 mgn-t-2" >
        <button class="mpage-btn mgn-t-3 mgn-l-10 inactive" type="submit" id="savebtn-1">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>

    <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-4 mgn-r-4">
        <div class="lbl-title display-inline--flex width-full">
          <p class="mgn-t-1"> 住所   *</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-2">
        <div class="mgn-t-4 ">
          <label class="fnt-sz-4 mgn-t-1" for="">{{ $accounts->address }}</label>
        </div>
        <div class="mgn-l-1">
          <input type="text" value="{{ $accounts->address }}" class="mpage-input-3 inactive"  name="address" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-2">
        <a class="mpage-btn mgn-t-5--list">編集</a>
      </div>
      <div class="l-12__1 mgn-t-2" >
        <button class="mpage-btn mgn-t-3 mgn-l-10 inactive" type="submit" id="savebtn-2">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>

    <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-4 mgn-r-4">
        <div class="lbl-title display-inline--flex width-full">
          <p class="mgn-t-1"> 電話番号   *</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-3">
        <div class="mgn-t-4 ">
          <label class="fnt-sz-4 mgn-t-1" for="">{{ $accounts->tel }}</label>
        </div>
        <div class="mgn-l-1 ">
          <input type="text" value="{{ $accounts->tel }}" class="mpage-input-3 inactive"  name="tel" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-3">
        <a class="mpage-btn mgn-t-5--list">編集</a>
      </div>
      <div class="l-12__1 mgn-t-2">
        <button class="mpage-btn mgn-t-3 mgn-l-10 inactive" type="submit" id="savebtn-3">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>

    <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-4 mgn-r-4">
        <div class="lbl-title display-inline--flex width-full">
          <p class="mgn-t-1"> メールアドレス   *</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-4">
        <div class="mgn-t-4 ">
          <label class="fnt-sz-4 mgn-t-1" for="">{{ $accounts->email }}</label>
        </div>
        <div class="mgn-l-1 ">
          <input type="text" value="{{ $accounts->email  }}" class="mpage-input-3 inactive"  name="email" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-4">
        <a class="mpage-btn mgn-t-5--list">編集</a>
      </div>
      <div class="l-12__1 mgn-t-2">
        <button class="mpage-btn mgn-t-3 mgn-l-10 inactive" type="submit" id="savebtn-4">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>
  </form>
    {{-- <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-4">
        <div class="lbl-title display-inline--flex width-full">
          <p> メールアドレス   *</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-4">
        <div class="mgn-t-4 ">
          <label class="fnt-sz-4" for="">{{ $accounts->email }}</label>
        </div>
        <div class="mgn-l-1">
          <div >
            <input type="text" value="{{ $accounts->email }}" class="mpage-input-3 inactive"  name="email" contenteditable="true">
            <div class="margin--none toggle_inactive inactive" id="changed_email">
              <span class="lbl-danger toggle_inactive mgn-b-2">※確認のため、パスワードを入力してください。</span>
              <input type="password" class="mpage-input-3 toggle_inactive" placeholder="Confirm Password"  name="confirm_password" contenteditable="true">
              <span class="text-danger"> @error('confirm_password') {{ $message }} @enderror </span>
              <button class="mpage-btn mgn-t-3 mgn-l-ato toggle_inactive" id="savebtn-4">編集</button>
            </div>              
          </div>
         <span class="text-danger" id="error-message"> @error('email') {{ $message }} @enderror </span>
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-4">
        <a class="mpage-btn mgn-t-3">編集</a>
      </div>
      <div class="l-12__1 mgn-t-2">
        <button class="mpage-btn mgn-t-3 mgn-l-10 inactive" type="button" id="show-confirmation-password">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div> --}}
    <form method="post" action="{{ route('storeAdmin.manager.updatepassword') }}">
    <input type="hidden" name="account_id" value="{{ $accounts->id }}">
    @csrf
    @if(Session::get('fail') || Session::get('failpass'))
    <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-4 mgn-r-4">
        <div class="lbl-title display-inline--flex width-full">
          <p class="mgn-t-1">ログインパスワード</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
     
      <div class="l-12__5 mgn-t-3 active" id="change-pw">
        <div class="mgn-l-1">
          <span class="mpage-desc mgn-t-2 mgn-r-5">旧パスワード</span>
          <input placeholder="旧しいパスワードを入力してくださ" name="current_password" class="mpage-input-2 padding_left_mpage" type="password">
        </div>
        <div class="mgn-l-23">
          <span class="text-danger"> {{ Session::get('fail') }}  </span>
        </div>
        <div class="mgn-l-1 mgn-t-2">
          <span class="mpage-desc mgn-t-2 mgn-r-5">新パスワード</span>
          <input placeholder="新しいパスワードを入力してくださ" type="password" name="password" id="upassword" class="mpage-input-2 padding_left_mpage"/>
        </div>

        <div class="mgn-l-22">
          <span class="text-danger"> {{ Session::get('failpass') }}  </span>
          <span class="lbl-danger mgn-b-2">※半角英数記号が使えます。6文字以上、32文字以内</span>
        </div>
        <div class="mgn-l-22 display-flex mgn-t-2">
          <label class="cnt mgn-t-2">
            <input class="yellow" type="checkbox" id="show-password" value="1" name="0">
            <span class="checkmark"></span>
            <label for="0">新パスワードを表示</label>
          </label>
          <button class="mpage-btn mgn-t-1 mgn-l-4" id="btn-6">編集</button>
        </div>
      </div>
    </div>
    
    @else
    <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-4 mgn-r-4">
        <div class="lbl-title display-inline--flex width-full">
          <p class="mgn-t-1">ログインパスワード</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-pw">
        <div class="mgn-t-4 mgn-l-1 ">
          <a href="#changepassword" class="grn-txt fnt-sz-4 mgn-t-1 ">パスワードの変更</a>
        </div>
      </div>
      <div class="l-12__5 mgn-t-3 inactive" id="change-pw">
        <div class="mgn-l-1">
          <span class="mpage-desc mgn-t-2 mgn-r-5">旧パスワード</span>
          <input placeholder="旧しいパスワードを入力してくださ" name="current_password" class="mpage-input-2 padding_left_mpage" type="password">
        </div>
       
        <div class="mgn-l-1 mgn-t-2">
          <span class="mpage-desc mgn-t-2 mgn-r-5">新パスワード</span>
          <input placeholder="新しいパスワードを入力してくださ" type="password" name="password" id="upassword" class="mpage-input-2 padding_left_mpage"/>
        </div>

        <div class="mgn-l-23" style="display: grid;">
          <span class="text-danger"> {{ Session::get('failpass') }}  </span>
          <span class="lbl-danger mgn-b-2">※半角英数記号が使えます。6文字以上、32文字以内</span>
        </div>
        <div class="mgn-l-22 display-flex mgn-t-2">
          <label class="cnt mgn-t-2">
            <input class="yellow" type="checkbox" id="show-password" value="1" name="0">
            <span class="checkmark"></span>
            <label for="0">新パスワードを表示</label>
          </label>
          <button class="mpage-btn mgn-t-1 mgn-l-4" id="btn-6">編集</button>
        </div>
      </div>
    </div>
  @endif
   
  </form>
    <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-2 mgn-r-4">
        <div class="lbl-title display-inline--flex width-full">
          <p class="mgn-t-1">ロール権限</p>
        </div>
      </div>
      <div class="mgn-t-3 mgn-l-1 display-flex">
        <span class="">管理者</span>
      </div>
    </div>
    <div class="l-12 l-12--gap24">
      <div class="l-12__2-05 mgn-t-2 mgn-r-4">
        <div class="lbl-title display-inline--flex width-full">
          <p class="mgn-t-1"> アクセスできる物件情報サイト</p>
          {{-- <p class="mandatory mgn-l-ato">必須</p> --}}
        </div>
      </div>
      <div class="mgn-t-3 mgn-l-1 display-flex">
        @php($dist = config('const.distributions'))
        @foreach($sites as $item)
          @foreach($dist as $key => $itemdist)
            @if($key == $item['site_id'])
              <div class="mgn-r-4">
                <span class="">{{ $itemdist }}</span>
              </div>
            @endif
          @endforeach
        @endforeach
      </div>
    </div>
    {{--  <div class="l-12 l-12--gap24">
      <div class="l-12__2 mgn-t-4">
        <div class="lbl-title display-inline--flex width-full">
          <p> ログインID</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-5">
        <div class="mgn-t-4 ">
          <label class="fnt-sz-4" for="">{{ $accounts->contract_id }}</label>
        </div>
        <div class="c-input ">
          <input type="text" value="{{ $accounts->contract_id }}" class="margin--none inactive"  name="contract_id" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-5">
        <a class="mpage-btn mgn-t-3">編集</a>
      </div>  --}}
      {{-- <div class="l-12__1 mgn-t-2">
        <button class="mpage-btn mgn-t-3 inactive" type="submit" id="savebtn-5">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div> --}}
  </form>

  

</div>

{{-- <div>
  <div class="form">
    <form >
      <div class="l-12 l-12--gap24">
        <div class="l-12__2 mgn-t-4">
          <div class="lbl-title display-inline--flex width-full">
            <p> 会社名・屋号  *</p>
            <p class="mandatory mgn-l-ato">必須</p>
          </div>
        </div>
        <div class="l-12__4">
          <div class="c-input ">
            <input type="text" value="アスケイト　本部" class="no-radius" readonly />
          </div>
        </div>
        <div class="l-12__1">
          <button class="mpage-btn mgn-t-3">保存</button>
        </div>
        <span class="text-danger">  </span>
      </div>

      <div class="l-12 l-12--gap24">
        <div class="l-12__2 mgn-t-4">
          <div class="lbl-title display-inline--flex">
            <p> 住所  *</p>
            <p class="mandatory margin-left--auto">必須</p>
          </div>
        </div>
        <div class="l-12__4">
          <div class="c-input ">
            <input value="東京都品川区XXXX" class="no-radius"type="text">
          </div>
        </div>
        <div class="l-12__1">
          <button class="mpage-btn mgn-t-3">保存</button>
        </div>
        <span class="text-danger">  </span>
      </div>

      <div class="l-12 l-12--gap24">
        <div class="l-12__2 mgn-t-4">
          <div class="lbl-title display-inline--flex">
            <p> 電話番号  *</p>
            <p class="mandatory margin-left--auto">必須</p>
          </div>
        </div>
        <div class="l-12__4">
          <div class="c-input ">
            <input value="03-XXXX-XXXX" class="no-radius"type="text">
          </div>
        </div>
        <div class="l-12__1">
          <button class="mpage-btn mgn-t-3">保存</button>
        </div>
        <span class="text-danger">  </span>
      </div>

      <div class="l-12 l-12--gap24">
        <div class="l-12__2 mgn-t-4">
          <div class="lbl-title display-inline--flex">
            <p> メールアドレス  *</p>
            <p class="mandatory margin-left--auto">必須</p>
          </div>
        </div>
        <div class="l-12__4">
          <div class="c-input ">
            <input value="satake.y@plenty.co.jp" class="no-radius"type="text">
          </div>
        </div>
        <div class="l-12__1">
          <button class="mpage-btn mgn-t-3">保存</button>
        </div>
        <span class="text-danger">  </span>
      </div>

      <div class="l-12 l-12--gap24">
        <div class="l-12__2 mgn-t-4">
          <div class="lbl-title display-inline--flex">
            <p> ログインID</p>
            <p class="mandatory margin-left--auto">必須</p>
          </div>
        </div>
        <div class="l-12__4 mgn-t-4">
          <span>h333333（ログインIDは変更できません）</span>
        </div>
      </div>

      <div class="l-12 l-12--gap24">
        <div class="l-12__2 mgn-t-4">
          <div class="lbl-title display-inline--flex">
            <p> ログインパスワード   *</p>
            <p class="mandatory margin-left--auto">必須</p>
          </div>
        </div>
        <div class="l-12__4">
          <div class="c-input c-input--full">
            <span class="min-wgt-1 mgn-t-4">旧パスワード</span>
            <input value="**************" class="no-radius"type="password">
          </div>
          <div class="c-input c-input--full">
            <span class="min-wgt-1 mgn-t-4">新パスワード</span>
            <input value="Abcdefg" class="no-radius"type="text">
          </div>

          <div class="c-input c-input--full">
            <span class="lbl-danger mgn-b-2">※半角英数記号が使えます。6文字以上、32文字以内</span>
          </div>
          <div class="c-input display-inline--flex width-full mgn-b-4">
            <label class="cnt mgn-t-2">
              <input class="yellow" type="checkbox" id="0" value="1" name="0">
              <span class="checkmark"></span>
              <label for="0">レインズ</label>
            </label>
            <button class="mpage-btn mgn-t-3 mgn-l-ato">保存</button>
          </div>
        </div>

      </div>
    </form>
  </div>  --}}

  {{--  <div class="display-inline--flex width-full mgn-t-5">
    <span>メール配信先</span>
    <div class="mgn-l-ato">
      <a class="c-icn-add" href="{{route ('storeAdmin.manager.registration')}}"></a>
      <span class="mgn-l-3">新規追加</span>
    </div>

  </div>
  @if (\Session::has('status'))
    <div class="alert alert-success mgn-t-2">
         {!! \Session::get('status') !!}
    </div>
  @endif
  <div class="p-billing-info-table mgn-t-4 overflow-x">

    <table>
      <tbody>
        <tr>
          <th style="min-width: 217px;">
            お名前
          </th>
          <th style="min-width: 217px;">
            メールアドレス
          </th>
          <th style="min-width: 217px;">
            編集・削除
          </th>
        </tr>
        @foreach($mail_sending as $mail)
        <tr>
          <td>{{ $mail->name }}</td>
          <td>{{ $mail->email }}</td>
          <td>
            <a href="/store/manager/mypage/edit/{!! $mail->id !!}" class="c-lbl-white">編集</a>
            <a href="/store/manager/mypage/delete/{!! $mail->id !!}" class="c-lbl-white ">削除</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>  --}}

<script>
  $('#btn-1').on('click', function(){
    if($('#dsp-1').hasClass('l-12__2')) {
        $('#dsp-1').toggleClass('l-12__4')
        // Hide Label
        $('#dsp-1 label').toggle()
        // Show Input
        $('input[name=company_name]').toggleClass('inactive')
        //Show Save Button
        $('#savebtn-1').toggleClass('inactive')
        // Hide Edit Button
        $('#btn-1').hide()
    } else{
        $('#dsp-1').addClass('l-12__2')
        $('#savebtn-1').addClass('inactive')
    }
  });
  $('#btn-2').on('click', function(){
    if($('#dsp-2').hasClass('l-12__2')) {
        $('#dsp-2').toggleClass('l-12__4')
        // Hide Label
        $('#dsp-2 label').toggle()
        // Show Input
        $('input[name=address]').toggleClass('inactive')
        $('#savebtn-2').toggleClass('inactive')
        $('#btn-2').hide()
    }else{
        $('#dsp-2').addClass('l-12__2')
        $('#savebtn-2').addClass('inactive')
    }
  });
  $('#btn-3').on('click', function(){
    if($('#dsp-3').hasClass('l-12__2')) {
        $('#dsp-3').toggleClass('l-12__4')
        // Hide Label
        $('#dsp-3 label').toggle()
        // Show Input
        $('input[name=tel]').toggleClass('inactive')
        $('#savebtn-3').toggleClass('inactive')
        $('#btn-3').hide()
    }else{
        $('#dsp-3').addClass('l-12__2')
        $('#savebtn-3').addClass('inactive')
    }
  });
  $('#btn-4').on('click', function(){
    if($('#dsp-4').hasClass('l-12__2')) {
        $('#dsp-4').toggleClass('l-12__4')
        // Hide Label
        $('#dsp-4 label').toggle()
        // Show Input
        $('input[name=email]').toggleClass('inactive')
        // $('#changed_email').toggleClass('inactive')
        // // $('input[name=confirm_password]').toggleClass('inactive')
        // $('#show-confirmation-password').toggleClass('inactive')
        $('#savebtn-4').toggleClass('inactive')
        // $('#error-message').hide()
        $('#btn-4').hide()
    }else{
        $('#dsp-4').addClass('l-12__2')
        $('#savebtn-4').addClass('inactive')
    }
  });
  
  $('#show-confirmation-password').on('click', function(){
    $('#changed_email').toggleClass('inactive')
    $('#show-confirmation-password').hide()
  })
  $('#btn-5').on('click', function(){
    if($('#dsp-5').hasClass('l-12__2')) {
        $('#dsp-5').toggleClass('l-12__4')
        // Hide Label
        $('#dsp-5 label').toggle()
        // Show Input
        $('input[name=contract_id]').toggleClass('inactive')
        $('#savebtn-5').toggleClass('inactive')
        $('#btn-5').hide()
    }else{
        $('#dsp-5').addClass('l-12__2')
        $('#savebtn-5').addClass('inactive')
    }
  });
  $('#dsp-pw a').on('click', function(){
    if($('#change-pw').hasClass('inactive')) {
        // Hide Label
        $('#dsp-pw a').toggle()
        $('#dsp-pw').toggle()
        // Show Input
        $('#change-pw').toggle()
    }else{
      $('#change-pw').addClass('inactive')
    }
  });
  $('#btn-6').on('click', function(){
    if($('#change-pw').hasClass('inactive')) {
        // Hide Label
        $('#dsp-pw a').toggle()
        $('#dsp-pw').toggle()
        // Show Input
        $('#change-pw').toggle()
    }else{
      $('#change-pw').addClass('inactive')
    }
  })
  $("#show-password").change(function(){
            $(this).prop("checked") ?  $("#upassword").prop("type", "text") : $("#upassword").prop("type", "password");
    });

</script>

      </div>
   </div>

    @endslot
  @endcomponent
@endsection
