<?php

namespace Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\AdminProductForm;

use Tkotosz\ExtensionAttributeManager\Model\Product\Form\FieldSet;

interface FieldSetProviderInterface
{
    public function getFieldSet(): FieldSet;
}
