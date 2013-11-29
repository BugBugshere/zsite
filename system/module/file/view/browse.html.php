<div class='bg-white radius'>
<table class='table table-bordered'>
  <caption><?php echo $lang->file->browse;?></caption>
  <tr>
    <th><?php echo $lang->file->id;?></th>
    <th><?php echo $lang->file->common;?></th>
    <th><?php echo $lang->file->extension;?></th>
    <th><?php echo $lang->file->size;?></th>
    <th><?php echo $lang->file->addedBy;?></th>
    <th><?php echo $lang->file->addedDate;?></th>
    <th class='w-150px'><?php echo $lang->file->public;?></th>
    <th><?php echo $lang->file->downloads;?></th>
    <th><?php echo $lang->actions;?></th>
  </tr>
  <?php foreach($files as $file):?>
  <tr class='v-middle'>
    <td><?php echo $file->id;?></td>
    <td>
      <?php
      if($file->isImage)
      {
          echo html::a(inlink('download', "id=$file->id"), html::image($file->smallURL, "class='image-small' title='{$file->title}'"), "target='_blank'");
          if($file->primary == 1) echo '<small class="label label-success">'. $lang->file->primary .'</small>';
      }
      else
      {
          echo html::a(inlink('download', "id=$file->id"), "{$file->title}.{$file->extension}", "target='_blank'");
      }
      ?>
    </td>
    <td><?php echo $file->extension;?></td>
    <td><?php echo $file->size;?></td>
    <td><?php echo $file->addedBy;?></td>
    <td><?php echo $file->addedDate;?></td>
    <td>
    <?php
    echo '<span>' . $lang->file->publics[$file->public] . '</span> ';
    echo html::a(inlink($file->public ? 'deny' : 'allow',  "id=$file->id"), $lang->file->toggle, 'class="option"');
    ?>
    </td>
    <td><?php echo $file->downloads;?></td>
    <td>
    <?php
    echo html::a(inlink('edit',   "id=$file->id"), $lang->edit, "class='edit'");
    echo html::a(inlink('delete', "id=$file->id"), $lang->delete, "class='deleter'");
    if($file->isImage) echo html::a(inlink('setPrimary', "id=$file->id"), $lang->file->setPrimary, "class='option'");
    ?>
    </td>
  </tr>
  <?php endforeach;?>
</table>
<form id="fileForm" method='post' class="form-inline" enctype='multipart/form-data' action='<?php echo inlink('upload', "objectType=$objectType&objectID=$objectID");?>'>
<table class='table table-bordered table-form'>
  <?php if($writeable):?>
  <tr>
    <td><?php echo $lang->file->upload;?></td>
    <td><?php echo $this->fetch('file', 'buildForm');?></td>
  </tr>
  <tr><td colspan='2' class='a-center'><?php echo html::submitButton();?></td></tr>
  <?php else:?>
  <tr><td colspan='2'><h5 class='text-danger'><?php echo $lang->file->errorUnwritable;?></h5></td></tr>
  <?php endif;?>
</table>
</form>
</div>
<script>
$(document).ready(function()
{   
    $.setAjaxForm('#fileForm', function(data){$.reloadAjaxModal();}); 
    $.setAjaxLoader('.edit', '#ajaxModal');
    $('a.option').click(function(data)
    {
        $.getJSON($(this).attr('href'), function(data) 
        {
            if(data.result == 'success')
            {
                $.reloadAjaxModal();
            }
            else
            {
                alert(data.message);
            }
        });
        return false;
    });

    $(".modal-backdrop").click(function()
    {
        $('.modal').modal('hide');
    });
});
</script>
