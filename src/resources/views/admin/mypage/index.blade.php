@extends('admin.layout.layout--admin')
@section('title', $title ?? 'アカウント管理')
@section('content')
@component('admin.component._p-index')
    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span> 
      <div class="a-page-title-2">
        <span>マイページ</span>
      </div>
    </div>
    <div class="a-page-title">
      <span class="title__t2"><strong>—</strong> マイページ</span>
    </div>
    <div class="c-main-box active-cont">
      <div class="box-data">
          <div class="box-title">  
            <a href="{{url('admin/mypage/edit/'. $admin->id)}}" type="submit" class="mpage-btn">編集</a>
          </div>
          <table class="p-table p_credit_table p-tbl-mypage ">
                  <thead class="p-table__head">
                    <tr class="p-table__head__tableRow_3">
                        <th class="th_1 th_1_leftradius th_color txt-alg-l" style="width: 50%;">お名前</th>
                        <th class="th_3 th_3_leftradius th_color txt-alg-l">{{ $admin->last_name }} {{ $admin->first_name }}</th>
                    </tr>
                    <tr class="p-table__head__tableRow_3">
                        <th class="th_2 th_2_leftradius th_color txt-alg-l">メールアドレス</th>
                        <th class="th_7 th_7_leftradius th_color txt-alg-l"><u class="grn-txt">{{ $admin->email }}</u></th>
                    </tr>
                    <tr class="p-table__head__tableRow_3">
                        <th class="th_2 th_2_leftradius th_color txt-alg-l">パスワード</th>
                        <th class="th_7 th_7_leftradius th_color txt-alg-l"><u class="grn-txt">パスワードの変更</u></th>
                    </tr>
                    <tr class="p-table__head__tableRow_3">
                        <th class="th_4 th_4_leftradius th_color txt-alg-l">ロール権限</th>
                        <th class="th_17 th_17_leftradius th_color txt-alg-l">
                        @foreach(config('const.role') as $key => $value)
                          @if($key == $admin->role)
                            {{ $value }}
                          @endif
                        @endforeach
                        </th>
                    </tr>
                  </thead>
                </table>
      </div>
    </div>
    @endslot
  @endcomponent

@endsection




{{-- @extends('admin.layout.layout--admin')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
      ホーム　>　マイページ
    @endslot
    @slot('action')

    @endslot
    @slot('body')
    @livewire('admin.my-page')
    @endslot
  @endcomponent

@endsection
 --}}
