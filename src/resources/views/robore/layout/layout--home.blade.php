<!DOCTYPE html>
<html lang="ja" class="robore-html">
  @include('robore.layout._navbar-home')
  @include('robore.layout._head')
  <body class="body">
    <div class="bg-img-default">
      <div class="img-bg-wave">
      </div>
    </div>

    {{--  <div class="img-bg-wave">

    </div>  --}}
    <div class="box-container-main">

      <div class="width-full display-inline--flex c-header">
        <a href="{{ Helper::getTopPage()}}" class="p-header__image__logo">
          <img src="{{ asset('image/logo/robore_logo_2.png') }}" style="margin: 0 25px">
        </a>
        {{--  <div class="img-bg-wave">

        </div>  --}}
        <div class="margin-left--auto btn-tools ">
          <div class="header-container header_adjust_responsive">
            {{-- <a class="c-lbl-success margin-bottom-5 " for="">こだわり</a> --}}
            <a
              href="{{ route('requestinformation.create') }}"
              class="c-lbl-plain
              txt-dec-none
              margin-bottom-5-green
              fa-solid btn-right-white
              c_button_login_responsive"
              for="">
              資料請求
            </a>
            <a
            href="{{ route('register.register') }}"
              class="c-lbl-plain
              txt-dec-none
              margin-bottom-5
              fa-solid btn-right
              c_button_login_responsive_white"
              for="">
              無料で試してみる
            </a>
            <a
              href="{{ route('storeAdmin.index') }}"
              class="login-label
              span_login_responsive
              txt-dec-none hp__login">
              ログイン
              <img src="{{ asset('image/img/login_logo.png') }}" class="login-logo image_logo_responsive">
            </a>
          </div>
        </div>
      </div>
      @yield('content')
    </div>

    @include('store.layouts._footer-forms')
    @include('admin.component._script')
  </body>
  </html>
