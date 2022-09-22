@extends('store.layouts.layout-store-hp-sidebar')
@section('title', $title ?? '検索結果一覧')
@section('content')
@component('admin.component._p-index')
@slot('body')
<div class="c-contianer-box_4">
    <div class="container-table margin-top--01">
            <div class="container_box">
               <p class="header_14">モダンアパートメント武蔵小山(モダンアパートメントムサシコヤマ)/104</p>
               <div class="header_button">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-button  c-button--thinBlue">地図を表示</button>
                </div>
                <div class="p-login__buttonArea_4">
                    <button type="submit" class="c-button  c-button--thinBlue">問合せ</button>
                </div>
            </div>
        </div><br/>
        <div class="container">
            <div class="mySlides">
              <div class="numbertext">1 / 6</div>
              <img class="img_17" src="{{asset('image/img/room1.png')}}" >
                <a class="prev_2" onclick="plusSlides(-1)">❮</a>
                <a class="next_2" onclick="plusSlides(1)">❯</a>

                <div class="row_4">
                  <div class="column_2">
                    <img class="demo_cursor" src="{{asset('image/img/room1.png')}}"  onclick="currentSlide(1)" alt="Picture 1">
                    <img class="demo_cursor" src="{{asset('image/img/room2.png')}}"  onclick="currentSlide(2)" alt="Picture 1">
                  </div>
                </div>
            </div>
            <div class="mySlides">
              <div class="numbertext">1 / 6</div>
              <img class="img_17" src="{{asset('image/img/room2.png')}}" >
                <a class="prev_2" onclick="plusSlides(-1)">❮</a>
                <a class="next_2" onclick="plusSlides(1)">❯</a>

                <div class="row_4">
                  <div class="column_2">
                    <img class="demo_cursor" src="{{asset('image/img/room1.png')}}"  onclick="currentSlide(1)" alt="Picture 1">
                    <img class="demo_cursor" src="{{asset('image/img/room2.png')}}"  onclick="currentSlide(2)" alt="Picture 2">
                  </div>
                </div>
            </div>
            <div class="data-infoes margin-left--auto">
              <div class="img-list">
                あればキャッチコピー　キャッチコピー　キャッチコピー　キャッチコピー
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>賃料</p>
                  </div>
                  <div class="infoes">
                    <p>14.7万円</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>住所</p>
                  </div>
                  <div class="infoes">
                    <p>東京都品川区荏原４丁目１２－１４</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>管理費</p>
                  </div>
                  <div class="infoes">
                    <p>8,000円</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>交通1</p>
                  </div>
                  <div class="infoes">
                    <p>東急目黒線　武蔵小山駅　徒歩　8分</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>敷金</p>
                  </div>
                  <div class="infoes">
                    <p>1ヶ月</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>交通2</p>
                  </div>
                  <div class="infoes">
                    <p>xxxxxxxxxxx　xxxxxxxxx　徒歩　12分</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>礼金</p>
                  </div>
                  <div class="infoes">
                    <p>1ヶ月</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>物件種目</p>
                  </div>
                  <div class="infoes">
                    <p>ワンルーム</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>広さ</p>
                  </div>
                  <div class="infoes">
                    <p>26.23㎡</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>間取り</p>
                  </div>
                  <div class="infoes">
                    <p>新築貸マンション</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>建築年</p>
                  </div>
                  <div class="infoes">
                    <p>2019年6月</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>カード</p>
                  </div>
                  <div class="infoes">
                    <p>初期費用可</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>所在階</p>
                  </div>
                  <div class="infoes">
                    <p>2階／9階建</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>家賃保証</p>
                  </div>
                  <div class="infoes">
                    <p>利用可 ジェイリース　初回保証料：総賃料５０％　毎年：１万円 </p><br/>
                    <p>要問合）月々の家賃もカードで払える可能性があります。</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container-table margin-top--01">
            <div class="container_box">
               <p class="header_14">モダンアパートメント武蔵小山(モダンアパートメントムサシコヤマ)/104</p>
               <div class="header_button ">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-button  c-button--thinBlue">地図を表示</button>
                </div>
                <div class="p-login__buttonArea_4">
                    <button type="submit" class="c-button  c-button--thinBlue">問合せ</button>
                </div>
            </div>
        </div><br/>
        <div class="container">
            <div class="mySlides2">
              <div class="numbertext">1 / 6</div>
              <img class="img_17" src="{{asset('image/img/room3.png')}}" >
                <a class="prev_2" onclick="plusSlides2(-1)">❮</a>
                <a class="next_2" onclick="plusSlides2(1)">❯</a>

                <div class="row_4">
                  <div class="column_2">
                    <img class="demo_cursor_2" src="{{asset('image/img/room3.png')}}"  onclick="currentSlide2(1)" alt="Picture 1">
                    <img class="demo_cursor_2" src="{{asset('image/img/room4.png')}}"  onclick="currentSlide2(2)" alt="Picture 1">
                  </div>
                </div>
            </div>
            <div class="mySlides2">
              <div class="numbertext">1 / 6</div>
              <img class="img_17" src="{{asset('image/img/room4.png')}}" >
                <a class="prev_2" onclick="plusSlides2(-1)">❮</a>
                <a class="next_2" onclick="plusSlides2(1)">❯</a>

                <div class="row_4">
                  <div class="column_2">
                    <img class="demo_cursor_2" src="{{asset('image/img/room3.png')}}"  onclick="currentSlide2(1)" alt="Picture 1">
                    <img class="demo_cursor_2" src="{{asset('image/img/room4.png')}}"  onclick="currentSlide2(2)" alt="Picture 1">
                  </div>
                </div>
            </div>

            <div class="data-infoes margin-left--auto">
              <div class="img-list">
                あればキャッチコピー　キャッチコピー　キャッチコピー　キャッチコピー
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>賃料</p>
                  </div>
                  <div class="infoes">
                    <p>14.7万円</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>住所</p>
                  </div>
                  <div class="infoes">
                    <p>東京都品川区荏原４丁目１２－１４</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>管理費</p>
                  </div>
                  <div class="infoes">
                    <p>8,000円</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>交通1</p>
                  </div>
                  <div class="infoes">
                    <p>東急目黒線　武蔵小山駅　徒歩　8分</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>敷金</p>
                  </div>
                  <div class="infoes">
                    <p>1ヶ月</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>交通2</p>
                  </div>
                  <div class="infoes">
                    <p>xxxxxxxxxxx　xxxxxxxxx　徒歩　12分</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>礼金</p>
                  </div>
                  <div class="infoes">
                    <p>1ヶ月</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>物件種目</p>
                  </div>
                  <div class="infoes">
                    <p>ワンルーム</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>広さ</p>
                  </div>
                  <div class="infoes">
                    <p>26.23㎡</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>間取り</p>
                  </div>
                  <div class="infoes">
                    <p>新築貸マンション</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>建築年</p>
                  </div>
                  <div class="infoes">
                    <p>2019年6月</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>カード</p>
                  </div>
                  <div class="infoes">
                    <p>初期費用可</p>
                  </div>
                </div>
              </div>
              <div class="form-infoes">
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>所在階</p>
                  </div>
                  <div class="infoes">
                    <p>2階／9階建</p>
                  </div>
                </div>
                <div class="margin-left-auto1">
                  <div class="label">
                    <p>家賃保証</p>
                  </div>
                  <div class="infoes">
                    <p>利用可 ジェイリース　初回保証料：総賃料５０％　毎年：１万円 </p><br/>
                    <p>要問合）月々の家賃もカードで払える可能性があります。</p>
                  </div>
                </div>
              </div>
            </div>
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
