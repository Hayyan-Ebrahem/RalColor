<?php

namespace Magegro\RalColor\Observer\Catalog\Product;


use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Event\ObserverInterface;
use Magegro\RalColor\Api\Data\RalColorInterface;

class AddRalColorObserver implements ObserverInterface
{

  
    private $request;

    public $productFactory;
    public $ralColorFactory;

    public function __construct(
        \Magento\Framework\App\Request\Http $request,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magegro\RalColor\Model\RalColorFactory $ralColorFactory
    ) {
        $this->request = $request;

        $this->productFactory = $productFactory;
        $this->ralColorFactory = $ralColorFactory;
    }

    /**
     *
     * @param Observer $observer Observer.
     *
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();

        // $extensionAttributes = $product->getExtensionAttributes();
        // if ($extensionAttributes && $extensionAttributes->getRalColor()) {
        //     return $product;
        // }
        // try {
        //     /** @var \Magegro\RalColor\Api\Data\RalColorInterface $ralColor */
        //     $ralColor = $this->ralColorRepository->get(3);
        // } catch (NoSuchproductException $e) {
        //     return $product;
        // }
        // $productExtension = $extensionAttributes ? $extensionAttributes : $this->productExtensionFactory->create();
        // $productExtension->setRalColor($ralColor);
        // $product->setExtensionAttributes($productExtension);

        return $product;
    }
}
