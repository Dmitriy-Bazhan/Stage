<?php


namespace StageModules\Links\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use StageModules\Links\Controller\LinksIdRegistry;
use Magento\Framework\Registry;


class Index extends Action
{
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
