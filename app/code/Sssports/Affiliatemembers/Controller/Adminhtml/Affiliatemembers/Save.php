<?php


namespace Sssports\Affiliatemembers\Controller\Adminhtml\Affiliatemembers;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        //print_r($data);die;
        if ($data) {
            $id = $this->getRequest()->getParam('affiliate_members_id');
        
            $model = $this->_objectManager->create('Sssports\Affiliatemembers\Model\AffiliateMembers')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Affiliate Members no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            $data=$this->imageSave($data);
            //print_r($data);die;
            $model->setData($data);
        
            try {
                
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Affiliate Members.'));
                $this->dataPersistor->clear('sssports_affiliatemembers_affiliate_members');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['affiliate_members_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Affiliate Members.'));
            }
        
            $this->dataPersistor->set('sssports_affiliatemembers_affiliate_members', $data);
            return $resultRedirect->setPath('*/*/edit', ['affiliate_members_id' => $this->getRequest()->getParam('affiliate_members_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
    
    public function imageSave($data){
        $this->adapterFactory = $this->_objectManager->create('Magento\Framework\Image\AdapterFactory');
        $this->uploader = $this->_objectManager->create('Magento\MediaStorage\Model\File\UploaderFactory');
        $this->filesystem = $this->_objectManager->create('Magento\Framework\Filesystem');
        $fields = array('profile_image');
        foreach($fields as $imageField){
            if (isset($data[$imageField]) && isset($data[$imageField][0]['name']) && strlen($data[$imageField][0]['name'])) 
            {
                try 
                {
                    $data[$imageField] = $data[$imageField][0]['name'];
                }catch (\Exception $e) 
                {
                    $this->messageManager->addError($e->getMessage() . "--" . $data[$imageField]);
                }
            } 
            else 
            {
                if (isset($data[$imageField]) && isset($data[$imageField]['value'])) 
                {
                    if (isset($data[$imageField]['delete'])) 
                    {
                        $data[$imageField] = null;
                        $data['delete_image'] = true;
                    } 
                    elseif (isset($data[$imageField]['value'])) 
                    {
                        $data[$imageField] = $data[$imageField]['value'];
                    } 
                    else 
                    {
                        $data[$imageField] = null;
                    }
                }
            }
        }
        return $data;
    }
}
