<?php

namespace App\Traits;

use App\Models\User;
use App\Models\QuizInformation;
use App\Models\ParticipateHistory;

trait UserTrait
{

    /**
     * Get All Events The User Participated
     *
     * @param User $user
     * @return array
     */
    public function eventsParticipated(User $user)
    {
        $query = ParticipateHistory::whereHas('eventHistory.quiz', function($quiz){
            // $quiz->whereNotNull('event_id');
            // $quiz->where('event_id', '!=', 0);
            // $quiz->select('event_id')->distinct();
            $quiz->whereNotNull('end_date');
            $quiz->whereIn('category_id',  [1,2]);
            // $quiz->where('status', 1);
            // $quiz->where('status',  6);
            // $quiz->select('category_id')->distinct();
        })->get()->where('user_id', $user->id);
        // $query = ParticipateHistory::whereHas('eventHistory.quiz', function($quiz){
        //     $quiz->whereNotNull('event_id');
        //     $quiz->where('event_id', '!=', 0);
        //     $quiz->select('event_id')->distinct();
        //     $quiz->where('end_date', '>', date('Y-m-d'));
        //     // $quiz->where('status', 1);
        // })->get()->where('user_id', $user->id);
        // // })->get()->where('user_id', $user->id)->unique('eventHistory.quiz.event_id');

        return $query;
    }

    public function eventsParticipatedEnding(User $user)
    {
        $query = ParticipateHistory::whereHas('eventHistory.quiz', function($quiz){
            // $quiz->whereNotNull('event_id');
            // $quiz->where('event_id', '!=', 0);
            // $quiz->select('event_id')->distinct();
            $quiz->where('end_date', '<=', date('Y-m-d'));
            $quiz->whereIn('category_id',  [1,2]);
            // $quiz->where('status', 1);
            // $quiz->select('event_id')->distinct();
            // $quiz->select('end_date')->distinct();
        })->get()->where('user_id', $user->id);
        // })->get()->where('user_id', $user->id)->unique('eventHistory.quiz.event_id');

        return $query;
    }

    public function quizzesParticipatedOfficialQuiz(User $user)
    {
        $query = ParticipateHistory::whereHas('eventHistory.quiz', function($quiz){
            $quiz->whereNotNull('event_id');
            $quiz->where('event_id', '!=', 0);
            $quiz->select('event_id')->distinct();
            // $quiz->whereNotNull('end_date');
            // $quiz->where('category_id',  1);
            // $quiz->where('status', 1);
            // $quiz->select('category_id')->distinct();
        })->get()->where('user_id', $user->id);

        return $query;
    }

    public function quizzesParticipatedeveryoneQuiz(User $user)
    {
        $query = ParticipateHistory::whereHas('eventHistory.quiz', function($quiz){
            $quiz->where(function($query) {
                $query->where('event_id', 0)
                ->orWhereNull('event_id');
            });
            // $quiz->whereNotNull('end_date');
            $quiz->where('category_id',  2);
            // $quiz->where('status', 1);
            // $quiz->where('status',  6);
            // $quiz->select('category_id')->distinct();
        })->get()->where('user_id', $user->id);

        return $query;
    }

    public function quizzesParticipated(User $user)
    {
        $query = ParticipateHistory::where('user_id', $user->id)->get();

        return $query;
    }

    /**
     * Get ALL Quizzes with No Events The User Participated
     *
     * @param User $user
     * @return array
     */
    public function nonEventsParticipated(User $user)
    {
        $query = ParticipateHistory::whereHas('eventHistory.quiz', function($quiz){
            $quiz->where('event_id', 0);
        })->get()->where('user_id', $user->id);

        return $query;
    }

    /**
     * Get ALL Quiz participation which the user created
     *
     * @param User $user
     * @return void
     */
    public function ownQuizzesParticipated(User $user)
    {
        $query = ParticipateHistory::whereHas('eventHistory.quiz', function($quiz) use ($user){
            $quiz->where('created_user_id', $user->id);
        })->get();

        return $query;
    }

    public function userSearch($request)
    {
        //Search Request
        $dateFrom = "";
        $dateTo = "";
        $keyword = "";

        //Query Init
        $isFrom = isset($request['date_from']) && $request['date_from'] != null;
        $isTo = isset($request['date_to']) && $request['date_to'] != null;
        $isKeyword = isset($request['keyword']) && $request['keyword'] != null;
        $hasSearch = $isFrom || $isTo || $isKeyword;

        // Start Search
        $users = User::query()->orderBy('created_at', 'DESC');

        if ( $isKeyword ){
            $keyword = $request['keyword'];
            $fuzzySearch = "%$keyword%";

            $users = $users->where(function($query) use ($fuzzySearch) {
                //Name
                $query->where('last_name', 'like binary', $fuzzySearch)
                ->orWhere('first_name', 'like binary', $fuzzySearch)
                ->orWhere('last_name_kana', 'like binary', $fuzzySearch)
                ->orWhere('first_name_kana', 'like binary', $fuzzySearch)
                ->orWhere('nickname', 'like binary', $fuzzySearch)
                // Address
                ->orWhere('address', 'like binary', $fuzzySearch)
                ->orWhere('small_address', 'like binary', $fuzzySearch);
            });

            $prefecture_id = array_keys(config('prefecture.PREFECTURE'), $keyword);
            if($prefecture_id){
                // Prefecture
                $users = $users->union(User::where('prefecture', $prefecture_id));
            }
        }

        if ( $isFrom ){
            $dateFrom = $request['date_from'];
            $users = $users->whereDate('birth_date', '>=', $dateFrom);
        }
        if ( $isTo ){
            $dateTo = $request['date_to'];
            $users = $users->whereDate('birth_date', '<=', $dateTo);
        }

        //Paginate
        $users = $users->paginate(13);

        if($hasSearch){
            $users->appends(['date_from' => $dateFrom, 'date_to' => $dateTo, 'keyword' => $keyword]);
        }
        return [
            'users' => $users,
            'queries' => ['date_from' => $dateFrom, 'date_to' => $dateTo, 'keyword' => $keyword]
        ];
    }
}
