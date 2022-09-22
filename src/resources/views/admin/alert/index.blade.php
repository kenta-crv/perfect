@extends('admin.layout.layout--admin')
@section('title', $title ?? 'アラート管理')
@section('content')
  @component('admin.component._p-index')
    {{-- @slot('title')
    {{-- TOPダッシュボード --}}
    {{-- @endslot --}} --}}
    @slot('action')

    @endslot
    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      {{-- <span class="grn-txt mgn-r-2">ホーム</span>
      <div class="a-page-title-2">
        <span> &gt; アラート確認</span>
      </div> --}}
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
      <div class="a-page-title-2">
        <span>アラート確認</span>
      </div>
    </div>
    <div class="a-page-title">
      <span class="title__t2"><strong>—</strong> アラートルールの確認</span>
    </div>
    <div class="alertAdd">
      <a href="/admin/alert/alertAdd"class="alertAddButton">新規登録</a>
    </div>
    <div class="c-main-box active-cont">
      <div class="c-list-tbl">
        <table>
          <tr>
            <th><strong>優先順位</strong></th>
            <th><strong>アラート名</strong></th>
            <th><strong>ルール</strong></th>
            {{--  <th><strong>表示合計</strong></th>  --}}
            <th><strong>ﾄﾗｲｱﾙ</strong></th>
            <th><strong>ｽﾀｰﾀｰ</strong></th>
            <th><strong>ﾍﾞｰｼｯｸ</strong></th>
            <th><strong>ｴﾝﾌﾟﾗ</strong></th>
            <th><strong>編集</strong></th>
          </tr>
          @foreach($alert as $alert_items)
          <tr>
            <td>{{ $alert_items-> priority }}</td>
            <td>{{ $alert_items-> name }}</td>
            <td>{{ $alert_items-> rule }}</td>
            {{--  <td>{{ $alert_items-> id }}</td>  --}}
            <td>{{ $alert_items-> trial_flag}}</td>
            <td>{{ $alert_items-> basic_flag}}</td>
            <td>{{ $alert_items-> starter_flag}}</td>
            <td>{{ $alert_items-> enterprise_flag}}</td>
            <td><button class="btn-none"><a href="/admin/alert/edit/{!! $alert_items->id !!}" class="c-lbl-white" >編集</a></button></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
   </div>

    @endslot
  @endcomponent
@endsection


