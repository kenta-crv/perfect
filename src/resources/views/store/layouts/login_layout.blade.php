

<!DOCTYPE html>
<html lang="ja">
	@include('store.layouts._head')
<body class="l-body">
	{{-- <main class="l_main" style="height: 100%;"> --}}
	  @yield('content')
	{{-- </main> --}}

  @yield('scripts')
  <script src="{{ asset('js/slick.min.js') }}"></script>

</body>
</html>

