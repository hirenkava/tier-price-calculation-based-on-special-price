<?php
namespace Hirenkava\Section\CustomerData;
use Magento\Customer\CustomerData\SectionSourceInterface;

class CustomSection implements SectionSourceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getSectionData()
    {
        return [
            'msg' =>'Hiren Kava Data from section',
        ];
    }
}