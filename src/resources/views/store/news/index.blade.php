@extends('store.layouts.layout-news-home')
@section('title', $title ?? 'お知らせ')
@section('content')
@component('admin.component._p-index_news')
@slot('body')
<div class="c-contianer-box_news">
  <div class="box-data">
    <div class="container-table margin-top--01">
        <div class="container_4">
            <div class="mySlides_7">
                <div class="data-infoes margin-left--auto">
                    <div class="nav-list mgn-t-7">
                        <span class="top-link">Top</span> <span class="top-news-title">お知らせ</span>
                    </div>
                    <table class="p-table_12_news">
                        @foreach($news_list as $key => $item)
                          @if( $news->id == $item->id)
                            <thead class="p-table__head" data-href="{{ route('storeAdmin.news.show', $item->id) }}" style="cursor: pointer;">
                                <tr class="p-table__head__tableRow_7_news">
                                    <th class="table_border_17_news {{ $key == 0 ? 'table_news_radius--first' : '' }} {{ $key == count($news_list)-1 ? 'table_news_radius--last' : '' }}">
                                      <span class="sidebar-label-one">【重要】{{ $item->date_content }}<br/>
                                        <span class="label-font-weight">{{ $item->title}}</span></span>
                                    </th>
                                </tr>
                            </thead>
                          @else
                            <thead class="p-table__head" data-href="{{ route('storeAdmin.news.show', $item->id) }}" style="cursor: pointer;">
                                <tr class="p-table__head__tableRow_7_news">
                                    <th class="table_border_30_news {{ $key == 0 ? 'table_news_radius--first' : '' }} {{ $key == count($news_list)-1 ? 'table_news_radius--last' : '' }}">
                                        <span class="sidebar-label-one sidebar-label-one--date">{{ $item->date_content }}<br/>
                                        <span class="label-font-weight">{{ $item->title}}</span></span>
                                    </th>
                                </tr>
                            </thead>
                          @endif
                        @endforeach
                        {{--<thead class="p-table__head">
                            <tr class="p-table__head__tableRow_37_news">
                                <th class="table_border_37_news"><span class="sidebar-label-margin-top"><span class="news-opacity">2022/6/12</span><br/>
                                    <span class="label-font-weight">6/11深夜のメンテナンスは無事終了しました。</span></span>
                                </th>
                            </tr>
                        </thead>
                        <thead class="p-table__head">
                            <tr class="p-table__head__tableRow_7_news"  >
                                <th class="table_border_7_news"><span class="sidebar-label-two"><span class="news-opacity">2022/6/10</span><br/>
                                    <span class="label-font-weight">ご友人ご紹介キャンペーンについて</span></span>
                                </th>
                            </tr>
                        </thead>
                        <thead class="p-table__head">
                            <tr class="p-table__head__tableRow_7_news">
                                <th class="table_border_7_news"><span class="sidebar-label-two"><span class="news-opacity">2022/6/10</span><br/>
                                    <span class="label-font-weight">ご友人ご紹介キャンペーンについて</span></span>
                                </th>
                            </tr>
                        </thead>
                        <thead class="p-table__head">
                            <tr class="p-table__head__tableRow_7_news">
                                <th class="table_border_7_news"><span class="sidebar-label-two"><span class="news-opacity">2022/6/10</span><br/>
                                    <span class="label-font-weight">ご友人ご紹介キャンペーンについて</span></span>
                                </th>
                            </tr>
                        </thead>
                        <thead class="p-table__head">
                            <tr class="p-table__head__tableRow_7_news">
                                <th class="table_border_30_news"><span class="sidebar-label-two"><span class="news-opacity">2022/6/10</span><br/>
                                    <span class="label-font-weight">ご友人ご紹介キャンペーンについて</span></span>
                                </th>
                            </tr>
                        </thead>--}}
                    </table>
                  </div>
            </div>
            {{--  @foreach($news as $item)  --}}
            <div class="data-infoes margin-left--14_news border_style_update">
              <div class="img-list-news">
                【重要】<span>{{ $news->date_content }}</span>
              </div>
              <div class="img-list">
                <div class="container_box_news">
                    <span class="span-news-1">{{ $news->title }}</span>
                </div>
              </div>
              <div class="box-title_news">
              <span class="news-box-content">{{ $news->content }}</span>
                {{--<span class="news-box-content">ご担当者様</span><br/><br/>
                <span class="news-box-content">いつもお世話になっております。ロボレ事務局です。</span><br/><br/>
                <span class="news-box-content">6月の利用料について、5月中に決済いただきたかったのですが、現時点でまだ確認が取れておりません。</span><br/>
                <span class="news-box-content">大変恐縮ではありますが、お支払い状況を御確認いただき、まだお支払いが終了していない様子でしたらロボレまでお振込みいただけますでしょうか？</span><br/><br/>
                <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="p-list__item__label_7">
                         <span class="news-box-content">お支払い金額：5,500円</span>
                        </div>
                    </div>
                </li><br/>
                <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="p-list__item__label_7">
                        <span class="news-box-content">お振込み先口座：○○○銀行△△支店　普通　◇◇◇◇◇◇◇◇◇◇ 　ロボレ（カ</span>  <br/>
                        </div>
                    </div>
                </li><br/>
                <span class="news-box-content">なお、本ご連絡と行き違いでご対応いただいていた場合は申し訳ございません。</span><br/><br/>
                <span class="news-box-content">何か不明な点などございましたら、ロボレ事務所までお問合せください。</span><br/><br/>
                <li class="p-list__item p-list__item--center">
                    <div class="p-list__item__label_7">
                     <span class="news-box-content">ロボレ株式会社</span>
                    </div>
                    <div class="p-list__item__data" style="overflow-wrap: break-word;">
                        <div class="p-list__item__label_7">
                         <span class="news-box-content">営業時間　　11:00 ～ 17:00</span>
                        </div>
                    </div>
                </li><br/>--}}
              </div>
            </div>
            {{--  @endforeach  --}}
          </div>
    </div>
  </div>
</div>
@endslot
@endcomponent

<script>
  $('thead[data-href]').on('click', function(){
    window.open($(this).data('href'), '_parent');
  });
</script>
@endsection
