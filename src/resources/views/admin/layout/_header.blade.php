<header class="p-header">
  <div class="l-container">
    <a href="{{Helper::getTopPage()}}" class="p-header__image__logo">
      <img src="{{asset('image/logo/robore_logo_2.png')}}" style="margin: 0 10px">
    </a>
    <nav class="p-header__text">
      <ul class="p-header__list">
         <li class="p-header__list__item">
          <p class="p-header__list__item__name">{{ session()->get('LoggedLastname')}} {{ session()->get('LoggedFirstname')}}
            </p>
        </li>
      </ul>
    </nav>
  </div>
</header>
