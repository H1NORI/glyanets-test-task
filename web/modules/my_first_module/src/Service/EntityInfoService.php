<?php

namespace Drupal\my_first_module\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;

class EntityInfoService
{
    protected EntityTypeManagerInterface $entityTypeManager;

    public function __construct(EntityTypeManagerInterface $entityTypeManager)
    {
        $this->entityTypeManager = $entityTypeManager;
    }

    public function getEntityInfo(string $entityType, int $entityId): ?array
    {
        $storage = $this->entityTypeManager->getStorage($entityType);

        $entity = $storage->load($entityId);

        if (!$entity) {
            return null;
        }

        return [
            'id' => $entity->id(),
            'label' => $entity->label(),
            'type' => $entity->getEntityTypeId(),
        ];
    }
}