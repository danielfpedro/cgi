<?php
App::uses('AppController', 'Controller');
/**
 * Secretarias Controller
 *
 * @property Secretaria $Secretaria
 * @property PaginatorComponent $Paginator
 */
class SecretariasController extends AppController {

	public $layout = 'BootstrapAdmin.default';	

	public function ranking_list() {
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$secretarias = $this->Paginator->paginate();
		// Debugger::dump($vereadores);
		// exit();
		$this->set(compact('secretarias'));
	}

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
		$this->Secretaria->recursive = 0;

		$this->Paginator->settings = array('conditions'=> array(
			'Secretaria.name LIKE'=> '%'.$q_internal.'%'
			)
		);

		$this->set('secretarias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Secretaria->exists($id)) {
			throw new NotFoundException(__('Invalid secretaria'));
		}
		$options = array('conditions' => array('Secretaria.' . $this->Secretaria->primaryKey => $id));
		$this->set('secretaria', $this->Secretaria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Secretaria->create();
			if ($this->Secretaria->save($this->request->data)) {
				$this->Session->setFlash(__('A <strong>secretaria</strong> foi salva com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A <strong>secretaria</strong> não pode ser salva. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
				return $this->redirect(array('action' => 'add'));
			}
		}
		$usuarios = $this->Secretaria->Usuario->find('list');
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
		if (!$this->Secretaria->exists($id)) {
			throw new NotFoundException(__('Secretaria inválida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Secretaria->save($this->request->data)) {
				$this->Session->setFlash(__('A <strong>secretaria</strong> foi editada com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A <strong>secretaria</strong> não pode ser editada. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Secretaria.' . $this->Secretaria->primaryKey => $id));
			$this->request->data = $this->Secretaria->find('first', $options);
		}
		$usuarios = $this->Secretaria->Usuario->find('list');
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
		$this->Secretaria->id = $id;
		if (!$this->Secretaria->exists()) {
			throw new NotFoundException(__('Invalid secretaria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Secretaria->delete()) {
			$this->Session->setFlash(__('A <strong>secretaria</strong> foi deletaao com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('A <strong>secretaria</strong> não pode ser deletada, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
