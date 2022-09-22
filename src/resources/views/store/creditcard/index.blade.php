@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '店舗TOP')
@section('content')

@component('admin.component._p-index')
  @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong>カード情報入力</span>
    </div>
    <div class="c-main-box active-cont">
      <form action="{{ route('storeAdmin.setting.paymentMethod.insertCredit')}}" method="POST">
        @csrf
        <div class="c-main-body">
            <li class="p-list__item p-list__item--center --login">
                <div class="p-list__item__label_2">
                    使えるカード
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input c-input--full">
                    VISA、MasterCard、JCB、AMERICAN EXPRESS、Diners Club、DISCOVER
                  </div>
                </div>
            </li>
            <li class="p-list__item p-list__item--center --login">
                <div class="p-list__item__label_2">
                    カード番号
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input c-input--full">
                    <input class="input--login" type="number" name="card_number" placeholder="">
                  </div>
                  <span class="text-danger"> @error('card_number') {{ $message }}  @enderror </span>
                </div>
            </li>
            <li class="p-list__item p-list__item--center --login">
                <div class="p-list__item__label_2">
                    カードの名義人
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                  <div class="c-input c-input--full">
                    <input class="input--login" type="text" name="card_holder" placeholder="">
                  </div>
                  <span class="text-danger"> @error('card_holder') {{ $message }}  @enderror </span>
                </div>
            </li>
            <li class="p-list__item p-list__item--center --login">
                <div class="p-list__item__label_2">
                    有効期限（月/年）
              </div>
                <div class="l-12__3" style="overflow-wrap: break-word;">
                    <div class="c-input ">
                        <select class="c-icn-select min-wgt-md " name="credit_month" id='select_month_adjust' onchange="show_month(this)">
                          <option value=''>--Select Month--</option>
                            <option selected value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                        <span class="text-danger"> @error('credit_month') {{ $message }}  @enderror </span>
                        <div class="c-lbl mgn-t-2 mgn-l-2">
                          <span>月</span>
                        </div>
                        <div class="mgn-l-20 mgn-t-2">
                          <span>/</span>
                        </div>
                    </div>
                </div>
                <div class="l-12__3" style="overflow-wrap: break-word;">
                  <div class="c-input ">
                    <div class="c-lbl mgn-t-2 mgn-r-2">
                      {{--  <span>20</span>  --}}
                    </div>
                    <select class="c-icn-select min-wgt-md" name="credit_year" id="credit_date_dropdown"></select>
                    <span class="text-danger"> @error('credit_year') {{ $message }}  @enderror </span>
                    <div class="mgn-l-2 mgn-t-2">
                      <span>年</span>
                    </div>
                </div>
              </div>
            </li>
            <li class="p-list__item p-list__item--center --login">
                <div class="p-list__item__label_2">
                    セキュリティコード
                </div>
                <div class="l-12__3" style="overflow-wrap: break-word;">
                  <div class="c-input c-input--full">
                    <input class="input--login" type="number" name="security_code" placeholder="">
                  </div>
                  <span class="text-danger"> @error('security_code') {{ $message }}  @enderror </span>
                </div>
            </li><br>
            <hr class="hr-gray">
            <br>
            <div class="foot_3">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-lbl-white-3">登録</button>
                </div>
            </div>
        </div>
      </form>
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

      let dateDropdown = document.getElementById('credit_date_dropdown');
        let currentYear = new Date().getFullYear();
        let latestYear = 2032;
        while (currentYear <= latestYear) {
          let dateOption = document.createElement('option');
          dateOption.text = currentYear;
          dateOption.value = currentYear;
          dateDropdown.add(dateOption);
          currentYear += 1;
        }

        function show_month(obj) {
          document.getElementById('select_month_adjust').selectedIndex = obj.selectedIndex;
}


</script>
@endsection
