<?php
/**
 * Add to wait list
 *
 * @category Forms
 * @package Forms
 */
class Forms_Cabinet_Support_Spend extends Acro_Form_Ajax
{

	protected $byItems = true;

    	protected $model = 'Support_Request_Spend';


	/**
	 * Custom form decorators
	 * 
	 * @var array
	 */
	protected $decorators = array (
		'FormElements',
		'Form'
	) ;

	/**
	 * Setting form fields
	 * 
	 * @var array
	 */
	protected $fields = array(
        	'prize_id' => array('type'=>'Acro_Form_Element_Hidden_Standart', 'required'=>false),
        	'price_request' => array('type'=>'Acro_Form_Element_Hidden_Standart', 'required'=>false),
		'submit' => array('type'=>'Acro_Form_Element_Submit_Login', 'label'=>''),
	);
	
	/**
	 * init method
	 */
	public function init(){
        $this->setControllerName('support');
        self::$defaultAction = 'spend';
        parent::init();
	}
	


    /**
     * Get error messages
     *
     * @return array
     */
    public function getErrorMessages() {
        $hasErrors = false;
        $errorData = array();
        foreach ( $this->getElements () as $element ) {
            $errors = '';
            foreach ( $element->getMessages () as $error ) {
                $hasErrors = true;
                $errorData['errors'][$element->getId()][] =  $error;
            }
        }
        return Zend_Json_Encoder::encode($errorData);
    }
}
