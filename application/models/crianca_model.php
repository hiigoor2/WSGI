<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//cri_codigo
//cri_nome
//cri_dtnascimento
//cri_cor
//cri_ra
//cri_nis
//cri_dtregistro
//cri_observacao
//cri_necessidade_especial
//cri_foto
class Crianca_model extends CI_Model{
    private $cri_codigo;
    private $cri_nome;
    private $cri_dtnascimento;
    private $cri_cor;
    private $cri_ra;
    private $cri_nis;
    private $cri_dtregistro;
    private $cri_observacao;
    private $cri_necessidade_especial;
    private $cri_foto;
    
    function __construct() {
        parent::__construct();
    }
    
    function getCri_codigo() {
        return $this->cri_codigo;
    }

    function getCri_nome() {
        return $this->cri_nome;
    }

    function getCri_dtnascimento() {
        return $this->cri_dtnascimento;
    }

    function getCri_cor() {
        return $this->cri_cor;
    }

    function getCri_ra() {
        return $this->cri_ra;
    }

    function getCri_nis() {
        return $this->cri_nis;
    }

    function getCri_dtregistro() {
        return $this->cri_dtregistro;
    }

    function getCri_observacao() {
        return $this->cri_observacao;
    }

    function getCri_necessidade_especial() {
        return $this->cri_necessidade_especial;
    }

    function getCri_foto() {
        return $this->cri_foto;
    }

    function setCri_codigo($cri_codigo) {
        $this->cri_codigo = $cri_codigo;
    }

    function setCri_nome($cri_nome) {
        $this->cri_nome = $cri_nome;
    }

    function setCri_dtnascimento($cri_dtnascimento) {
        $this->cri_dtnascimento = $cri_dtnascimento;
    }

    function setCri_cor($cri_cor) {
        $this->cri_cor = $cri_cor;
    }

    function setCri_ra($cri_ra) {
        $this->cri_ra = $cri_ra;
    }

    function setCri_nis($cri_nis) {
        $this->cri_nis = $cri_nis;
    }

    function setCri_dtregistro($cri_dtregistro) {
        $this->cri_dtregistro = $cri_dtregistro;
    }

    function setCri_observacao($cri_observacao) {
        $this->cri_observacao = $cri_observacao;
    }

    function setCri_necessidade_especial($cri_necessidade_especial) {
        $this->cri_necessidade_especial = $cri_necessidade_especial;
    }

    function setCri_foto($cri_foto) {
        $this->cri_foto = $cri_foto;
    }

        
    public function Insert($dados){
        $data = array(
            'cri_nome' => $dados['nome'],
            'cri_dtnascimento' => $dados['dtnascimento'],
            'cri_cor' => $dados['cor'],
            'cri_ra' => $dados['ra'],
            'cri_nis' => $dados['nis'],
            'cri_observacao' => $dados['observacao'],
            'cri_necessidade_especial' => $dados['necessidade_especial'],
            'cri_foto' => $dados['foto'],
        );
        return $this->db->insert('crianca',$data);
    }
    public function Listar(){
        return $this->db->get('crianca')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('cri_codigo', $dados['codigo']);
        }
        if(isset($dados['nome'])){
            $this->db->where('cri_nome',$dados['nome'].'%');
        }
        if(isset($dados['ra'])){
            $this->db->where('cri_ra',$dados['ra']);
        }
        return $this->db->get('crianca')->result_array();
    }
    public function Update($dados){
        $data = array(
            'cri_nome' => $dados['nome'],
            'cri_dtnascimento' => $dados['dtnascimento'],
            'cri_cor' => $dados['cor'],
            'cri_ra' => $dados['ra'],
            'cri_nis' => $dados['nis'],
            'cri_observacao' => $dados['observacao'],
            'cri_necessidade_especial' => $dados['necessidade_especial'],
            'cri_foto' => $dados['foto'],
        );        
        $this->db->where('cri_codigo',$dados['codigo']);
        return $this->db->update('crianca',$data);
    }
    public function Delete($dados){
        $this->db->where('cri_codigo',$dados['codigo']);
        return $this->db->delete('crianca');
    }
}