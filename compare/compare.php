<?php
include('database.php');
$type = trim($_REQUEST['type']);
$res ='';
$res="<table cellspacing='2' cellpadding='0' align='left' width='200'>
<tr><th align='left'><strong>Product Attributes</strong></th></tr>
<tr height='75' align='center'><td align='left'>Product Image</td></tr>
<tr height='40' align='center'><td align='left'>city </td></tr>
<tr height='40' align='center'><td align='left'>Sector</td></tr>
<tr height='40' align='center'><td align='left'>Locality</td></tr>
<tr height='40' align='center'><td align='left'>ATM</td></tr>
<tr height='40' align='center'><td align='left'>PARK</td></tr>
<tr height='40' align='center'><td align='left'>Light Avalibility</td></tr>
</table>";
if($type=='detail')
{
$pid = explode('-',trim($_REQUEST['p_id']));
$id = $pid['1'];

$sql = mysql_query("SELECT * FROM compare where id=$id") OR die(mysql_error());
$data = mysql_fetch_assoc($sql);
$res .="<table cellspacing='2' cellpadding='0' align='left' width='240'>
<tr><th align='left'><strong>Product Details</strong></th></tr>
<tr height='75' align='center'><td align='left'><img src='image/".$data['image']."' width='75px' height='100px'></td></tr>
<tr height='40' align='center'><td align='left'>".$data['city']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['sector']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['locality']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['atm']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['park']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['light']."</td></tr>";
$res .= "</table>";
}
else if($type=='compare')
{
$Totalpids = (array)json_decode(stripslashes($_REQUEST['pids']));
foreach($Totalpids as $product)
{
$sql = mysql_query("SELECT * FROM compare where id=".$product->pid."");
$data = mysql_fetch_assoc($sql);
$res .="<table cellspacing='2' cellpadding='0' align='left' width='240'>
<tr><th align='left'><strong>Product Details</strong></th></tr>
<tr height='75' align='center'><td align='left'><img src='image/".$data['image']."' width='75px' height='70px'></td></tr>
<tr height='40' align='center'><td align='left'>".$data['city']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['sector']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['locality']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['atm']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['park']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['light']."</td></tr>";
$res .= "</table>";
}
}
echo $res;
?>