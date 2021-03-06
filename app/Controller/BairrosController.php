<?php
App::uses('AppController', 'Controller');
/**
 * Bairros Controller
 *
 * @property Bairro $Bairro
 * @property PaginatorComponent $Paginator
 */
class BairrosController extends AppController {

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

		$this->Bairro->recursive = 0;

		$this->Paginator->settings = array('conditions'=> array(
			'Bairro.name LIKE'=> '%'.$q_internal.'%'
			)
		);

		$this->set('bairros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bairro->exists($id)) {
			throw new NotFoundException(__('Invalid bairro'));
		}
		$options = array('conditions' => array('Bairro.' . $this->Bairro->primaryKey => $id));
		$this->set('bairro', $this->Bairro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bairro->create();
			if ($this->Bairro->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>bairro</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>bairro</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->Bairro->exists($id)) {
			throw new NotFoundException(__('Invalid bairro'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bairro->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>bairro</strong> foi editado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>bairro</strong> não pode ser editado. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));$this->Session->setFlash(__('The bairro could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bairro.' . $this->Bairro->primaryKey => $id));
			$this->request->data = $this->Bairro->find('first', $options);
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
		$this->Bairro->id = $id;
		if (!$this->Bairro->exists()) {
			throw new NotFoundException(__('Invalid bairro'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bairro->delete()) {
			$this->Session->setFlash(__('O <strong>bairro</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>bairro</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
