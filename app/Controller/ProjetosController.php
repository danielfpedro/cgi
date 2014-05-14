<?php
App::uses('AppController', 'Controller');
/**
 * Projetos Controller
 *
 * @property Projeto $Projeto
 * @property PaginatorComponent $Paginator
 */
class ProjetosController extends AppController {

	public $layout = 'BootstrapAdmin.default';	

	public function changeStatusModal($id = null) {

		$projeto = $this->Projeto->find('first', array('conditions'=> array('Projeto.id'=> $id)));
		if (!empty($projeto)) {
			if ($this->request->is(array('post', 'put'))) {
				$this->request->data['Projeto']['id'] = $id;

				if (!$this->Projeto->save($this->request->data)) {
					$this->Session->setFlash('Ocorreu um erro ao salvar o status', 'default', array('class'=> 'alert alert-danger'));
				}
				$this->redirect(array('controller'=> 'projetos', 'action'=> 'index'));
			} else {
				$this->request->data['Projeto']['status_projeto_id'] = $projeto['Projeto']['status_projeto_id'];
				$statusProjetos = $this->Projeto->StatusProjeto->find('list');
			}
			
			$this->set(compact('projeto', 'statusProjetos'));
		} else {
			$this->Session->setFlash('O projeto que você tentou trocar o status não foi encontrado.', 'default', array('class'=> 'alert alert-danger'));
			$this->redirect(array('controller'=> 'projetos', 'action'=> 'index'));
		}
		$this->layout = 'ajax';
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
		$this->Projeto->recursive = 2;
		$this->set('projetos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Projeto->exists($id)) {
			throw new NotFoundException(__('Invalid projeto'));
		}
		$options = array('conditions' => array('Projeto.' . $this->Projeto->primaryKey => $id));
		$this->set('projeto', $this->Projeto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			// $this->Projeto->recursive = -1;
			// $this->Projeto->contain = array('Indicacao'=> array('Usuario'));

			$this->Projeto->create();
			if ($this->Projeto->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>projeto</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>projeto</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$statusProjetos = $this->Projeto->StatusProjeto->find('list');
		$bairros = $this->Projeto->Bairro->find('list');
		$indicacoes = $this->Projeto->Indicacao->find('list');
		$this->set(compact('statusProjetos', 'bairros', 'indicacoes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Projeto->exists($id)) {
			throw new NotFoundException(__('Invalid projeto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Projeto->save($this->request->data)) {
				$this->Session->setFlash(__('The projeto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projeto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Projeto.' . $this->Projeto->primaryKey => $id));
			$this->request->data = $this->Projeto->find('first', $options);
		}
		$statusProjetos = $this->Projeto->StatusProjeto->find('list');
		$bairros = $this->Projeto->Bairro->find('list');
		$indicacoes = $this->Projeto->Indicacao->find('list');
		$this->set(compact('statusProjetos', 'bairros', 'indicacoes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Projeto->id = $id;
		if (!$this->Projeto->exists()) {
			throw new NotFoundException(__('Invalid projeto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Projeto->delete()) {
			$this->Session->setFlash(__('O <strong>projeto</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>projeto</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
