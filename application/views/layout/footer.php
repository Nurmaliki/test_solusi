

<aside class="control-sidebar control-sidebar-dark">

</aside>


<footer class="main-footer">
<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
<b>Version</b> 3.2.0
</div>
</footer>
</div>



<script src="<?= base_url('assets/adminlte/')?>plugins/jquery/jquery.min.js"></script>

<?php if (isset($datatable) && !empty($datatable) && $datatable == 'TRUE') { ?>
	<script src="<?= base_url('assets/adminlte/')?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php  } ?>

<?php if (isset($script) && !empty($script) ) { ?>
<script>
    <?= $script ?>
</script>
<?php  } ?>

<script>
   function detail(event){

        $('#modalDetail').modal('show');
        console.log($(event).data());
        console.log($(event).data('currency'));
       var html = '';

        html +="<h1>"+$(event).data('product_name')+"</h1>";
        html +="<h4>"+$(event).data('product_code')+"</h4>";
        // html +="<h1>"+$(event).data('id')+"</h1>";
        html +="<h2>"+$(event).data('currency')+" "+$(event).data('price')+"</h2>";
        html +="<h2>"+$(event).data('discount')+" % </h2>";
        // html +="<h1>"+$(event).data('unit')+"</h1>";
        html +="<h2>"+$(event).data('dimention')+"</h2>";
        html +='<input id="qty_beli" type="number" >';
        html +='<button type="button" onclick="addtocart('+$(event).data('id')+')" class="btn btn-default" >Add To Cart</button>';
        $('#show_detail').html(html);

    }

    function addtocart(id) {
        qty_beli = $('#qty_beli').val();
        var url = 	url =  "<?= base_url('penjualan/addtocart') ?>";
        if (qty_beli == '' || qty_beli == 0 || qty_beli == '0') {
            Swal.fire({
                    icon: 'error',
                    title: 'Qty Tidak boleh Kososng',
                    text: 'Qty Kosong'
                })
            
        } else {
            $.ajax({
                url: url ,
                method: 'POST', 
                data: {
                    id:id,
                    qty_beli:qty_beli
                },          
                success: function(data) {   
                    var data = $.parseJSON(data);  
                    Swal.fire({
                        icon: data.status?'success':'error',
                        title: data.status?'Success...':'Oops...',
                        text: data.message
                    })
                    $('#modalDetail').modal('hide');
                    show_cart()
                }
            });
        }
        
    }
    function show_cart() {
        var url = 	url =  "<?= base_url('penjualan/show_cart') ?>";
            $.ajax({
                url: url ,
                method: 'POST',      
                success: function(data) {   
                 $('#show_cart').html(data)
                }
            });
    }

    function show_history() {
        var url = 	url =  "<?= base_url('penjualan/show_history') ?>";
            $.ajax({
                url: url ,
                method: 'POST',      
                success: function(data) {   
                    console.log(data);
                 $('#show_history').html(data)
                }
            });
    }

    function beli() {
        var url =  "<?= base_url('penjualan/beli') ?>";  
            Swal.fire({
                title: 'Apa Kamu yakin?',
                text: "Kamu Akan Membeli produk ini ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                            url: url ,
                            method: 'POST',      
                            success: function(data) {   
                                data =JSON.parse(data);
                                Swal.fire({
                                    icon: data.status?'success':'error',
                                    title: data.status?'Success...'+data.message:'Oops...'+data.message
                                })

                                show_cart()
                                show_history()
                            }
                        });
                }
            })
    }

    function show_history_detail(id) {
        var url =  "<?= base_url('penjualan/detail_trans') ?>";  
        $.ajax({
                url: url ,
                method: 'POST', 
                data: {
                    id:id,
                },          
                success: function(data) {                       
                    $('#modalDetailhistory').modal('show');
                    $('#show_detail_history').html(data);
                }
            });
    }
show_cart()
show_history()
</script>

<script src="<?= base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/adminlte/')?>dist/js/adminlte.js?v=3.2.0"></script>

<script src="<?= base_url('assets/adminlte/')?>plugins/chart.js/Chart.min.js"></script>

<script src="<?= base_url('assets/adminlte/')?>dist/js/demo.js"></script>


<script src="<?= base_url('assets/adminlte/')?>dist/js/pages/dashboard3.js"></script>
</body>
</html>