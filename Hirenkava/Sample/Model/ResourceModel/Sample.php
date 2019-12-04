<?php


namespace Hirenkava\Sample\Model\ResourceModel;

class Sample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('hirenkava_sample_sample', 'sample_id');
    }
}
