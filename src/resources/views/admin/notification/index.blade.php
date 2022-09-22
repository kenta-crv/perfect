@extends('admin.layout.layout--admin')
@section('title', $title ?? 'お知らせ管理')
@section('content')
  @component('admin.component._p-index')
    @slot('action')

    @endslot
    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
      <div class="a-page-title-2">
        <span>お知らせ管理</span>
      </div>
    </div>
    <div class="a-page-title">
      <span><strong style="color: #003a16;">—</strong> お知らせ一覧</span>
    </div>
    <div class="c-main-box active-cont">
      <div class="c-list-tbl overflow-x">
        <table>
          <tbody>
              <th style="min-width: 101px;">重要Flug</th>
              <th style="min-width: 131px;">表示日付</th>
              <th style="min-width: 131px;">掲載from</th>
              <th style="min-width: 131px;">to</th>
              <th style="min-width: 301px;">Title</th>
              <th style="min-width: 121px;">対象店舗数</th>
              <th style="min-width: 301px;">対象店舗</th>
              <th style="min-width: 88px;">
                <a class="c-icn-add" href="{{route ('admin.store.search.index')}}"></a>
                <span class="mgn-l-3">新規</span>
              </th>
             </tr>
             @foreach($notification as $notif)
              <tr>
                <td><strong>重要</strong></td>
                <td><span>{{ $notif->date_content }}</span></td>
                <td><span>{{ $notif->date_in }}</span></td>
                <td><span>{{ $notif->date_out }}</span></td>
                <td class="txt-alg-l"><a href="{{ url('admin/notification/informationDetails/'. $notif->id) }}" class="grn-txt" style="font-size: 14px;">{{ $notif->title}}</a></td>
                <td class="txt-alg-r"><span>{{ $notif->target_store}} 店舗</span></td>
                <td><span>{{ $notif->content}}</span></td>
                <td></td>
              </tr>
              @endforeach
        </tbody></table>
    </div>
   </div>

    @endslot
  @endcomponent
@endsection


