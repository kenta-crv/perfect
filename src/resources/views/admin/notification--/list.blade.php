@extends('admin.layout.layout--admin')
@section('title', $title ?? '通知')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
      {{--  店舗のホームページ設定  --}}
    @endslot
    @slot('action')

    @endslot
    @slot('body')
    <div class="c-contianer-box">
        <div class="box-data">
            <div class="container_center">
                <div class="container_box">
                    お知らせ一覧
                </div>
            </div><br/>
            <div class="input_search">
                <table class="p-table">
                    <thead class="p-table__head">
                      <tr class="p-table__head__tableRow">
                          <th class="notification_table_header">重要Flug</th>
                          <th class="notification_table_header">表示日付</th>
                          <th class="notification_table_header">掲載from</th>
                          <th class="notification_table_header">to</th>
                          <th class="notification_table_header">Title（クリックで詳細。編集も可）</th>
                          <th class="notification_table_header">対象店舗数</th>
                          <th class="notification_table_header">対象店舗</th>
                          <th class="notification_table_header">＋ 新規</th>
                      </tr>
                    </thead>
                    <tbody class="p-table__data">
                      <tr>
                          <td class="notification_table_data">
                            重要
                           </td>

                          <td class="notification_table_data">
                            2022年6月13日
                          </td>
                          <td class="notification_table_data">
                            2022/6/13
                          </td>
                          <td class="notification_table_data">
                            2022/6/30
                          </td>
                          <td class="notification_table_data">
                            6月分のお支払いを御確認ください。
                          </td>
                          <td class="notification_table_data">
                            61店舗
                          </td>
                          <td class="notification_table_data">
                            支払いなし、スターター andベーシック
                          </td>
                          <td>

                          </td>
                        </tr>
                      <tr>
                          <td class="notification_table_data">

                           </td>

                          <td class="notification_table_data">
                            2022年6月12日
                          </td>
                          <td class="notification_table_data">
                            2022/6/13
                          </td>
                          <td class="notification_table_data">
                            -
                          </td>
                          <td class="notification_table_data">
                            6/11深夜のメンテナンスは無事終了しました。
                          </td>
                          <td class="notification_table_data">
                            1,044店舗
                          </td>
                          <td class="notification_table_data">
                            スターター・ベーシック
                          </td>
                          <td>

                          </td>
                        </tr>
                      <tr>
                          <td class="notification_table_data">

                           </td>

                          <td class="notification_table_data">
                            2022年6月10日
                          </td>
                          <td class="notification_table_data">
                            2022/6/10
                          </td>
                          <td class="notification_table_data">
                            2022/6/17
                          </td>
                          <td class="notification_table_data">
                            ご友人ご紹介キャンペーンについて
                          </td>
                          <td class="notification_table_data">
                            240店舗
                          </td>
                          <td class="notification_table_data">
                            ベーシック
                          </td>
                          <td>

                          </td>
                        </tr>
                      <tr>
                          <td class="notification_table_data">
                            重要
                           </td>

                          <td class="notification_table_data">
                            2022年6月10日
                          </td>
                          <td class="notification_table_data">
                            2022/6/10
                          </td>
                          <td class="notification_table_data">
                            -
                          </td>
                          <td class="notification_table_data">
                            レインズでのロボット利用について
                          </td>
                          <td class="notification_table_data">
                            1,044店舗
                          </td>
                          <td class="notification_table_data">
                            スターター・ベーシック
                          </td>
                          <td>

                          </td>
                        </tr>
                      <tr>
                          <td class="notification_table_data">

                           </td>

                          <td class="notification_table_data">
                            2022年6月1日
                          </td>
                          <td class="notification_table_data">
                            2022/6/1
                          </td>
                          <td class="notification_table_data">
                            -
                          </td>
                          <td class="notification_table_data">
                            HOME'Sへの出稿が可能となりました
                          </td>
                          <td class="notification_table_data">
                            1,044店舗
                          </td>
                          <td class="notification_table_data">
                            スターター・ベーシック
                          </td>
                          <td>

                          </td>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
    @endslot
  @endcomponent

@endsection

