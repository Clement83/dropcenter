<?php
//é
require_once('header.php') ;
	$tpl->assign('userList',parseUsers('./'));
	$tpl->assign('dir',scandir(DIR_LANG));

	$tpl->assign('error',(isset($_GET['error'])?addslashes(htmlentities($_GET['error'])):null));
	$view = 'index';
require_once('footer.php');
?>