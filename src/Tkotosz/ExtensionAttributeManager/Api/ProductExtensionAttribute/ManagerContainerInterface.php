<?php

namespace Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute;

use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\ManagerInterface;

interface ManagerContainerInterface
{
    /**
     * @return ManagerInterface[]
     */
    public function getAll(): array;
}
