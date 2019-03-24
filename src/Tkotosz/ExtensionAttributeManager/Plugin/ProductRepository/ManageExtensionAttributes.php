<?php

namespace Tkotosz\ExtensionAttributeManager\Plugin\ProductRepository;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Api\Data\ProductExtensionFactory;
use Magento\Framework\Api\SearchResultsInterface;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttributeManagerContainerInterface;

class ManageExtensionAttributes
{
    /**
     * @var ProductExtensionFactory
     */
    private $productExtensionFactory;

    /**
     * @var ProductExtensionAttributeManagers
     */
    private $productExtensionAttributeManagerProvider;

    /**
     * @param ProductExtensionFactory $productExtensionFactory
     * @param ProductExtensionAttributeManagerContainerInterface $productExtensionAttributeManagerProvider
     */
    public function __construct(
        ProductExtensionFactory $productExtensionFactory,
        ProductExtensionAttributeManagerContainerInterface $productExtensionAttributeManagerProvider
    ) {
        $this->productExtensionFactory = $productExtensionFactory;
        $this->productExtensionAttributeManagerProvider = $productExtensionAttributeManagerProvider;
    }

    public function afterGet(ProductRepositoryInterface $productRepository, ProductInterface $product): ProductInterface
    {
        $this->initExtensionAttributes($product);

        foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onGetProduct($product);
        }

        return $product;
    }

    public function afterGetById(ProductRepositoryInterface $productRepository, ProductInterface $product): ProductInterface
    {
        $this->initExtensionAttributes($product);

        foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onGetProduct($product);
        }

        return $product;
    }

    public function afterGetList(ProductRepositoryInterface $productRepository, SearchResultsInterface $productSearchResults): SearchResultsInterface
    {
        if ($productSearchResults->getTotalCount() === 0) {
            return $productSearchResults;
        }

        foreach ($productSearchResults->getItems() as $product) {
            $this->initExtensionAttributes($product);
        }

        foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onGetProductList($productSearchResults);
        }

        return $productSearchResults;
    }

    public function afterSave(ProductRepositoryInterface $productRepository, ProductInterface $product): ProductInterface
    {
        $this->initExtensionAttributes($product);

        foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onSaveProduct($product);
        }

        return $product;
    }

    public function aroundDelete(ProductRepositoryInterface $productRepository, callable $proceed, ProductInterface $product): bool
    {
        $isDeleted = $proceed($product);

        if ($isDeleted) {
            $this->initExtensionAttributes($product);

            foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
                $productExtensionAttributeManager->onDeleteProduct($product);
            }
        }

        return $isDeleted;
    }

    public function aroundDeleteById(ProductRepositoryInterface $productRepository, callable $proceed, $sku): bool
    {
        $product = $productRepository->get($sku);

        $isDeleted = $proceed($sku);

        if ($isDeleted) {
            $this->initExtensionAttributes($product);

            foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
                $productExtensionAttributeManager->onDeleteProduct($product);
            }
        }

        return $isDeleted;
    }

    private function initExtensionAttributes(ProductInterface $product): void
    {
        $productExtension = $product->getExtensionAttributes();

        if ($productExtension === null) {
            $productExtension = $this->productExtensionFactory->create();
            $product->setExtensionAttributes($productExtension);
        }
    }
}
