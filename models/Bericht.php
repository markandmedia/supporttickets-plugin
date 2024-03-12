<?php namespace Markandmedia\SupportTickets\Models;

use Model;
use BackendAuth;
use Carbon\Carbon;
use Db;
use Markandmedia\SupportTickets\Models\Bericht;
use Markandmedia\SupportTickets\Models\Ticket;
use Mail;

/**
 * Model
 */
class Bericht extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];


    /**
     * @var string table in the database used by the model.
     */
    public $table = 'markandmedia_supporttickets_bericht';

    public $defaultValues = [
        'backend_users_id' => 'getDefaultUserId',
    ];

    public $belongsTo = [
        'backend_users'   => ['Backend\Models\User']
    ];

    public $attachMany = [
        'bestanden' => ['System\Models\File', 'public' => false]
    ];

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    public function beforeCreate()
    {
      $user = BackendAuth::getUser();
      // Opslaan in model
      if ($user) {
          $this->backend_users_id = $user->id;
      }

      $stuurMail = false;
      $ticket_id = $this->ticket_id;
      $ticket = Ticket::where('id', $ticket_id)->first();

      // Zoek naar persoon van voorgaand bericht
      $vorigeReactie = Bericht::where('ticket_id', $ticket_id)->where('backend_users_id', '!=', $user->id)->orderBy('created_at', 'desc')->first();

      if($vorigeReactie){
        // Er is een ander persoon in deze conversatie gevonden!
        $naarEmail = $vorigeReactie->backend_users->email;
        $vars = [
            'email' => $naarEmail,
            'naam' => $vorigeReactie->backend_users->first_name,
            'onderwerp' => $ticket->onderwerp,
            'id' => $ticket_id,
        ];
        Mail::send('notificatie_todo', $vars, function($message) use ($vars) {
            $message->to($vars['email']);
            $message->subject('Stoffenshop update ToDo: '.$vars['onderwerp']);
        });
      } else {
        // Als er geen voorgaand bericht van een ander persoon is, stuur de notificatie dan naar een aanmaker van het ticket
        $naarEmail = $ticket->backend_users->email;
        $vars = [
            'email' => $naarEmail,
            'naam' => $ticket->backend_users->first_name,
            'onderwerp' => $ticket->onderwerp,
            'id' => $ticket_id,
        ];
        Mail::send('notificatie_todo', $vars, function($message) use ($vars) {
            $message->to($vars['email']);
            $message->subject('Stoffenshop update ToDo: '.$vars['onderwerp']);
        });
      }

    }


    public static function getDefaultUserId()
    {
        $user = BackendAuth::getUser();

        if ($user) {
            return $user->id;
        }

        return null;
    }

}
