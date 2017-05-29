<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//end_codigo 	
//end_rua 	
//end_bairro 	
//end_numero 	
//end_cidade 	
//end_estado 	
//end_cep 	
//end_complemento 	
//end_dtregistro 
class Endereco_model extends CI_Model{
    private $end_codigo;
    private $end_rua;
    private $end_bairro;
    private $end_numero;
    private $end_cidade;
    private $end_estado;
    private $end_cep;
    private $end_complemento;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getEnd_codigo() {
        return $this->end_codigo;
    }

    public function getEnd_rua() {
        return $this->end_rua;
    }

    public function getEnd_bairro() {
        return $this->end_bairro;
    }

    public function getEnd_numero() {
        return $this->end_numero;
    }

    public function getEnd_cidade() {
        return $this->end_cidade;
    }

    public function getEnd_estado() {
        return $this->end_estado;
    }

    public function getEnd_cep() {
        return $this->end_cep;
    }

    public function getEnd_complemento() {
        return $this->end_complemento;
    }

    public function setEnd_codigo($end_codigo) {
        $this->end_codigo = $end_codigo;
    }

    public function setEnd_rua($end_rua) {
        $this->end_rua = $end_rua;
    }

    public function setEnd_bairro($end_bairro) {
        $this->end_bairro = $end_bairro;
    }

    public function setEnd_numero($end_numero) {
        $this->end_numero = $end_numero;
    }

    public function setEnd_cidade($end_cidade) {
        $this->end_cidade = $end_cidade;
    }

    public function setEnd_estado($end_estado) {
        $this->end_estado = $end_estado;
    }

    public function setEnd_cep($end_cep) {
        $this->end_cep = $end_cep;
    }

    public function setEnd_complemento($end_complemento) {
        $this->end_complemento = $end_complemento;
    }
    
    public function Insert($dados){
        $data = array(
                'end_rua' => $dados['rua'],
                'end_bairro' => $dados['bairro'],
                'end_numero' => $dados['numero'],
                'end_cidade' => $dados['cidade'],
                'end_estado' => $dados['estado'],
                'end_cep' => $dados['cep'],
                'end_complemento' => $dados['complemento']
        );
        return $this->db->insert('endereco',$data);
    }
    public function Listar(){
        return $this->db->get('endereco')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){            $this->db->where('end_codigo', $dados['codigo']);        }
        if(isset($dados['rua'])){            $this->db->where('end_rua',$dados['rua']);        }
        if(isset($dados['bairro'])){            $this->db->where('end_bairro',$dados['bairro']);        }
        if(isset($dados['numero'])){            $this->db->where('end_numero',$dados['numero']);        }
        if(isset($dados['cidade'])){            $this->db->where('end_cidade',$dados['cidade']);        }
        if(isset($dados['estado'])){            $this->db->where('end_estado',$dados['estado']);        }
        if(isset($dados['cep'])){            $this->db->where('end_cep',$dados['cep']);        }
        if(isset($dados['complemento'])){            $this->db->where('end_complemento',$dados['complemento']);        }
        return $this->db->get('endereco')->result_array();
    }
    public function Update($dados){
        
        $data = array(
                'end_rua' => $dados['rua'],
                'end_bairro' => $dados['bairro'],
                'end_numero' => $dados['numero'],
                'end_cidade' => $dados['cidade'],
                'end_estado' => $dados['estado'],
                'end_cep' => $dados['cep'],
                'end_complemento' => $dados['complemento']
        );
        
        $this->db->where('end_codigo',$dados['codigo']);
        return $this->db->update('endereco',$data);
    }
    public function Delete($dados){
        $this->db->where('end_codigo',$dados['codigo']);
        return $this->db->delete('endereco');
    }
}