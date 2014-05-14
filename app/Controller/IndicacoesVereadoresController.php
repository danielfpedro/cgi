<?php
App::uses('AppController', 'Controller');
/**
 * IndicacoesVereadores Controller
 *
 * @property IndicacoesVereador $IndicacoesVereador
 * @property PaginatorComponent $Paginator
 */
class IndicacoesVereadoresController extends AppController {

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
		$this->IndicacoesVereador->recursive = 0;
		$this->set('indicacoesVereadores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IndicacoesVereador->exists($id)) {
			throw new NotFoundException(__('Invalid indicacoes vereador'));
		}
		$options = array('conditions' => array('IndicacoesVereador.' . $this->IndicacoesVereador->primaryKey => $id));
		$this->set('indicacoesVereador', $this->IndicacoesVereador->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IndicacoesVereador->create();
			if ($this->IndicacoesVereador->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>indicacoes vereador</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>indicacoes vereador</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->IndicacoesVereador->exists($id)) {
			throw new NotFoundException(__('Invalid indicacoes vereador'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IndicacoesVereador->save($this->request->data)) {
				$this->Session->setFlash(__('The indicacoes vereador has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The indicacoes vereador could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('IndicacoesVereador.' . $this->IndicacoesVereador->primaryKey => $id));
			$this->request->data = $this->IndicacoesVereador->find('first', $options);
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
		$this->IndicacoesVereador->id = $id;
		if (!$this->IndicacoesVereador->exists()) {
			throw new NotFoundException(__('Invalid indicacoes vereador'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->IndicacoesVereador->delete()) {
			$this->Session->setFlash(__('O <strong>indicacoes vereador</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>indicacoes vereador</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
