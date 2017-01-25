
<?php $i=0;foreach ($info as $v) {?>
<tr>
    <td> <?php echo ++$i; ?> </td>
    <td> <?php echo $v->first_name." ".$v->last_name ?> </td>
    <td> <?php echo $v->sid ?> </td>
    <td> <?php echo $v->section ?> </td>
    <td  class="text-center">
        <label>
            <input name="checked_student[]" value="<?php echo $v->id ?>" type="checkbox" class="flat-red" checked>
        </label>
    </td>
    <script>
        //Flat green color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>
    
</tr>
<?php }; ?>

