<div class="grn-txt-cont mgn-t-5 mgn-b-2">
  <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
  <div class="a-page-title-2">
    <span>店舗検索</span>
  </div>
</div>
<div class="a-page-title">
  <span><strong style="color: #003a16;"></strong>店舗検索</span>
</div>

<div class="c-main-box padding-0 stepper c-stepper-storeHome active-cont">
  <div class="step-header">
    <div class="step-desc">
      <div class="step-title">
          <span>店舗検索</span>
      </div>
    </div>
    <i class="fa-solid path_138"></i>
  </div>


    <div class="step-body">
      <div class="container_center">
        <div class="l-12 l-12--gap24">
            <div class="l-12__2">
                <div class="c-input c-input--full_3">
                    <input type="text" name="account_id" placeholder="ロボレID" class="input_1" value="{{ $search['account_id'] ?? '' }}">
                </div>
            </div>
            <div class="l-12__2">
                <div class="c-input ">
                    <input type="text" name="account_license" placeholder="免許番号" class="input_1" value="{{ $search['account_license'] ?? '' }}">
                </div>
            </div>
            <div class="l-12__3">
                <div class="c-input ">
                    <input type="text" name="account_company" placeholder="店舗名" class="input_1" value="{{ $search['account_company'] ?? '' }}">
                </div>
            </div>
            <div class="l-12__2">
                <div class="c-input ">
                    <input type="text" name="account_tel" placeholder="電話番号" class="input_1" value="{{ $search['account_tel'] ?? '' }}">
                </div>
            </div>
        </div>
        <div class="l-12 l-12--gap24">
          <div class="l-12__9">
              <div class="c-input ">
                  <input type="text" name="account_address" placeholder="住所"  class="input_1" value="{{ $search['account_address'] ?? '' }}">
              </div>
          </div>
        </div>
        <div class="l-12 l-12--gap24">
            <div class="l-12__1-05 width-full_3">
                <div class="c-input">
                    <input type="text" name="from_date" placeholder="初回登録日" class="input_1 flatpickr" value="{{ $search['from_date'] ?? '' }}">
                    <span class="c-icn--calendar-01"></span>
                </div>
            </div>
            <span class="mgn-t-1">~</span>

            <div class="l-12__1-05 width-full_3">
              <div class="c-input">
                  <input type="text" name="to_date" placeholder="初回登録日" class="input_1 flatpickr" value="{{ $search['to_date'] ?? '' }}">
                  <span class="c-icn--calendar-01"></span>
              </div>
            </div>

            <div class="l-12__1-05 width-full_3">
              <div class="c-input">
                  <input type="text"
                    name="from_updated_at"
                    placeholder="現プラン登録日"
                    class="input_1 flatpickr"
                    value="{{ $search['from_updated_at'] ?? '' }}"
                  >
                  <span class="c-icn--calendar-01"></span>
              </div>
            </div>
            <span class="mgn-t-1 ">~</span>
            <div class="l-12__1-05 width-full_3">
              <div class="c-input ">
                  <input type="text"
                    name="to_updated_at"
                    placeholder="現プラン登録日"
                    class="input_1 flatpickr"
                    value="{{ $search['to_updated_at'] ?? '' }}"
                  >
                  <span class="c-icn--calendar-01"></span>
              </div>
            </div>

            <div class="l-12__1-05 width-full_3">
              <div class="c-input">
                  <input type="text" name="from_access_date"
                    placeholder="最終アクセス日"
                    class="input_1 flatpickr"
                    value="{{ $search['from_access_date'] ?? '' }}"
                  >
                  <span class="c-icn--calendar-01"></span>
              </div>
            </div>
            <span class="mgn-t-1">~</span>

            <div class="l-12__1-05 width-full_3">
              <div class="c-input">
                  <input type="text"
                    name="to_access_date"
                    placeholder="最終アクセス日"
                    class="input_1 flatpickr"
                    value="{{ $search['to_access_date'] ?? ''}}"
                  >
                  <span class="c-icn--calendar-01"></span>
              </div>
            </div>

        </div><br/>
        <div class="l-12 l-12--gap24">
          {{--  <div class="l-12__2 width-full_4-a">
            <label class="cnt">
              トライアル
              <input class="yellow form_category_type" type="checkbox" value="1" name="plans1" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="l-12__2 width-full_4-a">
            <label class="cnt">
              スターター
              <input class="yellow form_category_type" type="checkbox" value="2" name="plans2" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="l-12__2 width-full_4-a">
            <label class="cnt">
              ベーシック
              <input class="yellow form_category_type" type="checkbox" value="3" name="plans3" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="l-12__3 width-full_4-a">
            <label class="cnt">
              エンタープライズ
              <input class="yellow form_category_type" type="checkbox" value="4" name="plans4" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>  --}}
          @for($i=0; $i<4;$i++)
            <div class="width-full_4-a">
              <label class="cnt">
                {{ config('const.ACCOUNT_PLANS')[$i] }}
                <input class="yellow form_category_type" type="checkbox" value="{{ $i }}" name="plans[{{ $i }}]" {{ $plans[$i] ? 'checked' : '' }}>
                <span class="checkmark"></span>
              </label>
            </div>
          @endfor
        </div>
          <br/>
        <div class="l-12 l-12--gap24">
            <div class="l-12__2 width-full_3">
              <select class="keep-slct-01" name="" id="">
                <option value="0">有料・無料すべて</option>
              </select>
            </div>
            <div class="l-12__2 width-full_3">
              <select class="keep-slct-01" name="" id="">
                <option value="0">未払いあり・無しすべて</option>
              </select>
            </div>
            <div class="l-12__2 width-full_3">
              <select class="keep-slct-01" name="" id="">
                <option value="0">ロボレ担当</option>
              </select>
            </div>
            <div class="l-12__2 width-full_3">
              <select class="keep-slct-01" name="" id="">
                <option value="0">初期設定</option>
              </select>
            </div>
        </div>
        <br/>
        <div class="l-12 l-12--gap24">
          <div class="l-12__2 width-full_3">
            <select class="keep-slct-01" name="" id="">
              <option value="0">休眠含まず</option>
            </select>
          </div>
          <div class="l-12__2 width-full_3">
            <select class="keep-slct-01" name="" id="">
              <option value="0">解約含まず</option>
            </select>
          </div>
          <div class="l-12__4 width-full_3">
            <select class="keep-slct-01" name="" id="">
              <option value="0">保存した検索方法を呼び出し</option>
            </select>
          </div>
        </div><br/>
      </div>
      <input type="hidden" name="account_limit">
      <div class="sb-btm sb-btm-center">
        <div class="">
          <div class="search-account-btm-2">
            <button type="submit" class="search_property">
              <span>検索</span>
              <i class="c-icn--magnifying-glass"></i>
            </button>
          </div>

        </div>
        <select class="keep-slct keep-slct-main" name="" id="">
          <option value="0">この検索に名前を付けて保存</option>
        </select>
        <a href="{{route ('admin.notification.new')}}" class="c-lbl-white-01" data-remodal-target="result_search">保存</a>
      </div>
      <br/>
    </div>


</div>
