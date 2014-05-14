<?php
App::uses('AppController', 'Controller');
/**
 * StatusIndicacoes Controller
 *
 * @property StatusIndicacao $StatusIndicacao
 * @property PaginatorComponent $Paginator
 */
class StatusIndicacoesController extends AppController {

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
		$this->StatusIndicacao->recursive = 0;
		$this->set('statusIndicacoes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusIndicacao->exists($id)) {
			throw new NotFoundException(__('Invalid status indicacao'));
		}
		$options = array('conditions' => array('StatusIndicacao.' . $this->StatusIndicacao->primaryKey => $id));
		$this->set('statusIndicacao', $this->StatusIndicacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusIndicacao->create();
			if ($this->StatusIndicacao->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>status indicacao</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>status indicacao</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->StatusIndicacao->exists($id)) {
			throw new NotFoundException(__('Invalid status indicacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusIndicacao->save($this->request->data)) {
				$this->Session->setFlash(__('The status indicacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status indicacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusIndicacao.' . $this->StatusIndicacao->primaryKey => $id));
			$this->request->data = $this->StatusIndicacao->find('first', $options);
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
		$this->StatusIndicacao->id = $id;
		if (!$this->StatusIndicacao->exists()) {
			throw new NotFoundException(__('Invalid status indicacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StatusIndicacao->delete()) {
			$this->Session->setFlash(__('O <strong>status indicacao</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>status indicacao</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
