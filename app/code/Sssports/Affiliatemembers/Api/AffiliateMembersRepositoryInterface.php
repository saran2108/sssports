<?php


namespace Sssports\Affiliatemembers\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface AffiliateMembersRepositoryInterface
{


    /**
     * Retrieve affiliate_members matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getList();


}
