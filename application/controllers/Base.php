<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base extends CI_Controller {
	/**
     * Carrega a home
     */
	public function Index()
	{
		// Recupera os contatos através do model
		$salas = $this->Sala_model->GetAll('sal_descricao');
		// Passa os contatos para o array que será enviado à home
		$dados['salas'] =$this->Sala_model->Formatar($salas);
		// Chama a home enviando um array de dados a serem exibidos
		$this->load->view('pages/home',$dados);
	}
	/**
     * Processa o formulário para salvar os dados
     */
	public function Salvar(){
		// Recupera os contatos através do model
		$salas = $this->Sala_model->GetAll('sal_descricao');
		// Passa os contatos para o array que será enviado à home
		$dados['sala'] =$this->Sala_model->Formatar($salas);
		// Executa o processo de validação do formulário
		$validacao = self::Validar();
		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$sala = $this->input->post();
			// Insere os dados no banco recuperando o status dessa operação
			$status = $this->Sala_model->Inserir($sala);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível inserir a sala.');
			}else{
				$this->session->set_flashdata('success', 'Sala inserido com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}
		// Carrega a home
		$this->load->view('pages/home',$dados);
	}
	/**
     * Carrega a view para edição dos dados
     */
	public function Editar(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id)){
			redirect();
                }
		// Recupera os dados do registro a ser editado
		$dados['sala'] = $this->Sala_model->GetById($id);
		// Carrega a view passando os dados do registro
		$this->load->view('pages/editar',$dados);
	}
	/**
     * Processa o formulário para atualizar os dados
     */
	public function Atualizar(){
		// Realiza o processo de validação dos dados
		$validacao = self::Validar('update');
		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$sala = $this->input->post();
			// Atualiza os dados no banco recuperando o status dessa operação
			$status = $this->Sala_model->Atualizar($sala['id'],$sala);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$dados['sala'] = $this->Sala_model->GetById($sala['id']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar a sala.');
			}else{
				$this->session->set_flashdata('success', 'Sala atualizada com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
		}
		// Carrega a view para edição
		$this->load->view('pages/editar',$dados);
	}
	/**
     * Realiza o processo de exclusão dos dados
     */
	public function Excluir(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id)){
			redirect();
                }
		// Remove o registro do banco de dados recuperando o status dessa operação
		$status = $this->Sala_model->Excluir($id);
		// Checa o status da operação gravando a mensagem na seção
		if($status){
			$this->session->set_flashdata('success', '<p>Sala excluída com sucesso.</p>');
		}else{
			$this->session->set_flashdata('error', '<p>Não foi possível excluir a sala.</p>');
		}
		// Redirecionao o usuário para a home
		redirect();
	}
	/**
	* Valida os dados do formulário
	*
	* @param string $operacao Operação realizada no formulário: insert ou update
	*
	* @return boolean
	*/
	private function Validar($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação
		switch($operacao){
			case 'insert':
				$rules['sal_descricao'] = array('trim', 'required', 'min_length[3]');
				$rules['sal_capacidade'] = array('trim', 'required', 'is_natural_no_zero');
				break;
			case 'update':
				$rules['sal_descricao'] = array('trim', 'required', 'min_length[3]');
				$rules['sal_capacidade'] = array('trim', 'required', 'is_natural_no_zero');
				break;
			default:
				$rules['sal_descricao'] = array('trim', 'required', 'min_length[3]');
				$rules['sal_capacidade'] = array('trim', 'required', 'is_natural_no_zero');
				break;
		}
		$this->form_validation->set_rules('sal_descricao', 'Descricao', $rules['sal_descricao']);
		$this->form_validation->set_rules('sal_capacidade', 'Capacidade', $rules['sal_capacidade']);
		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}
}