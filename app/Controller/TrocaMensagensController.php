<?php
App::uses('AppController', 'Controller');
/**
 * TrocaMensagens Controller
 *
 * @property TrocaMensagem $TrocaMensagem
 * @property PaginatorComponent $Paginator
 */
class TrocaMensagensController extends AppController {

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
	public function index($indicacao_id = null) {
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TrocaMensagem->save($this->request->data)) {
			} else {
				$this->Session->flash('Ocorreu um erro ao enviar a sua mensagem', 'default', array('class'=> 'alert alert-danger'));
			}
			$this->redirect($this->referer());
		}
		
		$indicacao = $this->TrocaMensagem->Indicacao->find('first', array('conditions'=> array('Indicacao.id'=> $indicacao_id)));

		$this->TrocaMensagem->recursive = 3;
		$this->Paginator->settings = array(
			'TrocaMensagem'=> array(
				'conditions'=> array('Indicacao.id' => $indicacao_id),
				'order'=> 'TrocaMensagem.created DESC')
			);

		$this->set('trocaMensagens', $this->Paginator->paginate());

		$this->set(compact('indicacao'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TrocaMensagem->exists($id)) {
			throw new NotFoundException(__('Invalid troca mensagem'));
		}
		$options = array('conditions' => array('TrocaMensagem.' . $this->TrocaMensagem->primaryKey => $id));
		$this->set('trocaMensagem', $this->TrocaMensagem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TrocaMensagem->create();
			if ($this->TrocaMensagem->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>troca mensagem</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>troca mensagem</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$usuarios = $this->TrocaMensagem->Usuario->find('list');
		$indicacoes = $this->TrocaMensagem->Indicacao->find('list');
		$this->set(compact('usuarios', 'indicacoes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TrocaMensagem->exists($id)) {
			throw new NotFoundException(__('Invalid troca mensagem'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TrocaMensagem->save($this->request->data)) {
				$this->Session->setFlash(__('The troca mensagem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The troca mensagem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TrocaMensagem.' . $this->TrocaMensagem->primaryKey => $id));
			$this->request->data = $this->TrocaMensagem->find('first', $options);
		}
		$usuarios = $this->TrocaMensagem->Usuario->find('list');
		$indicacoes = $this->TrocaMensagem->Indicacao->find('list');
		$this->set(compact('usuarios', 'indicacoes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TrocaMensagem->id = $id;
		if (!$this->TrocaMensagem->exists()) {
			throw new NotFoundException(__('Invalid troca mensagem'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TrocaMensagem->delete()) {
			$this->Session->setFlash(__('O <strong>troca mensagem</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>troca mensagem</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
