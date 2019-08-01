<?php
namespace Godogi\ProductQuestions\Controller\Adminhtml\Question;

use Godogi\ProductQuestions\Controller\Adminhtml\Question;

class Create extends Question
{
	public function execute()
	{
		$this->_forward('edit');
	}
}
