<?php

namespace Tkotosz\ExtensionAttributeManager\Ui\DataProvider\Modifier\AdminProductForm;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\Locator\LocatorInterface;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Fieldset as UiComponentFieldSet;
use Tkotosz\ExtensionAttributeManager\Model\Product\Form\FieldSet;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm\FieldSetProviderContainerInterface;

class FieldSetManager extends AbstractModifier
{
    private $fieldSetProviderContainer;

    public function __construct(FieldSetProviderContainerInterface $fieldSetProviderContainer)
    {
        $this->fieldSetProviderContainer = $fieldSetProviderContainer;
    }

    public function modifyData(array $data)
    {
        return $data;
    }

    public function modifyMeta(array $meta)
    {
        foreach ($this->fieldSetProviderContainer->getAll() as $fieldSetProvider) {
            $meta = array_merge($meta, $this->transformToUiComponentConfigArray($fieldSetProvider->getFieldSet()));
        }

        return $meta;
    }

    private function transformToUiComponentConfigArray(FieldSet $fieldSet): array
    {
        return [
            $fieldSet->getId() => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label' => $fieldSet->getLabel(),
                            'componentType' => UiComponentFieldSet::NAME,
                            'dataScope' => self::DATA_SCOPE_PRODUCT . '.' . $fieldSet->getId(),
                            'collapsible' => true,
                            'sortOrder' => 1000 // TODO
                        ]
                    ]
                ]
            ]
        ];
    }
}
