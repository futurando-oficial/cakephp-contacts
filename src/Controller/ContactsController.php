<?php
namespace Contacts\Controller;

use Contacts\Controller\AppController;

/**
* Contacts Controller
*
* @property \Contacts\Model\Table\ContactsTable $Contacts
*
* @method \Contacts\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/
class ContactsController extends AppController
{
    /**
    * Add method
    *
    * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    */
    public function add()
    {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            $contact->status = $this->Contacts::STATUS_PENDENT;
            $contact->ip = $this->request->clientIp();
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));
                
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $this->set(compact('contact'));
    }
}