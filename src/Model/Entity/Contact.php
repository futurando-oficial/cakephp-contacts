<?php
namespace Contacts\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $company
 * @property string $phone
 * @property string $subject
 * @property string $mensage
 * @property string $ip
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 */
class Contact extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'company' => true,
        'phone' => true,
        'subject' => true,
        'mensage' => true,
        'ip' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];
}
