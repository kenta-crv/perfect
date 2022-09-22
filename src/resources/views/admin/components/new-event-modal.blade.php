<div class="p-list__item__input">
  <label for="title">タイトル</label>
  <div class="c-input c-input--full c-input--text">
    <input type="text" name="title" id="title" placeholder="タイトル">
  </div>
  @include('web.layouts.error', ['name' => 'title'])
</div>
<div class="p-list__item__input">
  <label for="title">説明</label>
  <div class="c-input c-input--full c-input--text">
    <textarea name="description" id="description" placeholder="イベント説明" row="5" col="50" style="border: 0.8px solid #4A4A4A;"></textarea>
  </div>
  @include('web.layouts.error', ['name' => 'description'])
</div>
<div class="p-list__item__input">
  <label for="start_date">開催期間</label>
  <div class="p-list__item">
    <div class="c-input c-input--select__iconCalendar">
      <input type="text" name="start_date" id="start_date" class="flatpickr" placeholder="2021/10/30" required>
    </div>
    <div class="c-input c-input--select__iconTime">
      <input type="text" name="start_time" class="time_picker" placeholder="10:30" required>
    </div>
  </div>
</div>
@include('web.layouts.error', ['name' => 'start_date'])
@include('web.layouts.error', ['name' => 'start_time'])
<div class="p-list__item__input">
  <label for="end_date">~</label>
  <div class="p-list__item">
    <div class="c-input c-input--select__iconCalendar">
      <input type="text" name="end_date" id="end_date" class="flatpickr" placeholder="2021/10/30" required>
    </div>
    <div class="c-input c-input--select__iconTime">
      <input type="text" name="end_time" class="time_picker" placeholder="10:30" required>
    </div>
  </div>
</div>
@include('web.layouts.error', ['name' => 'end_date'])
@include('web.layouts.error', ['name' => 'end_time'])
<div class="p-list__item__input">
  <label for="status">ステータス</label>
  <div class="p-list__item">
    <div class="c-input c-input--select c-input--select__iconSelect c-input--icon">
      <select name="status" id="status">
        <option value="1">開催前</option>
        <option value="2">開催中</option>
        <option value="3">終了済</option>
      </select>
    </div>
    @include('web.layouts.error', ['name' => 'status'])
  </div>
</div>
<div class="p-list__item__input">
  <label for="thumbnail">サムネイル</label>
  <div class="c-input c-input--file" style="width: 50%;">
    <label for="thumbnail__main" id="thumbnail-image" class="c-image c-image--round imageUpload" style="">
      <input id="thumbnail__main" accept="image/*" enctype="multipart/form-data" class="file_img_preview"
        name="photo_file" type="file">
      <image id="photo_preview"/>
      <input name="photo" type="hidden" value="">
    </label>
    <p class="p-recommend">推奨画像サイズ：縦450px 横270px以上(5:4)</p>
  </div>
</div>
