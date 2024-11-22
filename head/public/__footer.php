
    <footer class="footer">
      <div>
        <span><?php echo $_COPYRIGHTS; ?></span>
      </div>
      <div>
         
		<?php getPAGELOAD('bottom', $start); ?>
      </div>
    </footer>

    <script src="<?php echo BASEPATH; ?>/public/integration/jquery/jquery.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/feather-icons/feather.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/toast/toastr.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/js/dashforge.js"></script>
	<!-- <script src="<?php echo BASEPATH?>/public/js/pace.min.js"></script> -->

 	
	<script>
	$(document).ready(function(){
	  var username = $('#username').text();
	  var res = username.toUpperCase();
	  var username = res.charAt(0);
	  var profileImage = $('#profileImage').text(username);
	  var profileImage1 = $('#profileImage1').text(username);
	});
	</script>