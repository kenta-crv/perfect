@extends('store.layouts.layout-store-admin')
@section('title', $title ?? '検索：ユーザー別ログイン設定')
@section('content')

@component('admin.component._p-index')
@slot('body')
<div class="grn-txt-cont mgn-t-5 mgn-b-2">
  <span class="store-title"><strong style="color: #003a16;"></strong>ユーザー別ログイン設定</span>
</div>
<div class="c-main-box active-cont">
  <div class="c-main-body">
    <div class="c-main-container">
      <div class="box-description">
        <div class="distribution-desc">
          <p>ユーザー別ログイン設定：<span>全ての設定をできるのは、店舗管理者のみの機能です </span></p>
          <p>御社の店舗ユーザーごとに、どのIDでログインさせるかを設定してください。なお、店舗スタッフアカウントの人は、自分のログインIDのみ編集することができます。</p>
          {{--  <p>なお、店舗スタッフアカウントの人は、自分のログインIDのみ編集することができます。</p>  --}}
        </div>

         {{--  <div class="c-tooltip">
          <div class="tooltip-num">
            <a href="https://robore.jp/store/setting/distributionInformation" class="distribution_id">33112233445x5</a>
          </div>
          <div class="c-tooltip-design">
            <div class="c-tooltiptext">
              <div class="c-tooltiptext-msg">
                <p class="c-txt-message">コピーした情報を</p>
                <button class="c-table_details-btn2">ペースト</button>
              </div>
              <div class="c-tooltiptext-id">
                <p class="c-txt-message-2">ID</p>
                <input type="text" name="ID" placeholder="00011122333">
              </div>
              <div class="c-tooltiptext-id">
                <p class="c-txt-message-2">PW</p>
                <input type="text" name="ID" placeholder="ss25111">
              </div>
              <div class="c-tooltip-save-btn">
                <button class="c-table_details-btn">保存</button>
              </div>
            </div>
          </div>
        </div>  --}}
      </div>
      @php($dist = config('const.distributions'))
      {{--  {{ json_encode($dist) }}  --}}
      <div class="box-data">
        @php($index = 0)
        <div class="c-list-tbl">
          <table>
            <tr>
              <th class="fnt-sz-1">※IDクリックで編集可</th>
              @foreach($accounts as $item)
                <th >{{ $item['name'] }}</th>
              @endforeach

            </tr>
              @foreach($accounts2 as $indexs => $item)

              <tr>
                <td class="d-table-head" style="width: 48%; padding: 2%;">
                  @foreach($dist as $key => $itemdist)
                    @if($key == $item['site_id'])
                      {{ $itemdist }}
                    @endif
                  @endforeach
                </td>
                @foreach ($accounts as $key => $item2)
                @php($my_id = $index++)
                  @if(count($item2->scraping_id->all()) > 0)
                    @if(in_array($item['site_id'], $item2->scraping_id->pluck('site_id')->all()))
                      <td  >
                        @php($scraping_id = json_encode($item2->scraping_id->where('site_id', $item['site_id'])->first()->id))
                        @php($login_id = json_encode($item2->scraping_id->where('site_id', $item['site_id'])->first()->login_id))
                        @php($finder = $item2->scraping_id->where('site_id', $item['site_id'])->first()->login_id)
                        @php($password = json_encode($item2->scraping_id->where('site_id', $item['site_id'])->first()->password))

                        <div class="d-table_details-01">
                          <a class="lbl-main txt-underline tool-enter enter {{ $indexs == count($accounts2)-3 ? 'third-last_item_settings' : ''}} {{ $indexs == count($accounts2)-2 ? 'second-last_item_settings' : ''}} {{ $indexs == count($accounts2)-1 ? 'last_item_settings' : ''}}">
                            {{ $item2->scraping_id->where('site_id', $item['site_id'])->first()->login_id }}
                          </a>
                          @include('store.distributionSite.crud.edit')
                        </div>


                      </td>
                      @else
                      <td>
                        <div class="d-table_details-01 txt-dec-none">
                            <a href="#" class="d-table_details-enter tool-enter enter {{ $indexs == count($accounts2)-3 ? 'third-last_item_settings' : ''}} {{ $indexs == count($accounts2)-2 ? 'second-last_item_settings' : ''}} {{ $indexs == count($accounts2)-1 ? 'last_item_settings' : ''}}" >クリックで入力</a>
                            @include('store.distributionSite.crud.create')
                        </div>

                      </td>
                    @endif
                    @else
                    <td>
                      <div class="d-table_details-01 txt-dec-none">
                        <a href="#" class="d-table_details-enter tool-enter enter  {{ $indexs == count($accounts2)-3 ? 'third-last_item_settings' : ''}} {{ $indexs == count($accounts2)-2 ? 'second-last_item_settings' : ''}} {{ $indexs == count($accounts2)-1 ? 'last_item_settings' : ''}}" >クリックで入力</a>
                        @include('store.distributionSite.crud.create')
                      </div>
                    </td>
                  @endif
                @endforeach
              </tr>
              @endforeach
          </table>
       
      </div>
    </div><br/><br/>
    <div class="foot_3">
        <div class="p-login__buttonArea">
            {{-- <button type="submit" class="distibution-setting__btn">保存</button> --}}
        </div>
    </div><br/>
    <div class="box-description">
        <div class="distribution-desc-2">
          <p>表示されている物件流通サイトは、MENUの「<span><a href="/store/distribution" class="span_distribution_redrct">物件流通サイト選択</a></span>」で設定しているサイトです。</p>
          <p>表示されているユーザーは、MENUの「<span><a href="/store/manager/settings" class="span_distribution_redrct">ロボレのユーザー設定</a></span>」で設定しているユーザーです。</p>
        </div>
    </div>
  </div>
    </div>
  </div>
</div>

@endslot
@endcomponent
<script>
    // for tabbing top
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tabbing");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      var active_tooltip = 0;
      var cpy_pass, cpy_log_id
      var my_active


      {{--  function edit(password, login_id){
        $('.'+login_id).toggleClass('c-tooltip-active')
      }  --}}

      $('.tool-edit').on('click', function(){


      })

      Element.prototype.removeAttributes = function(...attrs) {
        attrs.forEach(attr => this.removeAttribute(attr))
      }

      Element.prototype.setAttributes = function(obj){
        for(var prop in obj) {
          this.setAttribute(prop, obj[prop])
        }
      }



    // let btn = document.querySelectorAll('.tool-enter.enter');

    // if(btn != null){
    // btn.forEach(item  => {
    //   item.addEventListener('click', (event)=>{
    //     let tooltip = event.target.nextElementSibling;
    //     let tbody = event.target.parentNode.parentNode.parentNode.parentNode;
    //     let dataFormActive = tbody.querySelectorAll('[data-form-active]');
    //     if(dataFormActive.length > 0){
    //       if(!dataFormActive[0].isSameNode(tooltip)){
    //         dataFormActive[0].classList.add('c-tooltip-active');
    //         dataFormActive[0].removeAttributes('data-form-active', 'data-inactive');
    //       }
    //     }
    //     // check class for active
    //     tooltip.classList.contains('c-tooltip-active')
    //     ? tooltip.classList.remove('c-tooltip-active')
    //     : tooltip.classList.add('c-tooltip-active');
    //     // set attribute if remove c-tooltip-active

    //     tooltip.hasAttribute('data-form-active')
    //     ? tooltip.removeAttributes('data-form-active', 'data-inactive')
    //     : tooltip.setAttributes({"data-form-active": "true", "data-inactive" : 'true'})

    //   });
    // });


  // }

  $('.tool-enter.enter').on('click', function(){
    let hide = $(this).hide()
    let show_active = $(this).next('form').removeClass('c-tooltip-active')
  })
  var counter = 0;

  $(document).click((event) => {
    is_form = $(event.target).parents('.tooltip-form').length;
    let btn_click = $('.tool-enter.enter').next('form').not('.c-tooltip-active')
    if (btn_click.length) {
      var kk = counter++;
        if(kk > 0 && !is_form){
           $('.tool-enter.enter').next('form').not('.c-tooltip-active').prev('a').show()
           $('.c-list-tbl').removeClass('c-list-tbl-third-last_open')
           $('.c-list-tbl').removeClass('c-list-tbl-second-last_open')
           $('.c-list-tbl').removeClass('c-list-tbl-last_open')

          btn_click.addClass('c-tooltip-active')
          counter = 0;
        }
    }

  });


    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.tool-submit').on('click', function(){
     var password =  $(this).parent('div').prev('div').find('input').val()
     var login_id =  $(this).parent('div').prev().prev('div').find('input').val()

     var id =  $(this).prev('input').val()

      $.ajax({
        dataType: 'json',
        type: 'POST',
        url: '{{ route('storeAdmin.setting.editScraping') }}',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
          id : id,
          login_id : login_id,
          password: password,
        },success: function(){
          window.location.reload();
        },error: function(e){
          alert(e.responseText)
        }
      })
    })

    $('.tool-copy').on('click',function(){
      var password =  $(this).parent('div').prev('div').find('input').val()
      var login_id =  $(this).parent('div').prev().prev('div').find('input').val()

      cpy_pass = password
      cpy_log_id = login_id
      alert('コピーしました。')
    })

    $('.tool-paste').on('click',function(){

      if(cpy_pass){
        var login_id =  $(this).parent('div').next('div').find('input').val(cpy_log_id);
        var  password =  $(this).parent('div').next().next('div').find('input').val(cpy_pass)
      }


    })
    $('.c-list-tbl .third-last_item_settings').on('click',function(){
      is_active = $(this).siblings('form').hasClass('c-tooltip-active')
      if (!is_active){
        $('.c-list-tbl').addClass('c-list-tbl-third-last_open')
        $('.c-list-tbl').removeClass('hgt-3')

      }else{
        $('.c-list-tbl').removeClass('c-list-tbl-third-last_open')
      }
    });
    $('.c-list-tbl .second-last_item_settings').on('click',function(){
      is_active = $(this).siblings('form').hasClass('c-tooltip-active')
      if (!is_active){
        $('.c-list-tbl').addClass('c-list-tbl-second-last_open')
        $('.c-list-tbl').removeClass('hgt-3')

      }else{
        $('.c-list-tbl').removeClass('c-list-tbl-second-last_open')
      }
    });
    $('.c-list-tbl .last_item_settings').on('click',function(){
      is_active = $(this).siblings('form').hasClass('c-tooltip-active')
      if (!is_active){
        $('.c-list-tbl').addClass('c-list-tbl-last_open')
        $('.c-list-tbl').removeClass('hgt-3')

      }else{
        $('.c-list-tbl').removeClass('c-list-tbl-last_open')
      }
    });
</script>
@endsection
