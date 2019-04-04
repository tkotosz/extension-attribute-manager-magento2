<?php

namespace Tkotosz\ExtensionAttributeManager\Container\ProductExtensionAttribute;

use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\ManagerInterface;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\ManagerContainerInterface;

class ManagerContainer implements ManagerContainerInterface
{
    /**
     * @var ManagerInterface[]
     */
    private $managers;

    /**
     * @param ManagerInterface[] $managers
     */
    public function __construct(array $managers = [])
    {
        $this->managers = $managers;
    }

    /**
     * @return ManagerInterface[]
     */
    public function getAll(): array
    {
        return $this->managers;
    }
}
