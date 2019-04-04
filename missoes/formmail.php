<?php include_once("template/header.php"); ?>

<div id='sucesso' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-header'>
        <button type='button' class='close'><a href="/missoes" style="text-decoration: none;">x</a></button>
        <h3 id='myModalLabel'>Obrigado!</h3>
    </div>
    <div class='modal-body'>
        <p>Sua mensagem foi enviada com sucesso.<br>Em breve responderemos no email informado neste formul&aacute;rio.</p>
    </div>
    <div class='modal-footer'>
        <a href="/missoes" role="button" class="btn btn-success">Fechar</a>
    </div>
</div>

<div id='erro' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-header'>
        <button type='button' class='close'><a href="/missoes/contato.php" style="text-decoration: none;">x</a></button>
        <h3 id='myModalLabel'>Erro no envio, tente novamente.</h3>
    </div>
    <div class='modal-body'>
        <p>O problema pode ter rela&ccedil;&atilde;o com os seguintes motivos:<br>
        <ol>
            <li>Algum campo do formul&aacute;rio ficou em branco;</li>
            <li>Pode ter ocorrido um erro na digita&ccedil;&atilde;o;</li>
        </ol>
    </div>
    
    <div class='modal-footer'>
        <a href="/missoes/contato.php" role="button" class="btn btn-danger">Fechar</a>
    </div>
</div>

<?php include_once("template/footer.php"); ?>
        <?php
        
        // dados do projetomensagem
        $mailto = 'contato@projetomensagem.com.br';
        $from = "contato - projetomensagem.com.br";
        $formurl = "https://palavraviva12.com/missoes/contato.php";
        // $errorurl = "";
        // $thankyouurl = "/contato.php?contato-sucesso";
        // evitando cache do navegador
        //header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        //header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        //header("Cache-Control: no-store, no-cache, must-revalidate");
        //header("Cache-Control: post-check=0, pre-check=0", false);
        //header("Pragma: no-cache");

        function remove_headers($string) {
            $headers = array(
                "/to\:/i",
                "/from\:/i",
                "/bcc\:/i",
                "/cc\:/i",
                "/Content\-Transfer\-Encoding\:/i",
                "/Content\-Type\:/i",
                "/Mime\-Version\:/i"
            );
            if (preg_replace($headers, '', $string) == $string) {
                return $string;
            } else {
                die('You think Im spammy? Spammy how? Spammy like a clown, spammy?');
            }
        }

        $uself = 0;
        $headersep = (!isset($uself) || ($uself == 0)) ? "\r\n" : "\n";

        if (!isset($_POST['email'])) {
            echo "<script>$('#erro').modal('show')</script>";
            exit;
        }

        // Input Your Personal Information Here
        $nome = remove_headers($_POST['nome']);
        $email = remove_headers($_POST['email']);
        $assunto = remove_headers($_POST['assunto']);
        $mensagem = remove_headers($_POST['mensagem']);
        $http_referrer = getenv("HTTP_REFERER");
        // End Edit

        if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i", $email)) {
            echo "<script>$('#erro').modal('show')</script>";
            exit;
        }

        // Input Your Personal Information Here
        if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
            echo "<script>$('#erro').modal('show')</script>";
            exit;
        }
        // End Edit

        if (ereg("[\r\n]", $nome) || ereg("[\r\n]", $email)) {
            echo "<script>$('#erro').modal('show')</script>";
            exit;
        }
        if (get_magic_quotes_gpc()) {
            $mensagem = stripslashes($mensagem);
        }

        // sets max amount of characters in comments area (edit as nesesary)
        if (strlen($mensagem) > 1250) {
            $mensagem = substr($mensagem, 0, 1250) . '...';
        }
        // End Edit

        $message = "Esta mensagem foi enviada de:\n" .
                "$http_referrer\n\n" .
                // Input Your Personal Information Here
                "Nome: $nome\n\n" .
                "Email: $email\n\n" .
                "Assunto: $assunto\n\n" .
                "Mensagem: $mensagem\n\n" .
                "\n\n------------------------------------------------------------\n";
        // End Edit

        mail($mailto, $from, $message, "From: \"$nome\" <$email>" . $headersep . "Responder para: \"$nome\" <$email>" . $headersep);
        echo "<script>$('#sucesso').modal('show')</script>";
        exit;
        ?>
