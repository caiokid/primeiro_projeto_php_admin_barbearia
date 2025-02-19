<?php
	namespace controllers;

	class AdminController extends Controller
	{
		
		
	

		public function __construct($view,$model){
			parent::__construct($view,$model);
		}


		public static function CadastrarFuncionario(){
			if(isset($_POST['cadastrar'])){
                 
				$nome = $_POST['nome'];
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$imagem = $_POST['imagem'];


				\models\AdminModel::CadastrarFunc($nome,$email,$senha,$imagem);

				header("Location:admin");

			}

		}

		public static function DeletarFuncionario(){
			if(isset($_GET['id'])){
                      
				$id = $_GET['id'];

				\models\AdminModel::Deletar($id);

				header("Location:admin");
			}
		}


		public static function CadastrarServicos(){
			if(isset($_POST['cadastrar_servico'])){
                 
				$servico= $_POST['servico'];
				$preco = $_POST['preco'];


				\models\AdminModel::CadastrarServico($servico,$preco);

				header("Location:admin");


			}

		}

		public static function DeletarServico(){
			if(isset($_GET['id_servico'])){
                      
				$id = $_GET['id_servico'];

				\models\AdminModel::DeletarServico($id);

				header("Location:admin");
			}
		}




		public static function Atendido(){		
		
		 if(isset($_GET['atendido'])){

			$id = $_GET['atendido'];
			
			\models\AdminModel::AtendidoBanco($id);
			
			header('Location:admin');
		}
		}


		public static function Desmarcadoo(){		
		
			if(isset($_GET['desmarcado'])){
   
			   $id = $_GET['deletardesmarcados'];
			   
			   \models\AdminModel::Desmarcad($id);
		   }
		}

		public static function DeletarDesmarcadoo(){		
			if(isset($_GET['deletardesmarcados'])){
   
			   $id = $_GET['deletardesmarcados'];
			   
			   \models\AdminModel::DeletarDesmarcardos($id);
		   }
		}

		

		public static function DeletarAtendido(){		
			if(isset($_GET['deletaratendido'])){
   

				if(isset($_GET['deletaratendido'])){
					$id =  $_GET['deletaratendido'];
                        //Chamar a função

						\models\AdminModel::DeletarAten($id);
				  }
		   }
		}



		public function index(){

			$this->view->render('admin.php');
			
		}

	}

?>