<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
.button1{
	background-color:#F03;
}
</style>
</head>
<body>
<?php 
$db = mysqli_connect('localhost', 'root', '', 'den');
if(isset($_POST['check'])){
	$date=$_POST['date'];
	$choice=$_POST['choice'];
	$query1="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='8.00-9.00a.m'";
	$query2="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='9.00-10.00a.m'";
	$query3="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='10.00-11.00a.m'";
	$query4="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='11.00-12.00a.m'";
	$query5="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='12.00-1.00a.m'";
	$query6="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='1.00-2.00a.m'";
	$query7="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='2.00-3.00a.m'";
	$query8="SELECT * FROM booking WHERE date='$date' && category='$choice' && time='3.00-4.00a.m'";
	if (mysqli_num_rows(mysqli_query($db,$query1)) > 5) {
  	  $name_error1 = "Sorry... username already taken";
	}
	if (mysqli_num_rows(mysqli_query($db,$query2)) > 5) {
  	  $name_error2 = "Sorry... username already taken";
	}
	if (mysqli_num_rows(mysqli_query($db,$query3)) > 5) {
  	  $name_error3 = "Sorry... username already taken";
	}
	if (mysqli_num_rows(mysqli_query($db,$query4)) > 5) {
  	  $name_error4 = "Sorry... username already taken";
	}
	if (mysqli_num_rows(mysqli_query($db,$query5)) > 5) {
  	  $name_error5 = "Sorry... username already taken";
	}
	if (mysqli_num_rows(mysqli_query($db,$query6)) > 5) {
  	  $name_error6 = "Sorry... username already taken";
	}
	if (mysqli_num_rows(mysqli_query($db,$query7)) > 5) {
  	  $name_error7 = "Sorry... username already taken";
	}
	if (mysqli_num_rows(mysqli_query($db,$query8)) > 5) {
  	  $name_error8 = "Sorry... username already taken";
	}
}
?>
<script>
var count=0;
function toogle(_this){
	if(count==0){
	_this.style.backgroundColor="#66FF99";
	count++;
	}else{
		alert("insert one already");
	}
}
function warning(){
	alert("No vacancy");
}
$(document).ready(function() {
    $('input[id="timebtn"]').click(function(){
		if(count==1){
			var time=$(this).val()
			$.ajax({
				url:"process2.php",
				method:"POST",
				data:{time:time},
				success: function(data){
					$('.aaa').html(data);
				}
			});
			count++;
		}
	});
});
</script>
<?php if(isset($_POST['check'])):?>
<input type="button" name="time" id="timebtn" value="8.00-9.00a.m"<?php if(isset($name_error1)):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="9.00-10.00a.m"<?php if(isset($name_error2)):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="10.00-11.00a.m"<?php if(isset($name_error3)):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="11.00-12.00a.m"<?php if(isset($name_error4)):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/><br><br>
<input type="button" name="time" id="timebtn" value="12.00-1.00p.m"<?php if(isset($name_error5)):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="1.00-2.00p.m"<?php if(isset($name_error6)):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="2.00-3.00p.m"<?php if(isset($name_error7)):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="3.00-4.00a.m"<?php if(isset($name_error8)):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<?php endif?>
</body>
</html>