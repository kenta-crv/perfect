@extends('store.layouts.layout--store')
@section('title', $title ?? 'ストアサーチ')
@section('content')
@component('admin.component._p-index')
    @slot('title')
    	{{--  <div class="c-image c-image--user"></div>  --}}
        ホーム　>　店舗検索
    @endslot
    @slot('action')

    @endslot
    @slot('body')
      <div class="c-contianer-box">
        <div class="box-data">
            <div class="container_center">
                <div class="container_box">
                    店舗検索
                </div>
                <span class="calendar_icon_2">

                </span>
            </div><br/>
            <div class="l-12 l-12--gap24">
                <div class="l-12__2">
                    <div class="c-input c-input--full_3">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__2">
                    <div class="c-input c-input--full_3">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__3">
                    <div class="c-input c-input--full_3">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__2">
                    <div class="c-input c-input--full_3">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__3">
                    <div class="c-input c-input--full_3">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
            </div><br/>
            <div class="l-12 l-12--gap24 ">
                <div class="l-12__2">
                    <div class="c-input c-input--full_5">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__2">
                    <div class="c-input c-input--full_5">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__2">
                    <div class="c-input c-input--full_5">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__2">
                    <div class="c-input c-input--full_5">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__2">
                    <div class="c-input c-input--full_5">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="l-12__2">
                    <div class="c-input c-input--full_5">
                        <input type="email" name="email" placeholder="">
                    </div>
                </div>
            </div><br/>
            <div class="l-12 l-12--gap16 mgn-t-2">
                <div class="l-12__2 width-full_4">
                    <li class="p-list__item p-list__item--center">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1">トライアル</label><br>
                    </li>
                </div>
                <div class="l-12__2 width-full_4">
                    <li class="p-list__item p-list__item--center">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1">トライアル</label><br>
                    </li>
                </div>
                <div class="l-12__2 width-full_4">
                    <li class="p-list__item p-list__item--center">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1">トライアル</label><br>
                    </li>
                </div>
                <div class="l-12__2 width-full_4">
                    <li class="p-list__item p-list__item--center">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1">トライアル</label><br>
                    </li>
                </div>
                <div class="l-12__2 width-full_3">
                    <li class="p-list__item p-list__item--center">
                        <div class="c-input c-input--select c-input--select__iconSelect_3 c-input--icon">
                            <select name="event_id">
                                <option value="0">未払いあり・無しすべて</option>
                            </select>
                            {{-- <span class="select_icon_settings">

                            </span> --}}
                        </div>
                    </li>
                </div>
                <div class="l-12__2 width-full_3">
                    <li class="p-list__item p-list__item--center">
                        <div class="c-input c-input--select c-input--select__iconSelect_3 c-input--icon">
                            <select name="event_id">
                                <option value="0">未払いあり・無しすべて</option>
                            </select>
                            {{-- <span class="select_icon_settings">

                            </span> --}}
                        </div>
                    </li>
                </div>
                <div class="l-12__2 width-full_3">
                    <li class="p-list__item p-list__item--center">
                        <div class="c-input c-input--select c-input--select__iconSelect_3 c-input--icon">
                            <select name="event_id">
                                <option value="0">保存した検索方法を呼び出し</option>
                            </select>
                            {{-- <span class="select_icon_settings">

                            </span> --}}
                        </div>
                    </li>
                </div>

            </div>
            <div class="l-12 l-12--gap10 mgn-t-3">
                <div class="l-12__3 width-full_3">
                    <li class="p-list__item p-list__item--center">
                        <div class="c-input c-input--select c-input--select__iconSelect_4 c-input--icon">
                            <select name="event_id">
                                <option value="0">ロボレ担当</option>
                            </select>
                            {{-- <span class="select_icon_settings">

                            </span> --}}
                        </div>
                    </li>
                </div>
                <div class="l-12__3 width-full_3">
                    <li class="p-list__item p-list__item--center">
                        <div class="c-input c-input--select c-input--select__iconSelect_4 c-input--icon">
                            <select name="event_id">
                                <option value="0">初期設定</option>
                            </select>
                            {{-- <span class="select_icon_settings">

                            </span> --}}
                        </div>
                    </li>
                </div>
                <div class="l-12__3 width-full_3">
                    <li class="p-list__item p-list__item--center">
                        <div class="c-input c-input--select c-input--select__iconSelect_4 c-input--icon">
                            <select name="event_id">
                                <option value="0">店舗用HP利用</option>
                            </select>
                            {{-- <span class="select_icon_settings">

                            </span> --}}
                        </div>
                    </li>
                </div>

            </div>
            <br/><br/>
            <div class="foot_3">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-button c-button--full c-button--thinBlue">検索</button>
                </div>
            </div><br/>
            <div class="p-login__buttonArea_2">
                <button type="submit" class="c-button c-button--full c-button--thinBlue">保存</button>
            </div>
            <div class="container_center">
                <div class="container_box">
                    検索結果
                </div>
            </div>
            <div class="label_left_search">
                ↓ 選択した店舗にお知らせ
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
            <table class="p-table">
                <thead class="p-table__head">
                  <tr class="p-table__head__tableRow_2">
                    <th class="table_border">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                    </th>
                    <th class="table_border">ID▽</th>
                    <th class="table_border">プラン▼</th>
                    <th class="table_border">免許番号▽</th>
                    <th class="table_border">店舗名</th>
                    <th class="table_border">電話番号▽</th>
                    <th class="table_border">担当者▽</th>
                    <th class="table_border">最終更新日▽</th>
                    <th class="table_border">プラン登録日▽</th>
                    <th class="table_border">有料月▽</th>
                    <th class="table_border">未払い▽</th>
                    <th class="table_border">R当者▽</th>
                    <th class="table_border">代理</th>
                  </tr>
                </thead>
                <tbody class="p-table__data">
                  <tr>
                    <td class="table_border_2"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                    <td class="table_border_2">R123456</td>
                    <td class="table_border_2">ベーシック</td>
                    <td class="table_border_2">62152</td>
                    <td class="table_border_2">有限会社　ミキハウジング</td>
                    <td class="table_border_2">042-667-8945</td>
                    <td class="table_border_2">矢野様</td>
                    <td class="table_border_2">6/12/2022</td>
                    <td class="table_border_2">3/14/2022</td>
                    <td class="table_border_2">3</td>
                    <td class="table_border_2">9,000 円</td>
                    <td class="table_border_2">茂木</td>
                    <td class="table_border_2">ログイン</td>
                  </tr>
                  <tr>
                    <td class="table_border_2"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                    <td class="table_border_2">R111111</td>
                    <td class="table_border_2">スターター</td>
                    <td class="table_border_2">54321</td>
                    <td class="table_border_2">株式会社　アスケイト</td>
                    <td class="table_border_2">03-2222-1111</td>
                    <td class="table_border_2">佐竹様</td>
                    <td class="table_border_2">1/13/2022</td>
                    <td class="table_border_2">1/13/2022</td>
                    <td class="table_border_2">4</td>
                    <td class="table_border_2"></td>
                    <td class="table_border_2">茂木</td>
                    <td class="table_border_2">ログイン</td>
                  </tr>
                  <tr>
                    <td class="table_border_2"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                    <td class="table_border_2">R654321</td>
                    <td class="table_border_2">トライアル</td>
                    <td class="table_border_2">11111</td>
                    <td class="table_border_2">プレンティー　株式会社</td>
                    <td class="table_border_2">090-1111-2222</td>
                    <td class="table_border_2">鈴木様</td>
                    <td class="table_border_2">5/2/2022</td>
                    <td class="table_border_2">3/20/2022</td>
                    <td class="table_border_2">0</td>
                    <td class="table_border_2"></td>
                    <td class="table_border_2">茂木</td>
                    <td class="table_border_2">ログイン</td>
                  </tr>
                </tbody>
              </table><br/><br/><br/><br/>
              <div class="label_center">
                前へ <　　1　2　3　4　5　6　7　8　9　10　　> 次へ
            </div>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection
