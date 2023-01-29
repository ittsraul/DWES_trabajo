<?php

namespace app\Controller;

use app\Core\DataBase;
use app\View\ListView;
use app\Model\ListModel;

class ListController
{
  public function main()
  {
    $listModel = new ListModel(DataBase::getInstance());
    $data = $listModel->getList();
    $view = new ListView();
    $view->drawList($data);
  }
}
