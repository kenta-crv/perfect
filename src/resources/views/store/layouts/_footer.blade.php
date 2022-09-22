<footer class="l-footer">
  <div class="p-footer">
	  <div class="l-container__sp">
      
      <div class="p-footer__info">
        <small class="copyright">© <?= date('Y'); ?>robore Co.,Ltd.  All rights reserved</small>
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
      if (!event.target.matches('.dropbtn-new')) {
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
    
