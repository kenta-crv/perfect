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
      '01' => [
          'label' => '物件種目',
          'class' => 'quiz',
      ],
      '02' => [
        'label' => '都道府県',
        'class' => 'quiz',
      ],
      '03' => [
        'label' => '路線・駅',
        'class' => '駅まで',
      ],
      '04' => [
        'label' => '市区群等',
        'class' => 'quiz',
      ],
      '05' => [
        'label' => '物件名',
        'class' => 'quiz',
      ],
      '06' => [
        'label' => '賃料',

        'class' => 'quiz',
      ],
      '07' => [
        'label' => '間取り',
        'class' => 'quiz',
      ],
      '08' => [
        'label' => '面積',
        'class' => 'quiz',
      ],
      '09' => [
        'label' => '間取り',
        'class' => 'quiz',
      ],
      '10' => [
        'label' => '面積',
        'class' => 'quiz',
      ],
      '11' => [
        'label' => '構造',
        'class' => 'quiz',
      ],
      '12' => [
        'label' => '築年数',
        'class' => 'quiz',
      ],
      '13' => [
        'label' => '所在階',
        'class' => 'quiz',
      ],
      '14' => [
        'label' => '所在階',
        'class' => 'quiz',
      ],
      '15' => [
        'label' => '最上階',
        'class' => 'quiz',
      ],
      '16' => [
        'label' => 'ワード',
        'class' => 'quiz',
      ],
      '17' => [
        'label' => '登録日',
        'class' => 'quiz',
      ],
      '18' => [
        'label' => '取引態様',
        'class' => 'quiz',
      ],
      '19' => [
        'label' => '画像',
        'class' => 'quiz',
      ],

    ] as $key => $val)
   <li class="p-sidebar__list__item {{$val['class']}}">
    <a  class="p-sidebar__list__item__button">
      {!! isset($val['notification']) ? '<span class="p-sidebar__list__item__button__notification">'.$val['notification'].'</span>' : '' !!}
      <div class="c-image"></div>
      {!! $val['label']!!}
    </a>
    <div class="sidebar-radio">
      <input type="radio">
      <input  type="radio">
    </div>

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

<br>

</script>
