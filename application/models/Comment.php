<?php

class Model_Comment extends Zend_Db_Table_Abstract {
    
    protected $_name = 'comment';
    
    public function addComment($commentData) {
        // create a new row
        $rowComment = $this->createRow();
        if($rowComment) {
            // update the row values
            $rowComment->commenter = $commentData['commenter'];
            $rowComment->email = $commentData['email'];
            $rowComment->comment = $commentData['comment'];
            $rowComment->post_id = $commentData['postId'];
            
            $rowComment->save();
            //return added comment
            return $rowComment;
        } else {
            throw new Zend_Exception("Could not add comment!");
        }
    }
    
    public function getComments($postId) {
    	$select = $this->select();
    	$select->where("post_id=$postId");
    	return $this->fetchAll($select);
    }
    

}