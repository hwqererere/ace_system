<?php 
$row = 0;
$j = 1; 
$fileshow = __DIR__."/../language.csv"; 
$language=Array();
if (($handle = fopen($fileshow, "r")) !== FALSE) {
 while (($data = fgetcsv($handle, ",")) !== FALSE) {
   $language[$data[0]]=$data[1];//0,en,1,zh-Cn
 }
}
return $language;
/*
return Array(
	'Chinese'=>'中文',
	'English'=>'英文',
	'Login'=>'登陆',
	'Username'=>'用户名',
	'Password'=>'密码',
	'Remember Me'=>'记住',
	'Captcha'=>'验证码',
	'Captcha Error'=>'验证码错误',
	'Rooter login'=>'管理员登陆',
	'MAIN PAGE'=>'主页面',
	'Rooter manage'=>'管理员管理',
	'Add Manager'=>'添加管理员',
	'Rooter username'=>'管理员用户名',
	'System Config'=>'系统设置',
	'Submit Sucess'=>'提交成功',
	'Rooter'=>'管理员',
	'lastlogip'=>'最后登录ip',
	'lastlogtime'=>'最后登录时间',
	'Status'=>'状态',
	'Operation'=>'操作',
	'normal'=>'正常',
	'frozen'=>'冻结',
	'Info'=>'详细信息',
	'time'=>'时间',
	'action'=>'行为',
	'Add'=>'添加',
	'Password confim'=>'密码确认',
	'Change Password'=>'更改密码',
	'Change Password confim'=>'更改密码确认',
	'Power'=>'权限',
	'show'=>'显示',
	'change'=>'更改',
	'Memo'=>'备注',
	'show and change'=>'显示和更改',
	'Username can not be null'=>'用户名不能为空',
	'Passwords do not match'=>'密码不一致',
	'Rooter Edit'=>'管理员修改',
	'Submit'=>'提交',
	"If you need't change,please don't full"=>'如果不需要更改，请勿填写',
	'User manage'=>'用户管理',
	'Save'=>'保存',
	'action length'=>'行为记录长度',
	'Delete All Action'=>'删除所有行为记录',
)*/
?>