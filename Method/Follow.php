<?php
namespace GDO\Follower\Method;

use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Follower\GDO_Follower;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\User\GDO_User;

final class Follow extends MethodForm
{
	public function createForm(GDT_Form $form)
	{
		$follow = GDO_Follower::table();
		$form->addFields(array(
			$follow->gdoColumn('follow_following'),
// 			$follow->gdoColumn('follow_user')->initialValue(GDO_User::current()),
			GDT_Submit::make(),
			GDT_AntiCSRF::make(),
		));
	}
	
	public function formValidated(GDT_Form $form)
	{
		
	}
	
}
