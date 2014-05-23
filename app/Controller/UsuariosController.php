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
	
	/**
	 * beforeFilter callback
	 *
	 * @return void
	 */
		public function beforeFilter() {
			parent::beforeFilter();
		}
	

	public function add_ajax() {
		$this->Usuario->save(array('id'=> $this->Auth_usuario_id, 'ultima_notificacao_lida'=> date("Y-m-d H:i:s")));
		$this->autoRender = false;
	}

	public function login() {
		$this->layout = 'BootstrapAdmin.login';

		// $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
		// echo $passwordHasher->hash('123mudar');
		// exit();

		// if ($this->Auth->login()) {
		// 	$this->redirect($this->Auth->redirect());
		// } else {
		// 	$this->request->data['Usuario']['senha'] = '';
		// 	$this->Session->setFlash($this->Auth->authError,'default', array('class'=> 'alert alert-danger'));
		// }


		if ($this->request->is('post')) {
			$options = array();

			$username = $this->request->data['Usuario']['email'];
			$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
			$senha = $passwordHasher->hash(
				$this->request->data['Usuario']['senha']
			);
			
			$options['conditions'] = array('Usuario.email'=> $username, 'Usuario.senha'=> $senha);
			$usuario = $this->Usuario->find('first', $options);
			// Debugger::dump($usuario);
			// exit();
			if (!empty($usuario)) {

				$this->Session->write('Auth.flag', true);
				$this->Session->write('Auth.usuario_id', $usuario['Usuario']['id']);
				$this->Session->write('Auth.nome', $usuario['Usuario']['name']);
				$this->Session->write('Auth.email', $usuario['Usuario']['email']);
				$this->Session->write('Auth.cargo_id', $usuario['Cargo']['id']);
				$this->Session->write('Auth.cargo', $usuario['Cargo']['name']);
				$this->Session->write('Auth.secretaria_id', $usuario['Secretaria']['id']);
				$this->Session->write('Auth.secretaria', $usuario['Secretaria']['name']);
				
				return $this->redirect(array('controller'=> 'indicacoes', 'action'=> 'index'));
			} else {
				$this->Session->setFlash('Combinação email/senha incorreta.', 'default', array('class'=> 'alert alert-danger'));
			}
		}
	}

	public function logout() {
		$this->Session->destroy();
		return $this->redirect(array('controller'=> 'usuarios', 'action'=> 'login'));
	}

	public function meu_usuario() {
		$id = $this->Auth_usuario_id;
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
