<?php


namespace Sssports\Affiliatemembers\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table_sssports_affiliate_members = $setup->getConnection()->newTable($setup->getTable('sssports_affiliate_members'));

        
        $table_sssports_affiliate_members->addColumn(
            'affiliate_members_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
        );
        

        
        $table_sssports_affiliate_members->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'name'
        );
        

        
        $table_sssports_affiliate_members->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
            null,
            [],
            'status'
        );
        

        
        $table_sssports_affiliate_members->addColumn(
            'profile_image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'profile_image'
        );
        

        
        $table_sssports_affiliate_members->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['default' => 'CURRENT_TIMESTAMP'],
            'created_at'
        );
        

        
        $table_sssports_affiliate_members->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['default' => 'CURRENT_TIMESTAMP'],
            'updated_at'
        );
        

        $setup->getConnection()->createTable($table_sssports_affiliate_members);

        $setup->endSetup();
    }
}
