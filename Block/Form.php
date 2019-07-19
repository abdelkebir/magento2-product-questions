<?php
namespace Godogi\ProductQuestions\Block;
class Form extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function getTutoTxt()
  {
    return 'This ising!';
  }

  /**
   * Returns action url for contact form
   *
   * @return string
   */
  public function getFormAction()
  {
      return $this->getUrl('productquestions/index/post', ['_secure' => true]);
  }
}
