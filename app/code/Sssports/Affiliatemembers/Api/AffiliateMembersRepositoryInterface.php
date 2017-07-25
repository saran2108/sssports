<?php


namespace Sssports\Affiliatemembers\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface AffiliateMembersRepositoryInterface
{


    /**
     * Save affiliate_members
     * @param \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface $affiliateMembers
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function save(
        \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface $affiliateMembers
    );

    /**
     * Retrieve affiliate_members
     * @param string $affiliateMembersId
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getById($affiliateMembersId);

    /**
     * Retrieve affiliate_members matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete affiliate_members
     * @param \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface $affiliateMembers
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function delete(
        \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface $affiliateMembers
    );

    /**
     * Delete affiliate_members by ID
     * @param string $affiliateMembersId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function deleteById($affiliateMembersId);
}
