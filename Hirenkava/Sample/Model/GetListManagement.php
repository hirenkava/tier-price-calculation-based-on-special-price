<?php


namespace Hirenkava\Sample\Model;

class GetListManagement implements \Hirenkava\Sample\Api\GetListManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getGetList($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}
