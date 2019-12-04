<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Catalog product tier price backend attribute model
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */

namespace Hirenkava\Msrp\Model\Product\Attribute\Backend;

class Tierprice extends \Magento\Catalog\Model\Product\Attribute\Backend\Tierprice
{
    /**
     * @inheritdoc
     */
    protected function modifyPriceData($object, $data)
    {
        $data = parent::modifyPriceData($object, $data);
        $price = ($object->getSpecialPrice()) ? $object->getSpecialPrice() : $object->getPrice();
        foreach ($data as $key => $tierPrice) {
            $percentageValue = isset($tierPrice['percentage_value']) && is_numeric($tierPrice['percentage_value'])
            ? $tierPrice['percentage_value'] : null;
            if ($percentageValue) {
                $data[$key]['price'] = $price * (1 - $percentageValue / 100);
                $data[$key]['website_price'] = $data[$key]['price'];
            }
        }
        return $data;
    }
}
