<?php

namespace Tkotosz\ExtensionAttributeManager\Api;

interface ProductExtensionAttributeManagerContainerInterface
{
    /**
     * @return ProductExtensionAttributeManagerInterface[]
     */
    public function getAll(): array;
}
