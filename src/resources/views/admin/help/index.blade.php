@extends('admin.layout.layout--admin')
@section('title', $title ?? 'ヘルプ管理')
@section('content')
  @component('admin.component._p-index')
    @slot('body')
    
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span> 
      <div class="a-page-title-2">
        <span>ヘルプ管理</span>
      </div>
    </div>
    <div class="box-description_credit">
        <div class="box-title_2_help mgn-t-2">
          <p class="fnt-wgt-3 fnt-sz-6">マニュアル</p>
          <p class="manual"><a class='manual_help' href='#'>manual ver2-4.pdf</a></p>
          <button type="submit" class="c-button--thinBlue_2_help">差替えアップロード</button>
        </div>
    </div>

    <div class="c-main-box active-cont">
      <div class="c-main-body">
        <div class="c-list-tbl">
          <table>
          <tr>
            <th class="th-thead-table">場所</th>
            <th class="th-thead-table">対象者</th>
            <th class="th-thead-table">条件</th>
            <th class="th-thead-table">ヘルプ文言</th>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">TOP>賃貸＞検索＞駅からの距離</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">全角400文字以内</td>
            <td class="td-help-tbody">駅名を選択した時のみ、分数で検索可能です。</td>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">xxxxxxxxxxxxxxx</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">xxxxxxxxxxxxxxx</td>
            <td class="td-help-tbody">xxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">xxxxxxxxxxxxxxx</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">xxxxxxxxxxxxxxx</td>
            <td class="td-help-tbody">xxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">xxxxxxxxxxxxxxx</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">xxxxxxxxxxxxxxx</td>
            <td class="td-help-tbody">xxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">xxxxxxxxxxxxxxx</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">xxxxxxxxxxxxxxx</td>
            <td class="td-help-tbody">xxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">xxxxxxxxxxxxxxx</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">xxxxxxxxxxxxxxx</td>
            <td class="td-help-tbody">xxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">xxxxxxxxxxxxxxx</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">xxxxxxxxxxxxxxx</td>
            <td class="td-help-tbody">xxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">xxxxxxxxxxxxxxx</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">xxxxxxxxxxxxxxx</td>
            <td class="td-help-tbody">xxxxxxxxxxxxxxx</td>
          </tr>
          <tr>
            <td class="td-help-tbody"><a href="#" class="a-help-tbody">xxxxxxxxxxxxxxx</a></td>
            <td class="td-help-tbody-2">管理者・ｽﾀｯﾌ</td>
            <td class="td-help-tbody-2">xxxxxxxxxxxxxxx</td>
            <td class="td-help-tbody">xxxxxxxxxxxxxxx</td>
          </tr>
         
          </table>
          </div>
      </div>
   </div>

    @endslot
  @endcomponent
@endsection


