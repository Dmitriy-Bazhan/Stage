<?php


namespace StageModules\Links\Block\Adminhtml\Links\View\Tab;

use Magento\Backend\Block\Widget\Tabs;

class Main extends Tabs
{

    protected function _construct()
    {
        parent::_construct();
        $this->setId('added_links_index_edit_tabs');
        $this->setDestElementId('added_links_index_edit');
        $this->setTitle(__('Links view'));
    }
}
