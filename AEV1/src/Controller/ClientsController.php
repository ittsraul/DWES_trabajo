<?php

namespace app\Controller;

use app\Core\DataBase;
use app\Model\ClientsModel;
use app\View\ClientsListView;
use app\View\ClientsDetailView;

class ClientsController
{
  public function list(): void
  {
    $clientsModel = new ClientsModel(DataBase::getInstance());
    $data = $clientsModel->getClientsList();
    $view = new ClientsListView();
    $view->drawClientsList($data);
  }
  public function detail(int $id): void
  {
    $detailModel = new ClientsModel(DataBase::getInstance());
    $data = $detailModel->getClient($id);
    $view = new ClientsDetailView();
    $view->drawClientsDetail($data);
  }
}
