<?php

namespace Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm;

use Magento\Catalog\Api\Data\ProductInterface;
use Tkotosz\ExtensionAttributeManager\Model\Product\Form\Field;

interface FieldListProviderInterface
{
    /**
     * @return string
     */
    public function getFieldSetId(): string;

    /**
     * @return Field[]
     */
    public function getFieldList(): array;

    /**
     * @param ProductInterface $product
     *
     * @return array field id - value pairs
     */
    public function getFieldValues(ProductInterface $product): array;
}
