Extension attribute Manager module for Magento2
=========================

This module makes it easier to setup extension attributes in Magento 2. (for now only product extension attributes supported)

Usage:

1. Register your extension attribute your module's `etc/extension_attributes.xml`:
```
<?xml version="1.0" encoding="utf-8"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Api/etc/extension_attributes.xsd">
    <extension_attributes for="Magento\Catalog\Api\Data\ProductInterface">
        <attribute code="custom_field" type="string" />
    </extension_attributes>
</config>
```

2. Implement the manager service for your extension attribute:
Simply create a class which implements the `Tkotosz\ExtensionAttributeManager\Api\ProductExtensionAttribute\ManagerInterface`.

Available methods:
- onGetProduct(ProductInterface $product): Called when a product is loaded via the Product Repository

- onGetProductList(SearchResultsInterface $productSearchResults): Called when a list of products is loaded via the Product Repository

- onSaveProduct(ProductInterface $product): Called when a product is saved via the Product Repository

- onDeleteProduct(ProductInterface $product): Called when a product is deleted via the Product Repository

- onSaveProductInAdmin(ProductInterface $product, array $formData): Called when a product is saved in the admin (since Magento is not using the Repository in this case)

In each method you can access the `$product->getExtensionAttributes()` to get or set your extension attribute. E.g. `$product->getExtensionAttributes()->setCustomField('my custom value');`.


3. Register your manager service in the DI (in your module's `etc/di.xml`):
```
<type name="Tkotosz\ExtensionAttributeManager\Container\ProductExtensionAttribute\ManagerContainer">
    <arguments>
        <argument name="managers" xsi:type="array">
            <item name="custom_field" xsi:type="object">yourmanagerfqcn</item>
        </argument>
    </arguments>
</type>
```
