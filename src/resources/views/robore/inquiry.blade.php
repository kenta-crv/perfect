<section class="" id="robore_inquiry">
  <div class="inquiries">
    <div class="pdg-t-8 pdg-b-6">
      <p class="hp-title-w ">お問合わせ</p>
      <hr class="hp-title-horizontal-w">
    </div>
    <div class="inq-body">
      <form action="{{ route('saveInquiry') }}" method="post" id="inqry">
        @csrf
        <div class="l-12 l-12--gap24">
          <div class="l-12__3 mgn-t-3">
            <div class="inq-title display-inline--flex">
              <span class="inquiry-label">宅建業免許番号</span>
              {{-- <p class="mandatory margin-left--auto">必須</p> --}}
            </div>
          </div>
          <div class="l-12__6">
            <input type="text" class="dft-input-hp" name="license" placeholder="東京都知事（１）第○○○○○号" value="{{ session()->get('from_register.license_number') ? session()->get('from_register.license_number') : old('license') }}">
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
            <input type="text" class="dft-input-hp" name="company_name" placeholder="株式会社 ロボレ" value="{{ session()->get('from_register.company_name') ? session()->get('from_register.company_name') : old('company_name') }}">
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
            <input type="text" class="dft-input-hp" name="tel" placeholder="0123-456-7890" value="{{ session()->get('from_register.contract_number') ? session()->get('from_register.contract_number') : old('tel') }}">
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
            <select name="prefecture" class="lbl-gray dft-input-hp  keep-slct-01">
              <option value="">選択してください</option>
              @foreach ($pref as $key => $item)
                <option value="{{ $key }}" {{ $key == old('prefecture') ? 'selected' : '' }}> {{ $item }}</option>
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
            <input type="text" class="dft-input-hp" name="last_name" placeholder="姓" value="{{ session()->get('from_register.last_name') ? session()->get('from_register.last_name') : old('last_name') }}">
            <span class="text-danger"> @error('last_name') {{ $message }} @enderror </span>

          </div>
          <div class="l-12__3">
            <input type="text" class="dft-input-hp" name="first_name" placeholder="名" value="{{ session()->get('from_register.first_name') ? session()->get('from_register.first_name') : old('first_name') }}">
            <span class="text-danger"> @error('first_name') {{ $message }} @enderror </span>

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
            <input class="dft-input-hp" type="email" name="email" placeholder="sample000@mail.com" value="{{ session()->get('from_register.email') ? session()->get('from_register.email') : old('email')}}">
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
            <textarea class="dft-input-hp" id="body" name="body" rows="4" cols="50" placeholder="お問い合わせ内容">{{ old('body') }}</textarea>
            <span class="text-danger"> @error('body') {{ $message }} @enderror </span>
          </div>

        </div>

        <div class="c-ftr">
          <button
            type="submit"
            class="c-lbl-plain margin-bottom-5 conf btn-right-register" for="">
            確認画面へ
          </button>
        </div>
      </form>
    </div>
    <br/><br/><br/><br/>
  </div>
</section>
