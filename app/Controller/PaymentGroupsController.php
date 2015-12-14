<?php
App::uses('AppController', 'Controller');
/**
 * PaymentGroups Controller
 *
 * @property PaymentGroup $PaymentGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PaymentGroupsController extends AppController {

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
		$this->PaymentGroup->recursive = 0;
		$this->set('paymentGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PaymentGroup->exists($id)) {
			throw new NotFoundException(__('Invalid payment group'));
		}
		$options = array('conditions' => array('PaymentGroup.' . $this->PaymentGroup->primaryKey => $id));
		$this->set('paymentGroup', $this->PaymentGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PaymentGroup->create();
			if ($this->PaymentGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The payment group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment group could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PaymentGroup->exists($id)) {
			throw new NotFoundException(__('Invalid payment group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PaymentGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The payment group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PaymentGroup.' . $this->PaymentGroup->primaryKey => $id));
			$this->request->data = $this->PaymentGroup->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PaymentGroup->id = $id;
		if (!$this->PaymentGroup->exists()) {
			throw new NotFoundException(__('Invalid payment group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PaymentGroup->delete()) {
			$this->Session->setFlash(__('The payment group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The payment group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
