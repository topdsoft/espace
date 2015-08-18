<?php
App::uses('AppController', 'Controller');
/**
 * Logins Controller
 *
 * @property Login $Login
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LoginsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	public function beforeFilter() {
		$this->Auth->allow('add');
		parent::beforeFilter();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Login->recursive = 0;
		$this->set('logins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Login->exists($id)) {
			throw new NotFoundException(__('Invalid login'));
		}
		$options = array('conditions' => array('Login.' . $this->Login->primaryKey => $id));
		$this->set('login', $this->Login->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//check for scan code
			$member=$this->Login->Member->find('first',array('conditions'=>array('Member.barcode_hash'=>$this->request->data['Login']['scan'])));
//debug($member);
//debug($this->request->data);//exit();

			$this->set('member',$member);
			if($member) {
				//look up last login
				$lastLogin=$this->Login->find('first',array(
					'conditions'=>array('Login.member_id'=>$member['Member']['id']),
					'order'=>array('Login.time_in'=>'desc'),
				));
				$this->set("lastLogin",$lastLogin);
			}//endif
//			unset($this->request->data['Login']['scan']);
			if(isset($this->request->data['Login']['confirm'])) {
				//confirming scan
				if($this->request->data['Login']['confirm']==$this->request->data['Login']['scan']) {
					//confirms user
					$this->request->data['Login']['member_id']=$member['Member']['id'];
					if($lastLogin && $lastLogin['Login']['time_out']==null) {
						//logging out
						$this->request->data['Login']['time_out']=date("Y-m-d H:i:s");
						$this->request->data['Login']['id']=$lastLogin['Login']['id'];
					} else {
						//logging in
						$this->request->data['Login']['time_in']=date("Y-m-d H:i:s");
					}//endif
					if($this->Login->save($this->request->data)) {
						//saved ok
						$this->redirect(array('action'=>'add'));
					} else {
						//error
					}//endif
				} else {
					//incorrect user
				}//endif
			}//endif
/*
			$this->Login->create();
			if ($this->Login->save($this->request->data)) {
				$this->Session->setFlash(__('The login has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The login could not be saved. Please, try again.'));
			}//*/
		}
//		$members = $this->Login->Member->find('list');
//		$this->set(compact('members'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Login->exists($id)) {
			throw new NotFoundException(__('Invalid login'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Login->save($this->request->data)) {
				$this->Session->setFlash(__('The login has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The login could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Login.' . $this->Login->primaryKey => $id));
			$this->request->data = $this->Login->find('first', $options);
		}
		$members = $this->Login->Member->find('list');
		$this->set(compact('members'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Login->id = $id;
		if (!$this->Login->exists()) {
			throw new NotFoundException(__('Invalid login'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Login->delete()) {
			$this->Session->setFlash(__('The login has been deleted.'));
		} else {
			$this->Session->setFlash(__('The login could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
