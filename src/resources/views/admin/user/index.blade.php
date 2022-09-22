@extends('admin.layout.layout--admin')
@section('title', $title ?? 'ユーザー管理')
@section('content')
  @component('admin.component._p-index')
    @slot('title')
    	<div class="c-image c-image--user"></div>
      ユーザー一覧

    @endslot
    @slot('action')
    <div class="p-text p-text--narrow p-text--marginRight">
      <p class="c-text__lv5">アカウント数  :</p>
      <p class="c-number__lv3 c-number--blue">{{ $users->total() }}</p>
      <p class="c-text__lv5">件</p>
    </div>
    <div class="p-buttonWrap">
      <a class="c-button c-button--sub" href="{{route('admin.user.new')}}">新規登録</a>
    </div>
    @endslot
    @slot('body')
    <form>
      <div class="p-filter">
        <div class="p-filter__main">
          <ul class="p-filter__list">

            <li class="p-filter__list__item">
              <div class="p-filter__list__item__label">日付</div>
              <div class="p-filter__list__item__data">
                <ul class=" p-filter__list__item__data__flex">
                  <li>
                    <div class="c-input c-input--half c-input--date">
                      <input type="text" name="date_from" value="{{$search['date_from'] ?? ''}}" placeholder="---" class="flatpickr ">
                    </div>
                  </li>
                  <p>~</p>
                  <li>
                    <div class="c-input c-input--half c-input--date">
                      <input type="text" name="date_to" value="{{$search['date_to'] ?? ''}}" placeholder="---" class="flatpickr ">
                    </div>
                  </li>
                  <li>
                    <div class="c-input c-input--keyword">
                      <input type="text" name="keyword" value="{{$search['keyword'] ?? ''}}" placeholder="キーワードで絞り込む" style="padding: 0px 8px 0 30px;">
                    </div>
                  </li>
                </ul>
                </div>
            </li>
          </ul>
        </div>
        <div class="p-filter__sub">
          <button class="c-button c-button--medium">絞り込む</button>
        </div>
      </div>
    </form>
    <div class="p-tableSet">
      <div class="p-tableSet__body">
        <table class="p-table">
          <thead class="p-table__head">
            <tr class="p-table__head__tableRow">
              @foreach([
                [
                  'label' => '氏名',
                  'type' => 'fullname',
                ],
                [
                  'label' => 'ニックネーム',
                  'type' => 'nickname',
                ],
                [
                  'label' => '生年月日',
                  'type' => 'second',
                  'class' => 'th-icon--up',
                ],
                [
                  'label' => 'エリア',
                  'type' => 'second',
                  'class' => 'th-icon--up',
                ],
                [
                  'label' => '住所',
                  'type' => 'second',
                ],
                [
                  'label' => '作成済みクイズの問題数題数',
                  'type' => 'second',
                  'class' => 'th-icon--up',
                ],
                [
                  'label' => '解答済みクイズ',
                  'type' => 'second',
                  'class' => 'th-icon--up',
                ],
                [
                  'label' => '参加イベント数',
                  'type' => 'second',
                  'class' => 'th-icon--up',
                ],

              ] as $key => $val)
              <th class="p-table__tableHead {{'p-table__tableHead'.$val['type']}}">
                <div class="p-table__item {{ isset($val['class']) ? 'th-icon--up' : '' }}">
                  {{$val['label']}}
                </div>
              </th>
              @endforeach
            </tr>
          </thead>
          <tbody class="p-table__data">
              @foreach($users as $user)
                <tr class="p-table__data__tableRow" data-href="{{route('admin.user.show', $user['id']) }}">
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                      {{$user['last_name'].' '. $user['first_name']}}
                    </div>
                  </td>
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                      {{$user['nickname']}}
                    </div>
                  </td>
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                      {{$user->birth_date_format}}
                    </div>
                  </td>
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                      {{$user['my_area']}}
                    </div>
                  </td>
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                    @foreach (config('prefecture.PREFECTURE') as $key => $value)
                      @if($key == $user['prefecture'])
                        {{ $value }}
                      @endif
                    @endforeach
                        {{$user['address']}}  {{$user['small_address']}}
                    </div>
                  </td>
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                      {{$user->quizzes->count()}}件
                    </div>
                  </td>
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                      {{$user->nonevents_participated_count}}件
                    </div>
                  </td>
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                      {{ $user->events_participated_count }}件
                    </div>
                  </td>
                  {{-- <td class="p-table__tableData">
                    <div class="p-table__item">
                      <p class="p-table__item p-table__item--release">企業アカウント</p>
                    </div>
                  </td> --}}
                </tr>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>
      <div class="p-tableSet__foot">
        <div class="p-bread">
          {{ $users->links("pagination::default") }}
        </div>
      </div>
    </div>
    @endslot
  @endcomponent
@endsection
