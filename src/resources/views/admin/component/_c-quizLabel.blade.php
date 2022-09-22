@if($question->quiz_category_id == '1' && $question->answer_type == '1')
{{ __('テキスト問題(テキスト解答)') }}

@elseif($question->quiz_category_id == '1' && $question->answer_type == '2')
{{ __('テキスト問題(画像解答)') }}

@elseif($question->quiz_category_id == '3' && $question->answer_type == '1')
{{ __('画像問題(テキスト解答)') }}

@elseif($question->quiz_category_id == '3' && $question->answer_type == '2')
{{ __('画像問題(画像解答)') }}

@elseif($question->quiz_category_id == '4' && $question->answer_type == '1' && !$question->answer_movie_flg)
{{ __('動画問題(テキスト解答)') }}

@elseif($question->quiz_category_id == '4' && $question->answer_type == '2' && !$question->answer_movie_flg)
{{ __('動画問題(画像解答)') }}

@elseif($question->quiz_category_id == '4' && $question->answer_type == '1' && $question->answer_movie_flg == '1')
{{ __('動画問題(動画＋テキスト解答)') }}

@elseif($question->quiz_category_id == '4' && $question->answer_type == '2' && $question->answer_movie_flg == '1')
{{ __('動画問題(動画＋画像解答)') }}

@endif
