
$(function () {
   $(document).ready(function () {
       ItemIndex = $('#no_of_items').val();
   })
});

function add_row() {
    ItemIndex++;
    var $template = $('.add-row-template'),
        $clone    = $template
            .clone()
            .removeClass('hide')
            .removeClass('add-row-template')
            //                                .removeAttr('id')
            .addClass('added_row')
            .attr('id', ItemIndex + '-item_row')
            .attr('data-item-index', ItemIndex)
            .insertBefore($template);
    $clone.find('.removeButton').attr('data-index', ItemIndex);
    $clone.find('.removeButton').attr('onclick', "remove_row(" + ItemIndex + ",this);");
}

function remove_row(index, $this) {
    $($this).parents('tr').remove();
}

function assign_this_job(id) {
    $.confirm({
        title: 'Are you sure',
        content: 'Are you sure want to get this job?',
        theme: 'modern',
        buttons:{
            yes:{
                btnClass:'btn-primary btn-raised',
                action: function () {
                    location.href = base_url + 'designers/job-assigning/'+id;
                }
            },
            cancel:{
                btnClass:'btn-default btn-raised'
            }
        }
    });
}

function complete_or_edit_job(id) {
    $.confirm({
        title:'Are you sure',
        content:'Are you sure want to complete or edit this job?',
        theme:'modern',
        buttons:{
            edit:{
                btnClass:'btn-primary btn-raised',
                action:function () {
                    location.href = base_url+'designers/job-item-edit';
                }
            },
            complete:{
                btnClass:'btn-primary btn-raised',
                action:function () {
                    $.post(base_url + 'designers/update-ongoing-to-complete', {job_id: id}).success(function (res) {
                        if (res == 'success'){
                            location.reload();
                        }else{
                            $.alert('Something error please try again');
                        }
                    });
                }
            },
            cancel:{
                btnClass:'btn-default btn-raised'
            }
        },
        // boxWidth:'100%'
    });
}

function edit_job(id) {
    $.confirm({
        title:'Are you sure',
        content:'Are you sure want to edit this job?',
        theme:'modern',
        buttons:{
            edit:{
                btnClass:'btn-primary btn-raised',
                action:function () {
                    location.href = base_url+'designers/job-item-edit';
                }
            },
            cancel:{
                btnClass:'btn-default btn-raised'
            }
        }
        // boxWidth:'100%'
    });
}
