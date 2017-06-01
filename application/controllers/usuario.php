<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Higor
 */
class Usuario extends CI_Controller {
    //put your code here
    public function index(){
        
        $this->load->library('verifica_sessao');
        $dados = $this->verifica_sessao->UsuarioLogado($this->session->get_userdata()['usuario_logado']);
        
        /*carrega a view */
        $this->load->view('templates/html_header',$dados);
        $this->load->view('templates/html_menu_topo');
        $this->load->view('templates/html_menu_lateral',$dados);
        $this->load->view('pages/gerenciar/usuario/gerenciar_usuario');
        $this->load->view('templates/html_footer');
    }
    
    public function Gravar(){
        $this->load->model('usuario_model','usuario');// chama o modelo
        $result = $this->usuario->Insert($this->input->post(),$_FILES['foto']); // acessa a função do modelo
        //tratar erros e mensagens
//        if($result){
//            echo 'Inserido';
//        }else{
//            echo 'Erro ao inserir dados';
//        }
    }
}
