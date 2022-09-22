@extends('admin.layout.layout--admin')
@section('title', $title ?? 'クレカ家賃払管理')
@section('content')
  @component('admin.component._p-index')
    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span> 
      <div class="a-page-title-2">
        <span>クレカ家賃払管理</span>
      </div>
    </div>
    <div class="box-description_credit">
      <div class="box-title box_title_adjust ">
        <p class="decription1_1 ">おもにアイ・シンクレントの家賃保証を目立たせるために設置します。こちらのリストに合致する物件が検索されたら、「要問合)クレカ家賃払」というアイコンが表示されます。</p>
        <p class="decription1_1 ">・クレジットカード普及も目的としているため、大東建託などアイ・スマイル以外のカード払い可能物件もアイコンが表示されることがあります。</p>
      </div>
   </div>
   <div class="a-page-title">
    <span><strong style="color: #003a16;"></strong>クレジットカードで家賃払いができる物件リスト</span>
  </div>
    <div class="c-main-box_creditRent active-cont">
      <div class="c-main-body">
        <div class="c-contianer-box">
          <div class="box-data">
              <div class="box-description">
                  <div class="box-title_creditRent">
                    <p class="decription_1_creditRent">管理会社名のみ、管理会社名+住所のみ、管理会社名～物件名、の3パターンで検索可能です。</p>
                    <p class="decription_1_creditRent">スペースや半・全角、株式会社などは無視して検索しますが、事故を防ぐため基本完全一致で検索するので、場合によっては複数の組み合わせをcsvで登録してください。</p>
                  </div>
              </div>

              <div class="foot_3">
                  <div class="p-login__buttonArea">
                      <button type="submit" class="c-button c-button--full c-button--thinBlue_2_creditRent">店舗が検索した物件にて、条件のマッチする物件を表示</button>
                  </div>
              </div><br/>

              <div class="pagination-cont2-body">
                <div class="admin-btn-creditP1 ">
                  <div class="admin-btn ">
                    <span>CSVアップロードで更新</span>
                  </div>
                </div>
                <div class="pagination-cont">
                  <div class="pagination mgn-b-01">
                    <ul>
                      <li class="page-item disabled" aria-disabled="true" aria-label="« 前">
                        <a class="" aria-hidden="true">
                          <i class="arr-prev"></i>
                        </a>
                      </li>
                      <li class="page-item " aria-current="page">
                        <a class="active  ">1</a>
                      </li>
                      <li class="page-item">
                        <a class="">2</a>
                      </li>
                      <li class="page-item">
                        <a class="">3</a>
                      </li>
                      <li class="page-item">
                        <a class="">4</a>
                      </li>
                      <li class="page-item">
                        <a class="">...</a>
                      </li>
                      <li class="page-item">
                        <a class="">60</a>
                      </li>
                      <li>
                        <a class="" href="http://localhost:8000/store/search/mocklist?id=6f4gmz810qet3pxy&amp;page=2" rel="next" aria-label="次 »">
                          <i class="arr-next"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="mgn-t-3 mgn-r-5">
                    <select class="keep-slct-01 width-75" name="" id="">
                      <option value="0">10  </option>
                    </select>
                  </div>
                  <div class="mpage-desc mgn-t-5">
                    <span>件表示 / ページ</span>
                  </div>
                </div>
                <div class="admin-btn-creditP">
                  <div class="admin-btn ">
                    <span>全データ CSVダウンロード</span>
                  </div>
                </div>
              </div>

              <div class="c-list-tbl">
                  <table>
                        <tr >
                            <th >登録日</th>
                            <th >更新日</th>
                            <th >更新者</th>
                            <th >管理会社名</th>
                            <th >物件住所（市区町村）</th>
                            <th >物件名（棟名）</th>
                        </tr>
                        <tr>
                            <td >2022年03月14日</td>
                            <td >2022年03月14日</td>
                            <td >田中</td>
                            <td >長谷工ライブネット</td>
                            <td >新取手ハイツ</td>
                            <td >新取手ハイツ</td>
                        </tr>
                        <tr>
                            <td >2022年03月14日</td>
                            <td >2022年03月14日</td>
                            <td >田中</td>
                            <td >長谷工ライブネット</td>
                            <td >新取手ハイツ</td>
                            <td >新取手ハイツ</td>
                        </tr>
                        <tr>
                            <td >2022年03月14日</td>
                            <td >2022年03月14日</td>
                            <td >田中</td>
                            <td >長谷工ライブネット</td>
                            <td >新取手ハイツ</td>
                            <td >新取手ハイツ</td>
                        </tr>
                  </table>
                  {{--  <div class="label_center">
                      前へ <　　1　2　3　4　5　6　7　8　9　10　　> 次へ
                  </div>  --}}
              </div>
          </div>
        </div>
      </div>
   </div>

    @endslot
  @endcomponent
@endsection



{{--  @extends('admin.layout.layout--admin')
@section('title', $title ?? '流通サイト（情報取得）設定')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    ホーム　>　クレカ家賃払管理
    @endslot
    @slot('action')

    @endslot
    @slot('body')
    <div class="c-contianer-box">
        <div class="box-data">
            <div class="box-description">
                <div class="box-title">
                  <p class="decription_1">おもにアイ・シンクレントの家賃保証を目立たせるために設置します。こちらのリストに合致する物件が検索されたら、「要問合)クレカ家賃払」というアイコンが表示されます。</p>
                  <p class="decription_1">・クレジットカード普及も目的としているため、大東建託などアイ・スマイル以外のカード払い可能物件もアイコンが表示されることがあります。</p>
                </div>
            </div>
            <div class="container_center">
                <div class="container_box">
                    <span class="store_label">クレジットカードで家賃払いができる物件リスト</span>
                </div>
            </div><br/>
            <div class="box-description">
                <div class="box-title">
                  <p class="decription_1">管理会社名のみ、管理会社名+住所のみ、管理会社名～物件名、の3パターンで検索可能です。)クレカ家賃払」というアイコンが表示されます。</p>
                  <p class="decription_1">スペースや半・全角、株式会社などは無視して検索しますが、事故を防ぐため基本完全一致で検索するので、場合によっては複数の組み合わせをcsvで登録してください。</p>
                </div>
            </div>
            <div class="foot_3">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-button c-button--full c-button--thinBlue_2">店舗が検索した物件にて、条件のマッチする物件を表示</button>
                </div>
            </div><br/><br/>
            <div class="label_left_search">
                CSVアップロードで更新
            </div>
            <div class="label_center">
                前へ <　　1　2　3　4　5　6　7　8　9　10　　> 次へ
            </div>
            <div class="label_right">
                件表示 / ページ
            </div>
            <div class="label_to_right">
                全データ CSVダウンロード
            </div><br/><br/>
            <div class="input_search">
                <table class="p-table">
                    <thead class="p-table__head">
                      <tr class="p-table__head__tableRow_3">
                          <th >登録日</th>
                          <th >更新日</th>
                          <th >更新者</th>
                          <th >管理会社名</th>
                          <th >物件住所（市区町村）</th>
                          <th >物件名（棟名）</th>
                      </tr>
                    </thead>
                    <tbody class="p-table__data">
                      <tr>
                          <td >4/1/2021</td>
                          <td >6/1/2021</td>
                          <td >田中</td>
                          <td >長谷工ライブネット</td>
                          <td >茨城県取手市</td>
                          <td >新取手ハイツ</td>
                      </tr>
                      <tr>
                          <td >4/1/2021</td>
                          <td >6/1/2021</td>
                          <td >田中</td>
                          <td >長谷工ライブネット</td>
                          <td >茨城県柏市</td>
                          <td ></td>
                      </tr>
                      <tr>
                          <td >4/1/2021</td>
                          <td >6/1/2021</td>
                          <td >田中</td>
                          <td >長谷工ライブネット</td>
                          <td ></td>
                          <td ></td>
                      </tr>
                    </tbody>
                </table><br/><br/><br/>
                <div class="label_center">
                    前へ <　　1　2　3　4　5　6　7　8　9　10　　> 次へ
                </div>
            </div>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection  --}}
