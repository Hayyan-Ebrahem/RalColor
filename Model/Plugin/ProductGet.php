<?php

namespace Magegro\RalColor\Model\Plugin;

use Magento\Framework\Exception\NoSuchEntityException;

class ProductGet
{
    // const RAL_COLOR = 'ral_color';


    protected $ralColorRepository;
    protected $productExtensionFactory;
    protected $productFactory;


    public function __construct(
        \Magegro\RalColor\Api\RalColorRepositoryInterface $ralColorRepository,
        \Magento\Catalog\Api\Data\ProductExtensionFactory $productExtensionFactory
        // \Magento\Catalog\Model\ProductFactory $productFactory

    ) {
        // $this->productFactory = $productFactory;

        $this->ralColorRepository = $ralColorRepository;

        $this->extensionFactory = $productExtensionFactory;
    }

    public function afterGet(
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Catalog\Api\Data\ProductInterface $product
    ) {
        $extensionAttributes = $product->getExtensionAttributes();

        if ($extensionAttributes && $extensionAttributes->getRalColor()) {
            return $product;
        }

        try {
            /** @var \Magegro\RalColor\Api\Data\RalColorInterface $ralColor */
            $ralColor = $this->ralColorRepository->get($product->getId());
        } catch (NoSuchproductException $e) {
            return $product;
        }

        $productExtension = $extensionAttributes ? $extensionAttributes : $this->productExtensionFactory->create();
        $productExtension->setRalColor($ralColor);
        $product->setExtensionAttributes($productExtension);

        return $product;
    }

    public function afterGetList(
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Catalog\Api\Data\ProductSearchResultsInterface $searchCriteria
    ) {
        $products = [];
        foreach ($searchCriteria->getItems() as $product) {
            /** get current extension attribute from database **/
            $ralColor = $this->ralColorRepository->get($product->getId());
            $extensionAttributes = $product->getExtensionAttributes();
            $extensionAttributes->setRalColor($ralColor);
            $product->setExtensionAttributes($extensionAttributes);

            $products[] = $product;
        }
        $searchCriteria->setItems($products);
        return $searchCriteria;
    }


    public function afterSave(
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Catalog\Api\Data\ProductInterface $result,
        \Magento\Catalog\Api\Data\ProductInterface $product
    ) {
        $extensionAttributes = $product->getExtensionAttributes();
        $ralColor = $extensionAttributes->getRalColor();
        $this->RalColorRepository->save($ralColor);

        $resultAttributes = $result->getExtentionAttributes();
        $resultAttributes->setRalColor($ralColor);
        $result->setExtensionAttributes($resultAttributes);

        return $result;
    }
}
