<?php

namespace Mxp100\TestModule\Model;

use Magento\Customer\Model\ResourceModel\Customer\Collection as CustomerCollection;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\ObjectManagerInterface;
use Mxp100\TestModule\Api\CustomerTrustedInterface;

class CustomerTrustedRepository implements CustomerTrustedInterface
{

    private $objectManager;

    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Getting trusted customers
     * @inheritDoc
     */
    public function get()
    {

        $customerObj = $this->objectManager->create(CustomerCollection::class);
        $customer = $customerObj->addAttributeToSelect('*')
            ->addAttributeToFilter('is_trusted_customer', 1)
            ->load();
        return $customer->getData();
    }
}
