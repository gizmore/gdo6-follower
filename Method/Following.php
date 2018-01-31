<?php
namespace GDO\Follower\Method;

use GDO\Table\MethodQueryList;
use GDO\Follower\GDO_Follower;
use GDO\User\GDT_User;
use GDO\User\GDO_User;

final class Following extends MethodQueryList
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
	
	public function gdoQuery()
	{
		$uid = $this->gdoParameter('id')->getParameterValue()->getID();
		return GDO_Follower::table()->query()->select('*')->where("follow_following=$uid AND follow_status='accepted'");
	}
	
}
