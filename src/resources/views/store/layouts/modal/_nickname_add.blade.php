<section class="remodal remodal_800" data-remodal-id="modal_nickname">
  <!--   data-remodal-options="hashTracking: false" -->
  <section class="p-modal p-modal--nickname">
    <div class="p-modal__buttonArea p-buttonArea">
      <button data-remodal-action="close" class="remodal-close"></button>
    </div>
    <div class="p-modal--head">
      <div class="p-modal--head--text">
        <p class="nickname">
          ニックネーム
        </p>
      </div>
    </div>
    {{ Form::open(['route' => ['web.nickname.create',$quiz], 'method' => 'post', 'id' => '']) }}
    <div class="l-container__sp">
      <div class="p-modal--body">
        <div class="p-modal--body--text">
          <p class="cnt">
            開始前にニックネームの作成を<br>お願いします。
          </p>
        </div>
        <div class="p-modal--body--list">
          <li class="p-formList__item" style="display: block;">
            <div class="p-formList__item__head">
              <p class="p-formList__item__head__title">ニックネーム</p>
            </div>
            <div class="p-formList__item__body">
              <div class="c-input c-input--full c-input--heightTall">
                <input placeholder="20文字以下で入力" name="nickname" type="text" style="height: 35px">
              </div>
            </div>
          </li>
        </div>
        <div class="p-modal__buttonArea">
          <button type="submit" class="c-button c-button--small c-button--thinBlue c-button--roundSmall">保存する</button>
          <a href="{{ route('web.login') }}" class="c-button--text">会員登録済の方はこちら</a>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </section>
</section>
