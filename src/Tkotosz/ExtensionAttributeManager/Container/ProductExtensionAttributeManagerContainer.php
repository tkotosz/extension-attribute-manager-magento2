<?php

namespace Tkotosz\ExtensionAttributeManager\Container;

use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttributeManagerInterface;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttributeManagerContainerInterface;

class ProductExtensionAttributeManagerContainer implements ProductExtensionAttributeManagerContainerInterface
{
    /**
     * @var ProductExtensionAttributeManagerInterface[]
     */
    private $managers;

    /**
     * @param ProductExtensionAttributeManagerInterface[] $managers
     */
    public function __construct(array $managers = [])
    {
        $this->managers = $managers;
    }

    /**
     * @return ProductExtensionAttributeManagerInterface[]
     */
    public function getAll(): array
    {
        return $this->managers;
    }
}
