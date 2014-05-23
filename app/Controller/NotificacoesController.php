<?php
App::uses('AppController', 'Controller');
/**
 * Notificacoes Controller
 *
 * @property Notificacao $Notificacao
 * @property PaginatorComponent $Paginator
 */
class NotificacoesController extends AppController {

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
		$this->Notificacao->recursive = 0;
		$this->set('notificacoes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Notificacao->exists($id)) {
			throw new NotFoundException(__('Invalid notificacao'));
		}
		$options = array('conditions' => array('Notificacao.' . $this->Notificacao->primaryKey => $id));
		$this->set('notificacao', $this->Notificacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Notificacao->create();
			if ($this->Notificacao->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>notificacao</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>notificacao</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$usuarios = $this->Notificacao->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Notificacao->exists($id)) {
			throw new NotFoundException(__('Invalid notificacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Notificacao->save($this->request->data)) {
				$this->Session->setFlash(__('The notificacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notificacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Notificacao.' . $this->Notificacao->primaryKey => $id));
			$this->request->data = $this->Notificacao->find('first', $options);
		}
		$usuarios = $this->Notificacao->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Notificacao->id = $id;
		if (!$this->Notificacao->exists()) {
			throw new NotFoundException(__('Invalid notificacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Notificacao->delete()) {
			$this->Session->setFlash(__('O <strong>notificacao</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>notificacao</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
