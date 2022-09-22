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
    <div class="c-main-box active-cont">
      <div class="c-list-tbl">
        <form action="{{ route('admin.alert.alertUpdate')}}" method="POST">
        @csrf
        <input type="hidden" name="alert_id" value="{{ $edit->id }}">
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
            <th><strong>更新</strong></th>
          </tr>
          <tr>
            <td>
              <input type="text" name="priority" value="{{ $edit->priority }}" class="input_3 mgn-r-2" contenteditable="true">
            </td>
            <td>
              <input type="text" name="name" value="{{ $edit->name }}" class="input_3 mgn-r-2" contenteditable="true">
            </td>
            <td>
              <input type="text" name="rule" value="{{ $edit->rule }}" class="input_3 mgn-r-2" contenteditable="true">
            </td>
            <td>
              <input type="checkbox" class="alertBoxSize" name="trial_flag" value="{{ $edit->trial_flag }}" contenteditable="true">
            </td>
            <td>
              <input type="checkbox" class="alertBoxSize" name="basic_flag" value="{{ $edit->basic_flag }}" contenteditable="true">
            </td>
            <td>
              <input type="checkbox" class="alertBoxSize" name="starter_flag" value="{{ $edit->starter_flag }}" contenteditable="true">
            </td>
            <td>
              <input type="checkbox" class="alertBoxSize" name="enterprise_flag" value="{{ $edit->enterprise_flag }}" contenteditable="true">
            </td>
            <td><button type="submit" class="c-lbl-white" >更新</button></td>
          </tr>
        </table>
        </form>
      </div>
    </div>
   </div>

    @endslot
  @endcomponent
@endsection


