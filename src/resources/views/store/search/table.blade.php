<table class="property_results" style="margin">
<tbody>
 
  <tr>
    <span style="display: none;">{{array_key_exists('struct_type', $property) ? $property['struct_type'] : '-'}}</span>
      <td colspan="7" rowspan="5" style="min-width: 17%;">
        <input type="checkbox">
        {{-- <div class="rating-wrapper">
          <input type="checkbox" name="rating" >
          <label for="rating" class="rating" onClick="addToFavorite(this, {{ $key ?? 0 }})" data-favorite-id="{{ $key }}"></label>
        </div> --}}
      </td>
      <td  colspan="5" rowspan="5" style="width:100%;max-width:10%;">
        @if(array_key_exists('image_list', $property))
          <img src="{{ $property['image_list'][array_key_first($property['image_list'])] }}" alt="">
        @elseif(array_key_exists('image_number_gaikan', $property))
          @if(array_key_exists('image_src', $property))
            <img src="{{ $property['image_src'] }}" alt="">
          @endif
        @else
          <span class="image-box">画像</span>
        @endif
      </td>
      <td colspan="4" rowspan="5" style="width:100%;max-width:12%;">
        @if(array_key_exists('image_number', $property))
        <div class="c-image_atbb">
          <img src="{{ $property['賃料'] }}" alt="rent_atbb">
          <span>万円</span>
        </div>
        @else
          <span class="rent-ttl">{{ $property['賃料'] }}</span>
        @endif
      <ul>
        <div class="rent-pay" style="display: flex;justify-content: center;">
          <div class="rent-right-pay" style="text-align: left;">
            <li class="mgn-t-2">
              <div class="pay-details">
                <div class="pay-money">
                    <span class="spl-desc">管</span>
                    <span class="spl-desc_2">{{ array_key_exists('管理費', $property) ? $property['管理費'] : '-' }}・{{ $property['共益費'] }}</span>
                </div>
              </div>

            </li>
            <li class="mgn-t-2">
              <div class="pay-details">
                <div class="pay-money">
                  <span class="spl-desc">敷</span>
                  @if(array_key_exists('敷金／保証金', $property))
                    <span class="spl-desc_2">{{ explode("/", $property['敷金／保証金'])[0] }}・{{ explode("/", $property['敷金／保証金'])[1] }}</span>
                  @else
                    <span class="spl-desc_2">{{ $property['敷金'] }}・-</span>
                  @endif
                </div>
              </div>

            </li>
            <li class="mgn-t-2">
              <div class="pay-details">
                <div class="pay-money">
                  <span class="spl-desc">礼</span>
                  @if(array_key_exists('礼金／権利金', $property))
                    <span class="spl-desc_2">{{ explode("/", $property['礼金／権利金'])[0] }}・{{ explode("/", $property['礼金／権利金'])[1] }}</span>
                  @else
                    <span class="spl-desc_2">{{ $property['礼金'] }}・-</span>
                  @endif
                </div>
              </div>

            </li>
          </div>
        </div>
      </ul>

      </td>
      <td rowspan="1" colspan="8" name="property_name">{{ $property['建物名'] }}</td>
      <td style="background-color: #ffe0e0;">更新日</td>
      <td >
        @if($displays_mode == "0")
        -
        @else
          @if(array_key_exists('image_number', $property))
          <a style="color:#395722;text-decoration:underline;font-size:12px;" href="http://atbb.athome.jp/">atBB</a>
          @elseif(array_key_exists('内見開始日', $property))
          <a style="color:#395722;text-decoration:underline;font-size:12px;" href="https://lp.itandibb.com/">イタンジ</a>
          @elseif(array_key_exists('手数料', $property))
          <a style="color:#395722;text-decoration:underline;font-size:12px;" href="https://map.cyber-estate.jp/mediation/login.asp?ggid=813054"><span class="display_method">東急住宅リース</span></a>
          @elseif(array_key_exists('案内可能日', $property))
          <a style="color:#395722;text-decoration:underline;font-size:12px;" href="https://membersweb.homes.co.jp/mfrl/login">三井不動産レジデンシャルリース</a>
          @elseif(array_key_exists('構造 規模', $property))
          <a style="color:#395722;text-decoration:underline;font-size:12px;" href="https://www.sumitomo-latour.jp/estate/login.php">住友不動産</a>
          @else
          <a style="color:#395722;text-decoration:underline;font-size:12px;" href="https://system.reins.jp/">レインズ</a>
          @endif
        @endif
      </td>
    </tr>
    <tr>
      <td colspan="5" style="width:100%;max-width:30%;">{{ $property['所在地'] }}</td>
      <td colspan="4" rowspan="3">
        <div style="display:flex; justify-content: space-around;">
          <ul style="text-align:left;">
            <li>{{ $property['使用部分面積'] }}</li>
            {{--  Temporary / 建階  as 用途地域 --}}
            {{--  Tokyu Update  --}}
            @if(!array_key_exists('手数料', $property))
              <li name="step">{{ array_key_exists('所在階', $property) ? $property['所在階'] : '-' }}／{{ array_key_exists('用途地域', $property) ? $property['用途地域'] : '-' }}	</li>
            @else
              <li name="step">{{ $property['所在階'] }}	</li>
            @endif
              <li>{{ $property['築年月'] }}</li>
          </ul>
          <ul style="text-align:left;">
            <li>{{ $property['物件種目'] }}</li>
            <li>{{ $property['間取'] }}</li>
          </ul>
        </div>
      </td>
      @if($displays_mode == "0")
      <td style="background-color: #ffe0e0;"></td>
      @else
      <td style="background-color: #ffe0e0;"><span  class="display_method">広告掲載</span></td>
      @endif
    </tr>
    <tr>
      <td rowspan="2" colspan="5">
          <p>
            @if(!array_key_exists('交通', $property))
              @if(count(explode('バス停', $property['沿線駅'])) > 1)
                {{ explode('バス停', $property['沿線駅'])[0] }}・バス停 {{ explode('バス停', $property['沿線駅'])[1] }}
              @else
                {{ $property['沿線駅'] }}・ -
              @endif
            @elseif(array_key_exists('交通', $property))
              {{ $property['沿線駅'] }}・{{ $property['交通'] }}
            @endif
          </p>
      </td>
      <td>{{ array_key_exists('取引態様', $property) ? $property['取引態様'] : '-' }}</td>
    </tr>
    <tr style="border-right: 1px solid;">
    </tr>
    <tr>
      {{-- @if($displays_mode == "0")
      <td colspan="3" style="width:100%;max-width:20%;"></td>
      <td colspan="3"></td>
      <td colspan="3" style="background-color: #ffe0e0;"></td>
      <td colspan="3"><a style="color:#395722;text-decoration:underline;" href="{{url('store/search/details/'. $key)}}" target=”_blank”>詳細</a></td>
      @else --}}
      <td colspan="3"  style="width:100%;max-width:20%;" ><span class="display_method">{{ $property['商号'] }}</span></td>
      <td colspan="3"><span class="display_method">{{ $property['電話番号'] }}</span></td>
      <td colspan="3" style="background-color: #ffe0e0;"><span class="display_method">{{ array_key_exists('ad', $property) ? $property['ad'] : 'AD' }}</span></td>
      <td colspan="3"><a style="color:#395722;text-decoration:underline;" href="{{url('store/search/details/'. $key)}}" target=”_blank”>詳細</a></td>
      {{-- @endif --}}
      {{-- <td colspan="3"><a style="color:#395722;text-decoration:underline;" href="{{route ('storeAdmin.search.details')}}">詳細</a></td> --}}
    </tr>
   
  </tbody>
</table>

<script>
  {{--  $(".rating").click(function(){
    $(".rating-wrapper").toggleClass("main");
  });  --}}
  

</script>
