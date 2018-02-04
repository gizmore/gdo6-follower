<?php /** @var $follower GDO\Follower\GDO_Follower **/
use GDO\UI\GDT_Button;
use GDO\UI\GDT_Menu;
use GDO\User\GDO_User;
$mode = $user === $follower->getUser() ? 1 : 2;

echo $follower->getOther(GDO_User::current())->displayNameLabel();

if ($mode === 2)
{
	echo GDT_Menu::make()->addFields(array(
		GDT_Button::make('btn_unfollow')->href(href('Follower', 'Unfollow', "&id={$user->getID()}")),
	))->render();
}
