<?php

namespace Mxp100\TestModule\Model;

use Magento\Customer\Model\ResourceModel\Customer\Collection as CustomerCollection;
use Magento\Customer\Model\ResourceModel\Customer\Collection\Interceptor;
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
        /** @var Interceptor $customer */
        $customer = $customerObj
            ->addAttributeToFilter('is_trusted_customer', 1)
            ->load();
        return $customer->getAllIds();
    }
}
