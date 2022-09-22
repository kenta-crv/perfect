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
        <form action="{{ route('admin.alert.alertcreate')}}" method="POST">
          @csrf
          <div class="form_container_alert">
            <div class="alertInput">
          <label class="label_alert_adjust" for="id_name">アラート名</label>
          <input type="text" class="input_alert_deco" placeholder="アラート名" name="name" id="id_name">
          @error('name')
            <div class="error">{{ $message }}</div>
          @enderror
        </div>
        <div class="alertInput">
          <label class="label_alert_adjust" for="id_rule">ルール</label>
          <input type="text" class="input_alert_deco" placeholder="ルール" name="rule" id="id_name"></input>
           @error('rule')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
        <div class="alertInput">
          <label class="label_alert_adjust" for="id_priority">優先順位</label>
          <input type="text" class="input_alert_deco" placeholder="優先順位" name="priority" id="id_priority"></input>
          @error('priority')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
        <div class="alertCheckBox">
          <input type="checkbox" class="alertBoxSize" name="trial_flag" value="0"  id="trial"></input>
          <label class="label_checkbox_adjust" for="trial">トライアル</label>
          <input type="checkbox" class="alertBoxSize" name="starter_flag" value="0" id="starter"></input>
          <label class="label_checkbox_adjust" for="starter">スターター</label>
          <input type="checkbox" class="alertBoxSize" name="basic_flag" value="0" id="basic"></input>
          <label class="label_checkbox_adjust" for="basic">ベーシック</label>
          <input type="checkbox" class="alertBoxSize" name="enterprise_flag" value="0" id="enterprise"></input>
          <label class="label_checkbox_adjust" for="enterprise">エンタープライズ</label>
          @error('flag')
            <span class="error_checkbox_adjust">{{ $message }}</span>
        @enderror
        </div>
        {{--  <div class="errorCheckbox" style="display: none;">checkbox is required</div>  --}}
        <button type="submit" class="btn btn-primary submitAlert" onclick="checkboxCheck()">登録</button>
          </div>

        </form>
      </div>
    </div>
  </div>
    @endslot
  @endcomponent
@endsection


