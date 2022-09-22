@extends('admin.layout.layout--admin')
@section('title', $title ?? 'ユーザー詳細')
@section('content')
  @component('admin.component._p-detail')
    @slot('back')
      {{route('admin.user.index')}}
    @endslot
    @slot('title')
      <h2 class="p-index__head__title">
        <div class="c-image c-image--user"></div>
        ユーザー詳細
      </h2>
    @endslot
    @slot('action')
      <div class="p-buttonWrap">
        <a href="{{route('admin.user.edit', $user['id'])}}" class="c-button c-button--small">編集する</a>
      </div>
    @endslot

    @slot('body')
    <div class="l-12 l-12--gap24">
      <div class="l-12__6">
        @component('admin.component._p-detailBox')
            @slot('title')
              基本情報
            @endslot
            @slot('body')
              @component('admin.component._p-list',
                ['data' =>
                  [
                    '氏名' => $user->last_name .' '. $user->first_name,
                    'ふりがな' => $user->last_name_kana .' '. $user->first_name_kana,
                    'ニックネーム' => $user->nickname,
                    '生年月日' => $user->birth_date_format,
                    'プロフィール画像' =>
                    '<div class="p-list__item__data">
                      <div class="c-input c-input--file">
                          <image class="img_preview" id="photo_preview" src="'.$user->thumbnail.'"/>
                      </div>
                    </div>'
                  ]
                ]
              )
              @slot('class')
                p-list--line
              @endslot
              @endcomponent
              <br>
            @endslot
        @endcomponent
      </div>
      <div class="l-12__6">
        @component('admin.component._p-detailBox')
            @slot('title')
              クイズ情報
            @endslot
            @slot('body')

                  @component('admin.component._p-list',
                    ['data' =>
                      [
                        '解答済みクイズ' => $user->nonevents_participated_count . '件',
                        '作成済みクイズの問題数' => $user->quizzes->count() . '件',
                        '参加イベント数' => $user->events_participated_count .'件',
                      ]
                    ]
                  )
                  @slot('class')
                    p-list--line
                  @endslot
                  @endcomponent
                  <br>

            @endslot
        @endcomponent
        <div class="p-buttonWrap">
          <a href="{{ route('admin.user.createdQuiz', $user) }}" style="margin-left: 50%; ">
            <input type="button" value="作成済みクイズを確認する" style="background:white; width: 200px; border: 2px solid; border-radius: 4px; cursor: pointer; font-weight: bold;">
          </a>
        </div>
        @component('admin.component._p-detailBox')
          @slot('title')
            連絡先情報
          @endslot

          @slot('body')
            @php
                $zip = explode('-', $user['zip_code'])
            @endphp
            @component('admin.component._p-list',
              ['data' =>
                [
                  'エリア' => $user->pref_name,
                  '現住所' =>  '〒' .' ' .$user['zip_code']
                  .'<br>' .$user->pref_name.' '.$user['address'].' '.$user['small_address'],
                  '電話番号' => $user['tel'].'-'.$user['tel2'].'-'.$user['tel3'],
                  'メールアドレス' => $user['email'],
                ]
              ]
            )
              @slot('class')
                p-list--line
              @endslot
            @endcomponent
          @endslot
        @endcomponent
      </div>
      <div class="p-buttonWrap" style="margin-left: 783px;">
        <a href="{{route('admin.user.delete', $user['id'])}}" onclick="return beforeSubmit()" class="c-button c-button--small  c-button--black">削除する</a>
      </div>

    </div>

    @endslot
  @endcomponent
@endsection
<script>
  function beforeSubmit() {
    if(window.confirm('消去しますが問題ないでしょうか？')) {
      return true;
    } else {
      return false;
    }
  };
</script>

