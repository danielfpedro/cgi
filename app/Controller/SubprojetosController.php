<?php
App::uses('AppController', 'Controller');
/**
 * Subprojetos Controller
 *
 * @property Subprojeto $Subprojeto
 * @property PaginatorComponent $Paginator
 */
class SubprojetosController extends AppController {

public $layout = 'BootstrapAdmin.default';	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$this->Subprojeto->recursive = 0;
		$this->set('subprojetos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subprojeto->exists($id)) {
			throw new NotFoundException(__('Invalid subprojeto'));
		}
		$options = array('conditions' => array('Subprojeto.' . $this->Subprojeto->primaryKey => $id));
		$this->set('subprojeto', $this->Subprojeto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subprojeto->create();
			if ($this->Subprojeto->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>subprojeto</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>subprojeto</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->Subprojeto->exists($id)) {
			throw new NotFoundException(__('Invalid subprojeto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subprojeto->save($this->request->data)) {
				$this->Session->setFlash(__('The subprojeto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subprojeto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subprojeto.' . $this->Subprojeto->primaryKey => $id));
			$this->request->data = $this->Subprojeto->find('first', $options);
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
		$this->Subprojeto->id = $id;
		if (!$this->Subprojeto->exists()) {
			throw new NotFoundException(__('Invalid subprojeto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subprojeto->delete()) {
			$this->Session->setFlash(__('O <strong>subprojeto</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>subprojeto</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
