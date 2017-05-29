<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Periodo_model extends CI_Model{
    private $per_codigo;
    private $per_descricao;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getPer_codigo() {
        return $this->per_codigo;
    }

    function getPer_descricao() {
        return $this->per_descricao;
    }

    function setPer_codigo($per_codigo) {
        $this->per_codigo = $per_codigo;
    }

    function setPer_descricao($per_descricao) {
        $this->per_descricao = $per_descricao;
    }

        
    public function Insert($dados){
        $data = array(
                'per_descricao' => $dados['descricao'],
        );
        return $this->db->insert('periodo',$data);
    }
    public function Listar(){
        return $this->db->get('periodo')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('per_codigo', $dados['codigo']);
        }
        if(isset($dados['descricao'])){
            $this->db->where('per_descricao',$dados['descricao']);
        }
        return $this->db->get('periodo')->result_array();
    }
    public function Update($dados){
        $this->db->where('per_codigo',$dados['codigo']);
        return $this->db->update('periodo',array('per_descricao'=>$dados['descricao']));
    }
    public function Delete($dados){
        $this->db->where('per_codigo',$dados['codigo']);
        return $this->db->delete('periodo');
    }
}