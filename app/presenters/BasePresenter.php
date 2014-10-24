<?php

namespace App\Presenters;

use Kdyby\Facebook as Fb;
use Kdyby\Facebook\Facebook;
use Nette;
use Tracy\Debugger;



/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	/**
	 * @var Facebook
	 * @inject
	 */
	public $facebook;



	/**
	 * @return Fb\Dialog\LoginDialog
	 */
	protected function createComponentFbLogin()
	{
		$dialog = $this->facebook->createDialog('login');
		/** @var Fb\Dialog\LoginDialog $dialog */

		$dialog->onResponse[] = function (Fb\Dialog\LoginDialog $dialog) {
			$fb = $dialog->getFacebook();

			if (!$fb->getUser()) {
				$this->flashMessage("Sorry bro, facebook authentication failed.");

				return;
			}

			/**
			 * If we get here, it means that the user was recognized
			 * and we can call the Facebook API
			 */

			try {
				$me = $fb->api('/me');

				/**
				 * Nette\Security\User accepts not only textual credentials,
				 * but even an identity instance!
				 */
				$this->user->login(new \Nette\Security\Identity($me->id, [], (array) $me));

				/**
				 * You can celebrate now! The user is authenticated :)
				 */

			} catch (Fb\FacebookApiException $e) {
				/**
				 * You might wanna know what happened, so let's log the exception.
				 *
				 * Rendering entire bluescreen is kind of slow task,
				 * so might wanna log only $e->getMessage(), it's up to you
				 */
				Debugger::log($e, 'facebook');
				$this->flashMessage("Sorry bro, facebook authentication failed hard.");
			}

			$this->redirect('this');
		};

		return $dialog;
	}



	public function handleLogout()
	{
		$this->user->logout(TRUE);
		$this->redirect('this');
	}

}
