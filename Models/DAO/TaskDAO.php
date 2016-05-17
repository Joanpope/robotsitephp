<?php 

namespace Models\DAO;

use Models\DAO\HTTPRequest as HTTPRequest;
use Models\DAO\AbstractDAO as AbstractDAO;
use Models\Business\Team as Team;
use Models\Business\Worker as Worker;
use Models\Business\Order as Order;
use App\Utility\Debug as Debug;


class TaskDAO extends AbstractDAO{

	private $HTTPRequest;

	public function __construct(){
		$this->HTTPRequest = new HTTPRequest();
	}


	public function getById($id){
		$url = WEBSERVICE. "tasks/getById/" . $id;
		$this->HTTPRequest->setUrl($url);
		$this->HTTPRequest->setMethod("GET");
		$arrayResponse = $this->HTTPRequest->sendHTTPRequest();
		return $this->arrayToTask($arrayResponse);
	}

	public function getAll(){
		$url = WEBSERVICE. "tasks/getAll";
		$this->HTTPRequest->setUrl($url);
		$this->HTTPRequest->setMethod("GET");
		$arrayResponse = $this->HTTPRequest->sendHTTPRequest();
		return $this->arrayToTask($arrayResponse);
	}

	public function create($object){
		$url = WEBSERVICE. "tasks/create";
		$this->HTTPRequest->setUrl($url);
		$this->HTTPRequest->setMethod("POST");
		$this->HTTPRequest->setData($object);
		$response = $this->HTTPRequest->sendHTTPRequest();
		return $response;
	}

	public function update($object){
		$id = $object->getId();
		$url = WEBSERVICE. "tasks/updateAll/" . $id;
		$this->HTTPRequest->setUrl($url);
		$this->HTTPRequest->setMethod("PUT");
		$this->HTTPRequest->setData($object);
		$response = $this->HTTPRequest->sendHTTPRequest();
		return $response;
	}

	public function delete($id){
		$url = WEBSERVICE. "tasks/deleteById/" . $id;
		$this->HTTPRequest->setUrl($url);
		$this->HTTPRequest->setMethod("DELETE");
		$response = $this->HTTPRequest->sendHTTPRequest();
		return $response;
	}

	public function arrayToTask($tasks){
		$arrayTasks = array();
		for ($i=0; $i < count($tasks); $i++) {
			$task = $this->arrayToObject($tasks[$i]);
			array_push($arrayTasks,$this->fixForeingTask($task));
		}
		return $arrayTasks;
	}

	public function fixForeingTask($task){
		$team = new Team($task->getTeam());
		$team = $team->get();
		$task->setTeam($team);
		$order = new Order($task->getOrder());
		$order = $order->get();
		$task->setOrder($order);
                if($task->getWorker() != null){
                    $worker = new Worker($task->getWorker());
                    $worker = $worker->get();
                    $task->setWorker($worker);
                }else{
                    $task->setWorker("NULL");
                }
		
		return $task;
	}

}


?>