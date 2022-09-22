@extends('admin.layout.layout--admin')
@section('title', $title ?? 'お問い合わせ管理')
@section('content')
  @component('admin.component._p-index')
    @slot('title')
    	<div class="c-image c-image--contact"></div>
      お問い合わせ一覧
    @endslot
    @slot('action')
    <div class="p-text p-text--narrow p-text--marginRight">
      <p class="c-text__lv5">お問い合わせ数 :</p>
      <p class="c-number__lv3  c-number--blue">{{ $contacts->total() }}</p>
      <p class="c-text__lv5">件</p>
    </div>
    @endslot
    @slot('body')
    <form action="{{route('admin.contact.index')}}">
      <div class="p-filter">
        <div class="p-filter__main">
          <ul class="p-filter__list">
            <li class="p-filter__list__item">
              <div class="p-filter__list__item__label">ステータス</div>
              <div class="p-filter__list__item__data">
                <div class="c-input c-input--select">
                  <select name="status">
                    <option value="0">すべて</option>
                    <option value="1" {{$search['status'] == '1' ? 'selected':''}}>対応済み</option>
                    <option value="2" {{$search['status'] == '2' ? 'selected':''}}>対応中</option>
                    <option value="3" {{$search['status'] == '3' ? 'selected':''}}>未対応</option>
                  </select>
                </div>
              </div>
            </li>
            <li class="p-filter__list__item">
              <div class="p-filter__list__item__data">
                <div class="c-input c-input--keyword">
                  <input type="text" name="keyword" value="{{$search['keyword'] ?? ''}}" placeholder="名前で絞り込む" style="padding: 0px 8px 0 30px;">
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="p-filter__sub">
          <button class="c-button c-button--full">絞込</button>
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
                  'label' => 'お問い合わせカテゴリー',
                  'type' => 'auto',
                ],
                [
                  'label' => '氏名',
                  'type' => 'statuts',
                ],
                [
                  'label' => 'メールアドレス',
                  'type' => 'statuts',
                ],
                [
                  'label' => '受信日時',
                  'type' => 'statuts',
                ],
                [
                  'label' => 'ステータス',
                  'type' => 'dateTime',
                ],
              ] as $key => $val)
              <th class="p-table__tableHead {{'p-table__tableHead'.$val['type']}}">
                <div class="p-table__item">{{$val['label']}}</div>
              </th>
              @endforeach
            </tr>
          </thead>
          <tbody class="p-table__data">
            @foreach($contacts as $contact)
            <tr class="p-table__data__tableRow" data-href="{{route('admin.contact.detail',$contact->id )}}">
              <td class="p-table__tableData">
                <div class="p-table__item">
                  @if($contact->category_id == 1)
                    クイズについて
                  @elseif($contact->category_id == 2)
                    サービスについて
                  @else
                    その他
                  @endif
                </div>
              </td>
              <td class="p-table__tableData">
                <div class="p-table__item" style="width: 200px;">
                  {{ $contact->full_name }}
                </div>
              </td>
              <td class="p-table__tableData">
                <div class="p-table__item">
                  {{ $contact->email }}
                </div>
              </td>
              <td class="p-table__tableData">
                <div class="p-table__item">
                  {{ $contact->received_date_format .' '.$contact->received_time_format }}
                </div>
              </td>
              @if($contact->status == 1)
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                    <p class="p-table__item p-table__item--gray">対応済み</p>
                    </div>
                  </td>
                @elseif($contact->status == 2)
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                    <p class="p-table__item p-table__item--release">対応中</p>
                    </div>
                  </td>
                @elseif($contact->status == 3)
                  <td class="p-table__tableData">
                    <div class="p-table__item">
                    <p class="p-table__item p-table__item--private">未対応</p>
                    </div>
                  </td>
                @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="p-tableSet__foot">
        <div class="p-bread">
          {{ $contacts->links("pagination::default") }}
        </div>
      </div>
    </div>
    @endslot
  @endcomponent
@endsection
