<?php session_start();
?>
<?php
		function checkin() {
				$todouser=trim(isset($_GET['todouser'])?$_GET['todouser']:false);
				
				return $todouser;
			}
	
	function confirmcheckin() {
		if (checkin()) {
			echo "
				<script language='javascript'>
					location.href='todos'
				</script>
			";
		}
	}
	?>