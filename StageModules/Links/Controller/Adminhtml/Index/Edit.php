<?php

namespace StageModules\Links\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use StageModules\Links\Controller\LinksIdRegistry;
//use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;

class Edit extends Action
{
    public function __construct(Context $context, \Magento\Framework\Registry $coreRegistry)
    {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
    }

    public function execute()
    {

        $this->initCurrentLink();
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }


    protected function initCurrentLink()
    {
        $linkId = (int)$this->getRequest()->getParam('link_id');

//        if ($linkId) {
//            $this->_coreRegistry->register(LinksIdRegistry::CURRENT_LINK_ID, $linkId);
//        }
        $_SESSION['link_id'] = $linkId;

        return $linkId;
    }
}
