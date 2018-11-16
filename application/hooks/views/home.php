<?php if ($this->session->flashdata('success') == TRUE): ?>
<div><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error') == TRUE): ?>
<div><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>
 
<form method="POST" action="/pages/EnviarEmail">
 
<div>
    <label>Seu nome</label>
    <input type="text" name="nome" required/>
</div>
 
<div>
    <label>Seu email</label>
    <input type="email" name="email" required/>
</div>
 
<div>
    <label>Uma mensagem pra você</label>
    <textarea name="mensagem" rows="6" required></textarea>
</div>
 
<div>
    <label><input type="checkbox" name="anexo"/><strong>Enviar anexo</strong></label>
</div>
 
<div>
    <label><input type="checkbox" name="template"/><strong>Usar template</strong></label>
</div>
 
<div>
    <input type="submit" value="Enviar"/>
</div>
 
</form>