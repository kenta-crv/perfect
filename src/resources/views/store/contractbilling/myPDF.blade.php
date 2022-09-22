<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8" />
    <style>
        
        
        table {
            border-collapse: collapse;
        }

        .p-billing-info-table {
            border-radius: 10px;
            width: 100%;
            border: 1px solid #707070;
        }

        .p-billing-info-table table{
            border-radius: 10px;
            width: 100%;
            border: none;
        }
        
        .p-billing-info-table th:first-child{
            border-top-left-radius: 10px;
            border-left: none;
        }

        .p-billing-info-table th{
            background: #d8d8d8;
            border: 1px solid #333;
            border-top: none;
            font-size: 14px;
            color: #333;
            font-weight: bold;
            padding: 10px;
            min-height: 38px;
            
        }
        
        .p-billing-info-table td:last-child {
            border-right: none;
        }

        .p-billing-info-table th:last-child{
            border-right: none;
        }

        .box-desc-txt {
            display: inline-flex;
        }

        td.align_left_cb {
            text-align: left !important;
            padding: 15px;
        }

        .p-billing-info-table td {
            border: 1px solid #333;
            border-left: none;
            border-bottom: none;
        }

        
       

    </style>
</head>
<body class="jn-character">
    <div class="container-table margin-top--01">    
        <div class="box-description mgn-b-4">
          <div class="box-desc-txt">
            <span>契約情報</span>
            <p>（金額は月額・税別の表示です）（　）は税込み金額です</p>
          </div>
        </div>
        <div class="p-billing-info-table overflow-x">
          <table>
            <tr>
              <th>年月日</th>
              <th>プラン </th>
              <th>追加ユーザー</th>
              <th>掲載数追加</th>
              <th>請求金額</th>
              <th>明細書</th>
              <th>領収書</th>
              <th>引落結果</th>
              <th>お支払い</th>
            </tr>
            @foreach($bills as $bill)
            <tr>
              <td>{{ date('Y年m月d日', strtotime($bill->billing_date)) }}</td>
              <td class='align_left_cb'>ベーシック</td>
              <td class='align_left_cb'>1</td>
              <td class='align_left_cb'>0</td>
              <td class='align_right_cb'>{{ $bill->add_user_fee }}円({{ $bill->add_property_fee }}円)</td>
              <td class="pdf-txt align_left_cb">PDF</td>
              <td class="pdf-txt align_left_cb">PDF</td>
              <td class='align_left_cb' style="background: #ffe0e0;">失敗</td>
              <td class='align_left_cb' style="background: #ffe0e0;">未払い</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
</body>
</html>