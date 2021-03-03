<?php


namespace StageModules\Links\Block\Adminhtml\Links\View\Tab;

use Magento\Backend\Block\Widget\Tab\TabInterface;
use \Magento\Framework\View\Element\Text\ListText;

class Relative extends ListText implements TabInterface
{
    public function getTabLabel()
    {
        return __('Relative');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Relative');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}
