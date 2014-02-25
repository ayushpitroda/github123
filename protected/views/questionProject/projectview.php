<? 
$lcount=levelcountfunc($project_id)-1;
$pro_d_qsns=projectviewfunc('1','1',$project_id);
$diciplinesdisply = discplinelistfunc();

$mailformat="<body>
<h3> $model->project_name <span style='margin:800px;'></span></h3><div style='width:960px;display:table;background-color:#f1f1f1;padding:10px;'><div style='display:table;margin-bottom:10px;padding:5px;font-size:20px;'><div style='width:460px;float:left;color:#000000;'><strong>Project Name</strong></div><div style='width:60px;float:left;color:#000000;'>:</div><div style='width:430px;float:left;color:#000000;'> projectnamefunc($project_id);</div></div>  	
<div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>Project Details</strong> </div><div style='padding-left:20px;'>";
   
	// project details
	foreach($pro_d_qsns as $p_key => $p_val) {
	 $q_id=$p_val['question_id'];
	 $p_array=mainquestion($q_id);
	 $question_type=$p_array['q_type'];
	 $question_content=questionlangfunction($p_array['id']);
	 $ans_id=$p_array['a_type'];

$mailformat.="<div style='width:960px;display:table;'><div style='width:450px;float:left;'>$question_content;</div><div style='width:60px;float:left;'>:</div><div style='width:450px;float:left;'> questionanswertypechefunc($q_id,$p_val['answer_dicsrption'])</div></div>";
 } 
$mailformat.= "</div><div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>Project Disciplines</strong> </div>		
	  <div style='padding-left:20px;'>";
	  // project discplines
	   foreach($diciplinesdisply as $diskey => $disvalue) { 
        $pro_discp_id=$disvalue['id'];
		$pro_discp_name=$disvalue['name'];
	//	$pro_discp_qsns=projectviewfunc('1',$project_id);
	 	$p_discp_count=discplinecountfunc('1','2',$pro_discp_id,$project_id);
       if($p_discp_count >0) 
	   { 
	     $pro_d_qsns=projectview_dsicp_func('1','2',$pro_discp_id,$project_id); 
         $mailformat.= "	<div style='color:#217C7E;'><strong> $pro_discp_name; </strong> </div> ";		
	
	 foreach($pro_d_qsns as $p_key => $p_val) {
	 $q_id=$p_val['question_id'];
	 $p_array=mainquestion($q_id);
	 $question_type=$p_array['q_type'];
	 $question_content=questionlangfunction($p_array['id']);
	 $question_discp=$p_array['discipline_id'];
	 if($question_type=='2') {
	
	
$mailformat.= "<div style='width:960px;display:table;padding-left:20px;'><div style='width:430px;float:left;'> $question_content; </div><div style='width:60px;float:left;'>:</div><div style='width:470px;float:left;'> questionanswertypechefunc($q_id,$p_val['answer_dicsrption'])</div>
	</div>";
	    }  }  } 	} 
	   
$mailformat.= "</div><div style='width:960px;display:table;'><div style='width:470px;float:left;color:#3399FF;'><strong>Level Count</strong> </div>
		<div style=width:60px;float:left;color:#3399FF;'>: </div><div style='width:430px;float:left;color:#3399FF;'> $lcount </div></div>";
		
    for ($l = 0; $l <= $lcount; $l++){ 
   $slevelnamearray= QuestionAnswers::model()->find(array('condition'=>"project_id ='$project_id' and level_id='$l' and question_id='0' and room_id is null"));
 
$mailformat.="<div style='width:960px;display:table;'><div style='width:470px;float:left;color:#3399FF;'><strong>Level  $l  Name</strong> </div><div style='width:60px;float:left;color:#3399FF;'>: </div><div style='width:430px;float:left;color:#3399FF;'>$slevelnamearray['answer_dicsrption']</div></div><div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>Level $l Details</strong> </div>

	 <div>"; 
	     $l_md_qsns=levelviewfunc('2','1',$project_id,$l);
	    foreach($l_md_qsns as $l_m_key=>$l_m_val) {
		 $l_m_q_id=$l_m_val['question_id'];
		 $l_m_array=mainquestion($l_m_q_id);
		 $question_type=$l_m_array['q_type'];
		 $question_content=questionlangfunction($l_m_array['id']);
		 $ans_id=$l_m_array['a_type'];
	$mailformat.="<div style='width:960px;display:table;padding-left:20px;><div style='width:450px;float:left;'>$question_content </div> <div style='width:60px;float:left;'>:</div><div  style='width:450px;float:left;'>questionanswertypechefunc($l_m_q_id,$l_m_val['answer_dicsrption'])</div></div>";
	   } $mailformat.="</div><div style=color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;><strong>Level $l Discplines</strong> </div><div style='padding-left:20px;'> ";
	  // level discplines
	   foreach($diciplinesdisply as $diskey => $disvalue) { 
        $l_discp_id=$disvalue['id'];
		$l_discp_name=$disvalue['name'];
		$l_discp_count=level_discplinecountfunc('2','2',$l_discp_id,$project_id,$l);
       if($l_discp_count >0) 
	   { 
	     $l_d_qsns=levelview_dsicp_func('2','2',$l_discp_id,$project_id,$l); 
	 
	$mailformat.="<div style='color:#217C7E;'><strong> $l_discp_name; </strong> </div>";
	  foreach($l_d_qsns as $p_key => $p_val) {
		 $q_id=$p_val['question_id'];
		 $p_array=mainquestion($q_id);
		 $question_type=$p_array['q_type'];
		 $question_content=questionlangfunction($p_array['id']);
		 $question_discp=$p_array['discipline_id'];
		 if($question_type=='2') {
		
		
	 $mailformat.="<div style='width:960px;display:table;padding-left:20px;'><div style='width:430px;float:left;'>$question_content;</div><div style='width:60px;float:left;'>:</div><div  style='width:470px;float:left;'> questionanswertypechefunc($q_id,$p_val['answer_dicsrption']) </div></div>";
	    }  }  } 	} $mailformat.="</div>";
	
	 // room count 
	 $rcount=roomcountfunc($project_id,$l);
	 
    $mailformat.="<div style='width:960px;display:table;'><div style='width:470px;float:left;color:#3399FF;'><strong>Room Count</strong> </div><div style='width:60px;float:left;color:#3399FF;'>:</div><div  style='width:430px;float:left;color:#3399FF;'>$rcount</div></div>";
	   for ($r = 1; $r <= $rcount; $r++){ 
   $roomnamearray= QuestionAnswers::model()->find(array('condition'=>"project_id ='$project_id' and level_id='$l' and question_id='0' and room_id='$r'"));
  
	$mailformat.="<div style='width:960px;display:table;'><div style='width:470px;float:left;color:#3399FF;'><strong>Room $r Name</strong> </div><div style='width:60px;float:left;color:#3399FF;'>: </div><div  style='width:430px;float:left;color:#3399FF;'>$roomnamearray['answer_dicsrption']</div></div> 
		<div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>Room $r  Details</strong> </div><div>";
		 // Room more details
	     $r_md_qsns=roomviewfunc('3','1',$project_id,$l,$r);
	    foreach($r_md_qsns as $r_m_key=>$r_m_val) {
		 $r_m_q_id=$r_m_val['question_id'];
		 $r_m_array=mainquestion($r_m_q_id);
		 $question_type=$r_m_array['q_type'];
		 $question_content=questionlangfunction($r_m_array['id']);
		 $ans_id=$r_m_array['a_type'];
	
	$mailformat.="<div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'>$question_content</div><div style='width:60px;float:left;'>:</div><div  style='width:450px;float:left;'>questionanswertypechefunc($r_m_q_id,$r_m_val['answer_dicsrption'])</div></div>";
	   } $mailformat.="</div><div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>Room $r  Discplines</strong></div><div>"; 
	  // room discplines
	   foreach($diciplinesdisply as $diskey => $disvalue) { 
        $r_discp_id=$disvalue['id'];
		$r_discp_name=$disvalue['name'];
	 	$r_discp_count=room_discplinecountfunc('3','2',$r_discp_id,$project_id,$l,$r);
       if($r_discp_count >0) 
	   { 
	     $l_d_qsns=roomview_dsicp_func('3','2',$pro_discp_id,$project_id,$l,$r); 
	
	$mailformat.="<div style='color:#217C7E;'><strong>$r_discp_name</strong></div>";
	 foreach($l_d_qsns as $p_key => $p_val) {
	 $q_id=$p_val['question_id'];
	 $p_array=mainquestion($q_id);
	 $question_type=$p_array['q_type'];
	 $question_content=questionlangfunction($p_array['id']);
	 $question_discp=$p_array['discipline_id'];
	 if($question_type=='2') {

$mailformat.="<div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'>$question_content </div><div style='width:60px;float:left;'>:</div><div  style='width:450px;float:left;'>questionanswertypechefunc($q_id,$p_val['answer_dicsrption'])</div>
	</div>";
	    }  }  } 	} $mailformat.="</div>";
	   }  }  
	   
$mailformat.="</div></body>";
	
