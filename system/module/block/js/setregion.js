$(document).ready(function()
{
    var initSortable = function()
    {
        $('#blockList').sortable({trigger: '.sort-handle-1', selector: '.block-item', dragCssClass: ''});
        $('#blockList .children').sortable({trigger: '.sort-handle-2', selector: '.block-item', dragCssClass: ''});
    };

    var hideEmptyChildren = function()
    {
        $('#blockList .block-item .children').each(function()
        {
            var $this = $(this);
            $this.toggleClass('hide', !$this.children('.block-item').length);
        });
    }
    
    hideEmptyChildren();
    computeParent();
    initSortable();

    /* Set border and title show. */
    $('input[type=checkbox]').change(function()
    {
        if($(this).prop('checked')) $(this).next('input[type=hidden]').val(1);
        if(!$(this).prop('checked')) $(this).next('input[type=hidden]').val(0);
    });

    $('input[type=checkbox]').change();

    /* Fix edit link. */
    $(document).on('change', 'select.block', function()
    {
        $(this).parents('.block-item').find('.edit').attr('href', createLink('block', 'edit', 'id=' + $(this).find('option:selected').val()));
    });

    $.setAjaxLoader('.loadInModal', '#ajaxModal', function()
    {
        $('#ajaxModal').find('.modal-dialog').css('width', '1100');
    });

    $('#blockList').on('click', '.plus, .plus-child, .btn-add-child', function()
    {
        setTimeout(hideEmptyChildren, 100);
        setTimeout(initSortable, 200);
    });
})
