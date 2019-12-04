<?php


namespace Hirenkava\Sample\Model\ResourceModel\Sample;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Hirenkava\Sample\Model\Sample::class,
            \Hirenkava\Sample\Model\ResourceModel\Sample::class
        );
    }
	
	protected function _initSelect()
    {
		parent::_initSelect();
		$this->addFieldToFilter("firstname",["like"=>"%Hiren%"]);
		return $this;
	}
}
