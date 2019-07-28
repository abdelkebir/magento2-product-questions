<?php
namespace Godogi\ProductQuestions\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		if (!$setup->tableExists('godogi_productquestions')){
			$table = $setup->getConnection()->newTable($setup->getTable('godogi_productquestions'))
			->addColumn(
				'entity_id',
				Table::TYPE_INTEGER,
				null,
				['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
				'Question Id')
      ->addColumn(
  				'name',
  				Table::TYPE_TEXT,
  				200,
  				[],
  				'Name')
      ->addColumn(
  				'email',
  				Table::TYPE_TEXT,
  				200,
  				[],
  				'Email')
      ->addColumn(
				'question',
				Table::TYPE_TEXT,
				500,
				[],
				'Question')
			->addColumn(
				'answer',
				Table::TYPE_TEXT,
				2000,
				[],
				'Answer')
      ->addColumn(
        'status',
        \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
        null,
        [],
        'Status')
      ->addColumn(
				'ip_address',
				Table::TYPE_TEXT,
				200,
				[],
				'IP Address')
      ->addColumn(
        'store_id',
        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
        null,
        [],
        'Store ID')
      ->addColumn(
        'product_id',
        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
        null,
        [],
        'Product ID')
			->addColumn(
				'created_at',
				Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
				'Created At')
			->addColumn(
				'updated_at',
				Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
				'Updated At')
			->setComment('Questions and Answers');
			$setup->getConnection()->createTable($table);
		}
		$setup->endSetup();
	}
}
