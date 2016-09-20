<?php

/**
 * @file
 * islandora-compound-object-select-list.tpl.php
 *
 * @TODO: needs documentation about file and variables
 * $parent_label - Title of compound object
 * $child_count - Count of objects in compound object
 * $parent_url - URL to manage compound object
 * $previous_pid - PID of previous object in sequence or blank if on first
 * $next_pid - PID of next object in sequence or blank if on last
 * $siblings - array of PIDs of sibling objects in compound
 * $themed_siblings - array of siblings of model
 *    array(
 *      'pid' => PID of sibling,
 *      'label' => label of sibling,
 *      'TN' => URL of thumbnail or default folder if no datastream,
 *      'class' => array of classes for this sibling,
 *    )
 */
drupal_add_js(array('islandora_compound_object' => array('currentObject' => $currentPID)), 'setting');

?>
<div class="islandora-compound-select-list-block">
  <?php // if (!empty($previous_pid)): ?>
    <!--<div class="prev"><i class="fa fa-angle-double-left" aria-hidden="true"></i><?php // print l(t('Previous'), 'islandora/object/' . $previous_pid); ?></div>-->
  <?php // endif; ?>
  <?php if (count($themed_siblings) > 0): ?>
    <div class="islandora-compound-select-list-title"><?php print t("Other volumes"); ?></div>  
    <div class="islandora-compound-select-list-outter">
      <select class="islandora-compound-select-list customSelect">
        <option class='no_select' value='ignore'><?php print t('Please select');?></option>
      <?php if ($parent_tn): ?>
        <?php if($parent_pid): ?>
          <option class='parent' value='<?php print $parent_pid; ?>'><?php print $parent_label;?></option>
        <?php endif; ?>
      
      <?php endif; ?>
      <?php foreach ($themed_siblings as $sibling): ?>
        <option  value='<?php print $sibling['pid']?>'><?php print $sibling['label'];?></option>
      <?php endforeach;?>
      </select>
    </div>
  <?php endif;?>
  <?php // if (!empty($next_pid)): ?>
    <!--<div class="next"><?php // print l(t('Next'), 'islandora/object/' . $next_pid); ?><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>-->
  <?php // endif; ?>
</div>