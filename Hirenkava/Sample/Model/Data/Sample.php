<?php


namespace Hirenkava\Sample\Model\Data;

use Hirenkava\Sample\Api\Data\SampleInterface;

class Sample extends \Magento\Framework\Api\AbstractExtensibleObject implements SampleInterface
{

    /**
     * Get sample_id
     * @return string|null
     */
    public function getSampleId()
    {
        return $this->_get(self::SAMPLE_ID);
    }

    /**
     * Set sample_id
     * @param string $sampleId
     * @return \Hirenkava\Sample\Api\Data\SampleInterface
     */
    public function setSampleId($sampleId)
    {
        return $this->setData(self::SAMPLE_ID, $sampleId);
    }

    /**
     * Get sample
     * @return string|null
     */
    public function getSample()
    {
        return $this->_get(self::SAMPLE);
    }

    /**
     * Set sample
     * @param string $sample
     * @return \Hirenkava\Sample\Api\Data\SampleInterface
     */
    public function setSample($sample)
    {
        return $this->setData(self::SAMPLE, $sample);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Hirenkava\Sample\Api\Data\SampleExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Hirenkava\Sample\Api\Data\SampleExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Hirenkava\Sample\Api\Data\SampleExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
