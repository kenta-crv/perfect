<div>
    <div class="c-contianer-box">
        <div class="box-description">
          <div class="container_box_2">
            新規お知らせ作成
          </div>
          <span class="calendar_icon_2"></span>
        </div>
        <div class="box-data">
            <form wire:submit.prevent="save">
                <div class="container_item user_status">
                    <div class="container-body margin-top--35">
                        <div class="l-12 l-12--gap24">
                            <div class="l-12__11">
                            <ul class="p-list ">
                                <li class="inline__display p-list__item p-list__item--center">
                                <div class="p-list__item__label">
                                    対象店舗
                                </div>
                                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                    <div class="c-input c-input--full">
                                        <div class="c-input c-input--radio">
                                            <input id="target_stores_1" wire:model="target_stores" type="radio" value="1" checked="checked">
                                            <label for="target_stores_1">企業</label>
                                        </div>
                                    </div>
                                    <div class="c-input c-input--full">
                                        <div class="c-input c-input--radio">
                                            <input id="target_stores_2" wire:model="target_stores" type="radio" value="2" checked="checked">
                                            <label for="target_stores_2"><a href="#" class="store_search_link">店舗検索画面に移動し、対象となる店舗を選択する</a></label>
                                            {{-- <label for="target_stores_2"><a href="{{ route('admin.store.index') }}" class="store_search_link">店舗検索画面に移動し、対象となる店舗を選択する</a></label> --}}
                                        </div>
                                    </div>
                                    <span class="text-danger"> @error('target_stores') {{ $message }} @enderror </span>
                                </div>
                                </li>
        
                                <li class="inline__display p-list__item p-list__item--center">
                                <div class="p-list__item__label">
                                    掲載する期間
                                </div>
                                <div class="p-list__item__data " style="overflow-wrap: break-word;">
                                    <div class="l-12 l-12--gap24">
                                        <div class="l-12__3 ">
                                            <div class="c-input c-input--full-input--calendar">
                                                <input type="text" wire:model="date_in" placeholder="" class="flatpickr">
                                                <span class="c-icn--calendar"></span>
                                            </div>
                                            <span class="text-danger"> @error('date_in') {{ $message }} @enderror </span>
                                        </div>
                                        <div class="l-12__3 ">
                                            <div class="c-input c-input--full-input--clock">
                                                <input type="text" wire:model="time_in" placeholder="" class="time_picker">
                                                <span class="c-icn--clock"></span>
                                            </div>
                                            <span class="text-danger"> @error('time_in') {{ $message }} @enderror </span>
                                        </div>
                                        <div class="l-12__3 ">
                                            <div class="c-input c-input--full-input--calendar">
                                                <input type="text" wire:model="date_out" placeholder="" class="flatpickr">
                                                <span class="c-icn--calendar"></span>
                                            </div>
                                            <span class="text-danger"> @error('date_out') {{ $message }} @enderror </span>
                                        </div>
                                        <div class="l-12__3 ">
                                            <div class="c-input c-input--full-input--clock">
                                                <input type="text" wire:model="time_out" placeholder="" class="time_picker">
                                                <span class="c-icn--clock"></span>
                                            </div>
                                            <span class="text-danger"> @error('time_out') {{ $message }} @enderror </span>
                                        </div>
                                    </div>
                                </div>
                                </li>
                                <li class="inline__display p-list__item p-list__item--center">
                                <div class="p-list__item__label margin-bottom-auto">
                                    お知らせ内容
                                </div>
                                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                    <div class="l-12 l-12--gap24">
                                    <div class="l-12__3">
                                        <div class="c-input c-input--full input--calendar">
                                            <input type="text" wire:model="date_content" placeholder="" class="flatpickr">
                                            <span class="c-icn--calendar"></span>
                                        </div>
                                        <span class="text-danger"> @error('date_content') {{ $message }} @enderror </span>
                                    </div>
                                    <div class="l-12__6">
                                        <span>指定が無ければ、開始日を表示</span>
                                    </div>
                                    </div>
                                    <div class="l-12 l-12--gap24">
                                    <div class="l-12__8">
                                        <div class="c-input c-input--full">
                                            <input type="text" wire:model="title" placeholder="">
                                        </div>
                                        <span class="text-danger"> @error('title') {{ $message }} @enderror </span>
                                    </div>
                                    </div>
                                    <div class="l-12 l-12--gap24">
                                        <div class="c-input c-input--full">
                                            <textarea wire:model="content" placeholder=""></textarea>
                                        </div>
                                        <span class="text-danger"> @error('content') {{ $message }} @enderror </span>
                                    </div>
                                    <div class="l-12 l-12--gap24">
                                    <div class="l-12__5">
                                        <div class="c-input c-input--full">
                                        <input type="email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="l-12__3">
                                        <a href="#" class="c-button c-button--secondary">
                                            プレビュー
                                        </a>
                                    </div>
                                    <div class="l-12__3">
                                        <span>+ ファイル添付を増やす</span>
                                    </div>
                                    </div>
                                </div>
        
                                </li>
        
                                <li class="inline__display p-list__item p-list__item--center">
                                <div class="p-list__item__label">
                                    重要フラグ
                                </div>
                                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                    <div class="c-input c-input--full">
                                        <div class="c-input c-input--radio">
                                            <input id="flag_1" wire:model="flag" type="radio" value="1" checked="checked">
                                            <label for="flag_1">ONにすると店舗がログインした際に、最初にお知らせ画面を表示し</label><br/>
                                            <span class="text-danger"> @error('flag') {{ $message }} @enderror </span>
                                            <span>OFFの場合は、画面上部にあるお知らせ（ベル）マークのみで通知します。</span><br/>
                                        </div>
                                    </div>
                                </div>
                                </li>
                                <li class="inline__display p-list__item p-list__item--center">
                                <div class="p-list__item__label">
                                    メールフラグ
                                </div>
                                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                                    <div class="l-12 l-12--gap24">
                                    <div class="l-12__3 ">
                                        <div class="c-input c-input--full">
                                            <div class="c-input c-input--radio">
                                                <input id="mail_flag_1" wire:model="mail_flag" type="radio" value="1" checked="checked">
                                                <label for="mail_flag_1">店舗管理者のみ</label><br/>
                                                <span class="text-danger"> @error('mail_flag') {{ $message }} @enderror </span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="l-12__3 ">
                                        <div class="c-input c-input--full">
                                            <div class="c-input c-input--radio">
                                                <input id="mail_flag_2" wire:model="mail_flag" type="radio" value="2" checked="checked">
                                                <label for="mail_flag_2">店舗全員へ</label><br/>
                                                <span class="text-danger"> @error('mail_flag') {{ $message }} @enderror </span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="l-12__5 ">
                                        <div class="c-input c-input--full">
                                            <div class="c-input c-input--radio">
                                                <input id="mail_flag_3" wire:model="mail_flag" type="radio" value="3" checked="checked">
                                                <label for="mail_flag_3">メールはしない。（画面でのお知らせのみ）</label><br/>
                                                <span class="text-danger"> @error('mail_flag') {{ $message }} @enderror </span>
                                            </div>
                                            
                                        </div>
                                    </div>
        
                                    </div>
                                </div>
                                </li>
                            </ul>
        
                            <div class="p-detail__foot">
                                <div class="p-buttonWrap p-buttonWrap--right">
                                    <div class="p-login__buttonArea">
                                        <button type="submit" class="c-button c-button--full c-button--thinBlue">お知らせを作成</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>   
        </div>
      </div>
</div>
