<?php
namespace Contacts\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contacts Model
 *
 * @method \Contacts\Model\Entity\Contact get($primaryKey, $options = [])
 * @method \Contacts\Model\Entity\Contact newEntity($data = null, array $options = [])
 * @method \Contacts\Model\Entity\Contact[] newEntities(array $data, array $options = [])
 * @method \Contacts\Model\Entity\Contact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Contacts\Model\Entity\Contact|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Contacts\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Contacts\Model\Entity\Contact[] patchEntities($entities, array $data, array $options = [])
 * @method \Contacts\Model\Entity\Contact findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContactsTable extends Table
{

    const STATUS_PENDENT = 0;
    const STATUS_READED = 1;
    const STATUS_ANSWERED = 2; 
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('contacts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 120)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('company')
            ->maxLength('company', 120)
            ->allowEmpty('company');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 18)
            ->allowEmpty('phone');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 50)
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->scalar('mensage')
            ->requirePresence('mensage', 'create')
            ->notEmpty('mensage');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 14)
            ->requirePresence('ip', 'create')
            ->notEmpty('ip');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
