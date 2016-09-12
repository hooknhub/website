<?php include('includes/database.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Compare User View</title>
<link href="css/style.csss" rel="stylesheet" type="text/css" />
<script src="libs/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="libs/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="libs/jquery.fancybox.css?v=2.1.5" media="screen" />

    
<script type="text/javascript">
 $(document).ready(function(){             
	$(".detail").click(function(){ 
	var p_id = $(this).attr('id');
		if(p_id!='')
		{ 
		 $.ajax({
				type:"post",
				url:"compare.php",
				data:{p_id:p_id,type:'detail'},
				cache: false,
				success:function(data){
				$.fancybox(data, {
					fitToView: false,
					width: 700,
					height: 700,
					autoSize: true,
					closeClick: false,
					openEffect: 'none',
					closeEffect: 'refresh'
				});	
					
				}
		   });
		}
	});
});

function compare()
{
	var total_check = new Array();
	$('.products:checked').each(function () {
		total_check.push($(this).val());
	});

	if (total_check != '') {
		if (total_check.length == '2') {
		var i = 0;
		var pidArray = new Object();
		$('.products:checked').each(function () {
		total_check.push($(this).val());
		var id = $(this).attr('id');
		pidArray[i] = {
			pid: id
		};
		i++;
	});
	var data = JSON.stringify(pidArray);
	$('#wait').show();
			$.ajax({
				url: "compare_main.php",
				type: "POST",
				data: {pids:data,type:'compare'},
				cache: false,
				success: function (data) {
				$('#wait').hide();
					$.fancybox(data, {
						fitToView: false,
						width: 1200,
						height: 800,
						autoSize: false,
						closeClick: false,
						openEffect: 'none',
						closeEffect: 'refresh'
					});
				}
			});
		} else {
			alert("Please select two products ");
			return false;
		}
	} else {
		alert("Please select minimum two products");
		return false;
	}
}
</script>
</head>
<body>
<div class="wrapper">
<div class="header">
</div></div>


<div class="body1">
<div class="body2">
<div class="main_table">
<table width="100%">
<h1 align="center">comparision</h1>
<br>    
<?php $sql =mysql_query("Select * FROM compare");
		while($data = mysql_fetch_assoc($sql)) {?>
	<td>
        <img src="images/<?php echo $data['image']; ?>" width="120" height="120;"><br/>      
        <?php echo $data['city']; ?><br/>
		<?php echo $data['sector']; ?><br/>
		<?php echo $data['locality']; ?><br/>
		<input type="checkbox" name="products[]" class="products" id="<?php echo $data['id']; ?>"></br>
        
	</td>
	
	<?php } ?>
</table>
<td width="50%"><a href="javascript:void(0)" onclick="compare();" style="color:green;font-size:50px;"><b>Compare</b></a></td>
</div>
</div></div>
</div>

</body>
</html>
