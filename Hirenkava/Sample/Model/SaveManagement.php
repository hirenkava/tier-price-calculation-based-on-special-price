<?php


namespace Hirenkava\Sample\Model;

class SaveManagement implements \Hirenkava\Sample\Api\SaveManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function postSave($param)
    {
        return 'hello api POST return the $param ' . $param;
    }
}
