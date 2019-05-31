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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['embutida_pdf']))
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
include_once("form_dbo_cliente_inline_sajax_js.php");
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
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
}
function navpage_atualiza(str_navpage)
{
}
<?php

include_once('form_dbo_cliente_inline_jquery.php');

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
  setTimeout(function() {
  scJQElementsAdd('');

  scJQGeneralAdd();

  }, 50);
  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
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
   });
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_dbo_cliente']['error_buffer']) && '' != $_SESSION['scriptcase']['form_dbo_cliente']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_dbo_cliente']['error_buffer'];
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
 include_once("form_dbo_cliente_inline_js0.php");
?>
<script type="text/javascript"> 
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
               action="form_dbo_cliente_inline.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['insert_validation']; ?>">
<?php
}
?>
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
$_SESSION['scriptcase']['error_span_title']['form_dbo_cliente_inline'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_dbo_cliente_inline'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-19", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-20", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-21", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-22", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-24", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-25", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R")
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['cd_cliente_']))
           {
               $this->nmgp_cmp_readonly['cd_cliente_'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cd_cliente_']))
    {
        $this->nm_new_label['cd_cliente_'] = "Cd Cliente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cd_cliente_ = $this->cd_cliente_;
   $sStyleHidden_cd_cliente_ = '';
   if (isset($this->nmgp_cmp_hidden['cd_cliente_']) && $this->nmgp_cmp_hidden['cd_cliente_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cd_cliente_']);
       $sStyleHidden_cd_cliente_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cd_cliente_ = 'display: none;';
   $sStyleReadInp_cd_cliente_ = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["cd_cliente_"]) &&  $this->nmgp_cmp_readonly["cd_cliente_"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cd_cliente_']);
       $sStyleReadLab_cd_cliente_ = '';
       $sStyleReadInp_cd_cliente_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cd_cliente_']) && $this->nmgp_cmp_hidden['cd_cliente_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cd_cliente_" value="<?php echo $this->form_encode_input($cd_cliente_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cd_cliente__label" id="hidden_field_label_cd_cliente_" style="<?php echo $sStyleHidden_cd_cliente_; ?>"><span id="id_label_cd_cliente_"><?php echo $this->nm_new_label['cd_cliente_']; ?></span></TD>
    <TD class="scFormDataOdd css_cd_cliente__line" id="hidden_field_data_cd_cliente_" style="<?php echo $sStyleHidden_cd_cliente_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cd_cliente__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_cd_cliente_" class="css_cd_cliente__line" style="<?php echo $sStyleReadLab_cd_cliente_; ?>"><?php echo $this->form_encode_input($this->cd_cliente_); ?></span><span id="id_read_off_cd_cliente_" style="<?php echo $sStyleReadInp_cd_cliente_; ?>"><input type="hidden" name="cd_cliente_" value="<?php echo $this->form_encode_input($cd_cliente_) . "\">"?><span id="id_ajax_label_cd_cliente_"><?php echo nl2br($cd_cliente_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cd_cliente__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cd_cliente__text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['razaosocial_']))
    {
        $this->nm_new_label['razaosocial_'] = "Razaosocial";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razaosocial_ = $this->razaosocial_;
   $sStyleHidden_razaosocial_ = '';
   if (isset($this->nmgp_cmp_hidden['razaosocial_']) && $this->nmgp_cmp_hidden['razaosocial_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razaosocial_']);
       $sStyleHidden_razaosocial_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razaosocial_ = 'display: none;';
   $sStyleReadInp_razaosocial_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['razaosocial_']) && $this->nmgp_cmp_readonly['razaosocial_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razaosocial_']);
       $sStyleReadLab_razaosocial_ = '';
       $sStyleReadInp_razaosocial_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razaosocial_']) && $this->nmgp_cmp_hidden['razaosocial_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razaosocial_" value="<?php echo $this->form_encode_input($razaosocial_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_razaosocial__label" id="hidden_field_label_razaosocial_" style="<?php echo $sStyleHidden_razaosocial_; ?>"><span id="id_label_razaosocial_"><?php echo $this->nm_new_label['razaosocial_']; ?></span></TD>
    <TD class="scFormDataOdd css_razaosocial__line" id="hidden_field_data_razaosocial_" style="<?php echo $sStyleHidden_razaosocial_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_razaosocial__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razaosocial_"]) &&  $this->nmgp_cmp_readonly["razaosocial_"] == "on") { 

 ?>
<input type="hidden" name="razaosocial_" value="<?php echo $this->form_encode_input($razaosocial_) . "\">" . $razaosocial_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_razaosocial_" class="sc-ui-readonly-razaosocial_ css_razaosocial__line" style="<?php echo $sStyleReadLab_razaosocial_; ?>"><?php echo $this->form_encode_input($this->razaosocial_); ?></span><span id="id_read_off_razaosocial_" style="white-space: nowrap;<?php echo $sStyleReadInp_razaosocial_; ?>">
 <input class="sc-js-input scFormObjectOdd css_razaosocial__obj" style="" id="id_sc_field_razaosocial_" type=text name="razaosocial_" value="<?php echo $this->form_encode_input($razaosocial_) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razaosocial__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razaosocial__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nomefantasia_']))
    {
        $this->nm_new_label['nomefantasia_'] = "Nomefantasia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nomefantasia_ = $this->nomefantasia_;
   $sStyleHidden_nomefantasia_ = '';
   if (isset($this->nmgp_cmp_hidden['nomefantasia_']) && $this->nmgp_cmp_hidden['nomefantasia_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nomefantasia_']);
       $sStyleHidden_nomefantasia_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nomefantasia_ = 'display: none;';
   $sStyleReadInp_nomefantasia_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nomefantasia_']) && $this->nmgp_cmp_readonly['nomefantasia_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nomefantasia_']);
       $sStyleReadLab_nomefantasia_ = '';
       $sStyleReadInp_nomefantasia_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nomefantasia_']) && $this->nmgp_cmp_hidden['nomefantasia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nomefantasia_" value="<?php echo $this->form_encode_input($nomefantasia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_nomefantasia__label" id="hidden_field_label_nomefantasia_" style="<?php echo $sStyleHidden_nomefantasia_; ?>"><span id="id_label_nomefantasia_"><?php echo $this->nm_new_label['nomefantasia_']; ?></span></TD>
    <TD class="scFormDataOdd css_nomefantasia__line" id="hidden_field_data_nomefantasia_" style="<?php echo $sStyleHidden_nomefantasia_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nomefantasia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nomefantasia_"]) &&  $this->nmgp_cmp_readonly["nomefantasia_"] == "on") { 

 ?>
<input type="hidden" name="nomefantasia_" value="<?php echo $this->form_encode_input($nomefantasia_) . "\">" . $nomefantasia_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nomefantasia_" class="sc-ui-readonly-nomefantasia_ css_nomefantasia__line" style="<?php echo $sStyleReadLab_nomefantasia_; ?>"><?php echo $this->form_encode_input($this->nomefantasia_); ?></span><span id="id_read_off_nomefantasia_" style="white-space: nowrap;<?php echo $sStyleReadInp_nomefantasia_; ?>">
 <input class="sc-js-input scFormObjectOdd css_nomefantasia__obj" style="" id="id_sc_field_nomefantasia_" type=text name="nomefantasia_" value="<?php echo $this->form_encode_input($nomefantasia_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nomefantasia__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nomefantasia__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgc_']))
    {
        $this->nm_new_label['cgc_'] = "Cgc";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgc_ = $this->cgc_;
   $sStyleHidden_cgc_ = '';
   if (isset($this->nmgp_cmp_hidden['cgc_']) && $this->nmgp_cmp_hidden['cgc_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgc_']);
       $sStyleHidden_cgc_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgc_ = 'display: none;';
   $sStyleReadInp_cgc_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgc_']) && $this->nmgp_cmp_readonly['cgc_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgc_']);
       $sStyleReadLab_cgc_ = '';
       $sStyleReadInp_cgc_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgc_']) && $this->nmgp_cmp_hidden['cgc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgc_" value="<?php echo $this->form_encode_input($cgc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cgc__label" id="hidden_field_label_cgc_" style="<?php echo $sStyleHidden_cgc_; ?>"><span id="id_label_cgc_"><?php echo $this->nm_new_label['cgc_']; ?></span></TD>
    <TD class="scFormDataOdd css_cgc__line" id="hidden_field_data_cgc_" style="<?php echo $sStyleHidden_cgc_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgc_"]) &&  $this->nmgp_cmp_readonly["cgc_"] == "on") { 

 ?>
<input type="hidden" name="cgc_" value="<?php echo $this->form_encode_input($cgc_) . "\">" . $cgc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgc_" class="sc-ui-readonly-cgc_ css_cgc__line" style="<?php echo $sStyleReadLab_cgc_; ?>"><?php echo $this->form_encode_input($this->cgc_); ?></span><span id="id_read_off_cgc_" style="white-space: nowrap;<?php echo $sStyleReadInp_cgc_; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgc__obj" style="" id="id_sc_field_cgc_" type=text name="cgc_" value="<?php echo $this->form_encode_input($cgc_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgc__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgc__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['inscricao_']))
    {
        $this->nm_new_label['inscricao_'] = "Inscricao";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inscricao_ = $this->inscricao_;
   $sStyleHidden_inscricao_ = '';
   if (isset($this->nmgp_cmp_hidden['inscricao_']) && $this->nmgp_cmp_hidden['inscricao_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inscricao_']);
       $sStyleHidden_inscricao_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inscricao_ = 'display: none;';
   $sStyleReadInp_inscricao_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inscricao_']) && $this->nmgp_cmp_readonly['inscricao_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inscricao_']);
       $sStyleReadLab_inscricao_ = '';
       $sStyleReadInp_inscricao_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inscricao_']) && $this->nmgp_cmp_hidden['inscricao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscricao_" value="<?php echo $this->form_encode_input($inscricao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_inscricao__label" id="hidden_field_label_inscricao_" style="<?php echo $sStyleHidden_inscricao_; ?>"><span id="id_label_inscricao_"><?php echo $this->nm_new_label['inscricao_']; ?></span></TD>
    <TD class="scFormDataOdd css_inscricao__line" id="hidden_field_data_inscricao_" style="<?php echo $sStyleHidden_inscricao_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inscricao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscricao_"]) &&  $this->nmgp_cmp_readonly["inscricao_"] == "on") { 

 ?>
<input type="hidden" name="inscricao_" value="<?php echo $this->form_encode_input($inscricao_) . "\">" . $inscricao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscricao_" class="sc-ui-readonly-inscricao_ css_inscricao__line" style="<?php echo $sStyleReadLab_inscricao_; ?>"><?php echo $this->form_encode_input($this->inscricao_); ?></span><span id="id_read_off_inscricao_" style="white-space: nowrap;<?php echo $sStyleReadInp_inscricao_; ?>">
 <input class="sc-js-input scFormObjectOdd css_inscricao__obj" style="" id="id_sc_field_inscricao_" type=text name="inscricao_" value="<?php echo $this->form_encode_input($inscricao_) ?>"
 size=18 maxlength=18 alt="{datatype: 'text', maxLength: 18, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscricao__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscricao__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['endereco_']))
    {
        $this->nm_new_label['endereco_'] = "Endereco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $endereco_ = $this->endereco_;
   $sStyleHidden_endereco_ = '';
   if (isset($this->nmgp_cmp_hidden['endereco_']) && $this->nmgp_cmp_hidden['endereco_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['endereco_']);
       $sStyleHidden_endereco_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_endereco_ = 'display: none;';
   $sStyleReadInp_endereco_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['endereco_']) && $this->nmgp_cmp_readonly['endereco_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['endereco_']);
       $sStyleReadLab_endereco_ = '';
       $sStyleReadInp_endereco_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['endereco_']) && $this->nmgp_cmp_hidden['endereco_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="endereco_" value="<?php echo $this->form_encode_input($endereco_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_endereco__label" id="hidden_field_label_endereco_" style="<?php echo $sStyleHidden_endereco_; ?>"><span id="id_label_endereco_"><?php echo $this->nm_new_label['endereco_']; ?></span></TD>
    <TD class="scFormDataOdd css_endereco__line" id="hidden_field_data_endereco_" style="<?php echo $sStyleHidden_endereco_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_endereco__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["endereco_"]) &&  $this->nmgp_cmp_readonly["endereco_"] == "on") { 

 ?>
<input type="hidden" name="endereco_" value="<?php echo $this->form_encode_input($endereco_) . "\">" . $endereco_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_endereco_" class="sc-ui-readonly-endereco_ css_endereco__line" style="<?php echo $sStyleReadLab_endereco_; ?>"><?php echo $this->form_encode_input($this->endereco_); ?></span><span id="id_read_off_endereco_" style="white-space: nowrap;<?php echo $sStyleReadInp_endereco_; ?>">
 <input class="sc-js-input scFormObjectOdd css_endereco__obj" style="" id="id_sc_field_endereco_" type=text name="endereco_" value="<?php echo $this->form_encode_input($endereco_) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_endereco__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_endereco__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cidade_']))
    {
        $this->nm_new_label['cidade_'] = "Cidade";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cidade_ = $this->cidade_;
   $sStyleHidden_cidade_ = '';
   if (isset($this->nmgp_cmp_hidden['cidade_']) && $this->nmgp_cmp_hidden['cidade_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cidade_']);
       $sStyleHidden_cidade_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cidade_ = 'display: none;';
   $sStyleReadInp_cidade_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cidade_']) && $this->nmgp_cmp_readonly['cidade_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cidade_']);
       $sStyleReadLab_cidade_ = '';
       $sStyleReadInp_cidade_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cidade_']) && $this->nmgp_cmp_hidden['cidade_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cidade_" value="<?php echo $this->form_encode_input($cidade_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cidade__label" id="hidden_field_label_cidade_" style="<?php echo $sStyleHidden_cidade_; ?>"><span id="id_label_cidade_"><?php echo $this->nm_new_label['cidade_']; ?></span></TD>
    <TD class="scFormDataOdd css_cidade__line" id="hidden_field_data_cidade_" style="<?php echo $sStyleHidden_cidade_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cidade__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cidade_"]) &&  $this->nmgp_cmp_readonly["cidade_"] == "on") { 

 ?>
<input type="hidden" name="cidade_" value="<?php echo $this->form_encode_input($cidade_) . "\">" . $cidade_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidade_" class="sc-ui-readonly-cidade_ css_cidade__line" style="<?php echo $sStyleReadLab_cidade_; ?>"><?php echo $this->form_encode_input($this->cidade_); ?></span><span id="id_read_off_cidade_" style="white-space: nowrap;<?php echo $sStyleReadInp_cidade_; ?>">
 <input class="sc-js-input scFormObjectOdd css_cidade__obj" style="" id="id_sc_field_cidade_" type=text name="cidade_" value="<?php echo $this->form_encode_input($cidade_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cidade__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cidade__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estado_']))
    {
        $this->nm_new_label['estado_'] = "Estado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estado_ = $this->estado_;
   $sStyleHidden_estado_ = '';
   if (isset($this->nmgp_cmp_hidden['estado_']) && $this->nmgp_cmp_hidden['estado_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estado_']);
       $sStyleHidden_estado_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estado_ = 'display: none;';
   $sStyleReadInp_estado_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estado_']) && $this->nmgp_cmp_readonly['estado_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estado_']);
       $sStyleReadLab_estado_ = '';
       $sStyleReadInp_estado_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estado_']) && $this->nmgp_cmp_hidden['estado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estado_" value="<?php echo $this->form_encode_input($estado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_estado__label" id="hidden_field_label_estado_" style="<?php echo $sStyleHidden_estado_; ?>"><span id="id_label_estado_"><?php echo $this->nm_new_label['estado_']; ?></span></TD>
    <TD class="scFormDataOdd css_estado__line" id="hidden_field_data_estado_" style="<?php echo $sStyleHidden_estado_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estado_"]) &&  $this->nmgp_cmp_readonly["estado_"] == "on") { 

 ?>
<input type="hidden" name="estado_" value="<?php echo $this->form_encode_input($estado_) . "\">" . $estado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estado_" class="sc-ui-readonly-estado_ css_estado__line" style="<?php echo $sStyleReadLab_estado_; ?>"><?php echo $this->form_encode_input($this->estado_); ?></span><span id="id_read_off_estado_" style="white-space: nowrap;<?php echo $sStyleReadInp_estado_; ?>">
 <input class="sc-js-input scFormObjectOdd css_estado__obj" style="" id="id_sc_field_estado_" type=text name="estado_" value="<?php echo $this->form_encode_input($estado_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estado__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estado__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bairro_']))
    {
        $this->nm_new_label['bairro_'] = "Bairro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bairro_ = $this->bairro_;
   $sStyleHidden_bairro_ = '';
   if (isset($this->nmgp_cmp_hidden['bairro_']) && $this->nmgp_cmp_hidden['bairro_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bairro_']);
       $sStyleHidden_bairro_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bairro_ = 'display: none;';
   $sStyleReadInp_bairro_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bairro_']) && $this->nmgp_cmp_readonly['bairro_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bairro_']);
       $sStyleReadLab_bairro_ = '';
       $sStyleReadInp_bairro_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bairro_']) && $this->nmgp_cmp_hidden['bairro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairro_" value="<?php echo $this->form_encode_input($bairro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bairro__label" id="hidden_field_label_bairro_" style="<?php echo $sStyleHidden_bairro_; ?>"><span id="id_label_bairro_"><?php echo $this->nm_new_label['bairro_']; ?></span></TD>
    <TD class="scFormDataOdd css_bairro__line" id="hidden_field_data_bairro_" style="<?php echo $sStyleHidden_bairro_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bairro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairro_"]) &&  $this->nmgp_cmp_readonly["bairro_"] == "on") { 

 ?>
<input type="hidden" name="bairro_" value="<?php echo $this->form_encode_input($bairro_) . "\">" . $bairro_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairro_" class="sc-ui-readonly-bairro_ css_bairro__line" style="<?php echo $sStyleReadLab_bairro_; ?>"><?php echo $this->form_encode_input($this->bairro_); ?></span><span id="id_read_off_bairro_" style="white-space: nowrap;<?php echo $sStyleReadInp_bairro_; ?>">
 <input class="sc-js-input scFormObjectOdd css_bairro__obj" style="" id="id_sc_field_bairro_" type=text name="bairro_" value="<?php echo $this->form_encode_input($bairro_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairro__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairro__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cep_']))
    {
        $this->nm_new_label['cep_'] = "Cep";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cep_ = $this->cep_;
   $sStyleHidden_cep_ = '';
   if (isset($this->nmgp_cmp_hidden['cep_']) && $this->nmgp_cmp_hidden['cep_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cep_']);
       $sStyleHidden_cep_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cep_ = 'display: none;';
   $sStyleReadInp_cep_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cep_']) && $this->nmgp_cmp_readonly['cep_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cep_']);
       $sStyleReadLab_cep_ = '';
       $sStyleReadInp_cep_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cep_']) && $this->nmgp_cmp_hidden['cep_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cep_" value="<?php echo $this->form_encode_input($cep_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cep__label" id="hidden_field_label_cep_" style="<?php echo $sStyleHidden_cep_; ?>"><span id="id_label_cep_"><?php echo $this->nm_new_label['cep_']; ?></span></TD>
    <TD class="scFormDataOdd css_cep__line" id="hidden_field_data_cep_" style="<?php echo $sStyleHidden_cep_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cep__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cep_"]) &&  $this->nmgp_cmp_readonly["cep_"] == "on") { 

 ?>
<input type="hidden" name="cep_" value="<?php echo $this->form_encode_input($cep_) . "\">" . $cep_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cep_" class="sc-ui-readonly-cep_ css_cep__line" style="<?php echo $sStyleReadLab_cep_; ?>"><?php echo $this->form_encode_input($this->cep_); ?></span><span id="id_read_off_cep_" style="white-space: nowrap;<?php echo $sStyleReadInp_cep_; ?>">
 <input class="sc-js-input scFormObjectOdd css_cep__obj" style="" id="id_sc_field_cep_" type=text name="cep_" value="<?php echo $this->form_encode_input($cep_) ?>"
 size=8 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cep__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cep__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email_']))
    {
        $this->nm_new_label['email_'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email_ = $this->email_;
   $sStyleHidden_email_ = '';
   if (isset($this->nmgp_cmp_hidden['email_']) && $this->nmgp_cmp_hidden['email_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email_']);
       $sStyleHidden_email_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email_ = 'display: none;';
   $sStyleReadInp_email_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email_']) && $this->nmgp_cmp_readonly['email_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email_']);
       $sStyleReadLab_email_ = '';
       $sStyleReadInp_email_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email_']) && $this->nmgp_cmp_hidden['email_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email_" value="<?php echo $this->form_encode_input($email_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_email__label" id="hidden_field_label_email_" style="<?php echo $sStyleHidden_email_; ?>"><span id="id_label_email_"><?php echo $this->nm_new_label['email_']; ?></span></TD>
    <TD class="scFormDataOdd css_email__line" id="hidden_field_data_email_" style="<?php echo $sStyleHidden_email_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email_"]) &&  $this->nmgp_cmp_readonly["email_"] == "on") { 

 ?>
<input type="hidden" name="email_" value="<?php echo $this->form_encode_input($email_) . "\">" . $email_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_email_" class="sc-ui-readonly-email_ css_email__line" style="<?php echo $sStyleReadLab_email_; ?>"><?php echo $this->form_encode_input($this->email_); ?></span><span id="id_read_off_email_" style="white-space: nowrap;<?php echo $sStyleReadInp_email_; ?>">
 <input class="sc-js-input scFormObjectOdd css_email__obj" style="" id="id_sc_field_email_" type=text name="email_" value="<?php echo $this->form_encode_input($email_) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fone_']))
    {
        $this->nm_new_label['fone_'] = "Fone";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fone_ = $this->fone_;
   $sStyleHidden_fone_ = '';
   if (isset($this->nmgp_cmp_hidden['fone_']) && $this->nmgp_cmp_hidden['fone_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fone_']);
       $sStyleHidden_fone_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fone_ = 'display: none;';
   $sStyleReadInp_fone_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fone_']) && $this->nmgp_cmp_readonly['fone_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fone_']);
       $sStyleReadLab_fone_ = '';
       $sStyleReadInp_fone_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fone_']) && $this->nmgp_cmp_hidden['fone_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fone_" value="<?php echo $this->form_encode_input($fone_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fone__label" id="hidden_field_label_fone_" style="<?php echo $sStyleHidden_fone_; ?>"><span id="id_label_fone_"><?php echo $this->nm_new_label['fone_']; ?></span></TD>
    <TD class="scFormDataOdd css_fone__line" id="hidden_field_data_fone_" style="<?php echo $sStyleHidden_fone_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fone__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fone_"]) &&  $this->nmgp_cmp_readonly["fone_"] == "on") { 

 ?>
<input type="hidden" name="fone_" value="<?php echo $this->form_encode_input($fone_) . "\">" . $fone_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fone_" class="sc-ui-readonly-fone_ css_fone__line" style="<?php echo $sStyleReadLab_fone_; ?>"><?php echo $this->form_encode_input($this->fone_); ?></span><span id="id_read_off_fone_" style="white-space: nowrap;<?php echo $sStyleReadInp_fone_; ?>">
 <input class="sc-js-input scFormObjectOdd css_fone__obj" style="" id="id_sc_field_fone_" type=text name="fone_" value="<?php echo $this->form_encode_input($fone_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fone__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fone__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fone1_']))
    {
        $this->nm_new_label['fone1_'] = "Fone 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fone1_ = $this->fone1_;
   $sStyleHidden_fone1_ = '';
   if (isset($this->nmgp_cmp_hidden['fone1_']) && $this->nmgp_cmp_hidden['fone1_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fone1_']);
       $sStyleHidden_fone1_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fone1_ = 'display: none;';
   $sStyleReadInp_fone1_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fone1_']) && $this->nmgp_cmp_readonly['fone1_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fone1_']);
       $sStyleReadLab_fone1_ = '';
       $sStyleReadInp_fone1_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fone1_']) && $this->nmgp_cmp_hidden['fone1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fone1_" value="<?php echo $this->form_encode_input($fone1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fone1__label" id="hidden_field_label_fone1_" style="<?php echo $sStyleHidden_fone1_; ?>"><span id="id_label_fone1_"><?php echo $this->nm_new_label['fone1_']; ?></span></TD>
    <TD class="scFormDataOdd css_fone1__line" id="hidden_field_data_fone1_" style="<?php echo $sStyleHidden_fone1_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fone1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fone1_"]) &&  $this->nmgp_cmp_readonly["fone1_"] == "on") { 

 ?>
<input type="hidden" name="fone1_" value="<?php echo $this->form_encode_input($fone1_) . "\">" . $fone1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fone1_" class="sc-ui-readonly-fone1_ css_fone1__line" style="<?php echo $sStyleReadLab_fone1_; ?>"><?php echo $this->form_encode_input($this->fone1_); ?></span><span id="id_read_off_fone1_" style="white-space: nowrap;<?php echo $sStyleReadInp_fone1_; ?>">
 <input class="sc-js-input scFormObjectOdd css_fone1__obj" style="" id="id_sc_field_fone1_" type=text name="fone1_" value="<?php echo $this->form_encode_input($fone1_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fone1__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fone1__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fax_']))
    {
        $this->nm_new_label['fax_'] = "Fax";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fax_ = $this->fax_;
   $sStyleHidden_fax_ = '';
   if (isset($this->nmgp_cmp_hidden['fax_']) && $this->nmgp_cmp_hidden['fax_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fax_']);
       $sStyleHidden_fax_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fax_ = 'display: none;';
   $sStyleReadInp_fax_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fax_']) && $this->nmgp_cmp_readonly['fax_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fax_']);
       $sStyleReadLab_fax_ = '';
       $sStyleReadInp_fax_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fax_']) && $this->nmgp_cmp_hidden['fax_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fax_" value="<?php echo $this->form_encode_input($fax_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fax__label" id="hidden_field_label_fax_" style="<?php echo $sStyleHidden_fax_; ?>"><span id="id_label_fax_"><?php echo $this->nm_new_label['fax_']; ?></span></TD>
    <TD class="scFormDataOdd css_fax__line" id="hidden_field_data_fax_" style="<?php echo $sStyleHidden_fax_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fax__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fax_"]) &&  $this->nmgp_cmp_readonly["fax_"] == "on") { 

 ?>
<input type="hidden" name="fax_" value="<?php echo $this->form_encode_input($fax_) . "\">" . $fax_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fax_" class="sc-ui-readonly-fax_ css_fax__line" style="<?php echo $sStyleReadLab_fax_; ?>"><?php echo $this->form_encode_input($this->fax_); ?></span><span id="id_read_off_fax_" style="white-space: nowrap;<?php echo $sStyleReadInp_fax_; ?>">
 <input class="sc-js-input scFormObjectOdd css_fax__obj" style="" id="id_sc_field_fax_" type=text name="fax_" value="<?php echo $this->form_encode_input($fax_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fax__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fax__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contato_']))
    {
        $this->nm_new_label['contato_'] = "Contato";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contato_ = $this->contato_;
   $sStyleHidden_contato_ = '';
   if (isset($this->nmgp_cmp_hidden['contato_']) && $this->nmgp_cmp_hidden['contato_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contato_']);
       $sStyleHidden_contato_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contato_ = 'display: none;';
   $sStyleReadInp_contato_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contato_']) && $this->nmgp_cmp_readonly['contato_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contato_']);
       $sStyleReadLab_contato_ = '';
       $sStyleReadInp_contato_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contato_']) && $this->nmgp_cmp_hidden['contato_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contato_" value="<?php echo $this->form_encode_input($contato_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_contato__label" id="hidden_field_label_contato_" style="<?php echo $sStyleHidden_contato_; ?>"><span id="id_label_contato_"><?php echo $this->nm_new_label['contato_']; ?></span></TD>
    <TD class="scFormDataOdd css_contato__line" id="hidden_field_data_contato_" style="<?php echo $sStyleHidden_contato_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contato__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contato_"]) &&  $this->nmgp_cmp_readonly["contato_"] == "on") { 

 ?>
<input type="hidden" name="contato_" value="<?php echo $this->form_encode_input($contato_) . "\">" . $contato_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contato_" class="sc-ui-readonly-contato_ css_contato__line" style="<?php echo $sStyleReadLab_contato_; ?>"><?php echo $this->form_encode_input($this->contato_); ?></span><span id="id_read_off_contato_" style="white-space: nowrap;<?php echo $sStyleReadInp_contato_; ?>">
 <input class="sc-js-input scFormObjectOdd css_contato__obj" style="" id="id_sc_field_contato_" type=text name="contato_" value="<?php echo $this->form_encode_input($contato_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contato__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contato__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['enderecocobranca_']))
    {
        $this->nm_new_label['enderecocobranca_'] = "Enderecocobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enderecocobranca_ = $this->enderecocobranca_;
   $sStyleHidden_enderecocobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['enderecocobranca_']) && $this->nmgp_cmp_hidden['enderecocobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enderecocobranca_']);
       $sStyleHidden_enderecocobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enderecocobranca_ = 'display: none;';
   $sStyleReadInp_enderecocobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enderecocobranca_']) && $this->nmgp_cmp_readonly['enderecocobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enderecocobranca_']);
       $sStyleReadLab_enderecocobranca_ = '';
       $sStyleReadInp_enderecocobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enderecocobranca_']) && $this->nmgp_cmp_hidden['enderecocobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enderecocobranca_" value="<?php echo $this->form_encode_input($enderecocobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_enderecocobranca__label" id="hidden_field_label_enderecocobranca_" style="<?php echo $sStyleHidden_enderecocobranca_; ?>"><span id="id_label_enderecocobranca_"><?php echo $this->nm_new_label['enderecocobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_enderecocobranca__line" id="hidden_field_data_enderecocobranca_" style="<?php echo $sStyleHidden_enderecocobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enderecocobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enderecocobranca_"]) &&  $this->nmgp_cmp_readonly["enderecocobranca_"] == "on") { 

 ?>
<input type="hidden" name="enderecocobranca_" value="<?php echo $this->form_encode_input($enderecocobranca_) . "\">" . $enderecocobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_enderecocobranca_" class="sc-ui-readonly-enderecocobranca_ css_enderecocobranca__line" style="<?php echo $sStyleReadLab_enderecocobranca_; ?>"><?php echo $this->form_encode_input($this->enderecocobranca_); ?></span><span id="id_read_off_enderecocobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_enderecocobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_enderecocobranca__obj" style="" id="id_sc_field_enderecocobranca_" type=text name="enderecocobranca_" value="<?php echo $this->form_encode_input($enderecocobranca_) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enderecocobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enderecocobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cidadecobranca_']))
    {
        $this->nm_new_label['cidadecobranca_'] = "Cidadecobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cidadecobranca_ = $this->cidadecobranca_;
   $sStyleHidden_cidadecobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['cidadecobranca_']) && $this->nmgp_cmp_hidden['cidadecobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cidadecobranca_']);
       $sStyleHidden_cidadecobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cidadecobranca_ = 'display: none;';
   $sStyleReadInp_cidadecobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cidadecobranca_']) && $this->nmgp_cmp_readonly['cidadecobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cidadecobranca_']);
       $sStyleReadLab_cidadecobranca_ = '';
       $sStyleReadInp_cidadecobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cidadecobranca_']) && $this->nmgp_cmp_hidden['cidadecobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cidadecobranca_" value="<?php echo $this->form_encode_input($cidadecobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cidadecobranca__label" id="hidden_field_label_cidadecobranca_" style="<?php echo $sStyleHidden_cidadecobranca_; ?>"><span id="id_label_cidadecobranca_"><?php echo $this->nm_new_label['cidadecobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_cidadecobranca__line" id="hidden_field_data_cidadecobranca_" style="<?php echo $sStyleHidden_cidadecobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cidadecobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cidadecobranca_"]) &&  $this->nmgp_cmp_readonly["cidadecobranca_"] == "on") { 

 ?>
<input type="hidden" name="cidadecobranca_" value="<?php echo $this->form_encode_input($cidadecobranca_) . "\">" . $cidadecobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidadecobranca_" class="sc-ui-readonly-cidadecobranca_ css_cidadecobranca__line" style="<?php echo $sStyleReadLab_cidadecobranca_; ?>"><?php echo $this->form_encode_input($this->cidadecobranca_); ?></span><span id="id_read_off_cidadecobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_cidadecobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_cidadecobranca__obj" style="" id="id_sc_field_cidadecobranca_" type=text name="cidadecobranca_" value="<?php echo $this->form_encode_input($cidadecobranca_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cidadecobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cidadecobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bairrocobranca_']))
    {
        $this->nm_new_label['bairrocobranca_'] = "Bairrocobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bairrocobranca_ = $this->bairrocobranca_;
   $sStyleHidden_bairrocobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['bairrocobranca_']) && $this->nmgp_cmp_hidden['bairrocobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bairrocobranca_']);
       $sStyleHidden_bairrocobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bairrocobranca_ = 'display: none;';
   $sStyleReadInp_bairrocobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bairrocobranca_']) && $this->nmgp_cmp_readonly['bairrocobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bairrocobranca_']);
       $sStyleReadLab_bairrocobranca_ = '';
       $sStyleReadInp_bairrocobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bairrocobranca_']) && $this->nmgp_cmp_hidden['bairrocobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairrocobranca_" value="<?php echo $this->form_encode_input($bairrocobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bairrocobranca__label" id="hidden_field_label_bairrocobranca_" style="<?php echo $sStyleHidden_bairrocobranca_; ?>"><span id="id_label_bairrocobranca_"><?php echo $this->nm_new_label['bairrocobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_bairrocobranca__line" id="hidden_field_data_bairrocobranca_" style="<?php echo $sStyleHidden_bairrocobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bairrocobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairrocobranca_"]) &&  $this->nmgp_cmp_readonly["bairrocobranca_"] == "on") { 

 ?>
<input type="hidden" name="bairrocobranca_" value="<?php echo $this->form_encode_input($bairrocobranca_) . "\">" . $bairrocobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairrocobranca_" class="sc-ui-readonly-bairrocobranca_ css_bairrocobranca__line" style="<?php echo $sStyleReadLab_bairrocobranca_; ?>"><?php echo $this->form_encode_input($this->bairrocobranca_); ?></span><span id="id_read_off_bairrocobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_bairrocobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_bairrocobranca__obj" style="" id="id_sc_field_bairrocobranca_" type=text name="bairrocobranca_" value="<?php echo $this->form_encode_input($bairrocobranca_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairrocobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairrocobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estadocobranca_']))
    {
        $this->nm_new_label['estadocobranca_'] = "Estadocobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estadocobranca_ = $this->estadocobranca_;
   $sStyleHidden_estadocobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['estadocobranca_']) && $this->nmgp_cmp_hidden['estadocobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estadocobranca_']);
       $sStyleHidden_estadocobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estadocobranca_ = 'display: none;';
   $sStyleReadInp_estadocobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estadocobranca_']) && $this->nmgp_cmp_readonly['estadocobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estadocobranca_']);
       $sStyleReadLab_estadocobranca_ = '';
       $sStyleReadInp_estadocobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estadocobranca_']) && $this->nmgp_cmp_hidden['estadocobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estadocobranca_" value="<?php echo $this->form_encode_input($estadocobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_estadocobranca__label" id="hidden_field_label_estadocobranca_" style="<?php echo $sStyleHidden_estadocobranca_; ?>"><span id="id_label_estadocobranca_"><?php echo $this->nm_new_label['estadocobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_estadocobranca__line" id="hidden_field_data_estadocobranca_" style="<?php echo $sStyleHidden_estadocobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estadocobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estadocobranca_"]) &&  $this->nmgp_cmp_readonly["estadocobranca_"] == "on") { 

 ?>
<input type="hidden" name="estadocobranca_" value="<?php echo $this->form_encode_input($estadocobranca_) . "\">" . $estadocobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estadocobranca_" class="sc-ui-readonly-estadocobranca_ css_estadocobranca__line" style="<?php echo $sStyleReadLab_estadocobranca_; ?>"><?php echo $this->form_encode_input($this->estadocobranca_); ?></span><span id="id_read_off_estadocobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_estadocobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_estadocobranca__obj" style="" id="id_sc_field_estadocobranca_" type=text name="estadocobranca_" value="<?php echo $this->form_encode_input($estadocobranca_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estadocobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estadocobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cepcobranca_']))
    {
        $this->nm_new_label['cepcobranca_'] = "Cepcobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cepcobranca_ = $this->cepcobranca_;
   $sStyleHidden_cepcobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['cepcobranca_']) && $this->nmgp_cmp_hidden['cepcobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cepcobranca_']);
       $sStyleHidden_cepcobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cepcobranca_ = 'display: none;';
   $sStyleReadInp_cepcobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cepcobranca_']) && $this->nmgp_cmp_readonly['cepcobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cepcobranca_']);
       $sStyleReadLab_cepcobranca_ = '';
       $sStyleReadInp_cepcobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cepcobranca_']) && $this->nmgp_cmp_hidden['cepcobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cepcobranca_" value="<?php echo $this->form_encode_input($cepcobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cepcobranca__label" id="hidden_field_label_cepcobranca_" style="<?php echo $sStyleHidden_cepcobranca_; ?>"><span id="id_label_cepcobranca_"><?php echo $this->nm_new_label['cepcobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_cepcobranca__line" id="hidden_field_data_cepcobranca_" style="<?php echo $sStyleHidden_cepcobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cepcobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cepcobranca_"]) &&  $this->nmgp_cmp_readonly["cepcobranca_"] == "on") { 

 ?>
<input type="hidden" name="cepcobranca_" value="<?php echo $this->form_encode_input($cepcobranca_) . "\">" . $cepcobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cepcobranca_" class="sc-ui-readonly-cepcobranca_ css_cepcobranca__line" style="<?php echo $sStyleReadLab_cepcobranca_; ?>"><?php echo $this->form_encode_input($this->cepcobranca_); ?></span><span id="id_read_off_cepcobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_cepcobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_cepcobranca__obj" style="" id="id_sc_field_cepcobranca_" type=text name="cepcobranca_" value="<?php echo $this->form_encode_input($cepcobranca_) ?>"
 size=8 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cepcobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cepcobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fonecobranca_']))
    {
        $this->nm_new_label['fonecobranca_'] = "Fonecobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $fonecobranca_ = $this->fonecobranca_;
   $sStyleHidden_fonecobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['fonecobranca_']) && $this->nmgp_cmp_hidden['fonecobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fonecobranca_']);
       $sStyleHidden_fonecobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fonecobranca_ = 'display: none;';
   $sStyleReadInp_fonecobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fonecobranca_']) && $this->nmgp_cmp_readonly['fonecobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fonecobranca_']);
       $sStyleReadLab_fonecobranca_ = '';
       $sStyleReadInp_fonecobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fonecobranca_']) && $this->nmgp_cmp_hidden['fonecobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fonecobranca_" value="<?php echo $this->form_encode_input($fonecobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fonecobranca__label" id="hidden_field_label_fonecobranca_" style="<?php echo $sStyleHidden_fonecobranca_; ?>"><span id="id_label_fonecobranca_"><?php echo $this->nm_new_label['fonecobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_fonecobranca__line" id="hidden_field_data_fonecobranca_" style="<?php echo $sStyleHidden_fonecobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fonecobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fonecobranca_"]) &&  $this->nmgp_cmp_readonly["fonecobranca_"] == "on") { 

 ?>
<input type="hidden" name="fonecobranca_" value="<?php echo $this->form_encode_input($fonecobranca_) . "\">" . $fonecobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fonecobranca_" class="sc-ui-readonly-fonecobranca_ css_fonecobranca__line" style="<?php echo $sStyleReadLab_fonecobranca_; ?>"><?php echo $this->form_encode_input($this->fonecobranca_); ?></span><span id="id_read_off_fonecobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_fonecobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_fonecobranca__obj" style="" id="id_sc_field_fonecobranca_" type=text name="fonecobranca_" value="<?php echo $this->form_encode_input($fonecobranca_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fonecobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fonecobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['faxcobranca_']))
    {
        $this->nm_new_label['faxcobranca_'] = "Faxcobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $faxcobranca_ = $this->faxcobranca_;
   $sStyleHidden_faxcobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['faxcobranca_']) && $this->nmgp_cmp_hidden['faxcobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['faxcobranca_']);
       $sStyleHidden_faxcobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_faxcobranca_ = 'display: none;';
   $sStyleReadInp_faxcobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['faxcobranca_']) && $this->nmgp_cmp_readonly['faxcobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['faxcobranca_']);
       $sStyleReadLab_faxcobranca_ = '';
       $sStyleReadInp_faxcobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['faxcobranca_']) && $this->nmgp_cmp_hidden['faxcobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="faxcobranca_" value="<?php echo $this->form_encode_input($faxcobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_faxcobranca__label" id="hidden_field_label_faxcobranca_" style="<?php echo $sStyleHidden_faxcobranca_; ?>"><span id="id_label_faxcobranca_"><?php echo $this->nm_new_label['faxcobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_faxcobranca__line" id="hidden_field_data_faxcobranca_" style="<?php echo $sStyleHidden_faxcobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_faxcobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["faxcobranca_"]) &&  $this->nmgp_cmp_readonly["faxcobranca_"] == "on") { 

 ?>
<input type="hidden" name="faxcobranca_" value="<?php echo $this->form_encode_input($faxcobranca_) . "\">" . $faxcobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_faxcobranca_" class="sc-ui-readonly-faxcobranca_ css_faxcobranca__line" style="<?php echo $sStyleReadLab_faxcobranca_; ?>"><?php echo $this->form_encode_input($this->faxcobranca_); ?></span><span id="id_read_off_faxcobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_faxcobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_faxcobranca__obj" style="" id="id_sc_field_faxcobranca_" type=text name="faxcobranca_" value="<?php echo $this->form_encode_input($faxcobranca_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_faxcobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_faxcobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contatocobranca_']))
    {
        $this->nm_new_label['contatocobranca_'] = "Contatocobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contatocobranca_ = $this->contatocobranca_;
   $sStyleHidden_contatocobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['contatocobranca_']) && $this->nmgp_cmp_hidden['contatocobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contatocobranca_']);
       $sStyleHidden_contatocobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contatocobranca_ = 'display: none;';
   $sStyleReadInp_contatocobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contatocobranca_']) && $this->nmgp_cmp_readonly['contatocobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contatocobranca_']);
       $sStyleReadLab_contatocobranca_ = '';
       $sStyleReadInp_contatocobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contatocobranca_']) && $this->nmgp_cmp_hidden['contatocobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatocobranca_" value="<?php echo $this->form_encode_input($contatocobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_contatocobranca__label" id="hidden_field_label_contatocobranca_" style="<?php echo $sStyleHidden_contatocobranca_; ?>"><span id="id_label_contatocobranca_"><?php echo $this->nm_new_label['contatocobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_contatocobranca__line" id="hidden_field_data_contatocobranca_" style="<?php echo $sStyleHidden_contatocobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contatocobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatocobranca_"]) &&  $this->nmgp_cmp_readonly["contatocobranca_"] == "on") { 

 ?>
<input type="hidden" name="contatocobranca_" value="<?php echo $this->form_encode_input($contatocobranca_) . "\">" . $contatocobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatocobranca_" class="sc-ui-readonly-contatocobranca_ css_contatocobranca__line" style="<?php echo $sStyleReadLab_contatocobranca_; ?>"><?php echo $this->form_encode_input($this->contatocobranca_); ?></span><span id="id_read_off_contatocobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_contatocobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_contatocobranca__obj" style="" id="id_sc_field_contatocobranca_" type=text name="contatocobranca_" value="<?php echo $this->form_encode_input($contatocobranca_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatocobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatocobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cgcentrega_']))
    {
        $this->nm_new_label['cgcentrega_'] = "Cgcentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cgcentrega_ = $this->cgcentrega_;
   $sStyleHidden_cgcentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['cgcentrega_']) && $this->nmgp_cmp_hidden['cgcentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cgcentrega_']);
       $sStyleHidden_cgcentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cgcentrega_ = 'display: none;';
   $sStyleReadInp_cgcentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cgcentrega_']) && $this->nmgp_cmp_readonly['cgcentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cgcentrega_']);
       $sStyleReadLab_cgcentrega_ = '';
       $sStyleReadInp_cgcentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cgcentrega_']) && $this->nmgp_cmp_hidden['cgcentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cgcentrega_" value="<?php echo $this->form_encode_input($cgcentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cgcentrega__label" id="hidden_field_label_cgcentrega_" style="<?php echo $sStyleHidden_cgcentrega_; ?>"><span id="id_label_cgcentrega_"><?php echo $this->nm_new_label['cgcentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_cgcentrega__line" id="hidden_field_data_cgcentrega_" style="<?php echo $sStyleHidden_cgcentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cgcentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cgcentrega_"]) &&  $this->nmgp_cmp_readonly["cgcentrega_"] == "on") { 

 ?>
<input type="hidden" name="cgcentrega_" value="<?php echo $this->form_encode_input($cgcentrega_) . "\">" . $cgcentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cgcentrega_" class="sc-ui-readonly-cgcentrega_ css_cgcentrega__line" style="<?php echo $sStyleReadLab_cgcentrega_; ?>"><?php echo $this->form_encode_input($this->cgcentrega_); ?></span><span id="id_read_off_cgcentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_cgcentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_cgcentrega__obj" style="" id="id_sc_field_cgcentrega_" type=text name="cgcentrega_" value="<?php echo $this->form_encode_input($cgcentrega_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cgcentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cgcentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['inscricaoentrega_']))
    {
        $this->nm_new_label['inscricaoentrega_'] = "Inscricaoentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inscricaoentrega_ = $this->inscricaoentrega_;
   $sStyleHidden_inscricaoentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['inscricaoentrega_']) && $this->nmgp_cmp_hidden['inscricaoentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inscricaoentrega_']);
       $sStyleHidden_inscricaoentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inscricaoentrega_ = 'display: none;';
   $sStyleReadInp_inscricaoentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inscricaoentrega_']) && $this->nmgp_cmp_readonly['inscricaoentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inscricaoentrega_']);
       $sStyleReadLab_inscricaoentrega_ = '';
       $sStyleReadInp_inscricaoentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inscricaoentrega_']) && $this->nmgp_cmp_hidden['inscricaoentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscricaoentrega_" value="<?php echo $this->form_encode_input($inscricaoentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_inscricaoentrega__label" id="hidden_field_label_inscricaoentrega_" style="<?php echo $sStyleHidden_inscricaoentrega_; ?>"><span id="id_label_inscricaoentrega_"><?php echo $this->nm_new_label['inscricaoentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_inscricaoentrega__line" id="hidden_field_data_inscricaoentrega_" style="<?php echo $sStyleHidden_inscricaoentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inscricaoentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscricaoentrega_"]) &&  $this->nmgp_cmp_readonly["inscricaoentrega_"] == "on") { 

 ?>
<input type="hidden" name="inscricaoentrega_" value="<?php echo $this->form_encode_input($inscricaoentrega_) . "\">" . $inscricaoentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscricaoentrega_" class="sc-ui-readonly-inscricaoentrega_ css_inscricaoentrega__line" style="<?php echo $sStyleReadLab_inscricaoentrega_; ?>"><?php echo $this->form_encode_input($this->inscricaoentrega_); ?></span><span id="id_read_off_inscricaoentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_inscricaoentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_inscricaoentrega__obj" style="" id="id_sc_field_inscricaoentrega_" type=text name="inscricaoentrega_" value="<?php echo $this->form_encode_input($inscricaoentrega_) ?>"
 size=18 maxlength=18 alt="{datatype: 'text', maxLength: 18, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscricaoentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscricaoentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['enderecoentrega_']))
    {
        $this->nm_new_label['enderecoentrega_'] = "Enderecoentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $enderecoentrega_ = $this->enderecoentrega_;
   $sStyleHidden_enderecoentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['enderecoentrega_']) && $this->nmgp_cmp_hidden['enderecoentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['enderecoentrega_']);
       $sStyleHidden_enderecoentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_enderecoentrega_ = 'display: none;';
   $sStyleReadInp_enderecoentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['enderecoentrega_']) && $this->nmgp_cmp_readonly['enderecoentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['enderecoentrega_']);
       $sStyleReadLab_enderecoentrega_ = '';
       $sStyleReadInp_enderecoentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['enderecoentrega_']) && $this->nmgp_cmp_hidden['enderecoentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="enderecoentrega_" value="<?php echo $this->form_encode_input($enderecoentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_enderecoentrega__label" id="hidden_field_label_enderecoentrega_" style="<?php echo $sStyleHidden_enderecoentrega_; ?>"><span id="id_label_enderecoentrega_"><?php echo $this->nm_new_label['enderecoentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_enderecoentrega__line" id="hidden_field_data_enderecoentrega_" style="<?php echo $sStyleHidden_enderecoentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_enderecoentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["enderecoentrega_"]) &&  $this->nmgp_cmp_readonly["enderecoentrega_"] == "on") { 

 ?>
<input type="hidden" name="enderecoentrega_" value="<?php echo $this->form_encode_input($enderecoentrega_) . "\">" . $enderecoentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_enderecoentrega_" class="sc-ui-readonly-enderecoentrega_ css_enderecoentrega__line" style="<?php echo $sStyleReadLab_enderecoentrega_; ?>"><?php echo $this->form_encode_input($this->enderecoentrega_); ?></span><span id="id_read_off_enderecoentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_enderecoentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_enderecoentrega__obj" style="" id="id_sc_field_enderecoentrega_" type=text name="enderecoentrega_" value="<?php echo $this->form_encode_input($enderecoentrega_) ?>"
 size=40 maxlength=40 alt="{datatype: 'text', maxLength: 40, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_enderecoentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_enderecoentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cidadeentrega_']))
    {
        $this->nm_new_label['cidadeentrega_'] = "Cidadeentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cidadeentrega_ = $this->cidadeentrega_;
   $sStyleHidden_cidadeentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['cidadeentrega_']) && $this->nmgp_cmp_hidden['cidadeentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cidadeentrega_']);
       $sStyleHidden_cidadeentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cidadeentrega_ = 'display: none;';
   $sStyleReadInp_cidadeentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cidadeentrega_']) && $this->nmgp_cmp_readonly['cidadeentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cidadeentrega_']);
       $sStyleReadLab_cidadeentrega_ = '';
       $sStyleReadInp_cidadeentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cidadeentrega_']) && $this->nmgp_cmp_hidden['cidadeentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cidadeentrega_" value="<?php echo $this->form_encode_input($cidadeentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cidadeentrega__label" id="hidden_field_label_cidadeentrega_" style="<?php echo $sStyleHidden_cidadeentrega_; ?>"><span id="id_label_cidadeentrega_"><?php echo $this->nm_new_label['cidadeentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_cidadeentrega__line" id="hidden_field_data_cidadeentrega_" style="<?php echo $sStyleHidden_cidadeentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cidadeentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cidadeentrega_"]) &&  $this->nmgp_cmp_readonly["cidadeentrega_"] == "on") { 

 ?>
<input type="hidden" name="cidadeentrega_" value="<?php echo $this->form_encode_input($cidadeentrega_) . "\">" . $cidadeentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cidadeentrega_" class="sc-ui-readonly-cidadeentrega_ css_cidadeentrega__line" style="<?php echo $sStyleReadLab_cidadeentrega_; ?>"><?php echo $this->form_encode_input($this->cidadeentrega_); ?></span><span id="id_read_off_cidadeentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_cidadeentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_cidadeentrega__obj" style="" id="id_sc_field_cidadeentrega_" type=text name="cidadeentrega_" value="<?php echo $this->form_encode_input($cidadeentrega_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cidadeentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cidadeentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bairroentrega_']))
    {
        $this->nm_new_label['bairroentrega_'] = "Bairroentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bairroentrega_ = $this->bairroentrega_;
   $sStyleHidden_bairroentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['bairroentrega_']) && $this->nmgp_cmp_hidden['bairroentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bairroentrega_']);
       $sStyleHidden_bairroentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bairroentrega_ = 'display: none;';
   $sStyleReadInp_bairroentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bairroentrega_']) && $this->nmgp_cmp_readonly['bairroentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bairroentrega_']);
       $sStyleReadLab_bairroentrega_ = '';
       $sStyleReadInp_bairroentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bairroentrega_']) && $this->nmgp_cmp_hidden['bairroentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairroentrega_" value="<?php echo $this->form_encode_input($bairroentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_bairroentrega__label" id="hidden_field_label_bairroentrega_" style="<?php echo $sStyleHidden_bairroentrega_; ?>"><span id="id_label_bairroentrega_"><?php echo $this->nm_new_label['bairroentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_bairroentrega__line" id="hidden_field_data_bairroentrega_" style="<?php echo $sStyleHidden_bairroentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bairroentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairroentrega_"]) &&  $this->nmgp_cmp_readonly["bairroentrega_"] == "on") { 

 ?>
<input type="hidden" name="bairroentrega_" value="<?php echo $this->form_encode_input($bairroentrega_) . "\">" . $bairroentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairroentrega_" class="sc-ui-readonly-bairroentrega_ css_bairroentrega__line" style="<?php echo $sStyleReadLab_bairroentrega_; ?>"><?php echo $this->form_encode_input($this->bairroentrega_); ?></span><span id="id_read_off_bairroentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_bairroentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_bairroentrega__obj" style="" id="id_sc_field_bairroentrega_" type=text name="bairroentrega_" value="<?php echo $this->form_encode_input($bairroentrega_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairroentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairroentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['estadoentrega_']))
    {
        $this->nm_new_label['estadoentrega_'] = "Estadoentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $estadoentrega_ = $this->estadoentrega_;
   $sStyleHidden_estadoentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['estadoentrega_']) && $this->nmgp_cmp_hidden['estadoentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['estadoentrega_']);
       $sStyleHidden_estadoentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_estadoentrega_ = 'display: none;';
   $sStyleReadInp_estadoentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['estadoentrega_']) && $this->nmgp_cmp_readonly['estadoentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['estadoentrega_']);
       $sStyleReadLab_estadoentrega_ = '';
       $sStyleReadInp_estadoentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['estadoentrega_']) && $this->nmgp_cmp_hidden['estadoentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="estadoentrega_" value="<?php echo $this->form_encode_input($estadoentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_estadoentrega__label" id="hidden_field_label_estadoentrega_" style="<?php echo $sStyleHidden_estadoentrega_; ?>"><span id="id_label_estadoentrega_"><?php echo $this->nm_new_label['estadoentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_estadoentrega__line" id="hidden_field_data_estadoentrega_" style="<?php echo $sStyleHidden_estadoentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_estadoentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["estadoentrega_"]) &&  $this->nmgp_cmp_readonly["estadoentrega_"] == "on") { 

 ?>
<input type="hidden" name="estadoentrega_" value="<?php echo $this->form_encode_input($estadoentrega_) . "\">" . $estadoentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_estadoentrega_" class="sc-ui-readonly-estadoentrega_ css_estadoentrega__line" style="<?php echo $sStyleReadLab_estadoentrega_; ?>"><?php echo $this->form_encode_input($this->estadoentrega_); ?></span><span id="id_read_off_estadoentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_estadoentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_estadoentrega__obj" style="" id="id_sc_field_estadoentrega_" type=text name="estadoentrega_" value="<?php echo $this->form_encode_input($estadoentrega_) ?>"
 size=2 maxlength=2 alt="{datatype: 'text', maxLength: 2, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_estadoentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_estadoentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cepentrega_']))
    {
        $this->nm_new_label['cepentrega_'] = "Cepentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cepentrega_ = $this->cepentrega_;
   $sStyleHidden_cepentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['cepentrega_']) && $this->nmgp_cmp_hidden['cepentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cepentrega_']);
       $sStyleHidden_cepentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cepentrega_ = 'display: none;';
   $sStyleReadInp_cepentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cepentrega_']) && $this->nmgp_cmp_readonly['cepentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cepentrega_']);
       $sStyleReadLab_cepentrega_ = '';
       $sStyleReadInp_cepentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cepentrega_']) && $this->nmgp_cmp_hidden['cepentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cepentrega_" value="<?php echo $this->form_encode_input($cepentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_cepentrega__label" id="hidden_field_label_cepentrega_" style="<?php echo $sStyleHidden_cepentrega_; ?>"><span id="id_label_cepentrega_"><?php echo $this->nm_new_label['cepentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_cepentrega__line" id="hidden_field_data_cepentrega_" style="<?php echo $sStyleHidden_cepentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cepentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cepentrega_"]) &&  $this->nmgp_cmp_readonly["cepentrega_"] == "on") { 

 ?>
<input type="hidden" name="cepentrega_" value="<?php echo $this->form_encode_input($cepentrega_) . "\">" . $cepentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_cepentrega_" class="sc-ui-readonly-cepentrega_ css_cepentrega__line" style="<?php echo $sStyleReadLab_cepentrega_; ?>"><?php echo $this->form_encode_input($this->cepentrega_); ?></span><span id="id_read_off_cepentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_cepentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_cepentrega__obj" style="" id="id_sc_field_cepentrega_" type=text name="cepentrega_" value="<?php echo $this->form_encode_input($cepentrega_) ?>"
 size=8 maxlength=8 alt="{datatype: 'text', maxLength: 8, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cepentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cepentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foneentrega_']))
    {
        $this->nm_new_label['foneentrega_'] = "Foneentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foneentrega_ = $this->foneentrega_;
   $sStyleHidden_foneentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['foneentrega_']) && $this->nmgp_cmp_hidden['foneentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foneentrega_']);
       $sStyleHidden_foneentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foneentrega_ = 'display: none;';
   $sStyleReadInp_foneentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foneentrega_']) && $this->nmgp_cmp_readonly['foneentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foneentrega_']);
       $sStyleReadLab_foneentrega_ = '';
       $sStyleReadInp_foneentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foneentrega_']) && $this->nmgp_cmp_hidden['foneentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foneentrega_" value="<?php echo $this->form_encode_input($foneentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foneentrega__label" id="hidden_field_label_foneentrega_" style="<?php echo $sStyleHidden_foneentrega_; ?>"><span id="id_label_foneentrega_"><?php echo $this->nm_new_label['foneentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_foneentrega__line" id="hidden_field_data_foneentrega_" style="<?php echo $sStyleHidden_foneentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foneentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foneentrega_"]) &&  $this->nmgp_cmp_readonly["foneentrega_"] == "on") { 

 ?>
<input type="hidden" name="foneentrega_" value="<?php echo $this->form_encode_input($foneentrega_) . "\">" . $foneentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_foneentrega_" class="sc-ui-readonly-foneentrega_ css_foneentrega__line" style="<?php echo $sStyleReadLab_foneentrega_; ?>"><?php echo $this->form_encode_input($this->foneentrega_); ?></span><span id="id_read_off_foneentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_foneentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_foneentrega__obj" style="" id="id_sc_field_foneentrega_" type=text name="foneentrega_" value="<?php echo $this->form_encode_input($foneentrega_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foneentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foneentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contatoentrega_']))
    {
        $this->nm_new_label['contatoentrega_'] = "Contatoentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contatoentrega_ = $this->contatoentrega_;
   $sStyleHidden_contatoentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['contatoentrega_']) && $this->nmgp_cmp_hidden['contatoentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contatoentrega_']);
       $sStyleHidden_contatoentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contatoentrega_ = 'display: none;';
   $sStyleReadInp_contatoentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contatoentrega_']) && $this->nmgp_cmp_readonly['contatoentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contatoentrega_']);
       $sStyleReadLab_contatoentrega_ = '';
       $sStyleReadInp_contatoentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contatoentrega_']) && $this->nmgp_cmp_hidden['contatoentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatoentrega_" value="<?php echo $this->form_encode_input($contatoentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_contatoentrega__label" id="hidden_field_label_contatoentrega_" style="<?php echo $sStyleHidden_contatoentrega_; ?>"><span id="id_label_contatoentrega_"><?php echo $this->nm_new_label['contatoentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_contatoentrega__line" id="hidden_field_data_contatoentrega_" style="<?php echo $sStyleHidden_contatoentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contatoentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatoentrega_"]) &&  $this->nmgp_cmp_readonly["contatoentrega_"] == "on") { 

 ?>
<input type="hidden" name="contatoentrega_" value="<?php echo $this->form_encode_input($contatoentrega_) . "\">" . $contatoentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatoentrega_" class="sc-ui-readonly-contatoentrega_ css_contatoentrega__line" style="<?php echo $sStyleReadLab_contatoentrega_; ?>"><?php echo $this->form_encode_input($this->contatoentrega_); ?></span><span id="id_read_off_contatoentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_contatoentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_contatoentrega__obj" style="" id="id_sc_field_contatoentrega_" type=text name="contatoentrega_" value="<?php echo $this->form_encode_input($contatoentrega_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatoentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatoentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contatoexpedicao_']))
    {
        $this->nm_new_label['contatoexpedicao_'] = "Contatoexpedicao";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contatoexpedicao_ = $this->contatoexpedicao_;
   $sStyleHidden_contatoexpedicao_ = '';
   if (isset($this->nmgp_cmp_hidden['contatoexpedicao_']) && $this->nmgp_cmp_hidden['contatoexpedicao_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contatoexpedicao_']);
       $sStyleHidden_contatoexpedicao_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contatoexpedicao_ = 'display: none;';
   $sStyleReadInp_contatoexpedicao_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contatoexpedicao_']) && $this->nmgp_cmp_readonly['contatoexpedicao_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contatoexpedicao_']);
       $sStyleReadLab_contatoexpedicao_ = '';
       $sStyleReadInp_contatoexpedicao_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contatoexpedicao_']) && $this->nmgp_cmp_hidden['contatoexpedicao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatoexpedicao_" value="<?php echo $this->form_encode_input($contatoexpedicao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_contatoexpedicao__label" id="hidden_field_label_contatoexpedicao_" style="<?php echo $sStyleHidden_contatoexpedicao_; ?>"><span id="id_label_contatoexpedicao_"><?php echo $this->nm_new_label['contatoexpedicao_']; ?></span></TD>
    <TD class="scFormDataOdd css_contatoexpedicao__line" id="hidden_field_data_contatoexpedicao_" style="<?php echo $sStyleHidden_contatoexpedicao_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contatoexpedicao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatoexpedicao_"]) &&  $this->nmgp_cmp_readonly["contatoexpedicao_"] == "on") { 

 ?>
<input type="hidden" name="contatoexpedicao_" value="<?php echo $this->form_encode_input($contatoexpedicao_) . "\">" . $contatoexpedicao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatoexpedicao_" class="sc-ui-readonly-contatoexpedicao_ css_contatoexpedicao__line" style="<?php echo $sStyleReadLab_contatoexpedicao_; ?>"><?php echo $this->form_encode_input($this->contatoexpedicao_); ?></span><span id="id_read_off_contatoexpedicao_" style="white-space: nowrap;<?php echo $sStyleReadInp_contatoexpedicao_; ?>">
 <input class="sc-js-input scFormObjectOdd css_contatoexpedicao__obj" style="" id="id_sc_field_contatoexpedicao_" type=text name="contatoexpedicao_" value="<?php echo $this->form_encode_input($contatoexpedicao_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatoexpedicao__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatoexpedicao__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['foneexpedicao_']))
    {
        $this->nm_new_label['foneexpedicao_'] = "Foneexpedicao";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $foneexpedicao_ = $this->foneexpedicao_;
   $sStyleHidden_foneexpedicao_ = '';
   if (isset($this->nmgp_cmp_hidden['foneexpedicao_']) && $this->nmgp_cmp_hidden['foneexpedicao_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['foneexpedicao_']);
       $sStyleHidden_foneexpedicao_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_foneexpedicao_ = 'display: none;';
   $sStyleReadInp_foneexpedicao_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['foneexpedicao_']) && $this->nmgp_cmp_readonly['foneexpedicao_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['foneexpedicao_']);
       $sStyleReadLab_foneexpedicao_ = '';
       $sStyleReadInp_foneexpedicao_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['foneexpedicao_']) && $this->nmgp_cmp_hidden['foneexpedicao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="foneexpedicao_" value="<?php echo $this->form_encode_input($foneexpedicao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_foneexpedicao__label" id="hidden_field_label_foneexpedicao_" style="<?php echo $sStyleHidden_foneexpedicao_; ?>"><span id="id_label_foneexpedicao_"><?php echo $this->nm_new_label['foneexpedicao_']; ?></span></TD>
    <TD class="scFormDataOdd css_foneexpedicao__line" id="hidden_field_data_foneexpedicao_" style="<?php echo $sStyleHidden_foneexpedicao_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_foneexpedicao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["foneexpedicao_"]) &&  $this->nmgp_cmp_readonly["foneexpedicao_"] == "on") { 

 ?>
<input type="hidden" name="foneexpedicao_" value="<?php echo $this->form_encode_input($foneexpedicao_) . "\">" . $foneexpedicao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_foneexpedicao_" class="sc-ui-readonly-foneexpedicao_ css_foneexpedicao__line" style="<?php echo $sStyleReadLab_foneexpedicao_; ?>"><?php echo $this->form_encode_input($this->foneexpedicao_); ?></span><span id="id_read_off_foneexpedicao_" style="white-space: nowrap;<?php echo $sStyleReadInp_foneexpedicao_; ?>">
 <input class="sc-js-input scFormObjectOdd css_foneexpedicao__obj" style="" id="id_sc_field_foneexpedicao_" type=text name="foneexpedicao_" value="<?php echo $this->form_encode_input($foneexpedicao_) ?>"
 size=25 maxlength=25 alt="{datatype: 'text', maxLength: 25, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_foneexpedicao__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_foneexpedicao__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['datacadastro_']))
    {
        $this->nm_new_label['datacadastro_'] = "Datacadastro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_datacadastro_ = $this->datacadastro_;
   $this->datacadastro_ .= ' ' . $this->datacadastro__hora;
   $datacadastro_ = $this->datacadastro_;
   $sStyleHidden_datacadastro_ = '';
   if (isset($this->nmgp_cmp_hidden['datacadastro_']) && $this->nmgp_cmp_hidden['datacadastro_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['datacadastro_']);
       $sStyleHidden_datacadastro_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_datacadastro_ = 'display: none;';
   $sStyleReadInp_datacadastro_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['datacadastro_']) && $this->nmgp_cmp_readonly['datacadastro_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['datacadastro_']);
       $sStyleReadLab_datacadastro_ = '';
       $sStyleReadInp_datacadastro_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['datacadastro_']) && $this->nmgp_cmp_hidden['datacadastro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="datacadastro_" value="<?php echo $this->form_encode_input($datacadastro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_datacadastro__label" id="hidden_field_label_datacadastro_" style="<?php echo $sStyleHidden_datacadastro_; ?>"><span id="id_label_datacadastro_"><?php echo $this->nm_new_label['datacadastro_']; ?></span></TD>
    <TD class="scFormDataOdd css_datacadastro__line" id="hidden_field_data_datacadastro_" style="<?php echo $sStyleHidden_datacadastro_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_datacadastro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["datacadastro_"]) &&  $this->nmgp_cmp_readonly["datacadastro_"] == "on") { 

 ?>
<input type="hidden" name="datacadastro_" value="<?php echo $this->form_encode_input($datacadastro_) . "\">" . $datacadastro_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_datacadastro_" class="sc-ui-readonly-datacadastro_ css_datacadastro__line" style="<?php echo $sStyleReadLab_datacadastro_; ?>"><?php echo $this->form_encode_input($datacadastro_); ?></span><span id="id_read_off_datacadastro_" style="white-space: nowrap;<?php echo $sStyleReadInp_datacadastro_; ?>">
 <input class="sc-js-input scFormObjectOdd css_datacadastro__obj" style="" id="id_sc_field_datacadastro_" type=text name="datacadastro_" value="<?php echo $this->form_encode_input($datacadastro_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['datacadastro_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['datacadastro_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['datacadastro_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
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
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_datacadastro__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_datacadastro__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->datacadastro_ = $old_dt_datacadastro_;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['obs_']))
    {
        $this->nm_new_label['obs_'] = "Obs";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obs_ = $this->obs_;
   $sStyleHidden_obs_ = '';
   if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obs_']);
       $sStyleHidden_obs_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obs_ = 'display: none;';
   $sStyleReadInp_obs_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obs_']) && $this->nmgp_cmp_readonly['obs_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obs_']);
       $sStyleReadLab_obs_ = '';
       $sStyleReadInp_obs_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obs_']) && $this->nmgp_cmp_hidden['obs_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="obs_" value="<?php echo $this->form_encode_input($obs_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_obs__label" id="hidden_field_label_obs_" style="<?php echo $sStyleHidden_obs_; ?>"><span id="id_label_obs_"><?php echo $this->nm_new_label['obs_']; ?></span></TD>
    <TD class="scFormDataOdd css_obs__line" id="hidden_field_data_obs_" style="<?php echo $sStyleHidden_obs_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_obs__line" style="vertical-align: top;padding: 0px">
<?php
$obs__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($obs_));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obs_"]) &&  $this->nmgp_cmp_readonly["obs_"] == "on") { 

 ?>
<input type="hidden" name="obs_" value="<?php echo $this->form_encode_input($obs_) . "\">" . $obs__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_obs_" class="sc-ui-readonly-obs_ css_obs__line" style="<?php echo $sStyleReadLab_obs_; ?>"><?php echo $this->form_encode_input($obs__val); ?></span><span id="id_read_off_obs_" style="white-space: nowrap;<?php echo $sStyleReadInp_obs_; ?>">
 <textarea  class="sc-js-input scFormObjectOdd css_obs__obj" style="white-space: pre-wrap;" name="obs_" id="id_sc_field_obs_" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $obs_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obs__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obs__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tipo_']))
    {
        $this->nm_new_label['tipo_'] = "Tipo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_ = $this->tipo_;
   $sStyleHidden_tipo_ = '';
   if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_']);
       $sStyleHidden_tipo_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_ = 'display: none;';
   $sStyleReadInp_tipo_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_']) && $this->nmgp_cmp_readonly['tipo_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_']);
       $sStyleReadLab_tipo_ = '';
       $sStyleReadInp_tipo_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_']) && $this->nmgp_cmp_hidden['tipo_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tipo_" value="<?php echo $this->form_encode_input($tipo_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tipo__label" id="hidden_field_label_tipo_" style="<?php echo $sStyleHidden_tipo_; ?>"><span id="id_label_tipo_"><?php echo $this->nm_new_label['tipo_']; ?></span></TD>
    <TD class="scFormDataOdd css_tipo__line" id="hidden_field_data_tipo_" style="<?php echo $sStyleHidden_tipo_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_"]) &&  $this->nmgp_cmp_readonly["tipo_"] == "on") { 

 ?>
<input type="hidden" name="tipo_" value="<?php echo $this->form_encode_input($tipo_) . "\">" . $tipo_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tipo_" class="sc-ui-readonly-tipo_ css_tipo__line" style="<?php echo $sStyleReadLab_tipo_; ?>"><?php echo $this->form_encode_input($this->tipo_); ?></span><span id="id_read_off_tipo_" style="white-space: nowrap;<?php echo $sStyleReadInp_tipo_; ?>">
 <input class="sc-js-input scFormObjectOdd css_tipo__obj" style="" id="id_sc_field_tipo_" type=text name="tipo_" value="<?php echo $this->form_encode_input($tipo_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consumidor_']))
    {
        $this->nm_new_label['consumidor_'] = "Consumidor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consumidor_ = $this->consumidor_;
   $sStyleHidden_consumidor_ = '';
   if (isset($this->nmgp_cmp_hidden['consumidor_']) && $this->nmgp_cmp_hidden['consumidor_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consumidor_']);
       $sStyleHidden_consumidor_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consumidor_ = 'display: none;';
   $sStyleReadInp_consumidor_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consumidor_']) && $this->nmgp_cmp_readonly['consumidor_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consumidor_']);
       $sStyleReadLab_consumidor_ = '';
       $sStyleReadInp_consumidor_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consumidor_']) && $this->nmgp_cmp_hidden['consumidor_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consumidor_" value="<?php echo $this->form_encode_input($consumidor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_consumidor__label" id="hidden_field_label_consumidor_" style="<?php echo $sStyleHidden_consumidor_; ?>"><span id="id_label_consumidor_"><?php echo $this->nm_new_label['consumidor_']; ?></span></TD>
    <TD class="scFormDataOdd css_consumidor__line" id="hidden_field_data_consumidor_" style="<?php echo $sStyleHidden_consumidor_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_consumidor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consumidor_"]) &&  $this->nmgp_cmp_readonly["consumidor_"] == "on") { 

 ?>
<input type="hidden" name="consumidor_" value="<?php echo $this->form_encode_input($consumidor_) . "\">" . $consumidor_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_consumidor_" class="sc-ui-readonly-consumidor_ css_consumidor__line" style="<?php echo $sStyleReadLab_consumidor_; ?>"><?php echo $this->form_encode_input($this->consumidor_); ?></span><span id="id_read_off_consumidor_" style="white-space: nowrap;<?php echo $sStyleReadInp_consumidor_; ?>">
 <input class="sc-js-input scFormObjectOdd css_consumidor__obj" style="" id="id_sc_field_consumidor_" type=text name="consumidor_" value="<?php echo $this->form_encode_input($consumidor_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_consumidor__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_consumidor__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['licensa_']))
    {
        $this->nm_new_label['licensa_'] = "Licensa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $licensa_ = $this->licensa_;
   $sStyleHidden_licensa_ = '';
   if (isset($this->nmgp_cmp_hidden['licensa_']) && $this->nmgp_cmp_hidden['licensa_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['licensa_']);
       $sStyleHidden_licensa_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_licensa_ = 'display: none;';
   $sStyleReadInp_licensa_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['licensa_']) && $this->nmgp_cmp_readonly['licensa_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['licensa_']);
       $sStyleReadLab_licensa_ = '';
       $sStyleReadInp_licensa_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['licensa_']) && $this->nmgp_cmp_hidden['licensa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="licensa_" value="<?php echo $this->form_encode_input($licensa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_licensa__label" id="hidden_field_label_licensa_" style="<?php echo $sStyleHidden_licensa_; ?>"><span id="id_label_licensa_"><?php echo $this->nm_new_label['licensa_']; ?></span></TD>
    <TD class="scFormDataOdd css_licensa__line" id="hidden_field_data_licensa_" style="<?php echo $sStyleHidden_licensa_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_licensa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["licensa_"]) &&  $this->nmgp_cmp_readonly["licensa_"] == "on") { 

 ?>
<input type="hidden" name="licensa_" value="<?php echo $this->form_encode_input($licensa_) . "\">" . $licensa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_licensa_" class="sc-ui-readonly-licensa_ css_licensa__line" style="<?php echo $sStyleReadLab_licensa_; ?>"><?php echo $this->form_encode_input($this->licensa_); ?></span><span id="id_read_off_licensa_" style="white-space: nowrap;<?php echo $sStyleReadInp_licensa_; ?>">
 <input class="sc-js-input scFormObjectOdd css_licensa__obj" style="" id="id_sc_field_licensa_" type=text name="licensa_" value="<?php echo $this->form_encode_input($licensa_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_licensa__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_licensa__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['venctolicensa_']))
    {
        $this->nm_new_label['venctolicensa_'] = "Venctolicensa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_venctolicensa_ = $this->venctolicensa_;
   $this->venctolicensa_ .= ' ' . $this->venctolicensa__hora;
   $venctolicensa_ = $this->venctolicensa_;
   $sStyleHidden_venctolicensa_ = '';
   if (isset($this->nmgp_cmp_hidden['venctolicensa_']) && $this->nmgp_cmp_hidden['venctolicensa_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['venctolicensa_']);
       $sStyleHidden_venctolicensa_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_venctolicensa_ = 'display: none;';
   $sStyleReadInp_venctolicensa_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['venctolicensa_']) && $this->nmgp_cmp_readonly['venctolicensa_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['venctolicensa_']);
       $sStyleReadLab_venctolicensa_ = '';
       $sStyleReadInp_venctolicensa_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['venctolicensa_']) && $this->nmgp_cmp_hidden['venctolicensa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="venctolicensa_" value="<?php echo $this->form_encode_input($venctolicensa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_venctolicensa__label" id="hidden_field_label_venctolicensa_" style="<?php echo $sStyleHidden_venctolicensa_; ?>"><span id="id_label_venctolicensa_"><?php echo $this->nm_new_label['venctolicensa_']; ?></span></TD>
    <TD class="scFormDataOdd css_venctolicensa__line" id="hidden_field_data_venctolicensa_" style="<?php echo $sStyleHidden_venctolicensa_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_venctolicensa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["venctolicensa_"]) &&  $this->nmgp_cmp_readonly["venctolicensa_"] == "on") { 

 ?>
<input type="hidden" name="venctolicensa_" value="<?php echo $this->form_encode_input($venctolicensa_) . "\">" . $venctolicensa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_venctolicensa_" class="sc-ui-readonly-venctolicensa_ css_venctolicensa__line" style="<?php echo $sStyleReadLab_venctolicensa_; ?>"><?php echo $this->form_encode_input($venctolicensa_); ?></span><span id="id_read_off_venctolicensa_" style="white-space: nowrap;<?php echo $sStyleReadInp_venctolicensa_; ?>">
 <input class="sc-js-input scFormObjectOdd css_venctolicensa__obj" style="" id="id_sc_field_venctolicensa_" type=text name="venctolicensa_" value="<?php echo $this->form_encode_input($venctolicensa_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['venctolicensa_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['venctolicensa_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['venctolicensa_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
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
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_venctolicensa__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_venctolicensa__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->venctolicensa_ = $old_dt_venctolicensa_;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['licensa1_']))
    {
        $this->nm_new_label['licensa1_'] = "Licensa 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $licensa1_ = $this->licensa1_;
   $sStyleHidden_licensa1_ = '';
   if (isset($this->nmgp_cmp_hidden['licensa1_']) && $this->nmgp_cmp_hidden['licensa1_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['licensa1_']);
       $sStyleHidden_licensa1_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_licensa1_ = 'display: none;';
   $sStyleReadInp_licensa1_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['licensa1_']) && $this->nmgp_cmp_readonly['licensa1_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['licensa1_']);
       $sStyleReadLab_licensa1_ = '';
       $sStyleReadInp_licensa1_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['licensa1_']) && $this->nmgp_cmp_hidden['licensa1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="licensa1_" value="<?php echo $this->form_encode_input($licensa1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_licensa1__label" id="hidden_field_label_licensa1_" style="<?php echo $sStyleHidden_licensa1_; ?>"><span id="id_label_licensa1_"><?php echo $this->nm_new_label['licensa1_']; ?></span></TD>
    <TD class="scFormDataOdd css_licensa1__line" id="hidden_field_data_licensa1_" style="<?php echo $sStyleHidden_licensa1_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_licensa1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["licensa1_"]) &&  $this->nmgp_cmp_readonly["licensa1_"] == "on") { 

 ?>
<input type="hidden" name="licensa1_" value="<?php echo $this->form_encode_input($licensa1_) . "\">" . $licensa1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_licensa1_" class="sc-ui-readonly-licensa1_ css_licensa1__line" style="<?php echo $sStyleReadLab_licensa1_; ?>"><?php echo $this->form_encode_input($this->licensa1_); ?></span><span id="id_read_off_licensa1_" style="white-space: nowrap;<?php echo $sStyleReadInp_licensa1_; ?>">
 <input class="sc-js-input scFormObjectOdd css_licensa1__obj" style="" id="id_sc_field_licensa1_" type=text name="licensa1_" value="<?php echo $this->form_encode_input($licensa1_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_licensa1__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_licensa1__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['venctolicensa1_']))
    {
        $this->nm_new_label['venctolicensa1_'] = "Venctolicensa 1";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_venctolicensa1_ = $this->venctolicensa1_;
   $this->venctolicensa1_ .= ' ' . $this->venctolicensa1__hora;
   $venctolicensa1_ = $this->venctolicensa1_;
   $sStyleHidden_venctolicensa1_ = '';
   if (isset($this->nmgp_cmp_hidden['venctolicensa1_']) && $this->nmgp_cmp_hidden['venctolicensa1_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['venctolicensa1_']);
       $sStyleHidden_venctolicensa1_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_venctolicensa1_ = 'display: none;';
   $sStyleReadInp_venctolicensa1_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['venctolicensa1_']) && $this->nmgp_cmp_readonly['venctolicensa1_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['venctolicensa1_']);
       $sStyleReadLab_venctolicensa1_ = '';
       $sStyleReadInp_venctolicensa1_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['venctolicensa1_']) && $this->nmgp_cmp_hidden['venctolicensa1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="venctolicensa1_" value="<?php echo $this->form_encode_input($venctolicensa1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_venctolicensa1__label" id="hidden_field_label_venctolicensa1_" style="<?php echo $sStyleHidden_venctolicensa1_; ?>"><span id="id_label_venctolicensa1_"><?php echo $this->nm_new_label['venctolicensa1_']; ?></span></TD>
    <TD class="scFormDataOdd css_venctolicensa1__line" id="hidden_field_data_venctolicensa1_" style="<?php echo $sStyleHidden_venctolicensa1_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_venctolicensa1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["venctolicensa1_"]) &&  $this->nmgp_cmp_readonly["venctolicensa1_"] == "on") { 

 ?>
<input type="hidden" name="venctolicensa1_" value="<?php echo $this->form_encode_input($venctolicensa1_) . "\">" . $venctolicensa1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_venctolicensa1_" class="sc-ui-readonly-venctolicensa1_ css_venctolicensa1__line" style="<?php echo $sStyleReadLab_venctolicensa1_; ?>"><?php echo $this->form_encode_input($venctolicensa1_); ?></span><span id="id_read_off_venctolicensa1_" style="white-space: nowrap;<?php echo $sStyleReadInp_venctolicensa1_; ?>">
 <input class="sc-js-input scFormObjectOdd css_venctolicensa1__obj" style="" id="id_sc_field_venctolicensa1_" type=text name="venctolicensa1_" value="<?php echo $this->form_encode_input($venctolicensa1_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['venctolicensa1_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['venctolicensa1_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['venctolicensa1_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
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
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_venctolicensa1__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_venctolicensa1__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->venctolicensa1_ = $old_dt_venctolicensa1_;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qtdeliberada_']))
    {
        $this->nm_new_label['qtdeliberada_'] = "Qtdeliberada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qtdeliberada_ = $this->qtdeliberada_;
   $sStyleHidden_qtdeliberada_ = '';
   if (isset($this->nmgp_cmp_hidden['qtdeliberada_']) && $this->nmgp_cmp_hidden['qtdeliberada_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qtdeliberada_']);
       $sStyleHidden_qtdeliberada_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qtdeliberada_ = 'display: none;';
   $sStyleReadInp_qtdeliberada_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qtdeliberada_']) && $this->nmgp_cmp_readonly['qtdeliberada_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qtdeliberada_']);
       $sStyleReadLab_qtdeliberada_ = '';
       $sStyleReadInp_qtdeliberada_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qtdeliberada_']) && $this->nmgp_cmp_hidden['qtdeliberada_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qtdeliberada_" value="<?php echo $this->form_encode_input($qtdeliberada_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_qtdeliberada__label" id="hidden_field_label_qtdeliberada_" style="<?php echo $sStyleHidden_qtdeliberada_; ?>"><span id="id_label_qtdeliberada_"><?php echo $this->nm_new_label['qtdeliberada_']; ?></span></TD>
    <TD class="scFormDataOdd css_qtdeliberada__line" id="hidden_field_data_qtdeliberada_" style="<?php echo $sStyleHidden_qtdeliberada_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qtdeliberada__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qtdeliberada_"]) &&  $this->nmgp_cmp_readonly["qtdeliberada_"] == "on") { 

 ?>
<input type="hidden" name="qtdeliberada_" value="<?php echo $this->form_encode_input($qtdeliberada_) . "\">" . $qtdeliberada_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_qtdeliberada_" class="sc-ui-readonly-qtdeliberada_ css_qtdeliberada__line" style="<?php echo $sStyleReadLab_qtdeliberada_; ?>"><?php echo $this->form_encode_input($this->qtdeliberada_); ?></span><span id="id_read_off_qtdeliberada_" style="white-space: nowrap;<?php echo $sStyleReadInp_qtdeliberada_; ?>">
 <input class="sc-js-input scFormObjectOdd css_qtdeliberada__obj" style="" id="id_sc_field_qtdeliberada_" type=text name="qtdeliberada_" value="<?php echo $this->form_encode_input($qtdeliberada_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['qtdeliberada_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['qtdeliberada_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['qtdeliberada_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['qtdeliberada_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qtdeliberada__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qtdeliberada__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['licensa2_']))
    {
        $this->nm_new_label['licensa2_'] = "Licensa 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $licensa2_ = $this->licensa2_;
   $sStyleHidden_licensa2_ = '';
   if (isset($this->nmgp_cmp_hidden['licensa2_']) && $this->nmgp_cmp_hidden['licensa2_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['licensa2_']);
       $sStyleHidden_licensa2_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_licensa2_ = 'display: none;';
   $sStyleReadInp_licensa2_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['licensa2_']) && $this->nmgp_cmp_readonly['licensa2_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['licensa2_']);
       $sStyleReadLab_licensa2_ = '';
       $sStyleReadInp_licensa2_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['licensa2_']) && $this->nmgp_cmp_hidden['licensa2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="licensa2_" value="<?php echo $this->form_encode_input($licensa2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_licensa2__label" id="hidden_field_label_licensa2_" style="<?php echo $sStyleHidden_licensa2_; ?>"><span id="id_label_licensa2_"><?php echo $this->nm_new_label['licensa2_']; ?></span></TD>
    <TD class="scFormDataOdd css_licensa2__line" id="hidden_field_data_licensa2_" style="<?php echo $sStyleHidden_licensa2_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_licensa2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["licensa2_"]) &&  $this->nmgp_cmp_readonly["licensa2_"] == "on") { 

 ?>
<input type="hidden" name="licensa2_" value="<?php echo $this->form_encode_input($licensa2_) . "\">" . $licensa2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_licensa2_" class="sc-ui-readonly-licensa2_ css_licensa2__line" style="<?php echo $sStyleReadLab_licensa2_; ?>"><?php echo $this->form_encode_input($this->licensa2_); ?></span><span id="id_read_off_licensa2_" style="white-space: nowrap;<?php echo $sStyleReadInp_licensa2_; ?>">
 <input class="sc-js-input scFormObjectOdd css_licensa2__obj" style="" id="id_sc_field_licensa2_" type=text name="licensa2_" value="<?php echo $this->form_encode_input($licensa2_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_licensa2__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_licensa2__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['venctolicensa2_']))
    {
        $this->nm_new_label['venctolicensa2_'] = "Venctolicensa 2";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_venctolicensa2_ = $this->venctolicensa2_;
   $this->venctolicensa2_ .= ' ' . $this->venctolicensa2__hora;
   $venctolicensa2_ = $this->venctolicensa2_;
   $sStyleHidden_venctolicensa2_ = '';
   if (isset($this->nmgp_cmp_hidden['venctolicensa2_']) && $this->nmgp_cmp_hidden['venctolicensa2_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['venctolicensa2_']);
       $sStyleHidden_venctolicensa2_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_venctolicensa2_ = 'display: none;';
   $sStyleReadInp_venctolicensa2_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['venctolicensa2_']) && $this->nmgp_cmp_readonly['venctolicensa2_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['venctolicensa2_']);
       $sStyleReadLab_venctolicensa2_ = '';
       $sStyleReadInp_venctolicensa2_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['venctolicensa2_']) && $this->nmgp_cmp_hidden['venctolicensa2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="venctolicensa2_" value="<?php echo $this->form_encode_input($venctolicensa2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_venctolicensa2__label" id="hidden_field_label_venctolicensa2_" style="<?php echo $sStyleHidden_venctolicensa2_; ?>"><span id="id_label_venctolicensa2_"><?php echo $this->nm_new_label['venctolicensa2_']; ?></span></TD>
    <TD class="scFormDataOdd css_venctolicensa2__line" id="hidden_field_data_venctolicensa2_" style="<?php echo $sStyleHidden_venctolicensa2_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_venctolicensa2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["venctolicensa2_"]) &&  $this->nmgp_cmp_readonly["venctolicensa2_"] == "on") { 

 ?>
<input type="hidden" name="venctolicensa2_" value="<?php echo $this->form_encode_input($venctolicensa2_) . "\">" . $venctolicensa2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_venctolicensa2_" class="sc-ui-readonly-venctolicensa2_ css_venctolicensa2__line" style="<?php echo $sStyleReadLab_venctolicensa2_; ?>"><?php echo $this->form_encode_input($venctolicensa2_); ?></span><span id="id_read_off_venctolicensa2_" style="white-space: nowrap;<?php echo $sStyleReadInp_venctolicensa2_; ?>">
 <input class="sc-js-input scFormObjectOdd css_venctolicensa2__obj" style="" id="id_sc_field_venctolicensa2_" type=text name="venctolicensa2_" value="<?php echo $this->form_encode_input($venctolicensa2_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['venctolicensa2_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['venctolicensa2_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['venctolicensa2_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
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
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_venctolicensa2__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_venctolicensa2__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->venctolicensa2_ = $old_dt_venctolicensa2_;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['icms_']))
    {
        $this->nm_new_label['icms_'] = "Icms";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $icms_ = $this->icms_;
   $sStyleHidden_icms_ = '';
   if (isset($this->nmgp_cmp_hidden['icms_']) && $this->nmgp_cmp_hidden['icms_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['icms_']);
       $sStyleHidden_icms_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_icms_ = 'display: none;';
   $sStyleReadInp_icms_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['icms_']) && $this->nmgp_cmp_readonly['icms_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['icms_']);
       $sStyleReadLab_icms_ = '';
       $sStyleReadInp_icms_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['icms_']) && $this->nmgp_cmp_hidden['icms_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="icms_" value="<?php echo $this->form_encode_input($icms_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_icms__label" id="hidden_field_label_icms_" style="<?php echo $sStyleHidden_icms_; ?>"><span id="id_label_icms_"><?php echo $this->nm_new_label['icms_']; ?></span></TD>
    <TD class="scFormDataOdd css_icms__line" id="hidden_field_data_icms_" style="<?php echo $sStyleHidden_icms_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_icms__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["icms_"]) &&  $this->nmgp_cmp_readonly["icms_"] == "on") { 

 ?>
<input type="hidden" name="icms_" value="<?php echo $this->form_encode_input($icms_) . "\">" . $icms_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_icms_" class="sc-ui-readonly-icms_ css_icms__line" style="<?php echo $sStyleReadLab_icms_; ?>"><?php echo $this->form_encode_input($this->icms_); ?></span><span id="id_read_off_icms_" style="white-space: nowrap;<?php echo $sStyleReadInp_icms_; ?>">
 <input class="sc-js-input scFormObjectOdd css_icms__obj" style="" id="id_sc_field_icms_" type=text name="icms_" value="<?php echo $this->form_encode_input($icms_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['icms_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['icms_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['icms_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['icms_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_icms__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_icms__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['suframa_']))
    {
        $this->nm_new_label['suframa_'] = "Suframa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $suframa_ = $this->suframa_;
   $sStyleHidden_suframa_ = '';
   if (isset($this->nmgp_cmp_hidden['suframa_']) && $this->nmgp_cmp_hidden['suframa_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['suframa_']);
       $sStyleHidden_suframa_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_suframa_ = 'display: none;';
   $sStyleReadInp_suframa_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['suframa_']) && $this->nmgp_cmp_readonly['suframa_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['suframa_']);
       $sStyleReadLab_suframa_ = '';
       $sStyleReadInp_suframa_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['suframa_']) && $this->nmgp_cmp_hidden['suframa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="suframa_" value="<?php echo $this->form_encode_input($suframa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_suframa__label" id="hidden_field_label_suframa_" style="<?php echo $sStyleHidden_suframa_; ?>"><span id="id_label_suframa_"><?php echo $this->nm_new_label['suframa_']; ?></span></TD>
    <TD class="scFormDataOdd css_suframa__line" id="hidden_field_data_suframa_" style="<?php echo $sStyleHidden_suframa_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_suframa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["suframa_"]) &&  $this->nmgp_cmp_readonly["suframa_"] == "on") { 

 ?>
<input type="hidden" name="suframa_" value="<?php echo $this->form_encode_input($suframa_) . "\">" . $suframa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_suframa_" class="sc-ui-readonly-suframa_ css_suframa__line" style="<?php echo $sStyleReadLab_suframa_; ?>"><?php echo $this->form_encode_input($this->suframa_); ?></span><span id="id_read_off_suframa_" style="white-space: nowrap;<?php echo $sStyleReadInp_suframa_; ?>">
 <input class="sc-js-input scFormObjectOdd css_suframa__obj" style="" id="id_sc_field_suframa_" type=text name="suframa_" value="<?php echo $this->form_encode_input($suframa_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_suframa__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_suframa__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['limitecredito_']))
    {
        $this->nm_new_label['limitecredito_'] = "Limitecredito";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $limitecredito_ = $this->limitecredito_;
   $sStyleHidden_limitecredito_ = '';
   if (isset($this->nmgp_cmp_hidden['limitecredito_']) && $this->nmgp_cmp_hidden['limitecredito_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['limitecredito_']);
       $sStyleHidden_limitecredito_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_limitecredito_ = 'display: none;';
   $sStyleReadInp_limitecredito_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['limitecredito_']) && $this->nmgp_cmp_readonly['limitecredito_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['limitecredito_']);
       $sStyleReadLab_limitecredito_ = '';
       $sStyleReadInp_limitecredito_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['limitecredito_']) && $this->nmgp_cmp_hidden['limitecredito_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="limitecredito_" value="<?php echo $this->form_encode_input($limitecredito_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_limitecredito__label" id="hidden_field_label_limitecredito_" style="<?php echo $sStyleHidden_limitecredito_; ?>"><span id="id_label_limitecredito_"><?php echo $this->nm_new_label['limitecredito_']; ?></span></TD>
    <TD class="scFormDataOdd css_limitecredito__line" id="hidden_field_data_limitecredito_" style="<?php echo $sStyleHidden_limitecredito_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_limitecredito__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["limitecredito_"]) &&  $this->nmgp_cmp_readonly["limitecredito_"] == "on") { 

 ?>
<input type="hidden" name="limitecredito_" value="<?php echo $this->form_encode_input($limitecredito_) . "\">" . $limitecredito_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_limitecredito_" class="sc-ui-readonly-limitecredito_ css_limitecredito__line" style="<?php echo $sStyleReadLab_limitecredito_; ?>"><?php echo $this->form_encode_input($this->limitecredito_); ?></span><span id="id_read_off_limitecredito_" style="white-space: nowrap;<?php echo $sStyleReadInp_limitecredito_; ?>">
 <input class="sc-js-input scFormObjectOdd css_limitecredito__obj" style="" id="id_sc_field_limitecredito_" type=text name="limitecredito_" value="<?php echo $this->form_encode_input($limitecredito_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['limitecredito_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['limitecredito_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['limitecredito_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['limitecredito_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_limitecredito__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_limitecredito__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vendedor_']))
    {
        $this->nm_new_label['vendedor_'] = "Vendedor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vendedor_ = $this->vendedor_;
   $sStyleHidden_vendedor_ = '';
   if (isset($this->nmgp_cmp_hidden['vendedor_']) && $this->nmgp_cmp_hidden['vendedor_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vendedor_']);
       $sStyleHidden_vendedor_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vendedor_ = 'display: none;';
   $sStyleReadInp_vendedor_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['vendedor_']) && $this->nmgp_cmp_readonly['vendedor_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vendedor_']);
       $sStyleReadLab_vendedor_ = '';
       $sStyleReadInp_vendedor_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vendedor_']) && $this->nmgp_cmp_hidden['vendedor_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vendedor_" value="<?php echo $this->form_encode_input($vendedor_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vendedor__label" id="hidden_field_label_vendedor_" style="<?php echo $sStyleHidden_vendedor_; ?>"><span id="id_label_vendedor_"><?php echo $this->nm_new_label['vendedor_']; ?></span></TD>
    <TD class="scFormDataOdd css_vendedor__line" id="hidden_field_data_vendedor_" style="<?php echo $sStyleHidden_vendedor_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vendedor__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vendedor_"]) &&  $this->nmgp_cmp_readonly["vendedor_"] == "on") { 

 ?>
<input type="hidden" name="vendedor_" value="<?php echo $this->form_encode_input($vendedor_) . "\">" . $vendedor_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_vendedor_" class="sc-ui-readonly-vendedor_ css_vendedor__line" style="<?php echo $sStyleReadLab_vendedor_; ?>"><?php echo $this->form_encode_input($this->vendedor_); ?></span><span id="id_read_off_vendedor_" style="white-space: nowrap;<?php echo $sStyleReadInp_vendedor_; ?>">
 <input class="sc-js-input scFormObjectOdd css_vendedor__obj" style="" id="id_sc_field_vendedor_" type=text name="vendedor_" value="<?php echo $this->form_encode_input($vendedor_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vendedor__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vendedor__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['restricao_']))
    {
        $this->nm_new_label['restricao_'] = "Restricao";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $restricao_ = $this->restricao_;
   $sStyleHidden_restricao_ = '';
   if (isset($this->nmgp_cmp_hidden['restricao_']) && $this->nmgp_cmp_hidden['restricao_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['restricao_']);
       $sStyleHidden_restricao_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_restricao_ = 'display: none;';
   $sStyleReadInp_restricao_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['restricao_']) && $this->nmgp_cmp_readonly['restricao_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['restricao_']);
       $sStyleReadLab_restricao_ = '';
       $sStyleReadInp_restricao_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['restricao_']) && $this->nmgp_cmp_hidden['restricao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="restricao_" value="<?php echo $this->form_encode_input($restricao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_restricao__label" id="hidden_field_label_restricao_" style="<?php echo $sStyleHidden_restricao_; ?>"><span id="id_label_restricao_"><?php echo $this->nm_new_label['restricao_']; ?></span></TD>
    <TD class="scFormDataOdd css_restricao__line" id="hidden_field_data_restricao_" style="<?php echo $sStyleHidden_restricao_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_restricao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["restricao_"]) &&  $this->nmgp_cmp_readonly["restricao_"] == "on") { 

 ?>
<input type="hidden" name="restricao_" value="<?php echo $this->form_encode_input($restricao_) . "\">" . $restricao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_restricao_" class="sc-ui-readonly-restricao_ css_restricao__line" style="<?php echo $sStyleReadLab_restricao_; ?>"><?php echo $this->form_encode_input($this->restricao_); ?></span><span id="id_read_off_restricao_" style="white-space: nowrap;<?php echo $sStyleReadInp_restricao_; ?>">
 <input class="sc-js-input scFormObjectOdd css_restricao__obj" style="" id="id_sc_field_restricao_" type=text name="restricao_" value="<?php echo $this->form_encode_input($restricao_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_restricao__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_restricao__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['comissao_']))
    {
        $this->nm_new_label['comissao_'] = "Comissao";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $comissao_ = $this->comissao_;
   $sStyleHidden_comissao_ = '';
   if (isset($this->nmgp_cmp_hidden['comissao_']) && $this->nmgp_cmp_hidden['comissao_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['comissao_']);
       $sStyleHidden_comissao_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_comissao_ = 'display: none;';
   $sStyleReadInp_comissao_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['comissao_']) && $this->nmgp_cmp_readonly['comissao_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['comissao_']);
       $sStyleReadLab_comissao_ = '';
       $sStyleReadInp_comissao_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['comissao_']) && $this->nmgp_cmp_hidden['comissao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="comissao_" value="<?php echo $this->form_encode_input($comissao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_comissao__label" id="hidden_field_label_comissao_" style="<?php echo $sStyleHidden_comissao_; ?>"><span id="id_label_comissao_"><?php echo $this->nm_new_label['comissao_']; ?></span></TD>
    <TD class="scFormDataOdd css_comissao__line" id="hidden_field_data_comissao_" style="<?php echo $sStyleHidden_comissao_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_comissao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["comissao_"]) &&  $this->nmgp_cmp_readonly["comissao_"] == "on") { 

 ?>
<input type="hidden" name="comissao_" value="<?php echo $this->form_encode_input($comissao_) . "\">" . $comissao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_comissao_" class="sc-ui-readonly-comissao_ css_comissao__line" style="<?php echo $sStyleReadLab_comissao_; ?>"><?php echo $this->form_encode_input($this->comissao_); ?></span><span id="id_read_off_comissao_" style="white-space: nowrap;<?php echo $sStyleReadInp_comissao_; ?>">
 <input class="sc-js-input scFormObjectOdd css_comissao__obj" style="" id="id_sc_field_comissao_" type=text name="comissao_" value="<?php echo $this->form_encode_input($comissao_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['comissao_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['comissao_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['comissao_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['comissao_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_comissao__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_comissao__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['transportadora_']))
    {
        $this->nm_new_label['transportadora_'] = "Transportadora";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $transportadora_ = $this->transportadora_;
   $sStyleHidden_transportadora_ = '';
   if (isset($this->nmgp_cmp_hidden['transportadora_']) && $this->nmgp_cmp_hidden['transportadora_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['transportadora_']);
       $sStyleHidden_transportadora_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_transportadora_ = 'display: none;';
   $sStyleReadInp_transportadora_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['transportadora_']) && $this->nmgp_cmp_readonly['transportadora_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['transportadora_']);
       $sStyleReadLab_transportadora_ = '';
       $sStyleReadInp_transportadora_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['transportadora_']) && $this->nmgp_cmp_hidden['transportadora_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="transportadora_" value="<?php echo $this->form_encode_input($transportadora_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_transportadora__label" id="hidden_field_label_transportadora_" style="<?php echo $sStyleHidden_transportadora_; ?>"><span id="id_label_transportadora_"><?php echo $this->nm_new_label['transportadora_']; ?></span></TD>
    <TD class="scFormDataOdd css_transportadora__line" id="hidden_field_data_transportadora_" style="<?php echo $sStyleHidden_transportadora_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_transportadora__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["transportadora_"]) &&  $this->nmgp_cmp_readonly["transportadora_"] == "on") { 

 ?>
<input type="hidden" name="transportadora_" value="<?php echo $this->form_encode_input($transportadora_) . "\">" . $transportadora_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_transportadora_" class="sc-ui-readonly-transportadora_ css_transportadora__line" style="<?php echo $sStyleReadLab_transportadora_; ?>"><?php echo $this->form_encode_input($this->transportadora_); ?></span><span id="id_read_off_transportadora_" style="white-space: nowrap;<?php echo $sStyleReadInp_transportadora_; ?>">
 <input class="sc-js-input scFormObjectOdd css_transportadora__obj" style="" id="id_sc_field_transportadora_" type=text name="transportadora_" value="<?php echo $this->form_encode_input($transportadora_) ?>"
 size=4 maxlength=4 alt="{datatype: 'text', maxLength: 4, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_transportadora__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_transportadora__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['coleta_']))
    {
        $this->nm_new_label['coleta_'] = "Coleta";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $coleta_ = $this->coleta_;
   $sStyleHidden_coleta_ = '';
   if (isset($this->nmgp_cmp_hidden['coleta_']) && $this->nmgp_cmp_hidden['coleta_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['coleta_']);
       $sStyleHidden_coleta_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_coleta_ = 'display: none;';
   $sStyleReadInp_coleta_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['coleta_']) && $this->nmgp_cmp_readonly['coleta_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['coleta_']);
       $sStyleReadLab_coleta_ = '';
       $sStyleReadInp_coleta_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['coleta_']) && $this->nmgp_cmp_hidden['coleta_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="coleta_" value="<?php echo $this->form_encode_input($coleta_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_coleta__label" id="hidden_field_label_coleta_" style="<?php echo $sStyleHidden_coleta_; ?>"><span id="id_label_coleta_"><?php echo $this->nm_new_label['coleta_']; ?></span></TD>
    <TD class="scFormDataOdd css_coleta__line" id="hidden_field_data_coleta_" style="<?php echo $sStyleHidden_coleta_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_coleta__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["coleta_"]) &&  $this->nmgp_cmp_readonly["coleta_"] == "on") { 

 ?>
<input type="hidden" name="coleta_" value="<?php echo $this->form_encode_input($coleta_) . "\">" . $coleta_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_coleta_" class="sc-ui-readonly-coleta_ css_coleta__line" style="<?php echo $sStyleReadLab_coleta_; ?>"><?php echo $this->form_encode_input($this->coleta_); ?></span><span id="id_read_off_coleta_" style="white-space: nowrap;<?php echo $sStyleReadInp_coleta_; ?>">
 <input class="sc-js-input scFormObjectOdd css_coleta__obj" style="" id="id_sc_field_coleta_" type=text name="coleta_" value="<?php echo $this->form_encode_input($coleta_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_coleta__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_coleta__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['segmento_']))
    {
        $this->nm_new_label['segmento_'] = "Segmento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $segmento_ = $this->segmento_;
   $sStyleHidden_segmento_ = '';
   if (isset($this->nmgp_cmp_hidden['segmento_']) && $this->nmgp_cmp_hidden['segmento_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['segmento_']);
       $sStyleHidden_segmento_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_segmento_ = 'display: none;';
   $sStyleReadInp_segmento_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['segmento_']) && $this->nmgp_cmp_readonly['segmento_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['segmento_']);
       $sStyleReadLab_segmento_ = '';
       $sStyleReadInp_segmento_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['segmento_']) && $this->nmgp_cmp_hidden['segmento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="segmento_" value="<?php echo $this->form_encode_input($segmento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_segmento__label" id="hidden_field_label_segmento_" style="<?php echo $sStyleHidden_segmento_; ?>"><span id="id_label_segmento_"><?php echo $this->nm_new_label['segmento_']; ?></span></TD>
    <TD class="scFormDataOdd css_segmento__line" id="hidden_field_data_segmento_" style="<?php echo $sStyleHidden_segmento_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_segmento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["segmento_"]) &&  $this->nmgp_cmp_readonly["segmento_"] == "on") { 

 ?>
<input type="hidden" name="segmento_" value="<?php echo $this->form_encode_input($segmento_) . "\">" . $segmento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_segmento_" class="sc-ui-readonly-segmento_ css_segmento__line" style="<?php echo $sStyleReadLab_segmento_; ?>"><?php echo $this->form_encode_input($this->segmento_); ?></span><span id="id_read_off_segmento_" style="white-space: nowrap;<?php echo $sStyleReadInp_segmento_; ?>">
 <input class="sc-js-input scFormObjectOdd css_segmento__obj" style="" id="id_sc_field_segmento_" type=text name="segmento_" value="<?php echo $this->form_encode_input($segmento_) ?>"
 size=50 alt="{datatype: 'decimal', maxLength: 53, precision: 15, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['segmento_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['segmento_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['segmento_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['segmento_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_segmento__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_segmento__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['dataalteracao_']))
    {
        $this->nm_new_label['dataalteracao_'] = "Dataalteracao";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_dataalteracao_ = $this->dataalteracao_;
   $this->dataalteracao_ .= ' ' . $this->dataalteracao__hora;
   $dataalteracao_ = $this->dataalteracao_;
   $sStyleHidden_dataalteracao_ = '';
   if (isset($this->nmgp_cmp_hidden['dataalteracao_']) && $this->nmgp_cmp_hidden['dataalteracao_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['dataalteracao_']);
       $sStyleHidden_dataalteracao_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_dataalteracao_ = 'display: none;';
   $sStyleReadInp_dataalteracao_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['dataalteracao_']) && $this->nmgp_cmp_readonly['dataalteracao_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['dataalteracao_']);
       $sStyleReadLab_dataalteracao_ = '';
       $sStyleReadInp_dataalteracao_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['dataalteracao_']) && $this->nmgp_cmp_hidden['dataalteracao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="dataalteracao_" value="<?php echo $this->form_encode_input($dataalteracao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_dataalteracao__label" id="hidden_field_label_dataalteracao_" style="<?php echo $sStyleHidden_dataalteracao_; ?>"><span id="id_label_dataalteracao_"><?php echo $this->nm_new_label['dataalteracao_']; ?></span></TD>
    <TD class="scFormDataOdd css_dataalteracao__line" id="hidden_field_data_dataalteracao_" style="<?php echo $sStyleHidden_dataalteracao_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_dataalteracao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dataalteracao_"]) &&  $this->nmgp_cmp_readonly["dataalteracao_"] == "on") { 

 ?>
<input type="hidden" name="dataalteracao_" value="<?php echo $this->form_encode_input($dataalteracao_) . "\">" . $dataalteracao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_dataalteracao_" class="sc-ui-readonly-dataalteracao_ css_dataalteracao__line" style="<?php echo $sStyleReadLab_dataalteracao_; ?>"><?php echo $this->form_encode_input($dataalteracao_); ?></span><span id="id_read_off_dataalteracao_" style="white-space: nowrap;<?php echo $sStyleReadInp_dataalteracao_; ?>">
 <input class="sc-js-input scFormObjectOdd css_dataalteracao__obj" style="" id="id_sc_field_dataalteracao_" type=text name="dataalteracao_" value="<?php echo $this->form_encode_input($dataalteracao_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['dataalteracao_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['dataalteracao_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['dataalteracao_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
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
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dataalteracao__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dataalteracao__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->dataalteracao_ = $old_dt_dataalteracao_;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usuario_']))
    {
        $this->nm_new_label['usuario_'] = "Usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario_ = $this->usuario_;
   $sStyleHidden_usuario_ = '';
   if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario_']);
       $sStyleHidden_usuario_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario_ = 'display: none;';
   $sStyleReadInp_usuario_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuario_']) && $this->nmgp_cmp_readonly['usuario_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario_']);
       $sStyleReadLab_usuario_ = '';
       $sStyleReadInp_usuario_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario_" value="<?php echo $this->form_encode_input($usuario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usuario__label" id="hidden_field_label_usuario_" style="<?php echo $sStyleHidden_usuario_; ?>"><span id="id_label_usuario_"><?php echo $this->nm_new_label['usuario_']; ?></span></TD>
    <TD class="scFormDataOdd css_usuario__line" id="hidden_field_data_usuario_" style="<?php echo $sStyleHidden_usuario_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario_"]) &&  $this->nmgp_cmp_readonly["usuario_"] == "on") { 

 ?>
<input type="hidden" name="usuario_" value="<?php echo $this->form_encode_input($usuario_) . "\">" . $usuario_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario_" class="sc-ui-readonly-usuario_ css_usuario__line" style="<?php echo $sStyleReadLab_usuario_; ?>"><?php echo $this->form_encode_input($this->usuario_); ?></span><span id="id_read_off_usuario_" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario_; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuario__obj" style="" id="id_sc_field_usuario_" type=text name="usuario_" value="<?php echo $this->form_encode_input($usuario_) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['requisitos_']))
    {
        $this->nm_new_label['requisitos_'] = "REQUISITOS";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $requisitos_ = $this->requisitos_;
   $sStyleHidden_requisitos_ = '';
   if (isset($this->nmgp_cmp_hidden['requisitos_']) && $this->nmgp_cmp_hidden['requisitos_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['requisitos_']);
       $sStyleHidden_requisitos_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_requisitos_ = 'display: none;';
   $sStyleReadInp_requisitos_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['requisitos_']) && $this->nmgp_cmp_readonly['requisitos_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['requisitos_']);
       $sStyleReadLab_requisitos_ = '';
       $sStyleReadInp_requisitos_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['requisitos_']) && $this->nmgp_cmp_hidden['requisitos_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="requisitos_" value="<?php echo $this->form_encode_input($requisitos_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_requisitos__label" id="hidden_field_label_requisitos_" style="<?php echo $sStyleHidden_requisitos_; ?>"><span id="id_label_requisitos_"><?php echo $this->nm_new_label['requisitos_']; ?></span></TD>
    <TD class="scFormDataOdd css_requisitos__line" id="hidden_field_data_requisitos_" style="<?php echo $sStyleHidden_requisitos_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_requisitos__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["requisitos_"]) &&  $this->nmgp_cmp_readonly["requisitos_"] == "on") { 

 ?>
<input type="hidden" name="requisitos_" value="<?php echo $this->form_encode_input($requisitos_) . "\">" . $requisitos_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_requisitos_" class="sc-ui-readonly-requisitos_ css_requisitos__line" style="<?php echo $sStyleReadLab_requisitos_; ?>"><?php echo $this->form_encode_input($this->requisitos_); ?></span><span id="id_read_off_requisitos_" style="white-space: nowrap;<?php echo $sStyleReadInp_requisitos_; ?>">
 <input class="sc-js-input scFormObjectOdd css_requisitos__obj" style="" id="id_sc_field_requisitos_" type=text name="requisitos_" value="<?php echo $this->form_encode_input($requisitos_) ?>"
 size=50 maxlength=240 alt="{datatype: 'text', maxLength: 240, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_requisitos__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_requisitos__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['banco_']))
    {
        $this->nm_new_label['banco_'] = "Banco";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $banco_ = $this->banco_;
   $sStyleHidden_banco_ = '';
   if (isset($this->nmgp_cmp_hidden['banco_']) && $this->nmgp_cmp_hidden['banco_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['banco_']);
       $sStyleHidden_banco_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_banco_ = 'display: none;';
   $sStyleReadInp_banco_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['banco_']) && $this->nmgp_cmp_readonly['banco_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['banco_']);
       $sStyleReadLab_banco_ = '';
       $sStyleReadInp_banco_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['banco_']) && $this->nmgp_cmp_hidden['banco_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="banco_" value="<?php echo $this->form_encode_input($banco_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_banco__label" id="hidden_field_label_banco_" style="<?php echo $sStyleHidden_banco_; ?>"><span id="id_label_banco_"><?php echo $this->nm_new_label['banco_']; ?></span></TD>
    <TD class="scFormDataOdd css_banco__line" id="hidden_field_data_banco_" style="<?php echo $sStyleHidden_banco_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_banco__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banco_"]) &&  $this->nmgp_cmp_readonly["banco_"] == "on") { 

 ?>
<input type="hidden" name="banco_" value="<?php echo $this->form_encode_input($banco_) . "\">" . $banco_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_banco_" class="sc-ui-readonly-banco_ css_banco__line" style="<?php echo $sStyleReadLab_banco_; ?>"><?php echo $this->form_encode_input($this->banco_); ?></span><span id="id_read_off_banco_" style="white-space: nowrap;<?php echo $sStyleReadInp_banco_; ?>">
 <input class="sc-js-input scFormObjectOdd css_banco__obj" style="" id="id_sc_field_banco_" type=text name="banco_" value="<?php echo $this->form_encode_input($banco_) ?>"
 size=3 maxlength=3 alt="{datatype: 'text', maxLength: 3, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banco__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banco__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emailcobranca_']))
    {
        $this->nm_new_label['emailcobranca_'] = "Emailcobranca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emailcobranca_ = $this->emailcobranca_;
   $sStyleHidden_emailcobranca_ = '';
   if (isset($this->nmgp_cmp_hidden['emailcobranca_']) && $this->nmgp_cmp_hidden['emailcobranca_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emailcobranca_']);
       $sStyleHidden_emailcobranca_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emailcobranca_ = 'display: none;';
   $sStyleReadInp_emailcobranca_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emailcobranca_']) && $this->nmgp_cmp_readonly['emailcobranca_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emailcobranca_']);
       $sStyleReadLab_emailcobranca_ = '';
       $sStyleReadInp_emailcobranca_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emailcobranca_']) && $this->nmgp_cmp_hidden['emailcobranca_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emailcobranca_" value="<?php echo $this->form_encode_input($emailcobranca_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_emailcobranca__label" id="hidden_field_label_emailcobranca_" style="<?php echo $sStyleHidden_emailcobranca_; ?>"><span id="id_label_emailcobranca_"><?php echo $this->nm_new_label['emailcobranca_']; ?></span></TD>
    <TD class="scFormDataOdd css_emailcobranca__line" id="hidden_field_data_emailcobranca_" style="<?php echo $sStyleHidden_emailcobranca_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emailcobranca__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emailcobranca_"]) &&  $this->nmgp_cmp_readonly["emailcobranca_"] == "on") { 

 ?>
<input type="hidden" name="emailcobranca_" value="<?php echo $this->form_encode_input($emailcobranca_) . "\">" . $emailcobranca_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_emailcobranca_" class="sc-ui-readonly-emailcobranca_ css_emailcobranca__line" style="<?php echo $sStyleReadLab_emailcobranca_; ?>"><?php echo $this->form_encode_input($this->emailcobranca_); ?></span><span id="id_read_off_emailcobranca_" style="white-space: nowrap;<?php echo $sStyleReadInp_emailcobranca_; ?>">
 <input class="sc-js-input scFormObjectOdd css_emailcobranca__obj" style="" id="id_sc_field_emailcobranca_" type=text name="emailcobranca_" value="<?php echo $this->form_encode_input($emailcobranca_) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emailcobranca__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emailcobranca__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emailtecnico_']))
    {
        $this->nm_new_label['emailtecnico_'] = "Emailtecnico";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emailtecnico_ = $this->emailtecnico_;
   $sStyleHidden_emailtecnico_ = '';
   if (isset($this->nmgp_cmp_hidden['emailtecnico_']) && $this->nmgp_cmp_hidden['emailtecnico_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emailtecnico_']);
       $sStyleHidden_emailtecnico_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emailtecnico_ = 'display: none;';
   $sStyleReadInp_emailtecnico_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emailtecnico_']) && $this->nmgp_cmp_readonly['emailtecnico_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emailtecnico_']);
       $sStyleReadLab_emailtecnico_ = '';
       $sStyleReadInp_emailtecnico_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emailtecnico_']) && $this->nmgp_cmp_hidden['emailtecnico_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emailtecnico_" value="<?php echo $this->form_encode_input($emailtecnico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_emailtecnico__label" id="hidden_field_label_emailtecnico_" style="<?php echo $sStyleHidden_emailtecnico_; ?>"><span id="id_label_emailtecnico_"><?php echo $this->nm_new_label['emailtecnico_']; ?></span></TD>
    <TD class="scFormDataOdd css_emailtecnico__line" id="hidden_field_data_emailtecnico_" style="<?php echo $sStyleHidden_emailtecnico_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emailtecnico__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emailtecnico_"]) &&  $this->nmgp_cmp_readonly["emailtecnico_"] == "on") { 

 ?>
<input type="hidden" name="emailtecnico_" value="<?php echo $this->form_encode_input($emailtecnico_) . "\">" . $emailtecnico_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_emailtecnico_" class="sc-ui-readonly-emailtecnico_ css_emailtecnico__line" style="<?php echo $sStyleReadLab_emailtecnico_; ?>"><?php echo $this->form_encode_input($this->emailtecnico_); ?></span><span id="id_read_off_emailtecnico_" style="white-space: nowrap;<?php echo $sStyleReadInp_emailtecnico_; ?>">
 <input class="sc-js-input scFormObjectOdd css_emailtecnico__obj" style="" id="id_sc_field_emailtecnico_" type=text name="emailtecnico_" value="<?php echo $this->form_encode_input($emailtecnico_) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emailtecnico__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emailtecnico__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['midia_']))
    {
        $this->nm_new_label['midia_'] = "Midia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $midia_ = $this->midia_;
   $sStyleHidden_midia_ = '';
   if (isset($this->nmgp_cmp_hidden['midia_']) && $this->nmgp_cmp_hidden['midia_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['midia_']);
       $sStyleHidden_midia_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_midia_ = 'display: none;';
   $sStyleReadInp_midia_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['midia_']) && $this->nmgp_cmp_readonly['midia_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['midia_']);
       $sStyleReadLab_midia_ = '';
       $sStyleReadInp_midia_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['midia_']) && $this->nmgp_cmp_hidden['midia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="midia_" value="<?php echo $this->form_encode_input($midia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_midia__label" id="hidden_field_label_midia_" style="<?php echo $sStyleHidden_midia_; ?>"><span id="id_label_midia_"><?php echo $this->nm_new_label['midia_']; ?></span></TD>
    <TD class="scFormDataOdd css_midia__line" id="hidden_field_data_midia_" style="<?php echo $sStyleHidden_midia_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_midia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["midia_"]) &&  $this->nmgp_cmp_readonly["midia_"] == "on") { 

 ?>
<input type="hidden" name="midia_" value="<?php echo $this->form_encode_input($midia_) . "\">" . $midia_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_midia_" class="sc-ui-readonly-midia_ css_midia__line" style="<?php echo $sStyleReadLab_midia_; ?>"><?php echo $this->form_encode_input($this->midia_); ?></span><span id="id_read_off_midia_" style="white-space: nowrap;<?php echo $sStyleReadInp_midia_; ?>">
 <input class="sc-js-input scFormObjectOdd css_midia__obj" style="" id="id_sc_field_midia_" type=text name="midia_" value="<?php echo $this->form_encode_input($midia_) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_midia__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_midia__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['seg_']))
    {
        $this->nm_new_label['seg_'] = "Seg";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $seg_ = $this->seg_;
   $sStyleHidden_seg_ = '';
   if (isset($this->nmgp_cmp_hidden['seg_']) && $this->nmgp_cmp_hidden['seg_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['seg_']);
       $sStyleHidden_seg_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_seg_ = 'display: none;';
   $sStyleReadInp_seg_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['seg_']) && $this->nmgp_cmp_readonly['seg_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['seg_']);
       $sStyleReadLab_seg_ = '';
       $sStyleReadInp_seg_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['seg_']) && $this->nmgp_cmp_hidden['seg_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="seg_" value="<?php echo $this->form_encode_input($seg_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_seg__label" id="hidden_field_label_seg_" style="<?php echo $sStyleHidden_seg_; ?>"><span id="id_label_seg_"><?php echo $this->nm_new_label['seg_']; ?></span></TD>
    <TD class="scFormDataOdd css_seg__line" id="hidden_field_data_seg_" style="<?php echo $sStyleHidden_seg_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_seg__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["seg_"]) &&  $this->nmgp_cmp_readonly["seg_"] == "on") { 

 ?>
<input type="hidden" name="seg_" value="<?php echo $this->form_encode_input($seg_) . "\">" . $seg_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_seg_" class="sc-ui-readonly-seg_ css_seg__line" style="<?php echo $sStyleReadLab_seg_; ?>"><?php echo $this->form_encode_input($this->seg_); ?></span><span id="id_read_off_seg_" style="white-space: nowrap;<?php echo $sStyleReadInp_seg_; ?>">
 <input class="sc-js-input scFormObjectOdd css_seg__obj" style="" id="id_sc_field_seg_" type=text name="seg_" value="<?php echo $this->form_encode_input($seg_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_seg__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_seg__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ter_']))
    {
        $this->nm_new_label['ter_'] = "Ter";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ter_ = $this->ter_;
   $sStyleHidden_ter_ = '';
   if (isset($this->nmgp_cmp_hidden['ter_']) && $this->nmgp_cmp_hidden['ter_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ter_']);
       $sStyleHidden_ter_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ter_ = 'display: none;';
   $sStyleReadInp_ter_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ter_']) && $this->nmgp_cmp_readonly['ter_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ter_']);
       $sStyleReadLab_ter_ = '';
       $sStyleReadInp_ter_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ter_']) && $this->nmgp_cmp_hidden['ter_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ter_" value="<?php echo $this->form_encode_input($ter_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_ter__label" id="hidden_field_label_ter_" style="<?php echo $sStyleHidden_ter_; ?>"><span id="id_label_ter_"><?php echo $this->nm_new_label['ter_']; ?></span></TD>
    <TD class="scFormDataOdd css_ter__line" id="hidden_field_data_ter_" style="<?php echo $sStyleHidden_ter_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_ter__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ter_"]) &&  $this->nmgp_cmp_readonly["ter_"] == "on") { 

 ?>
<input type="hidden" name="ter_" value="<?php echo $this->form_encode_input($ter_) . "\">" . $ter_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_ter_" class="sc-ui-readonly-ter_ css_ter__line" style="<?php echo $sStyleReadLab_ter_; ?>"><?php echo $this->form_encode_input($this->ter_); ?></span><span id="id_read_off_ter_" style="white-space: nowrap;<?php echo $sStyleReadInp_ter_; ?>">
 <input class="sc-js-input scFormObjectOdd css_ter__obj" style="" id="id_sc_field_ter_" type=text name="ter_" value="<?php echo $this->form_encode_input($ter_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_ter__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_ter__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qua_']))
    {
        $this->nm_new_label['qua_'] = "Qua";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qua_ = $this->qua_;
   $sStyleHidden_qua_ = '';
   if (isset($this->nmgp_cmp_hidden['qua_']) && $this->nmgp_cmp_hidden['qua_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qua_']);
       $sStyleHidden_qua_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qua_ = 'display: none;';
   $sStyleReadInp_qua_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qua_']) && $this->nmgp_cmp_readonly['qua_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qua_']);
       $sStyleReadLab_qua_ = '';
       $sStyleReadInp_qua_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qua_']) && $this->nmgp_cmp_hidden['qua_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qua_" value="<?php echo $this->form_encode_input($qua_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_qua__label" id="hidden_field_label_qua_" style="<?php echo $sStyleHidden_qua_; ?>"><span id="id_label_qua_"><?php echo $this->nm_new_label['qua_']; ?></span></TD>
    <TD class="scFormDataOdd css_qua__line" id="hidden_field_data_qua_" style="<?php echo $sStyleHidden_qua_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qua__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qua_"]) &&  $this->nmgp_cmp_readonly["qua_"] == "on") { 

 ?>
<input type="hidden" name="qua_" value="<?php echo $this->form_encode_input($qua_) . "\">" . $qua_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_qua_" class="sc-ui-readonly-qua_ css_qua__line" style="<?php echo $sStyleReadLab_qua_; ?>"><?php echo $this->form_encode_input($this->qua_); ?></span><span id="id_read_off_qua_" style="white-space: nowrap;<?php echo $sStyleReadInp_qua_; ?>">
 <input class="sc-js-input scFormObjectOdd css_qua__obj" style="" id="id_sc_field_qua_" type=text name="qua_" value="<?php echo $this->form_encode_input($qua_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qua__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qua__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['qui_']))
    {
        $this->nm_new_label['qui_'] = "Qui";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $qui_ = $this->qui_;
   $sStyleHidden_qui_ = '';
   if (isset($this->nmgp_cmp_hidden['qui_']) && $this->nmgp_cmp_hidden['qui_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['qui_']);
       $sStyleHidden_qui_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_qui_ = 'display: none;';
   $sStyleReadInp_qui_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['qui_']) && $this->nmgp_cmp_readonly['qui_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['qui_']);
       $sStyleReadLab_qui_ = '';
       $sStyleReadInp_qui_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['qui_']) && $this->nmgp_cmp_hidden['qui_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="qui_" value="<?php echo $this->form_encode_input($qui_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_qui__label" id="hidden_field_label_qui_" style="<?php echo $sStyleHidden_qui_; ?>"><span id="id_label_qui_"><?php echo $this->nm_new_label['qui_']; ?></span></TD>
    <TD class="scFormDataOdd css_qui__line" id="hidden_field_data_qui_" style="<?php echo $sStyleHidden_qui_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_qui__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["qui_"]) &&  $this->nmgp_cmp_readonly["qui_"] == "on") { 

 ?>
<input type="hidden" name="qui_" value="<?php echo $this->form_encode_input($qui_) . "\">" . $qui_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_qui_" class="sc-ui-readonly-qui_ css_qui__line" style="<?php echo $sStyleReadLab_qui_; ?>"><?php echo $this->form_encode_input($this->qui_); ?></span><span id="id_read_off_qui_" style="white-space: nowrap;<?php echo $sStyleReadInp_qui_; ?>">
 <input class="sc-js-input scFormObjectOdd css_qui__obj" style="" id="id_sc_field_qui_" type=text name="qui_" value="<?php echo $this->form_encode_input($qui_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_qui__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_qui__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sex_']))
    {
        $this->nm_new_label['sex_'] = "Sex";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sex_ = $this->sex_;
   $sStyleHidden_sex_ = '';
   if (isset($this->nmgp_cmp_hidden['sex_']) && $this->nmgp_cmp_hidden['sex_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sex_']);
       $sStyleHidden_sex_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sex_ = 'display: none;';
   $sStyleReadInp_sex_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sex_']) && $this->nmgp_cmp_readonly['sex_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sex_']);
       $sStyleReadLab_sex_ = '';
       $sStyleReadInp_sex_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sex_']) && $this->nmgp_cmp_hidden['sex_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sex_" value="<?php echo $this->form_encode_input($sex_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_sex__label" id="hidden_field_label_sex_" style="<?php echo $sStyleHidden_sex_; ?>"><span id="id_label_sex_"><?php echo $this->nm_new_label['sex_']; ?></span></TD>
    <TD class="scFormDataOdd css_sex__line" id="hidden_field_data_sex_" style="<?php echo $sStyleHidden_sex_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_sex__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sex_"]) &&  $this->nmgp_cmp_readonly["sex_"] == "on") { 

 ?>
<input type="hidden" name="sex_" value="<?php echo $this->form_encode_input($sex_) . "\">" . $sex_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_sex_" class="sc-ui-readonly-sex_ css_sex__line" style="<?php echo $sStyleReadLab_sex_; ?>"><?php echo $this->form_encode_input($this->sex_); ?></span><span id="id_read_off_sex_" style="white-space: nowrap;<?php echo $sStyleReadInp_sex_; ?>">
 <input class="sc-js-input scFormObjectOdd css_sex__obj" style="" id="id_sc_field_sex_" type=text name="sex_" value="<?php echo $this->form_encode_input($sex_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sex__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sex__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['certificado_']))
    {
        $this->nm_new_label['certificado_'] = "Certificado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $certificado_ = $this->certificado_;
   $sStyleHidden_certificado_ = '';
   if (isset($this->nmgp_cmp_hidden['certificado_']) && $this->nmgp_cmp_hidden['certificado_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['certificado_']);
       $sStyleHidden_certificado_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_certificado_ = 'display: none;';
   $sStyleReadInp_certificado_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['certificado_']) && $this->nmgp_cmp_readonly['certificado_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['certificado_']);
       $sStyleReadLab_certificado_ = '';
       $sStyleReadInp_certificado_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['certificado_']) && $this->nmgp_cmp_hidden['certificado_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="certificado_" value="<?php echo $this->form_encode_input($certificado_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_certificado__label" id="hidden_field_label_certificado_" style="<?php echo $sStyleHidden_certificado_; ?>"><span id="id_label_certificado_"><?php echo $this->nm_new_label['certificado_']; ?></span></TD>
    <TD class="scFormDataOdd css_certificado__line" id="hidden_field_data_certificado_" style="<?php echo $sStyleHidden_certificado_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_certificado__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["certificado_"]) &&  $this->nmgp_cmp_readonly["certificado_"] == "on") { 

 ?>
<input type="hidden" name="certificado_" value="<?php echo $this->form_encode_input($certificado_) . "\">" . $certificado_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_certificado_" class="sc-ui-readonly-certificado_ css_certificado__line" style="<?php echo $sStyleReadLab_certificado_; ?>"><?php echo $this->form_encode_input($this->certificado_); ?></span><span id="id_read_off_certificado_" style="white-space: nowrap;<?php echo $sStyleReadInp_certificado_; ?>">
 <input class="sc-js-input scFormObjectOdd css_certificado__obj" style="" id="id_sc_field_certificado_" type=text name="certificado_" value="<?php echo $this->form_encode_input($certificado_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_certificado__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_certificado__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['emailnfe_']))
    {
        $this->nm_new_label['emailnfe_'] = "Emailnfe";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $emailnfe_ = $this->emailnfe_;
   $sStyleHidden_emailnfe_ = '';
   if (isset($this->nmgp_cmp_hidden['emailnfe_']) && $this->nmgp_cmp_hidden['emailnfe_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['emailnfe_']);
       $sStyleHidden_emailnfe_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_emailnfe_ = 'display: none;';
   $sStyleReadInp_emailnfe_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['emailnfe_']) && $this->nmgp_cmp_readonly['emailnfe_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['emailnfe_']);
       $sStyleReadLab_emailnfe_ = '';
       $sStyleReadInp_emailnfe_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['emailnfe_']) && $this->nmgp_cmp_hidden['emailnfe_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="emailnfe_" value="<?php echo $this->form_encode_input($emailnfe_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_emailnfe__label" id="hidden_field_label_emailnfe_" style="<?php echo $sStyleHidden_emailnfe_; ?>"><span id="id_label_emailnfe_"><?php echo $this->nm_new_label['emailnfe_']; ?></span></TD>
    <TD class="scFormDataOdd css_emailnfe__line" id="hidden_field_data_emailnfe_" style="<?php echo $sStyleHidden_emailnfe_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_emailnfe__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["emailnfe_"]) &&  $this->nmgp_cmp_readonly["emailnfe_"] == "on") { 

 ?>
<input type="hidden" name="emailnfe_" value="<?php echo $this->form_encode_input($emailnfe_) . "\">" . $emailnfe_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_emailnfe_" class="sc-ui-readonly-emailnfe_ css_emailnfe__line" style="<?php echo $sStyleReadLab_emailnfe_; ?>"><?php echo $this->form_encode_input($this->emailnfe_); ?></span><span id="id_read_off_emailnfe_" style="white-space: nowrap;<?php echo $sStyleReadInp_emailnfe_; ?>">
 <input class="sc-js-input scFormObjectOdd css_emailnfe__obj" style="" id="id_sc_field_emailnfe_" type=text name="emailnfe_" value="<?php echo $this->form_encode_input($emailnfe_) ?>"
 size=50 maxlength=200 alt="{datatype: 'text', maxLength: 200, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_emailnfe__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_emailnfe__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['fundacao_']))
    {
        $this->nm_new_label['fundacao_'] = "Fundacao";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_fundacao_ = $this->fundacao_;
   $this->fundacao_ .= ' ' . $this->fundacao__hora;
   $fundacao_ = $this->fundacao_;
   $sStyleHidden_fundacao_ = '';
   if (isset($this->nmgp_cmp_hidden['fundacao_']) && $this->nmgp_cmp_hidden['fundacao_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['fundacao_']);
       $sStyleHidden_fundacao_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_fundacao_ = 'display: none;';
   $sStyleReadInp_fundacao_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['fundacao_']) && $this->nmgp_cmp_readonly['fundacao_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['fundacao_']);
       $sStyleReadLab_fundacao_ = '';
       $sStyleReadInp_fundacao_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['fundacao_']) && $this->nmgp_cmp_hidden['fundacao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="fundacao_" value="<?php echo $this->form_encode_input($fundacao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_fundacao__label" id="hidden_field_label_fundacao_" style="<?php echo $sStyleHidden_fundacao_; ?>"><span id="id_label_fundacao_"><?php echo $this->nm_new_label['fundacao_']; ?></span></TD>
    <TD class="scFormDataOdd css_fundacao__line" id="hidden_field_data_fundacao_" style="<?php echo $sStyleHidden_fundacao_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_fundacao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["fundacao_"]) &&  $this->nmgp_cmp_readonly["fundacao_"] == "on") { 

 ?>
<input type="hidden" name="fundacao_" value="<?php echo $this->form_encode_input($fundacao_) . "\">" . $fundacao_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_fundacao_" class="sc-ui-readonly-fundacao_ css_fundacao__line" style="<?php echo $sStyleReadLab_fundacao_; ?>"><?php echo $this->form_encode_input($fundacao_); ?></span><span id="id_read_off_fundacao_" style="white-space: nowrap;<?php echo $sStyleReadInp_fundacao_; ?>">
 <input class="sc-js-input scFormObjectOdd css_fundacao__obj" style="" id="id_sc_field_fundacao_" type=text name="fundacao_" value="<?php echo $this->form_encode_input($fundacao_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['fundacao_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['fundacao_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['fundacao_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
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
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_fundacao__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_fundacao__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->fundacao_ = $old_dt_fundacao_;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['site_']))
    {
        $this->nm_new_label['site_'] = "Site";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $site_ = $this->site_;
   $sStyleHidden_site_ = '';
   if (isset($this->nmgp_cmp_hidden['site_']) && $this->nmgp_cmp_hidden['site_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['site_']);
       $sStyleHidden_site_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_site_ = 'display: none;';
   $sStyleReadInp_site_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['site_']) && $this->nmgp_cmp_readonly['site_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['site_']);
       $sStyleReadLab_site_ = '';
       $sStyleReadInp_site_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['site_']) && $this->nmgp_cmp_hidden['site_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="site_" value="<?php echo $this->form_encode_input($site_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_site__label" id="hidden_field_label_site_" style="<?php echo $sStyleHidden_site_; ?>"><span id="id_label_site_"><?php echo $this->nm_new_label['site_']; ?></span></TD>
    <TD class="scFormDataOdd css_site__line" id="hidden_field_data_site_" style="<?php echo $sStyleHidden_site_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_site__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["site_"]) &&  $this->nmgp_cmp_readonly["site_"] == "on") { 

 ?>
<input type="hidden" name="site_" value="<?php echo $this->form_encode_input($site_) . "\">" . $site_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_site_" class="sc-ui-readonly-site_ css_site__line" style="<?php echo $sStyleReadLab_site_; ?>"><?php echo $this->form_encode_input($this->site_); ?></span><span id="id_read_off_site_" style="white-space: nowrap;<?php echo $sStyleReadInp_site_; ?>">
 <input class="sc-js-input scFormObjectOdd css_site__obj" style="" id="id_sc_field_site_" type=text name="site_" value="<?php echo $this->form_encode_input($site_) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_site__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_site__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['financeiro_']))
    {
        $this->nm_new_label['financeiro_'] = "Financeiro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $financeiro_ = $this->financeiro_;
   $sStyleHidden_financeiro_ = '';
   if (isset($this->nmgp_cmp_hidden['financeiro_']) && $this->nmgp_cmp_hidden['financeiro_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['financeiro_']);
       $sStyleHidden_financeiro_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_financeiro_ = 'display: none;';
   $sStyleReadInp_financeiro_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['financeiro_']) && $this->nmgp_cmp_readonly['financeiro_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['financeiro_']);
       $sStyleReadLab_financeiro_ = '';
       $sStyleReadInp_financeiro_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['financeiro_']) && $this->nmgp_cmp_hidden['financeiro_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="financeiro_" value="<?php echo $this->form_encode_input($financeiro_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_financeiro__label" id="hidden_field_label_financeiro_" style="<?php echo $sStyleHidden_financeiro_; ?>"><span id="id_label_financeiro_"><?php echo $this->nm_new_label['financeiro_']; ?></span></TD>
    <TD class="scFormDataOdd css_financeiro__line" id="hidden_field_data_financeiro_" style="<?php echo $sStyleHidden_financeiro_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_financeiro__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["financeiro_"]) &&  $this->nmgp_cmp_readonly["financeiro_"] == "on") { 

 ?>
<input type="hidden" name="financeiro_" value="<?php echo $this->form_encode_input($financeiro_) . "\">" . $financeiro_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_financeiro_" class="sc-ui-readonly-financeiro_ css_financeiro__line" style="<?php echo $sStyleReadLab_financeiro_; ?>"><?php echo $this->form_encode_input($this->financeiro_); ?></span><span id="id_read_off_financeiro_" style="white-space: nowrap;<?php echo $sStyleReadInp_financeiro_; ?>">
 <input class="sc-js-input scFormObjectOdd css_financeiro__obj" style="" id="id_sc_field_financeiro_" type=text name="financeiro_" value="<?php echo $this->form_encode_input($financeiro_) ?>"
 size=1 maxlength=1 alt="{datatype: 'text', maxLength: 1, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_financeiro__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_financeiro__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_']))
    {
        $this->nm_new_label['numero_'] = "Numero";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_ = $this->numero_;
   $sStyleHidden_numero_ = '';
   if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_']);
       $sStyleHidden_numero_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_ = 'display: none;';
   $sStyleReadInp_numero_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_']) && $this->nmgp_cmp_readonly['numero_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_']);
       $sStyleReadLab_numero_ = '';
       $sStyleReadInp_numero_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_']) && $this->nmgp_cmp_hidden['numero_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_" value="<?php echo $this->form_encode_input($numero_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_numero__label" id="hidden_field_label_numero_" style="<?php echo $sStyleHidden_numero_; ?>"><span id="id_label_numero_"><?php echo $this->nm_new_label['numero_']; ?></span></TD>
    <TD class="scFormDataOdd css_numero__line" id="hidden_field_data_numero_" style="<?php echo $sStyleHidden_numero_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_"]) &&  $this->nmgp_cmp_readonly["numero_"] == "on") { 

 ?>
<input type="hidden" name="numero_" value="<?php echo $this->form_encode_input($numero_) . "\">" . $numero_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_" class="sc-ui-readonly-numero_ css_numero__line" style="<?php echo $sStyleReadLab_numero_; ?>"><?php echo $this->form_encode_input($this->numero_); ?></span><span id="id_read_off_numero_" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero__obj" style="" id="id_sc_field_numero_" type=text name="numero_" value="<?php echo $this->form_encode_input($numero_) ?>"
 size=6 maxlength=6 alt="{datatype: 'text', maxLength: 6, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['complemento_']))
    {
        $this->nm_new_label['complemento_'] = "Complemento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $complemento_ = $this->complemento_;
   $sStyleHidden_complemento_ = '';
   if (isset($this->nmgp_cmp_hidden['complemento_']) && $this->nmgp_cmp_hidden['complemento_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['complemento_']);
       $sStyleHidden_complemento_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_complemento_ = 'display: none;';
   $sStyleReadInp_complemento_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['complemento_']) && $this->nmgp_cmp_readonly['complemento_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['complemento_']);
       $sStyleReadLab_complemento_ = '';
       $sStyleReadInp_complemento_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['complemento_']) && $this->nmgp_cmp_hidden['complemento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="complemento_" value="<?php echo $this->form_encode_input($complemento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_complemento__label" id="hidden_field_label_complemento_" style="<?php echo $sStyleHidden_complemento_; ?>"><span id="id_label_complemento_"><?php echo $this->nm_new_label['complemento_']; ?></span></TD>
    <TD class="scFormDataOdd css_complemento__line" id="hidden_field_data_complemento_" style="<?php echo $sStyleHidden_complemento_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_complemento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["complemento_"]) &&  $this->nmgp_cmp_readonly["complemento_"] == "on") { 

 ?>
<input type="hidden" name="complemento_" value="<?php echo $this->form_encode_input($complemento_) . "\">" . $complemento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_complemento_" class="sc-ui-readonly-complemento_ css_complemento__line" style="<?php echo $sStyleReadLab_complemento_; ?>"><?php echo $this->form_encode_input($this->complemento_); ?></span><span id="id_read_off_complemento_" style="white-space: nowrap;<?php echo $sStyleReadInp_complemento_; ?>">
 <input class="sc-js-input scFormObjectOdd css_complemento__obj" style="" id="id_sc_field_complemento_" type=text name="complemento_" value="<?php echo $this->form_encode_input($complemento_) ?>"
 size=20 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_complemento__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_complemento__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['razaosocialentrega_']))
    {
        $this->nm_new_label['razaosocialentrega_'] = "Razaosocialentrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $razaosocialentrega_ = $this->razaosocialentrega_;
   $sStyleHidden_razaosocialentrega_ = '';
   if (isset($this->nmgp_cmp_hidden['razaosocialentrega_']) && $this->nmgp_cmp_hidden['razaosocialentrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['razaosocialentrega_']);
       $sStyleHidden_razaosocialentrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_razaosocialentrega_ = 'display: none;';
   $sStyleReadInp_razaosocialentrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['razaosocialentrega_']) && $this->nmgp_cmp_readonly['razaosocialentrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['razaosocialentrega_']);
       $sStyleReadLab_razaosocialentrega_ = '';
       $sStyleReadInp_razaosocialentrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['razaosocialentrega_']) && $this->nmgp_cmp_hidden['razaosocialentrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="razaosocialentrega_" value="<?php echo $this->form_encode_input($razaosocialentrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_razaosocialentrega__label" id="hidden_field_label_razaosocialentrega_" style="<?php echo $sStyleHidden_razaosocialentrega_; ?>"><span id="id_label_razaosocialentrega_"><?php echo $this->nm_new_label['razaosocialentrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_razaosocialentrega__line" id="hidden_field_data_razaosocialentrega_" style="<?php echo $sStyleHidden_razaosocialentrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_razaosocialentrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["razaosocialentrega_"]) &&  $this->nmgp_cmp_readonly["razaosocialentrega_"] == "on") { 

 ?>
<input type="hidden" name="razaosocialentrega_" value="<?php echo $this->form_encode_input($razaosocialentrega_) . "\">" . $razaosocialentrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_razaosocialentrega_" class="sc-ui-readonly-razaosocialentrega_ css_razaosocialentrega__line" style="<?php echo $sStyleReadLab_razaosocialentrega_; ?>"><?php echo $this->form_encode_input($this->razaosocialentrega_); ?></span><span id="id_read_off_razaosocialentrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_razaosocialentrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_razaosocialentrega__obj" style="" id="id_sc_field_razaosocialentrega_" type=text name="razaosocialentrega_" value="<?php echo $this->form_encode_input($razaosocialentrega_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_razaosocialentrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_razaosocialentrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['entrega_']))
    {
        $this->nm_new_label['entrega_'] = "Entrega";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $entrega_ = $this->entrega_;
   $sStyleHidden_entrega_ = '';
   if (isset($this->nmgp_cmp_hidden['entrega_']) && $this->nmgp_cmp_hidden['entrega_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['entrega_']);
       $sStyleHidden_entrega_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_entrega_ = 'display: none;';
   $sStyleReadInp_entrega_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['entrega_']) && $this->nmgp_cmp_readonly['entrega_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['entrega_']);
       $sStyleReadLab_entrega_ = '';
       $sStyleReadInp_entrega_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['entrega_']) && $this->nmgp_cmp_hidden['entrega_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="entrega_" value="<?php echo $this->form_encode_input($entrega_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_entrega__label" id="hidden_field_label_entrega_" style="<?php echo $sStyleHidden_entrega_; ?>"><span id="id_label_entrega_"><?php echo $this->nm_new_label['entrega_']; ?></span></TD>
    <TD class="scFormDataOdd css_entrega__line" id="hidden_field_data_entrega_" style="<?php echo $sStyleHidden_entrega_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_entrega__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["entrega_"]) &&  $this->nmgp_cmp_readonly["entrega_"] == "on") { 

 ?>
<input type="hidden" name="entrega_" value="<?php echo $this->form_encode_input($entrega_) . "\">" . $entrega_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_entrega_" class="sc-ui-readonly-entrega_ css_entrega__line" style="<?php echo $sStyleReadLab_entrega_; ?>"><?php echo $this->form_encode_input($this->entrega_); ?></span><span id="id_read_off_entrega_" style="white-space: nowrap;<?php echo $sStyleReadInp_entrega_; ?>">
 <input class="sc-js-input scFormObjectOdd css_entrega__obj" style="" id="id_sc_field_entrega_" type=text name="entrega_" value="<?php echo $this->form_encode_input($entrega_) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_entrega__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_entrega__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contatotecnico_']))
    {
        $this->nm_new_label['contatotecnico_'] = "Contatotecnico";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contatotecnico_ = $this->contatotecnico_;
   $sStyleHidden_contatotecnico_ = '';
   if (isset($this->nmgp_cmp_hidden['contatotecnico_']) && $this->nmgp_cmp_hidden['contatotecnico_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contatotecnico_']);
       $sStyleHidden_contatotecnico_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contatotecnico_ = 'display: none;';
   $sStyleReadInp_contatotecnico_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contatotecnico_']) && $this->nmgp_cmp_readonly['contatotecnico_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contatotecnico_']);
       $sStyleReadLab_contatotecnico_ = '';
       $sStyleReadInp_contatotecnico_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contatotecnico_']) && $this->nmgp_cmp_hidden['contatotecnico_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contatotecnico_" value="<?php echo $this->form_encode_input($contatotecnico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_contatotecnico__label" id="hidden_field_label_contatotecnico_" style="<?php echo $sStyleHidden_contatotecnico_; ?>"><span id="id_label_contatotecnico_"><?php echo $this->nm_new_label['contatotecnico_']; ?></span></TD>
    <TD class="scFormDataOdd css_contatotecnico__line" id="hidden_field_data_contatotecnico_" style="<?php echo $sStyleHidden_contatotecnico_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contatotecnico__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contatotecnico_"]) &&  $this->nmgp_cmp_readonly["contatotecnico_"] == "on") { 

 ?>
<input type="hidden" name="contatotecnico_" value="<?php echo $this->form_encode_input($contatotecnico_) . "\">" . $contatotecnico_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_contatotecnico_" class="sc-ui-readonly-contatotecnico_ css_contatotecnico__line" style="<?php echo $sStyleReadLab_contatotecnico_; ?>"><?php echo $this->form_encode_input($this->contatotecnico_); ?></span><span id="id_read_off_contatotecnico_" style="white-space: nowrap;<?php echo $sStyleReadInp_contatotecnico_; ?>">
 <input class="sc-js-input scFormObjectOdd css_contatotecnico__obj" style="" id="id_sc_field_contatotecnico_" type=text name="contatotecnico_" value="<?php echo $this->form_encode_input($contatotecnico_) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contatotecnico__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contatotecnico__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_dbo_cliente_inline");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_dbo_cliente_inline");
 parent.scAjaxDetailHeight("form_dbo_cliente_inline", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_dbo_cliente_inline", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_dbo_cliente_inline", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['sc_modal'])
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
		if ($("#sc_b_sai_t.sc-unique-btn-19").length && $("#sc_b_sai_t.sc-unique-btn-19").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-20").length && $("#sc_b_upd_t.sc-unique-btn-20").is(":visible")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-21").length && $("#sc_b_sai_t.sc-unique-btn-21").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-23").length && $("#sc_b_sai_t.sc-unique-btn-23").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-25").length && $("#sc_b_sai_t.sc-unique-btn-25").is(":visible")) {
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
