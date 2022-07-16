<?php

namespace App\Controller;

use App\Framework\Controller;
use App\Framework\Request;

class ApiController extends Controller
{
  public function ReverseAction(Request $request): string {
    $inputJson = $request->getInputAsJson();

    return $this->json([
      'result' => strrev($inputJson->text),
    ]);
  }
}
