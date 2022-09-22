@extends('admin.layout.layout--admin')
@section('title', $title ?? 'お知らせ管理')
@section('content')
  @component('admin.component._p-index')
    {{-- @slot('title')
    
    @endslot --}}

    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      {{-- <span class="grn-txt mgn-r-2">ホーム</span> 
      <div class="a-page-title-2 mgn-r-2">
        <span> > </span>
      </div>
      <span class="grn-txt mgn-r-2">お知らせ管理</span> 
      <div class="a-page-title-2">
        <span> &gt;お知らせ詳細</span>
      </div> --}}
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span> 
      <div class="a-page-title-2 top-link-nav-2">
        <span>お知らせ管理</span>
      </div>
      <div class="a-page-title-2">
        <span>お知らせ管理</span>
      </div>
    </div>
    <div class="a-page-title">
      <span class="title__t2"><strong>—</strong>お知らせ詳細</span>
    </div>

    <div class="c-main-box active-cont">
      <div class="c-main-body">
        <div class="c-contianer-box">
        <div class="box-data">
          <div class="notification_adjust updated_notification_adjust mgn-b-2">
            <button class="notif-btn mgn-l-1">非表示</button>
            <button class="notif-btn">編集</button>
            <button class="notif-btn">コピー</button>
            <button class="notif-btn">送信先店舗を一覧で表示</button>
          </div>
            <div class="input_search p-tbl-mypage">
              <table class="p-table p_table_collapse">
                    <tbody class="p-table__data">
                      <tr class="notification_tr_adjust">
                        <td class="notification_table_data notification_background_color_1 notification_add_border">
                          重要Flug
                        </td>
                        <td class="notification_table_data notification_table_data_left_1 td_updated_infoDetails notification_table_data_left_1_add_border">
                          あり
                        </td>
                      </tr>
                      <tr>
                        <td class="notification_table_data notification_background_color">
                          対象店舗
                        </td>
                        <td class="notification_table_data notification_table_data_left td_updated_infoDetails">
                          {{ $notifications->target_store }}店舗 支払いなし、スターター andベーシック
                        </td>
                      </tr>
                      <tr>
                        <td class="notification_table_data notification_background_color">
                          表示日付
                        </td>
                        <td class="notification_table_data notification_table_data_left td_updated_infoDetails">
                          {{-- 2022年6月13日 --}}
                          {{ date('Y年m月d日', strtotime($notifications->date_content)) }}
                        </td>
                      </tr>
                      <tr>
                        <td class="notification_table_data notification_background_color">
                          掲載日
                        </td>
                        <td class="notification_table_data notification_table_data_left td_updated_infoDetails">
                          {{ date('Y年m月d日', strtotime($notifications->date_in)) }} ~ {{ date('Y年m月d日', strtotime($notifications->date_out)) }}
                        </td>
                      </tr>
                      <tr>
                        <td class="notification_table_data notification_background_color">
                          Title
                        </td>
                        <td class="notification_table_data notification_table_data_left td_updated_infoDetails">
                          {{ $notifications->title }}
                        </td>
                      </tr>
                      <tr>
                        <td class="notification_table_data notification_background_color notification_text_top">
                          <p class="notification_article_adjust">本文</p>
                        </td>
                        <td class="notification_table_data notification_table_data_left td_updated_infoDetails">
                          {{ $notifications->content }}
                        </td>
                      </tr>
                      <tr>
                        <td class="notification_table_data notification_background_color notification_border_radius_bottomleft">
                          メールフラグ
                        </td>
                        <td class="notification_table_data notification_table_data_left td_updated_infoDetails td_infodetails_bottomright_radius">
                          @if($notifications->mail_flag == 1)
                            店舗管理者のみ
                          @endif
                          @if($notifications->mail_flag == 2)
                            店舗全員へ
                          @endif
                          @if($notifications->mail_flag == 3)
                            メールはしない。（画面でのお知らせのみ）
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
      </div>
  </div>

    @endslot
  @endcomponent
@endsection
