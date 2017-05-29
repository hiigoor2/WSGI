<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Endereco_responsavel_model extends CI_Model{
    private $end_res_tipo;
    private $endereco_end_codigo;
    private $responsavel_res_codigo;
    
    public function __construct() {
        parent::__construct();
        $endereco_end_codigo =& $this->load->model('endereco_model');
        $responsavel_res_codigo =& $this->load->model('responsavel_model');
    }
    
    function getEnd_res_tipo() {
        return $this->end_res_tipo;
    }

    function getEndereco_end_codigo() {
        return $this->endereco_end_codigo;
    }

    function getResponsavel_res_codigo() {
        return $this->responsavel_res_codigo;
    }

    function setEnd_res_tipo($end_res_tipo) {
        $this->ennd_res_tipo = $end_res_tipo;
    }

    function setEndereco_end_codigo($endereco_end_codigo) {
        $this->endereco_end_codigo = $endereco_end_codigo;
    }

    function setResponsavel_res_codigo($responsavel_res_codigo) {
        $this->responsavel_res_codigo = $responsavel_res_codigo;
    }
   
    public function Insert($dados){
        $data = array(
            'ennd_res_tipo' => $dados['tipo'],
            'endereco_end_codigo' => $dados['endereco'],
            'responsavel_res_codigo' => $dados['responsavel'],
        );
        return $this->db->insert('endereco_responsavel',$data);
    }
    public function Listar(){
        return $this->db->get('endereco_responsavel')->result_array();
    }
    public function Select($dados){
        if(isset($dados['tipo'])){
            $this->db->where('ennd_res_tipo', $dados['tipo']);
        }
        if(isset($dados['endereco'])){
            $this->db->where('endereco_end_codigo',$dados['endereco']);
        }
        if(isset($dados['responsavel'])){
            $this->db->where('responsavel_res_codigo',$dados['responsavel']);
        }
        return $this->db->get('endereco_responsavel')->result_array();
    }
    public function Update($dados){
        $data = array(
            'ennd_res_tipo' => $dados['tipo'],
        );
        
        $this->db->where('endereco_end_codigo',$dados['endereco']);
        $this->db->where('responsavel_res_codigo',$dados['responsavel']);
        return $this->db->update('endereco_responsavel',$data);
    }
    public function Delete($dados){
        $this->db->where('endereco_end_codigo',$dados['endereco']);
        $this->db->where('responsavel_res_codigo',$dados['responsavel']);
        return $this->db->delete('endereco_responsavel');
    }
}