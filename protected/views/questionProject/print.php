<?
$project_id=$_GET['project_id'];
if(!userprojectaccess($project_id))
{
	if(checkrightsfunc(1))
	{
	}
	else
	{ ?>
	<div align="center" <span style="color:#DD0000; font-size:18px;">You Are Not authorised To access This Page</span></div>
	<meta http-equiv="refresh" content="1;url='../../index.php'" />
	
	<? exit();

}
?>
<div><font color="#FF0000" size="+5">You Don't have a Permissons to Access this Page</font></div>
<meta http-equiv="refresh" content="2;url='../../index.php'" />
<?
exit();
}
?>
<body onLoad="print();">
<div class="container">
<div style="width:1010px;color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px; font-size:40px;" align="center" >ETS </div>	
 
  <? print ProjectView($project_id);?>

</div>
</body>
	
