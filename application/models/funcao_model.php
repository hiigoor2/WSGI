<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Funcao_model extends CI_Model{
    private $fun_codigo;
    private $fun_descricao;
    
    function __construct() {
        parent::__construct();
    }
    
    public function getCodigo(){
        return $this->fun_codigo;
    }
    
    public function setCodigo($valor){
        $this->fun_codigo = $valor;
    }
    
    public function getDescricao(){
        return $this->fun_descricao;
    }
    
    public function setDescricao($valor){
        $this->fun_descricao = $valor;
    }
    
    public function Insert($dados){
        $data = array(
                'fun_descricao' => $dados['descricao'],
        );
        return $this->db->insert('funcao',$data);
    }
    public function Listar(){
        return $this->db->get('funcao')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('fun_codigo', $dados['codigo']);
        }
        if(isset($dados['descricao'])){
            $this->db->where('fun_descricao',$dados['descricao']);
        }
        return $this->db->get('funcao')->result_array();
    }
    public function Update($dados){
        $this->db->where('fun_codigo',$dados['codigo']);
        return $this->db->update('funcao',array('fun_descricao'=>$dados['descricao']));
    }
    public function Delete($dados){
        $this->db->where('fun_codigo',$dados['codigo']);
        return $this->db->delete('funcao');
    }
}