<?php

namespace Magegro\RalColor\Model\ResourceModel\RalColor;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
        /**
         * Define resource model
         *
         * @return void
         */
        protected function _construct()
        {
                $this->_init('Magegro\RalColor\Model\RalColor', 'Magegro\RalColor\Model\ResourceModel\RalColor');
        }
}