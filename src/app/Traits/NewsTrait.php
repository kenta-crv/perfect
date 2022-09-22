<?php

namespace App\Traits;

use App\Models\News;

trait NewsTrait
{
  /**
   * News search
   *
   * @param Array $request
   * @return Array $result
   */
  public function newsSearch($request)
  {
    // Search Request
    $isPublic = "";
    $dateFrom = "";
    $dateTo = "";
    $keyword = "";

    // Query Init
    $isStatus = isset($request['is_public']) && $request['is_public'] != '0';
    $isFrom = isset($request['date_from']) && $request['date_from'] != null;
    $isTo = isset($request['date_to']) && $request['date_to'] != null;
    $isKeyword = isset($request['keyword']) && $request['keyword'] != null;
    $hasSearch = $isStatus || $isFrom || $isTo || $isKeyword;

    // Start Search
    $news = News::orderBy('created_at', 'desc')->where('user_id', null);

    if ( $isKeyword ) {
      $newsOrWhere = News::orderBy('created_at', 'desc');
      $keyword = $request['keyword'];
      $fuzzySearch = "%$keyword%";
      $newsOrWhere = $newsOrWhere->where('body', 'like binary', $fuzzySearch);
      $news = $news->where('title', 'like binary', $fuzzySearch);
    }

    if ( $isFrom ) {
      $dateFrom = $request['date_from'];
      $news = $news->whereDate('release_date', '>=', $dateFrom);

      if (isset($newsOrWhere)) {
        $newsOrWhere->whereDate('release_date', '>=', $dateFrom);
      }
    }

    if ( $isTo ) {
      $dateTo = $request['date_to'];
      $news = $news->whereDate('release_date', '<=', $dateTo);

      if (isset($newsOrWhere)) {
        $newsOrWhere->whereDate('release_date', '<=', $dateTo);
      }
    }

    if( $isStatus ){
        if( $request['is_public'] == '1' ){
            $status = 1;
            $isPublic = "1";
        }elseif( $request['is_public'] == '2'){
            $status = 2;
            $isPublic = "2";
        }

        $news = $news->where('status', $status);

        if(isset($newsOrWhere)){
            $newsOrWhere->where('status', $status);
        }
    }

    if ( isset($newsOrWhere) ) {
      $news =  $news->union($newsOrWhere)->paginate(14);
    }else{
      $news = $news->paginate(14);
    }

    if ( $hasSearch ) {
      $news->appends(['is_public' => $isPublic, 'date_from' => $dateFrom, 'date_to' => $dateTo, 'keyword' => $keyword]);
    }

    return [
      'news' => $news,
      'queries' => ['is_public' => $isPublic, 'date_from' => $dateFrom, 'date_to' => $dateTo, 'keyword' => $keyword]
    ];
  }
}