<?php

/**
 * @author Amidasd
 * @copyright 2014
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_lang extends Crud{
    var $table = 'users';//Имя таблицы
    var $idkey = 'id';
    var $sel ='user_language';
}