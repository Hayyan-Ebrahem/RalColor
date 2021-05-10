<?php

namespace Magegro\RalColor\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magegro\RalColor\Api\Data\RalColorInterface;

interface RalColorRepositoryInterface
{
    /**
     * @param int $id
     * @return \Magegro\RalColor\Api\Data\RalColorInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($id);

    /**
     * @param \Magegro\RalColor\Api\Data\RalColorInterface $ralColor
     * @return \Magegro\RalColor\Api\Data\RalColorInterface
     */
    public function save(RalColorInterface $ralColor);

    /**
     * @param \Magegro\RalColor\Api\Data\RalColorInterface $ralcolor
     * @return void
     */
    public function delete(RalColorInterface $ralcolor);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magegro\RalColor\Api\Data\RalColorSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
