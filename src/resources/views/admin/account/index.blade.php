@extends('admin.layout.layout--admin')
@section('title', $title ?? 'アカウント管理')
@section('content')
  @component('admin.component._p-index')
    @slot('body')

    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
      <div class="a-page-title-2">
        <span>アカウント管理</span>
      </div>
    </div>


    <livewire:admin.account.index/>
    @endslot
  @endcomponent
@endsection


