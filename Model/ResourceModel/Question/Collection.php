<?php
namespace Godogi\ProductQuestions\Model\ResourceModel\Question;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Godogi\ProductQuestions\Model\Question', 'Godogi\ProductQuestions\Model\ResourceModel\Question');
	}
}
