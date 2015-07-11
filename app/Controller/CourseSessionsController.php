<?php
App::uses('AppController', 'Controller');
/**
 * CourseSessions Controller
 *
 * @property CourseSession $CourseSession
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CourseSessionsController extends AppController {

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
		$this->CourseSession->recursive = 0;
		$this->set('courseSessions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CourseSession->exists($id)) {
			throw new NotFoundException(__('Invalid course session'));
		}
		$options = array('conditions' => array('CourseSession.' . $this->CourseSession->primaryKey => $id));
		$this->set('courseSession', $this->CourseSession->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CourseSession->create();
			if ($this->CourseSession->save($this->request->data)) {
				$this->Session->setFlash(__('The course session has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course session could not be saved. Please, try again.'));
			}
		}
		$courses = $this->CourseSession->Course->find('list');
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
		if (!$this->CourseSession->exists($id)) {
			throw new NotFoundException(__('Invalid course session'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CourseSession->save($this->request->data)) {
				$this->Session->setFlash(__('The course session has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course session could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CourseSession.' . $this->CourseSession->primaryKey => $id));
			$this->request->data = $this->CourseSession->find('first', $options);
		}
		$courses = $this->CourseSession->Course->find('list');
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
		$this->CourseSession->id = $id;
		if (!$this->CourseSession->exists()) {
			throw new NotFoundException(__('Invalid course session'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CourseSession->delete()) {
			$this->Session->setFlash(__('The course session has been deleted.'));
		} else {
			$this->Session->setFlash(__('The course session could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
