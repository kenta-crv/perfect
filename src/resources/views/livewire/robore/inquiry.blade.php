<div>
  <section class="" id="robore_inquiry">
    <div class="inquiries">
      <div class="title">
        <p class="tbl-title">お問合わせ</p>
      </div>
      <div class="inq-body">
        <div class="l-12 l-12--gap24">
          <div class="l-12__3 mgn-t-3">
            <div class="inq-title display-inline--flex">
              <span class="inquiry-label">宅建業免許番号</span>
              <p class="mandatory margin-left--auto">必須</p>
            </div>
          </div>
          <div class="l-12__6">
            <input type="text" class="dft-input-hp" wire:model.defer="license" placeholder="東京都知事（１）第○○○○○号">
            <span class="text-danger"> @error('license') {{ $message }} @enderror </span>

          </div>
          <div class="l-12__2">
            <a
              href="{{ route('register.register') }}"
              class="c-lbl-plain-hp  fa-solid btn-right-inquiry txt-dec-none" for="">
              無料で試してみる

            </a>
          </div>
        </div>
        <div class="l-12 l-12--gap24">
          <div class="l-12__3 mgn-t-3">
            <div class="inq-title display-inline--flex">
              <span class="inquiry-label">会社名・屋号</span>
              <p class="mandatory margin-left--auto">必須</p>
            </div>
          </div>
          <div class="l-12__8">
            <input type="text" class="dft-input-hp" wire:model.defer="company_name" placeholder="株式会社 ロボレ">
            <span class="text-danger"> @error('company_name') {{ $message }} @enderror </span>
          </div>
        </div>
        <div class="l-12 l-12--gap24">
          <div class="l-12__3 mgn-t-3">
            <div class="inq-title display-inline--flex">
              <span class="inquiry-label">電話番号</span>
            </div>
          </div>
          <div class="l-12__3">
            <input type="text" class="dft-input-hp" wire:model.defer="tel" placeholder="0123-456-7890">
            <span class="text-danger"> @error('tel') {{ $message }} @enderror </span>

          </div>
        </div>

        <div class="l-12 l-12--gap24">
          <div class="l-12__3 mgn-t-3">
            <div class="inq-title display-inline--flex">
              <span class="inquiry-label">都道府県</span>
            </div>
          </div>
          <div class="l-12__3">
            @php($pref = config('prefecture.PREFECTURE'))
            <select wire:model.defer="prefecture" class="lbl-gray dft-input-hp  keep-slct-01">
              <option value="">選択してください</option>
              @foreach ($pref as $key => $item)
                <option value="{{ $key }}"> {{ $item }}</option>
              @endforeach
            </select>
            <span class="text-danger"> @error('prefecture') {{ $message }} @enderror </span>
          </div>
        </div>

        <div class="l-12 l-12--gap24">
          <div class="l-12__3 mgn-t-3">
            <div class="inq-title display-inline--flex">
              <span class="inquiry-label">ご担当者様名</span>
              <p class="mandatory margin-left--auto">必須</p>
            </div>
          </div>
          <div class="l-12__3">
            <input type="text" class="dft-input-hp" wire:model.defer="first_name" placeholder="名前">
            <span class="text-danger"> @error('first_name') {{ $message }} @enderror </span>

          </div>
          <div class="l-12__3">
            <input type="text" class="dft-input-hp" wire:model.defer="last_name" placeholder="ラストネーム">
            <span class="text-danger"> @error('last_name') {{ $message }} @enderror </span>

          </div>
        </div>

        <div class="l-12 l-12--gap24">
          <div class="l-12__3 mgn-t-3">
            <div class="inq-title display-inline--flex">
              <span class="inquiry-label">メールアドレス</span>
              <p class="mandatory margin-left--auto">必須</p>
            </div>
          </div>
          <div class="l-12__8">
            <input class="dft-input-hp" type="email" wire:model.defer="email" placeholder="sample000@mail.com">
            <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
          </div>
        </div>

        <div class="l-12 l-12--gap24">
          <div class="l-12__3 mgn-t-3">
            <div class="inq-title display-inline--flex">
              <span class="inquiry-label">お問合せ内容</span>
              <p class="mandatory margin-left--auto">必須</p>
            </div>
          </div>
          <div class="l-12__8">
            <textarea
              class="dft-input-hp"
              wire:model.defer="body" rows="4" cols="50" placeholder="入力してください">
            </textarea>
            <span class="text-danger"> @error('body') {{ $message }} @enderror </span>

          </div>

        </div>

        <div class="c-ftr">
          <a
            wire:click="store"
            class="c-lbl-plain margin-bottom-5 conf btn-right-register" for="">
            確認画面へ
          </a>
        </div>
      </div>
      <br/><br/><br/><br/>
    </div>
  </section>


@include('livewire.robore.confirm')

</div>
