<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/** Key library made by MrGate (Randall Perkins)
 *	Under GPLv3
 *	Version 0.1
 */

class Key {

	/**
	 * CodeIgniter Super Global Object
	 * 
	 * @access protected
	 * @var object
	 */
	protected $CI;

	/**
	 * Key pattern
	 * 
	 * @access protected
	 * @var string
	 */
	protected $key_pattern = 'XX99-XX99-99XX-XXXX-99XX';

	/**
	 * Class Construct
	 *
	 * Executed during the "setup" of this class
	 *
	 * @access public
	 */
	public function __construct() 
	{			
		$this->CI =& get_instance();
		
		log_message('debug', 'Key library loaded');
	}


	/**
	 * Generate the Key
	 *
	 * @access public
	 * @param string $template
	 */
	public function generate_key($template = NULL)
	{
		if($template == NULL) { $template = $this->key_pattern; }
		$num = strlen($template);
		$sernum = '';
		for($i=0; $i < $num; $i++)
		{
			switch($template[$i])
			{
				case 'X': $sernum .= chr(rand(65,90)); break;
				case '9': $sernum .= rand(0,9); break;
				case '-': $sernum .= '-'; break;
			}
		}
		return $sernum;
	}

}