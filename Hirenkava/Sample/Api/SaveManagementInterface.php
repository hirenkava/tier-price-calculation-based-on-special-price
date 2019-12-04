<?php


namespace Hirenkava\Sample\Api;

interface SaveManagementInterface
{

    /**
     * POST for save api
     * @param string $param
     * @return string
     */
    public function postSave($param);
}
