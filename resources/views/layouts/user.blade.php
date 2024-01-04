<!DOCTYPE html>
<html oncontextmenu="return false;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-language" content="ja">
<title>xxxxxxxx | @yield('title')</title>
<link rel="icon" href="/favicon.ico">
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="/css/common.css?v={{ time() }}">
<!-- <link rel="stylesheet" type="text/css" href="/css/schedule.css"> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansjp.css">
<link rel="stylesheet" href="/css/fixedsticky.css?v={{ time() }}">

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/js/sidebar.js?v={{ time() }}"></script>
<script src="/js/common.js?v={{ time() }}"></script>

<!-- IconFonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<!-- Modal -->
<link rel="stylesheet" type="text/css" href="/libs/iziModal.min.css" media="screen">
<script type="text/javascript" src="/libs/iziModal.min.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/loaders/loaders.min.css" media="screen">

</head>
<body>
  <div id="contents" class="scroll_div">
    <div class="container">
      @yield('content')
    </div>
  </div>
<script type="text/javascript">



</body>
</html>
