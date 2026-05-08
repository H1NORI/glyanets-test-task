<?php

namespace Drupal\my_first_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * @Block(
 *   id = "current_route_block",
 *   admin_label = @Translation("Current Route Block")
 * )
 */
class CurrentRouteBlock extends BlockBase implements ContainerFactoryPluginInterface
{
    protected RouteMatchInterface $routeMatch;

    public function __construct(
        array $configuration,
        $plugin_id,
        $plugin_definition,
        RouteMatchInterface $route_match
    ) {
        parent::__construct($configuration, $plugin_id, $plugin_definition);

        $this->routeMatch = $route_match;
    }

    public static function create(
        ContainerInterface $container,
        array $configuration,
        $plugin_id,
        $plugin_definition
    ) {
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('current_route_match')
        );
    }

    public function build(): array
    {
        return [
            '#markup' => '
                <div class="my-page">
                    <p><b>Поточний route: </b> ' . $this->routeMatch->getRouteName() . '</p>
                </div>
            ',
            '#cache' => [
                'max-age' => 0,
            ],
        ];
    }
}
