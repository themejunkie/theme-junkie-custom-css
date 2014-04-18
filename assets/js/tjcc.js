jQuery(function($){
	var editor = CodeMirror.fromTextArea(document.getElementById("tjcc-custom-css-textarea"), {
		mode: "css",
		theme: "default",
		styleActiveLine: true,
		matchBrackets: true,
		lineNumbers: true
	});
})