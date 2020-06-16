<?php


namespace Mxp100\TestModule\Api;


interface CustomerTrustedInterface
{
    /**
     * Getting trusted customers
     * @return integer[]
     */
    public function get();
}
