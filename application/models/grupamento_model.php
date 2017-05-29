<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Grupamento_model extends CI_Model{
    private $gru_codigo;
    private $gru_descricao;
    
    function __construct() {
        parent::__construct();
    }
    
    public function getCodigo(){
        return $this->gru_codigo;
    }
    
    public function setCodigo($valor){
        $this->gru_codigo = $valor;
    }
    
    public function getDescricao(){
        return $this->gru_descricao;
    }
    
    public function setDescricao($valor){
        $this->gru_descricao = $valor;
    }
    
    public function Insert($dados){
        $data = array(
                'gru_descricao' => $dados['descricao'],
        );
        return $this->db->insert('grupamento',$data);
    }
    public function Listar(){
        return $this->db->get('grupamento')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('gru_codigo', $dados['codigo']);
        }
        if(isset($dados['descricao'])){
            $this->db->where('gru_descricao',$dados['descricao']);
        }
        return $this->db->get('grupamento')->result_array();
    }
    public function Update($dados){
        $this->db->where('gru_codigo',$dados['codigo']);
        return $this->db->update('grupamento',array('gru_descricao'=>$dados['descricao']));
    }
    public function Delete($dados){
        $this->db->where('gru_codigo',$dados['codigo']);
        return $this->db->delete('grupamento');
    }
}