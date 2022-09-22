<!DOCTYPE html>
<html lang="ja" class="p-html">
  @include('admin.layout._head')
  <body id="body">
    <div class="l-frame">
      <div class="l-frame__header">
        @include('admin.layout._header')
      </div>
      <div class="l-frame__row">
        <div class="l-frame__sidebar opened-sidebar">
          @include('admin.layout.sidebar-admin')
        </div>
        <div class="l-frame__main">
          @yield('content')
        </div>
      </div>
      <div class="l-frame__footer">
        @include('admin.layout._footer')
      </div>
    </div>
    @include('admin.component._script')
  </body>
</html>
