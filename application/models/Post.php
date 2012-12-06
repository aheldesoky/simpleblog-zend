<?php

class Model_Post extends Zend_Db_Table_Abstract {
    
    protected $_name = 'post';
    
    public function addPost($postData) {
        // create a new row
        $rowPost = $this->createRow();
        if($rowPost) {
            // update the row values
            $rowPost->name = $postData['name'];
            $rowPost->title = $postData['title'];
            $rowPost->description = $postData['description'];
            
            $rowPost->save();
            //return added post
            return $rowPost;
        } else {
            throw new Zend_Exception("Could not add post!");
        }
    }
    
    public function updatePost($postData) {
    	// create a new row
    	$data['title'] = $postData['title'];
    	$data['description'] = $postData['description'];
    	$where = "id={$postData['id']}";
    	$this->update($data, $where);
    }
    
    public function getPost($postId) {
        $select = $this->select(true);
        $select->where("id=$postId");
        
        return $this->fetchRow($select);
    }
    
    public function getPosts($page=1) {
    	$select = $this->select(true);
    	$select->order("post_date DESC");
    	
    	$paginator = new Zend_Paginator(
    			new Zend_Paginator_Adapter_DbTableSelect($select)
    	);
    	$paginator->setItemCountPerPage(5);
    	$paginator->setCurrentPageNumber($page);
    	return $paginator;
    	
    	//return $this->fetchAll($select);
    }
    
    public function deletePost($postId) {
    	return $this->delete("id=$postId");
    }

}