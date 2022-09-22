<div class="c-list-tbl overflow-x">
  <table id="trials">
    @php($prev_month = $carbon::now()->subMonth()->format('m'))
    @php($current_month = $carbon::now()->format('m'))
    <tr>
      <th colspan="1" rowspan="4" style="width:201px;"></th>
      <th colspan="7" rowspan="1">{{$prev_month }}月</th>
      <th colspan="2" rowspan="1">{{ $current_month }}月</th>
    </tr>
    <tr>
      <td colspan="6" rowspan="1" class="bg-gray td_fix_border_left">店舗登録</td>
      <td colspan="1" rowspan="1" class="bg-gray">売上</td>
      <td colspan="1" rowspan="1" class="bg-gray">店舗登録</td>
      <td colspan="1" rowspan="1" class="bg-gray">売上</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1" class="bg-gray td_fix_border_left">無料</td>
      <td colspan="2" rowspan="1" class="bg-gray">有料</td>
      <td colspan="1" rowspan="1" class="bg-gray">無料</td>
      <td colspan="1" rowspan="1" class="bg-gray">有料</td>
      <td colspan="1" rowspan="2" class="bg-gray"></td>
      <td colspan="1" rowspan="1" class="bg-gray">無料</td>
      <td colspan="1" rowspan="1" class="bg-gray"></td>
    </tr>
    <tr>
      <td colspan="1" rowspan="1" class="bg-gray td_fix_border_left">新規増加</td>
      <td colspan="1" rowspan="1" class="bg-gray">解約・休眠</td>
      <td colspan="1" rowspan="1" class="bg-gray">増加</td>
      <td colspan="1" rowspan="1" class="bg-gray">減少</td>
      <td colspan="2" rowspan="1" class="bg-gray">累計</td>
      <td colspan="1" rowspan="1" class="bg-gray">新規増加</td>
      <td colspan="1" rowspan="1" class="bg-gray"></td>
    </tr>
    @php($data = [])

    @php($plans = $clean_trial)
    @php($index = -1)
    @php($counter =0)
    @php($count_status =0)
    @foreach ($plans as $key =>  $item)
      @php($index ++)

    <tr class="gains">
          <td class="txt-alg-l" colspan="1" rowspan="1">
            {{ $key }}
          </td>

          {{--  Prev Month  --}}
          @foreach(
            ["新規増加",
            "解約・休眠",
            "増加",
            "減少	",
            "累計1",
            "累計2",
            "-",] as $key2 => $label)


              @if($key2 == 0)
                <td>
                  @if (isset($item[0]['plan_id']) == 0)
                    @if (isset($item[0]['status']))
                      {{ $item[0]['status'] == 0 ? $item[0]['stores'].'店' : '-' }}
                      @else
                        -
                    @endif
                    @else
                    -
                  @endif
                </td>
                <td>
                  @if (isset($item[0]['plan_id']) == 0)
                    @if (isset($item[0]['status']))
                      {{ $item[0]['status'] == 1 ? $item[0]['stores'].'店' : '-' }}
                      @else
                        -
                    @endif
                    @else
                      -
                  @endif
                </td>
                <td>
                  @if (isset($item[0]['plan_id']) > 0)
                    @if (isset($item[0]['status']))
                      {{ $item[0]['status'] == 0 ? $item[0]['stores'].'店' : '-' }}
                      @else
                        -
                    @endif
                      @else
                        -
                  @endif
                </td>

                <td>
                  @if (isset($item[0]['plan_id']) > 0)
                    @if (isset($item[0]['status']))
                      {{ $item[0]['status'] == 1 ? $item[0]['stores'].'店' : '-' }}
                      @else
                        -
                    @endif
                      @else
                        -
                  @endif
                </td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>
                  @if (isset($item[1]['status']))
                    {{ $item[1]['status'] == 0 ? $item[1]['stores'].'店' : '-' }}
                    @else
                      -
                  @endif
                </td>
                <td>
                  @if (isset($item[1]['status']))
                    {{ $item[1]['status'] == 1 ? $item[1]['stores'].'店' : '-' }}
                    @else
                      -
                  @endif
                </td>
                {{--  <td>
                  @if (isset($item[1]['status']))
                    {{ $item[1]['status'] == 1 ? $item[1]['stores'].'店' : '-' }}
                    @else
                    -
                  @endif
                </td>  --}}
              {{--  @else
                @if($key2 == )
                <td>
                  {{ $item[0]['status'] == 0 ? $item[0]['stores'].'店' : '-' }}cc
                </td>
                @else
                  <td>
                    @if (isset($item[1]['status']) == 1)
                    {{ $item[1]['status'] == 1 ? $item[1]['stores'].'店' : '-' }}aa
                      @else
                      -
                    @endif
                  </td>
                @endif  --}}
            @endif


            {{--  Current Month  --}}
            {{--  @if($key2 == 6 && count($item) > 1)
              <td>
                {{ $item[0]['status'] == 0 ? $item[0]['stores'].'店' : '-' }}店mm
              </td>
              <td>
                @if (isset($item[1]['status']))
                {{ $item[1]['status'] == 1 ? $item[1]['stores'].'店' : '-' }}aa
                  @else
                  -
                @endif
              </td>

            @elseif($key2 == 6 && count($item) == 1)
              <td>
                {{ $item[0]['status'] == 0 ? $item[0]['stores'].'店' : '-' }}店dd
              </td>
              <td>
                @if (isset($item[1]['status']))
                {{ $item[1]['status'] == 1 ? $item[1]['stores'].'店' : '-' }}ff
                  @else
                  -
                @endif
              </td>
            @endif  --}}
          @endforeach

    </tr>
    @endforeach

    <tr class="bg-gray">
      <td  colspan="1" rowspan="1" class="txt-alg-l"><strong>有料合計</strong></td>
      <td class="txt-alg-r" id="increase" colspan="1" rowspan="1"></td>
      <td class="txt-alg-r" id="cumulative" colspan="1" rowspan="1"></td>
      <td class="txt-alg-r" id="paid-gain" colspan="1" rowspan="1">75 店</td>
      <td class="txt-alg-r" id="paid-decrease" colspan="1" rowspan="1">17 店</td>
      <td class="txt-alg-r" id="t5" colspan="1" rowspan="1"> 店</td>
      <td class="txt-alg-r" id="t6" colspan="1" rowspan="1"> 店</td>
      <td class="txt-alg-r" id="t7" colspan="1" rowspan="1"></td>
      <td class="txt-alg-r" id="nxt-increase" colspan="1" rowspan="1"></td>
      <td class="txt-alg-r" id="nxt-cumulative" colspan="1" rowspan="1"></td>
    </tr>
  </table>
</div>
