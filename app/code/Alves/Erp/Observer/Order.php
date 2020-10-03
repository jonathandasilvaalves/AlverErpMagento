<?php

namespace Alves\Erp\Observer;

class Order implements \Magento\Framework\Event\ObserverInterface {
	protected $action;

	public function __construct(
		\Alves\Erp\Model\ActionFactory $Action
	) {
		$this->action = $Action; 
	}


    public function execute(\Magento\Framework\Event\Observer $observer) {

		$order = $observer->getEvent()->getOrder();

		$action = $this->action->create();
		$action->setOrderId($order->getIncrementId());
		$action->save();
    }
}