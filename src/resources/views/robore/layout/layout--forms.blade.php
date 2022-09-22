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
    <br/>
    <div class="box-container-main">

      <div class="width-full display-inline--flex c-header c-header-responsive-bg">
        <a href="{{ Helper::getTopPage()}}" class="p-header__image__logo">
          <img src="{{ asset('image/logo/robore_logo_2.png') }}" style="margin: 0 25px;" class="logo-responsive">
        </a>
      </div>
        {{--  <div class="img-bg-wave">

        </div>  --}}

      </div>
      @yield('content')
    </div>

    @include('store.layouts._footer-forms')
    @include('admin.component._script')
  </body>
  </html>
