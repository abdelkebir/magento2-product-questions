<?php
namespace Godogi\ProductQuestions\Controller\Adminhtml\Question;
use Godogi\ProductQuestions\Controller\Adminhtml\Question;
class MassDelete extends Question
{
	/**
	* @return void
	*/
	public function execute()
	{
		$collection = $this->_filter->getCollection($this->_collectionFactory->create());
		$collectionSize = $collection->getSize();
		foreach ($collection as $item) {
			try {
    			$item->delete();
			} catch (\Exception $e) {
				$this->messageManager->addError($e->getMessage());
			}
		}
		$this->messageManager->addSuccess(
			__('A total of %1 question(s) were deleted.', count($collectionSize))
		);
		$this->_redirect('*/*/index');
	}
}
