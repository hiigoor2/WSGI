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
class Sala extends CI_Controller {

    public function index($pag = null) {

        $this->load->library('verifica_sessao');
        $dados['sala'] = null;
        $dados = $this->verifica_sessao->UsuarioLogado($this->session->get_userdata()['usuario_logado']);
        $this->load->model('sala_model', 'sala');

        //paginação
        if ($pag == null) {
            $pag = 1;
        }
        $max_registros = 5;
        if ($pag <= $max_registros) {
            $dados['btAnterior'] = 'pointer-events: none';
        } else {
            $dados['btAnterior'] = '';
        }
        $contagem = $this->sala->Count();
        if ($contagem[0]->total - $pag < $max_registros) {
            $dados['btProximo'] = 'pointer-events: none';
        } else {
            $dados['btProximo'] = '';
        }

        $qtde_registros = $contagem[0]->total;
        $v_inteiro = (int) $qtde_registros / $max_registros;
        $v_resto = $qtde_registros % $max_registros;

        if ($v_resto > 0) {
            $v_inteiro += 1;
        }
        $dados['pag'] = $pag;
        $dados['max_registros'] = $max_registros;
        $dados['qtde_botoes'] = $v_inteiro;
        $dados['salas'] = $this->sala->Listar($max_registros, $pag - 1);
        
        /* carrega a view */
        $this->load->view('templates/html_header', $dados);
        $this->load->view('templates/html_menu_topo');
        $this->load->view('templates/html_menu_lateral', $dados);
        $this->load->view('pages/gerenciar/Sala/gerenciar_sala', $dados);
        $this->load->view('templates/html_footer');
    }

    public function Gravar() {
        //valida login
        $this->load->library('verifica_sessao');
        $dados = $this->verifica_sessao->UsuarioLogado($this->session->get_userdata()['usuario_logado']);
        // chama o modelo
        $this->load->model('sala_model', 'sala');
        //validar inserts
        $this->load->library('form_validation');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|min_length[5]|max_length[50]');
        $valida = false;
        if ($this->form_validation->run() == FALSE) {
            $dados = array('erros' => validation_errors());
        } else {
            $valida = true;
        }
        if ($valida) {
            $this->sala->setCodigo($this->input->post()['codigo']);
            $this->sala->setDescricao($this->input->post()['descricao']);
            $this->sala->setCapacidade($this->input->post()['capacidade']);
            if ($this->sala->getCodigo()>0) {
                $result = $this->sala->Update(); // acessa a função do modelo    
            }else{
                $result = $this->sala->Insert();
            }
            if (!$result) {
                    $dados = array('erros' => 'Não foi possível gravar o sala!');
                }
        }

        //paginação
        if (!isset($pag) || $pag == null) {
            $pag = 1;
        }
        $max_registros = 5;
        if ($pag <= $max_registros) {
            $dados['btAnterior'] = 'pointer-events: none';
        } else {
            $dados['btAnterior'] = '';
        }
        $contagem = $this->sala->Count();
        if ($contagem[0]->total - $pag < $max_registros) {
            $dados['btProximo'] = 'pointer-events: none';
        } else {
            $dados['btProximo'] = '';
        }

        $qtde_registros = $contagem[0]->total;
        $v_inteiro = (int) $qtde_registros / $max_registros;
        $v_resto = $qtde_registros % $max_registros;

        if ($v_resto > 0) {
            $v_inteiro += 1;
        }
        
        $dados['pag'] = $pag;
        $dados['max_registros'] = $max_registros;
        $dados['qtde_botoes'] = $v_inteiro;
        $dados['salas'] = $this->sala->Listar($max_registros, $pag - 1);
        /* carrega a view */
        $this->load->view('templates/html_header', $dados);
        $this->load->view('templates/html_menu_topo');
        $this->load->view('templates/html_menu_lateral', $dados);
        $this->load->view('pages/gerenciar/Sala/gerenciar_sala', $dados);
        $this->load->view('templates/html_footer');
        
//        if($result!=null) {
//            echo  '<tr><td colspan="2"><p>'.$result['gru_descricao'].'</p></td>'.
//             '<td><a href="'.base_url('Sala/Alterar/'.md5($result['gru_codigo'])).'" class="btn btn-default">Alterar</a>'.
//             '<a href="'.base_url('Sala/Deletar/'.md5($result['gru_codigo'])).'" class="btn btn-danger">Deletar</a>'.
//             '</td></tr>';
//        } else {
//            echo "fail"; // não tem dados
//        }
        //tratar erros e mensagens
//        if($result){
//            echo 'Inserido';
//        }else{
//            echo 'Erro ao inserir dados';
//        }
    }

    public function Pag($pag = null) {
        $this->index($pag);
    }

    public function Alterar($codigo) {
        
        $this->load->library('verifica_sessao');
        $dados = $this->verifica_sessao->UsuarioLogado($this->session->get_userdata()['usuario_logado']);
        // chama o modelo
        $this->load->model('sala_model', 'sala');
        
        $this->sala->setCodigo($codigo);
        
        $dados['sala'] = $this->sala->Select()[0];
        
        //paginação
        if (!isset($pag) || $pag == null) {
            $pag = 1;
        }
        $max_registros = 5;
        if ($pag <= $max_registros) {
            $dados['btAnterior'] = 'pointer-events: none';
        } else {
            $dados['btAnterior'] = '';
        }
        $contagem = $this->sala->Count();
        if ($contagem[0]->total - $pag < $max_registros) {
            $dados['btProximo'] = 'pointer-events: none';
        } else {
            $dados['btProximo'] = '';
        }

        $qtde_registros = $contagem[0]->total;
        $v_inteiro = (int) $qtde_registros / $max_registros;
        $v_resto = $qtde_registros % $max_registros;

        if ($v_resto > 0) {
            $v_inteiro += 1;
        }
        
        $dados['pag'] = $pag;
        $dados['max_registros'] = $max_registros;
        $dados['qtde_botoes'] = $v_inteiro;
        $dados['salas'] = $this->sala->Listar($max_registros, $pag - 1);
        /* carrega a view */
        $this->load->view('templates/html_header', $dados);
        $this->load->view('templates/html_menu_topo');
        $this->load->view('templates/html_menu_lateral', $dados);
        $this->load->view('pages/gerenciar/Sala/alterar_sala', $dados);
        $this->load->view('templates/html_footer');
    }

    public function Deletar($codigo) {
        $this->load->library('verifica_sessao');
        $dados = $this->verifica_sessao->UsuarioLogado($this->session->get_userdata()['usuario_logado']);
        // chama o modelo
        $this->load->model('sala_model', 'sala');
        
        $this->sala->setCodigo($codigo);
        
        $result = $this->sala->Delete();
//        if(!$result){
//            $dados = array('erros' => 'Não foi possível gravar o sala!');
//        }
        redirect('Sala');
    }

}
