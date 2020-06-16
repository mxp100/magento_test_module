<?php

namespace Mxp100\TestModule\Observer;

use Magento\Customer\Model\Customer;
use Magento\Customer\Model\ResourceModel\Customer as CustomerResourceModel;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\AlreadyExistsException;

/**
 * Customer registration success observer
 * Class CustomerRegisterSuccess
 * @package Mxp100\TestModule\Observer
 */
class CustomerRegisterSuccess implements ObserverInterface
{

    protected $resourceModel;

    /**
     * CustomerRegisterSuccess constructor.
     * @param CustomerResourceModel $resourceModel
     */
    public function __construct(
        CustomerResourceModel $resourceModel
    ) {
        $this->resourceModel = $resourceModel;
    }

    /**
     * Observer handler
     * @inheritDoc
     * @throws AlreadyExistsException
     */
    public function execute(Observer $observer)
    {
        /** @var Customer $customer */
        $customer = $observer->getEvent()->getCustomer();

        $customerEmail = $customer->getEmail();
        // fill is trusted data by criteria
        if (mb_substr($customerEmail, 0, 1) === 'r') {
            $customer->setData('is_trusted_customer', 1);
            $this->resourceModel->save($customer);
        }
    }
}
