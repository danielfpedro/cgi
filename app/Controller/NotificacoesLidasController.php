<?php
App::uses('AppController', 'Controller');
/**
 * NotificacoesLidas Controller
 *
 * @property NotificacoesLida $NotificacoesLida
 * @property PaginatorComponent $Paginator
 */
class NotificacoesLidasController extends AppController {

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
		$this->NotificacoesLida->recursive = 0;
		$this->set('notificacoesLidas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->NotificacoesLida->exists($id)) {
			throw new NotFoundException(__('Invalid notificacoes lida'));
		}
		$options = array('conditions' => array('NotificacoesLida.' . $this->NotificacoesLida->primaryKey => $id));
		$this->set('notificacoesLida', $this->NotificacoesLida->find('first', $options));
	}

	public function add_ajax() {
		$this->NotificacoesLida->save(array('usuario_id'=> $this->Auth_usuario_id, 'last_view'=> date("Y-m-d H:i:s")));
		$this->autoRender = false;
	}

/**
 * add method
 *
 * @return void
 */

	public function add() {
		if ($this->request->is('post')) {
			$this->NotificacoesLida->create();
			if ($this->NotificacoesLida->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>notificacoes lida</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>notificacoes lida</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$usuarios = $this->NotificacoesLida->Usuario->find('list');
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
		if (!$this->NotificacoesLida->exists($id)) {
			throw new NotFoundException(__('Invalid notificacoes lida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->NotificacoesLida->save($this->request->data)) {
				$this->Session->setFlash(__('The notificacoes lida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notificacoes lida could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('NotificacoesLida.' . $this->NotificacoesLida->primaryKey => $id));
			$this->request->data = $this->NotificacoesLida->find('first', $options);
		}
		$usuarios = $this->NotificacoesLida->Usuario->find('list');
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
		$this->NotificacoesLida->id = $id;
		if (!$this->NotificacoesLida->exists()) {
			throw new NotFoundException(__('Invalid notificacoes lida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->NotificacoesLida->delete()) {
			$this->Session->setFlash(__('O <strong>notificacoes lida</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>notificacoes lida</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
