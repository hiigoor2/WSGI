<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Programa_model extends CI_Model{
    private $pro_codigo;
    private $pro_descricao;
    
    function __construct($codigo = null,$descricao = null) {
        parent::__construct();
        $this->codigo = $codigo;
        $this->descricao = $descricao;
    }
    
    function getPro_codigo() {
        return $this->codigo;
    }

    function getPro_descricao() {
        return $this->descricao;
    }

    function setPro_codigo($codigo) {
        $this->codigo = $codigo;
    }

    function setPro_descricao($descricao) {
        $this->descricao = $descricao;
    }

        
    public function Insert($dados){
        $data = array(
                'pro_descricao' => $this->descricao,
        );
        return $this->db->insert('programa',$data);
    }
    public function Listar($limit=null, $offset = null){
        $this->db->select('*');
        if($limit>0 && $offset>=0){
            $this->db->limit($limit);
            $this->db->offset($offset);
        }
        $result =  $this->db->get('nivel')->result();
        $niveis = array();
        foreach ($result as $ob){
            array_push($niveis, new Programa_model($ob->pro_codigo,$ob->pro_descricao));
        }
        return $niveis;
    }
    public function Select(){
        if(isset($this->codigo)){
            $this->db->where('pro_codigo', $this->codigo);
        }
        if(isset($this->descricao)){
            $this->db->where('pro_descricao',$this->descricao);
        }
        return $this->db->get('programa')->result_array();
    }
    public function Update(){
        $this->db->where('pro_codigo',$this->codigo);
        return $this->db->update('programa',array('pro_descricao'=>$this->descricao));
    }
    public function Delete(){
        $this->db->where('pro_codigo',$this->codigo);
        return $this->db->delete('programa');
    }
}