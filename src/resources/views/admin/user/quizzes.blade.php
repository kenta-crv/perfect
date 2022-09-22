@extends('admin.layout.layout--admin')
@section('title', $title ?? '作成クイズ')
@section('content')
  @component('admin.component._p-detail')
    @slot('back')
      {{route('admin.user.show', $user)}}
    @endslot
    @slot('title')
      作成クイズ一覧
    @endslot
    @slot('action')
    <div class="p-text p-text--narrow p-text--marginRight">
      <p class="c-text__lv5">クイズ数 :</p>
      <p class="c-text__lv5">{{ $quizzes->total() }}件</p>
    </div>
    <div class="p-buttonWrap">
      <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
      {{--  <a class="c-button c-button--deep-blue" id="copy">問題複製</a>
      <a class="c-button c-button--sub c-button--wide" href="{{route('admin.quiz.new')}}">クイズ新規登録</a>  --}}
    </div>
    @endslot
    @slot('body')
    {{--  <form action="{{route('admin.quiz.index')}}">
      <div class="p-filter">
        <div class="p-filter__main">
          <ul class="p-filter__list">
            <li class="p-filter__list__item">
              <div class="p-filter__list__item__label">ステータス</div>
              <div class="p-filter__list__item__data">
                <div class="c-input c-input--select c-input--select__iconTriangle">
                  <select name="is_public">
                    <option value="0">すべて</option>
                    <option value="1" >公開</option>
                    <option value="2" >非公開</option>
                  </select>
                </div>
              </div>
            </li>
            <li class="p-filter__list__item">
              <div class="p-filter__list__item__label">日付</div>
              <div class="p-filter__list__item__data">
                <ul class=" p-filter__list__item__data__flex">
                  <li>
                    <div class="c-input c-input--half c-input--date">
                      <input type="text" name="date_from" placeholder="---" class="flatpickr ">
                    </div>
                  </li>
                  <p>~</p>
                  <li>
                    <div class="c-input c-input--half c-input--date">
                      <input type="text" name="date_to" placeholder="---" class="flatpickr ">
                    </div>
                  </li>
                  <li>
                    <div class="c-input c-input--keyword">
                      <input type="text" name="keyword" placeholder="キーワードで絞り込む" style="padding: 0px 8px 0 30px;">
                    </div>
                  </li>
                </ul>
                </div>
            </li>
          </ul>
        </div>
        <div class="p-filter__sub">
          <button class="c-button c-button--medium">絞り込む</button>
        </div>
      </div>
    </form>  --}}
    <div class="p-tableSet">
      <div class="p-tableSet__body">
        <table class="p-table">
          <thead class="p-table__head">
            <tr class="p-table__head__tableRow">
              @foreach([
                /**[
                  'label' => '複製',
                  'type' => 'auto',
                ],**/
                [
                  'label' => 'イベント',
                  'type' => 'auto',
                ],
                [
                  'label' => 'DMM管理番号',
                  'type' => 'auto',
                ],
                [
                  'label' => 'クイズタイトル',
                  'type' => 'auto',
                ],
                [
                  'label' => 'ステータス',
                  'type' => 'statuts',
                ],
                [
                  'label' => '作成者名',
                  'type' => 'statuts',
                ],
                [
                  'label' => '開始日時',
                  'type' => 'dateTime',
                ],
                [
                  'label' => 'クイズ問題数',
                  'type' => 'count',
                ],
                [
                  'label' => '解答秒数',
                  'type' => 'second',
                ],
                [
                  'label' => 'twitter共有',
                  'type' => 'image',
                ],
              ] as $key => $val)
              <th class="p-table__tableHead {{'p-table__tableHead'.$val['type']}}">
                <div class="p-table__item">{{$val['label']}}</div>
              </th>
              @endforeach
            </tr>
          </thead>
          <tbody class="p-table__data">
            @foreach ($quizzes as $quiz)
            {{--  <tr>
              <td class="p-table__tableData" rowspan="2">
                <div class="p-table__item">
                  <input type="checkbox" value="{{$quiz['id']}}">
                </div>
              </td>
            </tr>  --}}
            <tr class="p-table__data__tableRow" data-href="{{route('admin.'.$quiz->category_route.'.show', $quiz)}}">
              <td class="p-table__tableData">
                <div class="p-table__item">
                  @foreach($events as $event)
                    @if($event['id'] == $quiz['event_id'])
                      {{ $event['title'] }}
                    @endif
                  @endforeach
                </div>
              </td>
              <td class="p-table__tableData">
                  <div class="p-table__item">
                    {{ isset($quiz['proposal_number']) ? $quiz['proposal_number'] : '-' }}
                  </div>
                </a>
              </td>
              <td class="p-table__tableData">
                  <div class="p-table__item">
                    {{$quiz['title']}}
                  </div>
                </a>
              </td>
              <td class="p-table__tableData">
                  <div class="p-table__item">
                    @if($quiz->questions()->count() == 0)
                      <p class="p-table__item p-table__item--danger">問題未登録</p>
                    @else
                      @if($quiz['status'] == 1)
                        <p class="p-table__item p-table__item--release">　公開中　</p>
                      @elseif($quiz['status'] == 3)
                        <p class="p-table__item p-table__item--gray">　終　了　</p>
                      @else
                        <p class="p-table__item p-table__item--private">　非公開　</p>
                      @endif
                    @endif
                  </div>
                </a>
              </td>
              <td class="p-table__tableData">
                  <div class="p-table__item">
                    {{$quiz['created_company_name']}}
                  </div>
                </a>
              </td>
              <td class="p-table__tableData">
                  <div class="p-table__item">
                    {{$helper->format_date($quiz['start_date'])}} {{$helper->format_time($quiz['start_time'])}}-
                  </div>
                </a>
              </td>
              <td class="p-table__tableData">
                  <div class="p-table__item">
                  {{$quiz['registered_questions']}}件
                  </div>
                </a>
              </td>
              <td class="p-table__tableData">
                  <div class="p-table__item">
                    {{$quiz['answer_time']}}秒
                  </div>
                </a>
              </td>

              <td class="p-table__tableData">
                <div class="p-table__item">
                  @if($quiz->twitter)
                    <img src="{{ asset('image/logo/twitter.png') }}" style="height: 13px;">
                  @else
                    <img src="{{ asset('image/logo/twitter_gray.png') }}" style="height: 13px;">
                  @endif
                </div>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="p-tableSet__foot">
        <div class="p-bread">
          {{ $quizzes->links("pagination::default") }}
        </div>
      </div>
    </div>
    @endslot
  @endcomponent

  <script>
    var hasRequest = false;

    $('#copy').click(function(e) {
      e.preventDefault();

      const checked = $('input:checked');
      let _token   = $('input[name="csrf-token"]').val();

      //Check if Not Empty
      if(checked.length != 0 && !hasRequest){
        hasRequest = true
        $(this).addClass('c-button--secondary').removeClass('c-button--deep-blue');
        var copy_array = [];

        checked.each(function (index){
          copy_array.push($(this).val());
        });

        //Replicate Request
        $.ajax({
          type : "POST",
          url : '{{ route('admin.quiz.copy') }}',
          data: {
            copy_array,
            _token,
          },
        })
        .done((res)=>{

          if(res){
            var asset_index = 1;

            res.forEach(async (assets) => {
              if(assets.quiz){
                console.log('copying quiz assets');
                await copyAssets(assets.quiz, 'quiz')
              }

              if(assets.questions.length > 0){
                console.log('copying questions assets');
                questions = await copyAssets(assets.questions, 'question');
                while(questions.data.length > 0){
                  questions = await copyAssets(questions.data, 'question');
                }
              }

              if(assets.choices.length > 0){
                console.log('copying choices assets');
                choices =  await copyAssets(assets.choices, 'choice');
                while(choices.data.length > 0){
                  choices = await copyAssets(choices.data, 'choice');
                }
              }

              if(asset_index == res.length){
                hasRequest = false;
                $(this).addClass('c-button--deep-blue').removeClass('c-button--secondary');
                setTimeout(function(){ window.location.reload(); }, 500);
              }else{
                asset_index++;
              }

            });
          }
        })
        .fail((error)=>{
          hasRequest = false;
          $(this).addClass('c-button--deep-blue').removeClass('c-button--secondary');
          console.log('エラーが発生しました。');
        });
      }
    });

    function copyAssets(data, type){
      var response  = {};

      let _token = $('input[name="csrf-token"]').val();
      return $.ajax({
        type : "POST",
        url : '{{ route('admin.quiz.copyAssets') }}',
        data: {
          data,
          type,
          _token,
        }
      }).done((res) => {
        console.log(type + ' finished');
      }).fail(() => {
        console.log('エラーが発生しました。クイズ');
      });
    }

    $('td[data-href]').addClass('clicklink')
    .click(function(e) {
    window.location = $(e.target).data('href');
    });
  </script>
@endsection
