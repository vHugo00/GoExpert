<?php

require_once( __DIR__ .'/../includes/config.php'); // Inclui o arquivo de configuração

$url = sanitizeData($_GET['url']); // Recebe a URL, que é uma string única que identifica o casal no banco de dados

// Busca os dados do casal no banco de dados
$casal_info = $conn->prepare('SELECT * FROM casal_info WHERE url = :url LIMIT 1');
$casal_info->execute(array('url' => $url));
$casal = $casal_info->fetch();

// Retorna erro 404, caso não encontre o registro no banco de dados
if ($casal == NULL) {
    http_response_code(404);
    exit();
}

// Inclui o cabeçalho
include ( __DIR__ .'/../includes/layout/header.php');

?>

	<div class="container">
  <div class="row">
    <div class="col-md-3">
      <form id="imagem-casal-form" enctype="multipart/form-data">
        <label for="imagem-casal-input" class="photo-icon">
          <img class="img-thumbnail align-items-center d-flex flex-column mb-1" id="imagem-casal" src="<?php echo $casal['foto'] != NULL ? "/casal/" . $casal['url'] . "/foto/" . $casal['foto'] : '/assets/img/placeholder.png'; ?>">
          <small class="text-center">Clique para alterar a foto</small>
        </label>
        <input type="file" id="imagem-casal-input" name="imagem-casal" accept="image/*" style="display: none;">
        <input type="hidden" name="id" value="<?php echo $casal['ID']; ?>">
      </form>
    </div>
    <div class="col-md-9 default-form default-edit">
      <form id="casais-form" class="default-form" action="/casais/salvar-dados/">
        <div class="row justify-content-between">
          <!-- Informações do Esposo -->
          <div class="col-md-6 row g-3">
            <h3 class="m-0">Informações do Esposo</h3>
            <div class="form-group col-md-12">
              <label for="esposo-nome">Nome Completo</label>
              <input type="text" name="esposo-nome" class="form-control" value="<?php echo $casal['esposo_nome']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="esposo-cpf">Número do CPF</label>
              <input type="text" name="esposo-cpf" class="form-control cpf" placeholder="000.000.000-00" value="<?php echo $casal['esposo_cpf']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="esposo-rg">Número do RG</label>
              <input type="text" name="esposo-rg" class="form-control" value="<?php echo $casal['esposo_rg']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="esposo-nascimento">Data de Nascimento</label>
              <input type="date" name="esposo-nascimento" class="form-control date" value="<?php echo $casal['esposo_nascimento']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="contato-esposo">Telefone</label>
              <input type="text" name="contato-esposo" class="form-control phone" value="<?php echo $casal['contato_esposo']; ?>">
            </div>
          </div>

          <!-- Informações da Esposa -->
          <div class="col-md-6 row g-3">
            <h3 class="m-0">Informações da Esposa</h3>
            <div class="form-group col-md-12">
              <label for="esposa-nome">Nome Completo</label>
              <input type="text" name="esposa-nome" class="form-control" value="<?php echo $casal['esposa_nome']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="esposa-cpf">Número do CPF</label>
              <input type="text" name="esposa-cpf" class="form-control cpf" placeholder="000.000.000-00" value="<?php echo $casal['esposa_cpf']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="esposa-rg">Número do RG</label>
              <input type="text" name="esposa-rg" class="form-control" value="<?php echo $casal['esposa_rg']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="esposa-nascimento">Data de Nascimento</label>
              <input type="date" name="esposa-nascimento" class="form-control date" value="<?php echo $casal['esposa_nascimento']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="contato-esposa">Telefone</label>
              <input type="text" name="contato-esposa" class="form-control phone" value="<?php echo $casal['contato_esposa']; ?>">
            </div>
          </div>

          <!-- Informações do Casal -->
          <div class="col-md-12">
            <h3 class="m-0 mt-5">Informações do Casal</h3>
          </div>
          <div class="col-md-6 row g-3">
            <div class="form-group col-md-3">
              <label for="casal-cep" id="cep-label">CEP</label>
              <input type="text" name="casal-cep" class="form-control cep" placeholder="00000-000" value="<?php echo $casal['casal_cep']; ?>">
            </div>
            <div class="form-group col-md-9">
              <label for="casal-endereco">Endereço Completo</label>
              <input type="text" name="casal-endereco" class="form-control endereco" value="<?php echo $casal['casal_endereco']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="casal-estado">Estado</label>
              <input type="text" name="casal-estado" class="form-control estado" value="<?php echo $casal['casal_estado']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="casal-cidade">Cidade</label>
              <input type="text" name="casal-cidade" class="form-control cidade" value="<?php echo $casal['casal_cidade']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="casal-emergency1">Contato de Emergência 1</label>
              <input type="text" name="casal-emergency1" class="form-control phone" value="<?php echo $casal['casal_emergency1']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="casal-emergency2">Contato de Emergência 2</label>
              <input type="text" name="casal-emergency2" class="form-control phone" value="<?php echo $casal['casal_emergency2']; ?>">
            </div>
            <div class="form-group col-md-12">
              <label for="casal-endereco">Cabine</label>
              <input type="text" name="cabine" class="form-control" value="<?php echo $casal['cabine']; ?>">
            </div>
            <div class="form-group col-md-12">
              <label for="casal-email">E-mail</label>
              <input type="email" name="casal-email" class="form-control" value="<?php echo $casal['casal_email']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="data-compra">Data de Compra</label>
              <input type="date" name="data-compra" class="form-control date" value="<?php echo $casal['data_compra']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="casal-casamento">Aniversário de Casamento</label>
              <input type="date" name="casal-casamento" class="form-control date" value="<?php echo $casal['casal_casamento']; ?>">
            </div>
          </div>

          <!-- Informações de Pagamento -->
          <div class="col-md-12 row g-3">
            <div class="form-group col-md-4">
              <label for="pagamento-select">Forma de pagamento</label>
              <select name="pagamento-select" class="form-control pagamento-select" rows="3">
                <option>Selecione...</option>
                <option <?php echo $casal['pagamento'] == 'boleto' ? 'selected' : ''; ?> value="boleto">Boleto</option>
                <option <?php echo $casal['pagamento'] == 'pix' ? 'selected' : ''; ?> value="pix">Pix</option>
                <option <?php echo $casal['pagamento'] == 'credito' ? 'selected' : ''; ?> value="credito">Cartão de Crédito</option>
              </select>
              <input type="hidden" name="pagamento" class="form-control pagamento-input" value="<?php echo $casal['pagamento']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="valor-total">Valor Total</label>
              <input type="text" name="valor-total" class="form-control" value="<?php echo $casal['valor_total']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="valor-parcela">Valor da Parcela</label>
              <input type="text" name="valor-parcela" class="form-control" value="<?php echo $casal['valor_parcela']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="parcelas">Parcelas</label>
              <input type="text" name="parcelas" class="form-control" value="<?php echo $casal['parcelas']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="boleto">Boletos</label>
              <input type="text" name="boleto" class="form-control" value="<?php echo $casal['boleto']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="valor-costa">Valor da Costa</label>
              <input type="text" name="valor-costa" class="form-control" value="<?php echo $casal['valor_costa']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="vendedor">Vendedor</label>
              <input type="text" name="vendedor" class="form-control" value="<?php echo $casal['vendedor']; ?>">
            </div>
            <div class="form-group col-md-12">
              <label for="comentarios">Comentários</label>
              <textarea name="comentarios" class="form-control"><?php echo $casal['comentarios']; ?></textarea>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
          <input type="hidden" name="id" value="<?php echo $casal['ID']; ?>">
          <input type="hidden" name="action" value="edit">
          <button type="submit" class="btn btn-primary w-50">Salvar</button>
        </div>


        <div class="login-notices-wrapper">
          <div id="feedback-alert" class="" role="alert"></div>
        </div>

        <div class="d-grid gap-2">
        <input type="hidden" name="url" value="<?php echo $casal['url'] ?>">
        <button type="submit" class="mb-5 mt-4 btn btn-primary btn-block" id="btnGenerate" style="height: 50px;"><i class="fa fa-qrcode"></i> Atualizar</button>
        </div>



        <div class="d-grid gap-2">
          <input type="hidden" name="url" value="<?php echo $casal['url'] ?>">
          <button type="submit" class="mb-5 mt-4 btn btn-primary btn-block" id="btnGenerate" style="height: 50px;"><i class="fa fa-qrcode"></i>Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>



<?php

$qrcodeModal = true; // Inclui o modal de QR Code nesta página
include (__DIR__ .'/../includes/layout/modals.php'); // Inclui o arquivo que contém os modais
include_once( __DIR__ .'/../includes/layout/footer.php'); // Inclui o rodapé

?>