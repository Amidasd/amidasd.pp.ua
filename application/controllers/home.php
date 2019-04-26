<?php
/**
 * Контроллер для стартовой страницы
 * @author Amidasd
 * @copyright 2019
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Home extends CI_Controller
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

        //if ($this->lib_lang->index()) {}{
            activity();
            if (badscript_is_ajax()) {
                $this->lib_rubygarage->parse_ajax();
            } else {
                if ($this->lib_lang->index()){
                    $this->load->view('rubygarage.php');
                }
            }
    }
    
}
