<?php
use yii\helpers\Html;
?>
<head>
	<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style type="text/css">
    .tb{width:100%;border-collapse: collapse;}
    .tb th{border: 1px solid #55698a;font-weight: bold;text-align: center;}
    .tb td{border:1px solid #55698a;text-align: center;}
    </style>
    <script  src="js/angular.min.js"></script>
    <script  src="js/jquery.min.js"></script>
</head>
<body ng-app="myApp" ng-controller="appctrl">
	<div class="input" >
		<label>
			<span>路径名称(英文):</span>
			<input type="text" id="link"/>			
		</label>
		<label>
			<span>标题(英文):</span>
			<input type="text" id="title"/>			
		</label>		
		<label>
			<span>上级:</span>
			<select id="fid"  >
				<option value='0'>无</option>
				<option  ng-repeat="sellist in sel" value="{{sellist._id}}">{{sellist._name}}</option>
			</select>			
		</label>
		<label>			
			<input type="button" value="提交" ng-click="add()" />			
		</label>
	</div>
	<div class="list" >
		<table class="tb" cellspacing="0" cellpadding="0" >
		<thead>
			<tr>
				<th>id</th>
				<th>title</th>
				<th>ftitle</th>
				<th>link</th>
				<th></th>				
			</tr>
		</thead>
		<tbody>			
			<tr ng-repeat="list in data">
				<td>{{list._id}}</td>
				<td>{{list._title}}</td>
				<td>{{list._ftitle}}</td>
				<td>{{list._link}}</td>
				<td><a href="javascript:void(0)" ng-click="del(list._del)">delete</a></td>
			</tr>
		</tbody>
			
		</table>
	</div>
	<script type="text/javascript">
		var app = angular.module('myApp', []);
		app.controller('appctrl', function($scope,$http) {
			var url = "index.php?r=root/getlist";
			var ajax = new ajaxClass($http,url);
			ajax.headers = { 'Content-Type': 'application/x-www-form-urlencoded' };// 千万记住要传递表单数据的时候设置请求头
			ajax.successCallback = function(res){
				var list=showlist(res);
				var sellist=showselect(list);				
				$scope.data=list;
				$scope.sel=sellist;
			};
			ajax.failureCallback = function(res){
			};
			ajax.requestData();	

			$scope.del=function(id){				
		    	if(id!=0){
		    		var url = "index.php?r=root/del";
				    var ajax = new ajaxClass($http,url,"POST");
				    ajax.data = $.param({"id":id});                // 传递表单数据的时候要使用$.param不然服务器没法正常捕获到发送的数据
				    ajax.headers = { 'Content-Type': 'application/x-www-form-urlencoded' };            // 千万记住要传递表单数据的时候设置请求头
				    ajax.successCallback = function(res){
				    	var list=showlist(res);
						var sellist=showselect(list);				
						$scope.data=list;
						$scope.sel=sellist;
				    };
				    ajax.failureCallback = function(res){
				    };
				    ajax.requestData();
		    	}else{
		    		alert("Can't delete");
		    	}
		    }
		    $scope.add = function () {		  
		    	var link=getId("link");
		    	var title=getId("title");		    	
		    	var fid=getId("fid");
		    	
		    	if(link!="" && title!=""){
		    		var url = "index.php?r=root/add";
				    var ajax = new ajaxClass($http,url,"POST");
				    ajax.data = $.param({"link":link.value,"title":title.value,"fid":fid.options[fid.selectedIndex].value});                // 传递表单数据的时候要使用$.param不然服务器没法正常捕获到发送的数据
				    ajax.headers = { 'Content-Type': 'application/x-www-form-urlencoded' };            // 千万记住要传递表单数据的时候设置请求头
				    ajax.successCallback = function(res){
				    	var list=showlist(res);
						var sellist=showselect(list);				
						$scope.data=list;
						$scope.sel=sellist;
				    };
				    ajax.failureCallback = function(res){
				    };
				    ajax.requestData();
		    	}else{
		    		alert("Input error");
		    	}
		    }	
		});

		function ajaxClass(_http,_url,_method,_params,_headers,_data,_responseType,_successCallback,_failureCallback){
		    this.http = _http;
		    this.url = _url || "";
		    this.method = _method || "GET";
		    this.params = _params || "";
		    this.headers = _headers || "";
		    this.data = _data || "";
		    this.responseType = _responseType || "json";
		    this.successCallback = _successCallback || function(res){
		    };
		    this.failureCallback = _failureCallback || function(res){
		    
		    };
		    this.requestData = function (){
		        this.http({
			        method:this.method,
			        url:this.url,
			        params:this.params,
			        data:this.data,
			        headers : this.headers,
			        responseType : this.responseType
		    	}).then(this.successCallback, this.failureCallback);
		    }
		}
		function showlist(res){
			var list=Array();		
			for (var i = 0; i <res.data.length; i++) {
				list[i]={};
				list[i]._id=res.data[i]["id"];			
				list[i]._title=res.data[i]["title"];
				list[i]._fid=res.data[i]["fid"];
				list[i]._ftitle="";
				list[i]._link=res.data[i]["link"];
				list[i]._del=list[i]._id;

				if(list[i]._fid != "0"){
					for(var j=0;j<res.data.length;j++){
						if(list[i]._fid==res.data[j]["id"]){
							list[i]._ftitle=res.data[j]["title"];
							list[j]._del="0";
						}
					}
				}else{
					list[i]._ftitle="none";
				}
			}
			return list;
		}
		function showselect(list){
			var re=Array();
			var k=0;
			for(var i = 0 ;i<list.length;i++){				
				if(list[i]._fid == "0"){
					re[k]={};
					re[k]._id=list[i]._id;
					re[k]._name=list[i]._title;					
					for(var j =0;j<list.length;j++){
						if(list[i]._id==list[j]._fid){
							k++;
							re[k]={};
							re[k]._id=list[j]._id;
							re[k]._name="-"+list[j]._title;
						}						
					}
					k++;
				}				
			}
			console.log(re);
			return re;
		}
		function getId(id){
			return document.getElementById(id);
		}
	</script>
</body>