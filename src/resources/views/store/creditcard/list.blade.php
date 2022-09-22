@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong>クレジットカード</span>
    </div>
    <div class="c-main-box active-cont">
        <div class="c-main-body">
          <div class="c-list-tbl">

            <table>
              <tbody>
                  <tr>
                    <th class="brd-tlr-2">
                      <div class="display-inline--flex width-full">
                        <span class="mgn-t-1">カード番号</span>
                        <div class="sorting mgn-l-ato">
                          <span class="c-icn-polygon-up"></span>
                          <span class="c-icn-polygon-down-active"></span>
                        </div>
                      </div>
                    </th>
                    <th>
                      <div class="display-inline--flex width-full">
                        <span class="mgn-t-1">カードホルダー</span>
                        <div class="sorting mgn-l-ato">
                          <span class="c-icn-polygon-up"></span>
                          <span class="c-icn-polygon-down-active"></span>
                        </div>
                      </div>
                    </th>
                    <th>
                      <div class="display-inline--flex width-full">
                        <span class="mgn-t-1">満期日</span>
                        <div class="sorting mgn-l-ato">
                          <span class="c-icn-polygon-up"></span>
                          <span class="c-icn-polygon-down-active"></span>
                        </div>
                      </div>
                    </th>
                    <th>
                      <div class="display-inline--flex width-full">
                        <span class="mgn-t-1">セキュリティコード</span>
                        <div class="sorting mgn-l-ato">
                          <span class="c-icn-polygon-up"></span>
                          <span class="c-icn-polygon-down-active"></span>
                        </div>
                      </div>
                    </th>
                    <th>
                      <span>アクション</span>
                    </th>
                  </tr>
                  <tr>
                  @foreach ($credit as $item)
                    <tr>
                      <td class="txt-alg-l">
                        <span class="account-txt">
                          {{ $item['card_no'] }}
                        </span>
                      </td>
                      <td >
                        <span class="account-txt">
                          {{$item['card_holder']}}
                        </span>
                      </td>
                      <td >
                        <span class="account-txt">
                          {{$item['expiration_date']}}
                        </span>
                      </td>
                      <td >
                        <span class="account-txt">
                          {{$item['security_code']}}
                        </span>
                      </td>
                      <td class="txt-alg-l ">
                        <div class="display_inline pdg-2">
                            <a type="submit" class="c-button mgn-r-2 c_button_adjust" href="http://localhost:8000/admin/account/edit/10">編集</a>

                          <form action="http://localhost:8000/admin/account/delete" method="POST">
                            <input type="hidden" name="id" value="10">
                            <input type="hidden" name="_token" value="00VAkOTI7iMAYJ4eXldGs0JOCXq45p3YfMmmeyVg">                  <button type="submit" class="c-button c-button--full c-button--account">削除</button>
                          </form>
                        </div>

                      </td>
                    </tr>
                  @endforeach

              </tbody>
            </table>
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

</script>
@endsection
