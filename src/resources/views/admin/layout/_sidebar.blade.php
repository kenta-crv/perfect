<!--
管理項目[control-item]英語表記
　ユーザー 　→ user
　企業　   → company
  クイズ      → quiz
  ニュース　   → news
  お問い合わせ → contact
 -->

<nav class="p-sidebar">
  <ul class="p-sidebar__list">
    @foreach([
      'admin' => [
          'label' => 'ダッシュボード',
          'path' => 'admin.index',
          'class' => 'quiz',
      ],
      'storeLocator' => [
        'label' => '店舗検索',
        'path' => 'admin.store.search.index',
        'class' => 'quiz',
      ],
      'inquiryResponse' => [
        'label' => '問合せ対応',
        'path' => 'admin.inquiry.index',
        'class' => 'quiz',
      ],
      'notificationManagement' => [
        'label' => 'お知らせ管理',
        'path' => 'admin.notification.new',
        'class' => 'quiz',
      ],
      'alertConfirmation' => [
        'label' => 'アラート確認',
        'path' => 'admin.alert.index',
        'class' => 'quiz',
      ],
      'creditManagement' => [
        'label' => '債権管理',
        'path' => 'admin.credit.index',
        'class' => 'quiz',
      ],
      'helpManagement' => [
        'label' => 'ヘルプ管理',
        'path' => 'admin.help.index',
        'class' => 'quiz',
      ],

      'accountManagement' => [
        'label' => 'アカウント管理',
        'path' => 'admin.account.index',
        'class' => 'quiz',
      ],
      'myPage' => [
        'label' => 'マイページ',
        'path' => 'admin.mypage.index',
        'class' => 'quiz',
      ],
      'rentPaymentManagement' => [
        'label' => 'クレカ家賃払管理',
        'path' => 'admin.creditRent.index',
        'class' => 'quiz',
      ],
    ] as $key => $val)
   <li class="p-sidebar__list__item {{$val['class']}}
    {{in_array(explode('.', Route::currentRouteName())[1], [explode('.', $val['path'])[1]], TRUE) ? "is-active" : '' }}">
    <a href="{{route($val['path'])}}" class="p-sidebar__list__item__button">
      {!! isset($val['notification']) ? '<span class="p-sidebar__list__item__button__notification">'.$val['notification'].'</span>' : '' !!}
      <div class="c-image"></div>
      {!! $val['label']!!}
    </a>
  </li>
    @if(!empty($val['sub']))
      @foreach($val['sub'] as $key => $val)
      <a href="{{route($val['path'])}}" class="p-sidebar__list__item p-sidebar__list__item--sub  side-custom p-sidebar__list__item__button
      {{ strpos( str_replace('/', ' ', Route::currentRouteName() ), $val['parent']) ? 'sub-menu-show' : 'sub-hidden' }}
      {{ Route::current()->getName() == $val['path'] ?  "is-active" : '' }} ">
        <div class=""></div>
        {{$val['label']}}

      </a>

        @endforeach
      @endif
    @endforeach


  </ul>
</nav>
