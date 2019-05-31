
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["cd_cliente_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razaosocial_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomefantasia_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cgc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscricao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["endereco_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cidade_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bairro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cep_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fone_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fone1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fax_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contato_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enderecocobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cidadecobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bairrocobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estadocobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cepcobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fonecobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["faxcobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contatocobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cgcentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscricaoentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enderecoentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cidadeentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bairroentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estadoentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cepentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foneentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contatoentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contatoexpedicao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foneexpedicao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["datacadastro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["obs_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consumidor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["licensa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["venctolicensa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["licensa1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["venctolicensa1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["qtdeliberada_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["licensa2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["venctolicensa2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icms_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["suframa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["limitecredito_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vendedor_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["restricao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["comissao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["transportadora_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["coleta_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["segmento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dataalteracao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["requisitos_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emailcobranca_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emailtecnico_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["midia_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["seg_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ter_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["qua_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["qui_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sex_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["certificado_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emailnfe_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fundacao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["site_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["financeiro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["complemento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razaosocialentrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["entrega_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contatotecnico_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cd_cliente_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cd_cliente_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razaosocial_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razaosocial_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomefantasia_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomefantasia_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscricao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscricao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["endereco_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["endereco_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cidade_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cidade_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bairro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bairro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cep_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cep_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fone_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fone_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fone1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fone1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fax_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fax_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contato_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contato_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enderecocobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enderecocobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cidadecobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cidadecobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bairrocobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bairrocobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estadocobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estadocobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cepcobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cepcobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fonecobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fonecobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["faxcobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["faxcobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contatocobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contatocobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cgcentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cgcentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscricaoentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscricaoentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enderecoentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enderecoentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cidadeentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cidadeentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bairroentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bairroentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estadoentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estadoentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cepentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cepentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foneentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foneentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contatoentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contatoentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contatoexpedicao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contatoexpedicao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foneexpedicao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foneexpedicao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["datacadastro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["datacadastro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["obs_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consumidor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consumidor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["licensa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["licensa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["venctolicensa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["venctolicensa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["licensa1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["licensa1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["venctolicensa1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["venctolicensa1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qtdeliberada_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qtdeliberada_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["licensa2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["licensa2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["venctolicensa2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["venctolicensa2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icms_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icms_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["suframa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["suframa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["limitecredito_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["limitecredito_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vendedor_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vendedor_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["restricao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["restricao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comissao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comissao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["transportadora_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["transportadora_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["coleta_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["coleta_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["segmento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["segmento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dataalteracao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dataalteracao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["requisitos_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["requisitos_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emailcobranca_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emailcobranca_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emailtecnico_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emailtecnico_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["midia_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["midia_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["seg_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["seg_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ter_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ter_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qua_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qua_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["qui_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["qui_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sex_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sex_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["certificado_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["certificado_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emailnfe_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emailnfe_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fundacao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fundacao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["site_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["site_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["financeiro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["financeiro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["complemento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["complemento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razaosocialentrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razaosocialentrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entrega_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entrega_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contatotecnico_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contatotecnico_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_cd_cliente_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cd_cliente__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_dbo_cliente_cd_cliente__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_dbo_cliente_cd_cliente__onfocus(this, iSeqRow) });
  $('#id_sc_field_razaosocial_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_razaosocial__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_dbo_cliente_razaosocial__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_dbo_cliente_razaosocial__onfocus(this, iSeqRow) });
  $('#id_sc_field_nomefantasia_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_nomefantasia__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_dbo_cliente_nomefantasia__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_dbo_cliente_nomefantasia__onfocus(this, iSeqRow) });
  $('#id_sc_field_cgc_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cgc__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_cgc__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_cgc__onfocus(this, iSeqRow) });
  $('#id_sc_field_inscricao_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_inscricao__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_dbo_cliente_inscricao__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_dbo_cliente_inscricao__onfocus(this, iSeqRow) });
  $('#id_sc_field_endereco_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_endereco__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_cliente_endereco__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_cliente_endereco__onfocus(this, iSeqRow) });
  $('#id_sc_field_cidade_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cidade__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_dbo_cliente_cidade__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_dbo_cliente_cidade__onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_estado__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_dbo_cliente_estado__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_dbo_cliente_estado__onfocus(this, iSeqRow) });
  $('#id_sc_field_bairro_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_bairro__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_dbo_cliente_bairro__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_dbo_cliente_bairro__onfocus(this, iSeqRow) });
  $('#id_sc_field_cep_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cep__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_cep__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_cep__onfocus(this, iSeqRow) });
  $('#id_sc_field_email_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_email__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_dbo_cliente_email__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dbo_cliente_email__onfocus(this, iSeqRow) });
  $('#id_sc_field_fone_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_fone__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_dbo_cliente_fone__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_dbo_cliente_fone__onfocus(this, iSeqRow) });
  $('#id_sc_field_fone1_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_fone1__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_dbo_cliente_fone1__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dbo_cliente_fone1__onfocus(this, iSeqRow) });
  $('#id_sc_field_fax_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_fax__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_fax__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_fax__onfocus(this, iSeqRow) });
  $('#id_sc_field_contato_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_contato__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_dbo_cliente_contato__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_dbo_cliente_contato__onfocus(this, iSeqRow) });
  $('#id_sc_field_enderecocobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_enderecocobranca__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_dbo_cliente_enderecocobranca__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_dbo_cliente_enderecocobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_cidadecobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cidadecobranca__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_cliente_cidadecobranca__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_cliente_cidadecobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_bairrocobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_bairrocobranca__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_cliente_bairrocobranca__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_cliente_bairrocobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_estadocobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_estadocobranca__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_cliente_estadocobranca__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_cliente_estadocobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_cepcobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cepcobranca__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_dbo_cliente_cepcobranca__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_dbo_cliente_cepcobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_fonecobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_fonecobranca__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_dbo_cliente_fonecobranca__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_dbo_cliente_fonecobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_faxcobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_faxcobranca__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_dbo_cliente_faxcobranca__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_dbo_cliente_faxcobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_contatocobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_contatocobranca__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_dbo_cliente_contatocobranca__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_dbo_cliente_contatocobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_cgcentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cgcentrega__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_dbo_cliente_cgcentrega__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_dbo_cliente_cgcentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_inscricaoentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_inscricaoentrega__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_dbo_cliente_inscricaoentrega__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_dbo_cliente_inscricaoentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_enderecoentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_enderecoentrega__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_dbo_cliente_enderecoentrega__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_dbo_cliente_enderecoentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_cidadeentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cidadeentrega__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_cidadeentrega__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_cidadeentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_bairroentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_bairroentrega__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_bairroentrega__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_bairroentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_estadoentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_estadoentrega__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_estadoentrega__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_estadoentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_cepentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_cepentrega__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_dbo_cliente_cepentrega__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_dbo_cliente_cepentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_foneentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_foneentrega__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_dbo_cliente_foneentrega__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_dbo_cliente_foneentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_contatoentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_contatoentrega__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_cliente_contatoentrega__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_cliente_contatoentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_contatoexpedicao_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_contatoexpedicao__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_dbo_cliente_contatoexpedicao__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_dbo_cliente_contatoexpedicao__onfocus(this, iSeqRow) });
  $('#id_sc_field_foneexpedicao_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_foneexpedicao__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_foneexpedicao__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_foneexpedicao__onfocus(this, iSeqRow) });
  $('#id_sc_field_datacadastro_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_datacadastro__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_dbo_cliente_datacadastro__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_dbo_cliente_datacadastro__onfocus(this, iSeqRow) });
  $('#id_sc_field_datacadastro__hora' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_datacadastro__hora_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_dbo_cliente_datacadastro__hora_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_dbo_cliente_datacadastro__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_obs_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_obs__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_obs__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_obs__onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_tipo__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_dbo_cliente_tipo__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_dbo_cliente_tipo__onfocus(this, iSeqRow) });
  $('#id_sc_field_consumidor_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_consumidor__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_dbo_cliente_consumidor__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_dbo_cliente_consumidor__onfocus(this, iSeqRow) });
  $('#id_sc_field_licensa_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_licensa__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_dbo_cliente_licensa__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_dbo_cliente_licensa__onfocus(this, iSeqRow) });
  $('#id_sc_field_venctolicensa_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_venctolicensa__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_venctolicensa__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_venctolicensa__onfocus(this, iSeqRow) });
  $('#id_sc_field_venctolicensa__hora' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_venctolicensa__hora_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_dbo_cliente_venctolicensa__hora_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_dbo_cliente_venctolicensa__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_licensa1_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_licensa1__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_cliente_licensa1__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_cliente_licensa1__onfocus(this, iSeqRow) });
  $('#id_sc_field_venctolicensa1_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_venctolicensa1__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_cliente_venctolicensa1__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_cliente_venctolicensa1__onfocus(this, iSeqRow) });
  $('#id_sc_field_venctolicensa1__hora' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_venctolicensa1__hora_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_dbo_cliente_venctolicensa1__hora_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_dbo_cliente_venctolicensa1__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_qtdeliberada_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_qtdeliberada__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_dbo_cliente_qtdeliberada__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_dbo_cliente_qtdeliberada__onfocus(this, iSeqRow) });
  $('#id_sc_field_licensa2_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_licensa2__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_cliente_licensa2__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_cliente_licensa2__onfocus(this, iSeqRow) });
  $('#id_sc_field_venctolicensa2_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_venctolicensa2__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_cliente_venctolicensa2__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_cliente_venctolicensa2__onfocus(this, iSeqRow) });
  $('#id_sc_field_venctolicensa2__hora' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_venctolicensa2__hora_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_dbo_cliente_venctolicensa2__hora_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_dbo_cliente_venctolicensa2__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_icms_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_icms__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_dbo_cliente_icms__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_dbo_cliente_icms__onfocus(this, iSeqRow) });
  $('#id_sc_field_suframa_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_suframa__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_dbo_cliente_suframa__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_dbo_cliente_suframa__onfocus(this, iSeqRow) });
  $('#id_sc_field_limitecredito_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_limitecredito__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_limitecredito__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_limitecredito__onfocus(this, iSeqRow) });
  $('#id_sc_field_vendedor_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_vendedor__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_cliente_vendedor__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_cliente_vendedor__onfocus(this, iSeqRow) });
  $('#id_sc_field_restricao_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_restricao__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_dbo_cliente_restricao__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_dbo_cliente_restricao__onfocus(this, iSeqRow) });
  $('#id_sc_field_comissao_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_comissao__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_cliente_comissao__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_cliente_comissao__onfocus(this, iSeqRow) });
  $('#id_sc_field_transportadora_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_transportadora__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_cliente_transportadora__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_cliente_transportadora__onfocus(this, iSeqRow) });
  $('#id_sc_field_coleta_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_coleta__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_dbo_cliente_coleta__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_dbo_cliente_coleta__onfocus(this, iSeqRow) });
  $('#id_sc_field_segmento_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_segmento__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_cliente_segmento__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_cliente_segmento__onfocus(this, iSeqRow) });
  $('#id_sc_field_dataalteracao_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_dataalteracao__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_dataalteracao__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_dataalteracao__onfocus(this, iSeqRow) });
  $('#id_sc_field_dataalteracao__hora' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_dataalteracao__hora_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_dbo_cliente_dataalteracao__hora_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_dbo_cliente_dataalteracao__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_usuario__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_dbo_cliente_usuario__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_dbo_cliente_usuario__onfocus(this, iSeqRow) });
  $('#id_sc_field_requisitos_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_requisitos__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_dbo_cliente_requisitos__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_dbo_cliente_requisitos__onfocus(this, iSeqRow) });
  $('#id_sc_field_banco_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_banco__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_dbo_cliente_banco__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dbo_cliente_banco__onfocus(this, iSeqRow) });
  $('#id_sc_field_emailcobranca_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_emailcobranca__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_emailcobranca__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_emailcobranca__onfocus(this, iSeqRow) });
  $('#id_sc_field_emailtecnico_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_emailtecnico__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_dbo_cliente_emailtecnico__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_dbo_cliente_emailtecnico__onfocus(this, iSeqRow) });
  $('#id_sc_field_midia_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_midia__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_dbo_cliente_midia__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dbo_cliente_midia__onfocus(this, iSeqRow) });
  $('#id_sc_field_seg_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_seg__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_seg__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_seg__onfocus(this, iSeqRow) });
  $('#id_sc_field_ter_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_ter__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_ter__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_ter__onfocus(this, iSeqRow) });
  $('#id_sc_field_qua_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_qua__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_qua__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_qua__onfocus(this, iSeqRow) });
  $('#id_sc_field_qui_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_qui__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_qui__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_qui__onfocus(this, iSeqRow) });
  $('#id_sc_field_sex_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_sex__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_dbo_cliente_sex__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_dbo_cliente_sex__onfocus(this, iSeqRow) });
  $('#id_sc_field_certificado_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_certificado__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_dbo_cliente_certificado__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_dbo_cliente_certificado__onfocus(this, iSeqRow) });
  $('#id_sc_field_emailnfe_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_emailnfe__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_cliente_emailnfe__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_cliente_emailnfe__onfocus(this, iSeqRow) });
  $('#id_sc_field_fundacao_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_fundacao__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_cliente_fundacao__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_cliente_fundacao__onfocus(this, iSeqRow) });
  $('#id_sc_field_fundacao__hora' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_fundacao__hora_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_dbo_cliente_fundacao__hora_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_dbo_cliente_fundacao__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_site_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_site__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_dbo_cliente_site__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_dbo_cliente_site__onfocus(this, iSeqRow) });
  $('#id_sc_field_financeiro_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_financeiro__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_dbo_cliente_financeiro__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_dbo_cliente_financeiro__onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_numero__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_dbo_cliente_numero__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_dbo_cliente_numero__onfocus(this, iSeqRow) });
  $('#id_sc_field_complemento_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_complemento__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_dbo_cliente_complemento__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_dbo_cliente_complemento__onfocus(this, iSeqRow) });
  $('#id_sc_field_razaosocialentrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_razaosocialentrega__onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_dbo_cliente_razaosocialentrega__onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_dbo_cliente_razaosocialentrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_entrega_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_entrega__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_dbo_cliente_entrega__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_dbo_cliente_entrega__onfocus(this, iSeqRow) });
  $('#id_sc_field_contatotecnico_' + iSeqRow).bind('blur', function() { sc_form_dbo_cliente_contatotecnico__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_cliente_contatotecnico__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_cliente_contatotecnico__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_dbo_cliente_cd_cliente__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cd_cliente_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cd_cliente__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cd_cliente__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_razaosocial__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_razaosocial_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_razaosocial__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_razaosocial__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_nomefantasia__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_nomefantasia_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_nomefantasia__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_nomefantasia__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cgc__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cgc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cgc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cgc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_inscricao__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_inscricao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_inscricao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_inscricao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_endereco__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_endereco_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_endereco__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_endereco__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cidade__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cidade_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cidade__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cidade__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_estado__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_estado_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_estado__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_estado__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_bairro__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_bairro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_bairro__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_bairro__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cep__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cep_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cep__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cep__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_email__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_email_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_email__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_email__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fone__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_fone_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fone__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_fone__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fone1__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_fone1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fone1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_fone1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fax__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_fax_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fax__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_fax__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contato__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_contato_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contato__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_contato__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_enderecocobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_enderecocobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_enderecocobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_enderecocobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cidadecobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cidadecobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cidadecobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cidadecobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_bairrocobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_bairrocobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_bairrocobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_bairrocobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_estadocobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_estadocobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_estadocobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_estadocobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cepcobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cepcobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cepcobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cepcobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fonecobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_fonecobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fonecobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_fonecobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_faxcobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_faxcobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_faxcobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_faxcobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contatocobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_contatocobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contatocobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_contatocobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cgcentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cgcentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cgcentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cgcentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_inscricaoentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_inscricaoentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_inscricaoentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_inscricaoentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_enderecoentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_enderecoentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_enderecoentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_enderecoentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cidadeentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cidadeentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cidadeentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cidadeentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_bairroentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_bairroentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_bairroentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_bairroentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_estadoentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_estadoentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_estadoentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_estadoentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cepentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_cepentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_cepentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_cepentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_foneentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_foneentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_foneentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_foneentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contatoentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_contatoentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contatoentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_contatoentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contatoexpedicao__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_contatoexpedicao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contatoexpedicao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_contatoexpedicao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_foneexpedicao__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_foneexpedicao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_foneexpedicao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_foneexpedicao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_datacadastro__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_datacadastro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_datacadastro__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_datacadastro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_datacadastro__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_datacadastro__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_datacadastro__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_datacadastro__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_obs__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_obs_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_obs__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_obs__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_tipo__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_tipo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_tipo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_tipo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_consumidor__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_consumidor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_consumidor__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_consumidor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_licensa__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_licensa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_licensa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_licensa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_venctolicensa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_venctolicensa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_licensa1__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_licensa1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_licensa1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_licensa1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa1__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_venctolicensa1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa1__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_venctolicensa1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa1__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa1__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_qtdeliberada__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_qtdeliberada_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_qtdeliberada__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_qtdeliberada__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_licensa2__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_licensa2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_licensa2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_licensa2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa2__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_venctolicensa2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa2__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_venctolicensa2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa2__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_venctolicensa2__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_icms__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_icms_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_icms__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_icms__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_suframa__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_suframa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_suframa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_suframa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_limitecredito__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_limitecredito_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_limitecredito__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_limitecredito__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_vendedor__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_vendedor_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_vendedor__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_vendedor__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_restricao__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_restricao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_restricao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_restricao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_comissao__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_comissao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_comissao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_comissao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_transportadora__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_transportadora_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_transportadora__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_transportadora__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_coleta__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_coleta_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_coleta__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_coleta__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_segmento__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_segmento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_segmento__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_segmento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_dataalteracao__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_dataalteracao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_dataalteracao__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_dataalteracao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_dataalteracao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_dataalteracao__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_dataalteracao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_dataalteracao__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_usuario__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_usuario_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_usuario__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_usuario__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_requisitos__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_requisitos_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_requisitos__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_requisitos__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_banco__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_banco_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_banco__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_banco__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_emailcobranca__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_emailcobranca_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_emailcobranca__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_emailcobranca__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_emailtecnico__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_emailtecnico_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_emailtecnico__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_emailtecnico__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_midia__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_midia_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_midia__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_midia__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_seg__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_seg_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_seg__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_seg__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_ter__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_ter_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_ter__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_ter__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_qua__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_qua_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_qua__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_qua__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_qui__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_qui_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_qui__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_qui__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_sex__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_sex_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_sex__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_sex__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_certificado__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_certificado_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_certificado__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_certificado__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_emailnfe__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_emailnfe_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_emailnfe__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_emailnfe__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fundacao__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_fundacao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fundacao__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_fundacao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fundacao__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_fundacao__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_fundacao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_fundacao__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_site__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_site_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_site__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_site__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_financeiro__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_financeiro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_financeiro__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_financeiro__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_numero__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_numero_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_numero__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_numero__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_complemento__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_complemento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_complemento__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_complemento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_razaosocialentrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_razaosocialentrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_razaosocialentrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_razaosocialentrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_entrega__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_entrega_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_entrega__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_entrega__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contatotecnico__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_cliente_validate_contatotecnico_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_cliente_contatotecnico__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_cliente_contatotecnico__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("cd_cliente_", "", status);
	displayChange_field("razaosocial_", "", status);
	displayChange_field("nomefantasia_", "", status);
	displayChange_field("cgc_", "", status);
	displayChange_field("inscricao_", "", status);
	displayChange_field("endereco_", "", status);
	displayChange_field("cidade_", "", status);
	displayChange_field("estado_", "", status);
	displayChange_field("bairro_", "", status);
	displayChange_field("cep_", "", status);
	displayChange_field("email_", "", status);
	displayChange_field("fone_", "", status);
	displayChange_field("fone1_", "", status);
	displayChange_field("fax_", "", status);
	displayChange_field("contato_", "", status);
	displayChange_field("enderecocobranca_", "", status);
	displayChange_field("cidadecobranca_", "", status);
	displayChange_field("bairrocobranca_", "", status);
	displayChange_field("estadocobranca_", "", status);
	displayChange_field("cepcobranca_", "", status);
	displayChange_field("fonecobranca_", "", status);
	displayChange_field("faxcobranca_", "", status);
	displayChange_field("contatocobranca_", "", status);
	displayChange_field("cgcentrega_", "", status);
	displayChange_field("inscricaoentrega_", "", status);
	displayChange_field("enderecoentrega_", "", status);
	displayChange_field("cidadeentrega_", "", status);
	displayChange_field("bairroentrega_", "", status);
	displayChange_field("estadoentrega_", "", status);
	displayChange_field("cepentrega_", "", status);
	displayChange_field("foneentrega_", "", status);
	displayChange_field("contatoentrega_", "", status);
	displayChange_field("contatoexpedicao_", "", status);
	displayChange_field("foneexpedicao_", "", status);
	displayChange_field("datacadastro_", "", status);
	displayChange_field("obs_", "", status);
	displayChange_field("tipo_", "", status);
	displayChange_field("consumidor_", "", status);
	displayChange_field("licensa_", "", status);
	displayChange_field("venctolicensa_", "", status);
	displayChange_field("licensa1_", "", status);
	displayChange_field("venctolicensa1_", "", status);
	displayChange_field("qtdeliberada_", "", status);
	displayChange_field("licensa2_", "", status);
	displayChange_field("venctolicensa2_", "", status);
	displayChange_field("icms_", "", status);
	displayChange_field("suframa_", "", status);
	displayChange_field("limitecredito_", "", status);
	displayChange_field("vendedor_", "", status);
	displayChange_field("restricao_", "", status);
	displayChange_field("comissao_", "", status);
	displayChange_field("transportadora_", "", status);
	displayChange_field("coleta_", "", status);
	displayChange_field("segmento_", "", status);
	displayChange_field("dataalteracao_", "", status);
	displayChange_field("usuario_", "", status);
	displayChange_field("requisitos_", "", status);
	displayChange_field("banco_", "", status);
	displayChange_field("emailcobranca_", "", status);
	displayChange_field("emailtecnico_", "", status);
	displayChange_field("midia_", "", status);
	displayChange_field("seg_", "", status);
	displayChange_field("ter_", "", status);
	displayChange_field("qua_", "", status);
	displayChange_field("qui_", "", status);
	displayChange_field("sex_", "", status);
	displayChange_field("certificado_", "", status);
	displayChange_field("emailnfe_", "", status);
	displayChange_field("fundacao_", "", status);
	displayChange_field("site_", "", status);
	displayChange_field("financeiro_", "", status);
	displayChange_field("numero_", "", status);
	displayChange_field("complemento_", "", status);
	displayChange_field("razaosocialentrega_", "", status);
	displayChange_field("entrega_", "", status);
	displayChange_field("contatotecnico_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_cd_cliente_(row, status);
	displayChange_field_razaosocial_(row, status);
	displayChange_field_nomefantasia_(row, status);
	displayChange_field_cgc_(row, status);
	displayChange_field_inscricao_(row, status);
	displayChange_field_endereco_(row, status);
	displayChange_field_cidade_(row, status);
	displayChange_field_estado_(row, status);
	displayChange_field_bairro_(row, status);
	displayChange_field_cep_(row, status);
	displayChange_field_email_(row, status);
	displayChange_field_fone_(row, status);
	displayChange_field_fone1_(row, status);
	displayChange_field_fax_(row, status);
	displayChange_field_contato_(row, status);
	displayChange_field_enderecocobranca_(row, status);
	displayChange_field_cidadecobranca_(row, status);
	displayChange_field_bairrocobranca_(row, status);
	displayChange_field_estadocobranca_(row, status);
	displayChange_field_cepcobranca_(row, status);
	displayChange_field_fonecobranca_(row, status);
	displayChange_field_faxcobranca_(row, status);
	displayChange_field_contatocobranca_(row, status);
	displayChange_field_cgcentrega_(row, status);
	displayChange_field_inscricaoentrega_(row, status);
	displayChange_field_enderecoentrega_(row, status);
	displayChange_field_cidadeentrega_(row, status);
	displayChange_field_bairroentrega_(row, status);
	displayChange_field_estadoentrega_(row, status);
	displayChange_field_cepentrega_(row, status);
	displayChange_field_foneentrega_(row, status);
	displayChange_field_contatoentrega_(row, status);
	displayChange_field_contatoexpedicao_(row, status);
	displayChange_field_foneexpedicao_(row, status);
	displayChange_field_datacadastro_(row, status);
	displayChange_field_obs_(row, status);
	displayChange_field_tipo_(row, status);
	displayChange_field_consumidor_(row, status);
	displayChange_field_licensa_(row, status);
	displayChange_field_venctolicensa_(row, status);
	displayChange_field_licensa1_(row, status);
	displayChange_field_venctolicensa1_(row, status);
	displayChange_field_qtdeliberada_(row, status);
	displayChange_field_licensa2_(row, status);
	displayChange_field_venctolicensa2_(row, status);
	displayChange_field_icms_(row, status);
	displayChange_field_suframa_(row, status);
	displayChange_field_limitecredito_(row, status);
	displayChange_field_vendedor_(row, status);
	displayChange_field_restricao_(row, status);
	displayChange_field_comissao_(row, status);
	displayChange_field_transportadora_(row, status);
	displayChange_field_coleta_(row, status);
	displayChange_field_segmento_(row, status);
	displayChange_field_dataalteracao_(row, status);
	displayChange_field_usuario_(row, status);
	displayChange_field_requisitos_(row, status);
	displayChange_field_banco_(row, status);
	displayChange_field_emailcobranca_(row, status);
	displayChange_field_emailtecnico_(row, status);
	displayChange_field_midia_(row, status);
	displayChange_field_seg_(row, status);
	displayChange_field_ter_(row, status);
	displayChange_field_qua_(row, status);
	displayChange_field_qui_(row, status);
	displayChange_field_sex_(row, status);
	displayChange_field_certificado_(row, status);
	displayChange_field_emailnfe_(row, status);
	displayChange_field_fundacao_(row, status);
	displayChange_field_site_(row, status);
	displayChange_field_financeiro_(row, status);
	displayChange_field_numero_(row, status);
	displayChange_field_complemento_(row, status);
	displayChange_field_razaosocialentrega_(row, status);
	displayChange_field_entrega_(row, status);
	displayChange_field_contatotecnico_(row, status);
}

function displayChange_field(field, row, status) {
	if ("cd_cliente_" == field) {
		displayChange_field_cd_cliente_(row, status);
	}
	if ("razaosocial_" == field) {
		displayChange_field_razaosocial_(row, status);
	}
	if ("nomefantasia_" == field) {
		displayChange_field_nomefantasia_(row, status);
	}
	if ("cgc_" == field) {
		displayChange_field_cgc_(row, status);
	}
	if ("inscricao_" == field) {
		displayChange_field_inscricao_(row, status);
	}
	if ("endereco_" == field) {
		displayChange_field_endereco_(row, status);
	}
	if ("cidade_" == field) {
		displayChange_field_cidade_(row, status);
	}
	if ("estado_" == field) {
		displayChange_field_estado_(row, status);
	}
	if ("bairro_" == field) {
		displayChange_field_bairro_(row, status);
	}
	if ("cep_" == field) {
		displayChange_field_cep_(row, status);
	}
	if ("email_" == field) {
		displayChange_field_email_(row, status);
	}
	if ("fone_" == field) {
		displayChange_field_fone_(row, status);
	}
	if ("fone1_" == field) {
		displayChange_field_fone1_(row, status);
	}
	if ("fax_" == field) {
		displayChange_field_fax_(row, status);
	}
	if ("contato_" == field) {
		displayChange_field_contato_(row, status);
	}
	if ("enderecocobranca_" == field) {
		displayChange_field_enderecocobranca_(row, status);
	}
	if ("cidadecobranca_" == field) {
		displayChange_field_cidadecobranca_(row, status);
	}
	if ("bairrocobranca_" == field) {
		displayChange_field_bairrocobranca_(row, status);
	}
	if ("estadocobranca_" == field) {
		displayChange_field_estadocobranca_(row, status);
	}
	if ("cepcobranca_" == field) {
		displayChange_field_cepcobranca_(row, status);
	}
	if ("fonecobranca_" == field) {
		displayChange_field_fonecobranca_(row, status);
	}
	if ("faxcobranca_" == field) {
		displayChange_field_faxcobranca_(row, status);
	}
	if ("contatocobranca_" == field) {
		displayChange_field_contatocobranca_(row, status);
	}
	if ("cgcentrega_" == field) {
		displayChange_field_cgcentrega_(row, status);
	}
	if ("inscricaoentrega_" == field) {
		displayChange_field_inscricaoentrega_(row, status);
	}
	if ("enderecoentrega_" == field) {
		displayChange_field_enderecoentrega_(row, status);
	}
	if ("cidadeentrega_" == field) {
		displayChange_field_cidadeentrega_(row, status);
	}
	if ("bairroentrega_" == field) {
		displayChange_field_bairroentrega_(row, status);
	}
	if ("estadoentrega_" == field) {
		displayChange_field_estadoentrega_(row, status);
	}
	if ("cepentrega_" == field) {
		displayChange_field_cepentrega_(row, status);
	}
	if ("foneentrega_" == field) {
		displayChange_field_foneentrega_(row, status);
	}
	if ("contatoentrega_" == field) {
		displayChange_field_contatoentrega_(row, status);
	}
	if ("contatoexpedicao_" == field) {
		displayChange_field_contatoexpedicao_(row, status);
	}
	if ("foneexpedicao_" == field) {
		displayChange_field_foneexpedicao_(row, status);
	}
	if ("datacadastro_" == field) {
		displayChange_field_datacadastro_(row, status);
	}
	if ("obs_" == field) {
		displayChange_field_obs_(row, status);
	}
	if ("tipo_" == field) {
		displayChange_field_tipo_(row, status);
	}
	if ("consumidor_" == field) {
		displayChange_field_consumidor_(row, status);
	}
	if ("licensa_" == field) {
		displayChange_field_licensa_(row, status);
	}
	if ("venctolicensa_" == field) {
		displayChange_field_venctolicensa_(row, status);
	}
	if ("licensa1_" == field) {
		displayChange_field_licensa1_(row, status);
	}
	if ("venctolicensa1_" == field) {
		displayChange_field_venctolicensa1_(row, status);
	}
	if ("qtdeliberada_" == field) {
		displayChange_field_qtdeliberada_(row, status);
	}
	if ("licensa2_" == field) {
		displayChange_field_licensa2_(row, status);
	}
	if ("venctolicensa2_" == field) {
		displayChange_field_venctolicensa2_(row, status);
	}
	if ("icms_" == field) {
		displayChange_field_icms_(row, status);
	}
	if ("suframa_" == field) {
		displayChange_field_suframa_(row, status);
	}
	if ("limitecredito_" == field) {
		displayChange_field_limitecredito_(row, status);
	}
	if ("vendedor_" == field) {
		displayChange_field_vendedor_(row, status);
	}
	if ("restricao_" == field) {
		displayChange_field_restricao_(row, status);
	}
	if ("comissao_" == field) {
		displayChange_field_comissao_(row, status);
	}
	if ("transportadora_" == field) {
		displayChange_field_transportadora_(row, status);
	}
	if ("coleta_" == field) {
		displayChange_field_coleta_(row, status);
	}
	if ("segmento_" == field) {
		displayChange_field_segmento_(row, status);
	}
	if ("dataalteracao_" == field) {
		displayChange_field_dataalteracao_(row, status);
	}
	if ("usuario_" == field) {
		displayChange_field_usuario_(row, status);
	}
	if ("requisitos_" == field) {
		displayChange_field_requisitos_(row, status);
	}
	if ("banco_" == field) {
		displayChange_field_banco_(row, status);
	}
	if ("emailcobranca_" == field) {
		displayChange_field_emailcobranca_(row, status);
	}
	if ("emailtecnico_" == field) {
		displayChange_field_emailtecnico_(row, status);
	}
	if ("midia_" == field) {
		displayChange_field_midia_(row, status);
	}
	if ("seg_" == field) {
		displayChange_field_seg_(row, status);
	}
	if ("ter_" == field) {
		displayChange_field_ter_(row, status);
	}
	if ("qua_" == field) {
		displayChange_field_qua_(row, status);
	}
	if ("qui_" == field) {
		displayChange_field_qui_(row, status);
	}
	if ("sex_" == field) {
		displayChange_field_sex_(row, status);
	}
	if ("certificado_" == field) {
		displayChange_field_certificado_(row, status);
	}
	if ("emailnfe_" == field) {
		displayChange_field_emailnfe_(row, status);
	}
	if ("fundacao_" == field) {
		displayChange_field_fundacao_(row, status);
	}
	if ("site_" == field) {
		displayChange_field_site_(row, status);
	}
	if ("financeiro_" == field) {
		displayChange_field_financeiro_(row, status);
	}
	if ("numero_" == field) {
		displayChange_field_numero_(row, status);
	}
	if ("complemento_" == field) {
		displayChange_field_complemento_(row, status);
	}
	if ("razaosocialentrega_" == field) {
		displayChange_field_razaosocialentrega_(row, status);
	}
	if ("entrega_" == field) {
		displayChange_field_entrega_(row, status);
	}
	if ("contatotecnico_" == field) {
		displayChange_field_contatotecnico_(row, status);
	}
}

function displayChange_field_cd_cliente_(row, status) {
}

function displayChange_field_razaosocial_(row, status) {
}

function displayChange_field_nomefantasia_(row, status) {
}

function displayChange_field_cgc_(row, status) {
}

function displayChange_field_inscricao_(row, status) {
}

function displayChange_field_endereco_(row, status) {
}

function displayChange_field_cidade_(row, status) {
}

function displayChange_field_estado_(row, status) {
}

function displayChange_field_bairro_(row, status) {
}

function displayChange_field_cep_(row, status) {
}

function displayChange_field_email_(row, status) {
}

function displayChange_field_fone_(row, status) {
}

function displayChange_field_fone1_(row, status) {
}

function displayChange_field_fax_(row, status) {
}

function displayChange_field_contato_(row, status) {
}

function displayChange_field_enderecocobranca_(row, status) {
}

function displayChange_field_cidadecobranca_(row, status) {
}

function displayChange_field_bairrocobranca_(row, status) {
}

function displayChange_field_estadocobranca_(row, status) {
}

function displayChange_field_cepcobranca_(row, status) {
}

function displayChange_field_fonecobranca_(row, status) {
}

function displayChange_field_faxcobranca_(row, status) {
}

function displayChange_field_contatocobranca_(row, status) {
}

function displayChange_field_cgcentrega_(row, status) {
}

function displayChange_field_inscricaoentrega_(row, status) {
}

function displayChange_field_enderecoentrega_(row, status) {
}

function displayChange_field_cidadeentrega_(row, status) {
}

function displayChange_field_bairroentrega_(row, status) {
}

function displayChange_field_estadoentrega_(row, status) {
}

function displayChange_field_cepentrega_(row, status) {
}

function displayChange_field_foneentrega_(row, status) {
}

function displayChange_field_contatoentrega_(row, status) {
}

function displayChange_field_contatoexpedicao_(row, status) {
}

function displayChange_field_foneexpedicao_(row, status) {
}

function displayChange_field_datacadastro_(row, status) {
}

function displayChange_field_obs_(row, status) {
}

function displayChange_field_tipo_(row, status) {
}

function displayChange_field_consumidor_(row, status) {
}

function displayChange_field_licensa_(row, status) {
}

function displayChange_field_venctolicensa_(row, status) {
}

function displayChange_field_licensa1_(row, status) {
}

function displayChange_field_venctolicensa1_(row, status) {
}

function displayChange_field_qtdeliberada_(row, status) {
}

function displayChange_field_licensa2_(row, status) {
}

function displayChange_field_venctolicensa2_(row, status) {
}

function displayChange_field_icms_(row, status) {
}

function displayChange_field_suframa_(row, status) {
}

function displayChange_field_limitecredito_(row, status) {
}

function displayChange_field_vendedor_(row, status) {
}

function displayChange_field_restricao_(row, status) {
}

function displayChange_field_comissao_(row, status) {
}

function displayChange_field_transportadora_(row, status) {
}

function displayChange_field_coleta_(row, status) {
}

function displayChange_field_segmento_(row, status) {
}

function displayChange_field_dataalteracao_(row, status) {
}

function displayChange_field_usuario_(row, status) {
}

function displayChange_field_requisitos_(row, status) {
}

function displayChange_field_banco_(row, status) {
}

function displayChange_field_emailcobranca_(row, status) {
}

function displayChange_field_emailtecnico_(row, status) {
}

function displayChange_field_midia_(row, status) {
}

function displayChange_field_seg_(row, status) {
}

function displayChange_field_ter_(row, status) {
}

function displayChange_field_qua_(row, status) {
}

function displayChange_field_qui_(row, status) {
}

function displayChange_field_sex_(row, status) {
}

function displayChange_field_certificado_(row, status) {
}

function displayChange_field_emailnfe_(row, status) {
}

function displayChange_field_fundacao_(row, status) {
}

function displayChange_field_site_(row, status) {
}

function displayChange_field_financeiro_(row, status) {
}

function displayChange_field_numero_(row, status) {
}

function displayChange_field_complemento_(row, status) {
}

function displayChange_field_razaosocialentrega_(row, status) {
}

function displayChange_field_entrega_(row, status) {
}

function displayChange_field_contatotecnico_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_dbo_cliente_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
		}
	}
}
<?php

$formWidthCorrection = '';
if (false !== strpos($this->Ini->form_table_width, 'calc')) {
	$formWidthCalc = substr($this->Ini->form_table_width, strpos($this->Ini->form_table_width, '(') + 1);
	$formWidthCalc = substr($formWidthCalc, 0, strpos($formWidthCalc, ')'));
	$formWidthParts = explode(' ', $formWidthCalc);
	if (3 == count($formWidthParts) && 'px' == substr($formWidthParts[2], -2)) {
		$formWidthParts[2] = substr($formWidthParts[2], 0, -2) / 2;
		$formWidthCorrection = $formWidthParts[1] . ' ' . $formWidthParts[2];
	}
}

?>

$(window).scroll(function() {
	scSetFixedHeaders();
});

var rerunHeaderDisplay = 1;

function scSetFixedHeaders(forceDisplay) {
	if (null == forceDisplay) {
		forceDisplay = false;
	}
	var divScroll, formHeaders, headerPlaceholder;
	formHeaders = scGetHeaderRow();
	headerPlaceholder = $("#sc-id-fixedheaders-placeholder");
	if (!formHeaders) {
		headerPlaceholder.hide();
	}
	else {
		if (scIsHeaderVisible(formHeaders)) {
			headerPlaceholder.hide();
		}
		else {
			if (!headerPlaceholder.filter(":visible").length || forceDisplay) {
				scSetFixedHeadersContents(formHeaders, headerPlaceholder);
				scSetFixedHeadersSize(formHeaders);
				headerPlaceholder.show();
			}
			scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
			if (0 < rerunHeaderDisplay) {
				rerunHeaderDisplay--;
				setTimeout(function() {
					scSetFixedHeadersContents(formHeaders, headerPlaceholder);
					scSetFixedHeadersSize(formHeaders);
					headerPlaceholder.show();
					scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
				}, 5);
			}
		}
	}
}

function scSetFixedHeadersPosition(formHeaders, headerPlaceholder) {
	if (formHeaders) {
		headerPlaceholder.css({"top": 0<?php echo $formWidthCorrection ?>, "left": (Math.floor(formHeaders.position().left) - $(document).scrollLeft()<?php echo $formWidthCorrection ?>) + "px"});
	}
}

function scIsHeaderVisible(formHeaders) {
	return formHeaders.offset().top > $(document).scrollTop();
}

function scGetHeaderRow() {
	var formHeaders = $(".sc-ui-header-row").filter(":visible");
	if (!formHeaders.length) {
		formHeaders = false;
	}
	return formHeaders;
}

function scSetFixedHeadersContents(formHeaders, headerPlaceholder) {
	var i, htmlContent;
	htmlContent = "<table id=\"sc-id-fixed-headers\" class=\"scFormTable\">";
	for (i = 0; i < formHeaders.length; i++) {
		htmlContent += "<tr class=\"scFormLabelOddMult\" id=\"sc-id-headers-row-" + i + "\">" + $(formHeaders[i]).html() + "</tr>";
	}
	htmlContent += "</table>";
	headerPlaceholder.html(htmlContent);
}

function scSetFixedHeadersSize(formHeaders) {
	var i, j, headerColumns, formColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;
	tableOriginal = $("#hidden_bloco_0");
	tableHeaders = document.getElementById("sc-id-fixed-headers");
	$(tableHeaders).css("width", $(tableOriginal).outerWidth());
	for (i = 0; i < formHeaders.length; i++) {
		headerColumns = $("#sc-id-fixed-headers-row-" + i).find("td");
		formColumns = $(formHeaders[i]).find("td");
		for (j = 0; j < formColumns.length; j++) {
			if (window.getComputedStyle(formColumns[j])) {
				cellWidth = window.getComputedStyle(formColumns[j]).width;
				cellHeight = window.getComputedStyle(formColumns[j]).height;
			}
			else {
				cellWidth = $(formColumns[j]).width() + "px";
				cellHeight = $(formColumns[j]).height() + "px";
			}
			$(headerColumns[j]).css({
				"width": cellWidth,
				"height": cellHeight
			});
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_datacadastro_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_datacadastro_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['datacadastro_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['datacadastro_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_dbo_cliente_validate_datacadastro_(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['datacadastro_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true,
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

  $("#id_sc_field_venctolicensa_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_venctolicensa_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['venctolicensa_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['venctolicensa_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_dbo_cliente_validate_venctolicensa_(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['venctolicensa_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true,
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

  $("#id_sc_field_venctolicensa1_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_venctolicensa1_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['venctolicensa1_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['venctolicensa1_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_dbo_cliente_validate_venctolicensa1_(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['venctolicensa1_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true,
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

  $("#id_sc_field_venctolicensa2_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_venctolicensa2_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['venctolicensa2_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['venctolicensa2_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_dbo_cliente_validate_venctolicensa2_(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['venctolicensa2_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true,
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

  $("#id_sc_field_dataalteracao_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_dataalteracao_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['dataalteracao_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dataalteracao_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_dbo_cliente_validate_dataalteracao_(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dataalteracao_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true,
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

  $("#id_sc_field_fundacao_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fundacao_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fundacao_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fundacao_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_dbo_cliente_validate_fundacao_(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fundacao_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true,
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
