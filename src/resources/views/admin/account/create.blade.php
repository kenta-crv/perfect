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
    <div class="c-main-box active-cont">
      <div class="box-data">
          <form method="post" action="{{ route('admin.account.insert') }}">
          {{-- <form method="post" action="{{ route('admin.account.update') }}"> --}}
            @csrf
            <table class="p-table p_credit_table p-tbl-mypage ">
              <thead class="p-table__head">
                <tr class="p-table__head__tableRow_3">
                    <th class="th_1 th_1_leftradius th_color txt-alg-l" style="width: 50%;">お名前</th>
                    <th class="th_3 th_3_leftradius th_color txt-alg-l">
                      <input type="text" name="last_name" value="" class="input_3 mgn-r-2" contenteditable="true">姓
                      <input type="text" name="first_name" value="" class="input_3 mgn-l-2 mgn-r-2" contenteditable="true">名
                      <span class="text-danger"> @error('last_name') {{ $message }} @enderror </span>
                      </th>
                      
                </tr>
                <tr class="p-table__head__tableRow_3">
                    <th class="th_2 th_2_leftradius th_color txt-alg-l">メールアドレス</th>
                    <th class="th_7 th_7_leftradius th_color txt-alg-l">
                      <input type="name" name="email" value="" class="input_3" contenteditable="true">
                      <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
                      </th>
                </tr>
                <tr class="p-table__head__tableRow_3">
                    <th class="th_2 th_2_leftradius th_color txt-alg-l">パスワード</th>
                    <th class="th_7 th_7_leftradius th_color txt-alg-l">
                        <input type="password" name="password" value="" class="input_3" contenteditable="true">
                    </th>

                </tr>
                <tr class="p-table__head__tableRow_3">
                    <th class="th_4 th_4_leftradius th_color txt-alg-l">ロール権限</th>
                    <th class="th_17 th_17_leftradius th_color txt-alg-l">
                        <select class="keep-slct-01 " style="padding-right: 25px;" name="selected_role" id="select_limited">
                          <option value="">選択してください</option>
                          @foreach(config('const.role') as $key => $value)
                                <option value=" {{ $key }}"> {{ $value }}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
              </thead>
            </table>
            <div class="box-title justify_content--end mgn-t-2">
              <a type="submit" class="mpage-btn mgn-r-2" href="{{route ('admin.account.index')}}">取消</a>
              <button type="submit" class="mpage-btn mgn-r-2">保存</button>
            </div>
          </form>
      </div>
    </div>
    @endslot
  @endcomponent
@endsection
