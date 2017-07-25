<?php


namespace Sssports\Affiliatemembers\Model;

use Sssports\Affiliatemembers\Api\AffiliateMembersRepositoryInterface;
use Sssports\Affiliatemembers\Model\ResourceModel\AffiliateMembers\CollectionFactory as AffiliateMembersCollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Sssports\Affiliatemembers\Api\Data\AffiliateMembersSearchResultsInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Store\Model\StoreManagerInterface;
use Sssports\Affiliatemembers\Model\ResourceModel\AffiliateMembers as ResourceAffiliateMembers;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\SortOrder;
use Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterfaceFactory;
//class AffiliateMembersRepository implements affiliate\membersRepositoryInterface
class AffiliateMembersRepository
{

    protected $resource;

    protected $dataObjectHelper;

    protected $affiliateMembersFactory;

    protected $searchResultsFactory;

    protected $dataAffiliateMembersFactory;

    private $storeManager;

    protected $dataObjectProcessor;

    protected $affiliateMembersCollectionFactory;


    /**
     * @param ResourceAffiliateMembers $resource
     * @param AffiliateMembersFactory $affiliateMembersFactory
     * @param AffiliateMembersInterfaceFactory $dataAffiliateMembersFactory
     * @param AffiliateMembersCollectionFactory $affiliateMembersCollectionFactory
     * @param AffiliateMembersSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceAffiliateMembers $resource,
        AffiliateMembersFactory $affiliateMembersFactory,
        AffiliateMembersInterfaceFactory $dataAffiliateMembersFactory,
        AffiliateMembersCollectionFactory $affiliateMembersCollectionFactory,
        AffiliateMembersSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->affiliateMembersFactory = $affiliateMembersFactory;
        $this->affiliateMembersCollectionFactory = $affiliateMembersCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataAffiliateMembersFactory = $dataAffiliateMembersFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface $affiliateMembers
    ) {
        /* if (empty($affiliateMembers->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $affiliateMembers->setStoreId($storeId);
        } */
        try {
            $affiliateMembers->getResource()->save($affiliateMembers);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the affiliateMembers: %1',
                $exception->getMessage()
            ));
        }
        return $affiliateMembers;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($affiliateMembersId)
    {
        $affiliateMembers = $this->affiliateMembersFactory->create();
        $affiliateMembers->getResource()->load($affiliateMembers, $affiliateMembersId);
        if (!$affiliateMembers->getId()) {
            throw new NoSuchEntityException(__('affiliate_members with id "%1" does not exist.', $affiliateMembersId));
        }
        return $affiliateMembers;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->affiliateMembersCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface $affiliateMembers
    ) {
        try {
            $affiliateMembers->getResource()->delete($affiliateMembers);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the affiliate_members: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($affiliateMembersId)
    {
        return $this->delete($this->getById($affiliateMembersId));
    }
}
