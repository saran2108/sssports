<?php


namespace Sssports\Affiliatemembers\Api\Data;

interface AffiliateMembersSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get affiliate_members list.
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface[]
     */
    
    public function getItems();

    /**
     * Set name list.
     * @param \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface[] $items
     * @return $this
     */
    
    public function setItems(array $items);
}
