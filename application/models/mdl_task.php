<?php

/**
 * @author Amidasd
 * @copyright 2014
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_task extends Crud{
    var $table = 'tasks';//Имя таблицы
    
    var $idkey = 'id';
        //Правила валидации для добавления
 
     var $add_rules = array(
            
            array(
                'field'=>'user_id',
                'label'=>'user',
                'rules'=>'required'
                ),
             array(
                'field'=>'name',
                'label'=>'name',
                'rules'=>'required'
                ),
             array(
                'field'=>'project_id',
                'label'=>'project_id'
                ),
             array(
                'field'=>'priority',
                'label'=>'priority'
                ),
            );
      //Правила валидации для редактирования
    var $edit_rules = array(


              array(
                'field'=>'name',
                'label'=>'Task name',
                'rules'=>'required'
                ),
  


        );       
            
}