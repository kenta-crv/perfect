@extends('admin.layout.layout--admin')
@section('title', $title ?? '問い合わせ対応')
@section('content')

@component('admin.component._p-index')
  @slot('body')
  <div class="grn-txt-cont mgn-t-5 mgn-b-2">
    <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span> 
    <div class="a-page-title-2">
      <span>資料請求管理</span>
    </div>
  </div>
  <div class="a-page-title">
    <span><strong style="color: #003a16;"></strong>資料請求一覧</span>
  </div>
  <div class="c-main-box active-cont">
    <div class="c-list-tbl overflow-x">
      <table>
        <tbody>
          <tr>
            <th style="min-width: 131px;">宅建業免許番号</th>
            <th style="min-width: 131px;">会社名・屋号</th>
            <th style="min-width: 101px;">電話番号</th>
            <th style="min-width: 111px;">ご担当者様名</th>
            <th style="min-width: 111px;">メールアドレス</th>
            <th style="min-width: 111px;">ご検討の状態は？</th>
          </tr>
          @foreach($request_informations as $information)
            <tr>
              <td class="notification_table_data">
                {{ $information->license }}
              </td>
              <td class="notification_table_data">
                {{ $information->company_name }}
              </td>
              <td class="notification_table_data">
                {{ $information->tel }}
              </td>
              <td class="notification_table_data">
                {{ $information->last_name . $information->first_name }} 様
              </td>
              <td class="notification_table_data">
                {{ $information->email }}
              </td>
              <td class="notification_table_data">
                @if($information->status1)
                導入を検討している,
                @endif
                @if($information->status2)
                内容を見て、よければ導入する可能性がある,
                @endif
                @if($information->status3)
                情報収集として,
                @endif
                @if($information->status4)
                その他
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
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