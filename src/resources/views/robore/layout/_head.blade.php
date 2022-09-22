<?php $is_production = env('APP_ENV') === 'production' ? true : false; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSRF Token -->
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | ロボレ管理画面</title>


  @livewireStyles
  <!-- faviconなど各種 —————————-->
  <link rel="apple-touch-icon" sizes="180x180" href="{{$is_production ? secure_asset('image/favicon/admin/apple-touch-icon.png') : asset('image/favicon/admin/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{$is_production ? secure_asset('image/logo/robore_logo.png') : asset('image/logo/robore_logo.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{$is_production ? secure_asset('image/logo/robore_logo.png') : asset('image/logo/robore_logo.png') }}">
  <!-- スクリプトの読み込み-->

  {{--  chart.js  --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"></script>
  {{-- jquery --}}
  <script src="{{$is_production ? secure_asset('js/jquery-1.12.3.min.js') : asset('js/jquery-1.12.3.min.js') }}"></script>
  <script src="{{$is_production ? secure_asset('js/library/remodal.min.js') : asset('js/library/remodal.min.js') }}"></script>
  {{-- slick --}}
  <script src="{{$is_production ? secure_asset('js/slick.min.js') : asset('js/slick.min.js') }}"></script>
  <link rel="stylesheet" href="{{$is_production ? secure_asset('js/slick-theme.css') : asset('js/slick-theme.css') }}">
  {{-- flatpickr --}}
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="{{$is_production ? secure_asset('js/flatpickr.js') : asset('js/flatpickr.js')}}"></script>
  {{-- flatpickrの月選択プラグイン --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
  {{-- 住所自動入力 --}}
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

  <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js"></script>

  <!! cssの読み込み ——————————>
  <link rel="stylesheet" href="{{$is_production ? secure_asset('css/style--admin.css') : asset('css/style--admin.css') }}">
  <!! 追加CSS ——————————>
  <link rel="stylesheet" href="{{$is_production ? secure_asset('over-write/css/style-admin_2.css') : asset('over-write/css/style-admin_2.css') }}">
  <link rel="stylesheet" href="{{$is_production ? secure_asset('over-write/css/style-update_1.css') : asset('over-write/css/style-update_1.css') }}">
  <!! fontの読み込み ——————————>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{$is_production ? secure_asset('css/robore/style.css') : asset('css/robore/style.css') }}">

  <link rel="stylesheet" href="{{$is_production ? secure_asset('css/responsive.css') : asset('css/responsive.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@900&display=swap" rel="stylesheet">
</head>
