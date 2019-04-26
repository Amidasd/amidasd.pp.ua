<?php

/**
 * @author Amidasd
 * Описание файла: Библиотека отображения страниц с главной
 * @copyright 2015
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class lib_lang{
    function index(){
        //Сразу делаем проверку на язык в сессии если его нет то применяем язык браузера
        //Если язык в сессии стоит то язык сессии (при условии что он поддерживается сайтом иначе снова применяем язык браузера)
        
        $CI =&get_instance ();
        $array_langs = array('english','russian','german');//Для проверки данных взятых из сессии
        $langs = array(
                'russian' => array('ru', 'be', 'uk', 'ky', 'ab', 'mo', 'et', 'lv'),
                'german' => 'de'
                );//массив для метода lib_lang_detect->getBestMatch()
        if($CI->session->userdata('user_logined')=='ok'){
            $CI->load->model('mdl_lang');
            $language=$CI->mdl_lang->get($CI->session->userdata('user_id'));
             //взять с бд
            $language=$language['user_language'];
            if (in_array($language, $array_langs)) {
                $lang = $language;// в массиве $array_langs есть элемент со значением $language
            }else{
                //если данніе с бд не соответствуют допустимім язікам сайта тогда ставим язык по браузеру
                $lang = $CI->lib_lang_detect->getBestMatch('english', $langs);
            }      
        }else{
        $language = $CI->session->userdata('user_language');

        if($language != ''){
            
            if (in_array($language, $array_langs)) {
                $lang = $language;// в массиве $array_langs есть элемент со значением $language
            }else{
                $lang = $CI->lib_lang_detect->getBestMatch('english', $langs);
            }            
        }else{
            $lang = $CI->lib_lang_detect->getBestMatch('english', $langs);
        }
        }
        try{
        $data['user_language']=$lang;
        //$data['user_id']=$res['user_id'];
            
        //Запись
        $CI->session->set_userdata($data);
        
        $CI->config->set_item('language', $lang);
        $CI->lang->load('global', $lang);
        return true;
        }
        catch (Exception $e){
            return false;
        }
    }
    function set_sess_lang(){
        //Функция скорее всего будет аяксовой установки в сессию языкового параметра
        //Тут скорее всего нужна еще проверка на аякс
        $CI =&get_instance ();
        $language=$CI->input->post('language');
        $array_langs = array('english','russian','german');//Для проверки соответствия языка с поддерживаемыми сайтом
        if (in_array($language, $array_langs)) {
                // в массиве $array_langs есть элемент со значением $language
                $ses = array();
                $ses['user_language']=$language;
                $CI->session->set_userdata($ses);
            return true;
            }
        else{
            return false;
        }

        
        
    }
}  
       

