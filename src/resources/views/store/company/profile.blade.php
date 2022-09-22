@extends('store.layouts.layout-store-hp')
@section('title', $title ?? 'プロファイル')
@section('content')
@component('admin.component._p-index')
@slot('body')
<div class="c-contianer-box_4">
        <div class="container">
            <div class="mySlides_17">
              <div class="numbertext">1 / 6</div>
              <img class="image_1" src="{{asset('image/logo/home_1.png')}}" height="105" width="79">

                <div class="row_4">
                  <div class="column_7">
                    <img class="demo_cursor" src="{{asset('image/logo/home_2.png')}}"  onclick="currentSlide(1)" alt="Picture 1">
                    <img class="demo_cursor" src="{{asset('image/logo/employee.png')}}"  onclick="currentSlide(2)" alt="Picture 1">
                  </div>
                </div>
            </div>
            <div class="data-infoes">
              <div class="img-list">
                    <textarea name="" id="" cols="30" rows="10"></textarea>
              </div>
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                    会社名
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="p-list__item__label">
                        ○○○不動産
                    </div>
                </div>
              </li>
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                    住所
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="p-list__item__label">
                        141-0021　東京都xxxxxxxxxxxxxxx
                    </div>
                </div>
              </li>
              <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                    問合せ
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="p-list__item__label">
                        問合せフォームから問い合わせる<br/>
                        xxx@xxxx.co.jp
                    </div>
                </div>
              </li><br/>
            <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                    電話番号
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="p-list__item__label">
                        xxxxxxxx
                    </div>
                </div>
              </li>
            <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                    LINE ID
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="p-list__item__label">
                        xxxxxxxx
                    </div>
                </div>
              </li>
            <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                    免許番号
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="p-list__item__label">
                        xxxxxxxx
                    </div>
                </div>
              </li>
            <li class="p-list__item p-list__item--center">
                <div class="p-list__item__label">
                    登録会員
                </div>
                <div class="p-list__item__data" style="overflow-wrap: break-word;">
                    <div class="p-list__item__label">
                        全国宅地建物取引業協会連合会、全日本不動産協会
                    </div>
                </div>
              </li>
            </div>
          </div>
        </div>
        <div class="container">
            <hr class="hr_2">
        </div>
        <div class="container">
           <div class="box-title">
            <p>アクセスマップ</p>
           </div>
        </div>
        <div class="container">
            <div class="data-infoes margin-left--17">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25977.355572639553!2d139.6329533!3d35.5248101!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x605d1b87f02e57e7%3A0x2e01618b22571b89!2z5pel5pys44CB5p2x5Lqs6YO9!5e0!3m2!1sja!2sph!4v1650446231563!5m2!1sja!2sph" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endslot
  @endcomponent
  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("demo_cursor");
    let captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>

  <script>
    let slideIndex2 = 1;
    showSlides2(slideIndex2);

    function plusSlides2(n) {
      showSlides2(slideIndex2 += n);
    }

    function currentSlide2(n) {
      showSlides2(slideIndex2 = n);
    }

    function showSlides2(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides2");
    let dots = document.getElementsByClassName("demo_cursor_2");
    let captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex2 = 1}
        if (n < 1) {slideIndex2 = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex2-1].style.display = "block";
        captionText.innerHTML = dots[slideIndex2-1].alt;
    }
    </script>
@endsection
