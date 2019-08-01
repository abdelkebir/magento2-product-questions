<?php
namespace Godogi\ProductQuestions\Controller\Adminhtml\Question;
use Godogi\ProductQuestions\Controller\Adminhtml\Question;
class Index extends Question
{
	public function execute()
	{
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Questions')));
		return $resultPage;
	}
}
