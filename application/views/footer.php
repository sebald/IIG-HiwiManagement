	  <footer>
	  </footer>
    </div>
	<script src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery-ui-1.8.21.custom.min.js"></script>
	<script>
		$(function() {
			var MyDate = new Date();
			var MyDateString;
			MyDateString = MyDate.getFullYear() + '-' + ('0' + (MyDate.getMonth()+1)).slice(-2) + '-' + ('0' + MyDate.getDate()).slice(-2)
			$( "#current_date" ).val(MyDateString);

			$( ".datepicker" ).datepicker( { dateFormat: "yy-mm-dd" } );
			
			$('[rel=tooltip]').tooltip();
		});
	</script>
</body>
</html>