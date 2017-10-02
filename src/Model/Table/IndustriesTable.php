<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Industries Model
 *
 * @method \App\Model\Entity\Industry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Industry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Industry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Industry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Industry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Industry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Industry findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IndustriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('industries');
        $this->setDisplayField('id_indus');
        $this->setPrimaryKey('id_indus');

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
            ->integer('id_indus')
            ->allowEmpty('id_indus', 'create');

        $validator
            ->scalar('categori_indus')
            ->requirePresence('categori_indus', 'create')
            ->notEmpty('categori_indus');

        return $validator;
    }
}
