<?php


namespace Hirenkava\Sample\Api\Data;

interface SampleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Sample list.
     * @return \Hirenkava\Sample\Api\Data\SampleInterface[]
     */
    public function getItems();

    /**
     * Set sample list.
     * @param \Hirenkava\Sample\Api\Data\SampleInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
