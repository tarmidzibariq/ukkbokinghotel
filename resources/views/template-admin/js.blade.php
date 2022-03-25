<script>
    $(document).ready(function() {
        $('#room').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('#fasilityroom').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('#fasilityhotel').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('#roomtipe').DataTable();
    } );
</script>
<script>
    $('#nama_tamu').on('change', function(e) {
        dtable.ajax.reload();
    });
    $(document).ready(function() {
        $('#reservasi').DataTable();
    } );
</script>