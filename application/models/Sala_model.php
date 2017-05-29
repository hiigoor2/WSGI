<?php
class Sala_model extends My_model {
    
    private $sal_descricao;
    private $sal_capacidade;
    
    function __construct() {
        parent::__construct();
        $this->table = 'sala';
    }
    
    function getSal_descricao() {
        return $this->sal_descricao;
    }

    function getSal_capacidade() {
        return $this->sal_capacidade;
    }

    function setSal_descricao($sal_descricao) {
        $this->sal_descricao = $sal_descricao;
    }

    function setSal_capacidade($sal_capacidade) {
        $this->sal_capacidade = $sal_capacidade;
    }

    public function Insert($dados){
        $data = array(
            'sal_descricao' => $dados['descricao'],
            'sal_capacidade' => $dados['capacidade'],
        );
        return $this->db->insert('sala',$data);
    }
    public function Listar(){
        return $this->db->get('sala')->result_array();
    }
    public function Select($dados){
        if(isset($dados['codigo'])){
            $this->db->where('sal_codigo', $dados['codigo']);
        }
        if(isset($dados['descricao'])){
            $this->db->where('sal_descricao',$dados['descricao']);
        }
        if(isset($dados['capacidade'])){
            $this->db->where('sal_capacidade',$dados['capacidade']);
        }
        return $this->db->get('sala')->result_array();
    }
    public function Update($dados){
        $data = array(
            'sal_descricao' => $dados['descricao'],
            'sal_capacidade' => $dados['capacidade'],
        );
        
        $this->db->where('sal_codigo',$dados['codigo']);
        return $this->db->update('sala',$data);
    }
    public function Delete($dados){
        $this->db->where('sal_codigo',$dados['codigo']);
        return $this->db->delete('sala');
    }

    
    
    /**
    * Formata os contatos para exibição dos dados na home
    *
    * @param array $contatos Lista dos contatos a serem formatados
    *
    * @return array
    */
    
    public function Formatar($sala){
      if($sala){
        for($i = 0; $i < count($sala); $i++){
          $sala[$i]['editar_url'] = base_url('editar')."/".$sala[$i]['id'];
          $sala[$i]['excluir_url'] = base_url('excluir')."/".$sala[$i]['id'];
        }
        return $sala;
      } else {
        return false;
      }
    }
}


