<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\Utility\Text;
use Cake\Log\Log;


/**
 * User Entity
 *
 * @property int $id_user
 * @property string $username
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Payment[] $payments
 */
class User extends Entity
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
        'id_user' => false
    ];

    // use SaveDBTrait;
    // use SaveDBTrait;

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value) {
      $hasher = new DefaultPasswordHasher();
      return $hasher->hash($value);
    }

    public function isAdmin() {
      return (strcasecmp($this->role, 'admin') == 0);
    }

    public function generateAuthData() {
        $this->authData = "6bernetics:" . Text::uuid();
    }

    public function generateApiKey($forceNew = false) {
        Log::write('debug', 'User generateApiKey');
        
        // Generate an API 'token' 
        $this->apiKeyPlain = sha1(Text::uuid());

        // Bcrypt the token so BasicAuthenticate can check
        // it during login.
        $hasher = new DefaultPasswordHasher();
        $this->apiKey = $hasher->hash($this->apiKeyPlain);

        // Check for good authData
        if ($forceNew || strlen($this->authData)<10) {
            $this->generateAuthData();
        }           
    }

}
