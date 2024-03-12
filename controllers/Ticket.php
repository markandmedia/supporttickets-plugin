<?php namespace Markandmedia\SupportTickets\Controllers;

use Backend;
use BackendMenu;
use BackendAuth;
use Backend\Classes\Controller;

class Ticket extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'markand_tickets'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Markandmedia.SupportTickets', 'main-menu-item', 'side-menu-item');
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
