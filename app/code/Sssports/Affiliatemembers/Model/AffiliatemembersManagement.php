<?php


namespace Sssports\Affiliatemembers\Model;

class AffiliatemembersManagement
{

    /**
     * {@inheritdoc}
     */
    public function getList()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $request = $objectManager->create('\Magento\Framework\App\RequestInterface');
        $affiliate = $objectManager->create('\Sssports\Affiliatemembers\Model\AffiliateMembers');
        $collection = $affiliate->getCollection();
        if(count($request->getParams()) == 0){
            $response = $this->getAllAffiliates($collection);
          
        }else{
            $filterParams = $request->getParams();
            $response = $this->getFilteredAffiliates($collection, $filterParams['searchCriteria']['filterGroups'][0]['filters']);
        }
        
        return $response;
    }
    /**
     * {@inheritdoc}
     */
    private function getFilteredAffiliates($collection, $filterOptions){
        $value=$filterOptions[0]['value'];
        if($value=='enabled' || $value==1){
            $value=1;
        }else if($value=='disabled' || $value==0){
            $value=0;
        }else{
            $value=$value;
        }
        $collection->addFieldToFilter($filterOptions[0]['field'],$value);
        return $collection->getData();
    }
    /**
     * {@inheritdoc}
     */
    private function getAllAffiliates($collection){
        return $collection->getData();
    }
}
