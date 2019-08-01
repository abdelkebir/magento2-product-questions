<?php

namespace Godogi\ProductQuestions\Controller\Adminhtml\Question;

use Godogi\ProductQuestions\Controller\Adminhtml\Question;

class Edit extends Question
{
	/**
	* @return void
	*/
	public function execute()
	{
		$questionId = $this->getRequest()->getParam('entity_id');
		/** @var \Godogi\ProductQuestions\Model\Question $model */
		$model = $this->_questionFactory->create();
		if ($questionId) {
			$model->load($questionId);
			if (!$model->getId()) {
				$this->messageManager->addError(__('This question no longer exists.'));
				$this->_redirect('*/*/');
				return;
			}
		}
		// Restore previously entered form data from session
		$data = $this->_session->getQuestionData(true);
		if (!empty($data)) {
			$model->setData($data);
		}
		$this->_coreRegistry->register('godogi_productquestions_question', $model);
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu('Godogi_ProductQuestions::content_productquestions');
		$resultPage->getConfig()->getTitle()->prepend(__('Question'));
		return $resultPage;
	}
}
