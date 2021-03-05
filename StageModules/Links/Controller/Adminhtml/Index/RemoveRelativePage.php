<?php


namespace StageModules\Links\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class RemoveRelativePage extends Action
{
    public function execute()
    {
        die('Remove');
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);

    }
}

