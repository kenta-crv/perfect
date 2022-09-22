@php
  $mypage = Helper::getStoreId() ? 'storeAdmin.manager.mypage' : 'storeAdmin.mypage.index';
  $array = [
    'distibution' => [
        'label' => '物件流通サイト選択',
        'path' => 'storeAdmin.distribution.index',
        'class' => 'quiz',
    ],
    'loginSettigs' => [
      'label' => 'ユーザー別ログイン設定',
      'path' => 'storeAdmin.setting.distribution',
      'class' => 'quiz',
    ],
    'saveSearch' => [
      'label' => '保存した検索条件',
      'path' => $mypage,
      'class' => 'quiz',
    ],
    'planSettings' => [
      'label' => 'ロボレのプラン設定',
      'path' => 'storeAdmin.setting.plans',
      'class' => 'quiz',
    ],
    'storeSettings' => [
      'label' => 'ロボレのユーザー設定',
      'path' => 'storeAdmin.setting.user',
      'class' => 'quiz',
    ],
    'contract&billingInformation' => [
      'label' => '契約・請求情報s',
      'path' => 'storeAdmin.contractBilling.index',
      'class' => 'quiz',
    ],
    'ContactRoboreStaff' => [
      'label' => 'ロボレスタッフに連絡',
      'path' => 'storeAdmin.contractBilling.index',
      'class' => 'quiz',
    ],
    'myPage' => [
      'label' => 'マイページ',
      'path' => $mypage,
      'class' => 'quiz',
    ],
    'faq' => [
      'label' => 'よくある質問',
      'path' => 'storeAdmin.faq',
      'class' => 'quiz',
    ],
    'logout' => [
      'label' => 'ログアウト',
      'path' => 'storeAdmin.logout',
      'class' => 'quiz',
    ],
  ]

@endphp

<nav class="p-sidebar ">
  <ul class="p-sidebar__list">
    
    @foreach ($array as $key => $val)
      @if (Helper::getStoreId() == 0)
        @if(session()->get('StoreId') != 1 && $key == 'storeSettings')
        @elseif(session()->get('StoreId') != 1 && $key == 'distibution')
        @elseif(session()->get('StoreId') != 1 && $key == 'planSettings')
        @elseif(session()->get('StoreId') != 1 && $key == 'contract&billingInformation')
        @else
        <li class="p-sidebar__list__item {{$val['class']}}
          {{in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? "is-active" : '' }}">
          <a href="{{route($val['path'])}}" class="p-sidebar__list__item__button">
            {!! isset($val['notification']) ? '<span class="p-sidebar__list__item__button__notification">'.$val['notification'].'</span>' : '' !!}
            <div class="c-image"></div>
            {!! $val['label']!!}
          </a>
        </li>
        @endif
      @elseif(Helper::getStoreId() == 1)
        @if($key != 'ContactRoboreStaff')
        <li class="p-sidebar__list__item {{$val['class']}}
          {{in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? "is-active" : '' }}">
          <a href="{{route($val['path'])}}" class="p-sidebar__list__item__button">
            {!! isset($val['notification']) ? '<span class="p-sidebar__list__item__button__notification">'.$val['notification'].'</span>' : '' !!}
            <div class="c-image"></div>
            {!! $val['label']!!}
          </a>
        </li>
        @else
        <li class="p-sidebar__list__item {{$val['class']}}">
        <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=154sxjhi" class="p-sidebar__list__item__button" target="_blank">
          {!! isset($val['notification']) ? '<span class="p-sidebar__list__item__button__notification">'.$val['notification'].'</span>' : '' !!}
          <div class="c-image"></div>
          {!! $val['label']!!}
        </a>
      </li>
        @endif
        
      @endif
    @endforeach

  </ul>
  <div class="menu-btn">
    <div class="menu-btn-header">
      <a class="toggle-menu" onclick="menu(this)" href="#">
        <i></i>
        <i></i>
        <i></i>
      </a>
      <span class="">MENU</span>
    </div>
  </div>
</nav>
