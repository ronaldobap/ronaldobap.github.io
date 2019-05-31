<?php
class form_dbo_cliente_form extends form_dbo_cliente_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " dbo.cliente"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " dbo.cliente"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php
header("X-XSS-Protection: 1; mode=block");
?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_dbo_cliente/form_dbo_cliente_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_dbo_cliente_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_dbo_cliente_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
<script type="text/javascript">
function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
     $(".scBtnGrpClick").mouseup(function(){
          event.preventDefault();
          if($(this).find("a").prop('href') != '')
          {
              $(this).find("a").click();
          }
          else
          {
              eval($(this).find("a").prop('onclick'));
          }
  });

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_dbo_cliente_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_dbo_cliente'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_dbo_cliente'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " dbo.cliente"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " dbo.cliente"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
      $tst_conf_reg = $this->Ini->str_lang . ";" . $this->Ini->str_conf_reg;
      echo "<select name=\"nmgp_idioma_t\" class=\"scFormToolbarInput\" onChange=\"document.F1.nmgp_opcao.value='change_lang_t'; setLocale(this); document.F1.submit(); return false\">";
      foreach ($this->Ini->Nm_lang_conf_region as $cada_idioma => $cada_descr)
      {
         $tmp_idioma = explode(";", $cada_idioma);
          if (is_file($this->Ini->path_lang . $tmp_idioma[0] . ".lang.php"))
          {
             $obj_sel = ($tst_conf_reg == $cada_idioma) ? " selected" : "";
             echo "  <option value=\"" . $cada_idioma . "\"" .  $obj_sel . ">" . $cada_descr . "</option>";
          }
      }
      echo "</select>";
      $NM_btn = true;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_3", "scBtnGrpShow('group_3_t')", "scBtnGrpShow('group_3_t')", "sc_btgp_btn_group_3_t", "", "pdf", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "__sc_grp__");?>
 
<?php
?>
<table style="border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000" class="SC_SubMenuButton" id="sc_btgp_div_group_3_t">
 <tr><td class="scBtnGrpBackground">
<?php
?>
</table><!-- close button group -->
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['cd_cliente_']) || $this->nmgp_cmp_hidden['cd_cliente_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['cd_cliente_'])) {
          $this->nm_new_label['cd_cliente_'] = "Cd Cliente"; } ?>

    <TD class="scFormLabelOddMult css_cd_cliente__label" id="hidden_field_label_cd_cliente_" style="<?php echo $sStyleHidden_cd_cliente_; ?>" >       
<?php
      $link_img = "";
      $SC_Label = "" . $this->nm_new_label['cd_cliente_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_cmp'] == "Cd_cliente")
      {
          $orderColName = "Cd_cliente";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = $SC_Label;
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = $SC_Label . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-Cd_cliente\" />";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-Cd_cliente\" />" . $SC_Label;
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-Cd_cliente\" />" . $SC_Label;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-Cd_cliente\" />" . $SC_Label;
      }
      ?>
<a href="javascript:nm_move('ordem', 'Cd_cliente')" class="scFormLabelLink scFormLabelLinkOddMult"><?php echo $link_img ?></a> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['razaosocial_']) && $this->nmgp_cmp_hidden['razaosocial_'] == 'off') { $sStyleHidden_razaosocial_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['razaosocial_']) || $this->nmgp_cmp_hidden['razaosocial_'] == 'on') {
      if (!isset($this->nm_new_label['razaosocial_'])) {
          $this->nm_new_label['razaosocial_'] = "Razaosocial"; } ?>

    <TD class="scFormLabelOddMult css_razaosocial__label" id="hidden_field_label_razaosocial_" style="<?php echo $sStyleHidden_razaosocial_; ?>" >       
<?php
      $link_img = "";
      $SC_Label = "" . $this->nm_new_label['razaosocial_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_cmp'] == "Razaosocial")
      {
          $orderColName = "Razaosocial";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      if (empty($nome_img))
      {
          $link_img = $SC_Label;
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = $SC_Label . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-Razaosocial\" />";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-Razaosocial\" />" . $SC_Label;
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<IMG style=\"float: right\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-Razaosocial\" />" . $SC_Label;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG style=\"float: left\" SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-Razaosocial\" />" . $SC_Label;
      }
      ?>
<a href="javascript:nm_move('ordem', 'Razaosocial')" class="scFormLabelLink scFormLabelLinkOddMult"><?php echo $link_img ?></a> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nomefantasia_']) && $this->nmgp_cmp_hidden['nomefantasia_'] == 'off') { $sStyleHidden_nomefantasia_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nomefantasia_']) || $this->nmgp_cmp_hidden['nomefantasia_'] == 'on') {
      if (!isset($this->nm_new_label['nomefantasia_'])) {
          $this->nm_new_label['nomefantasia_'] = "Nomefantasia"; } ?>

    <TD class="scFormLabelOddMult css_nomefantasia__label" id="hidden_field_label_nomefantasia_" style="<?php echo $sStyleHidden_nomefantasia_; ?>" > <?php echo $this->nm_new_label['nomefantasia_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cgc_']) && $this->nmgp_cmp_hidden['cgc_'] == 'off') { $sStyleHidden_cgc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cgc_']) || $this->nmgp_cmp_hidden['cgc_'] == 'on') {
      if (!isset($this->nm_new_label['cgc_'])) {
          $this->nm_new_label['cgc_'] = "Cgc"; } ?>

    <TD class="scFormLabelOddMult css_cgc__label" id="hidden_field_label_cgc_" style="<?php echo $sStyleHidden_cgc_; ?>" > <?php echo $this->nm_new_label['cgc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['inscricao_']) && $this->nmgp_cmp_hidden['inscricao_'] == 'off') { $sStyleHidden_inscricao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['inscricao_']) || $this->nmgp_cmp_hidden['inscricao_'] == 'on') {
      if (!isset($this->nm_new_label['inscricao_'])) {
          $this->nm_new_label['inscricao_'] = "Inscricao"; } ?>

    <TD class="scFormLabelOddMult css_inscricao__label" id="hidden_field_label_inscricao_" style="<?php echo $sStyleHidden_inscricao_; ?>" > <?php echo $this->nm_new_label['inscricao_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['endereco_']) && $this->nmgp_cmp_hidden['endereco_'] == 'off') { $sStyleHidden_endereco_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['endereco_']) || $this->nmgp_cmp_hidden['endereco_'] == 'on') {
      if (!isset($this->nm_new_label['endereco_'])) {
          $this->nm_new_label['endereco_'] = "Endereco"; } ?>

    <TD class="scFormLabelOddMult css_endereco__label" id="hidden_field_label_endereco_" style="<?php echo $sStyleHidden_endereco_; ?>" > <?php echo $this->nm_new_label['endereco_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cidade_']) && $this->nmgp_cmp_hidden['cidade_'] == 'off') { $sStyleHidden_cidade_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cidade_']) || $this->nmgp_cmp_hidden['cidade_'] == 'on') {
      if (!isset($this->nm_new_label['cidade_'])) {
          $this->nm_new_label['cidade_'] = "Cidade"; } ?>

    <TD class="scFormLabelOddMult css_cidade__label" id="hidden_field_label_cidade_" style="<?php echo $sStyleHidden_cidade_; ?>" > <?php echo $this->nm_new_label['cidade_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['estado_']) && $this->nmgp_cmp_hidden['estado_'] == 'off') { $sStyleHidden_estado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['estado_']) || $this->nmgp_cmp_hidden['estado_'] == 'on') {
      if (!isset($this->nm_new_label['estado_'])) {
          $this->nm_new_label['estado_'] = "Estado"; } ?>

    <TD class="scFormLabelOddMult css_estado__label" id="hidden_field_label_estado_" style="<?php echo $sStyleHidden_estado_; ?>" > <?php echo $this->nm_new_label['estado_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['bairro_']) && $this->nmgp_cmp_hidden['bairro_'] == 'off') { $sStyleHidden_bairro_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['bairro_']) || $this->nmgp_cmp_hidden['bairro_'] == 'on') {
      if (!isset($this->nm_new_label['bairro_'])) {
          $this->nm_new_label['bairro_'] = "Bairro"; } ?>

    <TD class="scFormLabelOddMult css_bairro__label" id="hidden_field_label_bairro_" style="<?php echo $sStyleHidden_bairro_; ?>" > <?php echo $this->nm_new_label['bairro_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cep_']) && $this->nmgp_cmp_hidden['cep_'] == 'off') { $sStyleHidden_cep_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cep_']) || $this->nmgp_cmp_hidden['cep_'] == 'on') {
      if (!isset($this->nm_new_label['cep_'])) {
          $this->nm_new_label['cep_'] = "Cep"; } ?>

    <TD class="scFormLabelOddMult css_cep__label" id="hidden_field_label_cep_" style="<?php echo $sStyleHidden_cep_; ?>" > <?php echo $this->nm_new_label['cep_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['email_']) && $this->nmgp_cmp_hidden['email_'] == 'off') { $sStyleHidden_email_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['email_']) || $this->nmgp_cmp_hidden['email_'] == 'on') {
      if (!isset($this->nm_new_label['email_'])) {
          $this->nm_new_label['email_'] = "Email"; } ?>

    <TD class="scFormLabelOddMult css_email__label" id="hidden_field_label_email_" style="<?php echo $sStyleHidden_email_; ?>" > <?php echo $this->nm_new_label['email_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fone_']) && $this->nmgp_cmp_hidden['fone_'] == 'off') { $sStyleHidden_fone_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fone_']) || $this->nmgp_cmp_hidden['fone_'] == 'on') {
      if (!isset($this->nm_new_label['fone_'])) {
          $this->nm_new_label['fone_'] = "Fone"; } ?>

    <TD class="scFormLabelOddMult css_fone__label" id="hidden_field_label_fone_" style="<?php echo $sStyleHidden_fone_; ?>" > <?php echo $this->nm_new_label['fone_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fone1_']) && $this->nmgp_cmp_hidden['fone1_'] == 'off') { $sStyleHidden_fone1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fone1_']) || $this->nmgp_cmp_hidden['fone1_'] == 'on') {
      if (!isset($this->nm_new_label['fone1_'])) {
          $this->nm_new_label['fone1_'] = "Fone 1"; } ?>

    <TD class="scFormLabelOddMult css_fone1__label" id="hidden_field_label_fone1_" style="<?php echo $sStyleHidden_fone1_; ?>" > <?php echo $this->nm_new_label['fone1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fax_']) && $this->nmgp_cmp_hidden['fax_'] == 'off') { $sStyleHidden_fax_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fax_']) || $this->nmgp_cmp_hidden['fax_'] == 'on') {
      if (!isset($this->nm_new_label['fax_'])) {
          $this->nm_new_label['fax_'] = "Fax"; } ?>

    <TD class="scFormLabelOddMult css_fax__label" id="hidden_field_label_fax_" style="<?php echo $sStyleHidden_fax_; ?>" > <?php echo $this->nm_new_label['fax_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['contato_']) && $this->nmgp_cmp_hidden['contato_'] == 'off') { $sStyleHidden_contato_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['contato_']) || $this->nmgp_cmp_hidden['contato_'] == 'on') {
      if (!isset($this->nm_new_label['contato_'])) {
          $this->nm_new_label['contato_'] = "Contato"; } ?>

    <TD class="scFormLabelOddMult css_contato__label" id="hidden_field_label_contato_" style="<?php echo $sStyleHidden_contato_; ?>" > <?php echo $this->nm_new_label['contato_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['enderecocobranca_']) && $this->nmgp_cmp_hidden['enderecocobranca_'] == 'off') { $sStyleHidden_enderecocobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['enderecocobranca_']) || $this->nmgp_cmp_hidden['enderecocobranca_'] == 'on') {
      if (!isset($this->nm_new_label['enderecocobranca_'])) {
          $this->nm_new_label['enderecocobranca_'] = "Enderecocobranca"; } ?>

    <TD class="scFormLabelOddMult css_enderecocobranca__label" id="hidden_field_label_enderecocobranca_" style="<?php echo $sStyleHidden_enderecocobranca_; ?>" > <?php echo $this->nm_new_label['enderecocobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cidadecobranca_']) && $this->nmgp_cmp_hidden['cidadecobranca_'] == 'off') { $sStyleHidden_cidadecobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cidadecobranca_']) || $this->nmgp_cmp_hidden['cidadecobranca_'] == 'on') {
      if (!isset($this->nm_new_label['cidadecobranca_'])) {
          $this->nm_new_label['cidadecobranca_'] = "Cidadecobranca"; } ?>

    <TD class="scFormLabelOddMult css_cidadecobranca__label" id="hidden_field_label_cidadecobranca_" style="<?php echo $sStyleHidden_cidadecobranca_; ?>" > <?php echo $this->nm_new_label['cidadecobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['bairrocobranca_']) && $this->nmgp_cmp_hidden['bairrocobranca_'] == 'off') { $sStyleHidden_bairrocobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['bairrocobranca_']) || $this->nmgp_cmp_hidden['bairrocobranca_'] == 'on') {
      if (!isset($this->nm_new_label['bairrocobranca_'])) {
          $this->nm_new_label['bairrocobranca_'] = "Bairrocobranca"; } ?>

    <TD class="scFormLabelOddMult css_bairrocobranca__label" id="hidden_field_label_bairrocobranca_" style="<?php echo $sStyleHidden_bairrocobranca_; ?>" > <?php echo $this->nm_new_label['bairrocobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['estadocobranca_']) && $this->nmgp_cmp_hidden['estadocobranca_'] == 'off') { $sStyleHidden_estadocobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['estadocobranca_']) || $this->nmgp_cmp_hidden['estadocobranca_'] == 'on') {
      if (!isset($this->nm_new_label['estadocobranca_'])) {
          $this->nm_new_label['estadocobranca_'] = "Estadocobranca"; } ?>

    <TD class="scFormLabelOddMult css_estadocobranca__label" id="hidden_field_label_estadocobranca_" style="<?php echo $sStyleHidden_estadocobranca_; ?>" > <?php echo $this->nm_new_label['estadocobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cepcobranca_']) && $this->nmgp_cmp_hidden['cepcobranca_'] == 'off') { $sStyleHidden_cepcobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cepcobranca_']) || $this->nmgp_cmp_hidden['cepcobranca_'] == 'on') {
      if (!isset($this->nm_new_label['cepcobranca_'])) {
          $this->nm_new_label['cepcobranca_'] = "Cepcobranca"; } ?>

    <TD class="scFormLabelOddMult css_cepcobranca__label" id="hidden_field_label_cepcobranca_" style="<?php echo $sStyleHidden_cepcobranca_; ?>" > <?php echo $this->nm_new_label['cepcobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fonecobranca_']) && $this->nmgp_cmp_hidden['fonecobranca_'] == 'off') { $sStyleHidden_fonecobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fonecobranca_']) || $this->nmgp_cmp_hidden['fonecobranca_'] == 'on') {
      if (!isset($this->nm_new_label['fonecobranca_'])) {
          $this->nm_new_label['fonecobranca_'] = "Fonecobranca"; } ?>

    <TD class="scFormLabelOddMult css_fonecobranca__label" id="hidden_field_label_fonecobranca_" style="<?php echo $sStyleHidden_fonecobranca_; ?>" > <?php echo $this->nm_new_label['fonecobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['faxcobranca_']) && $this->nmgp_cmp_hidden['faxcobranca_'] == 'off') { $sStyleHidden_faxcobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['faxcobranca_']) || $this->nmgp_cmp_hidden['faxcobranca_'] == 'on') {
      if (!isset($this->nm_new_label['faxcobranca_'])) {
          $this->nm_new_label['faxcobranca_'] = "Faxcobranca"; } ?>

    <TD class="scFormLabelOddMult css_faxcobranca__label" id="hidden_field_label_faxcobranca_" style="<?php echo $sStyleHidden_faxcobranca_; ?>" > <?php echo $this->nm_new_label['faxcobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['contatocobranca_']) && $this->nmgp_cmp_hidden['contatocobranca_'] == 'off') { $sStyleHidden_contatocobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['contatocobranca_']) || $this->nmgp_cmp_hidden['contatocobranca_'] == 'on') {
      if (!isset($this->nm_new_label['contatocobranca_'])) {
          $this->nm_new_label['contatocobranca_'] = "Contatocobranca"; } ?>

    <TD class="scFormLabelOddMult css_contatocobranca__label" id="hidden_field_label_contatocobranca_" style="<?php echo $sStyleHidden_contatocobranca_; ?>" > <?php echo $this->nm_new_label['contatocobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cgcentrega_']) && $this->nmgp_cmp_hidden['cgcentrega_'] == 'off') { $sStyleHidden_cgcentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cgcentrega_']) || $this->nmgp_cmp_hidden['cgcentrega_'] == 'on') {
      if (!isset($this->nm_new_label['cgcentrega_'])) {
          $this->nm_new_label['cgcentrega_'] = "Cgcentrega"; } ?>

    <TD class="scFormLabelOddMult css_cgcentrega__label" id="hidden_field_label_cgcentrega_" style="<?php echo $sStyleHidden_cgcentrega_; ?>" > <?php echo $this->nm_new_label['cgcentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['inscricaoentrega_']) && $this->nmgp_cmp_hidden['inscricaoentrega_'] == 'off') { $sStyleHidden_inscricaoentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['inscricaoentrega_']) || $this->nmgp_cmp_hidden['inscricaoentrega_'] == 'on') {
      if (!isset($this->nm_new_label['inscricaoentrega_'])) {
          $this->nm_new_label['inscricaoentrega_'] = "Inscricaoentrega"; } ?>

    <TD class="scFormLabelOddMult css_inscricaoentrega__label" id="hidden_field_label_inscricaoentrega_" style="<?php echo $sStyleHidden_inscricaoentrega_; ?>" > <?php echo $this->nm_new_label['inscricaoentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['enderecoentrega_']) && $this->nmgp_cmp_hidden['enderecoentrega_'] == 'off') { $sStyleHidden_enderecoentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['enderecoentrega_']) || $this->nmgp_cmp_hidden['enderecoentrega_'] == 'on') {
      if (!isset($this->nm_new_label['enderecoentrega_'])) {
          $this->nm_new_label['enderecoentrega_'] = "Enderecoentrega"; } ?>

    <TD class="scFormLabelOddMult css_enderecoentrega__label" id="hidden_field_label_enderecoentrega_" style="<?php echo $sStyleHidden_enderecoentrega_; ?>" > <?php echo $this->nm_new_label['enderecoentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cidadeentrega_']) && $this->nmgp_cmp_hidden['cidadeentrega_'] == 'off') { $sStyleHidden_cidadeentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cidadeentrega_']) || $this->nmgp_cmp_hidden['cidadeentrega_'] == 'on') {
      if (!isset($this->nm_new_label['cidadeentrega_'])) {
          $this->nm_new_label['cidadeentrega_'] = "Cidadeentrega"; } ?>

    <TD class="scFormLabelOddMult css_cidadeentrega__label" id="hidden_field_label_cidadeentrega_" style="<?php echo $sStyleHidden_cidadeentrega_; ?>" > <?php echo $this->nm_new_label['cidadeentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['bairroentrega_']) && $this->nmgp_cmp_hidden['bairroentrega_'] == 'off') { $sStyleHidden_bairroentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['bairroentrega_']) || $this->nmgp_cmp_hidden['bairroentrega_'] == 'on') {
      if (!isset($this->nm_new_label['bairroentrega_'])) {
          $this->nm_new_label['bairroentrega_'] = "Bairroentrega"; } ?>

    <TD class="scFormLabelOddMult css_bairroentrega__label" id="hidden_field_label_bairroentrega_" style="<?php echo $sStyleHidden_bairroentrega_; ?>" > <?php echo $this->nm_new_label['bairroentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['estadoentrega_']) && $this->nmgp_cmp_hidden['estadoentrega_'] == 'off') { $sStyleHidden_estadoentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['estadoentrega_']) || $this->nmgp_cmp_hidden['estadoentrega_'] == 'on') {
      if (!isset($this->nm_new_label['estadoentrega_'])) {
          $this->nm_new_label['estadoentrega_'] = "Estadoentrega"; } ?>

    <TD class="scFormLabelOddMult css_estadoentrega__label" id="hidden_field_label_estadoentrega_" style="<?php echo $sStyleHidden_estadoentrega_; ?>" > <?php echo $this->nm_new_label['estadoentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['cepentrega_']) && $this->nmgp_cmp_hidden['cepentrega_'] == 'off') { $sStyleHidden_cepentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['cepentrega_']) || $this->nmgp_cmp_hidden['cepentrega_'] == 'on') {
      if (!isset($this->nm_new_label['cepentrega_'])) {
          $this->nm_new_label['cepentrega_'] = "Cepentrega"; } ?>

    <TD class="scFormLabelOddMult css_cepentrega__label" id="hidden_field_label_cepentrega_" style="<?php echo $sStyleHidden_cepentrega_; ?>" > <?php echo $this->nm_new_label['cepentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['foneentrega_']) && $this->nmgp_cmp_hidden['foneentrega_'] == 'off') { $sStyleHidden_foneentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['foneentrega_']) || $this->nmgp_cmp_hidden['foneentrega_'] == 'on') {
      if (!isset($this->nm_new_label['foneentrega_'])) {
          $this->nm_new_label['foneentrega_'] = "Foneentrega"; } ?>

    <TD class="scFormLabelOddMult css_foneentrega__label" id="hidden_field_label_foneentrega_" style="<?php echo $sStyleHidden_foneentrega_; ?>" > <?php echo $this->nm_new_label['foneentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['contatoentrega_']) && $this->nmgp_cmp_hidden['contatoentrega_'] == 'off') { $sStyleHidden_contatoentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['contatoentrega_']) || $this->nmgp_cmp_hidden['contatoentrega_'] == 'on') {
      if (!isset($this->nm_new_label['contatoentrega_'])) {
          $this->nm_new_label['contatoentrega_'] = "Contatoentrega"; } ?>

    <TD class="scFormLabelOddMult css_contatoentrega__label" id="hidden_field_label_contatoentrega_" style="<?php echo $sStyleHidden_contatoentrega_; ?>" > <?php echo $this->nm_new_label['contatoentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['contatoexpedicao_']) && $this->nmgp_cmp_hidden['contatoexpedicao_'] == 'off') { $sStyleHidden_contatoexpedicao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['contatoexpedicao_']) || $this->nmgp_cmp_hidden['contatoexpedicao_'] == 'on') {
      if (!isset($this->nm_new_label['contatoexpedicao_'])) {
          $this->nm_new_label['contatoexpedicao_'] = "Contatoexpedicao"; } ?>

    <TD class="scFormLabelOddMult css_contatoexpedicao__label" id="hidden_field_label_contatoexpedicao_" style="<?php echo $sStyleHidden_contatoexpedicao_; ?>" > <?php echo $this->nm_new_label['contatoexpedicao_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['foneexpedicao_']) && $this->nmgp_cmp_hidden['foneexpedicao_'] == 'off') { $sStyleHidden_foneexpedicao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['foneexpedicao_']) || $this->nmgp_cmp_hidden['foneexpedicao_'] == 'on') {
      if (!isset($this->nm_new_label['foneexpedicao_'])) {
          $this->nm_new_label['foneexpedicao_'] = "Foneexpedicao"; } ?>

    <TD class="scFormLabelOddMult css_foneexpedicao__label" id="hidden_field_label_foneexpedicao_" style="<?php echo $sStyleHidden_foneexpedicao_; ?>" > <?php echo $this->nm_new_label['foneexpedicao_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['datacadastro_']) && $this->nmgp_cmp_hidden['datacadastro_'] == 'off') { $sStyleHidden_datacadastro_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['datacadastro_']) || $this->nmgp_cmp_hidden['datacadastro_'] == 'on') {
      if (!isset($this->nm_new_label['datacadastro_'])) {
          $this->nm_new_label['datacadastro_'] = "Datacadastro"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['datacadastro_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_datacadastro__label" id="hidden_field_label_datacadastro_" style="<?php echo $sStyleHidden_datacadastro_; ?>" > <?php echo $this->nm_new_label['datacadastro_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sStyleHidden_obs_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['obs_']) || $this->nmgp_cmp_hidden['obs_'] == 'on') {
      if (!isset($this->nm_new_label['obs_'])) {
          $this->nm_new_label['obs_'] = "Obs"; } ?>

    <TD class="scFormLabelOddMult css_obs__label" id="hidden_field_label_obs_" style="<?php echo $sStyleHidden_obs_; ?>" > <?php echo $this->nm_new_label['obs_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sStyleHidden_tipo_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tipo_']) || $this->nmgp_cmp_hidden['tipo_'] == 'on') {
      if (!isset($this->nm_new_label['tipo_'])) {
          $this->nm_new_label['tipo_'] = "Tipo"; } ?>

    <TD class="scFormLabelOddMult css_tipo__label" id="hidden_field_label_tipo_" style="<?php echo $sStyleHidden_tipo_; ?>" > <?php echo $this->nm_new_label['tipo_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['consumidor_']) && $this->nmgp_cmp_hidden['consumidor_'] == 'off') { $sStyleHidden_consumidor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['consumidor_']) || $this->nmgp_cmp_hidden['consumidor_'] == 'on') {
      if (!isset($this->nm_new_label['consumidor_'])) {
          $this->nm_new_label['consumidor_'] = "Consumidor"; } ?>

    <TD class="scFormLabelOddMult css_consumidor__label" id="hidden_field_label_consumidor_" style="<?php echo $sStyleHidden_consumidor_; ?>" > <?php echo $this->nm_new_label['consumidor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['licensa_']) && $this->nmgp_cmp_hidden['licensa_'] == 'off') { $sStyleHidden_licensa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['licensa_']) || $this->nmgp_cmp_hidden['licensa_'] == 'on') {
      if (!isset($this->nm_new_label['licensa_'])) {
          $this->nm_new_label['licensa_'] = "Licensa"; } ?>

    <TD class="scFormLabelOddMult css_licensa__label" id="hidden_field_label_licensa_" style="<?php echo $sStyleHidden_licensa_; ?>" > <?php echo $this->nm_new_label['licensa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['venctolicensa_']) && $this->nmgp_cmp_hidden['venctolicensa_'] == 'off') { $sStyleHidden_venctolicensa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['venctolicensa_']) || $this->nmgp_cmp_hidden['venctolicensa_'] == 'on') {
      if (!isset($this->nm_new_label['venctolicensa_'])) {
          $this->nm_new_label['venctolicensa_'] = "Venctolicensa"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['venctolicensa_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_venctolicensa__label" id="hidden_field_label_venctolicensa_" style="<?php echo $sStyleHidden_venctolicensa_; ?>" > <?php echo $this->nm_new_label['venctolicensa_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['licensa1_']) && $this->nmgp_cmp_hidden['licensa1_'] == 'off') { $sStyleHidden_licensa1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['licensa1_']) || $this->nmgp_cmp_hidden['licensa1_'] == 'on') {
      if (!isset($this->nm_new_label['licensa1_'])) {
          $this->nm_new_label['licensa1_'] = "Licensa 1"; } ?>

    <TD class="scFormLabelOddMult css_licensa1__label" id="hidden_field_label_licensa1_" style="<?php echo $sStyleHidden_licensa1_; ?>" > <?php echo $this->nm_new_label['licensa1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['venctolicensa1_']) && $this->nmgp_cmp_hidden['venctolicensa1_'] == 'off') { $sStyleHidden_venctolicensa1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['venctolicensa1_']) || $this->nmgp_cmp_hidden['venctolicensa1_'] == 'on') {
      if (!isset($this->nm_new_label['venctolicensa1_'])) {
          $this->nm_new_label['venctolicensa1_'] = "Venctolicensa 1"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['venctolicensa1_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_venctolicensa1__label" id="hidden_field_label_venctolicensa1_" style="<?php echo $sStyleHidden_venctolicensa1_; ?>" > <?php echo $this->nm_new_label['venctolicensa1_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['qtdeliberada_']) && $this->nmgp_cmp_hidden['qtdeliberada_'] == 'off') { $sStyleHidden_qtdeliberada_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['qtdeliberada_']) || $this->nmgp_cmp_hidden['qtdeliberada_'] == 'on') {
      if (!isset($this->nm_new_label['qtdeliberada_'])) {
          $this->nm_new_label['qtdeliberada_'] = "Qtdeliberada"; } ?>

    <TD class="scFormLabelOddMult css_qtdeliberada__label" id="hidden_field_label_qtdeliberada_" style="<?php echo $sStyleHidden_qtdeliberada_; ?>" > <?php echo $this->nm_new_label['qtdeliberada_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['licensa2_']) && $this->nmgp_cmp_hidden['licensa2_'] == 'off') { $sStyleHidden_licensa2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['licensa2_']) || $this->nmgp_cmp_hidden['licensa2_'] == 'on') {
      if (!isset($this->nm_new_label['licensa2_'])) {
          $this->nm_new_label['licensa2_'] = "Licensa 2"; } ?>

    <TD class="scFormLabelOddMult css_licensa2__label" id="hidden_field_label_licensa2_" style="<?php echo $sStyleHidden_licensa2_; ?>" > <?php echo $this->nm_new_label['licensa2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['venctolicensa2_']) && $this->nmgp_cmp_hidden['venctolicensa2_'] == 'off') { $sStyleHidden_venctolicensa2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['venctolicensa2_']) || $this->nmgp_cmp_hidden['venctolicensa2_'] == 'on') {
      if (!isset($this->nm_new_label['venctolicensa2_'])) {
          $this->nm_new_label['venctolicensa2_'] = "Venctolicensa 2"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['venctolicensa2_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_venctolicensa2__label" id="hidden_field_label_venctolicensa2_" style="<?php echo $sStyleHidden_venctolicensa2_; ?>" > <?php echo $this->nm_new_label['venctolicensa2_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['icms_']) && $this->nmgp_cmp_hidden['icms_'] == 'off') { $sStyleHidden_icms_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['icms_']) || $this->nmgp_cmp_hidden['icms_'] == 'on') {
      if (!isset($this->nm_new_label['icms_'])) {
          $this->nm_new_label['icms_'] = "Icms"; } ?>

    <TD class="scFormLabelOddMult css_icms__label" id="hidden_field_label_icms_" style="<?php echo $sStyleHidden_icms_; ?>" > <?php echo $this->nm_new_label['icms_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['suframa_']) && $this->nmgp_cmp_hidden['suframa_'] == 'off') { $sStyleHidden_suframa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['suframa_']) || $this->nmgp_cmp_hidden['suframa_'] == 'on') {
      if (!isset($this->nm_new_label['suframa_'])) {
          $this->nm_new_label['suframa_'] = "Suframa"; } ?>

    <TD class="scFormLabelOddMult css_suframa__label" id="hidden_field_label_suframa_" style="<?php echo $sStyleHidden_suframa_; ?>" > <?php echo $this->nm_new_label['suframa_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['limitecredito_']) && $this->nmgp_cmp_hidden['limitecredito_'] == 'off') { $sStyleHidden_limitecredito_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['limitecredito_']) || $this->nmgp_cmp_hidden['limitecredito_'] == 'on') {
      if (!isset($this->nm_new_label['limitecredito_'])) {
          $this->nm_new_label['limitecredito_'] = "Limitecredito"; } ?>

    <TD class="scFormLabelOddMult css_limitecredito__label" id="hidden_field_label_limitecredito_" style="<?php echo $sStyleHidden_limitecredito_; ?>" > <?php echo $this->nm_new_label['limitecredito_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['vendedor_']) && $this->nmgp_cmp_hidden['vendedor_'] == 'off') { $sStyleHidden_vendedor_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['vendedor_']) || $this->nmgp_cmp_hidden['vendedor_'] == 'on') {
      if (!isset($this->nm_new_label['vendedor_'])) {
          $this->nm_new_label['vendedor_'] = "Vendedor"; } ?>

    <TD class="scFormLabelOddMult css_vendedor__label" id="hidden_field_label_vendedor_" style="<?php echo $sStyleHidden_vendedor_; ?>" > <?php echo $this->nm_new_label['vendedor_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['restricao_']) && $this->nmgp_cmp_hidden['restricao_'] == 'off') { $sStyleHidden_restricao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['restricao_']) || $this->nmgp_cmp_hidden['restricao_'] == 'on') {
      if (!isset($this->nm_new_label['restricao_'])) {
          $this->nm_new_label['restricao_'] = "Restricao"; } ?>

    <TD class="scFormLabelOddMult css_restricao__label" id="hidden_field_label_restricao_" style="<?php echo $sStyleHidden_restricao_; ?>" > <?php echo $this->nm_new_label['restricao_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['comissao_']) && $this->nmgp_cmp_hidden['comissao_'] == 'off') { $sStyleHidden_comissao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['comissao_']) || $this->nmgp_cmp_hidden['comissao_'] == 'on') {
      if (!isset($this->nm_new_label['comissao_'])) {
          $this->nm_new_label['comissao_'] = "Comissao"; } ?>

    <TD class="scFormLabelOddMult css_comissao__label" id="hidden_field_label_comissao_" style="<?php echo $sStyleHidden_comissao_; ?>" > <?php echo $this->nm_new_label['comissao_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['transportadora_']) && $this->nmgp_cmp_hidden['transportadora_'] == 'off') { $sStyleHidden_transportadora_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['transportadora_']) || $this->nmgp_cmp_hidden['transportadora_'] == 'on') {
      if (!isset($this->nm_new_label['transportadora_'])) {
          $this->nm_new_label['transportadora_'] = "Transportadora"; } ?>

    <TD class="scFormLabelOddMult css_transportadora__label" id="hidden_field_label_transportadora_" style="<?php echo $sStyleHidden_transportadora_; ?>" > <?php echo $this->nm_new_label['transportadora_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['coleta_']) && $this->nmgp_cmp_hidden['coleta_'] == 'off') { $sStyleHidden_coleta_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['coleta_']) || $this->nmgp_cmp_hidden['coleta_'] == 'on') {
      if (!isset($this->nm_new_label['coleta_'])) {
          $this->nm_new_label['coleta_'] = "Coleta"; } ?>

    <TD class="scFormLabelOddMult css_coleta__label" id="hidden_field_label_coleta_" style="<?php echo $sStyleHidden_coleta_; ?>" > <?php echo $this->nm_new_label['coleta_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['segmento_']) && $this->nmgp_cmp_hidden['segmento_'] == 'off') { $sStyleHidden_segmento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['segmento_']) || $this->nmgp_cmp_hidden['segmento_'] == 'on') {
      if (!isset($this->nm_new_label['segmento_'])) {
          $this->nm_new_label['segmento_'] = "Segmento"; } ?>

    <TD class="scFormLabelOddMult css_segmento__label" id="hidden_field_label_segmento_" style="<?php echo $sStyleHidden_segmento_; ?>" > <?php echo $this->nm_new_label['segmento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dataalteracao_']) && $this->nmgp_cmp_hidden['dataalteracao_'] == 'off') { $sStyleHidden_dataalteracao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dataalteracao_']) || $this->nmgp_cmp_hidden['dataalteracao_'] == 'on') {
      if (!isset($this->nm_new_label['dataalteracao_'])) {
          $this->nm_new_label['dataalteracao_'] = "Dataalteracao"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['dataalteracao_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_dataalteracao__label" id="hidden_field_label_dataalteracao_" style="<?php echo $sStyleHidden_dataalteracao_; ?>" > <?php echo $this->nm_new_label['dataalteracao_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sStyleHidden_usuario_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['usuario_']) || $this->nmgp_cmp_hidden['usuario_'] == 'on') {
      if (!isset($this->nm_new_label['usuario_'])) {
          $this->nm_new_label['usuario_'] = "Usuario"; } ?>

    <TD class="scFormLabelOddMult css_usuario__label" id="hidden_field_label_usuario_" style="<?php echo $sStyleHidden_usuario_; ?>" > <?php echo $this->nm_new_label['usuario_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['requisitos_']) && $this->nmgp_cmp_hidden['requisitos_'] == 'off') { $sStyleHidden_requisitos_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['requisitos_']) || $this->nmgp_cmp_hidden['requisitos_'] == 'on') {
      if (!isset($this->nm_new_label['requisitos_'])) {
          $this->nm_new_label['requisitos_'] = "REQUISITOS"; } ?>

    <TD class="scFormLabelOddMult css_requisitos__label" id="hidden_field_label_requisitos_" style="<?php echo $sStyleHidden_requisitos_; ?>" > <?php echo $this->nm_new_label['requisitos_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['banco_']) && $this->nmgp_cmp_hidden['banco_'] == 'off') { $sStyleHidden_banco_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['banco_']) || $this->nmgp_cmp_hidden['banco_'] == 'on') {
      if (!isset($this->nm_new_label['banco_'])) {
          $this->nm_new_label['banco_'] = "Banco"; } ?>

    <TD class="scFormLabelOddMult css_banco__label" id="hidden_field_label_banco_" style="<?php echo $sStyleHidden_banco_; ?>" > <?php echo $this->nm_new_label['banco_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['emailcobranca_']) && $this->nmgp_cmp_hidden['emailcobranca_'] == 'off') { $sStyleHidden_emailcobranca_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['emailcobranca_']) || $this->nmgp_cmp_hidden['emailcobranca_'] == 'on') {
      if (!isset($this->nm_new_label['emailcobranca_'])) {
          $this->nm_new_label['emailcobranca_'] = "Emailcobranca"; } ?>

    <TD class="scFormLabelOddMult css_emailcobranca__label" id="hidden_field_label_emailcobranca_" style="<?php echo $sStyleHidden_emailcobranca_; ?>" > <?php echo $this->nm_new_label['emailcobranca_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['emailtecnico_']) && $this->nmgp_cmp_hidden['emailtecnico_'] == 'off') { $sStyleHidden_emailtecnico_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['emailtecnico_']) || $this->nmgp_cmp_hidden['emailtecnico_'] == 'on') {
      if (!isset($this->nm_new_label['emailtecnico_'])) {
          $this->nm_new_label['emailtecnico_'] = "Emailtecnico"; } ?>

    <TD class="scFormLabelOddMult css_emailtecnico__label" id="hidden_field_label_emailtecnico_" style="<?php echo $sStyleHidden_emailtecnico_; ?>" > <?php echo $this->nm_new_label['emailtecnico_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['midia_']) && $this->nmgp_cmp_hidden['midia_'] == 'off') { $sStyleHidden_midia_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['midia_']) || $this->nmgp_cmp_hidden['midia_'] == 'on') {
      if (!isset($this->nm_new_label['midia_'])) {
          $this->nm_new_label['midia_'] = "Midia"; } ?>

    <TD class="scFormLabelOddMult css_midia__label" id="hidden_field_label_midia_" style="<?php echo $sStyleHidden_midia_; ?>" > <?php echo $this->nm_new_label['midia_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['seg_']) && $this->nmgp_cmp_hidden['seg_'] == 'off') { $sStyleHidden_seg_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['seg_']) || $this->nmgp_cmp_hidden['seg_'] == 'on') {
      if (!isset($this->nm_new_label['seg_'])) {
          $this->nm_new_label['seg_'] = "Seg"; } ?>

    <TD class="scFormLabelOddMult css_seg__label" id="hidden_field_label_seg_" style="<?php echo $sStyleHidden_seg_; ?>" > <?php echo $this->nm_new_label['seg_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['ter_']) && $this->nmgp_cmp_hidden['ter_'] == 'off') { $sStyleHidden_ter_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['ter_']) || $this->nmgp_cmp_hidden['ter_'] == 'on') {
      if (!isset($this->nm_new_label['ter_'])) {
          $this->nm_new_label['ter_'] = "Ter"; } ?>

    <TD class="scFormLabelOddMult css_ter__label" id="hidden_field_label_ter_" style="<?php echo $sStyleHidden_ter_; ?>" > <?php echo $this->nm_new_label['ter_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['qua_']) && $this->nmgp_cmp_hidden['qua_'] == 'off') { $sStyleHidden_qua_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['qua_']) || $this->nmgp_cmp_hidden['qua_'] == 'on') {
      if (!isset($this->nm_new_label['qua_'])) {
          $this->nm_new_label['qua_'] = "Qua"; } ?>

    <TD class="scFormLabelOddMult css_qua__label" id="hidden_field_label_qua_" style="<?php echo $sStyleHidden_qua_; ?>" > <?php echo $this->nm_new_label['qua_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['qui_']) && $this->nmgp_cmp_hidden['qui_'] == 'off') { $sStyleHidden_qui_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['qui_']) || $this->nmgp_cmp_hidden['qui_'] == 'on') {
      if (!isset($this->nm_new_label['qui_'])) {
          $this->nm_new_label['qui_'] = "Qui"; } ?>

    <TD class="scFormLabelOddMult css_qui__label" id="hidden_field_label_qui_" style="<?php echo $sStyleHidden_qui_; ?>" > <?php echo $this->nm_new_label['qui_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sex_']) && $this->nmgp_cmp_hidden['sex_'] == 'off') { $sStyleHidden_sex_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sex_']) || $this->nmgp_cmp_hidden['sex_'] == 'on') {
      if (!isset($this->nm_new_label['sex_'])) {
          $this->nm_new_label['sex_'] = "Sex"; } ?>

    <TD class="scFormLabelOddMult css_sex__label" id="hidden_field_label_sex_" style="<?php echo $sStyleHidden_sex_; ?>" > <?php echo $this->nm_new_label['sex_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['certificado_']) && $this->nmgp_cmp_hidden['certificado_'] == 'off') { $sStyleHidden_certificado_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['certificado_']) || $this->nmgp_cmp_hidden['certificado_'] == 'on') {
      if (!isset($this->nm_new_label['certificado_'])) {
          $this->nm_new_label['certificado_'] = "Certificado"; } ?>

    <TD class="scFormLabelOddMult css_certificado__label" id="hidden_field_label_certificado_" style="<?php echo $sStyleHidden_certificado_; ?>" > <?php echo $this->nm_new_label['certificado_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['emailnfe_']) && $this->nmgp_cmp_hidden['emailnfe_'] == 'off') { $sStyleHidden_emailnfe_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['emailnfe_']) || $this->nmgp_cmp_hidden['emailnfe_'] == 'on') {
      if (!isset($this->nm_new_label['emailnfe_'])) {
          $this->nm_new_label['emailnfe_'] = "Emailnfe"; } ?>

    <TD class="scFormLabelOddMult css_emailnfe__label" id="hidden_field_label_emailnfe_" style="<?php echo $sStyleHidden_emailnfe_; ?>" > <?php echo $this->nm_new_label['emailnfe_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['fundacao_']) && $this->nmgp_cmp_hidden['fundacao_'] == 'off') { $sStyleHidden_fundacao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['fundacao_']) || $this->nmgp_cmp_hidden['fundacao_'] == 'on') {
      if (!isset($this->nm_new_label['fundacao_'])) {
          $this->nm_new_label['fundacao_'] = "Fundacao"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['fundacao_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_fundacao__label" id="hidden_field_label_fundacao_" style="<?php echo $sStyleHidden_fundacao_; ?>" > <?php echo $this->nm_new_label['fundacao_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['site_']) && $this->nmgp_cmp_hidden['site_'] == 'off') { $sStyleHidden_site_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['site_']) || $this->nmgp_cmp_hidden['site_'] == 'on') {
      if (!isset($this->nm_new_label['site_'])) {
          $this->nm_new_label['site_'] = "Site"; } ?>

    <TD class="scFormLabelOddMult css_site__label" id="hidden_field_label_site_" style="<?php echo $sStyleHidden_site_; ?>" > <?php echo $this->nm_new_label['site_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['financeiro_']) && $this->nmgp_cmp_hidden['financeiro_'] == 'off') { $sStyleHidden_financeiro_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['financeiro_']) || $this->nmgp_cmp_hidden['financeiro_'] == 'on') {
      if (!isset($this->nm_new_label['financeiro_'])) {
          $this->nm_new_label['financeiro_'] = "Financeiro"; } ?>

    <TD class="scFormLabelOddMult css_financeiro__label" id="hidden_field_label_financeiro_" style="<?php echo $sStyleHidden_financeiro_; ?>" > <?php echo $this->nm_new_label['financeiro_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off') { $sStyleHidden_numero_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['numero_']) || $this->nmgp_cmp_hidden['numero_'] == 'on') {
      if (!isset($this->nm_new_label['numero_'])) {
          $this->nm_new_label['numero_'] = "Numero"; } ?>

    <TD class="scFormLabelOddMult css_numero__label" id="hidden_field_label_numero_" style="<?php echo $sStyleHidden_numero_; ?>" > <?php echo $this->nm_new_label['numero_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['complemento_']) && $this->nmgp_cmp_hidden['complemento_'] == 'off') { $sStyleHidden_complemento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['complemento_']) || $this->nmgp_cmp_hidden['complemento_'] == 'on') {
      if (!isset($this->nm_new_label['complemento_'])) {
          $this->nm_new_label['complemento_'] = "Complemento"; } ?>

    <TD class="scFormLabelOddMult css_complemento__label" id="hidden_field_label_complemento_" style="<?php echo $sStyleHidden_complemento_; ?>" > <?php echo $this->nm_new_label['complemento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['razaosocialentrega_']) && $this->nmgp_cmp_hidden['razaosocialentrega_'] == 'off') { $sStyleHidden_razaosocialentrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['razaosocialentrega_']) || $this->nmgp_cmp_hidden['razaosocialentrega_'] == 'on') {
      if (!isset($this->nm_new_label['razaosocialentrega_'])) {
          $this->nm_new_label['razaosocialentrega_'] = "Razaosocialentrega"; } ?>

    <TD class="scFormLabelOddMult css_razaosocialentrega__label" id="hidden_field_label_razaosocialentrega_" style="<?php echo $sStyleHidden_razaosocialentrega_; ?>" > <?php echo $this->nm_new_label['razaosocialentrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['entrega_']) && $this->nmgp_cmp_hidden['entrega_'] == 'off') { $sStyleHidden_entrega_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['entrega_']) || $this->nmgp_cmp_hidden['entrega_'] == 'on') {
      if (!isset($this->nm_new_label['entrega_'])) {
          $this->nm_new_label['entrega_'] = "Entrega"; } ?>

    <TD class="scFormLabelOddMult css_entrega__label" id="hidden_field_label_entrega_" style="<?php echo $sStyleHidden_entrega_; ?>" > <?php echo $this->nm_new_label['entrega_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['contatotecnico_']) && $this->nmgp_cmp_hidden['contatotecnico_'] == 'off') { $sStyleHidden_contatotecnico_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['contatotecnico_']) || $this->nmgp_cmp_hidden['contatotecnico_'] == 'on') {
      if (!isset($this->nm_new_label['contatotecnico_'])) {
          $this->nm_new_label['contatotecnico_'] = "Contatotecnico"; } ?>

    <TD class="scFormLabelOddMult css_contatotecnico__label" id="hidden_field_label_contatotecnico_" style="<?php echo $sStyleHidden_contatotecnico_; ?>" > <?php echo $this->nm_new_label['contatotecnico_'] ?> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_dbo_cliente);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_dbo_cliente = $this->form_vert_form_dbo_cliente;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_dbo_cliente))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cd_cliente_']))
           {
               $this->nmgp_cmp_readonly['cd_cliente_'] = 'on';
           }
   foreach ($this->form_vert_form_dbo_cliente as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->logistica_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['logistica_'];
       $this->pimportado_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['pimportado_'];
       $this->vendedor01_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['vendedor01_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['cd_cliente_'] = true;
           $this->nmgp_cmp_readonly['razaosocial_'] = true;
           $this->nmgp_cmp_readonly['nomefantasia_'] = true;
           $this->nmgp_cmp_readonly['cgc_'] = true;
           $this->nmgp_cmp_readonly['inscricao_'] = true;
           $this->nmgp_cmp_readonly['endereco_'] = true;
           $this->nmgp_cmp_readonly['cidade_'] = true;
           $this->nmgp_cmp_readonly['estado_'] = true;
           $this->nmgp_cmp_readonly['bairro_'] = true;
           $this->nmgp_cmp_readonly['cep_'] = true;
           $this->nmgp_cmp_readonly['email_'] = true;
           $this->nmgp_cmp_readonly['fone_'] = true;
           $this->nmgp_cmp_readonly['fone1_'] = true;
           $this->nmgp_cmp_readonly['fax_'] = true;
           $this->nmgp_cmp_readonly['contato_'] = true;
           $this->nmgp_cmp_readonly['enderecocobranca_'] = true;
           $this->nmgp_cmp_readonly['cidadecobranca_'] = true;
           $this->nmgp_cmp_readonly['bairrocobranca_'] = true;
           $this->nmgp_cmp_readonly['estadocobranca_'] = true;
           $this->nmgp_cmp_readonly['cepcobranca_'] = true;
           $this->nmgp_cmp_readonly['fonecobranca_'] = true;
           $this->nmgp_cmp_readonly['faxcobranca_'] = true;
           $this->nmgp_cmp_readonly['contatocobranca_'] = true;
           $this->nmgp_cmp_readonly['cgcentrega_'] = true;
           $this->nmgp_cmp_readonly['inscricaoentrega_'] = true;
           $this->nmgp_cmp_readonly['enderecoentrega_'] = true;
           $this->nmgp_cmp_readonly['cidadeentrega_'] = true;
           $this->nmgp_cmp_readonly['bairroentrega_'] = true;
           $this->nmgp_cmp_readonly['estadoentrega_'] = true;
           $this->nmgp_cmp_readonly['cepentrega_'] = true;
           $this->nmgp_cmp_readonly['foneentrega_'] = true;
           $this->nmgp_cmp_readonly['contatoentrega_'] = true;
           $this->nmgp_cmp_readonly['contatoexpedicao_'] = true;
           $this->nmgp_cmp_readonly['foneexpedicao_'] = true;
           $this->nmgp_cmp_readonly['datacadastro_'] = true;
           $this->nmgp_cmp_readonly['obs_'] = true;
           $this->nmgp_cmp_readonly['tipo_'] = true;
           $this->nmgp_cmp_readonly['consumidor_'] = true;
           $this->nmgp_cmp_readonly['licensa_'] = true;
           $this->nmgp_cmp_readonly['venctolicensa_'] = true;
           $this->nmgp_cmp_readonly['licensa1_'] = true;
           $this->nmgp_cmp_readonly['venctolicensa1_'] = true;
           $this->nmgp_cmp_readonly['qtdeliberada_'] = true;
           $this->nmgp_cmp_readonly['licensa2_'] = true;
           $this->nmgp_cmp_readonly['venctolicensa2_'] = true;
           $this->nmgp_cmp_readonly['icms_'] = true;
           $this->nmgp_cmp_readonly['suframa_'] = true;
           $this->nmgp_cmp_readonly['limitecredito_'] = true;
           $this->nmgp_cmp_readonly['vendedor_'] = true;
           $this->nmgp_cmp_readonly['restricao_'] = true;
           $this->nmgp_cmp_readonly['comissao_'] = true;
           $this->nmgp_cmp_readonly['transportadora_'] = true;
           $this->nmgp_cmp_readonly['coleta_'] = true;
           $this->nmgp_cmp_readonly['segmento_'] = true;
           $this->nmgp_cmp_readonly['dataalteracao_'] = true;
           $this->nmgp_cmp_readonly['usuario_'] = true;
           $this->nmgp_cmp_readonly['requisitos_'] = true;
           $this->nmgp_cmp_readonly['banco_'] = true;
           $this->nmgp_cmp_readonly['emailcobranca_'] = true;
           $this->nmgp_cmp_readonly['emailtecnico_'] = true;
           $this->nmgp_cmp_readonly['midia_'] = true;
           $this->nmgp_cmp_readonly['seg_'] = true;
           $this->nmgp_cmp_readonly['ter_'] = true;
           $this->nmgp_cmp_readonly['qua_'] = true;
           $this->nmgp_cmp_readonly['qui_'] = true;
           $this->nmgp_cmp_readonly['sex_'] = true;
           $this->nmgp_cmp_readonly['certificado_'] = true;
           $this->nmgp_cmp_readonly['emailnfe_'] = true;
           $this->nmgp_cmp_readonly['fundacao_'] = true;
           $this->nmgp_cmp_readonly['site_'] = true;
           $this->nmgp_cmp_readonly['financeiro_'] = true;
           $this->nmgp_cmp_readonly['numero_'] = true;
           $this->nmgp_cmp_readonly['complemento_'] = true;
           $this->nmgp_cmp_readonly['razaosocialentrega_'] = true;
           $this->nmgp_cmp_readonly['entrega_'] = true;
           $this->nmgp_cmp_readonly['contatotecnico_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['cd_cliente_']) || $this->nmgp_cmp_readonly['cd_cliente_'] != "on") {$this->nmgp_cmp_readonly['cd_cliente_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['razaosocial_']) || $this->nmgp_cmp_readonly['razaosocial_'] != "on") {$this->nmgp_cmp_readonly['razaosocial_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nomefantasia_']) || $this->nmgp_cmp_readonly['nomefantasia_'] != "on") {$this->nmgp_cmp_readonly['nomefantasia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cgc_']) || $this->nmgp_cmp_readonly['cgc_'] != "on") {$this->nmgp_cmp_readonly['cgc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['inscricao_']) || $this->nmgp_cmp_readonly['inscricao_'] != "on") {$this->nmgp_cmp_readonly['inscricao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['endereco_']) || $this->nmgp_cmp_readonly['endereco_'] != "on") {$this->nmgp_cmp_readonly['endereco_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cidade_']) || $this->nmgp_cmp_readonly['cidade_'] != "on") {$this->nmgp_cmp_readonly['cidade_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estado_']) || $this->nmgp_cmp_readonly['estado_'] != "on") {$this->nmgp_cmp_readonly['estado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['bairro_']) || $this->nmgp_cmp_readonly['bairro_'] != "on") {$this->nmgp_cmp_readonly['bairro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cep_']) || $this->nmgp_cmp_readonly['cep_'] != "on") {$this->nmgp_cmp_readonly['cep_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['email_']) || $this->nmgp_cmp_readonly['email_'] != "on") {$this->nmgp_cmp_readonly['email_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fone_']) || $this->nmgp_cmp_readonly['fone_'] != "on") {$this->nmgp_cmp_readonly['fone_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fone1_']) || $this->nmgp_cmp_readonly['fone1_'] != "on") {$this->nmgp_cmp_readonly['fone1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fax_']) || $this->nmgp_cmp_readonly['fax_'] != "on") {$this->nmgp_cmp_readonly['fax_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['contato_']) || $this->nmgp_cmp_readonly['contato_'] != "on") {$this->nmgp_cmp_readonly['contato_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['enderecocobranca_']) || $this->nmgp_cmp_readonly['enderecocobranca_'] != "on") {$this->nmgp_cmp_readonly['enderecocobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cidadecobranca_']) || $this->nmgp_cmp_readonly['cidadecobranca_'] != "on") {$this->nmgp_cmp_readonly['cidadecobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['bairrocobranca_']) || $this->nmgp_cmp_readonly['bairrocobranca_'] != "on") {$this->nmgp_cmp_readonly['bairrocobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estadocobranca_']) || $this->nmgp_cmp_readonly['estadocobranca_'] != "on") {$this->nmgp_cmp_readonly['estadocobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cepcobranca_']) || $this->nmgp_cmp_readonly['cepcobranca_'] != "on") {$this->nmgp_cmp_readonly['cepcobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fonecobranca_']) || $this->nmgp_cmp_readonly['fonecobranca_'] != "on") {$this->nmgp_cmp_readonly['fonecobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['faxcobranca_']) || $this->nmgp_cmp_readonly['faxcobranca_'] != "on") {$this->nmgp_cmp_readonly['faxcobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['contatocobranca_']) || $this->nmgp_cmp_readonly['contatocobranca_'] != "on") {$this->nmgp_cmp_readonly['contatocobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cgcentrega_']) || $this->nmgp_cmp_readonly['cgcentrega_'] != "on") {$this->nmgp_cmp_readonly['cgcentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['inscricaoentrega_']) || $this->nmgp_cmp_readonly['inscricaoentrega_'] != "on") {$this->nmgp_cmp_readonly['inscricaoentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['enderecoentrega_']) || $this->nmgp_cmp_readonly['enderecoentrega_'] != "on") {$this->nmgp_cmp_readonly['enderecoentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cidadeentrega_']) || $this->nmgp_cmp_readonly['cidadeentrega_'] != "on") {$this->nmgp_cmp_readonly['cidadeentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['bairroentrega_']) || $this->nmgp_cmp_readonly['bairroentrega_'] != "on") {$this->nmgp_cmp_readonly['bairroentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['estadoentrega_']) || $this->nmgp_cmp_readonly['estadoentrega_'] != "on") {$this->nmgp_cmp_readonly['estadoentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['cepentrega_']) || $this->nmgp_cmp_readonly['cepentrega_'] != "on") {$this->nmgp_cmp_readonly['cepentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['foneentrega_']) || $this->nmgp_cmp_readonly['foneentrega_'] != "on") {$this->nmgp_cmp_readonly['foneentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['contatoentrega_']) || $this->nmgp_cmp_readonly['contatoentrega_'] != "on") {$this->nmgp_cmp_readonly['contatoentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['contatoexpedicao_']) || $this->nmgp_cmp_readonly['contatoexpedicao_'] != "on") {$this->nmgp_cmp_readonly['contatoexpedicao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['foneexpedicao_']) || $this->nmgp_cmp_readonly['foneexpedicao_'] != "on") {$this->nmgp_cmp_readonly['foneexpedicao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['datacadastro_']) || $this->nmgp_cmp_readonly['datacadastro_'] != "on") {$this->nmgp_cmp_readonly['datacadastro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['obs_']) || $this->nmgp_cmp_readonly['obs_'] != "on") {$this->nmgp_cmp_readonly['obs_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tipo_']) || $this->nmgp_cmp_readonly['tipo_'] != "on") {$this->nmgp_cmp_readonly['tipo_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['consumidor_']) || $this->nmgp_cmp_readonly['consumidor_'] != "on") {$this->nmgp_cmp_readonly['consumidor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['licensa_']) || $this->nmgp_cmp_readonly['licensa_'] != "on") {$this->nmgp_cmp_readonly['licensa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['venctolicensa_']) || $this->nmgp_cmp_readonly['venctolicensa_'] != "on") {$this->nmgp_cmp_readonly['venctolicensa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['licensa1_']) || $this->nmgp_cmp_readonly['licensa1_'] != "on") {$this->nmgp_cmp_readonly['licensa1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['venctolicensa1_']) || $this->nmgp_cmp_readonly['venctolicensa1_'] != "on") {$this->nmgp_cmp_readonly['venctolicensa1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['qtdeliberada_']) || $this->nmgp_cmp_readonly['qtdeliberada_'] != "on") {$this->nmgp_cmp_readonly['qtdeliberada_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['licensa2_']) || $this->nmgp_cmp_readonly['licensa2_'] != "on") {$this->nmgp_cmp_readonly['licensa2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['venctolicensa2_']) || $this->nmgp_cmp_readonly['venctolicensa2_'] != "on") {$this->nmgp_cmp_readonly['venctolicensa2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['icms_']) || $this->nmgp_cmp_readonly['icms_'] != "on") {$this->nmgp_cmp_readonly['icms_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['suframa_']) || $this->nmgp_cmp_readonly['suframa_'] != "on") {$this->nmgp_cmp_readonly['suframa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['limitecredito_']) || $this->nmgp_cmp_readonly['limitecredito_'] != "on") {$this->nmgp_cmp_readonly['limitecredito_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['vendedor_']) || $this->nmgp_cmp_readonly['vendedor_'] != "on") {$this->nmgp_cmp_readonly['vendedor_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['restricao_']) || $this->nmgp_cmp_readonly['restricao_'] != "on") {$this->nmgp_cmp_readonly['restricao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['comissao_']) || $this->nmgp_cmp_readonly['comissao_'] != "on") {$this->nmgp_cmp_readonly['comissao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['transportadora_']) || $this->nmgp_cmp_readonly['transportadora_'] != "on") {$this->nmgp_cmp_readonly['transportadora_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['coleta_']) || $this->nmgp_cmp_readonly['coleta_'] != "on") {$this->nmgp_cmp_readonly['coleta_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['segmento_']) || $this->nmgp_cmp_readonly['segmento_'] != "on") {$this->nmgp_cmp_readonly['segmento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dataalteracao_']) || $this->nmgp_cmp_readonly['dataalteracao_'] != "on") {$this->nmgp_cmp_readonly['dataalteracao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['usuario_']) || $this->nmgp_cmp_readonly['usuario_'] != "on") {$this->nmgp_cmp_readonly['usuario_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['requisitos_']) || $this->nmgp_cmp_readonly['requisitos_'] != "on") {$this->nmgp_cmp_readonly['requisitos_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['banco_']) || $this->nmgp_cmp_readonly['banco_'] != "on") {$this->nmgp_cmp_readonly['banco_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['emailcobranca_']) || $this->nmgp_cmp_readonly['emailcobranca_'] != "on") {$this->nmgp_cmp_readonly['emailcobranca_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['emailtecnico_']) || $this->nmgp_cmp_readonly['emailtecnico_'] != "on") {$this->nmgp_cmp_readonly['emailtecnico_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['midia_']) || $this->nmgp_cmp_readonly['midia_'] != "on") {$this->nmgp_cmp_readonly['midia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['seg_']) || $this->nmgp_cmp_readonly['seg_'] != "on") {$this->nmgp_cmp_readonly['seg_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['ter_']) || $this->nmgp_cmp_readonly['ter_'] != "on") {$this->nmgp_cmp_readonly['ter_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['qua_']) || $this->nmgp_cmp_readonly['qua_'] != "on") {$this->nmgp_cmp_readonly['qua_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['qui_']) || $this->nmgp_cmp_readonly['qui_'] != "on") {$this->nmgp_cmp_readonly['qui_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sex_']) || $this->nmgp_cmp_readonly['sex_'] != "on") {$this->nmgp_cmp_readonly['sex_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['certificado_']) || $this->nmgp_cmp_readonly['certificado_'] != "on") {$this->nmgp_cmp_readonly['certificado_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['emailnfe_']) || $this->nmgp_cmp_readonly['emailnfe_'] != "on") {$this->nmgp_cmp_readonly['emailnfe_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['fundacao_']) || $this->nmgp_cmp_readonly['fundacao_'] != "on") {$this->nmgp_cmp_readonly['fundacao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['site_']) || $this->nmgp_cmp_readonly['site_'] != "on") {$this->nmgp_cmp_readonly['site_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['financeiro_']) || $this->nmgp_cmp_readonly['financeiro_'] != "on") {$this->nmgp_cmp_readonly['financeiro_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['numero_']) || $this->nmgp_cmp_readonly['numero_'] != "on") {$this->nmgp_cmp_readonly['numero_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['complemento_']) || $this->nmgp_cmp_readonly['complemento_'] != "on") {$this->nmgp_cmp_readonly['complemento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['razaosocialentrega_']) || $this->nmgp_cmp_readonly['razaosocialentrega_'] != "on") {$this->nmgp_cmp_readonly['razaosocialentrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['entrega_']) || $this->nmgp_cmp_readonly['entrega_'] != "on") {$this->nmgp_cmp_readonly['entrega_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['contatotecnico_']) || $this->nmgp_cmp_readonly['contatotecnico_'] != "on") {$this->nmgp_cmp_readonly['contatotecnico_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->cd_cliente_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cd_cliente_']; 
       $cd_cliente_ = $this->cd_cliente_; 
       $sStyleHidden_cd_cliente_ = '';
       if (isset($sCheckRead_cd_cliente_))
       {
           unset($sCheckRead_cd_cliente_);
       }
       if (isset($this->nmgp_cmp_readonly['cd_cliente_']))
       {
           $sCheckRead_cd_cliente_ = $this->nmgp_cmp_readonly['cd_cliente_'];
       }
       if (isset($this->nmgp_cmp_hidden['cd_cliente_']) && $this->nmgp_cmp_hidden['cd_cliente_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cd_cliente_']);
           $sStyleHidden_cd_cliente_ = 'display: none;';
       }
       $bTestReadOnly_cd_cliente_ = true;
       $sStyleReadLab_cd_cliente_ = 'display: none;';
       $sStyleReadInp_cd_cliente_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cd_cliente_"]) &&  $this->nmgp_cmp_readonly["cd_cliente_"] == "on"))
       {
           $bTestReadOnly_cd_cliente_ = false;
           unset($this->nmgp_cmp_readonly['cd_cliente_']);
           $sStyleReadLab_cd_cliente_ = '';
           $sStyleReadInp_cd_cliente_ = 'display: none;';
       }
       $this->razaosocial_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['razaosocial_']; 
       $razaosocial_ = $this->razaosocial_; 
       $sStyleHidden_razaosocial_ = '';
       if (isset($sCheckRead_razaosocial_))
       {
           unset($sCheckRead_razaosocial_);
       }
       if (isset($this->nmgp_cmp_readonly['razaosocial_']))
       {
           $sCheckRead_razaosocial_ = $this->nmgp_cmp_readonly['razaosocial_'];
       }
       if (isset($this->nmgp_cmp_hidden['razaosocial_']) && $this->nmgp_cmp_hidden['razaosocial_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['razaosocial_']);
           $sStyleHidden_razaosocial_ = 'display: none;';
       }
       $bTestReadOnly_razaosocial_ = true;
       $sStyleReadLab_razaosocial_ = 'display: none;';
       $sStyleReadInp_razaosocial_ = '';
       if (isset($this->nmgp_cmp_readonly['razaosocial_']) && $this->nmgp_cmp_readonly['razaosocial_'] == 'on')
       {
           $bTestReadOnly_razaosocial_ = false;
           unset($this->nmgp_cmp_readonly['razaosocial_']);
           $sStyleReadLab_razaosocial_ = '';
           $sStyleReadInp_razaosocial_ = 'display: none;';
       }
       $this->nomefantasia_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['nomefantasia_']; 
       $nomefantasia_ = $this->nomefantasia_; 
       $sStyleHidden_nomefantasia_ = '';
       if (isset($sCheckRead_nomefantasia_))
       {
           unset($sCheckRead_nomefantasia_);
       }
       if (isset($this->nmgp_cmp_readonly['nomefantasia_']))
       {
           $sCheckRead_nomefantasia_ = $this->nmgp_cmp_readonly['nomefantasia_'];
       }
       if (isset($this->nmgp_cmp_hidden['nomefantasia_']) && $this->nmgp_cmp_hidden['nomefantasia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nomefantasia_']);
           $sStyleHidden_nomefantasia_ = 'display: none;';
       }
       $bTestReadOnly_nomefantasia_ = true;
       $sStyleReadLab_nomefantasia_ = 'display: none;';
       $sStyleReadInp_nomefantasia_ = '';
       if (isset($this->nmgp_cmp_readonly['nomefantasia_']) && $this->nmgp_cmp_readonly['nomefantasia_'] == 'on')
       {
           $bTestReadOnly_nomefantasia_ = false;
           unset($this->nmgp_cmp_readonly['nomefantasia_']);
           $sStyleReadLab_nomefantasia_ = '';
           $sStyleReadInp_nomefantasia_ = 'display: none;';
       }
       $this->cgc_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cgc_']; 
       $cgc_ = $this->cgc_; 
       $sStyleHidden_cgc_ = '';
       if (isset($sCheckRead_cgc_))
       {
           unset($sCheckRead_cgc_);
       }
       if (isset($this->nmgp_cmp_readonly['cgc_']))
       {
           $sCheckRead_cgc_ = $this->nmgp_cmp_readonly['cgc_'];
       }
       if (isset($this->nmgp_cmp_hidden['cgc_']) && $this->nmgp_cmp_hidden['cgc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cgc_']);
           $sStyleHidden_cgc_ = 'display: none;';
       }
       $bTestReadOnly_cgc_ = true;
       $sStyleReadLab_cgc_ = 'display: none;';
       $sStyleReadInp_cgc_ = '';
       if (isset($this->nmgp_cmp_readonly['cgc_']) && $this->nmgp_cmp_readonly['cgc_'] == 'on')
       {
           $bTestReadOnly_cgc_ = false;
           unset($this->nmgp_cmp_readonly['cgc_']);
           $sStyleReadLab_cgc_ = '';
           $sStyleReadInp_cgc_ = 'display: none;';
       }
       $this->inscricao_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['inscricao_']; 
       $inscricao_ = $this->inscricao_; 
       $sStyleHidden_inscricao_ = '';
       if (isset($sCheckRead_inscricao_))
       {
           unset($sCheckRead_inscricao_);
       }
       if (isset($this->nmgp_cmp_readonly['inscricao_']))
       {
           $sCheckRead_inscricao_ = $this->nmgp_cmp_readonly['inscricao_'];
       }
       if (isset($this->nmgp_cmp_hidden['inscricao_']) && $this->nmgp_cmp_hidden['inscricao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['inscricao_']);
           $sStyleHidden_inscricao_ = 'display: none;';
       }
       $bTestReadOnly_inscricao_ = true;
       $sStyleReadLab_inscricao_ = 'display: none;';
       $sStyleReadInp_inscricao_ = '';
       if (isset($this->nmgp_cmp_readonly['inscricao_']) && $this->nmgp_cmp_readonly['inscricao_'] == 'on')
       {
           $bTestReadOnly_inscricao_ = false;
           unset($this->nmgp_cmp_readonly['inscricao_']);
           $sStyleReadLab_inscricao_ = '';
           $sStyleReadInp_inscricao_ = 'display: none;';
       }
       $this->endereco_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['endereco_']; 
       $endereco_ = $this->endereco_; 
       $sStyleHidden_endereco_ = '';
       if (isset($sCheckRead_endereco_))
       {
           unset($sCheckRead_endereco_);
       }
       if (isset($this->nmgp_cmp_readonly['endereco_']))
       {
           $sCheckRead_endereco_ = $this->nmgp_cmp_readonly['endereco_'];
       }
       if (isset($this->nmgp_cmp_hidden['endereco_']) && $this->nmgp_cmp_hidden['endereco_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['endereco_']);
           $sStyleHidden_endereco_ = 'display: none;';
       }
       $bTestReadOnly_endereco_ = true;
       $sStyleReadLab_endereco_ = 'display: none;';
       $sStyleReadInp_endereco_ = '';
       if (isset($this->nmgp_cmp_readonly['endereco_']) && $this->nmgp_cmp_readonly['endereco_'] == 'on')
       {
           $bTestReadOnly_endereco_ = false;
           unset($this->nmgp_cmp_readonly['endereco_']);
           $sStyleReadLab_endereco_ = '';
           $sStyleReadInp_endereco_ = 'display: none;';
       }
       $this->cidade_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidade_']; 
       $cidade_ = $this->cidade_; 
       $sStyleHidden_cidade_ = '';
       if (isset($sCheckRead_cidade_))
       {
           unset($sCheckRead_cidade_);
       }
       if (isset($this->nmgp_cmp_readonly['cidade_']))
       {
           $sCheckRead_cidade_ = $this->nmgp_cmp_readonly['cidade_'];
       }
       if (isset($this->nmgp_cmp_hidden['cidade_']) && $this->nmgp_cmp_hidden['cidade_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cidade_']);
           $sStyleHidden_cidade_ = 'display: none;';
       }
       $bTestReadOnly_cidade_ = true;
       $sStyleReadLab_cidade_ = 'display: none;';
       $sStyleReadInp_cidade_ = '';
       if (isset($this->nmgp_cmp_readonly['cidade_']) && $this->nmgp_cmp_readonly['cidade_'] == 'on')
       {
           $bTestReadOnly_cidade_ = false;
           unset($this->nmgp_cmp_readonly['cidade_']);
           $sStyleReadLab_cidade_ = '';
           $sStyleReadInp_cidade_ = 'display: none;';
       }
       $this->estado_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estado_']; 
       $estado_ = $this->estado_; 
       $sStyleHidden_estado_ = '';
       if (isset($sCheckRead_estado_))
       {
           unset($sCheckRead_estado_);
       }
       if (isset($this->nmgp_cmp_readonly['estado_']))
       {
           $sCheckRead_estado_ = $this->nmgp_cmp_readonly['estado_'];
       }
       if (isset($this->nmgp_cmp_hidden['estado_']) && $this->nmgp_cmp_hidden['estado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['estado_']);
           $sStyleHidden_estado_ = 'display: none;';
       }
       $bTestReadOnly_estado_ = true;
       $sStyleReadLab_estado_ = 'display: none;';
       $sStyleReadInp_estado_ = '';
       if (isset($this->nmgp_cmp_readonly['estado_']) && $this->nmgp_cmp_readonly['estado_'] == 'on')
       {
           $bTestReadOnly_estado_ = false;
           unset($this->nmgp_cmp_readonly['estado_']);
           $sStyleReadLab_estado_ = '';
           $sStyleReadInp_estado_ = 'display: none;';
       }
       $this->bairro_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairro_']; 
       $bairro_ = $this->bairro_; 
       $sStyleHidden_bairro_ = '';
       if (isset($sCheckRead_bairro_))
       {
           unset($sCheckRead_bairro_);
       }
       if (isset($this->nmgp_cmp_readonly['bairro_']))
       {
           $sCheckRead_bairro_ = $this->nmgp_cmp_readonly['bairro_'];
       }
       if (isset($this->nmgp_cmp_hidden['bairro_']) && $this->nmgp_cmp_hidden['bairro_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['bairro_']);
           $sStyleHidden_bairro_ = 'display: none;';
       }
       $bTestReadOnly_bairro_ = true;
       $sStyleReadLab_bairro_ = 'display: none;';
       $sStyleReadInp_bairro_ = '';
       if (isset($this->nmgp_cmp_readonly['bairro_']) && $this->nmgp_cmp_readonly['bairro_'] == 'on')
       {
           $bTestReadOnly_bairro_ = false;
           unset($this->nmgp_cmp_readonly['bairro_']);
           $sStyleReadLab_bairro_ = '';
           $sStyleReadInp_bairro_ = 'display: none;';
       }
       $this->cep_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cep_']; 
       $cep_ = $this->cep_; 
       $sStyleHidden_cep_ = '';
       if (isset($sCheckRead_cep_))
       {
           unset($sCheckRead_cep_);
       }
       if (isset($this->nmgp_cmp_readonly['cep_']))
       {
           $sCheckRead_cep_ = $this->nmgp_cmp_readonly['cep_'];
       }
       if (isset($this->nmgp_cmp_hidden['cep_']) && $this->nmgp_cmp_hidden['cep_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cep_']);
           $sStyleHidden_cep_ = 'display: none;';
       }
       $bTestReadOnly_cep_ = true;
       $sStyleReadLab_cep_ = 'display: none;';
       $sStyleReadInp_cep_ = '';
       if (isset($this->nmgp_cmp_readonly['cep_']) && $this->nmgp_cmp_readonly['cep_'] == 'on')
       {
           $bTestReadOnly_cep_ = false;
           unset($this->nmgp_cmp_readonly['cep_']);
           $sStyleReadLab_cep_ = '';
           $sStyleReadInp_cep_ = 'display: none;';
       }
       $this->email_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['email_']; 
       $email_ = $this->email_; 
       $sStyleHidden_email_ = '';
       if (isset($sCheckRead_email_))
       {
           unset($sCheckRead_email_);
       }
       if (isset($this->nmgp_cmp_readonly['email_']))
       {
           $sCheckRead_email_ = $this->nmgp_cmp_readonly['email_'];
       }
       if (isset($this->nmgp_cmp_hidden['email_']) && $this->nmgp_cmp_hidden['email_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['email_']);
           $sStyleHidden_email_ = 'display: none;';
       }
       $bTestReadOnly_email_ = true;
       $sStyleReadLab_email_ = 'display: none;';
       $sStyleReadInp_email_ = '';
       if (isset($this->nmgp_cmp_readonly['email_']) && $this->nmgp_cmp_readonly['email_'] == 'on')
       {
           $bTestReadOnly_email_ = false;
           unset($this->nmgp_cmp_readonly['email_']);
           $sStyleReadLab_email_ = '';
           $sStyleReadInp_email_ = 'display: none;';
       }
       $this->fone_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fone_']; 
       $fone_ = $this->fone_; 
       $sStyleHidden_fone_ = '';
       if (isset($sCheckRead_fone_))
       {
           unset($sCheckRead_fone_);
       }
       if (isset($this->nmgp_cmp_readonly['fone_']))
       {
           $sCheckRead_fone_ = $this->nmgp_cmp_readonly['fone_'];
       }
       if (isset($this->nmgp_cmp_hidden['fone_']) && $this->nmgp_cmp_hidden['fone_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fone_']);
           $sStyleHidden_fone_ = 'display: none;';
       }
       $bTestReadOnly_fone_ = true;
       $sStyleReadLab_fone_ = 'display: none;';
       $sStyleReadInp_fone_ = '';
       if (isset($this->nmgp_cmp_readonly['fone_']) && $this->nmgp_cmp_readonly['fone_'] == 'on')
       {
           $bTestReadOnly_fone_ = false;
           unset($this->nmgp_cmp_readonly['fone_']);
           $sStyleReadLab_fone_ = '';
           $sStyleReadInp_fone_ = 'display: none;';
       }
       $this->fone1_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fone1_']; 
       $fone1_ = $this->fone1_; 
       $sStyleHidden_fone1_ = '';
       if (isset($sCheckRead_fone1_))
       {
           unset($sCheckRead_fone1_);
       }
       if (isset($this->nmgp_cmp_readonly['fone1_']))
       {
           $sCheckRead_fone1_ = $this->nmgp_cmp_readonly['fone1_'];
       }
       if (isset($this->nmgp_cmp_hidden['fone1_']) && $this->nmgp_cmp_hidden['fone1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fone1_']);
           $sStyleHidden_fone1_ = 'display: none;';
       }
       $bTestReadOnly_fone1_ = true;
       $sStyleReadLab_fone1_ = 'display: none;';
       $sStyleReadInp_fone1_ = '';
       if (isset($this->nmgp_cmp_readonly['fone1_']) && $this->nmgp_cmp_readonly['fone1_'] == 'on')
       {
           $bTestReadOnly_fone1_ = false;
           unset($this->nmgp_cmp_readonly['fone1_']);
           $sStyleReadLab_fone1_ = '';
           $sStyleReadInp_fone1_ = 'display: none;';
       }
       $this->fax_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fax_']; 
       $fax_ = $this->fax_; 
       $sStyleHidden_fax_ = '';
       if (isset($sCheckRead_fax_))
       {
           unset($sCheckRead_fax_);
       }
       if (isset($this->nmgp_cmp_readonly['fax_']))
       {
           $sCheckRead_fax_ = $this->nmgp_cmp_readonly['fax_'];
       }
       if (isset($this->nmgp_cmp_hidden['fax_']) && $this->nmgp_cmp_hidden['fax_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fax_']);
           $sStyleHidden_fax_ = 'display: none;';
       }
       $bTestReadOnly_fax_ = true;
       $sStyleReadLab_fax_ = 'display: none;';
       $sStyleReadInp_fax_ = '';
       if (isset($this->nmgp_cmp_readonly['fax_']) && $this->nmgp_cmp_readonly['fax_'] == 'on')
       {
           $bTestReadOnly_fax_ = false;
           unset($this->nmgp_cmp_readonly['fax_']);
           $sStyleReadLab_fax_ = '';
           $sStyleReadInp_fax_ = 'display: none;';
       }
       $this->contato_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contato_']; 
       $contato_ = $this->contato_; 
       $sStyleHidden_contato_ = '';
       if (isset($sCheckRead_contato_))
       {
           unset($sCheckRead_contato_);
       }
       if (isset($this->nmgp_cmp_readonly['contato_']))
       {
           $sCheckRead_contato_ = $this->nmgp_cmp_readonly['contato_'];
       }
       if (isset($this->nmgp_cmp_hidden['contato_']) && $this->nmgp_cmp_hidden['contato_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['contato_']);
           $sStyleHidden_contato_ = 'display: none;';
       }
       $bTestReadOnly_contato_ = true;
       $sStyleReadLab_contato_ = 'display: none;';
       $sStyleReadInp_contato_ = '';
       if (isset($this->nmgp_cmp_readonly['contato_']) && $this->nmgp_cmp_readonly['contato_'] == 'on')
       {
           $bTestReadOnly_contato_ = false;
           unset($this->nmgp_cmp_readonly['contato_']);
           $sStyleReadLab_contato_ = '';
           $sStyleReadInp_contato_ = 'display: none;';
       }
       $this->enderecocobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['enderecocobranca_']; 
       $enderecocobranca_ = $this->enderecocobranca_; 
       $sStyleHidden_enderecocobranca_ = '';
       if (isset($sCheckRead_enderecocobranca_))
       {
           unset($sCheckRead_enderecocobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['enderecocobranca_']))
       {
           $sCheckRead_enderecocobranca_ = $this->nmgp_cmp_readonly['enderecocobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['enderecocobranca_']) && $this->nmgp_cmp_hidden['enderecocobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['enderecocobranca_']);
           $sStyleHidden_enderecocobranca_ = 'display: none;';
       }
       $bTestReadOnly_enderecocobranca_ = true;
       $sStyleReadLab_enderecocobranca_ = 'display: none;';
       $sStyleReadInp_enderecocobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['enderecocobranca_']) && $this->nmgp_cmp_readonly['enderecocobranca_'] == 'on')
       {
           $bTestReadOnly_enderecocobranca_ = false;
           unset($this->nmgp_cmp_readonly['enderecocobranca_']);
           $sStyleReadLab_enderecocobranca_ = '';
           $sStyleReadInp_enderecocobranca_ = 'display: none;';
       }
       $this->cidadecobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidadecobranca_']; 
       $cidadecobranca_ = $this->cidadecobranca_; 
       $sStyleHidden_cidadecobranca_ = '';
       if (isset($sCheckRead_cidadecobranca_))
       {
           unset($sCheckRead_cidadecobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['cidadecobranca_']))
       {
           $sCheckRead_cidadecobranca_ = $this->nmgp_cmp_readonly['cidadecobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['cidadecobranca_']) && $this->nmgp_cmp_hidden['cidadecobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cidadecobranca_']);
           $sStyleHidden_cidadecobranca_ = 'display: none;';
       }
       $bTestReadOnly_cidadecobranca_ = true;
       $sStyleReadLab_cidadecobranca_ = 'display: none;';
       $sStyleReadInp_cidadecobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['cidadecobranca_']) && $this->nmgp_cmp_readonly['cidadecobranca_'] == 'on')
       {
           $bTestReadOnly_cidadecobranca_ = false;
           unset($this->nmgp_cmp_readonly['cidadecobranca_']);
           $sStyleReadLab_cidadecobranca_ = '';
           $sStyleReadInp_cidadecobranca_ = 'display: none;';
       }
       $this->bairrocobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairrocobranca_']; 
       $bairrocobranca_ = $this->bairrocobranca_; 
       $sStyleHidden_bairrocobranca_ = '';
       if (isset($sCheckRead_bairrocobranca_))
       {
           unset($sCheckRead_bairrocobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['bairrocobranca_']))
       {
           $sCheckRead_bairrocobranca_ = $this->nmgp_cmp_readonly['bairrocobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['bairrocobranca_']) && $this->nmgp_cmp_hidden['bairrocobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['bairrocobranca_']);
           $sStyleHidden_bairrocobranca_ = 'display: none;';
       }
       $bTestReadOnly_bairrocobranca_ = true;
       $sStyleReadLab_bairrocobranca_ = 'display: none;';
       $sStyleReadInp_bairrocobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['bairrocobranca_']) && $this->nmgp_cmp_readonly['bairrocobranca_'] == 'on')
       {
           $bTestReadOnly_bairrocobranca_ = false;
           unset($this->nmgp_cmp_readonly['bairrocobranca_']);
           $sStyleReadLab_bairrocobranca_ = '';
           $sStyleReadInp_bairrocobranca_ = 'display: none;';
       }
       $this->estadocobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estadocobranca_']; 
       $estadocobranca_ = $this->estadocobranca_; 
       $sStyleHidden_estadocobranca_ = '';
       if (isset($sCheckRead_estadocobranca_))
       {
           unset($sCheckRead_estadocobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['estadocobranca_']))
       {
           $sCheckRead_estadocobranca_ = $this->nmgp_cmp_readonly['estadocobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['estadocobranca_']) && $this->nmgp_cmp_hidden['estadocobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['estadocobranca_']);
           $sStyleHidden_estadocobranca_ = 'display: none;';
       }
       $bTestReadOnly_estadocobranca_ = true;
       $sStyleReadLab_estadocobranca_ = 'display: none;';
       $sStyleReadInp_estadocobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['estadocobranca_']) && $this->nmgp_cmp_readonly['estadocobranca_'] == 'on')
       {
           $bTestReadOnly_estadocobranca_ = false;
           unset($this->nmgp_cmp_readonly['estadocobranca_']);
           $sStyleReadLab_estadocobranca_ = '';
           $sStyleReadInp_estadocobranca_ = 'display: none;';
       }
       $this->cepcobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cepcobranca_']; 
       $cepcobranca_ = $this->cepcobranca_; 
       $sStyleHidden_cepcobranca_ = '';
       if (isset($sCheckRead_cepcobranca_))
       {
           unset($sCheckRead_cepcobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['cepcobranca_']))
       {
           $sCheckRead_cepcobranca_ = $this->nmgp_cmp_readonly['cepcobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['cepcobranca_']) && $this->nmgp_cmp_hidden['cepcobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cepcobranca_']);
           $sStyleHidden_cepcobranca_ = 'display: none;';
       }
       $bTestReadOnly_cepcobranca_ = true;
       $sStyleReadLab_cepcobranca_ = 'display: none;';
       $sStyleReadInp_cepcobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['cepcobranca_']) && $this->nmgp_cmp_readonly['cepcobranca_'] == 'on')
       {
           $bTestReadOnly_cepcobranca_ = false;
           unset($this->nmgp_cmp_readonly['cepcobranca_']);
           $sStyleReadLab_cepcobranca_ = '';
           $sStyleReadInp_cepcobranca_ = 'display: none;';
       }
       $this->fonecobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fonecobranca_']; 
       $fonecobranca_ = $this->fonecobranca_; 
       $sStyleHidden_fonecobranca_ = '';
       if (isset($sCheckRead_fonecobranca_))
       {
           unset($sCheckRead_fonecobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['fonecobranca_']))
       {
           $sCheckRead_fonecobranca_ = $this->nmgp_cmp_readonly['fonecobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['fonecobranca_']) && $this->nmgp_cmp_hidden['fonecobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fonecobranca_']);
           $sStyleHidden_fonecobranca_ = 'display: none;';
       }
       $bTestReadOnly_fonecobranca_ = true;
       $sStyleReadLab_fonecobranca_ = 'display: none;';
       $sStyleReadInp_fonecobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['fonecobranca_']) && $this->nmgp_cmp_readonly['fonecobranca_'] == 'on')
       {
           $bTestReadOnly_fonecobranca_ = false;
           unset($this->nmgp_cmp_readonly['fonecobranca_']);
           $sStyleReadLab_fonecobranca_ = '';
           $sStyleReadInp_fonecobranca_ = 'display: none;';
       }
       $this->faxcobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['faxcobranca_']; 
       $faxcobranca_ = $this->faxcobranca_; 
       $sStyleHidden_faxcobranca_ = '';
       if (isset($sCheckRead_faxcobranca_))
       {
           unset($sCheckRead_faxcobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['faxcobranca_']))
       {
           $sCheckRead_faxcobranca_ = $this->nmgp_cmp_readonly['faxcobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['faxcobranca_']) && $this->nmgp_cmp_hidden['faxcobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['faxcobranca_']);
           $sStyleHidden_faxcobranca_ = 'display: none;';
       }
       $bTestReadOnly_faxcobranca_ = true;
       $sStyleReadLab_faxcobranca_ = 'display: none;';
       $sStyleReadInp_faxcobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['faxcobranca_']) && $this->nmgp_cmp_readonly['faxcobranca_'] == 'on')
       {
           $bTestReadOnly_faxcobranca_ = false;
           unset($this->nmgp_cmp_readonly['faxcobranca_']);
           $sStyleReadLab_faxcobranca_ = '';
           $sStyleReadInp_faxcobranca_ = 'display: none;';
       }
       $this->contatocobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatocobranca_']; 
       $contatocobranca_ = $this->contatocobranca_; 
       $sStyleHidden_contatocobranca_ = '';
       if (isset($sCheckRead_contatocobranca_))
       {
           unset($sCheckRead_contatocobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['contatocobranca_']))
       {
           $sCheckRead_contatocobranca_ = $this->nmgp_cmp_readonly['contatocobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['contatocobranca_']) && $this->nmgp_cmp_hidden['contatocobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['contatocobranca_']);
           $sStyleHidden_contatocobranca_ = 'display: none;';
       }
       $bTestReadOnly_contatocobranca_ = true;
       $sStyleReadLab_contatocobranca_ = 'display: none;';
       $sStyleReadInp_contatocobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['contatocobranca_']) && $this->nmgp_cmp_readonly['contatocobranca_'] == 'on')
       {
           $bTestReadOnly_contatocobranca_ = false;
           unset($this->nmgp_cmp_readonly['contatocobranca_']);
           $sStyleReadLab_contatocobranca_ = '';
           $sStyleReadInp_contatocobranca_ = 'display: none;';
       }
       $this->cgcentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cgcentrega_']; 
       $cgcentrega_ = $this->cgcentrega_; 
       $sStyleHidden_cgcentrega_ = '';
       if (isset($sCheckRead_cgcentrega_))
       {
           unset($sCheckRead_cgcentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['cgcentrega_']))
       {
           $sCheckRead_cgcentrega_ = $this->nmgp_cmp_readonly['cgcentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['cgcentrega_']) && $this->nmgp_cmp_hidden['cgcentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cgcentrega_']);
           $sStyleHidden_cgcentrega_ = 'display: none;';
       }
       $bTestReadOnly_cgcentrega_ = true;
       $sStyleReadLab_cgcentrega_ = 'display: none;';
       $sStyleReadInp_cgcentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['cgcentrega_']) && $this->nmgp_cmp_readonly['cgcentrega_'] == 'on')
       {
           $bTestReadOnly_cgcentrega_ = false;
           unset($this->nmgp_cmp_readonly['cgcentrega_']);
           $sStyleReadLab_cgcentrega_ = '';
           $sStyleReadInp_cgcentrega_ = 'display: none;';
       }
       $this->inscricaoentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['inscricaoentrega_']; 
       $inscricaoentrega_ = $this->inscricaoentrega_; 
       $sStyleHidden_inscricaoentrega_ = '';
       if (isset($sCheckRead_inscricaoentrega_))
       {
           unset($sCheckRead_inscricaoentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['inscricaoentrega_']))
       {
           $sCheckRead_inscricaoentrega_ = $this->nmgp_cmp_readonly['inscricaoentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['inscricaoentrega_']) && $this->nmgp_cmp_hidden['inscricaoentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['inscricaoentrega_']);
           $sStyleHidden_inscricaoentrega_ = 'display: none;';
       }
       $bTestReadOnly_inscricaoentrega_ = true;
       $sStyleReadLab_inscricaoentrega_ = 'display: none;';
       $sStyleReadInp_inscricaoentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['inscricaoentrega_']) && $this->nmgp_cmp_readonly['inscricaoentrega_'] == 'on')
       {
           $bTestReadOnly_inscricaoentrega_ = false;
           unset($this->nmgp_cmp_readonly['inscricaoentrega_']);
           $sStyleReadLab_inscricaoentrega_ = '';
           $sStyleReadInp_inscricaoentrega_ = 'display: none;';
       }
       $this->enderecoentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['enderecoentrega_']; 
       $enderecoentrega_ = $this->enderecoentrega_; 
       $sStyleHidden_enderecoentrega_ = '';
       if (isset($sCheckRead_enderecoentrega_))
       {
           unset($sCheckRead_enderecoentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['enderecoentrega_']))
       {
           $sCheckRead_enderecoentrega_ = $this->nmgp_cmp_readonly['enderecoentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['enderecoentrega_']) && $this->nmgp_cmp_hidden['enderecoentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['enderecoentrega_']);
           $sStyleHidden_enderecoentrega_ = 'display: none;';
       }
       $bTestReadOnly_enderecoentrega_ = true;
       $sStyleReadLab_enderecoentrega_ = 'display: none;';
       $sStyleReadInp_enderecoentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['enderecoentrega_']) && $this->nmgp_cmp_readonly['enderecoentrega_'] == 'on')
       {
           $bTestReadOnly_enderecoentrega_ = false;
           unset($this->nmgp_cmp_readonly['enderecoentrega_']);
           $sStyleReadLab_enderecoentrega_ = '';
           $sStyleReadInp_enderecoentrega_ = 'display: none;';
       }
       $this->cidadeentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cidadeentrega_']; 
       $cidadeentrega_ = $this->cidadeentrega_; 
       $sStyleHidden_cidadeentrega_ = '';
       if (isset($sCheckRead_cidadeentrega_))
       {
           unset($sCheckRead_cidadeentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['cidadeentrega_']))
       {
           $sCheckRead_cidadeentrega_ = $this->nmgp_cmp_readonly['cidadeentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['cidadeentrega_']) && $this->nmgp_cmp_hidden['cidadeentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cidadeentrega_']);
           $sStyleHidden_cidadeentrega_ = 'display: none;';
       }
       $bTestReadOnly_cidadeentrega_ = true;
       $sStyleReadLab_cidadeentrega_ = 'display: none;';
       $sStyleReadInp_cidadeentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['cidadeentrega_']) && $this->nmgp_cmp_readonly['cidadeentrega_'] == 'on')
       {
           $bTestReadOnly_cidadeentrega_ = false;
           unset($this->nmgp_cmp_readonly['cidadeentrega_']);
           $sStyleReadLab_cidadeentrega_ = '';
           $sStyleReadInp_cidadeentrega_ = 'display: none;';
       }
       $this->bairroentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['bairroentrega_']; 
       $bairroentrega_ = $this->bairroentrega_; 
       $sStyleHidden_bairroentrega_ = '';
       if (isset($sCheckRead_bairroentrega_))
       {
           unset($sCheckRead_bairroentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['bairroentrega_']))
       {
           $sCheckRead_bairroentrega_ = $this->nmgp_cmp_readonly['bairroentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['bairroentrega_']) && $this->nmgp_cmp_hidden['bairroentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['bairroentrega_']);
           $sStyleHidden_bairroentrega_ = 'display: none;';
       }
       $bTestReadOnly_bairroentrega_ = true;
       $sStyleReadLab_bairroentrega_ = 'display: none;';
       $sStyleReadInp_bairroentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['bairroentrega_']) && $this->nmgp_cmp_readonly['bairroentrega_'] == 'on')
       {
           $bTestReadOnly_bairroentrega_ = false;
           unset($this->nmgp_cmp_readonly['bairroentrega_']);
           $sStyleReadLab_bairroentrega_ = '';
           $sStyleReadInp_bairroentrega_ = 'display: none;';
       }
       $this->estadoentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['estadoentrega_']; 
       $estadoentrega_ = $this->estadoentrega_; 
       $sStyleHidden_estadoentrega_ = '';
       if (isset($sCheckRead_estadoentrega_))
       {
           unset($sCheckRead_estadoentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['estadoentrega_']))
       {
           $sCheckRead_estadoentrega_ = $this->nmgp_cmp_readonly['estadoentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['estadoentrega_']) && $this->nmgp_cmp_hidden['estadoentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['estadoentrega_']);
           $sStyleHidden_estadoentrega_ = 'display: none;';
       }
       $bTestReadOnly_estadoentrega_ = true;
       $sStyleReadLab_estadoentrega_ = 'display: none;';
       $sStyleReadInp_estadoentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['estadoentrega_']) && $this->nmgp_cmp_readonly['estadoentrega_'] == 'on')
       {
           $bTestReadOnly_estadoentrega_ = false;
           unset($this->nmgp_cmp_readonly['estadoentrega_']);
           $sStyleReadLab_estadoentrega_ = '';
           $sStyleReadInp_estadoentrega_ = 'display: none;';
       }
       $this->cepentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['cepentrega_']; 
       $cepentrega_ = $this->cepentrega_; 
       $sStyleHidden_cepentrega_ = '';
       if (isset($sCheckRead_cepentrega_))
       {
           unset($sCheckRead_cepentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['cepentrega_']))
       {
           $sCheckRead_cepentrega_ = $this->nmgp_cmp_readonly['cepentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['cepentrega_']) && $this->nmgp_cmp_hidden['cepentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['cepentrega_']);
           $sStyleHidden_cepentrega_ = 'display: none;';
       }
       $bTestReadOnly_cepentrega_ = true;
       $sStyleReadLab_cepentrega_ = 'display: none;';
       $sStyleReadInp_cepentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['cepentrega_']) && $this->nmgp_cmp_readonly['cepentrega_'] == 'on')
       {
           $bTestReadOnly_cepentrega_ = false;
           unset($this->nmgp_cmp_readonly['cepentrega_']);
           $sStyleReadLab_cepentrega_ = '';
           $sStyleReadInp_cepentrega_ = 'display: none;';
       }
       $this->foneentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['foneentrega_']; 
       $foneentrega_ = $this->foneentrega_; 
       $sStyleHidden_foneentrega_ = '';
       if (isset($sCheckRead_foneentrega_))
       {
           unset($sCheckRead_foneentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['foneentrega_']))
       {
           $sCheckRead_foneentrega_ = $this->nmgp_cmp_readonly['foneentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['foneentrega_']) && $this->nmgp_cmp_hidden['foneentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['foneentrega_']);
           $sStyleHidden_foneentrega_ = 'display: none;';
       }
       $bTestReadOnly_foneentrega_ = true;
       $sStyleReadLab_foneentrega_ = 'display: none;';
       $sStyleReadInp_foneentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['foneentrega_']) && $this->nmgp_cmp_readonly['foneentrega_'] == 'on')
       {
           $bTestReadOnly_foneentrega_ = false;
           unset($this->nmgp_cmp_readonly['foneentrega_']);
           $sStyleReadLab_foneentrega_ = '';
           $sStyleReadInp_foneentrega_ = 'display: none;';
       }
       $this->contatoentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatoentrega_']; 
       $contatoentrega_ = $this->contatoentrega_; 
       $sStyleHidden_contatoentrega_ = '';
       if (isset($sCheckRead_contatoentrega_))
       {
           unset($sCheckRead_contatoentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['contatoentrega_']))
       {
           $sCheckRead_contatoentrega_ = $this->nmgp_cmp_readonly['contatoentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['contatoentrega_']) && $this->nmgp_cmp_hidden['contatoentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['contatoentrega_']);
           $sStyleHidden_contatoentrega_ = 'display: none;';
       }
       $bTestReadOnly_contatoentrega_ = true;
       $sStyleReadLab_contatoentrega_ = 'display: none;';
       $sStyleReadInp_contatoentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['contatoentrega_']) && $this->nmgp_cmp_readonly['contatoentrega_'] == 'on')
       {
           $bTestReadOnly_contatoentrega_ = false;
           unset($this->nmgp_cmp_readonly['contatoentrega_']);
           $sStyleReadLab_contatoentrega_ = '';
           $sStyleReadInp_contatoentrega_ = 'display: none;';
       }
       $this->contatoexpedicao_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatoexpedicao_']; 
       $contatoexpedicao_ = $this->contatoexpedicao_; 
       $sStyleHidden_contatoexpedicao_ = '';
       if (isset($sCheckRead_contatoexpedicao_))
       {
           unset($sCheckRead_contatoexpedicao_);
       }
       if (isset($this->nmgp_cmp_readonly['contatoexpedicao_']))
       {
           $sCheckRead_contatoexpedicao_ = $this->nmgp_cmp_readonly['contatoexpedicao_'];
       }
       if (isset($this->nmgp_cmp_hidden['contatoexpedicao_']) && $this->nmgp_cmp_hidden['contatoexpedicao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['contatoexpedicao_']);
           $sStyleHidden_contatoexpedicao_ = 'display: none;';
       }
       $bTestReadOnly_contatoexpedicao_ = true;
       $sStyleReadLab_contatoexpedicao_ = 'display: none;';
       $sStyleReadInp_contatoexpedicao_ = '';
       if (isset($this->nmgp_cmp_readonly['contatoexpedicao_']) && $this->nmgp_cmp_readonly['contatoexpedicao_'] == 'on')
       {
           $bTestReadOnly_contatoexpedicao_ = false;
           unset($this->nmgp_cmp_readonly['contatoexpedicao_']);
           $sStyleReadLab_contatoexpedicao_ = '';
           $sStyleReadInp_contatoexpedicao_ = 'display: none;';
       }
       $this->foneexpedicao_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['foneexpedicao_']; 
       $foneexpedicao_ = $this->foneexpedicao_; 
       $sStyleHidden_foneexpedicao_ = '';
       if (isset($sCheckRead_foneexpedicao_))
       {
           unset($sCheckRead_foneexpedicao_);
       }
       if (isset($this->nmgp_cmp_readonly['foneexpedicao_']))
       {
           $sCheckRead_foneexpedicao_ = $this->nmgp_cmp_readonly['foneexpedicao_'];
       }
       if (isset($this->nmgp_cmp_hidden['foneexpedicao_']) && $this->nmgp_cmp_hidden['foneexpedicao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['foneexpedicao_']);
           $sStyleHidden_foneexpedicao_ = 'display: none;';
       }
       $bTestReadOnly_foneexpedicao_ = true;
       $sStyleReadLab_foneexpedicao_ = 'display: none;';
       $sStyleReadInp_foneexpedicao_ = '';
       if (isset($this->nmgp_cmp_readonly['foneexpedicao_']) && $this->nmgp_cmp_readonly['foneexpedicao_'] == 'on')
       {
           $bTestReadOnly_foneexpedicao_ = false;
           unset($this->nmgp_cmp_readonly['foneexpedicao_']);
           $sStyleReadLab_foneexpedicao_ = '';
           $sStyleReadInp_foneexpedicao_ = 'display: none;';
       }
       $this->datacadastro_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['datacadastro_'] . ' ' . $this->form_vert_form_dbo_cliente[$sc_seq_vert]['datacadastro__hora']; 
       $datacadastro_ = $this->datacadastro_; 
       $sStyleHidden_datacadastro_ = '';
       if (isset($sCheckRead_datacadastro_))
       {
           unset($sCheckRead_datacadastro_);
       }
       if (isset($this->nmgp_cmp_readonly['datacadastro_']))
       {
           $sCheckRead_datacadastro_ = $this->nmgp_cmp_readonly['datacadastro_'];
       }
       if (isset($this->nmgp_cmp_hidden['datacadastro_']) && $this->nmgp_cmp_hidden['datacadastro_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['datacadastro_']);
           $sStyleHidden_datacadastro_ = 'display: none;';
       }
       $bTestReadOnly_datacadastro_ = true;
       $sStyleReadLab_datacadastro_ = 'display: none;';
       $sStyleReadInp_datacadastro_ = '';
       if (isset($this->nmgp_cmp_readonly['datacadastro_']) && $this->nmgp_cmp_readonly['datacadastro_'] == 'on')
       {
           $bTestReadOnly_datacadastro_ = false;
           unset($this->nmgp_cmp_readonly['datacadastro_']);
           $sStyleReadLab_datacadastro_ = '';
           $sStyleReadInp_datacadastro_ = 'display: none;';
       }
       $this->obs_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['obs_']; 
       $obs_ = $this->obs_; 
       $obs__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $obs_);
       $obs__val = $obs__tmp;
       $sStyleHidden_obs_ = '';
       if (isset($sCheckRead_obs_))
       {
           unset($sCheckRead_obs_);
       }
       if (isset($this->nmgp_cmp_readonly['obs_']))
       {
           $sCheckRead_obs_ = $this->nmgp_cmp_readonly['obs_'];
       }
       if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['obs_']);
           $sStyleHidden_obs_ = 'display: none;';
       }
       $bTestReadOnly_obs_ = true;
       $sStyleReadLab_obs_ = 'display: none;';
       $sStyleReadInp_obs_ = '';
       if (isset($this->nmgp_cmp_readonly['obs_']) && $this->nmgp_cmp_readonly['obs_'] == 'on')
       {
           $bTestReadOnly_obs_ = false;
           unset($this->nmgp_cmp_readonly['obs_']);
           $sStyleReadLab_obs_ = '';
           $sStyleReadInp_obs_ = 'display: none;';
       }
       $this->tipo_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['tipo_']; 
       $tipo_ = $this->tipo_; 
       $sStyleHidden_tipo_ = '';
       if (isset($sCheckRead_tipo_))
       {
           unset($sCheckRead_tipo_);
       }
       if (isset($this->nmgp_cmp_readonly['tipo_']))
       {
           $sCheckRead_tipo_ = $this->nmgp_cmp_readonly['tipo_'];
       }
       if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tipo_']);
           $sStyleHidden_tipo_ = 'display: none;';
       }
       $bTestReadOnly_tipo_ = true;
       $sStyleReadLab_tipo_ = 'display: none;';
       $sStyleReadInp_tipo_ = '';
       if (isset($this->nmgp_cmp_readonly['tipo_']) && $this->nmgp_cmp_readonly['tipo_'] == 'on')
       {
           $bTestReadOnly_tipo_ = false;
           unset($this->nmgp_cmp_readonly['tipo_']);
           $sStyleReadLab_tipo_ = '';
           $sStyleReadInp_tipo_ = 'display: none;';
       }
       $this->consumidor_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['consumidor_']; 
       $consumidor_ = $this->consumidor_; 
       $sStyleHidden_consumidor_ = '';
       if (isset($sCheckRead_consumidor_))
       {
           unset($sCheckRead_consumidor_);
       }
       if (isset($this->nmgp_cmp_readonly['consumidor_']))
       {
           $sCheckRead_consumidor_ = $this->nmgp_cmp_readonly['consumidor_'];
       }
       if (isset($this->nmgp_cmp_hidden['consumidor_']) && $this->nmgp_cmp_hidden['consumidor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['consumidor_']);
           $sStyleHidden_consumidor_ = 'display: none;';
       }
       $bTestReadOnly_consumidor_ = true;
       $sStyleReadLab_consumidor_ = 'display: none;';
       $sStyleReadInp_consumidor_ = '';
       if (isset($this->nmgp_cmp_readonly['consumidor_']) && $this->nmgp_cmp_readonly['consumidor_'] == 'on')
       {
           $bTestReadOnly_consumidor_ = false;
           unset($this->nmgp_cmp_readonly['consumidor_']);
           $sStyleReadLab_consumidor_ = '';
           $sStyleReadInp_consumidor_ = 'display: none;';
       }
       $this->licensa_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa_']; 
       $licensa_ = $this->licensa_; 
       $sStyleHidden_licensa_ = '';
       if (isset($sCheckRead_licensa_))
       {
           unset($sCheckRead_licensa_);
       }
       if (isset($this->nmgp_cmp_readonly['licensa_']))
       {
           $sCheckRead_licensa_ = $this->nmgp_cmp_readonly['licensa_'];
       }
       if (isset($this->nmgp_cmp_hidden['licensa_']) && $this->nmgp_cmp_hidden['licensa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['licensa_']);
           $sStyleHidden_licensa_ = 'display: none;';
       }
       $bTestReadOnly_licensa_ = true;
       $sStyleReadLab_licensa_ = 'display: none;';
       $sStyleReadInp_licensa_ = '';
       if (isset($this->nmgp_cmp_readonly['licensa_']) && $this->nmgp_cmp_readonly['licensa_'] == 'on')
       {
           $bTestReadOnly_licensa_ = false;
           unset($this->nmgp_cmp_readonly['licensa_']);
           $sStyleReadLab_licensa_ = '';
           $sStyleReadInp_licensa_ = 'display: none;';
       }
       $this->venctolicensa_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa_'] . ' ' . $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa__hora']; 
       $venctolicensa_ = $this->venctolicensa_; 
       $sStyleHidden_venctolicensa_ = '';
       if (isset($sCheckRead_venctolicensa_))
       {
           unset($sCheckRead_venctolicensa_);
       }
       if (isset($this->nmgp_cmp_readonly['venctolicensa_']))
       {
           $sCheckRead_venctolicensa_ = $this->nmgp_cmp_readonly['venctolicensa_'];
       }
       if (isset($this->nmgp_cmp_hidden['venctolicensa_']) && $this->nmgp_cmp_hidden['venctolicensa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['venctolicensa_']);
           $sStyleHidden_venctolicensa_ = 'display: none;';
       }
       $bTestReadOnly_venctolicensa_ = true;
       $sStyleReadLab_venctolicensa_ = 'display: none;';
       $sStyleReadInp_venctolicensa_ = '';
       if (isset($this->nmgp_cmp_readonly['venctolicensa_']) && $this->nmgp_cmp_readonly['venctolicensa_'] == 'on')
       {
           $bTestReadOnly_venctolicensa_ = false;
           unset($this->nmgp_cmp_readonly['venctolicensa_']);
           $sStyleReadLab_venctolicensa_ = '';
           $sStyleReadInp_venctolicensa_ = 'display: none;';
       }
       $this->licensa1_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa1_']; 
       $licensa1_ = $this->licensa1_; 
       $sStyleHidden_licensa1_ = '';
       if (isset($sCheckRead_licensa1_))
       {
           unset($sCheckRead_licensa1_);
       }
       if (isset($this->nmgp_cmp_readonly['licensa1_']))
       {
           $sCheckRead_licensa1_ = $this->nmgp_cmp_readonly['licensa1_'];
       }
       if (isset($this->nmgp_cmp_hidden['licensa1_']) && $this->nmgp_cmp_hidden['licensa1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['licensa1_']);
           $sStyleHidden_licensa1_ = 'display: none;';
       }
       $bTestReadOnly_licensa1_ = true;
       $sStyleReadLab_licensa1_ = 'display: none;';
       $sStyleReadInp_licensa1_ = '';
       if (isset($this->nmgp_cmp_readonly['licensa1_']) && $this->nmgp_cmp_readonly['licensa1_'] == 'on')
       {
           $bTestReadOnly_licensa1_ = false;
           unset($this->nmgp_cmp_readonly['licensa1_']);
           $sStyleReadLab_licensa1_ = '';
           $sStyleReadInp_licensa1_ = 'display: none;';
       }
       $this->venctolicensa1_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa1_'] . ' ' . $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa1__hora']; 
       $venctolicensa1_ = $this->venctolicensa1_; 
       $sStyleHidden_venctolicensa1_ = '';
       if (isset($sCheckRead_venctolicensa1_))
       {
           unset($sCheckRead_venctolicensa1_);
       }
       if (isset($this->nmgp_cmp_readonly['venctolicensa1_']))
       {
           $sCheckRead_venctolicensa1_ = $this->nmgp_cmp_readonly['venctolicensa1_'];
       }
       if (isset($this->nmgp_cmp_hidden['venctolicensa1_']) && $this->nmgp_cmp_hidden['venctolicensa1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['venctolicensa1_']);
           $sStyleHidden_venctolicensa1_ = 'display: none;';
       }
       $bTestReadOnly_venctolicensa1_ = true;
       $sStyleReadLab_venctolicensa1_ = 'display: none;';
       $sStyleReadInp_venctolicensa1_ = '';
       if (isset($this->nmgp_cmp_readonly['venctolicensa1_']) && $this->nmgp_cmp_readonly['venctolicensa1_'] == 'on')
       {
           $bTestReadOnly_venctolicensa1_ = false;
           unset($this->nmgp_cmp_readonly['venctolicensa1_']);
           $sStyleReadLab_venctolicensa1_ = '';
           $sStyleReadInp_venctolicensa1_ = 'display: none;';
       }
       $this->qtdeliberada_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qtdeliberada_']; 
       $qtdeliberada_ = $this->qtdeliberada_; 
       $sStyleHidden_qtdeliberada_ = '';
       if (isset($sCheckRead_qtdeliberada_))
       {
           unset($sCheckRead_qtdeliberada_);
       }
       if (isset($this->nmgp_cmp_readonly['qtdeliberada_']))
       {
           $sCheckRead_qtdeliberada_ = $this->nmgp_cmp_readonly['qtdeliberada_'];
       }
       if (isset($this->nmgp_cmp_hidden['qtdeliberada_']) && $this->nmgp_cmp_hidden['qtdeliberada_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['qtdeliberada_']);
           $sStyleHidden_qtdeliberada_ = 'display: none;';
       }
       $bTestReadOnly_qtdeliberada_ = true;
       $sStyleReadLab_qtdeliberada_ = 'display: none;';
       $sStyleReadInp_qtdeliberada_ = '';
       if (isset($this->nmgp_cmp_readonly['qtdeliberada_']) && $this->nmgp_cmp_readonly['qtdeliberada_'] == 'on')
       {
           $bTestReadOnly_qtdeliberada_ = false;
           unset($this->nmgp_cmp_readonly['qtdeliberada_']);
           $sStyleReadLab_qtdeliberada_ = '';
           $sStyleReadInp_qtdeliberada_ = 'display: none;';
       }
       $this->licensa2_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['licensa2_']; 
       $licensa2_ = $this->licensa2_; 
       $sStyleHidden_licensa2_ = '';
       if (isset($sCheckRead_licensa2_))
       {
           unset($sCheckRead_licensa2_);
       }
       if (isset($this->nmgp_cmp_readonly['licensa2_']))
       {
           $sCheckRead_licensa2_ = $this->nmgp_cmp_readonly['licensa2_'];
       }
       if (isset($this->nmgp_cmp_hidden['licensa2_']) && $this->nmgp_cmp_hidden['licensa2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['licensa2_']);
           $sStyleHidden_licensa2_ = 'display: none;';
       }
       $bTestReadOnly_licensa2_ = true;
       $sStyleReadLab_licensa2_ = 'display: none;';
       $sStyleReadInp_licensa2_ = '';
       if (isset($this->nmgp_cmp_readonly['licensa2_']) && $this->nmgp_cmp_readonly['licensa2_'] == 'on')
       {
           $bTestReadOnly_licensa2_ = false;
           unset($this->nmgp_cmp_readonly['licensa2_']);
           $sStyleReadLab_licensa2_ = '';
           $sStyleReadInp_licensa2_ = 'display: none;';
       }
       $this->venctolicensa2_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa2_'] . ' ' . $this->form_vert_form_dbo_cliente[$sc_seq_vert]['venctolicensa2__hora']; 
       $venctolicensa2_ = $this->venctolicensa2_; 
       $sStyleHidden_venctolicensa2_ = '';
       if (isset($sCheckRead_venctolicensa2_))
       {
           unset($sCheckRead_venctolicensa2_);
       }
       if (isset($this->nmgp_cmp_readonly['venctolicensa2_']))
       {
           $sCheckRead_venctolicensa2_ = $this->nmgp_cmp_readonly['venctolicensa2_'];
       }
       if (isset($this->nmgp_cmp_hidden['venctolicensa2_']) && $this->nmgp_cmp_hidden['venctolicensa2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['venctolicensa2_']);
           $sStyleHidden_venctolicensa2_ = 'display: none;';
       }
       $bTestReadOnly_venctolicensa2_ = true;
       $sStyleReadLab_venctolicensa2_ = 'display: none;';
       $sStyleReadInp_venctolicensa2_ = '';
       if (isset($this->nmgp_cmp_readonly['venctolicensa2_']) && $this->nmgp_cmp_readonly['venctolicensa2_'] == 'on')
       {
           $bTestReadOnly_venctolicensa2_ = false;
           unset($this->nmgp_cmp_readonly['venctolicensa2_']);
           $sStyleReadLab_venctolicensa2_ = '';
           $sStyleReadInp_venctolicensa2_ = 'display: none;';
       }
       $this->icms_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['icms_']; 
       $icms_ = $this->icms_; 
       $sStyleHidden_icms_ = '';
       if (isset($sCheckRead_icms_))
       {
           unset($sCheckRead_icms_);
       }
       if (isset($this->nmgp_cmp_readonly['icms_']))
       {
           $sCheckRead_icms_ = $this->nmgp_cmp_readonly['icms_'];
       }
       if (isset($this->nmgp_cmp_hidden['icms_']) && $this->nmgp_cmp_hidden['icms_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['icms_']);
           $sStyleHidden_icms_ = 'display: none;';
       }
       $bTestReadOnly_icms_ = true;
       $sStyleReadLab_icms_ = 'display: none;';
       $sStyleReadInp_icms_ = '';
       if (isset($this->nmgp_cmp_readonly['icms_']) && $this->nmgp_cmp_readonly['icms_'] == 'on')
       {
           $bTestReadOnly_icms_ = false;
           unset($this->nmgp_cmp_readonly['icms_']);
           $sStyleReadLab_icms_ = '';
           $sStyleReadInp_icms_ = 'display: none;';
       }
       $this->suframa_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['suframa_']; 
       $suframa_ = $this->suframa_; 
       $sStyleHidden_suframa_ = '';
       if (isset($sCheckRead_suframa_))
       {
           unset($sCheckRead_suframa_);
       }
       if (isset($this->nmgp_cmp_readonly['suframa_']))
       {
           $sCheckRead_suframa_ = $this->nmgp_cmp_readonly['suframa_'];
       }
       if (isset($this->nmgp_cmp_hidden['suframa_']) && $this->nmgp_cmp_hidden['suframa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['suframa_']);
           $sStyleHidden_suframa_ = 'display: none;';
       }
       $bTestReadOnly_suframa_ = true;
       $sStyleReadLab_suframa_ = 'display: none;';
       $sStyleReadInp_suframa_ = '';
       if (isset($this->nmgp_cmp_readonly['suframa_']) && $this->nmgp_cmp_readonly['suframa_'] == 'on')
       {
           $bTestReadOnly_suframa_ = false;
           unset($this->nmgp_cmp_readonly['suframa_']);
           $sStyleReadLab_suframa_ = '';
           $sStyleReadInp_suframa_ = 'display: none;';
       }
       $this->limitecredito_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['limitecredito_']; 
       $limitecredito_ = $this->limitecredito_; 
       $sStyleHidden_limitecredito_ = '';
       if (isset($sCheckRead_limitecredito_))
       {
           unset($sCheckRead_limitecredito_);
       }
       if (isset($this->nmgp_cmp_readonly['limitecredito_']))
       {
           $sCheckRead_limitecredito_ = $this->nmgp_cmp_readonly['limitecredito_'];
       }
       if (isset($this->nmgp_cmp_hidden['limitecredito_']) && $this->nmgp_cmp_hidden['limitecredito_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['limitecredito_']);
           $sStyleHidden_limitecredito_ = 'display: none;';
       }
       $bTestReadOnly_limitecredito_ = true;
       $sStyleReadLab_limitecredito_ = 'display: none;';
       $sStyleReadInp_limitecredito_ = '';
       if (isset($this->nmgp_cmp_readonly['limitecredito_']) && $this->nmgp_cmp_readonly['limitecredito_'] == 'on')
       {
           $bTestReadOnly_limitecredito_ = false;
           unset($this->nmgp_cmp_readonly['limitecredito_']);
           $sStyleReadLab_limitecredito_ = '';
           $sStyleReadInp_limitecredito_ = 'display: none;';
       }
       $this->vendedor_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['vendedor_']; 
       $vendedor_ = $this->vendedor_; 
       $sStyleHidden_vendedor_ = '';
       if (isset($sCheckRead_vendedor_))
       {
           unset($sCheckRead_vendedor_);
       }
       if (isset($this->nmgp_cmp_readonly['vendedor_']))
       {
           $sCheckRead_vendedor_ = $this->nmgp_cmp_readonly['vendedor_'];
       }
       if (isset($this->nmgp_cmp_hidden['vendedor_']) && $this->nmgp_cmp_hidden['vendedor_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['vendedor_']);
           $sStyleHidden_vendedor_ = 'display: none;';
       }
       $bTestReadOnly_vendedor_ = true;
       $sStyleReadLab_vendedor_ = 'display: none;';
       $sStyleReadInp_vendedor_ = '';
       if (isset($this->nmgp_cmp_readonly['vendedor_']) && $this->nmgp_cmp_readonly['vendedor_'] == 'on')
       {
           $bTestReadOnly_vendedor_ = false;
           unset($this->nmgp_cmp_readonly['vendedor_']);
           $sStyleReadLab_vendedor_ = '';
           $sStyleReadInp_vendedor_ = 'display: none;';
       }
       $this->restricao_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['restricao_']; 
       $restricao_ = $this->restricao_; 
       $sStyleHidden_restricao_ = '';
       if (isset($sCheckRead_restricao_))
       {
           unset($sCheckRead_restricao_);
       }
       if (isset($this->nmgp_cmp_readonly['restricao_']))
       {
           $sCheckRead_restricao_ = $this->nmgp_cmp_readonly['restricao_'];
       }
       if (isset($this->nmgp_cmp_hidden['restricao_']) && $this->nmgp_cmp_hidden['restricao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['restricao_']);
           $sStyleHidden_restricao_ = 'display: none;';
       }
       $bTestReadOnly_restricao_ = true;
       $sStyleReadLab_restricao_ = 'display: none;';
       $sStyleReadInp_restricao_ = '';
       if (isset($this->nmgp_cmp_readonly['restricao_']) && $this->nmgp_cmp_readonly['restricao_'] == 'on')
       {
           $bTestReadOnly_restricao_ = false;
           unset($this->nmgp_cmp_readonly['restricao_']);
           $sStyleReadLab_restricao_ = '';
           $sStyleReadInp_restricao_ = 'display: none;';
       }
       $this->comissao_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['comissao_']; 
       $comissao_ = $this->comissao_; 
       $sStyleHidden_comissao_ = '';
       if (isset($sCheckRead_comissao_))
       {
           unset($sCheckRead_comissao_);
       }
       if (isset($this->nmgp_cmp_readonly['comissao_']))
       {
           $sCheckRead_comissao_ = $this->nmgp_cmp_readonly['comissao_'];
       }
       if (isset($this->nmgp_cmp_hidden['comissao_']) && $this->nmgp_cmp_hidden['comissao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['comissao_']);
           $sStyleHidden_comissao_ = 'display: none;';
       }
       $bTestReadOnly_comissao_ = true;
       $sStyleReadLab_comissao_ = 'display: none;';
       $sStyleReadInp_comissao_ = '';
       if (isset($this->nmgp_cmp_readonly['comissao_']) && $this->nmgp_cmp_readonly['comissao_'] == 'on')
       {
           $bTestReadOnly_comissao_ = false;
           unset($this->nmgp_cmp_readonly['comissao_']);
           $sStyleReadLab_comissao_ = '';
           $sStyleReadInp_comissao_ = 'display: none;';
       }
       $this->transportadora_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['transportadora_']; 
       $transportadora_ = $this->transportadora_; 
       $sStyleHidden_transportadora_ = '';
       if (isset($sCheckRead_transportadora_))
       {
           unset($sCheckRead_transportadora_);
       }
       if (isset($this->nmgp_cmp_readonly['transportadora_']))
       {
           $sCheckRead_transportadora_ = $this->nmgp_cmp_readonly['transportadora_'];
       }
       if (isset($this->nmgp_cmp_hidden['transportadora_']) && $this->nmgp_cmp_hidden['transportadora_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['transportadora_']);
           $sStyleHidden_transportadora_ = 'display: none;';
       }
       $bTestReadOnly_transportadora_ = true;
       $sStyleReadLab_transportadora_ = 'display: none;';
       $sStyleReadInp_transportadora_ = '';
       if (isset($this->nmgp_cmp_readonly['transportadora_']) && $this->nmgp_cmp_readonly['transportadora_'] == 'on')
       {
           $bTestReadOnly_transportadora_ = false;
           unset($this->nmgp_cmp_readonly['transportadora_']);
           $sStyleReadLab_transportadora_ = '';
           $sStyleReadInp_transportadora_ = 'display: none;';
       }
       $this->coleta_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['coleta_']; 
       $coleta_ = $this->coleta_; 
       $sStyleHidden_coleta_ = '';
       if (isset($sCheckRead_coleta_))
       {
           unset($sCheckRead_coleta_);
       }
       if (isset($this->nmgp_cmp_readonly['coleta_']))
       {
           $sCheckRead_coleta_ = $this->nmgp_cmp_readonly['coleta_'];
       }
       if (isset($this->nmgp_cmp_hidden['coleta_']) && $this->nmgp_cmp_hidden['coleta_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['coleta_']);
           $sStyleHidden_coleta_ = 'display: none;';
       }
       $bTestReadOnly_coleta_ = true;
       $sStyleReadLab_coleta_ = 'display: none;';
       $sStyleReadInp_coleta_ = '';
       if (isset($this->nmgp_cmp_readonly['coleta_']) && $this->nmgp_cmp_readonly['coleta_'] == 'on')
       {
           $bTestReadOnly_coleta_ = false;
           unset($this->nmgp_cmp_readonly['coleta_']);
           $sStyleReadLab_coleta_ = '';
           $sStyleReadInp_coleta_ = 'display: none;';
       }
       $this->segmento_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['segmento_']; 
       $segmento_ = $this->segmento_; 
       $sStyleHidden_segmento_ = '';
       if (isset($sCheckRead_segmento_))
       {
           unset($sCheckRead_segmento_);
       }
       if (isset($this->nmgp_cmp_readonly['segmento_']))
       {
           $sCheckRead_segmento_ = $this->nmgp_cmp_readonly['segmento_'];
       }
       if (isset($this->nmgp_cmp_hidden['segmento_']) && $this->nmgp_cmp_hidden['segmento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['segmento_']);
           $sStyleHidden_segmento_ = 'display: none;';
       }
       $bTestReadOnly_segmento_ = true;
       $sStyleReadLab_segmento_ = 'display: none;';
       $sStyleReadInp_segmento_ = '';
       if (isset($this->nmgp_cmp_readonly['segmento_']) && $this->nmgp_cmp_readonly['segmento_'] == 'on')
       {
           $bTestReadOnly_segmento_ = false;
           unset($this->nmgp_cmp_readonly['segmento_']);
           $sStyleReadLab_segmento_ = '';
           $sStyleReadInp_segmento_ = 'display: none;';
       }
       $this->dataalteracao_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['dataalteracao_'] . ' ' . $this->form_vert_form_dbo_cliente[$sc_seq_vert]['dataalteracao__hora']; 
       $dataalteracao_ = $this->dataalteracao_; 
       $sStyleHidden_dataalteracao_ = '';
       if (isset($sCheckRead_dataalteracao_))
       {
           unset($sCheckRead_dataalteracao_);
       }
       if (isset($this->nmgp_cmp_readonly['dataalteracao_']))
       {
           $sCheckRead_dataalteracao_ = $this->nmgp_cmp_readonly['dataalteracao_'];
       }
       if (isset($this->nmgp_cmp_hidden['dataalteracao_']) && $this->nmgp_cmp_hidden['dataalteracao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dataalteracao_']);
           $sStyleHidden_dataalteracao_ = 'display: none;';
       }
       $bTestReadOnly_dataalteracao_ = true;
       $sStyleReadLab_dataalteracao_ = 'display: none;';
       $sStyleReadInp_dataalteracao_ = '';
       if (isset($this->nmgp_cmp_readonly['dataalteracao_']) && $this->nmgp_cmp_readonly['dataalteracao_'] == 'on')
       {
           $bTestReadOnly_dataalteracao_ = false;
           unset($this->nmgp_cmp_readonly['dataalteracao_']);
           $sStyleReadLab_dataalteracao_ = '';
           $sStyleReadInp_dataalteracao_ = 'display: none;';
       }
       $this->usuario_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['usuario_']; 
       $usuario_ = $this->usuario_; 
       $sStyleHidden_usuario_ = '';
       if (isset($sCheckRead_usuario_))
       {
           unset($sCheckRead_usuario_);
       }
       if (isset($this->nmgp_cmp_readonly['usuario_']))
       {
           $sCheckRead_usuario_ = $this->nmgp_cmp_readonly['usuario_'];
       }
       if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['usuario_']);
           $sStyleHidden_usuario_ = 'display: none;';
       }
       $bTestReadOnly_usuario_ = true;
       $sStyleReadLab_usuario_ = 'display: none;';
       $sStyleReadInp_usuario_ = '';
       if (isset($this->nmgp_cmp_readonly['usuario_']) && $this->nmgp_cmp_readonly['usuario_'] == 'on')
       {
           $bTestReadOnly_usuario_ = false;
           unset($this->nmgp_cmp_readonly['usuario_']);
           $sStyleReadLab_usuario_ = '';
           $sStyleReadInp_usuario_ = 'display: none;';
       }
       $this->requisitos_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['requisitos_']; 
       $requisitos_ = $this->requisitos_; 
       $sStyleHidden_requisitos_ = '';
       if (isset($sCheckRead_requisitos_))
       {
           unset($sCheckRead_requisitos_);
       }
       if (isset($this->nmgp_cmp_readonly['requisitos_']))
       {
           $sCheckRead_requisitos_ = $this->nmgp_cmp_readonly['requisitos_'];
       }
       if (isset($this->nmgp_cmp_hidden['requisitos_']) && $this->nmgp_cmp_hidden['requisitos_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['requisitos_']);
           $sStyleHidden_requisitos_ = 'display: none;';
       }
       $bTestReadOnly_requisitos_ = true;
       $sStyleReadLab_requisitos_ = 'display: none;';
       $sStyleReadInp_requisitos_ = '';
       if (isset($this->nmgp_cmp_readonly['requisitos_']) && $this->nmgp_cmp_readonly['requisitos_'] == 'on')
       {
           $bTestReadOnly_requisitos_ = false;
           unset($this->nmgp_cmp_readonly['requisitos_']);
           $sStyleReadLab_requisitos_ = '';
           $sStyleReadInp_requisitos_ = 'display: none;';
       }
       $this->banco_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['banco_']; 
       $banco_ = $this->banco_; 
       $sStyleHidden_banco_ = '';
       if (isset($sCheckRead_banco_))
       {
           unset($sCheckRead_banco_);
       }
       if (isset($this->nmgp_cmp_readonly['banco_']))
       {
           $sCheckRead_banco_ = $this->nmgp_cmp_readonly['banco_'];
       }
       if (isset($this->nmgp_cmp_hidden['banco_']) && $this->nmgp_cmp_hidden['banco_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['banco_']);
           $sStyleHidden_banco_ = 'display: none;';
       }
       $bTestReadOnly_banco_ = true;
       $sStyleReadLab_banco_ = 'display: none;';
       $sStyleReadInp_banco_ = '';
       if (isset($this->nmgp_cmp_readonly['banco_']) && $this->nmgp_cmp_readonly['banco_'] == 'on')
       {
           $bTestReadOnly_banco_ = false;
           unset($this->nmgp_cmp_readonly['banco_']);
           $sStyleReadLab_banco_ = '';
           $sStyleReadInp_banco_ = 'display: none;';
       }
       $this->emailcobranca_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailcobranca_']; 
       $emailcobranca_ = $this->emailcobranca_; 
       $sStyleHidden_emailcobranca_ = '';
       if (isset($sCheckRead_emailcobranca_))
       {
           unset($sCheckRead_emailcobranca_);
       }
       if (isset($this->nmgp_cmp_readonly['emailcobranca_']))
       {
           $sCheckRead_emailcobranca_ = $this->nmgp_cmp_readonly['emailcobranca_'];
       }
       if (isset($this->nmgp_cmp_hidden['emailcobranca_']) && $this->nmgp_cmp_hidden['emailcobranca_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['emailcobranca_']);
           $sStyleHidden_emailcobranca_ = 'display: none;';
       }
       $bTestReadOnly_emailcobranca_ = true;
       $sStyleReadLab_emailcobranca_ = 'display: none;';
       $sStyleReadInp_emailcobranca_ = '';
       if (isset($this->nmgp_cmp_readonly['emailcobranca_']) && $this->nmgp_cmp_readonly['emailcobranca_'] == 'on')
       {
           $bTestReadOnly_emailcobranca_ = false;
           unset($this->nmgp_cmp_readonly['emailcobranca_']);
           $sStyleReadLab_emailcobranca_ = '';
           $sStyleReadInp_emailcobranca_ = 'display: none;';
       }
       $this->emailtecnico_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailtecnico_']; 
       $emailtecnico_ = $this->emailtecnico_; 
       $sStyleHidden_emailtecnico_ = '';
       if (isset($sCheckRead_emailtecnico_))
       {
           unset($sCheckRead_emailtecnico_);
       }
       if (isset($this->nmgp_cmp_readonly['emailtecnico_']))
       {
           $sCheckRead_emailtecnico_ = $this->nmgp_cmp_readonly['emailtecnico_'];
       }
       if (isset($this->nmgp_cmp_hidden['emailtecnico_']) && $this->nmgp_cmp_hidden['emailtecnico_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['emailtecnico_']);
           $sStyleHidden_emailtecnico_ = 'display: none;';
       }
       $bTestReadOnly_emailtecnico_ = true;
       $sStyleReadLab_emailtecnico_ = 'display: none;';
       $sStyleReadInp_emailtecnico_ = '';
       if (isset($this->nmgp_cmp_readonly['emailtecnico_']) && $this->nmgp_cmp_readonly['emailtecnico_'] == 'on')
       {
           $bTestReadOnly_emailtecnico_ = false;
           unset($this->nmgp_cmp_readonly['emailtecnico_']);
           $sStyleReadLab_emailtecnico_ = '';
           $sStyleReadInp_emailtecnico_ = 'display: none;';
       }
       $this->midia_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['midia_']; 
       $midia_ = $this->midia_; 
       $sStyleHidden_midia_ = '';
       if (isset($sCheckRead_midia_))
       {
           unset($sCheckRead_midia_);
       }
       if (isset($this->nmgp_cmp_readonly['midia_']))
       {
           $sCheckRead_midia_ = $this->nmgp_cmp_readonly['midia_'];
       }
       if (isset($this->nmgp_cmp_hidden['midia_']) && $this->nmgp_cmp_hidden['midia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['midia_']);
           $sStyleHidden_midia_ = 'display: none;';
       }
       $bTestReadOnly_midia_ = true;
       $sStyleReadLab_midia_ = 'display: none;';
       $sStyleReadInp_midia_ = '';
       if (isset($this->nmgp_cmp_readonly['midia_']) && $this->nmgp_cmp_readonly['midia_'] == 'on')
       {
           $bTestReadOnly_midia_ = false;
           unset($this->nmgp_cmp_readonly['midia_']);
           $sStyleReadLab_midia_ = '';
           $sStyleReadInp_midia_ = 'display: none;';
       }
       $this->seg_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['seg_']; 
       $seg_ = $this->seg_; 
       $sStyleHidden_seg_ = '';
       if (isset($sCheckRead_seg_))
       {
           unset($sCheckRead_seg_);
       }
       if (isset($this->nmgp_cmp_readonly['seg_']))
       {
           $sCheckRead_seg_ = $this->nmgp_cmp_readonly['seg_'];
       }
       if (isset($this->nmgp_cmp_hidden['seg_']) && $this->nmgp_cmp_hidden['seg_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['seg_']);
           $sStyleHidden_seg_ = 'display: none;';
       }
       $bTestReadOnly_seg_ = true;
       $sStyleReadLab_seg_ = 'display: none;';
       $sStyleReadInp_seg_ = '';
       if (isset($this->nmgp_cmp_readonly['seg_']) && $this->nmgp_cmp_readonly['seg_'] == 'on')
       {
           $bTestReadOnly_seg_ = false;
           unset($this->nmgp_cmp_readonly['seg_']);
           $sStyleReadLab_seg_ = '';
           $sStyleReadInp_seg_ = 'display: none;';
       }
       $this->ter_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['ter_']; 
       $ter_ = $this->ter_; 
       $sStyleHidden_ter_ = '';
       if (isset($sCheckRead_ter_))
       {
           unset($sCheckRead_ter_);
       }
       if (isset($this->nmgp_cmp_readonly['ter_']))
       {
           $sCheckRead_ter_ = $this->nmgp_cmp_readonly['ter_'];
       }
       if (isset($this->nmgp_cmp_hidden['ter_']) && $this->nmgp_cmp_hidden['ter_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['ter_']);
           $sStyleHidden_ter_ = 'display: none;';
       }
       $bTestReadOnly_ter_ = true;
       $sStyleReadLab_ter_ = 'display: none;';
       $sStyleReadInp_ter_ = '';
       if (isset($this->nmgp_cmp_readonly['ter_']) && $this->nmgp_cmp_readonly['ter_'] == 'on')
       {
           $bTestReadOnly_ter_ = false;
           unset($this->nmgp_cmp_readonly['ter_']);
           $sStyleReadLab_ter_ = '';
           $sStyleReadInp_ter_ = 'display: none;';
       }
       $this->qua_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qua_']; 
       $qua_ = $this->qua_; 
       $sStyleHidden_qua_ = '';
       if (isset($sCheckRead_qua_))
       {
           unset($sCheckRead_qua_);
       }
       if (isset($this->nmgp_cmp_readonly['qua_']))
       {
           $sCheckRead_qua_ = $this->nmgp_cmp_readonly['qua_'];
       }
       if (isset($this->nmgp_cmp_hidden['qua_']) && $this->nmgp_cmp_hidden['qua_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['qua_']);
           $sStyleHidden_qua_ = 'display: none;';
       }
       $bTestReadOnly_qua_ = true;
       $sStyleReadLab_qua_ = 'display: none;';
       $sStyleReadInp_qua_ = '';
       if (isset($this->nmgp_cmp_readonly['qua_']) && $this->nmgp_cmp_readonly['qua_'] == 'on')
       {
           $bTestReadOnly_qua_ = false;
           unset($this->nmgp_cmp_readonly['qua_']);
           $sStyleReadLab_qua_ = '';
           $sStyleReadInp_qua_ = 'display: none;';
       }
       $this->qui_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['qui_']; 
       $qui_ = $this->qui_; 
       $sStyleHidden_qui_ = '';
       if (isset($sCheckRead_qui_))
       {
           unset($sCheckRead_qui_);
       }
       if (isset($this->nmgp_cmp_readonly['qui_']))
       {
           $sCheckRead_qui_ = $this->nmgp_cmp_readonly['qui_'];
       }
       if (isset($this->nmgp_cmp_hidden['qui_']) && $this->nmgp_cmp_hidden['qui_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['qui_']);
           $sStyleHidden_qui_ = 'display: none;';
       }
       $bTestReadOnly_qui_ = true;
       $sStyleReadLab_qui_ = 'display: none;';
       $sStyleReadInp_qui_ = '';
       if (isset($this->nmgp_cmp_readonly['qui_']) && $this->nmgp_cmp_readonly['qui_'] == 'on')
       {
           $bTestReadOnly_qui_ = false;
           unset($this->nmgp_cmp_readonly['qui_']);
           $sStyleReadLab_qui_ = '';
           $sStyleReadInp_qui_ = 'display: none;';
       }
       $this->sex_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['sex_']; 
       $sex_ = $this->sex_; 
       $sStyleHidden_sex_ = '';
       if (isset($sCheckRead_sex_))
       {
           unset($sCheckRead_sex_);
       }
       if (isset($this->nmgp_cmp_readonly['sex_']))
       {
           $sCheckRead_sex_ = $this->nmgp_cmp_readonly['sex_'];
       }
       if (isset($this->nmgp_cmp_hidden['sex_']) && $this->nmgp_cmp_hidden['sex_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sex_']);
           $sStyleHidden_sex_ = 'display: none;';
       }
       $bTestReadOnly_sex_ = true;
       $sStyleReadLab_sex_ = 'display: none;';
       $sStyleReadInp_sex_ = '';
       if (isset($this->nmgp_cmp_readonly['sex_']) && $this->nmgp_cmp_readonly['sex_'] == 'on')
       {
           $bTestReadOnly_sex_ = false;
           unset($this->nmgp_cmp_readonly['sex_']);
           $sStyleReadLab_sex_ = '';
           $sStyleReadInp_sex_ = 'display: none;';
       }
       $this->certificado_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['certificado_']; 
       $certificado_ = $this->certificado_; 
       $sStyleHidden_certificado_ = '';
       if (isset($sCheckRead_certificado_))
       {
           unset($sCheckRead_certificado_);
       }
       if (isset($this->nmgp_cmp_readonly['certificado_']))
       {
           $sCheckRead_certificado_ = $this->nmgp_cmp_readonly['certificado_'];
       }
       if (isset($this->nmgp_cmp_hidden['certificado_']) && $this->nmgp_cmp_hidden['certificado_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['certificado_']);
           $sStyleHidden_certificado_ = 'display: none;';
       }
       $bTestReadOnly_certificado_ = true;
       $sStyleReadLab_certificado_ = 'display: none;';
       $sStyleReadInp_certificado_ = '';
       if (isset($this->nmgp_cmp_readonly['certificado_']) && $this->nmgp_cmp_readonly['certificado_'] == 'on')
       {
           $bTestReadOnly_certificado_ = false;
           unset($this->nmgp_cmp_readonly['certificado_']);
           $sStyleReadLab_certificado_ = '';
           $sStyleReadInp_certificado_ = 'display: none;';
       }
       $this->emailnfe_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['emailnfe_']; 
       $emailnfe_ = $this->emailnfe_; 
       $sStyleHidden_emailnfe_ = '';
       if (isset($sCheckRead_emailnfe_))
       {
           unset($sCheckRead_emailnfe_);
       }
       if (isset($this->nmgp_cmp_readonly['emailnfe_']))
       {
           $sCheckRead_emailnfe_ = $this->nmgp_cmp_readonly['emailnfe_'];
       }
       if (isset($this->nmgp_cmp_hidden['emailnfe_']) && $this->nmgp_cmp_hidden['emailnfe_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['emailnfe_']);
           $sStyleHidden_emailnfe_ = 'display: none;';
       }
       $bTestReadOnly_emailnfe_ = true;
       $sStyleReadLab_emailnfe_ = 'display: none;';
       $sStyleReadInp_emailnfe_ = '';
       if (isset($this->nmgp_cmp_readonly['emailnfe_']) && $this->nmgp_cmp_readonly['emailnfe_'] == 'on')
       {
           $bTestReadOnly_emailnfe_ = false;
           unset($this->nmgp_cmp_readonly['emailnfe_']);
           $sStyleReadLab_emailnfe_ = '';
           $sStyleReadInp_emailnfe_ = 'display: none;';
       }
       $this->fundacao_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fundacao_'] . ' ' . $this->form_vert_form_dbo_cliente[$sc_seq_vert]['fundacao__hora']; 
       $fundacao_ = $this->fundacao_; 
       $sStyleHidden_fundacao_ = '';
       if (isset($sCheckRead_fundacao_))
       {
           unset($sCheckRead_fundacao_);
       }
       if (isset($this->nmgp_cmp_readonly['fundacao_']))
       {
           $sCheckRead_fundacao_ = $this->nmgp_cmp_readonly['fundacao_'];
       }
       if (isset($this->nmgp_cmp_hidden['fundacao_']) && $this->nmgp_cmp_hidden['fundacao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['fundacao_']);
           $sStyleHidden_fundacao_ = 'display: none;';
       }
       $bTestReadOnly_fundacao_ = true;
       $sStyleReadLab_fundacao_ = 'display: none;';
       $sStyleReadInp_fundacao_ = '';
       if (isset($this->nmgp_cmp_readonly['fundacao_']) && $this->nmgp_cmp_readonly['fundacao_'] == 'on')
       {
           $bTestReadOnly_fundacao_ = false;
           unset($this->nmgp_cmp_readonly['fundacao_']);
           $sStyleReadLab_fundacao_ = '';
           $sStyleReadInp_fundacao_ = 'display: none;';
       }
       $this->site_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['site_']; 
       $site_ = $this->site_; 
       $sStyleHidden_site_ = '';
       if (isset($sCheckRead_site_))
       {
           unset($sCheckRead_site_);
       }
       if (isset($this->nmgp_cmp_readonly['site_']))
       {
           $sCheckRead_site_ = $this->nmgp_cmp_readonly['site_'];
       }
       if (isset($this->nmgp_cmp_hidden['site_']) && $this->nmgp_cmp_hidden['site_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['site_']);
           $sStyleHidden_site_ = 'display: none;';
       }
       $bTestReadOnly_site_ = true;
       $sStyleReadLab_site_ = 'display: none;';
       $sStyleReadInp_site_ = '';
       if (isset($this->nmgp_cmp_readonly['site_']) && $this->nmgp_cmp_readonly['site_'] == 'on')
       {
           $bTestReadOnly_site_ = false;
           unset($this->nmgp_cmp_readonly['site_']);
           $sStyleReadLab_site_ = '';
           $sStyleReadInp_site_ = 'display: none;';
       }
       $this->financeiro_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['financeiro_']; 
       $financeiro_ = $this->financeiro_; 
       $sStyleHidden_financeiro_ = '';
       if (isset($sCheckRead_financeiro_))
       {
           unset($sCheckRead_financeiro_);
       }
       if (isset($this->nmgp_cmp_readonly['financeiro_']))
       {
           $sCheckRead_financeiro_ = $this->nmgp_cmp_readonly['financeiro_'];
       }
       if (isset($this->nmgp_cmp_hidden['financeiro_']) && $this->nmgp_cmp_hidden['financeiro_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['financeiro_']);
           $sStyleHidden_financeiro_ = 'display: none;';
       }
       $bTestReadOnly_financeiro_ = true;
       $sStyleReadLab_financeiro_ = 'display: none;';
       $sStyleReadInp_financeiro_ = '';
       if (isset($this->nmgp_cmp_readonly['financeiro_']) && $this->nmgp_cmp_readonly['financeiro_'] == 'on')
       {
           $bTestReadOnly_financeiro_ = false;
           unset($this->nmgp_cmp_readonly['financeiro_']);
           $sStyleReadLab_financeiro_ = '';
           $sStyleReadInp_financeiro_ = 'display: none;';
       }
       $this->numero_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['numero_']; 
       $numero_ = $this->numero_; 
       $sStyleHidden_numero_ = '';
       if (isset($sCheckRead_numero_))
       {
           unset($sCheckRead_numero_);
       }
       if (isset($this->nmgp_cmp_readonly['numero_']))
       {
           $sCheckRead_numero_ = $this->nmgp_cmp_readonly['numero_'];
       }
       if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['numero_']);
           $sStyleHidden_numero_ = 'display: none;';
       }
       $bTestReadOnly_numero_ = true;
       $sStyleReadLab_numero_ = 'display: none;';
       $sStyleReadInp_numero_ = '';
       if (isset($this->nmgp_cmp_readonly['numero_']) && $this->nmgp_cmp_readonly['numero_'] == 'on')
       {
           $bTestReadOnly_numero_ = false;
           unset($this->nmgp_cmp_readonly['numero_']);
           $sStyleReadLab_numero_ = '';
           $sStyleReadInp_numero_ = 'display: none;';
       }
       $this->complemento_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['complemento_']; 
       $complemento_ = $this->complemento_; 
       $sStyleHidden_complemento_ = '';
       if (isset($sCheckRead_complemento_))
       {
           unset($sCheckRead_complemento_);
       }
       if (isset($this->nmgp_cmp_readonly['complemento_']))
       {
           $sCheckRead_complemento_ = $this->nmgp_cmp_readonly['complemento_'];
       }
       if (isset($this->nmgp_cmp_hidden['complemento_']) && $this->nmgp_cmp_hidden['complemento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['complemento_']);
           $sStyleHidden_complemento_ = 'display: none;';
       }
       $bTestReadOnly_complemento_ = true;
       $sStyleReadLab_complemento_ = 'display: none;';
       $sStyleReadInp_complemento_ = '';
       if (isset($this->nmgp_cmp_readonly['complemento_']) && $this->nmgp_cmp_readonly['complemento_'] == 'on')
       {
           $bTestReadOnly_complemento_ = false;
           unset($this->nmgp_cmp_readonly['complemento_']);
           $sStyleReadLab_complemento_ = '';
           $sStyleReadInp_complemento_ = 'display: none;';
       }
       $this->razaosocialentrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['razaosocialentrega_']; 
       $razaosocialentrega_ = $this->razaosocialentrega_; 
       $sStyleHidden_razaosocialentrega_ = '';
       if (isset($sCheckRead_razaosocialentrega_))
       {
           unset($sCheckRead_razaosocialentrega_);
       }
       if (isset($this->nmgp_cmp_readonly['razaosocialentrega_']))
       {
           $sCheckRead_razaosocialentrega_ = $this->nmgp_cmp_readonly['razaosocialentrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['razaosocialentrega_']) && $this->nmgp_cmp_hidden['razaosocialentrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['razaosocialentrega_']);
           $sStyleHidden_razaosocialentrega_ = 'display: none;';
       }
       $bTestReadOnly_razaosocialentrega_ = true;
       $sStyleReadLab_razaosocialentrega_ = 'display: none;';
       $sStyleReadInp_razaosocialentrega_ = '';
       if (isset($this->nmgp_cmp_readonly['razaosocialentrega_']) && $this->nmgp_cmp_readonly['razaosocialentrega_'] == 'on')
       {
           $bTestReadOnly_razaosocialentrega_ = false;
           unset($this->nmgp_cmp_readonly['razaosocialentrega_']);
           $sStyleReadLab_razaosocialentrega_ = '';
           $sStyleReadInp_razaosocialentrega_ = 'display: none;';
       }
       $this->entrega_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['entrega_']; 
       $entrega_ = $this->entrega_; 
       $sStyleHidden_entrega_ = '';
       if (isset($sCheckRead_entrega_))
       {
           unset($sCheckRead_entrega_);
       }
       if (isset($this->nmgp_cmp_readonly['entrega_']))
       {
           $sCheckRead_entrega_ = $this->nmgp_cmp_readonly['entrega_'];
       }
       if (isset($this->nmgp_cmp_hidden['entrega_']) && $this->nmgp_cmp_hidden['entrega_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['entrega_']);
           $sStyleHidden_entrega_ = 'display: none;';
       }
       $bTestReadOnly_entrega_ = true;
       $sStyleReadLab_entrega_ = 'display: none;';
       $sStyleReadInp_entrega_ = '';
       if (isset($this->nmgp_cmp_readonly['entrega_']) && $this->nmgp_cmp_readonly['entrega_'] == 'on')
       {
           $bTestReadOnly_entrega_ = false;
           unset($this->nmgp_cmp_readonly['entrega_']);
           $sStyleReadLab_entrega_ = '';
           $sStyleReadInp_entrega_ = 'display: none;';
       }
       $this->contatotecnico_ = $this->form_vert_form_dbo_cliente[$sc_seq_vert]['contatotecnico_']; 
       $contatotecnico_ = $this->contatotecnico_; 
       $sStyleHidden_contatotecnico_ = '';
       if (isset($sCheckRead_contatotecnico_))
       {
           unset($sCheckRead_contatotecnico_);
       }
       if (isset($this->nmgp_cmp_readonly['contatotecnico_']))
       {
           $sCheckRead_contatotecnico_ = $this->nmgp_cmp_readonly['contatotecnico_'];
       }
       if (isset($this->nmgp_cmp_hidden['contatotecnico_']) && $this->nmgp_cmp_hidden['contatotecnico_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['contatotecnico_']);
           $sStyleHidden_contatotecnico_ = 'display: none;';
       }
       $bTestReadOnly_contatotecnico_ = true;
       $sStyleReadLab_contatotecnico_ = 'display: none;';
       $sStyleReadInp_contatotecnico_ = '';
       if (isset($this->nmgp_cmp_readonly['contatotecnico_']) && $this->nmgp_cmp_readonly['contatotecnico_'] == 'on')
       {
           $bTestReadOnly_contatotecnico_ = false;
           unset($this->nmgp_cmp_readonly['contatotecnico_']);
           $sStyleReadLab_contatotecnico_ = '';
           $sStyleReadInp_contatotecnico_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "sc_inline_form(" . $sc_seq_vert . ", 'cd_cliente_', 500, 450)", "sc_inline_form(" . $sc_seq_vert . ", 'cd_cliente_', 500, 450)", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "sc_inline_form(" . $sc_seq_vert . ", 'cd_cliente_', 500, 450)", "sc_inline_form(" . $sc_seq_vert . ", 'cd_cliente_', 500, 450)", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_dbo_cliente_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_dbo_cliente_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_dbo_cliente_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_dbo_cliente_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_dbo_cliente_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_dbo_cliente_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['cd_cliente_']) && $this->nmgp_cmp_hidden['cd_cliente_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cd_cliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cd_cliente_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_cd_cliente__line" id="hidden_field_data_cd_cliente_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cd_cliente_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cd_cliente__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_cd_cliente_<?php echo $sc_seq_vert ?>" class="css_cd_cliente__line" style="<?php echo $sStyleReadLab_cd_cliente_; ?>"><?php echo $this->form_encode_input($this->cd_cliente_); ?></span><span id="id_read_off_cd_cliente_<?php echo $sc_seq_vert ?>" style="<?php echo $sStyleReadInp_cd_cliente_; ?>"><input type="hidden" id="id_sc_field_cd_cliente_<?php echo $sc_seq_vert ?>" name="cd_cliente_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cd_cliente_) . "\">"?>
<span id="id_ajax_label_cd_cliente_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($cd_cliente_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cd_cliente_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cd_cliente_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['razaosocial_']) && $this->nmgp_cmp_hidden['razaosocial_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razaosocial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razaosocial_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_razaosocial__line" id="hidden_field_data_razaosocial_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_razaosocial_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_razaosocial__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_razaosocial_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razaosocial_"]) &&  $this->nmgp_cmp_readonly["razaosocial_"] == "on") { 

 ?>
<input type="hidden" name="razaosocial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razaosocial_) . "\">" . $razaosocial_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_razaosocial_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-razaosocial_<?php echo $sc_seq_vert ?> css_razaosocial__line" style="<?php echo $sStyleReadLab_razaosocial_; ?>"><?php echo $this->form_encode_input($this->razaosocial_); ?></span><span id="id_read_off_razaosocial_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_razaosocial_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_razaosocial__obj" style="" id="id_sc_field_razaosocial_<?php echo $sc_seq_vert ?>" type=text name="razaosocial_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razaosocial_) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razaosocial_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razaosocial_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nomefantasia_']) && $this->nmgp_cmp_hidden['nomefantasia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomefantasia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nomefantasia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nomefantasia__line" id="hidden_field_data_nomefantasia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nomefantasia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nomefantasia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nomefantasia_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomefantasia_"]) &&  $this->nmgp_cmp_readonly["nomefantasia_"] == "on") { 

 ?>
<input type="hidden" name="nomefantasia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nomefantasia_) . "\">" . $nomefantasia_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomefantasia_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nomefantasia_<?php echo $sc_seq_vert ?> css_nomefantasia__line" style="<?php echo $sStyleReadLab_nomefantasia_; ?>"><?php echo $this->form_encode_input($this->nomefantasia_); ?></span><span id="id_read_off_nomefantasia_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nomefantasia_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nomefantasia__obj" style="" id="id_sc_field_nomefantasia_<?php echo $sc_seq_vert ?>" type=text name="nomefantasia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nomefantasia_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nomefantasia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nomefantasia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cgc_']) && $this->nmgp_cmp_hidden['cgc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cgc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cgc__line" id="hidden_field_data_cgc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cgc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cgc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cgc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgc_"]) &&  $this->nmgp_cmp_readonly["cgc_"] == "on") { 

 ?>
<input type="hidden" name="cgc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cgc_) . "\">" . $cgc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cgc_<?php echo $sc_seq_vert ?> css_cgc__line" style="<?php echo $sStyleReadLab_cgc_; ?>"><?php echo $this->form_encode_input($this->cgc_); ?></span><span id="id_read_off_cgc_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cgc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cgc__obj" style="" id="id_sc_field_cgc_<?php echo $sc_seq_vert ?>" type=text name="cgc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cgc_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['inscricao_']) && $this->nmgp_cmp_hidden['inscricao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscricao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inscricao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_inscricao__line" id="hidden_field_data_inscricao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_inscricao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_inscricao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_inscricao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscricao_"]) &&  $this->nmgp_cmp_readonly["inscricao_"] == "on") { 

 ?>
<input type="hidden" name="inscricao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inscricao_) . "\">" . $inscricao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscricao_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-inscricao_<?php echo $sc_seq_vert ?> css_inscricao__line" style="<?php echo $sStyleReadLab_inscricao_; ?>"><?php echo $this->form_encode_input($this->inscricao_); ?></span><span id="id_read_off_inscricao_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inscricao_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_inscricao__obj" style="" id="id_sc_field_inscricao_<?php echo $sc_seq_vert ?>" type=text name="inscricao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inscricao_) ?>"
 size=18 maxlength=18 alt="{datatype: 'text', maxLength: 18, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscricao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscricao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['endereco_']) && $this->nmgp_cmp_hidden['endereco_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="endereco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($endereco_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_endereco__line" id="hidden_field_data_endereco_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_endereco_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_endereco__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_endereco_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["endereco_"]) &&  $this->nmgp_cmp_readonly["endereco_"] == "on") { 

 ?>
<input type="hidden" name="endereco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($endereco_) . "\">" . $endereco_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_endereco_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-endereco_<?php echo $sc_seq_vert ?> css_endereco__line" style="<?php echo $sStyleReadLab_endereco_; ?>"><?php echo $this->form_encode_input($this->endereco_); ?></span><span id="id_read_off_endereco_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_endereco_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_endereco__obj" style="" id="id_sc_field_endereco_<?php echo $sc_seq_vert ?>" type=text name="endereco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($endereco_) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_endereco_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_endereco_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cidade_']) && $this->nmgp_cmp_hidden['cidade_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cidade_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidade_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cidade__line" id="hidden_field_data_cidade_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cidade_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cidade__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cidade_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cidade_"]) &&  $this->nmgp_cmp_readonly["cidade_"] == "on") { 

 ?>
<input type="hidden" name="cidade_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidade_) . "\">" . $cidade_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidade_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cidade_<?php echo $sc_seq_vert ?> css_cidade__line" style="<?php echo $sStyleReadLab_cidade_; ?>"><?php echo $this->form_encode_input($this->cidade_); ?></span><span id="id_read_off_cidade_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cidade_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cidade__obj" style="" id="id_sc_field_cidade_<?php echo $sc_seq_vert ?>" type=text name="cidade_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidade_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cidade_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cidade_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['estado_']) && $this->nmgp_cmp_hidden['estado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_estado__line" id="hidden_field_data_estado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_estado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_estado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_estado_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado_"]) &&  $this->nmgp_cmp_readonly["estado_"] == "on") { 

 ?>
<input type="hidden" name="estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estado_) . "\">" . $estado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-estado_<?php echo $sc_seq_vert ?> css_estado__line" style="<?php echo $sStyleReadLab_estado_; ?>"><?php echo $this->form_encode_input($this->estado_); ?></span><span id="id_read_off_estado_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estado_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_estado__obj" style="" id="id_sc_field_estado_<?php echo $sc_seq_vert ?>" type=text name="estado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estado_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['bairro_']) && $this->nmgp_cmp_hidden['bairro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_bairro__line" id="hidden_field_data_bairro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_bairro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_bairro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_bairro_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairro_"]) &&  $this->nmgp_cmp_readonly["bairro_"] == "on") { 

 ?>
<input type="hidden" name="bairro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairro_) . "\">" . $bairro_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairro_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-bairro_<?php echo $sc_seq_vert ?> css_bairro__line" style="<?php echo $sStyleReadLab_bairro_; ?>"><?php echo $this->form_encode_input($this->bairro_); ?></span><span id="id_read_off_bairro_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bairro_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_bairro__obj" style="" id="id_sc_field_bairro_<?php echo $sc_seq_vert ?>" type=text name="bairro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairro_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cep_']) && $this->nmgp_cmp_hidden['cep_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cep_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cep_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cep__line" id="hidden_field_data_cep_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cep_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cep__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cep_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cep_"]) &&  $this->nmgp_cmp_readonly["cep_"] == "on") { 

 ?>
<input type="hidden" name="cep_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cep_) . "\">" . $cep_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cep_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cep_<?php echo $sc_seq_vert ?> css_cep__line" style="<?php echo $sStyleReadLab_cep_; ?>"><?php echo $this->form_encode_input($this->cep_); ?></span><span id="id_read_off_cep_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cep_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cep__obj" style="" id="id_sc_field_cep_<?php echo $sc_seq_vert ?>" type=text name="cep_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cep_) ?>"
 size=8 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cep_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cep_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['email_']) && $this->nmgp_cmp_hidden['email_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($email_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_email__line" id="hidden_field_data_email_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_email_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_email__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_email_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email_"]) &&  $this->nmgp_cmp_readonly["email_"] == "on") { 

 ?>
<input type="hidden" name="email_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($email_) . "\">" . $email_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_email_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-email_<?php echo $sc_seq_vert ?> css_email__line" style="<?php echo $sStyleReadLab_email_; ?>"><?php echo $this->form_encode_input($this->email_); ?></span><span id="id_read_off_email_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_email_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_email__obj" style="" id="id_sc_field_email_<?php echo $sc_seq_vert ?>" type=text name="email_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($email_) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fone_']) && $this->nmgp_cmp_hidden['fone_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fone_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fone_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fone__line" id="hidden_field_data_fone_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fone_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fone__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fone_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fone_"]) &&  $this->nmgp_cmp_readonly["fone_"] == "on") { 

 ?>
<input type="hidden" name="fone_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fone_) . "\">" . $fone_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fone_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fone_<?php echo $sc_seq_vert ?> css_fone__line" style="<?php echo $sStyleReadLab_fone_; ?>"><?php echo $this->form_encode_input($this->fone_); ?></span><span id="id_read_off_fone_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fone_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_fone__obj" style="" id="id_sc_field_fone_<?php echo $sc_seq_vert ?>" type=text name="fone_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fone_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fone_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fone_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fone1_']) && $this->nmgp_cmp_hidden['fone1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fone1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fone1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fone1__line" id="hidden_field_data_fone1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fone1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fone1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fone1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fone1_"]) &&  $this->nmgp_cmp_readonly["fone1_"] == "on") { 

 ?>
<input type="hidden" name="fone1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fone1_) . "\">" . $fone1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fone1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fone1_<?php echo $sc_seq_vert ?> css_fone1__line" style="<?php echo $sStyleReadLab_fone1_; ?>"><?php echo $this->form_encode_input($this->fone1_); ?></span><span id="id_read_off_fone1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fone1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_fone1__obj" style="" id="id_sc_field_fone1_<?php echo $sc_seq_vert ?>" type=text name="fone1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fone1_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fone1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fone1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fax_']) && $this->nmgp_cmp_hidden['fax_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fax_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fax_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fax__line" id="hidden_field_data_fax_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fax_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fax__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fax_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fax_"]) &&  $this->nmgp_cmp_readonly["fax_"] == "on") { 

 ?>
<input type="hidden" name="fax_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fax_) . "\">" . $fax_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fax_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fax_<?php echo $sc_seq_vert ?> css_fax__line" style="<?php echo $sStyleReadLab_fax_; ?>"><?php echo $this->form_encode_input($this->fax_); ?></span><span id="id_read_off_fax_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fax_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_fax__obj" style="" id="id_sc_field_fax_<?php echo $sc_seq_vert ?>" type=text name="fax_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fax_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fax_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fax_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['contato_']) && $this->nmgp_cmp_hidden['contato_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contato_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contato_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_contato__line" id="hidden_field_data_contato_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_contato_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_contato__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_contato_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contato_"]) &&  $this->nmgp_cmp_readonly["contato_"] == "on") { 

 ?>
<input type="hidden" name="contato_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contato_) . "\">" . $contato_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contato_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-contato_<?php echo $sc_seq_vert ?> css_contato__line" style="<?php echo $sStyleReadLab_contato_; ?>"><?php echo $this->form_encode_input($this->contato_); ?></span><span id="id_read_off_contato_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contato_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_contato__obj" style="" id="id_sc_field_contato_<?php echo $sc_seq_vert ?>" type=text name="contato_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contato_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contato_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contato_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['enderecocobranca_']) && $this->nmgp_cmp_hidden['enderecocobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enderecocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enderecocobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_enderecocobranca__line" id="hidden_field_data_enderecocobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_enderecocobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_enderecocobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_enderecocobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enderecocobranca_"]) &&  $this->nmgp_cmp_readonly["enderecocobranca_"] == "on") { 

 ?>
<input type="hidden" name="enderecocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enderecocobranca_) . "\">" . $enderecocobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_enderecocobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-enderecocobranca_<?php echo $sc_seq_vert ?> css_enderecocobranca__line" style="<?php echo $sStyleReadLab_enderecocobranca_; ?>"><?php echo $this->form_encode_input($this->enderecocobranca_); ?></span><span id="id_read_off_enderecocobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_enderecocobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_enderecocobranca__obj" style="" id="id_sc_field_enderecocobranca_<?php echo $sc_seq_vert ?>" type=text name="enderecocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enderecocobranca_) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enderecocobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enderecocobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cidadecobranca_']) && $this->nmgp_cmp_hidden['cidadecobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cidadecobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidadecobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cidadecobranca__line" id="hidden_field_data_cidadecobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cidadecobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cidadecobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cidadecobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cidadecobranca_"]) &&  $this->nmgp_cmp_readonly["cidadecobranca_"] == "on") { 

 ?>
<input type="hidden" name="cidadecobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidadecobranca_) . "\">" . $cidadecobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidadecobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cidadecobranca_<?php echo $sc_seq_vert ?> css_cidadecobranca__line" style="<?php echo $sStyleReadLab_cidadecobranca_; ?>"><?php echo $this->form_encode_input($this->cidadecobranca_); ?></span><span id="id_read_off_cidadecobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cidadecobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cidadecobranca__obj" style="" id="id_sc_field_cidadecobranca_<?php echo $sc_seq_vert ?>" type=text name="cidadecobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidadecobranca_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cidadecobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cidadecobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['bairrocobranca_']) && $this->nmgp_cmp_hidden['bairrocobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairrocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairrocobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_bairrocobranca__line" id="hidden_field_data_bairrocobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_bairrocobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_bairrocobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_bairrocobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairrocobranca_"]) &&  $this->nmgp_cmp_readonly["bairrocobranca_"] == "on") { 

 ?>
<input type="hidden" name="bairrocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairrocobranca_) . "\">" . $bairrocobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairrocobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-bairrocobranca_<?php echo $sc_seq_vert ?> css_bairrocobranca__line" style="<?php echo $sStyleReadLab_bairrocobranca_; ?>"><?php echo $this->form_encode_input($this->bairrocobranca_); ?></span><span id="id_read_off_bairrocobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bairrocobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_bairrocobranca__obj" style="" id="id_sc_field_bairrocobranca_<?php echo $sc_seq_vert ?>" type=text name="bairrocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairrocobranca_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairrocobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairrocobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['estadocobranca_']) && $this->nmgp_cmp_hidden['estadocobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estadocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estadocobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_estadocobranca__line" id="hidden_field_data_estadocobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_estadocobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_estadocobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_estadocobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estadocobranca_"]) &&  $this->nmgp_cmp_readonly["estadocobranca_"] == "on") { 

 ?>
<input type="hidden" name="estadocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estadocobranca_) . "\">" . $estadocobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estadocobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-estadocobranca_<?php echo $sc_seq_vert ?> css_estadocobranca__line" style="<?php echo $sStyleReadLab_estadocobranca_; ?>"><?php echo $this->form_encode_input($this->estadocobranca_); ?></span><span id="id_read_off_estadocobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estadocobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_estadocobranca__obj" style="" id="id_sc_field_estadocobranca_<?php echo $sc_seq_vert ?>" type=text name="estadocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estadocobranca_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estadocobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estadocobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cepcobranca_']) && $this->nmgp_cmp_hidden['cepcobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cepcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cepcobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cepcobranca__line" id="hidden_field_data_cepcobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cepcobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cepcobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cepcobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cepcobranca_"]) &&  $this->nmgp_cmp_readonly["cepcobranca_"] == "on") { 

 ?>
<input type="hidden" name="cepcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cepcobranca_) . "\">" . $cepcobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cepcobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cepcobranca_<?php echo $sc_seq_vert ?> css_cepcobranca__line" style="<?php echo $sStyleReadLab_cepcobranca_; ?>"><?php echo $this->form_encode_input($this->cepcobranca_); ?></span><span id="id_read_off_cepcobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cepcobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cepcobranca__obj" style="" id="id_sc_field_cepcobranca_<?php echo $sc_seq_vert ?>" type=text name="cepcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cepcobranca_) ?>"
 size=8 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cepcobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cepcobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fonecobranca_']) && $this->nmgp_cmp_hidden['fonecobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fonecobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fonecobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fonecobranca__line" id="hidden_field_data_fonecobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fonecobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fonecobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fonecobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fonecobranca_"]) &&  $this->nmgp_cmp_readonly["fonecobranca_"] == "on") { 

 ?>
<input type="hidden" name="fonecobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fonecobranca_) . "\">" . $fonecobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fonecobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fonecobranca_<?php echo $sc_seq_vert ?> css_fonecobranca__line" style="<?php echo $sStyleReadLab_fonecobranca_; ?>"><?php echo $this->form_encode_input($this->fonecobranca_); ?></span><span id="id_read_off_fonecobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fonecobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_fonecobranca__obj" style="" id="id_sc_field_fonecobranca_<?php echo $sc_seq_vert ?>" type=text name="fonecobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fonecobranca_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fonecobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fonecobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['faxcobranca_']) && $this->nmgp_cmp_hidden['faxcobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="faxcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($faxcobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_faxcobranca__line" id="hidden_field_data_faxcobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_faxcobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_faxcobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_faxcobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["faxcobranca_"]) &&  $this->nmgp_cmp_readonly["faxcobranca_"] == "on") { 

 ?>
<input type="hidden" name="faxcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($faxcobranca_) . "\">" . $faxcobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_faxcobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-faxcobranca_<?php echo $sc_seq_vert ?> css_faxcobranca__line" style="<?php echo $sStyleReadLab_faxcobranca_; ?>"><?php echo $this->form_encode_input($this->faxcobranca_); ?></span><span id="id_read_off_faxcobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_faxcobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_faxcobranca__obj" style="" id="id_sc_field_faxcobranca_<?php echo $sc_seq_vert ?>" type=text name="faxcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($faxcobranca_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_faxcobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_faxcobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['contatocobranca_']) && $this->nmgp_cmp_hidden['contatocobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatocobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_contatocobranca__line" id="hidden_field_data_contatocobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_contatocobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_contatocobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_contatocobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatocobranca_"]) &&  $this->nmgp_cmp_readonly["contatocobranca_"] == "on") { 

 ?>
<input type="hidden" name="contatocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatocobranca_) . "\">" . $contatocobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatocobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-contatocobranca_<?php echo $sc_seq_vert ?> css_contatocobranca__line" style="<?php echo $sStyleReadLab_contatocobranca_; ?>"><?php echo $this->form_encode_input($this->contatocobranca_); ?></span><span id="id_read_off_contatocobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contatocobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_contatocobranca__obj" style="" id="id_sc_field_contatocobranca_<?php echo $sc_seq_vert ?>" type=text name="contatocobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatocobranca_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatocobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatocobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cgcentrega_']) && $this->nmgp_cmp_hidden['cgcentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgcentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cgcentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cgcentrega__line" id="hidden_field_data_cgcentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cgcentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cgcentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cgcentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgcentrega_"]) &&  $this->nmgp_cmp_readonly["cgcentrega_"] == "on") { 

 ?>
<input type="hidden" name="cgcentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cgcentrega_) . "\">" . $cgcentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgcentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cgcentrega_<?php echo $sc_seq_vert ?> css_cgcentrega__line" style="<?php echo $sStyleReadLab_cgcentrega_; ?>"><?php echo $this->form_encode_input($this->cgcentrega_); ?></span><span id="id_read_off_cgcentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cgcentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cgcentrega__obj" style="" id="id_sc_field_cgcentrega_<?php echo $sc_seq_vert ?>" type=text name="cgcentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cgcentrega_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgcentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgcentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['inscricaoentrega_']) && $this->nmgp_cmp_hidden['inscricaoentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscricaoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inscricaoentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_inscricaoentrega__line" id="hidden_field_data_inscricaoentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_inscricaoentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_inscricaoentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_inscricaoentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscricaoentrega_"]) &&  $this->nmgp_cmp_readonly["inscricaoentrega_"] == "on") { 

 ?>
<input type="hidden" name="inscricaoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inscricaoentrega_) . "\">" . $inscricaoentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscricaoentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-inscricaoentrega_<?php echo $sc_seq_vert ?> css_inscricaoentrega__line" style="<?php echo $sStyleReadLab_inscricaoentrega_; ?>"><?php echo $this->form_encode_input($this->inscricaoentrega_); ?></span><span id="id_read_off_inscricaoentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inscricaoentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_inscricaoentrega__obj" style="" id="id_sc_field_inscricaoentrega_<?php echo $sc_seq_vert ?>" type=text name="inscricaoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($inscricaoentrega_) ?>"
 size=18 maxlength=18 alt="{datatype: 'text', maxLength: 18, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscricaoentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscricaoentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['enderecoentrega_']) && $this->nmgp_cmp_hidden['enderecoentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enderecoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enderecoentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_enderecoentrega__line" id="hidden_field_data_enderecoentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_enderecoentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_enderecoentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_enderecoentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enderecoentrega_"]) &&  $this->nmgp_cmp_readonly["enderecoentrega_"] == "on") { 

 ?>
<input type="hidden" name="enderecoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enderecoentrega_) . "\">" . $enderecoentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_enderecoentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-enderecoentrega_<?php echo $sc_seq_vert ?> css_enderecoentrega__line" style="<?php echo $sStyleReadLab_enderecoentrega_; ?>"><?php echo $this->form_encode_input($this->enderecoentrega_); ?></span><span id="id_read_off_enderecoentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_enderecoentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_enderecoentrega__obj" style="" id="id_sc_field_enderecoentrega_<?php echo $sc_seq_vert ?>" type=text name="enderecoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($enderecoentrega_) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enderecoentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enderecoentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cidadeentrega_']) && $this->nmgp_cmp_hidden['cidadeentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cidadeentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidadeentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cidadeentrega__line" id="hidden_field_data_cidadeentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cidadeentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cidadeentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cidadeentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cidadeentrega_"]) &&  $this->nmgp_cmp_readonly["cidadeentrega_"] == "on") { 

 ?>
<input type="hidden" name="cidadeentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidadeentrega_) . "\">" . $cidadeentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidadeentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cidadeentrega_<?php echo $sc_seq_vert ?> css_cidadeentrega__line" style="<?php echo $sStyleReadLab_cidadeentrega_; ?>"><?php echo $this->form_encode_input($this->cidadeentrega_); ?></span><span id="id_read_off_cidadeentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cidadeentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cidadeentrega__obj" style="" id="id_sc_field_cidadeentrega_<?php echo $sc_seq_vert ?>" type=text name="cidadeentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cidadeentrega_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cidadeentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cidadeentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['bairroentrega_']) && $this->nmgp_cmp_hidden['bairroentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairroentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairroentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_bairroentrega__line" id="hidden_field_data_bairroentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_bairroentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_bairroentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_bairroentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairroentrega_"]) &&  $this->nmgp_cmp_readonly["bairroentrega_"] == "on") { 

 ?>
<input type="hidden" name="bairroentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairroentrega_) . "\">" . $bairroentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairroentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-bairroentrega_<?php echo $sc_seq_vert ?> css_bairroentrega__line" style="<?php echo $sStyleReadLab_bairroentrega_; ?>"><?php echo $this->form_encode_input($this->bairroentrega_); ?></span><span id="id_read_off_bairroentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bairroentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_bairroentrega__obj" style="" id="id_sc_field_bairroentrega_<?php echo $sc_seq_vert ?>" type=text name="bairroentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bairroentrega_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairroentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairroentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['estadoentrega_']) && $this->nmgp_cmp_hidden['estadoentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estadoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estadoentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_estadoentrega__line" id="hidden_field_data_estadoentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_estadoentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_estadoentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_estadoentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estadoentrega_"]) &&  $this->nmgp_cmp_readonly["estadoentrega_"] == "on") { 

 ?>
<input type="hidden" name="estadoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estadoentrega_) . "\">" . $estadoentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estadoentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-estadoentrega_<?php echo $sc_seq_vert ?> css_estadoentrega__line" style="<?php echo $sStyleReadLab_estadoentrega_; ?>"><?php echo $this->form_encode_input($this->estadoentrega_); ?></span><span id="id_read_off_estadoentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_estadoentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_estadoentrega__obj" style="" id="id_sc_field_estadoentrega_<?php echo $sc_seq_vert ?>" type=text name="estadoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($estadoentrega_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estadoentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estadoentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['cepentrega_']) && $this->nmgp_cmp_hidden['cepentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cepentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cepentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_cepentrega__line" id="hidden_field_data_cepentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_cepentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_cepentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_cepentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cepentrega_"]) &&  $this->nmgp_cmp_readonly["cepentrega_"] == "on") { 

 ?>
<input type="hidden" name="cepentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cepentrega_) . "\">" . $cepentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cepentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-cepentrega_<?php echo $sc_seq_vert ?> css_cepentrega__line" style="<?php echo $sStyleReadLab_cepentrega_; ?>"><?php echo $this->form_encode_input($this->cepentrega_); ?></span><span id="id_read_off_cepentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cepentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_cepentrega__obj" style="" id="id_sc_field_cepentrega_<?php echo $sc_seq_vert ?>" type=text name="cepentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($cepentrega_) ?>"
 size=8 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cepentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cepentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['foneentrega_']) && $this->nmgp_cmp_hidden['foneentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foneentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($foneentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_foneentrega__line" id="hidden_field_data_foneentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_foneentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_foneentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_foneentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foneentrega_"]) &&  $this->nmgp_cmp_readonly["foneentrega_"] == "on") { 

 ?>
<input type="hidden" name="foneentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($foneentrega_) . "\">" . $foneentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_foneentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-foneentrega_<?php echo $sc_seq_vert ?> css_foneentrega__line" style="<?php echo $sStyleReadLab_foneentrega_; ?>"><?php echo $this->form_encode_input($this->foneentrega_); ?></span><span id="id_read_off_foneentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foneentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_foneentrega__obj" style="" id="id_sc_field_foneentrega_<?php echo $sc_seq_vert ?>" type=text name="foneentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($foneentrega_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foneentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foneentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['contatoentrega_']) && $this->nmgp_cmp_hidden['contatoentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatoentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_contatoentrega__line" id="hidden_field_data_contatoentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_contatoentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_contatoentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_contatoentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatoentrega_"]) &&  $this->nmgp_cmp_readonly["contatoentrega_"] == "on") { 

 ?>
<input type="hidden" name="contatoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatoentrega_) . "\">" . $contatoentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatoentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-contatoentrega_<?php echo $sc_seq_vert ?> css_contatoentrega__line" style="<?php echo $sStyleReadLab_contatoentrega_; ?>"><?php echo $this->form_encode_input($this->contatoentrega_); ?></span><span id="id_read_off_contatoentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contatoentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_contatoentrega__obj" style="" id="id_sc_field_contatoentrega_<?php echo $sc_seq_vert ?>" type=text name="contatoentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatoentrega_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatoentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatoentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['contatoexpedicao_']) && $this->nmgp_cmp_hidden['contatoexpedicao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatoexpedicao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatoexpedicao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_contatoexpedicao__line" id="hidden_field_data_contatoexpedicao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_contatoexpedicao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_contatoexpedicao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_contatoexpedicao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatoexpedicao_"]) &&  $this->nmgp_cmp_readonly["contatoexpedicao_"] == "on") { 

 ?>
<input type="hidden" name="contatoexpedicao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatoexpedicao_) . "\">" . $contatoexpedicao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatoexpedicao_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-contatoexpedicao_<?php echo $sc_seq_vert ?> css_contatoexpedicao__line" style="<?php echo $sStyleReadLab_contatoexpedicao_; ?>"><?php echo $this->form_encode_input($this->contatoexpedicao_); ?></span><span id="id_read_off_contatoexpedicao_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contatoexpedicao_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_contatoexpedicao__obj" style="" id="id_sc_field_contatoexpedicao_<?php echo $sc_seq_vert ?>" type=text name="contatoexpedicao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatoexpedicao_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatoexpedicao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatoexpedicao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['foneexpedicao_']) && $this->nmgp_cmp_hidden['foneexpedicao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foneexpedicao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($foneexpedicao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_foneexpedicao__line" id="hidden_field_data_foneexpedicao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_foneexpedicao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_foneexpedicao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_foneexpedicao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foneexpedicao_"]) &&  $this->nmgp_cmp_readonly["foneexpedicao_"] == "on") { 

 ?>
<input type="hidden" name="foneexpedicao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($foneexpedicao_) . "\">" . $foneexpedicao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_foneexpedicao_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-foneexpedicao_<?php echo $sc_seq_vert ?> css_foneexpedicao__line" style="<?php echo $sStyleReadLab_foneexpedicao_; ?>"><?php echo $this->form_encode_input($this->foneexpedicao_); ?></span><span id="id_read_off_foneexpedicao_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_foneexpedicao_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_foneexpedicao__obj" style="" id="id_sc_field_foneexpedicao_<?php echo $sc_seq_vert ?>" type=text name="foneexpedicao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($foneexpedicao_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foneexpedicao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foneexpedicao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['datacadastro_']) && $this->nmgp_cmp_hidden['datacadastro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="datacadastro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($datacadastro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_datacadastro__line" id="hidden_field_data_datacadastro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_datacadastro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_datacadastro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_datacadastro_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["datacadastro_"]) &&  $this->nmgp_cmp_readonly["datacadastro_"] == "on") { 

 ?>
<input type="hidden" name="datacadastro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($datacadastro_) . "\">" . $datacadastro_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_datacadastro_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-datacadastro_<?php echo $sc_seq_vert ?> css_datacadastro__line" style="<?php echo $sStyleReadLab_datacadastro_; ?>"><?php echo $this->form_encode_input($datacadastro_); ?></span><span id="id_read_off_datacadastro_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_datacadastro_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_datacadastro__obj" style="" id="id_sc_field_datacadastro_<?php echo $sc_seq_vert ?>" type=text name="datacadastro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($datacadastro_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['datacadastro_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['datacadastro_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['datacadastro_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['datacadastro_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_datacadastro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_datacadastro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->datacadastro_ = $old_dt_datacadastro_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_obs__line" id="hidden_field_data_obs_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_obs_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_obs__line" style="vertical-align: top;padding: 0px">
<?php
$obs__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obs_));

?>

<?php if ($bTestReadOnly_obs_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obs_"]) &&  $this->nmgp_cmp_readonly["obs_"] == "on") { 

 ?>
<input type="hidden" name="obs_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($obs_) . "\">" . $obs__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-obs_<?php echo $sc_seq_vert ?> css_obs__line" style="<?php echo $sStyleReadLab_obs_; ?>"><?php echo $this->form_encode_input($obs__val); ?></span><span id="id_read_off_obs_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_obs_; ?>">
 <textarea  class="sc-js-input scFormObjectOddMult css_obs__obj" style="white-space: pre-wrap;" name="obs_<?php echo $sc_seq_vert ?>" id="id_sc_field_obs_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obs_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tipo__line" id="hidden_field_data_tipo_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tipo_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tipo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tipo_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_"]) &&  $this->nmgp_cmp_readonly["tipo_"] == "on") { 

 ?>
<input type="hidden" name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_) . "\">" . $tipo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tipo_<?php echo $sc_seq_vert ?> css_tipo__line" style="<?php echo $sStyleReadLab_tipo_; ?>"><?php echo $this->form_encode_input($this->tipo_); ?></span><span id="id_read_off_tipo_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_tipo__obj" style="" id="id_sc_field_tipo_<?php echo $sc_seq_vert ?>" type=text name="tipo_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tipo_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['consumidor_']) && $this->nmgp_cmp_hidden['consumidor_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consumidor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($consumidor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_consumidor__line" id="hidden_field_data_consumidor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_consumidor_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_consumidor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_consumidor_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consumidor_"]) &&  $this->nmgp_cmp_readonly["consumidor_"] == "on") { 

 ?>
<input type="hidden" name="consumidor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($consumidor_) . "\">" . $consumidor_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_consumidor_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-consumidor_<?php echo $sc_seq_vert ?> css_consumidor__line" style="<?php echo $sStyleReadLab_consumidor_; ?>"><?php echo $this->form_encode_input($this->consumidor_); ?></span><span id="id_read_off_consumidor_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_consumidor_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_consumidor__obj" style="" id="id_sc_field_consumidor_<?php echo $sc_seq_vert ?>" type=text name="consumidor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($consumidor_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_consumidor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_consumidor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['licensa_']) && $this->nmgp_cmp_hidden['licensa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="licensa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_licensa__line" id="hidden_field_data_licensa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_licensa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_licensa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_licensa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["licensa_"]) &&  $this->nmgp_cmp_readonly["licensa_"] == "on") { 

 ?>
<input type="hidden" name="licensa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa_) . "\">" . $licensa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_licensa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-licensa_<?php echo $sc_seq_vert ?> css_licensa__line" style="<?php echo $sStyleReadLab_licensa_; ?>"><?php echo $this->form_encode_input($this->licensa_); ?></span><span id="id_read_off_licensa_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_licensa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_licensa__obj" style="" id="id_sc_field_licensa_<?php echo $sc_seq_vert ?>" type=text name="licensa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_licensa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_licensa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['venctolicensa_']) && $this->nmgp_cmp_hidden['venctolicensa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="venctolicensa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_venctolicensa__line" id="hidden_field_data_venctolicensa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_venctolicensa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_venctolicensa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_venctolicensa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["venctolicensa_"]) &&  $this->nmgp_cmp_readonly["venctolicensa_"] == "on") { 

 ?>
<input type="hidden" name="venctolicensa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa_) . "\">" . $venctolicensa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_venctolicensa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-venctolicensa_<?php echo $sc_seq_vert ?> css_venctolicensa__line" style="<?php echo $sStyleReadLab_venctolicensa_; ?>"><?php echo $this->form_encode_input($venctolicensa_); ?></span><span id="id_read_off_venctolicensa_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_venctolicensa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_venctolicensa__obj" style="" id="id_sc_field_venctolicensa_<?php echo $sc_seq_vert ?>" type=text name="venctolicensa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['venctolicensa_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['venctolicensa_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['venctolicensa_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['venctolicensa_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_venctolicensa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_venctolicensa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->venctolicensa_ = $old_dt_venctolicensa_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['licensa1_']) && $this->nmgp_cmp_hidden['licensa1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="licensa1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_licensa1__line" id="hidden_field_data_licensa1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_licensa1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_licensa1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_licensa1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["licensa1_"]) &&  $this->nmgp_cmp_readonly["licensa1_"] == "on") { 

 ?>
<input type="hidden" name="licensa1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa1_) . "\">" . $licensa1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_licensa1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-licensa1_<?php echo $sc_seq_vert ?> css_licensa1__line" style="<?php echo $sStyleReadLab_licensa1_; ?>"><?php echo $this->form_encode_input($this->licensa1_); ?></span><span id="id_read_off_licensa1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_licensa1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_licensa1__obj" style="" id="id_sc_field_licensa1_<?php echo $sc_seq_vert ?>" type=text name="licensa1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa1_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_licensa1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_licensa1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['venctolicensa1_']) && $this->nmgp_cmp_hidden['venctolicensa1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="venctolicensa1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_venctolicensa1__line" id="hidden_field_data_venctolicensa1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_venctolicensa1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_venctolicensa1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_venctolicensa1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["venctolicensa1_"]) &&  $this->nmgp_cmp_readonly["venctolicensa1_"] == "on") { 

 ?>
<input type="hidden" name="venctolicensa1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa1_) . "\">" . $venctolicensa1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_venctolicensa1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-venctolicensa1_<?php echo $sc_seq_vert ?> css_venctolicensa1__line" style="<?php echo $sStyleReadLab_venctolicensa1_; ?>"><?php echo $this->form_encode_input($venctolicensa1_); ?></span><span id="id_read_off_venctolicensa1_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_venctolicensa1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_venctolicensa1__obj" style="" id="id_sc_field_venctolicensa1_<?php echo $sc_seq_vert ?>" type=text name="venctolicensa1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa1_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['venctolicensa1_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['venctolicensa1_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['venctolicensa1_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['venctolicensa1_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_venctolicensa1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_venctolicensa1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->venctolicensa1_ = $old_dt_venctolicensa1_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['qtdeliberada_']) && $this->nmgp_cmp_hidden['qtdeliberada_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qtdeliberada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qtdeliberada_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_qtdeliberada__line" id="hidden_field_data_qtdeliberada_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_qtdeliberada_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_qtdeliberada__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_qtdeliberada_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qtdeliberada_"]) &&  $this->nmgp_cmp_readonly["qtdeliberada_"] == "on") { 

 ?>
<input type="hidden" name="qtdeliberada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qtdeliberada_) . "\">" . $qtdeliberada_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_qtdeliberada_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-qtdeliberada_<?php echo $sc_seq_vert ?> css_qtdeliberada__line" style="<?php echo $sStyleReadLab_qtdeliberada_; ?>"><?php echo $this->form_encode_input($this->qtdeliberada_); ?></span><span id="id_read_off_qtdeliberada_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_qtdeliberada_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_qtdeliberada__obj" style="" id="id_sc_field_qtdeliberada_<?php echo $sc_seq_vert ?>" type=text name="qtdeliberada_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qtdeliberada_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['qtdeliberada_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['qtdeliberada_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['qtdeliberada_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['qtdeliberada_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qtdeliberada_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qtdeliberada_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['licensa2_']) && $this->nmgp_cmp_hidden['licensa2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="licensa2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_licensa2__line" id="hidden_field_data_licensa2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_licensa2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_licensa2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_licensa2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["licensa2_"]) &&  $this->nmgp_cmp_readonly["licensa2_"] == "on") { 

 ?>
<input type="hidden" name="licensa2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa2_) . "\">" . $licensa2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_licensa2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-licensa2_<?php echo $sc_seq_vert ?> css_licensa2__line" style="<?php echo $sStyleReadLab_licensa2_; ?>"><?php echo $this->form_encode_input($this->licensa2_); ?></span><span id="id_read_off_licensa2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_licensa2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_licensa2__obj" style="" id="id_sc_field_licensa2_<?php echo $sc_seq_vert ?>" type=text name="licensa2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($licensa2_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_licensa2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_licensa2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['venctolicensa2_']) && $this->nmgp_cmp_hidden['venctolicensa2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="venctolicensa2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_venctolicensa2__line" id="hidden_field_data_venctolicensa2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_venctolicensa2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_venctolicensa2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_venctolicensa2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["venctolicensa2_"]) &&  $this->nmgp_cmp_readonly["venctolicensa2_"] == "on") { 

 ?>
<input type="hidden" name="venctolicensa2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa2_) . "\">" . $venctolicensa2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_venctolicensa2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-venctolicensa2_<?php echo $sc_seq_vert ?> css_venctolicensa2__line" style="<?php echo $sStyleReadLab_venctolicensa2_; ?>"><?php echo $this->form_encode_input($venctolicensa2_); ?></span><span id="id_read_off_venctolicensa2_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_venctolicensa2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_venctolicensa2__obj" style="" id="id_sc_field_venctolicensa2_<?php echo $sc_seq_vert ?>" type=text name="venctolicensa2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($venctolicensa2_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['venctolicensa2_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['venctolicensa2_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['venctolicensa2_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['venctolicensa2_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_venctolicensa2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_venctolicensa2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->venctolicensa2_ = $old_dt_venctolicensa2_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['icms_']) && $this->nmgp_cmp_hidden['icms_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="icms_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($icms_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_icms__line" id="hidden_field_data_icms_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_icms_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_icms__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_icms_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["icms_"]) &&  $this->nmgp_cmp_readonly["icms_"] == "on") { 

 ?>
<input type="hidden" name="icms_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($icms_) . "\">" . $icms_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_icms_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-icms_<?php echo $sc_seq_vert ?> css_icms__line" style="<?php echo $sStyleReadLab_icms_; ?>"><?php echo $this->form_encode_input($this->icms_); ?></span><span id="id_read_off_icms_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_icms_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_icms__obj" style="" id="id_sc_field_icms_<?php echo $sc_seq_vert ?>" type=text name="icms_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($icms_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['icms_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['icms_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['icms_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['icms_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_icms_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_icms_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['suframa_']) && $this->nmgp_cmp_hidden['suframa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="suframa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($suframa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_suframa__line" id="hidden_field_data_suframa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_suframa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_suframa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_suframa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["suframa_"]) &&  $this->nmgp_cmp_readonly["suframa_"] == "on") { 

 ?>
<input type="hidden" name="suframa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($suframa_) . "\">" . $suframa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_suframa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-suframa_<?php echo $sc_seq_vert ?> css_suframa__line" style="<?php echo $sStyleReadLab_suframa_; ?>"><?php echo $this->form_encode_input($this->suframa_); ?></span><span id="id_read_off_suframa_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_suframa_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_suframa__obj" style="" id="id_sc_field_suframa_<?php echo $sc_seq_vert ?>" type=text name="suframa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($suframa_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_suframa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_suframa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['limitecredito_']) && $this->nmgp_cmp_hidden['limitecredito_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="limitecredito_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($limitecredito_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_limitecredito__line" id="hidden_field_data_limitecredito_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_limitecredito_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_limitecredito__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_limitecredito_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["limitecredito_"]) &&  $this->nmgp_cmp_readonly["limitecredito_"] == "on") { 

 ?>
<input type="hidden" name="limitecredito_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($limitecredito_) . "\">" . $limitecredito_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_limitecredito_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-limitecredito_<?php echo $sc_seq_vert ?> css_limitecredito__line" style="<?php echo $sStyleReadLab_limitecredito_; ?>"><?php echo $this->form_encode_input($this->limitecredito_); ?></span><span id="id_read_off_limitecredito_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_limitecredito_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_limitecredito__obj" style="" id="id_sc_field_limitecredito_<?php echo $sc_seq_vert ?>" type=text name="limitecredito_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($limitecredito_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['limitecredito_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['limitecredito_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['limitecredito_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['limitecredito_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_limitecredito_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_limitecredito_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['vendedor_']) && $this->nmgp_cmp_hidden['vendedor_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vendedor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($vendedor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_vendedor__line" id="hidden_field_data_vendedor_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_vendedor_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_vendedor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_vendedor_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vendedor_"]) &&  $this->nmgp_cmp_readonly["vendedor_"] == "on") { 

 ?>
<input type="hidden" name="vendedor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($vendedor_) . "\">" . $vendedor_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_vendedor_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-vendedor_<?php echo $sc_seq_vert ?> css_vendedor__line" style="<?php echo $sStyleReadLab_vendedor_; ?>"><?php echo $this->form_encode_input($this->vendedor_); ?></span><span id="id_read_off_vendedor_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_vendedor_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_vendedor__obj" style="" id="id_sc_field_vendedor_<?php echo $sc_seq_vert ?>" type=text name="vendedor_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($vendedor_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vendedor_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vendedor_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['restricao_']) && $this->nmgp_cmp_hidden['restricao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="restricao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($restricao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_restricao__line" id="hidden_field_data_restricao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_restricao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_restricao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_restricao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["restricao_"]) &&  $this->nmgp_cmp_readonly["restricao_"] == "on") { 

 ?>
<input type="hidden" name="restricao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($restricao_) . "\">" . $restricao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_restricao_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-restricao_<?php echo $sc_seq_vert ?> css_restricao__line" style="<?php echo $sStyleReadLab_restricao_; ?>"><?php echo $this->form_encode_input($this->restricao_); ?></span><span id="id_read_off_restricao_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_restricao_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_restricao__obj" style="" id="id_sc_field_restricao_<?php echo $sc_seq_vert ?>" type=text name="restricao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($restricao_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_restricao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_restricao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['comissao_']) && $this->nmgp_cmp_hidden['comissao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="comissao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comissao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_comissao__line" id="hidden_field_data_comissao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_comissao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_comissao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_comissao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comissao_"]) &&  $this->nmgp_cmp_readonly["comissao_"] == "on") { 

 ?>
<input type="hidden" name="comissao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comissao_) . "\">" . $comissao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_comissao_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-comissao_<?php echo $sc_seq_vert ?> css_comissao__line" style="<?php echo $sStyleReadLab_comissao_; ?>"><?php echo $this->form_encode_input($this->comissao_); ?></span><span id="id_read_off_comissao_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_comissao_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_comissao__obj" style="" id="id_sc_field_comissao_<?php echo $sc_seq_vert ?>" type=text name="comissao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($comissao_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['comissao_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['comissao_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['comissao_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['comissao_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comissao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comissao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['transportadora_']) && $this->nmgp_cmp_hidden['transportadora_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="transportadora_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($transportadora_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_transportadora__line" id="hidden_field_data_transportadora_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_transportadora_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_transportadora__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_transportadora_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["transportadora_"]) &&  $this->nmgp_cmp_readonly["transportadora_"] == "on") { 

 ?>
<input type="hidden" name="transportadora_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($transportadora_) . "\">" . $transportadora_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_transportadora_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-transportadora_<?php echo $sc_seq_vert ?> css_transportadora__line" style="<?php echo $sStyleReadLab_transportadora_; ?>"><?php echo $this->form_encode_input($this->transportadora_); ?></span><span id="id_read_off_transportadora_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_transportadora_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_transportadora__obj" style="" id="id_sc_field_transportadora_<?php echo $sc_seq_vert ?>" type=text name="transportadora_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($transportadora_) ?>"
 size=4 maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_transportadora_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_transportadora_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['coleta_']) && $this->nmgp_cmp_hidden['coleta_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coleta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($coleta_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_coleta__line" id="hidden_field_data_coleta_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_coleta_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_coleta__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_coleta_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["coleta_"]) &&  $this->nmgp_cmp_readonly["coleta_"] == "on") { 

 ?>
<input type="hidden" name="coleta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($coleta_) . "\">" . $coleta_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_coleta_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-coleta_<?php echo $sc_seq_vert ?> css_coleta__line" style="<?php echo $sStyleReadLab_coleta_; ?>"><?php echo $this->form_encode_input($this->coleta_); ?></span><span id="id_read_off_coleta_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_coleta_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_coleta__obj" style="" id="id_sc_field_coleta_<?php echo $sc_seq_vert ?>" type=text name="coleta_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($coleta_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coleta_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coleta_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['segmento_']) && $this->nmgp_cmp_hidden['segmento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="segmento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segmento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_segmento__line" id="hidden_field_data_segmento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_segmento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_segmento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_segmento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["segmento_"]) &&  $this->nmgp_cmp_readonly["segmento_"] == "on") { 

 ?>
<input type="hidden" name="segmento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segmento_) . "\">" . $segmento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_segmento_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-segmento_<?php echo $sc_seq_vert ?> css_segmento__line" style="<?php echo $sStyleReadLab_segmento_; ?>"><?php echo $this->form_encode_input($this->segmento_); ?></span><span id="id_read_off_segmento_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_segmento_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_segmento__obj" style="" id="id_sc_field_segmento_<?php echo $sc_seq_vert ?>" type=text name="segmento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($segmento_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['segmento_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['segmento_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['segmento_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['segmento_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_segmento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_segmento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dataalteracao_']) && $this->nmgp_cmp_hidden['dataalteracao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dataalteracao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dataalteracao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dataalteracao__line" id="hidden_field_data_dataalteracao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dataalteracao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dataalteracao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dataalteracao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dataalteracao_"]) &&  $this->nmgp_cmp_readonly["dataalteracao_"] == "on") { 

 ?>
<input type="hidden" name="dataalteracao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dataalteracao_) . "\">" . $dataalteracao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dataalteracao_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-dataalteracao_<?php echo $sc_seq_vert ?> css_dataalteracao__line" style="<?php echo $sStyleReadLab_dataalteracao_; ?>"><?php echo $this->form_encode_input($dataalteracao_); ?></span><span id="id_read_off_dataalteracao_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_dataalteracao_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_dataalteracao__obj" style="" id="id_sc_field_dataalteracao_<?php echo $sc_seq_vert ?>" type=text name="dataalteracao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dataalteracao_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['dataalteracao_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['dataalteracao_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['dataalteracao_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['dataalteracao_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dataalteracao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dataalteracao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->dataalteracao_ = $old_dt_dataalteracao_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_usuario__line" id="hidden_field_data_usuario_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_usuario_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_usuario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_usuario_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario_"]) &&  $this->nmgp_cmp_readonly["usuario_"] == "on") { 

 ?>
<input type="hidden" name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) . "\">" . $usuario_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-usuario_<?php echo $sc_seq_vert ?> css_usuario__line" style="<?php echo $sStyleReadLab_usuario_; ?>"><?php echo $this->form_encode_input($this->usuario_); ?></span><span id="id_read_off_usuario_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_usuario__obj" style="" id="id_sc_field_usuario_<?php echo $sc_seq_vert ?>" type=text name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['requisitos_']) && $this->nmgp_cmp_hidden['requisitos_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="requisitos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($requisitos_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_requisitos__line" id="hidden_field_data_requisitos_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_requisitos_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_requisitos__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_requisitos_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["requisitos_"]) &&  $this->nmgp_cmp_readonly["requisitos_"] == "on") { 

 ?>
<input type="hidden" name="requisitos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($requisitos_) . "\">" . $requisitos_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_requisitos_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-requisitos_<?php echo $sc_seq_vert ?> css_requisitos__line" style="<?php echo $sStyleReadLab_requisitos_; ?>"><?php echo $this->form_encode_input($this->requisitos_); ?></span><span id="id_read_off_requisitos_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_requisitos_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_requisitos__obj" style="" id="id_sc_field_requisitos_<?php echo $sc_seq_vert ?>" type=text name="requisitos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($requisitos_) ?>"
 size=50 maxlength=240 alt="{datatype: 'text', maxLength: 240, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_requisitos_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_requisitos_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['banco_']) && $this->nmgp_cmp_hidden['banco_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="banco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($banco_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_banco__line" id="hidden_field_data_banco_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_banco_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_banco__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_banco_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco_"]) &&  $this->nmgp_cmp_readonly["banco_"] == "on") { 

 ?>
<input type="hidden" name="banco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($banco_) . "\">" . $banco_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_banco_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-banco_<?php echo $sc_seq_vert ?> css_banco__line" style="<?php echo $sStyleReadLab_banco_; ?>"><?php echo $this->form_encode_input($this->banco_); ?></span><span id="id_read_off_banco_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_banco_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_banco__obj" style="" id="id_sc_field_banco_<?php echo $sc_seq_vert ?>" type=text name="banco_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($banco_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['emailcobranca_']) && $this->nmgp_cmp_hidden['emailcobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emailcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailcobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_emailcobranca__line" id="hidden_field_data_emailcobranca_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_emailcobranca_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_emailcobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_emailcobranca_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emailcobranca_"]) &&  $this->nmgp_cmp_readonly["emailcobranca_"] == "on") { 

 ?>
<input type="hidden" name="emailcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailcobranca_) . "\">" . $emailcobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_emailcobranca_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-emailcobranca_<?php echo $sc_seq_vert ?> css_emailcobranca__line" style="<?php echo $sStyleReadLab_emailcobranca_; ?>"><?php echo $this->form_encode_input($this->emailcobranca_); ?></span><span id="id_read_off_emailcobranca_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_emailcobranca_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_emailcobranca__obj" style="" id="id_sc_field_emailcobranca_<?php echo $sc_seq_vert ?>" type=text name="emailcobranca_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailcobranca_) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emailcobranca_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emailcobranca_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['emailtecnico_']) && $this->nmgp_cmp_hidden['emailtecnico_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emailtecnico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailtecnico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_emailtecnico__line" id="hidden_field_data_emailtecnico_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_emailtecnico_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_emailtecnico__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_emailtecnico_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emailtecnico_"]) &&  $this->nmgp_cmp_readonly["emailtecnico_"] == "on") { 

 ?>
<input type="hidden" name="emailtecnico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailtecnico_) . "\">" . $emailtecnico_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_emailtecnico_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-emailtecnico_<?php echo $sc_seq_vert ?> css_emailtecnico__line" style="<?php echo $sStyleReadLab_emailtecnico_; ?>"><?php echo $this->form_encode_input($this->emailtecnico_); ?></span><span id="id_read_off_emailtecnico_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_emailtecnico_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_emailtecnico__obj" style="" id="id_sc_field_emailtecnico_<?php echo $sc_seq_vert ?>" type=text name="emailtecnico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailtecnico_) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emailtecnico_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emailtecnico_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['midia_']) && $this->nmgp_cmp_hidden['midia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="midia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($midia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_midia__line" id="hidden_field_data_midia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_midia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_midia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_midia_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["midia_"]) &&  $this->nmgp_cmp_readonly["midia_"] == "on") { 

 ?>
<input type="hidden" name="midia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($midia_) . "\">" . $midia_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_midia_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-midia_<?php echo $sc_seq_vert ?> css_midia__line" style="<?php echo $sStyleReadLab_midia_; ?>"><?php echo $this->form_encode_input($this->midia_); ?></span><span id="id_read_off_midia_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_midia_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_midia__obj" style="" id="id_sc_field_midia_<?php echo $sc_seq_vert ?>" type=text name="midia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($midia_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_midia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_midia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['seg_']) && $this->nmgp_cmp_hidden['seg_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="seg_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($seg_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_seg__line" id="hidden_field_data_seg_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_seg_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_seg__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_seg_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["seg_"]) &&  $this->nmgp_cmp_readonly["seg_"] == "on") { 

 ?>
<input type="hidden" name="seg_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($seg_) . "\">" . $seg_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_seg_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-seg_<?php echo $sc_seq_vert ?> css_seg__line" style="<?php echo $sStyleReadLab_seg_; ?>"><?php echo $this->form_encode_input($this->seg_); ?></span><span id="id_read_off_seg_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_seg_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_seg__obj" style="" id="id_sc_field_seg_<?php echo $sc_seq_vert ?>" type=text name="seg_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($seg_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_seg_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_seg_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['ter_']) && $this->nmgp_cmp_hidden['ter_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ter_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_ter__line" id="hidden_field_data_ter_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_ter_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_ter__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_ter_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ter_"]) &&  $this->nmgp_cmp_readonly["ter_"] == "on") { 

 ?>
<input type="hidden" name="ter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ter_) . "\">" . $ter_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ter_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-ter_<?php echo $sc_seq_vert ?> css_ter__line" style="<?php echo $sStyleReadLab_ter_; ?>"><?php echo $this->form_encode_input($this->ter_); ?></span><span id="id_read_off_ter_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_ter_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_ter__obj" style="" id="id_sc_field_ter_<?php echo $sc_seq_vert ?>" type=text name="ter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($ter_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ter_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ter_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['qua_']) && $this->nmgp_cmp_hidden['qua_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qua_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qua_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_qua__line" id="hidden_field_data_qua_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_qua_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_qua__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_qua_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qua_"]) &&  $this->nmgp_cmp_readonly["qua_"] == "on") { 

 ?>
<input type="hidden" name="qua_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qua_) . "\">" . $qua_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_qua_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-qua_<?php echo $sc_seq_vert ?> css_qua__line" style="<?php echo $sStyleReadLab_qua_; ?>"><?php echo $this->form_encode_input($this->qua_); ?></span><span id="id_read_off_qua_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_qua_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_qua__obj" style="" id="id_sc_field_qua_<?php echo $sc_seq_vert ?>" type=text name="qua_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qua_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qua_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qua_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['qui_']) && $this->nmgp_cmp_hidden['qui_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qui_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qui_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_qui__line" id="hidden_field_data_qui_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_qui_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_qui__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_qui_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qui_"]) &&  $this->nmgp_cmp_readonly["qui_"] == "on") { 

 ?>
<input type="hidden" name="qui_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qui_) . "\">" . $qui_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_qui_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-qui_<?php echo $sc_seq_vert ?> css_qui__line" style="<?php echo $sStyleReadLab_qui_; ?>"><?php echo $this->form_encode_input($this->qui_); ?></span><span id="id_read_off_qui_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_qui_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_qui__obj" style="" id="id_sc_field_qui_<?php echo $sc_seq_vert ?>" type=text name="qui_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($qui_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qui_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qui_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sex_']) && $this->nmgp_cmp_hidden['sex_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sex_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sex_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sex__line" id="hidden_field_data_sex_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sex_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sex__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sex_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sex_"]) &&  $this->nmgp_cmp_readonly["sex_"] == "on") { 

 ?>
<input type="hidden" name="sex_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sex_) . "\">" . $sex_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sex_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sex_<?php echo $sc_seq_vert ?> css_sex__line" style="<?php echo $sStyleReadLab_sex_; ?>"><?php echo $this->form_encode_input($this->sex_); ?></span><span id="id_read_off_sex_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_sex_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sex__obj" style="" id="id_sc_field_sex_<?php echo $sc_seq_vert ?>" type=text name="sex_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sex_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sex_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sex_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['certificado_']) && $this->nmgp_cmp_hidden['certificado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="certificado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($certificado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_certificado__line" id="hidden_field_data_certificado_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_certificado_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_certificado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_certificado_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["certificado_"]) &&  $this->nmgp_cmp_readonly["certificado_"] == "on") { 

 ?>
<input type="hidden" name="certificado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($certificado_) . "\">" . $certificado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_certificado_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-certificado_<?php echo $sc_seq_vert ?> css_certificado__line" style="<?php echo $sStyleReadLab_certificado_; ?>"><?php echo $this->form_encode_input($this->certificado_); ?></span><span id="id_read_off_certificado_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_certificado_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_certificado__obj" style="" id="id_sc_field_certificado_<?php echo $sc_seq_vert ?>" type=text name="certificado_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($certificado_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_certificado_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_certificado_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['emailnfe_']) && $this->nmgp_cmp_hidden['emailnfe_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emailnfe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailnfe_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_emailnfe__line" id="hidden_field_data_emailnfe_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_emailnfe_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_emailnfe__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_emailnfe_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emailnfe_"]) &&  $this->nmgp_cmp_readonly["emailnfe_"] == "on") { 

 ?>
<input type="hidden" name="emailnfe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailnfe_) . "\">" . $emailnfe_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_emailnfe_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-emailnfe_<?php echo $sc_seq_vert ?> css_emailnfe__line" style="<?php echo $sStyleReadLab_emailnfe_; ?>"><?php echo $this->form_encode_input($this->emailnfe_); ?></span><span id="id_read_off_emailnfe_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_emailnfe_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_emailnfe__obj" style="" id="id_sc_field_emailnfe_<?php echo $sc_seq_vert ?>" type=text name="emailnfe_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($emailnfe_) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emailnfe_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emailnfe_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['fundacao_']) && $this->nmgp_cmp_hidden['fundacao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fundacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fundacao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_fundacao__line" id="hidden_field_data_fundacao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_fundacao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_fundacao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_fundacao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fundacao_"]) &&  $this->nmgp_cmp_readonly["fundacao_"] == "on") { 

 ?>
<input type="hidden" name="fundacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fundacao_) . "\">" . $fundacao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fundacao_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-fundacao_<?php echo $sc_seq_vert ?> css_fundacao__line" style="<?php echo $sStyleReadLab_fundacao_; ?>"><?php echo $this->form_encode_input($fundacao_); ?></span><span id="id_read_off_fundacao_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_fundacao_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_fundacao__obj" style="" id="id_sc_field_fundacao_<?php echo $sc_seq_vert ?>" type=text name="fundacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($fundacao_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fundacao_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fundacao_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fundacao_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['fundacao_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fundacao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fundacao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->fundacao_ = $old_dt_fundacao_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['site_']) && $this->nmgp_cmp_hidden['site_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="site_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($site_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_site__line" id="hidden_field_data_site_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_site_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_site__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_site_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["site_"]) &&  $this->nmgp_cmp_readonly["site_"] == "on") { 

 ?>
<input type="hidden" name="site_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($site_) . "\">" . $site_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_site_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-site_<?php echo $sc_seq_vert ?> css_site__line" style="<?php echo $sStyleReadLab_site_; ?>"><?php echo $this->form_encode_input($this->site_); ?></span><span id="id_read_off_site_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_site_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_site__obj" style="" id="id_sc_field_site_<?php echo $sc_seq_vert ?>" type=text name="site_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($site_) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_site_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_site_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['financeiro_']) && $this->nmgp_cmp_hidden['financeiro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="financeiro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($financeiro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_financeiro__line" id="hidden_field_data_financeiro_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_financeiro_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_financeiro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_financeiro_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["financeiro_"]) &&  $this->nmgp_cmp_readonly["financeiro_"] == "on") { 

 ?>
<input type="hidden" name="financeiro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($financeiro_) . "\">" . $financeiro_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_financeiro_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-financeiro_<?php echo $sc_seq_vert ?> css_financeiro__line" style="<?php echo $sStyleReadLab_financeiro_; ?>"><?php echo $this->form_encode_input($this->financeiro_); ?></span><span id="id_read_off_financeiro_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_financeiro_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_financeiro__obj" style="" id="id_sc_field_financeiro_<?php echo $sc_seq_vert ?>" type=text name="financeiro_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($financeiro_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_financeiro_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_financeiro_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_numero__line" id="hidden_field_data_numero_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_numero_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_numero__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_numero_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_"]) &&  $this->nmgp_cmp_readonly["numero_"] == "on") { 

 ?>
<input type="hidden" name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) . "\">" . $numero_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-numero_<?php echo $sc_seq_vert ?> css_numero__line" style="<?php echo $sStyleReadLab_numero_; ?>"><?php echo $this->form_encode_input($this->numero_); ?></span><span id="id_read_off_numero_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_numero__obj" style="" id="id_sc_field_numero_<?php echo $sc_seq_vert ?>" type=text name="numero_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_) ?>"
 size=6 maxlength=6 alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['complemento_']) && $this->nmgp_cmp_hidden['complemento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="complemento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($complemento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_complemento__line" id="hidden_field_data_complemento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_complemento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_complemento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_complemento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["complemento_"]) &&  $this->nmgp_cmp_readonly["complemento_"] == "on") { 

 ?>
<input type="hidden" name="complemento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($complemento_) . "\">" . $complemento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_complemento_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-complemento_<?php echo $sc_seq_vert ?> css_complemento__line" style="<?php echo $sStyleReadLab_complemento_; ?>"><?php echo $this->form_encode_input($this->complemento_); ?></span><span id="id_read_off_complemento_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_complemento_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_complemento__obj" style="" id="id_sc_field_complemento_<?php echo $sc_seq_vert ?>" type=text name="complemento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($complemento_) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_complemento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_complemento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['razaosocialentrega_']) && $this->nmgp_cmp_hidden['razaosocialentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razaosocialentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razaosocialentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_razaosocialentrega__line" id="hidden_field_data_razaosocialentrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_razaosocialentrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_razaosocialentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_razaosocialentrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razaosocialentrega_"]) &&  $this->nmgp_cmp_readonly["razaosocialentrega_"] == "on") { 

 ?>
<input type="hidden" name="razaosocialentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razaosocialentrega_) . "\">" . $razaosocialentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_razaosocialentrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-razaosocialentrega_<?php echo $sc_seq_vert ?> css_razaosocialentrega__line" style="<?php echo $sStyleReadLab_razaosocialentrega_; ?>"><?php echo $this->form_encode_input($this->razaosocialentrega_); ?></span><span id="id_read_off_razaosocialentrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_razaosocialentrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_razaosocialentrega__obj" style="" id="id_sc_field_razaosocialentrega_<?php echo $sc_seq_vert ?>" type=text name="razaosocialentrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($razaosocialentrega_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razaosocialentrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razaosocialentrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['entrega_']) && $this->nmgp_cmp_hidden['entrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="entrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($entrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_entrega__line" id="hidden_field_data_entrega_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_entrega_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_entrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_entrega_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["entrega_"]) &&  $this->nmgp_cmp_readonly["entrega_"] == "on") { 

 ?>
<input type="hidden" name="entrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($entrega_) . "\">" . $entrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_entrega_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-entrega_<?php echo $sc_seq_vert ?> css_entrega__line" style="<?php echo $sStyleReadLab_entrega_; ?>"><?php echo $this->form_encode_input($this->entrega_); ?></span><span id="id_read_off_entrega_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_entrega_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_entrega__obj" style="" id="id_sc_field_entrega_<?php echo $sc_seq_vert ?>" type=text name="entrega_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($entrega_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entrega_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entrega_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['contatotecnico_']) && $this->nmgp_cmp_hidden['contatotecnico_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatotecnico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatotecnico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_contatotecnico__line" id="hidden_field_data_contatotecnico_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_contatotecnico_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_contatotecnico__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_contatotecnico_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatotecnico_"]) &&  $this->nmgp_cmp_readonly["contatotecnico_"] == "on") { 

 ?>
<input type="hidden" name="contatotecnico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatotecnico_) . "\">" . $contatotecnico_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatotecnico_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-contatotecnico_<?php echo $sc_seq_vert ?> css_contatotecnico__line" style="<?php echo $sStyleReadLab_contatotecnico_; ?>"><?php echo $this->form_encode_input($this->contatotecnico_); ?></span><span id="id_read_off_contatotecnico_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contatotecnico_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_contatotecnico__obj" style="" id="id_sc_field_contatotecnico_<?php echo $sc_seq_vert ?>" type=text name="contatotecnico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($contatotecnico_) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatotecnico_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatotecnico_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_cd_cliente_))
       {
           $this->nmgp_cmp_readonly['cd_cliente_'] = $sCheckRead_cd_cliente_;
       }
       if ('display: none;' == $sStyleHidden_cd_cliente_)
       {
           $this->nmgp_cmp_hidden['cd_cliente_'] = 'off';
       }
       if (isset($sCheckRead_razaosocial_))
       {
           $this->nmgp_cmp_readonly['razaosocial_'] = $sCheckRead_razaosocial_;
       }
       if ('display: none;' == $sStyleHidden_razaosocial_)
       {
           $this->nmgp_cmp_hidden['razaosocial_'] = 'off';
       }
       if (isset($sCheckRead_nomefantasia_))
       {
           $this->nmgp_cmp_readonly['nomefantasia_'] = $sCheckRead_nomefantasia_;
       }
       if ('display: none;' == $sStyleHidden_nomefantasia_)
       {
           $this->nmgp_cmp_hidden['nomefantasia_'] = 'off';
       }
       if (isset($sCheckRead_cgc_))
       {
           $this->nmgp_cmp_readonly['cgc_'] = $sCheckRead_cgc_;
       }
       if ('display: none;' == $sStyleHidden_cgc_)
       {
           $this->nmgp_cmp_hidden['cgc_'] = 'off';
       }
       if (isset($sCheckRead_inscricao_))
       {
           $this->nmgp_cmp_readonly['inscricao_'] = $sCheckRead_inscricao_;
       }
       if ('display: none;' == $sStyleHidden_inscricao_)
       {
           $this->nmgp_cmp_hidden['inscricao_'] = 'off';
       }
       if (isset($sCheckRead_endereco_))
       {
           $this->nmgp_cmp_readonly['endereco_'] = $sCheckRead_endereco_;
       }
       if ('display: none;' == $sStyleHidden_endereco_)
       {
           $this->nmgp_cmp_hidden['endereco_'] = 'off';
       }
       if (isset($sCheckRead_cidade_))
       {
           $this->nmgp_cmp_readonly['cidade_'] = $sCheckRead_cidade_;
       }
       if ('display: none;' == $sStyleHidden_cidade_)
       {
           $this->nmgp_cmp_hidden['cidade_'] = 'off';
       }
       if (isset($sCheckRead_estado_))
       {
           $this->nmgp_cmp_readonly['estado_'] = $sCheckRead_estado_;
       }
       if ('display: none;' == $sStyleHidden_estado_)
       {
           $this->nmgp_cmp_hidden['estado_'] = 'off';
       }
       if (isset($sCheckRead_bairro_))
       {
           $this->nmgp_cmp_readonly['bairro_'] = $sCheckRead_bairro_;
       }
       if ('display: none;' == $sStyleHidden_bairro_)
       {
           $this->nmgp_cmp_hidden['bairro_'] = 'off';
       }
       if (isset($sCheckRead_cep_))
       {
           $this->nmgp_cmp_readonly['cep_'] = $sCheckRead_cep_;
       }
       if ('display: none;' == $sStyleHidden_cep_)
       {
           $this->nmgp_cmp_hidden['cep_'] = 'off';
       }
       if (isset($sCheckRead_email_))
       {
           $this->nmgp_cmp_readonly['email_'] = $sCheckRead_email_;
       }
       if ('display: none;' == $sStyleHidden_email_)
       {
           $this->nmgp_cmp_hidden['email_'] = 'off';
       }
       if (isset($sCheckRead_fone_))
       {
           $this->nmgp_cmp_readonly['fone_'] = $sCheckRead_fone_;
       }
       if ('display: none;' == $sStyleHidden_fone_)
       {
           $this->nmgp_cmp_hidden['fone_'] = 'off';
       }
       if (isset($sCheckRead_fone1_))
       {
           $this->nmgp_cmp_readonly['fone1_'] = $sCheckRead_fone1_;
       }
       if ('display: none;' == $sStyleHidden_fone1_)
       {
           $this->nmgp_cmp_hidden['fone1_'] = 'off';
       }
       if (isset($sCheckRead_fax_))
       {
           $this->nmgp_cmp_readonly['fax_'] = $sCheckRead_fax_;
       }
       if ('display: none;' == $sStyleHidden_fax_)
       {
           $this->nmgp_cmp_hidden['fax_'] = 'off';
       }
       if (isset($sCheckRead_contato_))
       {
           $this->nmgp_cmp_readonly['contato_'] = $sCheckRead_contato_;
       }
       if ('display: none;' == $sStyleHidden_contato_)
       {
           $this->nmgp_cmp_hidden['contato_'] = 'off';
       }
       if (isset($sCheckRead_enderecocobranca_))
       {
           $this->nmgp_cmp_readonly['enderecocobranca_'] = $sCheckRead_enderecocobranca_;
       }
       if ('display: none;' == $sStyleHidden_enderecocobranca_)
       {
           $this->nmgp_cmp_hidden['enderecocobranca_'] = 'off';
       }
       if (isset($sCheckRead_cidadecobranca_))
       {
           $this->nmgp_cmp_readonly['cidadecobranca_'] = $sCheckRead_cidadecobranca_;
       }
       if ('display: none;' == $sStyleHidden_cidadecobranca_)
       {
           $this->nmgp_cmp_hidden['cidadecobranca_'] = 'off';
       }
       if (isset($sCheckRead_bairrocobranca_))
       {
           $this->nmgp_cmp_readonly['bairrocobranca_'] = $sCheckRead_bairrocobranca_;
       }
       if ('display: none;' == $sStyleHidden_bairrocobranca_)
       {
           $this->nmgp_cmp_hidden['bairrocobranca_'] = 'off';
       }
       if (isset($sCheckRead_estadocobranca_))
       {
           $this->nmgp_cmp_readonly['estadocobranca_'] = $sCheckRead_estadocobranca_;
       }
       if ('display: none;' == $sStyleHidden_estadocobranca_)
       {
           $this->nmgp_cmp_hidden['estadocobranca_'] = 'off';
       }
       if (isset($sCheckRead_cepcobranca_))
       {
           $this->nmgp_cmp_readonly['cepcobranca_'] = $sCheckRead_cepcobranca_;
       }
       if ('display: none;' == $sStyleHidden_cepcobranca_)
       {
           $this->nmgp_cmp_hidden['cepcobranca_'] = 'off';
       }
       if (isset($sCheckRead_fonecobranca_))
       {
           $this->nmgp_cmp_readonly['fonecobranca_'] = $sCheckRead_fonecobranca_;
       }
       if ('display: none;' == $sStyleHidden_fonecobranca_)
       {
           $this->nmgp_cmp_hidden['fonecobranca_'] = 'off';
       }
       if (isset($sCheckRead_faxcobranca_))
       {
           $this->nmgp_cmp_readonly['faxcobranca_'] = $sCheckRead_faxcobranca_;
       }
       if ('display: none;' == $sStyleHidden_faxcobranca_)
       {
           $this->nmgp_cmp_hidden['faxcobranca_'] = 'off';
       }
       if (isset($sCheckRead_contatocobranca_))
       {
           $this->nmgp_cmp_readonly['contatocobranca_'] = $sCheckRead_contatocobranca_;
       }
       if ('display: none;' == $sStyleHidden_contatocobranca_)
       {
           $this->nmgp_cmp_hidden['contatocobranca_'] = 'off';
       }
       if (isset($sCheckRead_cgcentrega_))
       {
           $this->nmgp_cmp_readonly['cgcentrega_'] = $sCheckRead_cgcentrega_;
       }
       if ('display: none;' == $sStyleHidden_cgcentrega_)
       {
           $this->nmgp_cmp_hidden['cgcentrega_'] = 'off';
       }
       if (isset($sCheckRead_inscricaoentrega_))
       {
           $this->nmgp_cmp_readonly['inscricaoentrega_'] = $sCheckRead_inscricaoentrega_;
       }
       if ('display: none;' == $sStyleHidden_inscricaoentrega_)
       {
           $this->nmgp_cmp_hidden['inscricaoentrega_'] = 'off';
       }
       if (isset($sCheckRead_enderecoentrega_))
       {
           $this->nmgp_cmp_readonly['enderecoentrega_'] = $sCheckRead_enderecoentrega_;
       }
       if ('display: none;' == $sStyleHidden_enderecoentrega_)
       {
           $this->nmgp_cmp_hidden['enderecoentrega_'] = 'off';
       }
       if (isset($sCheckRead_cidadeentrega_))
       {
           $this->nmgp_cmp_readonly['cidadeentrega_'] = $sCheckRead_cidadeentrega_;
       }
       if ('display: none;' == $sStyleHidden_cidadeentrega_)
       {
           $this->nmgp_cmp_hidden['cidadeentrega_'] = 'off';
       }
       if (isset($sCheckRead_bairroentrega_))
       {
           $this->nmgp_cmp_readonly['bairroentrega_'] = $sCheckRead_bairroentrega_;
       }
       if ('display: none;' == $sStyleHidden_bairroentrega_)
       {
           $this->nmgp_cmp_hidden['bairroentrega_'] = 'off';
       }
       if (isset($sCheckRead_estadoentrega_))
       {
           $this->nmgp_cmp_readonly['estadoentrega_'] = $sCheckRead_estadoentrega_;
       }
       if ('display: none;' == $sStyleHidden_estadoentrega_)
       {
           $this->nmgp_cmp_hidden['estadoentrega_'] = 'off';
       }
       if (isset($sCheckRead_cepentrega_))
       {
           $this->nmgp_cmp_readonly['cepentrega_'] = $sCheckRead_cepentrega_;
       }
       if ('display: none;' == $sStyleHidden_cepentrega_)
       {
           $this->nmgp_cmp_hidden['cepentrega_'] = 'off';
       }
       if (isset($sCheckRead_foneentrega_))
       {
           $this->nmgp_cmp_readonly['foneentrega_'] = $sCheckRead_foneentrega_;
       }
       if ('display: none;' == $sStyleHidden_foneentrega_)
       {
           $this->nmgp_cmp_hidden['foneentrega_'] = 'off';
       }
       if (isset($sCheckRead_contatoentrega_))
       {
           $this->nmgp_cmp_readonly['contatoentrega_'] = $sCheckRead_contatoentrega_;
       }
       if ('display: none;' == $sStyleHidden_contatoentrega_)
       {
           $this->nmgp_cmp_hidden['contatoentrega_'] = 'off';
       }
       if (isset($sCheckRead_contatoexpedicao_))
       {
           $this->nmgp_cmp_readonly['contatoexpedicao_'] = $sCheckRead_contatoexpedicao_;
       }
       if ('display: none;' == $sStyleHidden_contatoexpedicao_)
       {
           $this->nmgp_cmp_hidden['contatoexpedicao_'] = 'off';
       }
       if (isset($sCheckRead_foneexpedicao_))
       {
           $this->nmgp_cmp_readonly['foneexpedicao_'] = $sCheckRead_foneexpedicao_;
       }
       if ('display: none;' == $sStyleHidden_foneexpedicao_)
       {
           $this->nmgp_cmp_hidden['foneexpedicao_'] = 'off';
       }
       if (isset($sCheckRead_datacadastro_))
       {
           $this->nmgp_cmp_readonly['datacadastro_'] = $sCheckRead_datacadastro_;
       }
       if ('display: none;' == $sStyleHidden_datacadastro_)
       {
           $this->nmgp_cmp_hidden['datacadastro_'] = 'off';
       }
       if (isset($sCheckRead_obs_))
       {
           $this->nmgp_cmp_readonly['obs_'] = $sCheckRead_obs_;
       }
       if ('display: none;' == $sStyleHidden_obs_)
       {
           $this->nmgp_cmp_hidden['obs_'] = 'off';
       }
       if (isset($sCheckRead_tipo_))
       {
           $this->nmgp_cmp_readonly['tipo_'] = $sCheckRead_tipo_;
       }
       if ('display: none;' == $sStyleHidden_tipo_)
       {
           $this->nmgp_cmp_hidden['tipo_'] = 'off';
       }
       if (isset($sCheckRead_consumidor_))
       {
           $this->nmgp_cmp_readonly['consumidor_'] = $sCheckRead_consumidor_;
       }
       if ('display: none;' == $sStyleHidden_consumidor_)
       {
           $this->nmgp_cmp_hidden['consumidor_'] = 'off';
       }
       if (isset($sCheckRead_licensa_))
       {
           $this->nmgp_cmp_readonly['licensa_'] = $sCheckRead_licensa_;
       }
       if ('display: none;' == $sStyleHidden_licensa_)
       {
           $this->nmgp_cmp_hidden['licensa_'] = 'off';
       }
       if (isset($sCheckRead_venctolicensa_))
       {
           $this->nmgp_cmp_readonly['venctolicensa_'] = $sCheckRead_venctolicensa_;
       }
       if ('display: none;' == $sStyleHidden_venctolicensa_)
       {
           $this->nmgp_cmp_hidden['venctolicensa_'] = 'off';
       }
       if (isset($sCheckRead_licensa1_))
       {
           $this->nmgp_cmp_readonly['licensa1_'] = $sCheckRead_licensa1_;
       }
       if ('display: none;' == $sStyleHidden_licensa1_)
       {
           $this->nmgp_cmp_hidden['licensa1_'] = 'off';
       }
       if (isset($sCheckRead_venctolicensa1_))
       {
           $this->nmgp_cmp_readonly['venctolicensa1_'] = $sCheckRead_venctolicensa1_;
       }
       if ('display: none;' == $sStyleHidden_venctolicensa1_)
       {
           $this->nmgp_cmp_hidden['venctolicensa1_'] = 'off';
       }
       if (isset($sCheckRead_qtdeliberada_))
       {
           $this->nmgp_cmp_readonly['qtdeliberada_'] = $sCheckRead_qtdeliberada_;
       }
       if ('display: none;' == $sStyleHidden_qtdeliberada_)
       {
           $this->nmgp_cmp_hidden['qtdeliberada_'] = 'off';
       }
       if (isset($sCheckRead_licensa2_))
       {
           $this->nmgp_cmp_readonly['licensa2_'] = $sCheckRead_licensa2_;
       }
       if ('display: none;' == $sStyleHidden_licensa2_)
       {
           $this->nmgp_cmp_hidden['licensa2_'] = 'off';
       }
       if (isset($sCheckRead_venctolicensa2_))
       {
           $this->nmgp_cmp_readonly['venctolicensa2_'] = $sCheckRead_venctolicensa2_;
       }
       if ('display: none;' == $sStyleHidden_venctolicensa2_)
       {
           $this->nmgp_cmp_hidden['venctolicensa2_'] = 'off';
       }
       if (isset($sCheckRead_icms_))
       {
           $this->nmgp_cmp_readonly['icms_'] = $sCheckRead_icms_;
       }
       if ('display: none;' == $sStyleHidden_icms_)
       {
           $this->nmgp_cmp_hidden['icms_'] = 'off';
       }
       if (isset($sCheckRead_suframa_))
       {
           $this->nmgp_cmp_readonly['suframa_'] = $sCheckRead_suframa_;
       }
       if ('display: none;' == $sStyleHidden_suframa_)
       {
           $this->nmgp_cmp_hidden['suframa_'] = 'off';
       }
       if (isset($sCheckRead_limitecredito_))
       {
           $this->nmgp_cmp_readonly['limitecredito_'] = $sCheckRead_limitecredito_;
       }
       if ('display: none;' == $sStyleHidden_limitecredito_)
       {
           $this->nmgp_cmp_hidden['limitecredito_'] = 'off';
       }
       if (isset($sCheckRead_vendedor_))
       {
           $this->nmgp_cmp_readonly['vendedor_'] = $sCheckRead_vendedor_;
       }
       if ('display: none;' == $sStyleHidden_vendedor_)
       {
           $this->nmgp_cmp_hidden['vendedor_'] = 'off';
       }
       if (isset($sCheckRead_restricao_))
       {
           $this->nmgp_cmp_readonly['restricao_'] = $sCheckRead_restricao_;
       }
       if ('display: none;' == $sStyleHidden_restricao_)
       {
           $this->nmgp_cmp_hidden['restricao_'] = 'off';
       }
       if (isset($sCheckRead_comissao_))
       {
           $this->nmgp_cmp_readonly['comissao_'] = $sCheckRead_comissao_;
       }
       if ('display: none;' == $sStyleHidden_comissao_)
       {
           $this->nmgp_cmp_hidden['comissao_'] = 'off';
       }
       if (isset($sCheckRead_transportadora_))
       {
           $this->nmgp_cmp_readonly['transportadora_'] = $sCheckRead_transportadora_;
       }
       if ('display: none;' == $sStyleHidden_transportadora_)
       {
           $this->nmgp_cmp_hidden['transportadora_'] = 'off';
       }
       if (isset($sCheckRead_coleta_))
       {
           $this->nmgp_cmp_readonly['coleta_'] = $sCheckRead_coleta_;
       }
       if ('display: none;' == $sStyleHidden_coleta_)
       {
           $this->nmgp_cmp_hidden['coleta_'] = 'off';
       }
       if (isset($sCheckRead_segmento_))
       {
           $this->nmgp_cmp_readonly['segmento_'] = $sCheckRead_segmento_;
       }
       if ('display: none;' == $sStyleHidden_segmento_)
       {
           $this->nmgp_cmp_hidden['segmento_'] = 'off';
       }
       if (isset($sCheckRead_dataalteracao_))
       {
           $this->nmgp_cmp_readonly['dataalteracao_'] = $sCheckRead_dataalteracao_;
       }
       if ('display: none;' == $sStyleHidden_dataalteracao_)
       {
           $this->nmgp_cmp_hidden['dataalteracao_'] = 'off';
       }
       if (isset($sCheckRead_usuario_))
       {
           $this->nmgp_cmp_readonly['usuario_'] = $sCheckRead_usuario_;
       }
       if ('display: none;' == $sStyleHidden_usuario_)
       {
           $this->nmgp_cmp_hidden['usuario_'] = 'off';
       }
       if (isset($sCheckRead_requisitos_))
       {
           $this->nmgp_cmp_readonly['requisitos_'] = $sCheckRead_requisitos_;
       }
       if ('display: none;' == $sStyleHidden_requisitos_)
       {
           $this->nmgp_cmp_hidden['requisitos_'] = 'off';
       }
       if (isset($sCheckRead_banco_))
       {
           $this->nmgp_cmp_readonly['banco_'] = $sCheckRead_banco_;
       }
       if ('display: none;' == $sStyleHidden_banco_)
       {
           $this->nmgp_cmp_hidden['banco_'] = 'off';
       }
       if (isset($sCheckRead_emailcobranca_))
       {
           $this->nmgp_cmp_readonly['emailcobranca_'] = $sCheckRead_emailcobranca_;
       }
       if ('display: none;' == $sStyleHidden_emailcobranca_)
       {
           $this->nmgp_cmp_hidden['emailcobranca_'] = 'off';
       }
       if (isset($sCheckRead_emailtecnico_))
       {
           $this->nmgp_cmp_readonly['emailtecnico_'] = $sCheckRead_emailtecnico_;
       }
       if ('display: none;' == $sStyleHidden_emailtecnico_)
       {
           $this->nmgp_cmp_hidden['emailtecnico_'] = 'off';
       }
       if (isset($sCheckRead_midia_))
       {
           $this->nmgp_cmp_readonly['midia_'] = $sCheckRead_midia_;
       }
       if ('display: none;' == $sStyleHidden_midia_)
       {
           $this->nmgp_cmp_hidden['midia_'] = 'off';
       }
       if (isset($sCheckRead_seg_))
       {
           $this->nmgp_cmp_readonly['seg_'] = $sCheckRead_seg_;
       }
       if ('display: none;' == $sStyleHidden_seg_)
       {
           $this->nmgp_cmp_hidden['seg_'] = 'off';
       }
       if (isset($sCheckRead_ter_))
       {
           $this->nmgp_cmp_readonly['ter_'] = $sCheckRead_ter_;
       }
       if ('display: none;' == $sStyleHidden_ter_)
       {
           $this->nmgp_cmp_hidden['ter_'] = 'off';
       }
       if (isset($sCheckRead_qua_))
       {
           $this->nmgp_cmp_readonly['qua_'] = $sCheckRead_qua_;
       }
       if ('display: none;' == $sStyleHidden_qua_)
       {
           $this->nmgp_cmp_hidden['qua_'] = 'off';
       }
       if (isset($sCheckRead_qui_))
       {
           $this->nmgp_cmp_readonly['qui_'] = $sCheckRead_qui_;
       }
       if ('display: none;' == $sStyleHidden_qui_)
       {
           $this->nmgp_cmp_hidden['qui_'] = 'off';
       }
       if (isset($sCheckRead_sex_))
       {
           $this->nmgp_cmp_readonly['sex_'] = $sCheckRead_sex_;
       }
       if ('display: none;' == $sStyleHidden_sex_)
       {
           $this->nmgp_cmp_hidden['sex_'] = 'off';
       }
       if (isset($sCheckRead_certificado_))
       {
           $this->nmgp_cmp_readonly['certificado_'] = $sCheckRead_certificado_;
       }
       if ('display: none;' == $sStyleHidden_certificado_)
       {
           $this->nmgp_cmp_hidden['certificado_'] = 'off';
       }
       if (isset($sCheckRead_emailnfe_))
       {
           $this->nmgp_cmp_readonly['emailnfe_'] = $sCheckRead_emailnfe_;
       }
       if ('display: none;' == $sStyleHidden_emailnfe_)
       {
           $this->nmgp_cmp_hidden['emailnfe_'] = 'off';
       }
       if (isset($sCheckRead_fundacao_))
       {
           $this->nmgp_cmp_readonly['fundacao_'] = $sCheckRead_fundacao_;
       }
       if ('display: none;' == $sStyleHidden_fundacao_)
       {
           $this->nmgp_cmp_hidden['fundacao_'] = 'off';
       }
       if (isset($sCheckRead_site_))
       {
           $this->nmgp_cmp_readonly['site_'] = $sCheckRead_site_;
       }
       if ('display: none;' == $sStyleHidden_site_)
       {
           $this->nmgp_cmp_hidden['site_'] = 'off';
       }
       if (isset($sCheckRead_financeiro_))
       {
           $this->nmgp_cmp_readonly['financeiro_'] = $sCheckRead_financeiro_;
       }
       if ('display: none;' == $sStyleHidden_financeiro_)
       {
           $this->nmgp_cmp_hidden['financeiro_'] = 'off';
       }
       if (isset($sCheckRead_numero_))
       {
           $this->nmgp_cmp_readonly['numero_'] = $sCheckRead_numero_;
       }
       if ('display: none;' == $sStyleHidden_numero_)
       {
           $this->nmgp_cmp_hidden['numero_'] = 'off';
       }
       if (isset($sCheckRead_complemento_))
       {
           $this->nmgp_cmp_readonly['complemento_'] = $sCheckRead_complemento_;
       }
       if ('display: none;' == $sStyleHidden_complemento_)
       {
           $this->nmgp_cmp_hidden['complemento_'] = 'off';
       }
       if (isset($sCheckRead_razaosocialentrega_))
       {
           $this->nmgp_cmp_readonly['razaosocialentrega_'] = $sCheckRead_razaosocialentrega_;
       }
       if ('display: none;' == $sStyleHidden_razaosocialentrega_)
       {
           $this->nmgp_cmp_hidden['razaosocialentrega_'] = 'off';
       }
       if (isset($sCheckRead_entrega_))
       {
           $this->nmgp_cmp_readonly['entrega_'] = $sCheckRead_entrega_;
       }
       if ('display: none;' == $sStyleHidden_entrega_)
       {
           $this->nmgp_cmp_hidden['entrega_'] = 'off';
       }
       if (isset($sCheckRead_contatotecnico_))
       {
           $this->nmgp_cmp_readonly['contatotecnico_'] = $sCheckRead_contatotecnico_;
       }
       if ('display: none;' == $sStyleHidden_contatotecnico_)
       {
           $this->nmgp_cmp_hidden['contatotecnico_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_dbo_cliente = $guarda_form_vert_form_dbo_cliente;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
 <div id="sc-id-fixedheaders-placeholder" style="display: none; position: fixed; top: 0; z-index: 500"></div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-15", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-16", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-17", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-18", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['masterValue']))
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
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_dbo_cliente");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_dbo_cliente");
 parent.scAjaxDetailHeight("form_dbo_cliente", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_dbo_cliente", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_dbo_cliente", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
			do_ajax_form_dbo_cliente_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_off_b.sc-unique-btn-12").length && $("#sc_b_ini_off_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-13").length && $("#sc_b_ret_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_off_b.sc-unique-btn-14").length && $("#sc_b_ret_off_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-15").length && $("#sc_b_avc_b.sc-unique-btn-15").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_off_b.sc-unique-btn-16").length && $("#sc_b_avc_off_b.sc-unique-btn-16").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-17").length && $("#sc_b_fim_b.sc-unique-btn-17").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_off_b.sc-unique-btn-18").length && $("#sc_b_fim_off_b.sc-unique-btn-18").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
