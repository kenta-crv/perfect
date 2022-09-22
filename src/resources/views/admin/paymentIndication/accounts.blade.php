
@php
    $array = [
      'chk-lbl' => [
        'レインズ',
        'at BB',
        'いえらぶ',
        'イタンジ',
      ]
    ]
@endphp
<div class="display-inline--flex width-full mgn-t-4">
  <div class="chk-tools">
    <span>設定</span>
    <div class="mgn-t-2">
      @foreach ($array['chk-lbl'] as $key => $item)
        <label class="cnt mgn-t-2">
          <input class="yellow" type="checkbox" id="{{ $key }}" value="1" name="{{ $key }}">
          <span class="checkmark"></span>
          <label for="{{ $key }}">{{ $item }}</label>
        </label>
      @endforeach
    </div>
  </div>
  <div class="accounts-tbl width-full">
    <div class="mgn-l-4">
     <div class="admin-account-tbl overflow-screen-2">
      <table>
        <tr>
          <td class="brd-tlr-2" style="border-top: none;">アカウント</td>
          <td style="border-top: none;">浅見 学</td>
          <td style="border-top: none;">髙宮 萌</td>
          <td style="border-top: none;">佐竹 義之</td>
          <td style="border-top: none;">浅見 学</td>
          <td style="border-top: none;">髙宮 萌</td>
          <td style="border-top: none;">髙宮 萌</td>
          <td style="border-top: none;" class="brd-trr">佐竹 義之</td>
        </tr>
        <tr>
          <td>権限</td>
          <td>admin</td>
          <td>一般</td>
          <td>一般</td>
          <td>admin</td>
          <td>一般</td>
          <td>一般</td>
          <td>一般</td>
        </tr>
      </table><br/>
      <table>
        <tr>
          <td>レインズ</td>
          <td>330426678945</td>
          <td>330426678945</td>
          <td>330426678945</td>
          <td>330426678945</td>
          <td>330426678945</td>
          <td>330426678945</td>
          <td>330426678945</td>
        </tr>
        <tr>
          <td>最終アクセス</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
        </tr>
      </table><br/>
      <table>
        <tr>
          <td>at BB</td>
          <td>000195600004</td>
          <td>000195600004</td>
          <td>000195600004</td>
          <td>000195600004</td>
          <td>000195600004</td>
          <td>000195600004</td>
          <td>000195600004</td>
        </tr>
        <tr>
          <td class="brd-blr-2">最終アクセス</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td>2022年06月01日</td>
          <td class="brd-brr">2022年06月01日</td>
        </tr>
      </table>
     </div>
    </div>
  </div>
</div>
