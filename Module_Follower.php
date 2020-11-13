<?php
namespace GDO\Follower;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Link;
use GDO\User\GDO_User;
use GDO\DB\GDT_Checkbox;
use GDO\UI\GDT_Page;

/**
 * Manage followers.
 * This module does not use any templates at all.
 * If you need changes do a pull request for hooks and config.
 * 
 * @author gizmore
 * @since 6.10
 * @version 6.07
 */
final class Module_Follower extends GDO_Module
{
	##############
	### Module ###
	##############
	public function getClasses()
	{
		return [
		    GDO_Follower::class,
		];
	}
	
	public function onLoadLanguage() { return $this->loadLanguage('lang/follower'); }
	
	public function getConfig()
	{
	    return [
	        GDT_Checkbox::make('hook_right_bar')->initial('1'),
	    ];
	}
	public function cfgHookRightBar() { return $this->getConfigValue('hook_right_bar'); }
	

	#############
	### Hooks ###
	#############
	public function onInitSidebar()
	{
// 	    if ($this->cfgHookRightBar())
	    {
    		if (GDO_User::current()->isAuthenticated())
    		{
    		    $bar = GDT_Page::$INSTANCE->rightNav;
    			$bar->addField(GDT_Link::make('link_followers')->href(href('Follower', 'Followers')));
    		}
	    }
	}
	
}
