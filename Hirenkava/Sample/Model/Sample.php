<?php


namespace Hirenkava\Sample\Model;

use Hirenkava\Sample\Api\Data\SampleInterface;
use Hirenkava\Sample\Api\Data\SampleInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Sample extends \Magento\Framework\Model\AbstractModel
{

    protected $sampleDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'hirenkava_sample_sample';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SampleInterfaceFactory $sampleDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Hirenkava\Sample\Model\ResourceModel\Sample $resource
     * @param \Hirenkava\Sample\Model\ResourceModel\Sample\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        SampleInterfaceFactory $sampleDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Hirenkava\Sample\Model\ResourceModel\Sample $resource,
        \Hirenkava\Sample\Model\ResourceModel\Sample\Collection $resourceCollection,
        array $data = []
    ) {
        $this->sampleDataFactory = $sampleDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve sample model with sample data
     * @return SampleInterface
     */
    public function getDataModel()
    {
        $sampleData = $this->getData();
        
        $sampleDataObject = $this->sampleDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $sampleDataObject,
            $sampleData,
            SampleInterface::class
        );
        
        return $sampleDataObject;
    }
}
