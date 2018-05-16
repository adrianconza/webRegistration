import $ from 'jquery'

window.showDialogDestroy = (id) => {
    let $row = $('#' + id)
    $row.children().toggle(0)
    return false
}
