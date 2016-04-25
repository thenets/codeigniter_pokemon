<?php
    // URL Helper
    // Para poder utilizar a função "base_url()"
    $this->load->helper('url');
?>

<!--
  Bootstrap : Formulários

  http://getbootstrap.com/css/#forms
-->
<form action="<?php echo base_url('trainers') ?>" method="post">
    <h3>Nova treinador</h3>

    <?php if(isset($_POST['name'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Treinador adicionado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
    </div>
    <div class="form-group">
        <textarea class="form-control" rows="6" name="description" id="description" placeholder="Descrição..."></textarea>
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>
