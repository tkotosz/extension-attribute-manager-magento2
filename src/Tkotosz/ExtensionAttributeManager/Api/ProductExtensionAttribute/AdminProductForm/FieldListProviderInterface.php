<?php

namespace Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm;

use Magento\Catalog\Api\Data\ProductInterface;
use Tkotosz\ExtensionAttributeManager\Model\Product\Form\FieldList;

interface FieldListProviderInterface
{
    /**
     * @return string
     */
    public function getFieldSetId(): string;

    /**
     * @return FieldList[]
     */
    public function getFieldList(): array;

    /**
     * @return array field id - value pairs
     */
    public function getFieldValues(ProductInterface $product): array;
}
