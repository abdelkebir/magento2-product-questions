<?php
namespace Godogi\ProductQuestions\Model;
class Question extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Godogi\ProductQuestions\Model\ResourceModel\Question');
	}
}
