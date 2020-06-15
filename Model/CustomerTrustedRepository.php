<?php

namespace Mxp100\TestModule\Model;

use Magento\Customer\Model\ResourceModel\Customer\Collection as CustomerCollection;
use Magento\Framework\App\ObjectManager;
use Mxp100\TestModule\Api\CustomerTrustedInterface;

class CustomerTrustedRepository implements CustomerTrustedInterface
{

    /**
     * Getting trusted customers
     * @inheritDoc
     */
    public function get()
    {
        $objectManager = ObjectManager::getInstance();
        $customerObj = $objectManager->create(CustomerCollection::class);
        $customer = $customerObj->addAttributeToSelect('*')
            ->addAttributeToFilter('is_trusted_customer', 1)
            ->load();
        return $customer->getData();
    }
}
