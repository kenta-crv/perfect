<div class="c-contianer-box" >

  <div class="box-description">
    <div class="box-title">
      <p>	物件情報を、ポータルサイトだけでなく店舗用のホームページに掲載することで、追加費用をかけることなく集客ができる可能性があります。</p>
      <p>また、店舗ホームページに物件情報を掲載したら、自動で無償でロボレポータルサイトにも掲載されます。</p>
    </div>
  </div>
  <div class="box-data">
    <div class="container_item user_status">
      <div class="heading">
        <h3 class="margin-bottom--60">
          新規一次店登録 ※必須
        </h3>
      </div>
      <div class="container-body margin-top--35">
          <div class="l-12 l-12--gap24">
              <div class="l-12__10 width-full">
                <ul class="p-list ">
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      店舗ホームページ機能を使う
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <label class="switch">
                          <input type="checkbox" checked>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </li>
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      会社概要ページを作る
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <label class="switch">
                          <input type="checkbox" checked>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </li>
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      店舗ホームページURL
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <P>http://xxx.robore.jp/</P>
                      </div>
                    </div>
                  </li>
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      掲載物件が無い場合、アラートメールを送る
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <label class="switch">
                          <input type="checkbox" checked>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </li>
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      掲載物件数上限
                    </div>
                    <div x-data class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" wire:model="no_listed_properties" placeholder="">
                      </div>
                      <span class="text-danger"> @error('no_listed_properties') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      宅建業免許番号
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" wire:model="hb_license_no" placeholder="">
                      </div>
                      <span class="text-danger"> @error('hb_license_no') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      会社名
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" wire:model='company_name' placeholder="">
                      </div>
                      <span class="text-danger"> @error('company_name') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      〒 郵便番号
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" wire:model="postal_code" placeholder="">
                      </div>
                      <span class="text-danger"> @error('postal_code') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="inline__display p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      住所
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" wire:model='address' placeholder="">
                      </div>
                      <span class="text-danger"> @error('address') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      問合せ用メールアドレス
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <div class="margin-space--1 c-width-90">
                          <label class="switch ">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                          </label>
                        </div>
                        <input type="text" wire:model='email' placeholder="">
                      </div>
                      <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      問合せ用電話番号
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" wire:model='contact_no' placeholder="">
                      </div>
                      <span class="text-danger"> @error('contact_no') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      問合せ用LINE ID
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <div class="margin-space--1 c-width-90">
                          <label class="switch ">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                          </label>
                        </div>
                        <input type="text" wire:model='line_id' placeholder="">
                      </div>
                      <span class="text-danger"> @error('line_id') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      FAX番号
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" wire:model='fax_no' placeholder="">
                      </div>
                      <span class="text-danger"> @error('fax_no') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      免許番号
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <input type="text" name="company_name" placeholder="">
                      </div>
                      <span class="text-danger"> @error('company_name') {{ $message }} @enderror </span>
                    </div>
                  </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      登録会員
                    </div>
                    <label class="switch margin-bottom-auto margin-space--1">
                      <input type="checkbox" checked="">
                      <span class="slider round"></span>
                    </label>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="l-12 l-12--gap24 ">
                        <div class="l-12__6 padding-left--30 padding-top--5">
                          <div class="inline__display padding-03 ">
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label class="margin-left--10" for="vehicle1"> 全国宅地建物取引業協会連合会</label>
                          </div>
                          <div class="inline__display padding-03">
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label class="margin-left--10" for="vehicle1"> 不動産流通経営協会</label>
                          </div>
                          <div class="inline__display padding-03">
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label class="margin-left--10" for="vehicle1"> 全国宅地建物取引業保証協会</label>
                          </div>
                        </div>
                        <div class="l-12__6 padding-left--30 padding-top--5">
                          <div class="inline__display padding-03">
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label class="margin-left--10" for="vehicle1"> 優待サービス</label>
                          </div>
                          <div class="inline__display padding-03">
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label class="margin-left--10" for="vehicle1"> 全日本不動産協会</label>
                          </div>
                          <div class="inline__display padding-03">
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label class="margin-left--10" for="vehicle1"> 全日本不動産協会</label>
                          </div>
                        </div>
                      </div><br/>
                      <div class="c-input c-input--full">
                        <textarea wire:model='registered_members'   placeholder=""></textarea>
                      </div>
                      <span class="text-danger"> @error('registered_members') {{ $message }} @enderror </span>

                    </div>
                  </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      コメント・PR
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <textarea  wire:model='comment_pr' placeholder=""></textarea>

                      </div>
                      <span class="text-danger"> @error('comment_pr') {{ $message }} @enderror </span>

                    </div>
                  </li>
                  <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      イメージ写真
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                      <div class="c-input c-input--full">
                        <textarea  name="company_name" placeholder=""></textarea>
                      </div>
                    </div>
                  </li>
                </ul>

                <div class="p-detail__foot">
                  <div class="p-buttonWrap p-buttonWrap--right">
                    <a href="#" wire:click="store" class="c-button c-button--secondary">
                      プレビュー
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
