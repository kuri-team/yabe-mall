<?php

    if (!isset($filepath)) {
        $filepath = null;
    }
    
?>

<div id="page-editor">
  <form id="page-editor-form" action="" method="post" target="_self">
    <div id="page-editor-tab-header" class="flex-container flex-justify-content-start flex-align-items-center">
      <div class="page-editor-tab text-align-center">
        <input id="page-editor-tab-edit" type="radio" name="page_editor_tab" checked>
        <label for="page-editor-tab-edit">Edit</label>
      </div>
      <div class="page-editor-tab text-align-center">
        <input id="page-editor-tab-preview" name="page_editor_tab" type="radio">
        <label for="page-editor-tab-preview">Preview</label>
      </div>
      </div>
    
    <div id="page-editor-edit">
      <label><textarea id="page-editor-textarea" name="edit" class="textarea-nowrap" rows="50"><?php
          
          if ($filepath !== null) {
              echo file_get_contents($filepath);
          }
          
      ?></textarea></label>
    </div>
    
    <div id="page-editor-preview"></div>

    <a href="<?=$_SERVER["SCRIPT_NAME"]?>" class="cms-editor-reset">Reset</a>
    <input type="submit" name="page_editor" value="MODIFY">
  </form>
  
  <div id="page-editor-mobile-mode" class="text-align-center">This feature is not available on mobile devices</div>
</div>
