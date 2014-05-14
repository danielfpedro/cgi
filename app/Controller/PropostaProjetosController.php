<?php
App::uses('AppController', 'Controller');
/**
 * PropostaProjetos Controller
 *
 * @property PropostaProjeto $PropostaProjeto
 * @property PaginatorComponent $Paginator
 */
class PropostaProjetosController extends AppController {

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
		$this->PropostaProjeto->recursive = 0;
		$this->set('propostaProjetos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PropostaProjeto->exists($id)) {
			throw new NotFoundException(__('Invalid proposta projeto'));
		}
		$options = array('conditions' => array('PropostaProjeto.' . $this->PropostaProjeto->primaryKey => $id));
		$this->set('propostaProjeto', $this->PropostaProjeto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PropostaProjeto->create();
			if ($this->PropostaProjeto->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>proposta projeto</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>proposta projeto</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->PropostaProjeto->exists($id)) {
			throw new NotFoundException(__('Invalid proposta projeto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PropostaProjeto->save($this->request->data)) {
				$this->Session->setFlash(__('The proposta projeto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The proposta projeto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PropostaProjeto.' . $this->PropostaProjeto->primaryKey => $id));
			$this->request->data = $this->PropostaProjeto->find('first', $options);
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
		$this->PropostaProjeto->id = $id;
		if (!$this->PropostaProjeto->exists()) {
			throw new NotFoundException(__('Invalid proposta projeto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PropostaProjeto->delete()) {
			$this->Session->setFlash(__('O <strong>proposta projeto</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>proposta projeto</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
