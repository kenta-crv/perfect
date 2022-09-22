<!DOCTYPE html>
<html lang="ja" class="p-html">
  @include('customer.layout._head')
  <body id="body">
    <div class="l-frame">
      <div class="l-frame__header">
        @include('customer.layout._header')
      </div>
      <div class="l-frame__row">
        <div class="l-frame__sidebar">
          @if(session()->exists('user_id'))
            @include('customer.layout._sidebar--user')
          @else
            @include('customer.layout._sidebar')
          @endif
        </div>
        <div class="l-frame__main">
          @yield('content')
        </div>
      </div>
      <div class="l-frame__footer">
        @include('customer.layout._footer')
      </div>
    </div>
    @include('customer.component._script')
  </body>
</html>
