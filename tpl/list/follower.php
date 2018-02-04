<?php /** @var $follower GDO\Follower\GDO_Follower **/
use GDO\UI\GDT_Button;
use GDO\UI\GDT_Menu;
use GDO\User\GDO_User;
use GDO\Profile\GDT_ProfileLink;

$user = $follower->getOther(GDO_User::current());
$mode = $user === $follower->getUser() ? 1 : 2;

echo $follower->getOther(GDO_User::current())->displayNameLabel();
?>
<div class="gdt-list-item">
  <div>
    <?=GDT_ProfileLink::make()->forUser($user)->withNickname()->render()?>
  </div>
  <div class="gdt-content">
    Follows you since may
  </div>
  <div class="gdt-actions">
<?php
if ($mode === 2)
{
	echo GDT_Menu::make()->addFields(array(
		GDT_Button::make('btn_unfollow')->href(href('Follower', 'Unfollow', "&id={$user->getID()}")),
	))->render();
}
?>
  </div>
</div>
