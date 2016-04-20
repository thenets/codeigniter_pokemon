<?php
    $this->load->helper('url');
?>
<div class="container">

    <!--
      Bootstrap : Sistema de Grid

      http://getbootstrap.com/css/#grid
    -->
    <div class="row">
        <div class="col-sm-8">
            <h3>Trainadores</h3>

            <!-- Para cada trainer, rodará o loop: -->
            <?php foreach ($trainers as $trainer): ?>
                <!--
                  Bootstrap : Paineis

                  http://getbootstrap.com/components/#panels
                -->
                <div class="panel panel-primary">
                    <!-- Nome do Trinador -->
                    <div class="panel-heading">
                        <?php echo $trainer->name ?>
                    </div>

                    <!-- Descrição do Treinador -->
                    <div class="panel-body">
                        <?php echo $trainer->description ?>
                    </div>

                    <!--
                        Datas com PHP
                        Na documentação tem tudo o que precisa saber como criá-las
                        http://php.net/manual/fr/datetime.format.php
                    -->
                    <div class="panel-footer">
                        <!--
                            Datas com PHP
                            Na documentação tem tudo o que precisa saber como criá-las
                            http://php.net/manual/fr/datetime.format.php
                        -->
                        <?php echo (new DateTime($trainer->created))->format('g:ia \o\n l jS F Y') ?>


                        <!--
                            Documentação Bootstrap Button:
                            http://getbootstrap.com/css/#buttons

                            Documentação Bootstrap Icons:
                            http://getbootstrap.com/components/#glyphicons-how-to-use
                        -->
                        <!-- Botão Excluir -->
                        <a href="<?php echo base_url('trainers/remove/' . $trainer->id_trainer) ?>" class="btn btn-xs btn-danger pull-right">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
                        </a>

                        <!-- Botão Editar -->
                        <a href="<?php echo base_url('trainers/edit/' . $trainer->id_trainer) ?>" class="btn btn-xs btn-primary pull-right">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>


        <!-- Renderiza o form para novos trainers -->
        <div class="col-sm-4">
            <?php $this->load->view('trainers/newtrainer_form') ?>
        </div>
    </div>
</div>