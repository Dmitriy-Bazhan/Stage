<?php

namespace StageModules\Links\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use StageModules\Links\Controller\LinksIdRegistry;
use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;

class Edit extends Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * Edit constructor.
     * @param Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_coreRegistry = new Registry();

        $this->initCurrentLink();
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }

    /**
     * @return int
     */
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
