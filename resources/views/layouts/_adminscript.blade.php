<script>
    var adminQuery = jQuery.noConflict(false);
    function callAPI() {
        const routeCountPending = @json(route('staff.borrow.countPending'));
        adminQuery.ajax({
            url: routeCountPending,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var count = data;
                if(count!=0){
                    adminQuery('#countPendding').text(count);
                }else{
                    adminQuery('#countPendding').text('');
                }
                
            },
            error: function(xhr, status, error) {
                // Xử lý khi gọi API gặp lỗi
                console.error(status, error);
            }
        });
    }

    // Lặp lại việc gọi API mỗi 10 giây
    setInterval(callAPI, 10000); // 10000 miligiây = 10 giây
</script>
