@extends('store.layouts.layout-store-home')
@section('title', $title ?? '物件流通サイト（情報取得）設定')
@section('content')
  @component('admin.component._p-index')
    @slot('body')
      {{--  <div class="index-title mgn-l-15">
        <h2>物件流通サイト（情報取得）設定</h2>
      </div>  --}}
      <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="store-title">物件流通サイト（情報取得）設定</span>
    </div>
      <div class="c-main-box active-cont">
        <div class="c-main-body">
          <div class="c-contianer-box">
            <div class="box-description">
              <div class="box-title">
                <p>ユーザー別ログイン設定</p>
                <p>物件流通サイトに、どのIDでログインさせるかを設定してください。</p>
                <p>なお下記に表示されない物件流通サイトに接続したい場合は、管理者にご相談ください。</p>
              </div>
            </div>
            <div class="box-data">
              <div class="container_item user_status">
                <div class="heading">
                  <h3 class="margin-bottom--60">
                    新規一次店登録 ※必須
                  </h3>
                </div>
                @php($dist = config('const.distributions'))
                <div class="c-list-tbl width-full">
                    <table >
                        
                      
                          <tr>
                            @foreach ($distributions as  $key => $item)
                                <th>{{ $key }}</th>
                            @endforeach
                            
                          </tr>
                          
                            <tbody class="p-table__data">
                              {{-- <tr> --}}
                                  
                                  
                                  {{-- @foreach($accounts2 as $indexs => $item)
                                  
                                  
                                    @if($item->site_id == 0 || $item->site_id == 1 || $item->site_id == 2 || $item->site_id == 3 || $item->site_id == 4 || $item->site_id == 5)
                                      @foreach($selected as $site_selected)
                                        
                                          @if($site_selected->site_id == $item->site_id)
                                          <td style="padding: 0px; ">
                                            <div class="display-inline--flex width-full distribution">
                                              <div class="left">
                                                <span class="text-align-center">{{ $user[0]['first_name'] }}</span>
                                              </div>
                                              <div class="right">
                                                <span class="text-align-center-2">{{ $site_selected->login_id }} </span>
                                              </div>
                                            
                                              
                                            </div>
                                          </td>
                                            
                                            @elseif($key == $item->site_id)  
                                              <td>  
                                                <div class="c-input c-input--full-3">
                                                    <input type="email" name="password" placeholder="" value="クリックで選択">
                                                </div>
                                              </td>
                                          @endif
                                        
                                      @endforeach
                                      
                                    @endif   --}}
                                    {{-- @if($item->site_id == 1)
                                      <td class="td_border_enable">
                                        
                                        <div class="c-input c-input--full-3">
                                            <input type="email" name="password" placeholder="" value="クリックで選択">
                                        </div>
                                      
                                      </td>
                                    @endif  
                                    @if($item->site_id == 2)
                                      <td class="td_border_enable">
                                        
                                        <div class="c-input c-input--full-3">
                                            <input type="email" name="password" placeholder="" value="クリックで選択">
                                        </div>
                                      
                                      </td>
                                    @endif  
                                    @if($item->site_id == 3)
                                      <td class="td_border_enable">
                                        
                                        <div class="c-input c-input--full-3">
                                            <input type="email" name="password" placeholder="" value="クリックで選択">
                                        </div>
                                      
                                      </td>
                                    @endif  
                                    @if($item->site_id == 4)
                                      <td class="td_border_enable">
                                        
                                        <div class="c-input c-input--full-3">
                                            <input type="email" name="password" placeholder="" value="クリックで選択">
                                        </div>
                                      
                                      </td>
                                    @endif  
                                    @if($item->site_id == 5)
                                      <td class="td_border_enable">
                                        
                                        <div class="c-input c-input--full-3">
                                            <input type="email" name="password" placeholder="" value="クリックで選択">
                                        </div>
                                      
                                      </td>
                                    @endif   --}}
                                      

                                  {{-- @endforeach --}}
                              {{-- </tr> --}}

                             
                                    <tr>
                                      @foreach ($distributions as $key => $item)
                                        {{-- <td>{{ $item['first_name'] }}</td> --}}
                                        {{-- {{ $item['site_id'] }}
                                        {{ $item['account_id'] }} --}}
                                        
                                        @if($item != null)
                                        <td style="padding: 0px; ">
                                          <div class="display-inline--flex width-full distribution">
                                            <div class="left">
                                              <span class="text-align-center">{{ $item['first_name'] }}</span>
                                            </div>
                                             <div class="right">
                                              <span class="text-align-center-2">{{ $item['login_id'] }} </span>
                                             </div>
                                          </div>
                                        </td>
                                        @else
                                        <td>
                                          <div class="c-input c-input--full-3">
                                              <input type="email" name="password" placeholder="" value="クリックで選択">
                                          </div>
                                        </td>
                                        @endif
                                      @endforeach
                                    </tr>
                            
                            </tbody>
                        
                      </table>
                </div>
              </div>
            </div>
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
