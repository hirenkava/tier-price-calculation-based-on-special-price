<?php
/**
 * CedCommerce
  *
  * NOTICE OF LICENSE
  *
  * This source file is subject to the End User License Agreement (EULA)
  * that is bundled with this package in the file LICENSE.txt.
  * It is also available through the world-wide-web at this URL:
  * https://cedcommerce.com/license-agreement.txt
  *
  * @category  Hirenkava
  * @package   Hirenkava_Sample
  * @author    Hiren <hiren.kava84@gmail.com >
  */
namespace Hirenkava\Sample\Setup\Patch\Data;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\ModuleDataSetupInterface;
/**
 * Class AddData
 * @package Hirenkava\Sample\Setup\Patch\Data
 */
class AddData implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var \Hirenkava\Sample\Model\Sample
     */
    private $sample;
    /**
     * 
     * @param \Hirenkava\Sample\Model\Sample $sample
     */
    public function __construct(
        \Hirenkava\Sample\Model\Sample $sample
    ) {
        $this->sample = $sample;
    }
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function apply()
    {
    	$sampleData = [];
    	$sampleData['firstname'] = "Andrew Tye";
    	$sampleData['email_address'] = "andrew@email.com";
    	$this->sample->addData($sampleData);
    	$this->sample->getResource()->save($this->sample);
    }
    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }
    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '2.0.0';
    }
    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}