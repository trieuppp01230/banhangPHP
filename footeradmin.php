<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2020 &copy; TDC - Lập trình web 1 - Nhóm 9</div>
</div>
<!--end-Footer-part-->
<script src="public/admin/js/jquery.min.js"></script>
<script src="public/admin/js/jquery.ui.custom.js"></script>
<script src="public/admin/js/bootstrap.min.js"></script>
<script src="public/admin/js/jquery.uniform.js"></script>
<script src="public/admin/js/select2.min.js"></script>
<script src="public/admin/js/jquery.dataTables.min.js"></script>
<script src="public/admin/js/matrix.js"></script>
<script src="public/admin/js/matrix.tables.js"></script>
<script type="text/javascript">
$('#type_id').change(function() {
    var type_id = $('#type_id').val();
    $('#manu_id').load('loadmanu.php?type_id=' + type_id);
})
</script>
</body>

</html>