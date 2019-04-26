<?php

/**
 * @author Amidasd
 * @copyright 2014
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_projects extends Crud{
    var $table = 'projects';//Имя таблицы
    
    var $idkey = 'id';
        //Правила валидации для добавления
 
     var $add_rules = array(
            array(
                'field'=>'name',
                'label'=>'Name',
                'rules'=>'required'
                ),
            array(
                'field'=>'user_id',
                'label'=>'user',
                'rules'=>'required'
                ),
            
            );
}