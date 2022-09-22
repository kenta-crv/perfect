@extends('robore.layout.layout--home')
@section('title', $title ?? 'TOP')
@section('content')

<div class="banner-box">

  <div class="left-banner">
    <p>賃貸不動産<span class="text-black">の</span>仲介業<span class="text-black">のために</span></p>
    {{-- <p>物件情報の取得<span class="text-black">を行う</span></p> --}}
    <p>沢山の物件流通サイトを一発で検索！</p>
    <span class="banner-lbl display-inline--flex ">１．物件検索が圧倒的に速いので、お客様をお待たせしません<br/>
      ２．広告出稿用の検索も楽になり、人の手間が省けます<br/>
      ３．異なるサイトの情報を一覧表示するので比較もしやすい</span>

    <div class="form margin-top-75" id="form1">
      <div class="bx-1 margin-top--20">
        <p class="bx-head-1"> ご提供するサービスの名前は</p>
        <div class="bg-head-default">
          <p>ロボレ Robore</p>
        </div>
        <p class="bx-head margin-top--10 margin-bottom--11">
          ロボレとは、不動産用ロボット(<i class="lbl-default">robot </i>  for real estate)の略です。
        </p>
      </div>
      <div class="form-footer">
        <div class="l-12 l-12--gap24">
          <div class="l-12__6">
            <x-store.button
              custom-class=""
              href="{{ route('requestinformation.create') }}"
              :active="true">
              資料請求
            </x-store.button>
          </div>
          <div class="l-12__6">
              <x-store.button
                custom-class=""
                href="{{ route('register.register') }}"
                :active="false"
                >
                無料で試してみる
              </x-store.button>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="robot-box">
    <img src="{{ asset('image/img/robot.png') }}" alt="">
  </div>
</div>

<div class="form" id="form2">
  <div class="bx-1 margin-top--20">
    <p class="bx-head"> お貸するロボットの名前は</p>
    <div class="bg-head-default">
      <p>ロボレ Robore</p>
    </div>
    <p class="bx-head margin-top--10 margin-bottom--11">
      ロボレとは、不動産用ロボット(<i class="lbl-default">robot </i>  for real estate)の略です。
    </p>
  </div>
  <div class="form-footer">
    <div class="l-12 l-12--gap24">
      <div class="l-12__6">
        <x-store.button
          custom-class=""
          href="{{ route('requestinformation.create') }}"
          :active="true">
          資料請求
        </x-store.button>
      </div>
      <div class="l-12__6">
        <x-store.button
          custom-class=""
          href="{{ route('register.register') }}"
          :active="false">
          無料で試してみる
      </x-store.button>
      </div>
    </div>
  </div>

</div>

<div class="box-pages tools">
  <ul class="margin-left--auto">
    <li class="bdr-tools">
      <a href="#robore_offers">
        <img src="{{ asset('image/img/rbt-hd.png') }}" alt="">
      </a>
      <p  class="arrow-icn">ロボレでできること</p>

    </li>
    <li class="bdr-tools">
      <a href="#rate_plans">
        <img src="{{ asset('image/img/plans.png') }}" alt="">
      </a>
      <p class="arrow-icn">料金プラン</p>
    </li>
    <li class="bdr-tools">
      <a href="#seminar_info">
        <img src="{{ asset('image/img/grp.png') }}" alt="">
      </a>
      <p class="arrow-icn">無料セミナー情報</p>
    </li>
    <li class="bdr-tools">
      <a href="#homepage_news">
        <img src="{{ asset('image/img/news.png') }}" alt="">
      </a>
      <p class="arrow-icn">ニュース</p>
    </li>
    <li class="bdr-tools">
      <a href="#robore_faq">
        <img src="{{ asset('image/img/grp-msg.png') }}" alt="">
      </a>
      <p class="arrow-icn">よくある質問</p>
    </li>
    <li class="bdr-tools">
      <a href="#robore_inquiry">
        <img src="{{ asset('image/img/msg.png') }}" alt="">
      </a>
      <p class="arrow-icn">お問合わせ</p>
    </li>
  </ul>


</div>
<section class="box-pages" id="robore_offers" >
  <div class="tool-pages" >
    <div class="tool-header">
      <div class="">
        <p class="hp-title">ロボレでできること</p>
        <hr class="hp-title-horizontal">
      </div>
      <p class="t-description">
        ロボレは、インターネット上に存在する目に見えないプログラムのロボットです。
      </p>
    </div>
    <div class="tool-body margin-top-75 mgn-b-10">
      <div class="l-12 l-12--gap24 ">
        <div class="tool-img-box l-12__4">
          <img src="{{ asset('image/img/com.png') }}" alt="">
        </div>
        <div class="l-12__8 pdg-10">
          <div class="desc">
            <p class="default">
              ロボレは人に代わって,
              <span class="lbl-green fnt-sz-6">複数の不動産の業者間流通サイト</span>
              を検索し、結果を持ってきます。
            </p>
            <p class="default">今までは、人が業者間流通サイトごとに検索していましたが、これからはあなたがロボレに指示することで、
            <span class="lbl-green fnt-sz-6">一発で結果を取得できます。</span></p>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tool-footer margin-top--20 pdg-l-3 pdg-r-3">
    <div class="margin-auto">
          <x-store.button
            custom-class=""
            href="{{ route('requestinformation.create') }}"
            :active="true">
            資料請求
          </x-store.button>
          <x-store.button
            custom-class="mgn-l-5 mgn-t-3"
            href="{{ route('register.register') }}"
            :active="false">
            無料で試してみる
          </x-store.button>
    </div>
  </div>
</section>
<section class="box-pages bg-pages-default" id="rate_plans" >
  <div class="tool-pages" >
    <div class="tool-header">
      <div class="pdg-b-3">
        <p class="hp-title">料金プラン</p>
        <hr class="hp-title-horizontal">
      </div>
      <p class="t-description ft-600">
        どのプランも
        <b class="lbl-green half_bg">  最初の31日は無料</b>
        でお使いいただけます。
      </p>
      <p>※有料プランからアップグレードした場合は、アップグレード前のもとの料金</p><br/>
      <span class="banner-lbl-2 display-inline--flex "><span class="banner-label">また、休眠や解約はいつでも可能ですので、まずはお試しください！</span></span>
      <br>
    </div>
    <div class="plans  w-per-14 margin-top--20">
      <table>
        <tr class="plan-header">
          <th class="basic">プラン名</th>
          <th class="mid-2">
            <p class="plan-title"><span class="font-weight-20">スタータープラン</span></p>
            <p class="plan-price ft-wg-900"><span class="font-size-34">3,000</span><span class="font-weight-20">円/月</span></p>
              <div class="p-login__buttonArea_home">
                <button type="submit" class="c-button_10 c-button--full_home c-button--thinBlue btn-right-rate"><span>試してみる</span></button>
              </div>

          </th>
          <th class="high-2">
            <p class="plan-title"><span class="font-weight-20">ベーシックプラン</span></p>
            <p class="plan-price"><span class="font-size-34">5,000</span><span class="font-weight-20">円/月</span></p>
            <div class="p-login__buttonArea_home">
              <button type="submit" class="c-button_10 c-button--full_home c-button--thinBlue btn-right-rate"><span>試してみる</span></button>
            </div>
           </th>
          </th>
        </tr>
        <tr class="box">
          <td class="td_home_1">同時検索 流通サイト<sup>※1</sup> </td>
          <td class="td_white">3社</td>
          <td class="td_white">5社</td>
        </tr>
        <tr class="box">
          <td class="td_home_2">ユーザー数</td>
          <td class="td_white">1</td>
          <td class="td_white">3</td>
        </tr>
        <tr class="box">
          <td class="td_home_1">ユーザー数追加<sup>※2</sup></td>
          <td class="td_white">1,000円</td>
          <td class="td_white">1,000円</td>
        </tr>
      </table>
    </div>

    <div class="dpl-flx wgt-full">
        <div class="mgn-l-ato mgn-r-ato margin-top--20 mgn-b-10 plan-disc">
          <p class="font-family-auto">※1：一度の検索指示で、ロボットが結果を持ってくるサイトの数です</p>
          <p class="font-family-auto">※2：同時にロボレを使えるユーザーの数です。セキュリティの観点から、ロボレを利用されるスタッフの人数分ご用意する事を推奨しています。</p>
        </div>
    </div>





    <div class="tool-footer">
      <div class="margin-auto">
          <x-store.button
            custom-class=""
            href="{{ route('requestinformation.create') }}"
            :active="true">
            資料請求
          </x-store.button>
          <x-store.button
            custom-class="mgn-l-5 mgn-t-3"
            href="{{ route('register.register') }}"
            :active="false">
            無料で試してみる
          </x-store.button>
      </div>
    </div>
  </div>
</div>


{{--  seminar page  --}}
{{--一旦コメントアウト@include('robore.seminar')--}}

{{--  news page  --}}
  @include('robore.news')
{{--  faq page  --}}
  @include('robore.faq')

  @include('robore.inquiry')





<script>
  const accordion = document.getElementsByClassName('container');

  for (i=0; i<accordion.length; i++) {
    accordion[i].addEventListener('click', function () {
      this.classList.toggle('active')
    })
  }


  {{--  $('li[data-href]').on('click', function(){
    window.open($(this).data('href'), '_blank');
  });  --}}
  </script>
@endsection
