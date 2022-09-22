@extends('web.layouts.layout')

@section('content')

<div class="l-home">
  <div vlass="p-home">
    <!--検索 -->
    <div class="p-home__keyword">
      <form action="{{ route('web.searchResult') }}" method="get">
        <div class="l-container__sp">
          <div class="p-home__keyword__body">
            <div class="c-input c-input__search  c-input--auto">
              <input class="search" placeholder="クイズタイトル or 出題者"  name="keyword" value="{{ $search }}" type="text">
            </div>
            <div class="btnarea_search">
              <button type="submit" class="c-button c-button--thinBlue c-button--search">検索</button>
            </div>
          </div>
        </div>
      </form>
    </div>




    <div class="p-home__everyOne p-home__ranking">
      <div class="p-home__everyOne__body ">
        <div class="l-container__sp">
          <ul class="p-everyOne__list p-everyOne__list--home no-padding__top">
            @if($quizzes->isNotEmpty())
              @foreach ($quizzes as $key => $quiz)
                <li class="first-header">
                  {{--  @if ($key == 0)
                    <div class="first">
                      <p>{{ $key + 1 }}</p>
                    </div>
                  @endif
                  @if ($key == 1)
                    <div class="second">
                      <p>{{ $key + 1 }}</p>
                    </div>
                  @endif
                  @if ($key == 2)
                  <div class="third">
                    <p>{{ $key + 1 }}</p>
                  </div>
                  @endif  --}}

                  <div class="header__banner {{ $key == 0 ? 'bg-danger' : 'bg-black' }}">
                    <p class="title p-weight--600">解答期日：{{ isset($quiz['end_date']) ? $quiz->end_date_format : ''}}&nbsp;{{isset($quiz['reception_time']) ? $quiz->reception_time_format : $quiz->end_time_format}}まで</p>
                  </div>
                  <a href="{{url('/quiz/'.$quiz['id'])}}">

                    <article class="padding-2">
                      <div class="p-everyOne__list__head">
                          <p class="relay">リアルタイム</p>
                          <h2 class="title">{{ $quiz['title'] }}</h2>
                      </div>
                      <div class="p-everyOne__list__body">
                        <div class="left">
                          <div  style="background: url({{ $quiz->thumbnail }});   background-position: center; " class="p-everyOne__list__body__image c-image ">
                          </div>
                        </div>
                        <div class="right">
                          <ul class="p-show__list">
                            <li>
                              <article>
                                <div class="title">
                                  <p>開始期間</p>
                                </div>
                                <div class="cnt">
                                  <p>
                                    {{-- {{  ( isset( $item['start_date'] ) ?  $item->start_date_format  : ''). " ".}} {{ $item->start_time_format }} -
                                    {{ $quiz->end_date_format }} {{ $quiz->end_time_format}} --}}
                                    {!!
                                      ( isset( $quiz['start_date'] ) ?  $quiz->start_date_format : ''). " ".
                                      ( isset( $quiz['start_time']) ? $quiz->start_time_format : '')." - "."<br>".
                                      ( isset( $quiz['end_date'] ) ?  $quiz->end_date_format : ''). " ".
                                      ( isset( $quiz['end_time']) ? $quiz->end_time_format : '')
                                    !!}
                                  </p>
                                </div>
                              </article>
                            </li>

                          </ul>
                          <div class="p-everyOne__list__time  ">
                            <div class="p-everyOne__list__time__entry">
                              <p class="title">問題登録数 </p>
                              <p class="number"><span>{{ $quiz->registered_question_count }}</span>問</p>
                              &nbsp;  &nbsp;
                              <p class="title">挑戦時間 </p>
                              <p class="number"><span>{{ $quiz['challenge_time'] ?? '0' }}</span>分</p>
                            </div>
                          </div>
                          <br>
                          <div class="p-everyOne__list__organizer">
                            <div style="background: url(/image/logo/user.png)" class="p-everyOne__list__organizer__circle">
                            </div>
                            <p class="offer"></p>
                          </div>
                        </div>
                      </div>
                    </article>
                  </a>
                </li>
              @endforeach
              @else
              <div class="search_result">
                <p>No Results found</p>
              </div>
            @endif

            {{--  <div class="p-tableSet__foot">
              <div class="p-bread">
                {{ $quizzes->links() }}
              </div>
            </div>  --}}
{{--
            <li class="second">
              <div class="header__banner bg-black">
                <p class="title p-weight--600">解答期日:11/16 まで</p>
              </div>
              <a href="">
                <article class="padding-2">
                  <div class="p-everyOne__list__head">
                      <p class="anytime bg_light">ノンリアルタイム</p>
                      <h2 class="title">【面白い】ガチで勉強になる雑学クイズ！！</h2>
                  </div>
                  <div class="p-everyOne__list__body">
                    <div class="left">
                      <div style="background: url(/image/logo/noimage.jpg)" class="p-everyOne__list__body__image c-image">
                      </div>

                    </div>
                    <div class="right">
                      <ul class="p-show__list">
                        <li>
                          <article>
                            <div class="title">
                              <p>開始期間</p>
                            </div>
                            <div class="cnt">
                              <p>
                                2021/5/21 13:00 -
                                2021/10/22 13:00
                              </p>
                            </div>
                          </article>
                        </li>

                      </ul>
                      <div class="p-everyOne__list__time  ">
                        <div class="p-everyOne__list__time__entry">
                          <p class="title">問題登録数 </p>
                          <p class="number"><span>20</span>問</p>
                          &nbsp;  &nbsp;
                          <p class="title">挑戦時間 </p>
                          <p class="number"><span>5</span>分</p>
                        </div>
                      </div>
                      <br>
                      <div class="p-everyOne__list__organizer">
                        <div style="background: url(/image/logo/user.png)" class="p-everyOne__list__organizer__circle">
                        </div>
                        <p class="offer"></p>
                      </div>
                    </div>
                  </div>
                </article>
              </a>
            </li>
            <li class="third">
              <div class="header__banner bg-black">
                <p class="title p-weight--600">解答期日:11/16 まで</p>
              </div>
              <a href="">
                <article class="padding-2">
                  <div class="p-everyOne__list__head">
                      <p class="anytime bg_light">ノンリアルタイム</p>
                      <h2 class="title">【へぇー】知って驚く！雑学クイズ！</h2>
                  </div>
                  <div class="p-everyOne__list__body">
                    <div class="left">
                      <div style="background: url(/image/logo/noimage.jpg)" class="p-everyOne__list__body__image c-image">
                      </div>

                    </div>
                    <div class="right">
                      <ul class="p-show__list">
                        <li>
                          <article>
                            <div class="title">
                              <p>開始期間</p>
                            </div>
                            <div class="cnt">
                              <p>
                                2021/5/21 13:00 -
                                2021/10/22 13:00
                              </p>
                            </div>
                          </article>
                        </li>

                      </ul>
                      <div class="p-everyOne__list__time  ">
                        <div class="p-everyOne__list__time__entry">
                          <p class="title">問題登録数 </p>
                          <p class="number"><span>20</span>問</p>
                          &nbsp;  &nbsp;
                          <p class="title">挑戦時間 </p>
                          <p class="number"><span>5</span>分</p>
                        </div>
                      </div>
                      <br>
                      <div class="p-everyOne__list__organizer">
                        <div style="background: url(/image/logo/user.png)" class="p-everyOne__list__organizer__circle">
                        </div>
                        <p class="offer"></p>
                      </div>
                    </div>
                  </div>
                </article>
              </a>
            </li>  --}}
          </ul>

        </div>
      </div>
    </div>



    <!--バナー-->
    {{-- <div class="p-home__banner p-home__section">
      <div class="l-container__sp">
        <ul class="p-banner__list p-banner__list--home">
          <li>
            <div class="image"><img src="../image/img/img_first.png"></div>
          </li>
          <li>
            <div class="image"><img src="../image/img/img_second.png"></div>
          </li>
          <li>
            <div class="image"><img src="../image/img/img_third.png"></div>
          </li>
        </ul>
      </div>
    </div> --}}
  </div>
</div>


<script src="{{ asset('js/slick.min.js') }}"></script>
<script>
  $('.p-slider__list').slick({
  autoplay: true, //自動再生
  dots: true, //ドットのナビゲーションを表示
  infinite: true, //スライドのループ有効化
  speed: 500, //切り替えのスピード（小さくすると速くなる）
  fade: true, //フェードの有効化
  });

  sethrefs = function () {

	if (document.querySelectorAll) {

		var datahrefs = document.querySelectorAll('[data-href]'),
				dhcount = datahrefs.length;

		while (dhcount-- > 0) {

			var ele = datahrefs[dhcount],
					addevent = function (ele, event, func) {

						if(ele.addEventListener) ele.addEventListener(event, link, false);
						else ele.attachEvent('on' + event, link);

					},
					link = function (event) {

						var target = event.target,
								url = this.getAttribute('data-href');

						if (!target.href) {

			    		var newevent = document.createEvent("MouseEvents");

			    		if (newevent.initMouseEvent) {

			    			var newlink = document.createElement("a");

		    			  newlink.setAttribute('href', url);
		    			  newlink.innerHTML = 'link event';

	    					newevent.initMouseEvent(event.type, true, false, window, event.detail, event.screenX, event.screenY, event.clientX, event.clientY, event.ctrlKey, event.altKey, event.shiftKey, event.metaKey, event.button, null);
	    					newlink.dispatchEvent(newevent);
				    	}
				    	else {
				    		var meta = (event.metaKey) ? '_self' : '_blank';
				    		window.open(url, meta);
				    	}
						}
					};
			addevent(ele, 'click', link);
		}
	}
};

sethrefs();
</script>
@endsection
