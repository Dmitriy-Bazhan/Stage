<?php


namespace StageModules\Links\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Link extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('cms_added_link', 'link_id');
    }
}



