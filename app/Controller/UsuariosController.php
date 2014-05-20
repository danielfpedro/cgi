<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 */
class UsuariosController extends AppController {

	public $layout = 'BootstrapAdmin.default';	

	public function login() {
		$this->layout = 'BootstrapAdmin.login';
	}

	public function meu_usuario() {
		$id = 9;
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Usuário inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {

			//FAZ O HASH DO PASSWORD
			if (!empty($this->request->data['Usuario']['fake_password'])) {
				$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
				$this->request->data['Usuario']['senha'] = $passwordHasher->hash(
					$this->request->data['Usuario']['fake_password']
				);
			}

			$this->request->data['Usuario']['id'] = $id;
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>usuario</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
			} else {
				$this->Session->setFlash(__('O <strong>usuario</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}

		$this->request->data['Usuario']['fake_password'] = '';
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
			
			$options['conditions'] = array(
				'or'=> array(
					'Usuario.name LIKE'=> '%'.$q.'%',
					'Usuario.email LIKE'=> '%'.$q.'%',
					)
				);
		} else {
			$this->request->query['q'] = '';
		}
		$this->Usuario->recursive = 0;
		$this->Paginator->settings = $options;
		$this->set('usuarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			//FAZ O HASH DO PASSWORD
			if (!empty($this->request->data['Usuario']['fake_password'])) {
				$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
				$this->request->data['Usuario']['senha'] = $passwordHasher->hash(
					$this->request->data['Usuario']['fake_password']
				);
			}

			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>usuario</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>usuario</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}

		$cargos = $this->Usuario->Cargo->find('list');
		$secretarias = $this->Usuario->Secretaria->find('list');
		$this->set(compact('cargos', 'secretarias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Usuário inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {

			//FAZ O HASH DO PASSWORD
			if (!empty($this->request->data['Usuario']['fake_password'])) {
				$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
				$this->request->data['Usuario']['senha'] = $passwordHasher->hash(
					$this->request->data['Usuario']['fake_password']
				);
			}

			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>usuario</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>usuario</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}

		$this->request->data['Usuario']['fake_password'] = '';

		$cargos = $this->Usuario->Cargo->find('list');
		$secretarias = $this->Usuario->Secretaria->find('list');
		$this->set(compact('cargos', 'secretarias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('O <strong>usuario</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>usuario</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
