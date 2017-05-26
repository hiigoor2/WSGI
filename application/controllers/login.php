<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// linha de proteção ao controller

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login extends CI_Controller{

    
    
    public function index(){
        if($this->session->has_userdata('usuario_logado')){
            redirect('inicio');
        }
        
        /*carrega a view */
        $this->load->view('templates/html_header');
//        $this->load->view('templates/html_menu_topo');
//        $this->load->view('templates/html_menu_lateral');
        $this->load->view('login');
        $this->load->view('templates/html_footer');
    }
    
    public function Autenticar(){
 
        $this->load->model('Usuario_model','usuario');// chama o modelo usuarios_model
        $login = $this->input->post('login');// pega via post o email que venho do formulario
        $senha = $this->input->post('senha'); // pega via post a senha que venho do formulario
        $usuario = $this->usuario->Logar($login,$senha); // acessa a função buscaPorEmailSenha do modelo
 
        if($usuario){
            $this->session->set_userdata('usuario_logado', $usuario);
            $dados = array('mensagem' => 'Logado com sucesso!');
            redirect('inicio');
        }else{
            $dados = array('mensagem' => 'Não foi possível fazer o Login!');
            $this->load->view('templates/html_header',$dados);
            $this->load->view('login', $dados);
            $this->load->view('templates/html_footer');
        }
 
        
        
    }
    
    public function IsLogado(){
        $usuario = array();
        if($this->session->has_userdata('usuario_logado')){
            $usuario = $this->session->get_userdata()['usuario_logado'];
            return $usuario!=null;
        }
        return null;
    }
    
    public function Logar(){
        //$dados = $this->input->post();
        $dados = array();
        $dados['usu_login'] = $this->input->post('usuario');
        $dados['usu_senha'] = md5($this->input->post('senha'));
        
        $usuario = $this->Usuario_model->Select($dados);
        //if(isset($usuario['usu_codigo'])){
        if($usuario != NULL){
            $this->session->set_userdata('usuario_logado',$usuario);
            redirect('inicio');
        }
    }
    
    public function Logout(){
        //$this->session->unset_userdata('usuario_logado');
        $this->session->sess_destroy();
        redirect();
    }
}

