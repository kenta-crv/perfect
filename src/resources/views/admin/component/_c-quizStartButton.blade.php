@if($clientDate->greaterThan($endDate))
  <div class="header-danger radius-01">
    ご参加いただきありがとうございました
  </div>
@else

  @if($clientDate->greaterThan($receptionDate))
    <div class="header-danger radius-01">
      参加受付が終了しました
    </div>
  @else

    @if($clientDate->gte($availableDate) && $clientDate->gte($startDate))
      @guest
        @if($quiz->isMemberOnly())
        <a href="{{  route('web.user.quiz', $quiz )}}" class="header-danger radius-01" >会員限定クイズ</a>
        @else
          <a data-remodal-target="{{ $quiz->key_password ? 'modal_password' : 'modal_nickname' }}" class="header-danger radius-01" >開始する</a>
        @endif
      @else
        @if(!$quiz->key_password)
            <a href="{{route('quiz.confirmation', $quiz)}}" class="header-danger radius-01">
              開始する
            </a>
        @else
          <a data-remodal-target="modal_password" class="header-danger radius-01" >開始する</a>
        @endif
      @endguest
    @else
      <div class="header-danger radius-01">
        開始までお待ちください
      </div>
    @endif

  @endif

@endif
