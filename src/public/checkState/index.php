<?php

// ドライバ呼び出しを使用して MySQL データベースに接続します
$dsn = 'mysql:dbname=acepro;charset=utf8;host=aceproquiz.cdxjalwxswdr.ap-northeast-1.rds.amazonaws.com';
$user = 'admin';
$password = 'V3aHcQxGUHpL';

// Local
// $dsn = 'mysql:dbname=app;charset=utf8mb4;host=db;port=3306';
// $user = 'user';
// $password = 'password';

try {

    $dbh = new PDO($dsn, $user, $password);

    $state = null;

    //エース追記
    $response = array();

    $quiz_id = $_POST['quiz_id'];
    //---------------------------------
    //最後のイベントを取得
    $sql = 'SELECT * FROM event_histories WHERE quiz_id = :qid ORDER BY created_at DESC;';
    $prepare = $dbh->prepare($sql);
    $prepare->bindValue(':qid', $quiz_id, PDO::PARAM_INT);
    $prepare->execute();

    $resulthistory = $prepare->fetchAll(PDO::FETCH_ASSOC);
    //---------------------------------
    session_start();
    $session = $_SESSION['participate_history'] ?? null;

    if($session == null || $session['event_history_id'] != $resulthistory[0]['id']){
        $state = "deleted";
    //     /*return response()->json($state, 200);*/

        // $response['state'] = $state;
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($state);
        exit();
    }

    //---------------------------------
    //クイズ情報を取得
    $sql = 'SELECT * FROM quiz_informations WHERE id = :qid;';
    $prepare = $dbh->prepare($sql);
    $prepare->bindValue(':qid', $quiz_id, PDO::PARAM_INT);
    $prepare->execute();

    $qinforesult = $prepare->fetchAll(PDO::FETCH_ASSOC);
    //---------------------------------

    if ((!$qinforesult[0]['finished_at'] && $qinforesult[0]['started_at']) && !$qinforesult[0]['end_movie_flg']) {

        //---------------------------------
        $sql = 'SELECT *,quiz_questions.id AS qid,quiz_questions.seq AS seq FROM quiz_questions
            LEFT JOIN quiz_informations ON quiz_informations.id = quiz_questions.quiz_id
            LEFT JOIN event_histories ON event_histories.quiz_id = quiz_informations.id
            WHERE event_histories.id = :id
            AND quiz_questions.display_status = 1;';

        $prepare = $dbh->prepare($sql);
        $prepare->bindValue(':id', $resulthistory[0]['id'], PDO::PARAM_INT);

        $prepare->execute();

        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        //--------------------------------


        if (!empty($result) && $result[0]) {
            if (!$result[0]['answer_display_status']) {
                if (!$result[0]['movie_flg'] == 1) {
                    $state = "quiz/" . $quiz_id . "/question/" . $result[0]['qid'] . "/display";
                    $response['view'] = "display";
                } else {
                    $state = "quiz/" . $quiz_id . "/question/" . $result[0]['qid'] . "/displayMovie";
                    $response['view'] = "displayMovie";
                }
            } else {

                if (!$result[0]['answer_movie_flg']) {
                    $state = "quiz/" . $quiz_id . "/question/" . $result[0]['qid'] . "/answer";
                    $response['view'] = "answer";

                    //----------------------------------
                    //回答結果を取得
                    // ユーザー回答
                    $sql = 'SELECT is_answer  FROM quiz_answers
                    WHERE participation_history_id = :pid
                    AND question_id = :qid;';

                    $prepare = $dbh->prepare($sql);
                    $prepare->bindValue(':pid', $session['id'], PDO::PARAM_INT);
                    $prepare->bindValue(':qid', $result[0]['qid'], PDO::PARAM_INT);

                    $prepare->execute();

                    $answer = $prepare->fetchAll(PDO::FETCH_ASSOC);
                    /*$answer = QuizAnswer::my($session['id'])
                        ->question($question['id'])
                        ->first();*/
                    //----------------------------------

                } else {
                    $state = "quiz/" . $quiz_id . "/question/" . $result[0]['qid'] . "/answerMovie";
                    $response['view'] = "answerMovie";
                }

            }

        }
    }elseif ($qinforesult[0]['finished_at']) {
        $state = "quiz/" . $qinforesult[0]['id'] . "/question/finish";
        $response['view'] = "finish";
    }

    if ($qinforesult[0]['end_movie_flg']){
        $state = "quiz/" . $qinforesult[0]['id'] . "/question/endMovie";
        $response['view'] = "endMovie";
    } elseif ($qinforesult[0]['start_movie_flg']){
        $state = "quiz/" . $qinforesult[0]['id'] . "/question/startMovie";
        $response['view'] = "startMovie";
    }

    //----------------------------------
    $response['state'] = $state;

    if(!empty($qinforesult)){
        $response['quizid'] = (int) $qinforesult[0]['id'];
    }else{
        $response['quizid'] = '';
    }

    if(!empty($result[0])){
        $response['questionseq'] = (int) $result[0]['seq'];
    }else{
        $response['questionseq'] = '';
    }

    if(!empty($answer[0])){
        $response['answer'] = $answer[0]['is_answer'] == "1" ? true : false;
    }else{
        $response['answer'] = '';
    }
    //----------------------------------

    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($response);

} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}
