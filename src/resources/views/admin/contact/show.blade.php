@extends('admin.layout.layout--admin')
@php
$category = [
  '', //0
  'クイズについて', //1
  'サービスについて', //2
  'その他', //3
]
@endphp
@section('title', $title ?? 'お問い合わせ詳細')
@section('content')
<form method="POST" action="{{ route('admin.contact.update', $contact->id ) }}">
  @csrf
  @component('admin.component._p-detail')
    @slot('class')
      p-detail--narrow
    @endslot
    @slot('back')
      {{route('admin.contact.index')}}
    @endslot
    @slot('title')
    <h2 class="p-index__head__title">
      <div class="c-image c-image--contact"></div>
      お問い合わせ詳細
    </h2>
    @endslot
    @slot('action')
      <div class="p-text p-text--narrow">
        <span class="c-text__color--gray c-number__lv7">受信日時</span>
        <p class="c-number__lv5">{{ $contact->received_date_format .' '.$contact->received_time_format }}</p>
      </div>
    @endslot
    @slot('body')
      @component('admin.component._p-detailBox')
        @slot('title')
          お問い合わせ情報
        @endslot
        @slot('body')
          <div class="p-list p-list__status">
            <li class="p-list__item p-list__item--center">
              <div class="p-list__item__label">
                <span class="c-text__color--gray">ステータス</span>
              </div>
              <div class="p-list__item__data">
                  <div class="c-input c-input--full">
                    <div class="l-12__4">
                      <div class="c-input c-input--radio c-input--red_radio">
                        <input id="acknowledged" name="status" type="radio" value="1" {{ $contact->status == 1 ? 'checked' : '' }}>
                        <label for="acknowledged">対応済み</label>
                      </div>
                    </div>
                    <span class="unit_min"></span>
                    <div class="l-12__4">
                      <div class="c-input c-input--radio c-input--red_radio">
                        <input id="support" name="status" type="radio" value="2" {{ $contact->status == 2 ? 'checked' : '' }}>
                        <label for="support">対応中</label>
                      </div>
                    </div>
                    <span class="unit_min"></span>
                    <div class="l-12__4">
                      <div class="c-input c-input--radio c-input--red_radio">
                        <input id="no_support" name="status" type="radio" value="3" {{ $contact->status == 3 ? 'checked' : '' }}>
                        <label for="no_support">未対応</label>
                      </div>
                    </div>
                  </div>
              </div>
            </li>
          </div>
          @component('admin.component._p-list',
            ['data' =>
              [
                '<span class="c-text__color--gray">お問い合わせカテゴリー</span>'=> $category[$contact['category_id']],
                '<span class="c-text__color--gray">氏名</span>'=> $contact['full_name'],
                '<span class="c-text__color--gray">ふりがな</span>'=> $contact['full_name_kana'],
                '<span class="c-text__color--gray">メールアドレス</span>'=> $contact['email'],
                '<span class="c-text__color--gray">内容</span>'=>
                '<span class="p-list__item__data__body">'.$contact['body'].'</span>',
                '<span class="c-text__color--gray">受信日時</span>'=> $contact->received_date_label,
                //Empty data for border and space
                '' => ''
              ]
            ]
          )
            @slot('class')
              p-list--line
            @endslot
          @endcomponent
        @endslot
      @endcomponent
    @endslot
    @slot('foot')
      <div class="p-buttonWrap p-buttonWrap--right">
        <button type="submit" class="c-button  c-button--medium c-button--fontWeight ">保存する</button>
      </div>
      @endslot
    </div>
  @endcomponent
</form>
@endsection
