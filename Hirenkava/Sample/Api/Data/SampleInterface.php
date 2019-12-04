<?php


namespace Hirenkava\Sample\Api\Data;

interface SampleInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const SAMPLE = 'sample';
    const SAMPLE_ID = 'sample_id';

    /**
     * Get sample_id
     * @return string|null
     */
    public function getSampleId();

    /**
     * Set sample_id
     * @param string $sampleId
     * @return \Hirenkava\Sample\Api\Data\SampleInterface
     */
    public function setSampleId($sampleId);

    /**
     * Get sample
     * @return string|null
     */
    public function getSample();

    /**
     * Set sample
     * @param string $sample
     * @return \Hirenkava\Sample\Api\Data\SampleInterface
     */
    public function setSample($sample);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Hirenkava\Sample\Api\Data\SampleExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Hirenkava\Sample\Api\Data\SampleExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Hirenkava\Sample\Api\Data\SampleExtensionInterface $extensionAttributes
    );
}
