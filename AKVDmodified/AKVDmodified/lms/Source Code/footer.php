<!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright <?php echo date('Y') ?>. All right reserved. Developed by Group Omega.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

<script>
          var input = document.getElementById("dob");
          var today = new Date();
          var day = today.getDate();

          // Set month to string to add leading 0
          var mon = new String(today.getMonth()+1); //January is 0!
          var yr = today.getFullYear();

            if(mon.length < 2) { mon = "0" + mon; }

            var date = new String( yr + '-' + mon + '-' + day );

          input.disabled = false; 
          input.setAttribute('max', date);
</script>

</html>