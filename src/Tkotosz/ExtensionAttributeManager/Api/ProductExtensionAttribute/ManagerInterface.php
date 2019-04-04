<?php

namespace Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface ManagerInterface
{
    public function onGetProduct(ProductInterface $product);

    public function onGetProductList(SearchResultsInterface $productSearchResults);

    public function onSaveProduct(ProductInterface $product);

    public function onDeleteProduct(ProductInterface $product);

    public function onSaveProductInAdmin(ProductInterface $product, array $formData);
}
