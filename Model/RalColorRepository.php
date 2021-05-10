<?php

namespace Magegro\RalColor\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

use Magegro\RalColor\Api\RalColorRepositoryInterface;
use Magegro\RalColor\Api\Data\RalColorInterface;
use Magegro\RalColor\Model\RalColorFactory;
use Magegro\RalColor\Model\ResourceModel\RalColor as ObjectResourceModel;
use Magegro\RalColor\Model\ResourceModel\RalColor\CollectionFactory;


class RalColorRepository implements \Magegro\RalColor\Api\RalColorRepositoryInterface
{
    protected $objectFactory;
    protected $objectResourceModel;
    protected $collectionFactory;
    protected $searchResultsFactory;
    
    /**
     * CarsRepository constructor.
     *
     * @param RalColorFactory $objectFactory
     * @param ObjectResourceModel $objectResourceModel
     * @param CollectionFactory $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        RalColorFactory $objectFactory,
        ObjectResourceModel $objectResourceModel,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->objectFactory        = $objectFactory;
        $this->objectResourceModel  = $objectResourceModel;
        $this->collectionFactory    = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }
    /**
     * {@inheritDoc}
     */
    public function get($id)
    {
        $object = $this->objectFactory->create();

        $this->objectResourceModel->load($object, $id);
        if (!$object->getId()) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
        }
        return $object;
    }

    /**
     * {@inheritDoc}
     */
    public function save(\Magegro\RalColor\Api\Data\RalColorInterface $object)
    {
        try {
            $this->objectResourceModel->save($object);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $object;
    }
    /**
     * @inheritDoc
     */
    public function delete(\Magegro\RalColor\Api\Data\RalColorInterface $object)
    {
        try {
            $this->objectResourceModel->delete($object);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id)
    {
        return $this->delete($this->get($id));
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
       $collection = $this->collectionFactory->create();
       $this->collectionProcessor->process($searchCriteria, ($collection));
       $searchResults = $this->searchResultFactory->create();
 
       $searchResults->setSearchCriteria($searchCriteria);
       $searchResults->setItems($collection->getItems());
 
       return $searchResults;
    }
    
}
