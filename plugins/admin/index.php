<?php 

$subdir_arr = explode("/", $_SERVER['REDIRECT_URL']);
$mennu_arr= explode("<br />", $c['menu']);
$menu_exist=false;

for($search_num=0;$search_num<count($mennu_arr);$search_num++){
	if(trim(strtolower($mennu_arr[$search_num]))==strtolower($subdir_arr[count($subdir_arr)-1]) || trim(strtolower($mennu_arr[$search_num]))=="-".strtolower($subdir_arr[count($subdir_arr)-1])){
		$menu_exist=true;
	}
}

if(basename($_SERVER['REDIRECT_URL'])=="admin" && $_SERVER["REQUEST_URI"] =="/geniesys/"){
//if(strtolower(basename(dirname(__FILE__)))== strtolower($subdir_arr[count($subdir_arr)-1]) && $menu_exist==true){
	$c['initialize_tool_plugin']=true;
	$c['tool_plugin']="admin";//strtolower($subdir_arr[count($subdir_arr)-1]);
	
}
?>
