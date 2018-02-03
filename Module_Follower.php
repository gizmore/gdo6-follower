<?php
namespace GDO\Follower;
use GDO\Core\GDO_Module;
use GDO\DB\GDT_Checkbox;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\User\GDO_User;
/**
 * Manage followers.
 * This module does not use any templates at all.
 * If you need changes do a pull request for hooks and config.
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

	#############
	### Hooks ###
	#############
	public function hookRightBar(GDT_Bar $bar)
	{
		if (GDO_User::current()->isAuthenticated())
		{
			$bar->addField(GDT_Link::make('link_followers')->href(href('Follower', 'Followers')));
		}
	}
	
}
