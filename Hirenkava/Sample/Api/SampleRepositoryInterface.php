<?php


namespace Hirenkava\Sample\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SampleRepositoryInterface
{

    /**
     * Save Sample
     * @param \Hirenkava\Sample\Api\Data\SampleInterface $sample
     * @return \Hirenkava\Sample\Api\Data\SampleInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Hirenkava\Sample\Api\Data\SampleInterface $sample
    );

    /**
     * Retrieve Sample
     * @param string $sampleId
     * @return \Hirenkava\Sample\Api\Data\SampleInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($sampleId);

    /**
     * Retrieve Sample matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Hirenkava\Sample\Api\Data\SampleSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Sample
     * @param \Hirenkava\Sample\Api\Data\SampleInterface $sample
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Hirenkava\Sample\Api\Data\SampleInterface $sample
    );

    /**
     * Delete Sample by ID
     * @param string $sampleId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($sampleId);
}
