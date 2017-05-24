<?php
class Sala_model extends My_model {
    function __construct() {
        parent::__construct();
        $this->table = 'sala';
    }
    /**
    * Formata os contatos para exibição dos dados na home
    *
    * @param array $contatos Lista dos contatos a serem formatados
    *
    * @return array
    */
    function Formatar($sala){
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


