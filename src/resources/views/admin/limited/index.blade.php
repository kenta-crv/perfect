@extends('admin.layout.layout--admin')
@section('title', $title ?? 'サイト別利用制限')
@section('content')
@component('admin.component._p-index')

  @slot('body')
  <div class="grn-txt-cont mgn-t-5 mgn-b-2">
    <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span> 
    <div class="a-page-title-2">
      <span>サイト別利用制限</span>
    </div>
  </div>
  <div class="c-main-box active-cont">
    <div class="c-main-body">
      <p>ロボットで接続するサイトを、店舗単位で利用可能・利用不可に切り替えます。</p>

      <div class="restrictions_container">
      <div class="restrict-tbl overflow-x">
        <table>
         <tbody>
          <tr>
          <th style="min-width: 25px;"></th>
          <th style="min-width: 120px;"></th>
          <th style="min-width: 150px;"></th>
          <th style="min-width: 150px;"></th>
          <th style="min-width: 150px;"></th>
         </tr>
         <tr>
          <td>1</td>
          <td>レインズ</td>
          <td><input type="radio" name="" /><label>全店舗利用　可能</label></td>
          <td><input type="radio" name="" /><label>全店舗利用　不可</label></td>
          <td><input type="radio" name="" /><label>カスタム</label></td>
         </tr>
         <tr>
          <td>2</td>
          <td>atBB</td>
          <td><input type="radio" name="" /><label>全店舗利用　可能</label></td>
          <td><input type="radio" name="" /><label>全店舗利用　不可</label></td>
          <td><input type="radio" name="" /><label>カスタム</label></td>
         </tr>
         <tr>
          <td>3</td>
          <td>イタンジ</td>
          <td><input type="radio" name="" /><label>全店舗利用　可能</label></td>
          <td><input type="radio" name="" /><label>全店舗利用　不可</label></td>
          <td><input type="radio" name="" /><label>カスタム</label></td>
         </tr>
         <tr>
          <td>4</td>
          <td>いえらぶ</td>
          <td><input type="radio" name="" /><label>全店舗利用　可能</label></td>
          <td><input type="radio" name="" /><label>全店舗利用　不可</label></td>
          <td class="restrict_last"><input type="radio" name="" /><label>カスタム</label></td>
         </tr>
        </tbody></table>
      </div>

      <div class="restrict-tbl1 overflow-x">
        <table>
         <tbody>
          <tr>
          <th style="min-width: 25px;"></th>
          <th style="min-width: 96px;"></th>
          <th style="min-width: 96px;"></th>
          <th style="min-width: 96px;"></th>
          <th style="min-width: 96px;"></th>
         </tr>
         <tr>
          <td>1</td>
          <td>SUUMO</td>
          <td><input type="radio" name="" /><label>全店舗利用　可能</label></td>
          <td><input type="radio" name="" /><label>全店舗利用　不可</label></td>
          <td><input type="radio" name="" /><label>カスタム</label></td>
         </tr>
         <tr>
          <td>2</td>
          <td>HOME’S</td>
          <td><input type="radio" name="" /><label>全店舗利用　可能</label></td>
          <td><input type="radio" name="" /><label>全店舗利用　不可</label></td>
          <td><input type="radio" name="" /><label>カスタム</label></td>
         </tr>
         <tr>
          <td>3</td>
          <td>アットホーム</td>
          <td><input type="radio" name="" /><label>全店舗利用　可能</label></td>
          <td><input type="radio" name="" /><label>全店舗利用　不可</label></td>
          <td class="restrict_last"><input type="radio" name="" /><label>カスタム</label></td>
         </tr>
        </tbody></table>
      </div>
    </div>
    <div class="restrict_button">
      <button class="r_button1">一括変更</button>
      <button class="r_button2">リセット・キャンセル</button>
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
    <div class="header_left_resume">
        再開のお手続き
    </div>
    <div class="header_left_label_robore_staff">
        解約手続き
    </div>

    <div class="box_detail_cancel">
        <p class="header_1">現在、休眠中となっています。</p><br/>
        <p class="header_2">再開いただくと、すぐに休眠前と同じ機能が使える様になります。</p>
        <p class="header_3">【費用について】</p>
        <p class="header_4">休眠前の最後のお支払いの権利が残っていれば、更新日までそのままご利用いただき、更新日以降は新たにお支払いいただきます。</p>
        <p class="header_5">休眠前の最後のお支払いの権利が残っていなければ、再開日から新たにお支払いいただきます。</p>
        <div class="foot_3">
            <div class="p-login__buttonArea">
                <button type="submit" class="c-button c-button--full c-button--thinBlue">解約する</button>
            </div>
        </div>
    </div>


    @endsection --}}
