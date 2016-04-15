<table id="table_message">

<?php

    while ($don = $message->fetch()) {
        if (pair($don['ID'])) {
            $color = "";
        } else {
            $color = "#fff";
        }
    
?>

<tr style="background-color:<?php echo $color; ?>">
    <td class="info_message" valign="middle">
        <span style="font-size:small"><?php echo $don['Pseudo']; ?></span>
    </td>
    <td class="message" >
        <div class="message2" >
            <?php echo $don['Message']; ?>
            </br>
            <span class="timing">
                <?php echo getRelativeTime($don['Date']); ?>       
            </span>
        </div>    
    </td>
</tr>
 
<?php } ?>

</table>