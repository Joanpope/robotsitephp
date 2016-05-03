<?php 

namespace Controllers\Worker;

use Controllers\Controller as Controller;
use Models\Business\Worker as Worker;
use App\Core\View as View;

class WorkerController extends Controller{

	private $worker;

	public function index(){
		$worker = new Worker();
		$worker->setUsername("Andreu");
		$hola = "Hola treballador";
		$marc = "Marc";
        View::to("worker.index", compact("hola","worker", "marc"));
	}

	public function edit($id){
		//TODO
	}

	public function delete($id){
		//TODO
	}

	public function create(){
		//TODO
	}

}


?>