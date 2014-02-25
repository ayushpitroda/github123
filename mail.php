 function NewProjectsViewallForMail($project_id)
   {
	$lcount=levelcountfunc($project_id)-1;
	$slcount=levelcountfunc($project_id);
	$pro_d_qsns=projectviewfunc('1','1',$project_id);
	$project_name=projectnamefunc($project_id);
 
  $mailformat="<body>
<div style='width:960px;display:table;background-color:#f1f1f1;padding:10px;'><div style='display:table;margin-bottom:10px;padding:5px;font-size:20px;'><div style='width:460px;float:left;color:#257189;'><strong>Project Name</strong></div><div style='width:60px;float:left;color:#257189;'>:</div><div style='width:430px;float:left;color:#257189;'>".projectnamefunc($project_id)." </div></div>  	
<div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>".pwrd(205)."</strong> </div><div style='padding-left:20px;'>";
   
	// project details
	foreach($pro_d_qsns as $p_key => $p_val) {
	 $q_id=$p_val['question_id'];
	 $p_array=mainquestion($q_id);
	 $question_type=$p_array['q_type'];
	 $question_content=questionlangfunction($p_array['id']);
	 $ans_id=$p_array['a_type'];

$mailformat.="<div style='width:960px;display:table;'><div style='width:450px;float:left;'>$question_content</div><div style='width:60px;float:left;'>:</div><div style='width:450px;float:left;'> ".questionanswertypechefunc($q_id,$p_val['answer_dicsrption'])."</div></div>";
    
	 } 

	   

 $mailformat.=" </div><div style='display:table;'><div style='width:454px;float:left;color:#f00;background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>".pwrd('207')."</strong></div><div style='width:30px;float:left;color:#f00;background-color:#dedede;margin-bottom:5px;padding:5px;'>: </div>
<div style='width:454px;float:left;color:#f00;background-color:#dedede;margin-bottom:5px;padding:5px;'>". $slcount."</div></div>";
		
    for ($l = 0; $l <= $lcount; $l++){ 
   $slevelnamearray= QuestionAnswers::model()->find(array('condition'=>"project_id ='$project_id' and level_id='$l' and question_id='0' and room_id is null"));
   
$mailformat.="<div style='width:960px;display:table;'><div style='width:960px;float:left;color:#3399FF;'><strong>".pwrd(208)." - $l</strong> </div>
	  </div><div style='color:#00559b; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>".pwrd(208)." - $l ".pwrd(209)."</strong> </div><div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'>". mainquestionlang('78')." </div><div style='width:60px;float:left;'>:</div><div style='width:450px;float:left;'>".LevelNameFromdbFunc($project_id,$l)."</div></div><div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'> ".mainquestionlang('79')."</div><div style='width:60px;float:left;'>:</div><div style='width:450px;float:left;'>".LevelLengthFromdbFunc($project_id,$l)."</div></div>";
 $mailformat.="<div>";	  
	  
	  $l_md_qsns=levelviewfunc('2','1',$project_id,$l);
	    foreach($l_md_qsns as $l_m_key=>$l_m_val) {
			 $l_m_q_id=$l_m_val['question_id'];
			 $l_m_array=mainquestion($l_m_q_id);
			 $question_type=$l_m_array['q_type'];
			 $question_content=questionlangfunction($l_m_array['id']);
			 $ans_id=$l_m_array['a_type'];    
 $mailformat.="<div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'>".$question_content." </div><div style='width:60px;float:left;'>:</div><div  style='width:450px;float:left;'>". questionanswertypechefunc($l_m_q_id,$l_m_val['answer_dicsrption'])."</div>
	</div>";		
	        }
 $mailformat.="</div>";			
	
	        $rcount=roomcountfunc($project_id,$l);
 $mailformat.="<div style='display:table;'>
	 <div style='width:454px;float:left;color:#f00;background-color:#dedede;margin-bottom:5px;padding:5px;'><strong>". pwrd('210')."</strong> </div>
	 <div style='width:40px;float:left;color:#f00;background-color:#dedede;margin-bottom:5px;padding:5px;'>: </div><div style='width:454px;float:left;color:#f00;background-color:#dedede;margin-bottom:5px;padding:5px;'>".$rcount."</div>		
	</div>";	 
	        for ($r = 1; $r <= $rcount; $r++){ 

            $roomnamearray= QuestionAnswers::model()->find(array('condition'=>"project_id ='$project_id' and level_id='$l' and question_id='0' and room_id='$r'"));
			
 $mailformat.="<div style='width:960px;display:table;'><div style='width:960px;float:left;color:#3399FF;'><strong>". pwrd('204')." - ".$r." </strong> </div>
</div><div style='color:#00559b;background-color:#dedede;margin-bottom:5px;padding:5px;'><strong>".pwrd('204')." - ".$r." ". pwrd('209')."</strong></div>
<div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'>".mainquestionlang('80')."</div><div style='width:60px;float:left;'>:</div><div style='width:450px;float:left;'>".RoomNameFromdbFunc($project_id,$l,$r)."</div></div><div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'>".mainquestionlang('81')."</div><div style='width:60px;float:left;'>:</div><div style='width:450px;float:left;'>".RoomLengthFromdbFunc($project_id,$l,$r)."</div></div>";
 
 $mailformat.="<div>";
			
	        $r_md_qsns=roomviewfunc('3','1',$project_id,$l,$r);
			foreach($r_md_qsns as $r_m_key=>$r_m_val) {
			 $r_m_q_id=$r_m_val['question_id'];
			 $r_m_array=mainquestion($r_m_q_id);
			 $question_type=$r_m_array['q_type'];
			 $question_content=questionlangfunction($r_m_array['id']);
			 $ans_id=$r_m_array['a_type'];
 $mailformat.="<div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'>".$question_content."</div><div style='width:60px;float:left;'>:</div><div  style='width:450px;float:left;'>".questionanswertypechefunc($r_m_q_id,$r_m_val['answer_dicsrption'])."</div>
	</div>";	
	                                                  }
													  
 $mailformat.="</div>";
 $mailformat.=" <div style='color:#f00; background-color:#dedede; margin-bottom:5px;padding:5px;'><strong>".pwrd(204)." - $r  ".pwrd(211)."</strong> </div>";												 $mailformat.="<div>";
		  
		  foreach($diciplinesdisply as $diskey => $disvalue) { 
				$r_discp_id=$disvalue['id'];
				$r_discp_name=$disvalue['name'];
				$r_discp_count=room_discplinecountfunc('3','2',$r_discp_id,$project_id,$l,$r);
			   if($r_discp_count >0) 
			   { 
				 $l_d_qsns=roomview_dsicp_func('3','2',$r_discp_id,$project_id,$l,$r); 
 $mailformat.="<div style='color:#217C7E;'><strong> $r_discp_name</strong></div>";
 
          foreach($l_d_qsns as $p_key => $p_val) {
			 $q_id=$p_val['question_id'];
			 $p_array=mainquestion($q_id);
			 $question_type=$p_array['q_type'];
			 $question_content=questionlangfunction($p_array['id']);
			 $question_discp=$p_array['discipline_id'];
			 if($question_type=='2') {				 
	
 $mailformat.="<div style='width:960px;display:table;padding-left:20px;'><div style='width:450px;float:left;'>$question_content </div><div style='width:60px;float:left;'>:</div><div  style='width:450px;float:left;'>".questionanswertypechefunc($q_id,$p_val['answer_dicsrption'])."</div>
	</div>";	 
	        }  }  } 	}
			
 $mailformat.="</div>";			
	  	 } }
 $mailformat.="</div>";
	   
$mailformat.="</body>";
return $mailformat;

   }	  
   
