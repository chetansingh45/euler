function initializeDatatable(d) {
    const tableList = $('#tableList');
    const { Url, columns } = d;
    $("#tableUpdatedDate").html(new Date().toLocaleString());
    let table = tableList.DataTable( {
        ajax: Url.replace(/&amp;/g, '&'),
        columns,
        dom: 'Bfrtip',
        bDestroy: false,
    });
    
    // tableRefreshBtn.addEventListener('click', event=>{
    //     $("#tableRefreshBtn").html("Refreshing <i class='fa fa-refresh fa-spin'></i>").prop("disabled", true);
    //     $("#tableUpdatedDate").html(new Date().toLocaleString());
    //     table.ajax.reload(res => {
    //         $("#tableRefreshBtn").html("Refresh <i class='fas fa-sync'></i>").prop("disabled", false);
    //         $("#tableUpdatedDate").html(new Date().toLocaleString());
    //     })
    // })
}