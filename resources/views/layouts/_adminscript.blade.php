<script>
    var adminQuery = jQuery.noConflict(false);

    function callAPI() {
        const routeCountPending = @json(route('staff.count'));
        adminQuery.ajax({
            url: routeCountPending,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var countPendding = data.data['countPending'];
                var countHandover = data.data['countHandover'];
                if (countPendding != 0) {
                    adminQuery('#countPendding').text(countPendding);
                } else {
                    adminQuery('#countPendding').text('');
                }
                if (countHandover != 0) {
                    adminQuery('#countHandover').text(countHandover);
                } else {
                    adminQuery('#countHandover').text('');
                }

            },
            error: function(xhr, status, error) {
                // Xử lý khi gọi API gặp lỗi
                console.error(status, error);
            }
        });
    }

    // Lặp lại việc gọi API mỗi 10 giây
    setInterval(callAPI, 5000); // 10000 miligiây = 10 giây
</script>
