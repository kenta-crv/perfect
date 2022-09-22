@extends('admin.layout.layout--admin')
@section('title', $title ?? '問い合わせ対応')
@section('content')

@component('admin.component._p-index')
  @slot('body')
  <div class="grn-txt-cont mgn-t-5 mgn-b-2">
    <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span> 
    <div class="a-page-title-2">
      <span>HPからのお問い合わせ管理</span>
    </div>
  </div>
  <div class="a-page-title">
    <span><strong style="color: #003a16;"></strong> HPからのお問い合わせ一覧</span>
  </div>
  <div class="c-main-box active-cont">
    <div class="c-list-tbl overflow-x">
      <table>
        <tbody>
          <tr>
            <th style="min-width: 131px;">会社名・屋号</th>
            <th style="min-width: 101px;">電話番号</th>
            <th style="min-width: 91px;">都道府県</th>
            <th style="min-width: 111px;">ご担当者様名</th>
            <th style="min-width: 111px;">メールアドレス</th>
            <th style="min-width: 241px;">お問い合わせ内容</th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
              <td class="notification_table_data">
                {{ $contact->company_name }}
              </td>
              <td class="notification_table_data">
                {{ $contact->tel }}
              </td>
              <td class="notification_table_data">
                {{ $contact->prefecture }}
              </td>
              <td class="notification_table_data">
                {{ $contact->last_name . $contact->first_name }} 様
              </td>
              <td class="notification_table_data">
                {{ $contact->email }}
              </td>
              <td class="notification_table_data">
                {{ $contact->body }}
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