<?php

namespace Drupal\my_first_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class MyPageController extends ControllerBase
{
    public function content(): array
    {
        return [
            '#markup' => 'Hello, Drupal!<br>' . date('d.m.Y H:i'),
            '#cache' => [
                'max-age' => 0,
            ],
        ];
    }
}