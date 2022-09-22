<header class="p-header">
  <div class="l-container">
    <h1 class="p-header__image">
      <a href="{{Helper::getTopPage()}}" class="p-header__image__logo">
        <img src="{{asset('image/logo/robore_logo_2.png')}}" style="margin: 5px 25px">
      </a>
    </h1>
    <nav class="p-header__text">
      <ul class="p-tabs">
        <li class="tabbing active" onclick="openCity(event, 'London')">
          <p >賃貸居住検索</p>
        </li>
        <li class="tabbing" onclick="openCity(event, 'Paris')">
          {{-- <p >賃貸居住 お気に入り</p> --}}
        </li>
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
            <span class="notification_bell_icon">

            </span>
            {{-- <div class="notification_badge">
              <span class="badge">4</span>
            </div> --}}
            </p>

        </li>
         <li class="p-header__list__item">
          <p class="p-header__list__item__name">
            <span class="question_mark_icon">

            </span>
            </p>
        </li>
         <li class="p-header__list__item">
          <span class="profile-img">
        </li>
        <li class="p-header__list__item">
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
        </li>
      </ul>
    </nav>
  </div>
</header>


