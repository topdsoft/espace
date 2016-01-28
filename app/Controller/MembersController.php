<?php
App::uses('AppController', 'Controller');
/**
 * Members Controller
 *
 * @property Member $Member
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MembersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	public function beforeFilter() {
		$this->Auth->allow('editpw');
		parent::beforeFilter();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Member->recursive = 0;
		$this->set('members', $this->Paginator->paginate('Member',array('Member.active')));
	}

/**
 * export CSV
 */
	public function exportcsv() {
		$this->Member->recursive=0;
		$options=array('conditions'=>array('Member.active'),'fields'=>array('Member.email','Member.first_name','Member.last_name'));
		$members=$this->Member->find('all',$options);
		$this->set('members',$members);
		$this->response->download("members.csv");
		$this->layout='ajax';
// debug($members);exit;
//		$output = fopen('php://output', 'w');
//		fputcsv($output,array('Email Address','First','Last'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
		$this->set('member', $this->Member->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Member->create();
			$this->request->data['Member']['active']=true;
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('Success, The member has been saved.'),'default',array('class'=>'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.'));
			}
		}
		$this->request->data['Member']['access_level']=4;//default to student
		$this->request->data['Member']['mins_left']=0;
		$this->request->data['Member']['mins_left_monthly']=0;
// 		$courses = $this->Member->Course->find('list');
// 		$this->set(compact('courses'));
	}

/**
 * login method
 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash(
				__('Username or password is incorrect'),
				'default',
				array(),
				'auth'
			);
		}
		
	}

/**
 * logout method
 */
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('The member has been saved.'),'default',array('class'=>'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
			$this->request->data = $this->Member->find('first', $options);
		}
		$courses = $this->Member->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * editpw method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editpw($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('Your Password has been saved.'),'default',array('class'=>'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your password could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
			$this->request->data = $this->Member->find('first', $options);
		}
		$courses = $this->Member->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Member->save(array(
			'id'=>$id,
			'active'=>false
		))) {
			$this->Session->setFlash(__('The member has been deleted.'));
		} else {
			$this->Session->setFlash(__('The member could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * popup method
 * 
 * @param inputId id of member option box
 * @return sets value of inputId
 */

	public function popup() {
		
	}
	
}
