
 <form name="form_ajax_redir_1" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>
 <form name="form_ajax_redir_2" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        iElemTop  = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);

    $oElem.offset({top: iElemTop, left: iElemLeft});
  } // scCenterElement

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      scCenterElement(document.getElementById("id_debug_window"));
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay(sErrorId, bForce)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
      if (null == bForce)
      {
          bForce = true;
      }
      if (bForce)
      {
          var $oField = $('#id_sc_field_' + sErrorId);
          if (0 < $oField.length)
          {
              $oField.removeClass(sc_css_status);
          }
      }
    }
    if (document.getElementById("id_error_display_fixed"))
    {
      document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay

  function scAjaxShowErrorDisplay(sErrorId, sErrorMsg)
  {
    if (oResp && oResp['redirExitInfo'])
    {
      sErrorMsg += "<br /><input type=\"button\" onClick=\"window.location='" + oResp['redirExitInfo']['action'] + "'\" value=\"Ok\">";
    }
    sErrorMsg = scAjaxErrorSql(sErrorMsg);
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
      if ("table" == sErrorId)
      {
        scCenterElement(document.getElementById("id_error_display_" + sErrorId + "_frame"));
      }
      var $oField = $('#id_sc_field_' + sErrorId);
      if (0 < $oField.length)
      {
        $oField.addClass(sc_css_status);
      }
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "', false)", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
    /*else if ("table" == sErrorId)
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.left = posDispLeft + "px";
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.top = posDispTop + "px";
    }*/
  } // scAjaxShowErrorDisplay

  var iErrorSqlId = 1;

  function scAjaxErrorSql(sErrorMsg)
  {
    var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
        sTmpId;
    while (-1 < iTmpPos)
    {
      sTmpId    = "sc_id_error_sql_" + iErrorSqlId;
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline\" onClick=\"$('#" + sTmpId + "').show(); scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span onClick=\"$('#" + sTmpId + "').hide()\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
      iErrorSqlId++;
    }
    return sErrorMsg;
  } // scAjaxErrorSql

  function scAjaxHideMessage()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    _scAjaxShowMessage(scMsgDefTitle, oResp["msgDisplay"]["msgText"], false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
  } // scAjaxShowMessage

  var scMsgDefClose = "";

  function _scAjaxShowMessage(sTitle, sMessage, bModal, iTimeout, bButton, sButton, iTop, iLeft, iWidth, iHeight, sRedir, sTarget, sParam, bClose, bBodyIcon) {
    if ("" == sMessage) {
      if (bModal) {
        scMsgDefClick = "close_modal";
      }
      else {
        scMsgDefClick = "close";
      }
      _scAjaxMessageBtnClick();
      document.getElementById("id_message_display_title").innerHTML = scMsgDefTitle;
      document.getElementById("id_message_display_text").innerHTML = "";
      document.getElementById("id_message_display_buttone").value = scMsgDefButton;
      document.getElementById("id_message_display_buttond").style.display = "none";
    }
    else {
      document.getElementById("id_message_display_title").innerHTML = scAjaxSpecCharParser(sTitle);
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(sMessage);
      document.getElementById("id_message_display_buttone").value = sButton;
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_title_line").style.display = (bClose || "" != sTitle) ? "" : "none";
      document.getElementById("id_message_display_close_icon").style.display = bClose ? "" : "none";
      if (document.getElementById("id_message_display_body_icon")) {
        document.getElementById("id_message_display_body_icon").style.display = bBodyIcon ? "" : "none";
      }
      $("#id_message_display_content").css('width', (0 < iWidth ? iWidth + 'px' : ''));
      $("#id_message_display_content").css('height', (0 < iHeight ? iHeight + 'px' : ''));
      if (bModal) {
        iWidth = iWidth || 250;
        iHeight = iHeight || 200;
        scMsgDefClose = "close_modal";
        tb_show('', '#TB_inline?height=' + (iHeight + 6) + '&width=' + (iWidth + 4) + '&inlineId=id_message_display_frame&modal=true', '');
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2_modal";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close_modal";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close_modal";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
      else
      {
        scMsgDefClose = "close";
        $("#id_message_display_frame").css('top', (0 < iTop ? iTop + 'px' : ''));
        $("#id_message_display_frame").css('left', (0 < iLeft ? iLeft + 'px' : ''));
        document.getElementById("id_message_display_frame").style.display = "";
        if (0 == iTop && 0 == iLeft) {
          scCenterElement(document.getElementById("id_message_display_frame"));
        }
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
    }
  } // _scAjaxShowMessage

  function _scAjaxMessageBtnClose() {
    switch (scMsgDefClose) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function _scAjaxMessageBtnClick() {
    switch (scMsgDefClick) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
      case "redir1":
        document.form_ajax_redir_1.submit();
        break;
      case "redir2":
        document.form_ajax_redir_2.submit();
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "redir2_modal":
        document.form_ajax_redir_2.submit();
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"] || "SET" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxCalendarReload()
  {
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"])
    {
      self.parent.calendar_reload();
      self.parent.tb_remove();
    }
  } // scCalendarReload

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_form_dbo_cliente_inline" == sTestField)
        {
          if (ajax_error_geral != '') { ajax_error_geral += '<br>';}
          ajax_error_geral += scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (scFocusFirstErrorField && '' == scFocusFirstErrorName)
          {
            scFocusFirstErrorName = sTestField;
          }
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
        if (ajax_error_list[sField])
        {
        ajax_error_list[sField][sType] = aFieldErrors;
        }
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      if (ajax_error_list[sField])
      {
        for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
        {
          if (bLabel)
          {
            sErrorText += ajax_error_list[sField]["label"] + ": ";
          }
          sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
        }
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

  function scAjaxSetVariables()
  {
    if (!oResp["varList"])
    {
      return true;
    }
    for (var iVarFields = 0; iVarFields < oResp["varList"].length; iVarFields++)
    {
      var sVarName  = oResp["varList"][iVarFields]["index"];
      var sVarValue = oResp["varList"][iVarFields]["value"];
	  eval(sVarName + " = \"" + sVarValue + "\";");
	}
  } // scAjaxSetVariables

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];

      if ("selectdd" == sFieldType)
      {
        var bSelectDD = true;
        sFieldType = "select";
      }
      else
      {
        var bSelectDD = false;
      }
      if ("select2_ac" == sFieldType)
      {
        var bSelect2AC = true;
        sFieldType = "select";
      }
      else
      {
        var bSelect2AC = false;
      }
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/

      if ("corhtml" == sFieldType)
      {
        sFieldType = 'text';

        /*sCor = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
        setaCorPaleta(sFieldName, sCor);*/
      }

      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["row"])
      {
        var iRow = oResp["fldList"][iSetFields]["row"];
		var thisRow = oResp["fldList"][iSetFields]["row"];
      }
      else
      {
        var iRow = 1;
		var thisRow = "";
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["keepImg"])
      {
        var sKeepImg = oResp["fldList"][iSetFields]["keepImg"];
      }
      else
      {
        var sKeepImg = "N";
      }
      if (oResp["fldList"][iSetFields]["hideName"])
      {
        var sHideName = oResp["fldList"][iSetFields]["hideName"];
      }
      else
      {
        var sHideName = "N";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }
      if (oResp["fldList"][iSetFields]["optComp"])
      {
        var sOptComp = oResp["fldList"][iSetFields]["optComp"];
      }
      else
      {
        var sOptComp = "";
      }
      if (oResp["fldList"][iSetFields]["optClass"])
      {
        var sOptClass = oResp["fldList"][iSetFields]["optClass"];
      }
      else
      {
        var sOptClass = "";
      }
      if (oResp["fldList"][iSetFields]["optMulti"])
      {
        var sOptMulti = oResp["fldList"][iSetFields]["optMulti"];
      }
      else
      {
        var sOptMulti = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["mulHtml"])
      {
        var sMULHtml = oResp["fldList"][iSetFields]["mulHtml"];
      }
      else
      {
        var sMULHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if (oResp["clearUpload"])
      {
        var sClearUpload = scAjaxSpecCharParser(oResp["clearUpload"]);
      }
      else
      {
        var sClearUpload = "N";
      }
      if (oResp["eventField"])
      {
        var sEventField = scAjaxSpecCharParser(oResp["eventField"]);
      }
      else
      {
        var sEventField = "__SC_NO_FIELD";
      }
      if (oResp["fldList"][iSetFields]["switch"])
      {
        var bSwitch = true == oResp["fldList"][iSetFields]["switch"];
      }
      else
      {
        var bSwitch = false;
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField);
      }
      else if ("color_palette" == sFieldType)
      {
        scAjaxSetFieldColorPalette(sFieldName, oFieldValues);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      else if ("multi_upload" == sFieldType)
      {
        scAjaxSetFieldMultiUpload(sFieldName, sMULHtml);
      }
      else if ("recur_info" == sFieldType)
      {
        scAjaxSetFieldRecurInfo(sFieldName, sMULHtml);
      }
      else if ("signature" == sFieldType)
      {
        scAjaxSetFieldSignature(sFieldName, oFieldValues);
      }
      else if ("rating" == sFieldType)
      {
        scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField)
  {
    if (document.F1.elements[sFieldName])
    {
      var jqField = $("#id_sc_field_" + sFieldName),
          Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
      if (jqField.length)
      {
        jqField.val(Temp_text);
        if (sEventField != sFieldName && sEventField != "__SC_NO_FIELD" && sEventField != "")
        {
          //jqField.trigger("change");
        }
      }
      else
      {
        eval("document.F1." + sFieldName + ".value = Temp_text");
      }
      if (scEventControl_data[sFieldName]) {
        scEventControl_data[sFieldName]["calculated"] = Temp_text;
      }
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
	scAjaxSetSliderValue(sFieldName, thisRow);
  } // scAjaxSetFieldText

  function scAjaxSetSliderValue(fieldName, thisRow)
  {
	  var sliderObject = $("#sc-ui-slide-" + fieldName);
	  if (!sliderObject.length) {
		  return;
	  }
	  scJQSlideValue(fieldName, thisRow);
  } // scAjaxSetSliderValue

  function scAjaxSetFieldColorPalette(sFieldName, oFieldValues)
  {
    if (document.F1.elements[sFieldName])
    {
        var Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
        eval ("document.F1." + sFieldName + ".value = Temp_text");
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
	  setaCorPaleta(sFieldName, oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
  } // scAjaxSetFieldColorPalette

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if (bSelectDD)
    {
        $("#id_sc_field_" + sFieldName).dropdownchecklist("destroy");
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues, "", "", sEventField);
      return;
    }

    if (null != oFieldOptions)
    {
      $("#id_sc_field_" + sFieldName).children().remove()
      if ("<select" != oFieldOptions.substr(0, 7))
      {
        var $oField = $("#id_sc_field_" + sFieldName);
        if (0 < $oField.length)
        {
          $oField.html(oFieldOptions);
        }
        else
        {
          document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
        }
      }
      else
      {
        document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
      }
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = $("#id_sc_field_" + sFieldName);
    for (iFieldSelect = 0; iFieldSelect < oFormField[0].length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField[0].options[iFieldSelect].value, aValues))
      {
        oFormField[0].options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField[0].options[iFieldSelect].selected = false;
      }
    }
	scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
    if (bSelectDD)
    {
        scJQDDCheckBoxAdd(thisRow, true);
    }
	if (bSelect2AC)
	{
		var newOption = new Option(oFieldValues[0]["label"], oFieldValues[0]["value"], true, true);
		$("#id_ac_" + sFieldName).append(newOption);
	}
	else if (oFormField.hasClass("select2-hidden-accessible"))
	{
        $("#id_sc_field_" + sFieldName).select2("destroy");
		var select2Field = sFieldName;
		if ("" != thisRow) {
			select2Field = select2Field.substr(0, select2Field.length - thisRow.toString().length);
		}
        scJQSelect2Add(thisRow, select2Field);
	}
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];

    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField)
  {
	if (null == bSwitch)
	{
	  bSwitch = false;
	}
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearCheckbox(sFieldName);
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearCheckbox(sFieldName); */
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
	scAjaxSetSwitchOptions(sFieldName, "checkbox");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField)
  {
	if (null == bSwitch)
	{
	  bSwitch = false;
	}
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearRadio(sFieldName);
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearRadio(sFieldName); */
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, "", "", bSwitch);
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
	scAjaxSetSwitchOptions(sFieldName, "radio");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldRadio

  function scAjaxSetSwitchOptions(fieldName, fieldType)
  {
	var fieldOptions = $(".sc-ui-" + fieldType + "-" + fieldName + ".lc-switch");
	if (!fieldOptions.length) {
		return;
	}
	for (var i = 0; i < fieldOptions.length; i++) {
		if ($(fieldOptions[i]).prop("checked")) {
			$(fieldOptions[i]).lcs_on();
		}
		else {
			$(fieldOptions[i]).lcs_off();
		}
	}
  }

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    sFieldLabel = oFieldValues[0]["value"];
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if ("N" == sKeepImg && document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = scAjaxSpecCharParser(sImgFile);
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = scAjaxSpecCharParser(sImgLink);
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("N" == sKeepImg && document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"] || "S" == sHideName) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
      if (document.F1.elements["temp_out1_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgFile;
        document.F1.elements["temp_out1_" + sFieldName].value = sImgOrig;
      }
      else if (document.F1.elements["temp_out_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgOrig;
      }
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    else if (oResp && oResp["ajaxRequest"] && "navigate_form" == oResp["ajaxRequest"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = "";
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = scAjaxSpecCharParser(sDocLink);
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = scAjaxSpecCharParser(sDocIcon);
    }
    if ("" == oFieldValues[0]["value"])
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "none";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "none";
    }
    else
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("S" == sClearUpload && document.F1.elements[sFieldName + "_ul_name"])
    {
      document.F1.elements[sFieldName + "_ul_name"].value = "";
    }
    /*if ("" != sDocLink)
    {
      scAjaxSetReadonlyValue(sFieldName, sDocLink);
    }
    else
    {*/
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
    //}
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldMultiUpload(sFieldName, sMULHtml)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    $("#id_sc_loaded_" + sFieldName).html(scAjaxSpecCharParser(sMULHtml));
  } // scAjaxSetFieldMultiUpload

  function scAjaxExecFieldEditorHtml(strOption, bolUI, oField)
  {
	  	if(tinymce.majorVersion > 3)
		{
			if(strOption == 'mceAddControl')
			{
				tinymce.execCommand('mceAddEditor', bolUI, oField);
			}else
			if(strOption == 'mceRemoveControl')
			{
				tinymce.execCommand('mceRemoveEditor', bolUI, oField);
			}
		}
		else
		{
			tinyMCE.execCommand(strOption, bolUI, oField);
		}
  }

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = scAjaxSpecCharParser(sImgHtml);
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldRecurInfo(sFieldName, oFieldValues)
  {
	  var jsonData = "" != oFieldValues[0]["value"]
	               ? JSON.parse(oFieldValues[0]["value"])
				   : { repeat: "1", endon: "E", endafter: "", endin: ""};
	  $("#id_rinf_repeat_" + sFieldName).val(jsonData.repeat);
	  $(".cl_rinf_endon_" + sFieldName).filter(function(index) {return $(this).val() == jsonData.endon}).prop("checked", true),
	  $("#id_rinf_endafter_" + sFieldName).val(jsonData.endafter);
	  $("#id_rinf_endin_" + sFieldName).val(jsonData.endin);
	  scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldRecurInfo

  function scAjaxSetFieldSignature(sFieldName, oFieldValues)
  {
	var fieldValue = scAjaxSpecCharParser(oFieldValues[0]['value']);
	if ("data:image/png;base64," != fieldValue.substr(0, 22) && "data:image/jsignature;base30," != fieldValue.substr(0, 29))
	{
		scJQSignatureClear(sFieldName);
		return;
	}
	$("#id_sc_field_" + sFieldName).val(fieldValue);
	scJQSignatureRedraw(sFieldName);
  } // scAjaxSetFieldSignature

  function scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow)
  {
	$("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
	if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
	}
	scJQRatingRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      oFormField[iFieldRadio].checked = false;
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, sReadLabel);
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    $oHidden = $("input[name='" + sFieldName + "']");
    if (!$oHidden.length)
    {
      $oHidden = $("input[name='" + sFieldName + "_']");
    }
    if ($oHidden.length)
    {
      for (var i = 0; i < $oHidden.length; i++)
      {
        if ("hidden" == $oHidden[i].type && $oHidden[i].form && $oHidden[i].form.name && "F1" == $oHidden[i].form.name)
        {
          return scAjaxSpecCharProtect($oHidden[i].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    $oField = $("#id_sc_field_" + sFieldName);
    if(!$oField.length)
    {
      $oField = $("#id_sc_field_" + sFieldName + "_");
    }
    if ($oField.length && "select" != $oField[0].type.substr(0, 6))
    {
      return scAjaxSpecCharProtect($oField.val());//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName + '_'])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName + '_'].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return '';
    }
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    for( i= 0; i < document.F1.elements.length; i++)
    {
       if (document.F1.elements[i].name == sFieldName)
       {
          return scAjaxSpecCharProtect(document.F1.elements[i].value);//.replace(/[+]/g, "__NM_PLUS__");
       }
    }
//    return document.F1.elements[sFieldName].value.replace(/[+]/g, "__NM_PLUS__");
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return "";
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return scAjaxSpecCharProtect(oFormField.options[iSelected].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += scAjaxSpecCharProtect(oFormField[iFieldSelect].value);//.replace(/[+]/g, "__NM_PLUS__");
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += scAjaxSpecCharProtect(aValues[iFieldCheck]);//.replace(/[+]/g, "__NM_PLUS__");
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    if (!oFormField.length)
    {
        var sc_cmp_radio = eval("document.F1." + sFieldName);
        if (sc_cmp_radio.checked)
        {
           sValue = scAjaxSpecCharProtect(sc_cmp_radio.value);//.replace(/[+]/g, "__NM_PLUS__");
        }
    }
    else
    {
      for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
      {
        if (oFormField[iFieldRadio].checked)
        {
          sValue = scAjaxSpecCharProtect(oFormField[iFieldRadio].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }

	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    return scAjaxSpecCharParser(scAjaxSpecCharProtect(oFormField.getContent()));//.replace(/[+]/g, "__NM_PLUS__"));
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldSignature(sFieldName)
  {
    var signatureData = $("#sc-id-sign-" + sFieldName).jSignature("getData", "base30");
	$("#id_sc_field_" + sFieldName).val("data:" + signatureData[0] + "," + signatureData[1]);
	return $("#id_sc_field_" + sFieldName).val();
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldRecurInfo(sFieldName)
  {
	  var repeatInList = $(".cl_rinf_repeatin_" + sFieldName).filter(":checked"), repeatInValues = [], jsonData, i;
	  for (i = 0; i < repeatInList.length; i++) {
		  repeatInValues.push($(repeatInList[i]).val());
	  }
	  jsonData = {
		  repeat: $("#id_rinf_repeat_" + sFieldName).val(),
		  repeatin: repeatInValues.join(";"),
		  endon: $(".cl_rinf_endon_" + sFieldName).filter(":checked").val(),
		  endafter: $("#id_rinf_endafter_" + sFieldName).val(),
		  endin: $("#id_rinf_endin_" + sFieldName).val()
	  };
	  return JSON.stringify(jsonData);
  } // scAjaxGetFieldRecurInfo

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    if (null == sParseString) {
      return "";
    }
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } // scAjaxSpecCharParser

  function scAjaxSpecCharProtect(sOriginal)
  {
        var sProtected;
        sProtected = sOriginal.replace(/[+]/g, "__NM_PLUS__");
        sProtected = sProtected.replace(/[%]/g, "__NM_PERC__");
        return sProtected;
  } // scAjaxSpecCharProtect

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    var sClass;
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        if ("" != sOptClass)
        {
            sClass = " class=\"" + sOptClass;
            if ("" != sOptMulti)
            {
                sClass += " " + sOptClass + sOptMulti;
            }
            sClass += "\"";
        }
        if (sHtmComp == null)
        {
            sHtmComp = "";
        }
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
		if (bSwitch)
		{
			sDivText += "<div class=\"sc ";
			if ("Checkbox" == sFieldType)
			{
				sDivText += "switch";
			}
			else
			{
				sDivText += "radio";
			}
			sDivText += "\">";
		}
        sDivText += "<input id=\"id-opt-" + sFieldName + "-"  + iRecreate + "\" type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + " " + sOptComp + sClass + ">";
		if (bSwitch)
		{
			sDivText += "<span></span>";
		}
        sDivText += "<label for=\"id-opt-" + sFieldName + "-"  + iRecreate + "\">" + sOptText + "</label>";
		if (bSwitch)
		{
			sDivText += "</div>";
		}
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
  } // scAjaxRecreateOptions

  function scAjaxProcOn(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.blockUI && !bForce)
      {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else
      {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
        if (null != scCenterElement)
        {
          scCenterElement(document.getElementById("id_div_process"));
        }
      }
    }
  } // scAjaxProcOn

  function scAjaxProcOff(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.unblockUI && !bForce)
      {
        $.unblockUI();
      }
      else
      {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
	if (scMasterDetailParentIframe && "" != scMasterDetailParentIframe)
	{
      var dbParentFrame = $(parent.document).find("[name='" + scMasterDetailParentIframe + "']");
	  if (!dbParentFrame || !dbParentFrame[0] || !dbParentFrame[0].contentWindow.scAjaxDetailValue)
	  {
		return;
	  }
      for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
      {
        dbParentFrame[0].contentWindow.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
      }
	}
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"] && '' == scFocusFirstErrorName)
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        scFocusField(sFieldName);
    }
    scAjaxFocusError();
  } // scAjaxSetFocus

  function scAjaxFocusError()
  {
    if ('' != scFocusFirstErrorName)
    {
      scFocusField(scFocusFirstErrorName);
      scFocusFirstErrorName = '';
    }
  } // scAjaxFocusError

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxSetSummary()
  {
    if (!oResp["navSummary"])
    {
      return;
    }
    sreg_ini = oResp["navSummary"].reg_ini;
    sreg_qtd = oResp["navSummary"].reg_qtd;
    sreg_tot = oResp["navSummary"].reg_tot;
    summary_atualiza(sreg_ini, sreg_qtd, sreg_tot);
  } // scAjaxSetSummary

  function scAjaxSetNavpage()
  {
    navpage_atualiza(oResp["navPage"]);
  } // scAjaxSetNavpage


  function scAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      if (oResp["redirInfo"]["target"] == "modal")
      {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&script_case_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    var vertButton;
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
	var blockDisplay = {};
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
		blockDisplay[ oResp["blockDisplay"][iDisplay][0] ] = oResp["blockDisplay"][iDisplay][1];
      }
	  //scCheckPagesWithoutBlock();
    }
	var fieldDisplay = {};
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
			if ("hidden_field_data_" == aFieldIds[iDisplay3].substr(0, 18)) {
			  fieldDisplay[ aFieldIds[iDisplay3].substr(18) ] = oResp["fieldDisplay"][iDisplay][1];
			}
          }
        }
      }
    }
    if (oResp["buttonDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplay"].length; iDisplay++)
      {
        var sBtnName2 = "";
        switch (oResp["buttonDisplay"][iDisplay][0])
        {
          case "first": var sBtnName = "sc_b_ini"; break;
          case "back": var sBtnName = "sc_b_ret"; break;
          case "forward": var sBtnName = "sc_b_avc"; break;
          case "last": var sBtnName = "sc_b_fim"; break;
          case "insert": var sBtnName = "sc_b_ins"; break;
          case "update": var sBtnName = "sc_b_upd"; break;
          case "delete": var sBtnName = "sc_b_del"; break;
          default: var sBtnName = "sc_b_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName2 = "sc_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName3 = "gbl_sc_" + oResp["buttonDisplay"][iDisplay][0]; break;
        }
        if ("sc_b_ini" == sBtnName || "sc_b_ret" == sBtnName || "sc_b_avc" == sBtnName || "sc_b_fim" == sBtnName)
        {
          scAjaxNavigateButtonDisplay(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
        }
        else
        {
          aDispData[aDispData.length] = new Array(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_t", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_b", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName2)
        {
          aDispData[aDispData.length] = new Array(sBtnName2, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName3)
        {
          aDispData[aDispData.length] = new Array(sBtnName3, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["buttonDisplayVert"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplayVert"].length; iDisplay++)
      {
        vertButton = oResp["buttonDisplayVert"][iDisplay];
        aDispData[aDispData.length] = new Array("sc_exc_line_" + vertButton.seq, vertButton.delete);
        if (vertButton.gridView)
        {
          aDispData[aDispData.length] = new Array("sc_open_line_" + vertButton.seq, vertButton.update);
        }
        else
        {
          aDispData[aDispData.length] = new Array("sc_upd_line_" + vertButton.seq, vertButton.update);
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
	for (var blockId in blockDisplay) {
		displayChange_block(blockId, blockDisplay[blockId]);
	}
	for (var fieldId in fieldDisplay) {
		displayChange_field(fieldId, "", fieldDisplay[fieldId]);
	}
  } // scAjaxSetDisplay

  function scAjaxNavigateButtonDisplay(sButton, sStatus)
  {
    sButton2 = sButton + "_off";

    if ("off" == sStatus)
    {
      sStatus2 = "off";
    }
    else
    {
      if ("sc_b_ini" == sButton || "sc_b_ret" == sButton)
      {
        if ("S" == Nav_permite_ret)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
      else
      {
        if ("S" == Nav_permite_ava)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
    }

    scAjaxElementDisplay(sButton        , sStatus);
    scAjaxElementDisplay(sButton + "_t" , sStatus);
    scAjaxElementDisplay(sButton + "_b" , sStatus);
    scAjaxElementDisplay(sButton2       , sStatus2);
    scAjaxElementDisplay(sButton2 + "_t", sStatus2);
    scAjaxElementDisplay(sButton2 + "_b", sStatus2);
  } // scAjaxNavigateButtonDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {

      if("off" == sAction)
      {
        $('#' + sElement).hide();
      }
      else
      {
        $('#' + sElement).show();
      }
      if (document.getElementById(sElement + "_dumb"))
      {
        if("off" == sAction)
        {
          $('#' + sElement + "_dumb").hide();
        }
        else
        {
          $('#' + sElement + "_dumb").show();
        }
      }
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        if (ajax_field_list[iLabel] && ajax_error_list[ajax_field_list[iLabel]])
        {
          scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
        }
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], scAjaxSpecCharParser(oResp["fieldLabel"][iLabel][1]));
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField) && document.getElementById("id_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("id_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        if (ajax_read_only[ oResp["readOnly"][iRead][0] ])
        {
          scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
        }
        else if (oResp["rsSize"])
        {
          for (var i = 0; i <= oResp["rsSize"]; i++)
          {
            if (ajax_read_only[ oResp["readOnly"][iRead][0] + i ])
            {
              scAjaxFieldRead(oResp["readOnly"][iRead][0] + i, oResp["readOnly"][iRead][1]);
            }
          }
        }
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = scAjaxSpecCharParser('" + oResp["btnVars"][iBtn][1] + "');");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scCheckPagesWithoutBlock()
  {
	var page_id, block_id, has_block_shown;
    for (page_id in ajax_page_blocks) {
	  has_block_shown = false;
      for (block_id in ajax_page_blocks[page_id]) {
		console.log(page_id + ' ' + ajax_page_blocks[page_id][block_id]);
		console.log($("#div_" + ajax_block_id[ajax_page_blocks[page_id][block_id]]).css('display'));
        //$("#div_" + ajax_block_id[block_id]);
      }
    }
  }

  function scAjaxJavascript()
  {
    if (oResp["ajaxJavascript"])
    {
      var sJsFunc = "";
      for (var i = 0; i < oResp["ajaxJavascript"].length; i++)
      {
        sJsFunc = scAjaxSpecCharParser(oResp["ajaxJavascript"][i][0]);
        if ("" != sJsFunc)
        {
          var aParam = new Array();
          if (oResp["ajaxJavascript"][i][1] && 0 < oResp["ajaxJavascript"][i][1].length)
          {
            for (var j = 0; j < oResp["ajaxJavascript"][i][1].length; j++)
            {
              aParam.push("'" + oResp["ajaxJavascript"][i][1][j] + "'");
            }
          }
          eval("if (" + sJsFunc + ") { " + sJsFunc + "(" + aParam.join(", ") + ") }");
        }
      }
    }
  } // scAjaxJavascript

  function scAjaxAlert()
  {
    if (oResp["ajaxAlert"] && oResp["ajaxAlert"]["message"] && "" != oResp["ajaxAlert"]["message"])
    {
      alert(oResp["ajaxAlert"]["message"]);
    }
  } // scAjaxAlert

  function scAjaxMessage(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["ajaxMessage"] && oResp["ajaxMessage"]["message"] && "" != oResp["ajaxMessage"]["message"])
    {
      var sTitle    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["title"])        ? oResp["ajaxMessage"]["title"]               : scMsgDefTitle,
          bModal    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["modal"])        ? ("Y" == oResp["ajaxMessage"]["modal"])      : false,
          iTimeout  = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["timeout"])      ? parseInt(oResp["ajaxMessage"]["timeout"])   : 0,
          bButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button"])       ? ("Y" == oResp["ajaxMessage"]["button"])     : false,
          sButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button_label"]) ? oResp["ajaxMessage"]["button_label"]        : "Ok",
          iTop      = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["top"])          ? parseInt(oResp["ajaxMessage"]["top"])       : 0,
          iLeft     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["left"])         ? parseInt(oResp["ajaxMessage"]["left"])      : 0,
          iWidth    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["width"])        ? parseInt(oResp["ajaxMessage"]["width"])     : 0,
          iHeight   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["height"])       ? parseInt(oResp["ajaxMessage"]["height"])    : 0,
          bClose    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["show_close"])   ? ("Y" == oResp["ajaxMessage"]["show_close"]) : true,
          bBodyIcon = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["body_icon"])    ? ("Y" == oResp["ajaxMessage"]["body_icon"])  : true,
          sRedir    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir"])        ? oResp["ajaxMessage"]["redir"]               : "",
          sTarget   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_target"]) ? oResp["ajaxMessage"]["redir_target"]        : "",
          sParam    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_par"])    ? oResp["ajaxMessage"]["redir_par"]           : "";
      if (typeof scDisplayUserMessage == "function") {
        scDisplayUserMessage(oResp["ajaxMessage"]["message"]);
      }
      else {
        _scAjaxShowMessage(sTitle, oResp["ajaxMessage"]["message"], bModal, iTimeout, bButton, sButton, iTop, iLeft, iWidth, iHeight, sRedir, sTarget, sParam, bClose, bBodyIcon);
      }
    }
  } // scAjaxAlert

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      input += "";
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      var input1 = input + "";
      while (input1.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input1 = input1.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input1;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine

  function scOpenMasterDetail(widget, url)
  {
	  var iframe = $(parent.document).find("[name='" +  widget+ "']");
	  iframe.attr("src", url);
  } // scOpenMasterDetail

  function scMoveMasterDetail(widget)
  {
	  var iframe = $(parent.document).find("[name='" +  widget+ "']");
	  iframe[0].contentWindow.nm_move("apl_detalhe", true);
  } // scMoveMasterDetail

  // ---------- Validate cd_cliente_
  function do_ajax_form_dbo_cliente_inline_validate_cd_cliente_()
  {
    var nomeCampo_cd_cliente_ = "cd_cliente_";
    var var_cd_cliente_ = scAjaxGetFieldHidden(nomeCampo_cd_cliente_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cd_cliente_(var_cd_cliente_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cd_cliente__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cd_cliente_

  function do_ajax_form_dbo_cliente_inline_validate_cd_cliente__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cd_cliente_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cd_cliente__cb

  // ---------- Validate razaosocial_
  function do_ajax_form_dbo_cliente_inline_validate_razaosocial_()
  {
    var nomeCampo_razaosocial_ = "razaosocial_";
    var var_razaosocial_ = scAjaxGetFieldText(nomeCampo_razaosocial_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_razaosocial_(var_razaosocial_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_razaosocial__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_razaosocial_

  function do_ajax_form_dbo_cliente_inline_validate_razaosocial__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "razaosocial_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_razaosocial__cb

  // ---------- Validate nomefantasia_
  function do_ajax_form_dbo_cliente_inline_validate_nomefantasia_()
  {
    var nomeCampo_nomefantasia_ = "nomefantasia_";
    var var_nomefantasia_ = scAjaxGetFieldText(nomeCampo_nomefantasia_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_nomefantasia_(var_nomefantasia_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_nomefantasia__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_nomefantasia_

  function do_ajax_form_dbo_cliente_inline_validate_nomefantasia__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nomefantasia_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_nomefantasia__cb

  // ---------- Validate cgc_
  function do_ajax_form_dbo_cliente_inline_validate_cgc_()
  {
    var nomeCampo_cgc_ = "cgc_";
    var var_cgc_ = scAjaxGetFieldText(nomeCampo_cgc_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cgc_(var_cgc_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cgc__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cgc_

  function do_ajax_form_dbo_cliente_inline_validate_cgc__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cgc_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cgc__cb

  // ---------- Validate inscricao_
  function do_ajax_form_dbo_cliente_inline_validate_inscricao_()
  {
    var nomeCampo_inscricao_ = "inscricao_";
    var var_inscricao_ = scAjaxGetFieldText(nomeCampo_inscricao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_inscricao_(var_inscricao_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_inscricao__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_inscricao_

  function do_ajax_form_dbo_cliente_inline_validate_inscricao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "inscricao_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_inscricao__cb

  // ---------- Validate endereco_
  function do_ajax_form_dbo_cliente_inline_validate_endereco_()
  {
    var nomeCampo_endereco_ = "endereco_";
    var var_endereco_ = scAjaxGetFieldText(nomeCampo_endereco_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_endereco_(var_endereco_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_endereco__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_endereco_

  function do_ajax_form_dbo_cliente_inline_validate_endereco__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "endereco_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_endereco__cb

  // ---------- Validate cidade_
  function do_ajax_form_dbo_cliente_inline_validate_cidade_()
  {
    var nomeCampo_cidade_ = "cidade_";
    var var_cidade_ = scAjaxGetFieldText(nomeCampo_cidade_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cidade_(var_cidade_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cidade__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cidade_

  function do_ajax_form_dbo_cliente_inline_validate_cidade__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cidade_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cidade__cb

  // ---------- Validate estado_
  function do_ajax_form_dbo_cliente_inline_validate_estado_()
  {
    var nomeCampo_estado_ = "estado_";
    var var_estado_ = scAjaxGetFieldText(nomeCampo_estado_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_estado_(var_estado_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_estado__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_estado_

  function do_ajax_form_dbo_cliente_inline_validate_estado__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estado_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_estado__cb

  // ---------- Validate bairro_
  function do_ajax_form_dbo_cliente_inline_validate_bairro_()
  {
    var nomeCampo_bairro_ = "bairro_";
    var var_bairro_ = scAjaxGetFieldText(nomeCampo_bairro_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_bairro_(var_bairro_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_bairro__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_bairro_

  function do_ajax_form_dbo_cliente_inline_validate_bairro__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "bairro_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_bairro__cb

  // ---------- Validate cep_
  function do_ajax_form_dbo_cliente_inline_validate_cep_()
  {
    var nomeCampo_cep_ = "cep_";
    var var_cep_ = scAjaxGetFieldText(nomeCampo_cep_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cep_(var_cep_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cep__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cep_

  function do_ajax_form_dbo_cliente_inline_validate_cep__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cep_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cep__cb

  // ---------- Validate email_
  function do_ajax_form_dbo_cliente_inline_validate_email_()
  {
    var nomeCampo_email_ = "email_";
    var var_email_ = scAjaxGetFieldText(nomeCampo_email_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_email_(var_email_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_email__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_email_

  function do_ajax_form_dbo_cliente_inline_validate_email__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "email_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_email__cb

  // ---------- Validate fone_
  function do_ajax_form_dbo_cliente_inline_validate_fone_()
  {
    var nomeCampo_fone_ = "fone_";
    var var_fone_ = scAjaxGetFieldText(nomeCampo_fone_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_fone_(var_fone_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_fone__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_fone_

  function do_ajax_form_dbo_cliente_inline_validate_fone__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fone_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_fone__cb

  // ---------- Validate fone1_
  function do_ajax_form_dbo_cliente_inline_validate_fone1_()
  {
    var nomeCampo_fone1_ = "fone1_";
    var var_fone1_ = scAjaxGetFieldText(nomeCampo_fone1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_fone1_(var_fone1_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_fone1__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_fone1_

  function do_ajax_form_dbo_cliente_inline_validate_fone1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fone1_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_fone1__cb

  // ---------- Validate fax_
  function do_ajax_form_dbo_cliente_inline_validate_fax_()
  {
    var nomeCampo_fax_ = "fax_";
    var var_fax_ = scAjaxGetFieldText(nomeCampo_fax_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_fax_(var_fax_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_fax__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_fax_

  function do_ajax_form_dbo_cliente_inline_validate_fax__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fax_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_fax__cb

  // ---------- Validate contato_
  function do_ajax_form_dbo_cliente_inline_validate_contato_()
  {
    var nomeCampo_contato_ = "contato_";
    var var_contato_ = scAjaxGetFieldText(nomeCampo_contato_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_contato_(var_contato_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_contato__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_contato_

  function do_ajax_form_dbo_cliente_inline_validate_contato__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contato_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_contato__cb

  // ---------- Validate enderecocobranca_
  function do_ajax_form_dbo_cliente_inline_validate_enderecocobranca_()
  {
    var nomeCampo_enderecocobranca_ = "enderecocobranca_";
    var var_enderecocobranca_ = scAjaxGetFieldText(nomeCampo_enderecocobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_enderecocobranca_(var_enderecocobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_enderecocobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_enderecocobranca_

  function do_ajax_form_dbo_cliente_inline_validate_enderecocobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "enderecocobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_enderecocobranca__cb

  // ---------- Validate cidadecobranca_
  function do_ajax_form_dbo_cliente_inline_validate_cidadecobranca_()
  {
    var nomeCampo_cidadecobranca_ = "cidadecobranca_";
    var var_cidadecobranca_ = scAjaxGetFieldText(nomeCampo_cidadecobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cidadecobranca_(var_cidadecobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cidadecobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cidadecobranca_

  function do_ajax_form_dbo_cliente_inline_validate_cidadecobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cidadecobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cidadecobranca__cb

  // ---------- Validate bairrocobranca_
  function do_ajax_form_dbo_cliente_inline_validate_bairrocobranca_()
  {
    var nomeCampo_bairrocobranca_ = "bairrocobranca_";
    var var_bairrocobranca_ = scAjaxGetFieldText(nomeCampo_bairrocobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_bairrocobranca_(var_bairrocobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_bairrocobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_bairrocobranca_

  function do_ajax_form_dbo_cliente_inline_validate_bairrocobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "bairrocobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_bairrocobranca__cb

  // ---------- Validate estadocobranca_
  function do_ajax_form_dbo_cliente_inline_validate_estadocobranca_()
  {
    var nomeCampo_estadocobranca_ = "estadocobranca_";
    var var_estadocobranca_ = scAjaxGetFieldText(nomeCampo_estadocobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_estadocobranca_(var_estadocobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_estadocobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_estadocobranca_

  function do_ajax_form_dbo_cliente_inline_validate_estadocobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estadocobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_estadocobranca__cb

  // ---------- Validate cepcobranca_
  function do_ajax_form_dbo_cliente_inline_validate_cepcobranca_()
  {
    var nomeCampo_cepcobranca_ = "cepcobranca_";
    var var_cepcobranca_ = scAjaxGetFieldText(nomeCampo_cepcobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cepcobranca_(var_cepcobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cepcobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cepcobranca_

  function do_ajax_form_dbo_cliente_inline_validate_cepcobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cepcobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cepcobranca__cb

  // ---------- Validate fonecobranca_
  function do_ajax_form_dbo_cliente_inline_validate_fonecobranca_()
  {
    var nomeCampo_fonecobranca_ = "fonecobranca_";
    var var_fonecobranca_ = scAjaxGetFieldText(nomeCampo_fonecobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_fonecobranca_(var_fonecobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_fonecobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_fonecobranca_

  function do_ajax_form_dbo_cliente_inline_validate_fonecobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fonecobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_fonecobranca__cb

  // ---------- Validate faxcobranca_
  function do_ajax_form_dbo_cliente_inline_validate_faxcobranca_()
  {
    var nomeCampo_faxcobranca_ = "faxcobranca_";
    var var_faxcobranca_ = scAjaxGetFieldText(nomeCampo_faxcobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_faxcobranca_(var_faxcobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_faxcobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_faxcobranca_

  function do_ajax_form_dbo_cliente_inline_validate_faxcobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "faxcobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_faxcobranca__cb

  // ---------- Validate contatocobranca_
  function do_ajax_form_dbo_cliente_inline_validate_contatocobranca_()
  {
    var nomeCampo_contatocobranca_ = "contatocobranca_";
    var var_contatocobranca_ = scAjaxGetFieldText(nomeCampo_contatocobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_contatocobranca_(var_contatocobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_contatocobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_contatocobranca_

  function do_ajax_form_dbo_cliente_inline_validate_contatocobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contatocobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_contatocobranca__cb

  // ---------- Validate cgcentrega_
  function do_ajax_form_dbo_cliente_inline_validate_cgcentrega_()
  {
    var nomeCampo_cgcentrega_ = "cgcentrega_";
    var var_cgcentrega_ = scAjaxGetFieldText(nomeCampo_cgcentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cgcentrega_(var_cgcentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cgcentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cgcentrega_

  function do_ajax_form_dbo_cliente_inline_validate_cgcentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cgcentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cgcentrega__cb

  // ---------- Validate inscricaoentrega_
  function do_ajax_form_dbo_cliente_inline_validate_inscricaoentrega_()
  {
    var nomeCampo_inscricaoentrega_ = "inscricaoentrega_";
    var var_inscricaoentrega_ = scAjaxGetFieldText(nomeCampo_inscricaoentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_inscricaoentrega_(var_inscricaoentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_inscricaoentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_inscricaoentrega_

  function do_ajax_form_dbo_cliente_inline_validate_inscricaoentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "inscricaoentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_inscricaoentrega__cb

  // ---------- Validate enderecoentrega_
  function do_ajax_form_dbo_cliente_inline_validate_enderecoentrega_()
  {
    var nomeCampo_enderecoentrega_ = "enderecoentrega_";
    var var_enderecoentrega_ = scAjaxGetFieldText(nomeCampo_enderecoentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_enderecoentrega_(var_enderecoentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_enderecoentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_enderecoentrega_

  function do_ajax_form_dbo_cliente_inline_validate_enderecoentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "enderecoentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_enderecoentrega__cb

  // ---------- Validate cidadeentrega_
  function do_ajax_form_dbo_cliente_inline_validate_cidadeentrega_()
  {
    var nomeCampo_cidadeentrega_ = "cidadeentrega_";
    var var_cidadeentrega_ = scAjaxGetFieldText(nomeCampo_cidadeentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cidadeentrega_(var_cidadeentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cidadeentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cidadeentrega_

  function do_ajax_form_dbo_cliente_inline_validate_cidadeentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cidadeentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cidadeentrega__cb

  // ---------- Validate bairroentrega_
  function do_ajax_form_dbo_cliente_inline_validate_bairroentrega_()
  {
    var nomeCampo_bairroentrega_ = "bairroentrega_";
    var var_bairroentrega_ = scAjaxGetFieldText(nomeCampo_bairroentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_bairroentrega_(var_bairroentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_bairroentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_bairroentrega_

  function do_ajax_form_dbo_cliente_inline_validate_bairroentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "bairroentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_bairroentrega__cb

  // ---------- Validate estadoentrega_
  function do_ajax_form_dbo_cliente_inline_validate_estadoentrega_()
  {
    var nomeCampo_estadoentrega_ = "estadoentrega_";
    var var_estadoentrega_ = scAjaxGetFieldText(nomeCampo_estadoentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_estadoentrega_(var_estadoentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_estadoentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_estadoentrega_

  function do_ajax_form_dbo_cliente_inline_validate_estadoentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estadoentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_estadoentrega__cb

  // ---------- Validate cepentrega_
  function do_ajax_form_dbo_cliente_inline_validate_cepentrega_()
  {
    var nomeCampo_cepentrega_ = "cepentrega_";
    var var_cepentrega_ = scAjaxGetFieldText(nomeCampo_cepentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_cepentrega_(var_cepentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_cepentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_cepentrega_

  function do_ajax_form_dbo_cliente_inline_validate_cepentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cepentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_cepentrega__cb

  // ---------- Validate foneentrega_
  function do_ajax_form_dbo_cliente_inline_validate_foneentrega_()
  {
    var nomeCampo_foneentrega_ = "foneentrega_";
    var var_foneentrega_ = scAjaxGetFieldText(nomeCampo_foneentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_foneentrega_(var_foneentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_foneentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_foneentrega_

  function do_ajax_form_dbo_cliente_inline_validate_foneentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "foneentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_foneentrega__cb

  // ---------- Validate contatoentrega_
  function do_ajax_form_dbo_cliente_inline_validate_contatoentrega_()
  {
    var nomeCampo_contatoentrega_ = "contatoentrega_";
    var var_contatoentrega_ = scAjaxGetFieldText(nomeCampo_contatoentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_contatoentrega_(var_contatoentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_contatoentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_contatoentrega_

  function do_ajax_form_dbo_cliente_inline_validate_contatoentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contatoentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_contatoentrega__cb

  // ---------- Validate contatoexpedicao_
  function do_ajax_form_dbo_cliente_inline_validate_contatoexpedicao_()
  {
    var nomeCampo_contatoexpedicao_ = "contatoexpedicao_";
    var var_contatoexpedicao_ = scAjaxGetFieldText(nomeCampo_contatoexpedicao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_contatoexpedicao_(var_contatoexpedicao_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_contatoexpedicao__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_contatoexpedicao_

  function do_ajax_form_dbo_cliente_inline_validate_contatoexpedicao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contatoexpedicao_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_contatoexpedicao__cb

  // ---------- Validate foneexpedicao_
  function do_ajax_form_dbo_cliente_inline_validate_foneexpedicao_()
  {
    var nomeCampo_foneexpedicao_ = "foneexpedicao_";
    var var_foneexpedicao_ = scAjaxGetFieldText(nomeCampo_foneexpedicao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_foneexpedicao_(var_foneexpedicao_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_foneexpedicao__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_foneexpedicao_

  function do_ajax_form_dbo_cliente_inline_validate_foneexpedicao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "foneexpedicao_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_foneexpedicao__cb

  // ---------- Validate datacadastro_
  function do_ajax_form_dbo_cliente_inline_validate_datacadastro_()
  {
    var nomeCampo_datacadastro_ = "datacadastro_";
    var var_datacadastro_ = scAjaxGetFieldText(nomeCampo_datacadastro_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_datacadastro_(var_datacadastro_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_datacadastro__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_datacadastro_

  function do_ajax_form_dbo_cliente_inline_validate_datacadastro__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "datacadastro_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_datacadastro__cb

  // ---------- Validate obs_
  function do_ajax_form_dbo_cliente_inline_validate_obs_()
  {
    var nomeCampo_obs_ = "obs_";
    var var_obs_ = scAjaxGetFieldText(nomeCampo_obs_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_obs_(var_obs_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_obs__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_obs_

  function do_ajax_form_dbo_cliente_inline_validate_obs__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "obs_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_obs__cb

  // ---------- Validate tipo_
  function do_ajax_form_dbo_cliente_inline_validate_tipo_()
  {
    var nomeCampo_tipo_ = "tipo_";
    var var_tipo_ = scAjaxGetFieldText(nomeCampo_tipo_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_tipo_(var_tipo_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_tipo__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_tipo_

  function do_ajax_form_dbo_cliente_inline_validate_tipo__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipo_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_tipo__cb

  // ---------- Validate consumidor_
  function do_ajax_form_dbo_cliente_inline_validate_consumidor_()
  {
    var nomeCampo_consumidor_ = "consumidor_";
    var var_consumidor_ = scAjaxGetFieldText(nomeCampo_consumidor_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_consumidor_(var_consumidor_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_consumidor__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_consumidor_

  function do_ajax_form_dbo_cliente_inline_validate_consumidor__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "consumidor_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_consumidor__cb

  // ---------- Validate licensa_
  function do_ajax_form_dbo_cliente_inline_validate_licensa_()
  {
    var nomeCampo_licensa_ = "licensa_";
    var var_licensa_ = scAjaxGetFieldText(nomeCampo_licensa_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_licensa_(var_licensa_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_licensa__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_licensa_

  function do_ajax_form_dbo_cliente_inline_validate_licensa__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "licensa_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_licensa__cb

  // ---------- Validate venctolicensa_
  function do_ajax_form_dbo_cliente_inline_validate_venctolicensa_()
  {
    var nomeCampo_venctolicensa_ = "venctolicensa_";
    var var_venctolicensa_ = scAjaxGetFieldText(nomeCampo_venctolicensa_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_venctolicensa_(var_venctolicensa_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_venctolicensa__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_venctolicensa_

  function do_ajax_form_dbo_cliente_inline_validate_venctolicensa__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "venctolicensa_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_venctolicensa__cb

  // ---------- Validate licensa1_
  function do_ajax_form_dbo_cliente_inline_validate_licensa1_()
  {
    var nomeCampo_licensa1_ = "licensa1_";
    var var_licensa1_ = scAjaxGetFieldText(nomeCampo_licensa1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_licensa1_(var_licensa1_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_licensa1__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_licensa1_

  function do_ajax_form_dbo_cliente_inline_validate_licensa1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "licensa1_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_licensa1__cb

  // ---------- Validate venctolicensa1_
  function do_ajax_form_dbo_cliente_inline_validate_venctolicensa1_()
  {
    var nomeCampo_venctolicensa1_ = "venctolicensa1_";
    var var_venctolicensa1_ = scAjaxGetFieldText(nomeCampo_venctolicensa1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_venctolicensa1_(var_venctolicensa1_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_venctolicensa1__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_venctolicensa1_

  function do_ajax_form_dbo_cliente_inline_validate_venctolicensa1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "venctolicensa1_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_venctolicensa1__cb

  // ---------- Validate qtdeliberada_
  function do_ajax_form_dbo_cliente_inline_validate_qtdeliberada_()
  {
    var nomeCampo_qtdeliberada_ = "qtdeliberada_";
    var var_qtdeliberada_ = scAjaxGetFieldText(nomeCampo_qtdeliberada_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_qtdeliberada_(var_qtdeliberada_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_qtdeliberada__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_qtdeliberada_

  function do_ajax_form_dbo_cliente_inline_validate_qtdeliberada__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "qtdeliberada_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_qtdeliberada__cb

  // ---------- Validate licensa2_
  function do_ajax_form_dbo_cliente_inline_validate_licensa2_()
  {
    var nomeCampo_licensa2_ = "licensa2_";
    var var_licensa2_ = scAjaxGetFieldText(nomeCampo_licensa2_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_licensa2_(var_licensa2_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_licensa2__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_licensa2_

  function do_ajax_form_dbo_cliente_inline_validate_licensa2__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "licensa2_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_licensa2__cb

  // ---------- Validate venctolicensa2_
  function do_ajax_form_dbo_cliente_inline_validate_venctolicensa2_()
  {
    var nomeCampo_venctolicensa2_ = "venctolicensa2_";
    var var_venctolicensa2_ = scAjaxGetFieldText(nomeCampo_venctolicensa2_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_venctolicensa2_(var_venctolicensa2_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_venctolicensa2__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_venctolicensa2_

  function do_ajax_form_dbo_cliente_inline_validate_venctolicensa2__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "venctolicensa2_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_venctolicensa2__cb

  // ---------- Validate icms_
  function do_ajax_form_dbo_cliente_inline_validate_icms_()
  {
    var nomeCampo_icms_ = "icms_";
    var var_icms_ = scAjaxGetFieldText(nomeCampo_icms_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_icms_(var_icms_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_icms__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_icms_

  function do_ajax_form_dbo_cliente_inline_validate_icms__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "icms_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_icms__cb

  // ---------- Validate suframa_
  function do_ajax_form_dbo_cliente_inline_validate_suframa_()
  {
    var nomeCampo_suframa_ = "suframa_";
    var var_suframa_ = scAjaxGetFieldText(nomeCampo_suframa_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_suframa_(var_suframa_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_suframa__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_suframa_

  function do_ajax_form_dbo_cliente_inline_validate_suframa__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "suframa_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_suframa__cb

  // ---------- Validate limitecredito_
  function do_ajax_form_dbo_cliente_inline_validate_limitecredito_()
  {
    var nomeCampo_limitecredito_ = "limitecredito_";
    var var_limitecredito_ = scAjaxGetFieldText(nomeCampo_limitecredito_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_limitecredito_(var_limitecredito_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_limitecredito__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_limitecredito_

  function do_ajax_form_dbo_cliente_inline_validate_limitecredito__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "limitecredito_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_limitecredito__cb

  // ---------- Validate vendedor_
  function do_ajax_form_dbo_cliente_inline_validate_vendedor_()
  {
    var nomeCampo_vendedor_ = "vendedor_";
    var var_vendedor_ = scAjaxGetFieldText(nomeCampo_vendedor_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_vendedor_(var_vendedor_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_vendedor__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_vendedor_

  function do_ajax_form_dbo_cliente_inline_validate_vendedor__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "vendedor_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_vendedor__cb

  // ---------- Validate restricao_
  function do_ajax_form_dbo_cliente_inline_validate_restricao_()
  {
    var nomeCampo_restricao_ = "restricao_";
    var var_restricao_ = scAjaxGetFieldText(nomeCampo_restricao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_restricao_(var_restricao_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_restricao__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_restricao_

  function do_ajax_form_dbo_cliente_inline_validate_restricao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "restricao_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_restricao__cb

  // ---------- Validate comissao_
  function do_ajax_form_dbo_cliente_inline_validate_comissao_()
  {
    var nomeCampo_comissao_ = "comissao_";
    var var_comissao_ = scAjaxGetFieldText(nomeCampo_comissao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_comissao_(var_comissao_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_comissao__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_comissao_

  function do_ajax_form_dbo_cliente_inline_validate_comissao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "comissao_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_comissao__cb

  // ---------- Validate transportadora_
  function do_ajax_form_dbo_cliente_inline_validate_transportadora_()
  {
    var nomeCampo_transportadora_ = "transportadora_";
    var var_transportadora_ = scAjaxGetFieldText(nomeCampo_transportadora_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_transportadora_(var_transportadora_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_transportadora__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_transportadora_

  function do_ajax_form_dbo_cliente_inline_validate_transportadora__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "transportadora_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_transportadora__cb

  // ---------- Validate coleta_
  function do_ajax_form_dbo_cliente_inline_validate_coleta_()
  {
    var nomeCampo_coleta_ = "coleta_";
    var var_coleta_ = scAjaxGetFieldText(nomeCampo_coleta_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_coleta_(var_coleta_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_coleta__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_coleta_

  function do_ajax_form_dbo_cliente_inline_validate_coleta__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "coleta_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_coleta__cb

  // ---------- Validate segmento_
  function do_ajax_form_dbo_cliente_inline_validate_segmento_()
  {
    var nomeCampo_segmento_ = "segmento_";
    var var_segmento_ = scAjaxGetFieldText(nomeCampo_segmento_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_segmento_(var_segmento_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_segmento__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_segmento_

  function do_ajax_form_dbo_cliente_inline_validate_segmento__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "segmento_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_segmento__cb

  // ---------- Validate dataalteracao_
  function do_ajax_form_dbo_cliente_inline_validate_dataalteracao_()
  {
    var nomeCampo_dataalteracao_ = "dataalteracao_";
    var var_dataalteracao_ = scAjaxGetFieldText(nomeCampo_dataalteracao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_dataalteracao_(var_dataalteracao_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_dataalteracao__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_dataalteracao_

  function do_ajax_form_dbo_cliente_inline_validate_dataalteracao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dataalteracao_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_dataalteracao__cb

  // ---------- Validate usuario_
  function do_ajax_form_dbo_cliente_inline_validate_usuario_()
  {
    var nomeCampo_usuario_ = "usuario_";
    var var_usuario_ = scAjaxGetFieldText(nomeCampo_usuario_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_usuario_(var_usuario_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_usuario__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_usuario_

  function do_ajax_form_dbo_cliente_inline_validate_usuario__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "usuario_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_usuario__cb

  // ---------- Validate requisitos_
  function do_ajax_form_dbo_cliente_inline_validate_requisitos_()
  {
    var nomeCampo_requisitos_ = "requisitos_";
    var var_requisitos_ = scAjaxGetFieldText(nomeCampo_requisitos_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_requisitos_(var_requisitos_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_requisitos__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_requisitos_

  function do_ajax_form_dbo_cliente_inline_validate_requisitos__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "requisitos_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_requisitos__cb

  // ---------- Validate banco_
  function do_ajax_form_dbo_cliente_inline_validate_banco_()
  {
    var nomeCampo_banco_ = "banco_";
    var var_banco_ = scAjaxGetFieldText(nomeCampo_banco_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_banco_(var_banco_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_banco__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_banco_

  function do_ajax_form_dbo_cliente_inline_validate_banco__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "banco_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_banco__cb

  // ---------- Validate emailcobranca_
  function do_ajax_form_dbo_cliente_inline_validate_emailcobranca_()
  {
    var nomeCampo_emailcobranca_ = "emailcobranca_";
    var var_emailcobranca_ = scAjaxGetFieldText(nomeCampo_emailcobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_emailcobranca_(var_emailcobranca_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_emailcobranca__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_emailcobranca_

  function do_ajax_form_dbo_cliente_inline_validate_emailcobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "emailcobranca_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_emailcobranca__cb

  // ---------- Validate emailtecnico_
  function do_ajax_form_dbo_cliente_inline_validate_emailtecnico_()
  {
    var nomeCampo_emailtecnico_ = "emailtecnico_";
    var var_emailtecnico_ = scAjaxGetFieldText(nomeCampo_emailtecnico_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_emailtecnico_(var_emailtecnico_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_emailtecnico__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_emailtecnico_

  function do_ajax_form_dbo_cliente_inline_validate_emailtecnico__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "emailtecnico_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_emailtecnico__cb

  // ---------- Validate midia_
  function do_ajax_form_dbo_cliente_inline_validate_midia_()
  {
    var nomeCampo_midia_ = "midia_";
    var var_midia_ = scAjaxGetFieldText(nomeCampo_midia_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_midia_(var_midia_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_midia__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_midia_

  function do_ajax_form_dbo_cliente_inline_validate_midia__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "midia_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_midia__cb

  // ---------- Validate seg_
  function do_ajax_form_dbo_cliente_inline_validate_seg_()
  {
    var nomeCampo_seg_ = "seg_";
    var var_seg_ = scAjaxGetFieldText(nomeCampo_seg_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_seg_(var_seg_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_seg__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_seg_

  function do_ajax_form_dbo_cliente_inline_validate_seg__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "seg_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_seg__cb

  // ---------- Validate ter_
  function do_ajax_form_dbo_cliente_inline_validate_ter_()
  {
    var nomeCampo_ter_ = "ter_";
    var var_ter_ = scAjaxGetFieldText(nomeCampo_ter_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_ter_(var_ter_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_ter__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_ter_

  function do_ajax_form_dbo_cliente_inline_validate_ter__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ter_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_ter__cb

  // ---------- Validate qua_
  function do_ajax_form_dbo_cliente_inline_validate_qua_()
  {
    var nomeCampo_qua_ = "qua_";
    var var_qua_ = scAjaxGetFieldText(nomeCampo_qua_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_qua_(var_qua_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_qua__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_qua_

  function do_ajax_form_dbo_cliente_inline_validate_qua__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "qua_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_qua__cb

  // ---------- Validate qui_
  function do_ajax_form_dbo_cliente_inline_validate_qui_()
  {
    var nomeCampo_qui_ = "qui_";
    var var_qui_ = scAjaxGetFieldText(nomeCampo_qui_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_qui_(var_qui_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_qui__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_qui_

  function do_ajax_form_dbo_cliente_inline_validate_qui__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "qui_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_qui__cb

  // ---------- Validate sex_
  function do_ajax_form_dbo_cliente_inline_validate_sex_()
  {
    var nomeCampo_sex_ = "sex_";
    var var_sex_ = scAjaxGetFieldText(nomeCampo_sex_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_sex_(var_sex_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_sex__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_sex_

  function do_ajax_form_dbo_cliente_inline_validate_sex__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sex_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_sex__cb

  // ---------- Validate certificado_
  function do_ajax_form_dbo_cliente_inline_validate_certificado_()
  {
    var nomeCampo_certificado_ = "certificado_";
    var var_certificado_ = scAjaxGetFieldText(nomeCampo_certificado_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_certificado_(var_certificado_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_certificado__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_certificado_

  function do_ajax_form_dbo_cliente_inline_validate_certificado__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "certificado_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_certificado__cb

  // ---------- Validate emailnfe_
  function do_ajax_form_dbo_cliente_inline_validate_emailnfe_()
  {
    var nomeCampo_emailnfe_ = "emailnfe_";
    var var_emailnfe_ = scAjaxGetFieldText(nomeCampo_emailnfe_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_emailnfe_(var_emailnfe_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_emailnfe__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_emailnfe_

  function do_ajax_form_dbo_cliente_inline_validate_emailnfe__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "emailnfe_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_emailnfe__cb

  // ---------- Validate fundacao_
  function do_ajax_form_dbo_cliente_inline_validate_fundacao_()
  {
    var nomeCampo_fundacao_ = "fundacao_";
    var var_fundacao_ = scAjaxGetFieldText(nomeCampo_fundacao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_fundacao_(var_fundacao_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_fundacao__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_fundacao_

  function do_ajax_form_dbo_cliente_inline_validate_fundacao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fundacao_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_fundacao__cb

  // ---------- Validate site_
  function do_ajax_form_dbo_cliente_inline_validate_site_()
  {
    var nomeCampo_site_ = "site_";
    var var_site_ = scAjaxGetFieldText(nomeCampo_site_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_site_(var_site_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_site__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_site_

  function do_ajax_form_dbo_cliente_inline_validate_site__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "site_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_site__cb

  // ---------- Validate financeiro_
  function do_ajax_form_dbo_cliente_inline_validate_financeiro_()
  {
    var nomeCampo_financeiro_ = "financeiro_";
    var var_financeiro_ = scAjaxGetFieldText(nomeCampo_financeiro_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_financeiro_(var_financeiro_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_financeiro__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_financeiro_

  function do_ajax_form_dbo_cliente_inline_validate_financeiro__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "financeiro_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_financeiro__cb

  // ---------- Validate numero_
  function do_ajax_form_dbo_cliente_inline_validate_numero_()
  {
    var nomeCampo_numero_ = "numero_";
    var var_numero_ = scAjaxGetFieldText(nomeCampo_numero_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_numero_(var_numero_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_numero__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_numero_

  function do_ajax_form_dbo_cliente_inline_validate_numero__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "numero_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_numero__cb

  // ---------- Validate complemento_
  function do_ajax_form_dbo_cliente_inline_validate_complemento_()
  {
    var nomeCampo_complemento_ = "complemento_";
    var var_complemento_ = scAjaxGetFieldText(nomeCampo_complemento_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_complemento_(var_complemento_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_complemento__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_complemento_

  function do_ajax_form_dbo_cliente_inline_validate_complemento__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "complemento_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_complemento__cb

  // ---------- Validate razaosocialentrega_
  function do_ajax_form_dbo_cliente_inline_validate_razaosocialentrega_()
  {
    var nomeCampo_razaosocialentrega_ = "razaosocialentrega_";
    var var_razaosocialentrega_ = scAjaxGetFieldText(nomeCampo_razaosocialentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_razaosocialentrega_(var_razaosocialentrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_razaosocialentrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_razaosocialentrega_

  function do_ajax_form_dbo_cliente_inline_validate_razaosocialentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "razaosocialentrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_razaosocialentrega__cb

  // ---------- Validate entrega_
  function do_ajax_form_dbo_cliente_inline_validate_entrega_()
  {
    var nomeCampo_entrega_ = "entrega_";
    var var_entrega_ = scAjaxGetFieldText(nomeCampo_entrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_entrega_(var_entrega_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_entrega__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_entrega_

  function do_ajax_form_dbo_cliente_inline_validate_entrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "entrega_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_entrega__cb

  // ---------- Validate contatotecnico_
  function do_ajax_form_dbo_cliente_inline_validate_contatotecnico_()
  {
    var nomeCampo_contatotecnico_ = "contatotecnico_";
    var var_contatotecnico_ = scAjaxGetFieldText(nomeCampo_contatotecnico_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_inline_validate_contatotecnico_(var_contatotecnico_, var_script_case_init, do_ajax_form_dbo_cliente_inline_validate_contatotecnico__cb);
  } // do_ajax_form_dbo_cliente_inline_validate_contatotecnico_

  function do_ajax_form_dbo_cliente_inline_validate_contatotecnico__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "contatotecnico_";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_inline_validate_contatotecnico__cb
  // ---------- Form
  function do_ajax_form_dbo_cliente_inline_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_dbo_cliente_inline_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_cd_cliente_ = scAjaxGetFieldHidden("cd_cliente_");
    var var_razaosocial_ = scAjaxGetFieldText("razaosocial_");
    var var_nomefantasia_ = scAjaxGetFieldText("nomefantasia_");
    var var_cgc_ = scAjaxGetFieldText("cgc_");
    var var_inscricao_ = scAjaxGetFieldText("inscricao_");
    var var_endereco_ = scAjaxGetFieldText("endereco_");
    var var_cidade_ = scAjaxGetFieldText("cidade_");
    var var_estado_ = scAjaxGetFieldText("estado_");
    var var_bairro_ = scAjaxGetFieldText("bairro_");
    var var_cep_ = scAjaxGetFieldText("cep_");
    var var_email_ = scAjaxGetFieldText("email_");
    var var_fone_ = scAjaxGetFieldText("fone_");
    var var_fone1_ = scAjaxGetFieldText("fone1_");
    var var_fax_ = scAjaxGetFieldText("fax_");
    var var_contato_ = scAjaxGetFieldText("contato_");
    var var_enderecocobranca_ = scAjaxGetFieldText("enderecocobranca_");
    var var_cidadecobranca_ = scAjaxGetFieldText("cidadecobranca_");
    var var_bairrocobranca_ = scAjaxGetFieldText("bairrocobranca_");
    var var_estadocobranca_ = scAjaxGetFieldText("estadocobranca_");
    var var_cepcobranca_ = scAjaxGetFieldText("cepcobranca_");
    var var_fonecobranca_ = scAjaxGetFieldText("fonecobranca_");
    var var_faxcobranca_ = scAjaxGetFieldText("faxcobranca_");
    var var_contatocobranca_ = scAjaxGetFieldText("contatocobranca_");
    var var_cgcentrega_ = scAjaxGetFieldText("cgcentrega_");
    var var_inscricaoentrega_ = scAjaxGetFieldText("inscricaoentrega_");
    var var_enderecoentrega_ = scAjaxGetFieldText("enderecoentrega_");
    var var_cidadeentrega_ = scAjaxGetFieldText("cidadeentrega_");
    var var_bairroentrega_ = scAjaxGetFieldText("bairroentrega_");
    var var_estadoentrega_ = scAjaxGetFieldText("estadoentrega_");
    var var_cepentrega_ = scAjaxGetFieldText("cepentrega_");
    var var_foneentrega_ = scAjaxGetFieldText("foneentrega_");
    var var_contatoentrega_ = scAjaxGetFieldText("contatoentrega_");
    var var_contatoexpedicao_ = scAjaxGetFieldText("contatoexpedicao_");
    var var_foneexpedicao_ = scAjaxGetFieldText("foneexpedicao_");
    var var_datacadastro_ = scAjaxGetFieldText("datacadastro_");
    var var_obs_ = scAjaxGetFieldText("obs_");
    var var_tipo_ = scAjaxGetFieldText("tipo_");
    var var_consumidor_ = scAjaxGetFieldText("consumidor_");
    var var_licensa_ = scAjaxGetFieldText("licensa_");
    var var_venctolicensa_ = scAjaxGetFieldText("venctolicensa_");
    var var_licensa1_ = scAjaxGetFieldText("licensa1_");
    var var_venctolicensa1_ = scAjaxGetFieldText("venctolicensa1_");
    var var_qtdeliberada_ = scAjaxGetFieldText("qtdeliberada_");
    var var_licensa2_ = scAjaxGetFieldText("licensa2_");
    var var_venctolicensa2_ = scAjaxGetFieldText("venctolicensa2_");
    var var_icms_ = scAjaxGetFieldText("icms_");
    var var_suframa_ = scAjaxGetFieldText("suframa_");
    var var_limitecredito_ = scAjaxGetFieldText("limitecredito_");
    var var_vendedor_ = scAjaxGetFieldText("vendedor_");
    var var_restricao_ = scAjaxGetFieldText("restricao_");
    var var_comissao_ = scAjaxGetFieldText("comissao_");
    var var_transportadora_ = scAjaxGetFieldText("transportadora_");
    var var_coleta_ = scAjaxGetFieldText("coleta_");
    var var_segmento_ = scAjaxGetFieldText("segmento_");
    var var_dataalteracao_ = scAjaxGetFieldText("dataalteracao_");
    var var_usuario_ = scAjaxGetFieldText("usuario_");
    var var_requisitos_ = scAjaxGetFieldText("requisitos_");
    var var_banco_ = scAjaxGetFieldText("banco_");
    var var_emailcobranca_ = scAjaxGetFieldText("emailcobranca_");
    var var_emailtecnico_ = scAjaxGetFieldText("emailtecnico_");
    var var_midia_ = scAjaxGetFieldText("midia_");
    var var_seg_ = scAjaxGetFieldText("seg_");
    var var_ter_ = scAjaxGetFieldText("ter_");
    var var_qua_ = scAjaxGetFieldText("qua_");
    var var_qui_ = scAjaxGetFieldText("qui_");
    var var_sex_ = scAjaxGetFieldText("sex_");
    var var_certificado_ = scAjaxGetFieldText("certificado_");
    var var_emailnfe_ = scAjaxGetFieldText("emailnfe_");
    var var_fundacao_ = scAjaxGetFieldText("fundacao_");
    var var_site_ = scAjaxGetFieldText("site_");
    var var_financeiro_ = scAjaxGetFieldText("financeiro_");
    var var_numero_ = scAjaxGetFieldText("numero_");
    var var_complemento_ = scAjaxGetFieldText("complemento_");
    var var_razaosocialentrega_ = scAjaxGetFieldText("razaosocialentrega_");
    var var_entrega_ = scAjaxGetFieldText("entrega_");
    var var_contatotecnico_ = scAjaxGetFieldText("contatotecnico_");
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_form_dbo_cliente_inline_submit_form(var_cd_cliente_, var_razaosocial_, var_nomefantasia_, var_cgc_, var_inscricao_, var_endereco_, var_cidade_, var_estado_, var_bairro_, var_cep_, var_email_, var_fone_, var_fone1_, var_fax_, var_contato_, var_enderecocobranca_, var_cidadecobranca_, var_bairrocobranca_, var_estadocobranca_, var_cepcobranca_, var_fonecobranca_, var_faxcobranca_, var_contatocobranca_, var_cgcentrega_, var_inscricaoentrega_, var_enderecoentrega_, var_cidadeentrega_, var_bairroentrega_, var_estadoentrega_, var_cepentrega_, var_foneentrega_, var_contatoentrega_, var_contatoexpedicao_, var_foneexpedicao_, var_datacadastro_, var_obs_, var_tipo_, var_consumidor_, var_licensa_, var_venctolicensa_, var_licensa1_, var_venctolicensa1_, var_qtdeliberada_, var_licensa2_, var_venctolicensa2_, var_icms_, var_suframa_, var_limitecredito_, var_vendedor_, var_restricao_, var_comissao_, var_transportadora_, var_coleta_, var_segmento_, var_dataalteracao_, var_usuario_, var_requisitos_, var_banco_, var_emailcobranca_, var_emailtecnico_, var_midia_, var_seg_, var_ter_, var_qua_, var_qui_, var_sex_, var_certificado_, var_emailnfe_, var_fundacao_, var_site_, var_financeiro_, var_numero_, var_complemento_, var_razaosocialentrega_, var_entrega_, var_contatotecnico_, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_dbo_cliente_inline_submit_form_cb);
  } // do_ajax_form_dbo_cliente_inline_submit_form

  function do_ajax_form_dbo_cliente_inline_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxCalendarReload();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk())
    {
      scAjaxShowMessage();
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("cd_cliente_");
      scAjaxHideErrorDisplay("razaosocial_");
      scAjaxHideErrorDisplay("nomefantasia_");
      scAjaxHideErrorDisplay("cgc_");
      scAjaxHideErrorDisplay("inscricao_");
      scAjaxHideErrorDisplay("endereco_");
      scAjaxHideErrorDisplay("cidade_");
      scAjaxHideErrorDisplay("estado_");
      scAjaxHideErrorDisplay("bairro_");
      scAjaxHideErrorDisplay("cep_");
      scAjaxHideErrorDisplay("email_");
      scAjaxHideErrorDisplay("fone_");
      scAjaxHideErrorDisplay("fone1_");
      scAjaxHideErrorDisplay("fax_");
      scAjaxHideErrorDisplay("contato_");
      scAjaxHideErrorDisplay("enderecocobranca_");
      scAjaxHideErrorDisplay("cidadecobranca_");
      scAjaxHideErrorDisplay("bairrocobranca_");
      scAjaxHideErrorDisplay("estadocobranca_");
      scAjaxHideErrorDisplay("cepcobranca_");
      scAjaxHideErrorDisplay("fonecobranca_");
      scAjaxHideErrorDisplay("faxcobranca_");
      scAjaxHideErrorDisplay("contatocobranca_");
      scAjaxHideErrorDisplay("cgcentrega_");
      scAjaxHideErrorDisplay("inscricaoentrega_");
      scAjaxHideErrorDisplay("enderecoentrega_");
      scAjaxHideErrorDisplay("cidadeentrega_");
      scAjaxHideErrorDisplay("bairroentrega_");
      scAjaxHideErrorDisplay("estadoentrega_");
      scAjaxHideErrorDisplay("cepentrega_");
      scAjaxHideErrorDisplay("foneentrega_");
      scAjaxHideErrorDisplay("contatoentrega_");
      scAjaxHideErrorDisplay("contatoexpedicao_");
      scAjaxHideErrorDisplay("foneexpedicao_");
      scAjaxHideErrorDisplay("datacadastro_");
      scAjaxHideErrorDisplay("obs_");
      scAjaxHideErrorDisplay("tipo_");
      scAjaxHideErrorDisplay("consumidor_");
      scAjaxHideErrorDisplay("licensa_");
      scAjaxHideErrorDisplay("venctolicensa_");
      scAjaxHideErrorDisplay("licensa1_");
      scAjaxHideErrorDisplay("venctolicensa1_");
      scAjaxHideErrorDisplay("qtdeliberada_");
      scAjaxHideErrorDisplay("licensa2_");
      scAjaxHideErrorDisplay("venctolicensa2_");
      scAjaxHideErrorDisplay("icms_");
      scAjaxHideErrorDisplay("suframa_");
      scAjaxHideErrorDisplay("limitecredito_");
      scAjaxHideErrorDisplay("vendedor_");
      scAjaxHideErrorDisplay("restricao_");
      scAjaxHideErrorDisplay("comissao_");
      scAjaxHideErrorDisplay("transportadora_");
      scAjaxHideErrorDisplay("coleta_");
      scAjaxHideErrorDisplay("segmento_");
      scAjaxHideErrorDisplay("dataalteracao_");
      scAjaxHideErrorDisplay("usuario_");
      scAjaxHideErrorDisplay("requisitos_");
      scAjaxHideErrorDisplay("banco_");
      scAjaxHideErrorDisplay("emailcobranca_");
      scAjaxHideErrorDisplay("emailtecnico_");
      scAjaxHideErrorDisplay("midia_");
      scAjaxHideErrorDisplay("seg_");
      scAjaxHideErrorDisplay("ter_");
      scAjaxHideErrorDisplay("qua_");
      scAjaxHideErrorDisplay("qui_");
      scAjaxHideErrorDisplay("sex_");
      scAjaxHideErrorDisplay("certificado_");
      scAjaxHideErrorDisplay("emailnfe_");
      scAjaxHideErrorDisplay("fundacao_");
      scAjaxHideErrorDisplay("site_");
      scAjaxHideErrorDisplay("financeiro_");
      scAjaxHideErrorDisplay("numero_");
      scAjaxHideErrorDisplay("complemento_");
      scAjaxHideErrorDisplay("razaosocialentrega_");
      scAjaxHideErrorDisplay("entrega_");
      scAjaxHideErrorDisplay("contatotecnico_");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['parent_widget']; ?>']");
      if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.nm_gp_move) {
        dbParentFrame[0].contentWindow.nm_gp_move("igual");
      }
<?php
}
?>
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      scAjaxSetFields(false);
      scAjaxSetVariables();
      scAjaxSetMaster();
      if (scInlineFormSend())
      {
        self.parent.tb_remove();
        return;
      }
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_dbo_cliente_inline_submit_form_cb

  var scStatusDetail = {};

  function do_ajax_form_dbo_cliente_inline_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("cd_cliente_");
    scAjaxHideErrorDisplay("razaosocial_");
    scAjaxHideErrorDisplay("nomefantasia_");
    scAjaxHideErrorDisplay("cgc_");
    scAjaxHideErrorDisplay("inscricao_");
    scAjaxHideErrorDisplay("endereco_");
    scAjaxHideErrorDisplay("cidade_");
    scAjaxHideErrorDisplay("estado_");
    scAjaxHideErrorDisplay("bairro_");
    scAjaxHideErrorDisplay("cep_");
    scAjaxHideErrorDisplay("email_");
    scAjaxHideErrorDisplay("fone_");
    scAjaxHideErrorDisplay("fone1_");
    scAjaxHideErrorDisplay("fax_");
    scAjaxHideErrorDisplay("contato_");
    scAjaxHideErrorDisplay("enderecocobranca_");
    scAjaxHideErrorDisplay("cidadecobranca_");
    scAjaxHideErrorDisplay("bairrocobranca_");
    scAjaxHideErrorDisplay("estadocobranca_");
    scAjaxHideErrorDisplay("cepcobranca_");
    scAjaxHideErrorDisplay("fonecobranca_");
    scAjaxHideErrorDisplay("faxcobranca_");
    scAjaxHideErrorDisplay("contatocobranca_");
    scAjaxHideErrorDisplay("cgcentrega_");
    scAjaxHideErrorDisplay("inscricaoentrega_");
    scAjaxHideErrorDisplay("enderecoentrega_");
    scAjaxHideErrorDisplay("cidadeentrega_");
    scAjaxHideErrorDisplay("bairroentrega_");
    scAjaxHideErrorDisplay("estadoentrega_");
    scAjaxHideErrorDisplay("cepentrega_");
    scAjaxHideErrorDisplay("foneentrega_");
    scAjaxHideErrorDisplay("contatoentrega_");
    scAjaxHideErrorDisplay("contatoexpedicao_");
    scAjaxHideErrorDisplay("foneexpedicao_");
    scAjaxHideErrorDisplay("datacadastro_");
    scAjaxHideErrorDisplay("obs_");
    scAjaxHideErrorDisplay("tipo_");
    scAjaxHideErrorDisplay("consumidor_");
    scAjaxHideErrorDisplay("licensa_");
    scAjaxHideErrorDisplay("venctolicensa_");
    scAjaxHideErrorDisplay("licensa1_");
    scAjaxHideErrorDisplay("venctolicensa1_");
    scAjaxHideErrorDisplay("qtdeliberada_");
    scAjaxHideErrorDisplay("licensa2_");
    scAjaxHideErrorDisplay("venctolicensa2_");
    scAjaxHideErrorDisplay("icms_");
    scAjaxHideErrorDisplay("suframa_");
    scAjaxHideErrorDisplay("limitecredito_");
    scAjaxHideErrorDisplay("vendedor_");
    scAjaxHideErrorDisplay("restricao_");
    scAjaxHideErrorDisplay("comissao_");
    scAjaxHideErrorDisplay("transportadora_");
    scAjaxHideErrorDisplay("coleta_");
    scAjaxHideErrorDisplay("segmento_");
    scAjaxHideErrorDisplay("dataalteracao_");
    scAjaxHideErrorDisplay("usuario_");
    scAjaxHideErrorDisplay("requisitos_");
    scAjaxHideErrorDisplay("banco_");
    scAjaxHideErrorDisplay("emailcobranca_");
    scAjaxHideErrorDisplay("emailtecnico_");
    scAjaxHideErrorDisplay("midia_");
    scAjaxHideErrorDisplay("seg_");
    scAjaxHideErrorDisplay("ter_");
    scAjaxHideErrorDisplay("qua_");
    scAjaxHideErrorDisplay("qui_");
    scAjaxHideErrorDisplay("sex_");
    scAjaxHideErrorDisplay("certificado_");
    scAjaxHideErrorDisplay("emailnfe_");
    scAjaxHideErrorDisplay("fundacao_");
    scAjaxHideErrorDisplay("site_");
    scAjaxHideErrorDisplay("financeiro_");
    scAjaxHideErrorDisplay("numero_");
    scAjaxHideErrorDisplay("complemento_");
    scAjaxHideErrorDisplay("razaosocialentrega_");
    scAjaxHideErrorDisplay("entrega_");
    scAjaxHideErrorDisplay("contatotecnico_");
    var var_cd_cliente_ = document.F2.cd_cliente_.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_dbo_cliente_inline_navigate_form(var_cd_cliente_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search,  var_nmgp_cond_fast_search,  var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_dbo_cliente_inline_navigate_form_cb);
  } // do_ajax_form_dbo_cliente_inline_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente_inline']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_form_dbo_cliente_inline_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    if ("ERROR" == oResp.result)
    {
        scAjaxShowErrorDisplay("table", oResp.errList[0].msgText);
        scAjaxProcOff();
        return;
    }
    else if (oResp["navSummary"].reg_tot == 0)
    {
       $("#sc-ui-empty-form").show();
       $(".sc-ui-page-tab-line").hide();
       $("#sc-id-required-row").hide();
       sc_hide_form_dbo_cliente_inline_form();
    }
    sc_mupload_ok = true;
    scAjaxSetFields(false);
    scAjaxSetVariables();
    document.F2.cd_cliente_.value = scAjaxGetKeyValue("cd_cliente_");
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    scAjaxSetBtnVars();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_dbo_cliente_inline_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
    SC_btn_grp_text();
  } // do_ajax_form_dbo_cliente_inline_navigate_form_cb
  function sc_hide_form_dbo_cliente_inline_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_dbo_cliente_inline_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "cd_cliente_";
  ajax_field_list[1] = "razaosocial_";
  ajax_field_list[2] = "nomefantasia_";
  ajax_field_list[3] = "cgc_";
  ajax_field_list[4] = "inscricao_";
  ajax_field_list[5] = "endereco_";
  ajax_field_list[6] = "cidade_";
  ajax_field_list[7] = "estado_";
  ajax_field_list[8] = "bairro_";
  ajax_field_list[9] = "cep_";
  ajax_field_list[10] = "email_";
  ajax_field_list[11] = "fone_";
  ajax_field_list[12] = "fone1_";
  ajax_field_list[13] = "fax_";
  ajax_field_list[14] = "contato_";
  ajax_field_list[15] = "enderecocobranca_";
  ajax_field_list[16] = "cidadecobranca_";
  ajax_field_list[17] = "bairrocobranca_";
  ajax_field_list[18] = "estadocobranca_";
  ajax_field_list[19] = "cepcobranca_";
  ajax_field_list[20] = "fonecobranca_";
  ajax_field_list[21] = "faxcobranca_";
  ajax_field_list[22] = "contatocobranca_";
  ajax_field_list[23] = "cgcentrega_";
  ajax_field_list[24] = "inscricaoentrega_";
  ajax_field_list[25] = "enderecoentrega_";
  ajax_field_list[26] = "cidadeentrega_";
  ajax_field_list[27] = "bairroentrega_";
  ajax_field_list[28] = "estadoentrega_";
  ajax_field_list[29] = "cepentrega_";
  ajax_field_list[30] = "foneentrega_";
  ajax_field_list[31] = "contatoentrega_";
  ajax_field_list[32] = "contatoexpedicao_";
  ajax_field_list[33] = "foneexpedicao_";
  ajax_field_list[34] = "datacadastro_";
  ajax_field_list[35] = "obs_";
  ajax_field_list[36] = "tipo_";
  ajax_field_list[37] = "consumidor_";
  ajax_field_list[38] = "licensa_";
  ajax_field_list[39] = "venctolicensa_";
  ajax_field_list[40] = "licensa1_";
  ajax_field_list[41] = "venctolicensa1_";
  ajax_field_list[42] = "qtdeliberada_";
  ajax_field_list[43] = "licensa2_";
  ajax_field_list[44] = "venctolicensa2_";
  ajax_field_list[45] = "icms_";
  ajax_field_list[46] = "suframa_";
  ajax_field_list[47] = "limitecredito_";
  ajax_field_list[48] = "vendedor_";
  ajax_field_list[49] = "restricao_";
  ajax_field_list[50] = "comissao_";
  ajax_field_list[51] = "transportadora_";
  ajax_field_list[52] = "coleta_";
  ajax_field_list[53] = "segmento_";
  ajax_field_list[54] = "dataalteracao_";
  ajax_field_list[55] = "usuario_";
  ajax_field_list[56] = "requisitos_";
  ajax_field_list[57] = "banco_";
  ajax_field_list[58] = "emailcobranca_";
  ajax_field_list[59] = "emailtecnico_";
  ajax_field_list[60] = "midia_";
  ajax_field_list[61] = "seg_";
  ajax_field_list[62] = "ter_";
  ajax_field_list[63] = "qua_";
  ajax_field_list[64] = "qui_";
  ajax_field_list[65] = "sex_";
  ajax_field_list[66] = "certificado_";
  ajax_field_list[67] = "emailnfe_";
  ajax_field_list[68] = "fundacao_";
  ajax_field_list[69] = "site_";
  ajax_field_list[70] = "financeiro_";
  ajax_field_list[71] = "numero_";
  ajax_field_list[72] = "complemento_";
  ajax_field_list[73] = "razaosocialentrega_";
  ajax_field_list[74] = "entrega_";
  ajax_field_list[75] = "contatotecnico_";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {
    "cd_cliente_": {"label": "Cd Cliente", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "razaosocial_": {"label": "Razaosocial", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nomefantasia_": {"label": "Nomefantasia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cgc_": {"label": "Cgc", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "inscricao_": {"label": "Inscricao", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "endereco_": {"label": "Endereco", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cidade_": {"label": "Cidade", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estado_": {"label": "Estado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "bairro_": {"label": "Bairro", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cep_": {"label": "Cep", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "email_": {"label": "Email", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fone_": {"label": "Fone", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fone1_": {"label": "Fone 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fax_": {"label": "Fax", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contato_": {"label": "Contato", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "enderecocobranca_": {"label": "Enderecocobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cidadecobranca_": {"label": "Cidadecobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "bairrocobranca_": {"label": "Bairrocobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estadocobranca_": {"label": "Estadocobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cepcobranca_": {"label": "Cepcobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fonecobranca_": {"label": "Fonecobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "faxcobranca_": {"label": "Faxcobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contatocobranca_": {"label": "Contatocobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cgcentrega_": {"label": "Cgcentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "inscricaoentrega_": {"label": "Inscricaoentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "enderecoentrega_": {"label": "Enderecoentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cidadeentrega_": {"label": "Cidadeentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "bairroentrega_": {"label": "Bairroentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estadoentrega_": {"label": "Estadoentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cepentrega_": {"label": "Cepentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "foneentrega_": {"label": "Foneentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contatoentrega_": {"label": "Contatoentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contatoexpedicao_": {"label": "Contatoexpedicao", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "foneexpedicao_": {"label": "Foneexpedicao", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "datacadastro_": {"label": "Datacadastro", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "obs_": {"label": "Obs", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipo_": {"label": "Tipo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "consumidor_": {"label": "Consumidor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "licensa_": {"label": "Licensa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "venctolicensa_": {"label": "Venctolicensa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "licensa1_": {"label": "Licensa 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "venctolicensa1_": {"label": "Venctolicensa 1", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "qtdeliberada_": {"label": "Qtdeliberada", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "licensa2_": {"label": "Licensa 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "venctolicensa2_": {"label": "Venctolicensa 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "icms_": {"label": "Icms", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "suframa_": {"label": "Suframa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "limitecredito_": {"label": "Limitecredito", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "vendedor_": {"label": "Vendedor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "restricao_": {"label": "Restricao", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "comissao_": {"label": "Comissao", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "transportadora_": {"label": "Transportadora", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "coleta_": {"label": "Coleta", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "segmento_": {"label": "Segmento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dataalteracao_": {"label": "Dataalteracao", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "usuario_": {"label": "Usuario", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "requisitos_": {"label": "REQUISITOS", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "banco_": {"label": "Banco", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "emailcobranca_": {"label": "Emailcobranca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "emailtecnico_": {"label": "Emailtecnico", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "midia_": {"label": "Midia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "seg_": {"label": "Seg", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ter_": {"label": "Ter", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "qua_": {"label": "Qua", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "qui_": {"label": "Qui", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sex_": {"label": "Sex", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "certificado_": {"label": "Certificado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "emailnfe_": {"label": "Emailnfe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fundacao_": {"label": "Fundacao", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "site_": {"label": "Site", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "financeiro_": {"label": "Financeiro", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "numero_": {"label": "Numero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "complemento_": {"label": "Complemento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "razaosocialentrega_": {"label": "Razaosocialentrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "entrega_": {"label": "Entrega", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "contatotecnico_": {"label": "Contatotecnico", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "cd_cliente_": new Array(),
    "razaosocial_": new Array(),
    "nomefantasia_": new Array(),
    "cgc_": new Array(),
    "inscricao_": new Array(),
    "endereco_": new Array(),
    "cidade_": new Array(),
    "estado_": new Array(),
    "bairro_": new Array(),
    "cep_": new Array(),
    "email_": new Array(),
    "fone_": new Array(),
    "fone1_": new Array(),
    "fax_": new Array(),
    "contato_": new Array(),
    "enderecocobranca_": new Array(),
    "cidadecobranca_": new Array(),
    "bairrocobranca_": new Array(),
    "estadocobranca_": new Array(),
    "cepcobranca_": new Array(),
    "fonecobranca_": new Array(),
    "faxcobranca_": new Array(),
    "contatocobranca_": new Array(),
    "cgcentrega_": new Array(),
    "inscricaoentrega_": new Array(),
    "enderecoentrega_": new Array(),
    "cidadeentrega_": new Array(),
    "bairroentrega_": new Array(),
    "estadoentrega_": new Array(),
    "cepentrega_": new Array(),
    "foneentrega_": new Array(),
    "contatoentrega_": new Array(),
    "contatoexpedicao_": new Array(),
    "foneexpedicao_": new Array(),
    "datacadastro_": new Array(),
    "obs_": new Array(),
    "tipo_": new Array(),
    "consumidor_": new Array(),
    "licensa_": new Array(),
    "venctolicensa_": new Array(),
    "licensa1_": new Array(),
    "venctolicensa1_": new Array(),
    "qtdeliberada_": new Array(),
    "licensa2_": new Array(),
    "venctolicensa2_": new Array(),
    "icms_": new Array(),
    "suframa_": new Array(),
    "limitecredito_": new Array(),
    "vendedor_": new Array(),
    "restricao_": new Array(),
    "comissao_": new Array(),
    "transportadora_": new Array(),
    "coleta_": new Array(),
    "segmento_": new Array(),
    "dataalteracao_": new Array(),
    "usuario_": new Array(),
    "requisitos_": new Array(),
    "banco_": new Array(),
    "emailcobranca_": new Array(),
    "emailtecnico_": new Array(),
    "midia_": new Array(),
    "seg_": new Array(),
    "ter_": new Array(),
    "qua_": new Array(),
    "qui_": new Array(),
    "sex_": new Array(),
    "certificado_": new Array(),
    "emailnfe_": new Array(),
    "fundacao_": new Array(),
    "site_": new Array(),
    "financeiro_": new Array(),
    "numero_": new Array(),
    "complemento_": new Array(),
    "razaosocialentrega_": new Array(),
    "entrega_": new Array(),
    "contatotecnico_": new Array()
  };
  ajax_field_mult["cd_cliente_"][1] = "cd_cliente_";
  ajax_field_mult["razaosocial_"][1] = "razaosocial_";
  ajax_field_mult["nomefantasia_"][1] = "nomefantasia_";
  ajax_field_mult["cgc_"][1] = "cgc_";
  ajax_field_mult["inscricao_"][1] = "inscricao_";
  ajax_field_mult["endereco_"][1] = "endereco_";
  ajax_field_mult["cidade_"][1] = "cidade_";
  ajax_field_mult["estado_"][1] = "estado_";
  ajax_field_mult["bairro_"][1] = "bairro_";
  ajax_field_mult["cep_"][1] = "cep_";
  ajax_field_mult["email_"][1] = "email_";
  ajax_field_mult["fone_"][1] = "fone_";
  ajax_field_mult["fone1_"][1] = "fone1_";
  ajax_field_mult["fax_"][1] = "fax_";
  ajax_field_mult["contato_"][1] = "contato_";
  ajax_field_mult["enderecocobranca_"][1] = "enderecocobranca_";
  ajax_field_mult["cidadecobranca_"][1] = "cidadecobranca_";
  ajax_field_mult["bairrocobranca_"][1] = "bairrocobranca_";
  ajax_field_mult["estadocobranca_"][1] = "estadocobranca_";
  ajax_field_mult["cepcobranca_"][1] = "cepcobranca_";
  ajax_field_mult["fonecobranca_"][1] = "fonecobranca_";
  ajax_field_mult["faxcobranca_"][1] = "faxcobranca_";
  ajax_field_mult["contatocobranca_"][1] = "contatocobranca_";
  ajax_field_mult["cgcentrega_"][1] = "cgcentrega_";
  ajax_field_mult["inscricaoentrega_"][1] = "inscricaoentrega_";
  ajax_field_mult["enderecoentrega_"][1] = "enderecoentrega_";
  ajax_field_mult["cidadeentrega_"][1] = "cidadeentrega_";
  ajax_field_mult["bairroentrega_"][1] = "bairroentrega_";
  ajax_field_mult["estadoentrega_"][1] = "estadoentrega_";
  ajax_field_mult["cepentrega_"][1] = "cepentrega_";
  ajax_field_mult["foneentrega_"][1] = "foneentrega_";
  ajax_field_mult["contatoentrega_"][1] = "contatoentrega_";
  ajax_field_mult["contatoexpedicao_"][1] = "contatoexpedicao_";
  ajax_field_mult["foneexpedicao_"][1] = "foneexpedicao_";
  ajax_field_mult["datacadastro_"][1] = "datacadastro_";
  ajax_field_mult["obs_"][1] = "obs_";
  ajax_field_mult["tipo_"][1] = "tipo_";
  ajax_field_mult["consumidor_"][1] = "consumidor_";
  ajax_field_mult["licensa_"][1] = "licensa_";
  ajax_field_mult["venctolicensa_"][1] = "venctolicensa_";
  ajax_field_mult["licensa1_"][1] = "licensa1_";
  ajax_field_mult["venctolicensa1_"][1] = "venctolicensa1_";
  ajax_field_mult["qtdeliberada_"][1] = "qtdeliberada_";
  ajax_field_mult["licensa2_"][1] = "licensa2_";
  ajax_field_mult["venctolicensa2_"][1] = "venctolicensa2_";
  ajax_field_mult["icms_"][1] = "icms_";
  ajax_field_mult["suframa_"][1] = "suframa_";
  ajax_field_mult["limitecredito_"][1] = "limitecredito_";
  ajax_field_mult["vendedor_"][1] = "vendedor_";
  ajax_field_mult["restricao_"][1] = "restricao_";
  ajax_field_mult["comissao_"][1] = "comissao_";
  ajax_field_mult["transportadora_"][1] = "transportadora_";
  ajax_field_mult["coleta_"][1] = "coleta_";
  ajax_field_mult["segmento_"][1] = "segmento_";
  ajax_field_mult["dataalteracao_"][1] = "dataalteracao_";
  ajax_field_mult["usuario_"][1] = "usuario_";
  ajax_field_mult["requisitos_"][1] = "requisitos_";
  ajax_field_mult["banco_"][1] = "banco_";
  ajax_field_mult["emailcobranca_"][1] = "emailcobranca_";
  ajax_field_mult["emailtecnico_"][1] = "emailtecnico_";
  ajax_field_mult["midia_"][1] = "midia_";
  ajax_field_mult["seg_"][1] = "seg_";
  ajax_field_mult["ter_"][1] = "ter_";
  ajax_field_mult["qua_"][1] = "qua_";
  ajax_field_mult["qui_"][1] = "qui_";
  ajax_field_mult["sex_"][1] = "sex_";
  ajax_field_mult["certificado_"][1] = "certificado_";
  ajax_field_mult["emailnfe_"][1] = "emailnfe_";
  ajax_field_mult["fundacao_"][1] = "fundacao_";
  ajax_field_mult["site_"][1] = "site_";
  ajax_field_mult["financeiro_"][1] = "financeiro_";
  ajax_field_mult["numero_"][1] = "numero_";
  ajax_field_mult["complemento_"][1] = "complemento_";
  ajax_field_mult["razaosocialentrega_"][1] = "razaosocialentrega_";
  ajax_field_mult["entrega_"][1] = "entrega_";
  ajax_field_mult["contatotecnico_"][1] = "contatotecnico_";

  var ajax_field_id = {
    "cd_cliente_": new Array("hidden_field_label_cd_cliente_", "hidden_field_data_cd_cliente_"),
    "razaosocial_": new Array("hidden_field_label_razaosocial_", "hidden_field_data_razaosocial_"),
    "nomefantasia_": new Array("hidden_field_label_nomefantasia_", "hidden_field_data_nomefantasia_"),
    "cgc_": new Array("hidden_field_label_cgc_", "hidden_field_data_cgc_"),
    "inscricao_": new Array("hidden_field_label_inscricao_", "hidden_field_data_inscricao_"),
    "endereco_": new Array("hidden_field_label_endereco_", "hidden_field_data_endereco_"),
    "cidade_": new Array("hidden_field_label_cidade_", "hidden_field_data_cidade_"),
    "estado_": new Array("hidden_field_label_estado_", "hidden_field_data_estado_"),
    "bairro_": new Array("hidden_field_label_bairro_", "hidden_field_data_bairro_"),
    "cep_": new Array("hidden_field_label_cep_", "hidden_field_data_cep_"),
    "email_": new Array("hidden_field_label_email_", "hidden_field_data_email_"),
    "fone_": new Array("hidden_field_label_fone_", "hidden_field_data_fone_"),
    "fone1_": new Array("hidden_field_label_fone1_", "hidden_field_data_fone1_"),
    "fax_": new Array("hidden_field_label_fax_", "hidden_field_data_fax_"),
    "contato_": new Array("hidden_field_label_contato_", "hidden_field_data_contato_"),
    "enderecocobranca_": new Array("hidden_field_label_enderecocobranca_", "hidden_field_data_enderecocobranca_"),
    "cidadecobranca_": new Array("hidden_field_label_cidadecobranca_", "hidden_field_data_cidadecobranca_"),
    "bairrocobranca_": new Array("hidden_field_label_bairrocobranca_", "hidden_field_data_bairrocobranca_"),
    "estadocobranca_": new Array("hidden_field_label_estadocobranca_", "hidden_field_data_estadocobranca_"),
    "cepcobranca_": new Array("hidden_field_label_cepcobranca_", "hidden_field_data_cepcobranca_"),
    "fonecobranca_": new Array("hidden_field_label_fonecobranca_", "hidden_field_data_fonecobranca_"),
    "faxcobranca_": new Array("hidden_field_label_faxcobranca_", "hidden_field_data_faxcobranca_"),
    "contatocobranca_": new Array("hidden_field_label_contatocobranca_", "hidden_field_data_contatocobranca_"),
    "cgcentrega_": new Array("hidden_field_label_cgcentrega_", "hidden_field_data_cgcentrega_"),
    "inscricaoentrega_": new Array("hidden_field_label_inscricaoentrega_", "hidden_field_data_inscricaoentrega_"),
    "enderecoentrega_": new Array("hidden_field_label_enderecoentrega_", "hidden_field_data_enderecoentrega_"),
    "cidadeentrega_": new Array("hidden_field_label_cidadeentrega_", "hidden_field_data_cidadeentrega_"),
    "bairroentrega_": new Array("hidden_field_label_bairroentrega_", "hidden_field_data_bairroentrega_"),
    "estadoentrega_": new Array("hidden_field_label_estadoentrega_", "hidden_field_data_estadoentrega_"),
    "cepentrega_": new Array("hidden_field_label_cepentrega_", "hidden_field_data_cepentrega_"),
    "foneentrega_": new Array("hidden_field_label_foneentrega_", "hidden_field_data_foneentrega_"),
    "contatoentrega_": new Array("hidden_field_label_contatoentrega_", "hidden_field_data_contatoentrega_"),
    "contatoexpedicao_": new Array("hidden_field_label_contatoexpedicao_", "hidden_field_data_contatoexpedicao_"),
    "foneexpedicao_": new Array("hidden_field_label_foneexpedicao_", "hidden_field_data_foneexpedicao_"),
    "datacadastro_": new Array("hidden_field_label_datacadastro_", "hidden_field_data_datacadastro_"),
    "obs_": new Array("hidden_field_label_obs_", "hidden_field_data_obs_"),
    "tipo_": new Array("hidden_field_label_tipo_", "hidden_field_data_tipo_"),
    "consumidor_": new Array("hidden_field_label_consumidor_", "hidden_field_data_consumidor_"),
    "licensa_": new Array("hidden_field_label_licensa_", "hidden_field_data_licensa_"),
    "venctolicensa_": new Array("hidden_field_label_venctolicensa_", "hidden_field_data_venctolicensa_"),
    "licensa1_": new Array("hidden_field_label_licensa1_", "hidden_field_data_licensa1_"),
    "venctolicensa1_": new Array("hidden_field_label_venctolicensa1_", "hidden_field_data_venctolicensa1_"),
    "qtdeliberada_": new Array("hidden_field_label_qtdeliberada_", "hidden_field_data_qtdeliberada_"),
    "licensa2_": new Array("hidden_field_label_licensa2_", "hidden_field_data_licensa2_"),
    "venctolicensa2_": new Array("hidden_field_label_venctolicensa2_", "hidden_field_data_venctolicensa2_"),
    "icms_": new Array("hidden_field_label_icms_", "hidden_field_data_icms_"),
    "suframa_": new Array("hidden_field_label_suframa_", "hidden_field_data_suframa_"),
    "limitecredito_": new Array("hidden_field_label_limitecredito_", "hidden_field_data_limitecredito_"),
    "vendedor_": new Array("hidden_field_label_vendedor_", "hidden_field_data_vendedor_"),
    "restricao_": new Array("hidden_field_label_restricao_", "hidden_field_data_restricao_"),
    "comissao_": new Array("hidden_field_label_comissao_", "hidden_field_data_comissao_"),
    "transportadora_": new Array("hidden_field_label_transportadora_", "hidden_field_data_transportadora_"),
    "coleta_": new Array("hidden_field_label_coleta_", "hidden_field_data_coleta_"),
    "segmento_": new Array("hidden_field_label_segmento_", "hidden_field_data_segmento_"),
    "dataalteracao_": new Array("hidden_field_label_dataalteracao_", "hidden_field_data_dataalteracao_"),
    "usuario_": new Array("hidden_field_label_usuario_", "hidden_field_data_usuario_"),
    "requisitos_": new Array("hidden_field_label_requisitos_", "hidden_field_data_requisitos_"),
    "banco_": new Array("hidden_field_label_banco_", "hidden_field_data_banco_"),
    "emailcobranca_": new Array("hidden_field_label_emailcobranca_", "hidden_field_data_emailcobranca_"),
    "emailtecnico_": new Array("hidden_field_label_emailtecnico_", "hidden_field_data_emailtecnico_"),
    "midia_": new Array("hidden_field_label_midia_", "hidden_field_data_midia_"),
    "seg_": new Array("hidden_field_label_seg_", "hidden_field_data_seg_"),
    "ter_": new Array("hidden_field_label_ter_", "hidden_field_data_ter_"),
    "qua_": new Array("hidden_field_label_qua_", "hidden_field_data_qua_"),
    "qui_": new Array("hidden_field_label_qui_", "hidden_field_data_qui_"),
    "sex_": new Array("hidden_field_label_sex_", "hidden_field_data_sex_"),
    "certificado_": new Array("hidden_field_label_certificado_", "hidden_field_data_certificado_"),
    "emailnfe_": new Array("hidden_field_label_emailnfe_", "hidden_field_data_emailnfe_"),
    "fundacao_": new Array("hidden_field_label_fundacao_", "hidden_field_data_fundacao_"),
    "site_": new Array("hidden_field_label_site_", "hidden_field_data_site_"),
    "financeiro_": new Array("hidden_field_label_financeiro_", "hidden_field_data_financeiro_"),
    "numero_": new Array("hidden_field_label_numero_", "hidden_field_data_numero_"),
    "complemento_": new Array("hidden_field_label_complemento_", "hidden_field_data_complemento_"),
    "razaosocialentrega_": new Array("hidden_field_label_razaosocialentrega_", "hidden_field_data_razaosocialentrega_"),
    "entrega_": new Array("hidden_field_label_entrega_", "hidden_field_data_entrega_"),
    "contatotecnico_": new Array("hidden_field_label_contatotecnico_", "hidden_field_data_contatotecnico_")
  };

  var ajax_read_only = {
    "cd_cliente_": "on",
    "razaosocial_": "off",
    "nomefantasia_": "off",
    "cgc_": "off",
    "inscricao_": "off",
    "endereco_": "off",
    "cidade_": "off",
    "estado_": "off",
    "bairro_": "off",
    "cep_": "off",
    "email_": "off",
    "fone_": "off",
    "fone1_": "off",
    "fax_": "off",
    "contato_": "off",
    "enderecocobranca_": "off",
    "cidadecobranca_": "off",
    "bairrocobranca_": "off",
    "estadocobranca_": "off",
    "cepcobranca_": "off",
    "fonecobranca_": "off",
    "faxcobranca_": "off",
    "contatocobranca_": "off",
    "cgcentrega_": "off",
    "inscricaoentrega_": "off",
    "enderecoentrega_": "off",
    "cidadeentrega_": "off",
    "bairroentrega_": "off",
    "estadoentrega_": "off",
    "cepentrega_": "off",
    "foneentrega_": "off",
    "contatoentrega_": "off",
    "contatoexpedicao_": "off",
    "foneexpedicao_": "off",
    "datacadastro_": "off",
    "obs_": "off",
    "tipo_": "off",
    "consumidor_": "off",
    "licensa_": "off",
    "venctolicensa_": "off",
    "licensa1_": "off",
    "venctolicensa1_": "off",
    "qtdeliberada_": "off",
    "licensa2_": "off",
    "venctolicensa2_": "off",
    "icms_": "off",
    "suframa_": "off",
    "limitecredito_": "off",
    "vendedor_": "off",
    "restricao_": "off",
    "comissao_": "off",
    "transportadora_": "off",
    "coleta_": "off",
    "segmento_": "off",
    "dataalteracao_": "off",
    "usuario_": "off",
    "requisitos_": "off",
    "banco_": "off",
    "emailcobranca_": "off",
    "emailtecnico_": "off",
    "midia_": "off",
    "seg_": "off",
    "ter_": "off",
    "qua_": "off",
    "qui_": "off",
    "sex_": "off",
    "certificado_": "off",
    "emailnfe_": "off",
    "fundacao_": "off",
    "site_": "off",
    "financeiro_": "off",
    "numero_": "off",
    "complemento_": "off",
    "razaosocialentrega_": "off",
    "entrega_": "off",
    "contatotecnico_": "off"
  };
  var bRefreshTable = false;
  function scRefreshTable()
  {
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("cd_cliente_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("razaosocial_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nomefantasia_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cgc_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("inscricao_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("endereco_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cidade_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estado_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("bairro_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cep_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("email_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fone_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fone1_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fax_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("contato_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("enderecocobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cidadecobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("bairrocobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estadocobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cepcobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fonecobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("faxcobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("contatocobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cgcentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("inscricaoentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("enderecoentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cidadeentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("bairroentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estadoentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cepentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("foneentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("contatoentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("contatoexpedicao_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("foneexpedicao_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("datacadastro_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("obs_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipo_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("consumidor_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("licensa_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("venctolicensa_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("licensa1_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("venctolicensa1_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("qtdeliberada_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("licensa2_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("venctolicensa2_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("icms_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("suframa_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("limitecredito_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("vendedor_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("restricao_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("comissao_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("transportadora_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("coleta_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("segmento_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dataalteracao_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("usuario_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("requisitos_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("banco_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("emailcobranca_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("emailtecnico_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("midia_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("seg_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ter_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("qua_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("qui_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sex_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("certificado_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("emailnfe_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fundacao_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("site_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("financeiro_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("numero_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("complemento_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("razaosocialentrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("entrega_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("contatotecnico_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
