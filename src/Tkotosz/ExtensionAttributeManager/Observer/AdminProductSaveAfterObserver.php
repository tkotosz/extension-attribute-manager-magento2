<?php

namespace Tkotosz\ExtensionAttributeManager\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttributeManagerContainerInterface;

class AdminProductSaveAfterObserver implements ObserverInterface
{
    /**
     * @var ProductExtensionAttributeManagerContainerInterface
     */
    private $productExtensionAttributeManagerProvider;

    public function __construct(
        ProductExtensionAttributeManagerContainerInterface $productExtensionAttributeManagerProvider
    ) {
        $this->productExtensionAttributeManagerProvider = $productExtensionAttributeManagerProvider;
    }

    public function execute(Observer $observer)
    {
        $formData = $observer->getEvent()->getData('controller')->getRequest()->getPost('product', []);
        $product = $observer->getEvent()->getData('product');

        foreach ($this->productExtensionAttributeManagerProvider->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onSaveProductInAdmin($product, $formData);
        }
    }
}
