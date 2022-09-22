@extends('web.layouts.layout')

@section('content')
<div vlass="p-problem">
  <!--クイズ開始前 -->
  <div class="p-quiz__check">
    <div class="p-quiz__check__head">
      <div class="title">
        <p>同意確認</p>
      </div>
    </div>
    <div class="p-quiz__check__body">
      <div class="l-container__sp">
        <div class="p-quiz__check__body__wall">
          <div class="title">
            <p>サービスを継続してご利用するには、新しいご利用規約とプライバシーポリシーに同意する必要があります。このアカウントのご利用規約またはプライバシーポリシーが更新されています。
サービスを継続してご利用するには、新しいご利用規約とプライバシーポリシーに同意する必要があります。このアカウントのご利用規約またはプライバシーポリシーが更新されています。
サービスを継続してご利用するには、新しいご利用規約とプライバシーポリシーに同意する必要があります。このアカウントのご利用規約またはプライバシーポリシーが更新されています。</p>
          </div>
          <div class="f-checkbox">
            <input id="package_2" title="" price="169800" data-categories="[222,223,224,225]" name="package_ids[]" type="checkbox" value="2">
            <label for="package_2">
            <span class="name">上記内容に同意する</span>
            </label>
          </div>
      </div>
    </div>
  </div>
</div>

{{ Form::open(['route' => ['quiz.participate', $quiz], 'method' => 'post', 'id' => 'postAnswer']) }}
  <div class="p-show__action">
    <div class="p-show__action__start__buttonArea">
      <button type="submit" class="c-button c-button--zero">開始する</button>
    </div>
  </div>
{{Form::close()}}
</div>


@endsection
