<?php


namespace Hirenkava\Sample\ViewModel;

class Sampleview extends \Magento\Framework\DataObject implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    /**
     * Sampleview constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getSampleName()
    {
        //Your viewModel code
        // you can use me in your template like:
        // $viewModel = $block->getData('viewModel');
        // echo $viewModel->getSampleName();
        
        return __('Hello Developer!');
    }
}
