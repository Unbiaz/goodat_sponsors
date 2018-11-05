<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $link
 * @property bool $shortage
 * @property int $cmpny_id
 * @property int $contrat_id
 * @property int $area_id
 * @property int $location_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $expirated
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\ContratType $contrat_type
 * @property \App\Model\Entity\FunctionalArea $functional_area
 * @property \App\Model\Entity\Location $location
 */
class Job extends Entity
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
        '*' => true,
        'id' => false
    ];
}
