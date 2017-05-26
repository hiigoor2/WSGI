<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class Usuario_model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }
        
        public function __set($campo,$valor){
            $this->$campo = $valor;
        }

        public function get($campo){
              return $this->$campo;
        }
        
        public function Select($dados){
            if(isset($dados['login'])){
                $this->db->where('usu_login', $dados['login']);
            }
            if(isset($dados['nome'])){
                $this->db->where('usu_nome', $dados['nome'].'%');
            }
            return $this->db->get('usuario');
        }

        public function BuscaPorLoginSenha($login, $senha){
            $this->db->where("usu_login", $login);
            $this->db->where("usu_senha", $senha);
            return $this->db->get("usuario")->row_array();
        }
        
        public function Logar($login, $senha){
            $this->db->where("usu_login", $login);
            $this->db->where("usu_senha", md5($senha));
            $usuario = $this->db->get("usuario")->row_array();
            return $usuario;
        }
        
        public function Insert($dados,$file)
        {
                //salvar imagem
                $this->load->library('imagem_upload');
                $this->imagem_upload->width = 400;
                $this->imagem_upload->height = 400;
                $imagem = $this->imagem_upload->Salvar( 'assets/imgs/',$file);
                $campos = array(
                    'usu_login'=>$dados['login'],
                    'usu_senha'=>md5($dados['senha']),
                    'niv_codigo'=>$dados['nivel'],
                    'usu_nome'=>$dados['nome'],
                    'usu_email'=>$dados['email'],
                    'usu_telefone'=>$dados['telefone'],
                    'usu_celular'=>$dados['celular'],
                    'usu_foto'=>$imagem['imagem']
                    );
                

                $this->db->trans_begin();//setar true para testar transação
                $this->db->insert('usuario', $campos);
                $this->db->trans_complete();
                return $this->db->trans_status();
                
        }

        public function Update($dados)
        {
                //salvar imagem
                //$this->load->library('Imagem_upload');
                //$imagem = $this->Imagem_upload->salvar();
                
                $campos = array(
                    'usu_login'=>$dados['login'],
                    'usu_senha'=>md5($dados['senha']),
                    'usu_nivel'=>$dados['nivel'],
                    'usu_nome'=>$dados['nome'],
                    'usu_email'=>$dados['email'],
                    'usu_telefone'=>$dados['telefone'],
                    'usu_celular'=>$dados['celular'],
                    'usu_foto'=>$dados['imagem']
                    );

                $this->db->update('usuario', $campos, array('usu_login' => $dados['login']));
        }
        
        public function Delete($dados){
            $this->db->where('usu_login', $dados['login']);
            $this->db->delete('usuario');
        }
  
    /**
    * Formata os contatos para exibição dos dados na home
    * Verificar meio melhor de realizar estas operações
    *
    * @param array $contatos Lista dos contatos a serem formatados
    *
    * @return array
    */
    function Formatar($sala){
      if($sala){
        for($i = 0; $i < count($sala); $i++){
          $sala[$i]['editar_url'] = base_url('editar')."/".$sala[$i]['usu_login'];
          $sala[$i]['excluir_url'] = base_url('excluir')."/".$sala[$i]['usu_login'];
        }
        return $sala;
      } else {
        return false;
      }
    }
}