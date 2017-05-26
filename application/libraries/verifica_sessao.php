<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verifica_sessao
 *
 * @author Higor
 */
class Verifica_sessao {
    
    protected $CI;
    
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }
    
    //verifica login
    public function UsuarioLogado($dados){
        if($dados==null){
            redirect('login');
        }else{
            $result = array(
                'login'=>$dados['usu_login'],
                'nome_usuario'=>$dados['usu_nome'],
                'nivel'=>$dados['niv_codigo'],
                'foto'=>$dados['usu_foto']);
            return $result;
        }
    }
}
?>
