<?php
App::uses('AppController', 'Controller');
/**
 * Partidos Controller
 *
 * @property Partido $Partido
 * @property PaginatorComponent $Paginator
 */
class PartidosController extends AppController {

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
		$this->Partido->recursive = 0;
		$this->Paginator->settings = array('conditions'=> array(
			'or'=> array(
				'Partido.name LIKE'=> '%'.$q_internal.'%',
				'Partido.sigla LIKE'=> '%'.$q_internal.'%',
				)
			)
		);
		$this->set('partidos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Partido->exists($id)) {
			throw new NotFoundException(__('Invalid partido'));
		}
		$options = array('conditions' => array('Partido.' . $this->Partido->primaryKey => $id));
		$this->set('partido', $this->Partido->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Partido->create();
			if ($this->Partido->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>partido</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>partido</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
				return $this->redirect(array('action' => 'add'));
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
		if (!$this->Partido->exists($id)) {
			throw new NotFoundException(__('Partido inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Partido->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>partido</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>partido</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
				return $this->redirect(array('action' => 'edit'));
			}
		} else {
			$options = array('conditions' => array('Partido.' . $this->Partido->primaryKey => $id));
			$this->request->data = $this->Partido->find('first', $options);
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
		$this->Partido->id = $id;
		if (!$this->Partido->exists()) {
			throw new NotFoundException(__('Invalid partido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Partido->delete()) {
			$this->Session->setFlash(__('O <strong>partido</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>partido</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
