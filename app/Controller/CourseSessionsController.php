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
 * course_id passed arg to pre-select course_id
 * time passed arg for default time and date
 * 
 * @return void
 */
	public function add() {
		//check for course_id passed parameter
//debug($this->passedArgs);
		if(isset($this->passedArgs['course_id'])) {
			//course_id has been passed
			$course=$this->CourseSession->Course->find('first',array('conditions'=>array('Course.id'=>$this->passedArgs['course_id'])));
			if($course){
				//course id is valid
				$this->request->data['CourseSession']['course_id']=$this->passedArgs['course_id'];
				$this->set('course',$course);
// debug($course);exit;
			}//endif
		}//endif
		if(isset($this->passedArgs['time'])) $this->request->data['CourseSession']['time']=$this->passedArgs['time'];
		if ($this->request->is('post')) {
			$this->CourseSession->create();
			if ($this->CourseSession->save($this->request->data)) {
				$this->Session->setFlash(__('The course session has been saved.'),'default',array('class'=>'success'));
				return $this->redirect(array('controller'=>'courses','action' => 'view',$this->request->data['CourseSession']['course_id']));
			} else {
				$this->Session->setFlash(__('The course session could not be saved. Please, try again.'));
			}
		} else {
			//default
			if(isset($this->passedArgs['course_id'])) {
				//insure course_id has been passed
				$s = $this->CourseSession->find('first',array('order'=>'CourseSession.id desc','conditions'=>array('course_id'=>$this->passedArgs['course_id'])));
				if($s) $this->request->data['CourseSession']['time']=$s['CourseSession']['time'];
			}//endif
		}//endif 
		$courses = $this->CourseSession->Course->find('list',array('conditions'=>array('Course.completed'=>false)));
		$this->set(compact('courses'));
	}

/**
 * smartadd method
 *
 * course_id passed arg to pre-select course_id
 * 
 * @return void
 */
	public function smartadd() {
		//check for course_id passed parameter
//debug($this->passedArgs);
		if(isset($this->passedArgs['course_id'])) {
			//course_id has been passed
			$course=$this->CourseSession->Course->find('first',array('conditions'=>array('Course.id'=>$this->passedArgs['course_id'])));
			if($course){
				//course id is valid
				$this->request->data['CourseSession']['course_id']=$this->passedArgs['course_id'];
				$this->set('course',$course);
// debug($course);exit;
			}//endif
		}//endif
		
		if ($this->request->is('post')) {
		} else {
			//build upcomming calendar of courses
			$weeks=12; //#of weeks to display
			$totalDays=$weeks*7;
			$nextDate=strtotime('sunday last week');
			$calanderArray=array();//one element for each day
			for($w=0; $w<$weeks; $w++) {//loop for weeks
				for($d=0; $d<7; $d++) {
					//loop for each day in week
					$calanderArray[$w][$d]['date']=$nextDate;
					$nextDate=strtotime('+ 1 day',$nextDate);//get date form last date +1 day
					$calanderArray[$w][$d]['outputDate']=date('D M j',$calanderArray[$w][$d]['date']);
					$calanderArray[$w][$d]['sqlDate']=date('Y-m-d 18:00:00',$calanderArray[$w][$d]['date']);
					//find courses for this date
					$calanderArray[$w][$d]['Courses']=$this->CourseSession->find('all',
						array('recursive'=>0,
						'fields'=>array('Course.name','Course.id'),
						'conditions'=>array('date(CourseSession.time)'=>date('Y-m-d',$calanderArray[$w][$d]['date']))));
				}//next d
			}//next w
			$this->set('calanderArray',$calanderArray);
//debug(date('Y-m-d',$nextDate)); debug($calanderArray);exit();
		}//endif ispost
	}//end public function smartadd
	
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
				$this->Session->setFlash(__('The course session has been updated.'),'default',array('class'=>'success'));
				if(isset($this->passedArgs['redirect'])) return $this->redirect($this->passedArgs['redirect']);
				return $this->redirect(array('controller'=>'courses','action' => 'index'));
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
