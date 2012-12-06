<?php
class Form_Comment extends Zend_Form
{
	public function __construct($postId)
	{
		parent::__construct($postId);
		$this->setName('Comments');
		
		$id = new Zend_Form_Element_Hidden('postId');
		$id->setValue($postId);
		
		$name = new Zend_Form_Element_Text('commenter');
		$name->setLabel('Your Name')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
		
		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('Email')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
			->addValidator('EmailAddress');
		
		$comment = new Zend_Form_Element_Textarea('comment');
		$comment->setLabel('Comment')
            ->setRequired(true)
            ->setAttrib('rows',7)
            ->setAttrib('cols',30)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
		
		//reCaptcha Element
		$publicKey = Zend_Registry::get('config')->publicKey;
		$privateKey = Zend_Registry::get('config')->privateKey;
		
		$recaptcha = new Zend_Service_ReCaptcha($publicKey, $privateKey);
		$captcha = new Zend_Form_Element_Captcha('challenge',
				array('captcha'        => 'ReCaptcha',
						'label'		   => 'Enter the following words',
						'order'		   => 3,
						'captchaOptions' => array('captcha' => 'ReCaptcha', 'service' => $recaptcha)));
		$this->addElement($captcha);
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		
		$this->addElements( array ($name, $email, $comment, $submit, $id));
	}
}