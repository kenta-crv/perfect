@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
@slot('body')
  <div class="a-page-title">
    <span><strong style="color: #003a16;"></strong>マイページ</span>
  </div>
<div class="c-main-box active-cont">
    <div class="c-main-body">
      <form method="post" action="{{ route('storeAdmin.mypage.updateData') }}">
        <input type="hidden" name="account_id" value="{{ $users->id }}">
        @csrf
      <div class="mpage-container">
        <div class="mpage-cont_mypage">
        
          <div class="l-12 mgn-t-2">
            <div class="l-12__4">
              <div class="mpage-title"><span>宅建業免許番号</span></div>
            </div>
            <div class="l-12__7">
              <span class="mgn-t-2">{{ $users->license }}</span>
              {{-- <input type="text" class="mpage-input" id="license_number" name="license_number" placeholder="東京都知事（１）第○○○○○号" value="{{ $users->license }}"> --}}
            </div>
            <div class="l-12__1">
              {{-- <button type="submit" class="mpage-btn-2 mgn-l-4 margin-t--7">保存</button> --}}
            </div>
          </div>
          <div class="l-12 mgn-t-2">
            <div class="l-12__4">
              <div class="mpage-title"><span>会社名・屋号</span></div>
            </div>
            <div class="l-12__7">
              <span class="mgn-t-2">{{ $users->company_name }}</span>
              {{-- <input type="text" class="mpage-input" id="company_name" name="company_name" placeholder="株式会社 ロボレ" value="{{ $users->company_name }}"> --}}
            </div>
            <div class="l-12__1">
              {{-- <button type="submit" class="mpage-btn-2 mgn-l-4 margin-t--7">保存</button> --}}
            </div>
          </div>
          <div class="l-12 mgn-t-2">
            <div class="l-12__4">
              <div class="mpage-title"><span>住所</span></div>
            </div>
            <div class="l-12__7">
              <span class="mgn-t-2">{{ $users->address }}</span>
              {{-- <input type="text" class="mpage-input" id="address" name="address" value="{{ $users->address }}"> --}}
            </div>
            <div class="l-12__1">
              {{-- <button type="submit" class="mpage-btn-2 mgn-l-4 margin-t--7">保存</button> --}}
            </div>
          </div>
          <div class="l-12 mgn-t-2">
            <div class="l-12__4">
              <div class="mpage-title"><span>電話番号</span></div>
            </div>
            <div class="l-12__3-05">
              <span class="mgn-t-2">{{ $users->tel }}</span>
              {{-- <input type="text" class="mpage-input" id="tel" name="tel" placeholder="0123-456-7890" value="{{ $users->tel }}"> --}}
            </div>
            <div class="l-12__1">
              {{-- <button type="submit" class="mpage-btn-2 mgn-l-4 margin-t--7">保存</button> --}}
            </div>
          </div>
          
          <div class="l-12 mgn-t-2">
            <div class="l-12__4">
              <div class="mpage-title"><span>作成者</span></div>
            </div>
            <div class="l-12__7">
              <span class="mgn-t-2">{{ $users->last_name }} {{ $users->first_name }}</span>
              {{-- <span class="mgn-t-2">{{ $users->first_name }}</span> --}}
              {{-- <input type="text" class="mpage-input" id="lname" name="last_name" placeholder="姓" value="{{ $users->last_name }} "> --}}
            </div>
            {{-- <div class="l-12__3-05">
              <input type="text" class="mpage-input padding_left_mpage mgn-l-2" id="fname" name="first_name" placeholder="名" value="{{ $users->first_name }} ">
            </div> --}}
            <div class="l-12__1">
              {{-- <button type="submit" class="mpage-btn-2 mgn-l-4 margin-t--7">保存</button> --}}
            </div>
          </div>
          <div class="l-12 mgn-t-2">
            <div class="l-12__4">
              <div class="mpage-title"><span>メールアドレス</span></div>
            </div>
            <div class="l-12__7">
              <span class="mgn-t-2">{{ $users->email }}</span>
              {{-- <input type="text" class="mpage-input" id="email" name="email" placeholder="satake.y@plenty.co.jp" value="xxxxxxxxx"> --}}
            </div>
            <div class="l-12__1">
              {{-- <button type="submit" class="mpage-btn-2 mgn-l-4 margin-t--7">保存</button> --}}
            </div>
          </div>
        </form>
        <form method="post" action="{{ route('storeAdmin.mypage.changepassword') }}">
          <input type="hidden" name="account_id" value="{{ $users->id }}">
          @csrf
          <div class="l-12 mgn-t-2">
            <div class="l-12__4">
              <div class="mpage-title"><span>パスワード</span></div>
            </div>
            <div class="">
              <a class="showChangePass"><span class="mpage-desc mgn-t-2">パスワードの変更</span></a>
            </div>
            <div class="l-12__2 show_pass" style="display:none;">
              <span class="mpage-desc mgn-t-2">旧パスワード</span>
            </div>
            <div class="l-12__5 show_pass" style="display: none">
              <input type="password" class="mpage-input padding_left_mpage" id="password-field_current" name="current_password" placeholder="**************" value="*************" >
              @if(Session::get('fail'))
              <span class="text-danger"> {{ Session::get('fail') }}  </span>
              @endif
            </div>

          </div>
          <div class="l-12 mgn-t-1 show_pass" style="display:none;">
            <div class="l-12__4">
              <div class="mpage-title"><span></span></div>
            </div>
            <div class="l-12__2">
              <span class="mpage-desc mgn-t-2">新パスワード</span>
            </div>
            <div class="l-12__5">
              <input type="password" class="mpage-input padding_left_mpage" id="password-field" name="password" placeholder="新しいパスワードを入力してくださ">
            </div>
          </div>
          <div class="l-12 show_pass" style="display: none;">
            <div class="l-12__6">
              <div class=""><span></span></div>
            </div>
            <div class="l-12__5 mpage-input">
              <span class="mpage-notice mgn-t-2">※半角英数記号が使えます。6文字以上、32文字以内</span>
              <span>
                <div class="display-flex mpage-input show_pass" style="display:none;">
                  <label class="cnt mgn-r-4 mgn-t-3">
                    <input class="yellow form_category_type" type="checkbox" value="1"  name="reins" onclick="togglePassword()" >
                    <span class="checkmark"></span>
                    <label for="reins">新パスワードを表示</label>
                  </label>
                  <button type="submit" class="mpage-btn-2 mgn-t-3">保存</button>
                </div>
              </span>
            </div>
          </div>
        </form>
          <div class="l-12 ">
            <div class="l-12__4">
              <div class="mpage-title"><span>ロール権限</span></div>
            </div>
            <div class="l-12__2">
              <span class="mgn-t-2">スタッフ</span>
            </div>
          </div>
          <div class="l-12">
            <div class="l-12__4">
              <div class="mpage-title"><span>アクセスできる物件情報サイト</span></div>
            </div>
            <div class="mgn-t-2 display-flex">
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
        </div>
      </div>

    </div>
 </div>

@endslot
  @endcomponent

  <script>
    $(document).ready(function() {
      $(".showChangePass").click(function() {
        $(this).css('display','none');
        $('.show_pass').removeAttr("style");
      });
  });
  </script>




@endsection

{{-- <div class="box-title">
  <li class="p-list__item_mypage">
      <div class="p-list__item__label">
        <span></span>作成者
      </div>
      <div class="p-list__item__data">
        <div class="l-12 l-12--gap8">
          <div class="c-input c-input--full">
            <div class="l-12__6">
              <div class="c-input c-input--radio">
                <input class='mypage_input' type="text" name="title" placeholder="タイトル">
              </div>
            </div>
            <span class="unit_min"></span>
          </div>
        </div>
      </div>
    </li>
  <li class="p-list__item_mypage">
      <div class="p-list__item__label">
        <span></span>メールアドレス
      </div>
      <div class="p-list__item__data">
        <div class="l-12 l-12--gap8">
          <div class="c-input c-input--full">
            <div class="l-12__6">
              <div class="c-input c-input--radio">
                <input class='mypage_input' type="text" name="title" placeholder="タイトル">
              </div>
            </div>
            <span class="unit_min"></span>
          </div>
        </div>
      </div>
    </li>
  <li class="p-list__item_mypage">
      <div class="p-list__item__label">
        <span></span>パスワード
      </div>
      <div class="p-list__item__data">
        <div class="l-12 l-12--gap8">
          <div class="c-input c-input--full">
            <div class="l-12__6">
              <div class="c-input c-input--radio">
                  パスワードの変更
              </div>
            </div>
            <span class="unit_min"></span>
          </div>
        </div>
      </div>
    </li>
  <li class="p-list__item_mypage">
      <div class="p-list__item__label">
        <span></span>ロール権限
      </div>
      <div class="p-list__item__data">
        <div class="l-12 l-12--gap8">
          <div class="c-input c-input--full">
            <div class="l-12__6">
              <div class="c-input c-input--radio">
                  管理者
              </div>
            </div>
            <span class="unit_min"></span>
          </div>
        </div>
      </div>
    </li>
  <li class="p-list__item_mypage">
      <div class="p-list__item__label">
        <span></span>アクセスできる物件情報サイト
      </div>
      <div class="p-list__item__data">
        <div class="l-12 l-12--gap8">
          <div class="c-input c-input--full">
            <div class="l-12__6">
              <div class="c-input c-input--radio">
                  レインズ、at BB
              </div>
            </div>
            <span class="unit_min"></span>
          </div>
        </div>
      </div>
    </li>
</div> --}}

{{-- @extends('store.layouts.layout--store')
@section('title', $title ?? 'マイページ')
@section('content')
@component('admin.component._p-index')
    @slot('title')
        マイページ
    @endslot
    @slot('action')

    @endslot
    @slot('body')
    <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <li class="p-list__item_mypage">
                <div class="p-list__item__label">
                  <span></span>作成者
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                          <input class='mypage_input' type="text" name="title" placeholder="タイトル">
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item_mypage">
                <div class="p-list__item__label">
                  <span></span>メールアドレス
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                          <input class='mypage_input' type="text" name="title" placeholder="タイトル">
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item_mypage">
                <div class="p-list__item__label">
                  <span></span>パスワード
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                            パスワードの変更
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item_mypage">
                <div class="p-list__item__label">
                  <span></span>ロール権限
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                            管理者
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item_mypage">
                <div class="p-list__item__label">
                  <span></span>アクセスできる物件情報サイト
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                            レインズ、at BB
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
          </div>
        </div>
      </div>
    @endslot
@endcomponent
@endsection


{{-- @extends('store.layouts.login_layout')
@section('content')

    <div class="header_center">
        ヘッダ
        <hr>
    </div>

    <div class="box_nav_2">
        メニュー
    </div>

    <div class="header_left_label_robore_staff">
        マイページ
    </div>

    <div class="header_left_label_robore_staff_detail">
        お名前

        <div class="input_left_robore">
            <input class="input_name" name="name" value="佐竹 義之">
        </div>
    </div>
    <div class="header_left_label_robore_staff_detail">
        メールアドレス

        <div class="input_left_robore">
            <input class="input_name" name="name" value="satake.y@plenty.co.jp">
        </div>
    </div>
    <div class="header_left_label_robore_staff_detail">
        パスワード

        <div class="input_left_robore">
            パスワードの変更
        </div>
    </div>
    <div class="header_left_label_robore_staff_detail">
        ロール権限

        <div class="input_left_robore">
            管理者
        </div>
    </div>
    <div class="header_left_label_robore_staff_detail">
        アクセスできる物件情報サイト

        <div class="input_left_robore">
            レインズ、at BB
        </div>
    </div>
    @endsection --}}
