<?php
App::uses('AppController', 'Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoursesController extends AppController {

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
		$this->Course->recursive = 0;
		$this->set('courses', $this->Paginator->paginate());
	}

/**
 * upcomming method
 *
 * @return void
 */
	public function upcoming() {
		$this->Course->recursive = 1;
		$this->Course->order=array('start_time');
		$this->set('courses', $this->Paginator->paginate(array('Course.completed'=>false)));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Course->recursive = 2;
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
		$this->set('paymentGroups', $this->Course->Payment->PaymentGroup->find('list'));
	}

/**
 * export CSV
 */
	public function exportcsv($id=null) {
//		$this->Course->Member->recursive=0;
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
//		$options=array('conditions'=>array('Member.active'));
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$course=$this->Course->find('all',$options);
		$members=$course[0]['Member'];
		$this->set('members',$members);
		$this->response->download("members.csv");
		$this->layout='ajax';
//debug($course[0]['Member']);exit;
//		$output = fopen('php://output', 'w');
//		fputcsv($output,array('Email Address','First','Last'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved.'),'default',array('class'=>'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
			}
		}
		$instructors = $this->Course->Instructor->find('list',array('conditions'=>array('active')));
		$members = $this->Course->Member->find('list',array('conditions'=>array('active')));
		$this->set(compact('instructors', 'members'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved.'),'default',array('class'=>'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
		}
		$instructors = $this->Course->Instructor->find('list',array('conditions'=>array('active')));
		$members = $this->Course->Member->find('list',array('conditions'=>array('active')));
		$this->set(compact('instructors', 'members'));
	}

/**
 * signup method
 * 
 * 
 * @throws NotFoundException
 * @param string $id  (course id OPTIONAL)
 * @param member_id passed arg
 * @return void
 */
	public function signup($id=null) {
		if($id) {
			//get course
			$course=$this->Course->read(null,$id);
			if($course) $this->request->data['CoursesMember']['course_id']=$id;
		} else $course=null;
		if(isset($this->passedArgs['member_id'])) {
			//get member
			$member=$this->Course->Member->find('first',array('conditions'=>array('Member.id'=>$this->passedArgs['member_id'])));
			if($member)$this->request->data['CoursesMember']['member_id']=$member['Member']['id'];
// debug($course);debug($member);exit;
		} else $member=null;
		$this->set('course',$course);
		$this->set('member',$member);
		$this->set('courses',$this->Course->find('list',array('conditions'=>array('not completed'))));
		$this->set('members',$this->Course->Member->find('list',array('conditions'=>array('active'))));
		if ($this->request->is(array('post', 'put'))) {
			//return from submit
			if($this->Course->CoursesMember->find('first',array('conditions'=>array(
				'member_id'=>$this->request->data['CoursesMember']['member_id'],
				'course_id'=>$this->request->data['CoursesMember']['course_id']
			)))) {
				//member is allready signed up for this class
				$this->Session->setFlash(__('Member is allready signed up for this course.'));
			} else {
				//member is not yet signed up for this course
				$this->Course->CoursesMember->create();
				if ($this->Course->CoursesMember->save($this->request->data)) {
					$this->Session->setFlash(__('Member is signed up.'),'default',array('class'=>'success'));
					return $this->redirect(array('controller'=>'payments','action' => 'add',
						'member_id'=>$this->request->data['CoursesMember']['member_id'],
						'course_id'=>$this->request->data['CoursesMember']['course_id']));
				} else {
					$this->Session->setFlash(__('Member could not be signed up. Please, try again.'));
				}//endif
			}//endif
// debug($this->request->data);exit;
		}//endif
		
	}

/**
 * removestudent method
 *
 * @throws NotFoundException
 * @param string $id is the coursesStudent id
 * @return void
 */
	public function removestudent($id = null) {
		$this->Course->CoursesMember->id = $id;
		if (!$this->Course->CoursesMember-> exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->request->allowMethod('post', 'delete');
		//find record
		$CS=$this->Course->CoursesMember->find('first',array('conditions'=>array('CoursesMember.id'=>$id)));
//debug($CS);exit();
		if ($this->Course->CoursesMember->delete()) {
			$this->Session->setFlash(__('The Student has been removed.'));
		} else {
			$this->Session->setFlash(__('The Student could not be removed. Please, try again.'));
		}
		return $this->redirect(array('action' => 'view',$CS['CoursesMember']['course_id']));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Course->delete()) {
			$this->Session->setFlash(__('The course has been deleted.'));
		} else {
			$this->Session->setFlash(__('The course could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
