   <nav class="p-sidebar">
    <ul class="p-sidebar__list">
        <div class="container_box_5">
            <p class="sidebar_label_3">物件種目</p>
        </div><br/>
        <div class="display_inline">
            
                <button type="submit" class="c-button_7  c-button--thinBlue">マンション</button>
            
            
                <button type="submit" class="c-button_7  c-button--thinBlue">アパート</button>
            
            
                <button type="submit" class="c-button_7  c-button--thinBlue">戸建て</button>
            
        </div>
           
        
        <div class="display_inline">
            
                <button type="submit" class="c-button_8  c-button--thinBlue">テラスハウス</button>
           
          
                <button type="submit" class="c-button_8  c-button--thinBlue">タウンハウス</button>
           
            
                <button type="submit" class="c-button_8  c-button--thinBlue">その他</button>
           
        </div>
       
        <div class="container_box_5">
            <p class="sidebar_label_3">都道府県</p>
        </div>
        <div class="header_button_2">
            <div class="p-login__buttonArea">
                <button type="submit" class="c-button_14  c-button--thinBlue">変更</button>
            </div>
        </div>
        <div class="box-title">
            <p class="sidebar_label_3">東京 / 神奈</p>
        </div>
        <div class="tab_4">
            <button class="tablinks_4" onclick="openCity(event, 'London')">市区群</button>
            <button class="tablinks_4" onclick="openCity(event, 'Paris')">路線</button>
        </div><br/>
        <div id="London" class="tabcontent_4">
            <div class="header_button_1">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-button_12  c-button--thinBlue">マンション</button>
                </div>
            </div>
            <div class="container_box_5">
                <p class="sidebar_label_3">町村</p>
            </div>
            <div class="header_button_2">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-button_14  c-button--thinBlue">地図を表示</button>
                </div>
            </div>
        </div>
        <div id="Paris" class="tabcontent_4">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p> 
        </div><br/>
        <div class="container_box_5">
            <p class="sidebar_label_3">建物・物件名</p>
        </div><br/>
        <div class="c-input c-input--full_22">
            <input type="password" name="password" placeholder="" value="{{ old("password") }}">
        </div><br/><br/>
        <div class="container_box_5">
            <p class="sidebar_label_3">町村</p>
        </div><br/>
        <div class="c-input c-input--full display-inline--flex_2">
            <input type="email" name="email" placeholder="">
              <span class="width-full margin-left--5">万円 ～</span>
              <input type="email" name="email" placeholder="">
              <span class="width-full margin-left--5">万円</span>
        </div><br/><br/>
        <div class="header_button_4">
            <div class="p-login__buttonArea">
                <button type="submit" class="c-button_8  c-button--thinBlue">管理・共益費込</button>
                <button type="submit" class="c-button_8  c-button--thinBlue">敷金・保証料なし</button>
            </div>
            <div class="p-login__buttonArea_4">
                <button type="submit" class="c-button_8  c-button--thinBlue">礼金なし</button>
            </div>
        </div>
        <div class="container_box_5">
            <p class="sidebar_label_3">間取り</p>
        </div><br/>
        <div class="box-title">
            <p class="sidebar_label_1">～　以下検索項目略　～</p>
        </div><br/><br/>
        <div class="container_box_7">
            <div class="header_button_7">
                <div class="p-login__buttonArea">
                    <button type="submit" class="c-button_30  c-button--thinBlue">マンション</button>
                </div>
            </div>
        </div><br/>
    </ul>
  </nav>

  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent_4");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks_4");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active_2", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active_2";
    }
    </script>

  
