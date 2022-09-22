<div class="confirmModal" style="display: none">
      <x-confirm>
        <ul class="mgn-b-4">
          <li>
            <div class="l-item">
              宅建業免許番号
            </div>
            <div class="r-item mgn-l-ato">
              {{ $license }}
            </div>
          </li>
          <li>
            <div class="l-item">
              会社名・屋号
            </div>
            <div class="r-item mgn-l-ato">
              {{ $company_name }}
            </div>
          </li>
          <li>
            <div class="l-item">
              電話番号
            </div>
            <div class="r-item mgn-l-ato">
              {{ $tel }}
            </div>
          </li>
          <li>
            <div class="l-item">
              都道府県
            </div>
            @php($selpre = config('prefecture.PREFECTURE'))
            <div class="r-item mgn-l-ato">
                @foreach ($selpre as $key => $item)
                  @if($key == $prefecture)
                  {{ $item }}
                  @endif
                @endforeach
            </div>
          </li>
          <li>
            <div class="l-item">
              ご担当者様名
            </div>
            <div class="r-item mgn-l-ato">
              {{  $first_name  }} {{ $last_name }}
            </div>
          </li>
          <li>
            <div class="l-item">
              メールアドレス
            </div>
            <div class="r-item mgn-l-ato">
              {{ $email }}
            </div>
          </li>
          <li>
            <div class="l-item">
              お問合せ内容
            </div>
            <div class="r-item mgn-l-ato">
              {{ $body }}
            </div>
          </li>
        </ul>

        <div class="footer mgn-t-3 ">
          <div class="mgn-center display-inline--flex">
            <button type="submit" wire:click="confirm" class="c-button_10 c-button--full_home  btn-right-rate">
              <span>保存</span>
            </button>

            <button type="submit"  class="cancelButton c-button_10 mgn-l-3 c-btn-blue c-button--thinBlue btn-right-rate">
              <span>キャンセル</span>
            </button>
          </div>
        </div>
      </x-confirm>
  </div>


  <script>
    window.addEventListener('confirm', function(){
      $('.confirmModal').show()
    })
    $('.cancelButton').on('click', function(){
      $('.confirmModal').hide()
    })

    $('.c-icn-close').on('click', function(){
      $('.confirmModal').hide()
    })
    window.addEventListener('thanksModal', function(){
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Thank you!',
        showConfirmButton: false,
        timer: 1500
      })
    })
  </script>
</div>
