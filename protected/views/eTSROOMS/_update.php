<?
 $id= $_GET['id'];
 $roomfetch = RoomDetailsFunc($id); 
 $room_name = $roomfetch['ROOM_DESCR'];
 $status =  $roomfetch['STATUS'];
 
?><div id="page">
<form id="rooms" method="post" name="rooms">

                 <div>
                      <div>Room Name</div>
                      <div class="answer">
					  <input  type="text" name="room_name"   id="room_name" class="input-large" required value="<? print $room_name;?>" / ></div>
                </div>
				 <div >
                      <div>Status</div>
                      <div class="answer" >
					     <input type="radio" name="status" value="1"  <? if($status=='1') { ?>  checked="checked" <? }  ?> />Active
						 <input type="radio" name="status" value="0"  <? if($status=='0') { ?>  checked="checked" <? }  ?> />InActive
                </div>
               <div style="margin-bottom:10px;"></div>
			<input type="hidden"  name="ROOM_ID" value=" <? print  $id;?> "> 
			<input type="submit"  value="Submit"  name="submitRoom"  class="btn btn-primary" />
			<input type="reset" value="Reset"  class="btn"/>
</form>	
</div>
  