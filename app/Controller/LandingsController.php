<?php
App::uses('AppController', 'Controller');

class LandingsController extends AppController {
	public function index(){
		$this->layout = 'banglay';
	}
	public function terms(){
		$this->layout = 'banglay';
	}
	public function contribute(){
		$this->layout = 'banglay';
	}
	public function privacy_policy(){
		$this->layout = 'banglay';
	}
}
