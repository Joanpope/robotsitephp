<?php

namespace Controllers\Admin;

use Controllers\Controller as Controller;
use Models\Business\Worker as Worker;
use Models\Business\Order as Order;
use Models\Business\Task as Task;
use Models\Business\Team as Team;
use App\Core\Session as Session;
use App\Core\View as View;
use App\Utility\Debug as Debug;
use Wixel\Gump\GUMP as Gump;

class TaskController extends Controller {

    private $task;

    public function index() {
        View::to("admin.task.index");
    }

    public function edit($id) {
        if(!$_POST){
            $task = new Task($id);
            $task = $task->get();
            $team = new Team();
            $teams = $team->getAll();
            $order = new Order();
            $orders = $order->getAll();
            $worker = new Worker();
            $workers = $worker->getAll();
            View::to("admin.task.edit", compact('task','teams','orders','workers'));
        }else{
            $validator = new Gump();
            $inputs = array(
                'task_team'              =>  $_POST["task_team"],
                'task_order'             =>  $_POST["task_order"]
            );
            $rules = array(
                'task_team'               =>  'required',
                'task_order'              =>  'required'
            );
            $validated = $validator->validate($inputs, $rules);

            if($validated === TRUE){
                $admin = unserialize(Session::get("user"));
                $admin->updateTask(new Task(
                    $id,
                    $_POST["task_team"],
                    $_POST["task_order"],
                    $_POST["task_worker"], //worker
                    null, //date assignació per sql
                    $_POST["task_date_completion"], //data completion
                    $_POST["task_justification"]
                    ));
                $msg = "s'ha editat satisfactoriament.";
                View::redirect("admin.task", compact("msg"));
            }else{
                $error = $validator->get_readable_errors(false);
                View::redirect("admin.task.edit", compact('error'));
            }
        }
    }

    public function delete($id) {
        $task = new Task($id);
        $task->delete();
    }

    public function create() {
        if (!$_POST) {
            $team = new Team();
            $teams = $team->getAll();
            $order = new Order();
            $orders = $order->getAll();
            View::to("admin.task.create", compact('teams', 'orders'));
        } else {
            $validator = new Gump();
            $inputs = array(
                'task_team' => $_POST["task_team"],
                'task_order' => $_POST["task_order"]
            );
            $rules = array(
                'task_team' => 'required',
                'task_order' => 'required'
            );
            $validated = $validator->validate($inputs, $rules);

            if ($validated === TRUE) {
                $admin = unserialize(Session::get("user"));
                $admin->createTask(new Task(
                        null, 
                        $_POST["task_team"], 
                        $_POST["task_order"], 
                        null, //worker
                        null, //date assignació per sql
                        null, //data completion
                        null //justification
                ));
                $msg = "s'ha creat satisfactoriament.";
                View::redirect("admin.task", compact("msg"));
            } else {
                $error = $validator->get_readable_errors(false);
                View::redirect("admin.task.create", compact('error'));
            }
        }
    }

    function getTasksByAjax() {
        ob_end_clean();
        $task = new Task();
        $tasks = $task->getAllTasksAdmin();
        $arrayToSend = array();
        for ($i = 0; $i < count($tasks); $i++) {
            $auxArray = array();
            foreach ($tasks[$i] as $nTask) {
                array_push($auxArray, $nTask);
            }
            array_push($auxArray, "<a href='" . URL . "admin/task/edit/" . $tasks[$i]['id'] . "'><button class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span></button></a><button class='btn btn-danger' onclick='deleteTask(" . $tasks[$i]['id'] . ", \"" . URL . "\");'><span class='glyphicon glyphicon-remove'></span></button>");
            array_push($arrayToSend, $auxArray);
        }
//        Debug::log($tasks);
        echo json_encode($arrayToSend);
    }

}

?>
