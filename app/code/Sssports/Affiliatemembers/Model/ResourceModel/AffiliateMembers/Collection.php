<?php


namespace Sssports\Affiliatemembers\Model\ResourceModel\AffiliateMembers;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Sssports\Affiliatemembers\Model\AffiliateMembers',
            'Sssports\Affiliatemembers\Model\ResourceModel\AffiliateMembers'
        );
    }
}
