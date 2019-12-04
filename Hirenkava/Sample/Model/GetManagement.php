<?php


namespace Hirenkava\Sample\Model;

class GetManagement implements \Hirenkava\Sample\Api\GetManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getGet($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}
