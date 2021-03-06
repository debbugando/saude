<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
            'limit'   => 10
        ];
        
        $users = $this->paginate($this->Users);        
        
        $this->set(compact('users'));
    }
    
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Uploads']
        ]);

        $this->set('user',$user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Dados de Usuário Salvo com Sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao Inserir Dados de Usuário. Tente Novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'role_name']);
        $this->set(compact('roles',$roles));

        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Dados de Usuário Editado com Sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao Editar Dados de Usuário. Tente Novamente.'));
        }

        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'role_name']);
        $this->set(compact('roles',$roles));
        
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Dados de Usuário Removidos com Sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao Remover Dados de Usuário. Tente Novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                // Busca perfil do usuário logado para retornar nome do perfil           
                $role = $this->Users->Roles->findById($user['role'])->toArray();                
                
                //Insere no objeto caso retorne resultado
                if($role!==null){                    
                    $user['role_name'] = $role[0]['role_name'];
                }                

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Dados Inválidos.');
        }
    }

    public function logout()
    {
        $this->Flash->success('Seu acesso foi Finalizado.');
        return $this->redirect($this->Auth->logout());
    }
}
