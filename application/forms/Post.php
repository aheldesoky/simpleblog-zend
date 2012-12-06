<?php
class Form_Post extends Zend_Form
{
	public function init()
	{
		$this->setName('Posts');
		
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('Your Name')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->removeValidator($name)
				->addValidator('NotEmpty');
		
		$title = new Zend_Form_Element_Text('title');
		$title->setLabel('Title')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty')
				->setAttrib('size', '64');
		
		$description = new Zend_Form_Element_Textarea('description');
		$description->setLabel('Description')
				->setRequired(true)
				->setAttrib('rows',20)
				->setAttrib('cols',50)
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
		
		$this->addElements( array( $name, $title, $description, $submit ));
	}
}