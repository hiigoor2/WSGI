<?php

class Sala_model extends My_model {

    private $sal_codigo;
    private $sal_descricao;
    private $sal_capacidade;

    function __construct() {
        parent::__construct();
    }

    public function getCodigo() {
        return $this->sal_codigo;
    }

    public function setCodigo($codigo) {
        $this->sal_codigo = $codigo;
    }

    public function getDescricao() {
        return $this->sal_descricao;
    }

    public function getCapacidade() {
        return $this->sal_capacidade;
    }

    public function setDescricao($descricao) {
        $this->sal_descricao = $descricao;
    }

    public function setCapacidade($capacidade) {
        $this->sal_capacidade = $capacidade;
    }

    public function Insert() {
        return $this->db->insert('sala', $this);
    }

    public function Listar($limit = 0, $offset = 0) {
        if ($limit > 0 && $offset >= 0) {
            $this->db->limit($limit);
            $this->db->offset($offset);
        }
        return $this->db->get('sala')->result($this);
    }

    public function Count() {
        $this->db->select('count(*) as total');
        return $this->db->get('sala')->result();
    }

    public function Select() {
        if (isset($dados['codigo'])) {
            $this->db->where('sal_codigo', $dados['codigo']);
        }
        if (isset($dados['descricao'])) {
            $this->db->where('sal_descricao', $dados['descricao']);
        }
        if (isset($dados['capacidade'])) {
            $this->db->where('sal_capacidade', $dados['capacidade']);
        }
        return $this->db->get('sala')->result_array();
    }

    public function Update() {
        $this->db->where('sal_codigo', $this->sal_codigo);
        return $this->db->update('sala', $this);
    }

    public function Delete() {
        $this->db->where('sal_codigo', $this->sal_codigo);
        return $this->db->delete('sala');
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
