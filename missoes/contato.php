<?php include_once("template/header.php"); ?>

<section class="container">
  <div class="row">&nbsp;</div>

  <div class="row">
    <div class="span5">
      <h2>O Chamado</h2>
      <p class="texto1">Iniciamos nossas atividades na década de 80 no Rio de Janeiro e, hoje nosso foco tem sido o Nordeste Brasileiro bem como o seu agreste.</p>
      <p class="texto1">Sem nenhum tipo de ajuda Governamental, mantemos nossas ações com a ajuda voluntária dos próprios Projetistas integrantes de nossas frentes, e de Igrejas Evangélicas que entendem nosso “Chamado e Missão”.</p>
      <p class="texto1">Para isso pedimos a colaboração de todos para continuarmos avançando na “Missão de Proclamar o Evangelho aos perdidos da Terra”</p>
      <p class="texto1">Um forte abraço!<br/>Graça e Paz!</p>
      <p class="texto1"><strong>Pr. Marco  Specie e Prª Neildes Specie.</strong></p>
    </div>

    <div class="span4 offset1">
      <h2>Entre em contato</h2>
      <p class="texto1">Faça parte desta missão !<br/>Entre em contato e descubra como<br/>colaborar com a obra do Senhor Jesus.</p>
      
      <form method="post" action="formmail.php">
        <div class="control-group">
          <label class="control-label" for="inputNome">Nome</label>
          <div class="controls"><input type="text" id="inputNome" name="nome" value="" placeholder="Nome"></div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls"><input type="text" id="inputEmail" name="email" value="" placeholder="Email"></div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputAssunto">Assunto</label>
          <div class="controls"><input type="text" id="inputAssunto" name="assunto" value="" placeholder="Assunto"></div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputMensagem">Mensagem</label>
          <div class="controls"><textarea rows="3" id="inputMensagem" name="mensagem" value="" placeholder="Mensagem"></textarea></div>
        </div>
        <div class="control-group">
          <div class="controls"><button type="submit" class="btn">Enviar</button></div>
        </div>
      </form>
    </div>
  </div>
    
  <div class="row">&nbsp;</div>
</section>

<?php include_once("template/footer.php"); ?>