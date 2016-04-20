<?php
    // URL Helper
    // Para poder utilizar a função "base_url()"
    $this->load->helper('url');
?>

<!--
  Bootstrap : Formulários

  http://getbootstrap.com/css/#forms
-->
<form action="<?php echo base_url('posts') ?>" method="post">
    <h3>Nova treinador</h3>

    <?php if(isset($_POST['title'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Post enviado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        <input type="text" class="form-control" name="title" id="title" placeholder="Nome">
    </div>
    <div class="form-group">
        <textarea class="form-control" rows="6" name="content" id="content" placeholder="Descrição..."></textarea>
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>
