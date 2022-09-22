<!DOCTYPE html>
<html lang="ja" class="p-html">
  @include('store.layouts._head')
  <body id="body">
    <div class="l-frame">
      <div class="l-frame__header">
        @include('store.layouts._header')
      </div>
      <div class="l-frame__row">
        <div class="l-frame__sidebar active-nav d-flex justify-content-between flex-wrap flex-column">
          @if(session()->exists('user_id'))
            @include('store.layouts._sidebar--user')
          @else
            @include('store.layouts._sidebar')
          @endif
        </div>
        <div class="l-frame__main">
          @yield('content')
        </div>
      </div>
      {{--  <div class="l-frame__footer">
        @include('store.layouts._footer')
      </div>  --}}
    </div>
    @include('admin.component._script')
  </body>
</html>
