<?php


namespace StageModules\Links\Controller\Links;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use mysql_xdevapi\Exception;

class AddLink extends Action
{
    /**
     * AddLink constructor.
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $connect = new \PDO('mysql:dbname=stage;host=db;', 'root', 'dev01');
        $query = "SELECT * FROM cms_page";
        try {
            $result = $connect->query($query);
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
        }

        echo '<pre>';
        var_dump($result->fetchAll(\PDO::FETCH_ASSOC));

        echo '</pre><br><br><br><br><br><h1>I need this page to training</h1>';
        die();
    }

}
