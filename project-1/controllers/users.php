<?php
    class Users extends Controller {

        protected function Index() {
            echo 'USERS/INDEX';
        }

        protected function Login() {
            $viewModel = new UserModel();
            return $this->returnView($viewModel->login(), true);
        }

        protected function Register() {
            $viewModel = new UserModel();
            return $this->returnView($viewModel->register(), true);
        }

        protected function Logout() {
            unset($_SESSION['is_logged_in']);
            unset($_SESSION['user_data']);
            session_destroy();
            // redirect
            header('Location: '.ROOT_URL);
        }

    }
?>
