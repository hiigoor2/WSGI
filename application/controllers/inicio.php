<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends CI_Controller{
 
    function index(){
        $this->load->library('verifica_sessao');
        $dados = $this->verifica_sessao->UsuarioLogado($this->session->get_userdata()['usuario_logado']);
        
        /*carrega a view */
        $this->load->view('templates/html_header',$dados);
        $this->load->view('templates/html_menu_topo');
        $this->load->view('templates/html_menu_lateral',$dados);
        $this->load->view('pages/inicio');
        $this->load->view('templates/html_footer');
    }
}
?>