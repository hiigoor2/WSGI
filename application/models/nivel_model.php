<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nivel_model extends CI_Model{
    private $niv_codigo;
    private $niv_descricao;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getCodigo(){
        return $this->niv_codigo;
    }
    
    public function setCodigo($valor){
        $this->niv_codigo = $valor;
    }
    
    public function getDescricao(){
        return $this->niv_descricao;
    }
    
    public function setDescricao($valor){
        $this->niv_descricao = $valor;
    }
    
    public function Insert($dados){
        $data = array(
                'niv_descricao' => $dados['descricao'],
        );
        return $this->db->insert('nivel',$data);
    }
    public function Listar(){
        return $this->db->get('nivel')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('niv_codigo', $dados['codigo']);
        }
        if(isset($dados['descricao'])){
            $this->db->where('niv_descricao',$dados['descricao']);
        }
        return $this->db->get('nivel')->result_array();
    }
    public function Update($dados){
        $this->db->where('niv_codigo',$dados['codigo']);
        return $this->db->update('nivel',array('niv_descricao'=>$dados['descricao']));
    }
    public function Delete($dados){
        $this->db->where('niv_codigo',$dados['codigo']);
        return $this->db->delete('nivel');
    }
}