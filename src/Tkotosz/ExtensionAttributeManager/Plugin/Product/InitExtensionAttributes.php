<?php

namespace Tkotosz\ExtensionAttributeManager\Plugin\Product;

use Magento\Catalog\Api\Data\ProductExtensionInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductExtensionFactory;

class InitExtensionAttributes
{
    /**
     * @var ProductExtensionFactory
     */
    private $productExtensionFactory;

    public function __construct(ProductExtensionFactory $productExtensionFactory)
    {
        $this->productExtensionFactory = $productExtensionFactory;
    }

    public function afterGetExtensionAttributes(ProductInterface $product, ProductExtensionInterface $productExtension = null): ProductExtensionInterface
    {
        if ($productExtension === null) {
            $productExtension = $this->productExtensionFactory->create();
            $product->setExtensionAttributes($productExtension);
        }

        return $productExtension;
    }
}
