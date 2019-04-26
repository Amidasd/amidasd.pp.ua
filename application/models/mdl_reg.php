<?php

/**
 * @author Amidasd
 * @copyright 2014
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_reg extends Crud{
    var $table = 'users';//Имя таблицы
    var $idkey = 'id';
    //Правила валидации для добавления
    var $add_rules = array(
            array(
                'field'=>'user_email',
                'label'=>'Email',
                'rules'=>'required|valid_email|is_unique[users.user_email]'
                ),
            array(
                'field'=>'user_password',
                'label'=>'Пароль',
                'rules'=>'required|min_length[4]|max_length[20]'
                ),
            array(
                'field'=>'user_name',
                'label'=>'Имя',
                'rules'=>'required|min_length[2]|max_length[20]'
                ),
            array(
                'field'=>'date_registrarion',
                'label'=>'Дата',
                'rules'=>'required|numeric'
                ),
            array(
                'field'=>'user_language',
                'label'=>'language',
                'rules'=>'required'
                ),
        
                
        );
//        //Правила валидации для редактирования
//    var $edit_rules = array(
//
//            array(
//                'field'=>'title',
//                'label'=>'Название',
//                'rules'=>'required|valid_title'
//                ),
//            array(
//                'field'=>'text',
//                'label'=>'Текст',
//                'rules'=>''
//                ),
//            array(
//                'field'=>'showed',
//                'label'=>'Показывать',
//                'rules'=>'numeric'
//                )
//
//        );
    
}