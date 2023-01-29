<?php

namespace app\Controller;

use app\Core\DataBase;
use app\View\DetailView;
use app\Model\DetailModel;

class DetailController
{
  public function main(int $id)
  {
    $detailModel = new DetailModel(DataBase::getInstance());
    $data = $detailModel->getDetail($id);
    $view = new DetailView();
    $view->drawDetail($data);
  }
}
