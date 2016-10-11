<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Codeigniter Libraries
 * Template Load
 * 
 * @package 	Codeigniter
 * @subpackage 	Libraries
 * @category 	Libraries
 * @author 		Ramadhan Sutejo <ramadhan.sutejo@outlook.com>
 */

class Template
{

	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->library('parser');
	}

	public function frontend($content)
	{
		$template = $this->ci->parser->parse('__template/__backend/default', $content);

		$this->ci->output->set_output($template);
	}	

}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */
