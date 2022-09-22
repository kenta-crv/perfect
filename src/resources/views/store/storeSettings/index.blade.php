@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
@slot('body')
  <div class="a-page-title">
    <span><strong style="color: #003a16;"></strong>店舗のユーザー設定</span>
  </div>
  @if (session('status'))
  <h6 class="alert alert-success active-cont">{{ session('status') }}</h6>
  @endif
<div class="c-main-box active-cont">
    <div class="c-main-body">
      <span class="c-main-font-weight-bold font-size-14">店舗管理者のみの機能です。</span><br/>
      <span class="c-main-label font-size-14">管理者やスタッフのユーザーアカウントを登録・編集・削除ができます。</span>
    </div><br/>
    <div class="setting-right">
        <div>
          <span class="font-size-14">現在のユーザー数：</span>
          <span class="fnt-wgt-4">{{ $totalAll }}</span>
          {{-- <span class="font-size-14">スタータープラン：</span>
          <span class="fnt-wgt-4">{{ $countStarter }}</span>
          <span class="font-size-14">ベーシックプラン：</span>
          <span class="fnt-wgt-4">{{ $countBasic }}</span> --}}

        </div>
        <span class="mgn-l-9 font-size-12">※追加料金なしで、あと{{ $max_user - $totalAll }}ユーザー登録が可能です。</span>
        <div class="mgn-l-ato">
          @if($totalAll < $max_user)
            {{-- <a href="#" data-remodal-target="register_account" class="c-icn-add margin-space--1"></a> --}}
            <a href="#" data-remodal-target="register_account" class="c-icn-add margin-space--1"></a>
            <a href="#" data-remodal-target="register_account" class=""><span class="span_mightyzack store_setting_add">ユーザーを追加</span></a>
          @else
            <a href="#" data-remodal-target="register_account" class=""><span class="span_mightyzack store_setting_add"></span></a>
          @endif
        </div>
    </div>
    
   
    
    <section class="remodal p-remodal--form" data-remodal-id="register_account" id="register_modal">
      <div class="p-modal">
        <div class="p-modal--title">
          <div class="p-index__head__title">
            ユーザー追加
          </div>
        </div>

          <div class="mpage-container">
            <div class="mpage-cont_mypage">
              <form method="post" action="{{ route('storeAdmin.setting.create.user') }}">
                @csrf
                <div class="l-12">
                  <div class="l-12__4">
                    <div class="mpage-title"><span>ご担当者名</span></div>
                  </div>
                  <div class="l-12__3-05">
                    <input type="text" class="mpage-input" id="lname" name="last_name" placeholder="姓" autocomplete="off" value="{{ old('last_name') }}">
                    <span class="text-danger"> @error('last_name') {{ $message }} @enderror </span>
                  </div>
                  <div class="l-12__3-05">
                    <input type="text" class="mpage-input padding_left_mpage mgn-l-2" id="fname" name="first_name" placeholder="名"  value="{{ old('first_name') }}" autocomplete="off">
                    <span class="text-danger"> @error('first_name') {{ $message }} @enderror </span>
                  </div>
                </div>
                <div class="l-12 mgn-t-2">
                  <div class="l-12__4">
                    <div class="mpage-title"><span>メールアドレス</span></div>
                  </div>
                  <div class="l-12__7">
                    <input type="text" class="mpage-input" id="email" name="email" placeholder="satake.y@plenty.co.jp" value="{{ old('email') }}" autocomplete="new-password">
                    <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
                  </div>
                  {{--<div class="l-12__1">
                    <button type="submit" class="mpage-btn mgn-l-4 mgn-t-1">保存</button>
                  </div>--}}
                </div>

                <div class="l-12 mgn-t-2">
                  <div class="l-12__4">
                    <div class="mpage-title"><span>パスワード</span></div>
                  </div>
                  <div class="l-12__2">
                    <span class="mpage-desc mgn-t-2">パスワード</span>
                  </div>
                  <div class="l-12__5">
                    <input type="password" class="mpage-input padding_left_mpage" id="password-field_current" name="password" placeholder="**************" autocomplete="off">
                    <span class="text-danger"> @error('password') {{ $message }} @enderror </span>
                    @if(Session::get('fail'))
                    <span class="text-danger"> {{ Session::get('fail') }}  </span>
                    @endif
                  </div>

                </div>
                <div class="l-12 mgn-t-1">
                  <div class="l-12__4">
                    <div class="mpage-title"><span></span></div>
                  </div>
                  <div class="l-12__2">
                    <span class="mpage-desc mgn-t-2">パスワードの確認</span>
                  </div>
                  <div class="l-12__5">
                    <input type="password" class="mpage-input padding_left_mpage" id="password-field" name="confirm_password" placeholder="**************" autocomplete="off">
                    <span class="text-danger"> @error('confirm_password') {{ $message }} @enderror </span>
                  </div>
                </div>
                <div class="l-12 ">
                  <div class="l-12__6">
                    <div class=""><span></span></div>
                  </div>
                  <div class="l-12__5 mpage-input">
                    <span class="mpage-notice mgn-t-2">※半角英数記号が使えます。6文字以上、32文字以内</span>
                  </div>
                </div>
                <div class="l-12">
                  <div class="l-12__5">
                    <div class="mpage-title"><span></span></div>
                  </div>
                  <div class="l-12__1">
                    <span class="mpage-desc mgn-t-4"></span>
                  </div>
                  <div class="mpage-l--2 mpage-input">
                    <label class="cnt mgn-r-4 mgn-t-3">
                      <input class="yellow form_category_type" type="checkbox" value="1"  name="reins" onclick="togglePassword()" autocomplete="off">
                      <span class="checkmark"></span>
                      <label for="reins">パスワードの表示</label>
                    </label>
                  </div>
                </div>
                <div class="l-12">
                  <div class="l-12__4">
                    <div class="mpage-title"><span>ロール権限</span></div>
                  </div>
                  <div class="mgn-t-2 display-flex">
                    <select class="keep-slct-01 " style="padding-right: 25px;" name="selected_role" id="select_limited" autocomplete="off">
                      <option value="">選択してください</option>
                      <option value="1"{{ old('selected_role') == 1 ? 'selected' : '' }}>管理者</option>
                      <option value="0" {{ old('selected_role') == 0 ? 'selected' : '' }}>スタッフ</option>
                    </select>
                    <span class="text-danger"> @error('selected_role') {{ $message }} @enderror </span>
                  </div>
                </div>
                <div class="l-12__1">
                    <button type="submit" class="mpage-btn mgn-l-4 mgn-t-1">保存</button>
                  </div>
              </form>

            </div>
          </div>
          <div class="l-12__1 mpage_button_adjust">
           
          </div>
      </div>
    </section>

   


    <div class="p-billing-info-table mgn-t-2 overflow-x">
      <table>
        <tr>
          <th  style="min-width: 217px;">
            <div class="display-inline--flex width-full">
              <span class="mgn-t-1">ユーザー名</span>
              <div class="sorting mgn-l-ato">
                <span class="c-icn-polygon-up"></span>
                <span class="c-icn-polygon-down-active"></span>
              </div>
            </div>

          </th>
          <th  style="min-width: 217px;">
            <div class="display-inline--flex width-full">
              <span class="mgn-t-1">ロール権限</span>
              <div class="sorting mgn-l-ato">
                <span class="c-icn-polygon-up"></span>
                <span class="c-icn-polygon-down"></span>
              </div>
            </div>
          </th>
          <th style="min-width: 217px;">
            <div class="display-inline--flex width-full">
              <span class="mgn-t-1">メールアドレス</span>
              <div class="sorting mgn-l-ato">
                <span class="c-icn-polygon-up"></span>
                <span class="c-icn-polygon-down"></span>
              </div>
            </div>
          </th>
          <th style="min-width: 217px;">
            <div class="display-inline--flex width-full">
              <span class="mgn-t-1">登録年月日</span>
              <div class="sorting mgn-l-ato">
                <span class="c-icn-polygon-up"></span>
                <span class="c-icn-polygon-down"></span>
              </div>
            </div>
          </th>
          <th style="min-width: 217px;">
            <div class="display-inline--flex width-full">
              <span class="mgn-t-1">最終アクセス</span>
              <div class="sorting mgn-l-ato">
                <span class="c-icn-polygon-up"></span>
                <span class="c-icn-polygon-down"></span>
              </div>
            </div>
          </th>
          <th style="min-width: 217px;">
            編集と削除

          </th>
        </tr>
        @foreach($accData as $data)
        <tr>
          <td class="text-align-left">{{ $data->last_name }} {{ $data->first_name }}</td>
          @if($data->store_id == 0)
            <td class="text-align-left">スタッフ</td>
          @elseif($data->store_id == 1)
            <td class="text-align-left">管理者</td>
          @endif
          <td class="text-align-left">{{ $data->email }} </td>
          <td class="text-align-right">
            {{ Carbon::parse($data->created_at)->format('Y')}}年
            {{ Carbon::parse($data->created_at)->format('m')}}月
            {{ Carbon::parse($data->created_at)->format('d')}}日
          </td>
          <td class="text-align-right">
            @if($data->last_access_datetime == NULL)
              -----
            @else
            {{ Carbon::parse($data->created_at)->format('Y')}}年
            {{ Carbon::parse($data->created_at)->format('m')}}月
            {{ Carbon::parse($data->created_at)->format('d')}}日
            @endif
          </td>
          <td class="text-align-left">
            <button class="btn-none"><a href="/store/setting/user/edit/{!! $data->id !!}" class="c-lbl-white" >編集</a></button>

            @if($totalAcc > 1)
            <button class="btn-none"><a href="/store/setting/user/delete/{!! $data->id !!}" class="c-lbl-white" >削除</a></button>
            @endif
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    <div class="table-radius">
    </div>



 </div>

@endslot
  @endcomponent
<script>
    // for tabbing top
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tabbing");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

</script>
@endsection



{{-- @extends('store.layouts.layout--store')
@section('title', $title ?? '店舗設定')
@section('content')
@component('admin.component._p-index')
    @slot('title') --}}
    	{{--  <div class="c-image c-image--user"></div>  --}}
      {{-- 店舗設定
    @endslot
    @slot('action')

    @endslot
    @slot('body')
      <livewire:user.properties/>
    @endslot
  @endcomponent
@endsection --}}
