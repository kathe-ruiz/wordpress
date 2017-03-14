<?php

$font = FONT_NAME;
$secondary_font = PARAGRAPHS_SECONDARY_FONT_NAME;
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript">
    dataLayer = [];
  </script>
  <?php wp_head(); ?>
  <link href="https://fonts.googleapis.com/css?family=<?php echo $font; ?>:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=<?php echo $secondary_font; ?>:400" rel="stylesheet">
</head>
