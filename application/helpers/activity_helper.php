<?php
/**
 * Функции для AJAX
 * @author Amidasd
 * @copyright 2014
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Проверка если запрос Ajax то функция вернет true иначе false
 */
function activity() {
      $CI =&get_instance();
      $CI->db->where('user_online', 1);
      $CI->db->where('last_activity<', (time()-900));
      $CI->db->select('id, user_online, last_activity');
      $query = $CI->db->get('users');
      $query_array=$query->result_array();
      if(count($query_array)>0){
        for($i=0; $i<count($query_array); $i++){
            $CI->db->set('user_online', 0)->where('id',$query_array[$i]['id'])->update('users');
        }
      }
      
}