<?php


namespace Hirenkava\Sample\Model;

use Hirenkava\Sample\Api\SampleRepositoryInterface;
use Hirenkava\Sample\Api\Data\SampleSearchResultsInterfaceFactory;
use Hirenkava\Sample\Api\Data\SampleInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Hirenkava\Sample\Model\ResourceModel\Sample as ResourceSample;
use Hirenkava\Sample\Model\ResourceModel\Sample\CollectionFactory as SampleCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;

class SampleRepository implements SampleRepositoryInterface
{

    protected $resource;

    protected $sampleFactory;

    protected $sampleCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataSampleFactory;

    protected $extensionAttributesJoinProcessor;

    private $storeManager;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceSample $resource
     * @param SampleFactory $sampleFactory
     * @param SampleInterfaceFactory $dataSampleFactory
     * @param SampleCollectionFactory $sampleCollectionFactory
     * @param SampleSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceSample $resource,
        SampleFactory $sampleFactory,
        SampleInterfaceFactory $dataSampleFactory,
        SampleCollectionFactory $sampleCollectionFactory,
        SampleSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->sampleFactory = $sampleFactory;
        $this->sampleCollectionFactory = $sampleCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSampleFactory = $dataSampleFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Hirenkava\Sample\Api\Data\SampleInterface $sample
    ) {
        /* if (empty($sample->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $sample->setStoreId($storeId);
        } */
        
        $sampleData = $this->extensibleDataObjectConverter->toNestedArray(
            $sample,
            [],
            \Hirenkava\Sample\Api\Data\SampleInterface::class
        );
        
        $sampleModel = $this->sampleFactory->create()->setData($sampleData);
        
        try {
            $this->resource->save($sampleModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the sample: %1',
                $exception->getMessage()
            ));
        }
        return $sampleModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($sampleId)
    {
        $sample = $this->sampleFactory->create();
        $this->resource->load($sample, $sampleId);
        if (!$sample->getId()) {
            throw new NoSuchEntityException(__('Sample with id "%1" does not exist.', $sampleId));
        }
        return $sample->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->sampleCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Hirenkava\Sample\Api\Data\SampleInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Hirenkava\Sample\Api\Data\SampleInterface $sample
    ) {
        try {
            $sampleModel = $this->sampleFactory->create();
            $this->resource->load($sampleModel, $sample->getSampleId());
            $this->resource->delete($sampleModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Sample: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($sampleId)
    {
        return $this->delete($this->getById($sampleId));
    }
}
