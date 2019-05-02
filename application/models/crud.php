<?php

/**
 * @author Amidasd
 * @copyright 2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud extends CI_Model
{
    var $table = ''; //Имя таблиці
    var $idkey = ''; //Ключ ID
    var $add_rules = array(); //Правила валидации для добавления
    var $edit_rules = array(); //Правила валидации для редактирования

    //Конструктор
    function __construct()
    {
        parent::__construct();
    }
    function get($id)
    {
        $this->db->where($this->idkey, $id);
        if (!empty($this->sel)) {
            $this->db->select($this->sel);
        }
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
    function add()
    {
        $this->form_validation->set_data($_POST);
        $this->form_validation->set_rules($this->add_rules);
        if ($this->form_validation->run()) {
            $data = array();
            foreach ($this->add_rules as $one) {
                $f = $one['field'];
                $data[$f] = $this->input->post($f);
            }
            $this->db->insert($this->table, $data);
            return $this->db->insert_id(); //возвращает номер добавленного поля
        } else {
            return false;
        }
    }
    /**
     * Функция для редактирования
     */
    function edit($id)
    {
        $this->form_validation->set_rules($this->edit_rules);

        if ($this->form_validation->run()) {
            $data = array();
            foreach ($this->edit_rules as $one) {
                $f = $one['field'];
                $data[$f] = $this->input->post($f);
            }
            $this->db->where($this->idkey, $id);
            $this->db->update($this->table, $data);
            return true; // Возвращает истинно
        } else {
            return false;
        }
    }


}
