<?php

namespace StageModules\Links\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;
use \Magento\Framework\App\ObjectManager;

class Save extends Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
//        $params = $this->getRequest()->getParams();
//        echo 'PARAMS : <br>';
//        var_dump($params);
//        echo 'POST : <br>';
//        var_dump($post);
//        die();

        $resultRedirect = $this->resultRedirectFactory->create();
        $path = '*/*/edit';
        if ($post) {
            try {

                $rowData = $this->_objectManager->create('StageModules\Links\Model\Link');
                $rowData->setData($post['link']);

                if (isset($post['link']['link_id'])) {
                    $rowData->setEntityId($post['link']['link_id']);
                    $path = $path . '/link_id/' . $post['link']['link_id'] . '/';
                } else {
                    $objectManager = ObjectManager::getInstance();
                    $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')
                        ->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
                    $query = 'SELECT link_id FROM cms_added_link ORDER BY link_id DESC LIMIT 1';
                    $id = $connection->fetchAll($query);
                    $path = $path . '/link_id/' . ++$id[0]['link_id'] . '/';
                }
                $rowData->save();

                $this->messageManager->addSuccess(__('Link has been successfully saved.'));
            } catch (Exception $e) {
                $this->messageManager->addError(__($e->getMessage()));
            }
        }
        return $resultRedirect->setPath($path);
    }
}
