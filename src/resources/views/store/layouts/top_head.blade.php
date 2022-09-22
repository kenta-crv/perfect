<!DOCTYPE html>
<html lang="ja" class="p-html">
  @include('store.layouts._head')
  <body id="body">
    <div class="l-frame">
      <div class="l-frame__header">
        @include('store.layouts.top_header')
      </div>
      <div class="l-frame__row">
        <div class="l-frame__main">
          @yield('content')
        </div>
      </div>
      <div class="l-frame__footer">
        @include('store.layouts._footer')
      </div>
    </div>
    @include('admin.component._script')
  </body>
</html>
