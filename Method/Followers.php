<?php
namespace GDO\Follower\Method;
use GDO\Table\MethodQueryList;
use GDO\Follower\GDO_Follower;
use GDO\User\GDT_User;
use GDO\User\GDO_User;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\Core\GDT_Response;
/**
 * List all followers for a user.
 * 
 * @author gizmore
 * @version 6.07
 */
final class Followers extends MethodQueryList
{
	public function gdoTable()
	{
		return GDO_Follower::table();
	}

	public function gdoParameters()
	{
		return array(
			GDT_User::make('id')->initial(GDO_User::current()->getID()),
		);
	}
	
	public function getQuery()
	{
		$uid = $this->gdoParameterValue('id')->getID();
		return GDO_Follower::table()->select('*')->where("follow_following=$uid");
	}
	
	public function execute()
	{
		$tabs = GDT_Bar::make()->horizontal();
		$tabs->addFields(array(
			GDT_Link::make('link_follow')->href(href('Follower', 'Follow'))->icon('add'),
			GDT_Link::make('link_following')->href(href('Follower', 'Following'))->icon('list'),
		));
		return GDT_Response::makeWith($tabs, parent::execute());
	}
}
