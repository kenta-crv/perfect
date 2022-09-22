
@extends('admin.layout.layout--admin')
@section('title', $title ?? '店舗検索')
@section('content')
  @component('admin.component._p-index')

    @slot('body')
    <form method="get" action="{{ route('admin.store.search.index') }}" id="accountsearchform">
    {{--  restriction form  --}}
    @include('admin.store.restriction')

    <div class="box-description_credit fnt-wgt-3 fnt-sz-8">
      <span><strong style="color: #003a16;">—</strong> 検索結果</span>
    </div>

    <div class="c-main-box active-cont">
      <div class="c-main-body">
        <div class="pagination-cont-body">
          <div class="pagination-cont">
            <div class="pagination mgn-b-01">
              <ul>
                <li class="page-item " aria-current="page">
                  {{-- {{ $result->links() }} --}}
                </li>
              </ul>
            </div>
            <div class="mgn-t-3 mgn-r-5">
              <select class="keep-slct-01 width-75" name="" id="">
                <option value="0">10  </option>
              </select>
            </div>
            <div class="mpage-desc mgn-t-5">
              <span>件表示 / ページ</span>
            </div>
          </div>
          <div class="admin-btn-cont">
            <div class="admin-btn ">
              <span>全データ CSVダウンロード</span>
            </div>
          </div>
        </div>

        <div class="c-list-tbl">
          <table>
            <tr>
              <th style="width: 41px;"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></th>
              <th style="width: 81px;">ID▽</th>
              <th style="width: 121px;">プラン▼</th>
              <th style="width: 101px;">免許番号▽</th>
              <th style="width: 176px;">店舗名</th>
              <th style="width: 126px;">電話番号▽</th>
              <th style="width: 91px;">担当者▽</th>
              <th style="width: 126px;">最終更新日▽</th>
              <th style="width: 126px;">プラン登録日▽</th>
              <th style="width: 81px;">有料月▽</th>
              <th style="width: 81px;">未払い▽</th>
              <th style="width: 81px;">R当者▽</th>
              <th style="width: 83px;">代理</th>
            </tr>
            @foreach($accounts as $result)
            <tbody>
              <tr>
                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                <td>{{ $result->id }}</td>
                <td>
                  @if($result->plans == 2)
                    プラス 月額　5,000円
                  @endif

                  @if($result->plans == 1)
                  ベーシック 月額　3,000円
                  @endif
                </td>
                <td>{{ $result->license }}</td>
                <td><a href="{{ url('admin/store/search/detail/'. $result->id) }}" style="font-size: 14px; font-weight:bold">{{ $result->company_name }}</a></td>
                <td>{{ $result->tel }}</td>
                <td>{{ $result->last_name }}</td>
                <td>{{ $result->updated_at }}</td>
                <td>2022年03月14日</td>
                <td>3</td>
                <td>9,000 円</td>
                <td>茂木</td>
                <td class="pdf-txt">ログイン</td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
        <div class="pagination-cont">
          <div class="pagination">
            <ul>
              <li class="page-item " aria-current="page">
                {{-- {{ $result->links() }} --}}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    @endslot
  @endcomponent

@endsection

