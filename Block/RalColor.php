<?php

namespace Magegro\RalColor\Block;

use Magento\Framework\Api\SearchCriteriaInterface;


class RalColor extends \Magento\Framework\View\Element\Template
{
    protected $_ralColorFactory;
    protected $ralColorRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magegro\RalColor\Model\RalColorFactory $ralColorFactory,
        // \Magegro\RalColor\Api\ralColorRepositoryInterface $ralColorRepository,
        array $data = []
    ) {
        $this->_ralColorFactory = $ralColorFactory;
        // $this->ralColorRepository = $ralColorRepository;
        parent::__construct($context, $data);
    }
    public function getAllRalColor()
    {
        
        $ral_collection = $this->_ralColorFactory->create()->getcollection();
 
        $options=[];
        foreach($ral_collection as $d)
        {
            $options[] =  ['value' => $d->getRalColorId(), 'label' => trim($d->getRalColorHex())];

        }
        return $options;    
    }


}
