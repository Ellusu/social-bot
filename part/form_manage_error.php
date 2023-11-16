<style>
#scb-4 .inside{
    overflow: auto;
}

</style>
<script>

function addFailMessage(ev){
    var command = $(ev.target).parent().parent().data("command");
    add_command (window.counter, command);
    updateMsgFail(command);
}

function removeFailMessage(ev){
    var command = $(ev.target).parent().parent().data("command");
    updateMsgFail(command);
    
}

function updateMsgFail(element) {
    var text =$("#scb_message_failure_list").val();
    var myArray = text.split("|").filter(function(v){return v!==''}).filter(function(v){return v!==element});
    var implodedArray = myArray.join("|");
    $("#scb_message_failure_list").val(implodedArray);
}

</script>

<?php 
$message_fail_list = explode("|", esc_attr( get_post_meta( get_the_ID(), 'scb_message_failure_list', true ) )); 
echo '<div class="container-error">';
foreach($message_fail_list as $single_error) {
    if(trim($single_error))
    echo '<div class="single_error" data-command="'.$single_error.'">
            <p class=" "><span>'.$single_error.'</span></p>
            <ul class="btn-list">
                <li class="add_package button" onclick="addFailMessage(event)">
                    '. __( 'Add Command', 'social-bot' ).'
                </li>
                <li class="add_package button" onclick="removeFailMessage(event)">
                    '. __( 'Remove Command', 'social-bot' ).'
                </li>
            </ul>
        </div>';
}
echo "</div>";

?>