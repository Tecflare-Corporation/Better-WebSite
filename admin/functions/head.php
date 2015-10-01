<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tecflare Multisite</title>
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <link href="style/bootstrap.theme.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <link rel="stylesheet" href="syn/lib/codemirror.css">
  <link rel="stylesheet" href="syn/addon/fold/foldgutter.css" />
  <script src="syn/lib/codemirror.js"></script>
  <script src="syn/addon/fold/foldcode.js"></script>
  <script src="syn/addon/fold/foldgutter.js"></script>
  <script src="syn/addon/fold/brace-fold.js"></script>
  <script src="syn/addon/fold/xml-fold.js"></script>
  <script src="syn/addon/fold/markdown-fold.js"></script>
  <script src="syn/addon/fold/comment-fold.js"></script>
  <script src="syn/mode/javascript/javascript.js"></script>
  <script src="syn/mode/xml/xml.js"></script>
  <?php 
  if (!isset($nowdisable))
  {
    ?>
  <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<?php
}
?>
  <script src="syn/mode/markdown/markdown.js"></script>
  <style type="text/css">
    .CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black;}


/* Loosely based on the Midnight Textmate theme */

.cm-s-night.CodeMirror { background: #0a001f; color: #f8f8f8; }
.cm-s-night div.CodeMirror-selected { background: #447; }
.cm-s-night .CodeMirror-line::selection, .cm-s-night .CodeMirror-line > span::selection, .cm-s-night .CodeMirror-line > span > span::selection { background: rgba(68, 68, 119, .99); }
.cm-s-night .CodeMirror-line::-moz-selection, .cm-s-night .CodeMirror-line > span::-moz-selection, .cm-s-night .CodeMirror-line > span > span::-moz-selection { background: rgba(68, 68, 119, .99); }
.cm-s-night .CodeMirror-gutters { background: #0a001f; border-right: 1px solid #aaa; }
.cm-s-night .CodeMirror-guttermarker { color: white; }
.cm-s-night .CodeMirror-guttermarker-subtle { color: #bbb; }
.cm-s-night .CodeMirror-linenumber { color: #f8f8f8; }
.cm-s-night .CodeMirror-cursor { border-left: 1px solid white; }

.cm-s-night span.cm-comment { color: #6900a1; }
.cm-s-night span.cm-atom { color: #845dc4; }
.cm-s-night span.cm-number, .cm-s-night span.cm-attribute { color: #ffd500; }
.cm-s-night span.cm-keyword { color: #599eff; }
.cm-s-night span.cm-string { color: #37f14a; }
.cm-s-night span.cm-meta { color: #7678e2; }
.cm-s-night span.cm-variable-2, .cm-s-night span.cm-tag { color: #99b2ff; }
.cm-s-night span.cm-variable-3, .cm-s-night span.cm-def { color: white; }
.cm-s-night span.cm-bracket { color: #8da6ce; }
.cm-s-night span.cm-comment { color: #6900a1; }
.cm-s-night span.cm-builtin, .cm-s-night span.cm-special { color: #ff9e59; }
.cm-s-night span.cm-link { color: #845dc4; }
.cm-s-night span.cm-error { color: #9d1e15; }

.cm-s-night .CodeMirror-activeline-background { background: #1C005A; }
.cm-s-night .CodeMirror-matchingbracket { outline:1px solid grey; color:white !important; }

  </style>
  </head>
  <body class="container">
   
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MultiSite Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav pull-right">
      <li><a href="account.php"><?php echo $_SESSION["usename"]; ?></a></li>
      <li><a href="do.php?value=exit">Exit</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav">
              <li class="active"><a href="cp.php">Dashboard</a></li>
              <li><a href="settings.php">System Settings</a></li>
              <li><a href="update.php">Update</a></li>
              <!--<li><a href="plugins.php">Plugins</a></li>-->
              <li><a href="store.php">Store</a></li>
              <li><a href="cloudfile.php">Storage</a></li>
              <li><a href="ipblock.php">Firewall</a></li>
              <li><a href="bkup.php">Backup</a></li>
              <li><a href="link.php">Link Tecflare</a></li>
              <li><a href="post.php">Blog</a></li>
              <li><a href="account.php">My Account</a></li>
            
            </ul>
        </div>
        <div class="col-xs-12 col-sm-9">