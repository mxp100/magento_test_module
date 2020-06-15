<?php

namespace Mxp100\TestModule\Model;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\ResourceModel\CustomerRepository;

class CustomerFakedRepository extends CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getById($customerId)
    {
        $result = parent::getById($customerId);
        $result->setEmail($this->getFakedEmail());

        return $result;
    }

    /**
     * Generating fake email
     * @return string
     */
    protected function getFakedEmail()
    {
        return $this->generateRandomString(rand(5, 15)) . '@'
            . $this->generateRandomString(rand(3, 15)) . '.com';
    }

    /**
     * Generate random string
     * @param int $length
     * @return string
     */
    protected function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
