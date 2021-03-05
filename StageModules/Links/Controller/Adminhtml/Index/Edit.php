<?php

namespace StageModules\Links\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use StageModules\Links\Controller\LinksIdRegistry;
//use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;

class Edit extends Action
{
//    protected $_coreRegistry;

    public function __construct(Context $context)
    {
//        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    public function execute()
    {
//        $model = $this->_objectManager->create(\StageModules\Links\Model\Link::class);
//        $this->_coreRegistry->register('cms_link', $model);

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
