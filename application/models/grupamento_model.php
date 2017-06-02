<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Grupamento_model extends CI_Model{
    private $codigo;
    private $descricao;
    
    function __construct($codigo = null,$descricao = null) {
        parent::__construct();
        $this->codigo = $codigo;
        $this->descricao = $descricao;
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setCodigo($valor){
        $this->codigo = $valor;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setDescricao($valor){
        $this->descricao = $valor;
    }
    
    public function Insert(){
        
        $data = array(
                'gru_descricao' => $this->descricao,
        );
        return $this->db->insert('grupamento',$data);
    }
    
    public function Listar($limit=null, $offset = null){
        $this->db->select('*');
        if($limit>0 && $offset>=0){
            $this->db->limit($limit);
            $this->db->offset($offset);
        }
        $result = $this->db->get('grupamento')->result_object();
        $grupamentos = array();
        foreach ($result as $ob){
            array_push($grupamentos, new Grupamento_model($ob->gru_codigo,$ob->gru_descricao));
        }
        return $grupamentos;
    }
    
    public function Count(){
        $this->db->select('count(*) as total');
        return $this->db->get('grupamento')->result();
    }
    
    public function Select(){
        if(isset($this->codigo)){
            $this->db->where('gru_codigo', $this->codigo);
        }
        if(isset($this->descricao)){
            $this->db->where('gru_descricao',$this->descricao);
        }
        $result = $this->db->get('grupamento')->result_array();
        $grupamentos = array();
        foreach ($result as $ob){
            array_push($grupamentos, new Grupamento_model($ob['gru_codigo'],$ob['gru_descricao']));
        }
        return $grupamentos;
    }
    public function Update(){
        if(isset($this->codigo)){
            $this->db->where('gru_codigo',$this->codigo);
            return $this->db->update('grupamento',array('gru_descricao'=>$this->descricao));
        }
        return false;
    }
    public function Delete(){
        if(isset($this->codigo)){
            $this->db->where('gru_codigo',$this->codigo);
            return $this->db->delete('grupamento');
        }
        return false;
    }
}