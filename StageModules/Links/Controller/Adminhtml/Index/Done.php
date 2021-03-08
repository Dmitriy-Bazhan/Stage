<?php


namespace StageModules\Links\Controller\Adminhtml\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Done extends Action
{
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        echo '<pre>';
        var_dump($post);
        die("SAVE ALL AND DIE");
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
