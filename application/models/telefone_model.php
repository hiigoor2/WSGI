<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//tel_numero,
//tel_tipo,
//tel_dtregistro,
//responsavel_res_codigo 
class Telefone_model extends CI_Model{
    private $tel_numero;
    private $tel_tipo;
    private $tel_dtregistro;
    private $responsavel_res_codigo;
    
    function __construct() {
        parent::__construct();
    }
    
    function getTel_numero() {
        return $this->tel_numero;
    }

    function getTel_tipo() {
        return $this->tel_tipo;
    }

    function getTel_dtregistro() {
        return $this->tel_dtregistro;
    }

    function getResponsavel_res_codigo() {
        return $this->responsavel_res_codigo;
    }

    function setTel_numero($tel_numero) {
        $this->tel_numero = $tel_numero;
    }

    function setTel_tipo($tel_tipo) {
        $this->tel_tipo = $tel_tipo;
    }

    function setTel_dtregistro($tel_dtregistro) {
        $this->tel_dtregistro = $tel_dtregistro;
    }

    function setResponsavel_res_codigo($responsavel_res_codigo) {
        $this->responsavel_res_codigo = $responsavel_res_codigo;
    }
    
    public function Insert($dados){
        $data = array(
            'tel_numero' => $dados['numero'],
            'tel_tipo' => $dados['tipo'],
            'responsavel_res_codigo' => $dados['codigo_resp'],
        );
        return $this->db->insert('telefone',$data);
    }
    public function Listar(){
        return $this->db->get('telefone')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('tel_numero', $dados['numero']);
        }
        if(isset($dados['tipo'])){
            $this->db->where('tel_tipo',$dados['tipo']);
        }
        if(isset($dados['codigo_resp'])){
            $this->db->where('responsavel_res_codigo',$dados['codigo_resp']);
        }
        return $this->db->get('telefone')->result_array();
    }
    public function Update($dados){
        $data = array(
            'tel_tipo' => $dados['tipo'],
            'responsavel_res_codigo' => $dados['codigo_resp'],
        );
        
        $this->db->where('tel_numero',$dados['numero']);
        return $this->db->update('telefone',$data);
    }
    public function Delete($dados){
        $this->db->where('tel_numero',$dados['numero']);
        return $this->db->delete('telefone');
    }
}