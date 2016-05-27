<?php

namespace Models\Business;

use Models\Business\DataObject as DataObject;
use Models\DAO\OrderDAO as OrderDAO;

/**
 * @package \Models\Business\Order
 */
class Order extends DataObject {

    protected $id;
    protected $code;
    protected $description;
    protected $priority;
    protected $date;
    protected $quantity;
    protected $statusOrder;
    protected $robot;
    protected $process;

    function __construct($id = null, $code = null, $description = null, $priority = null, $date = null, $quantity = null, $statusOrder = null, $robot = null, $process = null) {
        $this->setId($id);
        $this->setCode($code);
        $this->setDescription($description);
        $this->setPriority($priority);
        $this->setDate($date);
        $this->setQuantity($quantity);
        $this->setStatusOrder($statusOrder);
        $this->setRobot($robot);
        $this->setProcess($process);
    }

    function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->code;
    }

    function getDescription() {
        return $this->description;
    }

    function getPriority() {
        return $this->priority;
    }

    function getDate() {
        return $this->date;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getStatusOrder() {
        return $this->statusOrder;
    }

    function getRobot() {
        return $this->robot;
    }

    function getProcess() {
        return $this->process;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setPriority($priority) {
        $this->priority = $priority;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function setStatusOrder($statusOrder) {
        $this->statusOrder = $statusOrder;
    }

    function setRobot($robot) {
        $this->robot = $robot;
    }

    function setProcess($process) {
        $this->process = $process;
    }

    /**
     * Metode que retorna les ordres assignades a un equip.
     * @param object $team
     */
    function checkOrdersAssigned($team) {
        $dao = new OrderDAO();
        //provisional
        $dao->getOrdersByTeamId($team);
    }

    /**
     * Metode que retorna les ordres assignades a un treballador per l'estat en el que es troben.
     * @param int $idWorker
     * @param string $status
     * @return array[][]
     */
    function getAllByStatus($idWorker, $status) {
        $dao = new OrderDAO();
        return $dao->getAllByStatus($idWorker, $status);
    }

    /**
     * Metode que retorna totes les ordres.
     * @return array[][]
     */
    function getAllOrdersAdmin() {
        $dao = new OrderDAO();
        return $dao->getAllOrdersAdmin();
    }

    /**
     * Metode que retorna les ordres per a construir les estadistiques.
     * @param object $object
     * @return array[][]
     */
    function getStadisticOrders($object) {
        $dao = new OrderDAO();
        return $dao->getStadisticOrders($object);
    }

}
