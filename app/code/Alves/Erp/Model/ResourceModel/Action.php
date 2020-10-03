<?php
namespace Alves\Erp\Model\ResourceModel;

class Action extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}

	protected function _construct()
	{
		$this->_init('alves_erp_actions', 'id');
	}
}