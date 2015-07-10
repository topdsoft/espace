<?php
App::uses('AppController', 'Controller');
/**
 * Sessions Controller
 *
 * @property Session $Session
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SessionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Session->recursive = 0;
		$this->set('sessions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Session->exists($id)) {
			throw new NotFoundException(__('Invalid session'));
		}
		$options = array('conditions' => array('Session.' . $this->Session->primaryKey => $id));
		$this->set('session', $this->Session->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Session->create();
			if ($this->Session->save($this->request->data)) {
				$this->Session->setFlash(__('The session has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The session could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Session->Course->find('list');
		$this->set(compact('courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Session->exists($id)) {
			throw new NotFoundException(__('Invalid session'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Session->save($this->request->data)) {
				$this->Session->setFlash(__('The session has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The session could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Session.' . $this->Session->primaryKey => $id));
			$this->request->data = $this->Session->find('first', $options);
		}
		$courses = $this->Session->Course->find('list');
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
		$this->Session->id = $id;
		if (!$this->Session->exists()) {
			throw new NotFoundException(__('Invalid session'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Session->delete()) {
			$this->Session->setFlash(__('The session has been deleted.'));
		} else {
			$this->Session->setFlash(__('The session could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
