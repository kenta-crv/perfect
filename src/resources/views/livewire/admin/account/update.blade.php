@extends('admin.layout.layout--admin')
@section('title', $title ?? 'アカウント管理')
@section('content')
@component('admin.component._p-index')
    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
      <div class="a-page-title-2">
        <span>アカウント管理</span>
      </div>
    </div>
    {{--  <div class="a-page-title">
      <span class="title__t2"><strong>—</strong> Update Account Page</span>
    </div>  --}}
    <div class="c-main-box active-cont">
      <div class="box-data">

          <form method="post" action="{{ route('admin.account.update') }}">
            @csrf

            <input type="hidden" name="mypage_id" value="{{ $admin->id }}">
            <table class="p-table p_credit_table p-tbl-mypage ">
              <thead class="p-table__head">
                <tr class="p-table__head__tableRow_3">
                    <th class="th_1 th_1_leftradius th_color txt-alg-l" style="width: 50%;">お名前</th>
                    <th class="th_3 th_3_leftradius th_color txt-alg-l">
                      <input type="text" name="last_name" value="{{  $admin->last_name }} " class="input_3 mgn-r-2" contenteditable="true">姓
                      <input type="text" name="first_name" value="{{ $admin->first_name }}" class="input_3 mgn-l-2 mgn-r-2" contenteditable="true">名
                      </th>
                </tr>
                <tr class="p-table__head__tableRow_3">
                    <th class="th_2 th_2_leftradius th_color txt-alg-l">メールアドレス</th>
                    <th class="th_7 th_7_leftradius th_color txt-alg-l">
                      <input type="name" name="email" value="{{ $admin->email }}" class="input_3" contenteditable="true">
                      </th>
                </tr>
                <tr class="p-table__head__tableRow_3">
                    <th class="th_2 th_2_leftradius th_color txt-alg-l">パスワード</th>
                    <th class="th_7 th_7_leftradius th_color txt-alg-l">
                      <div id="dsp-pw">
                        <a href="#" class="grn-txt fnt-sz-4">パスワードの変更</a>
                      </div>
                      <div class="l-12__8 inactive" id="change-pw">
                        <div class="c-input c-input--full mgn-t-2">
                          <span class="min-wgt-1 mgn-t-3">パスワード</span>
                          <input name="password" id="password" type="password" />
                        </div>
                        <div class="c-input c-input--full mgn-t-2">
                          <span class="min-wgt-1 mgn-t-3">パスワード（確認）</span>
                          <input type="password" name="confirm_password" id="confirm_password" />
                        </div>
                        <span id='message'></span>
                        <div class="c-input c-input--full">
                          <span class="lbl-danger  mgn-t-2">※半角英数記号が使えます。6文字以上、32文字以内</span>
                        </div>
                        <div class="c-input display-inline--flex width-full mgn-b-4">
                          {{-- <label class="cnt mgn-t-2">
                            <input class="yellow" type="checkbox" id="0" value="1" name="0">
                            <span class="checkmark"></span>
                            <label for="0">レインズ</label>
                          </label> --}}
                          <div class="box-title justify_content--end mgn-t-2">
                            <a class="mpage-btn mgn-r-2" id="btn-5">取消</a>
                            <button class="mpage-btn " id="btn-6">変更する</button>
                          </div>
                        </div>
                      </div>
                    </th>

                </tr>
                <tr class="p-table__head__tableRow_3">
                    <th class="th_4 th_4_leftradius th_color txt-alg-l">ロール権限</th>
                    <th class="th_17 th_17_leftradius th_color txt-alg-l">
                    @foreach(config('const.role') as $key => $value)
                      @if($key == $admin->role)
                        {{ $value }}
                      @endif
                    @endforeach
                    </th>
                </tr>
              </thead>
            </table>
            <div class="box-title justify_content--end mgn-t-2">
              <a type="submit" class="mpage-btn mgn-r-2" href="{{route ('admin.account.index')}}">取消</a>
              <button type="submit" class="mpage-btn mgn-r-2">修正</button>
            </div>
          </form>
      </div>
    </div>



    @endslot

  @endcomponent

  <script>
    $('#dsp-pw').on('click', function(){
      if($('#change-pw').hasClass('inactive')) { 
          // Hide Label
          // $('a').toggle()
          $('#dsp-pw').toggle()
          // Show Input 
          $('#change-pw').toggle()
      }else{
        $('#change-pw').addClass('inactive')
      }
    });
    $('#btn-5').on('click', function(){
      if($('#dsp-pw').hasClass('inactive')) {
        //Hide change password
        $('#change-pw').toggle()
        //Show label
        $('#dsp-pw').toggle()
      }else{
        $('#dsp-pw').addClass('inactive')
      }
    })
    $('#btn-6').on('click', function(){
    if($('#change-pw').hasClass('inactive')) { 
        // Hide Label
        $('#dsp-pw').toggle()
        // Show Input 
        $('#change-pw').toggle()
    }else{
      $('#change-pw').addClass('inactive')
    }
  })
  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('').css('color', 'green');
  } else 
    $('#message').html('入力したパスワードが一致していません。').css('color', 'red');
});
  </script>
@endsection
