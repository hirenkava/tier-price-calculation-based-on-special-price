<?php


namespace Hirenkava\Sample\Model;

class DeleteManagement implements \Hirenkava\Sample\Api\DeleteManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function deleteDelete($param)
    {
        return 'hello api DELETE return the $param ' . $param;
    }
}
