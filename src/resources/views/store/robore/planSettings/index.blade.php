@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong>ロボレのプラン設定</span>
    </div>
    <div class="c-main-box active-cont">
        <div class="c-main-body">
          <span class="c-main-font-weight-bold">店舗管理者のみの機能です</span><br/>
          <span class="c-main-label">プランの変更やオプションの変更が行えます。</span>

          <div class="plans-settings margin-top--20">
            <table class="table_plans_adjust">
              <tbody>
                <tr class="plan-header">
                <form method="POST" action="{{ route('storeAdmin.setting.updatePlan')}}">
                    {{ method_field('POST') }}
                    @csrf
                    <input type="hidden" name="_method" value="POST" />
                    <th class="basic_price">プラン名</th>
                    {{--<th class="basic_2 basic_2_adjust">
                      <p class="price_desc">トライアルプラン</p>
                    <div class="trial_price"><span class="price_zero">0</span><span class="price_desc">円/月</span></div>
                    </th>--}}
                    <th class="mid mid_adjust">
                      <p class="price_desc">スタータープラン</p>
                      <div class="trial_price"><span class="price_zero">3,000</span><span class="price_desc">円/月</span></div>
                        <div class="p-login__buttonArea_home">
                          <button type="submit" onclick="return plan()"
                          class="c-button_10 c-button--full_home c-button--thinBlue btn-right-rate {{ $plan_id == 1 ? 'background_color_rate_adjust' : '' }}"
                          name="plans"
                          value="1"
                          {{--  {{ $plan_id >=1 ? 'disabled' : ''}}  --}}
                          >
                            @if( $plan_id == 1 )
                            <span>ご契約中</span>
                            @else
                            <span>選択</span>
                            @endif
                        </button>
                        </div>
                    </th>
                    <th class="high high_adjust">
                      <p class="price_desc price_desc_adjust">ベーシックプラン</p>
                      <div class="trial_price"><span class="price_zero">5,000</span><span class="price_desc">円/月</span></div>
                      <div class="p-login__buttonArea_home">
                        <button type="submit" onclick="return plan()"
                          class="c-button_10 c-button--full_home c-button--thinBlue btn-right-rate {{ $plan_id == 2 ? 'background_color_rate_adjust' : '' }}"
                        name="plans"
                        value="2"
                        {{--  {{ $plan_id >= 2 ? 'disabled' : '' }}  --}}
                        >
                            @if( $plan_id == 2 )
                            <span>ご契約中</span>
                            @else
                            <span>選択</span>
                            @endif
                      </div>
                    </th>
                    {{--<th class="highest highest_border_radius">
                      <p class="price_desc">エンタープライズ</p>
                      <div class="trial_price"><span class="price_zero">15,000</span><span class="price_desc">円/月</span></div>
                      <div class="p-login__buttonArea_home">
                        <button type="submit"
                        class="c-button_10 c-button--full_home c-button--thinBlue btn-right-rate {{ $plan_id == 3 ? 'background_color_rate_adjust' : '' }}"
                        name="plans"
                        value="3"
                         {{ $plan_id >= 3 ? 'disabled' : '' }} 
                        >
                            @if( $plan_id == 3 )
                            <span>ご契約中</span>
                            @else
                            <span>選択</span>
                            @endif
                      </div>
                    </th>--}}
                </form>
                </tr>
                <tr class="box">
                  <td class="td_home_1 txt-alg-l space-btwn">
                    <div>同時検索 流通サイト<sup>※1</sup> </div>
                    <div class="helptip">
                      <img class="img_question " src="../../image/icon/plan_question.svg"/>
                        <span class="helptiptext">ロボレが検索し情報を取得する『物件流通サイト』の数です。</span>
                      </div>
                    </div>
                  </td>
                  {{--<td class="td_white td_border_adjust">1社</td>--}}
                  <td class="td_white td_border_adjust">3社</td>
                  <td class="td_white td_border_adjust">5社</td>
                  {{--<td class="td_white td_border_adjust">全社</td>--}}
                </tr>
                <tr class="box">
                  <td class="td_home_1 txt-alg-l space-btwn">
                    <div>ユーザー数</div>
                    <div class="helptip">
                      <img class="img_question " src="../../image/icon/plan_question.svg"/>
                        <span class="helptiptext">本サービスにログインできるユーザーの数です。 ユーザー別に、物件流通サイトやポータルサイトのIDをセットできます。また同じユーザーで同時に2つ以上のデバイスからのアクセスはできません。</span>
                      </div>
                    </div>
                  </td>
                  {{--<td class="td_white td_border_adjust">1</td>--}}
                  <td class="td_white td_border_adjust">1</td>
                  <td class="td_white td_border_adjust">3</td>
                  {{--<td class="td_white td_border_adjust">10</td>--}}
                </tr>
                <tr class="box box_shadow_adjust">
                  <td class="td_home_1 txt-alg-l space-btwn">
                    <div>ユーザー数追加<sup>※2</sup></div>
                    <div class="helptip">
                      <img class="img_question " src="../../image/icon/plan_question.svg"/>
                        <span class="helptiptext">ユーザー数が足りない場合、追加する事が可能です。</span>
                      </div>
                    </div>
                  </td>
                  {{--<td class="td_white td_border_adjust">—</td>--}}
                  <td class="td_white td_border_adjust">1,000円</td>
                  <td class="td_white td_border_adjust">1,000円</td>
                  {{--<td class="td_white td_border_adjust">1,000円</td>--}}
                </tr>
              </tbody>
            </table>

            <div class="plan_sleep">
              <a href="{{ route('storeAdmin.setting.dormant')}}" class="grn-txt fnt-sz-6 mgn-r-3 mgn-l-2">休眠する</a> <a href="{{ route('storeAdmin.setting.cancel')}}" class="grn-txt fnt-sz-6">解約する</a>
            </div>
          </div>
        </div>
    </div>
  @endslot
@endcomponent
<script>
    // for tabbing top
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tabbing");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }
      function plan() {
        var message = confirm("プランを変更しますか？");
        if (message == true){
            return message;
        }
        else {
            return false;
        } 
      }

</script>
@endsection




{{-- @extends('store.layouts.layout--store')
@section('title', $title ?? 'ロボレのプラン設定')
@section('content')
  @component('admin.component._p-index')
    @slot('title')
      ロボレのプラン設定
    @endslot
    @slot('action')

    @endslot
    @slot('body')
      <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <p>	店舗管理者のみの機能です。</p>
            <p>プランの変更やオプションの変更が行えます。</p>
          </div>
        </div>
        <div class="box-data">
          <div class="container-table margin-top--01">
            <table class="p-table">
              <thead class="p-table__head">
                <tr class="p-table__head__tableRow_2">
                  <th class="table_border">プラン</th>
                  <th class="table_border">トライアル<br/>０円 ／月</th>
                  <th class="table_border">
                    <div class="foot_3"><br/>
                      <div class="p-login__buttonArea">
                          <button type="submit" class="c-button c-button--full c-button--thinBlue">ご連絡</button>
                      </div>
                    </div>
                    <br/>3,000円 ／月</th>
                  <th class="table_border">
                    <div class="foot_3"><br/>
                      <div class="p-login__buttonArea">
                          <button type="submit" class="c-button c-button--full c-button--thinBlue">ご連絡</button>
                      </div>
                    </div><br/>5,000円 ／月</th>
                  <th class="table_border">
                    <div class="foot_3"><br/>
                      <div class="p-login__buttonArea">
                          <button type="submit" class="c-button c-button--full c-button--thinBlue">ご連絡</button>
                      </div>
                    </div><br/>15,000円 ／月</th>
                </tr>
                <tr>
                  <td class="table_border_2">接続可能流通サイト</td>
                  <td class="table_border_2">1社</td>
                  <td class="table_border_2">3社</td>
                  <td class="table_border_2">5社</td>
                  <td class="table_border_2">全社</td>
                </tr>
                <tr>
                  <td class="table_border_2">出稿可能ポータルサイト</td>
                  <td class="table_border_2">1社</td>
                  <td class="table_border_2">1社</td>
                  <td class="table_border_2">3社</td>
                  <td class="table_border_2">全社</td>
                </tr>
                <tr>
                  <td class="table_border_2">店舗用HP 掲載物件数</td>
                  <td class="table_border_2">-</td>
                  <td class="table_border_2">300物件</td>
                  <td class="table_border_2">500物件</td>
                  <td class="table_border_2">1,000物件</td>
                </tr>
                <tr>
                  <td class="table_border_2">掲載物件数追加</td>
                  <td class="table_border_2">-</td>
                  <td class="table_border_2">500円 ／100物件</td>
                  <td class="table_border_2">500円 ／100物件</td>
                  <td class="table_border_2">1,000円 ／1,000物件</td>
                </tr>
                <tr>
                  <td class="table_border_2">ロボレポータル出稿</td>
                  <td class="table_border_2">-</td>
                  <td class="table_border_2">0</td>
                  <td class="table_border_2">0</td>
                  <td class="table_border_2">0</td>
                </tr>
                <tr>
                  <td class="table_border_2">ユーザー数</td>
                  <td class="table_border_2">1</td>
                  <td class="table_border_2">1</td>
                  <td class="table_border_2">3</td>
                  <td class="table_border_2">10</td>
                </tr>
                <tr>
                  <td class="table_border_2">ユーザー数追加</td>
                  <td class="table_border_2">-</td>
                  <td class="table_border_2">1,000円</td>
                  <td class="table_border_2">1,000円</td>
                  <td class="table_border_2">1,000円</td>
                </tr>
              </tbody>
            </table><br/><br/><br/><br/>
          </div>
          <div class="box-data-footer margin-top--01">
            <p>休眠</p>
            <p>解約</p>
          </div>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection --}}
