
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
        if ("geral_form_dbo_cliente" == sTestField)
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
  function do_ajax_form_dbo_cliente_validate_cd_cliente_(iNumLinha)
  {
    var nomeCampo_cd_cliente_ = "cd_cliente_" + iNumLinha;
    var var_cd_cliente_ = scAjaxGetFieldHidden(nomeCampo_cd_cliente_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cd_cliente_(var_cd_cliente_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cd_cliente__cb);
  } // do_ajax_form_dbo_cliente_validate_cd_cliente_

  function do_ajax_form_dbo_cliente_validate_cd_cliente__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cd_cliente_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cd_cliente_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cd_cliente_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cd_cliente_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cd_cliente__cb

  // ---------- Validate razaosocial_
  function do_ajax_form_dbo_cliente_validate_razaosocial_(iNumLinha)
  {
    var nomeCampo_razaosocial_ = "razaosocial_" + iNumLinha;
    var var_razaosocial_ = scAjaxGetFieldText(nomeCampo_razaosocial_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_razaosocial_(var_razaosocial_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_razaosocial__cb);
  } // do_ajax_form_dbo_cliente_validate_razaosocial_

  function do_ajax_form_dbo_cliente_validate_razaosocial__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "razaosocial_" + iLineNumber;
    }
    else
    {
      sFieldValid = "razaosocial_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "razaosocial_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "razaosocial_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_razaosocial__cb

  // ---------- Validate nomefantasia_
  function do_ajax_form_dbo_cliente_validate_nomefantasia_(iNumLinha)
  {
    var nomeCampo_nomefantasia_ = "nomefantasia_" + iNumLinha;
    var var_nomefantasia_ = scAjaxGetFieldText(nomeCampo_nomefantasia_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_nomefantasia_(var_nomefantasia_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_nomefantasia__cb);
  } // do_ajax_form_dbo_cliente_validate_nomefantasia_

  function do_ajax_form_dbo_cliente_validate_nomefantasia__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "nomefantasia_" + iLineNumber;
    }
    else
    {
      sFieldValid = "nomefantasia_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "nomefantasia_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "nomefantasia_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_nomefantasia__cb

  // ---------- Validate cgc_
  function do_ajax_form_dbo_cliente_validate_cgc_(iNumLinha)
  {
    var nomeCampo_cgc_ = "cgc_" + iNumLinha;
    var var_cgc_ = scAjaxGetFieldText(nomeCampo_cgc_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cgc_(var_cgc_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cgc__cb);
  } // do_ajax_form_dbo_cliente_validate_cgc_

  function do_ajax_form_dbo_cliente_validate_cgc__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cgc_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cgc_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cgc_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cgc_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cgc__cb

  // ---------- Validate inscricao_
  function do_ajax_form_dbo_cliente_validate_inscricao_(iNumLinha)
  {
    var nomeCampo_inscricao_ = "inscricao_" + iNumLinha;
    var var_inscricao_ = scAjaxGetFieldText(nomeCampo_inscricao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_inscricao_(var_inscricao_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_inscricao__cb);
  } // do_ajax_form_dbo_cliente_validate_inscricao_

  function do_ajax_form_dbo_cliente_validate_inscricao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "inscricao_" + iLineNumber;
    }
    else
    {
      sFieldValid = "inscricao_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "inscricao_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "inscricao_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_inscricao__cb

  // ---------- Validate endereco_
  function do_ajax_form_dbo_cliente_validate_endereco_(iNumLinha)
  {
    var nomeCampo_endereco_ = "endereco_" + iNumLinha;
    var var_endereco_ = scAjaxGetFieldText(nomeCampo_endereco_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_endereco_(var_endereco_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_endereco__cb);
  } // do_ajax_form_dbo_cliente_validate_endereco_

  function do_ajax_form_dbo_cliente_validate_endereco__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "endereco_" + iLineNumber;
    }
    else
    {
      sFieldValid = "endereco_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "endereco_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "endereco_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_endereco__cb

  // ---------- Validate cidade_
  function do_ajax_form_dbo_cliente_validate_cidade_(iNumLinha)
  {
    var nomeCampo_cidade_ = "cidade_" + iNumLinha;
    var var_cidade_ = scAjaxGetFieldText(nomeCampo_cidade_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cidade_(var_cidade_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cidade__cb);
  } // do_ajax_form_dbo_cliente_validate_cidade_

  function do_ajax_form_dbo_cliente_validate_cidade__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cidade_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cidade_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cidade_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cidade_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cidade__cb

  // ---------- Validate estado_
  function do_ajax_form_dbo_cliente_validate_estado_(iNumLinha)
  {
    var nomeCampo_estado_ = "estado_" + iNumLinha;
    var var_estado_ = scAjaxGetFieldText(nomeCampo_estado_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_estado_(var_estado_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_estado__cb);
  } // do_ajax_form_dbo_cliente_validate_estado_

  function do_ajax_form_dbo_cliente_validate_estado__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "estado_" + iLineNumber;
    }
    else
    {
      sFieldValid = "estado_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "estado_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "estado_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_estado__cb

  // ---------- Validate bairro_
  function do_ajax_form_dbo_cliente_validate_bairro_(iNumLinha)
  {
    var nomeCampo_bairro_ = "bairro_" + iNumLinha;
    var var_bairro_ = scAjaxGetFieldText(nomeCampo_bairro_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_bairro_(var_bairro_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_bairro__cb);
  } // do_ajax_form_dbo_cliente_validate_bairro_

  function do_ajax_form_dbo_cliente_validate_bairro__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "bairro_" + iLineNumber;
    }
    else
    {
      sFieldValid = "bairro_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "bairro_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "bairro_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_bairro__cb

  // ---------- Validate cep_
  function do_ajax_form_dbo_cliente_validate_cep_(iNumLinha)
  {
    var nomeCampo_cep_ = "cep_" + iNumLinha;
    var var_cep_ = scAjaxGetFieldText(nomeCampo_cep_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cep_(var_cep_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cep__cb);
  } // do_ajax_form_dbo_cliente_validate_cep_

  function do_ajax_form_dbo_cliente_validate_cep__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cep_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cep_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cep_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cep_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cep__cb

  // ---------- Validate email_
  function do_ajax_form_dbo_cliente_validate_email_(iNumLinha)
  {
    var nomeCampo_email_ = "email_" + iNumLinha;
    var var_email_ = scAjaxGetFieldText(nomeCampo_email_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_email_(var_email_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_email__cb);
  } // do_ajax_form_dbo_cliente_validate_email_

  function do_ajax_form_dbo_cliente_validate_email__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "email_" + iLineNumber;
    }
    else
    {
      sFieldValid = "email_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "email_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "email_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_email__cb

  // ---------- Validate fone_
  function do_ajax_form_dbo_cliente_validate_fone_(iNumLinha)
  {
    var nomeCampo_fone_ = "fone_" + iNumLinha;
    var var_fone_ = scAjaxGetFieldText(nomeCampo_fone_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_fone_(var_fone_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_fone__cb);
  } // do_ajax_form_dbo_cliente_validate_fone_

  function do_ajax_form_dbo_cliente_validate_fone__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "fone_" + iLineNumber;
    }
    else
    {
      sFieldValid = "fone_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "fone_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "fone_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_fone__cb

  // ---------- Validate fone1_
  function do_ajax_form_dbo_cliente_validate_fone1_(iNumLinha)
  {
    var nomeCampo_fone1_ = "fone1_" + iNumLinha;
    var var_fone1_ = scAjaxGetFieldText(nomeCampo_fone1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_fone1_(var_fone1_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_fone1__cb);
  } // do_ajax_form_dbo_cliente_validate_fone1_

  function do_ajax_form_dbo_cliente_validate_fone1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "fone1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "fone1_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "fone1_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "fone1_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_fone1__cb

  // ---------- Validate fax_
  function do_ajax_form_dbo_cliente_validate_fax_(iNumLinha)
  {
    var nomeCampo_fax_ = "fax_" + iNumLinha;
    var var_fax_ = scAjaxGetFieldText(nomeCampo_fax_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_fax_(var_fax_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_fax__cb);
  } // do_ajax_form_dbo_cliente_validate_fax_

  function do_ajax_form_dbo_cliente_validate_fax__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "fax_" + iLineNumber;
    }
    else
    {
      sFieldValid = "fax_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "fax_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "fax_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_fax__cb

  // ---------- Validate contato_
  function do_ajax_form_dbo_cliente_validate_contato_(iNumLinha)
  {
    var nomeCampo_contato_ = "contato_" + iNumLinha;
    var var_contato_ = scAjaxGetFieldText(nomeCampo_contato_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_contato_(var_contato_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_contato__cb);
  } // do_ajax_form_dbo_cliente_validate_contato_

  function do_ajax_form_dbo_cliente_validate_contato__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "contato_" + iLineNumber;
    }
    else
    {
      sFieldValid = "contato_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "contato_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "contato_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_contato__cb

  // ---------- Validate enderecocobranca_
  function do_ajax_form_dbo_cliente_validate_enderecocobranca_(iNumLinha)
  {
    var nomeCampo_enderecocobranca_ = "enderecocobranca_" + iNumLinha;
    var var_enderecocobranca_ = scAjaxGetFieldText(nomeCampo_enderecocobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_enderecocobranca_(var_enderecocobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_enderecocobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_enderecocobranca_

  function do_ajax_form_dbo_cliente_validate_enderecocobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "enderecocobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "enderecocobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "enderecocobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "enderecocobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_enderecocobranca__cb

  // ---------- Validate cidadecobranca_
  function do_ajax_form_dbo_cliente_validate_cidadecobranca_(iNumLinha)
  {
    var nomeCampo_cidadecobranca_ = "cidadecobranca_" + iNumLinha;
    var var_cidadecobranca_ = scAjaxGetFieldText(nomeCampo_cidadecobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cidadecobranca_(var_cidadecobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cidadecobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_cidadecobranca_

  function do_ajax_form_dbo_cliente_validate_cidadecobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cidadecobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cidadecobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cidadecobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cidadecobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cidadecobranca__cb

  // ---------- Validate bairrocobranca_
  function do_ajax_form_dbo_cliente_validate_bairrocobranca_(iNumLinha)
  {
    var nomeCampo_bairrocobranca_ = "bairrocobranca_" + iNumLinha;
    var var_bairrocobranca_ = scAjaxGetFieldText(nomeCampo_bairrocobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_bairrocobranca_(var_bairrocobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_bairrocobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_bairrocobranca_

  function do_ajax_form_dbo_cliente_validate_bairrocobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "bairrocobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "bairrocobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "bairrocobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "bairrocobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_bairrocobranca__cb

  // ---------- Validate estadocobranca_
  function do_ajax_form_dbo_cliente_validate_estadocobranca_(iNumLinha)
  {
    var nomeCampo_estadocobranca_ = "estadocobranca_" + iNumLinha;
    var var_estadocobranca_ = scAjaxGetFieldText(nomeCampo_estadocobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_estadocobranca_(var_estadocobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_estadocobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_estadocobranca_

  function do_ajax_form_dbo_cliente_validate_estadocobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "estadocobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "estadocobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "estadocobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "estadocobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_estadocobranca__cb

  // ---------- Validate cepcobranca_
  function do_ajax_form_dbo_cliente_validate_cepcobranca_(iNumLinha)
  {
    var nomeCampo_cepcobranca_ = "cepcobranca_" + iNumLinha;
    var var_cepcobranca_ = scAjaxGetFieldText(nomeCampo_cepcobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cepcobranca_(var_cepcobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cepcobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_cepcobranca_

  function do_ajax_form_dbo_cliente_validate_cepcobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cepcobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cepcobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cepcobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cepcobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cepcobranca__cb

  // ---------- Validate fonecobranca_
  function do_ajax_form_dbo_cliente_validate_fonecobranca_(iNumLinha)
  {
    var nomeCampo_fonecobranca_ = "fonecobranca_" + iNumLinha;
    var var_fonecobranca_ = scAjaxGetFieldText(nomeCampo_fonecobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_fonecobranca_(var_fonecobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_fonecobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_fonecobranca_

  function do_ajax_form_dbo_cliente_validate_fonecobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "fonecobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "fonecobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "fonecobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "fonecobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_fonecobranca__cb

  // ---------- Validate faxcobranca_
  function do_ajax_form_dbo_cliente_validate_faxcobranca_(iNumLinha)
  {
    var nomeCampo_faxcobranca_ = "faxcobranca_" + iNumLinha;
    var var_faxcobranca_ = scAjaxGetFieldText(nomeCampo_faxcobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_faxcobranca_(var_faxcobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_faxcobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_faxcobranca_

  function do_ajax_form_dbo_cliente_validate_faxcobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "faxcobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "faxcobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "faxcobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "faxcobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_faxcobranca__cb

  // ---------- Validate contatocobranca_
  function do_ajax_form_dbo_cliente_validate_contatocobranca_(iNumLinha)
  {
    var nomeCampo_contatocobranca_ = "contatocobranca_" + iNumLinha;
    var var_contatocobranca_ = scAjaxGetFieldText(nomeCampo_contatocobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_contatocobranca_(var_contatocobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_contatocobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_contatocobranca_

  function do_ajax_form_dbo_cliente_validate_contatocobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "contatocobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "contatocobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "contatocobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "contatocobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_contatocobranca__cb

  // ---------- Validate cgcentrega_
  function do_ajax_form_dbo_cliente_validate_cgcentrega_(iNumLinha)
  {
    var nomeCampo_cgcentrega_ = "cgcentrega_" + iNumLinha;
    var var_cgcentrega_ = scAjaxGetFieldText(nomeCampo_cgcentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cgcentrega_(var_cgcentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cgcentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_cgcentrega_

  function do_ajax_form_dbo_cliente_validate_cgcentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cgcentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cgcentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cgcentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cgcentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cgcentrega__cb

  // ---------- Validate inscricaoentrega_
  function do_ajax_form_dbo_cliente_validate_inscricaoentrega_(iNumLinha)
  {
    var nomeCampo_inscricaoentrega_ = "inscricaoentrega_" + iNumLinha;
    var var_inscricaoentrega_ = scAjaxGetFieldText(nomeCampo_inscricaoentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_inscricaoentrega_(var_inscricaoentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_inscricaoentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_inscricaoentrega_

  function do_ajax_form_dbo_cliente_validate_inscricaoentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "inscricaoentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "inscricaoentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "inscricaoentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "inscricaoentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_inscricaoentrega__cb

  // ---------- Validate enderecoentrega_
  function do_ajax_form_dbo_cliente_validate_enderecoentrega_(iNumLinha)
  {
    var nomeCampo_enderecoentrega_ = "enderecoentrega_" + iNumLinha;
    var var_enderecoentrega_ = scAjaxGetFieldText(nomeCampo_enderecoentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_enderecoentrega_(var_enderecoentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_enderecoentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_enderecoentrega_

  function do_ajax_form_dbo_cliente_validate_enderecoentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "enderecoentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "enderecoentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "enderecoentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "enderecoentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_enderecoentrega__cb

  // ---------- Validate cidadeentrega_
  function do_ajax_form_dbo_cliente_validate_cidadeentrega_(iNumLinha)
  {
    var nomeCampo_cidadeentrega_ = "cidadeentrega_" + iNumLinha;
    var var_cidadeentrega_ = scAjaxGetFieldText(nomeCampo_cidadeentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cidadeentrega_(var_cidadeentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cidadeentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_cidadeentrega_

  function do_ajax_form_dbo_cliente_validate_cidadeentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cidadeentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cidadeentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cidadeentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cidadeentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cidadeentrega__cb

  // ---------- Validate bairroentrega_
  function do_ajax_form_dbo_cliente_validate_bairroentrega_(iNumLinha)
  {
    var nomeCampo_bairroentrega_ = "bairroentrega_" + iNumLinha;
    var var_bairroentrega_ = scAjaxGetFieldText(nomeCampo_bairroentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_bairroentrega_(var_bairroentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_bairroentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_bairroentrega_

  function do_ajax_form_dbo_cliente_validate_bairroentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "bairroentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "bairroentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "bairroentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "bairroentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_bairroentrega__cb

  // ---------- Validate estadoentrega_
  function do_ajax_form_dbo_cliente_validate_estadoentrega_(iNumLinha)
  {
    var nomeCampo_estadoentrega_ = "estadoentrega_" + iNumLinha;
    var var_estadoentrega_ = scAjaxGetFieldText(nomeCampo_estadoentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_estadoentrega_(var_estadoentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_estadoentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_estadoentrega_

  function do_ajax_form_dbo_cliente_validate_estadoentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "estadoentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "estadoentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "estadoentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "estadoentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_estadoentrega__cb

  // ---------- Validate cepentrega_
  function do_ajax_form_dbo_cliente_validate_cepentrega_(iNumLinha)
  {
    var nomeCampo_cepentrega_ = "cepentrega_" + iNumLinha;
    var var_cepentrega_ = scAjaxGetFieldText(nomeCampo_cepentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_cepentrega_(var_cepentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_cepentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_cepentrega_

  function do_ajax_form_dbo_cliente_validate_cepentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cepentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "cepentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cepentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cepentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_cepentrega__cb

  // ---------- Validate foneentrega_
  function do_ajax_form_dbo_cliente_validate_foneentrega_(iNumLinha)
  {
    var nomeCampo_foneentrega_ = "foneentrega_" + iNumLinha;
    var var_foneentrega_ = scAjaxGetFieldText(nomeCampo_foneentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_foneentrega_(var_foneentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_foneentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_foneentrega_

  function do_ajax_form_dbo_cliente_validate_foneentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "foneentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "foneentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "foneentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "foneentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_foneentrega__cb

  // ---------- Validate contatoentrega_
  function do_ajax_form_dbo_cliente_validate_contatoentrega_(iNumLinha)
  {
    var nomeCampo_contatoentrega_ = "contatoentrega_" + iNumLinha;
    var var_contatoentrega_ = scAjaxGetFieldText(nomeCampo_contatoentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_contatoentrega_(var_contatoentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_contatoentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_contatoentrega_

  function do_ajax_form_dbo_cliente_validate_contatoentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "contatoentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "contatoentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "contatoentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "contatoentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_contatoentrega__cb

  // ---------- Validate contatoexpedicao_
  function do_ajax_form_dbo_cliente_validate_contatoexpedicao_(iNumLinha)
  {
    var nomeCampo_contatoexpedicao_ = "contatoexpedicao_" + iNumLinha;
    var var_contatoexpedicao_ = scAjaxGetFieldText(nomeCampo_contatoexpedicao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_contatoexpedicao_(var_contatoexpedicao_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_contatoexpedicao__cb);
  } // do_ajax_form_dbo_cliente_validate_contatoexpedicao_

  function do_ajax_form_dbo_cliente_validate_contatoexpedicao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "contatoexpedicao_" + iLineNumber;
    }
    else
    {
      sFieldValid = "contatoexpedicao_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "contatoexpedicao_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "contatoexpedicao_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_contatoexpedicao__cb

  // ---------- Validate foneexpedicao_
  function do_ajax_form_dbo_cliente_validate_foneexpedicao_(iNumLinha)
  {
    var nomeCampo_foneexpedicao_ = "foneexpedicao_" + iNumLinha;
    var var_foneexpedicao_ = scAjaxGetFieldText(nomeCampo_foneexpedicao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_foneexpedicao_(var_foneexpedicao_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_foneexpedicao__cb);
  } // do_ajax_form_dbo_cliente_validate_foneexpedicao_

  function do_ajax_form_dbo_cliente_validate_foneexpedicao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "foneexpedicao_" + iLineNumber;
    }
    else
    {
      sFieldValid = "foneexpedicao_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "foneexpedicao_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "foneexpedicao_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_foneexpedicao__cb

  // ---------- Validate datacadastro_
  function do_ajax_form_dbo_cliente_validate_datacadastro_(iNumLinha)
  {
    var nomeCampo_datacadastro_ = "datacadastro_" + iNumLinha;
    var var_datacadastro_ = scAjaxGetFieldText(nomeCampo_datacadastro_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_datacadastro_(var_datacadastro_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_datacadastro__cb);
  } // do_ajax_form_dbo_cliente_validate_datacadastro_

  function do_ajax_form_dbo_cliente_validate_datacadastro__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "datacadastro_" + iLineNumber;
    }
    else
    {
      sFieldValid = "datacadastro_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "datacadastro_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "datacadastro_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_datacadastro__cb

  // ---------- Validate obs_
  function do_ajax_form_dbo_cliente_validate_obs_(iNumLinha)
  {
    var nomeCampo_obs_ = "obs_" + iNumLinha;
    var var_obs_ = scAjaxGetFieldText(nomeCampo_obs_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_obs_(var_obs_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_obs__cb);
  } // do_ajax_form_dbo_cliente_validate_obs_

  function do_ajax_form_dbo_cliente_validate_obs__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "obs_" + iLineNumber;
    }
    else
    {
      sFieldValid = "obs_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "obs_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "obs_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_obs__cb

  // ---------- Validate tipo_
  function do_ajax_form_dbo_cliente_validate_tipo_(iNumLinha)
  {
    var nomeCampo_tipo_ = "tipo_" + iNumLinha;
    var var_tipo_ = scAjaxGetFieldText(nomeCampo_tipo_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_tipo_(var_tipo_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_tipo__cb);
  } // do_ajax_form_dbo_cliente_validate_tipo_

  function do_ajax_form_dbo_cliente_validate_tipo__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "tipo_" + iLineNumber;
    }
    else
    {
      sFieldValid = "tipo_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "tipo_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "tipo_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_tipo__cb

  // ---------- Validate consumidor_
  function do_ajax_form_dbo_cliente_validate_consumidor_(iNumLinha)
  {
    var nomeCampo_consumidor_ = "consumidor_" + iNumLinha;
    var var_consumidor_ = scAjaxGetFieldText(nomeCampo_consumidor_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_consumidor_(var_consumidor_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_consumidor__cb);
  } // do_ajax_form_dbo_cliente_validate_consumidor_

  function do_ajax_form_dbo_cliente_validate_consumidor__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "consumidor_" + iLineNumber;
    }
    else
    {
      sFieldValid = "consumidor_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "consumidor_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "consumidor_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_consumidor__cb

  // ---------- Validate licensa_
  function do_ajax_form_dbo_cliente_validate_licensa_(iNumLinha)
  {
    var nomeCampo_licensa_ = "licensa_" + iNumLinha;
    var var_licensa_ = scAjaxGetFieldText(nomeCampo_licensa_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_licensa_(var_licensa_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_licensa__cb);
  } // do_ajax_form_dbo_cliente_validate_licensa_

  function do_ajax_form_dbo_cliente_validate_licensa__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "licensa_" + iLineNumber;
    }
    else
    {
      sFieldValid = "licensa_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "licensa_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "licensa_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_licensa__cb

  // ---------- Validate venctolicensa_
  function do_ajax_form_dbo_cliente_validate_venctolicensa_(iNumLinha)
  {
    var nomeCampo_venctolicensa_ = "venctolicensa_" + iNumLinha;
    var var_venctolicensa_ = scAjaxGetFieldText(nomeCampo_venctolicensa_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_venctolicensa_(var_venctolicensa_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_venctolicensa__cb);
  } // do_ajax_form_dbo_cliente_validate_venctolicensa_

  function do_ajax_form_dbo_cliente_validate_venctolicensa__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "venctolicensa_" + iLineNumber;
    }
    else
    {
      sFieldValid = "venctolicensa_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "venctolicensa_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "venctolicensa_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_venctolicensa__cb

  // ---------- Validate licensa1_
  function do_ajax_form_dbo_cliente_validate_licensa1_(iNumLinha)
  {
    var nomeCampo_licensa1_ = "licensa1_" + iNumLinha;
    var var_licensa1_ = scAjaxGetFieldText(nomeCampo_licensa1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_licensa1_(var_licensa1_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_licensa1__cb);
  } // do_ajax_form_dbo_cliente_validate_licensa1_

  function do_ajax_form_dbo_cliente_validate_licensa1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "licensa1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "licensa1_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "licensa1_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "licensa1_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_licensa1__cb

  // ---------- Validate venctolicensa1_
  function do_ajax_form_dbo_cliente_validate_venctolicensa1_(iNumLinha)
  {
    var nomeCampo_venctolicensa1_ = "venctolicensa1_" + iNumLinha;
    var var_venctolicensa1_ = scAjaxGetFieldText(nomeCampo_venctolicensa1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_venctolicensa1_(var_venctolicensa1_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_venctolicensa1__cb);
  } // do_ajax_form_dbo_cliente_validate_venctolicensa1_

  function do_ajax_form_dbo_cliente_validate_venctolicensa1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "venctolicensa1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "venctolicensa1_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "venctolicensa1_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "venctolicensa1_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_venctolicensa1__cb

  // ---------- Validate qtdeliberada_
  function do_ajax_form_dbo_cliente_validate_qtdeliberada_(iNumLinha)
  {
    var nomeCampo_qtdeliberada_ = "qtdeliberada_" + iNumLinha;
    var var_qtdeliberada_ = scAjaxGetFieldText(nomeCampo_qtdeliberada_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_qtdeliberada_(var_qtdeliberada_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_qtdeliberada__cb);
  } // do_ajax_form_dbo_cliente_validate_qtdeliberada_

  function do_ajax_form_dbo_cliente_validate_qtdeliberada__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "qtdeliberada_" + iLineNumber;
    }
    else
    {
      sFieldValid = "qtdeliberada_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "qtdeliberada_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "qtdeliberada_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_qtdeliberada__cb

  // ---------- Validate licensa2_
  function do_ajax_form_dbo_cliente_validate_licensa2_(iNumLinha)
  {
    var nomeCampo_licensa2_ = "licensa2_" + iNumLinha;
    var var_licensa2_ = scAjaxGetFieldText(nomeCampo_licensa2_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_licensa2_(var_licensa2_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_licensa2__cb);
  } // do_ajax_form_dbo_cliente_validate_licensa2_

  function do_ajax_form_dbo_cliente_validate_licensa2__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "licensa2_" + iLineNumber;
    }
    else
    {
      sFieldValid = "licensa2_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "licensa2_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "licensa2_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_licensa2__cb

  // ---------- Validate venctolicensa2_
  function do_ajax_form_dbo_cliente_validate_venctolicensa2_(iNumLinha)
  {
    var nomeCampo_venctolicensa2_ = "venctolicensa2_" + iNumLinha;
    var var_venctolicensa2_ = scAjaxGetFieldText(nomeCampo_venctolicensa2_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_venctolicensa2_(var_venctolicensa2_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_venctolicensa2__cb);
  } // do_ajax_form_dbo_cliente_validate_venctolicensa2_

  function do_ajax_form_dbo_cliente_validate_venctolicensa2__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "venctolicensa2_" + iLineNumber;
    }
    else
    {
      sFieldValid = "venctolicensa2_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "venctolicensa2_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "venctolicensa2_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_venctolicensa2__cb

  // ---------- Validate icms_
  function do_ajax_form_dbo_cliente_validate_icms_(iNumLinha)
  {
    var nomeCampo_icms_ = "icms_" + iNumLinha;
    var var_icms_ = scAjaxGetFieldText(nomeCampo_icms_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_icms_(var_icms_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_icms__cb);
  } // do_ajax_form_dbo_cliente_validate_icms_

  function do_ajax_form_dbo_cliente_validate_icms__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "icms_" + iLineNumber;
    }
    else
    {
      sFieldValid = "icms_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "icms_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "icms_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_icms__cb

  // ---------- Validate suframa_
  function do_ajax_form_dbo_cliente_validate_suframa_(iNumLinha)
  {
    var nomeCampo_suframa_ = "suframa_" + iNumLinha;
    var var_suframa_ = scAjaxGetFieldText(nomeCampo_suframa_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_suframa_(var_suframa_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_suframa__cb);
  } // do_ajax_form_dbo_cliente_validate_suframa_

  function do_ajax_form_dbo_cliente_validate_suframa__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "suframa_" + iLineNumber;
    }
    else
    {
      sFieldValid = "suframa_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "suframa_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "suframa_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_suframa__cb

  // ---------- Validate limitecredito_
  function do_ajax_form_dbo_cliente_validate_limitecredito_(iNumLinha)
  {
    var nomeCampo_limitecredito_ = "limitecredito_" + iNumLinha;
    var var_limitecredito_ = scAjaxGetFieldText(nomeCampo_limitecredito_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_limitecredito_(var_limitecredito_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_limitecredito__cb);
  } // do_ajax_form_dbo_cliente_validate_limitecredito_

  function do_ajax_form_dbo_cliente_validate_limitecredito__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "limitecredito_" + iLineNumber;
    }
    else
    {
      sFieldValid = "limitecredito_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "limitecredito_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "limitecredito_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_limitecredito__cb

  // ---------- Validate vendedor_
  function do_ajax_form_dbo_cliente_validate_vendedor_(iNumLinha)
  {
    var nomeCampo_vendedor_ = "vendedor_" + iNumLinha;
    var var_vendedor_ = scAjaxGetFieldText(nomeCampo_vendedor_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_vendedor_(var_vendedor_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_vendedor__cb);
  } // do_ajax_form_dbo_cliente_validate_vendedor_

  function do_ajax_form_dbo_cliente_validate_vendedor__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "vendedor_" + iLineNumber;
    }
    else
    {
      sFieldValid = "vendedor_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "vendedor_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "vendedor_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_vendedor__cb

  // ---------- Validate restricao_
  function do_ajax_form_dbo_cliente_validate_restricao_(iNumLinha)
  {
    var nomeCampo_restricao_ = "restricao_" + iNumLinha;
    var var_restricao_ = scAjaxGetFieldText(nomeCampo_restricao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_restricao_(var_restricao_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_restricao__cb);
  } // do_ajax_form_dbo_cliente_validate_restricao_

  function do_ajax_form_dbo_cliente_validate_restricao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "restricao_" + iLineNumber;
    }
    else
    {
      sFieldValid = "restricao_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "restricao_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "restricao_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_restricao__cb

  // ---------- Validate comissao_
  function do_ajax_form_dbo_cliente_validate_comissao_(iNumLinha)
  {
    var nomeCampo_comissao_ = "comissao_" + iNumLinha;
    var var_comissao_ = scAjaxGetFieldText(nomeCampo_comissao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_comissao_(var_comissao_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_comissao__cb);
  } // do_ajax_form_dbo_cliente_validate_comissao_

  function do_ajax_form_dbo_cliente_validate_comissao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "comissao_" + iLineNumber;
    }
    else
    {
      sFieldValid = "comissao_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "comissao_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "comissao_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_comissao__cb

  // ---------- Validate transportadora_
  function do_ajax_form_dbo_cliente_validate_transportadora_(iNumLinha)
  {
    var nomeCampo_transportadora_ = "transportadora_" + iNumLinha;
    var var_transportadora_ = scAjaxGetFieldText(nomeCampo_transportadora_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_transportadora_(var_transportadora_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_transportadora__cb);
  } // do_ajax_form_dbo_cliente_validate_transportadora_

  function do_ajax_form_dbo_cliente_validate_transportadora__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "transportadora_" + iLineNumber;
    }
    else
    {
      sFieldValid = "transportadora_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "transportadora_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "transportadora_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_transportadora__cb

  // ---------- Validate coleta_
  function do_ajax_form_dbo_cliente_validate_coleta_(iNumLinha)
  {
    var nomeCampo_coleta_ = "coleta_" + iNumLinha;
    var var_coleta_ = scAjaxGetFieldText(nomeCampo_coleta_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_coleta_(var_coleta_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_coleta__cb);
  } // do_ajax_form_dbo_cliente_validate_coleta_

  function do_ajax_form_dbo_cliente_validate_coleta__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "coleta_" + iLineNumber;
    }
    else
    {
      sFieldValid = "coleta_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "coleta_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "coleta_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_coleta__cb

  // ---------- Validate segmento_
  function do_ajax_form_dbo_cliente_validate_segmento_(iNumLinha)
  {
    var nomeCampo_segmento_ = "segmento_" + iNumLinha;
    var var_segmento_ = scAjaxGetFieldText(nomeCampo_segmento_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_segmento_(var_segmento_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_segmento__cb);
  } // do_ajax_form_dbo_cliente_validate_segmento_

  function do_ajax_form_dbo_cliente_validate_segmento__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "segmento_" + iLineNumber;
    }
    else
    {
      sFieldValid = "segmento_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "segmento_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "segmento_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_segmento__cb

  // ---------- Validate dataalteracao_
  function do_ajax_form_dbo_cliente_validate_dataalteracao_(iNumLinha)
  {
    var nomeCampo_dataalteracao_ = "dataalteracao_" + iNumLinha;
    var var_dataalteracao_ = scAjaxGetFieldText(nomeCampo_dataalteracao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_dataalteracao_(var_dataalteracao_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_dataalteracao__cb);
  } // do_ajax_form_dbo_cliente_validate_dataalteracao_

  function do_ajax_form_dbo_cliente_validate_dataalteracao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dataalteracao_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dataalteracao_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dataalteracao_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dataalteracao_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_dataalteracao__cb

  // ---------- Validate usuario_
  function do_ajax_form_dbo_cliente_validate_usuario_(iNumLinha)
  {
    var nomeCampo_usuario_ = "usuario_" + iNumLinha;
    var var_usuario_ = scAjaxGetFieldText(nomeCampo_usuario_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_usuario_(var_usuario_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_usuario__cb);
  } // do_ajax_form_dbo_cliente_validate_usuario_

  function do_ajax_form_dbo_cliente_validate_usuario__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "usuario_" + iLineNumber;
    }
    else
    {
      sFieldValid = "usuario_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "usuario_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "usuario_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_usuario__cb

  // ---------- Validate requisitos_
  function do_ajax_form_dbo_cliente_validate_requisitos_(iNumLinha)
  {
    var nomeCampo_requisitos_ = "requisitos_" + iNumLinha;
    var var_requisitos_ = scAjaxGetFieldText(nomeCampo_requisitos_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_requisitos_(var_requisitos_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_requisitos__cb);
  } // do_ajax_form_dbo_cliente_validate_requisitos_

  function do_ajax_form_dbo_cliente_validate_requisitos__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "requisitos_" + iLineNumber;
    }
    else
    {
      sFieldValid = "requisitos_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "requisitos_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "requisitos_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_requisitos__cb

  // ---------- Validate banco_
  function do_ajax_form_dbo_cliente_validate_banco_(iNumLinha)
  {
    var nomeCampo_banco_ = "banco_" + iNumLinha;
    var var_banco_ = scAjaxGetFieldText(nomeCampo_banco_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_banco_(var_banco_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_banco__cb);
  } // do_ajax_form_dbo_cliente_validate_banco_

  function do_ajax_form_dbo_cliente_validate_banco__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "banco_" + iLineNumber;
    }
    else
    {
      sFieldValid = "banco_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "banco_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "banco_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_banco__cb

  // ---------- Validate emailcobranca_
  function do_ajax_form_dbo_cliente_validate_emailcobranca_(iNumLinha)
  {
    var nomeCampo_emailcobranca_ = "emailcobranca_" + iNumLinha;
    var var_emailcobranca_ = scAjaxGetFieldText(nomeCampo_emailcobranca_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_emailcobranca_(var_emailcobranca_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_emailcobranca__cb);
  } // do_ajax_form_dbo_cliente_validate_emailcobranca_

  function do_ajax_form_dbo_cliente_validate_emailcobranca__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "emailcobranca_" + iLineNumber;
    }
    else
    {
      sFieldValid = "emailcobranca_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "emailcobranca_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "emailcobranca_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_emailcobranca__cb

  // ---------- Validate emailtecnico_
  function do_ajax_form_dbo_cliente_validate_emailtecnico_(iNumLinha)
  {
    var nomeCampo_emailtecnico_ = "emailtecnico_" + iNumLinha;
    var var_emailtecnico_ = scAjaxGetFieldText(nomeCampo_emailtecnico_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_emailtecnico_(var_emailtecnico_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_emailtecnico__cb);
  } // do_ajax_form_dbo_cliente_validate_emailtecnico_

  function do_ajax_form_dbo_cliente_validate_emailtecnico__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "emailtecnico_" + iLineNumber;
    }
    else
    {
      sFieldValid = "emailtecnico_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "emailtecnico_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "emailtecnico_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_emailtecnico__cb

  // ---------- Validate midia_
  function do_ajax_form_dbo_cliente_validate_midia_(iNumLinha)
  {
    var nomeCampo_midia_ = "midia_" + iNumLinha;
    var var_midia_ = scAjaxGetFieldText(nomeCampo_midia_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_midia_(var_midia_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_midia__cb);
  } // do_ajax_form_dbo_cliente_validate_midia_

  function do_ajax_form_dbo_cliente_validate_midia__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "midia_" + iLineNumber;
    }
    else
    {
      sFieldValid = "midia_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "midia_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "midia_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_midia__cb

  // ---------- Validate seg_
  function do_ajax_form_dbo_cliente_validate_seg_(iNumLinha)
  {
    var nomeCampo_seg_ = "seg_" + iNumLinha;
    var var_seg_ = scAjaxGetFieldText(nomeCampo_seg_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_seg_(var_seg_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_seg__cb);
  } // do_ajax_form_dbo_cliente_validate_seg_

  function do_ajax_form_dbo_cliente_validate_seg__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "seg_" + iLineNumber;
    }
    else
    {
      sFieldValid = "seg_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "seg_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "seg_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_seg__cb

  // ---------- Validate ter_
  function do_ajax_form_dbo_cliente_validate_ter_(iNumLinha)
  {
    var nomeCampo_ter_ = "ter_" + iNumLinha;
    var var_ter_ = scAjaxGetFieldText(nomeCampo_ter_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_ter_(var_ter_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_ter__cb);
  } // do_ajax_form_dbo_cliente_validate_ter_

  function do_ajax_form_dbo_cliente_validate_ter__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "ter_" + iLineNumber;
    }
    else
    {
      sFieldValid = "ter_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "ter_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "ter_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_ter__cb

  // ---------- Validate qua_
  function do_ajax_form_dbo_cliente_validate_qua_(iNumLinha)
  {
    var nomeCampo_qua_ = "qua_" + iNumLinha;
    var var_qua_ = scAjaxGetFieldText(nomeCampo_qua_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_qua_(var_qua_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_qua__cb);
  } // do_ajax_form_dbo_cliente_validate_qua_

  function do_ajax_form_dbo_cliente_validate_qua__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "qua_" + iLineNumber;
    }
    else
    {
      sFieldValid = "qua_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "qua_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "qua_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_qua__cb

  // ---------- Validate qui_
  function do_ajax_form_dbo_cliente_validate_qui_(iNumLinha)
  {
    var nomeCampo_qui_ = "qui_" + iNumLinha;
    var var_qui_ = scAjaxGetFieldText(nomeCampo_qui_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_qui_(var_qui_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_qui__cb);
  } // do_ajax_form_dbo_cliente_validate_qui_

  function do_ajax_form_dbo_cliente_validate_qui__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "qui_" + iLineNumber;
    }
    else
    {
      sFieldValid = "qui_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "qui_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "qui_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_qui__cb

  // ---------- Validate sex_
  function do_ajax_form_dbo_cliente_validate_sex_(iNumLinha)
  {
    var nomeCampo_sex_ = "sex_" + iNumLinha;
    var var_sex_ = scAjaxGetFieldText(nomeCampo_sex_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_sex_(var_sex_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_sex__cb);
  } // do_ajax_form_dbo_cliente_validate_sex_

  function do_ajax_form_dbo_cliente_validate_sex__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sex_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sex_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sex_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sex_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_sex__cb

  // ---------- Validate certificado_
  function do_ajax_form_dbo_cliente_validate_certificado_(iNumLinha)
  {
    var nomeCampo_certificado_ = "certificado_" + iNumLinha;
    var var_certificado_ = scAjaxGetFieldText(nomeCampo_certificado_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_certificado_(var_certificado_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_certificado__cb);
  } // do_ajax_form_dbo_cliente_validate_certificado_

  function do_ajax_form_dbo_cliente_validate_certificado__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "certificado_" + iLineNumber;
    }
    else
    {
      sFieldValid = "certificado_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "certificado_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "certificado_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_certificado__cb

  // ---------- Validate emailnfe_
  function do_ajax_form_dbo_cliente_validate_emailnfe_(iNumLinha)
  {
    var nomeCampo_emailnfe_ = "emailnfe_" + iNumLinha;
    var var_emailnfe_ = scAjaxGetFieldText(nomeCampo_emailnfe_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_emailnfe_(var_emailnfe_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_emailnfe__cb);
  } // do_ajax_form_dbo_cliente_validate_emailnfe_

  function do_ajax_form_dbo_cliente_validate_emailnfe__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "emailnfe_" + iLineNumber;
    }
    else
    {
      sFieldValid = "emailnfe_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "emailnfe_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "emailnfe_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_emailnfe__cb

  // ---------- Validate fundacao_
  function do_ajax_form_dbo_cliente_validate_fundacao_(iNumLinha)
  {
    var nomeCampo_fundacao_ = "fundacao_" + iNumLinha;
    var var_fundacao_ = scAjaxGetFieldText(nomeCampo_fundacao_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_fundacao_(var_fundacao_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_fundacao__cb);
  } // do_ajax_form_dbo_cliente_validate_fundacao_

  function do_ajax_form_dbo_cliente_validate_fundacao__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "fundacao_" + iLineNumber;
    }
    else
    {
      sFieldValid = "fundacao_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "fundacao_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "fundacao_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_fundacao__cb

  // ---------- Validate site_
  function do_ajax_form_dbo_cliente_validate_site_(iNumLinha)
  {
    var nomeCampo_site_ = "site_" + iNumLinha;
    var var_site_ = scAjaxGetFieldText(nomeCampo_site_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_site_(var_site_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_site__cb);
  } // do_ajax_form_dbo_cliente_validate_site_

  function do_ajax_form_dbo_cliente_validate_site__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "site_" + iLineNumber;
    }
    else
    {
      sFieldValid = "site_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "site_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "site_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_site__cb

  // ---------- Validate financeiro_
  function do_ajax_form_dbo_cliente_validate_financeiro_(iNumLinha)
  {
    var nomeCampo_financeiro_ = "financeiro_" + iNumLinha;
    var var_financeiro_ = scAjaxGetFieldText(nomeCampo_financeiro_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_financeiro_(var_financeiro_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_financeiro__cb);
  } // do_ajax_form_dbo_cliente_validate_financeiro_

  function do_ajax_form_dbo_cliente_validate_financeiro__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "financeiro_" + iLineNumber;
    }
    else
    {
      sFieldValid = "financeiro_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "financeiro_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "financeiro_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_financeiro__cb

  // ---------- Validate numero_
  function do_ajax_form_dbo_cliente_validate_numero_(iNumLinha)
  {
    var nomeCampo_numero_ = "numero_" + iNumLinha;
    var var_numero_ = scAjaxGetFieldText(nomeCampo_numero_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_numero_(var_numero_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_numero__cb);
  } // do_ajax_form_dbo_cliente_validate_numero_

  function do_ajax_form_dbo_cliente_validate_numero__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "numero_" + iLineNumber;
    }
    else
    {
      sFieldValid = "numero_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "numero_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "numero_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_numero__cb

  // ---------- Validate complemento_
  function do_ajax_form_dbo_cliente_validate_complemento_(iNumLinha)
  {
    var nomeCampo_complemento_ = "complemento_" + iNumLinha;
    var var_complemento_ = scAjaxGetFieldText(nomeCampo_complemento_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_complemento_(var_complemento_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_complemento__cb);
  } // do_ajax_form_dbo_cliente_validate_complemento_

  function do_ajax_form_dbo_cliente_validate_complemento__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "complemento_" + iLineNumber;
    }
    else
    {
      sFieldValid = "complemento_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "complemento_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "complemento_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_complemento__cb

  // ---------- Validate razaosocialentrega_
  function do_ajax_form_dbo_cliente_validate_razaosocialentrega_(iNumLinha)
  {
    var nomeCampo_razaosocialentrega_ = "razaosocialentrega_" + iNumLinha;
    var var_razaosocialentrega_ = scAjaxGetFieldText(nomeCampo_razaosocialentrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_razaosocialentrega_(var_razaosocialentrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_razaosocialentrega__cb);
  } // do_ajax_form_dbo_cliente_validate_razaosocialentrega_

  function do_ajax_form_dbo_cliente_validate_razaosocialentrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "razaosocialentrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "razaosocialentrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "razaosocialentrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "razaosocialentrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_razaosocialentrega__cb

  // ---------- Validate entrega_
  function do_ajax_form_dbo_cliente_validate_entrega_(iNumLinha)
  {
    var nomeCampo_entrega_ = "entrega_" + iNumLinha;
    var var_entrega_ = scAjaxGetFieldText(nomeCampo_entrega_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_entrega_(var_entrega_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_entrega__cb);
  } // do_ajax_form_dbo_cliente_validate_entrega_

  function do_ajax_form_dbo_cliente_validate_entrega__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "entrega_" + iLineNumber;
    }
    else
    {
      sFieldValid = "entrega_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "entrega_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "entrega_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_entrega__cb

  // ---------- Validate contatotecnico_
  function do_ajax_form_dbo_cliente_validate_contatotecnico_(iNumLinha)
  {
    var nomeCampo_contatotecnico_ = "contatotecnico_" + iNumLinha;
    var var_contatotecnico_ = scAjaxGetFieldText(nomeCampo_contatotecnico_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_validate_contatotecnico_(var_contatotecnico_, iNumLinha, var_script_case_init, do_ajax_form_dbo_cliente_validate_contatotecnico__cb);
  } // do_ajax_form_dbo_cliente_validate_contatotecnico_

  function do_ajax_form_dbo_cliente_validate_contatotecnico__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "contatotecnico_" + iLineNumber;
    }
    else
    {
      sFieldValid = "contatotecnico_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "contatotecnico_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "contatotecnico_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_dbo_cliente_validate_contatotecnico__cb

  var sc_num_ult_line = "";
  var sc_insert_open  = false;

  // ---------- add_new_line
  function do_ajax_form_dbo_cliente_add_new_line(sc_clone, sc_seq_clone)
  {
    if (sc_insert_open)
    {
        if (sc_clone == 'S' && sc_seq_clone != iAjaxNewLine)
        {
          do_ajax_form_dbo_cliente_cancel_insert(iAjaxNewLine);
        }
        else
        {
          return;
        }
    }
    sc_insert_open = true;
    scDisableNavigation();
    sc_num_ult_line = iAjaxNewLine + 1;
    if (sc_clone == 'S')
    {
      var var_sc_clone     = sc_clone;
      var var_sc_seq_clone = sc_seq_clone;
    }
    else
    {
      var var_sc_clone     = 'N';
      var var_sc_seq_clone = '';
    }
    var var_sc_seq_vert = document.F1.sc_contr_vert.value;
    var var_script_case_init = document.F1.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_dbo_cliente_add_new_line(var_sc_clone, var_sc_seq_clone, var_sc_seq_vert, var_script_case_init, do_ajax_form_dbo_cliente_add_new_line_cb);
  } // do_ajax_form_dbo_cliente_add_new_line

  function do_ajax_form_dbo_cliente_add_new_line_cb(sResp)
  {
    scAjaxProcOff(true);
    if ("{" == sResp.substr(0, 1)) {
        oResp = scAjaxResponse(sResp);
        scAjaxRedir();
    }
    var sv_quot = sResp.replace(/&quot;/g, "_nm__asp_");
    sv_quot = scAjaxSpecCharParser(sv_quot);
    document.getElementById("new_line_dummy").innerHTML = "<table id=\"new_line_table\">" + sv_quot.replace(/_nm__asp_/g, "&quot;") + "</table>";
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTBodyNew = document.getElementById("new_line_table").tBodies[0];
    var oTRNewLine = oTBodyNew.rows[0];
    oTBodyOld.appendChild(oTRNewLine);
    ajax_create_tables(document.F1.sc_contr_vert.value);
    iAjaxNewLine = document.F1.sc_contr_vert.value;
    document.F1.sc_contr_vert.value++;
    scJQElementsAdd(iAjaxNewLine);
    if (document.getElementById("sc_clone_line_" + iAjaxNewLine))
        document.getElementById("sc_clone_line_" + iAjaxNewLine).style.display = "none";
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' input:text.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' input:password.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' input:checkbox.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' input:radio.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' select.sc-js-input');
    scLoadScInput('#idVertRow' + iAjaxNewLine + ' textarea.sc-js-input');
  } // do_ajax_form_dbo_cliente_add_new_line_cb

  // ---------- backup_line
  function do_ajax_form_dbo_cliente_backup_line(iNumLinha)
  {
    var var_cd_cliente_ = scAjaxGetFieldHidden("cd_cliente_" + iNumLinha);
    var var_nmgp_refresh_row = iNumLinha;
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_dbo_cliente_backup_line(var_cd_cliente_, var_nmgp_refresh_row, var_nm_form_submit, var_script_case_init, do_ajax_form_dbo_cliente_backup_line_cb);
  } // do_ajax_form_dbo_cliente_backup_line

  function do_ajax_form_dbo_cliente_backup_line_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    if (!scAjaxHasError())
    {
      scAjaxSetFields(false);
      scAjaxSetVariables();
    }
  } // do_ajax_form_dbo_cliente_backup_line_cb

  function do_ajax_form_dbo_cliente_cancel_insert(iSeqVert)
  {
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTROldLine = oTBodyOld.rows[oTBodyOld.rows.length - 1];
    oTBodyOld.removeChild(oTROldLine);
    ajax_destroy_tables(iSeqVert);
    scEnableNavigation();
    sc_insert_open = false;
    scAjaxHideErrorDisplay("table");
  } // do_ajax_form_dbo_cliente_cancel_insert

  function do_ajax_form_dbo_cliente_cancel_update(iSeqVert)
  {
    do_ajax_form_dbo_cliente_backup_line(iSeqVert);
    scErrorLineOff(iSeqVert, "__sc_all__");
    scAjaxHideErrorDisplay("table");
<?php
    if ($this->Embutida_ronly)
    {
?>
    mdCloseObjects(iSeqVert);
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
    if (document.getElementById("sc_exc_line_" + iSeqVert))
      document.getElementById("sc_exc_line_" + iSeqVert).style.display = "";
<?php
    }
?>
    if (document.getElementById("sc_open_line_" + iSeqVert))
      document.getElementById("sc_open_line_" + iSeqVert).style.display = "";
    if (document.getElementById("sc_upd_line_" + iSeqVert))
      document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
    if (document.getElementById("sc_cancelu_line_" + iSeqVert))
      document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
<?php
    }
?>
  } // do_ajax_form_dbo_cliente_cancel_update

  function do_ajax_form_dbo_cliente_restore_buttons()
  {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
?>
    for (iSeqVert = 1; iSeqVert <= <?php echo $this->sc_max_reg; ?>; iSeqVert++)
    {
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
<?php
    }
?>
      if (document.getElementById("sc_ins_line_" + iSeqVert))
        document.getElementById("sc_ins_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_upd_line_" + iSeqVert))
        document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_new_line_" + iSeqVert))
        document.getElementById("sc_new_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_canceli_line_" + iSeqVert))
        document.getElementById("sc_canceli_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_cancelu_line_" + iSeqVert))
        document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
    }
<?php
    }
?>
  } // do_ajax_form_dbo_cliente_restore_buttons

  // ---------- table_refresh
  function do_ajax_form_dbo_cliente_table_refresh()
  {
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
    x_ajax_form_dbo_cliente_table_refresh(var_cd_cliente_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search, var_nmgp_cond_fast_search, var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_dbo_cliente_table_refresh_cb);
  } //  do_ajax_form_dbo_cliente_table_refresh

  function do_ajax_form_dbo_cliente_table_refresh_cb(sResp)
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
    if (oResp["rsSize"] < <?php echo $this->sc_max_reg; ?>)
    {
       bRefreshTable = true;
    }
    if (oResp["navSummary"].reg_tot == 0)
    {
       $("#sc-ui-empty-form").show();
       $(".sc-ui-page-tab-line").hide();
       $("#sc-id-required-row").hide();
    }
    else
    {
       $("#sc-ui-empty-form").hide();
       $(".sc-ui-page-tab-line").show();
       $("#sc-id-required-row").show();
    }
    document.F2.cd_cliente_.value = scAjaxGetKeyValue("cd_cliente_");
    for (i = 1; i < <?php echo $this->sc_max_reg + 1; ?> ; i++)
    {
    }
    var sv_quot = oResp["tableRefresh"].replace(/&quot;/g, "_nm__asp_");
    sv_quot = scAjaxSpecCharParser(sv_quot);
    document.getElementById("SC_tab_mult_reg").innerHTML = sv_quot.replace(/_nm__asp_/g, "&quot;");
    for (i = 1; i < <?php echo $this->sc_max_reg + 1; ?> ; i++)
    {
    }
    document.F1.sc_contr_vert.value = parseInt(oResp["rsSize"]) + 1;
    iAjaxNewLine = oResp["rsSize"];
    scAjaxSetVariables();
    var iAjaxNewLine = <?php echo $this->sc_max_reg + 1; ?>;
    for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
         scJQElementsAdd(iLine);
    }
    scJQGeneralAdd();
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scQSInit = true;
    scQSInitVal = $("#SC_fast_search_t").val();
    scQuickSearchKeyUp('t', null);
    $('#SC_fast_search_t').blur();
    scQuickSearchInit(true, '');
    scQSInit = false;
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    sc_insert_open = false;
  } // do_ajax_form_dbo_cliente_table_refresh_cb

  // ---------- Form
  var sc_num_ult_line = "";
  var sc_num_ult_opc  = "";
  var sc_num_ult_tr   = "";
  function do_ajax_form_dbo_cliente_submit_form(iNumLinha, indexTR)
  {
    if (scEventControl_active(iNumLinha)) {
      setTimeout(function() { do_ajax_form_dbo_cliente_submit_form(iNumLinha, indexTR); }, 500);
      return;
    }
    sc_num_ult_line = iNumLinha;
    sc_num_ult_tr   = indexTR;
    scAjaxHideMessage();
    var var_cd_cliente_ = scAjaxGetFieldHidden("cd_cliente_" + iNumLinha);
    var var_razaosocial_ = scAjaxGetFieldText("razaosocial_" + iNumLinha);
    var var_nomefantasia_ = scAjaxGetFieldText("nomefantasia_" + iNumLinha);
    var var_cgc_ = scAjaxGetFieldText("cgc_" + iNumLinha);
    var var_inscricao_ = scAjaxGetFieldText("inscricao_" + iNumLinha);
    var var_endereco_ = scAjaxGetFieldText("endereco_" + iNumLinha);
    var var_cidade_ = scAjaxGetFieldText("cidade_" + iNumLinha);
    var var_estado_ = scAjaxGetFieldText("estado_" + iNumLinha);
    var var_bairro_ = scAjaxGetFieldText("bairro_" + iNumLinha);
    var var_cep_ = scAjaxGetFieldText("cep_" + iNumLinha);
    var var_email_ = scAjaxGetFieldText("email_" + iNumLinha);
    var var_fone_ = scAjaxGetFieldText("fone_" + iNumLinha);
    var var_fone1_ = scAjaxGetFieldText("fone1_" + iNumLinha);
    var var_fax_ = scAjaxGetFieldText("fax_" + iNumLinha);
    var var_contato_ = scAjaxGetFieldText("contato_" + iNumLinha);
    var var_enderecocobranca_ = scAjaxGetFieldText("enderecocobranca_" + iNumLinha);
    var var_cidadecobranca_ = scAjaxGetFieldText("cidadecobranca_" + iNumLinha);
    var var_bairrocobranca_ = scAjaxGetFieldText("bairrocobranca_" + iNumLinha);
    var var_estadocobranca_ = scAjaxGetFieldText("estadocobranca_" + iNumLinha);
    var var_cepcobranca_ = scAjaxGetFieldText("cepcobranca_" + iNumLinha);
    var var_fonecobranca_ = scAjaxGetFieldText("fonecobranca_" + iNumLinha);
    var var_faxcobranca_ = scAjaxGetFieldText("faxcobranca_" + iNumLinha);
    var var_contatocobranca_ = scAjaxGetFieldText("contatocobranca_" + iNumLinha);
    var var_cgcentrega_ = scAjaxGetFieldText("cgcentrega_" + iNumLinha);
    var var_inscricaoentrega_ = scAjaxGetFieldText("inscricaoentrega_" + iNumLinha);
    var var_enderecoentrega_ = scAjaxGetFieldText("enderecoentrega_" + iNumLinha);
    var var_cidadeentrega_ = scAjaxGetFieldText("cidadeentrega_" + iNumLinha);
    var var_bairroentrega_ = scAjaxGetFieldText("bairroentrega_" + iNumLinha);
    var var_estadoentrega_ = scAjaxGetFieldText("estadoentrega_" + iNumLinha);
    var var_cepentrega_ = scAjaxGetFieldText("cepentrega_" + iNumLinha);
    var var_foneentrega_ = scAjaxGetFieldText("foneentrega_" + iNumLinha);
    var var_contatoentrega_ = scAjaxGetFieldText("contatoentrega_" + iNumLinha);
    var var_contatoexpedicao_ = scAjaxGetFieldText("contatoexpedicao_" + iNumLinha);
    var var_foneexpedicao_ = scAjaxGetFieldText("foneexpedicao_" + iNumLinha);
    var var_datacadastro_ = scAjaxGetFieldText("datacadastro_" + iNumLinha);
    var var_obs_ = scAjaxGetFieldText("obs_" + iNumLinha);
    var var_tipo_ = scAjaxGetFieldText("tipo_" + iNumLinha);
    var var_consumidor_ = scAjaxGetFieldText("consumidor_" + iNumLinha);
    var var_licensa_ = scAjaxGetFieldText("licensa_" + iNumLinha);
    var var_venctolicensa_ = scAjaxGetFieldText("venctolicensa_" + iNumLinha);
    var var_licensa1_ = scAjaxGetFieldText("licensa1_" + iNumLinha);
    var var_venctolicensa1_ = scAjaxGetFieldText("venctolicensa1_" + iNumLinha);
    var var_qtdeliberada_ = scAjaxGetFieldText("qtdeliberada_" + iNumLinha);
    var var_licensa2_ = scAjaxGetFieldText("licensa2_" + iNumLinha);
    var var_venctolicensa2_ = scAjaxGetFieldText("venctolicensa2_" + iNumLinha);
    var var_icms_ = scAjaxGetFieldText("icms_" + iNumLinha);
    var var_suframa_ = scAjaxGetFieldText("suframa_" + iNumLinha);
    var var_limitecredito_ = scAjaxGetFieldText("limitecredito_" + iNumLinha);
    var var_vendedor_ = scAjaxGetFieldText("vendedor_" + iNumLinha);
    var var_restricao_ = scAjaxGetFieldText("restricao_" + iNumLinha);
    var var_comissao_ = scAjaxGetFieldText("comissao_" + iNumLinha);
    var var_transportadora_ = scAjaxGetFieldText("transportadora_" + iNumLinha);
    var var_coleta_ = scAjaxGetFieldText("coleta_" + iNumLinha);
    var var_segmento_ = scAjaxGetFieldText("segmento_" + iNumLinha);
    var var_dataalteracao_ = scAjaxGetFieldText("dataalteracao_" + iNumLinha);
    var var_usuario_ = scAjaxGetFieldText("usuario_" + iNumLinha);
    var var_requisitos_ = scAjaxGetFieldText("requisitos_" + iNumLinha);
    var var_banco_ = scAjaxGetFieldText("banco_" + iNumLinha);
    var var_emailcobranca_ = scAjaxGetFieldText("emailcobranca_" + iNumLinha);
    var var_emailtecnico_ = scAjaxGetFieldText("emailtecnico_" + iNumLinha);
    var var_midia_ = scAjaxGetFieldText("midia_" + iNumLinha);
    var var_seg_ = scAjaxGetFieldText("seg_" + iNumLinha);
    var var_ter_ = scAjaxGetFieldText("ter_" + iNumLinha);
    var var_qua_ = scAjaxGetFieldText("qua_" + iNumLinha);
    var var_qui_ = scAjaxGetFieldText("qui_" + iNumLinha);
    var var_sex_ = scAjaxGetFieldText("sex_" + iNumLinha);
    var var_certificado_ = scAjaxGetFieldText("certificado_" + iNumLinha);
    var var_emailnfe_ = scAjaxGetFieldText("emailnfe_" + iNumLinha);
    var var_fundacao_ = scAjaxGetFieldText("fundacao_" + iNumLinha);
    var var_site_ = scAjaxGetFieldText("site_" + iNumLinha);
    var var_financeiro_ = scAjaxGetFieldText("financeiro_" + iNumLinha);
    var var_numero_ = scAjaxGetFieldText("numero_" + iNumLinha);
    var var_complemento_ = scAjaxGetFieldText("complemento_" + iNumLinha);
    var var_razaosocialentrega_ = scAjaxGetFieldText("razaosocialentrega_" + iNumLinha);
    var var_entrega_ = scAjaxGetFieldText("entrega_" + iNumLinha);
    var var_contatotecnico_ = scAjaxGetFieldText("contatotecnico_" + iNumLinha);
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = "Sc_num_lin_alt?#?" + iNumLinha + "?@?" +  document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    var var_nmgp_refresh_row = iNumLinha;
<?php
    }
    else
    {
?>
    var var_nmgp_refresh_row = "";
<?php
    }
?>
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    sc_num_ult_opc = var_nmgp_opcao;
    scAjaxProcOn();
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    scRemoveErrors();
<?php
    }
?>
    x_ajax_form_dbo_cliente_submit_form(var_cd_cliente_, var_razaosocial_, var_nomefantasia_, var_cgc_, var_inscricao_, var_endereco_, var_cidade_, var_estado_, var_bairro_, var_cep_, var_email_, var_fone_, var_fone1_, var_fax_, var_contato_, var_enderecocobranca_, var_cidadecobranca_, var_bairrocobranca_, var_estadocobranca_, var_cepcobranca_, var_fonecobranca_, var_faxcobranca_, var_contatocobranca_, var_cgcentrega_, var_inscricaoentrega_, var_enderecoentrega_, var_cidadeentrega_, var_bairroentrega_, var_estadoentrega_, var_cepentrega_, var_foneentrega_, var_contatoentrega_, var_contatoexpedicao_, var_foneexpedicao_, var_datacadastro_, var_obs_, var_tipo_, var_consumidor_, var_licensa_, var_venctolicensa_, var_licensa1_, var_venctolicensa1_, var_qtdeliberada_, var_licensa2_, var_venctolicensa2_, var_icms_, var_suframa_, var_limitecredito_, var_vendedor_, var_restricao_, var_comissao_, var_transportadora_, var_coleta_, var_segmento_, var_dataalteracao_, var_usuario_, var_requisitos_, var_banco_, var_emailcobranca_, var_emailtecnico_, var_midia_, var_seg_, var_ter_, var_qua_, var_qui_, var_sex_, var_certificado_, var_emailnfe_, var_fundacao_, var_site_, var_financeiro_, var_numero_, var_complemento_, var_razaosocialentrega_, var_entrega_, var_contatotecnico_, var_nmgp_refresh_row, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_dbo_cliente_submit_form_cb);
  } // do_ajax_form_dbo_cliente_submit_form

  function do_ajax_form_dbo_cliente_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxCalendarReload();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
      scErrorLineOff(sc_num_ult_line, "__sc_all__");
    }
    else
    {
      scAjaxShowErrorDisplay("table", sAppErrors);
      scErrorLineOn(sc_num_ult_line, "__sc_all__");
    }
    if (!scAjaxHasError())
    {
      if (sc_num_ult_opc == 'incluir')
      {
         bRefreshTable = true;
         if (document.getElementById("sc_ins_line_" + sc_num_ult_line))
           document.getElementById("sc_ins_line_" + sc_num_ult_line).style.display = "none";
         if (document.getElementById("sc_upd_line_" + sc_num_ult_line))
           document.getElementById("sc_upd_line_" + sc_num_ult_line).style.display = "";
         if (document.getElementById("sc_clone_line_" + sc_num_ult_line))
           document.getElementById("sc_clone_line_" + sc_num_ult_line).style.display = "";
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
    }
?>
         if (document.getElementById("sc_new_line_" + sc_num_ult_line))
           document.getElementById("sc_new_line_" + sc_num_ult_line).style.display = "none";
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
         if (document.getElementById("sc_canceli_line_" + sc_num_ult_line))
           document.getElementById("sc_canceli_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
         sc_insert_open = false;
         scEnableNavigation();
         do_ajax_form_dbo_cliente_add_new_line();
         $("#sc-ui-empty-form").hide();
         $(".sc-ui-page-tab-line").show();
         $("#sc-id-required-row").show();
      }
      if (sc_num_ult_opc == 'alterar')
      {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
       if ($this->nmgp_botoes['delete'] == 'on')
       {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
       }
?>
         if (document.getElementById("sc_cancelu_line_" + sc_num_ult_line))
           document.getElementById("sc_cancelu_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
      }
      if (sc_num_ult_opc == 'excluir')
      {
         bRefreshTable = true;
         sc_name_table = document.getElementById("hidden_bloco_0");
         sc_name_table.deleteRow(sc_num_ult_tr);
         sc_num_ult_line = sc_name_table.rows.length - 1;
         if (0 == sc_num_ult_line || (1 == sc_num_ult_line && sc_insert_open))
         {
            $("#sc-ui-empty-form").show();
            $(".sc-ui-page-tab-line").hide();
            $("#sc-id-required-row").hide();
         }
      }
      scAjaxShowMessage();
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("cd_cliente_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("razaosocial_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("nomefantasia_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cgc_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("inscricao_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("endereco_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cidade_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("estado_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("bairro_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cep_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("email_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("fone_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("fone1_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("fax_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("contato_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("enderecocobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cidadecobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("bairrocobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("estadocobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cepcobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("fonecobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("faxcobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("contatocobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cgcentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("inscricaoentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("enderecoentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cidadeentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("bairroentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("estadoentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cepentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("foneentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("contatoentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("contatoexpedicao_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("foneexpedicao_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("datacadastro_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("obs_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("tipo_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("consumidor_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("licensa_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("venctolicensa_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("licensa1_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("venctolicensa1_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("qtdeliberada_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("licensa2_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("venctolicensa2_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("icms_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("suframa_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("limitecredito_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("vendedor_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("restricao_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("comissao_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("transportadora_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("coleta_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("segmento_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dataalteracao_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("usuario_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("requisitos_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("banco_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("emailcobranca_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("emailtecnico_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("midia_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("seg_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("ter_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("qua_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("qui_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sex_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("certificado_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("emailnfe_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("fundacao_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("site_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("financeiro_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("numero_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("complemento_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("razaosocialentrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("entrega_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("contatotecnico_" + sc_num_ult_line);
<?php
if (isset($this->Embutida_form) && $this->Embutida_form) {
?>
      scAjaxSetReadonly();
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly) {
?>
      mdCloseLine();
<?php
    }
} else {
?>
      scAjaxSetReadonly(true);
<?php
}
?>
      scLigEditLookupCall();
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      if (sc_closeChange && self.parent && self.parent.tb_remove)
      {
        self.parent.tb_remove();
      }
      scAjaxSetFields(false);
      scAjaxSetVariables();
      if (sc_num_ult_opc == 'alterar' || sc_num_ult_opc == 'incluir')
      {
<?php
        if (isset($this->Embutida_form) && $this->Embutida_form)
        {
?>
<?php
        }
?>
      }
    }
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetDisplay(true);
    scAjaxSetLabel(true);
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_dbo_cliente_submit_form_cb

  var scStatusDetail = {};

  function do_ajax_form_dbo_cliente_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    if (sc_insert_open)
    {
        do_ajax_form_dbo_cliente_cancel_insert(sc_num_ult_line);
    }
    nm_uncheck_delete();
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    for (iNavForm = 1; iNavForm < <?php echo $this->sc_max_reg; ?> + 1; iNavForm++)
    {
      scAjaxHideErrorDisplay("cd_cliente_" + iNavForm);
      scAjaxHideErrorDisplay("razaosocial_" + iNavForm);
      scAjaxHideErrorDisplay("nomefantasia_" + iNavForm);
      scAjaxHideErrorDisplay("cgc_" + iNavForm);
      scAjaxHideErrorDisplay("inscricao_" + iNavForm);
      scAjaxHideErrorDisplay("endereco_" + iNavForm);
      scAjaxHideErrorDisplay("cidade_" + iNavForm);
      scAjaxHideErrorDisplay("estado_" + iNavForm);
      scAjaxHideErrorDisplay("bairro_" + iNavForm);
      scAjaxHideErrorDisplay("cep_" + iNavForm);
      scAjaxHideErrorDisplay("email_" + iNavForm);
      scAjaxHideErrorDisplay("fone_" + iNavForm);
      scAjaxHideErrorDisplay("fone1_" + iNavForm);
      scAjaxHideErrorDisplay("fax_" + iNavForm);
      scAjaxHideErrorDisplay("contato_" + iNavForm);
      scAjaxHideErrorDisplay("enderecocobranca_" + iNavForm);
      scAjaxHideErrorDisplay("cidadecobranca_" + iNavForm);
      scAjaxHideErrorDisplay("bairrocobranca_" + iNavForm);
      scAjaxHideErrorDisplay("estadocobranca_" + iNavForm);
      scAjaxHideErrorDisplay("cepcobranca_" + iNavForm);
      scAjaxHideErrorDisplay("fonecobranca_" + iNavForm);
      scAjaxHideErrorDisplay("faxcobranca_" + iNavForm);
      scAjaxHideErrorDisplay("contatocobranca_" + iNavForm);
      scAjaxHideErrorDisplay("cgcentrega_" + iNavForm);
      scAjaxHideErrorDisplay("inscricaoentrega_" + iNavForm);
      scAjaxHideErrorDisplay("enderecoentrega_" + iNavForm);
      scAjaxHideErrorDisplay("cidadeentrega_" + iNavForm);
      scAjaxHideErrorDisplay("bairroentrega_" + iNavForm);
      scAjaxHideErrorDisplay("estadoentrega_" + iNavForm);
      scAjaxHideErrorDisplay("cepentrega_" + iNavForm);
      scAjaxHideErrorDisplay("foneentrega_" + iNavForm);
      scAjaxHideErrorDisplay("contatoentrega_" + iNavForm);
      scAjaxHideErrorDisplay("contatoexpedicao_" + iNavForm);
      scAjaxHideErrorDisplay("foneexpedicao_" + iNavForm);
      scAjaxHideErrorDisplay("datacadastro_" + iNavForm);
      scAjaxHideErrorDisplay("obs_" + iNavForm);
      scAjaxHideErrorDisplay("tipo_" + iNavForm);
      scAjaxHideErrorDisplay("consumidor_" + iNavForm);
      scAjaxHideErrorDisplay("licensa_" + iNavForm);
      scAjaxHideErrorDisplay("venctolicensa_" + iNavForm);
      scAjaxHideErrorDisplay("licensa1_" + iNavForm);
      scAjaxHideErrorDisplay("venctolicensa1_" + iNavForm);
      scAjaxHideErrorDisplay("qtdeliberada_" + iNavForm);
      scAjaxHideErrorDisplay("licensa2_" + iNavForm);
      scAjaxHideErrorDisplay("venctolicensa2_" + iNavForm);
      scAjaxHideErrorDisplay("icms_" + iNavForm);
      scAjaxHideErrorDisplay("suframa_" + iNavForm);
      scAjaxHideErrorDisplay("limitecredito_" + iNavForm);
      scAjaxHideErrorDisplay("vendedor_" + iNavForm);
      scAjaxHideErrorDisplay("restricao_" + iNavForm);
      scAjaxHideErrorDisplay("comissao_" + iNavForm);
      scAjaxHideErrorDisplay("transportadora_" + iNavForm);
      scAjaxHideErrorDisplay("coleta_" + iNavForm);
      scAjaxHideErrorDisplay("segmento_" + iNavForm);
      scAjaxHideErrorDisplay("dataalteracao_" + iNavForm);
      scAjaxHideErrorDisplay("usuario_" + iNavForm);
      scAjaxHideErrorDisplay("requisitos_" + iNavForm);
      scAjaxHideErrorDisplay("banco_" + iNavForm);
      scAjaxHideErrorDisplay("emailcobranca_" + iNavForm);
      scAjaxHideErrorDisplay("emailtecnico_" + iNavForm);
      scAjaxHideErrorDisplay("midia_" + iNavForm);
      scAjaxHideErrorDisplay("seg_" + iNavForm);
      scAjaxHideErrorDisplay("ter_" + iNavForm);
      scAjaxHideErrorDisplay("qua_" + iNavForm);
      scAjaxHideErrorDisplay("qui_" + iNavForm);
      scAjaxHideErrorDisplay("sex_" + iNavForm);
      scAjaxHideErrorDisplay("certificado_" + iNavForm);
      scAjaxHideErrorDisplay("emailnfe_" + iNavForm);
      scAjaxHideErrorDisplay("fundacao_" + iNavForm);
      scAjaxHideErrorDisplay("site_" + iNavForm);
      scAjaxHideErrorDisplay("financeiro_" + iNavForm);
      scAjaxHideErrorDisplay("numero_" + iNavForm);
      scAjaxHideErrorDisplay("complemento_" + iNavForm);
      scAjaxHideErrorDisplay("razaosocialentrega_" + iNavForm);
      scAjaxHideErrorDisplay("entrega_" + iNavForm);
      scAjaxHideErrorDisplay("contatotecnico_" + iNavForm);
    }
    var var_cd_cliente_ = document.F2.cd_cliente_.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_dbo_cliente_navigate_form(var_cd_cliente_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_dbo_cliente_navigate_form_cb);
  } // do_ajax_form_dbo_cliente_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_cliente']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_form_dbo_cliente_navigate_form_cb(sResp)
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
    var var_last_index = oResp["rsSize"];
    sc_mupload_ok = true;
    scAjaxSetFields(false);
    scAjaxSetVariables();
    document.F2.cd_cliente_.value = scAjaxGetKeyValue("cd_cliente_" + var_last_index);
    var_last_index = parseInt(var_last_index) + 1;
    for (iNavigateForm = 1; iNavigateForm < var_last_index; iNavigateForm++)
    {
      if (document.getElementById("idVertRow" + iNavigateForm))
      {
        document.getElementById("idVertRow" + iNavigateForm).style.display = "";
      }
    }
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    for (iNavigatedel = <?php echo $this->sc_max_reg; ?>; iNavigatedel >= iNavigateForm; iNavigatedel--)
    {
        oTBodyOld.deleteRow(iNavigatedel);
        bRefreshTable = true;
    }
    document.F1.sc_contr_vert.value = var_last_index;
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    for (var iImg = 0; iImg < var_last_index; iImg++)
    {
    }
    scAjaxSetBtnVars();
    scErrorLineReset();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_dbo_cliente_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
    SC_btn_grp_text();
  } // do_ajax_form_dbo_cliente_navigate_form_cb
  function sc_hide_form_dbo_cliente_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_dbo_cliente_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc

<?php
$sLineInfo = $this->Embutida_form ? '' : ' (linha " + iNumLinha + ")';
?>
  function ajax_create_tables(iNumLinha)
  {
    ajax_field_list[iTotCampos] = "cd_cliente_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "razaosocial_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "nomefantasia_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cgc_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "inscricao_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "endereco_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cidade_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "estado_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "bairro_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cep_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "email_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "fone_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "fone1_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "fax_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "contato_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "enderecocobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cidadecobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "bairrocobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "estadocobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cepcobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "fonecobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "faxcobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "contatocobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cgcentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "inscricaoentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "enderecoentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cidadeentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "bairroentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "estadoentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cepentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "foneentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "contatoentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "contatoexpedicao_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "foneexpedicao_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "datacadastro_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "obs_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "tipo_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "consumidor_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "licensa_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "venctolicensa_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "licensa1_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "venctolicensa1_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "qtdeliberada_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "licensa2_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "venctolicensa2_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "icms_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "suframa_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "limitecredito_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "vendedor_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "restricao_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "comissao_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "transportadora_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "coleta_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "segmento_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dataalteracao_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "usuario_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "requisitos_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "banco_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "emailcobranca_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "emailtecnico_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "midia_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "seg_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "ter_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "qua_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "qui_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sex_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "certificado_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "emailnfe_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "fundacao_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "site_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "financeiro_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "numero_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "complemento_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "razaosocialentrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "entrega_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "contatotecnico_" + iNumLinha;
    iTotCampos++;
    ajax_error_list["cd_cliente_" + iNumLinha] = {"label": "Cd Cliente<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["razaosocial_" + iNumLinha] = {"label": "Razaosocial<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["nomefantasia_" + iNumLinha] = {"label": "Nomefantasia<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cgc_" + iNumLinha] = {"label": "Cgc<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["inscricao_" + iNumLinha] = {"label": "Inscricao<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["endereco_" + iNumLinha] = {"label": "Endereco<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cidade_" + iNumLinha] = {"label": "Cidade<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["estado_" + iNumLinha] = {"label": "Estado<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["bairro_" + iNumLinha] = {"label": "Bairro<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cep_" + iNumLinha] = {"label": "Cep<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["email_" + iNumLinha] = {"label": "Email<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["fone_" + iNumLinha] = {"label": "Fone<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["fone1_" + iNumLinha] = {"label": "Fone 1<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["fax_" + iNumLinha] = {"label": "Fax<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["contato_" + iNumLinha] = {"label": "Contato<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["enderecocobranca_" + iNumLinha] = {"label": "Enderecocobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cidadecobranca_" + iNumLinha] = {"label": "Cidadecobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["bairrocobranca_" + iNumLinha] = {"label": "Bairrocobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["estadocobranca_" + iNumLinha] = {"label": "Estadocobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cepcobranca_" + iNumLinha] = {"label": "Cepcobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["fonecobranca_" + iNumLinha] = {"label": "Fonecobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["faxcobranca_" + iNumLinha] = {"label": "Faxcobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["contatocobranca_" + iNumLinha] = {"label": "Contatocobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cgcentrega_" + iNumLinha] = {"label": "Cgcentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["inscricaoentrega_" + iNumLinha] = {"label": "Inscricaoentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["enderecoentrega_" + iNumLinha] = {"label": "Enderecoentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cidadeentrega_" + iNumLinha] = {"label": "Cidadeentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["bairroentrega_" + iNumLinha] = {"label": "Bairroentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["estadoentrega_" + iNumLinha] = {"label": "Estadoentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cepentrega_" + iNumLinha] = {"label": "Cepentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["foneentrega_" + iNumLinha] = {"label": "Foneentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["contatoentrega_" + iNumLinha] = {"label": "Contatoentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["contatoexpedicao_" + iNumLinha] = {"label": "Contatoexpedicao<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["foneexpedicao_" + iNumLinha] = {"label": "Foneexpedicao<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["datacadastro_" + iNumLinha] = {"label": "Datacadastro<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["obs_" + iNumLinha] = {"label": "Obs<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["tipo_" + iNumLinha] = {"label": "Tipo<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["consumidor_" + iNumLinha] = {"label": "Consumidor<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["licensa_" + iNumLinha] = {"label": "Licensa<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["venctolicensa_" + iNumLinha] = {"label": "Venctolicensa<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["licensa1_" + iNumLinha] = {"label": "Licensa 1<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["venctolicensa1_" + iNumLinha] = {"label": "Venctolicensa 1<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["qtdeliberada_" + iNumLinha] = {"label": "Qtdeliberada<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["licensa2_" + iNumLinha] = {"label": "Licensa 2<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["venctolicensa2_" + iNumLinha] = {"label": "Venctolicensa 2<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["icms_" + iNumLinha] = {"label": "Icms<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["suframa_" + iNumLinha] = {"label": "Suframa<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["limitecredito_" + iNumLinha] = {"label": "Limitecredito<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["vendedor_" + iNumLinha] = {"label": "Vendedor<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["restricao_" + iNumLinha] = {"label": "Restricao<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["comissao_" + iNumLinha] = {"label": "Comissao<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["transportadora_" + iNumLinha] = {"label": "Transportadora<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["coleta_" + iNumLinha] = {"label": "Coleta<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["segmento_" + iNumLinha] = {"label": "Segmento<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dataalteracao_" + iNumLinha] = {"label": "Dataalteracao<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["usuario_" + iNumLinha] = {"label": "Usuario<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["requisitos_" + iNumLinha] = {"label": "REQUISITOS<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["banco_" + iNumLinha] = {"label": "Banco<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["emailcobranca_" + iNumLinha] = {"label": "Emailcobranca<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["emailtecnico_" + iNumLinha] = {"label": "Emailtecnico<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["midia_" + iNumLinha] = {"label": "Midia<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["seg_" + iNumLinha] = {"label": "Seg<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["ter_" + iNumLinha] = {"label": "Ter<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["qua_" + iNumLinha] = {"label": "Qua<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["qui_" + iNumLinha] = {"label": "Qui<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sex_" + iNumLinha] = {"label": "Sex<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["certificado_" + iNumLinha] = {"label": "Certificado<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["emailnfe_" + iNumLinha] = {"label": "Emailnfe<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["fundacao_" + iNumLinha] = {"label": "Fundacao<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["site_" + iNumLinha] = {"label": "Site<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["financeiro_" + iNumLinha] = {"label": "Financeiro<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["numero_" + iNumLinha] = {"label": "Numero<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["complemento_" + iNumLinha] = {"label": "Complemento<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["razaosocialentrega_" + iNumLinha] = {"label": "Razaosocialentrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["entrega_" + iNumLinha] = {"label": "Entrega<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["contatotecnico_" + iNumLinha] = {"label": "Contatotecnico<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_field_mult["cd_cliente_"][iNumLinha] = "cd_cliente_" + iNumLinha;
    ajax_field_mult["razaosocial_"][iNumLinha] = "razaosocial_" + iNumLinha;
    ajax_field_mult["nomefantasia_"][iNumLinha] = "nomefantasia_" + iNumLinha;
    ajax_field_mult["cgc_"][iNumLinha] = "cgc_" + iNumLinha;
    ajax_field_mult["inscricao_"][iNumLinha] = "inscricao_" + iNumLinha;
    ajax_field_mult["endereco_"][iNumLinha] = "endereco_" + iNumLinha;
    ajax_field_mult["cidade_"][iNumLinha] = "cidade_" + iNumLinha;
    ajax_field_mult["estado_"][iNumLinha] = "estado_" + iNumLinha;
    ajax_field_mult["bairro_"][iNumLinha] = "bairro_" + iNumLinha;
    ajax_field_mult["cep_"][iNumLinha] = "cep_" + iNumLinha;
    ajax_field_mult["email_"][iNumLinha] = "email_" + iNumLinha;
    ajax_field_mult["fone_"][iNumLinha] = "fone_" + iNumLinha;
    ajax_field_mult["fone1_"][iNumLinha] = "fone1_" + iNumLinha;
    ajax_field_mult["fax_"][iNumLinha] = "fax_" + iNumLinha;
    ajax_field_mult["contato_"][iNumLinha] = "contato_" + iNumLinha;
    ajax_field_mult["enderecocobranca_"][iNumLinha] = "enderecocobranca_" + iNumLinha;
    ajax_field_mult["cidadecobranca_"][iNumLinha] = "cidadecobranca_" + iNumLinha;
    ajax_field_mult["bairrocobranca_"][iNumLinha] = "bairrocobranca_" + iNumLinha;
    ajax_field_mult["estadocobranca_"][iNumLinha] = "estadocobranca_" + iNumLinha;
    ajax_field_mult["cepcobranca_"][iNumLinha] = "cepcobranca_" + iNumLinha;
    ajax_field_mult["fonecobranca_"][iNumLinha] = "fonecobranca_" + iNumLinha;
    ajax_field_mult["faxcobranca_"][iNumLinha] = "faxcobranca_" + iNumLinha;
    ajax_field_mult["contatocobranca_"][iNumLinha] = "contatocobranca_" + iNumLinha;
    ajax_field_mult["cgcentrega_"][iNumLinha] = "cgcentrega_" + iNumLinha;
    ajax_field_mult["inscricaoentrega_"][iNumLinha] = "inscricaoentrega_" + iNumLinha;
    ajax_field_mult["enderecoentrega_"][iNumLinha] = "enderecoentrega_" + iNumLinha;
    ajax_field_mult["cidadeentrega_"][iNumLinha] = "cidadeentrega_" + iNumLinha;
    ajax_field_mult["bairroentrega_"][iNumLinha] = "bairroentrega_" + iNumLinha;
    ajax_field_mult["estadoentrega_"][iNumLinha] = "estadoentrega_" + iNumLinha;
    ajax_field_mult["cepentrega_"][iNumLinha] = "cepentrega_" + iNumLinha;
    ajax_field_mult["foneentrega_"][iNumLinha] = "foneentrega_" + iNumLinha;
    ajax_field_mult["contatoentrega_"][iNumLinha] = "contatoentrega_" + iNumLinha;
    ajax_field_mult["contatoexpedicao_"][iNumLinha] = "contatoexpedicao_" + iNumLinha;
    ajax_field_mult["foneexpedicao_"][iNumLinha] = "foneexpedicao_" + iNumLinha;
    ajax_field_mult["datacadastro_"][iNumLinha] = "datacadastro_" + iNumLinha;
    ajax_field_mult["obs_"][iNumLinha] = "obs_" + iNumLinha;
    ajax_field_mult["tipo_"][iNumLinha] = "tipo_" + iNumLinha;
    ajax_field_mult["consumidor_"][iNumLinha] = "consumidor_" + iNumLinha;
    ajax_field_mult["licensa_"][iNumLinha] = "licensa_" + iNumLinha;
    ajax_field_mult["venctolicensa_"][iNumLinha] = "venctolicensa_" + iNumLinha;
    ajax_field_mult["licensa1_"][iNumLinha] = "licensa1_" + iNumLinha;
    ajax_field_mult["venctolicensa1_"][iNumLinha] = "venctolicensa1_" + iNumLinha;
    ajax_field_mult["qtdeliberada_"][iNumLinha] = "qtdeliberada_" + iNumLinha;
    ajax_field_mult["licensa2_"][iNumLinha] = "licensa2_" + iNumLinha;
    ajax_field_mult["venctolicensa2_"][iNumLinha] = "venctolicensa2_" + iNumLinha;
    ajax_field_mult["icms_"][iNumLinha] = "icms_" + iNumLinha;
    ajax_field_mult["suframa_"][iNumLinha] = "suframa_" + iNumLinha;
    ajax_field_mult["limitecredito_"][iNumLinha] = "limitecredito_" + iNumLinha;
    ajax_field_mult["vendedor_"][iNumLinha] = "vendedor_" + iNumLinha;
    ajax_field_mult["restricao_"][iNumLinha] = "restricao_" + iNumLinha;
    ajax_field_mult["comissao_"][iNumLinha] = "comissao_" + iNumLinha;
    ajax_field_mult["transportadora_"][iNumLinha] = "transportadora_" + iNumLinha;
    ajax_field_mult["coleta_"][iNumLinha] = "coleta_" + iNumLinha;
    ajax_field_mult["segmento_"][iNumLinha] = "segmento_" + iNumLinha;
    ajax_field_mult["dataalteracao_"][iNumLinha] = "dataalteracao_" + iNumLinha;
    ajax_field_mult["usuario_"][iNumLinha] = "usuario_" + iNumLinha;
    ajax_field_mult["requisitos_"][iNumLinha] = "requisitos_" + iNumLinha;
    ajax_field_mult["banco_"][iNumLinha] = "banco_" + iNumLinha;
    ajax_field_mult["emailcobranca_"][iNumLinha] = "emailcobranca_" + iNumLinha;
    ajax_field_mult["emailtecnico_"][iNumLinha] = "emailtecnico_" + iNumLinha;
    ajax_field_mult["midia_"][iNumLinha] = "midia_" + iNumLinha;
    ajax_field_mult["seg_"][iNumLinha] = "seg_" + iNumLinha;
    ajax_field_mult["ter_"][iNumLinha] = "ter_" + iNumLinha;
    ajax_field_mult["qua_"][iNumLinha] = "qua_" + iNumLinha;
    ajax_field_mult["qui_"][iNumLinha] = "qui_" + iNumLinha;
    ajax_field_mult["sex_"][iNumLinha] = "sex_" + iNumLinha;
    ajax_field_mult["certificado_"][iNumLinha] = "certificado_" + iNumLinha;
    ajax_field_mult["emailnfe_"][iNumLinha] = "emailnfe_" + iNumLinha;
    ajax_field_mult["fundacao_"][iNumLinha] = "fundacao_" + iNumLinha;
    ajax_field_mult["site_"][iNumLinha] = "site_" + iNumLinha;
    ajax_field_mult["financeiro_"][iNumLinha] = "financeiro_" + iNumLinha;
    ajax_field_mult["numero_"][iNumLinha] = "numero_" + iNumLinha;
    ajax_field_mult["complemento_"][iNumLinha] = "complemento_" + iNumLinha;
    ajax_field_mult["razaosocialentrega_"][iNumLinha] = "razaosocialentrega_" + iNumLinha;
    ajax_field_mult["entrega_"][iNumLinha] = "entrega_" + iNumLinha;
    ajax_field_mult["contatotecnico_"][iNumLinha] = "contatotecnico_" + iNumLinha;
    ajax_field_id["cd_cliente_" + iNumLinha] = new Array("hidden_field_label_cd_cliente_", "hidden_field_data_cd_cliente_" + iNumLinha);
    ajax_field_id["razaosocial_" + iNumLinha] = new Array("hidden_field_label_razaosocial_", "hidden_field_data_razaosocial_" + iNumLinha);
    ajax_field_id["nomefantasia_" + iNumLinha] = new Array("hidden_field_label_nomefantasia_", "hidden_field_data_nomefantasia_" + iNumLinha);
    ajax_field_id["cgc_" + iNumLinha] = new Array("hidden_field_label_cgc_", "hidden_field_data_cgc_" + iNumLinha);
    ajax_field_id["inscricao_" + iNumLinha] = new Array("hidden_field_label_inscricao_", "hidden_field_data_inscricao_" + iNumLinha);
    ajax_field_id["endereco_" + iNumLinha] = new Array("hidden_field_label_endereco_", "hidden_field_data_endereco_" + iNumLinha);
    ajax_field_id["cidade_" + iNumLinha] = new Array("hidden_field_label_cidade_", "hidden_field_data_cidade_" + iNumLinha);
    ajax_field_id["estado_" + iNumLinha] = new Array("hidden_field_label_estado_", "hidden_field_data_estado_" + iNumLinha);
    ajax_field_id["bairro_" + iNumLinha] = new Array("hidden_field_label_bairro_", "hidden_field_data_bairro_" + iNumLinha);
    ajax_field_id["cep_" + iNumLinha] = new Array("hidden_field_label_cep_", "hidden_field_data_cep_" + iNumLinha);
    ajax_field_id["email_" + iNumLinha] = new Array("hidden_field_label_email_", "hidden_field_data_email_" + iNumLinha);
    ajax_field_id["fone_" + iNumLinha] = new Array("hidden_field_label_fone_", "hidden_field_data_fone_" + iNumLinha);
    ajax_field_id["fone1_" + iNumLinha] = new Array("hidden_field_label_fone1_", "hidden_field_data_fone1_" + iNumLinha);
    ajax_field_id["fax_" + iNumLinha] = new Array("hidden_field_label_fax_", "hidden_field_data_fax_" + iNumLinha);
    ajax_field_id["contato_" + iNumLinha] = new Array("hidden_field_label_contato_", "hidden_field_data_contato_" + iNumLinha);
    ajax_field_id["enderecocobranca_" + iNumLinha] = new Array("hidden_field_label_enderecocobranca_", "hidden_field_data_enderecocobranca_" + iNumLinha);
    ajax_field_id["cidadecobranca_" + iNumLinha] = new Array("hidden_field_label_cidadecobranca_", "hidden_field_data_cidadecobranca_" + iNumLinha);
    ajax_field_id["bairrocobranca_" + iNumLinha] = new Array("hidden_field_label_bairrocobranca_", "hidden_field_data_bairrocobranca_" + iNumLinha);
    ajax_field_id["estadocobranca_" + iNumLinha] = new Array("hidden_field_label_estadocobranca_", "hidden_field_data_estadocobranca_" + iNumLinha);
    ajax_field_id["cepcobranca_" + iNumLinha] = new Array("hidden_field_label_cepcobranca_", "hidden_field_data_cepcobranca_" + iNumLinha);
    ajax_field_id["fonecobranca_" + iNumLinha] = new Array("hidden_field_label_fonecobranca_", "hidden_field_data_fonecobranca_" + iNumLinha);
    ajax_field_id["faxcobranca_" + iNumLinha] = new Array("hidden_field_label_faxcobranca_", "hidden_field_data_faxcobranca_" + iNumLinha);
    ajax_field_id["contatocobranca_" + iNumLinha] = new Array("hidden_field_label_contatocobranca_", "hidden_field_data_contatocobranca_" + iNumLinha);
    ajax_field_id["cgcentrega_" + iNumLinha] = new Array("hidden_field_label_cgcentrega_", "hidden_field_data_cgcentrega_" + iNumLinha);
    ajax_field_id["inscricaoentrega_" + iNumLinha] = new Array("hidden_field_label_inscricaoentrega_", "hidden_field_data_inscricaoentrega_" + iNumLinha);
    ajax_field_id["enderecoentrega_" + iNumLinha] = new Array("hidden_field_label_enderecoentrega_", "hidden_field_data_enderecoentrega_" + iNumLinha);
    ajax_field_id["cidadeentrega_" + iNumLinha] = new Array("hidden_field_label_cidadeentrega_", "hidden_field_data_cidadeentrega_" + iNumLinha);
    ajax_field_id["bairroentrega_" + iNumLinha] = new Array("hidden_field_label_bairroentrega_", "hidden_field_data_bairroentrega_" + iNumLinha);
    ajax_field_id["estadoentrega_" + iNumLinha] = new Array("hidden_field_label_estadoentrega_", "hidden_field_data_estadoentrega_" + iNumLinha);
    ajax_field_id["cepentrega_" + iNumLinha] = new Array("hidden_field_label_cepentrega_", "hidden_field_data_cepentrega_" + iNumLinha);
    ajax_field_id["foneentrega_" + iNumLinha] = new Array("hidden_field_label_foneentrega_", "hidden_field_data_foneentrega_" + iNumLinha);
    ajax_field_id["contatoentrega_" + iNumLinha] = new Array("hidden_field_label_contatoentrega_", "hidden_field_data_contatoentrega_" + iNumLinha);
    ajax_field_id["contatoexpedicao_" + iNumLinha] = new Array("hidden_field_label_contatoexpedicao_", "hidden_field_data_contatoexpedicao_" + iNumLinha);
    ajax_field_id["foneexpedicao_" + iNumLinha] = new Array("hidden_field_label_foneexpedicao_", "hidden_field_data_foneexpedicao_" + iNumLinha);
    ajax_field_id["datacadastro_" + iNumLinha] = new Array("hidden_field_label_datacadastro_", "hidden_field_data_datacadastro_" + iNumLinha);
    ajax_field_id["obs_" + iNumLinha] = new Array("hidden_field_label_obs_", "hidden_field_data_obs_" + iNumLinha);
    ajax_field_id["tipo_" + iNumLinha] = new Array("hidden_field_label_tipo_", "hidden_field_data_tipo_" + iNumLinha);
    ajax_field_id["consumidor_" + iNumLinha] = new Array("hidden_field_label_consumidor_", "hidden_field_data_consumidor_" + iNumLinha);
    ajax_field_id["licensa_" + iNumLinha] = new Array("hidden_field_label_licensa_", "hidden_field_data_licensa_" + iNumLinha);
    ajax_field_id["venctolicensa_" + iNumLinha] = new Array("hidden_field_label_venctolicensa_", "hidden_field_data_venctolicensa_" + iNumLinha);
    ajax_field_id["licensa1_" + iNumLinha] = new Array("hidden_field_label_licensa1_", "hidden_field_data_licensa1_" + iNumLinha);
    ajax_field_id["venctolicensa1_" + iNumLinha] = new Array("hidden_field_label_venctolicensa1_", "hidden_field_data_venctolicensa1_" + iNumLinha);
    ajax_field_id["qtdeliberada_" + iNumLinha] = new Array("hidden_field_label_qtdeliberada_", "hidden_field_data_qtdeliberada_" + iNumLinha);
    ajax_field_id["licensa2_" + iNumLinha] = new Array("hidden_field_label_licensa2_", "hidden_field_data_licensa2_" + iNumLinha);
    ajax_field_id["venctolicensa2_" + iNumLinha] = new Array("hidden_field_label_venctolicensa2_", "hidden_field_data_venctolicensa2_" + iNumLinha);
    ajax_field_id["icms_" + iNumLinha] = new Array("hidden_field_label_icms_", "hidden_field_data_icms_" + iNumLinha);
    ajax_field_id["suframa_" + iNumLinha] = new Array("hidden_field_label_suframa_", "hidden_field_data_suframa_" + iNumLinha);
    ajax_field_id["limitecredito_" + iNumLinha] = new Array("hidden_field_label_limitecredito_", "hidden_field_data_limitecredito_" + iNumLinha);
    ajax_field_id["vendedor_" + iNumLinha] = new Array("hidden_field_label_vendedor_", "hidden_field_data_vendedor_" + iNumLinha);
    ajax_field_id["restricao_" + iNumLinha] = new Array("hidden_field_label_restricao_", "hidden_field_data_restricao_" + iNumLinha);
    ajax_field_id["comissao_" + iNumLinha] = new Array("hidden_field_label_comissao_", "hidden_field_data_comissao_" + iNumLinha);
    ajax_field_id["transportadora_" + iNumLinha] = new Array("hidden_field_label_transportadora_", "hidden_field_data_transportadora_" + iNumLinha);
    ajax_field_id["coleta_" + iNumLinha] = new Array("hidden_field_label_coleta_", "hidden_field_data_coleta_" + iNumLinha);
    ajax_field_id["segmento_" + iNumLinha] = new Array("hidden_field_label_segmento_", "hidden_field_data_segmento_" + iNumLinha);
    ajax_field_id["dataalteracao_" + iNumLinha] = new Array("hidden_field_label_dataalteracao_", "hidden_field_data_dataalteracao_" + iNumLinha);
    ajax_field_id["usuario_" + iNumLinha] = new Array("hidden_field_label_usuario_", "hidden_field_data_usuario_" + iNumLinha);
    ajax_field_id["requisitos_" + iNumLinha] = new Array("hidden_field_label_requisitos_", "hidden_field_data_requisitos_" + iNumLinha);
    ajax_field_id["banco_" + iNumLinha] = new Array("hidden_field_label_banco_", "hidden_field_data_banco_" + iNumLinha);
    ajax_field_id["emailcobranca_" + iNumLinha] = new Array("hidden_field_label_emailcobranca_", "hidden_field_data_emailcobranca_" + iNumLinha);
    ajax_field_id["emailtecnico_" + iNumLinha] = new Array("hidden_field_label_emailtecnico_", "hidden_field_data_emailtecnico_" + iNumLinha);
    ajax_field_id["midia_" + iNumLinha] = new Array("hidden_field_label_midia_", "hidden_field_data_midia_" + iNumLinha);
    ajax_field_id["seg_" + iNumLinha] = new Array("hidden_field_label_seg_", "hidden_field_data_seg_" + iNumLinha);
    ajax_field_id["ter_" + iNumLinha] = new Array("hidden_field_label_ter_", "hidden_field_data_ter_" + iNumLinha);
    ajax_field_id["qua_" + iNumLinha] = new Array("hidden_field_label_qua_", "hidden_field_data_qua_" + iNumLinha);
    ajax_field_id["qui_" + iNumLinha] = new Array("hidden_field_label_qui_", "hidden_field_data_qui_" + iNumLinha);
    ajax_field_id["sex_" + iNumLinha] = new Array("hidden_field_label_sex_", "hidden_field_data_sex_" + iNumLinha);
    ajax_field_id["certificado_" + iNumLinha] = new Array("hidden_field_label_certificado_", "hidden_field_data_certificado_" + iNumLinha);
    ajax_field_id["emailnfe_" + iNumLinha] = new Array("hidden_field_label_emailnfe_", "hidden_field_data_emailnfe_" + iNumLinha);
    ajax_field_id["fundacao_" + iNumLinha] = new Array("hidden_field_label_fundacao_", "hidden_field_data_fundacao_" + iNumLinha);
    ajax_field_id["site_" + iNumLinha] = new Array("hidden_field_label_site_", "hidden_field_data_site_" + iNumLinha);
    ajax_field_id["financeiro_" + iNumLinha] = new Array("hidden_field_label_financeiro_", "hidden_field_data_financeiro_" + iNumLinha);
    ajax_field_id["numero_" + iNumLinha] = new Array("hidden_field_label_numero_", "hidden_field_data_numero_" + iNumLinha);
    ajax_field_id["complemento_" + iNumLinha] = new Array("hidden_field_label_complemento_", "hidden_field_data_complemento_" + iNumLinha);
    ajax_field_id["razaosocialentrega_" + iNumLinha] = new Array("hidden_field_label_razaosocialentrega_", "hidden_field_data_razaosocialentrega_" + iNumLinha);
    ajax_field_id["entrega_" + iNumLinha] = new Array("hidden_field_label_entrega_", "hidden_field_data_entrega_" + iNumLinha);
    ajax_field_id["contatotecnico_" + iNumLinha] = new Array("hidden_field_label_contatotecnico_", "hidden_field_data_contatotecnico_" + iNumLinha);
    ajax_error_count["cd_cliente_" + iNumLinha] = "off";
    ajax_error_count["razaosocial_" + iNumLinha] = "off";
    ajax_error_count["nomefantasia_" + iNumLinha] = "off";
    ajax_error_count["cgc_" + iNumLinha] = "off";
    ajax_error_count["inscricao_" + iNumLinha] = "off";
    ajax_error_count["endereco_" + iNumLinha] = "off";
    ajax_error_count["cidade_" + iNumLinha] = "off";
    ajax_error_count["estado_" + iNumLinha] = "off";
    ajax_error_count["bairro_" + iNumLinha] = "off";
    ajax_error_count["cep_" + iNumLinha] = "off";
    ajax_error_count["email_" + iNumLinha] = "off";
    ajax_error_count["fone_" + iNumLinha] = "off";
    ajax_error_count["fone1_" + iNumLinha] = "off";
    ajax_error_count["fax_" + iNumLinha] = "off";
    ajax_error_count["contato_" + iNumLinha] = "off";
    ajax_error_count["enderecocobranca_" + iNumLinha] = "off";
    ajax_error_count["cidadecobranca_" + iNumLinha] = "off";
    ajax_error_count["bairrocobranca_" + iNumLinha] = "off";
    ajax_error_count["estadocobranca_" + iNumLinha] = "off";
    ajax_error_count["cepcobranca_" + iNumLinha] = "off";
    ajax_error_count["fonecobranca_" + iNumLinha] = "off";
    ajax_error_count["faxcobranca_" + iNumLinha] = "off";
    ajax_error_count["contatocobranca_" + iNumLinha] = "off";
    ajax_error_count["cgcentrega_" + iNumLinha] = "off";
    ajax_error_count["inscricaoentrega_" + iNumLinha] = "off";
    ajax_error_count["enderecoentrega_" + iNumLinha] = "off";
    ajax_error_count["cidadeentrega_" + iNumLinha] = "off";
    ajax_error_count["bairroentrega_" + iNumLinha] = "off";
    ajax_error_count["estadoentrega_" + iNumLinha] = "off";
    ajax_error_count["cepentrega_" + iNumLinha] = "off";
    ajax_error_count["foneentrega_" + iNumLinha] = "off";
    ajax_error_count["contatoentrega_" + iNumLinha] = "off";
    ajax_error_count["contatoexpedicao_" + iNumLinha] = "off";
    ajax_error_count["foneexpedicao_" + iNumLinha] = "off";
    ajax_error_count["datacadastro_" + iNumLinha] = "off";
    ajax_error_count["obs_" + iNumLinha] = "off";
    ajax_error_count["tipo_" + iNumLinha] = "off";
    ajax_error_count["consumidor_" + iNumLinha] = "off";
    ajax_error_count["licensa_" + iNumLinha] = "off";
    ajax_error_count["venctolicensa_" + iNumLinha] = "off";
    ajax_error_count["licensa1_" + iNumLinha] = "off";
    ajax_error_count["venctolicensa1_" + iNumLinha] = "off";
    ajax_error_count["qtdeliberada_" + iNumLinha] = "off";
    ajax_error_count["licensa2_" + iNumLinha] = "off";
    ajax_error_count["venctolicensa2_" + iNumLinha] = "off";
    ajax_error_count["icms_" + iNumLinha] = "off";
    ajax_error_count["suframa_" + iNumLinha] = "off";
    ajax_error_count["limitecredito_" + iNumLinha] = "off";
    ajax_error_count["vendedor_" + iNumLinha] = "off";
    ajax_error_count["restricao_" + iNumLinha] = "off";
    ajax_error_count["comissao_" + iNumLinha] = "off";
    ajax_error_count["transportadora_" + iNumLinha] = "off";
    ajax_error_count["coleta_" + iNumLinha] = "off";
    ajax_error_count["segmento_" + iNumLinha] = "off";
    ajax_error_count["dataalteracao_" + iNumLinha] = "off";
    ajax_error_count["usuario_" + iNumLinha] = "off";
    ajax_error_count["requisitos_" + iNumLinha] = "off";
    ajax_error_count["banco_" + iNumLinha] = "off";
    ajax_error_count["emailcobranca_" + iNumLinha] = "off";
    ajax_error_count["emailtecnico_" + iNumLinha] = "off";
    ajax_error_count["midia_" + iNumLinha] = "off";
    ajax_error_count["seg_" + iNumLinha] = "off";
    ajax_error_count["ter_" + iNumLinha] = "off";
    ajax_error_count["qua_" + iNumLinha] = "off";
    ajax_error_count["qui_" + iNumLinha] = "off";
    ajax_error_count["sex_" + iNumLinha] = "off";
    ajax_error_count["certificado_" + iNumLinha] = "off";
    ajax_error_count["emailnfe_" + iNumLinha] = "off";
    ajax_error_count["fundacao_" + iNumLinha] = "off";
    ajax_error_count["site_" + iNumLinha] = "off";
    ajax_error_count["financeiro_" + iNumLinha] = "off";
    ajax_error_count["numero_" + iNumLinha] = "off";
    ajax_error_count["complemento_" + iNumLinha] = "off";
    ajax_error_count["razaosocialentrega_" + iNumLinha] = "off";
    ajax_error_count["entrega_" + iNumLinha] = "off";
    ajax_error_count["contatotecnico_" + iNumLinha] = "off";
<?php
if (!$this->Grid_editavel)
{
?>
    ajax_read_only["cd_cliente_" + iNumLinha] = "on";
    ajax_read_only["razaosocial_" + iNumLinha] = "off";
    ajax_read_only["nomefantasia_" + iNumLinha] = "off";
    ajax_read_only["cgc_" + iNumLinha] = "off";
    ajax_read_only["inscricao_" + iNumLinha] = "off";
    ajax_read_only["endereco_" + iNumLinha] = "off";
    ajax_read_only["cidade_" + iNumLinha] = "off";
    ajax_read_only["estado_" + iNumLinha] = "off";
    ajax_read_only["bairro_" + iNumLinha] = "off";
    ajax_read_only["cep_" + iNumLinha] = "off";
    ajax_read_only["email_" + iNumLinha] = "off";
    ajax_read_only["fone_" + iNumLinha] = "off";
    ajax_read_only["fone1_" + iNumLinha] = "off";
    ajax_read_only["fax_" + iNumLinha] = "off";
    ajax_read_only["contato_" + iNumLinha] = "off";
    ajax_read_only["enderecocobranca_" + iNumLinha] = "off";
    ajax_read_only["cidadecobranca_" + iNumLinha] = "off";
    ajax_read_only["bairrocobranca_" + iNumLinha] = "off";
    ajax_read_only["estadocobranca_" + iNumLinha] = "off";
    ajax_read_only["cepcobranca_" + iNumLinha] = "off";
    ajax_read_only["fonecobranca_" + iNumLinha] = "off";
    ajax_read_only["faxcobranca_" + iNumLinha] = "off";
    ajax_read_only["contatocobranca_" + iNumLinha] = "off";
    ajax_read_only["cgcentrega_" + iNumLinha] = "off";
    ajax_read_only["inscricaoentrega_" + iNumLinha] = "off";
    ajax_read_only["enderecoentrega_" + iNumLinha] = "off";
    ajax_read_only["cidadeentrega_" + iNumLinha] = "off";
    ajax_read_only["bairroentrega_" + iNumLinha] = "off";
    ajax_read_only["estadoentrega_" + iNumLinha] = "off";
    ajax_read_only["cepentrega_" + iNumLinha] = "off";
    ajax_read_only["foneentrega_" + iNumLinha] = "off";
    ajax_read_only["contatoentrega_" + iNumLinha] = "off";
    ajax_read_only["contatoexpedicao_" + iNumLinha] = "off";
    ajax_read_only["foneexpedicao_" + iNumLinha] = "off";
    ajax_read_only["datacadastro_" + iNumLinha] = "off";
    ajax_read_only["obs_" + iNumLinha] = "off";
    ajax_read_only["tipo_" + iNumLinha] = "off";
    ajax_read_only["consumidor_" + iNumLinha] = "off";
    ajax_read_only["licensa_" + iNumLinha] = "off";
    ajax_read_only["venctolicensa_" + iNumLinha] = "off";
    ajax_read_only["licensa1_" + iNumLinha] = "off";
    ajax_read_only["venctolicensa1_" + iNumLinha] = "off";
    ajax_read_only["qtdeliberada_" + iNumLinha] = "off";
    ajax_read_only["licensa2_" + iNumLinha] = "off";
    ajax_read_only["venctolicensa2_" + iNumLinha] = "off";
    ajax_read_only["icms_" + iNumLinha] = "off";
    ajax_read_only["suframa_" + iNumLinha] = "off";
    ajax_read_only["limitecredito_" + iNumLinha] = "off";
    ajax_read_only["vendedor_" + iNumLinha] = "off";
    ajax_read_only["restricao_" + iNumLinha] = "off";
    ajax_read_only["comissao_" + iNumLinha] = "off";
    ajax_read_only["transportadora_" + iNumLinha] = "off";
    ajax_read_only["coleta_" + iNumLinha] = "off";
    ajax_read_only["segmento_" + iNumLinha] = "off";
    ajax_read_only["dataalteracao_" + iNumLinha] = "off";
    ajax_read_only["usuario_" + iNumLinha] = "off";
    ajax_read_only["requisitos_" + iNumLinha] = "off";
    ajax_read_only["banco_" + iNumLinha] = "off";
    ajax_read_only["emailcobranca_" + iNumLinha] = "off";
    ajax_read_only["emailtecnico_" + iNumLinha] = "off";
    ajax_read_only["midia_" + iNumLinha] = "off";
    ajax_read_only["seg_" + iNumLinha] = "off";
    ajax_read_only["ter_" + iNumLinha] = "off";
    ajax_read_only["qua_" + iNumLinha] = "off";
    ajax_read_only["qui_" + iNumLinha] = "off";
    ajax_read_only["sex_" + iNumLinha] = "off";
    ajax_read_only["certificado_" + iNumLinha] = "off";
    ajax_read_only["emailnfe_" + iNumLinha] = "off";
    ajax_read_only["fundacao_" + iNumLinha] = "off";
    ajax_read_only["site_" + iNumLinha] = "off";
    ajax_read_only["financeiro_" + iNumLinha] = "off";
    ajax_read_only["numero_" + iNumLinha] = "off";
    ajax_read_only["complemento_" + iNumLinha] = "off";
    ajax_read_only["razaosocialentrega_" + iNumLinha] = "off";
    ajax_read_only["entrega_" + iNumLinha] = "off";
    ajax_read_only["contatotecnico_" + iNumLinha] = "off";
<?php
}
else
{
?>
    ajax_read_only["cd_cliente_" + iNumLinha] = "on";
    ajax_read_only["razaosocial_" + iNumLinha] = "on";
    ajax_read_only["nomefantasia_" + iNumLinha] = "on";
    ajax_read_only["cgc_" + iNumLinha] = "on";
    ajax_read_only["inscricao_" + iNumLinha] = "on";
    ajax_read_only["endereco_" + iNumLinha] = "on";
    ajax_read_only["cidade_" + iNumLinha] = "on";
    ajax_read_only["estado_" + iNumLinha] = "on";
    ajax_read_only["bairro_" + iNumLinha] = "on";
    ajax_read_only["cep_" + iNumLinha] = "on";
    ajax_read_only["email_" + iNumLinha] = "on";
    ajax_read_only["fone_" + iNumLinha] = "on";
    ajax_read_only["fone1_" + iNumLinha] = "on";
    ajax_read_only["fax_" + iNumLinha] = "on";
    ajax_read_only["contato_" + iNumLinha] = "on";
    ajax_read_only["enderecocobranca_" + iNumLinha] = "on";
    ajax_read_only["cidadecobranca_" + iNumLinha] = "on";
    ajax_read_only["bairrocobranca_" + iNumLinha] = "on";
    ajax_read_only["estadocobranca_" + iNumLinha] = "on";
    ajax_read_only["cepcobranca_" + iNumLinha] = "on";
    ajax_read_only["fonecobranca_" + iNumLinha] = "on";
    ajax_read_only["faxcobranca_" + iNumLinha] = "on";
    ajax_read_only["contatocobranca_" + iNumLinha] = "on";
    ajax_read_only["cgcentrega_" + iNumLinha] = "on";
    ajax_read_only["inscricaoentrega_" + iNumLinha] = "on";
    ajax_read_only["enderecoentrega_" + iNumLinha] = "on";
    ajax_read_only["cidadeentrega_" + iNumLinha] = "on";
    ajax_read_only["bairroentrega_" + iNumLinha] = "on";
    ajax_read_only["estadoentrega_" + iNumLinha] = "on";
    ajax_read_only["cepentrega_" + iNumLinha] = "on";
    ajax_read_only["foneentrega_" + iNumLinha] = "on";
    ajax_read_only["contatoentrega_" + iNumLinha] = "on";
    ajax_read_only["contatoexpedicao_" + iNumLinha] = "on";
    ajax_read_only["foneexpedicao_" + iNumLinha] = "on";
    ajax_read_only["datacadastro_" + iNumLinha] = "on";
    ajax_read_only["obs_" + iNumLinha] = "on";
    ajax_read_only["tipo_" + iNumLinha] = "on";
    ajax_read_only["consumidor_" + iNumLinha] = "on";
    ajax_read_only["licensa_" + iNumLinha] = "on";
    ajax_read_only["venctolicensa_" + iNumLinha] = "on";
    ajax_read_only["licensa1_" + iNumLinha] = "on";
    ajax_read_only["venctolicensa1_" + iNumLinha] = "on";
    ajax_read_only["qtdeliberada_" + iNumLinha] = "on";
    ajax_read_only["licensa2_" + iNumLinha] = "on";
    ajax_read_only["venctolicensa2_" + iNumLinha] = "on";
    ajax_read_only["icms_" + iNumLinha] = "on";
    ajax_read_only["suframa_" + iNumLinha] = "on";
    ajax_read_only["limitecredito_" + iNumLinha] = "on";
    ajax_read_only["vendedor_" + iNumLinha] = "on";
    ajax_read_only["restricao_" + iNumLinha] = "on";
    ajax_read_only["comissao_" + iNumLinha] = "on";
    ajax_read_only["transportadora_" + iNumLinha] = "on";
    ajax_read_only["coleta_" + iNumLinha] = "on";
    ajax_read_only["segmento_" + iNumLinha] = "on";
    ajax_read_only["dataalteracao_" + iNumLinha] = "on";
    ajax_read_only["usuario_" + iNumLinha] = "on";
    ajax_read_only["requisitos_" + iNumLinha] = "on";
    ajax_read_only["banco_" + iNumLinha] = "on";
    ajax_read_only["emailcobranca_" + iNumLinha] = "on";
    ajax_read_only["emailtecnico_" + iNumLinha] = "on";
    ajax_read_only["midia_" + iNumLinha] = "on";
    ajax_read_only["seg_" + iNumLinha] = "on";
    ajax_read_only["ter_" + iNumLinha] = "on";
    ajax_read_only["qua_" + iNumLinha] = "on";
    ajax_read_only["qui_" + iNumLinha] = "on";
    ajax_read_only["sex_" + iNumLinha] = "on";
    ajax_read_only["certificado_" + iNumLinha] = "on";
    ajax_read_only["emailnfe_" + iNumLinha] = "on";
    ajax_read_only["fundacao_" + iNumLinha] = "on";
    ajax_read_only["site_" + iNumLinha] = "on";
    ajax_read_only["financeiro_" + iNumLinha] = "on";
    ajax_read_only["numero_" + iNumLinha] = "on";
    ajax_read_only["complemento_" + iNumLinha] = "on";
    ajax_read_only["razaosocialentrega_" + iNumLinha] = "on";
    ajax_read_only["entrega_" + iNumLinha] = "on";
    ajax_read_only["contatotecnico_" + iNumLinha] = "on";
<?php
}
?>
  }
  function ajax_destroy_tables(iNumLinha)
  {
    ajax_error_list["cd_cliente_" + iNumLinha] = null;
    ajax_error_list["razaosocial_" + iNumLinha] = null;
    ajax_error_list["nomefantasia_" + iNumLinha] = null;
    ajax_error_list["cgc_" + iNumLinha] = null;
    ajax_error_list["inscricao_" + iNumLinha] = null;
    ajax_error_list["endereco_" + iNumLinha] = null;
    ajax_error_list["cidade_" + iNumLinha] = null;
    ajax_error_list["estado_" + iNumLinha] = null;
    ajax_error_list["bairro_" + iNumLinha] = null;
    ajax_error_list["cep_" + iNumLinha] = null;
    ajax_error_list["email_" + iNumLinha] = null;
    ajax_error_list["fone_" + iNumLinha] = null;
    ajax_error_list["fone1_" + iNumLinha] = null;
    ajax_error_list["fax_" + iNumLinha] = null;
    ajax_error_list["contato_" + iNumLinha] = null;
    ajax_error_list["enderecocobranca_" + iNumLinha] = null;
    ajax_error_list["cidadecobranca_" + iNumLinha] = null;
    ajax_error_list["bairrocobranca_" + iNumLinha] = null;
    ajax_error_list["estadocobranca_" + iNumLinha] = null;
    ajax_error_list["cepcobranca_" + iNumLinha] = null;
    ajax_error_list["fonecobranca_" + iNumLinha] = null;
    ajax_error_list["faxcobranca_" + iNumLinha] = null;
    ajax_error_list["contatocobranca_" + iNumLinha] = null;
    ajax_error_list["cgcentrega_" + iNumLinha] = null;
    ajax_error_list["inscricaoentrega_" + iNumLinha] = null;
    ajax_error_list["enderecoentrega_" + iNumLinha] = null;
    ajax_error_list["cidadeentrega_" + iNumLinha] = null;
    ajax_error_list["bairroentrega_" + iNumLinha] = null;
    ajax_error_list["estadoentrega_" + iNumLinha] = null;
    ajax_error_list["cepentrega_" + iNumLinha] = null;
    ajax_error_list["foneentrega_" + iNumLinha] = null;
    ajax_error_list["contatoentrega_" + iNumLinha] = null;
    ajax_error_list["contatoexpedicao_" + iNumLinha] = null;
    ajax_error_list["foneexpedicao_" + iNumLinha] = null;
    ajax_error_list["datacadastro_" + iNumLinha] = null;
    ajax_error_list["obs_" + iNumLinha] = null;
    ajax_error_list["tipo_" + iNumLinha] = null;
    ajax_error_list["consumidor_" + iNumLinha] = null;
    ajax_error_list["licensa_" + iNumLinha] = null;
    ajax_error_list["venctolicensa_" + iNumLinha] = null;
    ajax_error_list["licensa1_" + iNumLinha] = null;
    ajax_error_list["venctolicensa1_" + iNumLinha] = null;
    ajax_error_list["qtdeliberada_" + iNumLinha] = null;
    ajax_error_list["licensa2_" + iNumLinha] = null;
    ajax_error_list["venctolicensa2_" + iNumLinha] = null;
    ajax_error_list["icms_" + iNumLinha] = null;
    ajax_error_list["suframa_" + iNumLinha] = null;
    ajax_error_list["limitecredito_" + iNumLinha] = null;
    ajax_error_list["vendedor_" + iNumLinha] = null;
    ajax_error_list["restricao_" + iNumLinha] = null;
    ajax_error_list["comissao_" + iNumLinha] = null;
    ajax_error_list["transportadora_" + iNumLinha] = null;
    ajax_error_list["coleta_" + iNumLinha] = null;
    ajax_error_list["segmento_" + iNumLinha] = null;
    ajax_error_list["dataalteracao_" + iNumLinha] = null;
    ajax_error_list["usuario_" + iNumLinha] = null;
    ajax_error_list["requisitos_" + iNumLinha] = null;
    ajax_error_list["banco_" + iNumLinha] = null;
    ajax_error_list["emailcobranca_" + iNumLinha] = null;
    ajax_error_list["emailtecnico_" + iNumLinha] = null;
    ajax_error_list["midia_" + iNumLinha] = null;
    ajax_error_list["seg_" + iNumLinha] = null;
    ajax_error_list["ter_" + iNumLinha] = null;
    ajax_error_list["qua_" + iNumLinha] = null;
    ajax_error_list["qui_" + iNumLinha] = null;
    ajax_error_list["sex_" + iNumLinha] = null;
    ajax_error_list["certificado_" + iNumLinha] = null;
    ajax_error_list["emailnfe_" + iNumLinha] = null;
    ajax_error_list["fundacao_" + iNumLinha] = null;
    ajax_error_list["site_" + iNumLinha] = null;
    ajax_error_list["financeiro_" + iNumLinha] = null;
    ajax_error_list["numero_" + iNumLinha] = null;
    ajax_error_list["complemento_" + iNumLinha] = null;
    ajax_error_list["razaosocialentrega_" + iNumLinha] = null;
    ajax_error_list["entrega_" + iNumLinha] = null;
    ajax_error_list["contatotecnico_" + iNumLinha] = null;
  }

  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  iTotCampos = 0;
  iTotDt_Hr  = 0;

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {};
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

  var ajax_field_id = {};

  var ajax_read_only = {};

  var ajax_error_count = {};

  var Lim_linhas = <?php echo $sc_seq_vert ?>;
  for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
  {
     ajax_create_tables(iNumLinha);
  }

  function scRemoveErrors()
  {
    for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
    {
      ajax_error_list["cd_cliente_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cd_cliente_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cd_cliente_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cd_cliente_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cd_cliente_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["razaosocial_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["razaosocial_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["razaosocial_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["razaosocial_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["razaosocial_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["nomefantasia_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["nomefantasia_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["nomefantasia_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["nomefantasia_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["nomefantasia_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cgc_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cgc_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cgc_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cgc_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cgc_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["inscricao_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["inscricao_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["inscricao_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["inscricao_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["inscricao_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["endereco_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["endereco_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["endereco_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["endereco_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["endereco_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cidade_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cidade_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cidade_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cidade_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cidade_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["estado_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["estado_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["estado_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["estado_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["estado_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["bairro_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["bairro_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["bairro_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["bairro_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["bairro_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cep_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cep_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cep_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cep_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cep_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["email_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["email_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["email_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["email_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["email_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["fone_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["fone_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["fone_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["fone_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["fone_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["fone1_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["fone1_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["fone1_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["fone1_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["fone1_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["fax_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["fax_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["fax_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["fax_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["fax_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["contato_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["contato_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["contato_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["contato_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["contato_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["enderecocobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["enderecocobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["enderecocobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["enderecocobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["enderecocobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cidadecobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cidadecobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cidadecobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cidadecobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cidadecobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["bairrocobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["bairrocobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["bairrocobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["bairrocobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["bairrocobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["estadocobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["estadocobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["estadocobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["estadocobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["estadocobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cepcobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cepcobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cepcobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cepcobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cepcobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["fonecobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["fonecobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["fonecobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["fonecobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["fonecobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["faxcobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["faxcobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["faxcobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["faxcobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["faxcobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["contatocobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["contatocobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["contatocobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["contatocobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["contatocobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cgcentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cgcentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cgcentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cgcentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cgcentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["inscricaoentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["inscricaoentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["inscricaoentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["inscricaoentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["inscricaoentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["enderecoentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["enderecoentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["enderecoentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["enderecoentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["enderecoentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cidadeentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cidadeentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cidadeentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cidadeentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cidadeentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["bairroentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["bairroentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["bairroentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["bairroentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["bairroentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["estadoentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["estadoentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["estadoentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["estadoentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["estadoentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cepentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cepentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cepentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cepentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cepentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["foneentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["foneentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["foneentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["foneentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["foneentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["contatoentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["contatoentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["contatoentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["contatoentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["contatoentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["contatoexpedicao_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["contatoexpedicao_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["contatoexpedicao_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["contatoexpedicao_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["contatoexpedicao_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["foneexpedicao_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["foneexpedicao_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["foneexpedicao_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["foneexpedicao_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["foneexpedicao_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["datacadastro_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["datacadastro_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["datacadastro_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["datacadastro_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["datacadastro_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["obs_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["obs_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["obs_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["obs_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["obs_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["tipo_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["tipo_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["tipo_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["tipo_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["tipo_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["consumidor_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["consumidor_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["consumidor_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["consumidor_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["consumidor_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["licensa_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["licensa_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["licensa_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["licensa_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["licensa_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["venctolicensa_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["venctolicensa_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["venctolicensa_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["venctolicensa_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["venctolicensa_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["licensa1_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["licensa1_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["licensa1_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["licensa1_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["licensa1_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["venctolicensa1_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["venctolicensa1_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["venctolicensa1_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["venctolicensa1_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["venctolicensa1_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["qtdeliberada_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["qtdeliberada_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["qtdeliberada_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["qtdeliberada_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["qtdeliberada_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["licensa2_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["licensa2_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["licensa2_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["licensa2_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["licensa2_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["venctolicensa2_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["venctolicensa2_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["venctolicensa2_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["venctolicensa2_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["venctolicensa2_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["icms_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["icms_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["icms_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["icms_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["icms_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["suframa_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["suframa_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["suframa_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["suframa_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["suframa_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["limitecredito_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["limitecredito_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["limitecredito_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["limitecredito_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["limitecredito_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["vendedor_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["vendedor_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["vendedor_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["vendedor_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["vendedor_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["restricao_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["restricao_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["restricao_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["restricao_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["restricao_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["comissao_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["comissao_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["comissao_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["comissao_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["comissao_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["transportadora_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["transportadora_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["transportadora_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["transportadora_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["transportadora_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["coleta_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["coleta_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["coleta_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["coleta_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["coleta_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["segmento_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["segmento_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["segmento_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["segmento_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["segmento_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dataalteracao_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dataalteracao_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dataalteracao_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dataalteracao_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dataalteracao_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["usuario_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["usuario_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["usuario_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["usuario_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["usuario_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["requisitos_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["requisitos_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["requisitos_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["requisitos_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["requisitos_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["banco_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["banco_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["banco_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["banco_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["banco_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["emailcobranca_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["emailcobranca_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["emailcobranca_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["emailcobranca_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["emailcobranca_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["emailtecnico_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["emailtecnico_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["emailtecnico_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["emailtecnico_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["emailtecnico_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["midia_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["midia_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["midia_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["midia_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["midia_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["seg_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["seg_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["seg_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["seg_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["seg_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["ter_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["ter_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["ter_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["ter_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["ter_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["qua_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["qua_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["qua_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["qua_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["qua_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["qui_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["qui_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["qui_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["qui_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["qui_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sex_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sex_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sex_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sex_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sex_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["certificado_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["certificado_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["certificado_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["certificado_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["certificado_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["emailnfe_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["emailnfe_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["emailnfe_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["emailnfe_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["emailnfe_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["fundacao_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["fundacao_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["fundacao_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["fundacao_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["fundacao_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["site_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["site_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["site_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["site_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["site_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["financeiro_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["financeiro_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["financeiro_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["financeiro_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["financeiro_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["numero_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["numero_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["numero_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["numero_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["numero_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["complemento_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["complemento_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["complemento_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["complemento_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["complemento_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["razaosocialentrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["razaosocialentrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["razaosocialentrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["razaosocialentrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["razaosocialentrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["entrega_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["entrega_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["entrega_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["entrega_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["entrega_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["contatotecnico_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["contatotecnico_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["contatotecnico_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["contatotecnico_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["contatotecnico_" + iNumLinha]["onfocus"] = new Array();
    }
  }

  function mdOpenLine(iSeq)
  {
    if (document.getElementById("sc_open_line_" + iSeq))
    {
      document.getElementById("sc_open_line_" + iSeq).style.display = "none";
    }
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
    if (document.getElementById("sc_exc_line_" + iSeq))
    {
      document.getElementById("sc_exc_line_" + iSeq).style.display = "none";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + iSeq))
    {
      document.getElementById("sc_upd_line_" + iSeq).style.display = "";
    }
    if (document.getElementById("sc_cancelu_line_" + iSeq))
    {
      document.getElementById("sc_cancelu_line_" + iSeq).style.display = "";
    }
    mdOpenObjects(iSeq);
    displayChange_row(iSeq, "on");
    rerunHeaderDisplay = 1;
    scSetFixedHeaders(true);
  }

  function mdOpenObjects(iSeq)
  {
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cd_cliente_'])) ? $this->nmgp_cmp_readonly['cd_cliente_'] : 'on';
?>
    scAjaxFieldRead("cd_cliente_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['razaosocial_'])) ? $this->nmgp_cmp_readonly['razaosocial_'] : 'off';
?>
    scAjaxFieldRead("razaosocial_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['nomefantasia_'])) ? $this->nmgp_cmp_readonly['nomefantasia_'] : 'off';
?>
    scAjaxFieldRead("nomefantasia_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cgc_'])) ? $this->nmgp_cmp_readonly['cgc_'] : 'off';
?>
    scAjaxFieldRead("cgc_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['inscricao_'])) ? $this->nmgp_cmp_readonly['inscricao_'] : 'off';
?>
    scAjaxFieldRead("inscricao_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['endereco_'])) ? $this->nmgp_cmp_readonly['endereco_'] : 'off';
?>
    scAjaxFieldRead("endereco_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cidade_'])) ? $this->nmgp_cmp_readonly['cidade_'] : 'off';
?>
    scAjaxFieldRead("cidade_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['estado_'])) ? $this->nmgp_cmp_readonly['estado_'] : 'off';
?>
    scAjaxFieldRead("estado_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['bairro_'])) ? $this->nmgp_cmp_readonly['bairro_'] : 'off';
?>
    scAjaxFieldRead("bairro_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cep_'])) ? $this->nmgp_cmp_readonly['cep_'] : 'off';
?>
    scAjaxFieldRead("cep_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['email_'])) ? $this->nmgp_cmp_readonly['email_'] : 'off';
?>
    scAjaxFieldRead("email_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['fone_'])) ? $this->nmgp_cmp_readonly['fone_'] : 'off';
?>
    scAjaxFieldRead("fone_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['fone1_'])) ? $this->nmgp_cmp_readonly['fone1_'] : 'off';
?>
    scAjaxFieldRead("fone1_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['fax_'])) ? $this->nmgp_cmp_readonly['fax_'] : 'off';
?>
    scAjaxFieldRead("fax_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['contato_'])) ? $this->nmgp_cmp_readonly['contato_'] : 'off';
?>
    scAjaxFieldRead("contato_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['enderecocobranca_'])) ? $this->nmgp_cmp_readonly['enderecocobranca_'] : 'off';
?>
    scAjaxFieldRead("enderecocobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cidadecobranca_'])) ? $this->nmgp_cmp_readonly['cidadecobranca_'] : 'off';
?>
    scAjaxFieldRead("cidadecobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['bairrocobranca_'])) ? $this->nmgp_cmp_readonly['bairrocobranca_'] : 'off';
?>
    scAjaxFieldRead("bairrocobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['estadocobranca_'])) ? $this->nmgp_cmp_readonly['estadocobranca_'] : 'off';
?>
    scAjaxFieldRead("estadocobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cepcobranca_'])) ? $this->nmgp_cmp_readonly['cepcobranca_'] : 'off';
?>
    scAjaxFieldRead("cepcobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['fonecobranca_'])) ? $this->nmgp_cmp_readonly['fonecobranca_'] : 'off';
?>
    scAjaxFieldRead("fonecobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['faxcobranca_'])) ? $this->nmgp_cmp_readonly['faxcobranca_'] : 'off';
?>
    scAjaxFieldRead("faxcobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['contatocobranca_'])) ? $this->nmgp_cmp_readonly['contatocobranca_'] : 'off';
?>
    scAjaxFieldRead("contatocobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cgcentrega_'])) ? $this->nmgp_cmp_readonly['cgcentrega_'] : 'off';
?>
    scAjaxFieldRead("cgcentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['inscricaoentrega_'])) ? $this->nmgp_cmp_readonly['inscricaoentrega_'] : 'off';
?>
    scAjaxFieldRead("inscricaoentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['enderecoentrega_'])) ? $this->nmgp_cmp_readonly['enderecoentrega_'] : 'off';
?>
    scAjaxFieldRead("enderecoentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cidadeentrega_'])) ? $this->nmgp_cmp_readonly['cidadeentrega_'] : 'off';
?>
    scAjaxFieldRead("cidadeentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['bairroentrega_'])) ? $this->nmgp_cmp_readonly['bairroentrega_'] : 'off';
?>
    scAjaxFieldRead("bairroentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['estadoentrega_'])) ? $this->nmgp_cmp_readonly['estadoentrega_'] : 'off';
?>
    scAjaxFieldRead("estadoentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cepentrega_'])) ? $this->nmgp_cmp_readonly['cepentrega_'] : 'off';
?>
    scAjaxFieldRead("cepentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['foneentrega_'])) ? $this->nmgp_cmp_readonly['foneentrega_'] : 'off';
?>
    scAjaxFieldRead("foneentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['contatoentrega_'])) ? $this->nmgp_cmp_readonly['contatoentrega_'] : 'off';
?>
    scAjaxFieldRead("contatoentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['contatoexpedicao_'])) ? $this->nmgp_cmp_readonly['contatoexpedicao_'] : 'off';
?>
    scAjaxFieldRead("contatoexpedicao_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['foneexpedicao_'])) ? $this->nmgp_cmp_readonly['foneexpedicao_'] : 'off';
?>
    scAjaxFieldRead("foneexpedicao_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['datacadastro_'])) ? $this->nmgp_cmp_readonly['datacadastro_'] : 'off';
?>
    scAjaxFieldRead("datacadastro_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['obs_'])) ? $this->nmgp_cmp_readonly['obs_'] : 'off';
?>
    scAjaxFieldRead("obs_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['tipo_'])) ? $this->nmgp_cmp_readonly['tipo_'] : 'off';
?>
    scAjaxFieldRead("tipo_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['consumidor_'])) ? $this->nmgp_cmp_readonly['consumidor_'] : 'off';
?>
    scAjaxFieldRead("consumidor_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['licensa_'])) ? $this->nmgp_cmp_readonly['licensa_'] : 'off';
?>
    scAjaxFieldRead("licensa_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['venctolicensa_'])) ? $this->nmgp_cmp_readonly['venctolicensa_'] : 'off';
?>
    scAjaxFieldRead("venctolicensa_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['licensa1_'])) ? $this->nmgp_cmp_readonly['licensa1_'] : 'off';
?>
    scAjaxFieldRead("licensa1_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['venctolicensa1_'])) ? $this->nmgp_cmp_readonly['venctolicensa1_'] : 'off';
?>
    scAjaxFieldRead("venctolicensa1_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['qtdeliberada_'])) ? $this->nmgp_cmp_readonly['qtdeliberada_'] : 'off';
?>
    scAjaxFieldRead("qtdeliberada_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['licensa2_'])) ? $this->nmgp_cmp_readonly['licensa2_'] : 'off';
?>
    scAjaxFieldRead("licensa2_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['venctolicensa2_'])) ? $this->nmgp_cmp_readonly['venctolicensa2_'] : 'off';
?>
    scAjaxFieldRead("venctolicensa2_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['icms_'])) ? $this->nmgp_cmp_readonly['icms_'] : 'off';
?>
    scAjaxFieldRead("icms_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['suframa_'])) ? $this->nmgp_cmp_readonly['suframa_'] : 'off';
?>
    scAjaxFieldRead("suframa_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['limitecredito_'])) ? $this->nmgp_cmp_readonly['limitecredito_'] : 'off';
?>
    scAjaxFieldRead("limitecredito_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['vendedor_'])) ? $this->nmgp_cmp_readonly['vendedor_'] : 'off';
?>
    scAjaxFieldRead("vendedor_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['restricao_'])) ? $this->nmgp_cmp_readonly['restricao_'] : 'off';
?>
    scAjaxFieldRead("restricao_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['comissao_'])) ? $this->nmgp_cmp_readonly['comissao_'] : 'off';
?>
    scAjaxFieldRead("comissao_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['transportadora_'])) ? $this->nmgp_cmp_readonly['transportadora_'] : 'off';
?>
    scAjaxFieldRead("transportadora_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['coleta_'])) ? $this->nmgp_cmp_readonly['coleta_'] : 'off';
?>
    scAjaxFieldRead("coleta_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['segmento_'])) ? $this->nmgp_cmp_readonly['segmento_'] : 'off';
?>
    scAjaxFieldRead("segmento_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dataalteracao_'])) ? $this->nmgp_cmp_readonly['dataalteracao_'] : 'off';
?>
    scAjaxFieldRead("dataalteracao_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['usuario_'])) ? $this->nmgp_cmp_readonly['usuario_'] : 'off';
?>
    scAjaxFieldRead("usuario_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['requisitos_'])) ? $this->nmgp_cmp_readonly['requisitos_'] : 'off';
?>
    scAjaxFieldRead("requisitos_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['banco_'])) ? $this->nmgp_cmp_readonly['banco_'] : 'off';
?>
    scAjaxFieldRead("banco_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['emailcobranca_'])) ? $this->nmgp_cmp_readonly['emailcobranca_'] : 'off';
?>
    scAjaxFieldRead("emailcobranca_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['emailtecnico_'])) ? $this->nmgp_cmp_readonly['emailtecnico_'] : 'off';
?>
    scAjaxFieldRead("emailtecnico_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['midia_'])) ? $this->nmgp_cmp_readonly['midia_'] : 'off';
?>
    scAjaxFieldRead("midia_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['seg_'])) ? $this->nmgp_cmp_readonly['seg_'] : 'off';
?>
    scAjaxFieldRead("seg_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['ter_'])) ? $this->nmgp_cmp_readonly['ter_'] : 'off';
?>
    scAjaxFieldRead("ter_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['qua_'])) ? $this->nmgp_cmp_readonly['qua_'] : 'off';
?>
    scAjaxFieldRead("qua_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['qui_'])) ? $this->nmgp_cmp_readonly['qui_'] : 'off';
?>
    scAjaxFieldRead("qui_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sex_'])) ? $this->nmgp_cmp_readonly['sex_'] : 'off';
?>
    scAjaxFieldRead("sex_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['certificado_'])) ? $this->nmgp_cmp_readonly['certificado_'] : 'off';
?>
    scAjaxFieldRead("certificado_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['emailnfe_'])) ? $this->nmgp_cmp_readonly['emailnfe_'] : 'off';
?>
    scAjaxFieldRead("emailnfe_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['fundacao_'])) ? $this->nmgp_cmp_readonly['fundacao_'] : 'off';
?>
    scAjaxFieldRead("fundacao_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['site_'])) ? $this->nmgp_cmp_readonly['site_'] : 'off';
?>
    scAjaxFieldRead("site_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['financeiro_'])) ? $this->nmgp_cmp_readonly['financeiro_'] : 'off';
?>
    scAjaxFieldRead("financeiro_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['numero_'])) ? $this->nmgp_cmp_readonly['numero_'] : 'off';
?>
    scAjaxFieldRead("numero_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['complemento_'])) ? $this->nmgp_cmp_readonly['complemento_'] : 'off';
?>
    scAjaxFieldRead("complemento_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['razaosocialentrega_'])) ? $this->nmgp_cmp_readonly['razaosocialentrega_'] : 'off';
?>
    scAjaxFieldRead("razaosocialentrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['entrega_'])) ? $this->nmgp_cmp_readonly['entrega_'] : 'off';
?>
    scAjaxFieldRead("entrega_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['contatotecnico_'])) ? $this->nmgp_cmp_readonly['contatotecnico_'] : 'off';
?>
    scAjaxFieldRead("contatotecnico_" + iSeq, "<?php echo $NM_contr_readonly ?>");
  }

  function mdCloseObjects(iSeq)
  {
    scAjaxFieldRead("cd_cliente_" + iSeq, "on");
    scAjaxFieldRead("razaosocial_" + iSeq, "on");
    scAjaxFieldRead("nomefantasia_" + iSeq, "on");
    scAjaxFieldRead("cgc_" + iSeq, "on");
    scAjaxFieldRead("inscricao_" + iSeq, "on");
    scAjaxFieldRead("endereco_" + iSeq, "on");
    scAjaxFieldRead("cidade_" + iSeq, "on");
    scAjaxFieldRead("estado_" + iSeq, "on");
    scAjaxFieldRead("bairro_" + iSeq, "on");
    scAjaxFieldRead("cep_" + iSeq, "on");
    scAjaxFieldRead("email_" + iSeq, "on");
    scAjaxFieldRead("fone_" + iSeq, "on");
    scAjaxFieldRead("fone1_" + iSeq, "on");
    scAjaxFieldRead("fax_" + iSeq, "on");
    scAjaxFieldRead("contato_" + iSeq, "on");
    scAjaxFieldRead("enderecocobranca_" + iSeq, "on");
    scAjaxFieldRead("cidadecobranca_" + iSeq, "on");
    scAjaxFieldRead("bairrocobranca_" + iSeq, "on");
    scAjaxFieldRead("estadocobranca_" + iSeq, "on");
    scAjaxFieldRead("cepcobranca_" + iSeq, "on");
    scAjaxFieldRead("fonecobranca_" + iSeq, "on");
    scAjaxFieldRead("faxcobranca_" + iSeq, "on");
    scAjaxFieldRead("contatocobranca_" + iSeq, "on");
    scAjaxFieldRead("cgcentrega_" + iSeq, "on");
    scAjaxFieldRead("inscricaoentrega_" + iSeq, "on");
    scAjaxFieldRead("enderecoentrega_" + iSeq, "on");
    scAjaxFieldRead("cidadeentrega_" + iSeq, "on");
    scAjaxFieldRead("bairroentrega_" + iSeq, "on");
    scAjaxFieldRead("estadoentrega_" + iSeq, "on");
    scAjaxFieldRead("cepentrega_" + iSeq, "on");
    scAjaxFieldRead("foneentrega_" + iSeq, "on");
    scAjaxFieldRead("contatoentrega_" + iSeq, "on");
    scAjaxFieldRead("contatoexpedicao_" + iSeq, "on");
    scAjaxFieldRead("foneexpedicao_" + iSeq, "on");
    scAjaxFieldRead("datacadastro_" + iSeq, "on");
    scAjaxFieldRead("obs_" + iSeq, "on");
    scAjaxFieldRead("tipo_" + iSeq, "on");
    scAjaxFieldRead("consumidor_" + iSeq, "on");
    scAjaxFieldRead("licensa_" + iSeq, "on");
    scAjaxFieldRead("venctolicensa_" + iSeq, "on");
    scAjaxFieldRead("licensa1_" + iSeq, "on");
    scAjaxFieldRead("venctolicensa1_" + iSeq, "on");
    scAjaxFieldRead("qtdeliberada_" + iSeq, "on");
    scAjaxFieldRead("licensa2_" + iSeq, "on");
    scAjaxFieldRead("venctolicensa2_" + iSeq, "on");
    scAjaxFieldRead("icms_" + iSeq, "on");
    scAjaxFieldRead("suframa_" + iSeq, "on");
    scAjaxFieldRead("limitecredito_" + iSeq, "on");
    scAjaxFieldRead("vendedor_" + iSeq, "on");
    scAjaxFieldRead("restricao_" + iSeq, "on");
    scAjaxFieldRead("comissao_" + iSeq, "on");
    scAjaxFieldRead("transportadora_" + iSeq, "on");
    scAjaxFieldRead("coleta_" + iSeq, "on");
    scAjaxFieldRead("segmento_" + iSeq, "on");
    scAjaxFieldRead("dataalteracao_" + iSeq, "on");
    scAjaxFieldRead("usuario_" + iSeq, "on");
    scAjaxFieldRead("requisitos_" + iSeq, "on");
    scAjaxFieldRead("banco_" + iSeq, "on");
    scAjaxFieldRead("emailcobranca_" + iSeq, "on");
    scAjaxFieldRead("emailtecnico_" + iSeq, "on");
    scAjaxFieldRead("midia_" + iSeq, "on");
    scAjaxFieldRead("seg_" + iSeq, "on");
    scAjaxFieldRead("ter_" + iSeq, "on");
    scAjaxFieldRead("qua_" + iSeq, "on");
    scAjaxFieldRead("qui_" + iSeq, "on");
    scAjaxFieldRead("sex_" + iSeq, "on");
    scAjaxFieldRead("certificado_" + iSeq, "on");
    scAjaxFieldRead("emailnfe_" + iSeq, "on");
    scAjaxFieldRead("fundacao_" + iSeq, "on");
    scAjaxFieldRead("site_" + iSeq, "on");
    scAjaxFieldRead("financeiro_" + iSeq, "on");
    scAjaxFieldRead("numero_" + iSeq, "on");
    scAjaxFieldRead("complemento_" + iSeq, "on");
    scAjaxFieldRead("razaosocialentrega_" + iSeq, "on");
    scAjaxFieldRead("entrega_" + iSeq, "on");
    scAjaxFieldRead("contatotecnico_" + iSeq, "on");
    rerunHeaderDisplay = 1;
    scSetFixedHeaders(true);
  }

  function mdCloseLine()
  {
    if (!oResp["closeLine"] || "" == oResp["closeLine"])
    {
      return;
    }
<?php
    if ($this->nmgp_botoes['update'] == 'on')
    {
?>
    if (document.getElementById("sc_open_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_open_line_" + oResp["closeLine"]).style.display = "";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_upd_line_" + oResp["closeLine"]).style.display = "none";
    }
    rerunHeaderDisplay = 2;
    scSetFixedHeaders(true);
  }

  var sc_open_lines = 0;
  var orig_Nav_permite_ret = "";
  var orig_Nav_permite_ava = "";
  function scDisableNavigation()
  {
    if (0 == sc_open_lines)
    {
      orig_Nav_permite_ret = Nav_permite_ret;
      orig_Nav_permite_ava = Nav_permite_ava;
      Nav_permite_ret = "N";
      Nav_permite_ava = "N";
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
    sc_open_lines++;
  }

  function scEnableNavigation()
  {
    sc_open_lines--;
    if (0 == sc_open_lines)
    {
      Nav_permite_ret = orig_Nav_permite_ret;
      Nav_permite_ava = orig_Nav_permite_ava;
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scErrorLineOn(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "on";
    }
    if (bErrorRow || ("on" == ajax_error_count["cd_cliente_" + iRow] || "on" == ajax_error_count["razaosocial_" + iRow] || "on" == ajax_error_count["nomefantasia_" + iRow] || "on" == ajax_error_count["cgc_" + iRow] || "on" == ajax_error_count["inscricao_" + iRow] || "on" == ajax_error_count["endereco_" + iRow] || "on" == ajax_error_count["cidade_" + iRow] || "on" == ajax_error_count["estado_" + iRow] || "on" == ajax_error_count["bairro_" + iRow] || "on" == ajax_error_count["cep_" + iRow] || "on" == ajax_error_count["email_" + iRow] || "on" == ajax_error_count["fone_" + iRow] || "on" == ajax_error_count["fone1_" + iRow] || "on" == ajax_error_count["fax_" + iRow] || "on" == ajax_error_count["contato_" + iRow] || "on" == ajax_error_count["enderecocobranca_" + iRow] || "on" == ajax_error_count["cidadecobranca_" + iRow] || "on" == ajax_error_count["bairrocobranca_" + iRow] || "on" == ajax_error_count["estadocobranca_" + iRow] || "on" == ajax_error_count["cepcobranca_" + iRow] || "on" == ajax_error_count["fonecobranca_" + iRow] || "on" == ajax_error_count["faxcobranca_" + iRow] || "on" == ajax_error_count["contatocobranca_" + iRow] || "on" == ajax_error_count["cgcentrega_" + iRow] || "on" == ajax_error_count["inscricaoentrega_" + iRow] || "on" == ajax_error_count["enderecoentrega_" + iRow] || "on" == ajax_error_count["cidadeentrega_" + iRow] || "on" == ajax_error_count["bairroentrega_" + iRow] || "on" == ajax_error_count["estadoentrega_" + iRow] || "on" == ajax_error_count["cepentrega_" + iRow] || "on" == ajax_error_count["foneentrega_" + iRow] || "on" == ajax_error_count["contatoentrega_" + iRow] || "on" == ajax_error_count["contatoexpedicao_" + iRow] || "on" == ajax_error_count["foneexpedicao_" + iRow] || "on" == ajax_error_count["datacadastro_" + iRow] || "on" == ajax_error_count["obs_" + iRow] || "on" == ajax_error_count["tipo_" + iRow] || "on" == ajax_error_count["consumidor_" + iRow] || "on" == ajax_error_count["licensa_" + iRow] || "on" == ajax_error_count["venctolicensa_" + iRow] || "on" == ajax_error_count["licensa1_" + iRow] || "on" == ajax_error_count["venctolicensa1_" + iRow] || "on" == ajax_error_count["qtdeliberada_" + iRow] || "on" == ajax_error_count["licensa2_" + iRow] || "on" == ajax_error_count["venctolicensa2_" + iRow] || "on" == ajax_error_count["icms_" + iRow] || "on" == ajax_error_count["suframa_" + iRow] || "on" == ajax_error_count["limitecredito_" + iRow] || "on" == ajax_error_count["vendedor_" + iRow] || "on" == ajax_error_count["restricao_" + iRow] || "on" == ajax_error_count["comissao_" + iRow] || "on" == ajax_error_count["transportadora_" + iRow] || "on" == ajax_error_count["coleta_" + iRow] || "on" == ajax_error_count["segmento_" + iRow] || "on" == ajax_error_count["dataalteracao_" + iRow] || "on" == ajax_error_count["usuario_" + iRow] || "on" == ajax_error_count["requisitos_" + iRow] || "on" == ajax_error_count["banco_" + iRow] || "on" == ajax_error_count["emailcobranca_" + iRow] || "on" == ajax_error_count["emailtecnico_" + iRow] || "on" == ajax_error_count["midia_" + iRow] || "on" == ajax_error_count["seg_" + iRow] || "on" == ajax_error_count["ter_" + iRow] || "on" == ajax_error_count["qua_" + iRow] || "on" == ajax_error_count["qui_" + iRow] || "on" == ajax_error_count["sex_" + iRow] || "on" == ajax_error_count["certificado_" + iRow] || "on" == ajax_error_count["emailnfe_" + iRow] || "on" == ajax_error_count["fundacao_" + iRow] || "on" == ajax_error_count["site_" + iRow] || "on" == ajax_error_count["financeiro_" + iRow] || "on" == ajax_error_count["numero_" + iRow] || "on" == ajax_error_count["complemento_" + iRow] || "on" == ajax_error_count["razaosocialentrega_" + iRow] || "on" == ajax_error_count["entrega_" + iRow] || "on" == ajax_error_count["contatotecnico_" + iRow]))
    {
      $("#hidden_field_data_sc_seq" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_sc_actions" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cd_cliente_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_razaosocial_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_nomefantasia_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cgc_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_inscricao_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_endereco_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cidade_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_estado_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_bairro_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cep_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_email_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_fone_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_fone1_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_fax_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_contato_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_enderecocobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cidadecobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_bairrocobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_estadocobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cepcobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_fonecobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_faxcobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_contatocobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cgcentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_inscricaoentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_enderecoentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cidadeentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_bairroentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_estadoentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_cepentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_foneentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_contatoentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_contatoexpedicao_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_foneexpedicao_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_datacadastro_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_obs_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_tipo_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_consumidor_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_licensa_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_venctolicensa_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_licensa1_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_venctolicensa1_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_qtdeliberada_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_licensa2_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_venctolicensa2_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_icms_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_suframa_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_limitecredito_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_vendedor_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_restricao_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_comissao_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_transportadora_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_coleta_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_segmento_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_dataalteracao_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_usuario_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_requisitos_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_banco_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_emailcobranca_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_emailtecnico_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_midia_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_seg_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_ter_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_qua_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_qui_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_sex_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_certificado_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_emailnfe_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_fundacao_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_site_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_financeiro_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_numero_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_complemento_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_razaosocialentrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_entrega_" + iRow).addClass("scFormErrorLine");
      $("#hidden_field_data_contatotecnico_" + iRow).addClass("scFormErrorLine");
    }
  }

  function scErrorLineOff(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "off";
    }
    if (bErrorRow || ("off" == ajax_error_count["cd_cliente_" + iRow] && "off" == ajax_error_count["razaosocial_" + iRow] && "off" == ajax_error_count["nomefantasia_" + iRow] && "off" == ajax_error_count["cgc_" + iRow] && "off" == ajax_error_count["inscricao_" + iRow] && "off" == ajax_error_count["endereco_" + iRow] && "off" == ajax_error_count["cidade_" + iRow] && "off" == ajax_error_count["estado_" + iRow] && "off" == ajax_error_count["bairro_" + iRow] && "off" == ajax_error_count["cep_" + iRow] && "off" == ajax_error_count["email_" + iRow] && "off" == ajax_error_count["fone_" + iRow] && "off" == ajax_error_count["fone1_" + iRow] && "off" == ajax_error_count["fax_" + iRow] && "off" == ajax_error_count["contato_" + iRow] && "off" == ajax_error_count["enderecocobranca_" + iRow] && "off" == ajax_error_count["cidadecobranca_" + iRow] && "off" == ajax_error_count["bairrocobranca_" + iRow] && "off" == ajax_error_count["estadocobranca_" + iRow] && "off" == ajax_error_count["cepcobranca_" + iRow] && "off" == ajax_error_count["fonecobranca_" + iRow] && "off" == ajax_error_count["faxcobranca_" + iRow] && "off" == ajax_error_count["contatocobranca_" + iRow] && "off" == ajax_error_count["cgcentrega_" + iRow] && "off" == ajax_error_count["inscricaoentrega_" + iRow] && "off" == ajax_error_count["enderecoentrega_" + iRow] && "off" == ajax_error_count["cidadeentrega_" + iRow] && "off" == ajax_error_count["bairroentrega_" + iRow] && "off" == ajax_error_count["estadoentrega_" + iRow] && "off" == ajax_error_count["cepentrega_" + iRow] && "off" == ajax_error_count["foneentrega_" + iRow] && "off" == ajax_error_count["contatoentrega_" + iRow] && "off" == ajax_error_count["contatoexpedicao_" + iRow] && "off" == ajax_error_count["foneexpedicao_" + iRow] && "off" == ajax_error_count["datacadastro_" + iRow] && "off" == ajax_error_count["obs_" + iRow] && "off" == ajax_error_count["tipo_" + iRow] && "off" == ajax_error_count["consumidor_" + iRow] && "off" == ajax_error_count["licensa_" + iRow] && "off" == ajax_error_count["venctolicensa_" + iRow] && "off" == ajax_error_count["licensa1_" + iRow] && "off" == ajax_error_count["venctolicensa1_" + iRow] && "off" == ajax_error_count["qtdeliberada_" + iRow] && "off" == ajax_error_count["licensa2_" + iRow] && "off" == ajax_error_count["venctolicensa2_" + iRow] && "off" == ajax_error_count["icms_" + iRow] && "off" == ajax_error_count["suframa_" + iRow] && "off" == ajax_error_count["limitecredito_" + iRow] && "off" == ajax_error_count["vendedor_" + iRow] && "off" == ajax_error_count["restricao_" + iRow] && "off" == ajax_error_count["comissao_" + iRow] && "off" == ajax_error_count["transportadora_" + iRow] && "off" == ajax_error_count["coleta_" + iRow] && "off" == ajax_error_count["segmento_" + iRow] && "off" == ajax_error_count["dataalteracao_" + iRow] && "off" == ajax_error_count["usuario_" + iRow] && "off" == ajax_error_count["requisitos_" + iRow] && "off" == ajax_error_count["banco_" + iRow] && "off" == ajax_error_count["emailcobranca_" + iRow] && "off" == ajax_error_count["emailtecnico_" + iRow] && "off" == ajax_error_count["midia_" + iRow] && "off" == ajax_error_count["seg_" + iRow] && "off" == ajax_error_count["ter_" + iRow] && "off" == ajax_error_count["qua_" + iRow] && "off" == ajax_error_count["qui_" + iRow] && "off" == ajax_error_count["sex_" + iRow] && "off" == ajax_error_count["certificado_" + iRow] && "off" == ajax_error_count["emailnfe_" + iRow] && "off" == ajax_error_count["fundacao_" + iRow] && "off" == ajax_error_count["site_" + iRow] && "off" == ajax_error_count["financeiro_" + iRow] && "off" == ajax_error_count["numero_" + iRow] && "off" == ajax_error_count["complemento_" + iRow] && "off" == ajax_error_count["razaosocialentrega_" + iRow] && "off" == ajax_error_count["entrega_" + iRow] && "off" == ajax_error_count["contatotecnico_" + iRow]))
    {
      if (bErrorRow)
      {
        ajax_error_count["cd_cliente_" + iRow] = "off";
        ajax_error_count["razaosocial_" + iRow] = "off";
        ajax_error_count["nomefantasia_" + iRow] = "off";
        ajax_error_count["cgc_" + iRow] = "off";
        ajax_error_count["inscricao_" + iRow] = "off";
        ajax_error_count["endereco_" + iRow] = "off";
        ajax_error_count["cidade_" + iRow] = "off";
        ajax_error_count["estado_" + iRow] = "off";
        ajax_error_count["bairro_" + iRow] = "off";
        ajax_error_count["cep_" + iRow] = "off";
        ajax_error_count["email_" + iRow] = "off";
        ajax_error_count["fone_" + iRow] = "off";
        ajax_error_count["fone1_" + iRow] = "off";
        ajax_error_count["fax_" + iRow] = "off";
        ajax_error_count["contato_" + iRow] = "off";
        ajax_error_count["enderecocobranca_" + iRow] = "off";
        ajax_error_count["cidadecobranca_" + iRow] = "off";
        ajax_error_count["bairrocobranca_" + iRow] = "off";
        ajax_error_count["estadocobranca_" + iRow] = "off";
        ajax_error_count["cepcobranca_" + iRow] = "off";
        ajax_error_count["fonecobranca_" + iRow] = "off";
        ajax_error_count["faxcobranca_" + iRow] = "off";
        ajax_error_count["contatocobranca_" + iRow] = "off";
        ajax_error_count["cgcentrega_" + iRow] = "off";
        ajax_error_count["inscricaoentrega_" + iRow] = "off";
        ajax_error_count["enderecoentrega_" + iRow] = "off";
        ajax_error_count["cidadeentrega_" + iRow] = "off";
        ajax_error_count["bairroentrega_" + iRow] = "off";
        ajax_error_count["estadoentrega_" + iRow] = "off";
        ajax_error_count["cepentrega_" + iRow] = "off";
        ajax_error_count["foneentrega_" + iRow] = "off";
        ajax_error_count["contatoentrega_" + iRow] = "off";
        ajax_error_count["contatoexpedicao_" + iRow] = "off";
        ajax_error_count["foneexpedicao_" + iRow] = "off";
        ajax_error_count["datacadastro_" + iRow] = "off";
        ajax_error_count["obs_" + iRow] = "off";
        ajax_error_count["tipo_" + iRow] = "off";
        ajax_error_count["consumidor_" + iRow] = "off";
        ajax_error_count["licensa_" + iRow] = "off";
        ajax_error_count["venctolicensa_" + iRow] = "off";
        ajax_error_count["licensa1_" + iRow] = "off";
        ajax_error_count["venctolicensa1_" + iRow] = "off";
        ajax_error_count["qtdeliberada_" + iRow] = "off";
        ajax_error_count["licensa2_" + iRow] = "off";
        ajax_error_count["venctolicensa2_" + iRow] = "off";
        ajax_error_count["icms_" + iRow] = "off";
        ajax_error_count["suframa_" + iRow] = "off";
        ajax_error_count["limitecredito_" + iRow] = "off";
        ajax_error_count["vendedor_" + iRow] = "off";
        ajax_error_count["restricao_" + iRow] = "off";
        ajax_error_count["comissao_" + iRow] = "off";
        ajax_error_count["transportadora_" + iRow] = "off";
        ajax_error_count["coleta_" + iRow] = "off";
        ajax_error_count["segmento_" + iRow] = "off";
        ajax_error_count["dataalteracao_" + iRow] = "off";
        ajax_error_count["usuario_" + iRow] = "off";
        ajax_error_count["requisitos_" + iRow] = "off";
        ajax_error_count["banco_" + iRow] = "off";
        ajax_error_count["emailcobranca_" + iRow] = "off";
        ajax_error_count["emailtecnico_" + iRow] = "off";
        ajax_error_count["midia_" + iRow] = "off";
        ajax_error_count["seg_" + iRow] = "off";
        ajax_error_count["ter_" + iRow] = "off";
        ajax_error_count["qua_" + iRow] = "off";
        ajax_error_count["qui_" + iRow] = "off";
        ajax_error_count["sex_" + iRow] = "off";
        ajax_error_count["certificado_" + iRow] = "off";
        ajax_error_count["emailnfe_" + iRow] = "off";
        ajax_error_count["fundacao_" + iRow] = "off";
        ajax_error_count["site_" + iRow] = "off";
        ajax_error_count["financeiro_" + iRow] = "off";
        ajax_error_count["numero_" + iRow] = "off";
        ajax_error_count["complemento_" + iRow] = "off";
        ajax_error_count["razaosocialentrega_" + iRow] = "off";
        ajax_error_count["entrega_" + iRow] = "off";
        ajax_error_count["contatotecnico_" + iRow] = "off";
      }
      var sCssLine = scErrorLineCss(iRow);
      $("#hidden_field_data_sc_seq" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_sc_actions" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cd_cliente_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_razaosocial_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_nomefantasia_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cgc_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_inscricao_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_endereco_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cidade_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_estado_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_bairro_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cep_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_email_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_fone_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_fone1_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_fax_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_contato_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_enderecocobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cidadecobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_bairrocobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_estadocobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cepcobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_fonecobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_faxcobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_contatocobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cgcentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_inscricaoentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_enderecoentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cidadeentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_bairroentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_estadoentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_cepentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_foneentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_contatoentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_contatoexpedicao_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_foneexpedicao_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_datacadastro_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_obs_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_tipo_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_consumidor_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_licensa_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_venctolicensa_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_licensa1_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_venctolicensa1_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_qtdeliberada_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_licensa2_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_venctolicensa2_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_icms_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_suframa_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_limitecredito_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_vendedor_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_restricao_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_comissao_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_transportadora_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_coleta_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_segmento_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_dataalteracao_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_usuario_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_requisitos_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_banco_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_emailcobranca_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_emailtecnico_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_midia_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_seg_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_ter_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_qua_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_qui_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_sex_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_certificado_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_emailnfe_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_fundacao_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_site_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_financeiro_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_numero_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_complemento_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_razaosocialentrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_entrega_" + iRow).removeClass("scFormErrorLine");
      $("#hidden_field_data_contatotecnico_" + iRow).removeClass("scFormErrorLine");
    }
  }

  function scErrorLineReset()
  {
    for (iLineReset = 0; iLineReset < iAjaxNewLine; iLineReset++)
    {
      scErrorLineOff(iLineReset, "__sc_all__");
    }
  }

  function scErrorLineCss(iRow)
  {
    return "scFormDataOddMult";
  }
  var bRefreshTable = false;
  function scRefreshTable()
  {
    if (bRefreshTable || document.F2.nmgp_opcao.value == "fast_search")
    {
      do_ajax_form_dbo_cliente_table_refresh();
      bRefreshTable = false;
      return true;
    }
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
