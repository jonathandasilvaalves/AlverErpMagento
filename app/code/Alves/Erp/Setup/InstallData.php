<?php

namespace Alves\Erp\Setup;


class InstallData implements \Magento\Framework\Setup\InstallDataInterface {

	public function install(
		\Magento\Framework\Setup\ModuleDataSetupInterface $setup, 
		\Magento\Framework\Setup\ModuleContextInterface $context
	) {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('alves_erp_actions')) {
            $table = $setup->getConnection()->newTable($setup->getTable('alves_erp_actions'))
                        ->addColumn(
                            'id',
                            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                            null,
                            [
                              'identity' => true,
                              'nullable' => false,
                              'primary' => true,
                              'unsigned' => true,
                            ],
                            'Entity ID'
                        )->addColumn(
                            'website_id',
                            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                            null,
                            ['nullable' => false],
                            'Website ID'
                        )->addColumn(
                            'order_id',
                            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                            null,
                            ['nullable' => false],
                            'Order ID'
                        )->addColumn(
                            'updated_at',
                            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                            null,
                            [],
                            'Updated At'
                        )->addColumn(
                            'created_at',
                            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                            null,
                            [],
                            'Created At'
                        );
            $setup->getConnection()->createTable($table);
        }
        $installer->endSetup();
	}
}