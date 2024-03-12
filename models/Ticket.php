<?php namespace Markandmedia\SupportTickets\Models;

use Model;
use BackendAuth;
use Carbon\Carbon;
use Db;

/**
 * Model
 */
class Ticket extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];


    public $hasMany = [
        'bericht' => ['Markandmedia\SupportTickets\Models\Bericht']
    ];

    public $attachMany = [
        'bestanden' => ['System\Models\File', 'public' => false]
    ];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'markandmedia_supporttickets_tickets';

    public $defaultValues = [
        'backend_users_id' => 'getDefaultUserId',
    ];

    public $belongsTo = [
        'backend_users'   => ['Backend\Models\User']
    ];

    public function beforeCreate()
    {
      $user = BackendAuth::getUser();
      // Opslaan in model
      if ($user) {
          $this->backend_users_id = $user->id;
      }
    }

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];


    public static function getDefaultUserId()
    {
        $user = BackendAuth::getUser();

        if ($user) {
            return $user->id;
        }

        return null;
    }

}
