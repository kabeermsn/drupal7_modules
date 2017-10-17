<?php if(count($generalHeaderSpotlights)): ?>
  <?php
  $firstLine = $generalHeaderSpotlights->field_header_first_line->value();
  $secondLine = $generalHeaderSpotlights->field_header_second_line->value();
  $singleLineHeader = $generalHeaderSpotlights->field_header_single_line->value();
  $boolSingleLine = ($singleLineHeader) ? 1:0;
  $boolMultiLine = ($firstLine && $secondLine) ? 1:0;
  $boolTitle = ($boolSingleLine || $boolMultiLine)? 1:0;
  $uri = $generalHeaderSpotlights->field_image->value();
  $boolQuoteURL = $generalHeaderSpotlights->field_request_quote_url->value();
  $boolContactUs = $generalHeaderSpotlights->field_contact_us_url->value();

  ?>

  <div class="spotlight-wrapper">
    <div class="abt-spot-img">
      <?php print theme('image_style',array('style_name' => 'general_page_spotlight', 'path' => $uri[0]['uri'])); ?>
    </div>
    <?php if($boolTitle): ?>
      <?php if($boolSingleLine): ?>
        <div class="abt-tittle">
          <h2><?php echo $singleLineHeader;?></h2>
        </div>
      <?php else: ?>
        <div class="abt-tittle <?php echo $headerTextClass;?>">
          <div class="tittel-wrap">
            <h3><?php echo $firstLine;?></h3>
            <h1><?php echo $secondLine;?></h1>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <?php if($boolQuoteURL || $boolContactUs): ?>
      <div class="rt-cmn-btn">
        <?php if($boolQuoteURL): ?>
          <div class="raq-btn-cmn">
            <a href="request_quote">Request a quote</a>
          </div>
        <?php endif; ?>
        <?php if($boolContactUs): ?>
          <div class="raq-btn-cmn cnct-btn-cmn">
            <a href="#" data-toggle="modal" data-target="#myModal">Contact Us</a>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>


