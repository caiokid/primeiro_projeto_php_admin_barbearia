<?php

namespace models;

class AdminModel extends Model
{

    public static function CadastrarFunc($nome,$email,$senha,$imagem){
        $sql =  \MySql::connect()->prepare("INSERT INTO funcionarios(id_funcionario, nome_funcionario,email, senha, imagem) VALUES (null,?,?,?,?)");
        $sql->execute(array($nome,$email,$senha,$imagem));

    }
    
    public static function Deletar($id){
        $sql =  \MySql::connect()->exec("DELETE FROM funcionarios WHERE id_funcionario = $id");
    }




    public static function CadastrarServico($servico,$preco): void{
        $sql =  \MySql::connect()->prepare("INSERT INTO servicos(id_servicos,servico, preco) VALUES (null,?,?)");
        $sql->execute(array($servico,$preco));

    }



    public static function AtendidoBanco($id){		
		
        $sql = \MySql::connect()->prepare("SELECT * FROM tb_agendados INNER JOIN servicos ON tb_agendados.id_servicos = servicos.id_servicos INNER JOIN clientes ON tb_agendados.id_usuario = clientes.id_cliente INNER JOIN funcionarios ON tb_agendados.id_funcionario = funcionarios.id_funcionario  WHERE tb_agendados.id_agenda = $id");
        $sql->execute();

        foreach ($sql as $key => $value) {
    
           $pdo1 = \MySql::connect()->prepare("INSERT INTO `atendidos`(`id_atendidos`, `id_agenda`, `usuario`, `funcionario`, `servico`, `horario`, `status`, `views`) VALUES (null,?,?,?,?,?,?,?)");
           
           $pdo1->execute(array($value['id_agenda'],$value['nome'],$value['nome_funcionario'],$value['servico'],$value['horario'],'1','1'));
       }
       \MySql::connect()->exec("DELETE FROM tb_agendados WHERE id_agenda = $id");
    }
       


    public static function DeletarServico($id){
        $sql =  \MySql::connect()->exec("DELETE FROM servicos WHERE id_servicos = $id");
    }



     public static function Desmarcad($id){	

        $sql = \MySql::connect()->prepare("SELECT * FROM tb_agendados INNER JOIN servicos ON tb_agendados.id_servicos = servicos.id_servicos INNER JOIN clientes ON tb_agendados.id_usuario = clientes.id_cliente INNER JOIN funcionarios ON tb_agendados.id_funcionario = funcionarios.id_funcionario  WHERE tb_agendados.id_agenda = $id");
        $sql->execute();

        foreach ($sql as $key => $value) {
    
           $pdo1 = \MySql::connect()->prepare("INSERT INTO `desmarcados`(`id_desmarcados`, `id_agenda`, `usuario`, `funcionario`, `servicos`, `horario`, `status`, `views`) VALUES (null,?,?,?,?,?,?,?)");
           
           $pdo1->execute(array($value['id_agenda'],$value['nome'],$value['nome_funcionario'],$value['servico'],$value['horario'],'1','1'));
       }
         
       \MySql::connect()->exec("DELETE FROM tb_agendados WHERE id_agenda = $id");


    } 
    
    public static function DeletarDesmarcardos($id){	

        \MySql::connect()->exec("DELETE FROM desmarcados WHERE id_desmarcados = $id");
        }
    

    public static function DeletarAten($id){	

	\MySql::connect()->exec("DELETE FROM atendidos WHERE id_atendidos = $id");
    }



}

