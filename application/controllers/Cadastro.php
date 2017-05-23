<?php
class Cadastro extends CI_Controller{
	public function index() {
		$this->load->view('pages/cadastro/formulario');
	}

	public function cadastrar() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'Usuário', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[7]', array('required' => 'Você deve preencher a %s.'));
		$this->form_validation->set_rules('senhaconf', 'Confirmação de Senha', 'required|matches[senha]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$erros = array('mensagens' => validation_errors());
			$this->load->view('pages/cadastro/formulario', $erros);
		} else {
			echo "Formulário enviado com sucesso.";
		}
	}
}
?>