<?php


namespace StageModules\Links\Block\Adminhtml\Links;

use Magento\Backend\Block\Widget\Container;
use Magento\Backend\Block\Widget\Context;

class View extends Container
{
    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }

    /**
     * Constructor
     *
     * @return void
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _construct()
    {
        parent::_construct();
//        $this->setId('links_form_view');
    }
}
