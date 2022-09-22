@extends('admin.layout.layout--admin')
@section('title', $title ?? 'ヘルプ管理')
@section('content')
  @component('admin.component._p-index')
    @slot('body')

    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <span class="grn-txt mgn-r-2 top-link-nav">ホーム</span>
      <div class="a-page-title-2">
        <span>ガイド</span>
      </div>
    </div>
    <div class="grn-txt-cont mgn-t-5 mgn-b-2">
      <form method="post" action="{{ route('admin.guide.uploadImageGuide') }}" enctype="multipart/form-data">
      @csrf
      <div>
        <label class="guide_choose_file" for="" >マニュアル</label>
        <label class="guide_choose_file-2" for="fileUpload" id="labelUpload">No file chosen.</label>
      <input type="file" class="file_upload_edit" id="fileUpload" accept="image/*" name="file" accept=".pdf">
      <button class="guide_upload_file" type="submit">差替えアップロード</button>
    </div>
      </form>
    </div>



    <div class="c-main-box active-cont">
      <div class="c-main-body">
        <div class="setting-right">
          <div class="mgn-l-ato">
            <a href="{{url('admin/guide/addform')}}" class='manual_help'>ガイドを追加</a>
          </div>
        </div>
        <div class="c-list-tbl">
          <table>
          <tr>
            <th class="th-thead-table">ガイド名</th>
            <th class="th-thead-table">場所</th>
            <th class="th-thead-table">ガイド内容</th>
            <th class="th-thead-table">アクション</th>
          </tr>

          @foreach($guides as $guide)
          <tr>
            <td class="td-help-tbody">{{ $guide->guide_name }}</td>
            <td class="td-help-tbody-2">{{ $guide->guide_place }}</td>
            <td class="td-help-tbody-2"><pre><span>{!! $guide->guide_body !!}</span></pre></td>
            <td class="td-help-tbody"><a type="submit"class="c-button mgn-r-2 c_button_adjust" href="{{url('admin/guide/editGuide/'. $guide->id)}}" >編集</a></td>
          </tr>
          @endforeach


          </table>
          @if($guides->isEmpty())
            <div class="foot_3">
              <div class="p-login__buttonArea">
                <span>ガイドレコードは空です</span>
              </div>
          </div>
          @endif
          </div>
      </div>
   </div>

    @endslot
  @endcomponent
  <script>
    $('#fileUpload').on('change', function() {
       var fileName = ''; 
       fileName = this.files[0]. name; 
       $('#labelUpload').html(fileName); }) 
  </script>
@endsection


