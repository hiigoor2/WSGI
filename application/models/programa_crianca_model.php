<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//pc_observacao
//crianca_cri_codigo
//programas_pro_codigo
class Prog_crianca_model extends CI_Model{
    private $pc_observacao;
    private $crianca_cri_codigo;
    private $programas_pro_codigo;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getPc_observacao() {
        return $this->pc_observacao;
    }

    function getCrianca_cri_codigo() {
        return $this->crianca_cri_codigo;
    }

    function getProgramas_pro_codigo() {
        return $this->programas_pro_codigo;
    }

    function setPc_observacao($pc_observacao) {
        $this->pc_observacao = $pc_observacao;
    }

    function setCrianca_cri_codigo($crianca_cri_codigo) {
        $this->crianca_cri_codigo = $crianca_cri_codigo;
    }

    function setProgramas_pro_codigo($programas_pro_codigo) {
        $this->programas_pro_codigo = $programas_pro_codigo;
    }

        
    public function Insert($dados){
        $data = array(
            'pc_observacao' => $dados['observacao'],
            'crianca_cri_codigo' => $dados['crianca'],
            'programas_pro_codigo' => $dados['programa'],
        );
        return $this->db->insert('prog_crianca',$data);
    }
    public function Listar(){
        return $this->db->get('prog_crianca')->result_array();
    }
    public function Select($dados){
        if(isset($dados['programa'])){
            $this->db->where('programas_pro_codigo', $dados['programa']);
        }
        if(isset($dados['crianca'])){
            $this->db->where('crianca_cri_codigo',$dados['crianca']);
        }
        return $this->db->get('prog_crianca')->result_array();
    }
    public function Update($dados){
        $data = array(
            'pc_observacao' => $dados['observacao'],
        );
        $this->db->where('crianca_cri_codigo',$dados['crianca']);
        $this->db->where('programas_pro_codigo',$dados['programa']);
        return $this->db->update('prog_crianca',$data);
    }
    public function Delete($dados){
        $this->db->where('crianca_cri_codigo',$dados['crianca']);
        $this->db->where('programas_pro_codigo',$dados['programa']);
        return $this->db->delete('prog_crianca');
    }
}