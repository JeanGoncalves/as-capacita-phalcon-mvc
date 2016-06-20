<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function indexAction()
    {
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function registerAction()
    {
        $this->view->disable();

        $user = new Users();

        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            [
                'name',
                'email',
            ]
        );

        echo $this->successMessage($success, $user);
    }

    private function successMessage($success, \Phalcon\Mvc\Model $user)
    {
        if ($success) {
            return "Thanks for registering!";
        }

        $message = [];
        foreach ($user->getMessages() as $msg) {
            $message[] = $msg->getMessage();
        }

        return 'Sorry, the following problems were generated: ' . implode($message, ', ');
    }
}
