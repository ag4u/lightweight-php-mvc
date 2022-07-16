<?php

namespace App\Controller;

use App\Framework\Controller;
use App\Framework\Request;
use App\Model;

class IndexController extends Controller
{
  public function IndexAction(Request $request): string {
    return $this->forward('/welcome');
  }

  public function WelcomeAction(Request $request): string {
    $greeting = Model\Greeting::loadRandom();

    return $this->view->render(
      'index/welcome', [
        'greeting' => $greeting->text,
      ]
    );
  }
}