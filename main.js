function send_form(form_id){
    $.post($('#'+form_id).attr('action'), $('#'+form_id).serialize(), function (data) {
        console.log(data)
        if($('#'+form_id+'_notice')){
            $('#'+form_id+'_notice').html(data).show();
        }
    })
}

function confirm_delete(id){
    console.log(id);
    console.log($('#rlist-'+id));
    if(confirm('确定要删除这份简历吗？')){
        $.post('resume_remove.php?id='+id, null, function(data){
            console.log(data);
            console.log($('#rlist-'+id));
            if(data == 'done'){
                console.log('开始remove');
                $('#rlist-'+id).remove();
            }
        })
    }
}