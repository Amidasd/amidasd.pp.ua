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
function badscript_is_ajax() {
    // Для ajax запроса она вернет true, а для обычного запроса false.
  return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}