
<div class="edit">
  <form method="post">
    <div class="l-12 l-12--gap24">
      <div class="l-12__2 mgn-t-4">
        <div class="lbl-title display-inline--flex width-full">
          <p> 会社名・屋号  *</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-1">
        <div class="mgn-t-4 active" >
          <label class="fnt-sz-4">{{ $accounts->company_name }}</label>
        </div>
        <div class="c-input ">
          <input type="text" value="{{  $accounts->company_name }}" class="margin--none inactive"  name="company_name" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-1">
        <button class="mpage-btn mgn-t-3">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>

    <div class="l-12 l-12--gap24">
      <div class="l-12__2 mgn-t-4">
        <div class="lbl-title display-inline--flex width-full">
          <p> 住所   *</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
        
      </div>
      <div class="l-12__2" id="dsp-2">
        <div class="mgn-t-4 ">
          <label class="fnt-sz-4" for="">{{ $accounts->address }}</label>
        </div>
        <div class="c-input ">
          <input type="text" value="{{ $accounts->address }}" class="margin--none inactive"  name="address" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-2">
        <button class="mpage-btn mgn-t-3">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>

    <div class="l-12 l-12--gap24">
      <div class="l-12__2 mgn-t-4">
        <div class="lbl-title display-inline--flex width-full">
          <p> 電話番号   *</p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-3">
        <div class="mgn-t-4 ">
          <label class="fnt-sz-4" for="">{{ $accounts->tel }}</label>
        </div>
        <div class="c-input ">
          <input type="text" value="{{ $accounts->tel }}" class="margin--none inactive"  name="tel_no" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-3">
        <button class="mpage-btn mgn-t-3">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>

    <div class="l-12 l-12--gap24">
      <div class="l-12__2 mgn-t-4">
        <div class="lbl-title display-inline--flex width-full">
          <p> メールアドレス   *</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-4">
        <div class="mgn-t-4 ">
          <label class="fnt-sz-4" for="">{{ $accounts->email }}</label>
        </div>
        <div class="c-input ">
          <input type="text" value="{{ $accounts->email }}" class="margin--none inactive"  name="email" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-4">
        <button class="mpage-btn mgn-t-3">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>

    <div class="l-12 l-12--gap24">
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
          <input type="text" value="{{ $accounts->contract_id }}" class="margin--none inactive"  name="login_id" contenteditable="true">
        </div>
      </div>
      <div class="l-12__1 mgn-t-2" id="btn-5">
        <button class="mpage-btn mgn-t-3">編集</button>
      </div>
      <span class="text-danger">  </span>
    </div>

    <div class="l-12 l-12--gap24">
      <div class="l-12__2 mgn-t-4">
        <div class="lbl-title display-inline--flex width-full">
          <p> ログインパスワード </p>
          <p class="mandatory mgn-l-ato">必須</p>
        </div>
      </div>
      <div class="l-12__2" id="dsp-pw">
        <div class="mgn-t-4 ">
          <a href="#" class="grn-txt fnt-sz-4 ">パスワードの変更</a>
        </div>
      </div>
      <div class="l-12__4 inactive" id="change-pw">
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
          <button class="mpage-btn mgn-t-3 mgn-l-ato" id="btn-6">保存</button>
        </div>
      </div>
    </div>
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

  <div class="display-inline--flex width-full">
    <span>メール配信先</span>
    <div class="mgn-l-ato">
      <a class="c-icn-add" href="{{route ('storeAdmin.manager.registration')}}"></a>
      <span class="mgn-l-3">新規追加</span>
    </div>

  </div>
  <div class="p-billing-info-table mgn-t-4 overflow-x">
  {{-- <form method="post" action="{{route ('storeAdmin.manager.registration')}}"> --}}
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
        <tr>
          <td>{{ $mail_sending->name }}</td>
          <td>{{ $mail_sending->email }}</td>
          <td>
            <button class="c-lbl-white ">編集</button>
            <button class="c-lbl-white ">削除</button>
          </td>
        </tr>
        <tr>
          <td>{{ $mail_sending->name }}</td>
          <td>{{ $mail_sending->email }}</td>
          <td>
            <button class="c-lbl-white" >編集</button>
            <button class="c-lbl-white "><a href="/store/manager/mypage/delete/{!! $mail_sending->id !!}">削除</a></button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  </div>
</div>

<script>
  $('#btn-1').on('click', function(){
    if($('#dsp-1').hasClass('l-12__2')) {
        $('#dsp-1').toggleClass('l-12__4') 
        // Hide Label
        $('#dsp-1 label').toggle()
        // Show Input 
        $('input[name=company_name]').toggleClass('inactive')
    }else{
        $('#dsp-1').addClass('l-12__2') 
    }
  });
  $('#btn-2').on('click', function(){
    if($('#dsp-2').hasClass('l-12__2')) {
        $('#dsp-2').toggleClass('l-12__4') 
        // Hide Label
        $('#dsp-2 label').toggle()
        // Show Input 
        $('input[name=address]').toggle()
    }else{
        $('#dsp-2').addClass('l-12__2') 
    }
  });
  $('#btn-3').on('click', function(){
    if($('#dsp-3').hasClass('l-12__2')) {
        $('#dsp-3').toggleClass('l-12__4') 
        // Hide Label
        $('#dsp-3 label').toggle()
        // Show Input 
        $('input[name=tel_no]').toggle()
    }else{
        $('#dsp-3').addClass('l-12__2') 
    }
  });
  $('#btn-4').on('click', function(){
    if($('#dsp-4').hasClass('l-12__2')) {
        $('#dsp-4').toggleClass('l-12__4') 
        // Hide Label
        $('#dsp-4 label').toggle()
        // Show Input 
        $('input[name=email]').toggle()
    }else{
        $('#dsp-4').addClass('l-12__2') 
    }
  });
  $('#btn-5').on('click', function(){
    if($('#dsp-5').hasClass('l-12__2')) {
        $('#dsp-5').toggleClass('l-12__4') 
        // Hide Label
        $('#dsp-5 label').toggle()
        // Show Input 
        $('input[name=login_id]').toggle()
    }else{
        $('#dsp-5').addClass('l-12__2') 
    }
  });
  $('a').on('click', function(){
    if($('#change-pw').hasClass('inactive')) { 
        // Hide Label
        $('a').toggle()
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
        $('a').toggle()
        $('#dsp-pw').toggle()
        // Show Input 
        $('#change-pw').toggle()
    }else{
      $('#change-pw').addClass('inactive')
    }
  })

</script>
