<?php
/**
 * LoginFixture
 *
 */
class LoginFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'time_in' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'time_out' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'member_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'time_in' => '2015-07-10 15:01:04',
			'time_out' => '2015-07-10 15:01:04',
			'member_id' => 1
		),
	);

}
