<?php
//
class form_dbo_cliente_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'navPage'           => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => '',
                                'ajaxMessage'       => '',
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $cd_cliente_;
   var $razaosocial_;
   var $nomefantasia_;
   var $cgc_;
   var $inscricao_;
   var $endereco_;
   var $cidade_;
   var $estado_;
   var $bairro_;
   var $cep_;
   var $email_;
   var $fone_;
   var $fone1_;
   var $fax_;
   var $contato_;
   var $enderecocobranca_;
   var $cidadecobranca_;
   var $bairrocobranca_;
   var $estadocobranca_;
   var $cepcobranca_;
   var $fonecobranca_;
   var $faxcobranca_;
   var $contatocobranca_;
   var $cgcentrega_;
   var $inscricaoentrega_;
   var $enderecoentrega_;
   var $cidadeentrega_;
   var $bairroentrega_;
   var $estadoentrega_;
   var $cepentrega_;
   var $foneentrega_;
   var $contatoentrega_;
   var $contatoexpedicao_;
   var $foneexpedicao_;
   var $datacadastro_;
   var $datacadastro__hora;
   var $obs_;
   var $tipo_;
   var $consumidor_;
   var $licensa_;
   var $venctolicensa_;
   var $venctolicensa__hora;
   var $licensa1_;
   var $venctolicensa1_;
   var $venctolicensa1__hora;
   var $qtdeliberada_;
   var $licensa2_;
   var $venctolicensa2_;
   var $venctolicensa2__hora;
   var $icms_;
   var $suframa_;
   var $limitecredito_;
   var $vendedor_;
   var $restricao_;
   var $comissao_;
   var $transportadora_;
   var $coleta_;
   var $segmento_;
   var $dataalteracao_;
   var $dataalteracao__hora;
   var $usuario_;
   var $requisitos_;
   var $banco_;
   var $emailcobranca_;
   var $emailtecnico_;
   var $midia_;
   var $seg_;
   var $ter_;
   var $qua_;
   var $qui_;
   var $sex_;
   var $certificado_;
   var $emailnfe_;
   var $fundacao_;
   var $fundacao__hora;
   var $site_;
   var $financeiro_;
   var $numero_;
   var $complemento_;
   var $razaosocialentrega_;
   var $entrega_;
   var $contatotecnico_;
   var $logistica_;
   var $pimportado_;
   var $vendedor01_;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_after_all_delete = false;
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_dbo_cliente = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = true;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $NM_case_insensitive;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['bairro_']))
          {
              $this->bairro_ = $this->NM_ajax_info['param']['bairro_'];
          }
          if (isset($this->NM_ajax_info['param']['bairrocobranca_']))
          {
              $this->bairrocobranca_ = $this->NM_ajax_info['param']['bairrocobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['bairroentrega_']))
          {
              $this->bairroentrega_ = $this->NM_ajax_info['param']['bairroentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['banco_']))
          {
              $this->banco_ = $this->NM_ajax_info['param']['banco_'];
          }
          if (isset($this->NM_ajax_info['param']['cd_cliente_']))
          {
              $this->cd_cliente_ = $this->NM_ajax_info['param']['cd_cliente_'];
          }
          if (isset($this->NM_ajax_info['param']['cep_']))
          {
              $this->cep_ = $this->NM_ajax_info['param']['cep_'];
          }
          if (isset($this->NM_ajax_info['param']['cepcobranca_']))
          {
              $this->cepcobranca_ = $this->NM_ajax_info['param']['cepcobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['cepentrega_']))
          {
              $this->cepentrega_ = $this->NM_ajax_info['param']['cepentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['certificado_']))
          {
              $this->certificado_ = $this->NM_ajax_info['param']['certificado_'];
          }
          if (isset($this->NM_ajax_info['param']['cgc_']))
          {
              $this->cgc_ = $this->NM_ajax_info['param']['cgc_'];
          }
          if (isset($this->NM_ajax_info['param']['cgcentrega_']))
          {
              $this->cgcentrega_ = $this->NM_ajax_info['param']['cgcentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['cidade_']))
          {
              $this->cidade_ = $this->NM_ajax_info['param']['cidade_'];
          }
          if (isset($this->NM_ajax_info['param']['cidadecobranca_']))
          {
              $this->cidadecobranca_ = $this->NM_ajax_info['param']['cidadecobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['cidadeentrega_']))
          {
              $this->cidadeentrega_ = $this->NM_ajax_info['param']['cidadeentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['coleta_']))
          {
              $this->coleta_ = $this->NM_ajax_info['param']['coleta_'];
          }
          if (isset($this->NM_ajax_info['param']['comissao_']))
          {
              $this->comissao_ = $this->NM_ajax_info['param']['comissao_'];
          }
          if (isset($this->NM_ajax_info['param']['complemento_']))
          {
              $this->complemento_ = $this->NM_ajax_info['param']['complemento_'];
          }
          if (isset($this->NM_ajax_info['param']['consumidor_']))
          {
              $this->consumidor_ = $this->NM_ajax_info['param']['consumidor_'];
          }
          if (isset($this->NM_ajax_info['param']['contato_']))
          {
              $this->contato_ = $this->NM_ajax_info['param']['contato_'];
          }
          if (isset($this->NM_ajax_info['param']['contatocobranca_']))
          {
              $this->contatocobranca_ = $this->NM_ajax_info['param']['contatocobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['contatoentrega_']))
          {
              $this->contatoentrega_ = $this->NM_ajax_info['param']['contatoentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['contatoexpedicao_']))
          {
              $this->contatoexpedicao_ = $this->NM_ajax_info['param']['contatoexpedicao_'];
          }
          if (isset($this->NM_ajax_info['param']['contatotecnico_']))
          {
              $this->contatotecnico_ = $this->NM_ajax_info['param']['contatotecnico_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['dataalteracao_']))
          {
              $this->dataalteracao_ = $this->NM_ajax_info['param']['dataalteracao_'];
          }
          if (isset($this->NM_ajax_info['param']['datacadastro_']))
          {
              $this->datacadastro_ = $this->NM_ajax_info['param']['datacadastro_'];
          }
          if (isset($this->NM_ajax_info['param']['email_']))
          {
              $this->email_ = $this->NM_ajax_info['param']['email_'];
          }
          if (isset($this->NM_ajax_info['param']['emailcobranca_']))
          {
              $this->emailcobranca_ = $this->NM_ajax_info['param']['emailcobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['emailnfe_']))
          {
              $this->emailnfe_ = $this->NM_ajax_info['param']['emailnfe_'];
          }
          if (isset($this->NM_ajax_info['param']['emailtecnico_']))
          {
              $this->emailtecnico_ = $this->NM_ajax_info['param']['emailtecnico_'];
          }
          if (isset($this->NM_ajax_info['param']['endereco_']))
          {
              $this->endereco_ = $this->NM_ajax_info['param']['endereco_'];
          }
          if (isset($this->NM_ajax_info['param']['enderecocobranca_']))
          {
              $this->enderecocobranca_ = $this->NM_ajax_info['param']['enderecocobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['enderecoentrega_']))
          {
              $this->enderecoentrega_ = $this->NM_ajax_info['param']['enderecoentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['entrega_']))
          {
              $this->entrega_ = $this->NM_ajax_info['param']['entrega_'];
          }
          if (isset($this->NM_ajax_info['param']['estado_']))
          {
              $this->estado_ = $this->NM_ajax_info['param']['estado_'];
          }
          if (isset($this->NM_ajax_info['param']['estadocobranca_']))
          {
              $this->estadocobranca_ = $this->NM_ajax_info['param']['estadocobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['estadoentrega_']))
          {
              $this->estadoentrega_ = $this->NM_ajax_info['param']['estadoentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['fax_']))
          {
              $this->fax_ = $this->NM_ajax_info['param']['fax_'];
          }
          if (isset($this->NM_ajax_info['param']['faxcobranca_']))
          {
              $this->faxcobranca_ = $this->NM_ajax_info['param']['faxcobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['financeiro_']))
          {
              $this->financeiro_ = $this->NM_ajax_info['param']['financeiro_'];
          }
          if (isset($this->NM_ajax_info['param']['fone1_']))
          {
              $this->fone1_ = $this->NM_ajax_info['param']['fone1_'];
          }
          if (isset($this->NM_ajax_info['param']['fone_']))
          {
              $this->fone_ = $this->NM_ajax_info['param']['fone_'];
          }
          if (isset($this->NM_ajax_info['param']['fonecobranca_']))
          {
              $this->fonecobranca_ = $this->NM_ajax_info['param']['fonecobranca_'];
          }
          if (isset($this->NM_ajax_info['param']['foneentrega_']))
          {
              $this->foneentrega_ = $this->NM_ajax_info['param']['foneentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['foneexpedicao_']))
          {
              $this->foneexpedicao_ = $this->NM_ajax_info['param']['foneexpedicao_'];
          }
          if (isset($this->NM_ajax_info['param']['fundacao_']))
          {
              $this->fundacao_ = $this->NM_ajax_info['param']['fundacao_'];
          }
          if (isset($this->NM_ajax_info['param']['icms_']))
          {
              $this->icms_ = $this->NM_ajax_info['param']['icms_'];
          }
          if (isset($this->NM_ajax_info['param']['inscricao_']))
          {
              $this->inscricao_ = $this->NM_ajax_info['param']['inscricao_'];
          }
          if (isset($this->NM_ajax_info['param']['inscricaoentrega_']))
          {
              $this->inscricaoentrega_ = $this->NM_ajax_info['param']['inscricaoentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['licensa1_']))
          {
              $this->licensa1_ = $this->NM_ajax_info['param']['licensa1_'];
          }
          if (isset($this->NM_ajax_info['param']['licensa2_']))
          {
              $this->licensa2_ = $this->NM_ajax_info['param']['licensa2_'];
          }
          if (isset($this->NM_ajax_info['param']['licensa_']))
          {
              $this->licensa_ = $this->NM_ajax_info['param']['licensa_'];
          }
          if (isset($this->NM_ajax_info['param']['limitecredito_']))
          {
              $this->limitecredito_ = $this->NM_ajax_info['param']['limitecredito_'];
          }
          if (isset($this->NM_ajax_info['param']['midia_']))
          {
              $this->midia_ = $this->NM_ajax_info['param']['midia_'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nomefantasia_']))
          {
              $this->nomefantasia_ = $this->NM_ajax_info['param']['nomefantasia_'];
          }
          if (isset($this->NM_ajax_info['param']['numero_']))
          {
              $this->numero_ = $this->NM_ajax_info['param']['numero_'];
          }
          if (isset($this->NM_ajax_info['param']['obs_']))
          {
              $this->obs_ = $this->NM_ajax_info['param']['obs_'];
          }
          if (isset($this->NM_ajax_info['param']['qtdeliberada_']))
          {
              $this->qtdeliberada_ = $this->NM_ajax_info['param']['qtdeliberada_'];
          }
          if (isset($this->NM_ajax_info['param']['qua_']))
          {
              $this->qua_ = $this->NM_ajax_info['param']['qua_'];
          }
          if (isset($this->NM_ajax_info['param']['qui_']))
          {
              $this->qui_ = $this->NM_ajax_info['param']['qui_'];
          }
          if (isset($this->NM_ajax_info['param']['razaosocial_']))
          {
              $this->razaosocial_ = $this->NM_ajax_info['param']['razaosocial_'];
          }
          if (isset($this->NM_ajax_info['param']['razaosocialentrega_']))
          {
              $this->razaosocialentrega_ = $this->NM_ajax_info['param']['razaosocialentrega_'];
          }
          if (isset($this->NM_ajax_info['param']['requisitos_']))
          {
              $this->requisitos_ = $this->NM_ajax_info['param']['requisitos_'];
          }
          if (isset($this->NM_ajax_info['param']['restricao_']))
          {
              $this->restricao_ = $this->NM_ajax_info['param']['restricao_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['seg_']))
          {
              $this->seg_ = $this->NM_ajax_info['param']['seg_'];
          }
          if (isset($this->NM_ajax_info['param']['segmento_']))
          {
              $this->segmento_ = $this->NM_ajax_info['param']['segmento_'];
          }
          if (isset($this->NM_ajax_info['param']['sex_']))
          {
              $this->sex_ = $this->NM_ajax_info['param']['sex_'];
          }
          if (isset($this->NM_ajax_info['param']['site_']))
          {
              $this->site_ = $this->NM_ajax_info['param']['site_'];
          }
          if (isset($this->NM_ajax_info['param']['suframa_']))
          {
              $this->suframa_ = $this->NM_ajax_info['param']['suframa_'];
          }
          if (isset($this->NM_ajax_info['param']['ter_']))
          {
              $this->ter_ = $this->NM_ajax_info['param']['ter_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_']))
          {
              $this->tipo_ = $this->NM_ajax_info['param']['tipo_'];
          }
          if (isset($this->NM_ajax_info['param']['transportadora_']))
          {
              $this->transportadora_ = $this->NM_ajax_info['param']['transportadora_'];
          }
          if (isset($this->NM_ajax_info['param']['usuario_']))
          {
              $this->usuario_ = $this->NM_ajax_info['param']['usuario_'];
          }
          if (isset($this->NM_ajax_info['param']['venctolicensa1_']))
          {
              $this->venctolicensa1_ = $this->NM_ajax_info['param']['venctolicensa1_'];
          }
          if (isset($this->NM_ajax_info['param']['venctolicensa2_']))
          {
              $this->venctolicensa2_ = $this->NM_ajax_info['param']['venctolicensa2_'];
          }
          if (isset($this->NM_ajax_info['param']['venctolicensa_']))
          {
              $this->venctolicensa_ = $this->NM_ajax_info['param']['venctolicensa_'];
          }
          if (isset($this->NM_ajax_info['param']['vendedor_']))
          {
              $this->vendedor_ = $this->NM_ajax_info['param']['vendedor_'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      $this->sc_conv_var['cd_cliente'] = "cd_cliente_";
      $this->sc_conv_var['razaosocial'] = "razaosocial_";
      $this->sc_conv_var['nomefantasia'] = "nomefantasia_";
      $this->sc_conv_var['cgc'] = "cgc_";
      $this->sc_conv_var['inscricao'] = "inscricao_";
      $this->sc_conv_var['endereco'] = "endereco_";
      $this->sc_conv_var['cidade'] = "cidade_";
      $this->sc_conv_var['estado'] = "estado_";
      $this->sc_conv_var['bairro'] = "bairro_";
      $this->sc_conv_var['cep'] = "cep_";
      $this->sc_conv_var['email'] = "email_";
      $this->sc_conv_var['fone'] = "fone_";
      $this->sc_conv_var['fone1'] = "fone1_";
      $this->sc_conv_var['fax'] = "fax_";
      $this->sc_conv_var['contato'] = "contato_";
      $this->sc_conv_var['enderecocobranca'] = "enderecocobranca_";
      $this->sc_conv_var['cidadecobranca'] = "cidadecobranca_";
      $this->sc_conv_var['bairrocobranca'] = "bairrocobranca_";
      $this->sc_conv_var['estadocobranca'] = "estadocobranca_";
      $this->sc_conv_var['cepcobranca'] = "cepcobranca_";
      $this->sc_conv_var['fonecobranca'] = "fonecobranca_";
      $this->sc_conv_var['faxcobranca'] = "faxcobranca_";
      $this->sc_conv_var['contatocobranca'] = "contatocobranca_";
      $this->sc_conv_var['cgcentrega'] = "cgcentrega_";
      $this->sc_conv_var['inscricaoentrega'] = "inscricaoentrega_";
      $this->sc_conv_var['enderecoentrega'] = "enderecoentrega_";
      $this->sc_conv_var['cidadeentrega'] = "cidadeentrega_";
      $this->sc_conv_var['bairroentrega'] = "bairroentrega_";
      $this->sc_conv_var['estadoentrega'] = "estadoentrega_";
      $this->sc_conv_var['cepentrega'] = "cepentrega_";
      $this->sc_conv_var['foneentrega'] = "foneentrega_";
      $this->sc_conv_var['contatoentrega'] = "contatoentrega_";
      $this->sc_conv_var['contatoexpedicao'] = "contatoexpedicao_";
      $this->sc_conv_var['foneexpedicao'] = "foneexpedicao_";
      $this->sc_conv_var['datacadastro'] = "datacadastro_";
      $this->sc_conv_var['obs'] = "obs_";
      $this->sc_conv_var['tipo'] = "tipo_";
      $this->sc_conv_var['consumidor'] = "consumidor_";
      $this->sc_conv_var['licensa'] = "licensa_";
      $this->sc_conv_var['venctolicensa'] = "venctolicensa_";
      $this->sc_conv_var['licensa1'] = "licensa1_";
      $this->sc_conv_var['venctolicensa1'] = "venctolicensa1_";
      $this->sc_conv_var['qtdeliberada'] = "qtdeliberada_";
      $this->sc_conv_var['licensa2'] = "licensa2_";
      $this->sc_conv_var['venctolicensa2'] = "venctolicensa2_";
      $this->sc_conv_var['icms'] = "icms_";
      $this->sc_conv_var['suframa'] = "suframa_";
      $this->sc_conv_var['limitecredito'] = "limitecredito_";
      $this->sc_conv_var['vendedor'] = "vendedor_";
      $this->sc_conv_var['restricao'] = "restricao_";
      $this->sc_conv_var['comissao'] = "comissao_";
      $this->sc_conv_var['transportadora'] = "transportadora_";
      $this->sc_conv_var['coleta'] = "coleta_";
      $this->sc_conv_var['segmento'] = "segmento_";
      $this->sc_conv_var['dataalteracao'] = "dataalteracao_";
      $this->sc_conv_var['usuario'] = "usuario_";
      $this->sc_conv_var['requisitos'] = "requisitos_";
      $this->sc_conv_var['banco'] = "banco_";
      $this->sc_conv_var['emailcobranca'] = "emailcobranca_";
      $this->sc_conv_var['emailtecnico'] = "emailtecnico_";
      $this->sc_conv_var['midia'] = "midia_";
      $this->sc_conv_var['seg'] = "seg_";
      $this->sc_conv_var['ter'] = "ter_";
      $this->sc_conv_var['qua'] = "qua_";
      $this->sc_conv_var['qui'] = "qui_";
      $this->sc_conv_var['sex'] = "sex_";
      $this->sc_conv_var['certificado'] = "certificado_";
      $this->sc_conv_var['emailnfe'] = "emailnfe_";
      $this->sc_conv_var['fundacao'] = "fundacao_";
      $this->sc_conv_var['site'] = "site_";
      $this->sc_conv_var['financeiro'] = "financeiro_";
      $this->sc_conv_var['numero'] = "numero_";
      $this->sc_conv_var['complemento'] = "complemento_";
      $this->sc_conv_var['razaosocialentrega'] = "razaosocialentrega_";
      $this->sc_conv_var['entrega'] = "entrega_";
      $this->sc_conv_var['contatotecnico'] = "contatotecnico_";
      $this->sc_conv_var['logistica'] = "logistica_";
      $this->sc_conv_var['pimportado'] = "pimportado_";
      $this->sc_conv_var['vendedor01'] = "vendedor01_";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_dbo_cliente($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "Cd_cliente_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= " = '" . $this->Cd_cliente_ . "'";
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->datacadastro_);
          $this->datacadastro_      = $aDtParts[0];
          $this->datacadastro__hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->venctolicensa_);
          $this->venctolicensa_      = $aDtParts[0];
          $this->venctolicensa__hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->venctolicensa1_);
          $this->venctolicensa1_      = $aDtParts[0];
          $this->venctolicensa1__hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->venctolicensa2_);
          $this->venctolicensa2_      = $aDtParts[0];
          $this->venctolicensa2__hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->dataalteracao_);
          $this->dataalteracao_      = $aDtParts[0];
          $this->dataalteracao__hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->fundacao_);
          $this->fundacao_      = $aDtParts[0];
          $this->fundacao__hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_dbo_cliente_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_dbo_cliente']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_dbo_cliente']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_dbo_cliente'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_dbo_cliente']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_dbo_cliente']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_dbo_cliente') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_dbo_cliente']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " dbo.cliente";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_dbo_cliente")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status      = "scFormInputErrorMult";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';


      $this->arr_buttons['group_group_3']= array(
          'value'            => "pdf",
          'hint'             => "",
          'type'             => "button",
          'display'          => "only_text",
          'display_position' => "text_right",
          'image'            => "",
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_dbo_cliente']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_dbo_cliente'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "on";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      }
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_dbo_cliente']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_dbo_cliente'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_dbo_cliente'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_dbo_cliente", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_dbo_cliente/form_dbo_cliente_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_dbo_cliente_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_dbo_cliente_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_dbo_cliente_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_dbo_cliente/form_dbo_cliente_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_dbo_cliente_erro.class.php"); 
      }
      $this->Erro      = new form_dbo_cliente_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao']))
         { 
             if ($this->cd_cliente_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) ? true : false;
      $this->sc_evento = $this->nmgp_opcao;
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- datacadastro_
      $this->field_config['datacadastro_']                 = array();
      $this->field_config['datacadastro_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['datacadastro_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['datacadastro_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['datacadastro_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'datacadastro_');
      //-- venctolicensa_
      $this->field_config['venctolicensa_']                 = array();
      $this->field_config['venctolicensa_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['venctolicensa_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['venctolicensa_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['venctolicensa_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'venctolicensa_');
      //-- venctolicensa1_
      $this->field_config['venctolicensa1_']                 = array();
      $this->field_config['venctolicensa1_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['venctolicensa1_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['venctolicensa1_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['venctolicensa1_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'venctolicensa1_');
      //-- qtdeliberada_
      $this->field_config['qtdeliberada_']               = array();
      $this->field_config['qtdeliberada_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['qtdeliberada_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['qtdeliberada_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['qtdeliberada_']['symbol_mon'] = '';
      $this->field_config['qtdeliberada_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['qtdeliberada_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- venctolicensa2_
      $this->field_config['venctolicensa2_']                 = array();
      $this->field_config['venctolicensa2_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['venctolicensa2_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['venctolicensa2_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['venctolicensa2_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'venctolicensa2_');
      //-- icms_
      $this->field_config['icms_']               = array();
      $this->field_config['icms_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['icms_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['icms_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['icms_']['symbol_mon'] = '';
      $this->field_config['icms_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['icms_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- limitecredito_
      $this->field_config['limitecredito_']               = array();
      $this->field_config['limitecredito_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['limitecredito_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['limitecredito_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['limitecredito_']['symbol_mon'] = '';
      $this->field_config['limitecredito_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['limitecredito_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- comissao_
      $this->field_config['comissao_']               = array();
      $this->field_config['comissao_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['comissao_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['comissao_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['comissao_']['symbol_mon'] = '';
      $this->field_config['comissao_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['comissao_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- segmento_
      $this->field_config['segmento_']               = array();
      $this->field_config['segmento_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['segmento_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['segmento_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['segmento_']['symbol_mon'] = '';
      $this->field_config['segmento_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['segmento_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- dataalteracao_
      $this->field_config['dataalteracao_']                 = array();
      $this->field_config['dataalteracao_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['dataalteracao_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['dataalteracao_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['dataalteracao_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'dataalteracao_');
      //-- fundacao_
      $this->field_config['fundacao_']                 = array();
      $this->field_config['fundacao_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fundacao_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fundacao_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fundacao_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fundacao_');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          $this->NM_btn_navega = "N";
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_max_reg'] = $this->nmgp_max_line;
      }
      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_dbo_cliente_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_converte_datas();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_dbo_cliente_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->cd_cliente_)) { $this->nm_limpa_alfa($this->cd_cliente_); }
         if (isset($this->razaosocial_)) { $this->nm_limpa_alfa($this->razaosocial_); }
         if (isset($this->nomefantasia_)) { $this->nm_limpa_alfa($this->nomefantasia_); }
         if (isset($this->cgc_)) { $this->nm_limpa_alfa($this->cgc_); }
         if (isset($this->inscricao_)) { $this->nm_limpa_alfa($this->inscricao_); }
         if (isset($this->endereco_)) { $this->nm_limpa_alfa($this->endereco_); }
         if (isset($this->cidade_)) { $this->nm_limpa_alfa($this->cidade_); }
         if (isset($this->estado_)) { $this->nm_limpa_alfa($this->estado_); }
         if (isset($this->bairro_)) { $this->nm_limpa_alfa($this->bairro_); }
         if (isset($this->cep_)) { $this->nm_limpa_alfa($this->cep_); }
         if (isset($this->email_)) { $this->nm_limpa_alfa($this->email_); }
         if (isset($this->fone_)) { $this->nm_limpa_alfa($this->fone_); }
         if (isset($this->fone1_)) { $this->nm_limpa_alfa($this->fone1_); }
         if (isset($this->fax_)) { $this->nm_limpa_alfa($this->fax_); }
         if (isset($this->contato_)) { $this->nm_limpa_alfa($this->contato_); }
         if (isset($this->enderecocobranca_)) { $this->nm_limpa_alfa($this->enderecocobranca_); }
         if (isset($this->cidadecobranca_)) { $this->nm_limpa_alfa($this->cidadecobranca_); }
         if (isset($this->bairrocobranca_)) { $this->nm_limpa_alfa($this->bairrocobranca_); }
         if (isset($this->estadocobranca_)) { $this->nm_limpa_alfa($this->estadocobranca_); }
         if (isset($this->cepcobranca_)) { $this->nm_limpa_alfa($this->cepcobranca_); }
         if (isset($this->fonecobranca_)) { $this->nm_limpa_alfa($this->fonecobranca_); }
         if (isset($this->faxcobranca_)) { $this->nm_limpa_alfa($this->faxcobranca_); }
         if (isset($this->contatocobranca_)) { $this->nm_limpa_alfa($this->contatocobranca_); }
         if (isset($this->cgcentrega_)) { $this->nm_limpa_alfa($this->cgcentrega_); }
         if (isset($this->inscricaoentrega_)) { $this->nm_limpa_alfa($this->inscricaoentrega_); }
         if (isset($this->enderecoentrega_)) { $this->nm_limpa_alfa($this->enderecoentrega_); }
         if (isset($this->cidadeentrega_)) { $this->nm_limpa_alfa($this->cidadeentrega_); }
         if (isset($this->bairroentrega_)) { $this->nm_limpa_alfa($this->bairroentrega_); }
         if (isset($this->estadoentrega_)) { $this->nm_limpa_alfa($this->estadoentrega_); }
         if (isset($this->cepentrega_)) { $this->nm_limpa_alfa($this->cepentrega_); }
         if (isset($this->foneentrega_)) { $this->nm_limpa_alfa($this->foneentrega_); }
         if (isset($this->contatoentrega_)) { $this->nm_limpa_alfa($this->contatoentrega_); }
         if (isset($this->contatoexpedicao_)) { $this->nm_limpa_alfa($this->contatoexpedicao_); }
         if (isset($this->foneexpedicao_)) { $this->nm_limpa_alfa($this->foneexpedicao_); }
         if (isset($this->obs_)) { $this->nm_limpa_alfa($this->obs_); }
         if (isset($this->tipo_)) { $this->nm_limpa_alfa($this->tipo_); }
         if (isset($this->consumidor_)) { $this->nm_limpa_alfa($this->consumidor_); }
         if (isset($this->licensa_)) { $this->nm_limpa_alfa($this->licensa_); }
         if (isset($this->licensa1_)) { $this->nm_limpa_alfa($this->licensa1_); }
         if (isset($this->qtdeliberada_)) { $this->nm_limpa_alfa($this->qtdeliberada_); }
         if (isset($this->licensa2_)) { $this->nm_limpa_alfa($this->licensa2_); }
         if (isset($this->icms_)) { $this->nm_limpa_alfa($this->icms_); }
         if (isset($this->suframa_)) { $this->nm_limpa_alfa($this->suframa_); }
         if (isset($this->limitecredito_)) { $this->nm_limpa_alfa($this->limitecredito_); }
         if (isset($this->vendedor_)) { $this->nm_limpa_alfa($this->vendedor_); }
         if (isset($this->restricao_)) { $this->nm_limpa_alfa($this->restricao_); }
         if (isset($this->comissao_)) { $this->nm_limpa_alfa($this->comissao_); }
         if (isset($this->transportadora_)) { $this->nm_limpa_alfa($this->transportadora_); }
         if (isset($this->coleta_)) { $this->nm_limpa_alfa($this->coleta_); }
         if (isset($this->segmento_)) { $this->nm_limpa_alfa($this->segmento_); }
         if (isset($this->usuario_)) { $this->nm_limpa_alfa($this->usuario_); }
         if (isset($this->requisitos_)) { $this->nm_limpa_alfa($this->requisitos_); }
         if (isset($this->banco_)) { $this->nm_limpa_alfa($this->banco_); }
         if (isset($this->emailcobranca_)) { $this->nm_limpa_alfa($this->emailcobranca_); }
         if (isset($this->emailtecnico_)) { $this->nm_limpa_alfa($this->emailtecnico_); }
         if (isset($this->midia_)) { $this->nm_limpa_alfa($this->midia_); }
         if (isset($this->seg_)) { $this->nm_limpa_alfa($this->seg_); }
         if (isset($this->ter_)) { $this->nm_limpa_alfa($this->ter_); }
         if (isset($this->qua_)) { $this->nm_limpa_alfa($this->qua_); }
         if (isset($this->qui_)) { $this->nm_limpa_alfa($this->qui_); }
         if (isset($this->sex_)) { $this->nm_limpa_alfa($this->sex_); }
         if (isset($this->certificado_)) { $this->nm_limpa_alfa($this->certificado_); }
         if (isset($this->emailnfe_)) { $this->nm_limpa_alfa($this->emailnfe_); }
         if (isset($this->site_)) { $this->nm_limpa_alfa($this->site_); }
         if (isset($this->financeiro_)) { $this->nm_limpa_alfa($this->financeiro_); }
         if (isset($this->numero_)) { $this->nm_limpa_alfa($this->numero_); }
         if (isset($this->complemento_)) { $this->nm_limpa_alfa($this->complemento_); }
         if (isset($this->razaosocialentrega_)) { $this->nm_limpa_alfa($this->razaosocialentrega_); }
         if (isset($this->entrega_)) { $this->nm_limpa_alfa($this->entrega_); }
         if (isset($this->contatotecnico_)) { $this->nm_limpa_alfa($this->contatotecnico_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_form'][$sc_seq_vert];
             $this->logistica_ = $this->nmgp_dados_form['logistica_']; 
             $this->pimportado_ = $this->nmgp_dados_form['pimportado_']; 
             $this->vendedor01_ = $this->nmgp_dados_form['vendedor01_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_dbo_cliente']) || !is_array($this->NM_ajax_info['errList']['geral_form_dbo_cliente']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_dbo_cliente'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_dbo_cliente'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_dbo_cliente'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_dbo_cliente'][] = $this->Campos_Mens_erro;
                  }
                  $this->NM_gera_nav_page(); 
                  $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
         form_dbo_cliente_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_cd_cliente_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cd_cliente_');
          }
          if ('validate_razaosocial_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'razaosocial_');
          }
          if ('validate_nomefantasia_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nomefantasia_');
          }
          if ('validate_cgc_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgc_');
          }
          if ('validate_inscricao_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'inscricao_');
          }
          if ('validate_endereco_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'endereco_');
          }
          if ('validate_cidade_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cidade_');
          }
          if ('validate_estado_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estado_');
          }
          if ('validate_bairro_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bairro_');
          }
          if ('validate_cep_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cep_');
          }
          if ('validate_email_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email_');
          }
          if ('validate_fone_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fone_');
          }
          if ('validate_fone1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fone1_');
          }
          if ('validate_fax_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fax_');
          }
          if ('validate_contato_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contato_');
          }
          if ('validate_enderecocobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enderecocobranca_');
          }
          if ('validate_cidadecobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cidadecobranca_');
          }
          if ('validate_bairrocobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bairrocobranca_');
          }
          if ('validate_estadocobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estadocobranca_');
          }
          if ('validate_cepcobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cepcobranca_');
          }
          if ('validate_fonecobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fonecobranca_');
          }
          if ('validate_faxcobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'faxcobranca_');
          }
          if ('validate_contatocobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contatocobranca_');
          }
          if ('validate_cgcentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cgcentrega_');
          }
          if ('validate_inscricaoentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'inscricaoentrega_');
          }
          if ('validate_enderecoentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enderecoentrega_');
          }
          if ('validate_cidadeentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cidadeentrega_');
          }
          if ('validate_bairroentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bairroentrega_');
          }
          if ('validate_estadoentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estadoentrega_');
          }
          if ('validate_cepentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cepentrega_');
          }
          if ('validate_foneentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foneentrega_');
          }
          if ('validate_contatoentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contatoentrega_');
          }
          if ('validate_contatoexpedicao_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contatoexpedicao_');
          }
          if ('validate_foneexpedicao_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foneexpedicao_');
          }
          if ('validate_datacadastro_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'datacadastro_');
          }
          if ('validate_obs_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obs_');
          }
          if ('validate_tipo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_');
          }
          if ('validate_consumidor_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'consumidor_');
          }
          if ('validate_licensa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'licensa_');
          }
          if ('validate_venctolicensa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'venctolicensa_');
          }
          if ('validate_licensa1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'licensa1_');
          }
          if ('validate_venctolicensa1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'venctolicensa1_');
          }
          if ('validate_qtdeliberada_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qtdeliberada_');
          }
          if ('validate_licensa2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'licensa2_');
          }
          if ('validate_venctolicensa2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'venctolicensa2_');
          }
          if ('validate_icms_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'icms_');
          }
          if ('validate_suframa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'suframa_');
          }
          if ('validate_limitecredito_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'limitecredito_');
          }
          if ('validate_vendedor_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vendedor_');
          }
          if ('validate_restricao_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'restricao_');
          }
          if ('validate_comissao_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'comissao_');
          }
          if ('validate_transportadora_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'transportadora_');
          }
          if ('validate_coleta_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'coleta_');
          }
          if ('validate_segmento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'segmento_');
          }
          if ('validate_dataalteracao_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dataalteracao_');
          }
          if ('validate_usuario_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuario_');
          }
          if ('validate_requisitos_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'requisitos_');
          }
          if ('validate_banco_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'banco_');
          }
          if ('validate_emailcobranca_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'emailcobranca_');
          }
          if ('validate_emailtecnico_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'emailtecnico_');
          }
          if ('validate_midia_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'midia_');
          }
          if ('validate_seg_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'seg_');
          }
          if ('validate_ter_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ter_');
          }
          if ('validate_qua_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qua_');
          }
          if ('validate_qui_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'qui_');
          }
          if ('validate_sex_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sex_');
          }
          if ('validate_certificado_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'certificado_');
          }
          if ('validate_emailnfe_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'emailnfe_');
          }
          if ('validate_fundacao_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fundacao_');
          }
          if ('validate_site_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'site_');
          }
          if ('validate_financeiro_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'financeiro_');
          }
          if ('validate_numero_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_');
          }
          if ('validate_complemento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'complemento_');
          }
          if ('validate_razaosocialentrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'razaosocialentrega_');
          }
          if ('validate_entrega_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'entrega_');
          }
          if ('validate_contatotecnico_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contatotecnico_');
          }
          form_dbo_cliente_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->cd_cliente_ = $GLOBALS["cd_cliente_" . $sc_seq_vert]; 
         $this->razaosocial_ = $GLOBALS["razaosocial_" . $sc_seq_vert]; 
         $this->nomefantasia_ = $GLOBALS["nomefantasia_" . $sc_seq_vert]; 
         $this->cgc_ = $GLOBALS["cgc_" . $sc_seq_vert]; 
         $this->inscricao_ = $GLOBALS["inscricao_" . $sc_seq_vert]; 
         $this->endereco_ = $GLOBALS["endereco_" . $sc_seq_vert]; 
         $this->cidade_ = $GLOBALS["cidade_" . $sc_seq_vert]; 
         $this->estado_ = $GLOBALS["estado_" . $sc_seq_vert]; 
         $this->bairro_ = $GLOBALS["bairro_" . $sc_seq_vert]; 
         $this->cep_ = $GLOBALS["cep_" . $sc_seq_vert]; 
         $this->email_ = $GLOBALS["email_" . $sc_seq_vert]; 
         $this->fone_ = $GLOBALS["fone_" . $sc_seq_vert]; 
         $this->fone1_ = $GLOBALS["fone1_" . $sc_seq_vert]; 
         $this->fax_ = $GLOBALS["fax_" . $sc_seq_vert]; 
         $this->contato_ = $GLOBALS["contato_" . $sc_seq_vert]; 
         $this->enderecocobranca_ = $GLOBALS["enderecocobranca_" . $sc_seq_vert]; 
         $this->cidadecobranca_ = $GLOBALS["cidadecobranca_" . $sc_seq_vert]; 
         $this->bairrocobranca_ = $GLOBALS["bairrocobranca_" . $sc_seq_vert]; 
         $this->estadocobranca_ = $GLOBALS["estadocobranca_" . $sc_seq_vert]; 
         $this->cepcobranca_ = $GLOBALS["cepcobranca_" . $sc_seq_vert]; 
         $this->fonecobranca_ = $GLOBALS["fonecobranca_" . $sc_seq_vert]; 
         $this->faxcobranca_ = $GLOBALS["faxcobranca_" . $sc_seq_vert]; 
         $this->contatocobranca_ = $GLOBALS["contatocobranca_" . $sc_seq_vert]; 
         $this->cgcentrega_ = $GLOBALS["cgcentrega_" . $sc_seq_vert]; 
         $this->inscricaoentrega_ = $GLOBALS["inscricaoentrega_" . $sc_seq_vert]; 
         $this->enderecoentrega_ = $GLOBALS["enderecoentrega_" . $sc_seq_vert]; 
         $this->cidadeentrega_ = $GLOBALS["cidadeentrega_" . $sc_seq_vert]; 
         $this->bairroentrega_ = $GLOBALS["bairroentrega_" . $sc_seq_vert]; 
         $this->estadoentrega_ = $GLOBALS["estadoentrega_" . $sc_seq_vert]; 
         $this->cepentrega_ = $GLOBALS["cepentrega_" . $sc_seq_vert]; 
         $this->foneentrega_ = $GLOBALS["foneentrega_" . $sc_seq_vert]; 
         $this->contatoentrega_ = $GLOBALS["contatoentrega_" . $sc_seq_vert]; 
         $this->contatoexpedicao_ = $GLOBALS["contatoexpedicao_" . $sc_seq_vert]; 
         $this->foneexpedicao_ = $GLOBALS["foneexpedicao_" . $sc_seq_vert]; 
         $this->datacadastro_ = $GLOBALS["datacadastro_" . $sc_seq_vert]; 
         $this->obs_ = $GLOBALS["obs_" . $sc_seq_vert]; 
         $this->tipo_ = $GLOBALS["tipo_" . $sc_seq_vert]; 
         $this->consumidor_ = $GLOBALS["consumidor_" . $sc_seq_vert]; 
         $this->licensa_ = $GLOBALS["licensa_" . $sc_seq_vert]; 
         $this->venctolicensa_ = $GLOBALS["venctolicensa_" . $sc_seq_vert]; 
         $this->licensa1_ = $GLOBALS["licensa1_" . $sc_seq_vert]; 
         $this->venctolicensa1_ = $GLOBALS["venctolicensa1_" . $sc_seq_vert]; 
         $this->qtdeliberada_ = $GLOBALS["qtdeliberada_" . $sc_seq_vert]; 
         $this->licensa2_ = $GLOBALS["licensa2_" . $sc_seq_vert]; 
         $this->venctolicensa2_ = $GLOBALS["venctolicensa2_" . $sc_seq_vert]; 
         $this->icms_ = $GLOBALS["icms_" . $sc_seq_vert]; 
         $this->suframa_ = $GLOBALS["suframa_" . $sc_seq_vert]; 
         $this->limitecredito_ = $GLOBALS["limitecredito_" . $sc_seq_vert]; 
         $this->vendedor_ = $GLOBALS["vendedor_" . $sc_seq_vert]; 
         $this->restricao_ = $GLOBALS["restricao_" . $sc_seq_vert]; 
         $this->comissao_ = $GLOBALS["comissao_" . $sc_seq_vert]; 
         $this->transportadora_ = $GLOBALS["transportadora_" . $sc_seq_vert]; 
         $this->coleta_ = $GLOBALS["coleta_" . $sc_seq_vert]; 
         $this->segmento_ = $GLOBALS["segmento_" . $sc_seq_vert]; 
         $this->dataalteracao_ = $GLOBALS["dataalteracao_" . $sc_seq_vert]; 
         $this->usuario_ = $GLOBALS["usuario_" . $sc_seq_vert]; 
         $this->requisitos_ = $GLOBALS["requisitos_" . $sc_seq_vert]; 
         $this->banco_ = $GLOBALS["banco_" . $sc_seq_vert]; 
         $this->emailcobranca_ = $GLOBALS["emailcobranca_" . $sc_seq_vert]; 
         $this->emailtecnico_ = $GLOBALS["emailtecnico_" . $sc_seq_vert]; 
         $this->midia_ = $GLOBALS["midia_" . $sc_seq_vert]; 
         $this->seg_ = $GLOBALS["seg_" . $sc_seq_vert]; 
         $this->ter_ = $GLOBALS["ter_" . $sc_seq_vert]; 
         $this->qua_ = $GLOBALS["qua_" . $sc_seq_vert]; 
         $this->qui_ = $GLOBALS["qui_" . $sc_seq_vert]; 
         $this->sex_ = $GLOBALS["sex_" . $sc_seq_vert]; 
         $this->certificado_ = $GLOBALS["certificado_" . $sc_seq_vert]; 
         $this->emailnfe_ = $GLOBALS["emailnfe_" . $sc_seq_vert]; 
         $this->fundacao_ = $GLOBALS["fundacao_" . $sc_seq_vert]; 
         $this->site_ = $GLOBALS["site_" . $sc_seq_vert]; 
         $this->financeiro_ = $GLOBALS["financeiro_" . $sc_seq_vert]; 
         $this->numero_ = $GLOBALS["numero_" . $sc_seq_vert]; 
         $this->complemento_ = $GLOBALS["complemento_" . $sc_seq_vert]; 
         $this->razaosocialentrega_ = $GLOBALS["razaosocialentrega_" . $sc_seq_vert]; 
         $this->entrega_ = $GLOBALS["entrega_" . $sc_seq_vert]; 
         $this->contatotecnico_ = $GLOBALS["contatotecnico_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_form'][$sc_seq_vert];
             $this->logistica_ = $this->nmgp_dados_form['logistica_']; 
             $this->pimportado_ = $this->nmgp_dados_form['pimportado_']; 
             $this->vendedor01_ = $this->nmgp_dados_form['vendedor01_']; 
         }
         if (isset($this->cd_cliente_)) { $this->nm_limpa_alfa($this->cd_cliente_); }
         if (isset($this->razaosocial_)) { $this->nm_limpa_alfa($this->razaosocial_); }
         if (isset($this->nomefantasia_)) { $this->nm_limpa_alfa($this->nomefantasia_); }
         if (isset($this->cgc_)) { $this->nm_limpa_alfa($this->cgc_); }
         if (isset($this->inscricao_)) { $this->nm_limpa_alfa($this->inscricao_); }
         if (isset($this->endereco_)) { $this->nm_limpa_alfa($this->endereco_); }
         if (isset($this->cidade_)) { $this->nm_limpa_alfa($this->cidade_); }
         if (isset($this->estado_)) { $this->nm_limpa_alfa($this->estado_); }
         if (isset($this->bairro_)) { $this->nm_limpa_alfa($this->bairro_); }
         if (isset($this->cep_)) { $this->nm_limpa_alfa($this->cep_); }
         if (isset($this->email_)) { $this->nm_limpa_alfa($this->email_); }
         if (isset($this->fone_)) { $this->nm_limpa_alfa($this->fone_); }
         if (isset($this->fone1_)) { $this->nm_limpa_alfa($this->fone1_); }
         if (isset($this->fax_)) { $this->nm_limpa_alfa($this->fax_); }
         if (isset($this->contato_)) { $this->nm_limpa_alfa($this->contato_); }
         if (isset($this->enderecocobranca_)) { $this->nm_limpa_alfa($this->enderecocobranca_); }
         if (isset($this->cidadecobranca_)) { $this->nm_limpa_alfa($this->cidadecobranca_); }
         if (isset($this->bairrocobranca_)) { $this->nm_limpa_alfa($this->bairrocobranca_); }
         if (isset($this->estadocobranca_)) { $this->nm_limpa_alfa($this->estadocobranca_); }
         if (isset($this->cepcobranca_)) { $this->nm_limpa_alfa($this->cepcobranca_); }
         if (isset($this->fonecobranca_)) { $this->nm_limpa_alfa($this->fonecobranca_); }
         if (isset($this->faxcobranca_)) { $this->nm_limpa_alfa($this->faxcobranca_); }
         if (isset($this->contatocobranca_)) { $this->nm_limpa_alfa($this->contatocobranca_); }
         if (isset($this->cgcentrega_)) { $this->nm_limpa_alfa($this->cgcentrega_); }
         if (isset($this->inscricaoentrega_)) { $this->nm_limpa_alfa($this->inscricaoentrega_); }
         if (isset($this->enderecoentrega_)) { $this->nm_limpa_alfa($this->enderecoentrega_); }
         if (isset($this->cidadeentrega_)) { $this->nm_limpa_alfa($this->cidadeentrega_); }
         if (isset($this->bairroentrega_)) { $this->nm_limpa_alfa($this->bairroentrega_); }
         if (isset($this->estadoentrega_)) { $this->nm_limpa_alfa($this->estadoentrega_); }
         if (isset($this->cepentrega_)) { $this->nm_limpa_alfa($this->cepentrega_); }
         if (isset($this->foneentrega_)) { $this->nm_limpa_alfa($this->foneentrega_); }
         if (isset($this->contatoentrega_)) { $this->nm_limpa_alfa($this->contatoentrega_); }
         if (isset($this->contatoexpedicao_)) { $this->nm_limpa_alfa($this->contatoexpedicao_); }
         if (isset($this->foneexpedicao_)) { $this->nm_limpa_alfa($this->foneexpedicao_); }
         if (isset($this->obs_)) { $this->nm_limpa_alfa($this->obs_); }
         if (isset($this->tipo_)) { $this->nm_limpa_alfa($this->tipo_); }
         if (isset($this->consumidor_)) { $this->nm_limpa_alfa($this->consumidor_); }
         if (isset($this->licensa_)) { $this->nm_limpa_alfa($this->licensa_); }
         if (isset($this->licensa1_)) { $this->nm_limpa_alfa($this->licensa1_); }
         if (isset($this->qtdeliberada_)) { $this->nm_limpa_alfa($this->qtdeliberada_); }
         if (isset($this->licensa2_)) { $this->nm_limpa_alfa($this->licensa2_); }
         if (isset($this->icms_)) { $this->nm_limpa_alfa($this->icms_); }
         if (isset($this->suframa_)) { $this->nm_limpa_alfa($this->suframa_); }
         if (isset($this->limitecredito_)) { $this->nm_limpa_alfa($this->limitecredito_); }
         if (isset($this->vendedor_)) { $this->nm_limpa_alfa($this->vendedor_); }
         if (isset($this->restricao_)) { $this->nm_limpa_alfa($this->restricao_); }
         if (isset($this->comissao_)) { $this->nm_limpa_alfa($this->comissao_); }
         if (isset($this->transportadora_)) { $this->nm_limpa_alfa($this->transportadora_); }
         if (isset($this->coleta_)) { $this->nm_limpa_alfa($this->coleta_); }
         if (isset($this->segmento_)) { $this->nm_limpa_alfa($this->segmento_); }
         if (isset($this->usuario_)) { $this->nm_limpa_alfa($this->usuario_); }
         if (isset($this->requisitos_)) { $this->nm_limpa_alfa($this->requisitos_); }
         if (isset($this->banco_)) { $this->nm_limpa_alfa($this->banco_); }
         if (isset($this->emailcobranca_)) { $this->nm_limpa_alfa($this->emailcobranca_); }
         if (isset($this->emailtecnico_)) { $this->nm_limpa_alfa($this->emailtecnico_); }
         if (isset($this->midia_)) { $this->nm_limpa_alfa($this->midia_); }
         if (isset($this->seg_)) { $this->nm_limpa_alfa($this->seg_); }
         if (isset($this->ter_)) { $this->nm_limpa_alfa($this->ter_); }
         if (isset($this->qua_)) { $this->nm_limpa_alfa($this->qua_); }
         if (isset($this->qui_)) { $this->nm_limpa_alfa($this->qui_); }
         if (isset($this->sex_)) { $this->nm_limpa_alfa($this->sex_); }
         if (isset($this->certificado_)) { $this->nm_limpa_alfa($this->certificado_); }
         if (isset($this->emailnfe_)) { $this->nm_limpa_alfa($this->emailnfe_); }
         if (isset($this->site_)) { $this->nm_limpa_alfa($this->site_); }
         if (isset($this->financeiro_)) { $this->nm_limpa_alfa($this->financeiro_); }
         if (isset($this->numero_)) { $this->nm_limpa_alfa($this->numero_); }
         if (isset($this->complemento_)) { $this->nm_limpa_alfa($this->complemento_); }
         if (isset($this->razaosocialentrega_)) { $this->nm_limpa_alfa($this->razaosocialentrega_); }
         if (isset($this->entrega_)) { $this->nm_limpa_alfa($this->entrega_); }
         if (isset($this->contatotecnico_)) { $this->nm_limpa_alfa($this->contatotecnico_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cd_cliente_'] =  $this->cd_cliente_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['razaosocial_'] =  $this->razaosocial_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['nomefantasia_'] =  $this->nomefantasia_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cgc_'] =  $this->cgc_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['inscricao_'] =  $this->inscricao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['endereco_'] =  $this->endereco_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidade_'] =  $this->cidade_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estado_'] =  $this->estado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairro_'] =  $this->bairro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cep_'] =  $this->cep_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fone_'] =  $this->fone_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fone1_'] =  $this->fone1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fax_'] =  $this->fax_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contato_'] =  $this->contato_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['enderecocobranca_'] =  $this->enderecocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidadecobranca_'] =  $this->cidadecobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairrocobranca_'] =  $this->bairrocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estadocobranca_'] =  $this->estadocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cepcobranca_'] =  $this->cepcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fonecobranca_'] =  $this->fonecobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['faxcobranca_'] =  $this->faxcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatocobranca_'] =  $this->contatocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cgcentrega_'] =  $this->cgcentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['inscricaoentrega_'] =  $this->inscricaoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['enderecoentrega_'] =  $this->enderecoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidadeentrega_'] =  $this->cidadeentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairroentrega_'] =  $this->bairroentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estadoentrega_'] =  $this->estadoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cepentrega_'] =  $this->cepentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['foneentrega_'] =  $this->foneentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatoentrega_'] =  $this->contatoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatoexpedicao_'] =  $this->contatoexpedicao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['foneexpedicao_'] =  $this->foneexpedicao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['datacadastro_'] =  $this->datacadastro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['datacadastro__hora'] =  $this->datacadastro__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['obs_'] =  $this->obs_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['consumidor_'] =  $this->consumidor_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa_'] =  $this->licensa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa_'] =  $this->venctolicensa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa__hora'] =  $this->venctolicensa__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa1_'] =  $this->licensa1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa1_'] =  $this->venctolicensa1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa1__hora'] =  $this->venctolicensa1__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qtdeliberada_'] =  $this->qtdeliberada_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa2_'] =  $this->licensa2_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa2_'] =  $this->venctolicensa2_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa2__hora'] =  $this->venctolicensa2__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['icms_'] =  $this->icms_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['suframa_'] =  $this->suframa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['limitecredito_'] =  $this->limitecredito_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['vendedor_'] =  $this->vendedor_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['restricao_'] =  $this->restricao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['comissao_'] =  $this->comissao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['transportadora_'] =  $this->transportadora_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['coleta_'] =  $this->coleta_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['segmento_'] =  $this->segmento_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['dataalteracao_'] =  $this->dataalteracao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['dataalteracao__hora'] =  $this->dataalteracao__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['usuario_'] =  $this->usuario_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['requisitos_'] =  $this->requisitos_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['banco_'] =  $this->banco_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailcobranca_'] =  $this->emailcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailtecnico_'] =  $this->emailtecnico_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['midia_'] =  $this->midia_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['seg_'] =  $this->seg_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['ter_'] =  $this->ter_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qua_'] =  $this->qua_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qui_'] =  $this->qui_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['sex_'] =  $this->sex_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['certificado_'] =  $this->certificado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailnfe_'] =  $this->emailnfe_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fundacao_'] =  $this->fundacao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fundacao__hora'] =  $this->fundacao__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['site_'] =  $this->site_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['financeiro_'] =  $this->financeiro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['numero_'] =  $this->numero_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['complemento_'] =  $this->complemento_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['razaosocialentrega_'] =  $this->razaosocialentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['entrega_'] =  $this->entrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatotecnico_'] =  $this->contatotecnico_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['logistica_'] =  $this->logistica_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['pimportado_'] =  $this->pimportado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['vendedor01_'] =  $this->vendedor01_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form") 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt) 
          { 
              $this->sc_after_all_update = true;
          }
          if ($this->sc_teve_excl) 
          { 
              $this->sc_after_all_delete = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_dbo_cliente_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_dbo_cliente);
          $this->NM_ajax_info['fldList']['cd_cliente_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['cd_cliente_']);
          $this->NM_close_db();
          form_dbo_cliente_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_dbo_cliente_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_dbo_cliente']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'cd_cliente_':
               return "Cd Cliente";
               break;
           case 'razaosocial_':
               return "Razaosocial";
               break;
           case 'nomefantasia_':
               return "Nomefantasia";
               break;
           case 'cgc_':
               return "Cgc";
               break;
           case 'inscricao_':
               return "Inscricao";
               break;
           case 'endereco_':
               return "Endereco";
               break;
           case 'cidade_':
               return "Cidade";
               break;
           case 'estado_':
               return "Estado";
               break;
           case 'bairro_':
               return "Bairro";
               break;
           case 'cep_':
               return "Cep";
               break;
           case 'email_':
               return "Email";
               break;
           case 'fone_':
               return "Fone";
               break;
           case 'fone1_':
               return "Fone 1";
               break;
           case 'fax_':
               return "Fax";
               break;
           case 'contato_':
               return "Contato";
               break;
           case 'enderecocobranca_':
               return "Enderecocobranca";
               break;
           case 'cidadecobranca_':
               return "Cidadecobranca";
               break;
           case 'bairrocobranca_':
               return "Bairrocobranca";
               break;
           case 'estadocobranca_':
               return "Estadocobranca";
               break;
           case 'cepcobranca_':
               return "Cepcobranca";
               break;
           case 'fonecobranca_':
               return "Fonecobranca";
               break;
           case 'faxcobranca_':
               return "Faxcobranca";
               break;
           case 'contatocobranca_':
               return "Contatocobranca";
               break;
           case 'cgcentrega_':
               return "Cgcentrega";
               break;
           case 'inscricaoentrega_':
               return "Inscricaoentrega";
               break;
           case 'enderecoentrega_':
               return "Enderecoentrega";
               break;
           case 'cidadeentrega_':
               return "Cidadeentrega";
               break;
           case 'bairroentrega_':
               return "Bairroentrega";
               break;
           case 'estadoentrega_':
               return "Estadoentrega";
               break;
           case 'cepentrega_':
               return "Cepentrega";
               break;
           case 'foneentrega_':
               return "Foneentrega";
               break;
           case 'contatoentrega_':
               return "Contatoentrega";
               break;
           case 'contatoexpedicao_':
               return "Contatoexpedicao";
               break;
           case 'foneexpedicao_':
               return "Foneexpedicao";
               break;
           case 'datacadastro_':
               return "Datacadastro";
               break;
           case 'obs_':
               return "Obs";
               break;
           case 'tipo_':
               return "Tipo";
               break;
           case 'consumidor_':
               return "Consumidor";
               break;
           case 'licensa_':
               return "Licensa";
               break;
           case 'venctolicensa_':
               return "Venctolicensa";
               break;
           case 'licensa1_':
               return "Licensa 1";
               break;
           case 'venctolicensa1_':
               return "Venctolicensa 1";
               break;
           case 'qtdeliberada_':
               return "Qtdeliberada";
               break;
           case 'licensa2_':
               return "Licensa 2";
               break;
           case 'venctolicensa2_':
               return "Venctolicensa 2";
               break;
           case 'icms_':
               return "Icms";
               break;
           case 'suframa_':
               return "Suframa";
               break;
           case 'limitecredito_':
               return "Limitecredito";
               break;
           case 'vendedor_':
               return "Vendedor";
               break;
           case 'restricao_':
               return "Restricao";
               break;
           case 'comissao_':
               return "Comissao";
               break;
           case 'transportadora_':
               return "Transportadora";
               break;
           case 'coleta_':
               return "Coleta";
               break;
           case 'segmento_':
               return "Segmento";
               break;
           case 'dataalteracao_':
               return "Dataalteracao";
               break;
           case 'usuario_':
               return "Usuario";
               break;
           case 'requisitos_':
               return "REQUISITOS";
               break;
           case 'banco_':
               return "Banco";
               break;
           case 'emailcobranca_':
               return "Emailcobranca";
               break;
           case 'emailtecnico_':
               return "Emailtecnico";
               break;
           case 'midia_':
               return "Midia";
               break;
           case 'seg_':
               return "Seg";
               break;
           case 'ter_':
               return "Ter";
               break;
           case 'qua_':
               return "Qua";
               break;
           case 'qui_':
               return "Qui";
               break;
           case 'sex_':
               return "Sex";
               break;
           case 'certificado_':
               return "Certificado";
               break;
           case 'emailnfe_':
               return "Emailnfe";
               break;
           case 'fundacao_':
               return "Fundacao";
               break;
           case 'site_':
               return "Site";
               break;
           case 'financeiro_':
               return "Financeiro";
               break;
           case 'numero_':
               return "Numero";
               break;
           case 'complemento_':
               return "Complemento";
               break;
           case 'razaosocialentrega_':
               return "Razaosocialentrega";
               break;
           case 'entrega_':
               return "Entrega";
               break;
           case 'contatotecnico_':
               return "Contatotecnico";
               break;
           case 'logistica_':
               return "Logistica";
               break;
           case 'pimportado_':
               return "Pimportado";
               break;
           case 'vendedor01_':
               return "Vendedor 01";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_dbo_cliente']) || !is_array($this->NM_ajax_info['errList']['geral_form_dbo_cliente']))
              {
                  $this->NM_ajax_info['errList']['geral_form_dbo_cliente'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_dbo_cliente'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'cd_cliente_' == $filtro)
        $this->ValidateField_cd_cliente_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'razaosocial_' == $filtro)
        $this->ValidateField_razaosocial_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nomefantasia_' == $filtro)
        $this->ValidateField_nomefantasia_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgc_' == $filtro)
        $this->ValidateField_cgc_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'inscricao_' == $filtro)
        $this->ValidateField_inscricao_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'endereco_' == $filtro)
        $this->ValidateField_endereco_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cidade_' == $filtro)
        $this->ValidateField_cidade_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'estado_' == $filtro)
        $this->ValidateField_estado_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bairro_' == $filtro)
        $this->ValidateField_bairro_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cep_' == $filtro)
        $this->ValidateField_cep_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'email_' == $filtro)
        $this->ValidateField_email_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fone_' == $filtro)
        $this->ValidateField_fone_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fone1_' == $filtro)
        $this->ValidateField_fone1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fax_' == $filtro)
        $this->ValidateField_fax_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contato_' == $filtro)
        $this->ValidateField_contato_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'enderecocobranca_' == $filtro)
        $this->ValidateField_enderecocobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cidadecobranca_' == $filtro)
        $this->ValidateField_cidadecobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bairrocobranca_' == $filtro)
        $this->ValidateField_bairrocobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'estadocobranca_' == $filtro)
        $this->ValidateField_estadocobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cepcobranca_' == $filtro)
        $this->ValidateField_cepcobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fonecobranca_' == $filtro)
        $this->ValidateField_fonecobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'faxcobranca_' == $filtro)
        $this->ValidateField_faxcobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contatocobranca_' == $filtro)
        $this->ValidateField_contatocobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cgcentrega_' == $filtro)
        $this->ValidateField_cgcentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'inscricaoentrega_' == $filtro)
        $this->ValidateField_inscricaoentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'enderecoentrega_' == $filtro)
        $this->ValidateField_enderecoentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cidadeentrega_' == $filtro)
        $this->ValidateField_cidadeentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bairroentrega_' == $filtro)
        $this->ValidateField_bairroentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'estadoentrega_' == $filtro)
        $this->ValidateField_estadoentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cepentrega_' == $filtro)
        $this->ValidateField_cepentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'foneentrega_' == $filtro)
        $this->ValidateField_foneentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contatoentrega_' == $filtro)
        $this->ValidateField_contatoentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contatoexpedicao_' == $filtro)
        $this->ValidateField_contatoexpedicao_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'foneexpedicao_' == $filtro)
        $this->ValidateField_foneexpedicao_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'datacadastro_' == $filtro)
        $this->ValidateField_datacadastro_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'obs_' == $filtro)
        $this->ValidateField_obs_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_' == $filtro)
        $this->ValidateField_tipo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'consumidor_' == $filtro)
        $this->ValidateField_consumidor_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'licensa_' == $filtro)
        $this->ValidateField_licensa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'venctolicensa_' == $filtro)
        $this->ValidateField_venctolicensa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'licensa1_' == $filtro)
        $this->ValidateField_licensa1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'venctolicensa1_' == $filtro)
        $this->ValidateField_venctolicensa1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qtdeliberada_' == $filtro)
        $this->ValidateField_qtdeliberada_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'licensa2_' == $filtro)
        $this->ValidateField_licensa2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'venctolicensa2_' == $filtro)
        $this->ValidateField_venctolicensa2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'icms_' == $filtro)
        $this->ValidateField_icms_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'suframa_' == $filtro)
        $this->ValidateField_suframa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'limitecredito_' == $filtro)
        $this->ValidateField_limitecredito_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'vendedor_' == $filtro)
        $this->ValidateField_vendedor_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'restricao_' == $filtro)
        $this->ValidateField_restricao_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'comissao_' == $filtro)
        $this->ValidateField_comissao_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'transportadora_' == $filtro)
        $this->ValidateField_transportadora_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'coleta_' == $filtro)
        $this->ValidateField_coleta_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'segmento_' == $filtro)
        $this->ValidateField_segmento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dataalteracao_' == $filtro)
        $this->ValidateField_dataalteracao_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'usuario_' == $filtro)
        $this->ValidateField_usuario_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'requisitos_' == $filtro)
        $this->ValidateField_requisitos_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'banco_' == $filtro)
        $this->ValidateField_banco_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'emailcobranca_' == $filtro)
        $this->ValidateField_emailcobranca_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'emailtecnico_' == $filtro)
        $this->ValidateField_emailtecnico_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'midia_' == $filtro)
        $this->ValidateField_midia_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'seg_' == $filtro)
        $this->ValidateField_seg_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ter_' == $filtro)
        $this->ValidateField_ter_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qua_' == $filtro)
        $this->ValidateField_qua_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'qui_' == $filtro)
        $this->ValidateField_qui_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sex_' == $filtro)
        $this->ValidateField_sex_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'certificado_' == $filtro)
        $this->ValidateField_certificado_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'emailnfe_' == $filtro)
        $this->ValidateField_emailnfe_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fundacao_' == $filtro)
        $this->ValidateField_fundacao_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'site_' == $filtro)
        $this->ValidateField_site_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'financeiro_' == $filtro)
        $this->ValidateField_financeiro_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'numero_' == $filtro)
        $this->ValidateField_numero_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'complemento_' == $filtro)
        $this->ValidateField_complemento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'razaosocialentrega_' == $filtro)
        $this->ValidateField_razaosocialentrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'entrega_' == $filtro)
        $this->ValidateField_entrega_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contatotecnico_' == $filtro)
        $this->ValidateField_contatotecnico_($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_cd_cliente_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->cd_cliente_) > 6) 
          { 
              $Campos_Crit .= "Cd Cliente " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cd_cliente_']))
              {
                  $Campos_Erros['cd_cliente_'] = array();
              }
              $Campos_Erros['cd_cliente_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cd_cliente_']) || !is_array($this->NM_ajax_info['errList']['cd_cliente_']))
              {
                  $this->NM_ajax_info['errList']['cd_cliente_'] = array();
              }
              $this->NM_ajax_info['errList']['cd_cliente_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cd_cliente_

    function ValidateField_razaosocial_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->razaosocial_) > 60) 
          { 
              $Campos_Crit .= "Razaosocial " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['razaosocial_']))
              {
                  $Campos_Erros['razaosocial_'] = array();
              }
              $Campos_Erros['razaosocial_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['razaosocial_']) || !is_array($this->NM_ajax_info['errList']['razaosocial_']))
              {
                  $this->NM_ajax_info['errList']['razaosocial_'] = array();
              }
              $this->NM_ajax_info['errList']['razaosocial_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_razaosocial_

    function ValidateField_nomefantasia_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nomefantasia_) > 30) 
          { 
              $Campos_Crit .= "Nomefantasia " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nomefantasia_']))
              {
                  $Campos_Erros['nomefantasia_'] = array();
              }
              $Campos_Erros['nomefantasia_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nomefantasia_']) || !is_array($this->NM_ajax_info['errList']['nomefantasia_']))
              {
                  $this->NM_ajax_info['errList']['nomefantasia_'] = array();
              }
              $this->NM_ajax_info['errList']['nomefantasia_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nomefantasia_

    function ValidateField_cgc_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cgc_) > 15) 
          { 
              $Campos_Crit .= "Cgc " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cgc_']))
              {
                  $Campos_Erros['cgc_'] = array();
              }
              $Campos_Erros['cgc_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cgc_']) || !is_array($this->NM_ajax_info['errList']['cgc_']))
              {
                  $this->NM_ajax_info['errList']['cgc_'] = array();
              }
              $this->NM_ajax_info['errList']['cgc_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cgc_

    function ValidateField_inscricao_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->inscricao_) > 18) 
          { 
              $Campos_Crit .= "Inscricao " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['inscricao_']))
              {
                  $Campos_Erros['inscricao_'] = array();
              }
              $Campos_Erros['inscricao_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['inscricao_']) || !is_array($this->NM_ajax_info['errList']['inscricao_']))
              {
                  $this->NM_ajax_info['errList']['inscricao_'] = array();
              }
              $this->NM_ajax_info['errList']['inscricao_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_inscricao_

    function ValidateField_endereco_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->endereco_) > 40) 
          { 
              $Campos_Crit .= "Endereco " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['endereco_']))
              {
                  $Campos_Erros['endereco_'] = array();
              }
              $Campos_Erros['endereco_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['endereco_']) || !is_array($this->NM_ajax_info['errList']['endereco_']))
              {
                  $this->NM_ajax_info['errList']['endereco_'] = array();
              }
              $this->NM_ajax_info['errList']['endereco_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_endereco_

    function ValidateField_cidade_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cidade_) > 30) 
          { 
              $Campos_Crit .= "Cidade " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cidade_']))
              {
                  $Campos_Erros['cidade_'] = array();
              }
              $Campos_Erros['cidade_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cidade_']) || !is_array($this->NM_ajax_info['errList']['cidade_']))
              {
                  $this->NM_ajax_info['errList']['cidade_'] = array();
              }
              $this->NM_ajax_info['errList']['cidade_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cidade_

    function ValidateField_estado_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->estado_) > 2) 
          { 
              $Campos_Crit .= "Estado " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['estado_']))
              {
                  $Campos_Erros['estado_'] = array();
              }
              $Campos_Erros['estado_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['estado_']) || !is_array($this->NM_ajax_info['errList']['estado_']))
              {
                  $this->NM_ajax_info['errList']['estado_'] = array();
              }
              $this->NM_ajax_info['errList']['estado_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_estado_

    function ValidateField_bairro_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bairro_) > 30) 
          { 
              $Campos_Crit .= "Bairro " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bairro_']))
              {
                  $Campos_Erros['bairro_'] = array();
              }
              $Campos_Erros['bairro_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bairro_']) || !is_array($this->NM_ajax_info['errList']['bairro_']))
              {
                  $this->NM_ajax_info['errList']['bairro_'] = array();
              }
              $this->NM_ajax_info['errList']['bairro_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_bairro_

    function ValidateField_cep_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cep_) > 8) 
          { 
              $Campos_Crit .= "Cep " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cep_']))
              {
                  $Campos_Erros['cep_'] = array();
              }
              $Campos_Erros['cep_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cep_']) || !is_array($this->NM_ajax_info['errList']['cep_']))
              {
                  $this->NM_ajax_info['errList']['cep_'] = array();
              }
              $this->NM_ajax_info['errList']['cep_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cep_

    function ValidateField_email_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->email_) > 200) 
          { 
              $Campos_Crit .= "Email " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['email_']))
              {
                  $Campos_Erros['email_'] = array();
              }
              $Campos_Erros['email_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['email_']) || !is_array($this->NM_ajax_info['errList']['email_']))
              {
                  $this->NM_ajax_info['errList']['email_'] = array();
              }
              $this->NM_ajax_info['errList']['email_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_email_

    function ValidateField_fone_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fone_) > 25) 
          { 
              $Campos_Crit .= "Fone " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fone_']))
              {
                  $Campos_Erros['fone_'] = array();
              }
              $Campos_Erros['fone_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fone_']) || !is_array($this->NM_ajax_info['errList']['fone_']))
              {
                  $this->NM_ajax_info['errList']['fone_'] = array();
              }
              $this->NM_ajax_info['errList']['fone_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_fone_

    function ValidateField_fone1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fone1_) > 25) 
          { 
              $Campos_Crit .= "Fone 1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fone1_']))
              {
                  $Campos_Erros['fone1_'] = array();
              }
              $Campos_Erros['fone1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fone1_']) || !is_array($this->NM_ajax_info['errList']['fone1_']))
              {
                  $this->NM_ajax_info['errList']['fone1_'] = array();
              }
              $this->NM_ajax_info['errList']['fone1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_fone1_

    function ValidateField_fax_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fax_) > 25) 
          { 
              $Campos_Crit .= "Fax " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fax_']))
              {
                  $Campos_Erros['fax_'] = array();
              }
              $Campos_Erros['fax_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fax_']) || !is_array($this->NM_ajax_info['errList']['fax_']))
              {
                  $this->NM_ajax_info['errList']['fax_'] = array();
              }
              $this->NM_ajax_info['errList']['fax_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_fax_

    function ValidateField_contato_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contato_) > 30) 
          { 
              $Campos_Crit .= "Contato " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contato_']))
              {
                  $Campos_Erros['contato_'] = array();
              }
              $Campos_Erros['contato_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contato_']) || !is_array($this->NM_ajax_info['errList']['contato_']))
              {
                  $this->NM_ajax_info['errList']['contato_'] = array();
              }
              $this->NM_ajax_info['errList']['contato_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_contato_

    function ValidateField_enderecocobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->enderecocobranca_) > 40) 
          { 
              $Campos_Crit .= "Enderecocobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['enderecocobranca_']))
              {
                  $Campos_Erros['enderecocobranca_'] = array();
              }
              $Campos_Erros['enderecocobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['enderecocobranca_']) || !is_array($this->NM_ajax_info['errList']['enderecocobranca_']))
              {
                  $this->NM_ajax_info['errList']['enderecocobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['enderecocobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_enderecocobranca_

    function ValidateField_cidadecobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cidadecobranca_) > 30) 
          { 
              $Campos_Crit .= "Cidadecobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cidadecobranca_']))
              {
                  $Campos_Erros['cidadecobranca_'] = array();
              }
              $Campos_Erros['cidadecobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cidadecobranca_']) || !is_array($this->NM_ajax_info['errList']['cidadecobranca_']))
              {
                  $this->NM_ajax_info['errList']['cidadecobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['cidadecobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cidadecobranca_

    function ValidateField_bairrocobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bairrocobranca_) > 30) 
          { 
              $Campos_Crit .= "Bairrocobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bairrocobranca_']))
              {
                  $Campos_Erros['bairrocobranca_'] = array();
              }
              $Campos_Erros['bairrocobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bairrocobranca_']) || !is_array($this->NM_ajax_info['errList']['bairrocobranca_']))
              {
                  $this->NM_ajax_info['errList']['bairrocobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['bairrocobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_bairrocobranca_

    function ValidateField_estadocobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->estadocobranca_) > 2) 
          { 
              $Campos_Crit .= "Estadocobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['estadocobranca_']))
              {
                  $Campos_Erros['estadocobranca_'] = array();
              }
              $Campos_Erros['estadocobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['estadocobranca_']) || !is_array($this->NM_ajax_info['errList']['estadocobranca_']))
              {
                  $this->NM_ajax_info['errList']['estadocobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['estadocobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_estadocobranca_

    function ValidateField_cepcobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cepcobranca_) > 8) 
          { 
              $Campos_Crit .= "Cepcobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cepcobranca_']))
              {
                  $Campos_Erros['cepcobranca_'] = array();
              }
              $Campos_Erros['cepcobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cepcobranca_']) || !is_array($this->NM_ajax_info['errList']['cepcobranca_']))
              {
                  $this->NM_ajax_info['errList']['cepcobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['cepcobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cepcobranca_

    function ValidateField_fonecobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->fonecobranca_) > 25) 
          { 
              $Campos_Crit .= "Fonecobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['fonecobranca_']))
              {
                  $Campos_Erros['fonecobranca_'] = array();
              }
              $Campos_Erros['fonecobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['fonecobranca_']) || !is_array($this->NM_ajax_info['errList']['fonecobranca_']))
              {
                  $this->NM_ajax_info['errList']['fonecobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['fonecobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_fonecobranca_

    function ValidateField_faxcobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->faxcobranca_) > 25) 
          { 
              $Campos_Crit .= "Faxcobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['faxcobranca_']))
              {
                  $Campos_Erros['faxcobranca_'] = array();
              }
              $Campos_Erros['faxcobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['faxcobranca_']) || !is_array($this->NM_ajax_info['errList']['faxcobranca_']))
              {
                  $this->NM_ajax_info['errList']['faxcobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['faxcobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_faxcobranca_

    function ValidateField_contatocobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contatocobranca_) > 30) 
          { 
              $Campos_Crit .= "Contatocobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contatocobranca_']))
              {
                  $Campos_Erros['contatocobranca_'] = array();
              }
              $Campos_Erros['contatocobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contatocobranca_']) || !is_array($this->NM_ajax_info['errList']['contatocobranca_']))
              {
                  $this->NM_ajax_info['errList']['contatocobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['contatocobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_contatocobranca_

    function ValidateField_cgcentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cgcentrega_) > 15) 
          { 
              $Campos_Crit .= "Cgcentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cgcentrega_']))
              {
                  $Campos_Erros['cgcentrega_'] = array();
              }
              $Campos_Erros['cgcentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cgcentrega_']) || !is_array($this->NM_ajax_info['errList']['cgcentrega_']))
              {
                  $this->NM_ajax_info['errList']['cgcentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['cgcentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cgcentrega_

    function ValidateField_inscricaoentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->inscricaoentrega_) > 18) 
          { 
              $Campos_Crit .= "Inscricaoentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['inscricaoentrega_']))
              {
                  $Campos_Erros['inscricaoentrega_'] = array();
              }
              $Campos_Erros['inscricaoentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['inscricaoentrega_']) || !is_array($this->NM_ajax_info['errList']['inscricaoentrega_']))
              {
                  $this->NM_ajax_info['errList']['inscricaoentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['inscricaoentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 18 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_inscricaoentrega_

    function ValidateField_enderecoentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->enderecoentrega_) > 40) 
          { 
              $Campos_Crit .= "Enderecoentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['enderecoentrega_']))
              {
                  $Campos_Erros['enderecoentrega_'] = array();
              }
              $Campos_Erros['enderecoentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['enderecoentrega_']) || !is_array($this->NM_ajax_info['errList']['enderecoentrega_']))
              {
                  $this->NM_ajax_info['errList']['enderecoentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['enderecoentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_enderecoentrega_

    function ValidateField_cidadeentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cidadeentrega_) > 30) 
          { 
              $Campos_Crit .= "Cidadeentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cidadeentrega_']))
              {
                  $Campos_Erros['cidadeentrega_'] = array();
              }
              $Campos_Erros['cidadeentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cidadeentrega_']) || !is_array($this->NM_ajax_info['errList']['cidadeentrega_']))
              {
                  $this->NM_ajax_info['errList']['cidadeentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['cidadeentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cidadeentrega_

    function ValidateField_bairroentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bairroentrega_) > 30) 
          { 
              $Campos_Crit .= "Bairroentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bairroentrega_']))
              {
                  $Campos_Erros['bairroentrega_'] = array();
              }
              $Campos_Erros['bairroentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bairroentrega_']) || !is_array($this->NM_ajax_info['errList']['bairroentrega_']))
              {
                  $this->NM_ajax_info['errList']['bairroentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['bairroentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_bairroentrega_

    function ValidateField_estadoentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->estadoentrega_) > 2) 
          { 
              $Campos_Crit .= "Estadoentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['estadoentrega_']))
              {
                  $Campos_Erros['estadoentrega_'] = array();
              }
              $Campos_Erros['estadoentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['estadoentrega_']) || !is_array($this->NM_ajax_info['errList']['estadoentrega_']))
              {
                  $this->NM_ajax_info['errList']['estadoentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['estadoentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_estadoentrega_

    function ValidateField_cepentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cepentrega_) > 8) 
          { 
              $Campos_Crit .= "Cepentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cepentrega_']))
              {
                  $Campos_Erros['cepentrega_'] = array();
              }
              $Campos_Erros['cepentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cepentrega_']) || !is_array($this->NM_ajax_info['errList']['cepentrega_']))
              {
                  $this->NM_ajax_info['errList']['cepentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['cepentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_cepentrega_

    function ValidateField_foneentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->foneentrega_) > 25) 
          { 
              $Campos_Crit .= "Foneentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['foneentrega_']))
              {
                  $Campos_Erros['foneentrega_'] = array();
              }
              $Campos_Erros['foneentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['foneentrega_']) || !is_array($this->NM_ajax_info['errList']['foneentrega_']))
              {
                  $this->NM_ajax_info['errList']['foneentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['foneentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_foneentrega_

    function ValidateField_contatoentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contatoentrega_) > 30) 
          { 
              $Campos_Crit .= "Contatoentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contatoentrega_']))
              {
                  $Campos_Erros['contatoentrega_'] = array();
              }
              $Campos_Erros['contatoentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contatoentrega_']) || !is_array($this->NM_ajax_info['errList']['contatoentrega_']))
              {
                  $this->NM_ajax_info['errList']['contatoentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['contatoentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_contatoentrega_

    function ValidateField_contatoexpedicao_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contatoexpedicao_) > 30) 
          { 
              $Campos_Crit .= "Contatoexpedicao " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contatoexpedicao_']))
              {
                  $Campos_Erros['contatoexpedicao_'] = array();
              }
              $Campos_Erros['contatoexpedicao_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contatoexpedicao_']) || !is_array($this->NM_ajax_info['errList']['contatoexpedicao_']))
              {
                  $this->NM_ajax_info['errList']['contatoexpedicao_'] = array();
              }
              $this->NM_ajax_info['errList']['contatoexpedicao_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_contatoexpedicao_

    function ValidateField_foneexpedicao_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->foneexpedicao_) > 25) 
          { 
              $Campos_Crit .= "Foneexpedicao " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['foneexpedicao_']))
              {
                  $Campos_Erros['foneexpedicao_'] = array();
              }
              $Campos_Erros['foneexpedicao_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['foneexpedicao_']) || !is_array($this->NM_ajax_info['errList']['foneexpedicao_']))
              {
                  $this->NM_ajax_info['errList']['foneexpedicao_'] = array();
              }
              $this->NM_ajax_info['errList']['foneexpedicao_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_foneexpedicao_

    function ValidateField_datacadastro_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->datacadastro_, $this->field_config['datacadastro_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['datacadastro_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['datacadastro_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['datacadastro_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['datacadastro_']['date_sep']) ; 
          if (trim($this->datacadastro_) != "")  
          { 
              if ($teste_validade->Data($this->datacadastro_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Datacadastro; " ; 
                  if (!isset($Campos_Erros['datacadastro_']))
                  {
                      $Campos_Erros['datacadastro_'] = array();
                  }
                  $Campos_Erros['datacadastro_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['datacadastro_']) || !is_array($this->NM_ajax_info['errList']['datacadastro_']))
                  {
                      $this->NM_ajax_info['errList']['datacadastro_'] = array();
                  }
                  $this->NM_ajax_info['errList']['datacadastro_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['datacadastro_']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->datacadastro__hora, $this->field_config['datacadastro__hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['datacadastro__hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['datacadastro__hora']['time_sep']) ; 
          if (trim($this->datacadastro__hora) != "")  
          { 
              if ($teste_validade->Hora($this->datacadastro__hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Datacadastro; " ; 
                  if (!isset($Campos_Erros['datacadastro__hora']))
                  {
                      $Campos_Erros['datacadastro__hora'] = array();
                  }
                  $Campos_Erros['datacadastro__hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['datacadastro_']) || !is_array($this->NM_ajax_info['errList']['datacadastro_']))
                  {
                      $this->NM_ajax_info['errList']['datacadastro_'] = array();
                  }
                  $this->NM_ajax_info['errList']['datacadastro_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['datacadastro_']) && isset($Campos_Erros['datacadastro__hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['datacadastro_'], $Campos_Erros['datacadastro__hora']);
          if (empty($Campos_Erros['datacadastro__hora']))
          {
              unset($Campos_Erros['datacadastro__hora']);
          }
          if (isset($this->NM_ajax_info['errList']['datacadastro_']))
          {
              $this->NM_ajax_info['errList']['datacadastro_'] = array_unique($this->NM_ajax_info['errList']['datacadastro_']);
          }
      }
    } // ValidateField_datacadastro__hora

    function ValidateField_obs_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->obs_) > 32767) 
          { 
              $Campos_Crit .= "Obs " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obs_']))
              {
                  $Campos_Erros['obs_'] = array();
              }
              $Campos_Erros['obs_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obs_']) || !is_array($this->NM_ajax_info['errList']['obs_']))
              {
                  $this->NM_ajax_info['errList']['obs_'] = array();
              }
              $this->NM_ajax_info['errList']['obs_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_obs_

    function ValidateField_tipo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_) > 1) 
          { 
              $Campos_Crit .= "Tipo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_']))
              {
                  $Campos_Erros['tipo_'] = array();
              }
              $Campos_Erros['tipo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_']) || !is_array($this->NM_ajax_info['errList']['tipo_']))
              {
                  $this->NM_ajax_info['errList']['tipo_'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_tipo_

    function ValidateField_consumidor_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->consumidor_) > 3) 
          { 
              $Campos_Crit .= "Consumidor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['consumidor_']))
              {
                  $Campos_Erros['consumidor_'] = array();
              }
              $Campos_Erros['consumidor_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['consumidor_']) || !is_array($this->NM_ajax_info['errList']['consumidor_']))
              {
                  $this->NM_ajax_info['errList']['consumidor_'] = array();
              }
              $this->NM_ajax_info['errList']['consumidor_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_consumidor_

    function ValidateField_licensa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->licensa_) > 15) 
          { 
              $Campos_Crit .= "Licensa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['licensa_']))
              {
                  $Campos_Erros['licensa_'] = array();
              }
              $Campos_Erros['licensa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['licensa_']) || !is_array($this->NM_ajax_info['errList']['licensa_']))
              {
                  $this->NM_ajax_info['errList']['licensa_'] = array();
              }
              $this->NM_ajax_info['errList']['licensa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_licensa_

    function ValidateField_venctolicensa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->venctolicensa_, $this->field_config['venctolicensa_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['venctolicensa_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['venctolicensa_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['venctolicensa_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['venctolicensa_']['date_sep']) ; 
          if (trim($this->venctolicensa_) != "")  
          { 
              if ($teste_validade->Data($this->venctolicensa_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Venctolicensa; " ; 
                  if (!isset($Campos_Erros['venctolicensa_']))
                  {
                      $Campos_Erros['venctolicensa_'] = array();
                  }
                  $Campos_Erros['venctolicensa_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['venctolicensa_']) || !is_array($this->NM_ajax_info['errList']['venctolicensa_']))
                  {
                      $this->NM_ajax_info['errList']['venctolicensa_'] = array();
                  }
                  $this->NM_ajax_info['errList']['venctolicensa_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['venctolicensa_']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->venctolicensa__hora, $this->field_config['venctolicensa__hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['venctolicensa__hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['venctolicensa__hora']['time_sep']) ; 
          if (trim($this->venctolicensa__hora) != "")  
          { 
              if ($teste_validade->Hora($this->venctolicensa__hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Venctolicensa; " ; 
                  if (!isset($Campos_Erros['venctolicensa__hora']))
                  {
                      $Campos_Erros['venctolicensa__hora'] = array();
                  }
                  $Campos_Erros['venctolicensa__hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['venctolicensa_']) || !is_array($this->NM_ajax_info['errList']['venctolicensa_']))
                  {
                      $this->NM_ajax_info['errList']['venctolicensa_'] = array();
                  }
                  $this->NM_ajax_info['errList']['venctolicensa_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['venctolicensa_']) && isset($Campos_Erros['venctolicensa__hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['venctolicensa_'], $Campos_Erros['venctolicensa__hora']);
          if (empty($Campos_Erros['venctolicensa__hora']))
          {
              unset($Campos_Erros['venctolicensa__hora']);
          }
          if (isset($this->NM_ajax_info['errList']['venctolicensa_']))
          {
              $this->NM_ajax_info['errList']['venctolicensa_'] = array_unique($this->NM_ajax_info['errList']['venctolicensa_']);
          }
      }
    } // ValidateField_venctolicensa__hora

    function ValidateField_licensa1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->licensa1_) > 15) 
          { 
              $Campos_Crit .= "Licensa 1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['licensa1_']))
              {
                  $Campos_Erros['licensa1_'] = array();
              }
              $Campos_Erros['licensa1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['licensa1_']) || !is_array($this->NM_ajax_info['errList']['licensa1_']))
              {
                  $this->NM_ajax_info['errList']['licensa1_'] = array();
              }
              $this->NM_ajax_info['errList']['licensa1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_licensa1_

    function ValidateField_venctolicensa1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->venctolicensa1_, $this->field_config['venctolicensa1_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['venctolicensa1_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['venctolicensa1_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['venctolicensa1_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['venctolicensa1_']['date_sep']) ; 
          if (trim($this->venctolicensa1_) != "")  
          { 
              if ($teste_validade->Data($this->venctolicensa1_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Venctolicensa 1; " ; 
                  if (!isset($Campos_Erros['venctolicensa1_']))
                  {
                      $Campos_Erros['venctolicensa1_'] = array();
                  }
                  $Campos_Erros['venctolicensa1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['venctolicensa1_']) || !is_array($this->NM_ajax_info['errList']['venctolicensa1_']))
                  {
                      $this->NM_ajax_info['errList']['venctolicensa1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['venctolicensa1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['venctolicensa1_']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->venctolicensa1__hora, $this->field_config['venctolicensa1__hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['venctolicensa1__hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['venctolicensa1__hora']['time_sep']) ; 
          if (trim($this->venctolicensa1__hora) != "")  
          { 
              if ($teste_validade->Hora($this->venctolicensa1__hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Venctolicensa 1; " ; 
                  if (!isset($Campos_Erros['venctolicensa1__hora']))
                  {
                      $Campos_Erros['venctolicensa1__hora'] = array();
                  }
                  $Campos_Erros['venctolicensa1__hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['venctolicensa1_']) || !is_array($this->NM_ajax_info['errList']['venctolicensa1_']))
                  {
                      $this->NM_ajax_info['errList']['venctolicensa1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['venctolicensa1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['venctolicensa1_']) && isset($Campos_Erros['venctolicensa1__hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['venctolicensa1_'], $Campos_Erros['venctolicensa1__hora']);
          if (empty($Campos_Erros['venctolicensa1__hora']))
          {
              unset($Campos_Erros['venctolicensa1__hora']);
          }
          if (isset($this->NM_ajax_info['errList']['venctolicensa1_']))
          {
              $this->NM_ajax_info['errList']['venctolicensa1_'] = array_unique($this->NM_ajax_info['errList']['venctolicensa1_']);
          }
      }
    } // ValidateField_venctolicensa1__hora

    function ValidateField_qtdeliberada_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->qtdeliberada_ == "")  
      { 
          $this->qtdeliberada_ = 0;
          $this->sc_force_zero[] = 'qtdeliberada_';
      } 
      }
      if (!empty($this->field_config['qtdeliberada_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->qtdeliberada_, $this->field_config['qtdeliberada_']['symbol_dec'], $this->field_config['qtdeliberada_']['symbol_grp'], $this->field_config['qtdeliberada_']['symbol_mon']); 
          nm_limpa_valor($this->qtdeliberada_, $this->field_config['qtdeliberada_']['symbol_dec'], $this->field_config['qtdeliberada_']['symbol_grp']) ; 
          if ('.' == substr($this->qtdeliberada_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->qtdeliberada_, 1)))
              {
                  $this->qtdeliberada_ = '';
              }
              else
              {
                  $this->qtdeliberada_ = '0' . $this->qtdeliberada_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->qtdeliberada_ != '')  
          { 
              $iTestSize = 54;
              if (strlen($this->qtdeliberada_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Qtdeliberada: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['qtdeliberada_']))
                  {
                      $Campos_Erros['qtdeliberada_'] = array();
                  }
                  $Campos_Erros['qtdeliberada_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['qtdeliberada_']) || !is_array($this->NM_ajax_info['errList']['qtdeliberada_']))
                  {
                      $this->NM_ajax_info['errList']['qtdeliberada_'] = array();
                  }
                  $this->NM_ajax_info['errList']['qtdeliberada_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->qtdeliberada_, 38, 15, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Qtdeliberada; " ; 
                  if (!isset($Campos_Erros['qtdeliberada_']))
                  {
                      $Campos_Erros['qtdeliberada_'] = array();
                  }
                  $Campos_Erros['qtdeliberada_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['qtdeliberada_']) || !is_array($this->NM_ajax_info['errList']['qtdeliberada_']))
                  {
                      $this->NM_ajax_info['errList']['qtdeliberada_'] = array();
                  }
                  $this->NM_ajax_info['errList']['qtdeliberada_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_qtdeliberada_

    function ValidateField_licensa2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->licensa2_) > 15) 
          { 
              $Campos_Crit .= "Licensa 2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['licensa2_']))
              {
                  $Campos_Erros['licensa2_'] = array();
              }
              $Campos_Erros['licensa2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['licensa2_']) || !is_array($this->NM_ajax_info['errList']['licensa2_']))
              {
                  $this->NM_ajax_info['errList']['licensa2_'] = array();
              }
              $this->NM_ajax_info['errList']['licensa2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_licensa2_

    function ValidateField_venctolicensa2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->venctolicensa2_, $this->field_config['venctolicensa2_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['venctolicensa2_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['venctolicensa2_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['venctolicensa2_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['venctolicensa2_']['date_sep']) ; 
          if (trim($this->venctolicensa2_) != "")  
          { 
              if ($teste_validade->Data($this->venctolicensa2_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Venctolicensa 2; " ; 
                  if (!isset($Campos_Erros['venctolicensa2_']))
                  {
                      $Campos_Erros['venctolicensa2_'] = array();
                  }
                  $Campos_Erros['venctolicensa2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['venctolicensa2_']) || !is_array($this->NM_ajax_info['errList']['venctolicensa2_']))
                  {
                      $this->NM_ajax_info['errList']['venctolicensa2_'] = array();
                  }
                  $this->NM_ajax_info['errList']['venctolicensa2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['venctolicensa2_']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->venctolicensa2__hora, $this->field_config['venctolicensa2__hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['venctolicensa2__hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['venctolicensa2__hora']['time_sep']) ; 
          if (trim($this->venctolicensa2__hora) != "")  
          { 
              if ($teste_validade->Hora($this->venctolicensa2__hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Venctolicensa 2; " ; 
                  if (!isset($Campos_Erros['venctolicensa2__hora']))
                  {
                      $Campos_Erros['venctolicensa2__hora'] = array();
                  }
                  $Campos_Erros['venctolicensa2__hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['venctolicensa2_']) || !is_array($this->NM_ajax_info['errList']['venctolicensa2_']))
                  {
                      $this->NM_ajax_info['errList']['venctolicensa2_'] = array();
                  }
                  $this->NM_ajax_info['errList']['venctolicensa2_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['venctolicensa2_']) && isset($Campos_Erros['venctolicensa2__hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['venctolicensa2_'], $Campos_Erros['venctolicensa2__hora']);
          if (empty($Campos_Erros['venctolicensa2__hora']))
          {
              unset($Campos_Erros['venctolicensa2__hora']);
          }
          if (isset($this->NM_ajax_info['errList']['venctolicensa2_']))
          {
              $this->NM_ajax_info['errList']['venctolicensa2_'] = array_unique($this->NM_ajax_info['errList']['venctolicensa2_']);
          }
      }
    } // ValidateField_venctolicensa2__hora

    function ValidateField_icms_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->icms_ == "")  
      { 
          $this->icms_ = 0;
          $this->sc_force_zero[] = 'icms_';
      } 
      }
      if (!empty($this->field_config['icms_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->icms_, $this->field_config['icms_']['symbol_dec'], $this->field_config['icms_']['symbol_grp'], $this->field_config['icms_']['symbol_mon']); 
          nm_limpa_valor($this->icms_, $this->field_config['icms_']['symbol_dec'], $this->field_config['icms_']['symbol_grp']) ; 
          if ('.' == substr($this->icms_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->icms_, 1)))
              {
                  $this->icms_ = '';
              }
              else
              {
                  $this->icms_ = '0' . $this->icms_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->icms_ != '')  
          { 
              $iTestSize = 54;
              if (strlen($this->icms_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Icms: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['icms_']))
                  {
                      $Campos_Erros['icms_'] = array();
                  }
                  $Campos_Erros['icms_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['icms_']) || !is_array($this->NM_ajax_info['errList']['icms_']))
                  {
                      $this->NM_ajax_info['errList']['icms_'] = array();
                  }
                  $this->NM_ajax_info['errList']['icms_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->icms_, 38, 15, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Icms; " ; 
                  if (!isset($Campos_Erros['icms_']))
                  {
                      $Campos_Erros['icms_'] = array();
                  }
                  $Campos_Erros['icms_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['icms_']) || !is_array($this->NM_ajax_info['errList']['icms_']))
                  {
                      $this->NM_ajax_info['errList']['icms_'] = array();
                  }
                  $this->NM_ajax_info['errList']['icms_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_icms_

    function ValidateField_suframa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->suframa_) > 15) 
          { 
              $Campos_Crit .= "Suframa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['suframa_']))
              {
                  $Campos_Erros['suframa_'] = array();
              }
              $Campos_Erros['suframa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['suframa_']) || !is_array($this->NM_ajax_info['errList']['suframa_']))
              {
                  $this->NM_ajax_info['errList']['suframa_'] = array();
              }
              $this->NM_ajax_info['errList']['suframa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_suframa_

    function ValidateField_limitecredito_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->limitecredito_ == "")  
      { 
          $this->limitecredito_ = 0;
          $this->sc_force_zero[] = 'limitecredito_';
      } 
      }
      if (!empty($this->field_config['limitecredito_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->limitecredito_, $this->field_config['limitecredito_']['symbol_dec'], $this->field_config['limitecredito_']['symbol_grp'], $this->field_config['limitecredito_']['symbol_mon']); 
          nm_limpa_valor($this->limitecredito_, $this->field_config['limitecredito_']['symbol_dec'], $this->field_config['limitecredito_']['symbol_grp']) ; 
          if ('.' == substr($this->limitecredito_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->limitecredito_, 1)))
              {
                  $this->limitecredito_ = '';
              }
              else
              {
                  $this->limitecredito_ = '0' . $this->limitecredito_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->limitecredito_ != '')  
          { 
              $iTestSize = 54;
              if (strlen($this->limitecredito_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Limitecredito: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['limitecredito_']))
                  {
                      $Campos_Erros['limitecredito_'] = array();
                  }
                  $Campos_Erros['limitecredito_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['limitecredito_']) || !is_array($this->NM_ajax_info['errList']['limitecredito_']))
                  {
                      $this->NM_ajax_info['errList']['limitecredito_'] = array();
                  }
                  $this->NM_ajax_info['errList']['limitecredito_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->limitecredito_, 38, 15, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Limitecredito; " ; 
                  if (!isset($Campos_Erros['limitecredito_']))
                  {
                      $Campos_Erros['limitecredito_'] = array();
                  }
                  $Campos_Erros['limitecredito_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['limitecredito_']) || !is_array($this->NM_ajax_info['errList']['limitecredito_']))
                  {
                      $this->NM_ajax_info['errList']['limitecredito_'] = array();
                  }
                  $this->NM_ajax_info['errList']['limitecredito_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_limitecredito_

    function ValidateField_vendedor_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->vendedor_) > 3) 
          { 
              $Campos_Crit .= "Vendedor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['vendedor_']))
              {
                  $Campos_Erros['vendedor_'] = array();
              }
              $Campos_Erros['vendedor_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['vendedor_']) || !is_array($this->NM_ajax_info['errList']['vendedor_']))
              {
                  $this->NM_ajax_info['errList']['vendedor_'] = array();
              }
              $this->NM_ajax_info['errList']['vendedor_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_vendedor_

    function ValidateField_restricao_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->restricao_) > 3) 
          { 
              $Campos_Crit .= "Restricao " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['restricao_']))
              {
                  $Campos_Erros['restricao_'] = array();
              }
              $Campos_Erros['restricao_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['restricao_']) || !is_array($this->NM_ajax_info['errList']['restricao_']))
              {
                  $this->NM_ajax_info['errList']['restricao_'] = array();
              }
              $this->NM_ajax_info['errList']['restricao_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_restricao_

    function ValidateField_comissao_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->comissao_ == "")  
      { 
          $this->comissao_ = 0;
          $this->sc_force_zero[] = 'comissao_';
      } 
      }
      if (!empty($this->field_config['comissao_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->comissao_, $this->field_config['comissao_']['symbol_dec'], $this->field_config['comissao_']['symbol_grp'], $this->field_config['comissao_']['symbol_mon']); 
          nm_limpa_valor($this->comissao_, $this->field_config['comissao_']['symbol_dec'], $this->field_config['comissao_']['symbol_grp']) ; 
          if ('.' == substr($this->comissao_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->comissao_, 1)))
              {
                  $this->comissao_ = '';
              }
              else
              {
                  $this->comissao_ = '0' . $this->comissao_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->comissao_ != '')  
          { 
              $iTestSize = 54;
              if (strlen($this->comissao_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Comissao: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['comissao_']))
                  {
                      $Campos_Erros['comissao_'] = array();
                  }
                  $Campos_Erros['comissao_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['comissao_']) || !is_array($this->NM_ajax_info['errList']['comissao_']))
                  {
                      $this->NM_ajax_info['errList']['comissao_'] = array();
                  }
                  $this->NM_ajax_info['errList']['comissao_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->comissao_, 38, 15, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Comissao; " ; 
                  if (!isset($Campos_Erros['comissao_']))
                  {
                      $Campos_Erros['comissao_'] = array();
                  }
                  $Campos_Erros['comissao_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['comissao_']) || !is_array($this->NM_ajax_info['errList']['comissao_']))
                  {
                      $this->NM_ajax_info['errList']['comissao_'] = array();
                  }
                  $this->NM_ajax_info['errList']['comissao_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_comissao_

    function ValidateField_transportadora_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->transportadora_) > 4) 
          { 
              $Campos_Crit .= "Transportadora " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['transportadora_']))
              {
                  $Campos_Erros['transportadora_'] = array();
              }
              $Campos_Erros['transportadora_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['transportadora_']) || !is_array($this->NM_ajax_info['errList']['transportadora_']))
              {
                  $this->NM_ajax_info['errList']['transportadora_'] = array();
              }
              $this->NM_ajax_info['errList']['transportadora_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_transportadora_

    function ValidateField_coleta_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->coleta_) > 1) 
          { 
              $Campos_Crit .= "Coleta " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['coleta_']))
              {
                  $Campos_Erros['coleta_'] = array();
              }
              $Campos_Erros['coleta_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['coleta_']) || !is_array($this->NM_ajax_info['errList']['coleta_']))
              {
                  $this->NM_ajax_info['errList']['coleta_'] = array();
              }
              $this->NM_ajax_info['errList']['coleta_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_coleta_

    function ValidateField_segmento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->segmento_ == "")  
      { 
          $this->segmento_ = 0;
          $this->sc_force_zero[] = 'segmento_';
      } 
      }
      if (!empty($this->field_config['segmento_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->segmento_, $this->field_config['segmento_']['symbol_dec'], $this->field_config['segmento_']['symbol_grp'], $this->field_config['segmento_']['symbol_mon']); 
          nm_limpa_valor($this->segmento_, $this->field_config['segmento_']['symbol_dec'], $this->field_config['segmento_']['symbol_grp']) ; 
          if ('.' == substr($this->segmento_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->segmento_, 1)))
              {
                  $this->segmento_ = '';
              }
              else
              {
                  $this->segmento_ = '0' . $this->segmento_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->segmento_ != '')  
          { 
              $iTestSize = 54;
              if (strlen($this->segmento_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Segmento: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['segmento_']))
                  {
                      $Campos_Erros['segmento_'] = array();
                  }
                  $Campos_Erros['segmento_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['segmento_']) || !is_array($this->NM_ajax_info['errList']['segmento_']))
                  {
                      $this->NM_ajax_info['errList']['segmento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['segmento_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->segmento_, 38, 15, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Segmento; " ; 
                  if (!isset($Campos_Erros['segmento_']))
                  {
                      $Campos_Erros['segmento_'] = array();
                  }
                  $Campos_Erros['segmento_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['segmento_']) || !is_array($this->NM_ajax_info['errList']['segmento_']))
                  {
                      $this->NM_ajax_info['errList']['segmento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['segmento_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_segmento_

    function ValidateField_dataalteracao_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->dataalteracao_, $this->field_config['dataalteracao_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['dataalteracao_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['dataalteracao_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['dataalteracao_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['dataalteracao_']['date_sep']) ; 
          if (trim($this->dataalteracao_) != "")  
          { 
              if ($teste_validade->Data($this->dataalteracao_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Dataalteracao; " ; 
                  if (!isset($Campos_Erros['dataalteracao_']))
                  {
                      $Campos_Erros['dataalteracao_'] = array();
                  }
                  $Campos_Erros['dataalteracao_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dataalteracao_']) || !is_array($this->NM_ajax_info['errList']['dataalteracao_']))
                  {
                      $this->NM_ajax_info['errList']['dataalteracao_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dataalteracao_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['dataalteracao_']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->dataalteracao__hora, $this->field_config['dataalteracao__hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['dataalteracao__hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['dataalteracao__hora']['time_sep']) ; 
          if (trim($this->dataalteracao__hora) != "")  
          { 
              if ($teste_validade->Hora($this->dataalteracao__hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Dataalteracao; " ; 
                  if (!isset($Campos_Erros['dataalteracao__hora']))
                  {
                      $Campos_Erros['dataalteracao__hora'] = array();
                  }
                  $Campos_Erros['dataalteracao__hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dataalteracao_']) || !is_array($this->NM_ajax_info['errList']['dataalteracao_']))
                  {
                      $this->NM_ajax_info['errList']['dataalteracao_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dataalteracao_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['dataalteracao_']) && isset($Campos_Erros['dataalteracao__hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['dataalteracao_'], $Campos_Erros['dataalteracao__hora']);
          if (empty($Campos_Erros['dataalteracao__hora']))
          {
              unset($Campos_Erros['dataalteracao__hora']);
          }
          if (isset($this->NM_ajax_info['errList']['dataalteracao_']))
          {
              $this->NM_ajax_info['errList']['dataalteracao_'] = array_unique($this->NM_ajax_info['errList']['dataalteracao_']);
          }
      }
    } // ValidateField_dataalteracao__hora

    function ValidateField_usuario_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->usuario_) > 20) 
          { 
              $Campos_Crit .= "Usuario " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['usuario_']))
              {
                  $Campos_Erros['usuario_'] = array();
              }
              $Campos_Erros['usuario_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['usuario_']) || !is_array($this->NM_ajax_info['errList']['usuario_']))
              {
                  $this->NM_ajax_info['errList']['usuario_'] = array();
              }
              $this->NM_ajax_info['errList']['usuario_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_usuario_

    function ValidateField_requisitos_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->requisitos_) > 240) 
          { 
              $Campos_Crit .= "REQUISITOS " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 240 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['requisitos_']))
              {
                  $Campos_Erros['requisitos_'] = array();
              }
              $Campos_Erros['requisitos_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 240 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['requisitos_']) || !is_array($this->NM_ajax_info['errList']['requisitos_']))
              {
                  $this->NM_ajax_info['errList']['requisitos_'] = array();
              }
              $this->NM_ajax_info['errList']['requisitos_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 240 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_requisitos_

    function ValidateField_banco_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->banco_) > 3) 
          { 
              $Campos_Crit .= "Banco " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['banco_']))
              {
                  $Campos_Erros['banco_'] = array();
              }
              $Campos_Erros['banco_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['banco_']) || !is_array($this->NM_ajax_info['errList']['banco_']))
              {
                  $this->NM_ajax_info['errList']['banco_'] = array();
              }
              $this->NM_ajax_info['errList']['banco_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_banco_

    function ValidateField_emailcobranca_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->emailcobranca_) > 100) 
          { 
              $Campos_Crit .= "Emailcobranca " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['emailcobranca_']))
              {
                  $Campos_Erros['emailcobranca_'] = array();
              }
              $Campos_Erros['emailcobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['emailcobranca_']) || !is_array($this->NM_ajax_info['errList']['emailcobranca_']))
              {
                  $this->NM_ajax_info['errList']['emailcobranca_'] = array();
              }
              $this->NM_ajax_info['errList']['emailcobranca_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_emailcobranca_

    function ValidateField_emailtecnico_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->emailtecnico_) > 100) 
          { 
              $Campos_Crit .= "Emailtecnico " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['emailtecnico_']))
              {
                  $Campos_Erros['emailtecnico_'] = array();
              }
              $Campos_Erros['emailtecnico_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['emailtecnico_']) || !is_array($this->NM_ajax_info['errList']['emailtecnico_']))
              {
                  $this->NM_ajax_info['errList']['emailtecnico_'] = array();
              }
              $this->NM_ajax_info['errList']['emailtecnico_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_emailtecnico_

    function ValidateField_midia_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->midia_) > 30) 
          { 
              $Campos_Crit .= "Midia " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['midia_']))
              {
                  $Campos_Erros['midia_'] = array();
              }
              $Campos_Erros['midia_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['midia_']) || !is_array($this->NM_ajax_info['errList']['midia_']))
              {
                  $this->NM_ajax_info['errList']['midia_'] = array();
              }
              $this->NM_ajax_info['errList']['midia_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_midia_

    function ValidateField_seg_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->seg_) > 5) 
          { 
              $Campos_Crit .= "Seg " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['seg_']))
              {
                  $Campos_Erros['seg_'] = array();
              }
              $Campos_Erros['seg_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['seg_']) || !is_array($this->NM_ajax_info['errList']['seg_']))
              {
                  $this->NM_ajax_info['errList']['seg_'] = array();
              }
              $this->NM_ajax_info['errList']['seg_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_seg_

    function ValidateField_ter_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ter_) > 5) 
          { 
              $Campos_Crit .= "Ter " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ter_']))
              {
                  $Campos_Erros['ter_'] = array();
              }
              $Campos_Erros['ter_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ter_']) || !is_array($this->NM_ajax_info['errList']['ter_']))
              {
                  $this->NM_ajax_info['errList']['ter_'] = array();
              }
              $this->NM_ajax_info['errList']['ter_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_ter_

    function ValidateField_qua_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->qua_) > 5) 
          { 
              $Campos_Crit .= "Qua " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['qua_']))
              {
                  $Campos_Erros['qua_'] = array();
              }
              $Campos_Erros['qua_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['qua_']) || !is_array($this->NM_ajax_info['errList']['qua_']))
              {
                  $this->NM_ajax_info['errList']['qua_'] = array();
              }
              $this->NM_ajax_info['errList']['qua_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_qua_

    function ValidateField_qui_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->qui_) > 5) 
          { 
              $Campos_Crit .= "Qui " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['qui_']))
              {
                  $Campos_Erros['qui_'] = array();
              }
              $Campos_Erros['qui_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['qui_']) || !is_array($this->NM_ajax_info['errList']['qui_']))
              {
                  $this->NM_ajax_info['errList']['qui_'] = array();
              }
              $this->NM_ajax_info['errList']['qui_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_qui_

    function ValidateField_sex_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sex_) > 5) 
          { 
              $Campos_Crit .= "Sex " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sex_']))
              {
                  $Campos_Erros['sex_'] = array();
              }
              $Campos_Erros['sex_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sex_']) || !is_array($this->NM_ajax_info['errList']['sex_']))
              {
                  $this->NM_ajax_info['errList']['sex_'] = array();
              }
              $this->NM_ajax_info['errList']['sex_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sex_

    function ValidateField_certificado_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->certificado_) > 5) 
          { 
              $Campos_Crit .= "Certificado " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['certificado_']))
              {
                  $Campos_Erros['certificado_'] = array();
              }
              $Campos_Erros['certificado_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['certificado_']) || !is_array($this->NM_ajax_info['errList']['certificado_']))
              {
                  $this->NM_ajax_info['errList']['certificado_'] = array();
              }
              $this->NM_ajax_info['errList']['certificado_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_certificado_

    function ValidateField_emailnfe_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->emailnfe_) > 200) 
          { 
              $Campos_Crit .= "Emailnfe " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['emailnfe_']))
              {
                  $Campos_Erros['emailnfe_'] = array();
              }
              $Campos_Erros['emailnfe_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['emailnfe_']) || !is_array($this->NM_ajax_info['errList']['emailnfe_']))
              {
                  $this->NM_ajax_info['errList']['emailnfe_'] = array();
              }
              $this->NM_ajax_info['errList']['emailnfe_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_emailnfe_

    function ValidateField_fundacao_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->fundacao_, $this->field_config['fundacao_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fundacao_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fundacao_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fundacao_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fundacao_']['date_sep']) ; 
          if (trim($this->fundacao_) != "")  
          { 
              if ($teste_validade->Data($this->fundacao_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Fundacao; " ; 
                  if (!isset($Campos_Erros['fundacao_']))
                  {
                      $Campos_Erros['fundacao_'] = array();
                  }
                  $Campos_Erros['fundacao_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fundacao_']) || !is_array($this->NM_ajax_info['errList']['fundacao_']))
                  {
                      $this->NM_ajax_info['errList']['fundacao_'] = array();
                  }
                  $this->NM_ajax_info['errList']['fundacao_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fundacao_']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->fundacao__hora, $this->field_config['fundacao__hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['fundacao__hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['fundacao__hora']['time_sep']) ; 
          if (trim($this->fundacao__hora) != "")  
          { 
              if ($teste_validade->Hora($this->fundacao__hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Fundacao; " ; 
                  if (!isset($Campos_Erros['fundacao__hora']))
                  {
                      $Campos_Erros['fundacao__hora'] = array();
                  }
                  $Campos_Erros['fundacao__hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fundacao_']) || !is_array($this->NM_ajax_info['errList']['fundacao_']))
                  {
                      $this->NM_ajax_info['errList']['fundacao_'] = array();
                  }
                  $this->NM_ajax_info['errList']['fundacao_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['fundacao_']) && isset($Campos_Erros['fundacao__hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['fundacao_'], $Campos_Erros['fundacao__hora']);
          if (empty($Campos_Erros['fundacao__hora']))
          {
              unset($Campos_Erros['fundacao__hora']);
          }
          if (isset($this->NM_ajax_info['errList']['fundacao_']))
          {
              $this->NM_ajax_info['errList']['fundacao_'] = array_unique($this->NM_ajax_info['errList']['fundacao_']);
          }
      }
    } // ValidateField_fundacao__hora

    function ValidateField_site_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->site_) > 100) 
          { 
              $Campos_Crit .= "Site " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['site_']))
              {
                  $Campos_Erros['site_'] = array();
              }
              $Campos_Erros['site_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['site_']) || !is_array($this->NM_ajax_info['errList']['site_']))
              {
                  $this->NM_ajax_info['errList']['site_'] = array();
              }
              $this->NM_ajax_info['errList']['site_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_site_

    function ValidateField_financeiro_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->financeiro_) > 1) 
          { 
              $Campos_Crit .= "Financeiro " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['financeiro_']))
              {
                  $Campos_Erros['financeiro_'] = array();
              }
              $Campos_Erros['financeiro_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['financeiro_']) || !is_array($this->NM_ajax_info['errList']['financeiro_']))
              {
                  $this->NM_ajax_info['errList']['financeiro_'] = array();
              }
              $this->NM_ajax_info['errList']['financeiro_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_financeiro_

    function ValidateField_numero_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numero_) > 6) 
          { 
              $Campos_Crit .= "Numero " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numero_']))
              {
                  $Campos_Erros['numero_'] = array();
              }
              $Campos_Erros['numero_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numero_']) || !is_array($this->NM_ajax_info['errList']['numero_']))
              {
                  $this->NM_ajax_info['errList']['numero_'] = array();
              }
              $this->NM_ajax_info['errList']['numero_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_numero_

    function ValidateField_complemento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->complemento_) > 20) 
          { 
              $Campos_Crit .= "Complemento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['complemento_']))
              {
                  $Campos_Erros['complemento_'] = array();
              }
              $Campos_Erros['complemento_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['complemento_']) || !is_array($this->NM_ajax_info['errList']['complemento_']))
              {
                  $this->NM_ajax_info['errList']['complemento_'] = array();
              }
              $this->NM_ajax_info['errList']['complemento_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_complemento_

    function ValidateField_razaosocialentrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->razaosocialentrega_) > 50) 
          { 
              $Campos_Crit .= "Razaosocialentrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['razaosocialentrega_']))
              {
                  $Campos_Erros['razaosocialentrega_'] = array();
              }
              $Campos_Erros['razaosocialentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['razaosocialentrega_']) || !is_array($this->NM_ajax_info['errList']['razaosocialentrega_']))
              {
                  $this->NM_ajax_info['errList']['razaosocialentrega_'] = array();
              }
              $this->NM_ajax_info['errList']['razaosocialentrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_razaosocialentrega_

    function ValidateField_entrega_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->entrega_) > 5) 
          { 
              $Campos_Crit .= "Entrega " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['entrega_']))
              {
                  $Campos_Erros['entrega_'] = array();
              }
              $Campos_Erros['entrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['entrega_']) || !is_array($this->NM_ajax_info['errList']['entrega_']))
              {
                  $this->NM_ajax_info['errList']['entrega_'] = array();
              }
              $this->NM_ajax_info['errList']['entrega_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_entrega_

    function ValidateField_contatotecnico_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contatotecnico_) > 60) 
          { 
              $Campos_Crit .= "Contatotecnico " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contatotecnico_']))
              {
                  $Campos_Erros['contatotecnico_'] = array();
              }
              $Campos_Erros['contatotecnico_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contatotecnico_']) || !is_array($this->NM_ajax_info['errList']['contatotecnico_']))
              {
                  $this->NM_ajax_info['errList']['contatotecnico_'] = array();
              }
              $this->NM_ajax_info['errList']['contatotecnico_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_contatotecnico_

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['cd_cliente_'] = $this->cd_cliente_;
    $this->nmgp_dados_form['razaosocial_'] = $this->razaosocial_;
    $this->nmgp_dados_form['nomefantasia_'] = $this->nomefantasia_;
    $this->nmgp_dados_form['cgc_'] = $this->cgc_;
    $this->nmgp_dados_form['inscricao_'] = $this->inscricao_;
    $this->nmgp_dados_form['endereco_'] = $this->endereco_;
    $this->nmgp_dados_form['cidade_'] = $this->cidade_;
    $this->nmgp_dados_form['estado_'] = $this->estado_;
    $this->nmgp_dados_form['bairro_'] = $this->bairro_;
    $this->nmgp_dados_form['cep_'] = $this->cep_;
    $this->nmgp_dados_form['email_'] = $this->email_;
    $this->nmgp_dados_form['fone_'] = $this->fone_;
    $this->nmgp_dados_form['fone1_'] = $this->fone1_;
    $this->nmgp_dados_form['fax_'] = $this->fax_;
    $this->nmgp_dados_form['contato_'] = $this->contato_;
    $this->nmgp_dados_form['enderecocobranca_'] = $this->enderecocobranca_;
    $this->nmgp_dados_form['cidadecobranca_'] = $this->cidadecobranca_;
    $this->nmgp_dados_form['bairrocobranca_'] = $this->bairrocobranca_;
    $this->nmgp_dados_form['estadocobranca_'] = $this->estadocobranca_;
    $this->nmgp_dados_form['cepcobranca_'] = $this->cepcobranca_;
    $this->nmgp_dados_form['fonecobranca_'] = $this->fonecobranca_;
    $this->nmgp_dados_form['faxcobranca_'] = $this->faxcobranca_;
    $this->nmgp_dados_form['contatocobranca_'] = $this->contatocobranca_;
    $this->nmgp_dados_form['cgcentrega_'] = $this->cgcentrega_;
    $this->nmgp_dados_form['inscricaoentrega_'] = $this->inscricaoentrega_;
    $this->nmgp_dados_form['enderecoentrega_'] = $this->enderecoentrega_;
    $this->nmgp_dados_form['cidadeentrega_'] = $this->cidadeentrega_;
    $this->nmgp_dados_form['bairroentrega_'] = $this->bairroentrega_;
    $this->nmgp_dados_form['estadoentrega_'] = $this->estadoentrega_;
    $this->nmgp_dados_form['cepentrega_'] = $this->cepentrega_;
    $this->nmgp_dados_form['foneentrega_'] = $this->foneentrega_;
    $this->nmgp_dados_form['contatoentrega_'] = $this->contatoentrega_;
    $this->nmgp_dados_form['contatoexpedicao_'] = $this->contatoexpedicao_;
    $this->nmgp_dados_form['foneexpedicao_'] = $this->foneexpedicao_;
    $this->nmgp_dados_form['datacadastro_'] = (strlen(trim($this->datacadastro_)) > 19) ? str_replace(".", ":", $this->datacadastro_) : trim($this->datacadastro_);
    $this->nmgp_dados_form['obs_'] = $this->obs_;
    $this->nmgp_dados_form['tipo_'] = $this->tipo_;
    $this->nmgp_dados_form['consumidor_'] = $this->consumidor_;
    $this->nmgp_dados_form['licensa_'] = $this->licensa_;
    $this->nmgp_dados_form['venctolicensa_'] = (strlen(trim($this->venctolicensa_)) > 19) ? str_replace(".", ":", $this->venctolicensa_) : trim($this->venctolicensa_);
    $this->nmgp_dados_form['licensa1_'] = $this->licensa1_;
    $this->nmgp_dados_form['venctolicensa1_'] = (strlen(trim($this->venctolicensa1_)) > 19) ? str_replace(".", ":", $this->venctolicensa1_) : trim($this->venctolicensa1_);
    $this->nmgp_dados_form['qtdeliberada_'] = $this->qtdeliberada_;
    $this->nmgp_dados_form['licensa2_'] = $this->licensa2_;
    $this->nmgp_dados_form['venctolicensa2_'] = (strlen(trim($this->venctolicensa2_)) > 19) ? str_replace(".", ":", $this->venctolicensa2_) : trim($this->venctolicensa2_);
    $this->nmgp_dados_form['icms_'] = $this->icms_;
    $this->nmgp_dados_form['suframa_'] = $this->suframa_;
    $this->nmgp_dados_form['limitecredito_'] = $this->limitecredito_;
    $this->nmgp_dados_form['vendedor_'] = $this->vendedor_;
    $this->nmgp_dados_form['restricao_'] = $this->restricao_;
    $this->nmgp_dados_form['comissao_'] = $this->comissao_;
    $this->nmgp_dados_form['transportadora_'] = $this->transportadora_;
    $this->nmgp_dados_form['coleta_'] = $this->coleta_;
    $this->nmgp_dados_form['segmento_'] = $this->segmento_;
    $this->nmgp_dados_form['dataalteracao_'] = (strlen(trim($this->dataalteracao_)) > 19) ? str_replace(".", ":", $this->dataalteracao_) : trim($this->dataalteracao_);
    $this->nmgp_dados_form['usuario_'] = $this->usuario_;
    $this->nmgp_dados_form['requisitos_'] = $this->requisitos_;
    $this->nmgp_dados_form['banco_'] = $this->banco_;
    $this->nmgp_dados_form['emailcobranca_'] = $this->emailcobranca_;
    $this->nmgp_dados_form['emailtecnico_'] = $this->emailtecnico_;
    $this->nmgp_dados_form['midia_'] = $this->midia_;
    $this->nmgp_dados_form['seg_'] = $this->seg_;
    $this->nmgp_dados_form['ter_'] = $this->ter_;
    $this->nmgp_dados_form['qua_'] = $this->qua_;
    $this->nmgp_dados_form['qui_'] = $this->qui_;
    $this->nmgp_dados_form['sex_'] = $this->sex_;
    $this->nmgp_dados_form['certificado_'] = $this->certificado_;
    $this->nmgp_dados_form['emailnfe_'] = $this->emailnfe_;
    $this->nmgp_dados_form['fundacao_'] = (strlen(trim($this->fundacao_)) > 19) ? str_replace(".", ":", $this->fundacao_) : trim($this->fundacao_);
    $this->nmgp_dados_form['site_'] = $this->site_;
    $this->nmgp_dados_form['financeiro_'] = $this->financeiro_;
    $this->nmgp_dados_form['numero_'] = $this->numero_;
    $this->nmgp_dados_form['complemento_'] = $this->complemento_;
    $this->nmgp_dados_form['razaosocialentrega_'] = $this->razaosocialentrega_;
    $this->nmgp_dados_form['entrega_'] = $this->entrega_;
    $this->nmgp_dados_form['contatotecnico_'] = $this->contatotecnico_;
    $this->nmgp_dados_form['logistica_'] = $this->logistica_;
    $this->nmgp_dados_form['pimportado_'] = $this->pimportado_;
    $this->nmgp_dados_form['vendedor01_'] = $this->vendedor01_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['datacadastro_'] = $this->datacadastro_;
      nm_limpa_data($this->datacadastro_, $this->field_config['datacadastro_']['date_sep']) ; 
      nm_limpa_hora($this->datacadastro__hora, $this->field_config['datacadastro_']['time_sep']) ; 
      $this->Before_unformat['venctolicensa_'] = $this->venctolicensa_;
      nm_limpa_data($this->venctolicensa_, $this->field_config['venctolicensa_']['date_sep']) ; 
      nm_limpa_hora($this->venctolicensa__hora, $this->field_config['venctolicensa_']['time_sep']) ; 
      $this->Before_unformat['venctolicensa1_'] = $this->venctolicensa1_;
      nm_limpa_data($this->venctolicensa1_, $this->field_config['venctolicensa1_']['date_sep']) ; 
      nm_limpa_hora($this->venctolicensa1__hora, $this->field_config['venctolicensa1_']['time_sep']) ; 
      $this->Before_unformat['qtdeliberada_'] = $this->qtdeliberada_;
      if (!empty($this->field_config['qtdeliberada_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->qtdeliberada_, $this->field_config['qtdeliberada_']['symbol_dec'], $this->field_config['qtdeliberada_']['symbol_grp'], $this->field_config['qtdeliberada_']['symbol_mon']);
         nm_limpa_valor($this->qtdeliberada_, $this->field_config['qtdeliberada_']['symbol_dec'], $this->field_config['qtdeliberada_']['symbol_grp']);
      }
      $this->Before_unformat['venctolicensa2_'] = $this->venctolicensa2_;
      nm_limpa_data($this->venctolicensa2_, $this->field_config['venctolicensa2_']['date_sep']) ; 
      nm_limpa_hora($this->venctolicensa2__hora, $this->field_config['venctolicensa2_']['time_sep']) ; 
      $this->Before_unformat['icms_'] = $this->icms_;
      if (!empty($this->field_config['icms_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->icms_, $this->field_config['icms_']['symbol_dec'], $this->field_config['icms_']['symbol_grp'], $this->field_config['icms_']['symbol_mon']);
         nm_limpa_valor($this->icms_, $this->field_config['icms_']['symbol_dec'], $this->field_config['icms_']['symbol_grp']);
      }
      $this->Before_unformat['limitecredito_'] = $this->limitecredito_;
      if (!empty($this->field_config['limitecredito_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->limitecredito_, $this->field_config['limitecredito_']['symbol_dec'], $this->field_config['limitecredito_']['symbol_grp'], $this->field_config['limitecredito_']['symbol_mon']);
         nm_limpa_valor($this->limitecredito_, $this->field_config['limitecredito_']['symbol_dec'], $this->field_config['limitecredito_']['symbol_grp']);
      }
      $this->Before_unformat['comissao_'] = $this->comissao_;
      if (!empty($this->field_config['comissao_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->comissao_, $this->field_config['comissao_']['symbol_dec'], $this->field_config['comissao_']['symbol_grp'], $this->field_config['comissao_']['symbol_mon']);
         nm_limpa_valor($this->comissao_, $this->field_config['comissao_']['symbol_dec'], $this->field_config['comissao_']['symbol_grp']);
      }
      $this->Before_unformat['segmento_'] = $this->segmento_;
      if (!empty($this->field_config['segmento_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->segmento_, $this->field_config['segmento_']['symbol_dec'], $this->field_config['segmento_']['symbol_grp'], $this->field_config['segmento_']['symbol_mon']);
         nm_limpa_valor($this->segmento_, $this->field_config['segmento_']['symbol_dec'], $this->field_config['segmento_']['symbol_grp']);
      }
      $this->Before_unformat['dataalteracao_'] = $this->dataalteracao_;
      nm_limpa_data($this->dataalteracao_, $this->field_config['dataalteracao_']['date_sep']) ; 
      nm_limpa_hora($this->dataalteracao__hora, $this->field_config['dataalteracao_']['time_sep']) ; 
      $this->Before_unformat['fundacao_'] = $this->fundacao_;
      nm_limpa_data($this->fundacao_, $this->field_config['fundacao_']['date_sep']) ; 
      nm_limpa_hora($this->fundacao__hora, $this->field_config['fundacao_']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "qtdeliberada_")
      {
          if (!empty($this->field_config['qtdeliberada_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->qtdeliberada_, $this->field_config['qtdeliberada_']['symbol_dec'], $this->field_config['qtdeliberada_']['symbol_grp'], $this->field_config['qtdeliberada_']['symbol_mon']);
             nm_limpa_valor($this->qtdeliberada_, $this->field_config['qtdeliberada_']['symbol_dec'], $this->field_config['qtdeliberada_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "icms_")
      {
          if (!empty($this->field_config['icms_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->icms_, $this->field_config['icms_']['symbol_dec'], $this->field_config['icms_']['symbol_grp'], $this->field_config['icms_']['symbol_mon']);
             nm_limpa_valor($this->icms_, $this->field_config['icms_']['symbol_dec'], $this->field_config['icms_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "limitecredito_")
      {
          if (!empty($this->field_config['limitecredito_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->limitecredito_, $this->field_config['limitecredito_']['symbol_dec'], $this->field_config['limitecredito_']['symbol_grp'], $this->field_config['limitecredito_']['symbol_mon']);
             nm_limpa_valor($this->limitecredito_, $this->field_config['limitecredito_']['symbol_dec'], $this->field_config['limitecredito_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "comissao_")
      {
          if (!empty($this->field_config['comissao_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->comissao_, $this->field_config['comissao_']['symbol_dec'], $this->field_config['comissao_']['symbol_grp'], $this->field_config['comissao_']['symbol_mon']);
             nm_limpa_valor($this->comissao_, $this->field_config['comissao_']['symbol_dec'], $this->field_config['comissao_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "segmento_")
      {
          if (!empty($this->field_config['segmento_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->segmento_, $this->field_config['segmento_']['symbol_dec'], $this->field_config['segmento_']['symbol_grp'], $this->field_config['segmento_']['symbol_mon']);
             nm_limpa_valor($this->segmento_, $this->field_config['segmento_']['symbol_dec'], $this->field_config['segmento_']['symbol_grp']);
          }
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if ((!empty($this->datacadastro_) && 'null' != $this->datacadastro_) || (!empty($format_fields) && isset($format_fields['datacadastro_'])))
      {
          $nm_separa_data = strpos($this->field_config['datacadastro_']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['datacadastro_']['date_format'];
          $this->field_config['datacadastro_']['date_format'] = substr($this->field_config['datacadastro_']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->datacadastro_, " ") ; 
          $this->datacadastro__hora = substr($this->datacadastro_, $separador + 1) ; 
          $this->datacadastro_ = substr($this->datacadastro_, 0, $separador) ; 
          nm_volta_data($this->datacadastro_, $this->field_config['datacadastro_']['date_format']) ; 
          nmgp_Form_Datas($this->datacadastro_, $this->field_config['datacadastro_']['date_format'], $this->field_config['datacadastro_']['date_sep']) ;  
          $this->field_config['datacadastro_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->datacadastro__hora, $this->field_config['datacadastro_']['date_format']) ; 
          nmgp_Form_Hora($this->datacadastro__hora, $this->field_config['datacadastro_']['date_format'], $this->field_config['datacadastro_']['time_sep']) ;  
          $this->field_config['datacadastro_']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->datacadastro_ || '' == $this->datacadastro_)
      {
          $this->datacadastro__hora = '';
          $this->datacadastro_ = '';
      }
      if ((!empty($this->venctolicensa_) && 'null' != $this->venctolicensa_) || (!empty($format_fields) && isset($format_fields['venctolicensa_'])))
      {
          $nm_separa_data = strpos($this->field_config['venctolicensa_']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['venctolicensa_']['date_format'];
          $this->field_config['venctolicensa_']['date_format'] = substr($this->field_config['venctolicensa_']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->venctolicensa_, " ") ; 
          $this->venctolicensa__hora = substr($this->venctolicensa_, $separador + 1) ; 
          $this->venctolicensa_ = substr($this->venctolicensa_, 0, $separador) ; 
          nm_volta_data($this->venctolicensa_, $this->field_config['venctolicensa_']['date_format']) ; 
          nmgp_Form_Datas($this->venctolicensa_, $this->field_config['venctolicensa_']['date_format'], $this->field_config['venctolicensa_']['date_sep']) ;  
          $this->field_config['venctolicensa_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->venctolicensa__hora, $this->field_config['venctolicensa_']['date_format']) ; 
          nmgp_Form_Hora($this->venctolicensa__hora, $this->field_config['venctolicensa_']['date_format'], $this->field_config['venctolicensa_']['time_sep']) ;  
          $this->field_config['venctolicensa_']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->venctolicensa_ || '' == $this->venctolicensa_)
      {
          $this->venctolicensa__hora = '';
          $this->venctolicensa_ = '';
      }
      if ((!empty($this->venctolicensa1_) && 'null' != $this->venctolicensa1_) || (!empty($format_fields) && isset($format_fields['venctolicensa1_'])))
      {
          $nm_separa_data = strpos($this->field_config['venctolicensa1_']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['venctolicensa1_']['date_format'];
          $this->field_config['venctolicensa1_']['date_format'] = substr($this->field_config['venctolicensa1_']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->venctolicensa1_, " ") ; 
          $this->venctolicensa1__hora = substr($this->venctolicensa1_, $separador + 1) ; 
          $this->venctolicensa1_ = substr($this->venctolicensa1_, 0, $separador) ; 
          nm_volta_data($this->venctolicensa1_, $this->field_config['venctolicensa1_']['date_format']) ; 
          nmgp_Form_Datas($this->venctolicensa1_, $this->field_config['venctolicensa1_']['date_format'], $this->field_config['venctolicensa1_']['date_sep']) ;  
          $this->field_config['venctolicensa1_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->venctolicensa1__hora, $this->field_config['venctolicensa1_']['date_format']) ; 
          nmgp_Form_Hora($this->venctolicensa1__hora, $this->field_config['venctolicensa1_']['date_format'], $this->field_config['venctolicensa1_']['time_sep']) ;  
          $this->field_config['venctolicensa1_']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->venctolicensa1_ || '' == $this->venctolicensa1_)
      {
          $this->venctolicensa1__hora = '';
          $this->venctolicensa1_ = '';
      }
      if ('' !== $this->qtdeliberada_ || (!empty($format_fields) && isset($format_fields['qtdeliberada_'])))
      {
          nmgp_Form_Num_Val($this->qtdeliberada_, $this->field_config['qtdeliberada_']['symbol_grp'], $this->field_config['qtdeliberada_']['symbol_dec'], "15", "S", $this->field_config['qtdeliberada_']['format_neg'], "", "", "-", $this->field_config['qtdeliberada_']['symbol_fmt']) ; 
      }
      if ((!empty($this->venctolicensa2_) && 'null' != $this->venctolicensa2_) || (!empty($format_fields) && isset($format_fields['venctolicensa2_'])))
      {
          $nm_separa_data = strpos($this->field_config['venctolicensa2_']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['venctolicensa2_']['date_format'];
          $this->field_config['venctolicensa2_']['date_format'] = substr($this->field_config['venctolicensa2_']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->venctolicensa2_, " ") ; 
          $this->venctolicensa2__hora = substr($this->venctolicensa2_, $separador + 1) ; 
          $this->venctolicensa2_ = substr($this->venctolicensa2_, 0, $separador) ; 
          nm_volta_data($this->venctolicensa2_, $this->field_config['venctolicensa2_']['date_format']) ; 
          nmgp_Form_Datas($this->venctolicensa2_, $this->field_config['venctolicensa2_']['date_format'], $this->field_config['venctolicensa2_']['date_sep']) ;  
          $this->field_config['venctolicensa2_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->venctolicensa2__hora, $this->field_config['venctolicensa2_']['date_format']) ; 
          nmgp_Form_Hora($this->venctolicensa2__hora, $this->field_config['venctolicensa2_']['date_format'], $this->field_config['venctolicensa2_']['time_sep']) ;  
          $this->field_config['venctolicensa2_']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->venctolicensa2_ || '' == $this->venctolicensa2_)
      {
          $this->venctolicensa2__hora = '';
          $this->venctolicensa2_ = '';
      }
      if ('' !== $this->icms_ || (!empty($format_fields) && isset($format_fields['icms_'])))
      {
          nmgp_Form_Num_Val($this->icms_, $this->field_config['icms_']['symbol_grp'], $this->field_config['icms_']['symbol_dec'], "15", "S", $this->field_config['icms_']['format_neg'], "", "", "-", $this->field_config['icms_']['symbol_fmt']) ; 
      }
      if ('' !== $this->limitecredito_ || (!empty($format_fields) && isset($format_fields['limitecredito_'])))
      {
          nmgp_Form_Num_Val($this->limitecredito_, $this->field_config['limitecredito_']['symbol_grp'], $this->field_config['limitecredito_']['symbol_dec'], "15", "S", $this->field_config['limitecredito_']['format_neg'], "", "", "-", $this->field_config['limitecredito_']['symbol_fmt']) ; 
      }
      if ('' !== $this->comissao_ || (!empty($format_fields) && isset($format_fields['comissao_'])))
      {
          nmgp_Form_Num_Val($this->comissao_, $this->field_config['comissao_']['symbol_grp'], $this->field_config['comissao_']['symbol_dec'], "15", "S", $this->field_config['comissao_']['format_neg'], "", "", "-", $this->field_config['comissao_']['symbol_fmt']) ; 
      }
      if ('' !== $this->segmento_ || (!empty($format_fields) && isset($format_fields['segmento_'])))
      {
          nmgp_Form_Num_Val($this->segmento_, $this->field_config['segmento_']['symbol_grp'], $this->field_config['segmento_']['symbol_dec'], "15", "S", $this->field_config['segmento_']['format_neg'], "", "", "-", $this->field_config['segmento_']['symbol_fmt']) ; 
      }
      if ((!empty($this->dataalteracao_) && 'null' != $this->dataalteracao_) || (!empty($format_fields) && isset($format_fields['dataalteracao_'])))
      {
          $nm_separa_data = strpos($this->field_config['dataalteracao_']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['dataalteracao_']['date_format'];
          $this->field_config['dataalteracao_']['date_format'] = substr($this->field_config['dataalteracao_']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->dataalteracao_, " ") ; 
          $this->dataalteracao__hora = substr($this->dataalteracao_, $separador + 1) ; 
          $this->dataalteracao_ = substr($this->dataalteracao_, 0, $separador) ; 
          nm_volta_data($this->dataalteracao_, $this->field_config['dataalteracao_']['date_format']) ; 
          nmgp_Form_Datas($this->dataalteracao_, $this->field_config['dataalteracao_']['date_format'], $this->field_config['dataalteracao_']['date_sep']) ;  
          $this->field_config['dataalteracao_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->dataalteracao__hora, $this->field_config['dataalteracao_']['date_format']) ; 
          nmgp_Form_Hora($this->dataalteracao__hora, $this->field_config['dataalteracao_']['date_format'], $this->field_config['dataalteracao_']['time_sep']) ;  
          $this->field_config['dataalteracao_']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->dataalteracao_ || '' == $this->dataalteracao_)
      {
          $this->dataalteracao__hora = '';
          $this->dataalteracao_ = '';
      }
      if ((!empty($this->fundacao_) && 'null' != $this->fundacao_) || (!empty($format_fields) && isset($format_fields['fundacao_'])))
      {
          $nm_separa_data = strpos($this->field_config['fundacao_']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['fundacao_']['date_format'];
          $this->field_config['fundacao_']['date_format'] = substr($this->field_config['fundacao_']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->fundacao_, " ") ; 
          $this->fundacao__hora = substr($this->fundacao_, $separador + 1) ; 
          $this->fundacao_ = substr($this->fundacao_, 0, $separador) ; 
          nm_volta_data($this->fundacao_, $this->field_config['fundacao_']['date_format']) ; 
          nmgp_Form_Datas($this->fundacao_, $this->field_config['fundacao_']['date_format'], $this->field_config['fundacao_']['date_sep']) ;  
          $this->field_config['fundacao_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->fundacao__hora, $this->field_config['fundacao_']['date_format']) ; 
          nmgp_Form_Hora($this->fundacao__hora, $this->field_config['fundacao_']['date_format'], $this->field_config['fundacao_']['time_sep']) ;  
          $this->field_config['fundacao_']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->fundacao_ || '' == $this->fundacao_)
      {
          $this->fundacao__hora = '';
          $this->fundacao_ = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['datacadastro_']['date_format'];
      if ($this->datacadastro_ != "")  
      { 
          $nm_separa_data = strpos($this->field_config['datacadastro_']['date_format'], ";") ;
          $this->field_config['datacadastro_']['date_format'] = substr($this->field_config['datacadastro_']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->datacadastro_, $this->field_config['datacadastro_']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->datacadastro_ = str_replace('-', '', $this->datacadastro_);
          }
          $this->field_config['datacadastro_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->datacadastro__hora, $this->field_config['datacadastro_']['date_format']) ; 
          if ($this->datacadastro__hora == "" )  
          { 
              $this->datacadastro__hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->datacadastro__hora = substr($this->datacadastro__hora, 0, -4) . "." . substr($this->datacadastro__hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->datacadastro__hora = substr($this->datacadastro__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->datacadastro__hora = substr($this->datacadastro__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->datacadastro__hora = substr($this->datacadastro__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->datacadastro__hora = substr($this->datacadastro__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->datacadastro__hora = substr($this->datacadastro__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->datacadastro__hora = substr($this->datacadastro__hora, 0, -4);
          }
          if ($this->datacadastro_ != "")  
          { 
              $this->datacadastro_ .= " " . $this->datacadastro__hora ; 
          }
      } 
      $this->field_config['datacadastro_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['venctolicensa_']['date_format'];
      if ($this->venctolicensa_ != "")  
      { 
          $nm_separa_data = strpos($this->field_config['venctolicensa_']['date_format'], ";") ;
          $this->field_config['venctolicensa_']['date_format'] = substr($this->field_config['venctolicensa_']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->venctolicensa_, $this->field_config['venctolicensa_']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->venctolicensa_ = str_replace('-', '', $this->venctolicensa_);
          }
          $this->field_config['venctolicensa_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->venctolicensa__hora, $this->field_config['venctolicensa_']['date_format']) ; 
          if ($this->venctolicensa__hora == "" )  
          { 
              $this->venctolicensa__hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->venctolicensa__hora = substr($this->venctolicensa__hora, 0, -4) . "." . substr($this->venctolicensa__hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->venctolicensa__hora = substr($this->venctolicensa__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->venctolicensa__hora = substr($this->venctolicensa__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->venctolicensa__hora = substr($this->venctolicensa__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->venctolicensa__hora = substr($this->venctolicensa__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->venctolicensa__hora = substr($this->venctolicensa__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->venctolicensa__hora = substr($this->venctolicensa__hora, 0, -4);
          }
          if ($this->venctolicensa_ != "")  
          { 
              $this->venctolicensa_ .= " " . $this->venctolicensa__hora ; 
          }
      } 
      $this->field_config['venctolicensa_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['venctolicensa1_']['date_format'];
      if ($this->venctolicensa1_ != "")  
      { 
          $nm_separa_data = strpos($this->field_config['venctolicensa1_']['date_format'], ";") ;
          $this->field_config['venctolicensa1_']['date_format'] = substr($this->field_config['venctolicensa1_']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->venctolicensa1_, $this->field_config['venctolicensa1_']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->venctolicensa1_ = str_replace('-', '', $this->venctolicensa1_);
          }
          $this->field_config['venctolicensa1_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->venctolicensa1__hora, $this->field_config['venctolicensa1_']['date_format']) ; 
          if ($this->venctolicensa1__hora == "" )  
          { 
              $this->venctolicensa1__hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->venctolicensa1__hora = substr($this->venctolicensa1__hora, 0, -4) . "." . substr($this->venctolicensa1__hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->venctolicensa1__hora = substr($this->venctolicensa1__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->venctolicensa1__hora = substr($this->venctolicensa1__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->venctolicensa1__hora = substr($this->venctolicensa1__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->venctolicensa1__hora = substr($this->venctolicensa1__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->venctolicensa1__hora = substr($this->venctolicensa1__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->venctolicensa1__hora = substr($this->venctolicensa1__hora, 0, -4);
          }
          if ($this->venctolicensa1_ != "")  
          { 
              $this->venctolicensa1_ .= " " . $this->venctolicensa1__hora ; 
          }
      } 
      $this->field_config['venctolicensa1_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['venctolicensa2_']['date_format'];
      if ($this->venctolicensa2_ != "")  
      { 
          $nm_separa_data = strpos($this->field_config['venctolicensa2_']['date_format'], ";") ;
          $this->field_config['venctolicensa2_']['date_format'] = substr($this->field_config['venctolicensa2_']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->venctolicensa2_, $this->field_config['venctolicensa2_']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->venctolicensa2_ = str_replace('-', '', $this->venctolicensa2_);
          }
          $this->field_config['venctolicensa2_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->venctolicensa2__hora, $this->field_config['venctolicensa2_']['date_format']) ; 
          if ($this->venctolicensa2__hora == "" )  
          { 
              $this->venctolicensa2__hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->venctolicensa2__hora = substr($this->venctolicensa2__hora, 0, -4) . "." . substr($this->venctolicensa2__hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->venctolicensa2__hora = substr($this->venctolicensa2__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->venctolicensa2__hora = substr($this->venctolicensa2__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->venctolicensa2__hora = substr($this->venctolicensa2__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->venctolicensa2__hora = substr($this->venctolicensa2__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->venctolicensa2__hora = substr($this->venctolicensa2__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->venctolicensa2__hora = substr($this->venctolicensa2__hora, 0, -4);
          }
          if ($this->venctolicensa2_ != "")  
          { 
              $this->venctolicensa2_ .= " " . $this->venctolicensa2__hora ; 
          }
      } 
      $this->field_config['venctolicensa2_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['dataalteracao_']['date_format'];
      if ($this->dataalteracao_ != "")  
      { 
          $nm_separa_data = strpos($this->field_config['dataalteracao_']['date_format'], ";") ;
          $this->field_config['dataalteracao_']['date_format'] = substr($this->field_config['dataalteracao_']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->dataalteracao_, $this->field_config['dataalteracao_']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->dataalteracao_ = str_replace('-', '', $this->dataalteracao_);
          }
          $this->field_config['dataalteracao_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->dataalteracao__hora, $this->field_config['dataalteracao_']['date_format']) ; 
          if ($this->dataalteracao__hora == "" )  
          { 
              $this->dataalteracao__hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->dataalteracao__hora = substr($this->dataalteracao__hora, 0, -4) . "." . substr($this->dataalteracao__hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->dataalteracao__hora = substr($this->dataalteracao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->dataalteracao__hora = substr($this->dataalteracao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->dataalteracao__hora = substr($this->dataalteracao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->dataalteracao__hora = substr($this->dataalteracao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->dataalteracao__hora = substr($this->dataalteracao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->dataalteracao__hora = substr($this->dataalteracao__hora, 0, -4);
          }
          if ($this->dataalteracao_ != "")  
          { 
              $this->dataalteracao_ .= " " . $this->dataalteracao__hora ; 
          }
      } 
      $this->field_config['dataalteracao_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fundacao_']['date_format'];
      if ($this->fundacao_ != "")  
      { 
          $nm_separa_data = strpos($this->field_config['fundacao_']['date_format'], ";") ;
          $this->field_config['fundacao_']['date_format'] = substr($this->field_config['fundacao_']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->fundacao_, $this->field_config['fundacao_']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->fundacao_ = str_replace('-', '', $this->fundacao_);
          }
          $this->field_config['fundacao_']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->fundacao__hora, $this->field_config['fundacao_']['date_format']) ; 
          if ($this->fundacao__hora == "" )  
          { 
              $this->fundacao__hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->fundacao__hora = substr($this->fundacao__hora, 0, -4) . "." . substr($this->fundacao__hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fundacao__hora = substr($this->fundacao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fundacao__hora = substr($this->fundacao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fundacao__hora = substr($this->fundacao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fundacao__hora = substr($this->fundacao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fundacao__hora = substr($this->fundacao__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->fundacao__hora = substr($this->fundacao__hora, 0, -4);
          }
          if ($this->fundacao_ != "")  
          { 
              $this->fundacao_ .= " " . $this->fundacao__hora ; 
          }
      } 
      $this->field_config['fundacao_']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['cd_cliente_']['keyVal'] = form_dbo_cliente_pack_protect_string($this->nmgp_dados_form['cd_cliente_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['cd_cliente_']) && $this->NM_ajax_changed['cd_cliente_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cd_cliente_'] = $this->cd_cliente_;
                  }
                  if (isset($this->NM_ajax_changed['razaosocial_']) && $this->NM_ajax_changed['razaosocial_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['razaosocial_'] = $this->razaosocial_;
                  }
                  if (isset($this->NM_ajax_changed['nomefantasia_']) && $this->NM_ajax_changed['nomefantasia_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['nomefantasia_'] = $this->nomefantasia_;
                  }
                  if (isset($this->NM_ajax_changed['cgc_']) && $this->NM_ajax_changed['cgc_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cgc_'] = $this->cgc_;
                  }
                  if (isset($this->NM_ajax_changed['inscricao_']) && $this->NM_ajax_changed['inscricao_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['inscricao_'] = $this->inscricao_;
                  }
                  if (isset($this->NM_ajax_changed['endereco_']) && $this->NM_ajax_changed['endereco_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['endereco_'] = $this->endereco_;
                  }
                  if (isset($this->NM_ajax_changed['cidade_']) && $this->NM_ajax_changed['cidade_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cidade_'] = $this->cidade_;
                  }
                  if (isset($this->NM_ajax_changed['estado_']) && $this->NM_ajax_changed['estado_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['estado_'] = $this->estado_;
                  }
                  if (isset($this->NM_ajax_changed['bairro_']) && $this->NM_ajax_changed['bairro_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['bairro_'] = $this->bairro_;
                  }
                  if (isset($this->NM_ajax_changed['cep_']) && $this->NM_ajax_changed['cep_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cep_'] = $this->cep_;
                  }
                  if (isset($this->NM_ajax_changed['email_']) && $this->NM_ajax_changed['email_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['email_'] = $this->email_;
                  }
                  if (isset($this->NM_ajax_changed['fone_']) && $this->NM_ajax_changed['fone_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fone_'] = $this->fone_;
                  }
                  if (isset($this->NM_ajax_changed['fone1_']) && $this->NM_ajax_changed['fone1_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fone1_'] = $this->fone1_;
                  }
                  if (isset($this->NM_ajax_changed['fax_']) && $this->NM_ajax_changed['fax_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fax_'] = $this->fax_;
                  }
                  if (isset($this->NM_ajax_changed['contato_']) && $this->NM_ajax_changed['contato_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contato_'] = $this->contato_;
                  }
                  if (isset($this->NM_ajax_changed['enderecocobranca_']) && $this->NM_ajax_changed['enderecocobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['enderecocobranca_'] = $this->enderecocobranca_;
                  }
                  if (isset($this->NM_ajax_changed['cidadecobranca_']) && $this->NM_ajax_changed['cidadecobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cidadecobranca_'] = $this->cidadecobranca_;
                  }
                  if (isset($this->NM_ajax_changed['bairrocobranca_']) && $this->NM_ajax_changed['bairrocobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['bairrocobranca_'] = $this->bairrocobranca_;
                  }
                  if (isset($this->NM_ajax_changed['estadocobranca_']) && $this->NM_ajax_changed['estadocobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['estadocobranca_'] = $this->estadocobranca_;
                  }
                  if (isset($this->NM_ajax_changed['cepcobranca_']) && $this->NM_ajax_changed['cepcobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cepcobranca_'] = $this->cepcobranca_;
                  }
                  if (isset($this->NM_ajax_changed['fonecobranca_']) && $this->NM_ajax_changed['fonecobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fonecobranca_'] = $this->fonecobranca_;
                  }
                  if (isset($this->NM_ajax_changed['faxcobranca_']) && $this->NM_ajax_changed['faxcobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['faxcobranca_'] = $this->faxcobranca_;
                  }
                  if (isset($this->NM_ajax_changed['contatocobranca_']) && $this->NM_ajax_changed['contatocobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contatocobranca_'] = $this->contatocobranca_;
                  }
                  if (isset($this->NM_ajax_changed['cgcentrega_']) && $this->NM_ajax_changed['cgcentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cgcentrega_'] = $this->cgcentrega_;
                  }
                  if (isset($this->NM_ajax_changed['inscricaoentrega_']) && $this->NM_ajax_changed['inscricaoentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['inscricaoentrega_'] = $this->inscricaoentrega_;
                  }
                  if (isset($this->NM_ajax_changed['enderecoentrega_']) && $this->NM_ajax_changed['enderecoentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['enderecoentrega_'] = $this->enderecoentrega_;
                  }
                  if (isset($this->NM_ajax_changed['cidadeentrega_']) && $this->NM_ajax_changed['cidadeentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cidadeentrega_'] = $this->cidadeentrega_;
                  }
                  if (isset($this->NM_ajax_changed['bairroentrega_']) && $this->NM_ajax_changed['bairroentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['bairroentrega_'] = $this->bairroentrega_;
                  }
                  if (isset($this->NM_ajax_changed['estadoentrega_']) && $this->NM_ajax_changed['estadoentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['estadoentrega_'] = $this->estadoentrega_;
                  }
                  if (isset($this->NM_ajax_changed['cepentrega_']) && $this->NM_ajax_changed['cepentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cepentrega_'] = $this->cepentrega_;
                  }
                  if (isset($this->NM_ajax_changed['foneentrega_']) && $this->NM_ajax_changed['foneentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['foneentrega_'] = $this->foneentrega_;
                  }
                  if (isset($this->NM_ajax_changed['contatoentrega_']) && $this->NM_ajax_changed['contatoentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contatoentrega_'] = $this->contatoentrega_;
                  }
                  if (isset($this->NM_ajax_changed['contatoexpedicao_']) && $this->NM_ajax_changed['contatoexpedicao_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contatoexpedicao_'] = $this->contatoexpedicao_;
                  }
                  if (isset($this->NM_ajax_changed['foneexpedicao_']) && $this->NM_ajax_changed['foneexpedicao_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['foneexpedicao_'] = $this->foneexpedicao_;
                  }
                  if (isset($this->NM_ajax_changed['datacadastro_']) && $this->NM_ajax_changed['datacadastro_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['datacadastro_'] = $this->datacadastro_;
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['datacadastro__hora'] = $this->datacadastro__hora;
                  }
                  if (isset($this->NM_ajax_changed['obs_']) && $this->NM_ajax_changed['obs_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['obs_'] = $this->obs_;
                  }
                  if (isset($this->NM_ajax_changed['tipo_']) && $this->NM_ajax_changed['tipo_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['tipo_'] = $this->tipo_;
                  }
                  if (isset($this->NM_ajax_changed['consumidor_']) && $this->NM_ajax_changed['consumidor_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['consumidor_'] = $this->consumidor_;
                  }
                  if (isset($this->NM_ajax_changed['licensa_']) && $this->NM_ajax_changed['licensa_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['licensa_'] = $this->licensa_;
                  }
                  if (isset($this->NM_ajax_changed['venctolicensa_']) && $this->NM_ajax_changed['venctolicensa_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['venctolicensa_'] = $this->venctolicensa_;
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['venctolicensa__hora'] = $this->venctolicensa__hora;
                  }
                  if (isset($this->NM_ajax_changed['licensa1_']) && $this->NM_ajax_changed['licensa1_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['licensa1_'] = $this->licensa1_;
                  }
                  if (isset($this->NM_ajax_changed['venctolicensa1_']) && $this->NM_ajax_changed['venctolicensa1_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['venctolicensa1_'] = $this->venctolicensa1_;
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['venctolicensa1__hora'] = $this->venctolicensa1__hora;
                  }
                  if (isset($this->NM_ajax_changed['qtdeliberada_']) && $this->NM_ajax_changed['qtdeliberada_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['qtdeliberada_'] = $this->qtdeliberada_;
                  }
                  if (isset($this->NM_ajax_changed['licensa2_']) && $this->NM_ajax_changed['licensa2_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['licensa2_'] = $this->licensa2_;
                  }
                  if (isset($this->NM_ajax_changed['venctolicensa2_']) && $this->NM_ajax_changed['venctolicensa2_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['venctolicensa2_'] = $this->venctolicensa2_;
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['venctolicensa2__hora'] = $this->venctolicensa2__hora;
                  }
                  if (isset($this->NM_ajax_changed['icms_']) && $this->NM_ajax_changed['icms_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['icms_'] = $this->icms_;
                  }
                  if (isset($this->NM_ajax_changed['suframa_']) && $this->NM_ajax_changed['suframa_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['suframa_'] = $this->suframa_;
                  }
                  if (isset($this->NM_ajax_changed['limitecredito_']) && $this->NM_ajax_changed['limitecredito_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['limitecredito_'] = $this->limitecredito_;
                  }
                  if (isset($this->NM_ajax_changed['vendedor_']) && $this->NM_ajax_changed['vendedor_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['vendedor_'] = $this->vendedor_;
                  }
                  if (isset($this->NM_ajax_changed['restricao_']) && $this->NM_ajax_changed['restricao_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['restricao_'] = $this->restricao_;
                  }
                  if (isset($this->NM_ajax_changed['comissao_']) && $this->NM_ajax_changed['comissao_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['comissao_'] = $this->comissao_;
                  }
                  if (isset($this->NM_ajax_changed['transportadora_']) && $this->NM_ajax_changed['transportadora_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['transportadora_'] = $this->transportadora_;
                  }
                  if (isset($this->NM_ajax_changed['coleta_']) && $this->NM_ajax_changed['coleta_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['coleta_'] = $this->coleta_;
                  }
                  if (isset($this->NM_ajax_changed['segmento_']) && $this->NM_ajax_changed['segmento_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['segmento_'] = $this->segmento_;
                  }
                  if (isset($this->NM_ajax_changed['dataalteracao_']) && $this->NM_ajax_changed['dataalteracao_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['dataalteracao_'] = $this->dataalteracao_;
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['dataalteracao__hora'] = $this->dataalteracao__hora;
                  }
                  if (isset($this->NM_ajax_changed['usuario_']) && $this->NM_ajax_changed['usuario_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['usuario_'] = $this->usuario_;
                  }
                  if (isset($this->NM_ajax_changed['requisitos_']) && $this->NM_ajax_changed['requisitos_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['requisitos_'] = $this->requisitos_;
                  }
                  if (isset($this->NM_ajax_changed['banco_']) && $this->NM_ajax_changed['banco_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['banco_'] = $this->banco_;
                  }
                  if (isset($this->NM_ajax_changed['emailcobranca_']) && $this->NM_ajax_changed['emailcobranca_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['emailcobranca_'] = $this->emailcobranca_;
                  }
                  if (isset($this->NM_ajax_changed['emailtecnico_']) && $this->NM_ajax_changed['emailtecnico_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['emailtecnico_'] = $this->emailtecnico_;
                  }
                  if (isset($this->NM_ajax_changed['midia_']) && $this->NM_ajax_changed['midia_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['midia_'] = $this->midia_;
                  }
                  if (isset($this->NM_ajax_changed['seg_']) && $this->NM_ajax_changed['seg_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['seg_'] = $this->seg_;
                  }
                  if (isset($this->NM_ajax_changed['ter_']) && $this->NM_ajax_changed['ter_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['ter_'] = $this->ter_;
                  }
                  if (isset($this->NM_ajax_changed['qua_']) && $this->NM_ajax_changed['qua_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['qua_'] = $this->qua_;
                  }
                  if (isset($this->NM_ajax_changed['qui_']) && $this->NM_ajax_changed['qui_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['qui_'] = $this->qui_;
                  }
                  if (isset($this->NM_ajax_changed['sex_']) && $this->NM_ajax_changed['sex_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['sex_'] = $this->sex_;
                  }
                  if (isset($this->NM_ajax_changed['certificado_']) && $this->NM_ajax_changed['certificado_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['certificado_'] = $this->certificado_;
                  }
                  if (isset($this->NM_ajax_changed['emailnfe_']) && $this->NM_ajax_changed['emailnfe_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['emailnfe_'] = $this->emailnfe_;
                  }
                  if (isset($this->NM_ajax_changed['fundacao_']) && $this->NM_ajax_changed['fundacao_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fundacao_'] = $this->fundacao_;
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fundacao__hora'] = $this->fundacao__hora;
                  }
                  if (isset($this->NM_ajax_changed['site_']) && $this->NM_ajax_changed['site_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['site_'] = $this->site_;
                  }
                  if (isset($this->NM_ajax_changed['financeiro_']) && $this->NM_ajax_changed['financeiro_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['financeiro_'] = $this->financeiro_;
                  }
                  if (isset($this->NM_ajax_changed['numero_']) && $this->NM_ajax_changed['numero_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['numero_'] = $this->numero_;
                  }
                  if (isset($this->NM_ajax_changed['complemento_']) && $this->NM_ajax_changed['complemento_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['complemento_'] = $this->complemento_;
                  }
                  if (isset($this->NM_ajax_changed['razaosocialentrega_']) && $this->NM_ajax_changed['razaosocialentrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['razaosocialentrega_'] = $this->razaosocialentrega_;
                  }
                  if (isset($this->NM_ajax_changed['entrega_']) && $this->NM_ajax_changed['entrega_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['entrega_'] = $this->entrega_;
                  }
                  if (isset($this->NM_ajax_changed['contatotecnico_']) && $this->NM_ajax_changed['contatotecnico_'])
                  {
                      $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contatotecnico_'] = $this->contatotecnico_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cd_cliente_'] = $this->cd_cliente_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['razaosocial_'] = $this->razaosocial_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['nomefantasia_'] = $this->nomefantasia_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cgc_'] = $this->cgc_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['inscricao_'] = $this->inscricao_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['endereco_'] = $this->endereco_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cidade_'] = $this->cidade_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['estado_'] = $this->estado_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['bairro_'] = $this->bairro_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cep_'] = $this->cep_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['email_'] = $this->email_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fone_'] = $this->fone_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fone1_'] = $this->fone1_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fax_'] = $this->fax_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contato_'] = $this->contato_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['enderecocobranca_'] = $this->enderecocobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cidadecobranca_'] = $this->cidadecobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['bairrocobranca_'] = $this->bairrocobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['estadocobranca_'] = $this->estadocobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cepcobranca_'] = $this->cepcobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['fonecobranca_'] = $this->fonecobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['faxcobranca_'] = $this->faxcobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contatocobranca_'] = $this->contatocobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cgcentrega_'] = $this->cgcentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['inscricaoentrega_'] = $this->inscricaoentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['enderecoentrega_'] = $this->enderecoentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cidadeentrega_'] = $this->cidadeentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['bairroentrega_'] = $this->bairroentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['estadoentrega_'] = $this->estadoentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['cepentrega_'] = $this->cepentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['foneentrega_'] = $this->foneentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contatoentrega_'] = $this->contatoentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contatoexpedicao_'] = $this->contatoexpedicao_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['foneexpedicao_'] = $this->foneexpedicao_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['obs_'] = $this->obs_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['tipo_'] = $this->tipo_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['consumidor_'] = $this->consumidor_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['licensa_'] = $this->licensa_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['licensa1_'] = $this->licensa1_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['licensa2_'] = $this->licensa2_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['suframa_'] = $this->suframa_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['vendedor_'] = $this->vendedor_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['restricao_'] = $this->restricao_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['transportadora_'] = $this->transportadora_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['coleta_'] = $this->coleta_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['usuario_'] = $this->usuario_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['requisitos_'] = $this->requisitos_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['banco_'] = $this->banco_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['emailcobranca_'] = $this->emailcobranca_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['emailtecnico_'] = $this->emailtecnico_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['midia_'] = $this->midia_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['seg_'] = $this->seg_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['ter_'] = $this->ter_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['qua_'] = $this->qua_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['qui_'] = $this->qui_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['sex_'] = $this->sex_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['certificado_'] = $this->certificado_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['emailnfe_'] = $this->emailnfe_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['site_'] = $this->site_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['financeiro_'] = $this->financeiro_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['numero_'] = $this->numero_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['complemento_'] = $this->complemento_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['razaosocialentrega_'] = $this->razaosocialentrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['entrega_'] = $this->entrega_;
              $this->form_vert_form_dbo_cliente[$this->nmgp_refresh_row]['contatotecnico_'] = $this->contatotecnico_;
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_form_dbo_cliente);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_form_dbo_cliente as $sc_seq_vert => $aRecData)
          {
              $this->loadRecordState($sc_seq_vert);
              if ('navigate_form' == $this->NM_ajax_opcao) {
                  $this->NM_ajax_info['buttonDisplayVert'][] = array(
                      'seq'      => $sc_seq_vert,
                      'gridView' => true,
                      'delete'   => $this->nmgp_botoes['delete'],
                      'update'   => $this->nmgp_botoes['update'],
                  );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cd_cliente_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cd_cliente_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cd_cliente_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("razaosocial_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['razaosocial_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['razaosocial_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nomefantasia_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['nomefantasia_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['nomefantasia_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cgc_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cgc_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cgc_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("inscricao_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['inscricao_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['inscricao_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("endereco_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['endereco_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['endereco_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cidade_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cidade_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cidade_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estado_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['estado_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['estado_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bairro_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['bairro_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['bairro_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cep_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cep_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cep_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['email_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['email_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fone_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fone_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fone_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fone1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fone1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fone1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fax_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fax_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fax_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contato_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['contato_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['contato_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enderecocobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['enderecocobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['enderecocobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cidadecobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cidadecobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cidadecobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bairrocobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['bairrocobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['bairrocobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estadocobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['estadocobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['estadocobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cepcobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cepcobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cepcobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fonecobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fonecobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fonecobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("faxcobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['faxcobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['faxcobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contatocobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['contatocobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['contatocobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cgcentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cgcentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cgcentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("inscricaoentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['inscricaoentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['inscricaoentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enderecoentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['enderecoentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['enderecoentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cidadeentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cidadeentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cidadeentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bairroentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['bairroentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['bairroentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estadoentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['estadoentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['estadoentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cepentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cepentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cepentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foneentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['foneentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['foneentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contatoentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['contatoentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['contatoentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contatoexpedicao_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['contatoexpedicao_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['contatoexpedicao_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foneexpedicao_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['foneexpedicao_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['foneexpedicao_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("datacadastro_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['datacadastro_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['datacadastro_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($aRecData['datacadastro_'] . ' ' . $aRecData['datacadastro__hora']),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obs_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['obs_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['obs_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tipo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("consumidor_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['consumidor_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['consumidor_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("licensa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['licensa_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['licensa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("venctolicensa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['venctolicensa_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['venctolicensa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($aRecData['venctolicensa_'] . ' ' . $aRecData['venctolicensa__hora']),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("licensa1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['licensa1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['licensa1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("venctolicensa1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['venctolicensa1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['venctolicensa1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($aRecData['venctolicensa1_'] . ' ' . $aRecData['venctolicensa1__hora']),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qtdeliberada_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['qtdeliberada_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['qtdeliberada_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("licensa2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['licensa2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['licensa2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("venctolicensa2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['venctolicensa2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['venctolicensa2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($aRecData['venctolicensa2_'] . ' ' . $aRecData['venctolicensa2__hora']),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("icms_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['icms_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['icms_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("suframa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['suframa_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['suframa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("limitecredito_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['limitecredito_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['limitecredito_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vendedor_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['vendedor_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['vendedor_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("restricao_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['restricao_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['restricao_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("comissao_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['comissao_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['comissao_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("transportadora_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['transportadora_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['transportadora_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("coleta_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['coleta_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['coleta_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("segmento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['segmento_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['segmento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dataalteracao_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dataalteracao_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dataalteracao_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($aRecData['dataalteracao_'] . ' ' . $aRecData['dataalteracao__hora']),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usuario_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['usuario_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['usuario_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("requisitos_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['requisitos_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['requisitos_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("banco_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['banco_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['banco_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("emailcobranca_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['emailcobranca_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['emailcobranca_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("emailtecnico_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['emailtecnico_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['emailtecnico_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("midia_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['midia_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['midia_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("seg_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['seg_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['seg_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ter_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ter_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['ter_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qua_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['qua_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['qua_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("qui_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['qui_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['qui_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sex_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sex_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sex_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("certificado_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['certificado_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['certificado_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("emailnfe_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['emailnfe_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['emailnfe_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fundacao_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fundacao_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fundacao_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($aRecData['fundacao_'] . ' ' . $aRecData['fundacao__hora']),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("site_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['site_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['site_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("financeiro_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['financeiro_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['financeiro_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['numero_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['numero_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("complemento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['complemento_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['complemento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("razaosocialentrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['razaosocialentrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['razaosocialentrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("entrega_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['entrega_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['entrega_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contatotecnico_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['contatotecnico_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['contatotecnico_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->qtdeliberada_ = str_replace($sc_parm1, $sc_parm2, $this->qtdeliberada_); 
      $this->icms_ = str_replace($sc_parm1, $sc_parm2, $this->icms_); 
      $this->limitecredito_ = str_replace($sc_parm1, $sc_parm2, $this->limitecredito_); 
      $this->comissao_ = str_replace($sc_parm1, $sc_parm2, $this->comissao_); 
      $this->segmento_ = str_replace($sc_parm1, $sc_parm2, $this->segmento_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->qtdeliberada_ = "'" . $this->qtdeliberada_ . "'";
      $this->icms_ = "'" . $this->icms_ . "'";
      $this->limitecredito_ = "'" . $this->limitecredito_ . "'";
      $this->comissao_ = "'" . $this->comissao_ . "'";
      $this->segmento_ = "'" . $this->segmento_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->qtdeliberada_ = str_replace("'", "", $this->qtdeliberada_); 
      $this->icms_ = str_replace("'", "", $this->icms_); 
      $this->limitecredito_ = str_replace("'", "", $this->limitecredito_); 
      $this->comissao_ = str_replace("'", "", $this->comissao_); 
      $this->segmento_ = str_replace("'", "", $this->segmento_); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['cd_cliente_'] == $this->cd_cliente_ &&
              $this->nmgp_dados_select['razaosocial_'] == $this->razaosocial_ &&
              $this->nmgp_dados_select['nomefantasia_'] == $this->nomefantasia_ &&
              $this->nmgp_dados_select['cgc_'] == $this->cgc_ &&
              $this->nmgp_dados_select['inscricao_'] == $this->inscricao_ &&
              $this->nmgp_dados_select['endereco_'] == $this->endereco_ &&
              $this->nmgp_dados_select['cidade_'] == $this->cidade_ &&
              $this->nmgp_dados_select['estado_'] == $this->estado_ &&
              $this->nmgp_dados_select['bairro_'] == $this->bairro_ &&
              $this->nmgp_dados_select['cep_'] == $this->cep_ &&
              $this->nmgp_dados_select['email_'] == $this->email_ &&
              $this->nmgp_dados_select['fone_'] == $this->fone_ &&
              $this->nmgp_dados_select['fone1_'] == $this->fone1_ &&
              $this->nmgp_dados_select['fax_'] == $this->fax_ &&
              $this->nmgp_dados_select['contato_'] == $this->contato_ &&
              $this->nmgp_dados_select['enderecocobranca_'] == $this->enderecocobranca_ &&
              $this->nmgp_dados_select['cidadecobranca_'] == $this->cidadecobranca_ &&
              $this->nmgp_dados_select['bairrocobranca_'] == $this->bairrocobranca_ &&
              $this->nmgp_dados_select['estadocobranca_'] == $this->estadocobranca_ &&
              $this->nmgp_dados_select['cepcobranca_'] == $this->cepcobranca_ &&
              $this->nmgp_dados_select['fonecobranca_'] == $this->fonecobranca_ &&
              $this->nmgp_dados_select['faxcobranca_'] == $this->faxcobranca_ &&
              $this->nmgp_dados_select['contatocobranca_'] == $this->contatocobranca_ &&
              $this->nmgp_dados_select['cgcentrega_'] == $this->cgcentrega_ &&
              $this->nmgp_dados_select['inscricaoentrega_'] == $this->inscricaoentrega_ &&
              $this->nmgp_dados_select['enderecoentrega_'] == $this->enderecoentrega_ &&
              $this->nmgp_dados_select['cidadeentrega_'] == $this->cidadeentrega_ &&
              $this->nmgp_dados_select['bairroentrega_'] == $this->bairroentrega_ &&
              $this->nmgp_dados_select['estadoentrega_'] == $this->estadoentrega_ &&
              $this->nmgp_dados_select['cepentrega_'] == $this->cepentrega_ &&
              $this->nmgp_dados_select['foneentrega_'] == $this->foneentrega_ &&
              $this->nmgp_dados_select['contatoentrega_'] == $this->contatoentrega_ &&
              $this->nmgp_dados_select['contatoexpedicao_'] == $this->contatoexpedicao_ &&
              $this->nmgp_dados_select['foneexpedicao_'] == $this->foneexpedicao_ &&
              $this->nmgp_dados_select['datacadastro_'] == $this->datacadastro_ &&
              $this->nmgp_dados_select['obs_'] == $this->obs_ &&
              $this->nmgp_dados_select['tipo_'] == $this->tipo_ &&
              $this->nmgp_dados_select['consumidor_'] == $this->consumidor_ &&
              $this->nmgp_dados_select['licensa_'] == $this->licensa_ &&
              $this->nmgp_dados_select['venctolicensa_'] == $this->venctolicensa_ &&
              $this->nmgp_dados_select['licensa1_'] == $this->licensa1_ &&
              $this->nmgp_dados_select['venctolicensa1_'] == $this->venctolicensa1_ &&
              $this->nmgp_dados_select['qtdeliberada_'] == $this->qtdeliberada_ &&
              $this->nmgp_dados_select['licensa2_'] == $this->licensa2_ &&
              $this->nmgp_dados_select['venctolicensa2_'] == $this->venctolicensa2_ &&
              $this->nmgp_dados_select['icms_'] == $this->icms_ &&
              $this->nmgp_dados_select['suframa_'] == $this->suframa_ &&
              $this->nmgp_dados_select['limitecredito_'] == $this->limitecredito_ &&
              $this->nmgp_dados_select['vendedor_'] == $this->vendedor_ &&
              $this->nmgp_dados_select['restricao_'] == $this->restricao_ &&
              $this->nmgp_dados_select['comissao_'] == $this->comissao_ &&
              $this->nmgp_dados_select['transportadora_'] == $this->transportadora_ &&
              $this->nmgp_dados_select['coleta_'] == $this->coleta_ &&
              $this->nmgp_dados_select['segmento_'] == $this->segmento_ &&
              $this->nmgp_dados_select['dataalteracao_'] == $this->dataalteracao_ &&
              $this->nmgp_dados_select['usuario_'] == $this->usuario_ &&
              $this->nmgp_dados_select['requisitos_'] == $this->requisitos_ &&
              $this->nmgp_dados_select['banco_'] == $this->banco_ &&
              $this->nmgp_dados_select['emailcobranca_'] == $this->emailcobranca_ &&
              $this->nmgp_dados_select['emailtecnico_'] == $this->emailtecnico_ &&
              $this->nmgp_dados_select['midia_'] == $this->midia_ &&
              $this->nmgp_dados_select['seg_'] == $this->seg_ &&
              $this->nmgp_dados_select['ter_'] == $this->ter_ &&
              $this->nmgp_dados_select['qua_'] == $this->qua_ &&
              $this->nmgp_dados_select['qui_'] == $this->qui_ &&
              $this->nmgp_dados_select['sex_'] == $this->sex_ &&
              $this->nmgp_dados_select['certificado_'] == $this->certificado_ &&
              $this->nmgp_dados_select['emailnfe_'] == $this->emailnfe_ &&
              $this->nmgp_dados_select['fundacao_'] == $this->fundacao_ &&
              $this->nmgp_dados_select['site_'] == $this->site_ &&
              $this->nmgp_dados_select['financeiro_'] == $this->financeiro_ &&
              $this->nmgp_dados_select['numero_'] == $this->numero_ &&
              $this->nmgp_dados_select['complemento_'] == $this->complemento_ &&
              $this->nmgp_dados_select['razaosocialentrega_'] == $this->razaosocialentrega_ &&
              $this->nmgp_dados_select['entrega_'] == $this->entrega_ &&
              $this->nmgp_dados_select['contatotecnico_'] == $this->contatotecnico_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cd_cliente_'] = $this->cd_cliente_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['razaosocial_'] = $this->razaosocial_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['nomefantasia_'] = $this->nomefantasia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cgc_'] = $this->cgc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['inscricao_'] = $this->inscricao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['endereco_'] = $this->endereco_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cidade_'] = $this->cidade_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['estado_'] = $this->estado_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['bairro_'] = $this->bairro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cep_'] = $this->cep_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['email_'] = $this->email_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fone_'] = $this->fone_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fone1_'] = $this->fone1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fax_'] = $this->fax_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contato_'] = $this->contato_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['enderecocobranca_'] = $this->enderecocobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cidadecobranca_'] = $this->cidadecobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['bairrocobranca_'] = $this->bairrocobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['estadocobranca_'] = $this->estadocobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cepcobranca_'] = $this->cepcobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fonecobranca_'] = $this->fonecobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['faxcobranca_'] = $this->faxcobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contatocobranca_'] = $this->contatocobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cgcentrega_'] = $this->cgcentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['inscricaoentrega_'] = $this->inscricaoentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['enderecoentrega_'] = $this->enderecoentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cidadeentrega_'] = $this->cidadeentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['bairroentrega_'] = $this->bairroentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['estadoentrega_'] = $this->estadoentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cepentrega_'] = $this->cepentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['foneentrega_'] = $this->foneentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contatoentrega_'] = $this->contatoentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contatoexpedicao_'] = $this->contatoexpedicao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['foneexpedicao_'] = $this->foneexpedicao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['datacadastro_'] = $this->datacadastro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['obs_'] = $this->obs_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['tipo_'] = $this->tipo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['consumidor_'] = $this->consumidor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['licensa_'] = $this->licensa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['venctolicensa_'] = $this->venctolicensa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['licensa1_'] = $this->licensa1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['venctolicensa1_'] = $this->venctolicensa1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['qtdeliberada_'] = $this->qtdeliberada_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['licensa2_'] = $this->licensa2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['venctolicensa2_'] = $this->venctolicensa2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['icms_'] = $this->icms_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['suframa_'] = $this->suframa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['limitecredito_'] = $this->limitecredito_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['vendedor_'] = $this->vendedor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['restricao_'] = $this->restricao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['comissao_'] = $this->comissao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['transportadora_'] = $this->transportadora_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['coleta_'] = $this->coleta_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['segmento_'] = $this->segmento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['dataalteracao_'] = $this->dataalteracao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['usuario_'] = $this->usuario_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['requisitos_'] = $this->requisitos_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['banco_'] = $this->banco_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['emailcobranca_'] = $this->emailcobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['emailtecnico_'] = $this->emailtecnico_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['midia_'] = $this->midia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['seg_'] = $this->seg_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['ter_'] = $this->ter_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['qua_'] = $this->qua_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['qui_'] = $this->qui_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['sex_'] = $this->sex_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['certificado_'] = $this->certificado_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['emailnfe_'] = $this->emailnfe_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fundacao_'] = $this->fundacao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['site_'] = $this->site_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['financeiro_'] = $this->financeiro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['numero_'] = $this->numero_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['complemento_'] = $this->complemento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['razaosocialentrega_'] = $this->razaosocialentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['entrega_'] = $this->entrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contatotecnico_'] = $this->contatotecnico_;
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['cd_cliente_'] = $this->cd_cliente_;
      $NM_val_form['razaosocial_'] = $this->razaosocial_;
      $NM_val_form['nomefantasia_'] = $this->nomefantasia_;
      $NM_val_form['cgc_'] = $this->cgc_;
      $NM_val_form['inscricao_'] = $this->inscricao_;
      $NM_val_form['endereco_'] = $this->endereco_;
      $NM_val_form['cidade_'] = $this->cidade_;
      $NM_val_form['estado_'] = $this->estado_;
      $NM_val_form['bairro_'] = $this->bairro_;
      $NM_val_form['cep_'] = $this->cep_;
      $NM_val_form['email_'] = $this->email_;
      $NM_val_form['fone_'] = $this->fone_;
      $NM_val_form['fone1_'] = $this->fone1_;
      $NM_val_form['fax_'] = $this->fax_;
      $NM_val_form['contato_'] = $this->contato_;
      $NM_val_form['enderecocobranca_'] = $this->enderecocobranca_;
      $NM_val_form['cidadecobranca_'] = $this->cidadecobranca_;
      $NM_val_form['bairrocobranca_'] = $this->bairrocobranca_;
      $NM_val_form['estadocobranca_'] = $this->estadocobranca_;
      $NM_val_form['cepcobranca_'] = $this->cepcobranca_;
      $NM_val_form['fonecobranca_'] = $this->fonecobranca_;
      $NM_val_form['faxcobranca_'] = $this->faxcobranca_;
      $NM_val_form['contatocobranca_'] = $this->contatocobranca_;
      $NM_val_form['cgcentrega_'] = $this->cgcentrega_;
      $NM_val_form['inscricaoentrega_'] = $this->inscricaoentrega_;
      $NM_val_form['enderecoentrega_'] = $this->enderecoentrega_;
      $NM_val_form['cidadeentrega_'] = $this->cidadeentrega_;
      $NM_val_form['bairroentrega_'] = $this->bairroentrega_;
      $NM_val_form['estadoentrega_'] = $this->estadoentrega_;
      $NM_val_form['cepentrega_'] = $this->cepentrega_;
      $NM_val_form['foneentrega_'] = $this->foneentrega_;
      $NM_val_form['contatoentrega_'] = $this->contatoentrega_;
      $NM_val_form['contatoexpedicao_'] = $this->contatoexpedicao_;
      $NM_val_form['foneexpedicao_'] = $this->foneexpedicao_;
      $NM_val_form['datacadastro_'] = $this->datacadastro_;
      $NM_val_form['obs_'] = $this->obs_;
      $NM_val_form['tipo_'] = $this->tipo_;
      $NM_val_form['consumidor_'] = $this->consumidor_;
      $NM_val_form['licensa_'] = $this->licensa_;
      $NM_val_form['venctolicensa_'] = $this->venctolicensa_;
      $NM_val_form['licensa1_'] = $this->licensa1_;
      $NM_val_form['venctolicensa1_'] = $this->venctolicensa1_;
      $NM_val_form['qtdeliberada_'] = $this->qtdeliberada_;
      $NM_val_form['licensa2_'] = $this->licensa2_;
      $NM_val_form['venctolicensa2_'] = $this->venctolicensa2_;
      $NM_val_form['icms_'] = $this->icms_;
      $NM_val_form['suframa_'] = $this->suframa_;
      $NM_val_form['limitecredito_'] = $this->limitecredito_;
      $NM_val_form['vendedor_'] = $this->vendedor_;
      $NM_val_form['restricao_'] = $this->restricao_;
      $NM_val_form['comissao_'] = $this->comissao_;
      $NM_val_form['transportadora_'] = $this->transportadora_;
      $NM_val_form['coleta_'] = $this->coleta_;
      $NM_val_form['segmento_'] = $this->segmento_;
      $NM_val_form['dataalteracao_'] = $this->dataalteracao_;
      $NM_val_form['usuario_'] = $this->usuario_;
      $NM_val_form['requisitos_'] = $this->requisitos_;
      $NM_val_form['banco_'] = $this->banco_;
      $NM_val_form['emailcobranca_'] = $this->emailcobranca_;
      $NM_val_form['emailtecnico_'] = $this->emailtecnico_;
      $NM_val_form['midia_'] = $this->midia_;
      $NM_val_form['seg_'] = $this->seg_;
      $NM_val_form['ter_'] = $this->ter_;
      $NM_val_form['qua_'] = $this->qua_;
      $NM_val_form['qui_'] = $this->qui_;
      $NM_val_form['sex_'] = $this->sex_;
      $NM_val_form['certificado_'] = $this->certificado_;
      $NM_val_form['emailnfe_'] = $this->emailnfe_;
      $NM_val_form['fundacao_'] = $this->fundacao_;
      $NM_val_form['site_'] = $this->site_;
      $NM_val_form['financeiro_'] = $this->financeiro_;
      $NM_val_form['numero_'] = $this->numero_;
      $NM_val_form['complemento_'] = $this->complemento_;
      $NM_val_form['razaosocialentrega_'] = $this->razaosocialentrega_;
      $NM_val_form['entrega_'] = $this->entrega_;
      $NM_val_form['contatotecnico_'] = $this->contatotecnico_;
      $NM_val_form['logistica_'] = $this->logistica_;
      $NM_val_form['pimportado_'] = $this->pimportado_;
      $NM_val_form['vendedor01_'] = $this->vendedor01_;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->qtdeliberada_ == "")  
      { 
          $this->qtdeliberada_ = 0;
          $this->sc_force_zero[] = 'qtdeliberada_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->icms_ == "")  
      { 
          $this->icms_ = 0;
          $this->sc_force_zero[] = 'icms_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->limitecredito_ == "")  
      { 
          $this->limitecredito_ = 0;
          $this->sc_force_zero[] = 'limitecredito_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->comissao_ == "")  
      { 
          $this->comissao_ = 0;
          $this->sc_force_zero[] = 'comissao_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->segmento_ == "")  
      { 
          $this->segmento_ = 0;
          $this->sc_force_zero[] = 'segmento_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->cd_cliente__before_qstr = $this->cd_cliente_;
          $this->cd_cliente_ = substr($this->Db->qstr($this->cd_cliente_), 1, -1); 
          if ($this->cd_cliente_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cd_cliente_ = "null"; 
              $NM_val_null[] = "cd_cliente_";
          } 
          $this->razaosocial__before_qstr = $this->razaosocial_;
          $this->razaosocial_ = substr($this->Db->qstr($this->razaosocial_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->razaosocial_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->razaosocial_ = "null"; 
                  $NM_val_null[] = "razaosocial_";
              } 
          }
          $this->nomefantasia__before_qstr = $this->nomefantasia_;
          $this->nomefantasia_ = substr($this->Db->qstr($this->nomefantasia_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->nomefantasia_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->nomefantasia_ = "null"; 
                  $NM_val_null[] = "nomefantasia_";
              } 
          }
          $this->cgc__before_qstr = $this->cgc_;
          $this->cgc_ = substr($this->Db->qstr($this->cgc_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cgc_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cgc_ = "null"; 
                  $NM_val_null[] = "cgc_";
              } 
          }
          $this->inscricao__before_qstr = $this->inscricao_;
          $this->inscricao_ = substr($this->Db->qstr($this->inscricao_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->inscricao_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->inscricao_ = "null"; 
                  $NM_val_null[] = "inscricao_";
              } 
          }
          $this->endereco__before_qstr = $this->endereco_;
          $this->endereco_ = substr($this->Db->qstr($this->endereco_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->endereco_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->endereco_ = "null"; 
                  $NM_val_null[] = "endereco_";
              } 
          }
          $this->cidade__before_qstr = $this->cidade_;
          $this->cidade_ = substr($this->Db->qstr($this->cidade_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cidade_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cidade_ = "null"; 
                  $NM_val_null[] = "cidade_";
              } 
          }
          $this->estado__before_qstr = $this->estado_;
          $this->estado_ = substr($this->Db->qstr($this->estado_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->estado_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->estado_ = "null"; 
                  $NM_val_null[] = "estado_";
              } 
          }
          $this->bairro__before_qstr = $this->bairro_;
          $this->bairro_ = substr($this->Db->qstr($this->bairro_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->bairro_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->bairro_ = "null"; 
                  $NM_val_null[] = "bairro_";
              } 
          }
          $this->cep__before_qstr = $this->cep_;
          $this->cep_ = substr($this->Db->qstr($this->cep_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cep_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cep_ = "null"; 
                  $NM_val_null[] = "cep_";
              } 
          }
          $this->email__before_qstr = $this->email_;
          $this->email_ = substr($this->Db->qstr($this->email_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->email_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->email_ = "null"; 
                  $NM_val_null[] = "email_";
              } 
          }
          $this->fone__before_qstr = $this->fone_;
          $this->fone_ = substr($this->Db->qstr($this->fone_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fone_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fone_ = "null"; 
                  $NM_val_null[] = "fone_";
              } 
          }
          $this->fone1__before_qstr = $this->fone1_;
          $this->fone1_ = substr($this->Db->qstr($this->fone1_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fone1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fone1_ = "null"; 
                  $NM_val_null[] = "fone1_";
              } 
          }
          $this->fax__before_qstr = $this->fax_;
          $this->fax_ = substr($this->Db->qstr($this->fax_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fax_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fax_ = "null"; 
                  $NM_val_null[] = "fax_";
              } 
          }
          $this->contato__before_qstr = $this->contato_;
          $this->contato_ = substr($this->Db->qstr($this->contato_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->contato_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->contato_ = "null"; 
                  $NM_val_null[] = "contato_";
              } 
          }
          $this->enderecocobranca__before_qstr = $this->enderecocobranca_;
          $this->enderecocobranca_ = substr($this->Db->qstr($this->enderecocobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->enderecocobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->enderecocobranca_ = "null"; 
                  $NM_val_null[] = "enderecocobranca_";
              } 
          }
          $this->cidadecobranca__before_qstr = $this->cidadecobranca_;
          $this->cidadecobranca_ = substr($this->Db->qstr($this->cidadecobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cidadecobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cidadecobranca_ = "null"; 
                  $NM_val_null[] = "cidadecobranca_";
              } 
          }
          $this->bairrocobranca__before_qstr = $this->bairrocobranca_;
          $this->bairrocobranca_ = substr($this->Db->qstr($this->bairrocobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->bairrocobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->bairrocobranca_ = "null"; 
                  $NM_val_null[] = "bairrocobranca_";
              } 
          }
          $this->estadocobranca__before_qstr = $this->estadocobranca_;
          $this->estadocobranca_ = substr($this->Db->qstr($this->estadocobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->estadocobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->estadocobranca_ = "null"; 
                  $NM_val_null[] = "estadocobranca_";
              } 
          }
          $this->cepcobranca__before_qstr = $this->cepcobranca_;
          $this->cepcobranca_ = substr($this->Db->qstr($this->cepcobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cepcobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cepcobranca_ = "null"; 
                  $NM_val_null[] = "cepcobranca_";
              } 
          }
          $this->fonecobranca__before_qstr = $this->fonecobranca_;
          $this->fonecobranca_ = substr($this->Db->qstr($this->fonecobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fonecobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fonecobranca_ = "null"; 
                  $NM_val_null[] = "fonecobranca_";
              } 
          }
          $this->faxcobranca__before_qstr = $this->faxcobranca_;
          $this->faxcobranca_ = substr($this->Db->qstr($this->faxcobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->faxcobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->faxcobranca_ = "null"; 
                  $NM_val_null[] = "faxcobranca_";
              } 
          }
          $this->contatocobranca__before_qstr = $this->contatocobranca_;
          $this->contatocobranca_ = substr($this->Db->qstr($this->contatocobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->contatocobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->contatocobranca_ = "null"; 
                  $NM_val_null[] = "contatocobranca_";
              } 
          }
          $this->cgcentrega__before_qstr = $this->cgcentrega_;
          $this->cgcentrega_ = substr($this->Db->qstr($this->cgcentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cgcentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cgcentrega_ = "null"; 
                  $NM_val_null[] = "cgcentrega_";
              } 
          }
          $this->inscricaoentrega__before_qstr = $this->inscricaoentrega_;
          $this->inscricaoentrega_ = substr($this->Db->qstr($this->inscricaoentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->inscricaoentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->inscricaoentrega_ = "null"; 
                  $NM_val_null[] = "inscricaoentrega_";
              } 
          }
          $this->enderecoentrega__before_qstr = $this->enderecoentrega_;
          $this->enderecoentrega_ = substr($this->Db->qstr($this->enderecoentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->enderecoentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->enderecoentrega_ = "null"; 
                  $NM_val_null[] = "enderecoentrega_";
              } 
          }
          $this->cidadeentrega__before_qstr = $this->cidadeentrega_;
          $this->cidadeentrega_ = substr($this->Db->qstr($this->cidadeentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cidadeentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cidadeentrega_ = "null"; 
                  $NM_val_null[] = "cidadeentrega_";
              } 
          }
          $this->bairroentrega__before_qstr = $this->bairroentrega_;
          $this->bairroentrega_ = substr($this->Db->qstr($this->bairroentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->bairroentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->bairroentrega_ = "null"; 
                  $NM_val_null[] = "bairroentrega_";
              } 
          }
          $this->estadoentrega__before_qstr = $this->estadoentrega_;
          $this->estadoentrega_ = substr($this->Db->qstr($this->estadoentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->estadoentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->estadoentrega_ = "null"; 
                  $NM_val_null[] = "estadoentrega_";
              } 
          }
          $this->cepentrega__before_qstr = $this->cepentrega_;
          $this->cepentrega_ = substr($this->Db->qstr($this->cepentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cepentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cepentrega_ = "null"; 
                  $NM_val_null[] = "cepentrega_";
              } 
          }
          $this->foneentrega__before_qstr = $this->foneentrega_;
          $this->foneentrega_ = substr($this->Db->qstr($this->foneentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->foneentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->foneentrega_ = "null"; 
                  $NM_val_null[] = "foneentrega_";
              } 
          }
          $this->contatoentrega__before_qstr = $this->contatoentrega_;
          $this->contatoentrega_ = substr($this->Db->qstr($this->contatoentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->contatoentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->contatoentrega_ = "null"; 
                  $NM_val_null[] = "contatoentrega_";
              } 
          }
          $this->contatoexpedicao__before_qstr = $this->contatoexpedicao_;
          $this->contatoexpedicao_ = substr($this->Db->qstr($this->contatoexpedicao_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->contatoexpedicao_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->contatoexpedicao_ = "null"; 
                  $NM_val_null[] = "contatoexpedicao_";
              } 
          }
          $this->foneexpedicao__before_qstr = $this->foneexpedicao_;
          $this->foneexpedicao_ = substr($this->Db->qstr($this->foneexpedicao_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->foneexpedicao_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->foneexpedicao_ = "null"; 
                  $NM_val_null[] = "foneexpedicao_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->datacadastro_ == "")  
              { 
                  $this->datacadastro_ = "null"; 
                  $NM_val_null[] = "datacadastro_";
              } 
          }
          $this->obs__before_qstr = $this->obs_;
          $this->obs_ = substr($this->Db->qstr($this->obs_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->obs_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->obs_ = "null"; 
                  $NM_val_null[] = "obs_";
              } 
          }
          $this->tipo__before_qstr = $this->tipo_;
          $this->tipo_ = substr($this->Db->qstr($this->tipo_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tipo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tipo_ = "null"; 
                  $NM_val_null[] = "tipo_";
              } 
          }
          $this->consumidor__before_qstr = $this->consumidor_;
          $this->consumidor_ = substr($this->Db->qstr($this->consumidor_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->consumidor_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->consumidor_ = "null"; 
                  $NM_val_null[] = "consumidor_";
              } 
          }
          $this->licensa__before_qstr = $this->licensa_;
          $this->licensa_ = substr($this->Db->qstr($this->licensa_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->licensa_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->licensa_ = "null"; 
                  $NM_val_null[] = "licensa_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->venctolicensa_ == "")  
              { 
                  $this->venctolicensa_ = "null"; 
                  $NM_val_null[] = "venctolicensa_";
              } 
          }
          $this->licensa1__before_qstr = $this->licensa1_;
          $this->licensa1_ = substr($this->Db->qstr($this->licensa1_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->licensa1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->licensa1_ = "null"; 
                  $NM_val_null[] = "licensa1_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->venctolicensa1_ == "")  
              { 
                  $this->venctolicensa1_ = "null"; 
                  $NM_val_null[] = "venctolicensa1_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->licensa2__before_qstr = $this->licensa2_;
          $this->licensa2_ = substr($this->Db->qstr($this->licensa2_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->licensa2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->licensa2_ = "null"; 
                  $NM_val_null[] = "licensa2_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->venctolicensa2_ == "")  
              { 
                  $this->venctolicensa2_ = "null"; 
                  $NM_val_null[] = "venctolicensa2_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->suframa__before_qstr = $this->suframa_;
          $this->suframa_ = substr($this->Db->qstr($this->suframa_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->suframa_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->suframa_ = "null"; 
                  $NM_val_null[] = "suframa_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->vendedor__before_qstr = $this->vendedor_;
          $this->vendedor_ = substr($this->Db->qstr($this->vendedor_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->vendedor_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->vendedor_ = "null"; 
                  $NM_val_null[] = "vendedor_";
              } 
          }
          $this->restricao__before_qstr = $this->restricao_;
          $this->restricao_ = substr($this->Db->qstr($this->restricao_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->restricao_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->restricao_ = "null"; 
                  $NM_val_null[] = "restricao_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->transportadora__before_qstr = $this->transportadora_;
          $this->transportadora_ = substr($this->Db->qstr($this->transportadora_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->transportadora_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->transportadora_ = "null"; 
                  $NM_val_null[] = "transportadora_";
              } 
          }
          $this->coleta__before_qstr = $this->coleta_;
          $this->coleta_ = substr($this->Db->qstr($this->coleta_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->coleta_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->coleta_ = "null"; 
                  $NM_val_null[] = "coleta_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->dataalteracao_ == "")  
              { 
                  $this->dataalteracao_ = "null"; 
                  $NM_val_null[] = "dataalteracao_";
              } 
          }
          $this->usuario__before_qstr = $this->usuario_;
          $this->usuario_ = substr($this->Db->qstr($this->usuario_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->usuario_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->usuario_ = "null"; 
                  $NM_val_null[] = "usuario_";
              } 
          }
          $this->requisitos__before_qstr = $this->requisitos_;
          $this->requisitos_ = substr($this->Db->qstr($this->requisitos_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->requisitos_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->requisitos_ = "null"; 
                  $NM_val_null[] = "requisitos_";
              } 
          }
          $this->banco__before_qstr = $this->banco_;
          $this->banco_ = substr($this->Db->qstr($this->banco_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->banco_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->banco_ = "null"; 
                  $NM_val_null[] = "banco_";
              } 
          }
          $this->emailcobranca__before_qstr = $this->emailcobranca_;
          $this->emailcobranca_ = substr($this->Db->qstr($this->emailcobranca_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->emailcobranca_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->emailcobranca_ = "null"; 
                  $NM_val_null[] = "emailcobranca_";
              } 
          }
          $this->emailtecnico__before_qstr = $this->emailtecnico_;
          $this->emailtecnico_ = substr($this->Db->qstr($this->emailtecnico_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->emailtecnico_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->emailtecnico_ = "null"; 
                  $NM_val_null[] = "emailtecnico_";
              } 
          }
          $this->midia__before_qstr = $this->midia_;
          $this->midia_ = substr($this->Db->qstr($this->midia_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->midia_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->midia_ = "null"; 
                  $NM_val_null[] = "midia_";
              } 
          }
          $this->seg__before_qstr = $this->seg_;
          $this->seg_ = substr($this->Db->qstr($this->seg_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->seg_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->seg_ = "null"; 
                  $NM_val_null[] = "seg_";
              } 
          }
          $this->ter__before_qstr = $this->ter_;
          $this->ter_ = substr($this->Db->qstr($this->ter_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->ter_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->ter_ = "null"; 
                  $NM_val_null[] = "ter_";
              } 
          }
          $this->qua__before_qstr = $this->qua_;
          $this->qua_ = substr($this->Db->qstr($this->qua_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->qua_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->qua_ = "null"; 
                  $NM_val_null[] = "qua_";
              } 
          }
          $this->qui__before_qstr = $this->qui_;
          $this->qui_ = substr($this->Db->qstr($this->qui_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->qui_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->qui_ = "null"; 
                  $NM_val_null[] = "qui_";
              } 
          }
          $this->sex__before_qstr = $this->sex_;
          $this->sex_ = substr($this->Db->qstr($this->sex_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->sex_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->sex_ = "null"; 
                  $NM_val_null[] = "sex_";
              } 
          }
          $this->certificado__before_qstr = $this->certificado_;
          $this->certificado_ = substr($this->Db->qstr($this->certificado_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->certificado_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->certificado_ = "null"; 
                  $NM_val_null[] = "certificado_";
              } 
          }
          $this->emailnfe__before_qstr = $this->emailnfe_;
          $this->emailnfe_ = substr($this->Db->qstr($this->emailnfe_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->emailnfe_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->emailnfe_ = "null"; 
                  $NM_val_null[] = "emailnfe_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fundacao_ == "")  
              { 
                  $this->fundacao_ = "null"; 
                  $NM_val_null[] = "fundacao_";
              } 
          }
          $this->site__before_qstr = $this->site_;
          $this->site_ = substr($this->Db->qstr($this->site_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->site_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->site_ = "null"; 
                  $NM_val_null[] = "site_";
              } 
          }
          $this->financeiro__before_qstr = $this->financeiro_;
          $this->financeiro_ = substr($this->Db->qstr($this->financeiro_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->financeiro_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->financeiro_ = "null"; 
                  $NM_val_null[] = "financeiro_";
              } 
          }
          $this->numero__before_qstr = $this->numero_;
          $this->numero_ = substr($this->Db->qstr($this->numero_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->numero_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->numero_ = "null"; 
                  $NM_val_null[] = "numero_";
              } 
          }
          $this->complemento__before_qstr = $this->complemento_;
          $this->complemento_ = substr($this->Db->qstr($this->complemento_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->complemento_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->complemento_ = "null"; 
                  $NM_val_null[] = "complemento_";
              } 
          }
          $this->razaosocialentrega__before_qstr = $this->razaosocialentrega_;
          $this->razaosocialentrega_ = substr($this->Db->qstr($this->razaosocialentrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->razaosocialentrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->razaosocialentrega_ = "null"; 
                  $NM_val_null[] = "razaosocialentrega_";
              } 
          }
          $this->entrega__before_qstr = $this->entrega_;
          $this->entrega_ = substr($this->Db->qstr($this->entrega_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->entrega_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->entrega_ = "null"; 
                  $NM_val_null[] = "entrega_";
              } 
          }
          $this->contatotecnico__before_qstr = $this->contatotecnico_;
          $this->contatotecnico_ = substr($this->Db->qstr($this->contatotecnico_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->contatotecnico_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->contatotecnico_ = "null"; 
                  $NM_val_null[] = "contatotecnico_";
              } 
          }
          $this->logistica__before_qstr = $this->logistica_;
          $this->logistica_ = substr($this->Db->qstr($this->logistica_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->logistica_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->logistica_ = "null"; 
                  $NM_val_null[] = "logistica_";
              } 
          }
          $this->pimportado__before_qstr = $this->pimportado_;
          $this->pimportado_ = substr($this->Db->qstr($this->pimportado_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->pimportado_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->pimportado_ = "null"; 
                  $NM_val_null[] = "pimportado_";
              } 
          }
          $this->vendedor01__before_qstr = $this->vendedor01_;
          $this->vendedor01_ = substr($this->Db->qstr($this->vendedor01_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->vendedor01_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->vendedor01_ = "null"; 
                  $NM_val_null[] = "vendedor01_";
              } 
          }
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_dbo_cliente_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "Razaosocial = '$this->razaosocial_', Nomefantasia = '$this->nomefantasia_', Cgc = '$this->cgc_', Inscricao = '$this->inscricao_', Endereco = '$this->endereco_', Cidade = '$this->cidade_', Estado = '$this->estado_', Bairro = '$this->bairro_', Cep = '$this->cep_', Email = '$this->email_', Fone = '$this->fone_', Fone1 = '$this->fone1_', Fax = '$this->fax_', Contato = '$this->contato_', Enderecocobranca = '$this->enderecocobranca_', Cidadecobranca = '$this->cidadecobranca_', Bairrocobranca = '$this->bairrocobranca_', Estadocobranca = '$this->estadocobranca_', Cepcobranca = '$this->cepcobranca_', Fonecobranca = '$this->fonecobranca_', Faxcobranca = '$this->faxcobranca_', Contatocobranca = '$this->contatocobranca_', Cgcentrega = '$this->cgcentrega_', Inscricaoentrega = '$this->inscricaoentrega_', Enderecoentrega = '$this->enderecoentrega_', Cidadeentrega = '$this->cidadeentrega_', Bairroentrega = '$this->bairroentrega_', Estadoentrega = '$this->estadoentrega_', Cepentrega = '$this->cepentrega_', Foneentrega = '$this->foneentrega_', Contatoentrega = '$this->contatoentrega_', Contatoexpedicao = '$this->contatoexpedicao_', Foneexpedicao = '$this->foneexpedicao_', Datacadastro = #$this->datacadastro_#, Obs = '$this->obs_', Tipo = '$this->tipo_', Consumidor = '$this->consumidor_', Licensa = '$this->licensa_', Venctolicensa = #$this->venctolicensa_#, Licensa1 = '$this->licensa1_', Venctolicensa1 = #$this->venctolicensa1_#, Qtdeliberada = $this->qtdeliberada_, Licensa2 = '$this->licensa2_', Venctolicensa2 = #$this->venctolicensa2_#, Icms = $this->icms_, Suframa = '$this->suframa_', Limitecredito = $this->limitecredito_, Vendedor = '$this->vendedor_', Restricao = '$this->restricao_', Comissao = $this->comissao_, Transportadora = '$this->transportadora_', Coleta = '$this->coleta_', Segmento = $this->segmento_, Dataalteracao = #$this->dataalteracao_#, Usuario = '$this->usuario_', REQUISITOS = '$this->requisitos_', Banco = '$this->banco_', Emailcobranca = '$this->emailcobranca_', Emailtecnico = '$this->emailtecnico_', Midia = '$this->midia_', Seg = '$this->seg_', Ter = '$this->ter_', Qua = '$this->qua_', Qui = '$this->qui_', Sex = '$this->sex_', Certificado = '$this->certificado_', Emailnfe = '$this->emailnfe_', Fundacao = #$this->fundacao_#, Site = '$this->site_', Financeiro = '$this->financeiro_', Numero = '$this->numero_', Complemento = '$this->complemento_', Razaosocialentrega = '$this->razaosocialentrega_', Entrega = '$this->entrega_', Contatotecnico = '$this->contatotecnico_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "Razaosocial = '$this->razaosocial_', Nomefantasia = '$this->nomefantasia_', Cgc = '$this->cgc_', Inscricao = '$this->inscricao_', Endereco = '$this->endereco_', Cidade = '$this->cidade_', Estado = '$this->estado_', Bairro = '$this->bairro_', Cep = '$this->cep_', Email = '$this->email_', Fone = '$this->fone_', Fone1 = '$this->fone1_', Fax = '$this->fax_', Contato = '$this->contato_', Enderecocobranca = '$this->enderecocobranca_', Cidadecobranca = '$this->cidadecobranca_', Bairrocobranca = '$this->bairrocobranca_', Estadocobranca = '$this->estadocobranca_', Cepcobranca = '$this->cepcobranca_', Fonecobranca = '$this->fonecobranca_', Faxcobranca = '$this->faxcobranca_', Contatocobranca = '$this->contatocobranca_', Cgcentrega = '$this->cgcentrega_', Inscricaoentrega = '$this->inscricaoentrega_', Enderecoentrega = '$this->enderecoentrega_', Cidadeentrega = '$this->cidadeentrega_', Bairroentrega = '$this->bairroentrega_', Estadoentrega = '$this->estadoentrega_', Cepentrega = '$this->cepentrega_', Foneentrega = '$this->foneentrega_', Contatoentrega = '$this->contatoentrega_', Contatoexpedicao = '$this->contatoexpedicao_', Foneexpedicao = '$this->foneexpedicao_', Datacadastro = " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . ", Obs = '$this->obs_', Tipo = '$this->tipo_', Consumidor = '$this->consumidor_', Licensa = '$this->licensa_', Venctolicensa = " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . ", Licensa1 = '$this->licensa1_', Venctolicensa1 = " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . ", Qtdeliberada = $this->qtdeliberada_, Licensa2 = '$this->licensa2_', Venctolicensa2 = " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . ", Icms = $this->icms_, Suframa = '$this->suframa_', Limitecredito = $this->limitecredito_, Vendedor = '$this->vendedor_', Restricao = '$this->restricao_', Comissao = $this->comissao_, Transportadora = '$this->transportadora_', Coleta = '$this->coleta_', Segmento = $this->segmento_, Dataalteracao = " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . ", Usuario = '$this->usuario_', REQUISITOS = '$this->requisitos_', Banco = '$this->banco_', Emailcobranca = '$this->emailcobranca_', Emailtecnico = '$this->emailtecnico_', Midia = '$this->midia_', Seg = '$this->seg_', Ter = '$this->ter_', Qua = '$this->qua_', Qui = '$this->qui_', Sex = '$this->sex_', Certificado = '$this->certificado_', Emailnfe = '$this->emailnfe_', Fundacao = " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . ", Site = '$this->site_', Financeiro = '$this->financeiro_', Numero = '$this->numero_', Complemento = '$this->complemento_', Razaosocialentrega = '$this->razaosocialentrega_', Entrega = '$this->entrega_', Contatotecnico = '$this->contatotecnico_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "Razaosocial = '$this->razaosocial_', Nomefantasia = '$this->nomefantasia_', Cgc = '$this->cgc_', Inscricao = '$this->inscricao_', Endereco = '$this->endereco_', Cidade = '$this->cidade_', Estado = '$this->estado_', Bairro = '$this->bairro_', Cep = '$this->cep_', Email = '$this->email_', Fone = '$this->fone_', Fone1 = '$this->fone1_', Fax = '$this->fax_', Contato = '$this->contato_', Enderecocobranca = '$this->enderecocobranca_', Cidadecobranca = '$this->cidadecobranca_', Bairrocobranca = '$this->bairrocobranca_', Estadocobranca = '$this->estadocobranca_', Cepcobranca = '$this->cepcobranca_', Fonecobranca = '$this->fonecobranca_', Faxcobranca = '$this->faxcobranca_', Contatocobranca = '$this->contatocobranca_', Cgcentrega = '$this->cgcentrega_', Inscricaoentrega = '$this->inscricaoentrega_', Enderecoentrega = '$this->enderecoentrega_', Cidadeentrega = '$this->cidadeentrega_', Bairroentrega = '$this->bairroentrega_', Estadoentrega = '$this->estadoentrega_', Cepentrega = '$this->cepentrega_', Foneentrega = '$this->foneentrega_', Contatoentrega = '$this->contatoentrega_', Contatoexpedicao = '$this->contatoexpedicao_', Foneexpedicao = '$this->foneexpedicao_', Datacadastro = " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . ", Obs = '$this->obs_', Tipo = '$this->tipo_', Consumidor = '$this->consumidor_', Licensa = '$this->licensa_', Venctolicensa = " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . ", Licensa1 = '$this->licensa1_', Venctolicensa1 = " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . ", Qtdeliberada = $this->qtdeliberada_, Licensa2 = '$this->licensa2_', Venctolicensa2 = " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . ", Icms = $this->icms_, Suframa = '$this->suframa_', Limitecredito = $this->limitecredito_, Vendedor = '$this->vendedor_', Restricao = '$this->restricao_', Comissao = $this->comissao_, Transportadora = '$this->transportadora_', Coleta = '$this->coleta_', Segmento = $this->segmento_, Dataalteracao = " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . ", Usuario = '$this->usuario_', REQUISITOS = '$this->requisitos_', Banco = '$this->banco_', Emailcobranca = '$this->emailcobranca_', Emailtecnico = '$this->emailtecnico_', Midia = '$this->midia_', Seg = '$this->seg_', Ter = '$this->ter_', Qua = '$this->qua_', Qui = '$this->qui_', Sex = '$this->sex_', Certificado = '$this->certificado_', Emailnfe = '$this->emailnfe_', Fundacao = " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . ", Site = '$this->site_', Financeiro = '$this->financeiro_', Numero = '$this->numero_', Complemento = '$this->complemento_', Razaosocialentrega = '$this->razaosocialentrega_', Entrega = '$this->entrega_', Contatotecnico = '$this->contatotecnico_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "Razaosocial = '$this->razaosocial_', Nomefantasia = '$this->nomefantasia_', Cgc = '$this->cgc_', Inscricao = '$this->inscricao_', Endereco = '$this->endereco_', Cidade = '$this->cidade_', Estado = '$this->estado_', Bairro = '$this->bairro_', Cep = '$this->cep_', Email = '$this->email_', Fone = '$this->fone_', Fone1 = '$this->fone1_', Fax = '$this->fax_', Contato = '$this->contato_', Enderecocobranca = '$this->enderecocobranca_', Cidadecobranca = '$this->cidadecobranca_', Bairrocobranca = '$this->bairrocobranca_', Estadocobranca = '$this->estadocobranca_', Cepcobranca = '$this->cepcobranca_', Fonecobranca = '$this->fonecobranca_', Faxcobranca = '$this->faxcobranca_', Contatocobranca = '$this->contatocobranca_', Cgcentrega = '$this->cgcentrega_', Inscricaoentrega = '$this->inscricaoentrega_', Enderecoentrega = '$this->enderecoentrega_', Cidadeentrega = '$this->cidadeentrega_', Bairroentrega = '$this->bairroentrega_', Estadoentrega = '$this->estadoentrega_', Cepentrega = '$this->cepentrega_', Foneentrega = '$this->foneentrega_', Contatoentrega = '$this->contatoentrega_', Contatoexpedicao = '$this->contatoexpedicao_', Foneexpedicao = '$this->foneexpedicao_', Datacadastro = EXTEND('$this->datacadastro_', YEAR TO FRACTION), Obs = '$this->obs_', Tipo = '$this->tipo_', Consumidor = '$this->consumidor_', Licensa = '$this->licensa_', Venctolicensa = EXTEND('$this->venctolicensa_', YEAR TO FRACTION), Licensa1 = '$this->licensa1_', Venctolicensa1 = EXTEND('$this->venctolicensa1_', YEAR TO FRACTION), Qtdeliberada = $this->qtdeliberada_, Licensa2 = '$this->licensa2_', Venctolicensa2 = EXTEND('$this->venctolicensa2_', YEAR TO FRACTION), Icms = $this->icms_, Suframa = '$this->suframa_', Limitecredito = $this->limitecredito_, Vendedor = '$this->vendedor_', Restricao = '$this->restricao_', Comissao = $this->comissao_, Transportadora = '$this->transportadora_', Coleta = '$this->coleta_', Segmento = $this->segmento_, Dataalteracao = EXTEND('$this->dataalteracao_', YEAR TO FRACTION), Usuario = '$this->usuario_', REQUISITOS = '$this->requisitos_', Banco = '$this->banco_', Emailcobranca = '$this->emailcobranca_', Emailtecnico = '$this->emailtecnico_', Midia = '$this->midia_', Seg = '$this->seg_', Ter = '$this->ter_', Qua = '$this->qua_', Qui = '$this->qui_', Sex = '$this->sex_', Certificado = '$this->certificado_', Emailnfe = '$this->emailnfe_', Fundacao = EXTEND('$this->fundacao_', YEAR TO FRACTION), Site = '$this->site_', Financeiro = '$this->financeiro_', Numero = '$this->numero_', Complemento = '$this->complemento_', Razaosocialentrega = '$this->razaosocialentrega_', Entrega = '$this->entrega_', Contatotecnico = '$this->contatotecnico_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "Razaosocial = '$this->razaosocial_', Nomefantasia = '$this->nomefantasia_', Cgc = '$this->cgc_', Inscricao = '$this->inscricao_', Endereco = '$this->endereco_', Cidade = '$this->cidade_', Estado = '$this->estado_', Bairro = '$this->bairro_', Cep = '$this->cep_', Email = '$this->email_', Fone = '$this->fone_', Fone1 = '$this->fone1_', Fax = '$this->fax_', Contato = '$this->contato_', Enderecocobranca = '$this->enderecocobranca_', Cidadecobranca = '$this->cidadecobranca_', Bairrocobranca = '$this->bairrocobranca_', Estadocobranca = '$this->estadocobranca_', Cepcobranca = '$this->cepcobranca_', Fonecobranca = '$this->fonecobranca_', Faxcobranca = '$this->faxcobranca_', Contatocobranca = '$this->contatocobranca_', Cgcentrega = '$this->cgcentrega_', Inscricaoentrega = '$this->inscricaoentrega_', Enderecoentrega = '$this->enderecoentrega_', Cidadeentrega = '$this->cidadeentrega_', Bairroentrega = '$this->bairroentrega_', Estadoentrega = '$this->estadoentrega_', Cepentrega = '$this->cepentrega_', Foneentrega = '$this->foneentrega_', Contatoentrega = '$this->contatoentrega_', Contatoexpedicao = '$this->contatoexpedicao_', Foneexpedicao = '$this->foneexpedicao_', Datacadastro = " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . ", Obs = '$this->obs_', Tipo = '$this->tipo_', Consumidor = '$this->consumidor_', Licensa = '$this->licensa_', Venctolicensa = " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . ", Licensa1 = '$this->licensa1_', Venctolicensa1 = " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . ", Qtdeliberada = $this->qtdeliberada_, Licensa2 = '$this->licensa2_', Venctolicensa2 = " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . ", Icms = $this->icms_, Suframa = '$this->suframa_', Limitecredito = $this->limitecredito_, Vendedor = '$this->vendedor_', Restricao = '$this->restricao_', Comissao = $this->comissao_, Transportadora = '$this->transportadora_', Coleta = '$this->coleta_', Segmento = $this->segmento_, Dataalteracao = " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . ", Usuario = '$this->usuario_', REQUISITOS = '$this->requisitos_', Banco = '$this->banco_', Emailcobranca = '$this->emailcobranca_', Emailtecnico = '$this->emailtecnico_', Midia = '$this->midia_', Seg = '$this->seg_', Ter = '$this->ter_', Qua = '$this->qua_', Qui = '$this->qui_', Sex = '$this->sex_', Certificado = '$this->certificado_', Emailnfe = '$this->emailnfe_', Fundacao = " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . ", Site = '$this->site_', Financeiro = '$this->financeiro_', Numero = '$this->numero_', Complemento = '$this->complemento_', Razaosocialentrega = '$this->razaosocialentrega_', Entrega = '$this->entrega_', Contatotecnico = '$this->contatotecnico_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "Razaosocial = '$this->razaosocial_', Nomefantasia = '$this->nomefantasia_', Cgc = '$this->cgc_', Inscricao = '$this->inscricao_', Endereco = '$this->endereco_', Cidade = '$this->cidade_', Estado = '$this->estado_', Bairro = '$this->bairro_', Cep = '$this->cep_', Email = '$this->email_', Fone = '$this->fone_', Fone1 = '$this->fone1_', Fax = '$this->fax_', Contato = '$this->contato_', Enderecocobranca = '$this->enderecocobranca_', Cidadecobranca = '$this->cidadecobranca_', Bairrocobranca = '$this->bairrocobranca_', Estadocobranca = '$this->estadocobranca_', Cepcobranca = '$this->cepcobranca_', Fonecobranca = '$this->fonecobranca_', Faxcobranca = '$this->faxcobranca_', Contatocobranca = '$this->contatocobranca_', Cgcentrega = '$this->cgcentrega_', Inscricaoentrega = '$this->inscricaoentrega_', Enderecoentrega = '$this->enderecoentrega_', Cidadeentrega = '$this->cidadeentrega_', Bairroentrega = '$this->bairroentrega_', Estadoentrega = '$this->estadoentrega_', Cepentrega = '$this->cepentrega_', Foneentrega = '$this->foneentrega_', Contatoentrega = '$this->contatoentrega_', Contatoexpedicao = '$this->contatoexpedicao_', Foneexpedicao = '$this->foneexpedicao_', Datacadastro = " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . ", Obs = '$this->obs_', Tipo = '$this->tipo_', Consumidor = '$this->consumidor_', Licensa = '$this->licensa_', Venctolicensa = " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . ", Licensa1 = '$this->licensa1_', Venctolicensa1 = " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . ", Qtdeliberada = $this->qtdeliberada_, Licensa2 = '$this->licensa2_', Venctolicensa2 = " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . ", Icms = $this->icms_, Suframa = '$this->suframa_', Limitecredito = $this->limitecredito_, Vendedor = '$this->vendedor_', Restricao = '$this->restricao_', Comissao = $this->comissao_, Transportadora = '$this->transportadora_', Coleta = '$this->coleta_', Segmento = $this->segmento_, Dataalteracao = " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . ", Usuario = '$this->usuario_', REQUISITOS = '$this->requisitos_', Banco = '$this->banco_', Emailcobranca = '$this->emailcobranca_', Emailtecnico = '$this->emailtecnico_', Midia = '$this->midia_', Seg = '$this->seg_', Ter = '$this->ter_', Qua = '$this->qua_', Qui = '$this->qui_', Sex = '$this->sex_', Certificado = '$this->certificado_', Emailnfe = '$this->emailnfe_', Fundacao = " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . ", Site = '$this->site_', Financeiro = '$this->financeiro_', Numero = '$this->numero_', Complemento = '$this->complemento_', Razaosocialentrega = '$this->razaosocialentrega_', Entrega = '$this->entrega_', Contatotecnico = '$this->contatotecnico_'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "Razaosocial = '$this->razaosocial_', Nomefantasia = '$this->nomefantasia_', Cgc = '$this->cgc_', Inscricao = '$this->inscricao_', Endereco = '$this->endereco_', Cidade = '$this->cidade_', Estado = '$this->estado_', Bairro = '$this->bairro_', Cep = '$this->cep_', Email = '$this->email_', Fone = '$this->fone_', Fone1 = '$this->fone1_', Fax = '$this->fax_', Contato = '$this->contato_', Enderecocobranca = '$this->enderecocobranca_', Cidadecobranca = '$this->cidadecobranca_', Bairrocobranca = '$this->bairrocobranca_', Estadocobranca = '$this->estadocobranca_', Cepcobranca = '$this->cepcobranca_', Fonecobranca = '$this->fonecobranca_', Faxcobranca = '$this->faxcobranca_', Contatocobranca = '$this->contatocobranca_', Cgcentrega = '$this->cgcentrega_', Inscricaoentrega = '$this->inscricaoentrega_', Enderecoentrega = '$this->enderecoentrega_', Cidadeentrega = '$this->cidadeentrega_', Bairroentrega = '$this->bairroentrega_', Estadoentrega = '$this->estadoentrega_', Cepentrega = '$this->cepentrega_', Foneentrega = '$this->foneentrega_', Contatoentrega = '$this->contatoentrega_', Contatoexpedicao = '$this->contatoexpedicao_', Foneexpedicao = '$this->foneexpedicao_', Datacadastro = " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . ", Obs = '$this->obs_', Tipo = '$this->tipo_', Consumidor = '$this->consumidor_', Licensa = '$this->licensa_', Venctolicensa = " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . ", Licensa1 = '$this->licensa1_', Venctolicensa1 = " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . ", Qtdeliberada = $this->qtdeliberada_, Licensa2 = '$this->licensa2_', Venctolicensa2 = " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . ", Icms = $this->icms_, Suframa = '$this->suframa_', Limitecredito = $this->limitecredito_, Vendedor = '$this->vendedor_', Restricao = '$this->restricao_', Comissao = $this->comissao_, Transportadora = '$this->transportadora_', Coleta = '$this->coleta_', Segmento = $this->segmento_, Dataalteracao = " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . ", Usuario = '$this->usuario_', REQUISITOS = '$this->requisitos_', Banco = '$this->banco_', Emailcobranca = '$this->emailcobranca_', Emailtecnico = '$this->emailtecnico_', Midia = '$this->midia_', Seg = '$this->seg_', Ter = '$this->ter_', Qua = '$this->qua_', Qui = '$this->qui_', Sex = '$this->sex_', Certificado = '$this->certificado_', Emailnfe = '$this->emailnfe_', Fundacao = " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . ", Site = '$this->site_', Financeiro = '$this->financeiro_', Numero = '$this->numero_', Complemento = '$this->complemento_', Razaosocialentrega = '$this->razaosocialentrega_', Entrega = '$this->entrega_', Contatotecnico = '$this->contatotecnico_'"; 
              } 
              if (isset($NM_val_form['logistica_']) && $NM_val_form['logistica_'] != $this->nmgp_dados_select['logistica_']) 
              { 
                  $SC_fields_update[] = "Logistica = '$this->logistica_'"; 
              } 
              if (isset($NM_val_form['pimportado_']) && $NM_val_form['pimportado_'] != $this->nmgp_dados_select['pimportado_']) 
              { 
                  $SC_fields_update[] = "Pimportado = '$this->pimportado_'"; 
              } 
              if (isset($NM_val_form['vendedor01_']) && $NM_val_form['vendedor01_'] != $this->nmgp_dados_select['vendedor01_']) 
              { 
                  $SC_fields_update[] = "Vendedor01 = '$this->vendedor01_'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE Cd_cliente = '$this->cd_cliente_' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE Cd_cliente = '$this->cd_cliente_' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE Cd_cliente = '$this->cd_cliente_' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE Cd_cliente = '$this->cd_cliente_' ";  
              }  
              else  
              {
                  $comando .= " WHERE Cd_cliente = '$this->cd_cliente_' ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              if (!empty($SC_fields_update))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_dbo_cliente_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->cd_cliente_ = $this->cd_cliente__before_qstr;
          $this->razaosocial_ = $this->razaosocial__before_qstr;
          $this->nomefantasia_ = $this->nomefantasia__before_qstr;
          $this->cgc_ = $this->cgc__before_qstr;
          $this->inscricao_ = $this->inscricao__before_qstr;
          $this->endereco_ = $this->endereco__before_qstr;
          $this->cidade_ = $this->cidade__before_qstr;
          $this->estado_ = $this->estado__before_qstr;
          $this->bairro_ = $this->bairro__before_qstr;
          $this->cep_ = $this->cep__before_qstr;
          $this->email_ = $this->email__before_qstr;
          $this->fone_ = $this->fone__before_qstr;
          $this->fone1_ = $this->fone1__before_qstr;
          $this->fax_ = $this->fax__before_qstr;
          $this->contato_ = $this->contato__before_qstr;
          $this->enderecocobranca_ = $this->enderecocobranca__before_qstr;
          $this->cidadecobranca_ = $this->cidadecobranca__before_qstr;
          $this->bairrocobranca_ = $this->bairrocobranca__before_qstr;
          $this->estadocobranca_ = $this->estadocobranca__before_qstr;
          $this->cepcobranca_ = $this->cepcobranca__before_qstr;
          $this->fonecobranca_ = $this->fonecobranca__before_qstr;
          $this->faxcobranca_ = $this->faxcobranca__before_qstr;
          $this->contatocobranca_ = $this->contatocobranca__before_qstr;
          $this->cgcentrega_ = $this->cgcentrega__before_qstr;
          $this->inscricaoentrega_ = $this->inscricaoentrega__before_qstr;
          $this->enderecoentrega_ = $this->enderecoentrega__before_qstr;
          $this->cidadeentrega_ = $this->cidadeentrega__before_qstr;
          $this->bairroentrega_ = $this->bairroentrega__before_qstr;
          $this->estadoentrega_ = $this->estadoentrega__before_qstr;
          $this->cepentrega_ = $this->cepentrega__before_qstr;
          $this->foneentrega_ = $this->foneentrega__before_qstr;
          $this->contatoentrega_ = $this->contatoentrega__before_qstr;
          $this->contatoexpedicao_ = $this->contatoexpedicao__before_qstr;
          $this->foneexpedicao_ = $this->foneexpedicao__before_qstr;
          $this->obs_ = $this->obs__before_qstr;
          $this->tipo_ = $this->tipo__before_qstr;
          $this->consumidor_ = $this->consumidor__before_qstr;
          $this->licensa_ = $this->licensa__before_qstr;
          $this->licensa1_ = $this->licensa1__before_qstr;
          $this->licensa2_ = $this->licensa2__before_qstr;
          $this->suframa_ = $this->suframa__before_qstr;
          $this->vendedor_ = $this->vendedor__before_qstr;
          $this->restricao_ = $this->restricao__before_qstr;
          $this->transportadora_ = $this->transportadora__before_qstr;
          $this->coleta_ = $this->coleta__before_qstr;
          $this->usuario_ = $this->usuario__before_qstr;
          $this->requisitos_ = $this->requisitos__before_qstr;
          $this->banco_ = $this->banco__before_qstr;
          $this->emailcobranca_ = $this->emailcobranca__before_qstr;
          $this->emailtecnico_ = $this->emailtecnico__before_qstr;
          $this->midia_ = $this->midia__before_qstr;
          $this->seg_ = $this->seg__before_qstr;
          $this->ter_ = $this->ter__before_qstr;
          $this->qua_ = $this->qua__before_qstr;
          $this->qui_ = $this->qui__before_qstr;
          $this->sex_ = $this->sex__before_qstr;
          $this->certificado_ = $this->certificado__before_qstr;
          $this->emailnfe_ = $this->emailnfe__before_qstr;
          $this->site_ = $this->site__before_qstr;
          $this->financeiro_ = $this->financeiro__before_qstr;
          $this->numero_ = $this->numero__before_qstr;
          $this->complemento_ = $this->complemento__before_qstr;
          $this->razaosocialentrega_ = $this->razaosocialentrega__before_qstr;
          $this->entrega_ = $this->entrega__before_qstr;
          $this->contatotecnico_ = $this->contatotecnico__before_qstr;
          $this->logistica_ = $this->logistica__before_qstr;
          $this->pimportado_ = $this->pimportado__before_qstr;
          $this->vendedor01_ = $this->vendedor01__before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['db_changed'] = true;

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['cd_cliente_'])) { $this->cd_cliente_ = $NM_val_form['cd_cliente_']; }
              elseif (isset($this->cd_cliente_)) { $this->nm_limpa_alfa($this->cd_cliente_); }
              if     (isset($NM_val_form) && isset($NM_val_form['razaosocial_'])) { $this->razaosocial_ = $NM_val_form['razaosocial_']; }
              elseif (isset($this->razaosocial_)) { $this->nm_limpa_alfa($this->razaosocial_); }
              if     (isset($NM_val_form) && isset($NM_val_form['nomefantasia_'])) { $this->nomefantasia_ = $NM_val_form['nomefantasia_']; }
              elseif (isset($this->nomefantasia_)) { $this->nm_limpa_alfa($this->nomefantasia_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgc_'])) { $this->cgc_ = $NM_val_form['cgc_']; }
              elseif (isset($this->cgc_)) { $this->nm_limpa_alfa($this->cgc_); }
              if     (isset($NM_val_form) && isset($NM_val_form['inscricao_'])) { $this->inscricao_ = $NM_val_form['inscricao_']; }
              elseif (isset($this->inscricao_)) { $this->nm_limpa_alfa($this->inscricao_); }
              if     (isset($NM_val_form) && isset($NM_val_form['endereco_'])) { $this->endereco_ = $NM_val_form['endereco_']; }
              elseif (isset($this->endereco_)) { $this->nm_limpa_alfa($this->endereco_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cidade_'])) { $this->cidade_ = $NM_val_form['cidade_']; }
              elseif (isset($this->cidade_)) { $this->nm_limpa_alfa($this->cidade_); }
              if     (isset($NM_val_form) && isset($NM_val_form['estado_'])) { $this->estado_ = $NM_val_form['estado_']; }
              elseif (isset($this->estado_)) { $this->nm_limpa_alfa($this->estado_); }
              if     (isset($NM_val_form) && isset($NM_val_form['bairro_'])) { $this->bairro_ = $NM_val_form['bairro_']; }
              elseif (isset($this->bairro_)) { $this->nm_limpa_alfa($this->bairro_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cep_'])) { $this->cep_ = $NM_val_form['cep_']; }
              elseif (isset($this->cep_)) { $this->nm_limpa_alfa($this->cep_); }
              if     (isset($NM_val_form) && isset($NM_val_form['email_'])) { $this->email_ = $NM_val_form['email_']; }
              elseif (isset($this->email_)) { $this->nm_limpa_alfa($this->email_); }
              if     (isset($NM_val_form) && isset($NM_val_form['fone_'])) { $this->fone_ = $NM_val_form['fone_']; }
              elseif (isset($this->fone_)) { $this->nm_limpa_alfa($this->fone_); }
              if     (isset($NM_val_form) && isset($NM_val_form['fone1_'])) { $this->fone1_ = $NM_val_form['fone1_']; }
              elseif (isset($this->fone1_)) { $this->nm_limpa_alfa($this->fone1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['fax_'])) { $this->fax_ = $NM_val_form['fax_']; }
              elseif (isset($this->fax_)) { $this->nm_limpa_alfa($this->fax_); }
              if     (isset($NM_val_form) && isset($NM_val_form['contato_'])) { $this->contato_ = $NM_val_form['contato_']; }
              elseif (isset($this->contato_)) { $this->nm_limpa_alfa($this->contato_); }
              if     (isset($NM_val_form) && isset($NM_val_form['enderecocobranca_'])) { $this->enderecocobranca_ = $NM_val_form['enderecocobranca_']; }
              elseif (isset($this->enderecocobranca_)) { $this->nm_limpa_alfa($this->enderecocobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cidadecobranca_'])) { $this->cidadecobranca_ = $NM_val_form['cidadecobranca_']; }
              elseif (isset($this->cidadecobranca_)) { $this->nm_limpa_alfa($this->cidadecobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['bairrocobranca_'])) { $this->bairrocobranca_ = $NM_val_form['bairrocobranca_']; }
              elseif (isset($this->bairrocobranca_)) { $this->nm_limpa_alfa($this->bairrocobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['estadocobranca_'])) { $this->estadocobranca_ = $NM_val_form['estadocobranca_']; }
              elseif (isset($this->estadocobranca_)) { $this->nm_limpa_alfa($this->estadocobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cepcobranca_'])) { $this->cepcobranca_ = $NM_val_form['cepcobranca_']; }
              elseif (isset($this->cepcobranca_)) { $this->nm_limpa_alfa($this->cepcobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['fonecobranca_'])) { $this->fonecobranca_ = $NM_val_form['fonecobranca_']; }
              elseif (isset($this->fonecobranca_)) { $this->nm_limpa_alfa($this->fonecobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['faxcobranca_'])) { $this->faxcobranca_ = $NM_val_form['faxcobranca_']; }
              elseif (isset($this->faxcobranca_)) { $this->nm_limpa_alfa($this->faxcobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['contatocobranca_'])) { $this->contatocobranca_ = $NM_val_form['contatocobranca_']; }
              elseif (isset($this->contatocobranca_)) { $this->nm_limpa_alfa($this->contatocobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cgcentrega_'])) { $this->cgcentrega_ = $NM_val_form['cgcentrega_']; }
              elseif (isset($this->cgcentrega_)) { $this->nm_limpa_alfa($this->cgcentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['inscricaoentrega_'])) { $this->inscricaoentrega_ = $NM_val_form['inscricaoentrega_']; }
              elseif (isset($this->inscricaoentrega_)) { $this->nm_limpa_alfa($this->inscricaoentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['enderecoentrega_'])) { $this->enderecoentrega_ = $NM_val_form['enderecoentrega_']; }
              elseif (isset($this->enderecoentrega_)) { $this->nm_limpa_alfa($this->enderecoentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cidadeentrega_'])) { $this->cidadeentrega_ = $NM_val_form['cidadeentrega_']; }
              elseif (isset($this->cidadeentrega_)) { $this->nm_limpa_alfa($this->cidadeentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['bairroentrega_'])) { $this->bairroentrega_ = $NM_val_form['bairroentrega_']; }
              elseif (isset($this->bairroentrega_)) { $this->nm_limpa_alfa($this->bairroentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['estadoentrega_'])) { $this->estadoentrega_ = $NM_val_form['estadoentrega_']; }
              elseif (isset($this->estadoentrega_)) { $this->nm_limpa_alfa($this->estadoentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cepentrega_'])) { $this->cepentrega_ = $NM_val_form['cepentrega_']; }
              elseif (isset($this->cepentrega_)) { $this->nm_limpa_alfa($this->cepentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['foneentrega_'])) { $this->foneentrega_ = $NM_val_form['foneentrega_']; }
              elseif (isset($this->foneentrega_)) { $this->nm_limpa_alfa($this->foneentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['contatoentrega_'])) { $this->contatoentrega_ = $NM_val_form['contatoentrega_']; }
              elseif (isset($this->contatoentrega_)) { $this->nm_limpa_alfa($this->contatoentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['contatoexpedicao_'])) { $this->contatoexpedicao_ = $NM_val_form['contatoexpedicao_']; }
              elseif (isset($this->contatoexpedicao_)) { $this->nm_limpa_alfa($this->contatoexpedicao_); }
              if     (isset($NM_val_form) && isset($NM_val_form['foneexpedicao_'])) { $this->foneexpedicao_ = $NM_val_form['foneexpedicao_']; }
              elseif (isset($this->foneexpedicao_)) { $this->nm_limpa_alfa($this->foneexpedicao_); }
              if     (isset($NM_val_form) && isset($NM_val_form['obs_'])) { $this->obs_ = $NM_val_form['obs_']; }
              elseif (isset($this->obs_)) { $this->nm_limpa_alfa($this->obs_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_'])) { $this->tipo_ = $NM_val_form['tipo_']; }
              elseif (isset($this->tipo_)) { $this->nm_limpa_alfa($this->tipo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['consumidor_'])) { $this->consumidor_ = $NM_val_form['consumidor_']; }
              elseif (isset($this->consumidor_)) { $this->nm_limpa_alfa($this->consumidor_); }
              if     (isset($NM_val_form) && isset($NM_val_form['licensa_'])) { $this->licensa_ = $NM_val_form['licensa_']; }
              elseif (isset($this->licensa_)) { $this->nm_limpa_alfa($this->licensa_); }
              if     (isset($NM_val_form) && isset($NM_val_form['licensa1_'])) { $this->licensa1_ = $NM_val_form['licensa1_']; }
              elseif (isset($this->licensa1_)) { $this->nm_limpa_alfa($this->licensa1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['qtdeliberada_'])) { $this->qtdeliberada_ = $NM_val_form['qtdeliberada_']; }
              elseif (isset($this->qtdeliberada_)) { $this->nm_limpa_alfa($this->qtdeliberada_); }
              if     (isset($NM_val_form) && isset($NM_val_form['licensa2_'])) { $this->licensa2_ = $NM_val_form['licensa2_']; }
              elseif (isset($this->licensa2_)) { $this->nm_limpa_alfa($this->licensa2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['icms_'])) { $this->icms_ = $NM_val_form['icms_']; }
              elseif (isset($this->icms_)) { $this->nm_limpa_alfa($this->icms_); }
              if     (isset($NM_val_form) && isset($NM_val_form['suframa_'])) { $this->suframa_ = $NM_val_form['suframa_']; }
              elseif (isset($this->suframa_)) { $this->nm_limpa_alfa($this->suframa_); }
              if     (isset($NM_val_form) && isset($NM_val_form['limitecredito_'])) { $this->limitecredito_ = $NM_val_form['limitecredito_']; }
              elseif (isset($this->limitecredito_)) { $this->nm_limpa_alfa($this->limitecredito_); }
              if     (isset($NM_val_form) && isset($NM_val_form['vendedor_'])) { $this->vendedor_ = $NM_val_form['vendedor_']; }
              elseif (isset($this->vendedor_)) { $this->nm_limpa_alfa($this->vendedor_); }
              if     (isset($NM_val_form) && isset($NM_val_form['restricao_'])) { $this->restricao_ = $NM_val_form['restricao_']; }
              elseif (isset($this->restricao_)) { $this->nm_limpa_alfa($this->restricao_); }
              if     (isset($NM_val_form) && isset($NM_val_form['comissao_'])) { $this->comissao_ = $NM_val_form['comissao_']; }
              elseif (isset($this->comissao_)) { $this->nm_limpa_alfa($this->comissao_); }
              if     (isset($NM_val_form) && isset($NM_val_form['transportadora_'])) { $this->transportadora_ = $NM_val_form['transportadora_']; }
              elseif (isset($this->transportadora_)) { $this->nm_limpa_alfa($this->transportadora_); }
              if     (isset($NM_val_form) && isset($NM_val_form['coleta_'])) { $this->coleta_ = $NM_val_form['coleta_']; }
              elseif (isset($this->coleta_)) { $this->nm_limpa_alfa($this->coleta_); }
              if     (isset($NM_val_form) && isset($NM_val_form['segmento_'])) { $this->segmento_ = $NM_val_form['segmento_']; }
              elseif (isset($this->segmento_)) { $this->nm_limpa_alfa($this->segmento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['usuario_'])) { $this->usuario_ = $NM_val_form['usuario_']; }
              elseif (isset($this->usuario_)) { $this->nm_limpa_alfa($this->usuario_); }
              if     (isset($NM_val_form) && isset($NM_val_form['requisitos_'])) { $this->requisitos_ = $NM_val_form['requisitos_']; }
              elseif (isset($this->requisitos_)) { $this->nm_limpa_alfa($this->requisitos_); }
              if     (isset($NM_val_form) && isset($NM_val_form['banco_'])) { $this->banco_ = $NM_val_form['banco_']; }
              elseif (isset($this->banco_)) { $this->nm_limpa_alfa($this->banco_); }
              if     (isset($NM_val_form) && isset($NM_val_form['emailcobranca_'])) { $this->emailcobranca_ = $NM_val_form['emailcobranca_']; }
              elseif (isset($this->emailcobranca_)) { $this->nm_limpa_alfa($this->emailcobranca_); }
              if     (isset($NM_val_form) && isset($NM_val_form['emailtecnico_'])) { $this->emailtecnico_ = $NM_val_form['emailtecnico_']; }
              elseif (isset($this->emailtecnico_)) { $this->nm_limpa_alfa($this->emailtecnico_); }
              if     (isset($NM_val_form) && isset($NM_val_form['midia_'])) { $this->midia_ = $NM_val_form['midia_']; }
              elseif (isset($this->midia_)) { $this->nm_limpa_alfa($this->midia_); }
              if     (isset($NM_val_form) && isset($NM_val_form['seg_'])) { $this->seg_ = $NM_val_form['seg_']; }
              elseif (isset($this->seg_)) { $this->nm_limpa_alfa($this->seg_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ter_'])) { $this->ter_ = $NM_val_form['ter_']; }
              elseif (isset($this->ter_)) { $this->nm_limpa_alfa($this->ter_); }
              if     (isset($NM_val_form) && isset($NM_val_form['qua_'])) { $this->qua_ = $NM_val_form['qua_']; }
              elseif (isset($this->qua_)) { $this->nm_limpa_alfa($this->qua_); }
              if     (isset($NM_val_form) && isset($NM_val_form['qui_'])) { $this->qui_ = $NM_val_form['qui_']; }
              elseif (isset($this->qui_)) { $this->nm_limpa_alfa($this->qui_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sex_'])) { $this->sex_ = $NM_val_form['sex_']; }
              elseif (isset($this->sex_)) { $this->nm_limpa_alfa($this->sex_); }
              if     (isset($NM_val_form) && isset($NM_val_form['certificado_'])) { $this->certificado_ = $NM_val_form['certificado_']; }
              elseif (isset($this->certificado_)) { $this->nm_limpa_alfa($this->certificado_); }
              if     (isset($NM_val_form) && isset($NM_val_form['emailnfe_'])) { $this->emailnfe_ = $NM_val_form['emailnfe_']; }
              elseif (isset($this->emailnfe_)) { $this->nm_limpa_alfa($this->emailnfe_); }
              if     (isset($NM_val_form) && isset($NM_val_form['site_'])) { $this->site_ = $NM_val_form['site_']; }
              elseif (isset($this->site_)) { $this->nm_limpa_alfa($this->site_); }
              if     (isset($NM_val_form) && isset($NM_val_form['financeiro_'])) { $this->financeiro_ = $NM_val_form['financeiro_']; }
              elseif (isset($this->financeiro_)) { $this->nm_limpa_alfa($this->financeiro_); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_'])) { $this->numero_ = $NM_val_form['numero_']; }
              elseif (isset($this->numero_)) { $this->nm_limpa_alfa($this->numero_); }
              if     (isset($NM_val_form) && isset($NM_val_form['complemento_'])) { $this->complemento_ = $NM_val_form['complemento_']; }
              elseif (isset($this->complemento_)) { $this->nm_limpa_alfa($this->complemento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['razaosocialentrega_'])) { $this->razaosocialentrega_ = $NM_val_form['razaosocialentrega_']; }
              elseif (isset($this->razaosocialentrega_)) { $this->nm_limpa_alfa($this->razaosocialentrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['entrega_'])) { $this->entrega_ = $NM_val_form['entrega_']; }
              elseif (isset($this->entrega_)) { $this->nm_limpa_alfa($this->entrega_); }
              if     (isset($NM_val_form) && isset($NM_val_form['contatotecnico_'])) { $this->contatotecnico_ = $NM_val_form['contatotecnico_']; }
              elseif (isset($this->contatotecnico_)) { $this->nm_limpa_alfa($this->contatotecnico_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('cd_cliente_', 'razaosocial_', 'nomefantasia_', 'cgc_', 'inscricao_', 'endereco_', 'cidade_', 'estado_', 'bairro_', 'cep_', 'email_', 'fone_', 'fone1_', 'fax_', 'contato_', 'enderecocobranca_', 'cidadecobranca_', 'bairrocobranca_', 'estadocobranca_', 'cepcobranca_', 'fonecobranca_', 'faxcobranca_', 'contatocobranca_', 'cgcentrega_', 'inscricaoentrega_', 'enderecoentrega_', 'cidadeentrega_', 'bairroentrega_', 'estadoentrega_', 'cepentrega_', 'foneentrega_', 'contatoentrega_', 'contatoexpedicao_', 'foneexpedicao_', 'datacadastro_', 'obs_', 'tipo_', 'consumidor_', 'licensa_', 'venctolicensa_', 'licensa1_', 'venctolicensa1_', 'qtdeliberada_', 'licensa2_', 'venctolicensa2_', 'icms_', 'suframa_', 'limitecredito_', 'vendedor_', 'restricao_', 'comissao_', 'transportadora_', 'coleta_', 'segmento_', 'dataalteracao_', 'usuario_', 'requisitos_', 'banco_', 'emailcobranca_', 'emailtecnico_', 'midia_', 'seg_', 'ter_', 'qua_', 'qui_', 'sex_', 'certificado_', 'emailnfe_', 'fundacao_', 'site_', 'financeiro_', 'numero_', 'complemento_', 'razaosocialentrega_', 'entrega_', 'contatotecnico_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['cd_cliente_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['razaosocial_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['nomefantasia_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cgc_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['inscricao_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['endereco_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cidade_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['estado_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['bairro_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cep_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['email_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fone_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fone1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fax_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['contato_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['enderecocobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cidadecobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['bairrocobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['estadocobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cepcobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fonecobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['faxcobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['contatocobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cgcentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['inscricaoentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['enderecoentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cidadeentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['bairroentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['estadoentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cepentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['foneentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['contatoentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['contatoexpedicao_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['foneexpedicao_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['datacadastro_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['obs_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['consumidor_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['licensa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['venctolicensa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['licensa1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['venctolicensa1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['qtdeliberada_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['licensa2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['venctolicensa2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['icms_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['suframa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['limitecredito_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['vendedor_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['restricao_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['comissao_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['transportadora_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['coleta_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['segmento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dataalteracao_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['requisitos_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['banco_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['emailcobranca_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['emailtecnico_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['midia_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['seg_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ter_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['qua_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['qui_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sex_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['certificado_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['emailnfe_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fundacao_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['site_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['financeiro_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['numero_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['complemento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['razaosocialentrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['entrega_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['contatotecnico_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "Cd_cliente, ";
          } 
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_pkey']; 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->razaosocial_ != "")
                  { 
                       $compl_insert     .= ", Razaosocial";
                       $compl_insert_val .= ", '$this->razaosocial_'";
                  } 
                  if ($this->nomefantasia_ != "")
                  { 
                       $compl_insert     .= ", Nomefantasia";
                       $compl_insert_val .= ", '$this->nomefantasia_'";
                  } 
                  if ($this->cgc_ != "")
                  { 
                       $compl_insert     .= ", Cgc";
                       $compl_insert_val .= ", '$this->cgc_'";
                  } 
                  if ($this->inscricao_ != "")
                  { 
                       $compl_insert     .= ", Inscricao";
                       $compl_insert_val .= ", '$this->inscricao_'";
                  } 
                  if ($this->endereco_ != "")
                  { 
                       $compl_insert     .= ", Endereco";
                       $compl_insert_val .= ", '$this->endereco_'";
                  } 
                  if ($this->cidade_ != "")
                  { 
                       $compl_insert     .= ", Cidade";
                       $compl_insert_val .= ", '$this->cidade_'";
                  } 
                  if ($this->estado_ != "")
                  { 
                       $compl_insert     .= ", Estado";
                       $compl_insert_val .= ", '$this->estado_'";
                  } 
                  if ($this->bairro_ != "")
                  { 
                       $compl_insert     .= ", Bairro";
                       $compl_insert_val .= ", '$this->bairro_'";
                  } 
                  if ($this->cep_ != "")
                  { 
                       $compl_insert     .= ", Cep";
                       $compl_insert_val .= ", '$this->cep_'";
                  } 
                  if ($this->email_ != "")
                  { 
                       $compl_insert     .= ", Email";
                       $compl_insert_val .= ", '$this->email_'";
                  } 
                  if ($this->fone_ != "")
                  { 
                       $compl_insert     .= ", Fone";
                       $compl_insert_val .= ", '$this->fone_'";
                  } 
                  if ($this->fone1_ != "")
                  { 
                       $compl_insert     .= ", Fone1";
                       $compl_insert_val .= ", '$this->fone1_'";
                  } 
                  if ($this->fax_ != "")
                  { 
                       $compl_insert     .= ", Fax";
                       $compl_insert_val .= ", '$this->fax_'";
                  } 
                  if ($this->contato_ != "")
                  { 
                       $compl_insert     .= ", Contato";
                       $compl_insert_val .= ", '$this->contato_'";
                  } 
                  if ($this->enderecocobranca_ != "")
                  { 
                       $compl_insert     .= ", Enderecocobranca";
                       $compl_insert_val .= ", '$this->enderecocobranca_'";
                  } 
                  if ($this->cidadecobranca_ != "")
                  { 
                       $compl_insert     .= ", Cidadecobranca";
                       $compl_insert_val .= ", '$this->cidadecobranca_'";
                  } 
                  if ($this->bairrocobranca_ != "")
                  { 
                       $compl_insert     .= ", Bairrocobranca";
                       $compl_insert_val .= ", '$this->bairrocobranca_'";
                  } 
                  if ($this->estadocobranca_ != "")
                  { 
                       $compl_insert     .= ", Estadocobranca";
                       $compl_insert_val .= ", '$this->estadocobranca_'";
                  } 
                  if ($this->cepcobranca_ != "")
                  { 
                       $compl_insert     .= ", Cepcobranca";
                       $compl_insert_val .= ", '$this->cepcobranca_'";
                  } 
                  if ($this->fonecobranca_ != "")
                  { 
                       $compl_insert     .= ", Fonecobranca";
                       $compl_insert_val .= ", '$this->fonecobranca_'";
                  } 
                  if ($this->faxcobranca_ != "")
                  { 
                       $compl_insert     .= ", Faxcobranca";
                       $compl_insert_val .= ", '$this->faxcobranca_'";
                  } 
                  if ($this->contatocobranca_ != "")
                  { 
                       $compl_insert     .= ", Contatocobranca";
                       $compl_insert_val .= ", '$this->contatocobranca_'";
                  } 
                  if ($this->cgcentrega_ != "")
                  { 
                       $compl_insert     .= ", Cgcentrega";
                       $compl_insert_val .= ", '$this->cgcentrega_'";
                  } 
                  if ($this->inscricaoentrega_ != "")
                  { 
                       $compl_insert     .= ", Inscricaoentrega";
                       $compl_insert_val .= ", '$this->inscricaoentrega_'";
                  } 
                  if ($this->enderecoentrega_ != "")
                  { 
                       $compl_insert     .= ", Enderecoentrega";
                       $compl_insert_val .= ", '$this->enderecoentrega_'";
                  } 
                  if ($this->cidadeentrega_ != "")
                  { 
                       $compl_insert     .= ", Cidadeentrega";
                       $compl_insert_val .= ", '$this->cidadeentrega_'";
                  } 
                  if ($this->bairroentrega_ != "")
                  { 
                       $compl_insert     .= ", Bairroentrega";
                       $compl_insert_val .= ", '$this->bairroentrega_'";
                  } 
                  if ($this->estadoentrega_ != "")
                  { 
                       $compl_insert     .= ", Estadoentrega";
                       $compl_insert_val .= ", '$this->estadoentrega_'";
                  } 
                  if ($this->cepentrega_ != "")
                  { 
                       $compl_insert     .= ", Cepentrega";
                       $compl_insert_val .= ", '$this->cepentrega_'";
                  } 
                  if ($this->foneentrega_ != "")
                  { 
                       $compl_insert     .= ", Foneentrega";
                       $compl_insert_val .= ", '$this->foneentrega_'";
                  } 
                  if ($this->contatoentrega_ != "")
                  { 
                       $compl_insert     .= ", Contatoentrega";
                       $compl_insert_val .= ", '$this->contatoentrega_'";
                  } 
                  if ($this->contatoexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Contatoexpedicao";
                       $compl_insert_val .= ", '$this->contatoexpedicao_'";
                  } 
                  if ($this->foneexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Foneexpedicao";
                       $compl_insert_val .= ", '$this->foneexpedicao_'";
                  } 
                  if ($this->datacadastro_ != "")
                  { 
                       $compl_insert     .= ", Datacadastro";
                       $compl_insert_val .= ", #$this->datacadastro_#";
                  } 
                  if ($this->obs_ != "")
                  { 
                       $compl_insert     .= ", Obs";
                       $compl_insert_val .= ", '$this->obs_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", Tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->consumidor_ != "")
                  { 
                       $compl_insert     .= ", Consumidor";
                       $compl_insert_val .= ", '$this->consumidor_'";
                  } 
                  if ($this->licensa_ != "")
                  { 
                       $compl_insert     .= ", Licensa";
                       $compl_insert_val .= ", '$this->licensa_'";
                  } 
                  if ($this->venctolicensa_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa";
                       $compl_insert_val .= ", #$this->venctolicensa_#";
                  } 
                  if ($this->licensa1_ != "")
                  { 
                       $compl_insert     .= ", Licensa1";
                       $compl_insert_val .= ", '$this->licensa1_'";
                  } 
                  if ($this->venctolicensa1_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa1";
                       $compl_insert_val .= ", #$this->venctolicensa1_#";
                  } 
                  if ($this->qtdeliberada_ != "")
                  { 
                       $compl_insert     .= ", Qtdeliberada";
                       $compl_insert_val .= ", $this->qtdeliberada_";
                  } 
                  if ($this->licensa2_ != "")
                  { 
                       $compl_insert     .= ", Licensa2";
                       $compl_insert_val .= ", '$this->licensa2_'";
                  } 
                  if ($this->venctolicensa2_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa2";
                       $compl_insert_val .= ", #$this->venctolicensa2_#";
                  } 
                  if ($this->icms_ != "")
                  { 
                       $compl_insert     .= ", Icms";
                       $compl_insert_val .= ", $this->icms_";
                  } 
                  if ($this->suframa_ != "")
                  { 
                       $compl_insert     .= ", Suframa";
                       $compl_insert_val .= ", '$this->suframa_'";
                  } 
                  if ($this->limitecredito_ != "")
                  { 
                       $compl_insert     .= ", Limitecredito";
                       $compl_insert_val .= ", $this->limitecredito_";
                  } 
                  if ($this->vendedor_ != "")
                  { 
                       $compl_insert     .= ", Vendedor";
                       $compl_insert_val .= ", '$this->vendedor_'";
                  } 
                  if ($this->restricao_ != "")
                  { 
                       $compl_insert     .= ", Restricao";
                       $compl_insert_val .= ", '$this->restricao_'";
                  } 
                  if ($this->comissao_ != "")
                  { 
                       $compl_insert     .= ", Comissao";
                       $compl_insert_val .= ", $this->comissao_";
                  } 
                  if ($this->transportadora_ != "")
                  { 
                       $compl_insert     .= ", Transportadora";
                       $compl_insert_val .= ", '$this->transportadora_'";
                  } 
                  if ($this->coleta_ != "")
                  { 
                       $compl_insert     .= ", Coleta";
                       $compl_insert_val .= ", '$this->coleta_'";
                  } 
                  if ($this->segmento_ != "")
                  { 
                       $compl_insert     .= ", Segmento";
                       $compl_insert_val .= ", $this->segmento_";
                  } 
                  if ($this->dataalteracao_ != "")
                  { 
                       $compl_insert     .= ", Dataalteracao";
                       $compl_insert_val .= ", #$this->dataalteracao_#";
                  } 
                  if ($this->usuario_ != "")
                  { 
                       $compl_insert     .= ", Usuario";
                       $compl_insert_val .= ", '$this->usuario_'";
                  } 
                  if ($this->requisitos_ != "")
                  { 
                       $compl_insert     .= ", REQUISITOS";
                       $compl_insert_val .= ", '$this->requisitos_'";
                  } 
                  if ($this->banco_ != "")
                  { 
                       $compl_insert     .= ", Banco";
                       $compl_insert_val .= ", '$this->banco_'";
                  } 
                  if ($this->emailcobranca_ != "")
                  { 
                       $compl_insert     .= ", Emailcobranca";
                       $compl_insert_val .= ", '$this->emailcobranca_'";
                  } 
                  if ($this->emailtecnico_ != "")
                  { 
                       $compl_insert     .= ", Emailtecnico";
                       $compl_insert_val .= ", '$this->emailtecnico_'";
                  } 
                  if ($this->midia_ != "")
                  { 
                       $compl_insert     .= ", Midia";
                       $compl_insert_val .= ", '$this->midia_'";
                  } 
                  if ($this->seg_ != "")
                  { 
                       $compl_insert     .= ", Seg";
                       $compl_insert_val .= ", '$this->seg_'";
                  } 
                  if ($this->ter_ != "")
                  { 
                       $compl_insert     .= ", Ter";
                       $compl_insert_val .= ", '$this->ter_'";
                  } 
                  if ($this->qua_ != "")
                  { 
                       $compl_insert     .= ", Qua";
                       $compl_insert_val .= ", '$this->qua_'";
                  } 
                  if ($this->qui_ != "")
                  { 
                       $compl_insert     .= ", Qui";
                       $compl_insert_val .= ", '$this->qui_'";
                  } 
                  if ($this->sex_ != "")
                  { 
                       $compl_insert     .= ", Sex";
                       $compl_insert_val .= ", '$this->sex_'";
                  } 
                  if ($this->certificado_ != "")
                  { 
                       $compl_insert     .= ", Certificado";
                       $compl_insert_val .= ", '$this->certificado_'";
                  } 
                  if ($this->emailnfe_ != "")
                  { 
                       $compl_insert     .= ", Emailnfe";
                       $compl_insert_val .= ", '$this->emailnfe_'";
                  } 
                  if ($this->fundacao_ != "")
                  { 
                       $compl_insert     .= ", Fundacao";
                       $compl_insert_val .= ", #$this->fundacao_#";
                  } 
                  if ($this->site_ != "")
                  { 
                       $compl_insert     .= ", Site";
                       $compl_insert_val .= ", '$this->site_'";
                  } 
                  if ($this->financeiro_ != "")
                  { 
                       $compl_insert     .= ", Financeiro";
                       $compl_insert_val .= ", '$this->financeiro_'";
                  } 
                  if ($this->numero_ != "")
                  { 
                       $compl_insert     .= ", Numero";
                       $compl_insert_val .= ", '$this->numero_'";
                  } 
                  if ($this->complemento_ != "")
                  { 
                       $compl_insert     .= ", Complemento";
                       $compl_insert_val .= ", '$this->complemento_'";
                  } 
                  if ($this->razaosocialentrega_ != "")
                  { 
                       $compl_insert     .= ", Razaosocialentrega";
                       $compl_insert_val .= ", '$this->razaosocialentrega_'";
                  } 
                  if ($this->entrega_ != "")
                  { 
                       $compl_insert     .= ", Entrega";
                       $compl_insert_val .= ", '$this->entrega_'";
                  } 
                  if ($this->contatotecnico_ != "")
                  { 
                       $compl_insert     .= ", Contatotecnico";
                       $compl_insert_val .= ", '$this->contatotecnico_'";
                  } 
                  if ($this->logistica_ != "")
                  { 
                       $compl_insert     .= ", Logistica";
                       $compl_insert_val .= ", '$this->logistica_'";
                  } 
                  if ($this->pimportado_ != "")
                  { 
                       $compl_insert     .= ", Pimportado";
                       $compl_insert_val .= ", '$this->pimportado_'";
                  } 
                  if ($this->vendedor01_ != "")
                  { 
                       $compl_insert     .= ", Vendedor01";
                       $compl_insert_val .= ", '$this->vendedor01_'";
                  } 
                  if (!empty($compl_insert))
                  { 
                      $compl_insert     = substr($compl_insert, 1);
                      $compl_insert_val = substr($compl_insert_val, 1);
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " ( $compl_insert) VALUES ( $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->razaosocial_ != "")
                  { 
                       $compl_insert     .= ", Razaosocial";
                       $compl_insert_val .= ", '$this->razaosocial_'";
                  } 
                  if ($this->nomefantasia_ != "")
                  { 
                       $compl_insert     .= ", Nomefantasia";
                       $compl_insert_val .= ", '$this->nomefantasia_'";
                  } 
                  if ($this->cgc_ != "")
                  { 
                       $compl_insert     .= ", Cgc";
                       $compl_insert_val .= ", '$this->cgc_'";
                  } 
                  if ($this->inscricao_ != "")
                  { 
                       $compl_insert     .= ", Inscricao";
                       $compl_insert_val .= ", '$this->inscricao_'";
                  } 
                  if ($this->endereco_ != "")
                  { 
                       $compl_insert     .= ", Endereco";
                       $compl_insert_val .= ", '$this->endereco_'";
                  } 
                  if ($this->cidade_ != "")
                  { 
                       $compl_insert     .= ", Cidade";
                       $compl_insert_val .= ", '$this->cidade_'";
                  } 
                  if ($this->estado_ != "")
                  { 
                       $compl_insert     .= ", Estado";
                       $compl_insert_val .= ", '$this->estado_'";
                  } 
                  if ($this->bairro_ != "")
                  { 
                       $compl_insert     .= ", Bairro";
                       $compl_insert_val .= ", '$this->bairro_'";
                  } 
                  if ($this->cep_ != "")
                  { 
                       $compl_insert     .= ", Cep";
                       $compl_insert_val .= ", '$this->cep_'";
                  } 
                  if ($this->email_ != "")
                  { 
                       $compl_insert     .= ", Email";
                       $compl_insert_val .= ", '$this->email_'";
                  } 
                  if ($this->fone_ != "")
                  { 
                       $compl_insert     .= ", Fone";
                       $compl_insert_val .= ", '$this->fone_'";
                  } 
                  if ($this->fone1_ != "")
                  { 
                       $compl_insert     .= ", Fone1";
                       $compl_insert_val .= ", '$this->fone1_'";
                  } 
                  if ($this->fax_ != "")
                  { 
                       $compl_insert     .= ", Fax";
                       $compl_insert_val .= ", '$this->fax_'";
                  } 
                  if ($this->contato_ != "")
                  { 
                       $compl_insert     .= ", Contato";
                       $compl_insert_val .= ", '$this->contato_'";
                  } 
                  if ($this->enderecocobranca_ != "")
                  { 
                       $compl_insert     .= ", Enderecocobranca";
                       $compl_insert_val .= ", '$this->enderecocobranca_'";
                  } 
                  if ($this->cidadecobranca_ != "")
                  { 
                       $compl_insert     .= ", Cidadecobranca";
                       $compl_insert_val .= ", '$this->cidadecobranca_'";
                  } 
                  if ($this->bairrocobranca_ != "")
                  { 
                       $compl_insert     .= ", Bairrocobranca";
                       $compl_insert_val .= ", '$this->bairrocobranca_'";
                  } 
                  if ($this->estadocobranca_ != "")
                  { 
                       $compl_insert     .= ", Estadocobranca";
                       $compl_insert_val .= ", '$this->estadocobranca_'";
                  } 
                  if ($this->cepcobranca_ != "")
                  { 
                       $compl_insert     .= ", Cepcobranca";
                       $compl_insert_val .= ", '$this->cepcobranca_'";
                  } 
                  if ($this->fonecobranca_ != "")
                  { 
                       $compl_insert     .= ", Fonecobranca";
                       $compl_insert_val .= ", '$this->fonecobranca_'";
                  } 
                  if ($this->faxcobranca_ != "")
                  { 
                       $compl_insert     .= ", Faxcobranca";
                       $compl_insert_val .= ", '$this->faxcobranca_'";
                  } 
                  if ($this->contatocobranca_ != "")
                  { 
                       $compl_insert     .= ", Contatocobranca";
                       $compl_insert_val .= ", '$this->contatocobranca_'";
                  } 
                  if ($this->cgcentrega_ != "")
                  { 
                       $compl_insert     .= ", Cgcentrega";
                       $compl_insert_val .= ", '$this->cgcentrega_'";
                  } 
                  if ($this->inscricaoentrega_ != "")
                  { 
                       $compl_insert     .= ", Inscricaoentrega";
                       $compl_insert_val .= ", '$this->inscricaoentrega_'";
                  } 
                  if ($this->enderecoentrega_ != "")
                  { 
                       $compl_insert     .= ", Enderecoentrega";
                       $compl_insert_val .= ", '$this->enderecoentrega_'";
                  } 
                  if ($this->cidadeentrega_ != "")
                  { 
                       $compl_insert     .= ", Cidadeentrega";
                       $compl_insert_val .= ", '$this->cidadeentrega_'";
                  } 
                  if ($this->bairroentrega_ != "")
                  { 
                       $compl_insert     .= ", Bairroentrega";
                       $compl_insert_val .= ", '$this->bairroentrega_'";
                  } 
                  if ($this->estadoentrega_ != "")
                  { 
                       $compl_insert     .= ", Estadoentrega";
                       $compl_insert_val .= ", '$this->estadoentrega_'";
                  } 
                  if ($this->cepentrega_ != "")
                  { 
                       $compl_insert     .= ", Cepentrega";
                       $compl_insert_val .= ", '$this->cepentrega_'";
                  } 
                  if ($this->foneentrega_ != "")
                  { 
                       $compl_insert     .= ", Foneentrega";
                       $compl_insert_val .= ", '$this->foneentrega_'";
                  } 
                  if ($this->contatoentrega_ != "")
                  { 
                       $compl_insert     .= ", Contatoentrega";
                       $compl_insert_val .= ", '$this->contatoentrega_'";
                  } 
                  if ($this->contatoexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Contatoexpedicao";
                       $compl_insert_val .= ", '$this->contatoexpedicao_'";
                  } 
                  if ($this->foneexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Foneexpedicao";
                       $compl_insert_val .= ", '$this->foneexpedicao_'";
                  } 
                  if ($this->datacadastro_ != "")
                  { 
                       $compl_insert     .= ", Datacadastro";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->obs_ != "")
                  { 
                       $compl_insert     .= ", Obs";
                       $compl_insert_val .= ", '$this->obs_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", Tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->consumidor_ != "")
                  { 
                       $compl_insert     .= ", Consumidor";
                       $compl_insert_val .= ", '$this->consumidor_'";
                  } 
                  if ($this->licensa_ != "")
                  { 
                       $compl_insert     .= ", Licensa";
                       $compl_insert_val .= ", '$this->licensa_'";
                  } 
                  if ($this->venctolicensa_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->licensa1_ != "")
                  { 
                       $compl_insert     .= ", Licensa1";
                       $compl_insert_val .= ", '$this->licensa1_'";
                  } 
                  if ($this->venctolicensa1_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa1";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->qtdeliberada_ != "")
                  { 
                       $compl_insert     .= ", Qtdeliberada";
                       $compl_insert_val .= ", $this->qtdeliberada_";
                  } 
                  if ($this->licensa2_ != "")
                  { 
                       $compl_insert     .= ", Licensa2";
                       $compl_insert_val .= ", '$this->licensa2_'";
                  } 
                  if ($this->venctolicensa2_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa2";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->icms_ != "")
                  { 
                       $compl_insert     .= ", Icms";
                       $compl_insert_val .= ", $this->icms_";
                  } 
                  if ($this->suframa_ != "")
                  { 
                       $compl_insert     .= ", Suframa";
                       $compl_insert_val .= ", '$this->suframa_'";
                  } 
                  if ($this->limitecredito_ != "")
                  { 
                       $compl_insert     .= ", Limitecredito";
                       $compl_insert_val .= ", $this->limitecredito_";
                  } 
                  if ($this->vendedor_ != "")
                  { 
                       $compl_insert     .= ", Vendedor";
                       $compl_insert_val .= ", '$this->vendedor_'";
                  } 
                  if ($this->restricao_ != "")
                  { 
                       $compl_insert     .= ", Restricao";
                       $compl_insert_val .= ", '$this->restricao_'";
                  } 
                  if ($this->comissao_ != "")
                  { 
                       $compl_insert     .= ", Comissao";
                       $compl_insert_val .= ", $this->comissao_";
                  } 
                  if ($this->transportadora_ != "")
                  { 
                       $compl_insert     .= ", Transportadora";
                       $compl_insert_val .= ", '$this->transportadora_'";
                  } 
                  if ($this->coleta_ != "")
                  { 
                       $compl_insert     .= ", Coleta";
                       $compl_insert_val .= ", '$this->coleta_'";
                  } 
                  if ($this->segmento_ != "")
                  { 
                       $compl_insert     .= ", Segmento";
                       $compl_insert_val .= ", $this->segmento_";
                  } 
                  if ($this->dataalteracao_ != "")
                  { 
                       $compl_insert     .= ", Dataalteracao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->usuario_ != "")
                  { 
                       $compl_insert     .= ", Usuario";
                       $compl_insert_val .= ", '$this->usuario_'";
                  } 
                  if ($this->requisitos_ != "")
                  { 
                       $compl_insert     .= ", REQUISITOS";
                       $compl_insert_val .= ", '$this->requisitos_'";
                  } 
                  if ($this->banco_ != "")
                  { 
                       $compl_insert     .= ", Banco";
                       $compl_insert_val .= ", '$this->banco_'";
                  } 
                  if ($this->emailcobranca_ != "")
                  { 
                       $compl_insert     .= ", Emailcobranca";
                       $compl_insert_val .= ", '$this->emailcobranca_'";
                  } 
                  if ($this->emailtecnico_ != "")
                  { 
                       $compl_insert     .= ", Emailtecnico";
                       $compl_insert_val .= ", '$this->emailtecnico_'";
                  } 
                  if ($this->midia_ != "")
                  { 
                       $compl_insert     .= ", Midia";
                       $compl_insert_val .= ", '$this->midia_'";
                  } 
                  if ($this->seg_ != "")
                  { 
                       $compl_insert     .= ", Seg";
                       $compl_insert_val .= ", '$this->seg_'";
                  } 
                  if ($this->ter_ != "")
                  { 
                       $compl_insert     .= ", Ter";
                       $compl_insert_val .= ", '$this->ter_'";
                  } 
                  if ($this->qua_ != "")
                  { 
                       $compl_insert     .= ", Qua";
                       $compl_insert_val .= ", '$this->qua_'";
                  } 
                  if ($this->qui_ != "")
                  { 
                       $compl_insert     .= ", Qui";
                       $compl_insert_val .= ", '$this->qui_'";
                  } 
                  if ($this->sex_ != "")
                  { 
                       $compl_insert     .= ", Sex";
                       $compl_insert_val .= ", '$this->sex_'";
                  } 
                  if ($this->certificado_ != "")
                  { 
                       $compl_insert     .= ", Certificado";
                       $compl_insert_val .= ", '$this->certificado_'";
                  } 
                  if ($this->emailnfe_ != "")
                  { 
                       $compl_insert     .= ", Emailnfe";
                       $compl_insert_val .= ", '$this->emailnfe_'";
                  } 
                  if ($this->fundacao_ != "")
                  { 
                       $compl_insert     .= ", Fundacao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->site_ != "")
                  { 
                       $compl_insert     .= ", Site";
                       $compl_insert_val .= ", '$this->site_'";
                  } 
                  if ($this->financeiro_ != "")
                  { 
                       $compl_insert     .= ", Financeiro";
                       $compl_insert_val .= ", '$this->financeiro_'";
                  } 
                  if ($this->numero_ != "")
                  { 
                       $compl_insert     .= ", Numero";
                       $compl_insert_val .= ", '$this->numero_'";
                  } 
                  if ($this->complemento_ != "")
                  { 
                       $compl_insert     .= ", Complemento";
                       $compl_insert_val .= ", '$this->complemento_'";
                  } 
                  if ($this->razaosocialentrega_ != "")
                  { 
                       $compl_insert     .= ", Razaosocialentrega";
                       $compl_insert_val .= ", '$this->razaosocialentrega_'";
                  } 
                  if ($this->entrega_ != "")
                  { 
                       $compl_insert     .= ", Entrega";
                       $compl_insert_val .= ", '$this->entrega_'";
                  } 
                  if ($this->contatotecnico_ != "")
                  { 
                       $compl_insert     .= ", Contatotecnico";
                       $compl_insert_val .= ", '$this->contatotecnico_'";
                  } 
                  if ($this->logistica_ != "")
                  { 
                       $compl_insert     .= ", Logistica";
                       $compl_insert_val .= ", '$this->logistica_'";
                  } 
                  if ($this->pimportado_ != "")
                  { 
                       $compl_insert     .= ", Pimportado";
                       $compl_insert_val .= ", '$this->pimportado_'";
                  } 
                  if ($this->vendedor01_ != "")
                  { 
                       $compl_insert     .= ", Vendedor01";
                       $compl_insert_val .= ", '$this->vendedor01_'";
                  } 
                  if (!empty($compl_insert))
                  { 
                      $compl_insert     = substr($compl_insert, 1);
                      $compl_insert_val = substr($compl_insert_val, 1);
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . " $compl_insert) VALUES (" . $NM_seq_auto . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->razaosocial_ != "")
                  { 
                       $compl_insert     .= ", Razaosocial";
                       $compl_insert_val .= ", '$this->razaosocial_'";
                  } 
                  if ($this->nomefantasia_ != "")
                  { 
                       $compl_insert     .= ", Nomefantasia";
                       $compl_insert_val .= ", '$this->nomefantasia_'";
                  } 
                  if ($this->cgc_ != "")
                  { 
                       $compl_insert     .= ", Cgc";
                       $compl_insert_val .= ", '$this->cgc_'";
                  } 
                  if ($this->inscricao_ != "")
                  { 
                       $compl_insert     .= ", Inscricao";
                       $compl_insert_val .= ", '$this->inscricao_'";
                  } 
                  if ($this->endereco_ != "")
                  { 
                       $compl_insert     .= ", Endereco";
                       $compl_insert_val .= ", '$this->endereco_'";
                  } 
                  if ($this->cidade_ != "")
                  { 
                       $compl_insert     .= ", Cidade";
                       $compl_insert_val .= ", '$this->cidade_'";
                  } 
                  if ($this->estado_ != "")
                  { 
                       $compl_insert     .= ", Estado";
                       $compl_insert_val .= ", '$this->estado_'";
                  } 
                  if ($this->bairro_ != "")
                  { 
                       $compl_insert     .= ", Bairro";
                       $compl_insert_val .= ", '$this->bairro_'";
                  } 
                  if ($this->cep_ != "")
                  { 
                       $compl_insert     .= ", Cep";
                       $compl_insert_val .= ", '$this->cep_'";
                  } 
                  if ($this->email_ != "")
                  { 
                       $compl_insert     .= ", Email";
                       $compl_insert_val .= ", '$this->email_'";
                  } 
                  if ($this->fone_ != "")
                  { 
                       $compl_insert     .= ", Fone";
                       $compl_insert_val .= ", '$this->fone_'";
                  } 
                  if ($this->fone1_ != "")
                  { 
                       $compl_insert     .= ", Fone1";
                       $compl_insert_val .= ", '$this->fone1_'";
                  } 
                  if ($this->fax_ != "")
                  { 
                       $compl_insert     .= ", Fax";
                       $compl_insert_val .= ", '$this->fax_'";
                  } 
                  if ($this->contato_ != "")
                  { 
                       $compl_insert     .= ", Contato";
                       $compl_insert_val .= ", '$this->contato_'";
                  } 
                  if ($this->enderecocobranca_ != "")
                  { 
                       $compl_insert     .= ", Enderecocobranca";
                       $compl_insert_val .= ", '$this->enderecocobranca_'";
                  } 
                  if ($this->cidadecobranca_ != "")
                  { 
                       $compl_insert     .= ", Cidadecobranca";
                       $compl_insert_val .= ", '$this->cidadecobranca_'";
                  } 
                  if ($this->bairrocobranca_ != "")
                  { 
                       $compl_insert     .= ", Bairrocobranca";
                       $compl_insert_val .= ", '$this->bairrocobranca_'";
                  } 
                  if ($this->estadocobranca_ != "")
                  { 
                       $compl_insert     .= ", Estadocobranca";
                       $compl_insert_val .= ", '$this->estadocobranca_'";
                  } 
                  if ($this->cepcobranca_ != "")
                  { 
                       $compl_insert     .= ", Cepcobranca";
                       $compl_insert_val .= ", '$this->cepcobranca_'";
                  } 
                  if ($this->fonecobranca_ != "")
                  { 
                       $compl_insert     .= ", Fonecobranca";
                       $compl_insert_val .= ", '$this->fonecobranca_'";
                  } 
                  if ($this->faxcobranca_ != "")
                  { 
                       $compl_insert     .= ", Faxcobranca";
                       $compl_insert_val .= ", '$this->faxcobranca_'";
                  } 
                  if ($this->contatocobranca_ != "")
                  { 
                       $compl_insert     .= ", Contatocobranca";
                       $compl_insert_val .= ", '$this->contatocobranca_'";
                  } 
                  if ($this->cgcentrega_ != "")
                  { 
                       $compl_insert     .= ", Cgcentrega";
                       $compl_insert_val .= ", '$this->cgcentrega_'";
                  } 
                  if ($this->inscricaoentrega_ != "")
                  { 
                       $compl_insert     .= ", Inscricaoentrega";
                       $compl_insert_val .= ", '$this->inscricaoentrega_'";
                  } 
                  if ($this->enderecoentrega_ != "")
                  { 
                       $compl_insert     .= ", Enderecoentrega";
                       $compl_insert_val .= ", '$this->enderecoentrega_'";
                  } 
                  if ($this->cidadeentrega_ != "")
                  { 
                       $compl_insert     .= ", Cidadeentrega";
                       $compl_insert_val .= ", '$this->cidadeentrega_'";
                  } 
                  if ($this->bairroentrega_ != "")
                  { 
                       $compl_insert     .= ", Bairroentrega";
                       $compl_insert_val .= ", '$this->bairroentrega_'";
                  } 
                  if ($this->estadoentrega_ != "")
                  { 
                       $compl_insert     .= ", Estadoentrega";
                       $compl_insert_val .= ", '$this->estadoentrega_'";
                  } 
                  if ($this->cepentrega_ != "")
                  { 
                       $compl_insert     .= ", Cepentrega";
                       $compl_insert_val .= ", '$this->cepentrega_'";
                  } 
                  if ($this->foneentrega_ != "")
                  { 
                       $compl_insert     .= ", Foneentrega";
                       $compl_insert_val .= ", '$this->foneentrega_'";
                  } 
                  if ($this->contatoentrega_ != "")
                  { 
                       $compl_insert     .= ", Contatoentrega";
                       $compl_insert_val .= ", '$this->contatoentrega_'";
                  } 
                  if ($this->contatoexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Contatoexpedicao";
                       $compl_insert_val .= ", '$this->contatoexpedicao_'";
                  } 
                  if ($this->foneexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Foneexpedicao";
                       $compl_insert_val .= ", '$this->foneexpedicao_'";
                  } 
                  if ($this->datacadastro_ != "")
                  { 
                       $compl_insert     .= ", Datacadastro";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->obs_ != "")
                  { 
                       $compl_insert     .= ", Obs";
                       $compl_insert_val .= ", '$this->obs_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", Tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->consumidor_ != "")
                  { 
                       $compl_insert     .= ", Consumidor";
                       $compl_insert_val .= ", '$this->consumidor_'";
                  } 
                  if ($this->licensa_ != "")
                  { 
                       $compl_insert     .= ", Licensa";
                       $compl_insert_val .= ", '$this->licensa_'";
                  } 
                  if ($this->venctolicensa_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->licensa1_ != "")
                  { 
                       $compl_insert     .= ", Licensa1";
                       $compl_insert_val .= ", '$this->licensa1_'";
                  } 
                  if ($this->venctolicensa1_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa1";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->qtdeliberada_ != "")
                  { 
                       $compl_insert     .= ", Qtdeliberada";
                       $compl_insert_val .= ", $this->qtdeliberada_";
                  } 
                  if ($this->licensa2_ != "")
                  { 
                       $compl_insert     .= ", Licensa2";
                       $compl_insert_val .= ", '$this->licensa2_'";
                  } 
                  if ($this->venctolicensa2_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa2";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->icms_ != "")
                  { 
                       $compl_insert     .= ", Icms";
                       $compl_insert_val .= ", $this->icms_";
                  } 
                  if ($this->suframa_ != "")
                  { 
                       $compl_insert     .= ", Suframa";
                       $compl_insert_val .= ", '$this->suframa_'";
                  } 
                  if ($this->limitecredito_ != "")
                  { 
                       $compl_insert     .= ", Limitecredito";
                       $compl_insert_val .= ", $this->limitecredito_";
                  } 
                  if ($this->vendedor_ != "")
                  { 
                       $compl_insert     .= ", Vendedor";
                       $compl_insert_val .= ", '$this->vendedor_'";
                  } 
                  if ($this->restricao_ != "")
                  { 
                       $compl_insert     .= ", Restricao";
                       $compl_insert_val .= ", '$this->restricao_'";
                  } 
                  if ($this->comissao_ != "")
                  { 
                       $compl_insert     .= ", Comissao";
                       $compl_insert_val .= ", $this->comissao_";
                  } 
                  if ($this->transportadora_ != "")
                  { 
                       $compl_insert     .= ", Transportadora";
                       $compl_insert_val .= ", '$this->transportadora_'";
                  } 
                  if ($this->coleta_ != "")
                  { 
                       $compl_insert     .= ", Coleta";
                       $compl_insert_val .= ", '$this->coleta_'";
                  } 
                  if ($this->segmento_ != "")
                  { 
                       $compl_insert     .= ", Segmento";
                       $compl_insert_val .= ", $this->segmento_";
                  } 
                  if ($this->dataalteracao_ != "")
                  { 
                       $compl_insert     .= ", Dataalteracao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->usuario_ != "")
                  { 
                       $compl_insert     .= ", Usuario";
                       $compl_insert_val .= ", '$this->usuario_'";
                  } 
                  if ($this->requisitos_ != "")
                  { 
                       $compl_insert     .= ", REQUISITOS";
                       $compl_insert_val .= ", '$this->requisitos_'";
                  } 
                  if ($this->banco_ != "")
                  { 
                       $compl_insert     .= ", Banco";
                       $compl_insert_val .= ", '$this->banco_'";
                  } 
                  if ($this->emailcobranca_ != "")
                  { 
                       $compl_insert     .= ", Emailcobranca";
                       $compl_insert_val .= ", '$this->emailcobranca_'";
                  } 
                  if ($this->emailtecnico_ != "")
                  { 
                       $compl_insert     .= ", Emailtecnico";
                       $compl_insert_val .= ", '$this->emailtecnico_'";
                  } 
                  if ($this->midia_ != "")
                  { 
                       $compl_insert     .= ", Midia";
                       $compl_insert_val .= ", '$this->midia_'";
                  } 
                  if ($this->seg_ != "")
                  { 
                       $compl_insert     .= ", Seg";
                       $compl_insert_val .= ", '$this->seg_'";
                  } 
                  if ($this->ter_ != "")
                  { 
                       $compl_insert     .= ", Ter";
                       $compl_insert_val .= ", '$this->ter_'";
                  } 
                  if ($this->qua_ != "")
                  { 
                       $compl_insert     .= ", Qua";
                       $compl_insert_val .= ", '$this->qua_'";
                  } 
                  if ($this->qui_ != "")
                  { 
                       $compl_insert     .= ", Qui";
                       $compl_insert_val .= ", '$this->qui_'";
                  } 
                  if ($this->sex_ != "")
                  { 
                       $compl_insert     .= ", Sex";
                       $compl_insert_val .= ", '$this->sex_'";
                  } 
                  if ($this->certificado_ != "")
                  { 
                       $compl_insert     .= ", Certificado";
                       $compl_insert_val .= ", '$this->certificado_'";
                  } 
                  if ($this->emailnfe_ != "")
                  { 
                       $compl_insert     .= ", Emailnfe";
                       $compl_insert_val .= ", '$this->emailnfe_'";
                  } 
                  if ($this->fundacao_ != "")
                  { 
                       $compl_insert     .= ", Fundacao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->site_ != "")
                  { 
                       $compl_insert     .= ", Site";
                       $compl_insert_val .= ", '$this->site_'";
                  } 
                  if ($this->financeiro_ != "")
                  { 
                       $compl_insert     .= ", Financeiro";
                       $compl_insert_val .= ", '$this->financeiro_'";
                  } 
                  if ($this->numero_ != "")
                  { 
                       $compl_insert     .= ", Numero";
                       $compl_insert_val .= ", '$this->numero_'";
                  } 
                  if ($this->complemento_ != "")
                  { 
                       $compl_insert     .= ", Complemento";
                       $compl_insert_val .= ", '$this->complemento_'";
                  } 
                  if ($this->razaosocialentrega_ != "")
                  { 
                       $compl_insert     .= ", Razaosocialentrega";
                       $compl_insert_val .= ", '$this->razaosocialentrega_'";
                  } 
                  if ($this->entrega_ != "")
                  { 
                       $compl_insert     .= ", Entrega";
                       $compl_insert_val .= ", '$this->entrega_'";
                  } 
                  if ($this->contatotecnico_ != "")
                  { 
                       $compl_insert     .= ", Contatotecnico";
                       $compl_insert_val .= ", '$this->contatotecnico_'";
                  } 
                  if ($this->logistica_ != "")
                  { 
                       $compl_insert     .= ", Logistica";
                       $compl_insert_val .= ", '$this->logistica_'";
                  } 
                  if ($this->pimportado_ != "")
                  { 
                       $compl_insert     .= ", Pimportado";
                       $compl_insert_val .= ", '$this->pimportado_'";
                  } 
                  if ($this->vendedor01_ != "")
                  { 
                       $compl_insert     .= ", Vendedor01";
                       $compl_insert_val .= ", '$this->vendedor01_'";
                  } 
                  if (!empty($compl_insert))
                  { 
                      $compl_insert     = substr($compl_insert, 1);
                      $compl_insert_val = substr($compl_insert_val, 1);
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . " $compl_insert) VALUES (" . $NM_seq_auto . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->razaosocial_ != "")
                  { 
                       $compl_insert     .= ", Razaosocial";
                       $compl_insert_val .= ", '$this->razaosocial_'";
                  } 
                  if ($this->nomefantasia_ != "")
                  { 
                       $compl_insert     .= ", Nomefantasia";
                       $compl_insert_val .= ", '$this->nomefantasia_'";
                  } 
                  if ($this->cgc_ != "")
                  { 
                       $compl_insert     .= ", Cgc";
                       $compl_insert_val .= ", '$this->cgc_'";
                  } 
                  if ($this->inscricao_ != "")
                  { 
                       $compl_insert     .= ", Inscricao";
                       $compl_insert_val .= ", '$this->inscricao_'";
                  } 
                  if ($this->endereco_ != "")
                  { 
                       $compl_insert     .= ", Endereco";
                       $compl_insert_val .= ", '$this->endereco_'";
                  } 
                  if ($this->cidade_ != "")
                  { 
                       $compl_insert     .= ", Cidade";
                       $compl_insert_val .= ", '$this->cidade_'";
                  } 
                  if ($this->estado_ != "")
                  { 
                       $compl_insert     .= ", Estado";
                       $compl_insert_val .= ", '$this->estado_'";
                  } 
                  if ($this->bairro_ != "")
                  { 
                       $compl_insert     .= ", Bairro";
                       $compl_insert_val .= ", '$this->bairro_'";
                  } 
                  if ($this->cep_ != "")
                  { 
                       $compl_insert     .= ", Cep";
                       $compl_insert_val .= ", '$this->cep_'";
                  } 
                  if ($this->email_ != "")
                  { 
                       $compl_insert     .= ", Email";
                       $compl_insert_val .= ", '$this->email_'";
                  } 
                  if ($this->fone_ != "")
                  { 
                       $compl_insert     .= ", Fone";
                       $compl_insert_val .= ", '$this->fone_'";
                  } 
                  if ($this->fone1_ != "")
                  { 
                       $compl_insert     .= ", Fone1";
                       $compl_insert_val .= ", '$this->fone1_'";
                  } 
                  if ($this->fax_ != "")
                  { 
                       $compl_insert     .= ", Fax";
                       $compl_insert_val .= ", '$this->fax_'";
                  } 
                  if ($this->contato_ != "")
                  { 
                       $compl_insert     .= ", Contato";
                       $compl_insert_val .= ", '$this->contato_'";
                  } 
                  if ($this->enderecocobranca_ != "")
                  { 
                       $compl_insert     .= ", Enderecocobranca";
                       $compl_insert_val .= ", '$this->enderecocobranca_'";
                  } 
                  if ($this->cidadecobranca_ != "")
                  { 
                       $compl_insert     .= ", Cidadecobranca";
                       $compl_insert_val .= ", '$this->cidadecobranca_'";
                  } 
                  if ($this->bairrocobranca_ != "")
                  { 
                       $compl_insert     .= ", Bairrocobranca";
                       $compl_insert_val .= ", '$this->bairrocobranca_'";
                  } 
                  if ($this->estadocobranca_ != "")
                  { 
                       $compl_insert     .= ", Estadocobranca";
                       $compl_insert_val .= ", '$this->estadocobranca_'";
                  } 
                  if ($this->cepcobranca_ != "")
                  { 
                       $compl_insert     .= ", Cepcobranca";
                       $compl_insert_val .= ", '$this->cepcobranca_'";
                  } 
                  if ($this->fonecobranca_ != "")
                  { 
                       $compl_insert     .= ", Fonecobranca";
                       $compl_insert_val .= ", '$this->fonecobranca_'";
                  } 
                  if ($this->faxcobranca_ != "")
                  { 
                       $compl_insert     .= ", Faxcobranca";
                       $compl_insert_val .= ", '$this->faxcobranca_'";
                  } 
                  if ($this->contatocobranca_ != "")
                  { 
                       $compl_insert     .= ", Contatocobranca";
                       $compl_insert_val .= ", '$this->contatocobranca_'";
                  } 
                  if ($this->cgcentrega_ != "")
                  { 
                       $compl_insert     .= ", Cgcentrega";
                       $compl_insert_val .= ", '$this->cgcentrega_'";
                  } 
                  if ($this->inscricaoentrega_ != "")
                  { 
                       $compl_insert     .= ", Inscricaoentrega";
                       $compl_insert_val .= ", '$this->inscricaoentrega_'";
                  } 
                  if ($this->enderecoentrega_ != "")
                  { 
                       $compl_insert     .= ", Enderecoentrega";
                       $compl_insert_val .= ", '$this->enderecoentrega_'";
                  } 
                  if ($this->cidadeentrega_ != "")
                  { 
                       $compl_insert     .= ", Cidadeentrega";
                       $compl_insert_val .= ", '$this->cidadeentrega_'";
                  } 
                  if ($this->bairroentrega_ != "")
                  { 
                       $compl_insert     .= ", Bairroentrega";
                       $compl_insert_val .= ", '$this->bairroentrega_'";
                  } 
                  if ($this->estadoentrega_ != "")
                  { 
                       $compl_insert     .= ", Estadoentrega";
                       $compl_insert_val .= ", '$this->estadoentrega_'";
                  } 
                  if ($this->cepentrega_ != "")
                  { 
                       $compl_insert     .= ", Cepentrega";
                       $compl_insert_val .= ", '$this->cepentrega_'";
                  } 
                  if ($this->foneentrega_ != "")
                  { 
                       $compl_insert     .= ", Foneentrega";
                       $compl_insert_val .= ", '$this->foneentrega_'";
                  } 
                  if ($this->contatoentrega_ != "")
                  { 
                       $compl_insert     .= ", Contatoentrega";
                       $compl_insert_val .= ", '$this->contatoentrega_'";
                  } 
                  if ($this->contatoexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Contatoexpedicao";
                       $compl_insert_val .= ", '$this->contatoexpedicao_'";
                  } 
                  if ($this->foneexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Foneexpedicao";
                       $compl_insert_val .= ", '$this->foneexpedicao_'";
                  } 
                  if ($this->datacadastro_ != "")
                  { 
                       $compl_insert     .= ", Datacadastro";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->obs_ != "")
                  { 
                       $compl_insert     .= ", Obs";
                       $compl_insert_val .= ", '$this->obs_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", Tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->consumidor_ != "")
                  { 
                       $compl_insert     .= ", Consumidor";
                       $compl_insert_val .= ", '$this->consumidor_'";
                  } 
                  if ($this->licensa_ != "")
                  { 
                       $compl_insert     .= ", Licensa";
                       $compl_insert_val .= ", '$this->licensa_'";
                  } 
                  if ($this->venctolicensa_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->licensa1_ != "")
                  { 
                       $compl_insert     .= ", Licensa1";
                       $compl_insert_val .= ", '$this->licensa1_'";
                  } 
                  if ($this->venctolicensa1_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa1";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->qtdeliberada_ != "")
                  { 
                       $compl_insert     .= ", Qtdeliberada";
                       $compl_insert_val .= ", $this->qtdeliberada_";
                  } 
                  if ($this->licensa2_ != "")
                  { 
                       $compl_insert     .= ", Licensa2";
                       $compl_insert_val .= ", '$this->licensa2_'";
                  } 
                  if ($this->venctolicensa2_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa2";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->icms_ != "")
                  { 
                       $compl_insert     .= ", Icms";
                       $compl_insert_val .= ", $this->icms_";
                  } 
                  if ($this->suframa_ != "")
                  { 
                       $compl_insert     .= ", Suframa";
                       $compl_insert_val .= ", '$this->suframa_'";
                  } 
                  if ($this->limitecredito_ != "")
                  { 
                       $compl_insert     .= ", Limitecredito";
                       $compl_insert_val .= ", $this->limitecredito_";
                  } 
                  if ($this->vendedor_ != "")
                  { 
                       $compl_insert     .= ", Vendedor";
                       $compl_insert_val .= ", '$this->vendedor_'";
                  } 
                  if ($this->restricao_ != "")
                  { 
                       $compl_insert     .= ", Restricao";
                       $compl_insert_val .= ", '$this->restricao_'";
                  } 
                  if ($this->comissao_ != "")
                  { 
                       $compl_insert     .= ", Comissao";
                       $compl_insert_val .= ", $this->comissao_";
                  } 
                  if ($this->transportadora_ != "")
                  { 
                       $compl_insert     .= ", Transportadora";
                       $compl_insert_val .= ", '$this->transportadora_'";
                  } 
                  if ($this->coleta_ != "")
                  { 
                       $compl_insert     .= ", Coleta";
                       $compl_insert_val .= ", '$this->coleta_'";
                  } 
                  if ($this->segmento_ != "")
                  { 
                       $compl_insert     .= ", Segmento";
                       $compl_insert_val .= ", $this->segmento_";
                  } 
                  if ($this->dataalteracao_ != "")
                  { 
                       $compl_insert     .= ", Dataalteracao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->usuario_ != "")
                  { 
                       $compl_insert     .= ", Usuario";
                       $compl_insert_val .= ", '$this->usuario_'";
                  } 
                  if ($this->requisitos_ != "")
                  { 
                       $compl_insert     .= ", REQUISITOS";
                       $compl_insert_val .= ", '$this->requisitos_'";
                  } 
                  if ($this->banco_ != "")
                  { 
                       $compl_insert     .= ", Banco";
                       $compl_insert_val .= ", '$this->banco_'";
                  } 
                  if ($this->emailcobranca_ != "")
                  { 
                       $compl_insert     .= ", Emailcobranca";
                       $compl_insert_val .= ", '$this->emailcobranca_'";
                  } 
                  if ($this->emailtecnico_ != "")
                  { 
                       $compl_insert     .= ", Emailtecnico";
                       $compl_insert_val .= ", '$this->emailtecnico_'";
                  } 
                  if ($this->midia_ != "")
                  { 
                       $compl_insert     .= ", Midia";
                       $compl_insert_val .= ", '$this->midia_'";
                  } 
                  if ($this->seg_ != "")
                  { 
                       $compl_insert     .= ", Seg";
                       $compl_insert_val .= ", '$this->seg_'";
                  } 
                  if ($this->ter_ != "")
                  { 
                       $compl_insert     .= ", Ter";
                       $compl_insert_val .= ", '$this->ter_'";
                  } 
                  if ($this->qua_ != "")
                  { 
                       $compl_insert     .= ", Qua";
                       $compl_insert_val .= ", '$this->qua_'";
                  } 
                  if ($this->qui_ != "")
                  { 
                       $compl_insert     .= ", Qui";
                       $compl_insert_val .= ", '$this->qui_'";
                  } 
                  if ($this->sex_ != "")
                  { 
                       $compl_insert     .= ", Sex";
                       $compl_insert_val .= ", '$this->sex_'";
                  } 
                  if ($this->certificado_ != "")
                  { 
                       $compl_insert     .= ", Certificado";
                       $compl_insert_val .= ", '$this->certificado_'";
                  } 
                  if ($this->emailnfe_ != "")
                  { 
                       $compl_insert     .= ", Emailnfe";
                       $compl_insert_val .= ", '$this->emailnfe_'";
                  } 
                  if ($this->fundacao_ != "")
                  { 
                       $compl_insert     .= ", Fundacao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->site_ != "")
                  { 
                       $compl_insert     .= ", Site";
                       $compl_insert_val .= ", '$this->site_'";
                  } 
                  if ($this->financeiro_ != "")
                  { 
                       $compl_insert     .= ", Financeiro";
                       $compl_insert_val .= ", '$this->financeiro_'";
                  } 
                  if ($this->numero_ != "")
                  { 
                       $compl_insert     .= ", Numero";
                       $compl_insert_val .= ", '$this->numero_'";
                  } 
                  if ($this->complemento_ != "")
                  { 
                       $compl_insert     .= ", Complemento";
                       $compl_insert_val .= ", '$this->complemento_'";
                  } 
                  if ($this->razaosocialentrega_ != "")
                  { 
                       $compl_insert     .= ", Razaosocialentrega";
                       $compl_insert_val .= ", '$this->razaosocialentrega_'";
                  } 
                  if ($this->entrega_ != "")
                  { 
                       $compl_insert     .= ", Entrega";
                       $compl_insert_val .= ", '$this->entrega_'";
                  } 
                  if ($this->contatotecnico_ != "")
                  { 
                       $compl_insert     .= ", Contatotecnico";
                       $compl_insert_val .= ", '$this->contatotecnico_'";
                  } 
                  if ($this->logistica_ != "")
                  { 
                       $compl_insert     .= ", Logistica";
                       $compl_insert_val .= ", '$this->logistica_'";
                  } 
                  if ($this->pimportado_ != "")
                  { 
                       $compl_insert     .= ", Pimportado";
                       $compl_insert_val .= ", '$this->pimportado_'";
                  } 
                  if ($this->vendedor01_ != "")
                  { 
                       $compl_insert     .= ", Vendedor01";
                       $compl_insert_val .= ", '$this->vendedor01_'";
                  } 
                  if (!empty($compl_insert))
                  { 
                      $compl_insert     = substr($compl_insert, 1);
                      $compl_insert_val = substr($compl_insert_val, 1);
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . " $compl_insert) VALUES (" . $NM_seq_auto . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->razaosocial_ != "")
                  { 
                       $compl_insert     .= ", Razaosocial";
                       $compl_insert_val .= ", '$this->razaosocial_'";
                  } 
                  if ($this->nomefantasia_ != "")
                  { 
                       $compl_insert     .= ", Nomefantasia";
                       $compl_insert_val .= ", '$this->nomefantasia_'";
                  } 
                  if ($this->cgc_ != "")
                  { 
                       $compl_insert     .= ", Cgc";
                       $compl_insert_val .= ", '$this->cgc_'";
                  } 
                  if ($this->inscricao_ != "")
                  { 
                       $compl_insert     .= ", Inscricao";
                       $compl_insert_val .= ", '$this->inscricao_'";
                  } 
                  if ($this->endereco_ != "")
                  { 
                       $compl_insert     .= ", Endereco";
                       $compl_insert_val .= ", '$this->endereco_'";
                  } 
                  if ($this->cidade_ != "")
                  { 
                       $compl_insert     .= ", Cidade";
                       $compl_insert_val .= ", '$this->cidade_'";
                  } 
                  if ($this->estado_ != "")
                  { 
                       $compl_insert     .= ", Estado";
                       $compl_insert_val .= ", '$this->estado_'";
                  } 
                  if ($this->bairro_ != "")
                  { 
                       $compl_insert     .= ", Bairro";
                       $compl_insert_val .= ", '$this->bairro_'";
                  } 
                  if ($this->cep_ != "")
                  { 
                       $compl_insert     .= ", Cep";
                       $compl_insert_val .= ", '$this->cep_'";
                  } 
                  if ($this->email_ != "")
                  { 
                       $compl_insert     .= ", Email";
                       $compl_insert_val .= ", '$this->email_'";
                  } 
                  if ($this->fone_ != "")
                  { 
                       $compl_insert     .= ", Fone";
                       $compl_insert_val .= ", '$this->fone_'";
                  } 
                  if ($this->fone1_ != "")
                  { 
                       $compl_insert     .= ", Fone1";
                       $compl_insert_val .= ", '$this->fone1_'";
                  } 
                  if ($this->fax_ != "")
                  { 
                       $compl_insert     .= ", Fax";
                       $compl_insert_val .= ", '$this->fax_'";
                  } 
                  if ($this->contato_ != "")
                  { 
                       $compl_insert     .= ", Contato";
                       $compl_insert_val .= ", '$this->contato_'";
                  } 
                  if ($this->enderecocobranca_ != "")
                  { 
                       $compl_insert     .= ", Enderecocobranca";
                       $compl_insert_val .= ", '$this->enderecocobranca_'";
                  } 
                  if ($this->cidadecobranca_ != "")
                  { 
                       $compl_insert     .= ", Cidadecobranca";
                       $compl_insert_val .= ", '$this->cidadecobranca_'";
                  } 
                  if ($this->bairrocobranca_ != "")
                  { 
                       $compl_insert     .= ", Bairrocobranca";
                       $compl_insert_val .= ", '$this->bairrocobranca_'";
                  } 
                  if ($this->estadocobranca_ != "")
                  { 
                       $compl_insert     .= ", Estadocobranca";
                       $compl_insert_val .= ", '$this->estadocobranca_'";
                  } 
                  if ($this->cepcobranca_ != "")
                  { 
                       $compl_insert     .= ", Cepcobranca";
                       $compl_insert_val .= ", '$this->cepcobranca_'";
                  } 
                  if ($this->fonecobranca_ != "")
                  { 
                       $compl_insert     .= ", Fonecobranca";
                       $compl_insert_val .= ", '$this->fonecobranca_'";
                  } 
                  if ($this->faxcobranca_ != "")
                  { 
                       $compl_insert     .= ", Faxcobranca";
                       $compl_insert_val .= ", '$this->faxcobranca_'";
                  } 
                  if ($this->contatocobranca_ != "")
                  { 
                       $compl_insert     .= ", Contatocobranca";
                       $compl_insert_val .= ", '$this->contatocobranca_'";
                  } 
                  if ($this->cgcentrega_ != "")
                  { 
                       $compl_insert     .= ", Cgcentrega";
                       $compl_insert_val .= ", '$this->cgcentrega_'";
                  } 
                  if ($this->inscricaoentrega_ != "")
                  { 
                       $compl_insert     .= ", Inscricaoentrega";
                       $compl_insert_val .= ", '$this->inscricaoentrega_'";
                  } 
                  if ($this->enderecoentrega_ != "")
                  { 
                       $compl_insert     .= ", Enderecoentrega";
                       $compl_insert_val .= ", '$this->enderecoentrega_'";
                  } 
                  if ($this->cidadeentrega_ != "")
                  { 
                       $compl_insert     .= ", Cidadeentrega";
                       $compl_insert_val .= ", '$this->cidadeentrega_'";
                  } 
                  if ($this->bairroentrega_ != "")
                  { 
                       $compl_insert     .= ", Bairroentrega";
                       $compl_insert_val .= ", '$this->bairroentrega_'";
                  } 
                  if ($this->estadoentrega_ != "")
                  { 
                       $compl_insert     .= ", Estadoentrega";
                       $compl_insert_val .= ", '$this->estadoentrega_'";
                  } 
                  if ($this->cepentrega_ != "")
                  { 
                       $compl_insert     .= ", Cepentrega";
                       $compl_insert_val .= ", '$this->cepentrega_'";
                  } 
                  if ($this->foneentrega_ != "")
                  { 
                       $compl_insert     .= ", Foneentrega";
                       $compl_insert_val .= ", '$this->foneentrega_'";
                  } 
                  if ($this->contatoentrega_ != "")
                  { 
                       $compl_insert     .= ", Contatoentrega";
                       $compl_insert_val .= ", '$this->contatoentrega_'";
                  } 
                  if ($this->contatoexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Contatoexpedicao";
                       $compl_insert_val .= ", '$this->contatoexpedicao_'";
                  } 
                  if ($this->foneexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Foneexpedicao";
                       $compl_insert_val .= ", '$this->foneexpedicao_'";
                  } 
                  if ($this->datacadastro_ != "")
                  { 
                       $compl_insert     .= ", Datacadastro";
                       $compl_insert_val .= ", EXTEND('$this->datacadastro_', YEAR TO FRACTION)";
                  } 
                  if ($this->obs_ != "")
                  { 
                       $compl_insert     .= ", Obs";
                       $compl_insert_val .= ", '$this->obs_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", Tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->consumidor_ != "")
                  { 
                       $compl_insert     .= ", Consumidor";
                       $compl_insert_val .= ", '$this->consumidor_'";
                  } 
                  if ($this->licensa_ != "")
                  { 
                       $compl_insert     .= ", Licensa";
                       $compl_insert_val .= ", '$this->licensa_'";
                  } 
                  if ($this->venctolicensa_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa";
                       $compl_insert_val .= ", EXTEND('$this->venctolicensa_', YEAR TO FRACTION)";
                  } 
                  if ($this->licensa1_ != "")
                  { 
                       $compl_insert     .= ", Licensa1";
                       $compl_insert_val .= ", '$this->licensa1_'";
                  } 
                  if ($this->venctolicensa1_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa1";
                       $compl_insert_val .= ", EXTEND('$this->venctolicensa1_', YEAR TO FRACTION)";
                  } 
                  if ($this->qtdeliberada_ != "")
                  { 
                       $compl_insert     .= ", Qtdeliberada";
                       $compl_insert_val .= ", $this->qtdeliberada_";
                  } 
                  if ($this->licensa2_ != "")
                  { 
                       $compl_insert     .= ", Licensa2";
                       $compl_insert_val .= ", '$this->licensa2_'";
                  } 
                  if ($this->venctolicensa2_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa2";
                       $compl_insert_val .= ", EXTEND('$this->venctolicensa2_', YEAR TO FRACTION)";
                  } 
                  if ($this->icms_ != "")
                  { 
                       $compl_insert     .= ", Icms";
                       $compl_insert_val .= ", $this->icms_";
                  } 
                  if ($this->suframa_ != "")
                  { 
                       $compl_insert     .= ", Suframa";
                       $compl_insert_val .= ", '$this->suframa_'";
                  } 
                  if ($this->limitecredito_ != "")
                  { 
                       $compl_insert     .= ", Limitecredito";
                       $compl_insert_val .= ", $this->limitecredito_";
                  } 
                  if ($this->vendedor_ != "")
                  { 
                       $compl_insert     .= ", Vendedor";
                       $compl_insert_val .= ", '$this->vendedor_'";
                  } 
                  if ($this->restricao_ != "")
                  { 
                       $compl_insert     .= ", Restricao";
                       $compl_insert_val .= ", '$this->restricao_'";
                  } 
                  if ($this->comissao_ != "")
                  { 
                       $compl_insert     .= ", Comissao";
                       $compl_insert_val .= ", $this->comissao_";
                  } 
                  if ($this->transportadora_ != "")
                  { 
                       $compl_insert     .= ", Transportadora";
                       $compl_insert_val .= ", '$this->transportadora_'";
                  } 
                  if ($this->coleta_ != "")
                  { 
                       $compl_insert     .= ", Coleta";
                       $compl_insert_val .= ", '$this->coleta_'";
                  } 
                  if ($this->segmento_ != "")
                  { 
                       $compl_insert     .= ", Segmento";
                       $compl_insert_val .= ", $this->segmento_";
                  } 
                  if ($this->dataalteracao_ != "")
                  { 
                       $compl_insert     .= ", Dataalteracao";
                       $compl_insert_val .= ", EXTEND('$this->dataalteracao_', YEAR TO FRACTION)";
                  } 
                  if ($this->usuario_ != "")
                  { 
                       $compl_insert     .= ", Usuario";
                       $compl_insert_val .= ", '$this->usuario_'";
                  } 
                  if ($this->requisitos_ != "")
                  { 
                       $compl_insert     .= ", REQUISITOS";
                       $compl_insert_val .= ", '$this->requisitos_'";
                  } 
                  if ($this->banco_ != "")
                  { 
                       $compl_insert     .= ", Banco";
                       $compl_insert_val .= ", '$this->banco_'";
                  } 
                  if ($this->emailcobranca_ != "")
                  { 
                       $compl_insert     .= ", Emailcobranca";
                       $compl_insert_val .= ", '$this->emailcobranca_'";
                  } 
                  if ($this->emailtecnico_ != "")
                  { 
                       $compl_insert     .= ", Emailtecnico";
                       $compl_insert_val .= ", '$this->emailtecnico_'";
                  } 
                  if ($this->midia_ != "")
                  { 
                       $compl_insert     .= ", Midia";
                       $compl_insert_val .= ", '$this->midia_'";
                  } 
                  if ($this->seg_ != "")
                  { 
                       $compl_insert     .= ", Seg";
                       $compl_insert_val .= ", '$this->seg_'";
                  } 
                  if ($this->ter_ != "")
                  { 
                       $compl_insert     .= ", Ter";
                       $compl_insert_val .= ", '$this->ter_'";
                  } 
                  if ($this->qua_ != "")
                  { 
                       $compl_insert     .= ", Qua";
                       $compl_insert_val .= ", '$this->qua_'";
                  } 
                  if ($this->qui_ != "")
                  { 
                       $compl_insert     .= ", Qui";
                       $compl_insert_val .= ", '$this->qui_'";
                  } 
                  if ($this->sex_ != "")
                  { 
                       $compl_insert     .= ", Sex";
                       $compl_insert_val .= ", '$this->sex_'";
                  } 
                  if ($this->certificado_ != "")
                  { 
                       $compl_insert     .= ", Certificado";
                       $compl_insert_val .= ", '$this->certificado_'";
                  } 
                  if ($this->emailnfe_ != "")
                  { 
                       $compl_insert     .= ", Emailnfe";
                       $compl_insert_val .= ", '$this->emailnfe_'";
                  } 
                  if ($this->fundacao_ != "")
                  { 
                       $compl_insert     .= ", Fundacao";
                       $compl_insert_val .= ", EXTEND('$this->fundacao_', YEAR TO FRACTION)";
                  } 
                  if ($this->site_ != "")
                  { 
                       $compl_insert     .= ", Site";
                       $compl_insert_val .= ", '$this->site_'";
                  } 
                  if ($this->financeiro_ != "")
                  { 
                       $compl_insert     .= ", Financeiro";
                       $compl_insert_val .= ", '$this->financeiro_'";
                  } 
                  if ($this->numero_ != "")
                  { 
                       $compl_insert     .= ", Numero";
                       $compl_insert_val .= ", '$this->numero_'";
                  } 
                  if ($this->complemento_ != "")
                  { 
                       $compl_insert     .= ", Complemento";
                       $compl_insert_val .= ", '$this->complemento_'";
                  } 
                  if ($this->razaosocialentrega_ != "")
                  { 
                       $compl_insert     .= ", Razaosocialentrega";
                       $compl_insert_val .= ", '$this->razaosocialentrega_'";
                  } 
                  if ($this->entrega_ != "")
                  { 
                       $compl_insert     .= ", Entrega";
                       $compl_insert_val .= ", '$this->entrega_'";
                  } 
                  if ($this->contatotecnico_ != "")
                  { 
                       $compl_insert     .= ", Contatotecnico";
                       $compl_insert_val .= ", '$this->contatotecnico_'";
                  } 
                  if ($this->logistica_ != "")
                  { 
                       $compl_insert     .= ", Logistica";
                       $compl_insert_val .= ", '$this->logistica_'";
                  } 
                  if ($this->pimportado_ != "")
                  { 
                       $compl_insert     .= ", Pimportado";
                       $compl_insert_val .= ", '$this->pimportado_'";
                  } 
                  if ($this->vendedor01_ != "")
                  { 
                       $compl_insert     .= ", Vendedor01";
                       $compl_insert_val .= ", '$this->vendedor01_'";
                  } 
                  if (!empty($compl_insert))
                  { 
                      $compl_insert     = substr($compl_insert, 1);
                      $compl_insert_val = substr($compl_insert_val, 1);
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . " $compl_insert) VALUES (" . $NM_seq_auto . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->razaosocial_ != "")
                  { 
                       $compl_insert     .= ", Razaosocial";
                       $compl_insert_val .= ", '$this->razaosocial_'";
                  } 
                  if ($this->nomefantasia_ != "")
                  { 
                       $compl_insert     .= ", Nomefantasia";
                       $compl_insert_val .= ", '$this->nomefantasia_'";
                  } 
                  if ($this->cgc_ != "")
                  { 
                       $compl_insert     .= ", Cgc";
                       $compl_insert_val .= ", '$this->cgc_'";
                  } 
                  if ($this->inscricao_ != "")
                  { 
                       $compl_insert     .= ", Inscricao";
                       $compl_insert_val .= ", '$this->inscricao_'";
                  } 
                  if ($this->endereco_ != "")
                  { 
                       $compl_insert     .= ", Endereco";
                       $compl_insert_val .= ", '$this->endereco_'";
                  } 
                  if ($this->cidade_ != "")
                  { 
                       $compl_insert     .= ", Cidade";
                       $compl_insert_val .= ", '$this->cidade_'";
                  } 
                  if ($this->estado_ != "")
                  { 
                       $compl_insert     .= ", Estado";
                       $compl_insert_val .= ", '$this->estado_'";
                  } 
                  if ($this->bairro_ != "")
                  { 
                       $compl_insert     .= ", Bairro";
                       $compl_insert_val .= ", '$this->bairro_'";
                  } 
                  if ($this->cep_ != "")
                  { 
                       $compl_insert     .= ", Cep";
                       $compl_insert_val .= ", '$this->cep_'";
                  } 
                  if ($this->email_ != "")
                  { 
                       $compl_insert     .= ", Email";
                       $compl_insert_val .= ", '$this->email_'";
                  } 
                  if ($this->fone_ != "")
                  { 
                       $compl_insert     .= ", Fone";
                       $compl_insert_val .= ", '$this->fone_'";
                  } 
                  if ($this->fone1_ != "")
                  { 
                       $compl_insert     .= ", Fone1";
                       $compl_insert_val .= ", '$this->fone1_'";
                  } 
                  if ($this->fax_ != "")
                  { 
                       $compl_insert     .= ", Fax";
                       $compl_insert_val .= ", '$this->fax_'";
                  } 
                  if ($this->contato_ != "")
                  { 
                       $compl_insert     .= ", Contato";
                       $compl_insert_val .= ", '$this->contato_'";
                  } 
                  if ($this->enderecocobranca_ != "")
                  { 
                       $compl_insert     .= ", Enderecocobranca";
                       $compl_insert_val .= ", '$this->enderecocobranca_'";
                  } 
                  if ($this->cidadecobranca_ != "")
                  { 
                       $compl_insert     .= ", Cidadecobranca";
                       $compl_insert_val .= ", '$this->cidadecobranca_'";
                  } 
                  if ($this->bairrocobranca_ != "")
                  { 
                       $compl_insert     .= ", Bairrocobranca";
                       $compl_insert_val .= ", '$this->bairrocobranca_'";
                  } 
                  if ($this->estadocobranca_ != "")
                  { 
                       $compl_insert     .= ", Estadocobranca";
                       $compl_insert_val .= ", '$this->estadocobranca_'";
                  } 
                  if ($this->cepcobranca_ != "")
                  { 
                       $compl_insert     .= ", Cepcobranca";
                       $compl_insert_val .= ", '$this->cepcobranca_'";
                  } 
                  if ($this->fonecobranca_ != "")
                  { 
                       $compl_insert     .= ", Fonecobranca";
                       $compl_insert_val .= ", '$this->fonecobranca_'";
                  } 
                  if ($this->faxcobranca_ != "")
                  { 
                       $compl_insert     .= ", Faxcobranca";
                       $compl_insert_val .= ", '$this->faxcobranca_'";
                  } 
                  if ($this->contatocobranca_ != "")
                  { 
                       $compl_insert     .= ", Contatocobranca";
                       $compl_insert_val .= ", '$this->contatocobranca_'";
                  } 
                  if ($this->cgcentrega_ != "")
                  { 
                       $compl_insert     .= ", Cgcentrega";
                       $compl_insert_val .= ", '$this->cgcentrega_'";
                  } 
                  if ($this->inscricaoentrega_ != "")
                  { 
                       $compl_insert     .= ", Inscricaoentrega";
                       $compl_insert_val .= ", '$this->inscricaoentrega_'";
                  } 
                  if ($this->enderecoentrega_ != "")
                  { 
                       $compl_insert     .= ", Enderecoentrega";
                       $compl_insert_val .= ", '$this->enderecoentrega_'";
                  } 
                  if ($this->cidadeentrega_ != "")
                  { 
                       $compl_insert     .= ", Cidadeentrega";
                       $compl_insert_val .= ", '$this->cidadeentrega_'";
                  } 
                  if ($this->bairroentrega_ != "")
                  { 
                       $compl_insert     .= ", Bairroentrega";
                       $compl_insert_val .= ", '$this->bairroentrega_'";
                  } 
                  if ($this->estadoentrega_ != "")
                  { 
                       $compl_insert     .= ", Estadoentrega";
                       $compl_insert_val .= ", '$this->estadoentrega_'";
                  } 
                  if ($this->cepentrega_ != "")
                  { 
                       $compl_insert     .= ", Cepentrega";
                       $compl_insert_val .= ", '$this->cepentrega_'";
                  } 
                  if ($this->foneentrega_ != "")
                  { 
                       $compl_insert     .= ", Foneentrega";
                       $compl_insert_val .= ", '$this->foneentrega_'";
                  } 
                  if ($this->contatoentrega_ != "")
                  { 
                       $compl_insert     .= ", Contatoentrega";
                       $compl_insert_val .= ", '$this->contatoentrega_'";
                  } 
                  if ($this->contatoexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Contatoexpedicao";
                       $compl_insert_val .= ", '$this->contatoexpedicao_'";
                  } 
                  if ($this->foneexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Foneexpedicao";
                       $compl_insert_val .= ", '$this->foneexpedicao_'";
                  } 
                  if ($this->datacadastro_ != "")
                  { 
                       $compl_insert     .= ", Datacadastro";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->obs_ != "")
                  { 
                       $compl_insert     .= ", Obs";
                       $compl_insert_val .= ", '$this->obs_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", Tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->consumidor_ != "")
                  { 
                       $compl_insert     .= ", Consumidor";
                       $compl_insert_val .= ", '$this->consumidor_'";
                  } 
                  if ($this->licensa_ != "")
                  { 
                       $compl_insert     .= ", Licensa";
                       $compl_insert_val .= ", '$this->licensa_'";
                  } 
                  if ($this->venctolicensa_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->licensa1_ != "")
                  { 
                       $compl_insert     .= ", Licensa1";
                       $compl_insert_val .= ", '$this->licensa1_'";
                  } 
                  if ($this->venctolicensa1_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa1";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->qtdeliberada_ != "")
                  { 
                       $compl_insert     .= ", Qtdeliberada";
                       $compl_insert_val .= ", $this->qtdeliberada_";
                  } 
                  if ($this->licensa2_ != "")
                  { 
                       $compl_insert     .= ", Licensa2";
                       $compl_insert_val .= ", '$this->licensa2_'";
                  } 
                  if ($this->venctolicensa2_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa2";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->icms_ != "")
                  { 
                       $compl_insert     .= ", Icms";
                       $compl_insert_val .= ", $this->icms_";
                  } 
                  if ($this->suframa_ != "")
                  { 
                       $compl_insert     .= ", Suframa";
                       $compl_insert_val .= ", '$this->suframa_'";
                  } 
                  if ($this->limitecredito_ != "")
                  { 
                       $compl_insert     .= ", Limitecredito";
                       $compl_insert_val .= ", $this->limitecredito_";
                  } 
                  if ($this->vendedor_ != "")
                  { 
                       $compl_insert     .= ", Vendedor";
                       $compl_insert_val .= ", '$this->vendedor_'";
                  } 
                  if ($this->restricao_ != "")
                  { 
                       $compl_insert     .= ", Restricao";
                       $compl_insert_val .= ", '$this->restricao_'";
                  } 
                  if ($this->comissao_ != "")
                  { 
                       $compl_insert     .= ", Comissao";
                       $compl_insert_val .= ", $this->comissao_";
                  } 
                  if ($this->transportadora_ != "")
                  { 
                       $compl_insert     .= ", Transportadora";
                       $compl_insert_val .= ", '$this->transportadora_'";
                  } 
                  if ($this->coleta_ != "")
                  { 
                       $compl_insert     .= ", Coleta";
                       $compl_insert_val .= ", '$this->coleta_'";
                  } 
                  if ($this->segmento_ != "")
                  { 
                       $compl_insert     .= ", Segmento";
                       $compl_insert_val .= ", $this->segmento_";
                  } 
                  if ($this->dataalteracao_ != "")
                  { 
                       $compl_insert     .= ", Dataalteracao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->usuario_ != "")
                  { 
                       $compl_insert     .= ", Usuario";
                       $compl_insert_val .= ", '$this->usuario_'";
                  } 
                  if ($this->requisitos_ != "")
                  { 
                       $compl_insert     .= ", REQUISITOS";
                       $compl_insert_val .= ", '$this->requisitos_'";
                  } 
                  if ($this->banco_ != "")
                  { 
                       $compl_insert     .= ", Banco";
                       $compl_insert_val .= ", '$this->banco_'";
                  } 
                  if ($this->emailcobranca_ != "")
                  { 
                       $compl_insert     .= ", Emailcobranca";
                       $compl_insert_val .= ", '$this->emailcobranca_'";
                  } 
                  if ($this->emailtecnico_ != "")
                  { 
                       $compl_insert     .= ", Emailtecnico";
                       $compl_insert_val .= ", '$this->emailtecnico_'";
                  } 
                  if ($this->midia_ != "")
                  { 
                       $compl_insert     .= ", Midia";
                       $compl_insert_val .= ", '$this->midia_'";
                  } 
                  if ($this->seg_ != "")
                  { 
                       $compl_insert     .= ", Seg";
                       $compl_insert_val .= ", '$this->seg_'";
                  } 
                  if ($this->ter_ != "")
                  { 
                       $compl_insert     .= ", Ter";
                       $compl_insert_val .= ", '$this->ter_'";
                  } 
                  if ($this->qua_ != "")
                  { 
                       $compl_insert     .= ", Qua";
                       $compl_insert_val .= ", '$this->qua_'";
                  } 
                  if ($this->qui_ != "")
                  { 
                       $compl_insert     .= ", Qui";
                       $compl_insert_val .= ", '$this->qui_'";
                  } 
                  if ($this->sex_ != "")
                  { 
                       $compl_insert     .= ", Sex";
                       $compl_insert_val .= ", '$this->sex_'";
                  } 
                  if ($this->certificado_ != "")
                  { 
                       $compl_insert     .= ", Certificado";
                       $compl_insert_val .= ", '$this->certificado_'";
                  } 
                  if ($this->emailnfe_ != "")
                  { 
                       $compl_insert     .= ", Emailnfe";
                       $compl_insert_val .= ", '$this->emailnfe_'";
                  } 
                  if ($this->fundacao_ != "")
                  { 
                       $compl_insert     .= ", Fundacao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->site_ != "")
                  { 
                       $compl_insert     .= ", Site";
                       $compl_insert_val .= ", '$this->site_'";
                  } 
                  if ($this->financeiro_ != "")
                  { 
                       $compl_insert     .= ", Financeiro";
                       $compl_insert_val .= ", '$this->financeiro_'";
                  } 
                  if ($this->numero_ != "")
                  { 
                       $compl_insert     .= ", Numero";
                       $compl_insert_val .= ", '$this->numero_'";
                  } 
                  if ($this->complemento_ != "")
                  { 
                       $compl_insert     .= ", Complemento";
                       $compl_insert_val .= ", '$this->complemento_'";
                  } 
                  if ($this->razaosocialentrega_ != "")
                  { 
                       $compl_insert     .= ", Razaosocialentrega";
                       $compl_insert_val .= ", '$this->razaosocialentrega_'";
                  } 
                  if ($this->entrega_ != "")
                  { 
                       $compl_insert     .= ", Entrega";
                       $compl_insert_val .= ", '$this->entrega_'";
                  } 
                  if ($this->contatotecnico_ != "")
                  { 
                       $compl_insert     .= ", Contatotecnico";
                       $compl_insert_val .= ", '$this->contatotecnico_'";
                  } 
                  if ($this->logistica_ != "")
                  { 
                       $compl_insert     .= ", Logistica";
                       $compl_insert_val .= ", '$this->logistica_'";
                  } 
                  if ($this->pimportado_ != "")
                  { 
                       $compl_insert     .= ", Pimportado";
                       $compl_insert_val .= ", '$this->pimportado_'";
                  } 
                  if ($this->vendedor01_ != "")
                  { 
                       $compl_insert     .= ", Vendedor01";
                       $compl_insert_val .= ", '$this->vendedor01_'";
                  } 
                  if (!empty($compl_insert))
                  { 
                      $compl_insert     = substr($compl_insert, 1);
                      $compl_insert_val = substr($compl_insert_val, 1);
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . " $compl_insert) VALUES (" . $NM_seq_auto . " $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->razaosocial_ != "")
                  { 
                       $compl_insert     .= ", Razaosocial";
                       $compl_insert_val .= ", '$this->razaosocial_'";
                  } 
                  if ($this->nomefantasia_ != "")
                  { 
                       $compl_insert     .= ", Nomefantasia";
                       $compl_insert_val .= ", '$this->nomefantasia_'";
                  } 
                  if ($this->cgc_ != "")
                  { 
                       $compl_insert     .= ", Cgc";
                       $compl_insert_val .= ", '$this->cgc_'";
                  } 
                  if ($this->inscricao_ != "")
                  { 
                       $compl_insert     .= ", Inscricao";
                       $compl_insert_val .= ", '$this->inscricao_'";
                  } 
                  if ($this->endereco_ != "")
                  { 
                       $compl_insert     .= ", Endereco";
                       $compl_insert_val .= ", '$this->endereco_'";
                  } 
                  if ($this->cidade_ != "")
                  { 
                       $compl_insert     .= ", Cidade";
                       $compl_insert_val .= ", '$this->cidade_'";
                  } 
                  if ($this->estado_ != "")
                  { 
                       $compl_insert     .= ", Estado";
                       $compl_insert_val .= ", '$this->estado_'";
                  } 
                  if ($this->bairro_ != "")
                  { 
                       $compl_insert     .= ", Bairro";
                       $compl_insert_val .= ", '$this->bairro_'";
                  } 
                  if ($this->cep_ != "")
                  { 
                       $compl_insert     .= ", Cep";
                       $compl_insert_val .= ", '$this->cep_'";
                  } 
                  if ($this->email_ != "")
                  { 
                       $compl_insert     .= ", Email";
                       $compl_insert_val .= ", '$this->email_'";
                  } 
                  if ($this->fone_ != "")
                  { 
                       $compl_insert     .= ", Fone";
                       $compl_insert_val .= ", '$this->fone_'";
                  } 
                  if ($this->fone1_ != "")
                  { 
                       $compl_insert     .= ", Fone1";
                       $compl_insert_val .= ", '$this->fone1_'";
                  } 
                  if ($this->fax_ != "")
                  { 
                       $compl_insert     .= ", Fax";
                       $compl_insert_val .= ", '$this->fax_'";
                  } 
                  if ($this->contato_ != "")
                  { 
                       $compl_insert     .= ", Contato";
                       $compl_insert_val .= ", '$this->contato_'";
                  } 
                  if ($this->enderecocobranca_ != "")
                  { 
                       $compl_insert     .= ", Enderecocobranca";
                       $compl_insert_val .= ", '$this->enderecocobranca_'";
                  } 
                  if ($this->cidadecobranca_ != "")
                  { 
                       $compl_insert     .= ", Cidadecobranca";
                       $compl_insert_val .= ", '$this->cidadecobranca_'";
                  } 
                  if ($this->bairrocobranca_ != "")
                  { 
                       $compl_insert     .= ", Bairrocobranca";
                       $compl_insert_val .= ", '$this->bairrocobranca_'";
                  } 
                  if ($this->estadocobranca_ != "")
                  { 
                       $compl_insert     .= ", Estadocobranca";
                       $compl_insert_val .= ", '$this->estadocobranca_'";
                  } 
                  if ($this->cepcobranca_ != "")
                  { 
                       $compl_insert     .= ", Cepcobranca";
                       $compl_insert_val .= ", '$this->cepcobranca_'";
                  } 
                  if ($this->fonecobranca_ != "")
                  { 
                       $compl_insert     .= ", Fonecobranca";
                       $compl_insert_val .= ", '$this->fonecobranca_'";
                  } 
                  if ($this->faxcobranca_ != "")
                  { 
                       $compl_insert     .= ", Faxcobranca";
                       $compl_insert_val .= ", '$this->faxcobranca_'";
                  } 
                  if ($this->contatocobranca_ != "")
                  { 
                       $compl_insert     .= ", Contatocobranca";
                       $compl_insert_val .= ", '$this->contatocobranca_'";
                  } 
                  if ($this->cgcentrega_ != "")
                  { 
                       $compl_insert     .= ", Cgcentrega";
                       $compl_insert_val .= ", '$this->cgcentrega_'";
                  } 
                  if ($this->inscricaoentrega_ != "")
                  { 
                       $compl_insert     .= ", Inscricaoentrega";
                       $compl_insert_val .= ", '$this->inscricaoentrega_'";
                  } 
                  if ($this->enderecoentrega_ != "")
                  { 
                       $compl_insert     .= ", Enderecoentrega";
                       $compl_insert_val .= ", '$this->enderecoentrega_'";
                  } 
                  if ($this->cidadeentrega_ != "")
                  { 
                       $compl_insert     .= ", Cidadeentrega";
                       $compl_insert_val .= ", '$this->cidadeentrega_'";
                  } 
                  if ($this->bairroentrega_ != "")
                  { 
                       $compl_insert     .= ", Bairroentrega";
                       $compl_insert_val .= ", '$this->bairroentrega_'";
                  } 
                  if ($this->estadoentrega_ != "")
                  { 
                       $compl_insert     .= ", Estadoentrega";
                       $compl_insert_val .= ", '$this->estadoentrega_'";
                  } 
                  if ($this->cepentrega_ != "")
                  { 
                       $compl_insert     .= ", Cepentrega";
                       $compl_insert_val .= ", '$this->cepentrega_'";
                  } 
                  if ($this->foneentrega_ != "")
                  { 
                       $compl_insert     .= ", Foneentrega";
                       $compl_insert_val .= ", '$this->foneentrega_'";
                  } 
                  if ($this->contatoentrega_ != "")
                  { 
                       $compl_insert     .= ", Contatoentrega";
                       $compl_insert_val .= ", '$this->contatoentrega_'";
                  } 
                  if ($this->contatoexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Contatoexpedicao";
                       $compl_insert_val .= ", '$this->contatoexpedicao_'";
                  } 
                  if ($this->foneexpedicao_ != "")
                  { 
                       $compl_insert     .= ", Foneexpedicao";
                       $compl_insert_val .= ", '$this->foneexpedicao_'";
                  } 
                  if ($this->datacadastro_ != "")
                  { 
                       $compl_insert     .= ", Datacadastro";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->datacadastro_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->obs_ != "")
                  { 
                       $compl_insert     .= ", Obs";
                       $compl_insert_val .= ", '$this->obs_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", Tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->consumidor_ != "")
                  { 
                       $compl_insert     .= ", Consumidor";
                       $compl_insert_val .= ", '$this->consumidor_'";
                  } 
                  if ($this->licensa_ != "")
                  { 
                       $compl_insert     .= ", Licensa";
                       $compl_insert_val .= ", '$this->licensa_'";
                  } 
                  if ($this->venctolicensa_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->licensa1_ != "")
                  { 
                       $compl_insert     .= ", Licensa1";
                       $compl_insert_val .= ", '$this->licensa1_'";
                  } 
                  if ($this->venctolicensa1_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa1";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa1_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->qtdeliberada_ != "")
                  { 
                       $compl_insert     .= ", Qtdeliberada";
                       $compl_insert_val .= ", $this->qtdeliberada_";
                  } 
                  if ($this->licensa2_ != "")
                  { 
                       $compl_insert     .= ", Licensa2";
                       $compl_insert_val .= ", '$this->licensa2_'";
                  } 
                  if ($this->venctolicensa2_ != "")
                  { 
                       $compl_insert     .= ", Venctolicensa2";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->venctolicensa2_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->icms_ != "")
                  { 
                       $compl_insert     .= ", Icms";
                       $compl_insert_val .= ", $this->icms_";
                  } 
                  if ($this->suframa_ != "")
                  { 
                       $compl_insert     .= ", Suframa";
                       $compl_insert_val .= ", '$this->suframa_'";
                  } 
                  if ($this->limitecredito_ != "")
                  { 
                       $compl_insert     .= ", Limitecredito";
                       $compl_insert_val .= ", $this->limitecredito_";
                  } 
                  if ($this->vendedor_ != "")
                  { 
                       $compl_insert     .= ", Vendedor";
                       $compl_insert_val .= ", '$this->vendedor_'";
                  } 
                  if ($this->restricao_ != "")
                  { 
                       $compl_insert     .= ", Restricao";
                       $compl_insert_val .= ", '$this->restricao_'";
                  } 
                  if ($this->comissao_ != "")
                  { 
                       $compl_insert     .= ", Comissao";
                       $compl_insert_val .= ", $this->comissao_";
                  } 
                  if ($this->transportadora_ != "")
                  { 
                       $compl_insert     .= ", Transportadora";
                       $compl_insert_val .= ", '$this->transportadora_'";
                  } 
                  if ($this->coleta_ != "")
                  { 
                       $compl_insert     .= ", Coleta";
                       $compl_insert_val .= ", '$this->coleta_'";
                  } 
                  if ($this->segmento_ != "")
                  { 
                       $compl_insert     .= ", Segmento";
                       $compl_insert_val .= ", $this->segmento_";
                  } 
                  if ($this->dataalteracao_ != "")
                  { 
                       $compl_insert     .= ", Dataalteracao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->dataalteracao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->usuario_ != "")
                  { 
                       $compl_insert     .= ", Usuario";
                       $compl_insert_val .= ", '$this->usuario_'";
                  } 
                  if ($this->requisitos_ != "")
                  { 
                       $compl_insert     .= ", REQUISITOS";
                       $compl_insert_val .= ", '$this->requisitos_'";
                  } 
                  if ($this->banco_ != "")
                  { 
                       $compl_insert     .= ", Banco";
                       $compl_insert_val .= ", '$this->banco_'";
                  } 
                  if ($this->emailcobranca_ != "")
                  { 
                       $compl_insert     .= ", Emailcobranca";
                       $compl_insert_val .= ", '$this->emailcobranca_'";
                  } 
                  if ($this->emailtecnico_ != "")
                  { 
                       $compl_insert     .= ", Emailtecnico";
                       $compl_insert_val .= ", '$this->emailtecnico_'";
                  } 
                  if ($this->midia_ != "")
                  { 
                       $compl_insert     .= ", Midia";
                       $compl_insert_val .= ", '$this->midia_'";
                  } 
                  if ($this->seg_ != "")
                  { 
                       $compl_insert     .= ", Seg";
                       $compl_insert_val .= ", '$this->seg_'";
                  } 
                  if ($this->ter_ != "")
                  { 
                       $compl_insert     .= ", Ter";
                       $compl_insert_val .= ", '$this->ter_'";
                  } 
                  if ($this->qua_ != "")
                  { 
                       $compl_insert     .= ", Qua";
                       $compl_insert_val .= ", '$this->qua_'";
                  } 
                  if ($this->qui_ != "")
                  { 
                       $compl_insert     .= ", Qui";
                       $compl_insert_val .= ", '$this->qui_'";
                  } 
                  if ($this->sex_ != "")
                  { 
                       $compl_insert     .= ", Sex";
                       $compl_insert_val .= ", '$this->sex_'";
                  } 
                  if ($this->certificado_ != "")
                  { 
                       $compl_insert     .= ", Certificado";
                       $compl_insert_val .= ", '$this->certificado_'";
                  } 
                  if ($this->emailnfe_ != "")
                  { 
                       $compl_insert     .= ", Emailnfe";
                       $compl_insert_val .= ", '$this->emailnfe_'";
                  } 
                  if ($this->fundacao_ != "")
                  { 
                       $compl_insert     .= ", Fundacao";
                       $compl_insert_val .= ", " . $this->Ini->date_delim . $this->fundacao_ . $this->Ini->date_delim1 . "";
                  } 
                  if ($this->site_ != "")
                  { 
                       $compl_insert     .= ", Site";
                       $compl_insert_val .= ", '$this->site_'";
                  } 
                  if ($this->financeiro_ != "")
                  { 
                       $compl_insert     .= ", Financeiro";
                       $compl_insert_val .= ", '$this->financeiro_'";
                  } 
                  if ($this->numero_ != "")
                  { 
                       $compl_insert     .= ", Numero";
                       $compl_insert_val .= ", '$this->numero_'";
                  } 
                  if ($this->complemento_ != "")
                  { 
                       $compl_insert     .= ", Complemento";
                       $compl_insert_val .= ", '$this->complemento_'";
                  } 
                  if ($this->razaosocialentrega_ != "")
                  { 
                       $compl_insert     .= ", Razaosocialentrega";
                       $compl_insert_val .= ", '$this->razaosocialentrega_'";
                  } 
                  if ($this->entrega_ != "")
                  { 
                       $compl_insert     .= ", Entrega";
                       $compl_insert_val .= ", '$this->entrega_'";
                  } 
                  if ($this->contatotecnico_ != "")
                  { 
                       $compl_insert     .= ", Contatotecnico";
                       $compl_insert_val .= ", '$this->contatotecnico_'";
                  } 
                  if ($this->logistica_ != "")
                  { 
                       $compl_insert     .= ", Logistica";
                       $compl_insert_val .= ", '$this->logistica_'";
                  } 
                  if ($this->pimportado_ != "")
                  { 
                       $compl_insert     .= ", Pimportado";
                       $compl_insert_val .= ", '$this->pimportado_'";
                  } 
                  if ($this->vendedor01_ != "")
                  { 
                       $compl_insert     .= ", Vendedor01";
                       $compl_insert_val .= ", '$this->vendedor01_'";
                  } 
                  if (!empty($compl_insert))
                  { 
                      $compl_insert     = substr($compl_insert, 1);
                      $compl_insert_val = substr($compl_insert_val, 1);
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . " $compl_insert) VALUES (" . $NM_seq_auto . " $compl_insert_val)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_dbo_cliente_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_dbo_cliente_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->cd_cliente_ =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cd_cliente_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cd_cliente_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cd_cliente_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cd_cliente_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cd_cliente_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cd_cliente_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->cd_cliente_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_I_E']++; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cd_cliente_'] = $this->cd_cliente_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['razaosocial_'] = $this->razaosocial_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['nomefantasia_'] = $this->nomefantasia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cgc_'] = $this->cgc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['inscricao_'] = $this->inscricao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['endereco_'] = $this->endereco_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cidade_'] = $this->cidade_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['estado_'] = $this->estado_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['bairro_'] = $this->bairro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cep_'] = $this->cep_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['email_'] = $this->email_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fone_'] = $this->fone_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fone1_'] = $this->fone1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fax_'] = $this->fax_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contato_'] = $this->contato_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['enderecocobranca_'] = $this->enderecocobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cidadecobranca_'] = $this->cidadecobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['bairrocobranca_'] = $this->bairrocobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['estadocobranca_'] = $this->estadocobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cepcobranca_'] = $this->cepcobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fonecobranca_'] = $this->fonecobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['faxcobranca_'] = $this->faxcobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contatocobranca_'] = $this->contatocobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cgcentrega_'] = $this->cgcentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['inscricaoentrega_'] = $this->inscricaoentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['enderecoentrega_'] = $this->enderecoentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cidadeentrega_'] = $this->cidadeentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['bairroentrega_'] = $this->bairroentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['estadoentrega_'] = $this->estadoentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['cepentrega_'] = $this->cepentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['foneentrega_'] = $this->foneentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contatoentrega_'] = $this->contatoentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contatoexpedicao_'] = $this->contatoexpedicao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['foneexpedicao_'] = $this->foneexpedicao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['datacadastro_'] = $this->datacadastro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['obs_'] = $this->obs_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['tipo_'] = $this->tipo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['consumidor_'] = $this->consumidor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['licensa_'] = $this->licensa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['venctolicensa_'] = $this->venctolicensa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['licensa1_'] = $this->licensa1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['venctolicensa1_'] = $this->venctolicensa1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['qtdeliberada_'] = $this->qtdeliberada_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['licensa2_'] = $this->licensa2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['venctolicensa2_'] = $this->venctolicensa2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['icms_'] = $this->icms_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['suframa_'] = $this->suframa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['limitecredito_'] = $this->limitecredito_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['vendedor_'] = $this->vendedor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['restricao_'] = $this->restricao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['comissao_'] = $this->comissao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['transportadora_'] = $this->transportadora_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['coleta_'] = $this->coleta_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['segmento_'] = $this->segmento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['dataalteracao_'] = $this->dataalteracao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['usuario_'] = $this->usuario_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['requisitos_'] = $this->requisitos_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['banco_'] = $this->banco_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['emailcobranca_'] = $this->emailcobranca_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['emailtecnico_'] = $this->emailtecnico_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['midia_'] = $this->midia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['seg_'] = $this->seg_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['ter_'] = $this->ter_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['qua_'] = $this->qua_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['qui_'] = $this->qui_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['sex_'] = $this->sex_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['certificado_'] = $this->certificado_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['emailnfe_'] = $this->emailnfe_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['fundacao_'] = $this->fundacao_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['site_'] = $this->site_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['financeiro_'] = $this->financeiro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['numero_'] = $this->numero_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['complemento_'] = $this->complemento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['razaosocialentrega_'] = $this->razaosocialentrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['entrega_'] = $this->entrega_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert]['contatotecnico_'] = $this->contatotecnico_;
              if (!empty($this->sc_force_zero))
              {
                  foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
                  {
                      eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
                  }
              }
              $this->sc_force_zero = array();
              if (!empty($NM_val_null))
              {
                  foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
                  {
                      eval('$this->' . $sc_val_null_field . ' = "";');
                  }
              }
              if (isset($this->cd_cliente_)) { $this->nm_limpa_alfa($this->cd_cliente_); }
              if (isset($this->razaosocial_)) { $this->nm_limpa_alfa($this->razaosocial_); }
              if (isset($this->nomefantasia_)) { $this->nm_limpa_alfa($this->nomefantasia_); }
              if (isset($this->cgc_)) { $this->nm_limpa_alfa($this->cgc_); }
              if (isset($this->inscricao_)) { $this->nm_limpa_alfa($this->inscricao_); }
              if (isset($this->endereco_)) { $this->nm_limpa_alfa($this->endereco_); }
              if (isset($this->cidade_)) { $this->nm_limpa_alfa($this->cidade_); }
              if (isset($this->estado_)) { $this->nm_limpa_alfa($this->estado_); }
              if (isset($this->bairro_)) { $this->nm_limpa_alfa($this->bairro_); }
              if (isset($this->cep_)) { $this->nm_limpa_alfa($this->cep_); }
              if (isset($this->email_)) { $this->nm_limpa_alfa($this->email_); }
              if (isset($this->fone_)) { $this->nm_limpa_alfa($this->fone_); }
              if (isset($this->fone1_)) { $this->nm_limpa_alfa($this->fone1_); }
              if (isset($this->fax_)) { $this->nm_limpa_alfa($this->fax_); }
              if (isset($this->contato_)) { $this->nm_limpa_alfa($this->contato_); }
              if (isset($this->enderecocobranca_)) { $this->nm_limpa_alfa($this->enderecocobranca_); }
              if (isset($this->cidadecobranca_)) { $this->nm_limpa_alfa($this->cidadecobranca_); }
              if (isset($this->bairrocobranca_)) { $this->nm_limpa_alfa($this->bairrocobranca_); }
              if (isset($this->estadocobranca_)) { $this->nm_limpa_alfa($this->estadocobranca_); }
              if (isset($this->cepcobranca_)) { $this->nm_limpa_alfa($this->cepcobranca_); }
              if (isset($this->fonecobranca_)) { $this->nm_limpa_alfa($this->fonecobranca_); }
              if (isset($this->faxcobranca_)) { $this->nm_limpa_alfa($this->faxcobranca_); }
              if (isset($this->contatocobranca_)) { $this->nm_limpa_alfa($this->contatocobranca_); }
              if (isset($this->cgcentrega_)) { $this->nm_limpa_alfa($this->cgcentrega_); }
              if (isset($this->inscricaoentrega_)) { $this->nm_limpa_alfa($this->inscricaoentrega_); }
              if (isset($this->enderecoentrega_)) { $this->nm_limpa_alfa($this->enderecoentrega_); }
              if (isset($this->cidadeentrega_)) { $this->nm_limpa_alfa($this->cidadeentrega_); }
              if (isset($this->bairroentrega_)) { $this->nm_limpa_alfa($this->bairroentrega_); }
              if (isset($this->estadoentrega_)) { $this->nm_limpa_alfa($this->estadoentrega_); }
              if (isset($this->cepentrega_)) { $this->nm_limpa_alfa($this->cepentrega_); }
              if (isset($this->foneentrega_)) { $this->nm_limpa_alfa($this->foneentrega_); }
              if (isset($this->contatoentrega_)) { $this->nm_limpa_alfa($this->contatoentrega_); }
              if (isset($this->contatoexpedicao_)) { $this->nm_limpa_alfa($this->contatoexpedicao_); }
              if (isset($this->foneexpedicao_)) { $this->nm_limpa_alfa($this->foneexpedicao_); }
              if (isset($this->obs_)) { $this->nm_limpa_alfa($this->obs_); }
              if (isset($this->tipo_)) { $this->nm_limpa_alfa($this->tipo_); }
              if (isset($this->consumidor_)) { $this->nm_limpa_alfa($this->consumidor_); }
              if (isset($this->licensa_)) { $this->nm_limpa_alfa($this->licensa_); }
              if (isset($this->licensa1_)) { $this->nm_limpa_alfa($this->licensa1_); }
              if (isset($this->qtdeliberada_)) { $this->nm_limpa_alfa($this->qtdeliberada_); }
              if (isset($this->licensa2_)) { $this->nm_limpa_alfa($this->licensa2_); }
              if (isset($this->icms_)) { $this->nm_limpa_alfa($this->icms_); }
              if (isset($this->suframa_)) { $this->nm_limpa_alfa($this->suframa_); }
              if (isset($this->limitecredito_)) { $this->nm_limpa_alfa($this->limitecredito_); }
              if (isset($this->vendedor_)) { $this->nm_limpa_alfa($this->vendedor_); }
              if (isset($this->restricao_)) { $this->nm_limpa_alfa($this->restricao_); }
              if (isset($this->comissao_)) { $this->nm_limpa_alfa($this->comissao_); }
              if (isset($this->transportadora_)) { $this->nm_limpa_alfa($this->transportadora_); }
              if (isset($this->coleta_)) { $this->nm_limpa_alfa($this->coleta_); }
              if (isset($this->segmento_)) { $this->nm_limpa_alfa($this->segmento_); }
              if (isset($this->usuario_)) { $this->nm_limpa_alfa($this->usuario_); }
              if (isset($this->requisitos_)) { $this->nm_limpa_alfa($this->requisitos_); }
              if (isset($this->banco_)) { $this->nm_limpa_alfa($this->banco_); }
              if (isset($this->emailcobranca_)) { $this->nm_limpa_alfa($this->emailcobranca_); }
              if (isset($this->emailtecnico_)) { $this->nm_limpa_alfa($this->emailtecnico_); }
              if (isset($this->midia_)) { $this->nm_limpa_alfa($this->midia_); }
              if (isset($this->seg_)) { $this->nm_limpa_alfa($this->seg_); }
              if (isset($this->ter_)) { $this->nm_limpa_alfa($this->ter_); }
              if (isset($this->qua_)) { $this->nm_limpa_alfa($this->qua_); }
              if (isset($this->qui_)) { $this->nm_limpa_alfa($this->qui_); }
              if (isset($this->sex_)) { $this->nm_limpa_alfa($this->sex_); }
              if (isset($this->certificado_)) { $this->nm_limpa_alfa($this->certificado_); }
              if (isset($this->emailnfe_)) { $this->nm_limpa_alfa($this->emailnfe_); }
              if (isset($this->site_)) { $this->nm_limpa_alfa($this->site_); }
              if (isset($this->financeiro_)) { $this->nm_limpa_alfa($this->financeiro_); }
              if (isset($this->numero_)) { $this->nm_limpa_alfa($this->numero_); }
              if (isset($this->complemento_)) { $this->nm_limpa_alfa($this->complemento_); }
              if (isset($this->razaosocialentrega_)) { $this->nm_limpa_alfa($this->razaosocialentrega_); }
              if (isset($this->entrega_)) { $this->nm_limpa_alfa($this->entrega_); }
              if (isset($this->contatotecnico_)) { $this->nm_limpa_alfa($this->contatotecnico_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['cd_cliente_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['cd_cliente_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cd_cliente_)));
                  $this->NM_ajax_info['fldList']['cd_cliente_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cd_cliente_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cd_cliente_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cd_cliente_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cd_cliente_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cd_cliente_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['razaosocial_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['razaosocial_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->razaosocial_)));
                  $this->NM_ajax_info['fldList']['razaosocial_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_razaosocial_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['razaosocial_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['razaosocial_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['razaosocial_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['razaosocial_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['nomefantasia_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['nomefantasia_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->nomefantasia_)));
                  $this->NM_ajax_info['fldList']['nomefantasia_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_nomefantasia_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nomefantasia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nomefantasia_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nomefantasia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nomefantasia_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cgc_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cgc_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cgc_)));
                  $this->NM_ajax_info['fldList']['cgc_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cgc_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cgc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cgc_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cgc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cgc_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['inscricao_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['inscricao_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->inscricao_)));
                  $this->NM_ajax_info['fldList']['inscricao_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_inscricao_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['inscricao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['inscricao_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['inscricao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['inscricao_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['endereco_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['endereco_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->endereco_)));
                  $this->NM_ajax_info['fldList']['endereco_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_endereco_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['endereco_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['endereco_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['endereco_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['endereco_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cidade_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cidade_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cidade_)));
                  $this->NM_ajax_info['fldList']['cidade_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cidade_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cidade_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cidade_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cidade_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cidade_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['estado_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['estado_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->estado_)));
                  $this->NM_ajax_info['fldList']['estado_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_estado_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['estado_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['estado_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['estado_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['estado_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['bairro_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['bairro_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->bairro_)));
                  $this->NM_ajax_info['fldList']['bairro_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_bairro_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['bairro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['bairro_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['bairro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['bairro_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cep_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cep_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cep_)));
                  $this->NM_ajax_info['fldList']['cep_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cep_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cep_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cep_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cep_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cep_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['email_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['email_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->email_)));
                  $this->NM_ajax_info['fldList']['email_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_email_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['email_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['email_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['email_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['email_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fone_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fone_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->fone_)));
                  $this->NM_ajax_info['fldList']['fone_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_fone_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fone_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fone_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fone_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fone_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fone1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fone1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->fone1_)));
                  $this->NM_ajax_info['fldList']['fone1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_fone1_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fone1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fone1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fone1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fone1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fax_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fax_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->fax_)));
                  $this->NM_ajax_info['fldList']['fax_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_fax_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fax_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fax_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fax_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fax_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['contato_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['contato_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->contato_)));
                  $this->NM_ajax_info['fldList']['contato_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_contato_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contato_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contato_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contato_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contato_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['enderecocobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['enderecocobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->enderecocobranca_)));
                  $this->NM_ajax_info['fldList']['enderecocobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_enderecocobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['enderecocobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['enderecocobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['enderecocobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['enderecocobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cidadecobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cidadecobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cidadecobranca_)));
                  $this->NM_ajax_info['fldList']['cidadecobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cidadecobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cidadecobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cidadecobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cidadecobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cidadecobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['bairrocobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['bairrocobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->bairrocobranca_)));
                  $this->NM_ajax_info['fldList']['bairrocobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_bairrocobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['bairrocobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['bairrocobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['bairrocobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['bairrocobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['estadocobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['estadocobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->estadocobranca_)));
                  $this->NM_ajax_info['fldList']['estadocobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_estadocobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['estadocobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['estadocobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['estadocobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['estadocobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cepcobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cepcobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cepcobranca_)));
                  $this->NM_ajax_info['fldList']['cepcobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cepcobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cepcobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cepcobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cepcobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cepcobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fonecobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fonecobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->fonecobranca_)));
                  $this->NM_ajax_info['fldList']['fonecobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_fonecobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fonecobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fonecobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fonecobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fonecobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['faxcobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['faxcobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->faxcobranca_)));
                  $this->NM_ajax_info['fldList']['faxcobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_faxcobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['faxcobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['faxcobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['faxcobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['faxcobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['contatocobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['contatocobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->contatocobranca_)));
                  $this->NM_ajax_info['fldList']['contatocobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_contatocobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contatocobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contatocobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contatocobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contatocobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cgcentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cgcentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cgcentrega_)));
                  $this->NM_ajax_info['fldList']['cgcentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cgcentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cgcentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cgcentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cgcentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cgcentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['inscricaoentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['inscricaoentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->inscricaoentrega_)));
                  $this->NM_ajax_info['fldList']['inscricaoentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_inscricaoentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['inscricaoentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['inscricaoentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['inscricaoentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['inscricaoentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['enderecoentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['enderecoentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->enderecoentrega_)));
                  $this->NM_ajax_info['fldList']['enderecoentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_enderecoentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['enderecoentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['enderecoentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['enderecoentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['enderecoentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cidadeentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cidadeentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cidadeentrega_)));
                  $this->NM_ajax_info['fldList']['cidadeentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cidadeentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cidadeentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cidadeentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cidadeentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cidadeentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['bairroentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['bairroentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->bairroentrega_)));
                  $this->NM_ajax_info['fldList']['bairroentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_bairroentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['bairroentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['bairroentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['bairroentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['bairroentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['estadoentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['estadoentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->estadoentrega_)));
                  $this->NM_ajax_info['fldList']['estadoentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_estadoentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['estadoentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['estadoentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['estadoentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['estadoentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cepentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cepentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cepentrega_)));
                  $this->NM_ajax_info['fldList']['cepentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cepentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cepentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cepentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cepentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cepentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['foneentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['foneentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->foneentrega_)));
                  $this->NM_ajax_info['fldList']['foneentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_foneentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['foneentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['foneentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['foneentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['foneentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['contatoentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['contatoentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->contatoentrega_)));
                  $this->NM_ajax_info['fldList']['contatoentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_contatoentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contatoentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contatoentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contatoentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contatoentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['contatoexpedicao_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['contatoexpedicao_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->contatoexpedicao_)));
                  $this->NM_ajax_info['fldList']['contatoexpedicao_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_contatoexpedicao_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contatoexpedicao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contatoexpedicao_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contatoexpedicao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contatoexpedicao_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['foneexpedicao_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['foneexpedicao_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->foneexpedicao_)));
                  $this->NM_ajax_info['fldList']['foneexpedicao_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_foneexpedicao_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['foneexpedicao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['foneexpedicao_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['foneexpedicao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['foneexpedicao_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['datacadastro_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['datacadastro_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->datacadastro_ . ' ' . $this->datacadastro__hora));
                  $this->NM_ajax_info['fldList']['datacadastro_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_datacadastro_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['datacadastro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['datacadastro_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['datacadastro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['datacadastro_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->obs_    = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $this->obs_);
                  $tmpLabel_obs_ = nl2br($this->obs_);
                  $this->NM_ajax_info['fldList']['obs_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['obs_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->obs_)));
                  $this->NM_ajax_info['fldList']['obs_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_obs_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['obs_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['obs_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['obs_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['obs_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tipo_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tipo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipo_)));
                  $this->NM_ajax_info['fldList']['tipo_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_tipo_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['consumidor_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['consumidor_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->consumidor_)));
                  $this->NM_ajax_info['fldList']['consumidor_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_consumidor_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['consumidor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['consumidor_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['consumidor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['consumidor_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['licensa_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['licensa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->licensa_)));
                  $this->NM_ajax_info['fldList']['licensa_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_licensa_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['licensa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['licensa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['licensa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['licensa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['venctolicensa_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['venctolicensa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->venctolicensa_ . ' ' . $this->venctolicensa__hora));
                  $this->NM_ajax_info['fldList']['venctolicensa_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_venctolicensa_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['venctolicensa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['venctolicensa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['venctolicensa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['venctolicensa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['licensa1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['licensa1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->licensa1_)));
                  $this->NM_ajax_info['fldList']['licensa1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_licensa1_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['licensa1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['licensa1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['licensa1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['licensa1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['venctolicensa1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['venctolicensa1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->venctolicensa1_ . ' ' . $this->venctolicensa1__hora));
                  $this->NM_ajax_info['fldList']['venctolicensa1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_venctolicensa1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['venctolicensa1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['venctolicensa1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['venctolicensa1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['venctolicensa1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['qtdeliberada_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['qtdeliberada_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->qtdeliberada_)));
                  $this->NM_ajax_info['fldList']['qtdeliberada_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_qtdeliberada_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['qtdeliberada_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['qtdeliberada_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['qtdeliberada_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['qtdeliberada_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['licensa2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['licensa2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->licensa2_)));
                  $this->NM_ajax_info['fldList']['licensa2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_licensa2_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['licensa2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['licensa2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['licensa2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['licensa2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['venctolicensa2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['venctolicensa2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->venctolicensa2_ . ' ' . $this->venctolicensa2__hora));
                  $this->NM_ajax_info['fldList']['venctolicensa2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_venctolicensa2_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['venctolicensa2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['venctolicensa2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['venctolicensa2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['venctolicensa2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['icms_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['icms_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->icms_)));
                  $this->NM_ajax_info['fldList']['icms_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_icms_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['icms_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['icms_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['icms_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['icms_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['suframa_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['suframa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->suframa_)));
                  $this->NM_ajax_info['fldList']['suframa_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_suframa_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['suframa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['suframa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['suframa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['suframa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['limitecredito_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['limitecredito_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->limitecredito_)));
                  $this->NM_ajax_info['fldList']['limitecredito_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_limitecredito_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['limitecredito_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['limitecredito_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['limitecredito_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['limitecredito_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['vendedor_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['vendedor_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->vendedor_)));
                  $this->NM_ajax_info['fldList']['vendedor_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_vendedor_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['vendedor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['vendedor_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['vendedor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['vendedor_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['restricao_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['restricao_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->restricao_)));
                  $this->NM_ajax_info['fldList']['restricao_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_restricao_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['restricao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['restricao_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['restricao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['restricao_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['comissao_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['comissao_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->comissao_)));
                  $this->NM_ajax_info['fldList']['comissao_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_comissao_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['comissao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['comissao_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['comissao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['comissao_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['transportadora_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['transportadora_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->transportadora_)));
                  $this->NM_ajax_info['fldList']['transportadora_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_transportadora_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['transportadora_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['transportadora_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['transportadora_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['transportadora_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['coleta_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['coleta_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->coleta_)));
                  $this->NM_ajax_info['fldList']['coleta_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_coleta_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['coleta_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['coleta_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['coleta_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['coleta_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['segmento_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['segmento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->segmento_)));
                  $this->NM_ajax_info['fldList']['segmento_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_segmento_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['segmento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['segmento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['segmento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['segmento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dataalteracao_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dataalteracao_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dataalteracao_ . ' ' . $this->dataalteracao__hora));
                  $this->NM_ajax_info['fldList']['dataalteracao_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dataalteracao_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dataalteracao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dataalteracao_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dataalteracao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dataalteracao_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['usuario_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['usuario_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->usuario_)));
                  $this->NM_ajax_info['fldList']['usuario_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_usuario_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['requisitos_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['requisitos_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->requisitos_)));
                  $this->NM_ajax_info['fldList']['requisitos_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_requisitos_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['requisitos_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['requisitos_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['requisitos_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['requisitos_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['banco_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['banco_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->banco_)));
                  $this->NM_ajax_info['fldList']['banco_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_banco_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['banco_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['banco_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['banco_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['banco_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['emailcobranca_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['emailcobranca_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->emailcobranca_)));
                  $this->NM_ajax_info['fldList']['emailcobranca_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_emailcobranca_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['emailcobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['emailcobranca_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['emailcobranca_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['emailcobranca_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['emailtecnico_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['emailtecnico_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->emailtecnico_)));
                  $this->NM_ajax_info['fldList']['emailtecnico_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_emailtecnico_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['emailtecnico_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['emailtecnico_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['emailtecnico_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['emailtecnico_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['midia_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['midia_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->midia_)));
                  $this->NM_ajax_info['fldList']['midia_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_midia_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['midia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['midia_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['midia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['midia_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['seg_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['seg_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->seg_)));
                  $this->NM_ajax_info['fldList']['seg_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_seg_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['seg_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['seg_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['seg_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['seg_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['ter_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['ter_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->ter_)));
                  $this->NM_ajax_info['fldList']['ter_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_ter_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ter_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ter_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ter_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ter_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['qua_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['qua_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->qua_)));
                  $this->NM_ajax_info['fldList']['qua_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_qua_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['qua_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['qua_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['qua_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['qua_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['qui_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['qui_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->qui_)));
                  $this->NM_ajax_info['fldList']['qui_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_qui_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['qui_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['qui_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['qui_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['qui_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sex_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sex_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->sex_)));
                  $this->NM_ajax_info['fldList']['sex_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_sex_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sex_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sex_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sex_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sex_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['certificado_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['certificado_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->certificado_)));
                  $this->NM_ajax_info['fldList']['certificado_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_certificado_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['certificado_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['certificado_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['certificado_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['certificado_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['emailnfe_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['emailnfe_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->emailnfe_)));
                  $this->NM_ajax_info['fldList']['emailnfe_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_emailnfe_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['emailnfe_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['emailnfe_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['emailnfe_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['emailnfe_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fundacao_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fundacao_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->fundacao_ . ' ' . $this->fundacao__hora));
                  $this->NM_ajax_info['fldList']['fundacao_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_fundacao_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fundacao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fundacao_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fundacao_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fundacao_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['site_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['site_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->site_)));
                  $this->NM_ajax_info['fldList']['site_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_site_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['site_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['site_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['site_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['site_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['financeiro_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['financeiro_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->financeiro_)));
                  $this->NM_ajax_info['fldList']['financeiro_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_financeiro_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['financeiro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['financeiro_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['financeiro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['financeiro_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['numero_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['numero_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->numero_)));
                  $this->NM_ajax_info['fldList']['numero_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_numero_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['numero_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['numero_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['numero_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['numero_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['complemento_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['complemento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->complemento_)));
                  $this->NM_ajax_info['fldList']['complemento_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_complemento_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['complemento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['complemento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['complemento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['complemento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['razaosocialentrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['razaosocialentrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->razaosocialentrega_)));
                  $this->NM_ajax_info['fldList']['razaosocialentrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_razaosocialentrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['razaosocialentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['razaosocialentrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['razaosocialentrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['razaosocialentrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['entrega_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['entrega_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->entrega_)));
                  $this->NM_ajax_info['fldList']['entrega_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_entrega_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['entrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['entrega_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['entrega_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['entrega_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['contatotecnico_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['contatotecnico_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->contatotecnico_)));
                  $this->NM_ajax_info['fldList']['contatotecnico_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_contatotecnico_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contatotecnico_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contatotecnico_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['contatotecnico_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['contatotecnico_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();
                  $this->nm_converte_datas();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->cd_cliente_ = substr($this->Db->qstr($this->cd_cliente_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_'"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Cd_cliente = '$this->cd_cliente_' "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_dbo_cliente_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_I_E']--; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_excl = true; 
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['parms'] = "cd_cliente_?#?$this->cd_cliente_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->cd_cliente_ = substr($this->Db->qstr($this->cd_cliente_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_dbo_cliente']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_dbo_cliente = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->cd_cliente_)
          {
              $aNewWhereCond[] = "Cd_cliente = '" . substr($this->Db->qstr($this->cd_cliente_), 1, -1) . "'";
          }
          if (!$this->NM_ajax_flag)
          {
              $this->NM_btn_navega = "S";
          }
          elseif (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_dbo_cliente = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'] = $qt_geral_reg_form_dbo_cliente;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->cd_cliente_))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "Cd_cliente"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "Cd_cliente"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "Cd_cliente"; 
              }
              else  
              {
                  $Sel_Chave = "Cd_cliente"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "razaosocial";
              $sc_order_by = str_replace("order by ", "", $sc_order_by);
              $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
              if (!empty($sc_order_by))
              {
                  $nmgp_select .= " order by $sc_order_by "; 
              }
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              while (!$rt->EOF && !$Reg_OK)
              { 
                  if ($rt->fields[0] == $this->cd_cliente_)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_dbo_cliente = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_dbo_cliente) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] > $qt_geral_reg_form_dbo_cliente)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = $qt_geral_reg_form_dbo_cliente - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = ($qt_geral_reg_form_dbo_cliente + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $Cmps_ord_def[] = "Cd_cliente";
      $Cmps_ord_def[] = "Razaosocial";
      $sc_order_by  = "";
      $sc_order_by = "razaosocial";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT Cd_cliente, Razaosocial, Nomefantasia, Cgc, Inscricao, Endereco, Cidade, Estado, Bairro, Cep, Email, Fone, Fone1, Fax, Contato, Enderecocobranca, Cidadecobranca, Bairrocobranca, Estadocobranca, Cepcobranca, Fonecobranca, Faxcobranca, Contatocobranca, Cgcentrega, Inscricaoentrega, Enderecoentrega, Cidadeentrega, Bairroentrega, Estadoentrega, Cepentrega, Foneentrega, Contatoentrega, Contatoexpedicao, Foneexpedicao, str_replace (convert(char(10),Datacadastro,102), '.', '-') + ' ' + convert(char(8),Datacadastro,20), Obs, Tipo, Consumidor, Licensa, str_replace (convert(char(10),Venctolicensa,102), '.', '-') + ' ' + convert(char(8),Venctolicensa,20), Licensa1, str_replace (convert(char(10),Venctolicensa1,102), '.', '-') + ' ' + convert(char(8),Venctolicensa1,20), Qtdeliberada, Licensa2, str_replace (convert(char(10),Venctolicensa2,102), '.', '-') + ' ' + convert(char(8),Venctolicensa2,20), Icms, Suframa, Limitecredito, Vendedor, Restricao, Comissao, Transportadora, Coleta, Segmento, str_replace (convert(char(10),Dataalteracao,102), '.', '-') + ' ' + convert(char(8),Dataalteracao,20), Usuario, REQUISITOS, Banco, Emailcobranca, Emailtecnico, Midia, Seg, Ter, Qua, Qui, Sex, Certificado, Emailnfe, str_replace (convert(char(10),Fundacao,102), '.', '-') + ' ' + convert(char(8),Fundacao,20), Site, Financeiro, Numero, Complemento, Razaosocialentrega, Entrega, Contatotecnico, Logistica, Pimportado, Vendedor01 from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT Cd_cliente, Razaosocial, Nomefantasia, Cgc, Inscricao, Endereco, Cidade, Estado, Bairro, Cep, Email, Fone, Fone1, Fax, Contato, Enderecocobranca, Cidadecobranca, Bairrocobranca, Estadocobranca, Cepcobranca, Fonecobranca, Faxcobranca, Contatocobranca, Cgcentrega, Inscricaoentrega, Enderecoentrega, Cidadeentrega, Bairroentrega, Estadoentrega, Cepentrega, Foneentrega, Contatoentrega, Contatoexpedicao, Foneexpedicao, convert(char(23),Datacadastro,121), Obs, Tipo, Consumidor, Licensa, convert(char(23),Venctolicensa,121), Licensa1, convert(char(23),Venctolicensa1,121), Qtdeliberada, Licensa2, convert(char(23),Venctolicensa2,121), Icms, Suframa, Limitecredito, Vendedor, Restricao, Comissao, Transportadora, Coleta, Segmento, convert(char(23),Dataalteracao,121), Usuario, REQUISITOS, Banco, Emailcobranca, Emailtecnico, Midia, Seg, Ter, Qua, Qui, Sex, Certificado, Emailnfe, convert(char(23),Fundacao,121), Site, Financeiro, Numero, Complemento, Razaosocialentrega, Entrega, Contatotecnico, Logistica, Pimportado, Vendedor01 from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT Cd_cliente, Razaosocial, Nomefantasia, Cgc, Inscricao, Endereco, Cidade, Estado, Bairro, Cep, Email, Fone, Fone1, Fax, Contato, Enderecocobranca, Cidadecobranca, Bairrocobranca, Estadocobranca, Cepcobranca, Fonecobranca, Faxcobranca, Contatocobranca, Cgcentrega, Inscricaoentrega, Enderecoentrega, Cidadeentrega, Bairroentrega, Estadoentrega, Cepentrega, Foneentrega, Contatoentrega, Contatoexpedicao, Foneexpedicao, Datacadastro, Obs, Tipo, Consumidor, Licensa, Venctolicensa, Licensa1, Venctolicensa1, Qtdeliberada, Licensa2, Venctolicensa2, Icms, Suframa, Limitecredito, Vendedor, Restricao, Comissao, Transportadora, Coleta, Segmento, Dataalteracao, Usuario, REQUISITOS, Banco, Emailcobranca, Emailtecnico, Midia, Seg, Ter, Qua, Qui, Sex, Certificado, Emailnfe, Fundacao, Site, Financeiro, Numero, Complemento, Razaosocialentrega, Entrega, Contatotecnico, Logistica, Pimportado, Vendedor01 from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT Cd_cliente, Razaosocial, Nomefantasia, Cgc, Inscricao, Endereco, Cidade, Estado, Bairro, Cep, Email, Fone, Fone1, Fax, Contato, Enderecocobranca, Cidadecobranca, Bairrocobranca, Estadocobranca, Cepcobranca, Fonecobranca, Faxcobranca, Contatocobranca, Cgcentrega, Inscricaoentrega, Enderecoentrega, Cidadeentrega, Bairroentrega, Estadoentrega, Cepentrega, Foneentrega, Contatoentrega, Contatoexpedicao, Foneexpedicao, EXTEND(Datacadastro, YEAR TO FRACTION), Obs, Tipo, Consumidor, Licensa, EXTEND(Venctolicensa, YEAR TO FRACTION), Licensa1, EXTEND(Venctolicensa1, YEAR TO FRACTION), Qtdeliberada, Licensa2, EXTEND(Venctolicensa2, YEAR TO FRACTION), Icms, Suframa, Limitecredito, Vendedor, Restricao, Comissao, Transportadora, Coleta, Segmento, EXTEND(Dataalteracao, YEAR TO FRACTION), Usuario, REQUISITOS, Banco, Emailcobranca, Emailtecnico, Midia, Seg, Ter, Qua, Qui, Sex, Certificado, Emailnfe, EXTEND(Fundacao, YEAR TO FRACTION), Site, Financeiro, Numero, Complemento, Razaosocialentrega, Entrega, Contatotecnico, Logistica, Pimportado, Vendedor01 from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT Cd_cliente, Razaosocial, Nomefantasia, Cgc, Inscricao, Endereco, Cidade, Estado, Bairro, Cep, Email, Fone, Fone1, Fax, Contato, Enderecocobranca, Cidadecobranca, Bairrocobranca, Estadocobranca, Cepcobranca, Fonecobranca, Faxcobranca, Contatocobranca, Cgcentrega, Inscricaoentrega, Enderecoentrega, Cidadeentrega, Bairroentrega, Estadoentrega, Cepentrega, Foneentrega, Contatoentrega, Contatoexpedicao, Foneexpedicao, Datacadastro, Obs, Tipo, Consumidor, Licensa, Venctolicensa, Licensa1, Venctolicensa1, Qtdeliberada, Licensa2, Venctolicensa2, Icms, Suframa, Limitecredito, Vendedor, Restricao, Comissao, Transportadora, Coleta, Segmento, Dataalteracao, Usuario, REQUISITOS, Banco, Emailcobranca, Emailtecnico, Midia, Seg, Ter, Qua, Qui, Sex, Certificado, Emailnfe, Fundacao, Site, Financeiro, Numero, Complemento, Razaosocialentrega, Entrega, Contatotecnico, Logistica, Pimportado, Vendedor01 from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start']) ;  
                  } 
              } 
          } 
      }
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF && !$this->proc_fast_search && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter'])) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->cd_cliente_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['cd_cliente_'] = $this->cd_cliente_;
              $this->razaosocial_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['razaosocial_'] = $this->razaosocial_;
              $this->nomefantasia_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['nomefantasia_'] = $this->nomefantasia_;
              $this->cgc_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['cgc_'] = $this->cgc_;
              $this->inscricao_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['inscricao_'] = $this->inscricao_;
              $this->endereco_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['endereco_'] = $this->endereco_;
              $this->cidade_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['cidade_'] = $this->cidade_;
              $this->estado_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['estado_'] = $this->estado_;
              $this->bairro_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['bairro_'] = $this->bairro_;
              $this->cep_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['cep_'] = $this->cep_;
              $this->email_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['email_'] = $this->email_;
              $this->fone_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['fone_'] = $this->fone_;
              $this->fone1_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['fone1_'] = $this->fone1_;
              $this->fax_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['fax_'] = $this->fax_;
              $this->contato_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['contato_'] = $this->contato_;
              $this->enderecocobranca_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['enderecocobranca_'] = $this->enderecocobranca_;
              $this->cidadecobranca_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['cidadecobranca_'] = $this->cidadecobranca_;
              $this->bairrocobranca_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['bairrocobranca_'] = $this->bairrocobranca_;
              $this->estadocobranca_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['estadocobranca_'] = $this->estadocobranca_;
              $this->cepcobranca_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['cepcobranca_'] = $this->cepcobranca_;
              $this->fonecobranca_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['fonecobranca_'] = $this->fonecobranca_;
              $this->faxcobranca_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['faxcobranca_'] = $this->faxcobranca_;
              $this->contatocobranca_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['contatocobranca_'] = $this->contatocobranca_;
              $this->cgcentrega_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['cgcentrega_'] = $this->cgcentrega_;
              $this->inscricaoentrega_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['inscricaoentrega_'] = $this->inscricaoentrega_;
              $this->enderecoentrega_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['enderecoentrega_'] = $this->enderecoentrega_;
              $this->cidadeentrega_ = $rs->fields[26] ; 
              $this->nmgp_dados_select['cidadeentrega_'] = $this->cidadeentrega_;
              $this->bairroentrega_ = $rs->fields[27] ; 
              $this->nmgp_dados_select['bairroentrega_'] = $this->bairroentrega_;
              $this->estadoentrega_ = $rs->fields[28] ; 
              $this->nmgp_dados_select['estadoentrega_'] = $this->estadoentrega_;
              $this->cepentrega_ = $rs->fields[29] ; 
              $this->nmgp_dados_select['cepentrega_'] = $this->cepentrega_;
              $this->foneentrega_ = $rs->fields[30] ; 
              $this->nmgp_dados_select['foneentrega_'] = $this->foneentrega_;
              $this->contatoentrega_ = $rs->fields[31] ; 
              $this->nmgp_dados_select['contatoentrega_'] = $this->contatoentrega_;
              $this->contatoexpedicao_ = $rs->fields[32] ; 
              $this->nmgp_dados_select['contatoexpedicao_'] = $this->contatoexpedicao_;
              $this->foneexpedicao_ = $rs->fields[33] ; 
              $this->nmgp_dados_select['foneexpedicao_'] = $this->foneexpedicao_;
              $this->datacadastro_ = $rs->fields[34] ; 
              if (substr($this->datacadastro_, 10, 1) == "-") 
              { 
                 $this->datacadastro_ = substr($this->datacadastro_, 0, 10) . " " . substr($this->datacadastro_, 11);
              } 
              if (substr($this->datacadastro_, 13, 1) == ".") 
              { 
                 $this->datacadastro_ = substr($this->datacadastro_, 0, 13) . ":" . substr($this->datacadastro_, 14, 2) . ":" . substr($this->datacadastro_, 17);
              } 
              $this->nmgp_dados_select['datacadastro_'] = $this->datacadastro_;
              $this->obs_ = $rs->fields[35] ; 
              $this->nmgp_dados_select['obs_'] = $this->obs_;
              $this->tipo_ = $rs->fields[36] ; 
              $this->nmgp_dados_select['tipo_'] = $this->tipo_;
              $this->consumidor_ = $rs->fields[37] ; 
              $this->nmgp_dados_select['consumidor_'] = $this->consumidor_;
              $this->licensa_ = $rs->fields[38] ; 
              $this->nmgp_dados_select['licensa_'] = $this->licensa_;
              $this->venctolicensa_ = $rs->fields[39] ; 
              if (substr($this->venctolicensa_, 10, 1) == "-") 
              { 
                 $this->venctolicensa_ = substr($this->venctolicensa_, 0, 10) . " " . substr($this->venctolicensa_, 11);
              } 
              if (substr($this->venctolicensa_, 13, 1) == ".") 
              { 
                 $this->venctolicensa_ = substr($this->venctolicensa_, 0, 13) . ":" . substr($this->venctolicensa_, 14, 2) . ":" . substr($this->venctolicensa_, 17);
              } 
              $this->nmgp_dados_select['venctolicensa_'] = $this->venctolicensa_;
              $this->licensa1_ = $rs->fields[40] ; 
              $this->nmgp_dados_select['licensa1_'] = $this->licensa1_;
              $this->venctolicensa1_ = $rs->fields[41] ; 
              if (substr($this->venctolicensa1_, 10, 1) == "-") 
              { 
                 $this->venctolicensa1_ = substr($this->venctolicensa1_, 0, 10) . " " . substr($this->venctolicensa1_, 11);
              } 
              if (substr($this->venctolicensa1_, 13, 1) == ".") 
              { 
                 $this->venctolicensa1_ = substr($this->venctolicensa1_, 0, 13) . ":" . substr($this->venctolicensa1_, 14, 2) . ":" . substr($this->venctolicensa1_, 17);
              } 
              $this->nmgp_dados_select['venctolicensa1_'] = $this->venctolicensa1_;
              $this->qtdeliberada_ = trim($rs->fields[42]) ; 
              $this->nmgp_dados_select['qtdeliberada_'] = $this->qtdeliberada_;
              $this->licensa2_ = $rs->fields[43] ; 
              $this->nmgp_dados_select['licensa2_'] = $this->licensa2_;
              $this->venctolicensa2_ = $rs->fields[44] ; 
              if (substr($this->venctolicensa2_, 10, 1) == "-") 
              { 
                 $this->venctolicensa2_ = substr($this->venctolicensa2_, 0, 10) . " " . substr($this->venctolicensa2_, 11);
              } 
              if (substr($this->venctolicensa2_, 13, 1) == ".") 
              { 
                 $this->venctolicensa2_ = substr($this->venctolicensa2_, 0, 13) . ":" . substr($this->venctolicensa2_, 14, 2) . ":" . substr($this->venctolicensa2_, 17);
              } 
              $this->nmgp_dados_select['venctolicensa2_'] = $this->venctolicensa2_;
              $this->icms_ = trim($rs->fields[45]) ; 
              $this->nmgp_dados_select['icms_'] = $this->icms_;
              $this->suframa_ = $rs->fields[46] ; 
              $this->nmgp_dados_select['suframa_'] = $this->suframa_;
              $this->limitecredito_ = trim($rs->fields[47]) ; 
              $this->nmgp_dados_select['limitecredito_'] = $this->limitecredito_;
              $this->vendedor_ = $rs->fields[48] ; 
              $this->nmgp_dados_select['vendedor_'] = $this->vendedor_;
              $this->restricao_ = $rs->fields[49] ; 
              $this->nmgp_dados_select['restricao_'] = $this->restricao_;
              $this->comissao_ = trim($rs->fields[50]) ; 
              $this->nmgp_dados_select['comissao_'] = $this->comissao_;
              $this->transportadora_ = $rs->fields[51] ; 
              $this->nmgp_dados_select['transportadora_'] = $this->transportadora_;
              $this->coleta_ = $rs->fields[52] ; 
              $this->nmgp_dados_select['coleta_'] = $this->coleta_;
              $this->segmento_ = trim($rs->fields[53]) ; 
              $this->nmgp_dados_select['segmento_'] = $this->segmento_;
              $this->dataalteracao_ = $rs->fields[54] ; 
              if (substr($this->dataalteracao_, 10, 1) == "-") 
              { 
                 $this->dataalteracao_ = substr($this->dataalteracao_, 0, 10) . " " . substr($this->dataalteracao_, 11);
              } 
              if (substr($this->dataalteracao_, 13, 1) == ".") 
              { 
                 $this->dataalteracao_ = substr($this->dataalteracao_, 0, 13) . ":" . substr($this->dataalteracao_, 14, 2) . ":" . substr($this->dataalteracao_, 17);
              } 
              $this->nmgp_dados_select['dataalteracao_'] = $this->dataalteracao_;
              $this->usuario_ = $rs->fields[55] ; 
              $this->nmgp_dados_select['usuario_'] = $this->usuario_;
              $this->requisitos_ = $rs->fields[56] ; 
              $this->nmgp_dados_select['requisitos_'] = $this->requisitos_;
              $this->banco_ = $rs->fields[57] ; 
              $this->nmgp_dados_select['banco_'] = $this->banco_;
              $this->emailcobranca_ = $rs->fields[58] ; 
              $this->nmgp_dados_select['emailcobranca_'] = $this->emailcobranca_;
              $this->emailtecnico_ = $rs->fields[59] ; 
              $this->nmgp_dados_select['emailtecnico_'] = $this->emailtecnico_;
              $this->midia_ = $rs->fields[60] ; 
              $this->nmgp_dados_select['midia_'] = $this->midia_;
              $this->seg_ = $rs->fields[61] ; 
              $this->nmgp_dados_select['seg_'] = $this->seg_;
              $this->ter_ = $rs->fields[62] ; 
              $this->nmgp_dados_select['ter_'] = $this->ter_;
              $this->qua_ = $rs->fields[63] ; 
              $this->nmgp_dados_select['qua_'] = $this->qua_;
              $this->qui_ = $rs->fields[64] ; 
              $this->nmgp_dados_select['qui_'] = $this->qui_;
              $this->sex_ = $rs->fields[65] ; 
              $this->nmgp_dados_select['sex_'] = $this->sex_;
              $this->certificado_ = $rs->fields[66] ; 
              $this->nmgp_dados_select['certificado_'] = $this->certificado_;
              $this->emailnfe_ = $rs->fields[67] ; 
              $this->nmgp_dados_select['emailnfe_'] = $this->emailnfe_;
              $this->fundacao_ = $rs->fields[68] ; 
              if (substr($this->fundacao_, 10, 1) == "-") 
              { 
                 $this->fundacao_ = substr($this->fundacao_, 0, 10) . " " . substr($this->fundacao_, 11);
              } 
              if (substr($this->fundacao_, 13, 1) == ".") 
              { 
                 $this->fundacao_ = substr($this->fundacao_, 0, 13) . ":" . substr($this->fundacao_, 14, 2) . ":" . substr($this->fundacao_, 17);
              } 
              $this->nmgp_dados_select['fundacao_'] = $this->fundacao_;
              $this->site_ = $rs->fields[69] ; 
              $this->nmgp_dados_select['site_'] = $this->site_;
              $this->financeiro_ = $rs->fields[70] ; 
              $this->nmgp_dados_select['financeiro_'] = $this->financeiro_;
              $this->numero_ = $rs->fields[71] ; 
              $this->nmgp_dados_select['numero_'] = $this->numero_;
              $this->complemento_ = $rs->fields[72] ; 
              $this->nmgp_dados_select['complemento_'] = $this->complemento_;
              $this->razaosocialentrega_ = $rs->fields[73] ; 
              $this->nmgp_dados_select['razaosocialentrega_'] = $this->razaosocialentrega_;
              $this->entrega_ = $rs->fields[74] ; 
              $this->nmgp_dados_select['entrega_'] = $this->entrega_;
              $this->contatotecnico_ = $rs->fields[75] ; 
              $this->nmgp_dados_select['contatotecnico_'] = $this->contatotecnico_;
              $this->logistica_ = $rs->fields[76] ; 
              $this->nmgp_dados_select['logistica_'] = $this->logistica_;
              $this->pimportado_ = $rs->fields[77] ; 
              $this->nmgp_dados_select['pimportado_'] = $this->pimportado_;
              $this->vendedor01_ = $rs->fields[78] ; 
              $this->nmgp_dados_select['vendedor01_'] = $this->vendedor01_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->qtdeliberada_ = (strpos(strtolower($this->qtdeliberada_), "e")) ? (float)$this->qtdeliberada_ : $this->qtdeliberada_; 
              $this->qtdeliberada_ = (string)$this->qtdeliberada_; 
              $this->icms_ = (strpos(strtolower($this->icms_), "e")) ? (float)$this->icms_ : $this->icms_; 
              $this->icms_ = (string)$this->icms_; 
              $this->limitecredito_ = (strpos(strtolower($this->limitecredito_), "e")) ? (float)$this->limitecredito_ : $this->limitecredito_; 
              $this->limitecredito_ = (string)$this->limitecredito_; 
              $this->comissao_ = (strpos(strtolower($this->comissao_), "e")) ? (float)$this->comissao_ : $this->comissao_; 
              $this->comissao_ = (string)$this->comissao_; 
              $this->segmento_ = (strpos(strtolower($this->segmento_), "e")) ? (float)$this->segmento_ : $this->segmento_; 
              $this->segmento_ = (string)$this->segmento_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['parms'] = "cd_cliente_?#?$this->cd_cliente_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cd_cliente_'] =  $this->cd_cliente_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['razaosocial_'] =  $this->razaosocial_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['nomefantasia_'] =  $this->nomefantasia_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cgc_'] =  $this->cgc_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['inscricao_'] =  $this->inscricao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['endereco_'] =  $this->endereco_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidade_'] =  $this->cidade_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estado_'] =  $this->estado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairro_'] =  $this->bairro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cep_'] =  $this->cep_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fone_'] =  $this->fone_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fone1_'] =  $this->fone1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fax_'] =  $this->fax_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contato_'] =  $this->contato_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['enderecocobranca_'] =  $this->enderecocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidadecobranca_'] =  $this->cidadecobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairrocobranca_'] =  $this->bairrocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estadocobranca_'] =  $this->estadocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cepcobranca_'] =  $this->cepcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fonecobranca_'] =  $this->fonecobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['faxcobranca_'] =  $this->faxcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatocobranca_'] =  $this->contatocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cgcentrega_'] =  $this->cgcentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['inscricaoentrega_'] =  $this->inscricaoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['enderecoentrega_'] =  $this->enderecoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidadeentrega_'] =  $this->cidadeentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairroentrega_'] =  $this->bairroentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estadoentrega_'] =  $this->estadoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cepentrega_'] =  $this->cepentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['foneentrega_'] =  $this->foneentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatoentrega_'] =  $this->contatoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatoexpedicao_'] =  $this->contatoexpedicao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['foneexpedicao_'] =  $this->foneexpedicao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['datacadastro_'] =  $this->datacadastro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['datacadastro__hora'] =  $this->datacadastro__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['obs_'] =  $this->obs_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['consumidor_'] =  $this->consumidor_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa_'] =  $this->licensa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa_'] =  $this->venctolicensa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa__hora'] =  $this->venctolicensa__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa1_'] =  $this->licensa1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa1_'] =  $this->venctolicensa1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa1__hora'] =  $this->venctolicensa1__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qtdeliberada_'] =  $this->qtdeliberada_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa2_'] =  $this->licensa2_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa2_'] =  $this->venctolicensa2_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa2__hora'] =  $this->venctolicensa2__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['icms_'] =  $this->icms_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['suframa_'] =  $this->suframa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['limitecredito_'] =  $this->limitecredito_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['vendedor_'] =  $this->vendedor_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['restricao_'] =  $this->restricao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['comissao_'] =  $this->comissao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['transportadora_'] =  $this->transportadora_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['coleta_'] =  $this->coleta_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['segmento_'] =  $this->segmento_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['dataalteracao_'] =  $this->dataalteracao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['dataalteracao__hora'] =  $this->dataalteracao__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['usuario_'] =  $this->usuario_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['requisitos_'] =  $this->requisitos_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['banco_'] =  $this->banco_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailcobranca_'] =  $this->emailcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailtecnico_'] =  $this->emailtecnico_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['midia_'] =  $this->midia_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['seg_'] =  $this->seg_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['ter_'] =  $this->ter_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qua_'] =  $this->qua_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qui_'] =  $this->qui_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['sex_'] =  $this->sex_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['certificado_'] =  $this->certificado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailnfe_'] =  $this->emailnfe_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fundacao_'] =  $this->fundacao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fundacao__hora'] =  $this->fundacao__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['site_'] =  $this->site_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['financeiro_'] =  $this->financeiro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['numero_'] =  $this->numero_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['complemento_'] =  $this->complemento_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['razaosocialentrega_'] =  $this->razaosocialentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['entrega_'] =  $this->entrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatotecnico_'] =  $this->contatotecnico_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['logistica_'] =  $this->logistica_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['pimportado_'] =  $this->pimportado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['vendedor01_'] =  $this->vendedor01_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_form_dbo_cliente); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] < (($qt_geral_reg_form_dbo_cliente + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->cd_cliente_ = "";  
              $this->razaosocial_ = "";  
              $this->nomefantasia_ = "";  
              $this->cgc_ = "";  
              $this->inscricao_ = "";  
              $this->endereco_ = "";  
              $this->cidade_ = "";  
              $this->estado_ = "";  
              $this->bairro_ = "";  
              $this->cep_ = "";  
              $this->email_ = "";  
              $this->fone_ = "";  
              $this->fone1_ = "";  
              $this->fax_ = "";  
              $this->contato_ = "";  
              $this->enderecocobranca_ = "";  
              $this->cidadecobranca_ = "";  
              $this->bairrocobranca_ = "";  
              $this->estadocobranca_ = "";  
              $this->cepcobranca_ = "";  
              $this->fonecobranca_ = "";  
              $this->faxcobranca_ = "";  
              $this->contatocobranca_ = "";  
              $this->cgcentrega_ = "";  
              $this->inscricaoentrega_ = "";  
              $this->enderecoentrega_ = "";  
              $this->cidadeentrega_ = "";  
              $this->bairroentrega_ = "";  
              $this->estadoentrega_ = "";  
              $this->cepentrega_ = "";  
              $this->foneentrega_ = "";  
              $this->contatoentrega_ = "";  
              $this->contatoexpedicao_ = "";  
              $this->foneexpedicao_ = "";  
              $this->datacadastro_ = "";  
              $this->obs_ = "";  
              $this->tipo_ = "";  
              $this->consumidor_ = "";  
              $this->licensa_ = "";  
              $this->venctolicensa_ = "";  
              $this->licensa1_ = "";  
              $this->venctolicensa1_ = "";  
              $this->qtdeliberada_ = "";  
              $this->licensa2_ = "";  
              $this->venctolicensa2_ = "";  
              $this->icms_ = "";  
              $this->suframa_ = "";  
              $this->limitecredito_ = "";  
              $this->vendedor_ = "";  
              $this->restricao_ = "";  
              $this->comissao_ = "";  
              $this->transportadora_ = "";  
              $this->coleta_ = "";  
              $this->segmento_ = "";  
              $this->dataalteracao_ = "";  
              $this->usuario_ = "";  
              $this->requisitos_ = "";  
              $this->banco_ = "";  
              $this->emailcobranca_ = "";  
              $this->emailtecnico_ = "";  
              $this->midia_ = "";  
              $this->seg_ = "";  
              $this->ter_ = "";  
              $this->qua_ = "";  
              $this->qui_ = "";  
              $this->sex_ = "";  
              $this->certificado_ = "";  
              $this->emailnfe_ = "";  
              $this->fundacao_ = "";  
              $this->site_ = "";  
              $this->financeiro_ = "";  
              $this->numero_ = "";  
              $this->complemento_ = "";  
              $this->razaosocialentrega_ = "";  
              $this->entrega_ = "";  
              $this->contatotecnico_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cd_cliente_'] =  $this->cd_cliente_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['razaosocial_'] =  $this->razaosocial_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['nomefantasia_'] =  $this->nomefantasia_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cgc_'] =  $this->cgc_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['inscricao_'] =  $this->inscricao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['endereco_'] =  $this->endereco_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidade_'] =  $this->cidade_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estado_'] =  $this->estado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairro_'] =  $this->bairro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cep_'] =  $this->cep_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fone_'] =  $this->fone_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fone1_'] =  $this->fone1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fax_'] =  $this->fax_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contato_'] =  $this->contato_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['enderecocobranca_'] =  $this->enderecocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidadecobranca_'] =  $this->cidadecobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairrocobranca_'] =  $this->bairrocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estadocobranca_'] =  $this->estadocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cepcobranca_'] =  $this->cepcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fonecobranca_'] =  $this->fonecobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['faxcobranca_'] =  $this->faxcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatocobranca_'] =  $this->contatocobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cgcentrega_'] =  $this->cgcentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['inscricaoentrega_'] =  $this->inscricaoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['enderecoentrega_'] =  $this->enderecoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidadeentrega_'] =  $this->cidadeentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairroentrega_'] =  $this->bairroentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estadoentrega_'] =  $this->estadoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cepentrega_'] =  $this->cepentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['foneentrega_'] =  $this->foneentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatoentrega_'] =  $this->contatoentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatoexpedicao_'] =  $this->contatoexpedicao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['foneexpedicao_'] =  $this->foneexpedicao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['datacadastro_'] =  $this->datacadastro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['datacadastro__hora'] =  $this->datacadastro__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['obs_'] =  $this->obs_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['consumidor_'] =  $this->consumidor_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa_'] =  $this->licensa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa_'] =  $this->venctolicensa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa__hora'] =  $this->venctolicensa__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa1_'] =  $this->licensa1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa1_'] =  $this->venctolicensa1_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa1__hora'] =  $this->venctolicensa1__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qtdeliberada_'] =  $this->qtdeliberada_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa2_'] =  $this->licensa2_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa2_'] =  $this->venctolicensa2_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa2__hora'] =  $this->venctolicensa2__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['icms_'] =  $this->icms_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['suframa_'] =  $this->suframa_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['limitecredito_'] =  $this->limitecredito_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['vendedor_'] =  $this->vendedor_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['restricao_'] =  $this->restricao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['comissao_'] =  $this->comissao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['transportadora_'] =  $this->transportadora_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['coleta_'] =  $this->coleta_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['segmento_'] =  $this->segmento_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['dataalteracao_'] =  $this->dataalteracao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['dataalteracao__hora'] =  $this->dataalteracao__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['usuario_'] =  $this->usuario_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['requisitos_'] =  $this->requisitos_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['banco_'] =  $this->banco_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailcobranca_'] =  $this->emailcobranca_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailtecnico_'] =  $this->emailtecnico_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['midia_'] =  $this->midia_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['seg_'] =  $this->seg_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['ter_'] =  $this->ter_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qua_'] =  $this->qua_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qui_'] =  $this->qui_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['sex_'] =  $this->sex_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['certificado_'] =  $this->certificado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailnfe_'] =  $this->emailnfe_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fundacao_'] =  $this->fundacao_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fundacao__hora'] =  $this->fundacao__hora; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['site_'] =  $this->site_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['financeiro_'] =  $this->financeiro_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['numero_'] =  $this->numero_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['complemento_'] =  $this->complemento_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['razaosocialentrega_'] =  $this->razaosocialentrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['entrega_'] =  $this->entrega_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatotecnico_'] =  $this->contatotecnico_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['logistica_'] =  $this->logistica_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['pimportado_'] =  $this->pimportado_; 
             $this->form_vert_form_dbo_cliente[$sc_seq_vert]['vendedor01_'] =  $this->vendedor01_; 
              $sc_seq_vert++; 
          } 
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_dbo_cliente_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      $this->NM_case_insensitive = (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) ? true : false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_dbo_cliente_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cd_cliente", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Razaosocial", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nomefantasia", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cgc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Inscricao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Endereco", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cidade", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Estado", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Bairro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cep", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Fone", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Fone1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Fax", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Contato", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Enderecocobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cidadecobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Bairrocobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Estadocobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cepcobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Fonecobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Faxcobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Contatocobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cgcentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Inscricaoentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Enderecoentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cidadeentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Bairroentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Estadoentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cepentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Foneentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Contatoentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Contatoexpedicao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Foneexpedicao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Obs", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Tipo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Consumidor", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Licensa", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Licensa1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Qtdeliberada", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Licensa2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Icms", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Suframa", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Limitecredito", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Vendedor", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Restricao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Comissao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Transportadora", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Coleta", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Segmento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Usuario", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "REQUISITOS", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Banco", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Emailcobranca", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Emailtecnico", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Midia", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Seg", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Ter", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Qua", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Qui", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Sex", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Certificado", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Emailnfe", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Site", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Financeiro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Numero", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Complemento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Razaosocialentrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Entrega", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Contatotecnico", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Logistica", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Pimportado", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Vendedor01", $arg_search, $data_search);
      }
      if ($this->NM_case_insensitive)
      {
          $comando = str_replace("#lowerI#", "Upper(", $comando);
          $comando = str_replace("#lowerF#", ")", $comando);
      }
      else
      {
          $comando = str_replace("#lowerI#", "", $comando);
          $comando = str_replace("#lowerF#", "", $comando);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_dbo_cliente = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'] = $qt_geral_reg_form_dbo_cliente;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_dbo_cliente_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_dbo_cliente_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = " #lowerI#";
      $nm_fim_lower = "#lowerF#";
      $nm_numeric[] = "qtdeliberada";$nm_numeric[] = "icms";$nm_numeric[] = "limitecredito";$nm_numeric[] = "comissao";$nm_numeric[] = "segmento";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
         $nm_ini_lower = "";
         $nm_fim_lower = "";
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['datacadastro'] = "datetime";$Nm_datas['venctolicensa'] = "datetime";$Nm_datas['venctolicensa1'] = "datetime";$Nm_datas['venctolicensa2'] = "datetime";$Nm_datas['dataalteracao'] = "datetime";$Nm_datas['fundacao'] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
         if (isset($Nm_datas[$campo_join]))
          {
            $nm_ini_lower = "";
             $nm_fim_lower = "";
          }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 if ($this->NM_case_insensitive)
                 {
                     $Cmp  = sc_strtoupper($Cmp);
                 }
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         if ($this->NM_case_insensitive)
         {
            $campo  = sc_strtoupper($campo);
         }
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_dbo_cliente_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_dbo_cliente_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_dbo_cliente_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
