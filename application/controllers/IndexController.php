<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$postModel = new Model_Post();
    	
    	$page = $this->_request->getParam('page');
    	if (empty($page)) { $page = 1; }
    	
    	$paginator = $postModel->getPosts($page);
    	$this->view->paginator = $paginator;
    }

    public function viewAction()
    {
    	$postId = $this->getRequest()->getParam('id');
    	$postModel = new Model_Post();
    	$post = $postModel->getPost($postId)->toArray();

    	$commentForm = new Form_Comment($postId);
    	$commentModel = new Model_Comment();
    	
    	if ($this->getRequest()->isPost()) {
    		$commentData = $this->getRequest()->getParams();
    		
    		if ($commentForm->isValid($commentData)) {
    			$commentModel = new Model_Comment();
    			$commentModel->addComment($commentData);
    			$this->_redirect("index/view/id/$postId");
    		}
    	}
    	
    	$comments = $commentModel->getComments($postId);
    	
    	$this->view->comments = $comments;
    	$this->view->post = $post;
    	$this->view->commentForm = $commentForm;
    }
    
    public function addAction()
    {
    	$postForm = New Form_Post();
    	if ($this->getRequest()->isPost()) {
    		$postData = $this->getRequest()->getParams();
    		
    		if ($postForm->isValid($postData)) {
    			$postModel = new Model_Post();
    			$postModel->addPost($postData);
    			// setting cookie
    			//setcookie('user_post_id', $postData['post_id'], time() + 3600, '/');
    				
    			$this->_redirect('index');
    		}
    	}
    	$this->view->postForm = $postForm;
    }
    
    public function editAction()
    {
    	$postForm = New Form_Post();
    	$postForm->name->setAttrib('disabled', 'disabled')->setRequired(false);
    	
    	$postId = $this->getRequest()->getParam('id');
    	$postModel = new Model_Post();
    	$post = $postModel->getPost($postId)->toArray();
    	
    	$postForm->populate($post);
    	
    	if ($this->getRequest()->isPost()) {
    		$postData = $this->getRequest()->getParams();
    		
    		if ($postForm->isValid($postData)) {
    			$postModel = new Model_Post();
    			$postModel->updatePost($postData);
    			// setting cookie
    			// setcookie('user_post_id', $postData['post_id'], time() + 3600, '/');
    			
    			$this->_redirect("index/view/id/$postId");
    		}
    	}
    	$this->view->postForm = $postForm;
    }
    
    public function deleteAction()
    {
    	$postId = $this->getRequest()->getParam('id');
    	$postModel = new Model_Post();
    	$postModel->deletePost($postId);    		
    }

}

