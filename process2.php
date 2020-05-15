<?php if(isset($_POST['time'])):?>
<input type="submit" name="subs" value="submit" />
<?php $var=$_POST['time'];?>
<?php endif?>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<script>
$(document).ready(function() {
    $('input[type="submit"]').click(function(){
		var x=$(this).val();
		var time="<?php echo $var?>";
		var id=$('#id1').val();
		var choice=$('#select1').val();
		var date=$('#date1').val();
		$.ajax({
			url:"process1.php",
			method:"POST",
			data:{time:time,id:id,choice:choice,date:date,subs:x},
			success: function(data){
				$('.bbb').html(data);
			}
		});
	});
});
</script>
</body>
</html>