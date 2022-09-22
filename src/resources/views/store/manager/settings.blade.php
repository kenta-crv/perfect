@extends('store.layouts.layout-store-home')
@section('title', $title ?? '店舗設定')
@section('content')
  @component('admin.component._p-index')
    @slot('action')

    @endslot
    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="store-title">店舗設定</span>
    </div>
    <div class="c-main-box active-cont">
      <div class="c-main-body">
       <span>お支払いをまとめて本部がされる場合は、こちらから設定ください</span>
        <ul class="s-mngr-list">
            <li>
                <div ><a href={{route ('register.register')}} class="grn-txt-2">新規で店舗を作成し追加</a></div>
            </li>
            <form method="post" action="{{ route('storeAdmin.manager.update')}}">
              @csrf
              <li>
                <div class="s-mngr-display">
                    <span>既にロボレを使っている店舗の支払いをまとめるため追加</span>
                    <span class="mgn-l-5 mgn-t-2">この場合は、該当する店舗の管理者権限で、次からログインしてください。</span>
                    <div class="l-12">
                        <div class="l-12__1-01">
                          <span class="manager-settings-label">ログインID</span>
                        </div>
                        <div class="l-12__3 mpage-input">
                          <input type="text" class="mpage-input mgn-t-2 mgn-l-4" name="email" placeholder="半角英数数字">
                        </div>
                        <div class="l-12__1-01">
                            <span class="manager-settings-label">パスワード</span>
                        </div>
                        <div class="l-12__3 mpage-input">
                            <input type="password" class="mpage-input mgn-t-2 mgn-l-4"  name="password" placeholder="半角英数数字">
                        </div>
                        <div class="l-12__1-5">
                            <button type="submit" class="c-lbl-white mgn-t-3 mgn-l-4">ログインし登録</button>
                        </div>
                    </div>
                    <div class="l-12">
                      <div class="l-12__1-01">
                        <span class="manager-settings-label"></span>
                      </div>
                      <div class="l-12__3 mpage-input">
                        <span class="text-danger mgn-l-6"> @error('email') {{ $message }} @enderror </span>
                      </div>
                      <div class="l-12__1-01">
                          <span class="manager-settings-label"></span>
                      </div>
                      <div class="l-12__3 mpage-input">
                        <span class="text-danger mgn-l-6"> @error('password') {{ $message }} @enderror </span>
                      </div>
                     
                  </div>
                </div>
            </li>
            </form>

            <form method="post" action="{{ route('storeAdmin.manager.unregister')}}">
              @csrf
            <li>
                <div class="s-mngr-display">
                    <span>現在まとめている店舗一覧：該当の店舗の管理者権限でログインすると、その店舗のお支払いはまとめから解除され、その店舗がお支払いする事になります。</span>
                    <div class="l-12">
                        <div class="l-12__1-01">
                          <span class="manager-settings-label">ログインID</span>
                        </div>
                        <div class="l-12__3 mpage-input">
                          <input type="text" class="mpage-input mgn-t-2 mgn-l-4" id="" name="email_unregister" placeholder="半角英数数字">
                        </div>
                        <div class="l-12__1-01">
                            <span class="manager-settings-label">パスワード</span>
                        </div>
                        <div class="l-12__3 mpage-input">
                            <input type="password" class="mpage-input  mgn-t-2 mgn-l-4" id="password" name="password_unregister" placeholder="半角英数数字">
                        </div>
                        <div class="l-12__1-5">
                            <button type="submit" class="c-lbl-white mgn-t-3 mgn-l-4">ログインし登録を解除</button>
                        </div>
                    </div>
                    <div class="l-12">
                      <div class="l-12__1-01">
                        <span class="manager-settings-label"></span>
                      </div>
                      <div class="l-12__3 mpage-input">
                        <span class="text-danger mgn-l-6"> @error('email_unregister') {{ $message }} @enderror </span>
                      </div>
                      <div class="l-12__1-01">
                          <span class="manager-settings-label"></span>
                      </div>
                      <div class="l-12__3 mpage-input">
                        <span class="text-danger mgn-l-6"> @error('password_unregister') {{ $message }} @enderror </span>
                      </div><br/>
                    <div class="s-mngr-table overflow-x">
                        <table>
                         <tbody>
                          @foreach($store_list as $store)
                          <tr>
                            <td class="text-align-left">{{ $store->company_name}}</td>
                            <td class="text-align-left">{{ $store->last_name . " " . $store->first_name}}</td>
                          </tr>
                          @endforeach
                         </tbody>
                        </table>
                       </div>
                </div>
            </li>
            </form>
        </ul>
      </div>
   </div>

    @endslot
  @endcomponent
@endsection


