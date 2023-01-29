<?php

namespace app\Controller;

use app\Core\DataBase;
use app\Model\EmployeesModel;
use app\View\EmployeesListView;
use app\View\EmployeesDetailView;

class EmployeesController
{
  public function list(): void
  {
    $EmployeesModel = new EmployeesModel(DataBase::getInstance());
    $data = $EmployeesModel->getEmployeesList();
    $view = new EmployeesListView();
    $view->drawEmployeesList($data);
  }
  public function detail(int $id): void
  {
    $detailModel = new EmployeesModel(DataBase::getInstance());
    $data = $detailModel->getEmployee($id);
    $view = new EmployeesDetailView();
    $view->drawEmployeesDetail($data);
  }
}
