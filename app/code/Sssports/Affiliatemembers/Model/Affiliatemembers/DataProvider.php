<?php


namespace Sssports\Affiliatemembers\Model\Affiliatemembers;

use Sssports\Affiliatemembers\Model\ResourceModel\AffiliateMembers\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;

    protected $loadedData;
    protected $dataPersistor;


    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->_storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {
            //$this->loadedData[$model->getId()] = $model->getData();
            $itemData = $model->getData();
            $imageName = $itemData['profile_image']; // Your database field 
            if($imageName){
            unset($itemData['profile_image']);
            $itemData['profile_image'] = array(
                array(
                    'name'  =>  $imageName,
                    'url'   =>  $this->_storeManager->getStore()->getBaseUrl()."/media/catalog/tmp/category/".$imageName
                )
            );
            $this->loadedData[$model->getId()] = $itemData;
            }else{
                $this->loadedData[$model->getId()] = $itemData;
            }
            
        }
        $data = $this->dataPersistor->get('sssports_affiliatemembers_affiliate_members');
        
        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('sssports_affiliatemembers_affiliate_members');
        }
        /*
        foreach ($items as $item) {
            //$this->loadedData[$model->getId()] = $model->getData();
            $itemData = $item->getData();
            $imageName = $itemData['profile_image']; // Your database field 
            unset($itemData['image_path']);
            $itemData['image_path'] = array(
                array(
                    'name'  =>  $imageName,
                    'url'   =>  $imageUrl // Should return a URL to view the image. For example, http://domain.com/pub/media/../../imagename.jpeg
                )
            );
            $this->loadedData[$item->getItemId()] = $itemData;
        }
        */
        return $this->loadedData;
    }
}
