<?php
namespace Godogi\ProductQuestions\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Magento\UrlRewrite\Model\UrlRewrite;
use Magento\Ui\Component\MassAction\Filter;
use Godogi\ProductQuestions\Model\QuestionFactory;
use Godogi\ProductQuestions\Model\ResourceModel\Question\CollectionFactory;
class Question extends Action
{
	/**
	* @var Filter
	*/
	protected $_filter;
	/**
	* @var UrlRewrite
	*/
	protected $_urlRewrite;
	/**
	* @var UrlRewriteFactory
	*/
	protected $_urlRewriteFactory;
	/**
	* Core registry
	*
	* @var Registry
	*/
	protected $_coreRegistry;
	/**
	* Result page factory
	*
	* @var PageFactory
	*/
	protected $_resultPageFactory;
	/**
	* Question model factory
	*
	* @var QuestionFactory
	*/
	protected $_questionFactory;
	/**
	* @var CollectionFactory
	*/
	protected $_collectionFactory;

	/**
	* @param Context $context
	* @param Registry $coreRegistry
	* @param PageFactory $resultPageFactory
	* @param QuestionFactory $questionFactory
	* @param CollectionFactory $collectionFactory
	* @param UrlRewriteFactory $urlRewriteFactory
	* @param UrlRewrite $urlRewrite
	* @param Filter $filter
	*/
	public function __construct(
		Context $context,
		Registry $coreRegistry,
		PageFactory $resultPageFactory,
		QuestionFactory $questionFactory,
		CollectionFactory $collectionFactory,
		UrlRewriteFactory $urlRewriteFactory,
		UrlRewrite $urlRewrite,
		Filter $filter
	) {
		parent::__construct($context);
		$this->_coreRegistry = $coreRegistry;
		$this->_resultPageFactory = $resultPageFactory;
		$this->_questionFactory = $questionFactory;
		$this->_collectionFactory = $collectionFactory;
		$this->_urlRewriteFactory = $urlRewriteFactory;
		$this->_urlRewrite = $urlRewrite;
		$this->_filter = $filter;
	}


	public function execute()
	{
		return true;
	}


	/**
	* Question access rights checking
	*
	* @return bool
	*/
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Godogi_ProductQuestions::questions_answers');
	}
}
