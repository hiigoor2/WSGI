<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nivel_model extends CI_Model{
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
                'niv_descricao' => $this->descricao,
        );
        return $this->db->insert('nivel',$data);
    }
    public function Listar($limit=null, $offset = null){
        $this->db->select('*');
        if($limit>0 && $offset>=0){
            $this->db->limit($limit);
            $this->db->offset($offset);
        }
        $result =  $this->db->get('nivel')->result_object();
        $niveis = array();
        foreach ($result as $ob){
            array_push($niveis, new Nivel_model($ob->niv_codigo,$ob->niv_descricao));
        }
        return $niveis;
    }
    public function Select(){
        if(isset($this->codigo)){
            $this->db->where('niv_codigo', $this->codigo);
        }
        if(isset($this->descricao)){
            $this->db->where('niv_descricao',$this->descricao);
        }
        return $this->db->get('nivel')->result_array();
    }
    public function Update(){
        if(isset($this->codigo)){
            $this->db->where('niv_codigo',$this->codigo);
            return $this->db->update('nivel',$this);
        }
        return false;
    }
    public function Delete($dados){
        if(isset($this->codigo)){
            $this->db->where('niv_codigo',$this->codigo);
            return $this->db->delete('nivel');
        }
        return false;
    }
    
    public function Count(){
        $this->db->select('count(*) as total');
        return $this->db->get('nivel')->result();
    }
}