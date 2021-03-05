<?php


namespace StageModules\Links\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Page extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('cms_added_link_relative_page', 'link_id');
    }


}



