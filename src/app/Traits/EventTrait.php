<?php
namespace App\Traits;

use App\Models\Event;
use Storage;


trait EventTrait
{
    /**
     * Store Image to Cloud s3
     *
     * @param Array $request
     * @return Array $result
     */
    public function eventStoreImage($request)
    {
        if(isset($request['photo_file']) || isset($request['edit_photo_file'])){
          $file = isset($request['photo_file']) ? $request['photo_file']:$request['edit_photo_file'];
          $fileName = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 16);
          try {
              $url = Storage::disk('s3')->putFile('/event/image', $file, $fileName);
              $path = Storage::disk('s3')->url($url ? $url : '');
              $photo_path = "event/image/" . mb_substr($path ? $path : '', mb_strrpos($path ? $path : '', "/") + 1);
          } catch (Exception $e) {
              $photo_path = '';
          }
        }

        return $photo_path;
    }

    /**
     * Store edited event
     *
     * @param array $request
     * @return
     */
    public function eventEdit($request, $id)
    {
      $event = Event::find($id);
      $updateParams = [
        'title' => isset($request['title']) ? $request['title']:null,
        'description' => isset($request['description']) ? $request['description']:null,
        'start_date' => isset($request['start_date']) ? $request['start_date']:null,
        'start_time' => isset($request['start_time']) ? $request['start_time']:null,
        'end_date' => isset($request['end_date']) ? $request['end_date']:null,
        'end_time' => isset($request['end_time']) ? $request['end_time']:null,
        'status' => isset($request['status']) ? $request['status']:null
      ];
    }

    /**
     * Event search
     * @param array $request
     * @return Array $result
     */
    public function eventSearch($request)
    {
      // Search Request
      $dateFrom = "";
      $dateTo = "";
      $keyword = "";

      // Query Init
      $isFrom = isset($request['date_from']) && $request['date_from'] != null;
      $isTo = isset($request['date_to']) && $request['date_to'] != null;
      $isKeyword = isset($request['keyword']) && $request['keyword'] != null;
      $hasSearch = $isFrom || $isTo || $isKeyword;

      //
      $events = Event::orderBy('created_at', 'desc');

      if ( $isKeyword ) {
        $eventOrWhere = Event::orderBy('created_at', 'desc');
        $keyword = $request['keyword'];
        $fuzzySearch = "%$keyword%";
        $events = $events->where('title', 'like binary', $fuzzySearch);
        $eventOrWhere = $eventOrWhere->where('description', 'like binary', $fuzzySearch);
      }

      if ( $isFrom ) {
        $dateFrom = $request['date_from'];
        $events = $events->whereDate('start_date', '>=', $dateFrom);

        if ( isset($eventOrWhere) ) {
          $eventOrWhere->whereDate('start_date', '>=', $dateFrom);
        }
      }

      if ( $isTo ) {
        $dateTo = $request['date_to'];
        $events = $events->whereDate('start_date', '<=', $dateTo);

        if ( isset($eventOrWhere) ) {
          $eventOrWhere->whereDate('start_date', '<=', $dateTo);
        }
      }

      if(isset($quizzesOrWhere)){
        $events = $events->union($eventOrWhere)->paginate(12);
      }else{
        $events = $events->paginate(12);
      }

      if ( $hasSearch ) {
        $events->appends(['date_from' => $dateFrom, 'date_to' => $dateTo, 'keyword' => $keyword]);
      }

      return [
        'events' => $events,
        'queries' => ['date_from' => $dateFrom, 'date_to' => $dateTo, 'keyword' => $keyword]
      ];
    }
}