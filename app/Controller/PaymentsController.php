<?php
App::uses('AppController', 'Controller');
/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PaymentsController extends AppController {

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
		$this->Payment->recursive = 0;
		$this->set('payments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
		$this->set('payment', $this->Payment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		//check for passed member_id
		if(isset($this->passedArgs['member_id'])) {
			//validate member_id
			$member=$this->Payment->Member->find('first',array('conditions'=>array('Member.id'=>$this->passedArgs['member_id']),'recursive'=>0));
			if($member) {
				//passed member_id ok
				$this->set('member',$member);
				$this->request->data['Payment']['member_id']=$member['Member']['id'];
			}//endif
		}//endif
		//check for passed course_id
		if(isset($this->passedArgs['course_id'])) {
			//validate course_id
			$course=$this->Payment->Course->find('first',array('conditions'=>array('Course.id'=>$this->passedArgs['course_id']),'recursive'=>0));
			if($course) {
				//passed course_id ok
				$this->set('course',$course);
				$this->request->data['Payment']['course_id']=$this->passedArgs['course_id'];
			}//endif
			//set default amount for course
			$this->request->data['Payment']['amount']=$course['Course']['cost'];
		}//endif
		if ($this->request->is('post')) {
			$this->Payment->create();
// debug($this->request->data);exit;
			if ($this->Payment->save($this->request->data)) {
				$this->Session->setFlash(__('The payment has been saved.'),'default',array('class'=>'success'));
				return $this->redirect(array('action' => 'view',$this->Payment->getInsertId()));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
			}
		}
		$members = $this->Payment->Member->find('list');
		$paymentGroups = $this->Payment->PaymentGroup->find('list');
		$courses = array(0=>'(none)')+$this->Payment->Course->find('list');
		$this->set(compact('members','paymentGroups','courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Payment->save($this->request->data)) {
				$this->Session->setFlash(__('The payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
			$this->request->data = $this->Payment->find('first', $options);
		}
		$members = $this->Payment->Member->find('list');
		$paymentGroups = array(0=>'(none)')+$this->Payment->PaymentGroup->find('list');
		$this->set(compact('members','paymentGroups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Payment->id = $id;
		if (!$this->Payment->exists()) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Payment->delete()) {
			$this->Session->setFlash(__('The payment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The payment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
