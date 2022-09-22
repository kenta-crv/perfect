<!DOCTYPE html>
<html lang="en" class="l-top-html">
@include('store.layouts._head')
  <body id="body">
    <div class="l-container-box">
      <div class="l-container__header">
        @include('store.layouts.top_header')
      </div>
      <div class="l-container__row">
        <div class="l-container__main">
          @yield('content')
        </div>
      </div>
      <div class="l-container__footer">
        @include('store.layouts.top_footer')
      </div>
    </div>
    @include('admin.component._script')
  </body>
</html>
