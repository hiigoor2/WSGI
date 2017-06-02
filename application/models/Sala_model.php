<?php

class Sala_model extends My_model {

    private $codigo;
    private $descricao;
    private $capacidade;

    function __construct($codigo = null,$descricao = null,$capacidade = null) {
        parent::__construct();
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->capacidade = $capacidade;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCapacidade() {
        return $this->capacidade;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setCapacidade($capacidade) {
        $this->capacidade = $capacidade;
    }

    public function Insert() {
        $data = array(
                'sal_descricao' => $this->descricao,
                'sal_capacidade' => $this->capacidade,
        );
        return $this->db->insert('sala',$data);
    }

    public function Listar($limit = null, $offset = null) {
        if (isset($limit) && $limit>0 && isset($offset) && $offset>=0) {
            $this->db->limit($limit);
            $this->db->offset($offset);
        }
        $result =  $this->db->get('sala')->result_object();
        $salas = array();
        foreach ($result as $ob){
            array_push($salas, new Sala_model($ob->sal_codigo,$ob->sal_descricao,$ob->sal_capacidade));
        }
        return $salas;
    }

    public function Count() {
        $this->db->select('count(*) as total');
        return $this->db->get('sala')->result();
    }

    public function Select() {
        if (isset($this->codigo)) {
            $this->db->where('sal_codigo', $this->codigo);
        }
        if (isset($this->descricao)) {
            $this->db->where('sal_descricao', $this->descricao);
        }
        if (isset($this->capacidade)) {
            $this->db->where('sal_capacidade', $this->capacidade);
        }
        return $this->db->get('sala')->result_array();
    }

    public function Update() {
        if(isset($this->codigo)){
            $this->db->where('sal_codigo', $this->codigo);
            return $this->db->update('sala', $this);
        }
        return null;
    }

    public function Delete() {
        if(isset($this->codigo)){
            $this->db->where('sal_codigo', $this->codigo);
            return $this->db->delete('sala');
        }
        return null;
    }

    /**
     * Formata os contatos para exibição dos dados na home
     *
     * @param array $contatos Lista dos contatos a serem formatados
     *
     * @return array
     */
    public function Formatar($sala) {
        if ($sala) {
            for ($i = 0; $i < count($sala); $i++) {
                $sala[$i]['editar_url'] = base_url('editar') . "/" . $sala[$i]['id'];
                $sala[$i]['excluir_url'] = base_url('excluir') . "/" . $sala[$i]['id'];
            }
            return $sala;
        } else {
            return false;
        }
    }

}
