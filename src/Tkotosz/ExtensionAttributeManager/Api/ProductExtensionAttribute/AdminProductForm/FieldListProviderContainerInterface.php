<?php

namespace Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm;

interface FieldListProviderContainerInterface
{
    /**
     * @return FieldListProviderInterface[]
     */
    public function getAll(): array;
}
