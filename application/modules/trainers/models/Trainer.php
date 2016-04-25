<?php

class Trainer extends CI_Model {
    public $id_trainer;
    public $name;
    public $description;
    public $money;
    public $discovered_pokemons;

    /*
        Construtor
    */
    public function __construct ($id_trainer=0) {
        // Carregando biblioteca do banco de dados
        $this->load->database();


        /*
            Recupera um trainer já existente do banco de dados
                @ se $id_trainer for passado como parâmetro
        */
        if ($id_trainer) {
            // Obtém o trainer que com respectivo "id_trainer"
            $this->db->where('id_trainer', $id_trainer);
            // Obtém o primeiro resultado (index 0) da busca
            $result = $this->db->get('trainers')->result()[0];

            // Monta o objeto trainer
            $this->id_trainer           = $result->id_trainer;
            $this->name                 = $result->name;
            $this->description          = $result->description;
            $this->money                = $result->money;
            $this->discovered_pokemons  = $result->discovered_pokemons;
        }


        /*
            Adicionar novo trainador
                @ se $id_trainer não for passado como parâmetro
        */
        else {
            // Remove os atributos id_trainer e created, já que eles serão
            //  automaticamente gerado pelo banco de dados.
            unset( $this->id_trainer );
            unset( $this->created );
            $this->money                = 0;
            $this->discovered_pokemons  = 0;
        }
    }



    /*
        Adiciona ou atualiza o trainador no banco de dados
    */
    public function save () {
        // Atualiza
        //  @ verifico se o atributo "id_trainer" existe neste objeto.
        //    lembrando que este atributo é apagado se criamos um novo trainer.
        if ( isset($this->id_trainer) ) {
             $this->db->update('trainers', $this, array('id_trainer' => $this->id_trainer));
        }

        // Salva
        else {
            $this->db->insert('trainers', $this);
        }
    }


    /*
        Deleta o trainador do banco de dados
    */
    public function delete () {
        $this->db->delete('trainers', array('id_trainer' => $this->id_trainer));
    }


    /*
        Obtém uma lista de todos os trainadores
    */
    public static function getTrainers () {
        // Obtém instância do CodeIgniter
        $CI =& get_instance();

        // Carregando biblioteca do banco de dados
        $CI->load->database();

        // Obtém todos os posts
        $CI->db->order_by("created", "desc");
        $result = $CI->db->get('trainers')->result();

        // Monta vetor de objetos "Trainer"
        $trainers  = [];

        foreach ($result as $trainer) {
            $tmp    = new Trainer();
            $tmp->id_trainer            = $trainer->id_trainer;
            $tmp->name                  = $trainer->name;
            $tmp->description           = $trainer->description;
            $tmp->money                 = $trainer->money;
            $tmp->discovered_pokemons   = $trainer->discovered_pokemons;
            $tmp->created               = $trainer->created;

            $trainers[] = $tmp;
        }

        return $trainers;
    }

}