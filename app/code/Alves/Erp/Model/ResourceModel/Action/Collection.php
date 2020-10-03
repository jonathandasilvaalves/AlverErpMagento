<?php
namespace Alves\Erp\Model\ResourceModel\Action;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'alves_action_collection';
	protected $_eventObject = 'action_collection';

	protected function _construct()
	{
		$this->_init('Alves\Erp\Model\Action', 'Alves\Erp\Model\ResourceModel\Action');
	}
}