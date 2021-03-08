<?php


namespace StageModules\Links\Controller\Adminhtml\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends Action
{
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($post) {
            $id = isset($post['link']['link_id']) ? $post['link']['link_id'] : false;
            $title = $post['link']['title'];
            $url = $post['link']['url'];
            $enabled = $post['link']['enabled'];
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')
                                        ->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
            if ($id) {
                $query = 'UPDATE cms_added_link SET title = \'' . $title . '\', url = \'' . $url . '\' ,enabled = \'' . $enabled . '\' WHERE link_id = ' . $id;
                $connection->query($query);
                return $resultRedirect->setPath('*/*/edit', ['link_id' => $id]);
            } else {
                $query = 'INSERT INTO cms_added_link(title, url, enabled) VALUES ( \'' . $title . '\' , \'' . $url . '\', \'' . $enabled . '\')';
                $connection->query($query);
                $query = 'SELECT link_id FROM cms_added_link ORDER BY link_id DESC LIMIT 1';
                $id = $connection->fetchAll($query);
                return $resultRedirect->setPath('*/*/edit', ['link_id' => $id[0]['link_id']]);
            }
        }
        return $resultRedirect->setPath('*/*/index');
    }
}
