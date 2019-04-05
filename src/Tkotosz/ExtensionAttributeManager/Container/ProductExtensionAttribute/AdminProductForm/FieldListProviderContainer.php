<?php

namespace Tkotosz\ExtensionAttributeManager\Container\ProductExtensionAttribute\AdminProductForm;

use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm\FieldListProviderContainerInterface;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm\FieldListProviderInterface;

class FieldListProviderContainer implements FieldListProviderContainerInterface
{
    /** @var FieldListProviderInterface[] */
    private $providers;

    /**
     * @param FieldListProviderInterface[] $providers
     */
    public function __construct(array $providers = [])
    {
        $this->providers = $providers;
    }

    /**
     * @return FieldListProviderInterface[]
     */
    public function getAll(): array
    {
        return $this->providers;
    }
}
