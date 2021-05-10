<?php

namespace Magegro\RalColor\Model;

use Magento\Framework\Model\AbstractExtensibleModel;

/**
 * Ral Color model

 */
class RalColor extends AbstractExtensibleModel implements
    \Magegro\RalColor\Api\Data\RalColorInterface
{


    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Magegro\RalColor\Model\ResourceModel\RalColor::class);
    }


    /**
     * {@inheritdoc}
     */
    public function getRalColorId()
    {
        return $this->_getData(self::RAL_COLOR_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setRalColorId($id)
    {
        $this->setData(self::RAL_COLOR_ID, $id);
    }

    /**
     * {@inheritdoc}
     */
    public function getRalColorHex()
    {
        return $this->_getData(self::RAL_COLOR_HEX);
    }

    /**
     * {@inheritdoc}
     */
    public function setRalColorHex($id)
    {
        $this->setData(self::RAL_COLOR_HEX);
    }

    /**
     * {@inheritdoc}
     */
    public function getRalColorName()
    {
        return $this->_getData(self::RAL_COLOR_NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setRalColorName($id)
    {
        $this->setData(self::RAL_COLOR_NAME);
    }


    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Magegro\RalColor\Api\Data\RalColorExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        $extensionAttributes = $this->_getExtensionAttributes();
        if (!$extensionAttributes) {
            $extensionAttributes = $this->extensionAttributesFactory->create('Magento\Catalog\Api\Data\ProductInterface');
            $this->_setExtensionAttributes($extensionAttributes);
        }
        return $extensionAttributes;
    }


    /**
     * Set an extension attributes object.
     *
     * @param \Magegro\RalColor\Api\Data\RalColorExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magegro\RalColor\Api\Data\RalColorExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
