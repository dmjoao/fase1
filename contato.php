<?php 	$pageTitle = "Contato";
		include("cabecalho.php"); ?>

<div class="container">
<h1>Fale conosco</h1><br /><br />

<?php
	$subjectPrefix = '[Contato via Site]';
	$emailTo = 'dmjoao@gmail.com';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$name     = stripslashes(trim($_POST['form-name']));
		$email    = stripslashes(trim($_POST['form-email']));
		$assunto  = stripslashes(trim($_POST['form-assunto']));
		$mensagem = stripslashes(trim($_POST['form-mensagem']));
		$pattern  = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';
    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $assunto)) {
        die("Header injection detected");
    }
    	$emailIsValid = preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email);
    if($name && $email && $emailIsValid && $assunto && $mensagem){
        $subject = "$subjectPrefix $assunto";
        $body = "Nome: $name <br /> Email: $email <br /> Mensagem: $mensagem";
        $headers  = 'MIME-Version: 1.1' . PHP_EOL;
        $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
        $headers .= "From: $name <$email>" . PHP_EOL;
        $headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>
    <?php if(isset($emailSent) && $emailSent): ?>
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-success text-center">Dados enviados com sucesso!!</div>
            <p>Abaixo seguem os dados que você enviou:</p>
            <?php echo('Nome: '.$name.'<br />'.'E-mail: '.$email.'<br />'.'Assunto: '.$assunto.'<br />'.'Mensagem: '.$mensagem).'<br />'.'<br />' ?>
        </div>
    <?php else: ?>
        <?php if(isset($hasError) && $hasError): ?>
        <div class="col-md-5 col-md-offset-4">
            <div class="alert alert-danger text-center">Houve um erro no envio, tente novamente mais tarde.</div>
        </div>
        <?php endif; ?>

    <div class="col-md-6 col-md-offset-3">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contact-form" class="form-horizontal" role="form" method="post">
            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Nome</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="form-name" name="form-name" placeholder="Nome" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" id="form-email" name="form-email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="assunto" class="col-lg-2 control-label">Assunto</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="form-assunto" name="form-assunto" placeholder="Assunto" required>
                </div>
            </div>
            <div class="form-group">
                <label for="mensagem" class="col-lg-2 control-label">Mensagem</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="form-mensagem" name="form-mensagem" placeholder="Mensagem" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <?php endif; ?>

    <?php
        $ieVersion = preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches) ? floatval($matches[1]) : null;
        if($ieVersion < 9 && $ieVersion != null) {
            $jQueryVersion = '1.10.2';
        } else {
            $jQueryVersion = '2.0.3';
        }
    ?>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/<?php echo $jQueryVersion; ?>/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/contact-form.js"></script>
</div>
<div style="clear: both"></div>
        
<?php include("rodape.php"); ?>