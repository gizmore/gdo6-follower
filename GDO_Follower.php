<?php
namespace GDO\Follower;

use GDO\Core\GDO;
use GDO\User\GDT_User;
use GDO\DB\GDT_CreatedAt;
use GDO\DB\GDT_Enum;

final class GDO_Follower extends GDO
{
	public function gdoColumns()
	{
		return array(
			GDT_User::make('follow_user')->notNull()->primary(),
			GDT_User::make('follow_following')->notNull()->primary(),
			GDT_Enum::make('follow_status')->enumValues('created', 'accepted', 'denied')->initial('created'),
			GDT_CreatedAt::make('follow_created'),
		);
	}
	
}
