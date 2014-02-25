<? 
$mPDF1 = Yii::app()->ePdf->mpdf();
$mPDF1 = Yii::app()->ePdf->mpdf('', 'A3');
$project_id=$_GET['project_id'];


$mpdf=new mPDF('utf-8', array(180,254));
$project_name=projectnamefunc($project_id);
$prodetails= existprojectfromdbfunc($project_id);

$lcount= $prodetails['level_count'];
$rcount= $prodetails['room_count'];
$subject= $prodetails['subject'];
$description=$prodetails['description'];

$mpdf->mirrorMargins = 1;
$mpdf->SetTitle('Project Details');
$mpdf->SetAuthor('Medianet');
$mpdf->SetCreator('Project');
$mpdf->SetSubject('Project');

  $mailformat="<body><div style='width:960px;display:table;background-color:#f1f1f1;padding:10px;'><div style='display:table;margin-bottom:10px;padding:5px;font-size:20px;'><div style='width:460px;float:left;color:#257189;'><strong>Project Name</strong></div>
<div style='width:60px;float:left;color:#257189;'>:</div><div style='width:230px;float:left;color:#257189;'>$project_name </div></div><div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>Project Details</strong> </div><div style='display:table;margin-bottom:10px;padding:5px;font-size:14px;'><div style='width:460px;float:left;'><strong>Subject</strong></div>
<div style='width:60px;float:left;'>:</div><div style='width:230px;float:left;'>$subject </div></div><div style='display:table;margin-bottom:10px;padding:5px;font-size:14px;'><div style='width:460px;float:left;'><strong>Description</strong></div><div style='width:60px;float:left;'>:</div><div style='width:230px;float:left;'>$description </div></div><div style='display:table;margin-bottom:10px;padding:5px;font-size:14px;'><div style='width:460px;float:left;'><strong>Level Count</strong></div><div style='width:60px;float:left;'>:</div><div style='width:230px;float:left;'>$lcount </div></div><div style='display:table;margin-bottom:10px;padding:5px;font-size:14px;'><div style='width:460px;float:left;'><strong>Room Count</strong></div>
<div style='width:60px;float:left;'>:</div><div style='width:230px;float:left;'>$rcount </div></div></div></body>";
   

$mPDF1->WriteHTML($mailformat,2);
$mPDF1->Output('Project.pdf','I');
	?>	