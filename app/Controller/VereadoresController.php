<?php
App::uses('AppController', 'Controller');
/**
 * Vereadores Controller
 *
 * @property Vereador $Vereador
 * @property PaginatorComponent $Paginator
 */
class VereadoresController extends AppController {

	public $layout = 'BootstrapAdmin.default';	

	public function ranking_list() {
		$vereadores = $this->Paginator->paginate();
		// Debugger::dump($vereadores);
		// exit();
		$this->set(compact('vereadores'));
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
		$this->Vereador->recursive = 0;
		$this->set('vereadores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vereador->exists($id)) {
			throw new NotFoundException(__('Invalid vereador'));
		}
		$options = array('conditions' => array('Vereador.' . $this->Vereador->primaryKey => $id));
		$this->set('vereador', $this->Vereador->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vereador->create();
			if ($this->Vereador->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>vereador</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>vereador</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$partidos = $this->Vereador->Partido->find('list');
		$indicacoes = $this->Vereador->Indicacao->find('list');
		$this->set(compact('partidos', 'indicacoes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Vereador->exists($id)) {
			throw new NotFoundException(__('Invalid vereador'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vereador->save($this->request->data)) {
				$this->Session->setFlash(__('The vereador has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vereador could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vereador.' . $this->Vereador->primaryKey => $id));
			$this->request->data = $this->Vereador->find('first', $options);
		}
		$partidos = $this->Vereador->Partido->find('list');
		$indicacoes = $this->Vereador->Indicacao->find('list');
		$this->set(compact('partidos', 'indicacoes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Vereador->id = $id;
		if (!$this->Vereador->exists()) {
			throw new NotFoundException(__('Invalid vereador'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vereador->delete()) {
			$this->Session->setFlash(__('O <strong>vereador</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>vereador</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function getAtivos_ajax($q = null) {
		$vereadores = array();
		$vereadores = $this->Vereador->find('all', array('Vereador.ativo'=> 1));
		echo json_encode($vereadores);
		$this->autoRender = false;
	}

}
