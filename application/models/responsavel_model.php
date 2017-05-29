<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//res_codigo
//res_nome
//res_dtnascimento
//res_profissao
//res_nis
//res_dtregistro
//res_cpf 
class Responsavel_model extends CI_Model{
    private $res_codigo;
    private $res_nome;
    private $res_dtnascimento;
    private $res_profissao;
    private $res_nis;
    private $res_cpf;
    
    function __construct() {
        parent::__construct();
    }
    
    function getRes_codigo() {
        return $this->res_codigo;
    }

    function getRes_nome() {
        return $this->res_nome;
    }

    function getRes_dtnascimento() {
        return $this->res_dtnascimento;
    }

    function getRes_profissao() {
        return $this->res_profissao;
    }

    function getRes_nis() {
        return $this->res_nis;
    }

    function getRes_cpf() {
        return $this->res_cpf;
    }

    function setRes_codigo($res_codigo) {
        $this->res_codigo = $res_codigo;
    }

    function setRes_nome($res_nome) {
        $this->res_nome = $res_nome;
    }

    function setRes_dtnascimento($res_dtnascimento) {
        $this->res_dtnascimento = $res_dtnascimento;
    }

    function setRes_profissao($res_profissao) {
        $this->res_profissao = $res_profissao;
    }

    function setRes_nis($res_nis) {
        $this->res_nis = $res_nis;
    }

    function setRes_cpf($res_cpf) {
        $this->res_cpf = $res_cpf;
    }

        
    public function Insert($dados){
        $data = array(
            'res_nome' => $dados['res_nome'],
            'res_dtnascimento' => $dados['dtnascimento'],
            'res_profissao' => $dados['profissao'],
            'res_nis' => $dados['nis'],
            'res_cpf' => $dados['cpf'],
        );
        return $this->db->insert('responsavel',$data);
    }
    public function Listar(){
        return $this->db->get('responsavel')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('res_codigo', $dados['codigo']);
        }
        if(isset($dados['nome'])){
            $this->db->where('res_nome',$dados['nome'].'%');
        }
        return $this->db->get('responsavel')->result_array();
    }
    public function Update($dados){
        $data = array(
            'res_nome' => $dados['res_nome'],
            'res_dtnascimento' => $dados['dtnascimento'],
            'res_profissao' => $dados['profissao'],
            'res_nis' => $dados['nis'],
            'res_cpf' => $dados['cpf'],
        );
        $this->db->where('res_codigo',$dados['codigo']);
        return $this->db->update('responsavel',$data);
    }
    public function Delete($dados){
        $this->db->where('res_codigo',$dados['codigo']);
        return $this->db->delete('responsavel');
    }
}