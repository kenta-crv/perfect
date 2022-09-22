<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\QuizInformation;
use App\Models\QuizQuestion;
use App\Models\ParticipateHistory;
use App\Models\QuizAnswer;
use App\Models\EventHistory;
use Log;

class QuizController extends Controller
{

    /**
     * 管理画面でクイズ開催するAPI
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hold(Request $request, QuizInformation $quiz)
    {
        $event_history = EventHistory::create([
            'quiz_id' => $quiz['id'],
        ]);

        try {
            return response()->json([
                'event_history' => $event_history,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    /**
     * 管理画面でクイズを再生するAPI
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, QuizInformation $quiz)
    {
        $data = $request->all();
        $questions = $quiz->questions;
        foreach($questions as $q){
            $q->fill([
                'display_status' => null,
                'answer_display_status' => null,
                'movie_flg' => null,
            ])->save();
        }
        $question =QuizQuestion::find($data['question_id']);
        $question->fill([
            'display_status' => 1,
            'movie_flg' => null,
            'answer_movie_flg' => null,
            'started_at' => date('Y-m-d H:i:s'),
        ])->save();


        //For Start Movie
        if($quiz->isStartMovie()){
            $quiz->start_movie_flg = null;
            $quiz->save();
        }

        try {
            return response()->json([
                'question' => $question,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    /**
     * 自動でクイズを再生するAPI
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function statusAuto(Request $request, QuizInformation $quiz)
    {
        $data = $request->all();
        $questions = $quiz->questions;
        foreach($questions as $q){
            $q->fill([
                'display_status' => null,
                'answer_display_status' => null,
                'movie_flg' => null,
            ])->save();
        }
        $question =QuizQuestion::find($data['question_id']);

        try {
            return response()->json([
                'question' => $question,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }


    /**
     * 管理画面で動画を再生するAPI
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function moviePlay(Request $request, QuizInformation $quiz)
    {
        $data = $request->all();
        $questions = $quiz->questions;
        foreach($questions as $q){
            $q->fill([
                'display_status' => null,
                'answer_display_status' => null,
            ])->save();
        }
        $question =QuizQuestion::find($data['question_id']);
        $question->fill([
            'display_status' => 1,
            'movie_flg' => 1,
        ])->save();

        try {
            return response()->json([
                'question' => $question,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }



    /**
     * 管理画面でクイズ結果動画を再生するAPI
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function movieAnswerPlay(Request $request, QuizInformation $quiz)
    {
        $data = $request->all();
        $questions = $quiz->questions;
        foreach($questions as $q){
            $q->fill([
                'answer_display_status' => null,
                'display_status' => null,
                'answer_movie_flg' => null,
            ])->save();
        }
        $question =QuizQuestion::find($data['question_id']);
        $question->fill([
            'display_status' => 1,
            'answer_display_status' => 1,
            'answer_movie_flg' => 1,
        ])->save();

        try {
            return response()->json([
                'question' => $question,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }


    /**
     * 管理画面でクイズ結果を表示するAPI
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function displayAnswer(Request $request, QuizInformation $quiz)
    {
        $data = $request->all();

        $questions = $quiz->questions;
        foreach($questions as $q){
            $q->fill([
                'answer_display_status' => null,
                'display_status' => null,
                'answer_movie_flg' => null,
            ])->save();
        }

        $question =QuizQuestion::find($data['question_id']);
        $question->fill([
            'answer_display_status' => 1,
            'display_status' => 1,
        ])->save();


        try {
            return response()->json([
                'question' => $question,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    /**
     * クイズの並びを変更
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request, $id)
    {
        $input = $request->all();
        $records = QuizQuestion::where('quiz_id', $id)->get();

        try {
            $sorted_records = [];
            foreach($input['quizList'] as $key => $seq) {
                foreach($records as $index => $record) {
                    if ($record->seq == $seq && !in_array($record->id, $sorted_records, true)) {
                        $record->update(['seq' => $key + 1]);
                        $sorted_records[] = $record->id;
                    }
                }
            }
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return response()->json(['status' => $message]);
        }
    }
}
