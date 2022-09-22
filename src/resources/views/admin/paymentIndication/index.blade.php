
@php
    $array = [
      'thead' => [
        '年月日',
        'プラン	',
        '追加ユーザー	',
        '掲載数追加',
        '請求金額	',
        '明細書',
      ],

      'tbody' => [
        '年月日',
        'プラン	',
        '追加ユーザー	',
        '掲載数追加',
        '請求金額	',
        '明細書',
      ]

    ]
@endphp
@extends('admin.layout.layout--admin')
@section('title', $title ?? 'プラン・支払い表示')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="c-main-box active-cont">
        <div class="c-main-body">
          <div class="data-info">
            <div class="l-12 l-12 border-btm">
              <div class="l-12__1 text-input__label-02">
                <div class="lbl-txt ">
                  <label class="fnt-wgt-4" for="">ID</label>
                </div>
              </div>
              <div class="l-12__1 ">
                <div class="lbl-txt">
                  <label class="" for="">R123456</label>
                </div>
              </div>
              <div class="l-12__1 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">プラン</label>
                </div>
              </div>
              <div class="l-12__1 ">
                <div class="lbl-txt">
                  <label class="" for="">ベーシック</label>
                </div>
              </div>
              <div class="l-12__1 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">初回登録日</label>
                </div>
              </div>
              <div class="l-12__1 ">
                <div class="lbl-txt">
                  <label class="" for="">2022/02/14</label>
                </div>
              </div>
              <div class="l-12__1 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">現プラン登録日</label>
                </div>
              </div>
              <div class="l-12__1 ">
                <div class="lbl-txt">
                  <label class="" for="">2022/02/14</label>
                </div>
              </div>
              <div class="l-12__1 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">ロボレ担当</label>
                </div>
              </div>
              <div class="l-12__1 ">
                <div class="lbl-txt">
                  <label class="" for="">茂木 利勝</label>
                </div>
              </div>

            </div>
            <div class="l-12 l-12 border-btm">

              <div class="l-12__1 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">有料支払い月</label>
                </div>
              </div>
              <div class="l-12__1 ">
                <div class="lbl-txt">
                  <label class="" for="">3</label>
                </div>
              </div>
              <div class="l-12__1 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">初回登録日</label>
                </div>
              </div>
              <div class="l-12__1 ">
                <div class="lbl-txt">
                  <label class="" for="">9,000 円</label>
                </div>
              </div>
            </div>
            <div class="l-12 l-12 ">
              <div class="l-12__1 text-input__label-02">
                <div class="lbl-txt">
                  <label class="fnt-wgt-4" for="">備考</label>
                </div>
              </div>
              <div class="l-12__6 ">
                <div class="lbl-txt lbl-main">
                  <p>立上時に協力いただいているため、有料だが何かあれば優遇対応してください。</p>
                  <p>原則、プランやアクアンとの変更は、ロボレ側で対応すること。</p>
                </div>
              </div>

            </div>
          </div>

          <div class="data-info mgn-t-3">
            <div class="l-12 l-12 border-btm">
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt ">
                  <label class="fnt-wgt-4" for="">免許番号</label>
                </div>
              </div>
              <div class="l-12__2 ">
                <div class="lbl-txt">
                  <label class="" for="">東京都知事（7）第62152号</label>
                </div>
              </div>
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                  <label class="fnt-wgt-4" for="">ご担当者様</label>
                </div>
              </div>
              <div class="l-12__2 mgn-t-2">
                <div class="lbl-txt">
                  <label class="" for="">矢野　輝子　様</label>
                </div>
              </div>
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                  <label class="fnt-wgt-4" for="">電話番号</label>
                </div>
              </div>
              <div class="l-12__1 mgn-t-2">
                <div class="lbl-txt">
                  <label class="" for="">042-667-8945</label>
                </div>
              </div>
            </div>
            <div class="l-12 l-12 border-btm">
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">店舗名</label>
                </div>
              </div>
              <div class="l-12__6 mgn-t-2">
                <div class="lbl-txt">
                  <label class="" for="">有限会社ミキハウジング</label>
                </div>
              </div>
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">メールアドレス</label>
                </div>
              </div>
              <div class="l-12__2 ">
                <div class="lbl-txt">
                  <label class="" for="">aaaa@bbb.co.jp</label>
                </div>
              </div>
            </div>
            <div class="l-12 l-12 border-btm">
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">表示名</label>
                </div>
              </div>
              <div class="l-12__6 mgn-t-2">
                <div class="lbl-txt lbl-main">
                  <label class="" for="">ミキハウジング</label>
                </div>
              </div>
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">電話番号追加1</label>
                </div>
              </div>
              <div class="l-12__2 ">
                <div class="lbl-txt">
                  <label class="" for="">090-1111-2222</label>
                </div>
              </div>
            </div>
            <div class="l-12 l-12 border-btm">
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">住所</label>
                </div>
              </div>
              <div class="l-12__6 mgn-t-2">
                <div class="lbl-txt">
                  <label class="" for="">141-0001　東京都八王子市千人町3-2-3</label>
                </div>
              </div>
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">電話番号追加2</label>
                </div>
              </div>
              <div class="l-12__2 ">
                <div class="lbl-txt">
                  <label class="" for="">090-1111-2222</label>
                </div>
              </div>
            </div>
            <div class="l-12 l-12 ">
              <div class="l-12__2 text-input__label-02">
                <div class="lbl-txt">
                <label class="fnt-wgt-4" for="">電話備考</label>
                </div>
              </div>
              <div class="l-12__10 mgn-t-2">
                <div class="lbl-txt lbl-main">
                  <label class="" for="">昼間は1の方に電話。堂本さんがメイン</label>
                </div>
              </div>
            </div>
          </div>

          <div class="c-main-box-tabs" x-data>
            <ul>
              <template x-for="tab in $store.tabs.items">
                  <li
                    :class="{'active' : tab.label == $store.tabs.current, 'mgn-r-5 mgn-l-5' : tab.label != $store.tabs.current }"
                    @click="$store.tabs.current = tab.label">
                    <p
                      x-text="tab.description">
                    </p>
                  </li>
              </template>
            </ul>
              <div class="result">
                <div class="result-tabs" x-show="$store.tabs.current == '1'">
                  {{--  for components table jus passing data--}}
                  {{--  <livewire:admin.components.table :thead="$array['thead']" :tbody_data="$array['tbody']"/>  --}}
                  <div class="head">
                    <span>プラン：ベーシック</span>
                    <span class="mgn-l-8">アカウント数：15</span>
                  </div>

                  <div class="accounts">
                    @include('admin.paymentIndication.accounts')
                  </div>
                </div>
                <div class="result-tabs" x-show="$store.tabs.current == '2'">
                  <div class="billing-info-table overflow-x">
                    <table>
                      <tbody>
                        <tr>
                          <th style="min-width: 181px;">年月日</th>
                          <th style="min-width: 181px;">プラン </th>
                          <th style="min-width: 126px;">追加ユーザー</th>
                          <th style="min-width: 126px;">掲載数追加</th>
                          <th style="min-width: 171px;">請求金額</th>
                          <th style="min-width: 111px;">明細書</th>
                        </tr>
                        <tr>
                          <td>2022年06月27日</td>
                          <td>ベーシック</td>
                          <td>1</td>
                          <td>0</td>
                          <td>5,500円(6,050円)</td>
                          <td>PDF</td>
                        </tr>
                        <tr>
                          <td>2022年05月27日</td>
                          <td>ベーシック</td>
                          <td>0</td>
                          <td>0</td>
                          <td>5,000円(5,500円)</td>
                          <td>PDF</td>
                        </tr>
                        <tr>
                          <td>2022年04月27日</td>
                          <td>ベーシック</td>
                          <td>1</td>
                          <td>0</td>
                          <td>5,000円(5,500円)</td>
                          <td>PDF</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="billing-info">
                    <div class="head">
                        <label for="">プラン：</label>
                        <span>口座振替</span>

                        <label class="mgn-l-5" for="">プラン：</label>
                        <span>口座振替</span>
                    </div>
                    <div class="body mgn-t-5">
                      <div class="data display-inline--flex width-full">
                        @include('admin.paymentIndication.plans')
                        <div class="mgn-l-3">
                          @include('admin.paymentIndication.plans')
                        </div>
                      </div>
                      <div class="discount mgn-t-5">
                        <span class="lbl-green">割引設定</span>

                        <p class="mgn-t-2">※ 金額が請求額より大きい場合、対象の月の請求を0円としますが、余った割引分は持ち越しません。</p>
                        @include('admin.paymentIndication.discount')
                      </div>

                      <div class="history mgn-t-8">
                        <span class="lbl-green">支払い履歴dfdfdfdf</span>
                        <div class="display-inline--flex width-full mgn-t-2">
                          <p >※ 金額が請求額より大きい場合、対象の月の請求を0円としますが、余った割引分は持ち越しません。</p>
                          <p class="mgn-l-ato">表示は税込み</p>
                        </div>
                        @include('admin.paymentIndication._c-history')
                      </div>

                    </div>
                  </div>

                </div>
                <div class="result-tabs" x-show="$store.tabs.current == '3'">
                  <div class="history">
                    @include('admin.paymentIndication.history')
                  </div>
                </div>
                <div class="result-tabs" x-show="$store.tabs.current == '4'">
                  <div class="site">
                    @include('admin.paymentIndication.site')

                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>


  @endslot
@endcomponent
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.store('tabs', {
        current: '1',
        items: [
          {
            label: '1',
            description: 'アカウント',
            class: '',
          },

          {
            label: '2',
            description: 'プラン・支払い',
            class: 'mgn-l-5',
          },

          {
            label: '3',
            description: '対応履歴',
            class: 'mgn-l-5',
          },

          {
            label: '4',
            description: '利用サイト',
            class: 'mgn-l-5',
          },

        ],
      })
    })
  </script>
@endsection

