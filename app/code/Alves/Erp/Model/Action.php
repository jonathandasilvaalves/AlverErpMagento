<?php
namespace Alves\Erp\Model;

class Action extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'alves_erp_actions';
	protected $_cacheTag = 'alves_erp_actions';
	protected $_eventPrefix = 'alves_erp_actions';

	protected $csvProcessor;
	protected $store_manager;

	public function __construct(
		\Magento\Store\Model\StoreManagerInterface $store_manager,
		\Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
	) {
		parent::__construct($context, $registry, $resource, $resourceCollection, $data);
		$this->store_manager = $store_manager;
	}

	protected function _construct()
	{
		$this->_init('Alves\Erp\Model\ResourceModel\Action');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];
		return $values;
	}

	public function save() {
		$now = new \DateTime();
		if(empty($this->getId()) && empty($this->getCreatedAt())) {
			$this->setCreatedAt($now);
		}
		if($this->getWebsiteId() === null) {
			$store = $this->store_manager->getStore(true);
			$this->setWebsiteId($store->getWebsiteId());
		}
		$this->setUpdatedAt($now);
		return parent::save();
	}
}