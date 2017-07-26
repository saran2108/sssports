<?php


namespace Sssports\Affiliatemembers\Api;

interface AffiliatemembersManagementInterface
{


    /**
     * GET for affiliatemembers api
     * @param string $param
     * @return string
     */
    
    public function getAffiliatemembers();
    
    /**
     * Retrieve affiliate_members matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getList();
}
