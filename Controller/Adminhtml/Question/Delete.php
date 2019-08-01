<?php
namespace Godogi\ProductQuestions\Controller\Adminhtml\Question;

use Godogi\ProductQuestions\Controller\Adminhtml\Question;

class Delete extends Question
{
	/**
	* @return void
	*/
	public function execute()
	{
		$questionId = (int) $this->getRequest()->getParam('entity_id');
		if ($questionId) {
			/** @var $questionModel \Godogi\ProductQuestions\Model\Question */
			$questionModel = $this->_questionFactory->create();
			$questionModel->load($questionId);
			// Check this question exists or not
			if (!$questionModel->getQuestionId()) {
				$this->messageManager->addError(__('This question no longer exists.'));
			} else {
				try {
  					// Delete question
  					$questionModel->delete();
  					$this->messageManager->addSuccess(__('The question has been deleted.'));
  					// Redirect to grid page
  					$this->_redirect('*/*/');
  					return;
				} catch (\Exception $e) {
  					$this->messageManager->addError($e->getMessage());
  					$this->_redirect('*/*/edit', ['entity_id' => $questionModel->getQuestionId()]);
				}
			}
		}
	}
}
