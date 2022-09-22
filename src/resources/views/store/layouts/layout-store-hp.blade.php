<!DOCTYPE html>
<html lang="ja" class="p-html">
  @include('store.layouts._head')
  <body id="body">
     <div class="img-bg-wave"></div>
    <div class="l-frame_2">
      <div class="l-frame__header">
        @include('store.layouts._header_store_hp')
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
