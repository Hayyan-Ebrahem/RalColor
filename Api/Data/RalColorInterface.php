<?php

namespace Magegro\RalColor\Api\Data;


interface RalColorInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const RAL_COLOR_ID = 'ral_color_id';
    const RAL_COLOR_NAME = 'ral_color_name';
    const RAL_COLOR_HEX = 'ral_color_hex';

    /**/
    /**
     * Return the ral color ID.
     *
     * @return int|null Ral color ID. Otherwise, null.
     */
    public function getRalColorId();


    /**
     * Set ral color id
     *
     * @param int $id
     * @return $this
     */
    public function setRalColorId($id);

    /**
     * Return the ral color hex.
     *
     * @return string RalColorHex .
     */
    public function getRalColorHex();

    /**
     * Set ral color hex
     *
     * @param string $ralColorHex
     * @return $this
     */
    public function setRalColorHex($ralColorHex);

    // /**
    //  * Return the ral color code.
    //  *
    //  * @return string RalColorCode .
    //  */
    // public function getRalColorCode();

    //     /**
    //  * Set ral color hex
    //  *
    //  * @param string $RalColorCode
    //  * @return $this
    //  */
    // public function setRalColorCode($RalColorCode);


    /**
     * @return \Magegro\RalColor\Api\Data\RalColorExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \Magegro\RalColor\Api\Data\RalColorExtensionInterface $extensionAttributes
     * @return void
     */
    public function setExtensionAttributes(RalColorExtensionInterface $extensionAttributes);
}
