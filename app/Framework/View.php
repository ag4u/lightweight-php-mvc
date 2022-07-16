<?php

namespace App\Framework;

class View
{
  protected function renderFile(string $name, array $variables): string {
    ob_start();
    extract($variables);

    require APP_DIR . '/View/' . $name . '.php';

    return ob_get_clean();
  }

  public function render(string $name, array $variables = []): string {
    $contentFromView = $this->renderFile($name, $variables);
    $contentWithLayout = $this->renderFile('layout', [
      'content' => $contentFromView
    ]);

    return $contentWithLayout;
  }
}