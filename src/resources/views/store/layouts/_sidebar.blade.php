  <nav class="p-sidebar">
    <ul class="p-sidebar__list">
      @foreach([
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
          'label' => '契約・請求情報',
          'path' => 'storeAdmin.contractBilling.index',
          'class' => 'quiz',
        ],
        'myPage' => [
          'label' => 'マイページ',
          'path' => 'storeAdmin.mypage.index',
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
