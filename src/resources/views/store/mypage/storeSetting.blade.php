@extends('store.layouts.layout--store')
@section('title', $title ?? '店舗のユーザー設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
        店舗のユーザー設定
    @endslot
    @slot('action')

    @endslot
    @slot('body')

    <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <p>	店舗管理者のみの機能です。</p>
            <p>fsdfdsf</p>
            <p class="header_3">現在のユーザー数　:2 ※追加料金なしで、あと1ユーザー登録が可能です。</p>
            <div class="container-table margin-top--01">
                <h2>請求情報　（金額は税別表示です）</h2>
                <br>
                <table class="p-table">
                  <thead class="p-table__head">
                    <tr class="p-table__head__tableRow">
                        <th>ユーザー名 △▽</th>
                        <th>ロール権限 △▽</th>
                        <th>メールアドレス △▽</th>
                        <th>登録年月日 △▽</th>
                        <th>最終アクセス △▽</th>
                        <th>＋ ユーザーを追加 △▽</th>
                    </tr>
                  </thead>
                  <tbody class="p-table__data">
                    <tr>
                        <td>佐竹 義之</td>
                        <td>管理者</td>
                        <td>satake.y@plenty.co.jp</td>
                        <td>5/2/2022</td>
                        <td>6/22/2022</td>
                        <td>
                            <button type="submit" class="c-button2 c-button--full c-button--thinBlue">編集</button>
                            <button type="submit" class="c-button2 c-button--full c-button--thinBlue">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>鈴木 一郎</td>
                        <td>スタッフ</td>
                        <td>xxxx@xxxxxxxxx</td>
                        <td>5/2/2022</td>
                        <td>5/22/2022</td>
                        <td>
                            <button type="submit" class="c-button2 c-button--full c-button--thinBlue">編集</button>
                            <button type="submit" class="c-button2 c-button--full c-button--thinBlue">削除</button>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    @endslot
@endcomponent
@endsection



{{-- @extends('store.layouts.login_layout')
@section('content')

    <div class="header_center">
        ヘッダ
        <hr>
    </div>

    <div class="box_nav_2">
        メニュー
    </div>

    <div class="header_left_label_robore_staff">
        店舗のユーザー設定
    </div>

    <div class="box_detail_2">
        <p class="header_1">店舗管理者のみの機能です。</p><br/>
        <p class="header_2">管理者やスタッフのユーザーアカウントを登録・編集・削除ができます。</p>
        <p class="header_3">現在のユーザー数　：　2 </p>
        <p class="header_7">※追加料金なしで、あと1ユーザー登録が可能です。</p> <br>
        <div class="table_3">
            <table>
                <tr>
                    <th>ユーザー名 △▽</th>
                    <th>ロール権限 △▽</th>
                    <th>メールアドレス △▽</th>
                    <th>登録年月日 △▽</th>
                    <th>最終アクセス △▽</th>
                    <th>＋ ユーザーを追加 △▽</th>
                </tr>

                <tr>
                    <td>佐竹 義之</td>
                    <td>管理者</td>
                    <td>satake.y@plenty.co.jp</td>
                    <td>5/2/2022</td>
                    <td>6/22/2022</td>
                    <td>
                        <button>編集</button>
                        <button>削除</button>
                    </td>
                </tr>
                <tr>
                    <td>鈴木 一郎</td>
                    <td>スタッフ</td>
                    <td>xxxx@xxxxxxxxx</td>
                    <td>5/2/2022</td>
                    <td>5/22/2022</td>
                    <td>
                        <button>編集</button>
                        <button>削除</button>
                    </td>
                </tr>
            </table>
        </div>

    </div>


    @endsection --}}
