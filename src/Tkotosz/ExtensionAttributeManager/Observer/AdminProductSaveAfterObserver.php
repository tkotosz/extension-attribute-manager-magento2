<?php

namespace Tkotosz\ExtensionAttributeManager\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\ManagerContainerInterface;

class AdminProductSaveAfterObserver implements ObserverInterface
{
    /**
     * @var ManagerContainerInterface
     */
    private $productExtensionAttributeManagerContainer;

    public function __construct(ManagerContainerInterface $productExtensionAttributeManagerContainer)
    {
        $this->productExtensionAttributeManagerContainer = $productExtensionAttributeManagerContainer;
    }

    public function execute(Observer $observer)
    {
        $formData = $observer->getEvent()->getData('controller')->getRequest()->getPost('product', []);
        $product = $observer->getEvent()->getData('product');

        foreach ($this->productExtensionAttributeManagerContainer->getAll() as $productExtensionAttributeManager) {
            $productExtensionAttributeManager->onSaveProductInAdmin($product, $formData);
        }
    }
}
