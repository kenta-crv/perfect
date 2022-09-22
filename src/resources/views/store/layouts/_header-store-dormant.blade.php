<header class="p-header">
  <div class="l-container">
    <h1 class="p-header__image">
      <a href="{{Helper::getTopPage()}}" class="p-header__image__logo">
        {{-- <img src="{{asset('image/logo/robore_logo_2.png')}}" style="margin: 5px 25px"> --}}
      </a>
    </h1>
    <nav class="p-header__text">
      <ul class="p-tabs">
        {{-- <li class="tabbing active" onclick="openTab(this, 'result')">
          <p >賃貸居住検索</p>
        </li> --}}
        <!-- <li class="tabbing active" onclick="openTab(this, 'result')">
          <a href="{{url('/store')}}" style="text-decoration: none; color: #000 ">  <p >賃貸居住検索</p> </a>
        </li> -->
        {{-- <li class="tabbing" onclick="openTab(this, 'favorites')">
          <p >賃貸居住 お気に入り</p>
        </li> --}}
        {{-- <li class="tabbing" onclick="openCity(event, 'Paris')">
          <p>広告出稿</p>
        </li> --}}
        {{-- <li class="tabbing" onclick="openCity(event, 'Paris')">
          <p >広告出稿</p>
        </li> --}}
      </ul>
      <ul class="p-header__list">
        <li class="p-header__list__item">
          <p href="http://localhost:8000/admin" class="p-header__list__item__name_2">お問合せは<br/>
            {{--  <img src="http://localhost:8000/image/icon/contact-line.png" style="margin: 0 25px">  --}}
            <span class="navbar_line_label">LINE</span>にて
          </p>
        </li>

        <span class="qr_code_icon">

        </span>

        <li class="p-header__list__item">
          <p class="p-header__list__item__name">
            <span class="solid_bell_icon">

            </span>
            {{-- <div class="notification_badge">
              <span class="badge">4</span>
            </div> --}}
            </p>

        </li>
         <li class="p-header__list__item">
          <p class="p-header__list__item__name">
            {{-- <a href="{{ route('storeAdmin.home') }}" class="question_mark_icon"></a> --}}

            {{--<a href="{{ route('storeAdmin.manual.manual') }}" class="question_mark_icon"  target="_blank"></a>--}}
            <a href="https://robore.jp/file/manual.pdf" class="question_mark_icon"  target="_blank"></a>



          </p>
        </li>
         <li class="p-header__list__item">
          <span class="profile-img">
        </li>
        {{-- <li class="p-header__list__item">
         @if(session()->get('LoggedUser'))
          <p class="dropdown-lbl">
            {{ session()->get('LoggedLastName')}} {{ session()->get('LoggedFirstName')}}
          </p>
          @else
          <p class="dropdown-lbl">
            ゲスト
          </p>
         @endif
        </li>
        <li class="p-header__list__item">
          <p class="p-header__list__item__name">

            <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn"></button>
                <div id="myDropdown" class="dropdown-content">
                  <a href="/store/setting/distributionInformation">流通サイト（情報取得）設定</a>
                  @if (Helper::getStoreId() == 1)
                  <a href="/store/setting/distribution">ユーザー別ログイン設定</a>
                  @endif
                  @if (Helper::getStoreId() == 1)
                  <a href="/store/mypage">マイページ</a>
                  @elseif (Helper::getStoreId() == null)
                  <a href="/store/manager/mypage">マイページ</a>
                  @endif
                </div>
            </div>
            </p>
        </li> --}}

        <li class="p-header__list__item">
          <div class="dropdown">
            @if(session()->get('LoggedUser'))
              <p class="label-p dropbtn-new" onclick="myFunction()">
                @if(Session::has('storeLastname') && Session::has('storeFirstname'))
                {{ session()->get('storeLastname')}} {{ session()->get('storeFirstname')}}
                @else
                {{ session()->get('LoggedLastName')}} {{ session()->get('LoggedFirstName')}}
                @endif
              </p>
              @else
              <p class="label-p dropbtn-new" onclick="myFunction()">
                ゲスト
              </p>
            @endif
            {{-- <div id="myDropdown" class="dropdown-content dropdown-content-add">
              <a href="/store/setting/distributionInformation">流通サイト（情報取得）設定</a>
              <a href="/store/setting/distribution">ユーザー別ログイン設定</a>
              @if (Helper::getStoreId() == 1)
              <a href="/store/mypage">マイページ</a>
              @elseif (Helper::getStoreId() == null)
              <a href="/store/manager/mypage">マイページ</a>
              @endif
              
              @if(Helper::getStoreId() == 0)
                <a href="/store/distribution">物件流通サイト選択</a>
                <a href="/store/setting/plans">ロボレのプラン設定</a>
                <a href="/store/contractBilling">契約・請求情報</a>
                <a href="/store/mypage">マイページ</a>
              @elseif(Helper::getStoreId() == 1)
                <a href="/store/distribution">物件流通サイト選択</a>
                <a href="/store/setting/distribution">ユーザー別ログイン設定</a>
                <a href="/store/setting/plans">ロボレのプラン設定</a>
                <a href="/store/setting/user">ロボレのユーザー設定</a>
                <a href="/store/contractBilling">契約・請求情報</a>
                <a href="/store/manager/mypage">マイページ</a>
              @endif
              <a href="{{ route('storeAdmin.logout') }}">ログアウト</a>
          </div> --}}
        </li>
      </ul>
    </nav>
  </div>
</header>


