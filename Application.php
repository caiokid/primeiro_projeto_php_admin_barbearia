<?php
	
	class Application{

		const DEFAULT = 'Admin';

		public function run(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				$class = 'controllers\\'.ucfirst($url[0]).'Controller';
			}else{
				$class = 'controllers\\'.self::DEFAULT.'Controller';
				$url[0] = self::DEFAULT;
			}

			$view = 'views\\'.ucfirst($url[0]).'View';
			$model = 'models\\'.ucfirst($url[0]).'Model';

			//TODO: Criar classes de controles, views e models.
			//TODO: Usar o extends para herdar os métodos das classes principais.

			$controller = new $class(new $view, new $model);
			$controller->index();
		}

	}

