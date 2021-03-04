<?php


namespace StageModules\Links\Block\Adminhtml\Links;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use StageModules\Links\Controller\LinksIdRegistry;


class SaveButton implements ButtonProviderInterface
{
    /**
     * Registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
    )
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }


    /**
     * @return array
     */
    public function getButtonData()
    {
        $linkId = $this->getLinkId();
        $data = [];
        if ($linkId) {
            $data = [
                'label' => __('Save Link'),
                'class' => 'save primary',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'save']],
                    'form-role' => 'save',
                ],
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    public function getLinkId()
    {
        if (isset($_SESSION['link_id']) && !empty($_SESSION['link_id'])) {
            return $_SESSION['link_id'];
        } else {
            return false;
        }
//        return $this->registry->registry(LinksIdRegistry::CURRENT_LINK_ID);
    }

}
