<?php
/**
 * Copyright (c) 2020 Institut fuer Lern-Innovation, Friedrich-Alexander-Universitaet Erlangen-Nuernberg
 * GPLv3, see docs/LICENSE
 */

include_once("./Services/COPage/classes/class.ilPageComponentPlugin.php");

/**
 * Page Component External Content plugin
 *
 * @author Jesus Copado <jesus.copado@fau.de>
 * @version $Id$
 */
class ilPCExternalContentPlugin extends ilPageComponentPlugin
{

	/**
	 * Get plugin name
	 *
	 * @return string
	 */
	function getPluginName()
	{
		return "PCExternalContent";
	}


	/**
	 * Set availability of the plugin
	 *
	 * @return string
	 */
	function isValidParentType($a_parent_type)
	{
		if (in_array($a_parent_type, array("lm")))
		{
			return true;
		}
		return false;
	}

	/**
	 * Get Javascript files
	 * @param	string	$a_mode
	 * @return 	array
	 */
	function getJavascriptFiles($a_mode = '')
	{
		return array();
	}

	/**
	 * Get css files
	 * @param	string	$a_mode
	 * @return 	array
	 */
	function getCssFiles($a_mode = '')
	{
		return array();
	}

	/**
	 * This function add the Data to the xxco_content
	 * @param $a_properties
	 */
	public static function createInDB($a_properties){
		global $ilDB;

		$ilDB->insert('xxco_data_settings', array(
			'obj_id' => array('integer', $a_properties['obj_id']),
			'type_id' => array('integer', $a_properties['type_id']),
			'availability_type' => array('integer', 0),
			'instructions' => array('text', ''),
			'meta_data_xml' => array('text', ''),
			'lp_mode' => array('integer', 0),
			'lp_threshold' => array('float', 0.5),
			'settings_id' => array('integer', $a_properties['settings_id'])
		));
	}
}
