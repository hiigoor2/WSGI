<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Programa_model extends CI_Model{
    private $pro_codigo;
    private $pro_descricao;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getPro_codigo() {
        return $this->pro_codigo;
    }

    function getPro_descricao() {
        return $this->pro_descricao;
    }

    function setPro_codigo($pro_codigo) {
        $this->pro_codigo = $pro_codigo;
    }

    function setPro_descricao($pro_descricao) {
        $this->pro_descricao = $pro_descricao;
    }

        
    public function Insert($dados){
        $data = array(
                'pro_descricao' => $dados['descricao'],
        );
        return $this->db->insert('programa',$data);
    }
    public function Listar(){
        return $this->db->get('programa')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('pro_codigo', $dados['codigo']);
        }
        if(isset($dados['descricao'])){
            $this->db->where('pro_descricao',$dados['descricao']);
        }
        return $this->db->get('programa')->result_array();
    }
    public function Update($dados){
        $this->db->where('pro_codigo',$dados['codigo']);
        return $this->db->update('programa',array('pro_descricao'=>$dados['descricao']));
    }
    public function Delete($dados){
        $this->db->where('pro_codigo',$dados['codigo']);
        return $this->db->delete('programa');
    }
}