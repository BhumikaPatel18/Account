
 {{-- <script type="text/javascript" src={{asset('js/app.js')}} --}}
 <html>
<head>
<script src={{asset('js/app.js')}}></script>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});
</script>
</head>
<body>

<p>If you click on the "Hide" button, I will disappear.</p>

<button id="hide">Hide</button>
<button id="show">Show</button>

</body>
</html>
