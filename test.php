<?php
    include_once('controller/controller.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>tretre</title>

        <!-- Code mirror css -->
        <link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="assets/vendor/codemirror/theme/tomorrow-night-bright.css">
        <link rel="stylesheet" href="assets/vendor/codemirror/addon/dialog/dialog.css">
        <link rel="stylesheet" href="assets/vendor/codemirror/addon/hint/show-hint.css">
        <!-- end Code mirror css -->

        <script type="text/javascript" src="assets/vendor/codemirror/lib/codemirror.js"></script>
                <script type="text/javascript" src="assets/vendor/codemirror/addon/hint/show-hint.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/hint/javascript-hint.js"></script>

    </head>
    <body>
  <textarea name="code" id="code" style="display: none;">function getCompletions(token, context) {
  var found = [], start = token.string;
  function maybeAdd(str) {
    if (str.indexOf(start) == 0) found.push(str);
  }
  function gatherCompletions(obj) {
    if (typeof obj == "string") forEach(stringProps, maybeAdd);
    else if (obj instanceof Array) forEach(arrayProps, maybeAdd);
    else if (obj instanceof Function) forEach(funcProps, maybeAdd);
    for (var name in obj) maybeAdd(name);
  }

  if (context) {
    // If this is a property, see if it belongs to some object we can
    // find in the current environment.
    var obj = context.pop(), base;
    if (obj.className == "js-variable")
      base = window[obj.string];
    else if (obj.className == "js-string")
      base = "";
    else if (obj.className == "js-atom")
      base = 1;
    while (base != null &amp;&amp; context.length)
      base = base[context.pop().string];
    if (base != null) gatherCompletions(base);
  }
  else {
    // If not, just look in the window object and any local scope
    // (reading into JS mode internals to get at the local variables)
    for (var v = token.state.localVars; v; v = v.next) maybeAdd(v.name);
    gatherCompletions(window);
    forEach(keywords, maybeAdd);
  }
  return found;
}
</textarea>

    <script>
    /* CODE MIRROR  */

    CodeMirror.commands.autocomplete = function(cm) {
        CodeMirror.showHint(cm, CodeMirror.hint.javascript);
    };


    var editor = CodeMirror.fromTextArea(code, {
            theme         : "tomorrow-night-bright",
         lineNumbers: true,
        extraKeys: {"Ctrl-Space": "autocomplete"},
        mode: {name: "javascript", globalVars: true}
    });
    </script> </body>
</html>
