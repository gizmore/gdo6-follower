<?php
namespace GDO\Follower;
use GDO\Core\GDO_Module;
use GDO\DB\GDT_Checkbox;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
/**
 * Manage followers.
 * 
 * @author gizmore
 * @since 6.07
 * @version 6.07
 */
final class Module_Follower extends GDO_Module
{
	##############
	### Module ###
	##############
	public function getClasses()
	{
		return array(
			'GDO\Follower\GDO_Follower',
		);
	}
	
	##############
	### Config ###
	##############
	public function getUserSettings()
	{
		return array(
			GDT_Checkbox::make('follow_user_allow_guest')->initial('1'),
			GDT_Checkbox::make('follow_user_auto_accept')->initial('1'),
		);
	}

	public function getConfig()
	{
		return array(
			GDT_Checkbox::make('follow_allow_guest')->initial('0'),
		);
	}
	public function cfgAllowGuestFollows() { return $this->getConfigValue('follow_allow_guest'); }
	
	#############
	### Hooks ###
	#############
	public function hookRightBar(GDT_Bar $bar)
	{
		$bar->addField(GDT_Link::make('link_followers')->href(href('Follower', 'Followers')));
	}
	
}
