<?php namespace Markandmedia\SupportTickets\Controllers;

use Backend;
use BackendMenu;
use BackendAuth;
use Backend\Classes\Controller;

class Bericht extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];


    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';


    public $requiredPermissions = [
        'markand_tickets'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Markandmedia.SupportTickets', 'main-menu-item', 'side-menu-item2');
    }

    public function formExtendModel($model)
    {
        if ($this->formGetContext() === 'create') {

            $user = BackendAuth::getUser();

            if ($user) {
                $model->backend_users_id = $user->id;
            }
        }
    }

}
