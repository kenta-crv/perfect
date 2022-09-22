
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
@section('title', $title ?? 'TOPダッシュボード')
@section('content')

@component('admin.component._p-index')
@slot('body')
<div class="grn-txt-cont mgn-t-5 mgn-b-2">
  <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
  <div class="a-page-title-2 top-link-nav-4">
    <span>店舗検索</span>
  </div>
  <div class="a-page-title-2">
    <span>店舗検索</span>
  </div>
</div>
<div class="a-page-title">
  <span class="title__t2"><strong>—</strong> 店舗詳細</span>
</div>
<div class="c-main-box active-cont">
    <div class="c-main-body">
      <div class="data-info">
        <div class="l-12 l-12 border-btm">
          <div class="l-12__1 text-input__label-02">
            <div class="lbl-txt lbl__center">
              <label class="fnt-wgt-4" for="">ID</label>
            </div>
          </div>
          <div class="l-12__1 ">
            <div class="lbl-txt lbl__center">
              <label class="" for="">{{ $storeDetails->id }}</label>
            </div>
          </div>
          <div class="l-12__1 text-input__label-02">
            <div class="lbl-txt lbl__center">
            <label class="fnt-wgt-4" for="">プラン</label>
            </div>
          </div>
          <div class="l-12__1 ">
            <div class="lbl-txt lbl__center">
              @if($storeDetails->plans == 0)
              <label class="" for="">トライアル</label>
              @elseif($storeDetails->plans == 1)
              <label class="" for="">スターター</label>
              @elseif($storeDetails->plans == 2)
              <label class="" for="">ベーシック</label>
              @else
              <label class="" for="">エンタープライズ</label>
              @endif
            </div>
          </div>
          <div class="l-12__1 text-input__label-02">
            <div class="lbl-txt lbl__center">
              <label class="fnt-wgt-4" for="">初回登録日</label>
            </div>
          </div>
          <div class="l-12__1 ">
            <div class="lbl-txt lbl__center ">
              <label class="" for="">{{ date('Y年m月d日', strtotime($storeDetails->created_at)) }}</label>
            </div>
          </div>
          <div class="l-12__1 text-input__label-02">
            <div class="lbl-txt lbl__center">
            <label class="fnt-wgt-4" for="">現プラン登録日</label>
            </div>
          </div>
          <div class="l-12__1 ">
            <div class="lbl-txt lbl__center">
              <label class="" for="">{{ date('Y年m月d日', strtotime($storeDetails->created_at)) }}</label>
            </div>
          </div>
          <div class="l-12__1 text-input__label-02">
            <div class="lbl-txt lbl__center">
              <label class="fnt-wgt-4" for="">ロボレ担当</label>
            </div>
          </div>
          <div class="l-12__1 ">
            <div class="lbl-txt lbl__center lbl_modified">
              <label class="" for="">茂木 利勝</label>
            </div>
          </div>

        </div>
        <div class="l-12 l-12 border-btm">

          <div class="l-12__1 text-input__label-02">
            <div class="lbl-txt lbl__center">
            <label class="fnt-wgt-4" for="">有料支払い月</label>
            </div>
          </div>
          <div class="l-12__1 ">
            <div class="lbl-txt lbl__center">
              <label class="" for="">3</label>
            </div>
          </div>
          <div class="l-12__1 text-input__label-02">
            <div class="lbl-txt lbl__center">
            <label class="fnt-wgt-4" for="">未払い</label>
            </div>
          </div>
          <div class="l-12__1 ">
            <div class="lbl-txt lbl__center">
              <label class="" for="">9,000 円</label>
            </div>
          </div>
        </div>
        <div class="l-12 l-12 ">
          <div class="l-12__1 text-input__label-02">
            <div class="lbl-txt lbl__center">
              <label class="fnt-wgt-4" for="">備考</label>
            </div>
          </div>
          <div class="l-12__11 ">
            <div class="lbl-txt  lbl_modified mgn-l-3 mgn-t-3 mgn-b-3 ">
              <p>立上時に協力いただいているため、有料だが何かあれば優遇対応してください。</p>
              <p>原則、プランやアクアンとの変更は、ロボレ側で対応すること。</p>
            </div>
          </div>

        </div>
      </div>

      <div class="data-info mgn-t-3">
        <div class="l-12 l-12 border-btm">
          <div class="l-12__2 text-input__label-02">
            <div class="lbl-txt lbl__center">
              <label class="fnt-wgt-4" for="">免許番号</label>
            </div>
          </div>
          <div class="l-12__2 ">
            <div class="mgn-l-2 lbl-txt lbl__left ">
              <label class="" for="">{{ $storeDetails->license }}</label>
            </div>
          </div>

          <div class="l-12__2 text-input__label-02">
            <div class="mgn-l-2 lbl-txt lbl__left">
              <label class="fnt-wgt-4" for="">ご担当者様</label>
            </div>
          </div>
          <div class="l-12__2 ">
            <div class="mgn-l-2 lbl-txt lbl__left ">
              <label class="" for="">{{ $storeDetails->last_name }} {{ $storeDetails->first_name }}</label>
            </div>
          </div>

          <div class="l-12__2 text-input__label-02">
            <div class="mgn-l-2 lbl-txt lbl__left">
              <label class="fnt-wgt-4" for="">電話番号</label>
            </div>
          </div>
          <div class="l-12__2 ">
            <div class="mgn-l-2 lbl-txt lbl__left ">
              <label class="" for="">{{ $storeDetails->tel }}</label>
            </div>
          </div>

        </div>
        <div class="l-12 l-12 border-btm">
          <div class="l-12__2 text-input__label-02">
            <div class="lbl-txt lbl__center">
            <label class="fnt-wgt-4" for="">店舗名</label>
            </div>
          </div>
          <div class="l-12__6 mgn-t-2">
            <div class="lbl-txt mgn-l-2 lbl-txt lbl__left">
              <label class="" for="">{{ $storeDetails->company_name }}</label>
            </div>
          </div>
          <div class="l-12__2 text-input__label-02">
            <div class="mgn-l-2 lbl-txt lbl__left">
            <label class="fnt-wgt-4" for="">メールアドレス</label>
            </div>
          </div>
          <div class="l-12__2 ">
            <div class="mgn-l-2 lbl-txt lbl__left lbl_modified">
              <label class="" for="">{{ $storeDetails->email }}</label>
            </div>
          </div>
        </div>
        <div class="l-12 l-12 border-btm">
          <div class="l-12__2 text-input__label-02">
            <div class="lbl-txt lbl__center">
            <label class="fnt-wgt-4" for="">表示名</label>
            </div>
          </div>
          <div class="l-12__6 mgn-t-2">
            <div class="mgn-l-2 lbl-txt lbl__left lbl_modified">
              <label class="" for="">{{ $storeDetails->company_name }}</label>
            </div>
          </div>
          <div class="l-12__2 text-input__label-02">
            <div class="mgn-l-2 lbl-txt lbl__left">
            <label class="fnt-wgt-4" for="">電話番号追加1</label>
            </div>
          </div>
          <div class="l-12__2 ">
            <div class="mgn-l-2 lbl-txt lbl__left lbl_modified">
              <label class="" for="">{{ $storeDetails->contract_number }}</label>
            </div>
          </div>
        </div>
        <div class="l-12 l-12 border-btm">
          <div class="l-12__2 text-input__label-02">
            <div class="lbl-txt lbl__center">
            <label class="fnt-wgt-4" for="">住所</label>
            </div>
          </div>
          <div class="l-12__6 mgn-t-2">
            <div class="mgn-l-2 lbl-txt lbl__left">
              <label class="" for="">{{ $storeDetails->address }}</label>
            </div>
          </div>
          <div class="l-12__2 text-input__label-02">
            <div class="mgn-l-2 lbl-txt lbl__left">
              <label class="fnt-wgt-4" for="">電話番号追加2</label>
            </div>
          </div>
          <div class="l-12__2 ">
            <div class="lbl-txt">

            </div>
          </div>
        </div>
        <div class="l-12 l-12 ">
          <div class="l-12__2 text-input__label-02">
            <div class="lbl-txt lbl__center">
            <label class="fnt-wgt-4" for="">電話備考</label>
            </div>
          </div>
          <div class="l-12__10 mgn-t-2">
            <div class="mgn-l-2 lbl-txt lbl__left lbl_modified">
              <label class="" for="">昼間は1の方に電話。堂本さんがメイン</label>
            </div>
          </div>
        </div>
      </div>

      <div class="c-main-box-tabs" x-data>
        <div>
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
          <div class="right2__label2">
            @if(!empty($state))
            <label for=""><a href="{{url('admin/restarting/restartAdminConfirm/'. $storeDetails->id)}}">再開する</a></label>
            @else
            <label for=""><a href="{{url('admin/dormant/'. $storeDetails->id)}}">休眠</a></label>
            @endif
            <label for=""><a href="{{url('admin/cancel/'. $storeDetails->id)}}">退会</a></label>
          </div>
        </div>
          <div class="result">
            <div class="result-tabs" x-show="$store.tabs.current == '1'">
              <div class="head">
                <span>プラン：ベーシック</span>
                <span class="mgn-l-8">アカウント数：15</span>
              </div>

              <div class="accounts">
                @include('admin.paymentIndication.accounts')
              </div>
            </div>
            <div class="result-tabs" x-show="$store.tabs.current == '2'">
              <div class="billing-info">
                <div class="head">
                    <label for="">プラン：</label>
                    <span>口座振替</span>

                    <label class="mgn-l-5" for="">プラン：</label>
                    <span>口座振替</span>
                </div>
                <div class="body mgn-t-5">
                  <div class="l-12 l-12--gap24">
                    <div class="l-12__6" >
                      <span class="lbl-green_gt_detail">前回請求分</span>

                      @include('admin.paymentIndication.plans')
                    </div>
                    <div  class="l-12__6">
                      <span class="lbl-green_gt_detail">次回請求分</span>

                      @include('admin.paymentIndication.plans')

                    </div>
                  </div>
                  <div class="body mgn-t-5">
                    @include('admin.paymentIndication.discount_settings')
                  </div>
                  <div class="discount mgn-t-5">
                    <span class="lbl-green_gt_detail">割引設定</span>

                    <p class="mgn-t-2">※ 金額が請求額より大きい場合、対象の月の請求を0円としますが、余った割引分は持ち越しません。</p>
                    @include('admin.paymentIndication.discount')
                  </div>

                  <div class="history mgn-t-8">
                    <span class="lbl-green_gt_detail">支払い履歴</span>
                    <div class="display-inline--flex width-full mgn-t-2">
                      <p class='p_c_history_detail'>※ 入金があった場合は自動で反映しますが、反映されない場合は「債権管理」から消込を行ってください</p>
                      <p class="mgn-l-ato p_c_history_detail">表示は税込み</p>
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
    });
  })
</script>

<script>
  document.addEventListener('alpine:init', () => {
      Alpine.data('modal', () => ({
          open: false,
          modal2: false,

          toggle() {
              this.open = ! this.open
          },

          nextModal() {
            this.modal2 = ! this.modal2
            this.toggle()
          },
      }))
  })
</script>
@endsection

