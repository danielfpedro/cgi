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
		
		$options = array();

		if (!empty($this->request->query['q'])) {
			$q = str_replace(' ', '%', $this->request->query['q']);

			$options['conditions'] = array('Projeto.titulo LIKE'=> '%'.$q.'%');
		} else {
			$this->request->query['q'] = '';
		}
		if (!empty($this->request->query['status'])) {
			
			$status = $this->request->query['status'];

			$options['conditions'] = array(
				'Projeto.status_projeto_id'=> $status
				);
		} else {
			$this->request->query['status'] = '';
		}

		if (!empty($this->request->query['secretaria'])) {
			
			// $secretaria = $this->request->query['secretaria'];

			// $options['conditions'] = array(
			// 	'Projeto.secretaria_id'=> $secretaria
			// 	);
		}else {
			$this->request->query['secretaria'] = '';
		}

		$this->Projeto->recursive = 2;

		$this->Paginator->settings = $options;
		$this->set('projetos', $this->Paginator->paginate());

		$secretarias = $this->Projeto->Indicacao->Secretaria->find('list');
		$status = $this->Projeto->StatusProjeto->find('list');

		$this->set(compact('secretarias', 'status'));
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
			$this->request->data['Projeto']['status_projeto_id'] = 1;
			
			//Arruma formatação monetário
			$this->request->data['Projeto']['valor'] = str_replace('.', '', $this->request->data['Projeto']['valor']);
			$this->request->data['Projeto']['valor'] = str_replace(',', '.', $this->request->data['Projeto']['valor']);

			$this->Projeto->create();
			if ($this->Projeto->save($this->request->data)) {
				
				//Salva a notificação
				$this->Notificacao->create();
				$this->Notificacao->save(
					array(
						'tipo'=> 2,
						'notificacao'=>'Um novo projeto foi criado',
						'identificador'=> $this->Projeto->id
						));
				// ** Salva notificacao

				$this->Session->setFlash(__('O <strong>projeto</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				Debugger::dump($this->Projeto->validationErrors);
				exit();
				$this->Session->setFlash(
					__('O <strong>projeto</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}

		$bairros = $this->Projeto->Bairro->find('list');

		$this->set(compact('bairros', 'indicacoes'));
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
				$this->Session->setFlash(__('O <strong>projeto</strong> foi editado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>projeto</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Projeto.' . $this->Projeto->primaryKey => $id));
			$this->request->data = $this->Projeto->find('first', $options);

			//Formato monetário
			$this->request->data['Projeto']['valor'] = number_format($this->request->data['Projeto']['valor'], 2, ',', '.');
		}
		$statusProjetos = $this->Projeto->StatusProjeto->find('list');
		$bairros = $this->Projeto->Bairro->find('list');

		//Pega a UID da indicação para mostrar na tag
		$indicacao_uid = $this->Projeto->Indicacao->find(
			'first',
			array('conditions'=> array('Indicacao.id'=> $this->request->data['Projeto']['indicacao_id'])));
		$indicacao_uid = $indicacao_uid['Indicacao']['uid'];

		$this->set(compact('statusProjetos', 'bairros', 'indicacao_uid'));
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
