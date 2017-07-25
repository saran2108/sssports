<?php


namespace Sssports\Affiliatemembers\Model\ResourceModel;

class AffiliateMembers extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('sssports_affiliate_members', 'affiliate_members_id');
    }
}
