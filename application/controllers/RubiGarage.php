<?php
/**
 * Контроллер для стартовой страницы
 * @author Amidasd
 * @copyright 2019
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class RubiGarage extends CI_Controller
{
    //Конструктор
    function __construct()
    {
        parent::__construct();
    }
    //Функция отображения всех новостей на стартовой странице
    public function index()
    {
        date_default_timezone_set('UTC');
        activity();
        if (badscript_is_ajax()) {
            $this->lib_page->parse_ajax();
        } else {
            show_404('page');
        }
        //echo $this->config->item('language');
        //$this->lang->load('test', 'russian');
        //echo $this->lang->line('global_title');
        // if($param==''){//Если стартовая страница без параметров задана
        //$this->lib_rubygarage->index();
        //Проверяем был ли вход если нет то показываем главную
        //если да то страницу авторизированого пользователя
        // }
        //  }else{
        //    show_404('page');
        // }
    }

    function ajax()
    {
        date_default_timezone_set('UTC');
        if (badscript_is_ajax()) {
            $this->lib_page->parse_ajax();
        } else {
            show_404('page');
        }
    }


}
