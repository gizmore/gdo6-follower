<?php
namespace GDO\Follower;

use GDO\Core\GDO;
use GDO\User\GDT_User;
use GDO\DB\GDT_CreatedAt;
use GDO\Core\GDT_Template;
use GDO\User\GDO_User;

final class GDO_Follower extends GDO
{
	public function gdoCached() { return false; }
	
	public function gdoColumns()
	{
		return array(
			GDT_User::make('follow_user')->notNull()->primary(),
			GDT_User::make('follow_following')->notNull()->primary(),
			GDT_CreatedAt::make('follow_created'),
		);
	}
	
	public function renderList() { return GDT_Template::php('Follower', 'list/follower.php', ['follower'=>$this]); }

	/**
	 * @return \GDO\User\GDO_User
	 */
	public function getFollower() { return $this->getValue('follow_following'); }
	public function getFollowerID() { return $this->getVar('follow_following'); }

	/**
	 * @return \GDO\User\GDO_User
	 */
	public function getUser() { return $this->getValue('follow_user'); }
	public function getUserID() { return $this->getVar('follow_user'); }
	
	/**
	 * @param GDO_User $user
	 * @return \GDO\User\GDO_User
	 */
	public function getOther(GDO_User $user) { return $this->getUserID() === $user->getID() ? $this->getFollower() : $this->getUser(); }

}
