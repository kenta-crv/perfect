@extends('store.layouts.top_head')
@section('title', $title ?? '会社')
@section('content')
@component('admin.component._p-index')
@slot('body')
<div class="c-contianer-box_4">
  <div class="header-title-box display-inline--flex">
    <p>賃貸不動産の仲介業のために</p>
    <p>物件情報の取得や、ポータルサイトへの出稿の作業を行うロボットを貸します！</p>

    <img class="prty-img margin-left--auto" src="{{asset('image/logo/home_1.png')}}" height="105" width="79">
  </div>
  <div class="header-desc">
    <p class="margin-left--5">お貸するロボットの名前は</p>
    <span class="margin-left--25">ロボレとは、不動産用ロボット（robot for real estate）の</span>

    <div class="h-body">
      <ul class="display-inline--flex">
        <li>ロボレでできること</li>
        <li>無料セミナー情報</li>
        <li>ニュース</li>
        <li>お問合せ</li>
      </ul>

      <div class="h-box-details">
        <span class="h-box-title">ロボレでできること</span>
        <p class="margin-top--20">ロボレは、インターネット上に存在する目に見えないプログラムのロボットです。</p>

        <div class="h-list margin-top--20">
          <ul>
            <li>
              <p>	1.ロボレは人に代わって、複数の不動産の業者間流通サイトを検索し、結果を持ってきます。</p>
              <p class="margin-left--25">今までは、人が業者間流通サイトごとに検索していましたが、これからはあなたがロボレに指示することで、一発で結果を取得できます。</p>
            </li>
            <li>
              <p>	2.その結果を、ポータルサイトにロボレが出稿します。</p>
              <p class="margin-left--25">ポータルサイトへの出稿も、ロボレに指示するだけ。もちろん取得した物件情報を編集したうえで出稿させることが可能です。</p>
            </li>
            <li>
              <p>	3.リーシング終了物件は、ロボレが自動で出稿終了に。</p>
              <p class="margin-left--25">ポータルサイトへ出稿した物件のリーシングが終了したかどうかをロボレが定期的に自動でチェックするので、広告終了をわすれる事がありません。</p>
            </li>

            <li>
              <p>ほかにも、ロ御社のための物件集客サイトやロボレポータルサイトもご用意しましたので、ネットでの集客のお助けになれば幸いです。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="h-box-details">
        <span class="h-box-title">ロボレでできること</span>
        <p>どのプランも、最初の31日は無料でお使いいただけます。</p>
        <p>（有料プランからアップグレードした場合は、アップグレード前のもとの料金）</p>
        <p>また、休眠や解約はいつでも可能ですので、まずはお試しください</p>
          <div class="price-sec-wrap">
            <div class="l-12 l-12--gap24">
              <div class="l-12__4">
                  <div class="price-box">
                      <div class="">
                        <div class="price-label basic">プラン</div>
                      </div>
                      <div class="info">
                          <ul>
                            <li><i class="fas fa-check"></i>接続可能流通サイト</li>
                            <li><i class="fas fa-check"></i>ユーザー数</li>
                            <li><i class="fas fa-check"></i>ユーザー数追加</li>
                          </ul>
                          <a href="#" class="plan-btn">Join Basic Plan</a>
                      </div>
                  </div>
              </div>
              <div class="l-12__4">
                  <div class="price-box">
                      <div class="">
                        <div class="price-label value">試してみる</div>
                        <div class="price-info">	スターター.</div>
                        <div class="price">	3,000円 ／月</div>
                      </div>
                      <div class="info">
                          <ul>
                            <li><i class="fas fa-check"></i>5社</li>
                            <li><i class="fas fa-check"></i>3</li>
                            <li><i class="fas fa-check"></i>	1,000円</li>
                          </ul>
                          <a href="#" class="plan-btn">Join Value Plan</a>
                      </div>
                  </div>
              </div>
              <div class="l-12__4">
                  <div class="price-box">
                      <div class="">
                        <div class="price-label premium">試してみる</div>
                        <div class="price-info">	ベーシック</div>
                        <div class="price">	5,000円 ／月</div>
                      </div>
                      <div class="info">
                          <ul>
                              <li><i class="fas fa-check"></i>5社</li>
                              <li><i class="fas fa-check"></i>3</li>
                              <li><i class="fas fa-check"></i>	1,000円</li>
                          </ul>
                          <a href="#" class="plan-btn">Join Premium Plan</a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endslot
@endcomponent
@endsection
