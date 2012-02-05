<?
echo time();
?>


<script type="text/javascript">
function createIFrame() {
  var id = 'f' + Math.floor(Math.random() * 99999);
  var div = document.createElement('div');
  div.innerHTML = '<iframe style="display:none" src="about:blank" id="'+id+'" name="'+id+'" onload="sendComplete(\''+id+'\')"></iframe>';
  document.body.appendChild(div);
  return document.getElementById(id);
}

function sendForm(form, url, func, arg) {
  if (!document.createElement) return; // not supported
  if (typeof(form)=="string") form=document.getElementById(form);
  var frame=createIFrame();
  frame.onSendComplete = function() { func(arg, getIFrameXML(frame)); };
  form.setAttribute('target', frame.id);
  form.setAttribute('action', url);
  form.submit();
}

function sendComplete(id) {
  var iframe=document.getElementById(id);
  if (iframe.onSendComplete && typeof(iframe.onSendComplete) == 'function') iframe.onSendComplete();
}

function getIFrameXML(iframe) {
  var doc=iframe.contentDocument;
  if (!doc && iframe.contentWindow) doc=iframe.contentWindow.document;
  if (!doc) doc=window.frames[iframe.id].document;
  if (!doc) return null;
  if (doc.location=="about:blank") return null;
  if (doc.XMLDocument) doc=doc.XMLDocument;
  return doc;
}

var cnt=0;

function uploadComplete(element, doc) {
  if (!doc) return;
  if (typeof(element)=="string") element=document.getElementById(element);
  element.innerHTML='Результат запроса #'+(++cnt)+': '+doc.documentElement.firstChild.nodeValue;
}

</script>

<form id="ajaxUploadForm" method="post" enctype="multipart/form-data"
 onsubmit="sendForm(this, 'uploadFile.php', uploadComplete, 'resultDiv');return true;">


<label>Файл: <input type="file" name="uploadFile" /></label>
<input type="submit" value="Загрузить" />
</form>
<input type="button" value="Альтернативный вызов загрузки файла" onclick="sendForm('ajaxUploadForm', 'uploadFile.php', uploadComplete, 'resultDiv')" />
<div id="resultDiv"></div>
