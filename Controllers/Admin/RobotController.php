<?php

namespace Controllers\Admin;

use Controllers\Controller as Controller;
use Models\Business\Worker as Worker;
use Models\Business\StatusRobot as StatusRobot;
use Models\Business\Robot as Robot;
use App\Core\Session as Session;
use App\Core\View as View;
use App\Utility\QuickForm as QuickForm;
use App\Utility\Debug as Debug;
use Wixel\Gump\GUMP as Gump;

class RobotController extends Controller {

    private $team;

    public function index() {
        View::to("admin.robot.index");
    }

    public function edit($id) {
        if(!$_POST){
        $robot = new Robot($id);
        $robot = $robot->get();
        $statusRobot = new StatusRobot();
        $status = $statusRobot->getAll();
        View::to("admin.robot.edit", compact('robot', 'status'));
        }else{
            $validator = new Gump();
            $inputs = array(
                'robot_code'        =>  $_POST["robot_code"],
                'robot_name'        =>  $_POST["robot_name"],
                'robot_ip_address'  =>  $_POST["robot_ip_address"],
                'robot_latitude'    =>  $_POST["robot_latitude"],
                'robot_longitude'   =>  $_POST["robot_longitude"]
            );
            $rules = array(
                'robot_code'       =>  'required|numeric|min_len,3',
                'robot_name'       =>  'required|max_len,50|min_len,3',
                'robot_ip_address' =>  'required|max_len,15|min_len,8',
                'robot_latitude'   =>  'required',
                'robot_longitude'  =>  'required'
            );
            $validated = $validator->validate($inputs, $rules);

            if($validated === TRUE){
                $admin = unserialize(Session::get("user"));
                $admin->updateRobot(new Robot(
                    $id,
                    $_POST["robot_code"],
                    $_POST["robot_name"],
                    $_POST["robot_ip_address"],
                    $_POST["robot_latitude"],
                    $_POST["robot_longitude"],
                    $_POST["robot_state"]
                    ));
                $msg = "S'ha editat satisfactoriament.";
                View::redirect("admin.robot", compact("msg"));
            }else{
                $error = $validator->get_readable_errors(false);
                View::redirect("admin.robot.edit." . $id, compact('error'));
            }
        }
    }

    public function delete($id) {
        View::to("admin.robot.delete");
    }

    public function create() {
        if(!$_POST){
            $statusRobot = new StatusRobot();
            $status = $statusRobot->getAll();
            View::to("admin.robot.create", compact('status'));
        }else{
            $validator = new Gump();
            $inputs = array(
                'robot_code'       =>  $_POST["robot_code"],
                'robot_name'       =>  $_POST["robot_name"],
                'robot_latitude'   =>  $_POST["robot_latitude"],
                'robot_longitude'  =>  $_POST["robot_longitude"]
            );
            $rules = array(
                'robot_code'       =>  'required|numeric|min_len,3',
                'robot_name'       =>  'required|max_len,50|min_len,3',
                'robot_latitude'   =>  'required',
                'robot_longitude'  =>  'required'
            );
            $validated = $validator->validate($inputs, $rules);

            if($validated === TRUE){
                $admin = unserialize(Session::get("user"));
                $admin->createRobot(new Robot(
                    null,
                    $_POST["robot_code"],
                    $_POST["robot_name"],
                    null,
                    $_POST["robot_latitude"],
                    $_POST["robot_longitude"],
                    $_POST["robot_state"]
                    ));
                $msg = "S'ha creat satisfactoriament.";
                View::redirect("admin.robot", compact("msg"));
            }else{
                $error = $validator->get_readable_errors(false);
                View::redirect("admin.robot.create", compact('error'));
            }
        }
    }

}

?>