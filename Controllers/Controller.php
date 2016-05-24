<?php 

namespace Controllers;

use App\Core\Session as Session;
use App\Core\View as View;

abstract class Controller{

	abstract protected function index();
	abstract protected function edit($id);
	abstract protected function delete($id);
	abstract protected function create();

	public function logout(){
		Session::destroy("user");
        View::redirect("login.index");
	}
}

?>