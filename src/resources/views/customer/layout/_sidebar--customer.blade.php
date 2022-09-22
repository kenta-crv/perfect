<nav class="p-sidebar">
    <ul class="p-sidebar__list">
      @foreach([
        'quiz'=> [
          'label' => 'LIVEクイズ',
          'path' => 'admin.quiz.index.user',
          'class' => 'quiz',
        ],
        'competitive-quiz'=> [
          'label' => '対戦クイズ',
          'path' => 'admin.battleQuiz.index.user',
          'class' => 'quiz',
        ],
        'drill-quiz'=> [
          'label' => 'ドリルクイズ',
          'path' => 'admin.noLiveQuiz.index.user',
          'class' => 'quiz',
          'sub' => [
            'sub-2' => [
              'label' => 'ホール',
              'class' => 'quiz',
              'path' => 'admin.noLiveQuiz.index.hall',
              'parent' => 'noLiveQuiz'
            ],
          ]
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
