<div class="l-12 l-12--gap24">
  <div class="l-12__6">
    <p class="p-list__heading">公開に関する設定</p>
    <ul class="p-list {{ $class ?? '' }}">
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>ステータス
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="status">
                <option value="1">公開中</option>
                <option value="2">非公開</option>
              </select>
            </div>
          </div>
      </li>

      @if(!session()->exists('user_id'))
        <li class="p-list__item">
          <div class="p-list__item__label">
            <span></span>作成者
          </div>
          <div class="p-list__item__data">
            <div class="l-12 l-12--gap8">
              <div class="c-input c-input--full">
                <div class="l-12__6">
                  <div class="c-input c-input--radio">
                    <input id="authors_on" name="authors" type="radio" value="1" checked="checked">
                    <label for="authors_on">企業</label>
                  </div>
                </div>
                <span class="unit_min"></span>
                <div class="l-12__6">
                  <div class="c-input c-input--radio">
                    <input id="authors_off" name="authors" type="radio" value="2">
                    <label for="authors_off">ユーザー</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        @else
        <li class="p-list__item">
          <div class="p-list__item__label">
            <span></span>作成者
          </div>
          <div class="p-list__item__data">
            <div class="l-12 l-12--gap8">
              <div class="c-input c-input--full">
                <div class="l-12__6">
                    <input name="authors" type="hidden" value="2">
                    <label for="authors_off">ユーザー</label>
                </div>
              </div>
            </div>
          </div>
        </li>
      @endif

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>クイズ対象者
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="member_on" name="is_member" type="radio" value="1" checked="checked">
                  <label for="member_on">会員限定</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="member_off" name="is_member" type="radio" value="0">
                  <label for="member_off">非会員</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>

      @if(!session()->exists('user_id'))
        <li class="p-list__item">
          <div class="p-list__item__label">
            <span></span>作成企業名
          </div>
          <div class="p-list__item__data">
            <div class="l-12 l-12--gap8">
              <div class="c-input c-input--full c-input--text">
                <input type="text" name="company_name" placeholder="作成企業名" value="{{ old('company_name') }}">
              </div>
            </div>
          </div>
        </li>
      @else
        <li class="p-list__item">
          <div class="p-list__item__label">
            <span></span>作成企業名
          </div>
          <div class="p-list__item__data">
            <div class="l-12 l-12--gap8">
              <div class="c-input c-input--full c-input--text">
                <input type="text" name="company_name" placeholder="作成企業名" value="{{ auth()->user()->nickname }}" readonly="readonly">
              </div>
            </div>
          </div>
        </li>
      @endif

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>クイズ<br>
          タイトル
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full c-input--text">
              <input type="text" name="quiz_title" placeholder="クイズタイトル" value="{{ old('quiz_title') }}">
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label ">
          <span></span>
          YouTube Link
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--text c-input--full">
              <input type="text" name="youtube_link" placeholder="URL" value="{{ old('youtube_link') }}">
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
                name="photo_file" type="file">
              <image id="photo_preview"/>
              <input name="photo" type="hidden" value="">
            </label>
            <p class="p-recommend">推奨画像サイズ：縦450px 横270px以上(5:4)</p>
          </div>
        </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>ゲーム説明
        </div>
        <div class="p-list__item__data">
          <div class="l-12 ">
            <textarea name="game_description" placeholder="説明記入をお願いします" rows="5" maxlength="500" name="pr" cols="50"
              style="">{{ old('game_description') }}</textarea>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>イベント
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="event_id">
                  <option value="0">選択してください</option>
                @foreach($events as $event)
                  <option value="{{$event['id']}}">{{$event['title']}}</option>
                @endforeach
              </select>
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>サイト公開<br>
          日時
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--select__iconCalendar">
                  <input type="text" name="siteRelease_date" value="{{ old('siteRelease_date') }}" placeholder="2021-1-1" class="flatpickr">
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--select__iconTime">
                  <input type="text" name="siteRelease_time" value="{{ old('siteRelease_time') }}" placeholder="10:30" class="time_picker">
                </div>
              </div>
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>サイト閉鎖<br/>
          日時<!---Close date-->
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--select__iconCalendar">
                  <input type="text" name="quizCloseDate" placeholder="2021-1-1" value="{{ old('quizCloseDate') }}" class="flatpickr">
                </div>
                @if($errors->has('quizCloseDate'))
                  <div class="error">{{ $errors -> first('quizCloseDate') }}</div>
                @endif
              </div>
              <div class="l-12__6">
                <div class="c-input c-input--select__iconTime">
                  <input type="text" name="quizCloseTime" placeholder="10:30" value="{{ old('quizCloseTime') }}" class="time_picker">
                </div>
                @if($errors->has('quizCloseTime'))
                  <div class="error">{{ $errors -> first('quizCloseTime') }}</div>
                @endif
              </div>
            </div>
          </div>
      </li>
      
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>待機画面BGM
        </div>
        <div class="p-list__item__data">
        <div class="l-12 l-12--gap8">
          <div class="c-input c-input--full">
            <input type="file" name="standby_music" class="c-input--link">
          </div>
        </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>結果画面BGM
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <input type="file" name="commentary_music" class="c-input--link">
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>クイズ説明用動画
        </div>
        <div class="p-list__item__data">
        <div class="l-12 l-12--gap8">
          <div class="c-input c-input--full">
            <input type="file" name="start_movie_path" class="c-input--link" accept="video/*, .mp4, .bin">
          </div>
          @include('web.layouts.error', ['name' => 'start_movie_path'])
        </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>エンディング動画
        </div>
        <div class="p-list__item__data">
        <div class="l-12 l-12--gap8">
          <div class="c-input c-input--full">
            <input type="file" name="end_movie_path" class="c-input--link" accept="video/*, .mp4, .bin">
          </div>
          @include('web.layouts.error', ['name' => 'end_movie_path'])
        </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span>解答画面表示</span>
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="is_needed_result_on" name="is_needed_result" type="radio" value="1" checked="checked">
                  <label for="is_needed_result_on">する</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="is_needed_result_off" name="is_needed_result" type="radio" value="0">
                  <label for="is_needed_result_off">しない</label>
                </div>
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
          <span></span>ランダム機能
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="randomFunct_on" name="randomFunct" type="radio" value="1">
                  <label for="randomFunct_on">ON</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="randomFunct_off" name="randomFunct" type="radio" value="0"
                    checked="checked">
                  <label for="randomFunct_off">OFF</label>
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="p-list__item c-vanish__1">
        <div class="p-list__item__label">
          <span></span>クイズ数設定
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="quizSetting_on" name="quizSetting" type="radio" value="1">
                  <label for="quizSetting_on">ON</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="quizSetting_off" name="quizSetting" type="radio" value="0" checked="checked">
                  <label for="quizSetting_off">OFF</label>
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="p-list__item c-vanish__2">
        <div class="p-list__item__label">
          <span></span>クイズ問題数
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select">
              <input type="text" name="numberOfQuizQuestion" value="{{ old('numberOfQuizQuestion') }}" placeholder="10"><div style="margin-top: 8px; margin-left: 3px;">問</div>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>入室可能日時
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--select__iconCalendar">
                  <input type="text" name="roomAvailableDate" value="{{ old('roomAvailableDate') }}" placeholder="2021-1-1" class="flatpickr">
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--select__iconTime">
                  <input type="text" name="roomAvailableTime" value="{{ old('roomAvailableTime') }}" placeholder="10:30" class="time_picker">
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>クイズ開始日
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--select__iconCalendar">
                  <input type="text" name="quizStartDate" value="{{ old('quizStartDate') }}" placeholder="2021-1-1" class="flatpickr">
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--select__iconTime">
                  <input type="text" name="quizStartTime" value="{{ old('quizStartTime') }}" placeholder="10:30" class="time_picker">
                </div>
              </div>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>クイズ終了日
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--select__iconCalendar">
                  <input type="text" name="quizEndDate" value="{{ old('quizEndDate') }}" placeholder="2021-1-1" class="flatpickr">
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--select__iconTime">
                  <input type="text" name="quizEndTime" value="{{ old('quizEndTime') }}" placeholder="10:30" class="time_picker">
                </div>
              </div>
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>挑戦時間目安
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select">
              <input type="text" name="approxChallengeTime" value="{{ old('approxChallengeTime') }}" placeholder="10"><div style="margin-top: 8px; margin-left: 3px;">分</div>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>解答秒数
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="answerTimer">
                <option value="10">10秒</option>
                <option value="15">15秒</option>
                <option value="20">20秒</option>
                <option value="25">25秒</option>
                <option value="30">30秒</option>
                <option value="35">35秒</option>
                <option value="40">40秒</option>
                <option value="45">45秒</option>
              </select>
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>インターバル
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select">
              <input type="text" name="interval" value="{{ old('interval') }}" placeholder="3"><div style="margin-top: 8px; margin-left: 3px;">分</div>
            </div>
          </div>
        </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>定員数
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
              <select name="capacity">
                <option value="30">30名</option>
                <option value="50">50名</option>
                <option value="100">100名</option>
                <option value="150">150名</option>
                <option value="200">200名</option>
                <option value="250">250名</option>
                <option value="300">300名</option>
              </select>
            </div>
          </div>
      </li>
      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>途中参加<br>締切時間
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--select__iconTime">
              <input type="text" name="reception_time" value="{{ old('reception_time') }}" placeholder="10:30" class="time_picker">
            </div>
          </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>案件番号
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full c-input--text">
              <input type="text" name="proposal_number" value="{{ old('proposal_number') }}" placeholder="案件番号">
            </div>
          </div>
        </div>
      </li>

      <li class="p-list__item">
        <div class="p-list__item__label">
          <span></span>クイズキー
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full">
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="quizKey_on" name="quizKey" type="radio" value="1" {{ old("quizKey") == "1" ? 'checked="checked"' : '' }}>
                  <label for="quizKey_on">あり</label>
                </div>
              </div>
              <span class="unit_min"></span>
              <div class="l-12__6">
                <div class="c-input c-input--radio">
                  <input id="quizKey_off" name="quizKey" type="radio" value="0" {{ old("quizKey") != "1" ? 'checked="checked' : '' }}>
                  <label for="quizKey_off">なし</label>
                </div>
              </div>
            </div>
          </div>
      </li>

      <li class="p-list__item c-vanish__3">
        <div class="p-list__item__label">
          <span></span>クイズキー<br>パスワード
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full c-input--text">
              <input type="password" name="quizKeyPassword" placeholder="6文字以上" readonly="readonly">
            </div>
            @if($errors->has('quizKeyPassword'))
              <div style="text-align: left; color: red;">{{ $errors -> first('quizKeyPassword') }}</div>
            @endif
          </div>
      </li>

      <li class="p-list__item c-vanish__3">
        <div class="p-list__item__label ">
          <span></span>クイズキー<br>パスワード確認用
        </div>
        <div class="p-list__item__data">
          <div class="l-12 l-12--gap8">
            <div class="c-input c-input--full c-input--text">
              <input type="password" name="quizKeyPassword_confirmation" placeholder="6文字以上" readonly="readonly">
            </div>
            @if($errors->has('quizKeyPassword_confirmation'))
              <div style="text-align: left; color: red;">{{ $errors -> first('quizKeyPassword_confirmation') }}</div>
            @endif
          </div>
      </li>
    </ul>
    <p class="p-list__heading p-list__heading--bottom">解説誘導</p>
      <ul class="p-list {{ $class ?? '' }}">
        <li class="p-list__item">
          <div class="p-list__item__label">
            <span></span>Link
          </div>
          <div class="c-input c-input--full c-input--text">
            <input type="text" name="induction_link" value="{{ old('induction_link') }}">
          </div>
        </li>
        <li class="p-list__item">
          <div class="p-list__item__label">
            <span></span>誘導バナー
          </div>
          <div class="p-list__item__data">
            <div class="c-input c-input--file">
              <label for="banner_path" id="main-banner" class="c-image c-image--round imageUpload" style="">
                <input id="banner_path" accept="image/*" enctype="multipart/form-data" class="file_img_preview"
                  name="induction_banner_file" type="file">
                <image id="banner_preview" class/>
                <input name="photo" type="hidden" value="">
              </label>
              <p class="p-recommend">推奨画像サイズ：縦450px 横270px以上(5:4)</p>
            </div>
          </div>
        </li>
      </ul>

      <p class="p-list__heading p-list__heading--bottom">twitter投稿説明</p>
        <ul class="p-list">
          <li class="p-list__item">
            <div class="p-list__item__label">
              <span></span>twitter投稿説明リンク
            </div>
            <div class="c-input c-input--full c-input--text">
              <input type="text" name="twitter_post_link" value="{{ old('twitter_post_link') }}">
            </div>
          </li>
          <li class="p-list__item">
            <div class="p-list__item__label">
              <span></span>twitter投稿説明画像
            </div>
            <div class="p-list__item__data">
              <div class="c-input c-input--file">
                <label for="twitter_post_image" id="twitter-image" class="c-image c-image--round imageUpload" style="">
                  <input id="twitter_post_image" accept="image/*" enctype="multipart/form-data" class="file_img_preview"
                    name="twitter_post_image" type="file">
                  <image id="twitter_image_preview" />
                </label>
                <p class="p-recommend">推奨画像サイズ：縦450px 横270px以上(5:4)</p>
              </div>
            </div>
          </li>
        </ul>
  </div>
</div>
<script>
  //Preview Thumbnail
  $("input[name=photo_file]").change((event) => {
    const [file] = $("input[name=photo_file]").prop('files');
    if(file){
      $('#main-image').addClass('c-input--file__clear');
      $('#photo_preview').attr('src', URL.createObjectURL(file)).addClass('c-input--file__image');
    }
  });

  $("input[name=twitter_post_image]").change((event) => {
    const [file] = $("input[name=twitter_post_image]").prop('files');
    if(file){
      $('#twitter-image').addClass('c-input--file__clear');
      $('#twitter_image_preview').attr('src', URL.createObjectURL(file)).addClass('c-input--file__image');
    }
  });
  $("input[name=induction_banner_file]").change((event) => {
    const [file] = $("input[name=induction_banner_file]").prop('files');
    if(file){
      $('#main-banner').addClass('c-input--file__clear');
      $('#banner_preview').attr('src', URL.createObjectURL(file)).addClass('c-input--file__image');
    }
  });

  //Quiz Key Readonly Toggle
  function quizKeyUpdate(){
    setting = $("input[name=quizKey]:checked").val();
    key_pass = $("input[name=quizKeyPassword]");
    key_confirm = $("input[name=quizKeyPassword_confirmation]");
    if(setting == '1'){
      key_pass.attr('readonly', false);
      key_confirm.attr('readonly', false);
    }else if(setting == '0'){
      console.log(setting);
      key_pass.val('');
      key_confirm.val('');
      key_pass.attr('readonly', true);
      key_confirm.attr('readonly', true);
    }

    return false;
  }
  //Initial Check if Validated
  quizKeyUpdate();
  $("input[name=quizKey]").change((e) => {
    quizKeyUpdate();
  });

</script>
