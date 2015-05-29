<?php
App::uses('DropzoneUploadsController', 'Dropzone.Controller');

/**
 * DropzoneUploadsController Test Case
 *
 */
class DropzoneUploadsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.dropzone.dropzone_upload',
		'plugin.dropzone.meta',
		'plugin.dropzone.node',
		'plugin.dropzone.user',
		'plugin.dropzone.role'
	);

}
