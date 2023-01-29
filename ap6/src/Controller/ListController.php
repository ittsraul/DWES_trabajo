<?php

namespace app\Controller;

use app\Model\ListModel;
use app\Core\AbstractController;

class ListController extends AbstractController
{
  private $listModel;
  public function __construct(ListModel $listModel)
  {
    $this->listModel = $listModel;
    parent::__construct();
  }
  public function main()
  {
    $data = $this->listModel->getList();
    $this->render("list.html.twig", [
      "data" => $data
    ]);
  }
}
