@extends('admin.layout.layout--admin')
@section('title', $title ?? 'TOPダッシュボード')
@section('content')
  @component('admin.component._p-index')
  @inject('carbon', 'Carbon\Carbon')
    @slot('body')
    <div class="a-page-title">
      <span><strong style="color: #003a16;"></strong>ダッシュボード  先月・今月実績</span>
    </div>
    <div class="c-main-box active-cont">
      <div class="c-main-body">
          @include('admin.tables.plans')

      </div>
   </div>
   <div class="a-page-title">
    <span><strong style="color: #003a16;"></strong>債権状況</span>
  </div>
   <div class="c-main-box active-cont">
      <div class="admin-table-container">
        <div class="c-list-tbl width-full">
          <table>
           <tr>
            <th style="min-width: 190px;"></th>
            <th style="min-width: 128px;">すべて</th>
            <th style="min-width: 128px;">1か月分</th>
            <th style="min-width: 128px;">2か月分</th>
            <th style="min-width: 128px;">3か月以上</th>
           </tr>

            <tr>
              <td class="txt-alg-l">スターター</td>
              <td class="txt-alg-r">{{ $starter }} 店</td>
              <td class="txt-alg-r" >{{ $starter30 }} 店</td>
              <td class="txt-alg-r">{{ $starter60 }} 店</td>
              <td class="txt-alg-r">{{ $starter90 }} 店</td>
            </tr>

           <tr>
            <td class="txt-alg-l">ベーシック</td>
            <td class="txt-alg-r" >{{ $basic }} 店</td>
            <td class="txt-alg-r" >{{ $basic30 }} 店</td>
            <td class="txt-alg-r" >{{ $basic60 }} 店</td>
            <td class="txt-alg-r" >{{ $basic90 }} 店</td>
           </tr>
           <tr>
            <td class="txt-alg-l">エンタープライズ</td>
            <td class="txt-alg-r" >{{ $enterprise }} 店</td>
            <td class="txt-alg-r" >{{ $enterprise30 }} 店</td>
            <td class="txt-alg-r" >{{ $enterprise60 }} 店</td>
            <td class="txt-alg-r" >{{ $enterprise90 }} 店</td>
           </tr>
           <tr class="bg-gray">
            <td class="txt-alg-l"><strong>有料合計</strong></td>
            <td class="txt-alg-r" >{{ $total }} 店</td>
            <td class="txt-alg-r" >{{ $total1month }} 店</td>
            <td class="txt-alg-r" >{{ $total2month }} 店</td>
            <td class="txt-alg-r" >{{ $total3month }} 店</td>
           </tr>
          </table>
        </div>
        <div class="mgn-l-4">
          <div class="distribution-desc mgn-b-2">
            <span>TOP20まで。全部を見る場合は、左側の表の中の数字をクリック</span>
          </div>
          <div class="c-list-tbl width-full">
            <table>
              <tbody>
                <tr>
                  <th style="min-width: 101px;"><strong>ID</strong></th>
                  <th style="min-width: 151px;"><strong>プラン</strong></th>
                  <th style="min-width: 298px;"><strong>店舗名</strong></th>
                  <th style="min-width: 117px;"><strong>未払い</strong></th>
                  <th style="min-width: 117px;"><strong>未払額</strong></th>
                 </tr>
                 @foreach($rank as $ranking)
                  <tr>
                    <td>{{ $ranking->id }}</td>
                    <td>
                      @if($ranking->plans == 1)
                        スターター
                      @endif
                      @if($ranking->plans == 2)
                        ベーシック
                      @endif
                      @if($ranking->plans == 3)
                        エンタープライズ
                      @endif
                    </td>
                    <td class="txt-alg-l">{{ $ranking->company_name }}</td>
                    <td><u class="grn-txt">10.0か月分</u></td>
                    {{-- @if(empty($ranking->amount))
                      <td><u class="grn-txt">0 か月分</u></td>
                      @else
                      <td><u class="grn-txt">{{ $ranking->amount }} か月分</u></td>
                    @endif --}}
                    @if(empty($ranking->amount))
                      <td><u class="grn-txt">0</u></td>
                      @else
                      <td><u class="grn-txt">{{ $ranking->amount }}</u></td>
                    @endif
                  </tr>
                 @endforeach

            </tbody></table>
        </div>
        </div>
      </div>

    </div>
    @endslot
  @endcomponent

<script>
  $(function(){
    $('#increase').html(sumColumn('#trials .gains',2, 2))
    $('#cumulative').html(sumColumn('#trials .gains',3, 2))
    $('#paid-gain').html(sumColumn('#trials .gains',4, 2))
    $('#paid-decrease').html(sumColumn('#trials .gains',5, 2))
    $('#nxt-increase').html(sumColumn('#trials .gains',9, 2))
    $('#nxt-cumulative').html(sumColumn('#trials .gains',10, 2))
    $('#t5').html(sumColumn('#trials .gains',6, 2))
    $('#t6').html(sumColumn('#trials .gains',7, 2))
    $('#t7').html(sumColumn('#trials .gains',8, 2))
  })
  function sumColumn(selector,index, limit) {
    var total = 0;

    for(var i = 1; i <= limit; i++){
      var kk = $(selector+" td:nth-child(" + index + ")").eq(i).text()
        total += parseInt(kk, 10) || 0;
    }

    return total + ' 店';
  }
</script>
@endsection


