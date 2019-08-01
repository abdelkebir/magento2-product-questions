<?php
namespace Godogi\ProductQuestions\Controller\Adminhtml\Question;

use Godogi\ProductQuestions\Controller\Adminhtml\Question;

class Save extends Question
{
	/**
	* @return void
	*/
	public function execute()
	{
		$isPost = $this->getRequest()->getPost();
		if ($isPost) {
			$questionModel = $this->_questionFactory->create();
			$questionId = $this->getRequest()->getParam('entity_id');
			if ($questionId) {
				$questionModel->load($questionId);
			}
			$formData = $this->getRequest()->getParam('question');
			$questionModel->setData($formData);

			try {
				// Save news
				$questionModel->save();
				// Display success message
				$this->messageManager->addSuccess(__('The question has been saved.'));
				// Check if 'Save and Continue'
				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', ['entity_id' => $questionModel->getQuestionId(), '_current' => true]);
					return;
				}
				// Go to grid page
				$this->_redirect('*/*/');
				return;
			} catch (\Exception $e) {
				$this->messageManager->addError($e->getMessage());
			}
			$this->_getSession()->setFormData($formData);
			$this->_redirect('*/*/edit', ['entity_id' => $questionId]);
		}
	}
}
