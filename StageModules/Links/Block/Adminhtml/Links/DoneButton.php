<?php

namespace StageModules\Links\Block\Adminhtml\Links;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Backend\Block\Widget\Context;
use Magento\Ui\Component\Control\Container;

class DoneButton
{
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
        $this->urlBuilder = $context->getUrlBuilder();
    }

    public function getButtonData()
    {
        $linkId = $this->getLinkId();

        $path = '';
        if (!is_null($linkId)) {

            $path = 'link_id/' . $linkId . '/';
        }
        $data = [
            'label' => __('Done'),
            'class' => 'save primary',
            'on_click' => sprintf("location.href = '%s';", $this->context->getUrlBuilder()->getUrl('added_links/index/done/' . $path)),
            'sort_order' => 20,
        ];
        return $data;
    }

    public function getLinkId()
    {
        if (isset($_SESSION['link_id']) && !empty($_SESSION['link_id'])) {
            return $_SESSION['link_id'];
        } else {
            return null;
        }
//        return $this->registry->registry(LinksIdRegistry::CURRENT_LINK_ID);
    }
}
