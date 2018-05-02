<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Uploads Controller
 *
 * @property \App\Model\Table\UploadsTable $Uploads
 *
 * @method \App\Model\Entity\Upload[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UploadsController extends AppController
{         
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users','Categories']
        ];

        $uploads = $this->paginate($this->Uploads);    

        $this->set(compact('uploads'));
    }

    /**
     * View method
     *
     * @param string|null $id Upload id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $upload = $this->Uploads->get($id, [
            'contain' => ['Users']
        ]);        

        $this->set('upload', $upload);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    
        $upload = $this->Uploads->newEntity();
        if ($this->request->is('post')) {
            $upload = $this->Uploads->patchEntity($upload, $this->request->getData());

            //Arquivos Permitidos para Thumbnail
            $allowedImg = array(
                'image/png',
                'image/jpeg',
                'image/gif',
                'image/bmp'
            );

            //Validação de thumbnail para configurar a extensão que será salva
            if(!empty($this->request->getData('thumbnail')['name']) && in_array($this->request->getData('thumbnail')['type'],$allowedImg)){
                $caminho = pathinfo($this->request->getData('thumbnail')['name']);
                $upload->thumbnail['type'] = $caminho['extension'];
            }

            //Arquivos Permitidos para Arquivos
            $allowedFile = array(
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',//DOCX
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',//XLSX
                'application/msword',//WORD
                'application/excel', //XLS
                'application/pdf', //PDF
            );
            
            //Validação de thumbnail para configurar a extensão que será salva
            if(!empty($this->request->getData('file')['name']) && in_array($this->request->getData('file')['type'],$allowedFile)){
                $caminho = pathinfo($this->request->getData('file')['name']);
                $upload->file['type'] = $caminho['extension'];
            }
                       
            if ($this->Uploads->save($upload)) {
                $setLog = $this->setLogs(array(
                    'log'       => 'Inserção Dados Upload',
                    'user_id'   => $this->Auth->user('id'),
                    'upload_id' => $upload->id
                    )
                );
                
                $this->Flash->success(__('Dados Salvos com Sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao Salvar Dados. Tente Novamente.'));
        }
        $categories = $this->Uploads->Categories->find('list', ['keyValue' => 'id', 'valueField' => 'name']);
        $this->set('categories',$categories);

        $users = $this->Uploads->Users->find('list', ['limit' => 200]);
        $this->set(compact('upload', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Upload id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $upload = $this->Uploads->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $upload = $this->Uploads->patchEntity($upload,  $this->request->getData());
            
            //Arquivos Permitidos para Thumbnail
            $allowedImg = array(
                'image/png',
                'image/jpeg',
                'image/gif',
                'image/bmp'
            );

            //Validação de thumbnail para configurar a extensão que será salva
            if(!empty($this->request->getData('thumbnail')['name']) && in_array($this->request->getData('thumbnail')['type'],$allowedImg)){
                $caminho = pathinfo($this->request->getData('thumbnail')['name']);
                $upload->thumbnail['type'] = $caminho['extension'];
            }

            //Arquivos Permitidos para Arquivos
            $allowedFile = array(
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',//DOCX
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',//XLSX
                'application/msword',//WORD
                'application/excel', //XLS
                'application/pdf', //PDF
            );
            
            //Validação de thumbnail para configurar a extensão que será salva
            if(!empty($this->request->getData('file')['name']) && in_array($this->request->getData('file')['type'],$allowedFile)){
                $caminho = pathinfo($this->request->getData('file')['name']);
                $upload->file['type'] = $caminho['extension'];
            }

            if ($this->Uploads->save($upload)) {                
                $setLog = $this->setLogs(array(
                    'log'       => 'Edição Dados Upload',
                    'user_id'   => $this->Auth->user('id'),
                    'upload_id' => $id
                    )
                );

                $this->Flash->success(__('Dados Editados com Sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao Editar Dados. Tente Novamente.'));
        }
        $categories = $this->Uploads->Categories->find('list', ['keyValue' => 'id', 'valueField' => 'name']);
        $this->set('categories',$categories);
        
        $users = $this->Uploads->Users->find('list', ['limit' => 200]);
        $this->set(compact('upload', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Upload id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $upload = $this->Uploads->get($id);

        $setLog = $this->setLogs(array(
            'log'       => 'Exclusão de Dados Upload',
            'user_id'   => $this->Auth->user('id'),
            'upload_id' => $upload->id
            )
        );

        if ($this->Uploads->delete($upload)) {
            $this->Flash->success(__('Dados Removidos com Sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao Remover Dados. Tente Novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     *
     * Método para registrar log de upload
     * @param array $log
     * @return bool
     */
    public function setLogs($logData)
    {
        if(!empty($logData)){
            $logsTable = TableRegistry::get('Logs');
            $logEntity = $logsTable->newEntity();

            $logEntity->log       = $logData['log'];
            $logEntity->user_id   = $logData['user_id'];
            $logEntity->upload_id = $logData['upload_id'];
            
            if($logsTable->save($logEntity)){
                return true;
            }
            return false;
        }        
    }
}  
