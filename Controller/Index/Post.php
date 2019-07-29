<?php
namespace Godogi\ProductQuestions\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Godogi\ProductQuestions\Model\QuestionFactory;

class Post extends \Magento\Framework\App\Action\Action
{
    /**
    * Question model factory
    *
    * @var QuestionFactory
    */
    protected $_questionFactory;

    /**
    * Result factory
    *
    * @var ResultFactory
    */
    protected $_resultFactory;


    /**
     * @param Context $context
     * @param QuestionFactory $questionFactory
     */
    public function __construct(
        Context $context,
        QuestionFactory $questionFactory,
        ResultFactory $resultFactory
    ) {
        parent::__construct($context);
        $this->_questionFactory = $questionFactory;
        $this->_resultFactory = $resultFactory;
    }

    /**
     * Post user question
     *
     * @return Redirect
     */
    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }


        $resultRedirect = $this->_resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        try {
            $postData = $this->getRequest()->getPostValue();

            $questionModel = $this->_questionFactory->create();
            $questionModel->setData($postData);

            $questionModel->save();
            $this->messageManager->addSuccessMessage(
                __('Thanks for your question, we will respond very soon to it.')
            );
            return $resultRedirect;
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
            $this->messageManager->addErrorMessage(
                $e->getMessage()
            );

            return $resultRedirect;
        }
    }
}
