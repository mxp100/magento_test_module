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
        // bad practice
        // https://devdocs.magento.com/guides/v2.4/extension-dev-guide/object-manager.html#overview

        $customerObj = $objectManager->create(CustomerCollection::class);
        $customer = $customerObj->addAttributeToSelect('*')
            ->addAttributeToFilter('is_trusted_customer', 1)
            ->load();
        // unhandled exception

        return $customer->getData();
        // заданием было вернуть массив из id пользователей.
        // здесь возвращается даже не модели, а просто набор атрибутов
    }
}
