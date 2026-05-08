<?php

namespace Drupal\my_first_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\my_first_module\Service\EntityInfoService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MyPageController extends ControllerBase
{
    protected EntityInfoService $entityInfoService;

    public function __construct(EntityInfoService $entityInfoService)
    {
        $this->entityInfoService = $entityInfoService;
    }

    public static function create(ContainerInterface $container, ?string $id = null): static
    {
        return new static(
            $container->get('my_first_module.entity_info_service')
        );
    }

    // use of TWIG TEMPLATE
    public function content(): array
    {
        $info = $this->entityInfoService->getEntityInfo('node', 1);

        return [
            '#theme' => 'my_first_page',
            '#date' => date('d.m.Y H:i'),
            '#entity_info' => $info,
            '#cache' => [
                'max-age' => 0,
            ],
        ];
    }


    // TESTED DIFFERENT VARIANTS OF LOADING CONTENT:
    // use of MARKUP
    // public function content(): array
    // {
    //     return [
    //         '#markup' => 'Hello, Drupal!<br>' . date('d.m.Y H:i'),
    //         '#cache' => [
    //             'max-age' => 0,
    //         ],
    //     ];
    // }

    // use of HTML WITH MARKUP
    // public function content(): array
    // {
    //     return [
    //         '#markup' => '
    //     <div class="my-page">
    //         <h5>Hello, Drupal!</h5>
    //         <p>' . date('d.m.Y H:i') . '</p>
    //     </div>
    // ',
    //         '#cache' => [
    //             'max-age' => 0,
    //         ],
    //     ];
    // }

    // use of HTML RENDER ARRAY
    // public function content(): array
    // {
    //     return [
    //         'title' => [
    //             '#type' => 'html_tag',
    //             '#tag' => 'h5',
    //             '#value' => 'Hello, Drupal!',
    //         ],
    //         'date' => [
    //             '#type' => 'html_tag',
    //             '#tag' => 'p',
    //             '#value' => date('d.m.Y H:i'),
    //         ],
    //         '#cache' => [
    //             'max-age' => 0,
    //         ],
    //     ];
    // }

}
