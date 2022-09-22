<footer class="l-footer">
    <div class="p-footer">
        <div class="l-container__sp">

        <div class="p-footer__info--2">
            <div class="p-footer-forms">
                <small>© robore Co.,Ltd.  All rights reserved</small>
                <div class="display_inline--flex">
                    <a href="{{ route('company.index')}}" class="grn-txt-2">会社概要</a>
                    <a href="https://robore.jp/file/termsandservice.pdf" class="grn-txt-2">ロボレ利用規約</a>
                    <a href="https://robore.jp/file/privacy.pdf" class="grn-txt-2">プライバシーポリシー</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </footer>
  <script>
      /* When the user clicks on the button,
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
      </script>

