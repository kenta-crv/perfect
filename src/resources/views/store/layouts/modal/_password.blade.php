<section class="remodal remodal_800" data-remodal-id="modal_password">
  <!--   data-remodal-options="hashTracking: false" -->
  <section class="p-modal p-modal--nickname">
    <div class="p-modal__buttonArea p-buttonArea">
      <button data-remodal-action="close" class="remodal-close"></button>
    </div>
    <div class="p-modal--head">
      <div class="p-modal--head--text">
        <p class="nickname">
          パスワード
        </p>
      </div>
    </div>
    {{ Form::open(['route' => ['quiz.joinQuiz',$quiz], 'method' => 'post']) }}
    @guest
      <input type="hidden" name="guest" value="true">
    @else
      <input type="hidden" name="guest" value="false">
    @endguest
    <div class="l-container__sp">
      <div class="p-modal--body">
        <div class="p-modal--body--text">
          <p class="cnt">
            クイズのパスワードを入力してください。
          </p>
        </div>
        <div class="p-modal--body--list">
          <li class="p-formList__item" style="display: block;">
            <div class="p-formList__item__head">
              <p class="p-formList__item__head__title">パスワード</p>
            </div>
            <div class="p-formList__item__body">
              <div class="c-input c-input--full c-input--heightTall">
                <input placeholder="パスワード" name="password" type="password" style="height: 35px">
              </div>
            </div>
          </li>
        </div>
        <div class="p-modal__buttonArea">
          @if($errors->first())
              <div class="p-formError">
                <p class="message">
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first() }}</strong>
                  </span>
                </p>
              </div>
          @endif
          <button type="submit" class="c-button c-button--small c-button--thinBlue c-button--roundSmall">開始する</button>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </section>
</section>
