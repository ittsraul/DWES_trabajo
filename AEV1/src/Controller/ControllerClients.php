<?php
namespace app\Controller;

use app\Core\DataBase;
use app\View\ViewClients;
use app\Model\ManageClients;

class ControllerClients
{
    public function client(){
        $ManageClients = new ManageClients(DataBase::getInstance());
        $data = $ManageClients->getList();
        $view = new ViewClients();
        $view->drawList($data);
    }
}
