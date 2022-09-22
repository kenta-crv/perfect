<!DOCTYPE html>
<html lang="ja" class="p-html">
  @php($current_route = (string)str_replace('.', ' ', Request::path()) )
  @include('store.layouts._head')
  <body id="body">
    <div class="l-frame">
      <div class="l-frame__header">
        @include('store.layouts._header-store-admin')
      </div>
      <div class="l-frame__row">
        @if ($current_route == 'store/search/list' || $current_route =='store' || $current_route == 'store/search' || $current_route == 'store/search/details' || $current_route == 'store/news' || $current_route == 'store/search/mocklist')

        @else
          <div class="l-frame__sidebar opened-sidebar">
            @include('store.layouts._sidebar_store')
          </div>
        @endif

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
