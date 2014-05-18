<?php
App::uses('AppController', 'Controller');
/**
 * StatusProjetos Controller
 *
 * @property StatusProjeto $StatusProjeto
 * @property PaginatorComponent $Paginator
 */
class StatusProjetosController extends AppController {

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
		
		$q_internal = str_replace(' ', '%', $this->request->query['q']);

		$this->StatusProjeto->recursive = 0;

		$this->Paginator->settings = array('conditions'=> array(
			'StatusProjeto.name LIKE'=> '%'.$q_internal.'%'
			)
		);

		$this->set('statusProjetos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusProjeto->exists($id)) {
			throw new NotFoundException(__('Invalid status projeto'));
		}
		$options = array('conditions' => array('StatusProjeto.' . $this->StatusProjeto->primaryKey => $id));
		$this->set('statusProjeto', $this->StatusProjeto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusProjeto->create();
			if ($this->StatusProjeto->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>status do projeto</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>status do projeto</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->StatusProjeto->exists($id)) {
			throw new NotFoundException(__('Invalid status projeto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusProjeto->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>status do projeto</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>status do projeto</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StatusProjeto.' . $this->StatusProjeto->primaryKey => $id));
			$this->request->data = $this->StatusProjeto->find('first', $options);
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
		$this->StatusProjeto->id = $id;
		if (!$this->StatusProjeto->exists()) {
			throw new NotFoundException(__('Invalid status projeto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StatusProjeto->delete()) {
			$this->Session->setFlash(__('O <strong>status projeto</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>status projeto</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
