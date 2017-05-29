<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//res_grau_parentesco
//crianca_cri_codigo
//responsavel_res_codigo
class Responsavel_crianca_model extends CI_Model{
    
    private $res_grau_parentesco;
    private $crianca_cri_codigo;
    private $responsavel_res_codigo;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getRes_grau_parentesco() {
        return $this->res_grau_parentesco;
    }

    function getCrianca_cri_codigo() {
        return $this->crianca_cri_codigo;
    }

    function getResponsavel_res_codigo() {
        return $this->responsavel_res_codigo;
    }

    function setRes_grau_parentesco($res_grau_parentesco) {
        $this->res_grau_parentesco = $res_grau_parentesco;
    }

    function setCrianca_cri_codigo($crianca_cri_codigo) {
        $this->crianca_cri_codigo = $crianca_cri_codigo;
    }

    function setResponsavel_res_codigo($responsavel_res_codigo) {
        $this->responsavel_res_codigo = $responsavel_res_codigo;
    }
    
    public function Insert($dados){
        $data = array(
                'res_grau_parentesco' => $dados['grau'],
                'crianca_cri_codigo' => $dados['crianca'],
                'responsavel_res_codigo' => $dados['responsavel'],
        );
        return $this->db->insert('responsavel_crianca',$data);
    }
    public function Listar(){
        return $this->db->get('responsavel_crianca')->result_array();
    }
    public function Select($dados){
        if(isset($dados['crianca'])){
            $this->db->where('crianca_cri_codigo', $dados['crianca']);
        }
        if(isset($dados['responsavel'])){
            $this->db->where('responsavel_res_codigo',$dados['responsavel']);
        }
        return $this->db->get('responsavel_crianca')->result_array();
    }
    public function Update($dados){
        $data = array(
                'res_grau_parentesco' => $dados['grau'],
        );
        $this->db->where('crianca_cri_codigo',$dados['crianca']);
        $this->db->where('responsavel_res_codigo',$dados['responsavel']);
        return $this->db->update('responsavel_crianca',$data);
    }
    public function Delete($dados){
        $this->db->where('crianca_cri_codigo',$dados['crianca']);
        $this->db->where('responsavel_res_codigo',$dados['responsavel']);
        return $this->db->delete('responsavel_crianca');
    }
}