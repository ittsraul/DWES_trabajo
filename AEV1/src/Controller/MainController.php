<?php

namespace app\Controller;

use app\View\MainView;

class MainController
{
  public function main()
  {
    $view = new MainView();
    $view->main();
  }
}
