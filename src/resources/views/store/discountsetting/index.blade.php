@extends('store.layouts.layout--store')
@section('title', $title ?? '割引設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}

    @endslot
    @slot('action')

    @endslot
    @slot('body')
      <div class="c-contianer-box">
        <div class="box-data">
            <table class="p-table">
                <thead class="p-table__head">
                  <tr class="p-table__head__tableRow">
                      <th colspan="2" class="first_header">期間（from）</th>
                      <th>期間（to）</th>
                      <th>割引金額</th>
                      <th>回数</th>
                      <th colspan="2">作成者</th>
                  </tr>
                </thead>
                <tbody class="p-table__data">
                  <tr>
                      <td>
                        <div class="label_right_1">
                            新規割引設定
                        </div>
                       </td>

                      <td>
                        <div class="label_right_3">
                            <div class="c-input c-input--full_15">
                                <input type="email" name="email" placeholder="">
                            </div>
                        </div>
                      </td>
                      <td>
                          <div class="c-input c-input--full_15">
                            <input type="email" name="email" placeholder="">
                          </div>
                        </td>
                      <td>
                          <div class="c-input c-input--full_3">
                            <input type="email" name="email" placeholder="">円
                          </div>
                      </td>
                      <td>
                        {{-- <div class="c-input c-input--radio"> --}}
                            <input id="dd" name="authors" type="radio" value="5" checked="checked">
                            <label for="dd">1回のみ</label>
                            <input id="dd" name="authors" type="radio" value="5" checked="checked">
                            <label for="dd">毎月</label>
                        {{-- </div> --}}
                      </td>
                      <td>
                        <div class="label_right_1">
                            茂木
                        </div>
                        <td>
                            <div class="label_right_3">
                                <div class="p-login__buttonArea">
                                    <button type="submit" class="c-button_3 c-button--full c-button--thinBlue">新規作成</button>
                                </div>
                            </div>
                          </td>
                      </td>
                    </tr>
                </tbody>
              </table>
              <div class="label_table">
                ※　金額が請求額より大きい場合、対象の月の請求を0円としますが、余った割引分は持ち越しません。
              </div><br/>
              <table class="p-table">
                <thead class="p-table__head">
                  <tr class="p-table__head__tableRow">
                      <th>これからの割引</th>
                      <th>2022年12月分</th>
                      <th>～</th>
                      <th>2023年3月分</th>
                      <th>▲100,000円</th>
                      <th>毎月</th>
                      <th>茂木</th>
                      <th>
                        <div class="p-login__buttonArea">
                            <button type="submit" class="c-button_3 c-button--full c-button--thinBlue">修正</button>
                        </div>
                      </th>
                  </tr>
                </thead>
                <tbody class="p-table__data">
                  <tr>
                      <td>
                        終了した割引
                       </td>

                      <td>
                        2022年4月分
                      </td>
                      <td>
                        ～
                      </td>
                      <td>
                        2022年4月分
                      </td>
                      <td>
                        ▲3,000円
                      </td>
                      <td>
                        1回のみ
                      </td>
                      <td>
                        田中
                      </td>
                    </tr>
                  <tr>
                      <td>

                       </td>

                      <td>
                        2022年5月分
                      </td>
                      <td>
                        ～
                      </td>
                      <td>
                        2022年5月分
                      </td>
                      <td>
                        ▲3,000円
                      </td>
                      <td>
                        1回のみ
                      </td>
                      <td>
                        田中
                      </td>
                    </tr>
                </tbody>
              </table>
      </div>
    @endslot
  @endcomponent
@endsection
