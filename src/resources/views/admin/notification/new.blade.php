
@extends('admin.layout.layout--admin')
@section('title', $title ?? '新規お知らせ')
@section('content')
  @component('admin.component._p-index')
    {{-- @slot('title')

    @endslot --}}
    @slot('action')

    @endslot

    @slot('body')
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
      <div class="a-page-title-2 top-link-nav-2">
        <span>お知らせ管理</span>
      </div>
      <div class="a-page-title-2">
        <span>お知らせ管理</span>
      </div>
    </div>
    @if (\Session::has('status'))
    <div class="alert alert_success active-cont">
         {!! \Session::get('status') !!}
    </div>
  @endif
    <div class="c-main-box padding-0 stepper c-stepper-storeHome active-cont">
      <div class="step-header">
        <div class="step-desc">
          <div class="step-title">
              <span>店舗検索</span>
          </div>
        </div>
        <i class="fa-solid path_138"></i>
      </div>
      <form action="{{ route('admin.notification.newNotice') }}" method='POST'>
        @csrf
      <div class="step-body">
        <div class="container_center">
          <div class="data-info mgn-t-3">
            <div class="l-12 l-12 ">
              <div class="l-12__2 text-input__label-02 text-input__label-notification notification_new_adjust">
                <div class="lbl-txt pdg-2">
                  <label class=" " for="">対象店舗</label>
                </div>
              </div>
              <div class="l-12__10 border-btm">
                <div class="mgn-l-1 lbl-txt mgn-t-2 ">  
                  @foreach($company_name as $key => $target_company)
                    @if($key+1 < count($company_name))
                    <label class="display-txt-03">{{ $target_company }},</label>
                      @elseif($key+1 == count($company_name))
                    <label class="display-txt-03">{{ $target_company }}</label>
                    @endif
                  @endforeach
                  {{-- @foreach($company_name as $target_company)
                  <span class="display-txt-03">{{ $target_company }}</span>
                  @endforeach --}}
                </div>
              </div>
            </div>
            <div class="l-12 l-12 border-btm">
              <div class="l-12__2 text-input__label-02 text-input__label-notification">
                <div class="lbl-txt pdg-2">
                  <label class=" " for=""></label>
                </div>
              </div>
              <div class="l-12__10 ">
                <div class="mgn-l-2 lbl-txt lbl__left ">
                  @if(isset($stores))
                  @foreach($accounts as $company)
                      @foreach($stores as $key => $value)
                        {{-- <br/>{{ $value }} --}}
                        @if($company->id == $value)
                          <br/>{{ $company->company_name }}
                          <input type="hidden" name="storesSelect[]" value="{{ $value }}">  
                        @endif
                        
                      @endforeach
                      
                    @endforeach
                    @else
                      <a href="{{ url('admin/store/search') }}" class="notification-store">店舗検索画面に移動し、対象となる店舗を選択する</a>
                  @endif
                 
                </div>
              </div>
            </div>
            <div class="l-12 l-12">
              <div class="l-12__2 text-input__label-02 text-input__label-notification notif ication_new_adjust_bottom">
                <div class="lbl-txt pdg-2">
                  <label class=" " for="">掲載する期間</label>
                </div>
              </div>
              <div class="l-12__10 ">
                <div class="mgn-l-2 lbl-txt lbl__left mgn-2 ">
                  <div class="lbl-txt lbl-main">
                    <div class="c-input">
                      <input type="text" name="date_in" placeholder="初回登録日" class="input_1 flatpickr flatpickr-input " value="" readonly="readonly">
                      <span class="c-icn--calendar-01"></span>
                    </div>
                    <div class="c-input">
                      <input type="text" name="time_in" placeholder="初回登録日" class="input_clock flatpickr flatpickr-input time_picker" value="" readonly="readonly">
                      <span class="c-icn--clock-01"></span>
                    </div>
                    <div class="c-input">
                      <div class="mpage-desc-3 mgn-l-3">
                        <span>~</span>
                      </div>
                    </div>
                    <div class="c-input">
                      <input type="text" name="date_out" placeholder="初回登録日" class="input_1 flatpickr flatpickr-input mgn-l-3" value="" readonly="readonly">
                      <span class="c-icn--calendar-01"></span>
                    </div>
                    <div class="c-input">
                      <input type="text" name="time_out" placeholder="初回登録日" class="input_clock flatpickr flatpickr-input time_picker" value="" readonly="readonly">
                      <span class="c-icn--clock-01"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <div class="data-info mgn-t-3">
            <div class="l-12 l-12 ">
              <div class="l-12__2 text-input__label-02 text-input__label-notification notification_new_adjust">
                <div class="lbl-txt pdg-2">
                  <label class=" " for="">お知らせ内容</label>
                </div>
              </div>
              <div class="l-12__10 border-btm">
                <div class="lbl-txt ">
                  <div class="lbl-txt-3 lbl-main">
                    <div class="c-input">
                      <input type="text" name="date_content" placeholder="表示日付" class="input_1 flatpickr flatpickr-input " value="" readonly="readonly">
                      <span class="c-icn--calendar-01"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="l-12 l-12 ">
              <div class="l-12__2 text-input__label-02 text-input__label-notification notification_new_adjust_bottom">
                <div class="lbl-txt pdg-2">
                  <label class=" " for=""></label>
                </div>
              </div>
              <div class="l-12__10 ">
                  <div class="lbl-txt ">
                    <div class="lbl-txt-3 lbl-main">
                      <div class="c-input-2">
                        <input type="text" name="title" placeholder="タイトル" class="admin-txt-input">
                      </div>
                      <div class="textarea-width mgn-b-2">
                        <textarea row="3" cols="1" class="admin-txt-area" placeholder="内容" name="content"></textarea>
                      </div>
                      <a type="submit" class="notification_new_button">
                        ファイル添付
                      </a>
                      <a type="submit" class="notification_new_button_2">
                        参照
                      </a>
                      <a class="c-icn-add" href="#"></a>
                      <span class="notification-label">ファイル添付を増やす</span>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <br/>
          <div class="data-info mgn-t-3">
            <div class="l-12 l-12 ">
              <div class="l-12__2 text-input__label-02 text-input__label-notification notification_new_adjust">
                <div class="lbl-txt pdg-2">
                  <label class=" " for="">重要フラグ</label>
                </div>
              </div>
              <div class="l-12__10 border-btm">
                <div class="lbl-txt lbl__left ">
                  <div class="lbl-txt-3">
                    <div class="checkbox-border">
                      <label class="cnt">
                        <input class="yellow form_category_type" type="checkbox" id="rains" value="1" name="reins" checked="checked">
                        <span class="checkmark"></span>
                        <label for="reins">ONにすると店舗がログインした際に、最初にお知らせ画面を表示し、OFFの場合は、画面上部にあるお知らせ（ベル）マークのみで通知します。</label>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="l-12 l-12 ">
              <div class="l-12__2 text-input__label-02 text-input__label-notification notification_new_adjust_bottom">
                <div class="lbl-txt lbl__center">
                  <label class=" " for=""></label>
                </div>
              </div>
              <div class="l-12__10 ">
                <div class="lbl-txt lbl__left ">
                  <div class="lbl-txt-3">
                    <div class="radio-btn-notification">
                      <div class="radio-button-1">
                        <input name="mail_flag" type="radio" value="0" /><span class="radio-label-button">店舗管理者のみ</span>
                      </div>
                      <div class="radio-button-2">
                        <input name="mail_flag" type="radio" value="1" /><span class="radio-label-button">店舗全員へ</span>
                      </div>
                      <div class="radio-button-3">
                        <input name="mail_flag" type="radio" value="2" /><span class="radio-label-button">メールはしない。（画面でのお知らせのみ）</span>
                      </div>
                    </div><br/>
                    <span>同じ内容を、登録してある店舗のメールアドレスに送ります</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="cont_notifNew">
            <button type="submit" class="notif_new_btn " href="#">お知らせを作成</button>
          </div>
        </div>
      </div>
      </form>
    </div>
    @endslot
  @endcomponent
@endsection

