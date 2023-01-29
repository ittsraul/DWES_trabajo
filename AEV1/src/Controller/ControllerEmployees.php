<?php

namespace app\Controller;


use app\Core\DataBase;
use app\View\ViewEmployees;
use app\Model\ManageEmployees;

class ControllerEmployees
{
  public function employee(int $id)
  {
    $detailModel = new ManageEmployees(DataBase::getInstance());
    $data = $detailModel->getDetail($id);
    $view = new ViewEmployees();
    $view->drawDetail($data);
  }
}
