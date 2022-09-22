<!DOCTYPE html>
<html lang="en">
    <?php $is_production = env('APP_ENV') === 'production' ? true : false; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{$is_production ? secure_asset('css/pdf.css') : asset('css/pdf.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 


	<script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
</head>
<body>

    {{-- <div class="text-center" style="padding:20px;">
        <input type="button" id="rep" value="Print" class="btn btn-info btn_print">
    </div> --}}
    
    <div class="main-pdf">
        <div class="jc_space-between">
            <span class="pdf-1"> 金融機関用</span>
            <span class="">
                <p>預 金 口 座 振 替 依 頼 書<br/>自動払込利用申込書(収)(加)</p>
                <p>
                    <span class="vertical-txt">銀金組</span>
                    <span class="vertical-txt">行庫合</span>
                    <span class="vertical-mdl">御中</span>
                </p>
            </span>
            <img style="width:200px; height: 110px; margin-top: 25px;" src="{{ URL::asset('/images/pdf-1.png') }}" alt="barangay logo">
        </div>
        <div class="jc_space-between second-cnt">
            <span>
                <p>私は、 右記の収納企業から請求された金額を私名義の下記預金口座から、 預金口座振替に<br/>よって支払うこととしたいので、預金口座振替規定を確約のうえ依頼します。</p>
                <p><b>[フリガナ欄 注意事項]</b></p>
                <p>
                    <ul>
                        <li><p>・法人の場合、「株式会社は(力)」「有限会社は(ユ)」等と略語でご記入ください。(預金者名欄 <br/>は略さすご記入下さい)</p></li>
                        <li><p>・左づめで記入し、潤点、半濁点は 1 字分に扱ってください。個人名義の場合、姓と名の間は<br/>1宇空けてください。</p></li>
                        <li><p>・ゆうちょ銀行の場合はお届け内容を正確にご記入ください。</p></li>
                    </ul>
                </p>
            </span>
            <span class="table-pdf-1">
                <table>
                    <tr>
                        <th>収納企業名</th>
                    </tr>
                    <tr>
                        <td>|三菱UFJファクター株式会社<br/>(収納代行会社)</td>
                    </tr>
                </table>
            </span>
        </div>
        <div class="table-pdf-2 width-full">
            <table>
                <tr>
                    <th>
                        フリガナ
                    </th>
                    <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                </tr>
                <tr>
                    <td class="vertical-txt" style="width: 25px;"><span>預金者名</span></td>
                    <td colspan="23" style="width: 250px;" class="tbl-red-txt">※法人の場合は、会社名、 金融機関お届出の肩書き、 代表者名まで全て省略せずご記入ください。</td>
                    <td style="width: 25px;" class="vertical-txt"><p >金融機関<br/>お届出印</p></td>
                    <td colspan="6"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                </tr>
            </table>
        </div>
        <p>※ゆうちょ銀行以外の金融機関ご利用の場合</p>
        <div class="table-pdf-3 width-full">
            <table>
                <tr>
                    <th colspan="5" style="width: 150px;">
                        <p>銀行<br/>金庫<br/>金庫</p>
                    </th>
                    <th colspan="3" style="width: 100px;"><p>組合</p></th>
                    <th style="width: 100px;"><p>支店 預 金 種 目<br/>(どちらかー方O印)</p></th>
                    <th style="width: 175px;" colspan="7"><p>口&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 座&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;番 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号<br/>(数字のみを右づめでご記入ください)</p></th>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td colspan="4"></td>
                    <td colspan="3"></td>
                    <td rowspan="2"></td><td rowspan="2"></td><td rowspan="2"></td><td rowspan="2"></td><td rowspan="2"></td><td rowspan="2"></td><td rowspan="2"></td><td rowspan="2"></td>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
            </table>
        </div>
        <p>※ゆうちょ銀行ご利用の場合</p>
        <div class="table-pdf-4 width-full">
            <table>
                <tr>
                    <td colspan="6">種目コード</td>
                    <td colspan="4">契約種別コード </td>
                    <td colspan="12">記 号 (6桁目がある場合は※欄にご記入ください)</td>
                    <td colspan="16">番 号 (右づめでご記入ください)</td>
                </tr>
                <tr>
                    <td colspan="2">1</td>
                    <td colspan="2">6</td>
                    <td colspan="2">6</td>
                    <td colspan="2">3</td>
                    <td colspan="2">0</td>
                    <td colspan="2">1</td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2">※</td>
                    <td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="5">払 込 先 口座番号</td>
                    <td colspan="15">00140-9-654553</td>
                    <td colspan="3">払 込 先加入者名</td>
                    <td colspan="15">三菱UFJファクター株式会社</td>
                </tr>
            </table>
        </div>
        <div class="table-pdf-5 width-full">
            <table>
                <tr>
                    <td style="width: 50px;">振替日</td>
                    <td>6日&nbsp;&nbsp; • 12日&nbsp;&nbsp; • 20日 &nbsp;&nbsp;• 26日 &nbsp;&nbsp;• 27日&nbsp;&nbsp; • 月末日&nbsp;&nbsp; (金融機関休業日の場合は翌営業日)(払込百)</td>
                </tr>
            </table>
        </div>
        <div class="jc_space-between">
            <span>
                <p>一預金口座振替規定-</p>
                <p class="fnt-sz-1">1. 銀行、 金庫、組合等(以下銀行という)に請求書が送付されたときは、 私に通知することなく、 請求書記載金額を預金口座から引落しのうえ支払ってください。 この場合、 預金規定または当 座勘定規定にかかわらず、 預金通帳、 同払戻請求書の提出または小切手の振出しはしません。<br/>
                    2. 振替日において請求書記載金額が預金口座から払戻すことのできる金額(当座貸越を利用でき る範囲内の金額を含む。)をこえるときは、私に通知することなく、 請求書を返却してもさしつ かえありません。<br/>
                    3.このすばすのはがないまま 期間にわたり会社から請求がない等相当の事由があるときは、とくに申出をしない限り、 銀行 はこの契約が終了したものとして取扱ってさしつかえありません。<br/>
                    4.この預金口座振替についてかりに紛議が生じても、 銀行の責めによる場合を除き、 銀行には迷 「惑をかけません。<br/>
                    *ゆうちょ銀行をご指定の場合は自動払込み規定が適用されます。
                </p>
            </span>
            <span>
                <div class="table-pdf-6 width-full">
                    <table>
                        <tr>
                            <td class="vertical-txt" style="width: 25px;">金融機関使</td>
                            <td style="width: 100px;">
                                <p>(不備返却事由)</p>
                                <p>1.預金取引なし&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.印鑑相違<br/>
                                    2.記載事項等相違&nbsp;&nbsp;&nbsp;4.印鑑不鮮明<br/>
                                    店名、預金種目、&nbsp;&nbsp;5.該当口座なし<br/>
                                    口座番号、   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.その他<br/>
                                    口座名義&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br/>
                                    (備考)<br/><br>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>    
            </span>
            <span >
                <div class="table-pdf-7 width-full">
                    <table>
                        <tr>
                            <td  style="width: 150px;">検<br/><br/>印</td>
                        </tr>
                        <tr>
                            <td>印<br/>鑑<br/>照<br/>合</td>
                        </tr><tr>
                            <td>受<br/>付<br/>印 </td>
                        </tr>
                    </table>
                </div>
            </span>
        </div>
        <hr class="pdf-hr"/>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>

 

	<script type="text/javascript">
	$(document).ready(function($) 
	{ 

		$(document).on('click', '.btn_print', function(event) 
		{
			event.preventDefault();

			//credit : https://ekoopmans.github.io/html2pdf.js
			
			var element = document.getElementById('main-pdf'); 

			//easy
			html2pdf().from(element).save();

			//custom file name
			//html2pdf().set({filename: 'code_with_mark_'+js.AutoCode()+'.pdf'}).from(element).save();


			//more custom settings
			var opt = 
			{
			  margin:       1,
			  filename:     'pageContent_'+js.AutoCode()+'.pdf',
			  image:        { type: 'jpeg', quality: 0.98 },
			  html2canvas:  { scale: 2 },
			  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
			};

			// New Promise-based usage:
			html2pdf().set(opt).from(element).save();

			 
		});

 
 
	});
	</script>
</body>
</html>