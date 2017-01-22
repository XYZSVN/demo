
<?php $i=0;foreach ($info as $v) {?>
<tr>
    <td> <?php echo ++$i; ?> </td>
    <td> <?php echo $v->first_name." ".$v->last_name ?> </td>
    <td> <?php echo $v->sid ?> </td>
    <td> <?php echo $v->section ?> </td>
    <td  class="text-center">
        <label>
            <input name="<?php $v->id ?>" type="checkbox" class="flat-red" checked>
        </label>
    </td>
</tr>
<?php }; ?>

