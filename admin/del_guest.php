<?php
	/**
	 *@Author:       anshao
	 *@Date:         Sep 4, 2012
	 *@Encoding:     UTF-8
	 *@Link:         http://anshao.net
	 *@CopyRight:    Anshao
	 */
	require '../includes/comm.inc.php';
	
	isAccess();
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		//判断是否存在提交的id对应的留言
		mysqlQuery("SELECT `vt_id` FROM `vt_guest` WHERE `vt_id`='{$_GET['id']}'");
		if(mysql_affected_rows() == 0){
			alertBack('没有该留言建议!');
		}
		
		//删除id对应的留言建议
		mysqlQuery("DELETE FROM `vt_guest` WHERE `vt_id`='{$_GET['id']}'");
		
		if(mysql_affected_rows() == 1){
			mysql_close($conn);
			alertLocation('删除留言建议成功!', 'guest_manager.php');
		}else{
			mysql_close($conn);
			alertBack('删除留言建议失败!');
		}
	}else{
		alertBack('非法参数!');
	}	 
	 
?>