<div class="l-12 l-12--gap24">
  <div class="l-12__6">
    <p class="p-list__heading">公開に関する設定</p>
    <ul class="p-list {{ $class ?? '' }}">
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>ステータス
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="status" disabled>
                @if(session()->get('_confirm_data.status') === 'public')
                <option value="public">公開中</option>
                @else
                <option value="private">非公開</option>
                @endif
              </select>
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>作成者
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="authors_on" name="authors" type="radio" value="1" {{
                    session()->get('_confirm_data.authors') == 1 ? 'checked':'' }} disabled>
                  <label for="authors_on">企業</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="authors_off" name="authors" type="radio" value="0" {{
                    session()->get('_confirm_data.authors') == 0 ? 'checked':'' }} disabled>
                  <label for="authors_off">ユーザー</label>
                </div>
              </div>
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>作成企業名
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full c-input--text">
              <input type="text" name="company_name" value="{{ session()->get('_confirm_data.company_name') }}" readonly
                placeholder="作成企業名">
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>クイズ<br>
          タイトル
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full c-input--text">
              <input type="text" name="quiz_title" value="{{ session()->get('_confirm_data.quiz_title') }}" readonly
                placeholder="クイズタイトル">
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label ">
          <span class="required"></span>
          YouTube Link
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--text c-input--full">
              <input type="text" name="youtube_link" value="{{ session()->get('_confirm_data.youtube_link') }}"
                placeholder="URL" readonly>
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">サムネイル
        </div>
        <div class="p-list__item__data">
          <div class="c-input c-input--file">
            <label for="postImage__main" id="main-image" class="c-image c-image--round imageUpload" style="">
              <input id="postImage__main" accept="image/*" enctype="multipart/form-data" class="file_img_preview"
                name="photo_file" type="file" disabled>
              <input name="photo" type="hidden" value="">
            </label>
          </div>
        </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>ゲーム説明
        </div>
        <div class="p-list__item__data">
          <div class="l-12 ">
            <textarea name="game_description" placeholder="説明記入をお願いします" rows="5" maxlength="500" name="pr" cols="50"
              readonly style="">{!! session()->get('_confirm_data.game_description') !!}</textarea>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>サイト公開<br>
          日時
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--select__iconCalendar">
                  <input type="text" name="siteRelease[]" value="{{ session()->get('_confirm_data.siteRelease.0') }}"
                    placeholder="2021/1/1" readonly>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--select__iconTime">
                  <input type="text" name="siteRelease[]" value="{{ session()->get('_confirm_data.siteRelease.1') }}"
                    placeholder="2021/1/1 10:30" readonly>
                </div>
              </div>
            </div>
          </div>
      </li>
    </ul>
  </div>

  <div class="l-12__6">
    <p class="p-list__heading">クイズに関する設定</p>
    <ul class="p-list {{ $class ?? '' }}">
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>ランダム機能
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="randomFunct_on" name="randomFunct" type="radio" value="1"  {{
                    session()->get('_confirm_data.randomFunct') == 1 ? 'checked':'' }} disabled>
                  <label for="randomFunct_on">ON</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="randomFunct_off" name="randomFunct" type="radio" value="0"  {{
                    session()->get('_confirm_data.randomFunct') == 0 ? 'checked':'' }} disabled>
                  <label for="randomFunct_off">OFF</label>
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="p-list__item c-vanish__1">
        <div class="p-list__item__label">
          <span class="required"></span>クイズ数設定
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="quizSetting_on" name="quizSetting" type="radio" value="1" {{
                    session()->get('_confirm_data.quizSetting') == 1 ? 'checked':'' }} disabled>
                  <label for="quizSetting_on">ON</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="quizSetting_off" name="quizSetting" type="radio" value="0" {{
                    session()->get('_confirm_data.quizSetting') == 0 ? 'checked':'' }} disabled>
                  <label for="quizSetting_off">OFF</label>
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="p-list__item c-vanish__2">
        <div class="p-list__item__label">
          <span class="required"></span>クイズ問題数
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="numberOfQuizQuestion" disabled>
                <option value="10">10問</option>
              </select>
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>クイズ開始日
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--select__iconCalendar">
                  <input type="text" name="quizStart[]" placeholder="2021/1/1"
                    value="{{ session()->get('_confirm_data.quizStart.0') }}" readonly>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--select__iconTime">
                  <input type="text" name="quizStart[]" placeholder="2021/1/1 10:30"
                    value="{{ session()->get('_confirm_data.quizStart.0') }}" readonly>
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>クイズ終了日
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--select__iconCalendar">
                  <input type="text" name="quizEnd[]" placeholder="2021/1/1"
                    value="{{ session()->get('_confirm_data.quizEnd.0') }}" readonly>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--select__iconTime">
                  <input type="text" name="quizEnd[]" placeholder="2021/1/1 10:30"
                    value="{{ session()->get('_confirm_data.quizEnd.0') }}" readonly>
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>挑戦時間目安
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="approxChallengeTime" disabled>
                <option value="30">30分</option>
              </select>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>解答秒数
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="answerTimer" disabled>
                <option value="30">30秒</option>
              </select>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>定員数
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="capacity" disabled>
                <option value="100">100名</option>
              </select>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>途中参加<br>締切時間
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select__iconTime">
              <input type="text" name="endTime" placeholder="10:30"
                value="{{ session()->get('_confirm_data.endTime') }}" readonly>
            </div>
          </div>
      </li>


      <li class="p-list__item">
        <div class="p-list__item__label">
          <span class="required"></span>クイズキー
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="quizKey_on" name="quizKey" type="radio" value="1"  {{
                    session()->get('_confirm_data.quizKey') == 1 ? 'checked':'' }} disabled>
                  <label for="quizKey_on">あり</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="quizKey_off" name="quizKey" type="radio" value="0" {{
                    session()->get('_confirm_data.quizKey') == 0 ? 'checked':'' }} disabled>
                  <label for="quizKey_off">なし</label>
                </div>
              </div>
            </div>
          </div>
      </li>

      <li class="p-list__item c-vanish__3">
        <div class="p-list__item__label">
          <span class="required"></span>クイズキー<br>パスワード
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full c-input--text">
              <input type="text" name="quizKeyPassword" placeholder="6文字以上"
                value="{{ session()->get('_confirm_data.quizKeyPassword') }}" readonly aria-readonly="true">
            </div>
          </div>
      </li>

      <li class="p-list__item c-vanish__3">
        <div class="p-list__item__label ">
          <span class="required"></span>クイズキー<br>パスワード確認用
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full c-input--text">
              <input type="text" name="quizKeyPasswordConfirmation" placeholder="6文字以上"
                value="{{ session()->get('_confirm_data.quizKeyPasswordConfirmation') }}" readonly aria-readonly="true">
            </div>
          </div>
      </li>
    </ul>
  </div>
</div>
