<?php

namespace Tkotosz\ExtensionAttributeManager\Container\ProductExtensionAttribute\AdminProductForm;

use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm\FieldSetProviderContainerInterface;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm\FieldSetProviderInterface;

class FieldSetProviderContainer implements FieldSetProviderContainerInterface
{
    /** @var FieldSetProviderInterface[] */
    private $providers;

    /**
     * @param FieldSetProviderInterface[] $providers
     */
    public function __construct(array $providers = [])
    {
        $this->providers = $providers;
    }

    /**
     * @return FieldSetProviderInterface[]
     */
    public function getAll(): array
    {
        return $this->providers;
    }
}
