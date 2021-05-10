<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magegro\RalColor\Model\ResourceModel;

/**
 * ral color resource model
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class RalColor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    // protected $_idFieldName = 'id';

    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ral_color', 'id');
    }
}
