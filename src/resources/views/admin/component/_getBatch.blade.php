<script type="text/javascript">
  function getBatch(browserTable, search_parameters, site, first_results = false){
    // Check if browserTable['browser_id'] == 0
    if(browserTable['browser_id'] == 0){
      return;
    }

    console.log('Getting batch By getBatch')
    // Recursive Ajax Call to traverse pTable and Request Results by batch of 10
    $.ajax({
      type : 'POST',
      //url : '{{ route('storeAdmin.search.submitAjax') }}',
      // url : `http://localhost:8080/api/${site}/search_property`,
      url : "{{ route('api.flask.get_batch') }}",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      //contentType: 'application/json;charset=UTF-8',
      dataType: 'json',
      //data: JSON.stringify(sample_request[site]),
      data: {
        "site" : site,
        "search_parameters" : JSON.stringify({
          "browser_id" : browserTable['browser_id'],
          "ptable" : JSON.stringify(browserTable['ptable'])
        }),
      },
      success : function(res){
        // console.log(res)
        browserTable = res['browser_table']

        var data = res['payload']
        //Filter
        // data = filterDataResult(data, search_parameters)
        if(res['payload'] != null){
          data = newFilterGroup(data, search_parameters)
        }
        //Display

        // Clear First Ten Results
        first_ten_table = []

        $.ajax({
          type : 'POST',
          url : '{{ route('storeAdmin.search.tempResults') }}',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          contentType: 'application/json;charset=UTF-8',
          dataType: 'json',
          data : JSON.stringify({
            'payload' : JSON.stringify(data)
          })
        }).done((result) => {

          console.log(result)
          console.log(search_parameters)
          result_count = 0;
          //console.log(search_parameters['bldg_structure'])
          /**if(search_parameters['bldg_structure'] != undefined){
            search_parameters['bldg_structure'].forEach(function(structure){
              result['tables'].forEach(function(table){
                console.log(table);
                if(table.includes(structure)){
                  result_table = result_table.concat(table);
                  result_count = result_count + 1;
                }
              });
            });
          }**/

          if(search_parameters['free_word'] != null){
            result['tables'].forEach(function(table){
              if(table.includes(search_parameters['free_word'])){
                result_table = result_table.concat(table);
                result_count = result_count + 1;
              }
            });
          }

          if(search_parameters['property_name'] != null){
            result['tables'].forEach(function(table){
              if(table.includes(search_parameters['property_name'])){
                result_table = result_table.concat(table);
                result_count = result_count + 1;
              }
            });
          }

          /**if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
            result_table = result_table.concat(result['tables'])
          }**/

          if(search_parameters['free_word'] == null && search_parameters['property_name'] == null){
            result_table = result_table.concat(result['tables'])
          }

          // Update
          // if(result_table.length > 10 ){
          //   result_table = result_table.concat(result['tables'])
          // }else{
          //   result_table = result['tables']
          // }

          if(result_table.length > 10){
            $('#paginate_result').show()
          }else if(first_results == true){
            // Mitsui First Ten Results
            result_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
            $('#spinner').hide()
          }else if(result_table.length <= 10){
            $('#result_table').html('')
            result_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
          }

          //$('#total_count').html(result_count)
          $('#total_count').html(result_table.length)
          updateSiteCount(site, result['tables'].length)


          if(result_count > 0){
            console.log(site, result_count, 'update site count')
            $(`#${site}`).html(parseInt($(`#${site}`).html()) + result_count)
          }

        })
        console.log('Getting batch By getBatch Again')
        getBatch(browserTable, search_parameters, site)
      }
    })
  }
  function setBatch(search_parameters, site, first_results = false){
    console.log('Setting batch')

    // Ajax Call to Get pTable and Browser
    $.ajax({
      type : 'POST',
      //url : '{{ route('storeAdmin.search.submitAjax') }}',
      // url : `http://localhost:8080/api/${site}/search_property`,
      url : "{{ route('api.flask.get_ptable') }}",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      //contentType: 'application/json;charset=UTF-8',
      //dataType: 'json',
      //data: JSON.stringify(sample_request[site]),
      data: {
        "site" : site,
        "search_parameters" : JSON.stringify(search_parameters),
        "user_id" : "{{ auth()->guard('account')->user()->id }}"
      }
    }).done((res) => {
      console.log(res)

      alert_site = '';
      if(site == 'tokyu'){
        alert_site = '東急住宅リース';
      }else if (site == 'mitsui'){
        alert_site = '三井不動産レジデンシャルリース';
      }else if (site == 'sumitomo'){
        alert_site = '住友不動産';
      }else if (site == 'atbb'){
        alert_site = 'atBB';
      }else if (site == 'itandibb'){
        alert_site = 'イタンジ';
      }else if (site == 'reins'){
        alert_site = 'レインズ';
      }
      if(res['status'] == 500){
        $('#spinner').hide();
        alert(alert_site + 'のログイン情報が正しくありません。設定したIDパスワードをご確認ください。');
        // alert(config('const.site_to_jp')[site] + 'のログイン情報が正しくありません。設定したIDパスワードをご確認ください。');
      }

      if(res['status'] == 200 && ('payload' in res && ('ptable' in res['payload'] && res['payload']['ptable'].length > 0))){
        if(site == 'tokyu'){
          console.log("GetBatch 1");
          getBatch(res['payload'], search_parameters, site, first_results)
        }
      }

      if(res['status'] == 200 && site == 'itandibb'){
        payload_init = {
          'browser_id' : res['payload']['browser_id'],
          'last_index' : 0
        }
        console.log("GetBatch 2");
        getBatchByIndex(payload_init, search_parameters, site, first_results)
      }

      if(res['status'] == 200 && site == 'mitsui'){

        // console.log(site)
        // Display Initial Results
        browserTable = res['browser_table']

        var data = res['browser_table']['payload']
        //Filter
        // data = filterDataResult(data, search_parameters)
        if(res['browser_table']['payload'] != null){
          data = newFilterGroup(data, search_parameters)
        }
        //Display

        // Clear First Ten Results
        first_ten_table = []

        $.ajax({
          type : 'POST',
          url : '{{ route('storeAdmin.search.tempResults') }}',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          contentType: 'application/json;charset=UTF-8',
          dataType: 'json',
          data : JSON.stringify({
            'payload' : JSON.stringify(data)
          })
        }).done((result) => {
          // console.log(result)
          // console.log(search_parameters)
          result_count = 0;
          //console.log(search_parameters['bldg_structure'])
          /**if(search_parameters['bldg_structure'] != undefined){
            search_parameters['bldg_structure'].forEach(function(structure){
              result['tables'].forEach(function(table){
                console.log(table);
                if(table.includes(structure)){
                  result_table = result_table.concat(table);
                  result_count = result_count + 1;
                }
              });
            });
          }**/

          if(search_parameters['free_word'] != null){
            result['tables'].forEach(function(table){
              if(table.includes(search_parameters['free_word'])){
                result_table = result_table.concat(table);
                result_count = result_count + 1;
              }
            });
          }

          if(search_parameters['property_name'] != null){
            result['tables'].forEach(function(table){
              if(table.includes(search_parameters['property_name'])){
                result_table = result_table.concat(table);
                result_count = result_count + 1;
              }
            });
          }

          /**if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
            result_table = result_table.concat(result['tables'])
          }**/

          if(search_parameters['free_word'] == null && search_parameters['property_name'] == null){
            result_table = result_table.concat(result['tables'])
          }

          // Update
          // if(result_table.length > 10 ){
          //   result_table = result_table.concat(result['tables'])
          // }else{
          //   result_table = result['tables']
          // }

          if(result_table.length > 10){
            $('#paginate_result').show()
          }else if(first_results == true){
            // Mitsui First Ten Results
            result_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
            $('#spinner').hide()
          }

          //$('#total_count').html(result_count)
          $('#total_count').html(result_table.length)
          console.log("Upddate count 1");
          updateSiteCount(site, result['tables'].length)


          if(result_count > 0){
            // console.log(site, result_count, 'update site count')
            $(`#${site}`).html(parseInt($(`#${site}`).html()) + result_count)
          }


          if(browserTable['has_next'] == 1){
            // Run Loop
            console.log("GetBatch 3");
            getBatchByPage(browserTable, search_parameters, site)
          }
        })
      }
    })
  }
  function filterDataResult(payload, search_parameters){
    const data = payload

    // const keysExact   = ['情報掲載日'];
    // const valuesExact   = ['2022/08/09'];
    const d = search_parameters['publishing_date'];
    // const routes_clicked = search_parameters['routes'].toString();
    var trade = undefined;
    var combine = undefined
    var routes_clicked = undefined;

    //routes
    if(search_parameters['routes'] != undefined){
      routes_clicked = []
      routes_clicked = search_parameters['routes'].toString();
    }

    //air condition
    /**if(search_parameters['airconditioner_center'] != undefined){
      airconditioner_clicked = []
      airconditioner_clicked = search_parameters['airconditioner_center'];
    }**/

    //trade_style
    if(search_parameters['trade_style'] != undefined) {
      trade = []
      trade = search_parameters['trade_style'].toString();
    }

    // if step_min is empty, setting min value -50
    var min;
    if (search_parameters['step_min'] != undefined) {
      min = search_parameters['step_min'];
    }else{
      min = -50;
    }

    // if step_max is empty, setting max value 1000
    var max;
    if (search_parameters['step_max'] != undefined) {
      max = search_parameters['step_max'];
    }else{
      max = 1000;
    }

    // want top floor
    var top_floor = false;
    if (search_parameters['floor_option'] == "top_floor") {
      top_floor = true;
    }


    const keysExact   = ['取引態様', '情報掲載日', '沿線駅'];
    const valuesExact   = [trade, d, routes_clicked];

    const fee_min = search_parameters['fee_min']
    const fee_max = search_parameters['fee_max']

    // var keyExactInfomration = ['設備'];
    // var valueExactInformation = airconditioner_clicked;

    var filterblah = data

    if(trade != undefined || d != null  || min != -50 || max != 1000 || top_floor || search_parameters['other_fees'] != undefined || search_parameters['video_data'] != undefined){
      filterblah = filterResult(data, keysExact, valuesExact, min, max, top_floor, search_parameters['other_fees'], search_parameters['video_data'])

      // then filter by range
      if(fee_min != null || fee_max != null ){
        filterblah = filterByRange(filterblah, fee_min, fee_max, '共益費', '')
      }

      /**if(airconditioner_clicked != undefined){
        filterMissingInformationSearch = filterMissingInformation(keyExactInfomration, valueExactInformation);
      }**/

    }


    return filterblah


  }
  function loginAndSearch(site, search_parameters, successCallback){
    $.ajax({
      type : 'POST',
      //url : '{{ route('storeAdmin.search.submitAjax') }}',
      // url : `http://localhost:8080/api/${site}/search_property`,
      url : "{{ route('api.flask.get_batch') }}",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      //contentType: 'application/json;charset=UTF-8',
      dataType: 'json',
      //data: JSON.stringify(sample_request[site]),
      data: {
        "site" : site,
        "search_parameters" : JSON.stringify({search_parameters})
      },
      success : function(res){
        // console.log(res)
        successCallback()
      }
    })
  }

  function getBatchByIndex(browserIndex, search_parameters, site, first_results = false){
    $.ajax({
      type : 'POST',
      //url : '{{ route('storeAdmin.search.submitAjax') }}',
      // url : `http://localhost:8080/api/${site}/search_property`,
      url : "{{ route('api.flask.get_batch') }}",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      //contentType: 'application/json;charset=UTF-8',
      dataType: 'json',
      //data: JSON.stringify(sample_request[site]),
      data: {
        "site" : site,
        "search_parameters" : JSON.stringify({
          "browser_id" : browserIndex['browser_id'],
          "last_index" : browserIndex['last_index']
      })},
      success : function(res){
        // console.log(res)
        var data = res['payload']
        //Filter
        // data = filterDataResult(data, search_parameters)
        if(res['payload'] != null){
          data = newFilterGroup(data, search_parameters)
        }
        //Display

        // Clear First Ten Results
        first_ten_table = []

        $.ajax({
          type : 'POST',
          url : '{{ route('storeAdmin.search.tempResults') }}',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          contentType: 'application/json;charset=UTF-8',
          dataType: 'json',
          data : JSON.stringify({
            'payload' : JSON.stringify(data)
          })
        }).done((result) => {

          // console.log(result)
          // console.log(search_parameters)
          result_count = 0;
          //console.log(search_parameters['bldg_structure'])
          /**if(search_parameters['bldg_structure'] != undefined){
            search_parameters['bldg_structure'].forEach(function(structure){
              result['tables'].forEach(function(table){
                console.log(table);
                if(table.includes(structure)){
                  result_table = result_table.concat(table);
                  result_count = result_count + 1;
                }
              });
            });
          }**/

          if(search_parameters['free_word'] != null){
            result['tables'].forEach(function(table){
              if(table.includes(search_parameters['free_word'])){
                result_table = result_table.concat(table);
                result_count = result_count + 1;
              }
            });
          }

          if(search_parameters['property_name'] != null){
            result['tables'].forEach(function(table){
              if(table.includes(search_parameters['property_name'])){
                result_table = result_table.concat(table);
                result_count = result_count + 1;
              }
            });
          }

          /**if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
            result_table = result_table.concat(result['tables'])
          }**/

          if(search_parameters['free_word'] == null && search_parameters['property_name'] == null){
            result_table = result_table.concat(result['tables'])
          }

          // Update
          // if(result_table.length > 10 ){
          //   result_table = result_table.concat(result['tables'])
          // }else{
          //   result_table = result['tables']
          // }

          if(result_table.length > 10){
            $('#paginate_result').show()
          }else if(first_results == true){
            // Mitsui First Ten Results
            result_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
            $('#spinner').hide()
          }

          //$('#total_count').html(result_count)
          $('#total_count').html(result_table.length)
          updateSiteCount(site, result['tables'].length)


          /**if(result_count > 0){
            console.log(site, result_count, 'update site count')
            $(`#${site}`).html(parseInt($(`#${site}`).html()) + result_count)
          }**/
        })


        if(res.last_index == -1){
          return
        }

        payload_init = {
          'browser_id' : browserIndex['browser_id'],
          'last_index' : res.last_index
        }

        getBatchByIndex(payload_init, search_parameters, site)
      }
    })
  }

  function getBatchByPage(browserTable, search_parameters, site){
    // Check if browserTable['browser_id'] == 0
    if(browserTable['browser_id'] == 0){
      return;
    }

    console.log('Getting batch byPage')
    // Recursive Ajax Call to traverse pTable and Request Results by batch of 10
    $.ajax({
      type : 'POST',
      //url : '{{ route('storeAdmin.search.submitAjax') }}',
      // url : `http://localhost:8080/api/${site}/search_property`,
      url : "{{ route('api.flask.get_batch') }}",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      //contentType: 'application/json;charset=UTF-8',
      dataType: 'json',
      //data: JSON.stringify(sample_request[site]),
      data: {
        "site" : site,
        "search_parameters" : JSON.stringify({
          "browser_id" : browserTable['browser_id'],
        }),
      },
      success : function(res){
        // console.log(res)
        browserTable = res['browser_table']

        var data = res['payload']
        //Filter
        // data = filterDataResult(data, search_parameters)
        if(res['payload'] != null){
          data = newFilterGroup(data, search_parameters)
        }
        //Display

        // Clear First Ten Results
        first_ten_table = []

        $.ajax({
          type : 'POST',
          url : '{{ route('storeAdmin.search.tempResults') }}',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          contentType: 'application/json;charset=UTF-8',
          dataType: 'json',
          data : JSON.stringify({
            'payload' : JSON.stringify(data)
          })
        }).done((result) => {

          // console.log(result)
          // console.log(search_parameters)
          result_count = 0;
          //console.log(search_parameters['bldg_structure'])
          /**if(search_parameters['bldg_structure'] != undefined){
            search_parameters['bldg_structure'].forEach(function(structure){
              result['tables'].forEach(function(table){
                console.log(table);
                if(table.includes(structure)){
                  result_table = result_table.concat(table);
                  result_count = result_count + 1;
                }
              });
            });
          }**/

          if(search_parameters['free_word'] != null){
            result['tables'].forEach(function(table){
              if(table.includes(search_parameters['free_word'])){
                result_table = result_table.concat(table);
                result_count = result_count + 1;
              }
            });
          }

          if(search_parameters['property_name'] != null){
            result['tables'].forEach(function(table){
              if(table.includes(search_parameters['property_name'])){
                result_table = result_table.concat(table);
                result_count = result_count + 1;
              }
            });
          }

          /**if(search_parameters['bldg_structure'] == undefined && search_parameters['free_word'] == null && search_parameters['property_name'] == null){
            result_table = result_table.concat(result['tables'])
          }**/

          if(search_parameters['free_word'] == null && search_parameters['property_name'] == null){
            result_table = result_table.concat(result['tables'])
          }

          // Update
          // if(result_table.length > 10 ){
          //   result_table = result_table.concat(result['tables'])
          // }else{
          //   result_table = result['tables']
          // }

          if(result_table.length > 10){
            $('#paginate_result').show()
          }else if(first_results == true){
            // Mitsui First Ten Results
            result_table.forEach((element) => $('#result_table').html($('#result_table').html() + element))
            $('#spinner').hide()
          }

          //$('#total_count').html(result_count)
          $('#total_count').html(result_table.length)
          updateSiteCount(site, result['tables'].length)


          /** if(result_count > 0){
            console.log(site, result_count, 'update site count')
            $(`#${site}`).html(parseInt($(`#${site}`).html()) + result_count)
          }
          **/

        })
        getBatchByPage(browserTable, search_parameters, site)
      }
    })
  }
  function checkValue(value,arr){
    var status = '';

    if(arr){
      for(var i=0; i<arr.length; i++){
        var name = arr[i];
        if(name == value){
          status = 'checked';
          break;
        }
      }
    }

    return status;
  }
  function requestCityAjax(id, prefecture){

    var htmls = []
    $.ajax({
        url: "https://opendata.resas-portal.go.jp/api/v1/cities?prefCode="+id,
        method: 'GET',
        dataType: 'JSON',
        headers: { 'X-API-KEY': "zBQRSl6r90oDQNsca9oo7UYKoapakpZE2nfsj7bJ" },
        success: function(data){

          var city_names = JSON.parse(sessionStorage.getItem('result_city_names'))

          prefec_result = data.result
          $.each(prefec_result, function(i){
            checked = checkValue(prefec_result[i].cityName, city_names)
            htmls +=
              '<div class="lbl-txt-01 lbl-txt-01-m0">'
                +'<div class="act-cat">'
                  +'<input type="checkbox" class="plan-house-type selectedCities" '+ checked +' name="cities['+prefecture+'][]" id="city_'+prefec_result[i].cityName+'" value="'+prefec_result[i].cityName+'" data-id="'+i+'" data-code="'+prefec_result[i].cityCode+'" data-pref="'+prefecture+'" hidden>'
                  +'<label for="city_'+prefec_result[i].cityName+'" class="c-lbl-white vd_dt_typ disabled">'+prefec_result[i].cityName+'</label>'
                +'</div>'
              +'</div>'
          })
          $(`#pre_result${id}`).html(htmls)
        }
    })
  }

  function newFilterGroup(payload, search_parameters){
    var filter_payload = payload
    if(search_parameters['fee_max'] > 0 || search_parameters['fee_min'] > 0 ){
      filter_payload  = filterRentRange(payload, search_parameters)
    }
    // filter_payload = filterTest(payload, search_parameters)

    return filter_payload
  }

  function filterRentRange(payload, search_parameters){
    return payload.filter((property) => {
      fee_property = parseFloat(property['賃料'].replace('万円',''))
      if(search_parameters['fee_max'] <= 0){
        return fee_property >= search_parameters['fee_min']
      }else if(search_parameters['fee_min'] <= 0){
        return fee_property <= search_parameters['fee_max']
      }else{
        return fee_property <= search_parameters['fee_max'] && fee_property >= search_parameters['fee_min']
      }
    })
  }

  $( document ).ready(function() {

    var selected = []
    var city_name =[]
    $('input[name="prefecture[]"]:checked').each(function(){
        selected[$(this).attr('data-id')] = {
                        'id' : $(this).attr('data-id'),
                        'value' : $(this).attr('value')
                      }
      var test = sessionStorage.setItem('result_prefectures', JSON.stringify(selected));
      var htmls = []
      var htmls_data = []
      var data = JSON.parse(sessionStorage.getItem('result_prefectures'))

      for (let i = 0; i < data.length; i++) {
        const element = data[i];
        if(element){
        htmls_data +=
              '<div class="modal_cities">'
                + '<div class="lbl-txt-01 lbl-txt-01-m0" style="flex-wrap: wrap;">'
                  + '<div class="act-cat">'
                    +  '<input type="checkbox" class="plan-house-type selectPref1" checked name="selected_prefecture_city[]" id="selected_prefecture_city_'+element.id+'" value="'+element.value+'" data-id="'+element.id+'" data-pref="'+element.value+'" hidden>'
                    +  '<label for="selected_prefecture_city_'+element.id+'" class="c-lbl-white vd_dt_typ ">'+element.value+'</label>'
                  +'</div>'
                + '</div>'
              + '</div>'
              + '<div class="first_dotted_lines modal_cities"></div>'
              + '<div class="container_lifeline modal_cities">'
                + '<div>'
                  + '<div id="city_display" class="container_search lbl-txt-01-m0">'

                  + '</div>'
                  + '<div class="lbl-txt-01 lbl-txt-01-m0" style="flex-wrap: wrap;" id="pre_result'+element.id+'">'

                  + '</div>'
                + '</div>'
              + '</div>'
              + '<div class="search_line modal_cities"></div>'

          requestCityAjax(element.id, element.value)
        }
      }

      var test = $('#prefecture_result_container').html(htmls_data)
    })

    $('.cities_selected').each(function(){
      city_name.push($(this).attr('value'))
      sessionStorage.setItem('result_city_names', JSON.stringify(city_name));
    })

    var values = city_name.length
    var limit = 3

    $('body').on('click', '.selectedCities', function(){
      var htmls = []
      let isChecked = $(this).is(':checked')
      let city_value = $(this).attr('value')
      let pref_name = $(this).attr('data-pref')

      if(isChecked){
        if(values < limit){
          $(this).prop('checked', true)
          city_name.push($(this).attr('value'))
          values ++
          if(!$('#checker').find('#city_selected').length){
            htmls +=
              '<div id="city_selected">'
                +'<span class="fnt-sz-2" id="'+city_value+'">'+city_value+'/</span>'
                +'<input type="hidden" id="'+city_value+'" name="cities['+pref_name+'][]" value="'+city_value+'" data-pref-value="'+pref_name+'" class="cities_selected"/>'
                +'<input type="hidden" id="'+city_value+'" name="city[]" value="'+city_value+'" data-pref-value="'+pref_name+'" class="cities_selected"/>'
              +'</div>'
          }else{
            htmls  +=
                '<span class="fnt-sz-2" id="'+city_value+'">'+city_value+'/</span>'
                +'<input type="hidden" id="'+city_value+'" name="cities['+pref_name+'][]" value="'+city_value+'" data-pref-value="'+pref_name+'" class="cities_selected"/>'
                +'<input type="hidden" id="'+city_value+'" name="city[]" value="'+city_value+'" data-pref-value="'+pref_name+'" class="cities_selected"/>'
          }
           $('#city_selected').append(htmls)
        }else{
          $(this).prop('checked', false)
        }

      }else{
        for(let a = 0; a < city_name.length; a++){
          if(city_name){
            if(city_name[a] == $(this).attr('value')){
              delete city_name[a]
              values --
              $(`#${city_value}`).remove()
            }
          }
        }
      }

      sessionStorage.setItem('result_city_names', JSON.stringify(city_name));
    })
  })
</script>
