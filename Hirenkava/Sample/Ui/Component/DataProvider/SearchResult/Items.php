<?php
namespace Hirenkava\Sample\Ui\Component\DataProvider\SearchResult;

class Items extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->addMyCustomFilter();

        return $this;
    }

    public function addMyCustomFilter()
    {
        $this
            ->addFieldToFilter('firstname', ['like' => '%Hiren%']);

        return $this;
    }
}