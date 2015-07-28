<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $PAYMENT_TYPES=array(
		1=>'Credit Card',
		2=>'PayPal 1 Time',
		3=>'PayPal Reacuring',
		4=>'Cash',
		5=>'Check',
	);
	var $ACCESS_TYPES=array(
		1=>'Admin',
		2=>'Full Member',
		3=>'Steward',
		4=>'Student',
		5=>'Instructor',
	);
	var $MEMBERSHIP_TYPES=array(
		0=>"(none)",
		1=>"Hourly",
		2=>"Individual Annual",
		3=>"Start-Up Annual",
		4=>"Company Annual",
		5=>"Individual 3-Month",
		6=>"Start-Up 3-Month",
		7=>"Company 3-Month",
		8=>"Individual Monthly",
		9=>"Start-Up Monthly",
		10=>"Company Monthly",
	);

	function beforeFilter() {
		$this->set('PAYMENT_TYPES', $this->PAYMENT_TYPES);
		$this->set("ACCESS_TYPES", $this->ACCESS_TYPES);
		$this->set("MEMBERSHIP_TYPES", $this->MEMBERSHIP_TYPES);
	}

}
