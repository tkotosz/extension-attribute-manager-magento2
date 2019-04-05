<?php

namespace Tkotosz\ExtensionAttributeManager\Ui\DataProvider\Modifier\AdminProductForm;

use InvalidArgumentException;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\Locator\LocatorInterface;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Field as UiComponentField;
use Tkotosz\ExtensionAttributeManager\Model\Product\Form\Field;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm\FieldListProviderContainerInterface;
use Tkotosz\ExtensionAttributeManager\Model\Product\Form\FieldList;

class FieldListManager extends AbstractModifier
{
    /**
     * @var FieldListProviderContainerInterface
     */
    private $fieldListProviderContainer;

    /**
     * @var LocatorInterface
     */
    private $locator;

    public function __construct(
        FieldListProviderContainerInterface $fieldListProviderContainer,
        LocatorInterface $locator
    ) {
        $this->fieldListProviderContainer = $fieldListProviderContainer;
        $this->locator = $locator;
    }

    public function modifyData(array $data)
    {
        /** @var ProductInterface $product */
        $product = $this->locator->getProduct();

        foreach ($this->fieldListProviderContainer->getAll() as $fieldListProvider) {
            $data[$product->getId()][self::DATA_SOURCE_DEFAULT][$fieldListProvider->getFieldSetId()] = $fieldListProvider->getFieldValues($product);
        }

        return $data;
    }

    public function modifyMeta(array $meta)
    {
        foreach ($this->fieldListProviderContainer->getAll() as $fieldListProvider) {
            if (!isset($meta[$fieldListProvider->getFieldSetId()])) {
                new InvalidArgumentException(
                    sprintf('The referenced fieldset "%s" does not exists', $fieldListProvider->getFieldSetId())
                );
            }

            if (!isset($meta[$fieldListProvider->getFieldSetId()]['children'])) {
                $meta[$fieldListProvider->getFieldSetId()]['children'] = [];
            }

            $fieldConfigs = &$meta[$fieldListProvider->getFieldSetId()]['children'];
            foreach ($fieldListProvider->getFieldList() as $field) {
                $fieldConfigs = array_merge($fieldConfigs, $field->toUiComponentConfigArray());
            }
        }

        return $meta;
    }
}
