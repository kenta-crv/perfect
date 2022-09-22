
@php
$array = [
  'inquiry_type' => [
    '1' => [
      'label' => '空室かどうか確認したい',
      'value' => '1'
    ],
    '2' => [
      'label' => '内見したい',
      'value' => '2'
    ],
    '3' => [
      'label' => 'その他',
      'value' => '3'
    ]
  ]
]
@endphp


<div>
    <div class="c-contianer-box_4">
        <div class="box-data">
          <div class="container-table margin-top--01">
              <div class="container_center"></div>
                  <div class="container_box">
                     <p class="header_15">モダンアパートメント武蔵小山(モダンアパートメントムサシコヤマ)/104</p>
                  </div>
              </div><br/>
              <form wire:submit.prevent="save">
                <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label">
                      お問合せの種類　（必須）
                    </div>
                    <div class="p-list__item__data_2" style="overflow-wrap: break-word;">
                        @foreach ($array['inquiry_type'] as $key => $item)
                        <div class="l-12 l-12--gap16">
                          <div class="l-12__2 width-full_5">
                              <input type="checkbox" wire:model="inquiry_type.{{ $item['value'] }}" id="{{ $item['value'] }}" value="{{ $item['value'] }}"  name="{{ $item['value'] }}" >
                              <label for="{{ $item['value']  }}">{{ $item['label'] }}</label><br>
                          </div>
                          <span class="text-danger"> @error('inquiry_type') {{ $message }} @enderror </span>
                        </div>
                      @endforeach
                  </li>
                    <li class="p-list__item p-list__item--center">
                      <div class="p-list__item__label">
                          お名前　（必須）
                      </div>
                      <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="c-input c-input--full">
                          <input type="text" wire:model="name" placeholder="" >
                        </div>
                        <span class="text-danger"> @error('inquiry_type') {{ $message }} @enderror </span>
                      </div>
                    </li>
                    <li class="p-list__item p-list__item--center">
                      <div class="p-list__item__label">
                          メールアドレス　（必須）
                      </div>
                      <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="c-input c-input--full">
                          <input type="email" wire:model="email" placeholder="">
                        </div>
                        <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
                      </div>
                    </li>
                    <li class="p-list__item p-list__item--center">
                      <div class="p-list__item__label">
                          電話番号
                      </div>
                      <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="c-input c-input--full">
                          <input type="text" wire:model="tel_no" placeholder="" value="{{ old("password") }}">
                        </div>
                        <span class="text-danger"> @error('tel_no') {{ $message }} @enderror </span>
                      </div>
                    </li>
                    <li class="p-list__item p-list__item--center">
                      <div class="p-list__item__label">
                          その他連絡事項
                      </div>
                      <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="c-input c-input--full">
                          <textarea wire:model="others" id="" cols="30" rows="10"></textarea>
                        </div>
                        <span class="text-danger"> @error('others') {{ $message }} @enderror </span>
                      </div>
                    </li>
                    
                      <div class="foot_3">
                        <div class="p-login__buttonArea">
                            <button type="submit" class="c-button c-button--full c-button--thinBlue">確認画面へ</button>
                        </div>
                    </div>
              </form>
          </div>
      </div>
</div>
