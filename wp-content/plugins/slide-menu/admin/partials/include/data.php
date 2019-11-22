<?php if ( ! defined( 'ABSPATH' ) ) exit; 

$act = (isset($_REQUEST["act"])) ? $_REQUEST["act"] : '';
if ($act == "update") {
	$recid = $_REQUEST["id"];
	$result = $wpdb->get_row("SELECT * FROM $data WHERE id=$recid");
	if ($result){
        $id = $result->id;
        $title = $result->title;
		$param = unserialize($result->param);
		$count_i = (!empty($param['menu_1']['item_type'])) ? count($param['menu_1']['item_type']) : '0';		
		$btn = __("Update", "wow-sbmp-lang");
        $hidval = 2;
    }
}
else if ($act == "duplicate") {
	$recid = $_REQUEST["id"];
	$result = $wpdb->get_row("SELECT * FROM $data WHERE id=$recid");
	if ($result){
        $id = "";
        $title = "";
        $param = unserialize($result->param);
		$count_i = (!empty($param['menu_1']['item_type'])) ? count($param['menu_1']['item_type']) : '0';		
		$btn = __("Save", "wow-sbmp-lang");
        $hidval = 1;
    }
}
 else {
    $btn = __("Save", "wow-sbmp-lang");
    $id = "";
    $title = "";
	$param['button'] = "top";
	$count_i = 0;
    $hidval = 1;
}

?>