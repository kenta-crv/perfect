
@extends('admin.layout.layout--admin')
@section('title', $title ?? '店舗検索')
@section('content')
  @component('admin.component._p-index')
    @slot('body')
    <form method="get" action="{{ route('admin.store.search.index') }}" id="accountsearchform">
    {{--  restriction form  --}}
    @include('admin.store.restriction')
  </form>
    <div class="box-description_credit fnt-wgt-3 fnt-sz-8">
      <span><strong style="color: #003a16;">—</strong> 検索結果</span>
    </div>

    <div class="c-main-box active-cont">
      <form method="post" action="{{ route('admin.store.search.insertStore') }}">
        @csrf
        <div class="c-main-body">
          <div class="pagination-cont-body_store_search">
            <div class="tooltip_container">
              <div class="tooltip_notification">
                <a href="{{ route('admin.notification.index') }}" class="tooltip_button_notification">利用可能店舗のみチェック</a>
              </div>
              <div class="button_beside_tooltip">
              <button type="submit" class="c-lbl-white-01 pst-rel" data-remodal-target="result_search">保存</button>
              </div>
            </div>
            <div class="pagination-cont">
              <div class="pagination mgn-b-01">
                <ul>
                  <li class="page-item " aria-current="page">
                    {{ $accounts->links() }}
                  </li>
                </ul>
              </div>
              <div class="mgn-t-3 mgn-r-5">
                <select class="keep-slct-01 width-75" name="select_limit" id="select_limited">
                  <option value="5" {{ $select_limit == 5 ?  'selected="selected"' : ''}} >5  </option>
                  <option value="10" {{ $select_limit == 10 ?  'selected="selected"' : ''}} >10  </option>
                  <option value="15" {{ $select_limit == 15 ?  'selected="selected"' : ''}} >15  </option>
                </select>
              </div>
              <div class="mpage-desc mgn-t-5">
                <span>件表示 / ページ</span>
              </div>
            </div>
            <div class="admin-btn-cont">
              <div class="admin-btn ">
                <span>全データ CSVダウンロード</span>
              </div>
            <div class="button_beside_tooltip">
            <a href="{{ route('admin.notification.new') }}" class="c-lbl-white-01 pst-rel" data-remodal-target="result_search">保存</a>
            </div>
          </div>

          <div class="c-list-tbl">
            <table>
              <tr>
                <th style="width: 41px;" class="ff">
                  <input type="checkbox" id="checkAll" name="checkAll" value="Bike">
                    <div class="tlt">
                        <div class="box t-tlt-bbl">
                          <div class=" pst-ab">
                            <a href="{{ route('admin.notification.index') }}" class="c-lbl-white-01" data-remodal-target="result_search">利用可能店舗のみチェック</a>
                            <a href="{{route ('admin.notification.new')}}" class="c-lbl-white-01 pst-rel" data-remodal-target="result_search">保存</a>
                          </div>
                        </div>
                    </div>
                </th>
                <th style="width: 81px;">ID▽</th>
                <th style="width: 121px;">プラン▼</th>
                <th style="width: 101px;">免許番号▽</th>
                <th style="width: 176px;">店舗名</th>
                <th style="width: 126px;">電話番号▽</th>
                <th style="width: 91px;">担当者▽</th>
                <th style="width: 126px;">最終更新日▽</th>
                <th style="width: 126px;">プラン登録日▽</th>
                <th style="width: 81px;">有料月▽</th>
                <th style="width: 81px;">未払い▽</th>
                <th style="width: 81px;">R当者▽</th>
                <th style="width: 83px;">代理</th>
              </tr>
              @foreach($accounts as $account)
              <tbody>
                <tr>
                  <td class="ff">
                    <input type="checkbox" class="formCheck" value="{{ $account->id }} " name="store_checked[]">
                  </td>
                  <td>{{ $account->id }}</td>
                  <td>
                    @if($account->plans == 2)
                      プラス 月額　5,000円
                    @endif

                    @if($account->plans == 1)
                    ベーシック 月額　3,000円
                    @endif
                  </td>
                  <td>{{ $account->license }}</td>
                  <td>{{ $account->company_name }}</td>
                  <td>{{ $account->tel }}</td>
                  <td>{{ $account->last_name }}</td>
                  <td>{{ $account->updated_at }}</td>
                  <td>2022年03月14日</td>
                  <td>3</td>
                  <td>9,000 円</td>
                  <td>茂木</td>
                  <td class="pdf-txt"><a href="{{ route('storeAdmin.instead', $account->id) }}" style="font-size:16px;">ログイン</a></td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
          <div class="pagination-cont_bottom">
            <div class="tooltip_container">
              <div class="tooltip_notification_bottom">
                <a href="{{ route('admin.notification.index') }}" class="tooltip_button_notification">利用可能店舗のみチェック</a>
              </div>
              <div class="button_beside_tooltip_bottom">
              <a href="{{route ('admin.notification.new')}}" class="c-lbl-white-01" data-remodal-target="result_search">保存</a>
              </div>
            </div>
            <div class="pagination_bottom_middle">
              <ul>
                <li class="page-item " aria-current="page">
                  {{ $accounts->links() }}
                </li>
              </ul>
            </div>
            <div class="mgn-t-3 mgn-r-5">
              <select class="keep-slct-01 width-75" name="select_limit" id="select_limited">
                <option value="5" {{ $select_limit == 5 ?  'selected="selected"' : ''}} >5  </option>
                <option value="10" {{ $select_limit == 10 ?  'selected="selected"' : ''}} >10  </option>
                <option value="15" {{ $select_limit == 15 ?  'selected="selected"' : ''}} >15  </option>
              </select>
            </div>
            <div class="mpage-desc mgn-t-5">
              <span>件表示 / ページ</span>
            </div>
          </div>
          <div class="admin-btn-cont">
            <div class="admin-btn ">
              <span>全データ CSVダウンロード</span>
            </div>
          </div>
        </div>

        <div class="c-list-tbl">
          <table>
            <tr>
              <th style="width: 41px;" class="ff">
                <input type="checkbox" id="checkAll" name="checkAll" value="Bike">
                  <div class="tlt">
                      <div class="box t-tlt-bbl">
                        <div class=" pst-ab">
                          <a href="{{ route('admin.notification.index') }}" class="c-lbl-white-01" data-remodal-target="result_search">利用可能店舗のみチェック</a>
                          <a href="{{route ('admin.notification.new')}}" class="c-lbl-white-01 pst-rel" data-remodal-target="result_search">保存</a>
                        </div>
                      </div>
                  </div>
              </th>
              <th style="width: 81px;">ID▽</th>
              <th style="width: 121px;">プラン▼</th>
              <th style="width: 101px;">免許番号▽</th>
              <th style="width: 176px;">店舗名</th>
              <th style="width: 126px;">電話番号▽</th>
              <th style="width: 91px;">担当者▽</th>
              <th style="width: 126px;">最終更新日▽</th>
              <th style="width: 126px;">プラン登録日▽</th>
              <th style="width: 81px;">有料月▽</th>
              <th style="width: 81px;">未払い▽</th>
              <th style="width: 81px;">R当者▽</th>
              <th style="width: 83px;">代理</th>
            </tr>
            @foreach($accounts as $account)
            <tbody>
              <tr>
                <td class="ff">
                  <input type="checkbox" class="formCheck" value="Bike">
                </td>
                <td>{{ $account->id }}</td>
                <td>
                  @if($account->plans == 2)
                  ベーシック 月額　5,000円
                  @endif

                  @if($account->plans == 1)
                  スターター 月額　3,000円
                  @endif
                </td>
                <td>{{ $account->license }}</td>
                <td>
                 <a style="font-size: 16px;" href="{{ route('admin.store.search.detail', $account->id) }}">{{ $account->company_name }}</a>
                </td>
                <td>{{ $account->tel }}</td>
                <td>{{ $account->last_name }}</td>
                <td>{{ $account->updated_at }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="pdf-txt">
                  <a style="font-size:16px;" onclick="window.open('{{ route('storeAdmin.instead', $account->id) }}', 'popup' , 'fullscreen= yes')">
                    ログイン
                  </a>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
        <div class="pagination-cont_bottom">
          <div class="tooltip_container">
            <div class="tooltip_notification_bottom">
              <a href="{{ route('admin.notification.index') }}" class="tooltip_button_notification">利用可能店舗のみチェック</a>
            </div>
            <div class="button_beside_tooltip_bottom">
            <a href="{{route ('admin.notification.new')}}" class="c-lbl-white-01" data-remodal-target="result_search">保存</a>
            </div>
          </div>
          <div class="pagination_bottom_middle">
            <ul>
              <li class="page-item " aria-current="page">
                {{ $accounts->links() }}
              </li>
            </ul>
          </div>
        </div>
      </form>
    </div>



      <script>
          $('#select_limited').on('change', function(){
            document.forms["accountsearchform"].submit();
            // var  account_limit = $('select[name=select_limit]').val()
            // alert(account_limit)
            // filterRank(account_limit, '#select_limit')
          })
          $("#checkAll").click(function(){
              $('.formCheck:checkbox').not(this).prop('checked', this.checked);
          });

          $('.pst-rel').on('click',function (){
            var selected = []
            $('input[name="select1[]"]:checked').each(function(){
              selected.push($(this).val())
              // alert('dd')
            })

            $.ajax({
              datatype: 'json',
              type: 'get',
              url: "{{route('admin.notification.getTargetCompany')}}",

              data: {
                input: selected,
              }
            })


          })
      </script>
    @endslot


  @endcomponent

@endsection


