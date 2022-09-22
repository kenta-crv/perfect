@extends('store.layouts.layout--store')
@section('title', $title ?? 'マイページ')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	 <div class="c-image c-image--user"></div>
        マイページ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="c-button c-button--full c-button--thinBlue">編集</button>
    @endslot
    @slot('action')

    @endslot
    @slot('body')
      <div class="c-contianer-box">
        <div class="box-description">
          <div class="box-title">
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>会社名・屋号 *
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio_2">
                            アスケイト　本部
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>住所 *
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio_2">
                            東京都品川区XXXX
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>電話番号 *
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio_2">
                            03-XXXX-XXXX
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li>
            <li class="p-list__item">
                <div class="p-list__item__label">
                  <span></span>登録者情報
                </div>
                <div class="p-list__item__data">
                  <div class="l-12 l-12--gap8">
                    <div class="c-input c-input--full">
                      <div class="l-12__6">
                        <div class="c-input c-input--radio">
                            <button type="submit" class="c-button c-button--full c-button--thinBlue">編集</button>
                        </div>
                      </div>
                      <span class="unit_min"></span>
                    </div>
                  </div>
                </div>
              </li><br/>
              <div class="foot_3">
                <table class="p-table">
                    <thead class="p-table__head">
                      <tr class="p-table__head__tableRow">
                          <th colspan="2">お名前</th>
                          <th>メールアドレス</th>
                          <th>ログインID</th>
                          <th>ログインPW</th>
                      </tr>
                    </thead>
                    <tbody class="p-table__data">
                      <tr>
                          <td>
                            <div class="label_right_1">
                                本部代表者
                            </div>
                           </td>

                          <td>
                            <div class="label_right_3">
                                本部代表者
                            </div>
                          </td>
                          <td>本部代表者</td>
                          <td>本部代表者</td>
                          <td>本部代表者</td>
                      </tr>
                      <tr>
                            <td>
                                <div class="label_right_1">
                                    メール通知先
                                </div>
                           </td>
                          <td>
                            <div class="label_right_3">
                                本部代表者
                            </div>
                          </td>
                          <td>本部代表者</td>
                          <td>本部代表者</td>
                          <td>本部代表者</td>
                      </tr>
                      <tr>
                        <td>
                            <div class="label_right_1">
                                メール通知先
                            </div>
                       </td>
                        <td>
                          <div class="label_right_3">
                              本部代表者
                          </div>
                        </td>
                          <td>本部代表者</td>
                          <td>本部代表者</td>
                          <td>本部代表者</td>
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
