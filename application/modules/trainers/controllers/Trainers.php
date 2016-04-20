<?php

class Trainers extends CI_Controller {
    /*
        Página Inicial

        - Exibe todos os trainers
        - Recebe requisições POST e adiciona ao banco de dados
    */
    public function index () {
        // Carrega a model "Trainer"
        $this->load->model('Trainer');

        /*
            Verifica se está recebendo um requisição de novo treinador
            Se estiver, adiciona o treinador recebido.
        */
        if(isset($_POST['name'])) {
            $this->add();
        }

        // Obtém todos os trainers através do método estático "gettrainers()"
        $trainers  = Trainer::getTrainers();

        // Criando view
        $data           = [];
        $data['trainers']  = $trainers;
        $this->load->view('layout/header');
        $this->load->view('trainers/list', $data);
        $this->load->view('layout/footer');
    }


    /*
        Adicionar requisições POST no banco de dados.
    */
    public function add () {
        $this->load->model('Trainer');

        $new_post               = new Trainer();
        $new_post->name         = $_POST['name'];
        $new_post->description  = $_POST['description'];
        $new_post->save();
    }


    /*
        Remove trainador
    */
    public function remove ($id=0) {
        // Caso recebe um ID de treinador
        if ($id) {
            $this->load->model('Trainer');

            $trainer = new Trainer($id);
            $trainer->delete();

        }

        else {
            echo "ERRO! Nenhum ID de trainador foi recebido!";
        }

    }


    /*
        Editar Treinador
    */
    public function edit () {
        echo "Você ainda precisa implementar essa método! ^^";
    }
}