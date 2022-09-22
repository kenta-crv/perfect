<!DOCTYPE html>
<html lang="ja">
	<head>
		@include('store.layouts._head')
	</head>
	<body class="l-body">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-528RSDW"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		@include('store.layouts._header')
		<main class="l_main">
			@yield('content')
		</main>
		@include('store.layouts._footer')
		@yield('scripts')
	</body>
</html>