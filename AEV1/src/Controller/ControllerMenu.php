<?php

namespace app\Controller;

use app\View\ViewMenu;

class ControllerMenu
{
  public function menu()
  {
    $Vimenu = new ViewMenu();
    $Vimenu->ViMenu();
  }
}
