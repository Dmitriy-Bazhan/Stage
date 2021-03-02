<?php


namespace StageModules\Links\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Delete extends Action
{
    public function execute()
    {
        die('Delete');
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);

//        $this->_view->loadLayout();
//        $this->_view->renderLayout();
    }
}
