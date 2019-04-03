<?php

namespace Tkotosz\ExtensionAttributeManager\Plugin\ProductRepository;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttributeManagerContainerInterface;

class ManageExtensionAttributes
{
    /**
     * @var ProductExtensionAttributeManagers
     */
    private $productExtensionAttributeManagerProvider;

    /**
     * @param ProductExtensionAttributeManagerContainerInterface $productExtensionAttributeManagerProvider
     */
    public function __construct(
        ProductExtensionAttributeManagerContainerInterface $productExtensionAttributeManagerProvider
    ) {
        $this->productExtensionAttributeManagerProvider = $productExtensionAttributeManagerProvider;
    }

    public function afterGet(ProductRepositoryInterface $productRepository, ProductInterface $product): ProductInterface
    {
        foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onGetProduct($product);
        }

        return $product;
    }

    public function afterGetById(ProductRepositoryInterface $productRepository, ProductInterface $product): ProductInterface
    {
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

        foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onGetProductList($productSearchResults);
        }

        return $productSearchResults;
    }

    public function afterSave(ProductRepositoryInterface $productRepository, ProductInterface $product): ProductInterface
    {
        foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onSaveProduct($product);
        }

        return $product;
    }

    public function aroundDelete(ProductRepositoryInterface $productRepository, callable $proceed, ProductInterface $product): bool
    {
        $isDeleted = $proceed($product);

        if ($isDeleted) {
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
            foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
                $productExtensionAttributeManager->onDeleteProduct($product);
            }
        }

        return $isDeleted;
    }
}
