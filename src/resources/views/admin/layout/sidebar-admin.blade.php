

<nav class="p-sidebar ">
  <ul class="p-sidebar__list">
    @foreach ([
      'dashboard' => [
        'label' => 'ダッシュボード',
        'path' => 'admin.index'
      ],
      'storeLocator' => [
        'label' => '店舗検索',
        'path' => 'admin.store.search.index'
      ],
      'message' => [
        'label' => '問合せ対応',
        'path' => 'admin.inquiry.index'
      ],
      'inquiryResponse' => [
        'label' => 'HPからの問合せ対応',
        'path' => 'admin.inquiry.index'
      ],
      'requestInformations' => [
        'label' => '資料請求',
        'path' => 'admin.requestInformations.index'
      ],
      'notification' => [
        'label' => 'お知らせ管理',
        'path' => 'admin.notification.index'
      ],
      'alert' => [
        'label' => 'アラート確認',
        'path' => 'admin.alert.index'
      ],
      'creditManagement' => [
        'label' => '債権管理',
        'path' => 'admin.credit.index'
      ],
      // 'help' => [
      //   // 'label' => 'ヘルプ管理',
      //   'path' => 'admin.help.index'
      // ],
      'account' => [
        'label' => 'アカウント管理',
        'path' => 'admin.account.index'
      ],
      'myPage' => [
        'label' => 'マイページ',
        'path' => 'admin.mypage.index'
      ],
      'creditCard' => [
        'label' => 'クレカ家賃払管理',
        'path' => 'admin.creditRent.index',
      ],
      'guide' => [
        'label' => 'ガイド管理',
        'path' => 'admin.guide.index',
      ],
      'logout' => [
        'label' => 'ログアウト',
        'path' => 'admin.logout',
      ],

    ] as $key => $item)
      <li class="p-sidebar__list__item">
        <a href="{{ route($item['path']) }}" class="p-sidebar__list__item__button">
          <div class="c-image"></div>

          {{ $item['label'] }}
        </a>
      </li>
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
