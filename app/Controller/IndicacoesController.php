<?php
App::uses('AppController', 'Controller');
App::import( 'Helper', 'Time');
/**
 * Indicacoes Controller
 *
 * @property Indicacao $Indicacao
 * @property PaginatorComponent $Paginator
 */
class IndicacoesController extends AppController {

public $layout = 'BootstrapAdmin.default';	

	public function getIndicacoesAutoComplete(){
		$options = array();
		if (!is_null($this->request->query['term'])) {
			$q = str_replace(' ', '%', $this->request->query['term']);
			$options['conditions'] = array('Indicacao.uid LIKE'=> '%'.$q.'%');
		}
		// Debugger::dump($options);
		$options['limit'] = 10;
		$query = $this->Indicacao->find('all', $options);
		$indicacoes = array();

		$i = 0;
		foreach ($query as $row) {
			$indicacoes[$i]['id'] = $row['Indicacao']['id'];
			$indicacoes[$i]['label'] = $row['Indicacao']['uid'];
			$i++;
		}
		$this->set(compact('indicacoes'));

		echo json_encode($indicacoes);
		$this->autoRender = false;
	}

	public function changeStatusModal($id = null) {

		$indicacao = $this->Indicacao->find('first', array('conditions'=> array('Indicacao.id'=> $id)));
		if (!empty($indicacao)) {
			if ($this->request->is(array('post', 'put'))) {
				$this->request->data['Indicacao']['id'] = $id;
				if (!$this->Indicacao->save($this->request->data)) {
					$this->Session->setFlash('Ocorreu um erro ao salvar o status', 'default', array('class'=> 'alert alert-danger'));
				}
				$this->redirect(array('controller'=> 'indicacoes', 'action'=> 'index'));
			} else {
				$this->request->data['Indicacao']['status_indicacao_id'] = $indicacao['Indicacao']['status_indicacao_id'];
				$statusIndicacoes = $this->Indicacao->StatusIndicacao->find('list');
			}
			
			$this->set(compact('indicacao', 'statusIndicacoes'));
		} else {
			$this->Session->setFlash('A indicação que você tentou trocar o status não foi encontrado.', 'default', array('class'=> 'alert alert-danger'));
			$this->redirect(array('controller'=> 'indicacoes', 'action'=> 'index'));
		}
		$this->layout = 'ajax';
	}

	public function setSecretariaModal($id = null) {
		$indicacao = $this->Indicacao->find('first', array('conditions'=> array('Indicacao.id'=> $id)));
		if (!empty($indicacao)) {
			if ($this->request->is(array('post', 'put'))) {
				$this->request->data['Indicacao']['id'] = $id;
				if (!$this->Indicacao->save($this->request->data)) {
					$this->Session->setFlash('Ocorreu um erro ao salvar a secretária', 'default', array('class'=> 'alert alert-danger'));
				}
				$this->redirect(array('controller'=> 'indicacoes', 'action'=> 'index'));
			} else {
				$this->request->data['Indicacao']['status_indicacao_id'] = $indicacao['Indicacao']['status_indicacao_id'];
				$secretarias = $this->Indicacao->Secretaria->find('list');
			}
			$this->set(compact('indicacao', 'secretarias'));
		} else {
			$this->Session->setFlash('A secretária que você tentou setar não foi encontrada.', 'default', array('class'=> 'alert alert-danger'));
			$this->redirect(array('controller'=> 'indicacoes', 'action'=> 'index'));
		}
		$this->layout = 'ajax';
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'DataUtil');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$q = str_replace(' ', '%', $this->request->query['q']);
		$this->Indicacao->recursive = 2;
		$this->Paginator->settings = array('Indicacao'=> array('conditions'=> array('Indicacao.uid LIKE' => '%'.$q.'%'), 'order'=> 'Indicacao.created DESC'));
		$this->set('indicacoes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Indicacao->exists($id)) {
			throw new NotFoundException(__('Invalid indicacao'));
		}
		$this->Indicacao->recursive = 3;
		$options = array('conditions' => array('Indicacao.' . $this->Indicacao->primaryKey => $id));
		$this->set('indicacao', $this->Indicacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			//Insere o status pendente de avaliação assim que ele eh adicionado
			$this->request->data['Indicacao']['status_indicacao_id'] = 1;

			$this->request->data['Indicacao']['data_indicacao'] = $this->DataUtil->setPadrao($this->request->data['Indicacao']['data_indicacao']);
			$this->Indicacao->create();
			if ($this->Indicacao->save($this->request->data)) {
				$this->Session->setFlash(__('A <strong>indicacao</strong> foi salva com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$validationErrorsList = $this->validationErrorsToList($this->Indicacao->validationErrors);
				$this
					->Session
					->setFlash(__('A <strong>indicacao</strong> não pode ser salva:<br>' . $validationErrorsList),
						'default',
						array('class'=> 'alert alert-danger'));
			}
		}


		
		$query = $this->Indicacao->Vereador->find('all');
		$vereadores = array();
		foreach ($query as $row) {
			$vereadores[$row['Vereador']['id']] = $row['Vereador']['name'] . ' "' .$row['Vereador']['nome_parlamentar']. '" (' . $row['Partido']['sigla'] . ')';
		}

		$this->request->data['Indicacao']['data_indicacao'] = date('d/m/Y');
		$this->set(compact('secretarias', 'statusIndicacoes', 'vereadores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Indicacao->exists($id)) {
			throw new NotFoundException(__('Invalid indicacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Indicacao']['id'] = $id;
			$this->request->data['Indicacao']['status_indicacao_id'] = 1;
			$this->request->data['Indicacao']['data_indicacao'] = $this->DataUtil->setPadrao($this->request->data['Indicacao']['data_indicacao']);
			if ($this->Indicacao->save($this->request->data)) {
				$this->Session->setFlash(__('The indicacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$validationErrorsList = $this->validationErrorsToList($this->Indicacao->validationErrors);
				$this
					->Session
					->setFlash(__('A <strong>indicacao</strong> não pode ser salva:<br>' . $validationErrorsList),
						'default',
						array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Indicacao.' . $this->Indicacao->primaryKey => $id));
			$this->request->data = $this->Indicacao->find('first', $options);
		}
		

		$vereadores = $this->Indicacao->Vereador->find('list');
		$this->set(compact('secretarias', 'statusIndicacoes', 'vereadores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Indicacao->id = $id;
		if (!$this->Indicacao->exists()) {
			throw new NotFoundException(__('Invalid indicacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Indicacao->delete()) {
			$this->Session->setFlash(__('A <strong>indicacao</strong> foi deletada com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('A <strong>indicacao</strong> não pode ser deletada, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
