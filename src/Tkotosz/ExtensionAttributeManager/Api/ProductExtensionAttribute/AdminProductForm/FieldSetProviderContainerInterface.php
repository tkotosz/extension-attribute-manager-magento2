<?php

namespace Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm;

use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm\FieldSetProviderInterface;

interface FieldSetProviderContainerInterface
{
    /**
     * @return FieldSetProviderInterface[]
     */
    public function getAll(): array;
}
