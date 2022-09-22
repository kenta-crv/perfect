<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <style type="text/css">
    body {
      font-family: 'noto sans japanese', sans-serif;
      font-color: #333;
      text-align: left;
      margin-left: 20px;
    }

    p > a{
    color: #128374;
    }
    hr.register-label-horizontal-1 {
    width: 280px;
    margin-left: 1px;
    border-top: 1px dashed #128374 ;
}

	.mgn-left-email {
    	margin-left: 50px;
    }

    span a, p a{
    color: #128374;
    }
    /* スマートフォン表示の設定 */
  </style>
</head>

<body>
  <div>
    <span>{{ $mailData['company'] }}   {{ $mailData['lastname'] }} {{ $mailData['firstname'] }}様</span>
    <br />
    <span>この度は、ロボレにお申込いただき誠にありがとうございます。</span>
    <br />
    <br />

    <span>ロボレでは、賃貸不動産の物件探しのお手伝いをさせていただきます。</span>
    <br />
    <br />

    <span class="mgn-left-email">ログインはこちら　→　URL：
      <a href="http://robore.co.jp/store/login">
        https://robore.jp/store/login
      </a>
    </span>
    <br />
    <span class="mgn-left-email">マニュアルはこちら　→　URL：
      <a href="{{ route('download', 'information.pdf') }}">
        https://robore.jp/information.pdf
      </a>
    </span>
    <br />
    <span class="mgn-left-email">お問合せは画面上部のQRコードより、LINEにてご連絡ください。</span>
    <br />
    <br />

    <span>末永くロボレをどうぞよろしくお願いいたします。</span>
    <br />
    <br />

    <span>----------------------------------------------------</span><br />
    <span>株式会社ロボレ</span><br>
    <span>〒141-0021　東京都品川区上大崎2-25-5 久米ビル6F</span><br>
    <span>http://robore.co.jp/</span><br/>
    <span>admin@robore.co.jp</span><br/>
    <span>----------------------------------------------------</span><br />
  </div>
</body>

</html>
