<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//tur_codigo
//tur_max_alunos
//periodo_per_codigo
//grupamento_gru_codigo
//tur_dtregistro
//sala_sal_codigo 
class Turma_model extends CI_Model{
    private $tur_codigo;
    private $tur_max_alunos;
    private $periodo_per_codigo;
    private $grupamento_gru_codigo;
    private $tur_dtregistro;
    private $sala_sal_codigo;
    
    function __construct() {
        parent::__construct();
    }
    
    function getTur_codigo() {
        return $this->tur_codigo;
    }

    function getTur_max_alunos() {
        return $this->tur_max_alunos;
    }

    function getPeriodo_per_codigo() {
        return $this->periodo_per_codigo;
    }

    function getGrupamento_gru_codigo() {
        return $this->grupamento_gru_codigo;
    }

    function getTur_dtregistro() {
        return $this->tur_dtregistro;
    }

    function getSala_sal_codigo() {
        return $this->sala_sal_codigo;
    }

    function setTur_codigo($tur_codigo) {
        $this->tur_codigo = $tur_codigo;
    }

    function setTur_max_alunos($tur_max_alunos) {
        $this->tur_max_alunos = $tur_max_alunos;
    }

    function setPeriodo_per_codigo($periodo_per_codigo) {
        $this->periodo_per_codigo = $periodo_per_codigo;
    }

    function setGrupamento_gru_codigo($grupamento_gru_codigo) {
        $this->grupamento_gru_codigo = $grupamento_gru_codigo;
    }

    function setTur_dtregistro($tur_dtregistro) {
        $this->tur_dtregistro = $tur_dtregistro;
    }

    function setSala_sal_codigo($sala_sal_codigo) {
        $this->sala_sal_codigo = $sala_sal_codigo;
    }

    public function Insert($dados){
        $data = array(
            'tur_max_alunos' => $dados['max_alunos'],
            'periodo_per_codigo' => $dados['periodo'],
            'grupamento_gru_codigo' => $dados['grupamento'],
            'sala_sal_codigo' => $dados['sala'],
        );
        return $this->db->insert('turma',$data);
    }
    public function Listar(){
        return $this->db->get('turma')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('tur_codigo', $dados['codigo']);
        }
        if(isset($dados['max_alunos'])){
            $this->db->where('tur_max_alunos',$dados['max_alunos']);
        }
        if(isset($dados['periodo'])){
            $this->db->where('periodo_per_codigo',$dados['periodo']);
        }
        if(isset($dados['grupamento'])){
            $this->db->where('grupamento_gru_codigo',$dados['grupamento']);
        }
        if(isset($dados['sala'])){
            $this->db->where('sala_sal_codigo',$dados['sala']);
        }
        return $this->db->get('turma')->result_array();
    }
    public function Update($dados){
        $data = array(
            'tur_max_alunos' => $dados['max_alunos'],
            'periodo_per_codigo' => $dados['periodo'],
            'grupamento_gru_codigo' => $dados['grupamento'],
            'sala_sal_codigo' => $dados['sala'],
        );
        
        $this->db->where('tur_codigo',$dados['codigo']);
        return $this->db->update('turma',$data);
    }
    public function Delete($dados){
        $this->db->where('tur_codigo',$dados['codigo']);
        return $this->db->delete('turma');
    }
}