<p>Preencha o formulário abaixo para enviar sua dúvida!</p>
<div id="respond">
  <div class="responseContact alert d-none" role="alert"></div>
  <div class="loaderContact d-none">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>
  <form action="<?php the_permalink(); ?>" class="contactEmailForm" method="post">
  <input type="hidden" name="action" value="contactEmail">
  <?php wp_nonce_field( 'contactEmail','contactEmailNonce' ); ?>
    <div class="row">
      <div class="col-md-12"><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>" placeholder="Qual o seu nome?"></div>
      <div class="col-md-12"><input type="email" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>" placeholder="Qual seu e-mail?"></div>
      <div class="col-md-5"><input type="tel" name="message_phone" value="<?php echo esc_attr($_POST['message_phone']); ?>" placeholder="Qual seu telefone?"></div>
      <div class="col-md-7"><input type="text" name="message_subject" value="<?php echo esc_attr($_POST['message_subject']); ?>" placeholder="Qual assunto?"></div>
      <div class="col-md-12"><textarea type="text" name="message_text" placeholder="Digite sua mensagem"><?php echo esc_textarea($_POST['message_text']); ?></textarea></div>
      <div class="col-md-3 ml-auto"><button type="submit">Enviar</button></div>
    </div>
    <input type="hidden" name="submitted" value="1">
  </form>
</div>

<script>
  jQuery(document).ready(function ($) {
    $(document).on('submit','.contactEmailForm',function (e) { 
      e.preventDefault();
      $('.contactEmailForm button').html('<i class="fa fa-spinner fa-spin"></i> Enviando');
      
      setTimeout(function () {
        // $('.contactEmailForm').addClass('d-none');
        $('.contactEmailForm').fadeOut('slow');
        $('.loaderContact').removeClass('d-none');
      }, 300);

      $.ajax({
        type: "POST",
        url: "<?=admin_url('admin-ajax.php');?>",
        data: $(this).serialize(),
        dataType: "json",
        success: function (response) {
          console.log(response);
          if(response.sent){
            setTimeout(function () {
              $(this).addClass('d-none');
              $('.loaderContact').addClass('d-none');
              $('.responseContact').removeClass('d-none');
              $('.responseContact').removeClass('alert-danger');
              $('.responseContact').addClass('alert-success');
              $('.responseContact').html(response.message);
            }, 1000);
          } else{
            setTimeout(function () {
              $('.loaderContact').addClass('d-none');
              $('.contactEmailForm').fadeIn('slow');
              $('.responseContact').removeClass('d-none');
              $('.responseContact').addClass('alert-danger');
              $('.responseContact').html(response.message);
              $('.contactEmailForm button').html('Enviar');
            }, 1000);
          }
        }
      });

      return false;
    });
  });
</script>