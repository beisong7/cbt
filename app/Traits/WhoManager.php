<?php

namespace App\Traits;

trait WhoManager
{
	/**
	 * Different levels of who
	 *
	 * @var
	 */
	public $SECURITY = 0;
	public $STAFF = 1;
	public $ADMIN = 2;
	public $ADMINMANAGER = 3;
	public $SUPERADMIN = 4;

}