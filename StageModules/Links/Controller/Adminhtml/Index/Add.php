<?php


namespace StageModules\Links\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;


class Add extends Action
{
    public function execute()
    {
        if (isset($_SESSION['link_id']) && $_SESSION['link_id'] != null) {
            $_SESSION['link_id'] = null;
        }
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
