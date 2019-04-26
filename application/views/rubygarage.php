﻿<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RubyGarage</title>
<link href="<?= base_url() ?>extension/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet"/>
<link href="<?= base_url() ?>extension/flaticon/flaticon.css" type="text/css" rel="stylesheet"/>
<link href="<?= base_url() ?>extension/select2-3.5.2/select2.css" type="text/css" rel="stylesheet"/>
<link href="<?= base_url() ?>extension/font-awesome-4.4.0/css/font-awesome.css" type="text/css" rel="stylesheet"/>
<link href="<?= base_url() ?>extension/jquery-ui-1.11.4.custom/jquery-ui.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>extension/imgareaselect/css/imgareaselect-default.css" />
<script src="<?= base_url() ?>extension/jQuery/jquery-1.11.1.js"></script>
<!--<script type="text/javascript" src="<=base_url()?>extension/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>extension/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script src="<?= base_url() ?>extension/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url() ?>extension/select2-3.5.2/select2.js"></script>
<script src="<?= base_url() ?>extension/select2-3.5.2/select2_locale_ru.js"></script>
<script src="<?= base_url() ?>extension/js/MY_function.js"></script>
<script type="text/javascript" src="<?= base_url() ?>extension/imgareaselect/scripts/jquery.imgareaselect.pack.js"></script>
</head>
<body style="margin:0;">
<div style="background-color: #1ABC9C;">
  <div class="container" >
    <div class="row" >   
    
    </div>
      <div class="col-xs-12" >
        <h1 style="color:#FFF; text-align : center ;">SIMPLE TODO LISTS</h1>
         <h3 style="color:#FFF; text-align : center ;">FROM RUBY GARAGE</h3>
      </div>
      
    </div>
  </div>
<div class="container" >
    <div class="row" >
<div id="incorrect_auth" style="color:red; width: 200Px;"></div>
<div id="auth"></div>

</div>
    </div>
<!--Блок проектов-->  
<div class="container" >
    <div class="row" >
<div id="projects">

    
</div>
</div></div>
<!--Блок кнопки TODO--> 
<div id="TODO">

</div>
<!--Модальное окно регистрации--> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop= "static" aria-hidden="true">
<div class="modal-dialog modal-i" >
             <div class="modal-content" >
                <div class="modal-header" id="modal_header" >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="modal_del('myModal');">&times;</button>
               <h4 class="modal-title" id="myModalLabel"><span id="del3">
                <?=$this->lang->line('global_home_registration')?></span></h4>
                </div>
                <div class="modal-body" id="modal_body">
                <div class="row">
                <div class="col-xs-12">
              
                </div>
                </div>
                
                <div class="row">
                <div class="col-xs-4">
<span class="pull-right"><i class="fa fa-envelope-o fa-fw" ></i>&nbsp;<?=$this->lang->line('global_home_registration_your_email')?>:</span>
</div>
<div id="div_error_reg_email" class="col-xs-6">
<input class="form-control" type="text" placeholder="<?=$this->lang->line('global_home_registration_enter_your_email')?>" id="reg_email" name="email" value=""/><span id="span_error_reg_email">&nbsp;&nbsp;</span><div id="error_reg_email" style="color:red;"></div>
</div>
<div class="col-xs-4">
<span class="pull-right"><i class="fa fa-key fa-fw"></i>&nbsp;<?=$this->lang->line('global_home_registration_your_password')?>:</span>
</div>
<div id="div_error_reg_password" class="col-xs-6">
<input class="form-control" type="password" placeholder="<?=$this->lang->line('global_home_registration_enter_password')?>" id="reg_password" name="password" value=""/><span id="span_error_reg_password">&nbsp;&nbsp;</span><div id="error_reg_password" style="color:red;"></div>
</div>
<div class="col-xs-4">
<span class="pull-right"><i class="fa fa-key fa-fw"></i>&nbsp;<?=$this->lang->line('global_home_registration_repeat_password')?>:</span>
</div>
<div id="div_error_reg_password2" class="col-xs-6">
<input class="form-control" type="password" placeholder="<?=$this->lang->line('global_home_registration_enter_password')?>" id="reg_password2" name="password2" value=""/><span id="span_error_reg_password2">&nbsp;&nbsp;</span><div id="error_reg_password2" style="color:red;"></div>
</div>
<div class="col-xs-4">
<span class="pull-right"><i class="fa fa-user fa-fw"></i>&nbsp;<?=$this->lang->line('global_home_registration_your_name')?>:</span>
</div>
<div id="div_error_reg_name" class="col-xs-6">
<input class="form-control" type="text" placeholder="<?=$this->lang->line('global_home_registration_enter_your_name')?>" id="reg_name" name="name" value=""/><span id="span_error_reg_name">&nbsp;&nbsp;</span><div id="error_reg_name" style="color:red;"></div>
</div>

</div>
<p></p>
<div class="row">
<div id="reg_error_submit" class="col-xs-10 col-xs-offset-2">
<b><?=$this->lang->line('global_home_registration_info_all_fields')?></b>
				</div>
				</div>
                </div>
                <div class="modal-footer" id="modal_footer">
                <div class="row">
                <div class="col-xs-6">
                <button class="btn btn-primary pull-right" style="width: 150Px" type="submit" id="reg_submit" ><?=$this->lang->line('global_home_registration')?></button>
               
                </div>
                <div class="col-xs-6">
                <button type="button" class="btn btn-primary pull-left" style="width: 150Px" data-dismiss="modal" aria-hidden="true" onClick="modal_del('myModal'); return false;"><?=$this->lang->line('global_home_registration_cancel')?></button>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>

<!--Модальное окно добавления проектов--> 
<div class="modal fade" id="myModalProjects" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop= "static" aria-hidden="true">
<div class="modal-dialog modal-i" >
             <div class="modal-content" >
                <div class="modal-header" id="modal_header" >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="modal_del('myModalProjects');">&times;</button>
               <h4 class="modal-title" id="myModalLabel"><span id="del3">
                <?=$this->lang->line('global_home_projects')?></span></h4>
                </div>
                <div class="modal-body" id="modal_body">
                <div class="row">
                <div class="col-xs-12">
              
                </div>
                </div>
                
                <div class="row">
                <div class="col-xs-4">
<span class="pull-right"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<?=$this->lang->line('global_home_projects')?>:</span>
</div>
<div id="div_error_create" class="col-xs-6">
<input class="form-control" type="text" placeholder="<?=$this->lang->line('global_home_projects_enter_your_project')?>" id="new_project" name="new_project" value=""/><span id="span_error_create_project">&nbsp;&nbsp;</span><div id="error_create_project" style="color:red;"></div>
</div>

</div>
<p></p>
<div class="row">
<div id="error_create" class="col-xs-10 col-xs-offset-2">
				</div>
				</div>
                </div>
                <div class="modal-footer" id="modal_footer">
                <div class="row">
                <div class="col-xs-6">
                <button class="btn btn-primary pull-right" style="width: 150Px" type="submit" id="create_submit" ><?=$this->lang->line('global_home_projects_create')?></button>
                </div>
                <div class="col-xs-6">
                <button type="button" class="btn btn-primary pull-left" style="width: 150Px" data-dismiss="modal" aria-hidden="true" onClick="modal_del('myModalProjects'); return false;"><?=$this->lang->line('global_home_registration_cancel')?></button>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>




















<script type="text/javascript">

var str_noaut = '<div >\
<div  style="width: 100Px"><i class="fa fa-envelope-o fa-fw" ></i>&nbsp;<?=$this->lang->line('global_home_email');?>:</div>\
<div id="div_error_auth_email">\
<input class="form-control" style="width: 220Px" type="text" placeholder="<?=$this->lang->line('global_home_email');?>" name="email" id="auth_email"  value="<?=set_value('email')?>"/>\
<span id="span_error_auth_email" style="right: 5px;">&nbsp;&nbsp;</span><div id="error_auth_email" style="color:red; width: 200Px;"></div>\
</div>\
</div>\
<div>\
<div style="width: 100Px"><i class="fa fa-key fa-fw"></i>&nbsp;<?=$this->lang->line('global_home_password');?>:</div>\
<div id="div_error_auth_password">\
<input class="form-control" style="width: 220Px" type="password" placeholder="<?=$this->lang->line('global_home_password');?>" id="auth_password" name="password" value=""/>\
<span id="span_error_auth_password" style="right: 5px;">&nbsp;&nbsp;</span><div id="error_auth_password" style="color:red; width: 200Px;"></div>\
</div>\
</div>\
<button class="btn btn-primary" onClick="enter();" style="width: 220Px; height: 35px; text-align: left; padding: 1px 6px; background-color: #1ABC9C; font-weight: bold; border-color: #1ABC9C;" >\
<?=$this->lang->line('global_home_enter');?>\
</button>\
<p></p>\
<button class="btn btn-primary" onClick="reg_show(\'myModal\');" style="width: 220Px; height: 35px; text-align: left; padding: 1px 6px; background-color: #1ABC9C; font-weight: bold; border-color: #1ABC9C;" >\
<?=$this->lang->line('global_home_registration');?></button>\
<p></p>\
';
var str_aut = '<div class="container" >\
  <div class="row">\
    <div >\
      <div id="div_error_auth_email">\
       <p></p>\
        <button class="btn btn-primary" onClick="out();" style="width: 220Px; height: 35px; text-align: left; padding: 1px 6px; background-color: #1ABC9C; font-weight: bold; border-color: #1ABC9C;" >&nbsp;&nbsp;\
    <?=$this->lang->line('global_home_out');?>\
    </button>\
      </div>\
    </div>\
  </div>\
</div>';

var str_todolist = '<div class="container">\
    <div class="row" style="color:#FFF; text-align : center ;">\
<button class="btn btn-primary"  onClick="reg_show(\'myModalProjects\');" style="width: 220Px; height: 35px; text-align: center; padding: 1px 6px; background-color: #1ABC9C; font-weight: bold; border-color: #1ABC9C;" >&nbsp;&nbsp;\
     <span class="glyphicon glyphicon-plus"></span> Add TODO List</button>\
  </div>\
</div>';

var str_project = '<div id="mydiv_{projectid}" class="panel panel-info">\
	<div class="panel-heading">\
		<span class="panel-title">\
        <h3>\
        <span class="glyphicon glyphicon-calendar"></span>\
        &nbsp;&nbsp;{NameProjects}&nbsp;&nbsp;\
        <a href="#" id="my_del_{projectid}" onclick="delete(\'{projectid}\'); return false;">\
        <span class="glyphicon glyphicon-trash pull-right"></span>\
        </a>\
        <span class="pull-right">&nbsp;|&nbsp;</span>\
        <a href="#" id="my_edit_{projectid}" onclick="edit(\'{projectid}\'); return false;">\
        <span class="glyphicon glyphicon-pencil pull-right"></span>\
        </a>\
        </h3>\
        </span>\
</div>\
<div class="container" style="background :#D3D3D3;">\
        <div class="row" >\
        <span class="glyphicon glyphicon-plus pull-left"></span>\
         <div class="col-xs-10">\
         <div id="incorrect_create_task_{projectid}" style="color:red; width: 200Px;"></div>\
        <input class="form-control"  type="text" placeholder="<?=$this->lang->line('global_home_create_task');?>" name="value_create_task_{projectid}" id="value_create_task_{projectid}"  value=""/>\
</div>\
<button class="btn btn-primary pull-right" onClick="add_tasks(\'{projectid}\');" style=" height: 35px; text-align: left; padding: 1px 6px; background-color: #1ABC9C; font-weight: bold; border-color: #1ABC9C;" >&nbsp;&nbsp;\
<?=$this->lang->line('global_home_add_task');?>\
</button>\</div>\
</div>\
{alltasks}\
</div>';

var str_tasks = '<div id="my_div_{projectid}" class="panel-body">\
 <div id="tasks_{tasksid}" >\
{NameTasks}\
<hr style="margin:5px;"/>\
</div>\
</div>';
function modal_del(id){
			$("#"+id).modal('hide');
	}
    
 function reg_show(id){
	$('#'+id).modal();
	}

	
 function add_tasks(id){
        $.ajax({			
        type:'POST',		
		url: '<?=base_url()?>home/index',
		data: {	
			ajax: 'ajax_home_add_task',
			name: $('#value_create_task_'+id).val(),
			project_id: id,
		},
		success: function(html){
			var res = JSON.parse(html);
			start();
            if(!res.result){
                
			 	$('#incorrect_create_task_'+id).text('<?=$this->lang->line('global_home_incorrect_auth')?>');
                $("#TODO").empty();
			}else{
			 $('#incorrect_auth').empty();
			  $('#auth').empty();
              $("#auth").append(str_aut);
              $("#TODO").empty();
              $("#TODO").append(str_todolist);
              
			}
         
		}
	});
    
} 
function start(){
     $('#incorrect_auth').empty();
			  $('#auth').empty();
              $("#TODO").empty();
              $("#projects").empty();
              
    $.ajax({			
        type:'POST',		
		url: '<?=base_url()?>home/index',
		data: {				
		},
		success: function(html){
				var res = JSON.parse(html);
				//$('#auth').empty();
                //$('#incorrect_auth').empty();
                if(res.error){
					//alert(res.error);
				}            
                if(res.auth){
                    $("#auth").append(str_aut);
                    $("#TODO").append(str_todolist);
                    //alert(res.array);
                    var project = 0;
                    var projectname = '';
                    var alltasks = '';
                    for(x=0; x<res.array.length; x++){
					if(res.array[x].projectid!==0){
					   ///alert(res.array[x].projectid);
					   if(res.array[x].projectid !== project) {
					       if(project !==0){
					           //заполнение  проекта задачами и вывод проекта
                               resultproject = str_project.replace( /{projectid}/g, project);
                               resultproject = resultproject.replace( /{NameProjects}/g, projectname);
                               resultproject = resultproject.replace( /{alltasks}/g, alltasks);
                               alltasks = '';
                              //alert(resultproject);
                              $("#projects").append(resultproject);
                              //alert( '12-34-56'.replace( /-/g, ":" ) )  // 12:34:56
					       }
                           
                             
					   }
                       if(res.array[x].taskid !== null) {
                           resultalltasks = str_tasks.replace( /{projectid}/g, project);
                           resultalltasks = resultalltasks.replace( /{tasksid}/g, res.array[x].taskid);
                           resultalltasks = resultalltasks.replace( /{NameTasks}/g, res.array[x].taskname);
                           alltasks = alltasks + resultalltasks;
                            //resultalltasks= '';
                       }
                       project = res.array[x].projectid;
                       projectname = res.array[x].projectname;
					}
                    
					//var img='<div class="col-xs-2" id="'+res.name_file[x]+'_'+x+'"><button type="button" class="close" onClick="hide_del_img('+"'edit_"+name+"', '"+res.name_file[x]+"', '"+x+"', '"+res.foto[x]+"'"+'); return false;">×</button><img class="img-responsive" id="'+x+'" src="'+'<=base_url()?>users/<=$user['id']?>/img/'+res.name_file[x]+'.'+res.extension[x]+'?r='+x+'"></div>';	
//					$("#photos_edit_"+name).append(img);	
				    }
                    
                       if(project !==0){
					           //заполнение  проекта задачами и вывод проекта
                               resultproject = str_project.replace( /{projectid}/g, project);
                               resultproject = resultproject.replace( /{NameProjects}/g, projectname);
                               resultproject = resultproject.replace( /{alltasks}/g, alltasks);
                               alltasks = '';
                              //alert(resultproject);
                              $("#projects").append(resultproject);
                              //alert( '12-34-56'.replace( /-/g, ":" ) )  // 12:34:56
					       } 
                    
				}else{
  	 			 //'$("#TODO").empty();
				    $("#auth").append(str_noaut);
				}
			}
		});	
}
function enter(){
        $.ajax({			
        type:'POST',		
		url: '<?=base_url()?>home/index',
		data: {	
			ajax: 'ajax_home_enter',
			user_email: $('#auth_email').val(),
			user_password: $('#auth_password').val(),
		},
		success: function(html){
			var res = JSON.parse(html);
			if(!res.result){
			 	$('#incorrect_auth').text('<?=$this->lang->line('global_home_incorrect_auth')?>');
                $("#TODO").empty();
			}else{
			 $('#incorrect_auth').empty();
			  $('#auth').empty();
              $("#auth").append(str_aut);
              $("#TODO").empty();
              $("#TODO").append(str_todolist);
              
			}
         
		}
	});
}


function out(){
        $.ajax({			
        type:'POST',		
		url: '<?=base_url()?>home/index',
		data: {	
			ajax: 'ajax_home_out',
		},
		success: function(html){
			var res = JSON.parse(html);
            //if(res.error){
					//alert(res.error);
			//	}    
              $('#auth').empty();
              $("#TODO").empty();
			if(res.auth){
                $("#auth").append(str_aut);
			}else{
                $("#auth").append(str_noaut);
		  }
		}
	});
}
$(document).ready(function(){
		
		var pattern_email = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;
		var pattern_password = /^[A-Za-z0-9_-]{4,20}$/;//Строчные и прописные латинские буквы, цифры
		var pattern_name = /^[^0-9]{2,20}$/;//Минимум два символа максимум 20 всё кроме цифр
       	var pattern_project = /^.{1,255}$/;//Минимум два символа максимум 20 всё кроме цифр
		var pattern_surname = /^[^0-9]{2,20}$/;//Минимум два символамаксимум 20 всё кроме цифр
		var array_reg_submit = new Array(0,0,0,0);
		//reg_submit_check();
		//$("#butt1 #butt2")..mouseover(function(){$(this).toggleClass('start');});

$('#create_submit').click(function(){
    if($('#new_project').val()!=''){
    $.ajax({			
        type:'POST',		
		url: '<?=base_url()?>home/index',
		data: {	
		  	ajax: 'ajax_home_addlist',
            name: $('#new_project').val(),
		},
		success: function(html){
				var res = JSON.parse(html);
				if(res.validationerrors){
					alert(res.validationerrors);
				}else{
                    modal_del("myModalProjects");
				    start();
				}  
                
    
			}
		});	} else{
		  $('#error_create').text('<?=$this->lang->line('global_home_projects_fields')?>');
			$('#div_error_create').addClass('form-group has-error has-feedback');
			$('#span_error_create_project').addClass('glyphicon glyphicon-remove form-control-feedback');
		}
})


		$('#reg_submit').click(function(){
			var check=1;
			for(i=0; i< array_reg_submit.length; i++){
				check*=array_reg_submit[i];
				}
				if(check==1){
					//$('#reg_submit').attr('disabled', false);
						$.ajax({			
        type:'POST',		
		url: '<?=base_url()?>home/index',
		data: {	
			ajax: 'ajax_home_reg_submit',
			user_email: $('#reg_email').val(),
			user_password: $('#reg_password').val(),
			user_password2: $('#reg_password2').val(),
			user_name: $('#reg_name').val(),
			
		},
		success: function(html){
		  	
			var res = JSON.parse(html);
            
             if(res.validationerrors){
					alert(res.validationerrors);
				}else{
                    modal_del("myModal");
				    start();
                   
				}    
             
            
			//location.href="<=base_url()?>";//redirection
		}
	});
					}else{
						$('#reg_error_submit').attr('Style', 'color:red;');
						//$('#reg_submit').attr('disabled', true);
						}
			});
	
$('#new_project').blur(function(){
    
			if($('#new_project').val()!=''){
			 
					if($('#new_project').val().search(pattern_project) == 0){
					$('#error_create').empty();
					$('#div_error_create').removeClass('form-group has-error has-feedback').addClass('form-group has-success has-feedback');
					$('#span_error_create_project').removeClass('glyphicon glyphicon-remove form-control-feedback').addClass('glyphicon glyphicon-ok form-control-feedback');
				}else{
					$('#error_create').text('<?=$this->lang->line('global_home_projects_error')?>');
					$('#div_error_create').addClass('form-group has-error has-feedback');
					$('#span_error_create_project').addClass('glyphicon glyphicon-remove form-control-feedback');
					
				}
	 	}else{
			$('#error_create').text('<?=$this->lang->line('global_home_projects_error')?>');
			$('#div_error_create').addClass('form-group has-error has-feedback');
			$('#span_error_create_project').addClass('glyphicon glyphicon-remove form-control-feedback');
//	
		}
		});
        	
	$('#reg_name').blur(function(){
			if($('#reg_name').val()!=''){
				//if($('#reg_name').val().length >= 2 &&$('#reg_name').val().length<=20){
					if($('#reg_name').val().search(pattern_name) == 0){
					$('#error_reg_name').empty();
					$('#div_error_reg_name').removeClass('form-group has-error has-feedback').addClass('form-group has-success has-feedback');
					$('#span_error_reg_name').removeClass('glyphicon glyphicon-remove form-control-feedback').addClass('glyphicon glyphicon-ok form-control-feedback');
					array_reg_submit[3]=1;
					//reg_submit_check();
				}else{
					$('#error_reg_name').text('<?=$this->lang->line('global_home_registration_error_name')?>');
					$('#div_error_reg_name').addClass('form-group has-error has-feedback');
					$('#span_error_reg_name').addClass('glyphicon glyphicon-remove form-control-feedback');
					array_reg_submit[3]=0;
					//reg_submit_check();
				}
	 	}else{
			$('#error_reg_name').text('<?=$this->lang->line('global_home_registration_error_name_space')?>');
			$('#div_error_reg_name').addClass('form-group has-error has-feedback');
			$('#span_error_reg_name').addClass('glyphicon glyphicon-remove form-control-feedback');
			array_reg_submit[3]=0;
			//reg_submit_check();
	 }
		});
		
		
	$('#reg_password').blur(function(){
		if($('#reg_password').val()!=''){
				if($('#reg_password').val().search(pattern_password) == 0){
					$('#error_reg_password').empty();
					$('#div_error_reg_password').removeClass('form-group has-error has-feedback').addClass('form-group has-success has-feedback');
					$('#span_error_reg_password').removeClass('glyphicon glyphicon-remove form-control-feedback').addClass('glyphicon glyphicon-ok form-control-feedback');
					array_reg_submit[2]=1;
					//reg_submit_check();
				}else{
					$('#error_reg_password').text('<?=$this->lang->line('global_home_registration_error_password')?>');
					$('#div_error_reg_password').addClass('form-group has-error has-feedback');
					$('#span_error_reg_password').addClass('glyphicon glyphicon-remove form-control-feedback');
					array_reg_submit[2]=0;
					//reg_submit_check();
				}
	 	}else{
			$('#error_reg_password').text('<?=$this->lang->line('global_home_registration_error_password_space')?>');
			$('#div_error_reg_password').addClass('form-group has-error has-feedback');
			$('#span_error_reg_password').addClass('glyphicon glyphicon-remove form-control-feedback');
			array_reg_submit[2]=0;
			//reg_submit_check();
	 }
        if($('#reg_password2').val()!==$('#reg_password').val()){
				$('#error_reg_password2').empty();
				$('#error_reg_password2').text('<?=$this->lang->line('global_home_registration_error_password2')?>');
					$('#div_error_reg_password2').addClass('form-group has-error has-feedback');
					$('#span_error_reg_password2').addClass('glyphicon glyphicon-remove form-control-feedback');
					array_reg_submit[1]=0;
				}



	 //$('#reg_password2').val('');
	 //$('#error_reg_password2').text('<?=$this->lang->line('global_home_registration_error_password_space')?>');
	//		$('#div_error_reg_password2').addClass('form-group has-error has-feedback');
	//		$('#span_error_reg_password2').addClass('glyphicon glyphicon-remove form-control-feedback');
	//		array_reg_submit[1]=0;
	//		//reg_submit_check();
		});	
		
$('#reg_password2').change(function(){
		if($('#reg_password2').val()!=''){
			if($('#reg_password2').val()==$('#reg_password').val()){
				$('#error_reg_password2').empty();
					$('#div_error_reg_password2').removeClass('form-group has-error has-feedback').addClass('form-group has-success has-feedback');
					$('#span_error_reg_password2').removeClass('glyphicon glyphicon-remove form-control-feedback').addClass('glyphicon glyphicon-ok form-control-feedback');
					array_reg_submit[1]=1;
					//reg_submit_check();
				}else{
					$('#error_reg_password2').text('<?=$this->lang->line('global_home_registration_error_password2')?>');
					$('#div_error_reg_password2').addClass('form-group has-error has-feedback');
					$('#span_error_reg_password2').addClass('glyphicon glyphicon-remove form-control-feedback');
					array_reg_submit[1]=0;
					//reg_submit_check();
					}
	 	}else{
			$('#error_reg_password2').text('<?=$this->lang->line('global_home_registration_error_password_space')?>');
			$('#div_error_reg_password2').addClass('form-group has-error has-feedback');
			$('#span_error_reg_password2').addClass('glyphicon glyphicon-remove form-control-feedback');
			array_reg_submit[1]=0;
			//reg_submit_check();
	 }
		});	
$('#reg_email').blur(function(){
 //Перед отправкой нужно проверить валидность email
 //проверяем на заполненность
 if($('#reg_email').val()!=''){
				if($('#reg_email').val().search(pattern_email) == 0){
					$.ajax({			
        type:'POST',		
		url: '<?=base_url()?>home/index',
		data: {	
			ajax: 'ajax_home_reg_valid_mail',
			email: $('#reg_email').val(),
		},
		success: function(html){
		var res = JSON.parse(html);
			if(res.invalidemail){
					$('#error_reg_email').text('<?=$this->lang->line('global_home_registration_error_email')?>');
					$('#div_error_reg_email').addClass('form-group has-error has-feedback');
					$('#span_error_reg_email').addClass('glyphicon glyphicon-remove form-control-feedback');
					array_reg_submit[0]=0;
					//reg_submit_check();
			}else{
					$('#error_reg_email').empty();
					$('#div_error_reg_email').removeClass('form-group has-error has-feedback').addClass('form-group has-success has-feedback');
					$('#span_error_reg_email').removeClass('glyphicon glyphicon-remove form-control-feedback').addClass('glyphicon glyphicon-ok form-control-feedback');
					array_reg_submit[0]=1;
					//reg_submit_check();
			}
		}
	});
				}else{
					$('#error_reg_email').text('<?=$this->lang->line('global_home_registration_error_email_incorrect')?>');
					$('#div_error_reg_email').addClass('form-group has-error has-feedback');
					$('#span_error_reg_email').addClass('glyphicon glyphicon-remove form-control-feedback');
					array_reg_submit[0]=0;
					//reg_submit_check();
				}
	 }else{
		$('#error_reg_email').text('<?=$this->lang->line('global_home_registration_error_email_space')?>');
		$('#div_error_reg_email').addClass('form-group has-error has-feedback');
		$('#span_error_reg_email').addClass('glyphicon glyphicon-remove form-control-feedback');
		array_reg_submit[0]=0;
		//reg_submit_check();
	 }
  
});	
	
})






start();
	

</script>

</body>

