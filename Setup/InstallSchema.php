<?php

namespace Magegro\RalColor\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('ral_color')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('ral_color')
			)
				->addColumn(
					'id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Ral ID'

				)->addColumn(
					'product_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => false,
						'unsigned' => true,
						'nullable' => false,
						'primary' => false
					],
					'Product ID'
				)->addColumn(
					'ral_color_code',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					50,
					[],
					'Ral code'
				)
				->addColumn(
					'ral_color_hex',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					[],
					'ral hex '
				)->setComment(
					'Ral Color Table'
				);
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('ral_color'),
				$setup->getIdxName(
					$installer->getTable('ral_color'),
					['ral_color_code', 'ral_color_hex'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['ral_color_code', 'ral_color_hex'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}
