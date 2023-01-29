<?php

namespace app\Controller;

use app\Model\DetailModel;
use app\Core\AbstractController;

class DetailController extends AbstractController
{
  private $detailModel;
  public function __construct(DetailModel $detailModel)
  {
    $this->detailModel = $detailModel;
    parent::__construct();
  }
  public function main(int $id)
  {
    $data = $this->detailModel->getDetail($id);
    $this->render("detail.html.twig", [
      "id" => $data["id"],
      "titulo" => $data["titulo"],
      "descripcion" => $data["descripcion"],
      "fecha_creacion" => $data["fecha_creacion"],
      "fecha_vencimiento" => $data["fecha_vencimiento"]
    ]);
  }
}
