<?php


namespace StageModules\Links\Controller\Adminhtml\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action implements HttpPostActionInterface
{
    public function execute()
    {
        die("SAVE ALL AND DIE");
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
