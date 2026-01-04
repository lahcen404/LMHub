<?php

namespace app\core;

class Controller
{
    protected function view(string $view, array $data = [])
    {
        extract($data);

        $viewFile = __DIR__ . '/../../views/pages/' . $view . '.php';
        $layoutFile = __DIR__ . '/../../views/templates/layout.php';

        if (!file_exists($viewFile)) {
            throw new \Exception("View $view not found");
        }

        require $layoutFile;
    }
}
