<?php

/**
 * @author Amidasd
 * Описание файла: Библиотека отображения страниц с главной
 * @copyright 2019
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class lib_rubygarage
{

    function parse_ajax()
    {
        $CI = &get_instance();

        if (isset($_POST['ajax'])) {
            if ($_POST['ajax'] == 'ajax_home_enter') {
                $data_res['result'] = $this->enter();
            }
            if ($_POST['ajax'] == 'ajax_home_out') {
                $this->logout();
            }
            if ($_POST['ajax'] == 'ajax_home_reg_valid_mail') {
                $data_res['invalidemail'] = $this->ajax_home_reg_valid_mail();
            }
            if ($_POST['ajax'] == 'ajax_home_reg_submit') {
                $data_res['result'] = true;
                $this->reg($data_res);
            }
            if ($_POST['ajax'] == 'ajax_home_addlist') {
                $data_res['result'] = true;
                $this->addlist($data_res);
            }
            if ($_POST['ajax'] == 'ajax_home_add_task') {
                $data_res['result'] = true;
                $this->addtask($data_res);
            }


        }
        //проверка на вход
        $data_res['auth'] = false;
        if ($CI->session->userdata('user_logined') == 'ok') {
            //ЗАНЕСЕМ Last_activity
            $CI->db->set(array('last_activity' => time(), 'user_online' => 1))->where('id',
                $CI->session->userdata('user_id'))->update('users');
            $data_res['auth'] = true;
            $data_res['array'] = $this->getlist();
        }
        //$data_res['error']="error1";
        echo json_encode($data_res);

    }

    function addtask($data_res)
    {
        $CI = &get_instance();
        //if($this->myproject()===true){
        $CI->load->model('mdl_task'); //Загрузка модели
        $_POST['user_id'] = $CI->session->userdata('user_id');
        //echo("alert(".$this->getpriority().");");
        $_POST['priority'] = $this->getpriority() + 1;
        //$_POST['priority']=199;
        if ($id = $CI->mdl_task->add()) {
            $data_res['result'] = $this->enter();
        } else {
            $data_res['validationerrors'] = validation_errors();
        }
        return true;
        //} else{ false;}
        //$CI->input->post('');


    }
    function getpriority()
    {
        $CI = &get_instance();
        $str = "SELECT
                Max(hfh_tasks.priority) AS maxpriority,
                hfh_tasks.project_id,
                hfh_tasks.user_id
                FROM
                hfh_tasks
                WHERE
                hfh_tasks.project_id = " . $_POST['project_id'] . " AND
                hfh_tasks.user_id = " . $CI->session->userdata('user_id') . "
                GROUP BY
                hfh_tasks.user_id,
                hfh_tasks.project_id";
        $query = $CI->db->query($str);
        $query_array = $query->result_array();
        return $query_array[0]["maxpriority"];
    }

    function myproject()
    {
        $CI = &get_instance();
        $str = "SELECT
                hfh_projects.user_id = " . $CI->session->userdata('user_id') . " as result
                FROM
                hfh_projects
                WHERE
                hfh_projects.id = " . $_POST['project_id'];
        $query = $CI->db->query($str);
        $query_array = $query->result_array();
        return $query_array[0] . result;
    }


    function getlist()
    {
        $CI = &get_instance();
        $str = "
        Select
	       new.`name` as projectname,
           new.id as projectid,
	       new.count,
	       hfh_tasks.`name` as taskname,
           hfh_tasks.id  as  taskid,
	       hfh_tasks.status,
           hfh_tasks.result,
           hfh_tasks.priority
        FROM
	       (Select
		      hfh_projects.`name`,
		      hfh_projects.id,
		      Count(hfh_tasks.id) as count
	       FROM
		      hfh_projects as hfh_projects
			     LEFT JOIN hfh_tasks as hfh_tasks
			     ON hfh_projects.id = hfh_tasks.project_id
	       WHERE
		      hfh_projects.user_id = " . $CI->session->userdata('user_id') . "
	
	       GROUP BY
		      hfh_projects.id,
		      hfh_projects.`name`
            ) as new 
		LEFT JOIN  hfh_tasks as hfh_tasks
		  ON new.id = hfh_tasks.project_id
        UNION
        
        Select
            '' as projectname,
            0 as projectid,
            1 as count,
            hfh_tasks.`name` as taskname,
            hfh_tasks.id  as  taskid,
            hfh_tasks.status,
            hfh_tasks.result,
            hfh_tasks.priority
        FROM
            hfh_tasks as hfh_tasks
        WHERE
            hfh_tasks.user_id = " . $CI->session->userdata('user_id') .
            " AND hfh_tasks.project_id is null
            ORDER BY projectid DESC, priority DESC";
        $query = $CI->db->query($str);
        $query_array = $query->result_array();
        return $query_array;
    }


    function reg($data_res)
    {
        $CI = &get_instance();
        $CI->load->model('mdl_reg'); //Загрузка модели
        $data = array();
        if ($CI->input->post('user_password') == $CI->input->post('user_password2')) {
            $_POST['activation'] = 0;
            $_POST['date_registrarion'] = time(); //возможно нужна поправка на время сервера
            $_POST['user_language'] = $CI->session->userdata('user_language');
            if ($id = $CI->mdl_reg->add()) {
                $data_res['result'] = $this->enter();
            } else {
                $data_res['validationerrors'] = validation_errors();
            }
        } else {

            $data_res['validationerrors'] = array('password2' => 'пароли не совпадают');


        }
        return true;
        //$CI->input->post('');


    }

    function addlist($data_res)
    {
        $CI = &get_instance();
        $CI->load->model('mdl_projects'); //Загрузка модели
        $_POST['user_id'] = $CI->session->userdata('user_id');
        if ($id = $CI->mdl_projects->add()) {
            $data_res['result'] = $this->enter();
        } else {
            $data_res['validationerrors'] = validation_errors();
        }
        return true;
        //$CI->input->post('');


    }

    function ajax_home_reg_valid_mail()
    {
        $CI = &get_instance();
        $ajax_res_home = $this->check_pole('users', 'user_email', $CI->input->post('email'));
        return $ajax_res_home;
    }

    function check_pole($table, $pole, $value, $pole2 = '', $value2 = '')
    {
        $CI = &get_instance();
        //if($CI->session->userdata('user_logined')!='ok'){
        if ($value != '') {
            //if($CI->lib_lang->index()){
            $CI->db->where($pole, $value);
            if ($value2 != '') {
                $CI->db->where($pole2, $value2);
            }
            //$CI->db->select('id');
            $query = $CI->db->get($table);
            $query = $query->row_array();
            if ($query != 0) {
                return true;

            } else {
                return false;
            }
        } else {
            return false;
        }
        //}else{
        //        return false;}

    }

    function enter()
    {
        $CI = &get_instance();
        return $this->do_login($CI->input->post('user_email'), $CI->input->post('user_password'));
    }

    //Выполняет проверку на соответствие логина и пароля
    //В случае удачи - авторизирует
    function do_login($email, $pass)
    {
        $CI = &get_instance();
        // Правильные данные
        $query = $CI->db->get_where('users', array('user_email' => $email,
                'user_password' => $pass));
        $res = $query->row_array();
        if (!empty($res)) {
            // Если правильно - записіваем сессию
            $data = array();
            $data['user_logined'] = 'ok'; //пользователь вошёл
            //Дополнительная защита - хэш
            //$data['user_hash'] = $res['md5_activation'];
            $data['user_id'] = $res['id'];
            //Запись
            $CI->session->set_userdata($data);
            $res = $CI->db->set('user_online', 1)->where('id', $res['id'])->update('users');
            if ($CI->db->affected_rows()) {
                //echo 'Пользователь онлайн';
            } else {
                //echo 'Ошибка при попытке поставить онлайн';
            }
            return true;
        } else {
            return false;
        }

    }

    //Логаут - чистим сессию
    function logout()
    {
        $CI = &get_instance();
        $ses = array();
        $ses['user_logined'] = '';
        // $ses['user_hash'] = '';
        $ses['user_id'] = '';
        $CI->session->set_userdata($ses);
        // $CI->session->unset_userdata($ses);//Удаляем сессию
        // $CI->session->sess_destroy();
        return true;
        //Редирект на страничку входа

    }


}
